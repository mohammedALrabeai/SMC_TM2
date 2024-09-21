<?php
namespace App\Exports;

use App\Models\Task;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TasksExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $selectedRecords;

    public function __construct(Collection $selectedRecords)
    {
        $this->selectedRecords = $selectedRecords;
    }
    public function collection()
    {
        return $this->selectedRecords->load(['sender', 'receiver', 'project'])->map(function ($task) {
            return [
                'ID' => $task->id,
                'Title' => $task->title,
                'Description' => $task->description,
                'Sender' => $task->sender ? $task->sender->name : 'N/A',  // Sender name (relation)
                'Receiver' => $task->receiver ? $task->receiver->name : 'N/A',  // Receiver name (relation)
                'Project' => $task->project ? $task->project->name : 'N/A',  // Project name (relation)
                'Start Date' => $task->start_date,
                'Time (minutes)' => $task->time_in_minutes,
                'Is Recurring' => $task->is_recurring ? 'Yes' : 'No',
                'Next Occurrence' => $task->next_occurrence,
                'Created At' => $task->created_at,
                'Updated At' => $task->updated_at,
            ];
        });
    }

    /**
     * Define the headings for the export automatically.
     * @return array
     */
    public function headings(): array
    {
        // Get the table name from the model
      return[
        'ID',
        'Title',
        'Description',
        'Sender',  // Sender relation column
        'Receiver',  // Receiver relation column
        'Project',  // Project relation column
        'Start Date',
        'Time (minutes)',
        'Is Recurring',
        'Next Occurrence',
        'Created At',
        'Updated At',
      ];
    }
}
