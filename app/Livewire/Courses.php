<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Course;
use Livewire\Attributes\Computed;

class Courses extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public  $keyWord, $role_id, $price_id, $title, $description;
	public string $selected_id;

	protected $rules = [
        'role_id' => 'nullable',
        'price_id' => 'nullable',
        'title' => 'nullable',
        'description' => 'nullable',
    ];

    #[Computed]
	public function filteredCourses()
	{
		$keyWord = '%' . $this->keyWord . '%';
		return Course::latest()
			->where(function ($query) use ($keyWord) {
				$query
						->orWhere('role_id', 'LIKE', $keyWord)
						->orWhere('price_id', 'LIKE', $keyWord)
						->orWhere('title', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord);
			})
			->paginate(10);
	}

	public function render()
	{
		return view('livewire.courses.view', [
			'courses' => $this->filteredCourses,
		]);
	}
	
    public function cancel()
    {
        $this->reset();
    }

    public function save()
    {
	$this->validate();

        Course::updateOrCreate(
            ['id' => $this->selected_id ?? str()->orderedUuid()->toString()],
			[
				'role_id' => $this-> role_id,
				'price_id' => $this-> price_id,
				'title' => $this-> title,
				'description' => $this-> description
			]
		);

        $message = $this->selected_id ? 'Course Successfully updated.' : 'Course Successfully created.';
		$this->dispatch('closeModal');
        $this->reset();
		session()->flash('message', $message);
    }

    public function edit($id)
    {
        $this->selected_id = $id;
		$this->fill(Course::findOrFail($id)->toArray());
    }

    public function destroy($id)
    {
        if ($id) {
            Course::where('id', $id)->delete();
        }
    }
}