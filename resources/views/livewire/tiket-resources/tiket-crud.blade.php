<div>

  <x-list-menu :title="$title" :url="$url" :id="$id" shadow class="" />


  <x-form wire:submit="{{ $id ? 'ubah' : 'simpan' }}">

    <div id="pertanyaan">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="mb-3">
          <x-input label="title" wire:model.blur="masterForm.title" id="masterForm.title" title="masterForm.title"
            placeholder="title" :readonly="$isReadonly" />
          <div wire:loading wire:target="masterForm.title">
            Typing title ...
          </div>
        </div>

        <div class="mb-3">
          <x-input label="pic" wire:model.blur="masterForm.pic" id="masterForm.pic" pic="masterForm.pic"
            placeholder="pic" :readonly="$isReadonly" />
          <div wire:loading wire:target="masterForm.pic">
            Typing pic ...
          </div>
        </div>

        <div class="mb-3">
          <x-input label="description" wire:model.blur="masterForm.description" id="masterForm.description"
            description="masterForm.description" placeholder="description" :readonly="$isReadonly" />
          <div wire:loading wire:target="masterForm.description">
            Typing description ...
          </div>
        </div>

        <div class="mb-3">
          <x-select label="ticket_type" wire:model="masterForm.ticket_type" :options="[
              ['id' => 'gudang', 'name' => 'gudang'],
              ['id' => 'sales', 'name' => 'sales'],
              ['id' => 'marketing', 'name' => 'marketing'],
              ['id' => 'IT', 'name' => 'IT'],
          ]" />
        </div>

        <div class="mb-3">
          <x-select label="tiket_prioritas" wire:model="masterForm.tiket_prioritas" :options="[
              ['id' => 'low', 'name' => 'low'],
              ['id' => 'medium', 'name' => 'medium'],
              ['id' => 'high', 'name' => 'high'],
          ]" />
        </div>

        <div class="mb-3">
          <x-select label="ticket_assigning" wire:model="masterForm.ticket_assigning" :options="[
              ['id' => 'department', 'name' => 'department'],
              ['id' => 'division', 'name' => 'division'],
              ['id' => 'job_position', 'name' => 'job_position'],
          ]" />
        </div>

        <div class="mb-3">
          <x-select label="forward_to" wire:model="masterForm.forward_to" :options="[
              ['id' => 'department', 'name' => 'department'],
              ['id' => 'division', 'name' => 'division'],
              ['id' => 'job_position', 'name' => 'job_position'],
          ]" />
        </div>

        <div class="mb-3">
          <x-input type="file" label="attachment" wire:model.blur="masterForm.attachment" id="masterForm.attachment"
            attachment="masterForm.deadline" placeholder="deadline" />
        </div>

        <div class="text-center mt-3">
          <x-errors class="text-white mb-3" />
          <x-button type="submit" :label="$id ? 'edit' : 'simpan'" class="btn-success btn-sm text-white" />
          <x-button label="batal" class="btn-error btn-sm text-white" link="/pemesanan-penjualan" />
        </div>


      </div>
    </div>
  </x-form>


</div>

@script
@endscript
