<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/guest.css ') }}">
    <title>Document</title>

    @yield('link')

</head>

<body>

    @include('partials.upper_NavBar')

    <div>
        @yield('container')
    </div>

    @include('partials.footer')

    <div>
        @yield('js')
    </div>

</body>

</html>
