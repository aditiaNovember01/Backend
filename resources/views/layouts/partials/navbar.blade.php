<!-- Navbar AdminLTE -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <!-- Tambahkan link lain di sini -->
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown, Notifications, dll bisa ditambah di sini -->
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->profile_photo ?? false)
                        <img src="{{ asset('storage/profile_photos/' . Auth::user()->profile_photo) }}" alt="Foto Profil"
                            class="rounded-circle mr-2" width="32" height="32">
                    @else
                        <i class="fas fa-user mr-2"></i>
                    @endif
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">Profil</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </div>
            </li>
        @endauth
    </ul>
</nav>
