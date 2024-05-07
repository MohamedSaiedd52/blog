<!doctype html>
<html lang="en" dir="rtl">
  <head>
    {{-- Start CSS  --}}



   @include('layouts.back.css')

<!-- CSS only -->


    @yield('css')
    <x-head.tinymce-config/>
  </head>


  <body class="">


 <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->


        {{-- Start Header --}}
@include('layouts.back.header')


{{-- End Header --}}




  {{-- Start NAvbar --}}


@include('layouts.back.navbar')
  {{-- End Navbar --}}


    <div class="content-body" style="min-height: 1100px;">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    @yield('intitle')
                    
                </ol>
            </div>


             @yield('content')
  </div>
    </div>

{{-- Start Footer  --}}

@include('layouts.back.footer')

{{-- End Footer --}}



    </div>

@yield('scripts')
<script>
    // Automatically close the alert after 5 seconds
    $(document).ready(function() {
        $(".alert").delay(4000).fadeOut("slow");
    });
</script>
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
  </body>
</html>
