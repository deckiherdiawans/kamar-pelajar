<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">

    <title>Kamar Pelajar - Hemat, Nyaman, Tambah Teman.</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('fontawesome-513/css/all.css') }}">

    <link rel="icon" type="image/jpg" href="{{ url('images/umum/logo.png') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrap-441/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/decki-custom.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    @include('layouts.parts.header')
    
    <main>
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="px-2 py-5 p-sm-5 bg-white rounded">
                        @yield('isi')
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.parts.footer')
    </main>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bootstrap-441/js/bootstrap.js') }}"></script>

    @yield('custom-script')
</body>
</html>