<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // عرض قائمة المشاريع
    public function index()
    {
        $projects = Project::all();

        return response()->json(['projects' => $projects], 200);
    }

    // إنشاء مشروع جديد
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'whatsapp_group_id' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $project = Project::create($data);

        return response()->json(['project' => $project], 201);
    }

    // عرض معلومات مشروع محدد
    public function show($id)
    {
        $project = Project::findOrFail($id);

        return response()->json(['project' => $project], 200);
    }

    // تحديث معلومات مشروع محدد
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['string'],
            'whatsapp_group_id' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'user_id' => ['exists:users,id'],
        ]);

        $project = Project::findOrFail($id);
        $project->update($data);

        return response()->json(['project' => $project], 200);
    }

    // حذف مشروع محدد
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully'], 200);
    }

    public function getUserProjects($userId)
    {
        $user = User::find($userId);

        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $projects = $user->projects;

        return response()->json($projects);
    }
}
