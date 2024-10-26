<?php

use App\Models\Project;
use App\Livewire\EmpLogin;
use Illuminate\Support\Facades\Route;
use App\Models\Emp;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home/index');
});
Route::get('/emp-login', EmpLogin::class)->name('emp.login');


Route::get('/projects', function () {
    $projects = Project::all();

    return response()->json($projects);
});



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
