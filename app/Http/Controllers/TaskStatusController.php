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
 // عرض حالات المهمة التابعة لـ user_id معين
 public function getByUserId($user_id)
 {
     $taskStatuses = TaskStatus::where('user_id', $user_id)->get();

     if ($taskStatuses->isEmpty()) {
         return response()->json(['message' => 'No Task Statuses found for this user'], 404);
     }

     return response()->json($taskStatuses);
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

