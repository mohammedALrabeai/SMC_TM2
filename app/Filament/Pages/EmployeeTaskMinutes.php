<?php

namespace App\Filament\Pages;

use App\Models\Emp;
use App\Models\Task;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class EmployeeTaskMinutes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static string $view = 'filament.pages.employee-task-minutes';
    public $employees;
    public function mount()
    {
        // Fetch employees with the sum of task minutes
        $this->employees = Emp::with('sentTasks')
            ->withSum('sentTasks', 'time_in_minutes')
            ->get();
    }


}
