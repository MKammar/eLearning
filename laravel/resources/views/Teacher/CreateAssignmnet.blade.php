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
                <a class="navbar-brand" href="#">
                  <img src="/Images/e-learning-logo-2.png" class="navbar-brand-img" alt="e-learning logo" style="height: 100%; width:100px">
                </a>
              </div>
              <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                  <!-- Nav items -->
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link {{'/teacher/dashboard'==request()->path() ? 'active' : ''}}" href="/teacher/dashboard">
                        <i class="fa fa-tachometer"></i>
                        <span class="nav-link-text">Dashboard</span>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="/teacher/assignments">
                        <i class="fa fa-tasks"></i>
                        <span class="nav-link-text">Assigments</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/teacher/activity">
                        <i class="fa fa-calendar"></i>
                        <span class="nav-link-text">Activity</span>
                      </a>

                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/teacher/schedule">
                        <i class="fa fa-calendar"></i>
                        <span class="nav-link-text">Schedule</span>
                      </a>

                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/teacher/profile">
                        <i class="fa fa-user-circle"></i>
                        <span class="nav-link-text">Profile</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/teacher/workexperience">
                        <i class="fa fa-file-word-o" aria-hidden="true"></i>
                        <span class="nav-link-text">Work Experience</span>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teacher/feedbacks">
                          <i class="fa fa-file-word-o" aria-hidden="true"></i>
                          <span class="nav-link-text">Feedbacks</span>
                        </a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/livemeet">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                          <span class="nav-link-text">Live Meeting</span>
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
                        <span aria-hidden="true">??</span>
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
                            <i class="fa fa-bell" aria-hidden="true">{{ count(auth()->user()->unreadnotifications) }}</i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                              <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{ count(auth()->user()->unreadnotifications) }}</strong> notifications.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                @foreach (auth()->user()->unreadnotifications as $notification)
                              <a href="#!" class="list-group-item list-group-item-action">
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
                            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
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
                            <a href="/student/profile" class="dropdown-item">
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
                <div class="container">
                    <form method="post" action="/teacher/addassignment">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Student Name</label>
                          <select class="form-control" id="s_id" name="s_id">
                              @foreach ($students as $student)
                                <option selected disabled hidden>choose student</option>
                                <option value="{{ $student->id }}">{{ $student->firstName }} {{ $student->lastName }}</option>
                              @endforeach


                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect2">Start Date and Time</label>
                          <input type="datetime-local" class="form-control" name="startDatetime" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">End Date and Time</label>
                            <input type="datetime-local" class="form-control" name="endDatetime" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Next" class="btn btn-primary">
                        </div>
                      </form>

                </div>

          </div>

</body>
</html>



