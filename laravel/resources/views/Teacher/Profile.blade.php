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
                  <a class="nav-link" href="/teacher/dashboard">
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
                  <a class="nav-link active" href="/teacher/profile">
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
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-body">
    <h4 class="text-center"> My Profile</h4>

     <x-alert />




    <br>
    <form action="/profile/updateteacher" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row"  style="background:url(../../../Images/Backimage.png) ;">

            <div class="col-md-4">


                <img src="{{ asset('upload/images/'.Auth::user()->imageUser)}}" class="w-60" width="200px" height="200px" id="profileimage">
                <input type="file" name="imageUser" id="actual-btn" class="form-control" hidden/>
                <label class="ml-2" id="actual-label" for="actual-btn">Choose Profile image</label>
                <a  href="{{url('/profile/deleteteacher')}}"  class="btn btn-danger ml-2" >Remove Profile</a>
        </div>
        <div class="col-md-4 ml-auto align-self-center" id="Hellomessage">
            <h2>Hello {{ Auth::user()->firstName }}</h2>
            <p>This is your profile where you can manage your info.

            </p>
        </div>




    </div>

    <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label for="firstName">firstname</label>
            <input type="text" name="firstname" class="form-control" value="{{Auth::user()->firstName}}">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="firstName">lastname</label>
            <input type="text" name="lastname" class="form-control" value="{{Auth::user()->lastName}}">
            </div>
            </div>
            <br>
            <div class="col-md-4">
            <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
            <label for="phone">phone</label>
            <input type="tel" name="phone" class="form-control" value="{{Auth::user()->phone}}">
            </div>
            </div>




    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="education">Education  </label>
                <input type="text" name="education" class="form-control" value="{{Auth::user()->teacher['education']}}">
            </div>
        </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="university">University</label>
                    <input type="text" name="university" class="form-control" value="{{Auth::user()->teacher['university']}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{Auth::user()->teacher['address']}}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject">
                        <option value="{{ Auth::user()->teacher['subject'] }}" selected disabled hidden>{{ Auth::user()->teacher['subject'] }}</option>
                        <option value="Math">Math</option>
                        <option value="Phisics">Physics</option>
                        <option value="Chemistry">Chemistry</option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Biology">Biology</option>
                      </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="teachingLang">Teaching Language</label>
                    <select name="teachingLang" id="teachingLang">
                        <option value="{{ Auth::user()->teacher['teachingLang'] }}" selected disabled hidden>{{ Auth::user()->teacher['teachingLang'] }}</option>
                        <option value="English">English</option>
                        <option value="Arabic">Arabic</option>
                        <option value="French">French</option>
                      </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="teachingGrade">Teaching Grade</label>
                    <select name="teachingGrade" id="teachingGrade">
                        <option value="{{ Auth::user()->teacher['teachingGrade'] }}" selected disabled hidden>{{ Auth::user()->teacher['teachingGrade'] }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                      </select>
                </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" name="description" class="form-control" value="{{Auth::user()->teacher['description']}}">

                </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="resume">resume</label>
                <input type="file" name="resume" class="form-control" value="{{Auth::user()->teacher['resume']}}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class=" col-md-3">
            <div class="form-group">


            <input type="submit" value="update" class="btn btn-success" >
        </div>
        </div>
        <div class="col-md-3">
            <span >
                <a type="button" data-toggle="modal" data-target="#passModal">
                    Change Password</a>
            </span>

        </div>



            <div class="col-md-3">
                <a type="button" class="btn btn-primary" href="/teacher/workexperience">
                    View My Work dialog
                </a>
            </div>






    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>

      </div>
      <div id="passModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg" role="content">
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="/profile/changepasswordteacher" method="post">
          @csrf
          <div class="form-row">
                  <div class="form-group col-sm-5">
                 <label class="sr-only">Current Password</label>
                <input type="password" name="cpass" class="form-control form-control-sm mr-1"  placeholder="current password">
               </div>
                </div>
                <div class="form-row">
               <div class="form-group col-sm-5">
               <label class="sr-only">New Password</label>
                 <input type="password" name="newpass" class="form-control form-control-sm mr-1" placeholder="New Password">
                 </div>
              </div>
              <div class="form-row">
              <div class="form-group col-sm-5">
                 <label class="sr-only col-sm-4">Confirm Password</label>
                 <input type="password" name="cfrmpass" class="form-control form-control-sm mr-1" placeholder="New Password">
                 </div>
              </div>
              <div class="form-row">
                <input type="submit" value="Change Password" class="btn btn-success">
              </div>
          </form>


          </div>
        </div>
</div>
</div>

    <script>
    $('.sub').click(function(){
        $('.nav-sub').toggleClass("show");
    });
    </script>
</body>
</html>
