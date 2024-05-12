@php
use App\Models\Comment;
use App\Models\CommentReply;

$comments = Comment::latest()->take(5)->get(); // Fetch latest 5 comments
@endphp

<div class="nav-header">
    <a href="{{ route('dashboard.index') }}" class="brand-logo">
        <div class="text-center brand" id="brandContainer">
            <span class="brand" style="color: #da4c1d; font-weight: bold; font-size: 24px;">
                BLOG SYSTEM
            </span>
        </div>
    </a>

    <div class="nav-control">
        <div class="hamburger" onclick="toggleBrandVisibility()">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<script>
    function toggleBrandVisibility() {
        var brandContainer = document.getElementById('brandContainer');
        var hamburger = document.querySelector('.hamburger');

        if (hamburger.classList.contains('active')) {
            brandContainer.style.display = 'block'; // Show the brand
        } else {
            brandContainer.style.display = 'none'; // Hide the brand
        }
    }
</script>


  <div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                    </div>
                </div>
               <ul class="navbar-nav header-right">
                    {{-- <li class="nav-item">
                        <div class="input-group search-area d-xl-inline-flex d-none">
                          <input type="text" class="form-control" placeholder="Search here" aria-label="Username" aria-describedby="header-search">
                          <span class="input-group-text" id="header-search">
                                <a href="javascript:void(0);">
                                    <i class="flaticon-381-search-2"></i>
                                </a>
                          </span>
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.4525 25.6682C11.0606 27.0357 12.4091 28 14.0006 28C15.5922 28 16.9407 27.0357 17.5488 25.6682C16.4266 25.7231 15.2596 25.76 14.0006 25.76C12.7418 25.76 11.5748 25.7231 10.4525 25.6682Z" fill="#3E4954"/>
                                <path d="M26.3531 19.74C24.8769 17.8785 22.3995 14.2195 22.3995 10.64C22.3995 7.09073 20.1192 3.89758 16.7995 2.72382C16.7592 1.21406 15.5183 0 14.0006 0C12.4819 0 11.2421 1.21406 11.2017 2.72382C7.88095 3.89758 5.60064 7.09073 5.60064 10.64C5.60064 14.2207 3.12434 17.8785 1.64706 19.74C1.15427 20.3616 1.00191 21.1825 1.24051 21.9363C1.47348 22.6721 2.05361 23.2422 2.79282 23.4595C4.08755 23.8415 6.20991 24.2715 9.44676 24.491C10.8479 24.5851 12.3543 24.64 14.0007 24.64C15.646 24.64 17.1524 24.5851 18.5535 24.491C21.7914 24.2715 23.9127 23.8415 25.2085 23.4595C25.9477 23.2422 26.5268 22.6722 26.7597 21.9363C26.9983 21.1825 26.8448 20.3616 26.3531 19.74Z" fill="#3E4954"/>
                            </svg>
                            <span class="badge light text-white bg-primary">{{ $comments->count() }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-start">
                            <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                                <ul class="timeline">
                                    <!-- Show comments -->
                                    @foreach($comments as $comment)
                                    <li>
                                        <div class="timeline-panel">
                                            <div class="media me-2">
                                                <img alt="image" width="50" src="{{asset('admin/img/avatar.jpg')}}">
                                                <form action="{{ route('comments.delete', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Are you sure you want to delete this comment?')">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            @auth
                                                <p>{{ Auth::user()->name }}</p>
                                            @endauth
                                            <div class="media-body">
                                                <h6 class="mb-1">تعليق جديد</h6>
                                                <p>{{ $comment->comment }}</p>
                                                <small class="d-block">{{ $comment->created_at->format('d M Y - H:i A') }}</small>
                                                @if($comment->approved)
                                                    <small class="text-success">Approved</small>
                                                @else
                                                    <small class="text-warning">Pending Approval</small>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <!-- End of comments -->
                                </ul>
                            </div>
                            <a class="all-notification" href="javascript:void(0)"> عرض كل الاشعارات  <i class="ti-arrow-right"></i></a>
                        </div>

                    </li>



























                    {{-- <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell bell-link" href="javascript:void(0)">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.4605 3.84888H5.31688C4.64748 3.84961 4.00571 4.11586 3.53237 4.58919C3.05903 5.06253 2.79279 5.7043 2.79205 6.3737V18.1562C2.79279 18.8256 3.05903 19.4674 3.53237 19.9407C4.00571 20.4141 4.64748 20.6803 5.31688 20.6811C5.54005 20.6812 5.75404 20.7699 5.91184 20.9277C6.06964 21.0855 6.15836 21.2995 6.15849 21.5227V23.3168C6.15849 23.6215 6.24118 23.9204 6.39774 24.1818C6.5543 24.4431 6.77886 24.6571 7.04747 24.8009C7.31608 24.9446 7.61867 25.0128 7.92298 24.9981C8.22729 24.9834 8.52189 24.8863 8.77539 24.7173L14.6173 20.8224C14.7554 20.7299 14.918 20.6807 15.0842 20.6811H19.187C19.7383 20.68 20.2743 20.4994 20.7137 20.1664C21.1531 19.8335 21.4721 19.3664 21.6222 18.8359L24.8966 7.05011C24.9999 6.67481 25.0152 6.28074 24.9414 5.89856C24.8675 5.51637 24.7064 5.15639 24.4707 4.84663C24.235 4.53687 23.931 4.28568 23.5823 4.11263C23.2336 3.93957 22.8497 3.84931 22.4605 3.84888ZM23.2733 6.60304L20.0006 18.3847C19.95 18.5614 19.8432 18.7168 19.6964 18.8275C19.5496 18.9381 19.3708 18.9979 19.187 18.9978H15.0842C14.5856 18.9972 14.0981 19.1448 13.6837 19.4219L7.84171 23.3168V21.5227C7.84097 20.8533 7.57473 20.2115 7.10139 19.7382C6.62805 19.2648 5.98628 18.9986 5.31688 18.9978C5.09371 18.9977 4.87972 18.909 4.72192 18.7512C4.56412 18.5934 4.4754 18.3794 4.47527 18.1562V6.3737C4.4754 6.15054 4.56412 5.93655 4.72192 5.77874C4.87972 5.62094 5.09371 5.53223 5.31688 5.5321H22.4605C22.5905 5.53243 22.7188 5.56277 22.8353 5.62076C22.9517 5.67875 23.0532 5.76283 23.1318 5.86646C23.2105 5.97008 23.2642 6.09045 23.2887 6.21821C23.3132 6.34597 23.308 6.47766 23.2733 6.60304Z" fill="#3E4954"/>
                                <path d="M7.84173 11.4233H12.0498C12.273 11.4233 12.4871 11.3347 12.6449 11.1768C12.8027 11.019 12.8914 10.8049 12.8914 10.5817C12.8914 10.3585 12.8027 10.1444 12.6449 9.98661C12.4871 9.82878 12.273 9.74011 12.0498 9.74011H7.84173C7.61852 9.74011 7.40446 9.82878 7.24662 9.98661C7.08879 10.1444 7.00012 10.3585 7.00012 10.5817C7.00012 10.8049 7.08879 11.019 7.24662 11.1768C7.40446 11.3347 7.61852 11.4233 7.84173 11.4233Z" fill="#3E4954"/>
                                <path d="M15.4162 13.1066H7.84173C7.61852 13.1066 7.40446 13.1952 7.24662 13.3531C7.08879 13.5109 7.00012 13.725 7.00012 13.9482C7.00012 14.1714 7.08879 14.3855 7.24662 14.5433C7.40446 14.7011 7.61852 14.7898 7.84173 14.7898H15.4162C15.6394 14.7898 15.8535 14.7011 16.0113 14.5433C16.1692 14.3855 16.2578 14.1714 16.2578 13.9482C16.2578 13.725 16.1692 13.5109 16.0113 13.3531C15.8535 13.1952 15.6394 13.1066 15.4162 13.1066Z" fill="#3E4954"/>
                            </svg>
                            <span class="badge light text-white bg-primary">3</span>
                        </a>
                    </li> --}}



                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                            <div class="header-info">
                                <span class="text-black"><strong>
                                    @if (Auth::check())
                                    {{ Auth::user()->name }}


                                </strong></span>
                                <p class="fs-12 mb-0">{{ Auth::user()->email }}</p>
                            </div>

                            @if (!empty(Auth::user()->img_file))
                            <img src="{{ asset('uploads/' . Auth::user()->img_file) }}" alt="User Image" class="avatar"  width="20">
                        @else
                            <!-- توفير صورة افتراضية في حال عدم وجود صورة -->
                            <img src="{{ asset('admin/img/avatar.jpg') }}" alt="No img" class="avatar">
                        @endif

                        @endif

                        </a>
                        <div class="dropdown-menu dropdown-menu-start">
                            <a  href="{{route('profile.edit')}}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ms-2">{{ __('الملف الشخصي') }} </span>
                            </a>

                            {{-- <a href="email-inbox.html" class="dropdown-item ai-icon">
                                <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="ms-2">Inbox </span>
                            </a> --}}




                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout')}}" class="dropdown-item ai-icon" onclick="event.preventDefault();this.closest('form').submit();">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ms-2">    {{ __(' تسجيبل الخروج') }} </span>
                                </a>


                            </form>


                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
