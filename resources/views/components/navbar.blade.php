<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-success" href="{{ url('/') }}">EcoQ</a>

        <!-- Search Bar -->
        <form class="d-flex mx-auto" role="search">
            <div class="input-group">
                <span class="input-group-text bg-light border-0">
                    <i class="bi bi-search text-muted"></i> <!-- Bootstrap icon untuk search -->
                </span>
                <input class="form-control border-0 bg-light" type="search" placeholder="Search" aria-label="Search">
            </div>
        </form>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('/katalog') }}">Katalog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-dark" href="{{ url('/kegiatan') }}">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success text-uppercase" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
