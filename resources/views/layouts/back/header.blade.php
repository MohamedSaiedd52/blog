<div class="header py-4">
    <div class="container">
      <div class="d-flex">
        <a class="header-brand" href="{{route('dashboard.index')}}">
          <span class="header-brand-img">Blog</span>
        </a>
        <div class="d-flex order-lg-2 ml-auto">


          <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                <!-- تحقق مما إذا كان المستخدم المسجل دخوله لديه صورة ملف شخصي -->
                @if (!empty(Auth::user()->img_file))
                    <img src="{{ asset('uploads/' . Auth::user()->img_file) }}" alt="User Image" class="avatar">
                @else
                    <!-- توفير صورة افتراضية في حال عدم وجود صورة -->
                    <img src="{{ asset('path/to/default-avatar.png') }}" alt="No img" class="avatar">
                @endif
                <span class="ml-2 d-none d-lg-block">
                    <span class="text-default">{{ Auth::user()->name }}</span>
                    <small class="text-muted d-block mt-1">{{ Auth::user()->email }}</small>
                </span>
            </a>


            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a class="dropdown-item" href="{{route('profile.edit')}}">
                <i class="dropdown-icon fe fe-user"></i>                             {{ __('الملف الشخصي') }}

              </a>
              {{-- <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-settings"></i> Settings
              </a> --}}



              <form method="POST" action="{{ route('logout') }}">
                @csrf


                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
                    <i class="dropdown-icon fe fe-log-out"></i>                     {{ __(' تسجيبل الخروج') }}

                  </a>
            </form>

            </div>
          </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
          <span class="header-toggler-icon"></span>
        </a>
      </div>
    </div>
  </div>
