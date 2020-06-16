<?php

namespace App\Exports;

use App\Employee;
use App\Emp_info;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function __construct($year)
    {
        
        $this->from = $year['from_date'];
        $this->to = $year['to_date'];

    }


    public function query()
    {
        return Employee::query()->whereBetween('created_at', [$this->from, $this->to ])
                       ->with('emp_infos');
    }

    public function headings(): array
    {
        return ["id", "user_id", "Entrance Used"];
    }

    public function map($employee): array
    {
        return [
            $employee->user_id,
            $employee->emp_infos->full_name,
            $employee->entrance_used,
        ];
    }
}
