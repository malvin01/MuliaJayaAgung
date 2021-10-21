<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <title>Mulia Jaya Agung</title>

    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('shop/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    @include('layouts.user.shop.navbars.navbar')
</header>
<!-- Header part end-->

@yield('content')

<!--::footer_part start::-->
<footer class="footer_part">
    @include('layouts.user.shop.footers.footer')
</footer>
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="{{ asset('shop/js/jquery-1.12.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('shop/js/popper.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>
<!-- easing js -->
<script src="{{ asset('shop/js/jquery.magnific-popup.js') }}"></script>
<!-- swiper js -->
<script src="{{ asset('shop/js/swiper.min.js') }}"></script>
<!-- swiper js -->
<script src="{{ asset('shop/js/masonry.pkgd.js') }}"></script>
<!-- particles js -->
<script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.nice-select.min.js') }}"></script>
<!-- slick js -->
<script src="{{ asset('shop/js/slick.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('shop/js/waypoints.min.js') }}"></script>
<script src="{{ asset('shop/js/contact.js') }}"></script>
<script src="{{ asset('shop/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('shop/js/jquery.form.js') }}"></script>
<script src="{{ asset('shop/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('shop/js/mail-script.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('shop/js/mail-script.js') }}"></script>
</body>
</html>
