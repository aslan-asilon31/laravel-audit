<div>
  <div class="container mx-auto px-4 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
      <div class="bg-white shadow-lg rounded-lg p-6">
        <h5 class="text-center text-xl font-semibold mb-4">@yield('title')</h5>
        <h5 class="text-lg">
          @guest
            {{ __('Welcome to') }} {{ config('app.name', 'Laravel') }}! </br>
            Please contact the admin to get your login credentials or click "Login" to go to your Dashboard.
          @else
            Hi {{ Auth::user()->name }}, Welcome back to {{ config('app.name', 'Laravel') }}.
            @endif
          </h5>
        </div>
      </div>

      <!-- Dashboard Stats Section -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Total Tickets Count -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Total Tickets Opened</h5>
          <div class="text-3xl font-bold">{{ $totalTickets }}</div>
        </div>

        <!-- Open Tickets Count -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Total Open Tickets</h5>
          <div class="text-3xl font-bold">{{ $totalOpenTickets }}</div>
        </div>

        <!-- Closed Tickets Count -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Total Closed Tickets</h5>
          <div class="text-3xl font-bold">{{ $totalClosedTickets }}</div>
        </div>
      </div>

      <!-- Ticket Analytics Charts -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
        <!-- Ticket Count Trends (Monthly) -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Ticket Trends (Monthly)</h5>
          <canvas id="ticketTrendChart" width="400" height="200"></canvas>
        </div>

        <!-- Ticket Priority Distribution -->
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Ticket Priority Distribution</h5>
          <canvas id="ticketPriorityChart" width="400" height="200"></canvas>
        </div>
      </div>

      <!-- Ticket Status Distribution -->
      <div class="mt-8">
        <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-xl font-semibold mb-4">Ticket Status Distribution</h5>
          <canvas id="ticketStatusChart" width="400" height="200"></canvas>
        </div>
      </div>

      <!-- Analytics Summary -->
      <div class="mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">High Priority Tickets</h5>
            <div class="text-3xl font-bold">{{ $highPriorityTickets }}</div>
          </div>
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Low Priority Tickets</h5>
            <div class="text-3xl font-bold">{{ $lowPriorityTickets }}</div>
          </div>
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Average Response Time</h5>
            <div class="text-3xl font-bold">{{ $averageResponseTime }} mins</div>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // Monthly Ticket Trends Chart
      new Chart(document.getElementById('ticketTrendChart'), {
        type: 'line',
        data: {
          labels: @json($months),
          datasets: [{
            label: 'Tickets Opened',
            data: @json($ticketTrendData),
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            fill: false,
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Ticket Trends (Monthly)'
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Ticket Priority Distribution Chart
      new Chart(document.getElementById('ticketPriorityChart'), {
        type: 'pie',
        data: {
          labels: @json($ticketPriorityLabels),
          datasets: [{
            data: @json($ticketPriorityData),
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Ticket Priority Distribution'
          }
        }
      });

      // Ticket Status Distribution Chart
      new Chart(document.getElementById('ticketStatusChart'), {
        type: 'bar',
        data: {
          labels: @json($ticketStatusLabels),
          datasets: [{
            label: 'Ticket Status',
            data: @json($ticketStatusData),
            backgroundColor: '#4BC0C0',
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Ticket Status Distribution'
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
  </div>
