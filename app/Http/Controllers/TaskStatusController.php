<?php
// app/Http/Controllers/TaskStatusController.php
namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    // عرض جميع حالات المهام
    public function index()
    {
        return TaskStatus::all();
    }

    // عرض حالة مهمة معينة
    public function show($id)
    {
        $taskStatus = TaskStatus::find($id);

        if (!$taskStatus) {
            return response()->json(['message' => 'Task Status not found'], 404);
        }

        return $taskStatus;
    }

    // إنشاء حالة مهمة جديدة
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'only_for_admin' => 'boolean',
        ]);

        $taskStatus = TaskStatus::create($data);

        return response()->json($taskStatus, 201);
    }

    // تحديث حالة مهمة
    public function update(Request $request, $id)
    {
        $taskStatus = TaskStatus::find($id);

        if (!$taskStatus) {
            return response()->json(['message' => 'Task Status not found'], 404);
        }

        $data = $request->validate([
            'user_id' => 'exists:users,id',
            'name' => 'string|max:255',
            'only_for_admin' => 'boolean',
        ]);

        $taskStatus->update($data);

        return $taskStatus;
    }

    // حذف حالة مهمة
    public function destroy($id)
    {
        $taskStatus = TaskStatus::find($id);

        if (!$taskStatus) {
            return response()->json(['message' => 'Task Status not found'], 404);
        }

        $taskStatus->delete();

        return response()->json(['message' => 'Task Status deleted successfully']);
    }
}

