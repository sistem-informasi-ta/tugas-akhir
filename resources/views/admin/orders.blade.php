<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin - Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #343a40;
      position: fixed;
      top: 0;
      left: 0;
    }
    .sidebar a {
      display: block;
      padding: 10px 20px;
      color: white;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      margin-left: 260px;
      padding: 20px;
    }
    .topbar {
      background-color: #ffffff;
      padding: 15px 20px;
      border-bottom: 1px solid #dee2e6;
    }
  </style>
</head>
<body>

    <div class="sidebar p-4">
        <h4 class="text-white">Admin Panel</h4>
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-chart-line me-2"></i> Dashboard</a>
        <a href="{{ route('admin.orders') }}"><i class="fas fa-shopping-cart me-2"></i> Orders</a>
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

<div class="content">
  <div class="topbar d-flex justify-content-between align-items-center">
    <h5 class="mb-0 fw-bold"><i class="fas fa-shopping-cart me-2 text-primary"></i>Order Management</h5>
    <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
  </div>

  <!-- Orders Table -->
  <div class="card mt-4 shadow-sm">
    <div class="card-body">
      <h5 class="card-title mb-3">Recent Bookings</h5>
      <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by customer name...">
      </div>
      <div class="table-responsive">
        <table class="table table-hover" id="ordersTable">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Customer</th>
              <th>Room Type</th>
              <th>Check-In</th>
              <th>Check-Out</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Andi</td>
              <td><span class="badge bg-primary">Deluxe</span></td>
              <td>2025-05-01</td>
              <td>2025-05-03</td>
              <td><span class="badge bg-success">Confirmed</span></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Budi</td>
              <td><span class="badge bg-warning text-dark">Standard</span></td>
              <td>2025-05-02</td>
              <td>2025-05-04</td>
              <td><span class="badge bg-danger">Pending</span></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Citra</td>
              <td><span class="badge bg-secondary">Suite</span></td>
              <td>2025-05-05</td>
              <td>2025-05-08</td>
              <td><span class="badge bg-success">Confirmed</span></td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  const searchInput = document.getElementById('searchInput');
  const tableRows = document.querySelectorAll('#ordersTable tbody tr');

  searchInput.addEventListener('keyup', function () {
    const keyword = this.value.toLowerCase();
    tableRows.forEach(row => {
      const customer = row.cells[1].textContent.toLowerCase();
      row.style.display = customer.includes(keyword) ? '' : 'none';
    });
  });
</script>

</body>
</html>


