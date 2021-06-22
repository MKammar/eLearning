<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   <!--fonts-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link href="{{ asset('css/Student/css/argon.css?v=1.2.0') }}" rel="stylesheet">

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>
<body>
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
              <img src="/Images/e-learning-logo-2.png" class="navbar-brand-img" alt="e-learning logo" style="height: 100%; width:100px">
            </a>
          </div>
          <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
              <!-- Nav items -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="/student/dashboard">
                    <i class="fa fa-tachometer"></i>
                    <span class="nav-link-text">Dashboard</span>
                  </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link sub" id="sub" href="#">
                      <i class="fa fa-book"></i>
                      <span class="nav-link-text">Subjects</span>
                    </a>
                        <ul class="nav-sub">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Math') }}">Math</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Physics') }}">Physics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Chemistry') }}">Chemistry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Biology') }}">Biology</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Englishd') }}">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/Subject/Arabic') }}">Arabic</a>
                            </li>
                        </ul>
                  </li>

                <li class="nav-item">
                  <a class="nav-link" href="/student/assignments">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-link-text">Assigments</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/student/schedule">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-link-text">Schedule</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/student/activity">
                    <i class="fa fa-calendar"></i>
                    <span class="nav-link-text">Activity</span>
                  </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student/certificates">
                      <i class="fa fa-calendar"></i>
                      <span class="nav-link-text">Certificates</span>
                    </a>

                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="/student/profile">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text">Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="examples/tables.html">
                    <i class="fa fa-sign-out"></i>
                    <span class="nav-link-text">Logout</span>
                  </a>
                </li>
              </ul>

            </div>
          </div>
        </div>
      </nav>
      <div class="main-content" id="panel">

        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Search form -->
                <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </form>

                <ul class="navbar-nav align-items-center  ml-md-auto ">
                    <li class="nav-item d-xl-none">
                      <!-- Sidenav toggler -->
                      <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-toggle="collapse" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                          <i class="sidenav-toggler-line"></i>
                          <i class="sidenav-toggler-line"></i>
                          <i class="sidenav-toggler-line"></i>
                        </div>

                      </div>

                    </li>
                    <li class="nav-item d-sm-none">
                      <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell" aria-hidden="true">   {{ count(auth()->user()->unreadnotifications) }}</i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                          <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{ count(auth()->user()->unreadnotifications) }}</strong> notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            @foreach (auth()->user()->unreadnotifications as $notification)


                          <a href="#" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm"></h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>{{ $notification->created_at }}</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">{{ $notification->data['data'] }}</p>
                                <?php $notification->markAsRead() ?>
                              </div>

                            </div>

                          </a>
                          @endforeach




                        </div>
                        <!-- View all -->
                        <a href="/viewnotification" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                      </div>
                    </li>

                  </ul>
                  <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                    <li class="nav-item dropdown">
                      <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                          <span class="avatar avatar-sm rounded-circle">
                            <img alt="#" src="{{ asset('upload/images/'.Auth::user()->imageUser)}}">
                          </span>
                          <div class="media-body  ml-2  d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->firstName }}</span>
                          </div>
                        </div>
                      </a>
                      <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                          <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-single-02"></i>
                          <span>My profile</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-settings-gear-65"></i>
                          <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-calendar-grid-58"></i>
                          <span>Activity</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                          <i class="ni ni-support-16"></i>
                          <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a  class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <i class="ni ni-user-run"></i>
                          <span>Logout</span>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>
                      </div>
                    </li>
                  </ul>
            </div>
            </div>
        </nav>

        @if ($assgs == null)
        <div id="noassg">
            <h3>No Assignments Yet!</h3>

        </div>
        @else

        <div class="row">
            <div class="col align-items-center">
                <h1 class="col-sm-4 offset-sm-4 text-center mediatitle">Assignments</h1>
            </div>
        </div>
            @foreach ($assgs as $assg)


                <div class="media" id="assgmedia">
                    <img src="/Images/banner-bg.png" class="mr-3" alt="#">
                    <div class="media-body">
                      <h5 class="mt-0" style="font-size: 20px">{{ $assg->title }}</h5>
                      @if ($assg->isSubmitted == 0)

                  <p class="col-3 text-center text-danger border border-danger" style="font-style: oblique">
                    <span>
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </span>not submitted</p>
                      @else

                          <p class="col-3 text-center text-success border border-success">
                            <span>
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </span>Completed</p>
                      @endif

                    </div>

                    @if ($assg->isSubmitted == 0)
                        @if ($assg->startDatetime <= Carbon\Carbon::now()->setTimezone('Asia/Beirut') && $assg->endDatetime >= Carbon\Carbon::now()->setTimezone('Asia/Beirut'))
                            <a class="mr-auto btn btn-link" id="btnmedia" href="{{ url('/student/ViewAssignment/'.$assg->a_id) }}">Take Assignment</a>
                        @elseif($assg->startDatetime > Carbon\Carbon::now()->setTimezone('Asia/Beirut'))
                            <p>{{ Carbon\Carbon::now()->setTimezone('Asia/Beirut') }}</p>

                        @else
                        <p class="border border-danger">This assignment ended at {{ $assg->endDatetime }}</p>
                        @endif

                    @else
                    <a class="mr-auto btn btn-link" id="btnmedia" href="{{ url('/student/ViewAssignmentSolution/'.$assg->a_id) }}">Review</a>
                    @endif
                </div>


            @endforeach
        @endif

      </div>
    <script>
    $('.sub').click(function(){
        $('.nav-sub').toggleClass("show");
    });
    </script>
</body>
</html>
