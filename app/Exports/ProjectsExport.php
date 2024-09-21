<?php
namespace App\Exports;

use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Project::all();
    }

    /**
     * Define the headings for the export automatically.
     * @return array
     */
    public function headings(): array
    {
        // Get the table name from the model
        $table = (new Project())->getTable();

        // Get all column names from the table
        return Schema::getColumnListing($table);
    }
}
