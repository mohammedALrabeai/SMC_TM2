<?php
namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use Illuminate\Validation\Rule;

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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('emps')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->user_id);
                }),
            ],
            'phone' => [
                'required',
                'string',
                'max:15',
                Rule::unique('emps')->where(function ($query) use ($request) {
                    return $query->where('user_id', $request->user_id);
                }),
            ],
        ]);
        
        
        // التحقق من تكرار البريد الإلكتروني أو رقم الهاتف مع نفس user_id
        $existingEmployee = Emp::where(function ($query) use ($request) {
            $query->where('email', $request->email)
                  ->orWhere('phone', $request->phone);
        })->where('user_id', $request->user_id)->first();
        
        if ($existingEmployee) {
            // إذا تم العثور على موظف بنفس البريد الإلكتروني أو رقم الهاتف مع نفس user_id
            return redirect()->back()->withErrors([
                'email' => __('هذا البريد الإلكتروني أو رقم الهاتف موجود بالفعل مع نفس المستخدم. يرجى التواصل مع الإدارة.'),
            ])->withInput();
        }
        


$employee =  Emp::create([
            'user_id' => $user_id, // تخزين user_id
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_hours_per_day' => 8, // القيمة الافتراضية
            'password' => bcrypt('default-password'), // كلمة مرور افتراضية
            'is_active' => false, // غير مفعل افتراضيًا
            'request_status' => 'pending', // حالة الطلب
        ]);

        try{

        
        $auth = User::find($request->user_id)->w_api_token;
        $profileId = User::find($request->user_id)->w_api_profile_id;
        $phone = $employee->phone . '@c.us';
        $message = "مرحبًا، لقد تم تقديم طلبك بنجاح كموظف في نظامنا. الاسم: {$employee->name}  سيتم مراجعته قريبًا";
    
        // إرسال الرسالة
        $response = WhatsAppService::send_with_wapi($auth, $profileId, $phone, $message);
        return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح. سيتم مراجعته قريبًا.');
        // // تحقق من حالة الإرسال (اختياري)
        // if ($response['status'] === 'success') {
            
        // } else {
        //     return redirect()->back()->with('error', 'تم تسجيل الموظف، ولكن تعذر إرسال الإشعار.');
        // }
  
    } catch (\Exception $e) {
        return ['status' => 'error', 'message' => $e->getMessage()];
    }
    }
}
