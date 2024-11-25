<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp;

class EmployeeRequestController extends Controller
{
    public function showForm($user_id)
    {
        // تمرير user_id إلى العرض
        return view('request-add-employee', compact('user_id'));
    }

    public function store(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:emps,email',
            'phone' => 'required|string|max:15',
        ]);

        Emp::create([
            'user_id' => $user_id, // تخزين user_id
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_hours_per_day' => 8, // القيمة الافتراضية
            'password' => bcrypt('default-password'), // كلمة مرور افتراضية
            'is_active' => false, // غير مفعل افتراضيًا
            'request_status' => 'pending', // حالة الطلب
        ]);

        return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح. سيتم مراجعته قريبًا.');
    }
}
