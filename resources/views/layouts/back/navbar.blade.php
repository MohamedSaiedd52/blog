
  <div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">


                <li><a href="{{ route('dashboard.index') }}" class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>

                    <span class="nav-text">الرئيسية</span>
                </a>
            </li>

            @can('post-index')

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">المقالات</span>
                </a>
                <ul aria-expanded="false">
                    @can('post-create')

                    <li><a href="{{ route('posts.create') }}">اضافه مقالة</a></li>
                    @endcan

                    <li><a href="{{ route('posts.index') }}"> كل المقالات</a></li>

                </ul>
            </li>

            @endcan

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">الفئات</span>
                </a>
                <ul aria-expanded="false">
                    @can('category-index')

                    <li><a href="{{route('categories.index') }}"> عرض الفئات</a></li>
                    @endcan

@can('tag-index')

                    <li><a href="{{route('tags.index') }}"> عرض التصنيف</a></li>
                    @endcan


                </ul>
            </li>

@can('user-index')

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">المستخدمين</span>
                </a>
                <ul aria-expanded="false">
                    <li>                    <a href="{{ route('Showuser') }}" >   كل المستخدمين</a>
                    </li>
                    @can('user-create')
                    <li> <a href="{{ route('Adduser') }}" >  اضافه مستخدم</a></li>

                    @endcan


                </ul>
            </li>

            @endcan
@can('role-list')

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-network"></i>
                <span class="nav-text">الصلاحيات</span>
            </a>
            <ul aria-expanded="false">
                <li>                    <a href="{{ route('roles.index') }}" >   كل الصلاحيات</a>
                </li>
                @can('role-create')

                <li> <a href="{{ route('roles.create') }}" >  اضافه صلاحيه</a></li>

                @endcan

            </ul>
        </li>
        @endcan

        <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-network"></i>
            <span class="nav-text">التعليقات</span>
        </a>
        <ul aria-expanded="false">
            <li>                    <a href="{{ route('comments.index') }}" >   كل التعليقات</a>
            </li>


        </ul>
    </li>

            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Pages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="page-register.html">Register</a></li>
                    <li><a href="page-login.html">Login</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                        <ul aria-expanded="false">
                            <li><a href="page-error-400.html">Error 400</a></li>
                            <li><a href="page-error-403.html">Error 403</a></li>
                            <li><a href="page-error-404.html">Error 404</a></li>
                            <li><a href="page-error-500.html">Error 500</a></li>
                            <li><a href="page-error-503.html">Error 503</a></li>
                        </ul>
                    </li>
                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                </ul>
            </li> --}}
        </ul>


    </div>
</div>
