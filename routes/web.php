<?php

use App\Models\Project;
use App\Livewire\EmpLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/emp-login', EmpLogin::class)->name('emp.login');


Route::get('/projects', function () {
    $projects = Project::all();
    
    return response()->json($projects);
});
