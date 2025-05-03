<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homestay Putih Mulia</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-180.png') }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand">
                <h5>Putih Mulia</h5>
            </a>

            <!-- Tombol toggle untuk tampilan mobile -->
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-icon">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="bar top-bar" d="M5 7H25" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                        <path class="bar middle-bar" d="M5 15H25" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                        <path class="bar bottom-bar" d="M5 23H25" stroke="#333" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
            </button>

            <!-- Menu navigasi collapse -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="rounded-circle me-2" width="24" height="24">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                            <li>
                                <h6 class="dropdown-header">Selamat datang!</h6>
                            </li>
                            <li><a class="dropdown-item" href=""><i class="fa fa-user me-2"></i> Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit"><i class="fa fa-sign-out-alt me-2"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Book Your Perfect Stay</h1>
            <p class="lead">Discover affordable hotels with the best deals!</p>
            <div class="search-box mt-4">
                {{-- <form action="{{ route('search') }}" method="GET"> --}}
                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Find your favorite room" name="destination">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="checkin" id="checkin" placeholder="Check-in">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="checkout" id="checkout" placeholder="Check-out">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <!-- Promo Section -->
    <section class="promo-section">
        <div class="container">
            <h2 class="text-center mb-5">Explore Our Promotions</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card promo-card">
                        <img src="https://via.placeholder.com/400x200?text=Promo+1" class="card-img-top" alt="Promo 1">
                        <div class="card-body">
                            <h5 class="card-title">Stay 3 Nights, Pay 2</h5>
                            <p class="card-text">Book now and enjoy an extra night!</p>
                            <a href="#" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card promo-card">
                        <img src="https://via.placeholder.com/400x200?text=Promo+2" class="card-img-top" alt="Promo 2">
                        <div class="card-body">
                            <h5 class="card-title">Weekend Getaway</h5>
                            <p class="card-text">Up to 30% off for weekend stays.</p>
                            <a href="#" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card promo-card">
                        <img src="https://via.placeholder.com/400x200?text=Promo+3" class="card-img-top" alt="Promo 3">
                        <div class="card-body">
                            <h5 class="card-title">Family Package</h5>
                            <p class="card-text">Special deals for family vacations.</p>
                            <a href="#" class="btn btn-outline-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p>© {{ date('Y') }} Putih Mulia. All rights reserved.</p>
            <div>
                <a href="#" class="text-muted me-3">Privacy Policy</a>
                <a href="#" class="text-muted me-3">Terms of Service</a>
                <a href="#" class="text-muted">Contact Us</a>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>
</html>
