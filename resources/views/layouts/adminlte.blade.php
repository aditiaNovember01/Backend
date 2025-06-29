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
    <!-- JS AdminLTE -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <!-- Tambahkan JS lain jika perlu -->
</body>
</html> 