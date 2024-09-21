<?php
namespace App\Exports;

use App\Models\Emp;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class EmpsExport implements FromCollection, WithHeadings
{
    protected $records;

    public function __construct(Collection $records)
    {
        $this->records = $records;
    }

    public function collection()
    {
        // إعادة السجلات كـ Collection للتصدير
        return $this->records;
    }

    public function headings(): array
    {
        $table = (new Emp())->getTable();

        // Get all column names from the table
        return Schema::getColumnListing($table);
    }
}
