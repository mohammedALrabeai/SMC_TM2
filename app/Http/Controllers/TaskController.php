<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض قائمة المهام
    public function index()
    {
        $tasks = Task::all();

        return response()->json(['tasks' => $tasks], 200);
    }

    // إنشاء مهمة جديدة
    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id' => ['required', 'exists:projects,id'],
            'title' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'sender_id' => ['required', 'exists:emp,id'],
            'receiver_id' => ['nullable', 'exists:emp,id'],
            'time_in_minutes' => ['required', 'integer'],
            'start_date' => ['nullable', 'date'],
        ]);

        $task = Task::create($data);

        return response()->json(['task' => $task], 201);
    }

    // عرض معلومات مهمة محددة
    public function show($id)
    {
        $task = Task::findOrFail($id);

        return response()->json(['task' => $task], 200);
    }

    // تحديث معلومات مهمة محددة
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'project_id' => ['exists:projects,id'],
            'title' => ['string'],
            'description' => ['nullable', 'string'],
            'sender_id' => ['exists:emp,id'],
            'receiver_id' => ['nullable', 'exists:emp,id'],
            'time_in_minutes' => ['integer'],
            'start_date' => ['nullable', 'date'],

        ]);

        $task = Task::findOrFail($id);
        $task->update($data);

        return response()->json(['task' => $task], 200);
    }

    // حذف مهمة محددة
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully'], 200);
    }

    public function getProjectTasks($projectId)
    {
        $project = Project::find($projectId);

        if (! $project) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $tasks = $project->tasks;

        return response()->json($tasks);
    }

    public function tasksByProjectwithEmp($projectId)
    {
        $tasks = Task::with(['sender', 'receiver'])
            ->where('project_id', $projectId)
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found for this project'], 404);
        }

        return $tasks;
    }

    public function tasksByProjectwithEmpـlastfollowup($projectId)
    {
        $tasks = Task::with(['sender', 'receiver', 'lastFollowUp'])
            ->where('project_id', $projectId)
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No tasks found for this project'], 404);
        }

        return $tasks;
    }

    public function recurringTasksByProject($projectId)
    {
        $tasks = Task::with(['sender', 'receiver', 'lastFollowUp'])
            ->where('project_id', $projectId)
            ->where('is_recurring', true)
            ->get();

        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No recurring tasks found for this project'], 404);
        }

        return $tasks;
    }

    public function createRecurringTask(Request $request)
    {
        $data = $request->validate([
            'project_id' => ['exists:projects,id'],
            'title' => ['string'],
            'description' => ['nullable', 'string'],
            'sender_id' => ['exists:users,id'],
            'receiver_id' => ['nullable', 'exists:users,id'],
            'time_in_minutes' => ['integer'],
            'start_date' => ['nullable', 'date'],
            // 'status' => ['required', 'string'],
            'is_recurring' => ['required', 'boolean'],
            'recurrence_interval_days' => 'required_if:is_recurring,true|integer|min:1',
            'next_occurrence' => ['required_if:is_recurring,true', 'date_format:Y-m-d H:i:s'],
        ]);

        $task = Task::create($data);

        return response()->json($task, 201);
    }

    public function updateRecurringTask(Task $task, Request $request)
    {
        $data = $request->validate([
            'project_id' => ['exists:projects,id'],
            'title' => ['string'],
            'description' => ['nullable', 'string'],
            'sender_id' => ['exists:users,id'],
            'receiver_id' => ['nullable', 'exists:users,id'],
            'time_in_minutes' => ['integer'],
            'start_date' => ['nullable', 'date'],
            // 'status' => ['sometimes', 'string'],
            'is_recurring' => ['sometimes', 'boolean'],
            'recurrence_interval_days' => 'required_if:is_recurring,true|integer|min:1',
            'next_occurrence' => ['required_if:is_recurring,true', 'date_format:Y-m-d H:i:s'],
        ]);

        $task->update($data);

        return response()->json($task, 200);
    }
}
