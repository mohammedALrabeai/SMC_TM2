<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskFollowUp;
use Illuminate\Http\Request;

class TaskFollowUpController extends Controller
{
    public function index()
    {
        return TaskFollowUp::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:emps,id',
            'task_id' => 'required|exists:tasks,id',
            'task_status_id' => 'required|exists:task_statuses,id',
            'note' => 'nullable|string',
        ]);

        $taskFollowUp = TaskFollowUp::create($validated);

        return response()->json($taskFollowUp, 201);
    }

    public function show(TaskFollowUp $taskFollowUp)
    {
        return $taskFollowUp;
    }

    public function update(Request $request, TaskFollowUp $taskFollowUp)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:emps,id',
            'task_id' => 'required|exists:tasks,id',
            'task_status_id' => 'required|exists:task_statuses,id',
            'note' => 'nullable|string',
        ]);

        $taskFollowUp->update($validated);

        return response()->json($taskFollowUp, 200);
    }

    public function destroy(TaskFollowUp $taskFollowUp)
    {
        $taskFollowUp->delete();

        return response()->json(null, 204);
    }

    public function getTaskFollowUps($taskId)
    {
        $task = Task::find($taskId);

        if (! $task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        $taskFollowUps = $task->followUps;

        return response()->json($taskFollowUps);
    }
}
