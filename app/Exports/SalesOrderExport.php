<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\SalesOrder;


class SalesOrderExport implements FromCollection, WithMapping, WithColumnFormatting, WithHeadings
{
    public function collection()
    {
        return SalesOrder::all();
    }

    public function map($row): array
    {
        return [
            $row->id,                                 // Kolom: ID
            $row->first_name,                         // Kolom: First Name
            $row->last_name,                          // Kolom: Last Name
            Date::PHPToExcel($row->date),             // Kolom: Date
            $row->number,                             // Kolom: Number
            $row->status,                             // Kolom: Status
            $row->updated_by,                         // Kolom: Updated By
            Date::PHPToExcel($row->created_at),       // Kolom: Created At
            Date::PHPToExcel($row->updated_at),       // Kolom: Updated At
            $row->is_activated ? 'Yes' : 'No',        // Kolom: Is Activated
        ];
    }

    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Date
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Created At
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY, // Updated At
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Last Name',
            'Date',
            'Number',
            'Status',
            'Updated By',
            'Created At',
            'Updated At',
            'Is Activated',
        ];
    }
}
