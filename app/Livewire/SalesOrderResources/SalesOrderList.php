<?php

namespace App\Livewire\SalesOrderResources;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\SalesOrder;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Livewire\Pages\Admin\Contents\CustomerResources\Forms\CustomerForm;
use Mary\Traits\Toast;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SalesOrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class SalesOrderList extends Component
{

  public string $title = "Sales Orders";
  public string $url = "/sales-orders";

  #[\Livewire\Attributes\Locked]
  public $id;

  use Toast;
  use WithPagination;

  public $sales_order;
  public $exportFilter;

  #[Url(except: '')]
  public ?string $search = '';

  public bool $filterDrawer;

  public array $sortBy = ['column' => 'first_name', 'direction' => 'desc'];

  #[Url(except: '')]
  public array $filters = [];
  public array $filterForm = [
    'first_name' => '',
    'last_name' => '',
    'date' => '',
    'number' => '',
    'status' => '',
    'created_by' => '',
    'updated_by' => '',
    'created_at' => '',
    'updated_at' => '',
  ];


  public function mount() {}

  #[Computed]
  public function headers(): array
  {
    return [
      ['key' => 'action', 'label' => 'Action', 'sortable' => false, 'class' => 'whitespace-nowrap border-1 border-l-1 border-gray-300 dark:border-gray-600 text-center'],
      ['key' => 'no_urut', 'label' => '#', 'sortable' => false, 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'id', 'label' => 'ID', 'sortable' => false, 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-center'],
      ['key' => 'first_name', 'sortBy' => 'first_name',  'label' => 'First Name', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'last_name', 'sortBy' => 'last_name',  'label' => 'Last Name', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'date', 'sortBy' => 'date',  'label' => 'Date', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'number', 'sortBy' => 'number',  'label' => 'Number', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'status', 'sortBy' => 'status',  'label' => 'Status', 'class' => 'font-bold whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'updated_by', 'sortBy' => 'updated_by',  'label' => 'Updated By', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'created_at', 'sortBy' => 'created_at',  'label' => 'Created At', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'updated_at', 'sortBy' => 'updated_at',  'label' => 'Updated At', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right'],
      ['key' => 'is_activated', 'sortBy' => 'is_activated',  'label' => 'Is Activated', 'class' => 'whitespace-nowrap  border-1 border-l-1 border-gray-300 dark:border-gray-600 text-right']
    ];
  }



  #[Computed]
  public function rows(): LengthAwarePaginator
  {

    $query = SalesOrder::query()
      ->join('customers', 'sales_orders.customer_id', 'customers.id')
      ->select(
        'sales_orders.*',
        'customers.id as customer_id',
        'customers.first_name as first_name',
        'customers.last_name as last_name',
      );

    $query->when($this->search, fn($q) => $q->where('customers.first_name', 'like', "%{$this->search}%"))
      ->when(($this->filters['id'] ?? ''), fn($q) => $q->where('sales_orders.id', 'like', "%{$this->filters['id']}%"))
      ->when(($this->filters['first_name'] ?? ''), fn($q) => $q->where('customers.first_name', 'like', "%{$this->filters['first_name']}%"))
      ->when(($this->filters['last_name'] ?? ''), fn($q) => $q->where('customers.last_name', 'like', "%{$this->filters['last_name']}%"))
      ->when(($this->filters['date'] ?? ''), function ($q) {
        $dateTime = $this->filters['date'];
        $dateOnly = substr($dateTime, 0, 10);
        $q->whereDate('date', $dateOnly);
      })
      ->when(($this->filters['number'] ?? ''), fn($q) => $q->where('sales_orders.number', 'like', "%{$this->filters['number']}%"))
      ->when(($this->filters['status'] ?? ''), fn($q) => $q->where('sales_orders.status', 'like', "%{$this->filters['status']}%"))
      ->when(($this->filters['created_by'] ?? ''), fn($q) => $q->where('created_by', 'like', "%{$this->filters['created_by']}%"))
      ->when(($this->filters['updated_by'] ?? ''), fn($q) => $q->where('updated_by', 'like', "%{$this->filters['created_by']}%"))
      ->when((($this->filters['is_activated'] ?? '') != ''), fn($q) => $q->where('is_activated', $this->filters['is_activated']))
      ->when(($this->filters['sales_orders.created_at'] ?? ''), function ($q) {
        $dateTime = $this->filters['sales_orders.created_at'];
        $dateOnly = substr($dateTime, 0, 10);
        $q->whereDate('sales_orders.created_at', $dateOnly);
      })
      ->when(($this->filters['sales_orders.updated_at'] ?? ''), function ($q) {
        $dateTime = $this->filters['sales_orders.updated_at'];
        $dateOnly = substr($dateTime, 0, 10);
        $q->whereDate('sales_orders.updated_at', $dateOnly);
      });

    $this->exportFilter = $query->get();
    $paginator = $query
      ->orderBy(...array_values($this->sortBy))
      ->paginate(20);

    $start = ($paginator->currentPage() - 1) * $paginator->perPage();

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
        'filterForm.id' => 'nullable|string',
        'filterForm.first_name' => 'nullable|string',
        'filterForm.last_name' => 'nullable|string',
        'filterForm.date' => 'nullable|string',
        'filterForm.number' => 'nullable|string',
        'filterForm.status' => 'nullable|string',
        'filterForm.created_by' => 'nullable|string',
        'filterForm.updated_by' => 'nullable|string',
        'filterForm.is_activated' => 'nullable|integer',
        'filterForm.created_at' => 'nullable|string',
        'filterForm.updated_at' => 'nullable|string',
      ],
      [],
      [
        'filterForm.id' => 'First Name',
        'filterForm.first_name' => 'First Name',
        'filterForm.last_name' => 'Last Name',
        'filterForm.date' => 'Date',
        'filterForm.number' => 'Number',
        'filterForm.status' => 'Status',
        'filterForm.created_by' => 'Created By',
        'filterForm.updated_by' => 'Updated By',
        'filterForm.is_activated' => 'Is Activated',
        'filterForm.created_at' => 'Created At',
        'filterForm.updated_at' => 'Updated At',
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


    $query = SalesOrder::query()
      ->join('customers', 'sales_orders.customer_id', 'customers.id')
      ->select(
        'sales_orders.*',
        'customers.id as customer_id',
        'customers.first_name as first_name',
        'customers.last_name as last_name',
      )->get();

    $this->exportFilter = $query;

    $this->success('filter cleared');
  }


  public function export()
  {
    $timestamp = Carbon::now()->format('Ymd-His');

    return Excel::download(new SalesOrderExport($this->exportFilter), 'sales-order-' . $timestamp . '.xlsx');
  }

  public function delete()
  {
    $masterData = SalesOrder::findOrFail($this->id);

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

  public function printPdf($id)
  {
    $this->sales_order = SalesOrder::with([
      'employee' => function ($query) {
        $query->select('id', 'name');
      },
      'customer' => function ($query) {
        $query->select('id', 'first_name', 'last_name');
      },
      'sales_order_details' => function ($query) {
        $query->with('product');
      }
    ])
      ->findOrFail($id)
      ->toArray();


    $pdf = Pdf::loadView('components.invoice', ['sales_order' => $this->sales_order])
      ->setPaper([0, 0, 686.07, 391.23], 'portrait')
      ->setOptions([
        'margin_top'    => 0,
        'margin_right'  => 0,
        'margin_bottom' => 0,
        'margin_left'   => 0,
      ]);
    // $pdf = Pdf::loadView('components.invoice', ['sales_order' => $this->sales_order])->setPaper([0, 0, 9.53 * 72, 5.43 * 72]);
    return response()->streamDownload(function () use ($pdf) {
      echo $pdf->stream();
    }, 'sales_orders.pdf');
  }

  public function render()
  {
    return view('livewire.sales-order-resources.sales-order-list')
      ->title($this->title);
  }
}
