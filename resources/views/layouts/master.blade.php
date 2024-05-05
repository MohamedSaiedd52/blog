<!doctype html>
<html lang="en" dir="rtl">
  <head>
    {{-- Start CSS  --}}



   @include('layouts.back.css')

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    {{-- End CSS  --}}
<style>
    * {

  font-family: "Cairo", sans-serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  font-variation-settings:
    "slnt" 0;
  margin: 0;      /* يزيل الهوامش الافتراضية */
  padding: 0;     /* يزيل الحشو الافتراضي */
    }






</style>

    @yield('css')
    <x-head.tinymce-config/>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">



        {{-- Start Header --}}
@include('layouts.back.header')


{{-- End Header --}}




  {{-- Start NAvbar --}}


@include('layouts.back.navbar')
  {{-- End Navbar --}}

        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h6 class="page-title">
               @yield('page-title')
              </h6>
            </div>
            <div class="row">
             @yield('content')
            </div>
          </div>
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


  </body>
</html>
