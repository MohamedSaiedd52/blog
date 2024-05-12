<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
   @include('layouts.back.css')
@yield('css')
   <!-- CSS only -->
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">


                @yield('content')





        </div>










          <!-- Required vendors -->
          <script src="{{ url('/') }}/assets/vendor/global/global.min.js"></script>
          <script src="{{ url('/') }}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
          <script src="{{ url('/') }}/assets/vendor/chart-js/chart.bundle.min.js"></script>
          <script src="{{ url('/') }}/assets/vendor/owl-carousel/owl.carousel.js"></script>

          <!-- Chart piety plugin files -->
          <script src="{{ url('/') }}/assets/vendor/peity/jquery.peity.min.js"></script>

          <!-- Apex Chart -->
          <script src="{{ url('/') }}/assets/vendor/apexchart/apexchart.js"></script>

          <!-- Dashboard 1 -->
          <script src="{{ url('/') }}/assets/js/dashboard/dashboard-1.js"></script>
              <script src="{{ url('/') }}/assets/js/custom.min.js"></script>
          <script src="{{ url('/') }}/assets/js/deznav-init.js"></script>

              <!-- Datatable -->
              <script src="{{ url('/') }}/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
              <script src="{{ url('/') }}/assets/js/plugins-init/datatables.init.js"></script>

          <script>
              function carouselReview(){
                  /*  testimonial one function by = owl.carousel.js */
                  function checkDirection() {
                      var htmlClassName = document.getElementsByTagName('html')[0].getAttribute('class');
                      if(htmlClassName == 'rtl') {
                          return true;
                      } else {
                          return false;

                      }
                  }

                  jQuery('.testimonial-one').owlCarousel({
                      loop:true,
                      autoplay:true,
                      margin:30,
                      nav:false,
                      dots: false,
                      rtl: checkDirection(),
                      left:true,
                      navText: ['', ''],
                      responsive:{
                          0:{
                              items:1
                          },
                          1200:{
                              items:2
                          },
                          1600:{
                              items:3
                          }
                      }
                  })
              }
              jQuery(window).on('load',function(){
                  setTimeout(function(){
                      carouselReview();
                  }, 1000);
              });
          </script>

          @yield('scripts')


        <script>
            // Automatically close the alert after 5 seconds
            $(document).ready(function() {
                $(".alert").delay(4000).fadeOut("slow");
            });
        </script>
    </body>
</html>
