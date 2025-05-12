<?php

namespace App\Exports;

use App\Models\SalesOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class SalesOrderExport implements FromCollection
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
}
