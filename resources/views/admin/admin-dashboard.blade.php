<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #e1f5fe);
      font-family: 'Segoe UI', sans-serif;
      color: #333;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      position: fixed;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar h4 {
      font-weight: bold;
      margin-bottom: 30px;
    }
    .sidebar a {
      color: #cfd8dc;
      text-decoration: none;
      display: block;
      padding: 12px 20px;
      transition: all 0.3s ease;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background-color: #546e7a;
      color: #fff;
    }
    .topbar {
      background: #fff;
      padding: 20px 30px;
      margin-left: 250px;
      border-bottom: 1px solid #dee2e6;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    .content {
      margin-left: 250px;
      padding: 30px;
    }
    .card {
      border: none;
      border-radius: 15px;
      transition: 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }
    .table thead {
      background-color: #f1f1f1;
    }
    .table th {
      font-weight: 600;
    }
    .logout-link {
      margin-top: 50px;
      color: #ff6b6b !important;
    }
    .card-title i {
      color: #009688;
    }
    #bookingChart {
      max-height: 300px;
    }
  </style>
</head>
<body>

<div class="sidebar p-4">
  <h4 class="text-white">Admin Panel</h4>
  <a href="#"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
  <a href="#"><i class="fas fa-shopping-cart me-2"></i> Orders</a>
  <a href="#"><i class="fas fa-door-open me-2"></i> Rooms</a>
  <a href="#"><i class="fas fa-users me-2"></i> Users</a>
  <a href="{{ route('logout') }}" class="logout-link"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt me-2"></i> Logout
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</div>

<div class="topbar d-flex justify-content-between align-items-center">
  <h5 class="mb-0 fw-bold">Dashboard Overview</h5>
  <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
</div>

<div class="content">
  <div class="row">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm p-3 bg-white">
        <div class="card-body">
          <h5><i class="fas fa-receipt text-primary me-2"></i>Total Orders</h5>
          <p class="text-muted fs-5">123 Orders</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm p-3 bg-white">
        <div class="card-body">
          <h5><i class="fas fa-bed text-success me-2"></i>Available Rooms</h5>
          <p class="text-muted fs-5">45 Rooms</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm p-3 bg-white">
        <div class="card-body">
          <h5><i class="fas fa-user-check text-warning me-2"></i>Active Users</h5>
          <p class="text-muted fs-5">67 Users</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Grafik Booking -->
  <div class="card shadow-sm bg-white mb-4">
    <div class="card-body">
      <h5 class="card-title mb-4">
        <i class="fas fa-chart-bar me-2"></i>Booking Statistics
      </h5>
      <canvas id="bookingChart"></canvas>
    </div>
  </div>

  <!-- Tabel Booking dengan Search -->
  <div class="card shadow-sm bg-white">
    <div class="card-body">
      <h5 class="card-title mb-4">
        <i class="fas fa-calendar-check me-2"></i>Recent Bookings
      </h5>
      <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by Customer...">
      </div>
      <div class="table-responsive">
        <table class="table table-hover align-middle" id="bookingTable">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Room</th>
              <th>Check-In</th>
              <th>Check-Out</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Aldi</td>
              <td><span class="badge bg-primary">Deluxe</span></td>
              <td>2025-05-01</td>
              <td>2025-05-03</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Budi</td>
              <td><span class="badge bg-success">Standard</span></td>
              <td>2025-05-02</td>
              <td>2025-05-04</td>
            </tr>
            <!-- Tambahkan baris lain di sini -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  // Chart data
  const ctx = document.getElementById('bookingChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mei 1', 'Mei 2', 'Mei 3', 'Mei 4', 'Mei 5'],
      datasets: [{
        label: 'Bookings',
        data: [5, 7, 3, 8, 4],
        borderColor: '#00796B',
        backgroundColor: 'rgba(0,121,107,0.2)',
        fill: true,
        tension: 0.4
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });

  // Search filter
  const searchInput = document.getElementById("searchInput");
  searchInput.addEventListener("keyup", function () {
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll("#bookingTable tbody tr");
    rows.forEach(row => {
      const customer = row.cells[1].textContent.toLowerCase();
      row.style.display = customer.includes(filter) ? "" : "none";
    });
  });
</script>

</body>
</html>
