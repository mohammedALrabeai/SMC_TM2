<?php
namespace App\Filament\Pages;

use App\Models\Emp;
use Filament\Pages\Page;

class EmployeeTaskMinutes extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static string $view = 'filament.pages.employee-task-minutes';
    public $employees;

    public function mount()
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        $query = Emp::with('sentTasks')
            ->withSum(['sentTasks' => function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('created_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->whereDate('created_at', '<=', $endDate);
                }
            }], 'time_in_minutes')
            ->withSum(['sentTasks' => function ($query) use ($startDate, $endDate) {
                if ($startDate) {
                    $query->whereDate('created_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->whereDate('created_at', '<=', $endDate);
                }
            }], 'exact_time'); // إضافة جمع exact_time

        $this->employees = $query->get();
    }
}
