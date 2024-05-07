


<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  <nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="{{ route('blog') }}" class="btn btn-primary btn-lg" style="font-size: 20px !important;">مدونتي</a>
                    </div>
                    <div class="col-8 text-center">
                        <!-- Navigation links -->
                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li><a href="{{ route('blog') }}" class="btn">الرئيسية</a></li>
                            <li><a href="{{ route('service') }}" class="btn">خدماتنا</a></li>
                            <li><a href="{{ route('content') }}" class="btn">تواصل معنا</a></li>

                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        @auth
                        <span><a href="{{ route('dashboard.index') }}" class="btn btn-primary border-t-0">لوحة التحكم</a></span>
                        @else
                        <span><a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a></span>
                        @endauth
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>
