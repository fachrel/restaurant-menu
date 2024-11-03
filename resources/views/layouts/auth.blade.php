<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{asset('mazer/assets/css/pages/auth.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{asset('mazer/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/iconly/bold.css')}}" media="print" onload="this.media='all'">

    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('mazer/assets/css/app.css')}}">
</head>

<body>
    <div id="auth">
        @yield('content')
    </div>
</body>

</html>