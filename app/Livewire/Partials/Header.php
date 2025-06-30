<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Mary\Traits\Toast;

class Header extends Component
{
    use Toast;
    public $salesOrderStatusPending;
    public $salesOrderStatusSettlement;
    public $salesOrderStatusExpired;
    public $salesOrderFraudStatusIdentify;
    public $salesOrderFraudStatusAccept;
    public $salesOrderIsActivateYes;
    public $salesOrderIsActivateNo;

    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    public function render()
    {
        return view('livewire.partials.header');
    }

    public function mount() {}
}
