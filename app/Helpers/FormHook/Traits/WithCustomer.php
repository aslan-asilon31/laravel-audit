<?php

namespace App\Helpers\FormHook\Traits;

use App\Models\Customer;


trait WithCustomer
{

    public int $detailIndex;


    #[\Livewire\Attributes\Locked]
    public string $readonly = '';

    #[\Livewire\Attributes\Locked]
    public bool $isReadonly = false;

    #[\Livewire\Attributes\Locked]
    public bool $isDisabled = false;

    #[\Livewire\Attributes\Locked]
    public array $options = [];


    public function delete()
    {
        $masterData = Customer::findOrFail($this->id);

        \Illuminate\Support\Facades\DB::beginTransaction();
        try {

            $masterData->delete();
            \Illuminate\Support\Facades\DB::commit();

            $this->success('Data has been deleted');
            $this->redirect($this->url, true);
        } catch (\Throwable $th) {
            \Illuminate\Support\Facades\DB::rollBack();
            $this->error('Data failed to delete');
        }
    }
}
