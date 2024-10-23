<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/frontend_client/assets/libraries/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend_client/assets/css/log.css">

    <link rel="stylesheet" href="/frontend_client/assets/css/main.css">

    <title>Dream Home</title>
</head>

<body>
    <header class="bg-white border-bottom">

        @include('client.partiale.navbar')
    </header>

    @yield('content')

    @include('client.partiale.footer')

</body>

<script src="/frontend_client/assets/libraries/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
