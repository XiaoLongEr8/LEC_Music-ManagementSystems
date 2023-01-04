<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/layouts/guest.css">
    <title>Document</title>

    @yield('link')

</head>

<body>

    @include('partials.upper_NavBar')

    <div>
        @yield('container')
    </div>

    @include('partials.footer')

</body>

</html>
