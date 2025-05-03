<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #cfd8dc;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .topbar {
            background-color: #fff;
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <h4 class="text-white mb-4">Admin</h4>
        <a href="#">Dashboard</a>
        <a href="#">Orders</a>
        <a href="#">Rooms</a>
        <a href="#">Users</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1">
        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dashboard</h5>
            <span class="text-muted">Welcome, {{ Auth::user()->name }}</span>
        </div>

        <!-- Page Content -->
        <div class="content">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Total Orders</h5>
                            <p class="text-muted">123 Orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Available Rooms</h5>
                            <p class="text-muted">45 Rooms</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Active Users</h5>
                            <p class="text-muted">67 Users</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Recent Bookings</h5>
                    <table class="table table-hover">
                        <thead>
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
                                <td>Deluxe</td>
                                <td>2025-05-01</td>
                                <td>2025-05-03</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Budi</td>
                                <td>Standard</td>
                                <td>2025-05-02</td>
                                <td>2025-05-04</td>
                            </tr>
                            <!-- Tambah data lainnya di sini -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
