<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;


class SalesOrderExport implements FromCollection, WithStyles, WithColumnWidths, WithMapping, WithColumnFormatting, WithHeadings
{

    private $filter;

    public function __construct($filter)
    {
        $this->filter = $filter;
    }

    public function collection()
    {

        return $this->filter;
    }

    public function map($row): array
    {

        $created_at = Date::PHPToExcel($row->created_at);
        $updated_at = Date::PHPToExcel($row->updated_at);

        return [
            $row->id,
            $row->employee_id,
            $row->customer_id,
            $row->date,
            $row->number,
            $row->status,
            $row->created_by,
            $row->updated_by,
            $row->created_at = $created_at,
            $row->updated_at = $updated_at,
            $row->is_activated ? 'Yes' : 'No',
        ];
    }

    public function columnFormats(): array
    {

        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    public function headings(): array
    {

        return [
            'ID',
            'employee_id',
            'customer_id',
            'date',
            'number',
            'status',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At',
            'Is Activated',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 40,
            'C' => 40,
            'D' => 15,
            'E' => 15,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 15,
            'J' => 15,
            'K' => 15,
            'L' => 15,
            'M' => 15,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => [
                'font' => ['bold' => true],
                'font' => ['size' => 12],
            ],
        ];
    }
}
