<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tiket;
use Carbon\Carbon;

class Welcome extends Component
{
    public $months;
    public $tiketTrendData;
    public $tiketPriorityLabels;
    public $tiketPriorityData;
    public $tiketStatusLabels;
    public $tiketStatusData;
    public $totalTikets;
    public $totalOpenTikets;
    public $totalClosedTikets;
    public $highPriorityTikets;
    public $lowPriorityTikets;
    public $averageResponseTime;

    public string $title = "Dashboard";
    public string $url = "/dashboard";

    public function mount()
    {
        $this->months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Total ticket count
        $this->totalTikets = Tiket::count();
        $this->totalOpenTikets = Tiket::where('status', 'Open')->count();
        $this->totalClosedTikets = Tiket::where('status', 'Closed')->count();

        // High and Low Priority tikets
        $this->highPriorityTikets = Tiket::where('tiket_prioritas', 'High')->count();
        $this->lowPriorityTikets = Tiket::where('tiket_prioritas', 'Low')->count();

        // Monthly ticket trends
        $this->tiketTrendData = Tiket::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();
        $this->tiketTrendData = array_pad($this->tiketTrendData, 12, 0); // Padding data for all months

        // Ticket Priority distribution
        $this->tiketPriorityLabels = ['Low', 'Medium', 'High'];
        $this->tiketPriorityData = [
            Tiket::where('tiket_prioritas', 'Low')->count(),
            Tiket::where('tiket_prioritas', 'Medium')->count(),
            Tiket::where('tiket_prioritas', 'High')->count(),
        ];

        // Ticket Status distribution
        $this->tiketStatusLabels = ['Open', 'Closed', 'In Progress'];
        $this->tiketStatusData = [
            Tiket::where('status', 'Open')->count(),
            Tiket::where('status', 'Closed')->count(),
            Tiket::where('status', 'In Progress')->count(),
        ];

        // Calculate Average Response Time
        $tikets = Tiket::whereNotNull('opened_at')->get();
        $totalResponseTime = 0;
        $tiketCount = $tikets->count();

        foreach ($tikets as $tiket) {
            $totalResponseTime += Carbon::parse($tiket->opened_at)->diffInMinutes($tiket->created_at);
        }

        // If there are tikets with response times, calculate the average, otherwise set it to 0
        $this->averageResponseTime = $tiketCount > 0 ? $totalResponseTime / $tiketCount : 0;
    }


    public function render()
    {
        return view('livewire.welcome');
    }
}
