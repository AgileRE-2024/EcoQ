<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-success" href="{{ url('/') }}">
            <img src="{{ asset('/assets/images/logo.png')}}" alt="Logo" style="height: 30px;">
        </a>

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
                <li class="nav-item d-flex">
                    @if(Auth::user())
                    <!-- Jika pengguna sudah login -->
                    <a class="nav-link text-uppercase text-dark" href="{{ url('/dashboard') }}">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="btn btn-outline-success text-uppercase w-full flex items-center justify-center px-4 py-2 text-gray-700 hover:bg-red-600 hover:text-white rounded-lg transition-colors duration-200">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    @else
                    <!-- Jika pengguna belum login -->
                    <a class="btn btn-outline-success text-uppercase" href="{{ url('/login') }}">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
