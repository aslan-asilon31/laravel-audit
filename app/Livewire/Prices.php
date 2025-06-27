<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Price;

class Prices extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public  $keyWord, $name, $price, $features;
	public string $selected_id;

    // Define validation rules
    protected $rules = [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'features' => 'nullable|string',
    ];

    // Filtered prices based on search keyword
    public function filteredPrices()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return Price::latest()
            ->where(function ($query) use ($keyWord) {
                $query
                    ->orWhere('name', 'LIKE', $keyWord)
                    ->orWhere('price', 'LIKE', $keyWord)
                    ->orWhere('features', 'LIKE', $keyWord);
            })
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.prices.view', [
            'prices' => $this->filteredPrices(),
        ]);
    }

    // Cancel action (reset form fields)
    public function cancel()
    {
        $this->reset();
    }

    // Save or update price
    public function save()
    {
        // Validate the form data based on the defined rules
        $this->validate();

        // Save or update the price in the database
        Price::updateOrCreate(
            ['id' => $this->selected_id ?? str()->orderedUuid()->toString()],
            [
                'name' => $this->name,
                'price' => $this->price,
                'features' => $this->features,
            ]
        );

        // Flash message after saving/updating
        $message = $this->selected_id ? 'Price Successfully updated.' : 'Price Successfully created.';
        session()->flash('message', $message);

        // Reset the form and close modal
        $this->reset();
    }

    // Load price details for editing
    public function edit($id)
    {
        $this->selected_id = $id;
        $this->fill(Price::findOrFail($id)->toArray());
    }

    // Delete price record
    public function destroy($id)
    {
        if ($id) {
            Price::where('id', $id)->delete();
        }
    }
}
