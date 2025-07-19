<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ $aplikasi->title_header }}</title>
    <!-- Favicons -->
    <link rel="icon" href="{{ URL::asset('build/dist/img/favicon.ico') }}" type="image/x-icon">
    @include('layouts.dist-head-css')
</head>

<body>
    <div class="container-fluid p-0 dashboard-wrapper">

        @include('layouts.dist-top-sidebar')

        @yield('content')

        @include('layouts.dist-footer')
    </div>

    @include('layouts.dist-vendor-scripts')
</body>

</html>
