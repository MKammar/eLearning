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
                  <a class="nav-link active" href="/teacher/dashborad">
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
                    <input id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search" type="text">
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
                        <i class="fa fa-bell" aria-hidden="true"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                          <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                          <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>2 hrs ago</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                              </div>
                            </div>
                          </a>
                          <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>3 hrs ago</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                              </div>
                            </div>
                          </a>
                          <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>5 hrs ago</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                              </div>
                            </div>
                          </a>
                          <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>2 hrs ago</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                              </div>
                            </div>
                          </a>
                          <a href="#!" class="list-group-item list-group-item-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="#" src="#" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">John Snow</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>3 hrs ago</small>
                                  </div>
                                </div>
                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                              </div>
                            </div>
                          </a>
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
<!--table-->
        <div class="header bg-primary pb-6">
            <x-alert/>
            <div class="container-fluid">
              <div class="header-body">
                <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Work Experience List </h6>

                  </div>
                  <div class="col-lg-6 col-5 text-right">

                    <a type="button"  data-toggle="modal" data-target="#experienceModel" class="btn btn-sm btn-neutral">
                        <i class="fa fa-plus" aria-hidden="true"></i>  New</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="container-fluid ml-5 mt--6">
        <div class="row">
            <div class="col">
              <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                  <h3 class="mb-0"></h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                  <form method="POST" action="/teacher/editworkexperience/{{ $exp->exp_id }}">
                    @csrf
                      <div class="form-group">
                          <label class="offset-md-2">Experience Title</label>
                          <input class="form-control offset-md-2 col-8" name="expTitle" value="{{ $exp->expTitle }}">
                      </div>
                      <div class="form-group">
                        <label class="offset-md-2">Experience Description</label>
                        <input class="form-control offset-md-2 col-8" name="expDes" value="{{ $exp->expDes }}">
                    </div>
                    <div class="form-group">
                        <label class="offset-md-2">Experience Start Date</label>
                        <input class="form-control offset-md-2 col-8" name="expStart" value="{{ $exp->expStart }}">
                    </div>
                    <div class="form-group">
                        <label class="offset-md-2">Experience End Date</label>
                        <input class="form-control offset-md-2 col-8" name="expEnd" value="{{ $exp->expEnd }}">
                    </div>
                    <div class="form-group ml-auto ">

                        <input class="btn btn-primary offset-md-6" type="submit" value="Save">
                    </div>
                  </form>
                </div>
                <!-- Card footer -->

              </div>
            </div>
          </div>
    </div>


    <div class="modal fade" id="experienceModel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Work Experience</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
                <form method="post" action="/profile/addworkexperience">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                                <label class="sr-only">Experience Title</label>
                                <input type="text" name="expTitle" class="form-control form-control-sm mr-1"  placeholder="Experience Title">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                                <label class="sr-only">Experience Description</label>
                                <input type="text" name="expDes" class="form-control form-control-sm mr-1"  placeholder="Experience Description">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                                <label class="sr-only">Experience Start Date</label>
                                <input type="text" name="expStart" class="form-control form-control-sm mr-1"  placeholder="Experience Start Date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                                <label class="sr-only">Experience End Date</label>
                                <input type="text" name="expEnd" class="form-control form-control-sm mr-1"  placeholder="Experience End Date">
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="add"/>
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
