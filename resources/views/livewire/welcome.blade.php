<div>

  <div>
    <div class="container mx-auto px-4 py-8">

      <!-- Analytics Summary -->
      <div class="mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">High Priority Tikets</h5>
            <div class="text-3xl font-bold">{{ $highPriorityTikets }}</div>
          </div>
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Low Priority Tikets</h5>
            <div class="text-3xl font-bold">{{ $lowPriorityTikets }}</div>
          </div>
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Average Response Time</h5>
            <div class="text-3xl font-bold">{{ $averageResponseTime }} mins</div>
          </div>
        </div>
      </div>

      <!-- Welcome Section -->
      <div class="mb-8">
        <div class="bg-white shadow-lg rounded-lg p-6">
          <h5 class="text-center text-xl font-semibold mb-4">@yield('title')</h5>
          <h5 class="text-lg">
            @guest
              {{ __('Welcome to') }} {{ config('app.name', 'CRM') }}! </br>
              Please contact the admin to get your login credentials or click "Login" to go to your Dashboard.
            @else
              Hi {{ Auth::user()->name }}, Welcome back to {{ config('app.name', 'CRM') }}.
              @endif
            </h5>
          </div>
        </div>

        <!-- Dashboard Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Total Tikets Count -->
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Total Tikets Opened</h5>
            <div class="text-3xl font-bold">{{ $totalTikets }}</div>
          </div>

          <!-- Open Tikets Count -->
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Total Open Tikets</h5>
            <div class="text-3xl font-bold">{{ $totalOpenTikets }}</div>
          </div>

          <!-- Closed Tikets Count -->
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Total Closed Tikets</h5>
            <div class="text-3xl font-bold">{{ $totalClosedTikets }}</div>
          </div>
        </div>

        <!-- Tiket Analytics Charts -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
          <!-- Tiket Count Trends (Monthly) -->
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Tiket Trends (Monthly)</h5>
            <canvas id="tiketTrendChart" width="400" height="200"></canvas>
          </div>

          <!-- Tiket Priority Distribution -->
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Tiket Priority Distribution</h5>
            <canvas id="tiketPriorityChart" width="400" height="200"></canvas>
          </div>
        </div>

        <!-- Tiket Status Distribution -->
        <div class="mt-8">
          <div class="col-span-1 bg-white shadow-lg rounded-lg p-6">
            <h5 class="text-xl font-semibold mb-4">Tiket Status Distribution</h5>
            <canvas id="tiketStatusChart" width="400" height="200"></canvas>
          </div>
        </div>


      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // Monthly Tiket Trends Chart (Line Chart)
      new Chart(document.getElementById('tiketTrendChart'), {
        type: 'line',
        data: {
          labels: @json($months),
          datasets: [{
            label: 'Tikets Opened',
            data: @json($tiketTrendData),
            borderColor: 'rgba(128, 0, 128, 1)', // Purple border color
            backgroundColor: 'rgba(128, 0, 128, 0.2)', // Light purple fill color
            fill: false,
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Tiket Trends (Monthly)'
          },
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });

      // Tiket Priority Distribution Chart (Pie Chart)
      new Chart(document.getElementById('tiketPriorityChart'), {
        type: 'pie',
        data: {
          labels: @json($tiketPriorityLabels),
          datasets: [{
            data: @json($tiketPriorityData),
            backgroundColor: [
              'rgba(128, 0, 128, 0.7)', // Purple for low priority
              'rgba(153, 50, 204, 0.7)', // Medium purple for medium priority
              'rgba(186, 85, 211, 0.7)' // Light purple for high priority
            ]
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Tiket Priority Distribution'
          }
        }
      });

      // Tiket Status Distribution Chart (Bar Chart)
      new Chart(document.getElementById('tiketStatusChart'), {
        type: 'bar',
        data: {
          labels: @json($tiketStatusLabels),
          datasets: [{
            label: 'Tiket Status',
            data: @json($tiketStatusData),
            backgroundColor: 'rgba(138, 43, 226, 0.7)', // Purple color for bars
          }]
        },
        options: {
          responsive: true,
          title: {
            display: true,
            text: 'Tiket Status Distribution'
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
