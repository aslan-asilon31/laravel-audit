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

class CustomersExport implements FromCollection, WithMapping, WithColumnFormatting, WithHeadings
{

    public function collection()
    {

        return Customer::all();
    }

    public function map($row): array
    {

        $created_at = Date::PHPToExcel($row->created_at);
        $updated_at = Date::PHPToExcel($row->updated_at);

        return [
            $row->id,
            $row->first_name,
            $row->last_name,
            $row->phone,
            $row->email,
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
            'H' => NumberFormat::FORMAT_DATE_DMYSLASH,
            'I' => NumberFormat::FORMAT_DATE_DMYSLASH,
        ];
    }

    public function headings(): array
    {

        return [
            'ID',
            'First Name',
            'Last Name',
            'phone',
            'Email',
            'Created By',
            'Updated By',
            'Created At',
            'Updated At',
            'Is Activated',
        ];
    }
}
