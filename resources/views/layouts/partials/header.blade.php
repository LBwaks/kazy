
 <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4">
      <ul class="custom-scrollbar">
        <li>
          <ul class="social">
            <li><a href="#" class="icons-sm fb-ic"><i class="fab fa-facebook"> </i></a></li>
            <li><a href="#" class="icons-sm pin-ic"><i class="fab fa-pinterest"> </i></a></li>
            <li><a href="#" class="icons-sm gplus-ic"><i class="fab fa-google-plus"> </i></a></li>
            <li><a href="#" class="icons-sm tw-ic"><i class="fab fa-twitter"> </i></a></li>
          </ul>
        </li>



        <li>
          <ul class="collapsible collapsible-accordion">
            <li><a href="{{ url('/home') }}" class="collapsible-header waves-effect" ><i class="fas fa-home"></i>Home</a></li>
            <li><a href="{{ route('job.index') }}" class="collapsible-header waves-effect" ><i class="fas fa-briefcase"></i>Jobs</a></li>
            <li><a href="{{ route('job.create') }}" class="collapsible-header waves-effect"><i class="fas fa-edit"></i>Post Job</a></li>


            @if (Route::has('login'))
            @auth
            @if(Auth()->user()->user_type ==='recruiter' ||Auth()->user()->user_type ==='both' )
            <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-file"></i>
                My Jobs<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                    <li><a href="{{ route('job.myjobs') }}" class="waves-effect">My Jobs</a>
                    </li>
                  <li><a href="{{ route('approved-jobs') }}" class="waves-effect">Approved Jobs</a>
                  </li>
                  <li><a href="{{ route('expired-jobs') }}" class="waves-effect">Expired  Jobs</a>
                  </li>


                </ul>
              </div>
            </li>
            @else
            <li><a class="collapsible-header waves-effect arrow-r"><i class="far fa-file"></i>
                Job Applications<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="{{ route('approved') }}" class="waves-effect">Approved Applications</a>
                  </li>
                  <li><a href="{{ route('pending') }}" class="waves-effect">Pending  Applications</a>
                  </li>
                  <li><a href="{{ route('failed') }}" class="waves-effect">Failed   Applications</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif


            @endauth
            @endif

            <li><a class="collapsible-header waves-effect" href="#"><i class="fas fa-info-circle"></i>About Us</a></li>
            <li><a class="collapsible-header waves-effect" href="{{ route('contact') }}"><i class="fas fa-envelope"></i>Contact Us</a></li>
            @auth
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
             @endauth
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        <p><a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name') }}
        </a></p>
      </div>
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item">
          <a href="{{ url('/home') }}" class="nav-link"><i class="fa fa-home"></i> <span class="clearfix d-none d-sm-inline-block">Home</span></a>
        </li>
        <li class="nav-item">
            <a href="{{ route('job.index') }}" class="nav-link"><i class="fa fa-briefcase"></i> <span class="clearfix d-none d-sm-inline-block">Jobs</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('job.create') }}" class="nav-link"><i class="fa fa-edit"></i> <span class="clearfix d-none d-sm-inline-block">Post Jobs</span></a>
          </li>

          @if (Route::has('login'))
            @auth


            @endauth
            @endif

            @guest

        <li class="nav-item dropdown">
          {{-- <a class="nav-link"><i class="fa fa-user-circle"></i></a> --}}
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle"></i></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <div class="arrow_box_right">

            <div class="dropdown-divider"></div>

                <a href="{{ route('login') }}" class="dropdown-item">
                  <i class="fas fa-user-edit mr-2"></i>Login

                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="dropdown-item">
                  <i class="fas fa-briefcase mr-2"></i>Register
                </a>
            </div>

        </div>
                @endif
                @else

        </li>

          {{-- <li class="nav-item dropdown" id="markAsReads" onclick="markNotificationAsReadd()">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i><span class="clearfix d-none d-sm-inline-block">Notifications</span>
              <span class="badge badge-pill badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
               <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
             @forelse(auth()->user()->unreadNotifications as $notification)
                <a href="#">{{ $notification->data['bidBy'] }} bids your job</a>
                @empty
                  <a href="#">You have No Notifications</a>

                @endforelse

              </a>

          </li> --}}
          @if(count(auth()->user()->unreadNotifications))
          <li class="nav-item dropdown" id="markasread" onclick="markNotificationAsRead()">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell"></i> <span class="badge badge-primary">{{ count(auth()->user()->unreadNotifications) }}</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <div class="arrow_box_right">
                  <div class="user-panel mb-2 pb-2  d-flex">
                <div class="">


                                <img src="{{ asset('/images/profile/'.Auth::user()->avatar) }}" alt="{{ Str::limit(Auth::user()->profile_image) }}" height="35" width="35" class="img-circle">
                </div>
                <div class="info">
                  <span href="#" class="d-block">{{ Auth::user()->name }}</span>
                </div>
              </div>
              <div class="dropdown-divider"></div>


              @foreach (auth()->user()->unreadNotifications as $notification)
<a href="
{{ route('job.show',$notification->data['job']['slug']) }}
">{{strip_tags(Str::limit($notification->data['job']['title']),20)}} approved</a>
              @endforeach


                 </div>

            </div>
          </li>
          @endif

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            @if(Auth::user()->avatar)
            <img src="{{ asset('/images/profile/'.Auth::user()->avatar) }}" alt="{{auth::user()->name}}" height="35" width="35" class="img-circle">
            @else
            {{auth::user()->name}}
            @endif

          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <div class="arrow_box_right">
                <div class="user-panel mb-2 pb-2  d-flex">
              <div class="">


                              <img src="{{ asset('/images/profile/'.Auth::user()->avatar) }}" alt="{{ Str::limit(Auth::user()->profile_image) }}" height="35" width="35" class="img-circle">
              </div>
              <div class="info">
                <span href="#" class="d-block">{{ Auth::user()->name }}</span>
              </div>
            </div>
            <div class="dropdown-divider"></div>

                <a href="{{ route('user.myprofile') }}" class="dropdown-item">
                  <i class="fas fa-user-edit mr-2"></i>Profile

                </a>
                @if(Auth()->user()->user_type ==='recruiter' ||Auth()->user()->user_type ==='both' )
                <a href="{{ route('job.myjobs') }}" class="dropdown-item">
                    <i class="fas fa-briefcase mr-2"></i>My Jobs

                  </a>
                  @else
                  <a href="{{ route('pending') }}" class="dropdown-item">
                    <i class="fas fa-briefcase mr-2"></i>Pending Applications

                  </a>
                  <a href="{{route('approved')}}" class="dropdown-item">
                      <i class="fas fa-briefcase mr-2"></i>Approved Applications

                    </a>
                    <a href="{{ route('failed') }}" class="dropdown-item">
                      <i class="fas fa-briefcase mr-2"></i>Failed Applications
                    </a>
                @endif



                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-power-off mr-2"></i> {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>



               </div>

          </div>
        </li>
        @endguest
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>
