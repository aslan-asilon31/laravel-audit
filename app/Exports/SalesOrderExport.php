<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SalesOrderExport implements FromCollection, WithMapping, WithColumnFormatting, WithHeadings
{
    protected $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection(): Collection
    {
        return $this->data;
    }

    public function map($row): array
    {
        return [
            $row->invoice_number,                      // Kolom A
            \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($row->order_date), // Kolom B
            $row->total_amount,                        // Kolom C
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }

    public function headings(): array
    {
        return [
            'id',
            'Employee ID',
            'Customer ID',
        ];
    }
}
