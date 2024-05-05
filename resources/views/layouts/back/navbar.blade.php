<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 ml-auto">

        </div>
        <div class="col-lg order-lg-center  ">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="{{ route('dashboard.index') }}" class="nav-link"><i class="fe fe-home"></i> الرئيسية</a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(1)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i> المقالات</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('posts.create') }}" class="dropdown-item ">  اضافه مقاله</a>
                <a href="{{ route('posts.index') }}" class="dropdown-item ">   كل المقالات</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="javascript:void(1)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> الفئات</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{route('categories.index') }}" class="dropdown-item ">   كل الفئات</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a href="javascript:void(1)" class="nav-link" data-toggle="dropdown"><i class="fe fe-user"></i> المستخدمين</a>
              <div class="dropdown-menu dropdown-menu-arrow">
                <a href="{{ route('Showuser') }}" class="dropdown-item">   كل المستخدمين</a>
                <a href="{{ route('Adduser') }}" class="dropdown-item ">  اضافه مستخدم</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
