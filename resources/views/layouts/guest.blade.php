<!DOCTYPE html>
<html>
<head>
    <title>CryptalADS - Advertising Made Simple</title>

    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="Cryptalads">
    <meta name="keywords" content="Advertising,Ad Campaign,Campaign Management,Ad Manager">
    <meta name="description" content="Create and publish ads using our platform, or show our ads on your site">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://cryptalads.com/">
    <meta property="og:title" content="Cryptalads - Advertising Made Simple">
    <meta property="og:description" content="Create and publish ads using our platform, or show our ads on your site">
    <!-- <meta property="og:image" content="https://"> -->

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://cryptalads.com/">
    <meta property="twitter:title" content="Cryptalads - Advertising Made Simple">
    <meta property="twitter:description" content="Create and publish ads using our platform, or show our ads on your site">
    <!-- <meta property="twitter:image" content="https://"> -->

    @yield('styling')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div>
        <main>
            @yield('content')
        </main>
    </div>

    <script src="https://kit.fontawesome.com/07a9797915.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    @yield('scripts')
</body>