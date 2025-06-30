@php $user = Auth::user(); @endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body class="hold-transition">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-3">Profil Saya</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-header">Edit Profil</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('profile') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
