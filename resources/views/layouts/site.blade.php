<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="megakit,business,company,agency,multipurpose,modern,bootstrap4">

  <meta name="author" content="themefisher.com">

  <title>@yield('title') Blog</title>

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{url('/')}}/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{url('/')}}/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="{{url('/')}}/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="{{url('/')}}/plugins/magnific-popup/dist/magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{url('/')}}/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="{{url('/')}}/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{url('/')}}/css/style.css">

</head>

<body>


<!-- Header Start -->

@include('layouts.front.header')
<!-- Header Close -->

<div class="main-wrapper ">

    @yield('content')
<!-- footer Start -->
@include('layouts.front.footer')

    </div>

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{url('/')}}/plugins/jquery/jquery.js"></script>
    <script src="{{url('/')}}/js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{url('/')}}/plugins/bootstrap/js/popper.js"></script>
    <script src="{{url('/')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="{{url('/')}}/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="{{url('/')}}/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="{{url('/')}}/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="{{url('/')}}/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="{{url('/')}}/plugins/google-map/map.js"></script>
    <script src="{{url('/')}}/https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="{{url('/')}}/js/script.js"></script>
@yield('scripts')
  </body>
  </html>
