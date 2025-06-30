<?php

namespace App\Livewire\TiketResources;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Tiket;
use App\Models\Price;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Livewire\TiketResources\Forms\TiketForm;
use Mary\Traits\Toast;

class TiketList extends Component
{
  public $judul;
  public string $title = "Tiket";
  public string $url = "/tiket";

  #[\Livewire\Attributes\Locked]
  public $id;

  use Toast;
  use WithPagination;

  #[Url(except: '')]
  public ?string $search = '';

  public bool $filterDrawer;

  public array $sortBy = ['column' => 'judul', 'direction' => 'desc'];

  #[Url(except: '')]
  public array $filters = [];
  public array $filterForm = [
    'judul' => '',
    'tgl_dibuat' => '',
  ];


  public function mount() {}

  #[Computed]
  public function headers(): array
  {
    return [
      ['key' => 'action', 'label' => 'Action', 'sortable' => false, 'class' => 'whitespace-nowrap border-1 border-l-1 border-gray-300 dark:border-gray-600 text-center'],
      ['key' => 'id', 'label' => 'ID', 'sortBy' => 'id', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'judul', 'label' => 'judul', 'sortBy' => 'judul', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'pemilik', 'label' => 'pemilik', 'sortBy' => 'pemilik', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'assignTo.name', 'label' => 'Ditugaskan Kepada', 'sortable' => 'assignTo.name', 'class' => 'whitespace-nowrap border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],  // Added 'Assigned To'
      ['key' => 'tipe_tiket', 'label' => 'Tipe Tiket', 'sortBy' => 'tipe_tiket', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'tiket_prioritas', 'label' => 'Tiket Prioritas', 'sortBy' => 'tiket_prioritas', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'tiket_ditugaskan', 'label' => 'Tiket Ditugaskan', 'sortBy' => 'tiket_ditugaskan', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'pengalihan_tiket', 'label' => 'Pengalihan Tiket', 'sortBy' => 'pengalihan_tiket', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'lampiran', 'label' => 'lampiran', 'sortBy' => 'lampiran', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'tiket_dibuka', 'label' => 'Tiket Dibuka', 'sortBy' => 'tiket_dibuka', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'tiket_diselesaikan', 'label' => 'Tiket Diselesaikan', 'sortBy' => 'tiket_diselesaikan', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'deskripsi', 'label' => 'deskripsi', 'sortBy' => 'deskripsi', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'status', 'label' => 'Status', 'sortBy' => 'status', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'dibuat_oleh', 'label' => 'Dibuat Oleh', 'sortBy' => 'dibuat_oleh', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'diupdate_oleh', 'label' => 'Status', 'sortBy' => 'diupdate_oleh', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-left'],
      ['key' => 'tgl_dibuat', 'label' => 'Created At', 'format' => ['date', 'Y-m-d H:i:s'], 'sortBy' => 'tgl_dibuat', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-center'],
      ['key' => 'tgl_diupdate', 'label' => 'updated At', 'format' => ['date', 'Y-m-d H:i:s'], 'sortBy' => 'tgl_diupdate', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-center']
    ];
  }

  #[Computed]
  public function rows(): LengthAwarePaginator
  {

    $query = Tiket::with('assignTo');

    $query->when($this->search, fn($q) => $q->where('judul', 'like', "%{$this->search}%"))
      ->when(($this->filters['judul'] ?? ''), fn($q) => $q->where('judul', 'like', "%{$this->filters['judul']}%"))
      ->when(($this->filters['assignTo.name'] ?? ''), fn($q) => $q->whereHas('assignTo', function ($query) {
        $query->where('assignTo.name', 'like', "%" . $this->filters['assignTo.name'] . "%");
      }))
      ->when(($this->filters['tgl_dibuat'] ?? ''), function ($q) {
        $dateTime = $this->filters['tgl_dibuat'];
        $dateOnly = substr($dateTime, 0, 10); // Extract only the date part
        $q->whereDate('tgl_dibuat', $dateOnly);
      });

    $paginator = $query
      ->orderBy(...array_values($this->sortBy)) // Order by the defined sorting values
      ->paginate(20); // Paginate results

    $start = ($paginator->currentPage() - 1) * $paginator->perPage();

    // Adding a custom column 'no_urut' for row numbers
    $paginator->getCollection()->transform(function ($item, $key) use ($start) {
      $item->no_urut = $start + $key + 1;
      return $item;
    });

    return $paginator;
  }

  public function filter()
  {
    $validatedFilters = $this->validate(
      [
        'filterForm.judul' => 'nullable|string',
        'filterForm.tgl_dibuat' => 'nullable|string',
      ],
      [],
      [
        'filterForm.judul' => 'judul',
        'filterForm.tgl_dibuat' => 'Created At',
      ]
    )['filterForm'];



    $this->filters = collect($validatedFilters)->reject(fn($value) => $value === '')->toArray();
    $this->success('Filter Result');
    $this->filterDrawer = false;
  }

  public function clear(): void
  {
    $this->reset('filters');
    $this->reset('filterForm');
    $this->success('filter cleared');
  }

  public function delete()
  {
    $masterData = Tiket::findOrFail($this->id);

    \Illuminate\Support\Facades\DB::beginTransaction();
    try {

      $this->deleteImage($masterData['image_url']);

      $masterData->delete();
      \Illuminate\Support\Facades\DB::commit();

      $this->success('Data has been deleted');
      $this->redirect($this->url, true);
    } catch (\Throwable $th) {
      \Illuminate\Support\Facades\DB::rollBack();
      $this->error('Data failed to delete');
    }
  }

  public function render()
  {
    return view('livewire.tiket-resources.tiket-list')
      ->title($this->judul);
  }
}
