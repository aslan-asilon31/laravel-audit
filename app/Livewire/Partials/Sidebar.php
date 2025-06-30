<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Sidebar extends Component
{

    public $salesOrderStatusPending;
    public $salesOrderStatusSettlement;
    public $salesOrderStatusExpired;
    public $salesOrderFraudStatusIdentify;
    public $salesOrderFraudStatusAccept;
    public $salesOrderIsActivateYes;
    public $salesOrderIsActivateNo;

    public function render()
    {
        return view('livewire.partials.sidebar');
    }

    public function mount() {}
}
