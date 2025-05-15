<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Carbon\Carbon;

class CustomersExport implements FromView
{

    public function view(): View
    {
        $title = 'Customer Report';
        $url = '/customers';

        $customers = Customer::all()->map(function ($customer) {
            return [
                'id' => $customer->id,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'email' => $customer->email,
                'created_at' => Carbon::parse($customer->created_at)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::parse($customer->updated_at)->format('Y-m-d H:i:s'),
                'is_activated' => $customer->is_activated ? 'Yes' : 'No',
            ];
        });

        // ✅ Kirim dengan compact()
        return view('customer-table', compact('customers', 'title', 'url'));
    }
}
