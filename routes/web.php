<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Livewire\EmpLogin;
use App\Models\Emp;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeRequestController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('home/ar/index');
});
Route::get('/emp-login', EmpLogin::class)->name('emp.login');


Route::get('/projects', function () {
    $projects = Project::all();

    return response()->json($projects);
});

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale); // تخزين اللغة في الجلسة
        App::setLocale($locale); // تغيير اللغة في التطبيق الحالي
    }
    return redirect()->back(); // إعادة توجيه المستخدم إلى الصفحة السابقة
})->name('locale.change');
Route::get('test-session', function () {
    session(['test_key' => 'test_value']);
    return session('locale'); // يجب أن يعرض 'test_value'
});



Route::get('/request-add-employee/{user_id}', [EmployeeRequestController::class, 'showForm'])->name('employee.request');
Route::post('/request-add-employee/{user_id}', [EmployeeRequestController::class, 'store'])->name('employee.request.store');



// Contact routes
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');


Route::get('/employee-tasks', function (Request $request) {
    // Get the date inputs
    // Get the date inputs
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Initialize the query
    $query = Emp::with(['sentTasks']);

    // Apply date filtering if dates are provided
    if ($startDate && $endDate) {
        $query->whereHas('sentTasks', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        });
    }

    // Get the employees with their task sums
    $employees = $query->get()->map(function ($employee) {
        $employee->sent_tasks_sum_time_in_minutes = $employee->sentTasks->sum('time_in_minutes');
        return $employee;
    });

    // Return the collection as JSON
    return view('filament.pages.employee-task-minutes', compact('employees'));
})->name('employee.tasks');
