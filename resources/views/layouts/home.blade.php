<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AdminLTE Laravel</title>
    <!-- CSS AdminLTE -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tambahkan CSS lain jika perlu -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layouts.partials.footer')
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- JS AdminLTE -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Tambahkan JS lain jika perlu -->
    <!-- Modal Edit Profil (besar, dengan tab) -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Pengaturan Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="profileTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                aria-controls="edit" aria-selected="true">Edit Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                                aria-controls="password" aria-selected="false">Reset Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="photo-tab" data-toggle="tab" href="#photo" role="tab"
                                aria-controls="photo" aria-selected="false">Foto Profil</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3" id="profileTabContent">
                        <!-- Tab Edit Profil -->
                        <div class="tab-pane fade show active" id="edit" role="tabpanel"
                            aria-labelledby="edit-tab">
                            <form id="profileForm" action="{{ route('profile') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="profileName">Nama</label>
                                    <input type="text" class="form-control" id="profileName" name="name"
                                        value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="profileEmail">Email</label>
                                    <input type="email" class="form-control" id="profileEmail" name="email"
                                        value="{{ Auth::user()->email }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <!-- Tab Reset Password -->
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <form id="passwordForm" action="{{ route('profile.password') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="currentPassword">Password Lama</label>
                                    <input type="password" class="form-control" id="currentPassword"
                                        name="current_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Password Baru</label>
                                    <input type="password" class="form-control" id="newPassword" name="new_password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="new_password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-warning">Reset Password</button>
                            </form>
                        </div>
                        <!-- Tab Foto Profil -->
                        <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                            <form id="photoForm" action="{{ route('profile.photo') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="profilePhoto">Upload Foto Profil</label>
                                    <input type="file" class="form-control-file" id="profilePhoto" name="photo"
                                        accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
