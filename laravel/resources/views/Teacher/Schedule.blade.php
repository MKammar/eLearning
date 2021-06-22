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
  <style>
 .wrapper {
  display: grid;
  grid-template-rows: 70px 1fr 70px;
  grid-template-columns: 1fr;
  grid-template-areas: "sidebar"
                       "content";
  width: 100vw; /* unnecessary, but let's keep things consistent */
  height: 100vh;
}

@media screen and (min-width: 850px) {
  .wrapper {
    grid-template-columns: 200px 5fr;
    grid-template-rows: 1fr;
    grid-template-areas: "sidebar content";
  }
}



/* SIDEBAR */

main {
  grid-area: content;
  padding: 48px;
}

sidebar {
  grid-area: sidebar;
  display: grid;
  grid-template-columns: 1fr 3fr 1fr;
  grid-template-rows: 3fr 1fr;
  grid-template-areas: "logo menu avatar"
                       "copyright menu avatar";
}
.logo {
  display: flex;
  align-items: center;
  justify-content: center;
}
.copyright {
  text-align: center;
}
.avatar {
  grid-area: avatar;
  display: flex;
  align-items: center;
  flex-direction: row-reverse;
}
.avatar__name {
  flex: 1;
  text-align: right;
  margin-right: 1em;
}
.avatar__img > img {
  display: block;
}

.copyright {
  grid-area: copyright;
}
.menu {
  grid-area: menu;
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}
.logo {
  grid-area: logo;
}
.menu__text {
  display: none;
}

@media screen and (min-width: 850px) {
  sidebar {
    grid-template-areas: "logo"
                         "avatar"
                         "menu"
                         "copyright";
    grid-template-columns: 1fr;
    grid-template-rows: 50px auto 1fr 50px;
  }

  .menu {
    flex-direction: column;
    align-items: normal;
    justify-content: flex-start;
  }
  .menu__text {
    display: inline-block;
  }
  .avatar {
    flex-direction: column;
  }
  .avatar__name {
    margin: 1em 0;
  }
  .avatar__img > img {
    border-radius: 50%;
  }
}




/* MAIN */

.toolbar{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 24px;
}
.calendar{}

.calendar__week,
.calendar__header {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
}
.calendar__week {
  grid-auto-rows: 100px;
  text-align: right;
}

.calendar__header {
  grid-auto-rows: 50px;
  align-items: center;
  text-align: center;
}

.calendar__day {
  padding: 16px;
}




/* COSMETIC STYLING */

:root {
  --red: #ED5454;
}

body {
  font-family: Montserrat;
  font-weight: 100;
  color: #A8B2B9;
}

sidebar {
  background-color: white;
  box-shadow: 5px 0px 20px rgba(0, 0, 0, 0.2);
}

main {
  background-color: #FCFBFC;
}

.avatar__name {
  font-size: 0.8rem;
}

.menu__item {
  text-transform: uppercase;
  font-size: 0.7rem;
  font-weight: 500;
  padding: 16px 16px 16px 14px;
  border-left: 4px solid transparent;
  color: inherit;
  text-decoration: none;
  transition: color ease 0.3s;
}

.menu__item--active .menu__icon {
  color: var(--red);
}
.menu__item--active .menu__text {
  color: black;
}

.menu__item:hover {
  color: black;
}


.menu__icon {
  font-size: 1.3rem;
}

@media screen and (min-width: 850px) {
  .menu__icon {
    font-size: 0.9rem;
    padding-right: 16px;
  }
  .menu__item--active {
    border-left: 4px solid var(--red);
    box-shadow: inset 10px 0px 17px -13px var(--red);
  }
}

.copyright {
  font-size: 0.7rem;
  font-weight: 400;
}

.calendar {
  background-color: white;
  border: 1px solid #e1e1e1;
}

.calendar__header > div {
  text-transform: uppercase;
  font-size: 0.8em;
  font-weight: bold;
}

.calendar__day {
  border-right: 1px solid #e1e1e1;
  border-top: 1px solid #e1e1e1;
}

.calendar__day:last-child {
  border-right: 0;
}

.toggle{
  display: grid;
  grid-template-columns: 1fr 1fr;

  text-align: center;
  font-size: 0.9em;
}
.toggle__option{
  padding: 16px;
  border: 1px solid #e1e1e1;
  border-radius: 8px;
  text-transform: capitalize;
  cursor: pointer;
}
.toggle__option:first-child {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.toggle__option:last-child {
    border-left: 0;
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
}
.toggle__option--selected{
  border-color: white;
  background-color: white;
  color: var(--red);
  font-weight: 500;
  box-shadow: 1px 2px 30px -5px var(--red);
}
  </style>
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
            <x-alert />
            <div class="float-left">
                <a  class="btn btn-primary mr-auto" data-toggle="modal" data-target="#stdmodal" >Create new</a>
            </div>
            <div id="stdmodal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" role="content" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Choose Student </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/teacher/createschedule">
                    @csrf
                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Student Name</label>
                          <select class="form-control" id="s_id" name="s_id">
                              @foreach ($students as $student)
                                <option selected >choose student</option>
                                <option value="{{ $student->id }}">{{ $student->firstName }} {{ $student->lastName }}</option>
                              @endforeach
                          </select>
                        </div>
                            <br>
                            <br />
                            <br />
                        <div class="form-row">
                            <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btn-sm ml-1" >Next</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

  <main class="col-9 offset-3">
    <div class="toolbar">
      <div class="toggle">
        <div class="toggle__option">week</div>
        <div class="toggle__option toggle__option--selected">month</div>
      </div>
      <!-- <div class="current-month">June 2016</div> -->
      <!-- <div class="search-input">
        <input type="text" value="What are you looking for?">
        <i class="fa fa-search"></i>
      </div> -->
    </div>
    <div class="calendar">
      <div class="calendar__header">
        <div>mon</div>
        <div>tue</div>
        <div>wed</div>
        <div>thu</div>
        <div>fri</div>
        <div>sat</div>
        <div>sun</div>
      </div>

      @foreach($sc_teacher as $sc_t)
      @foreach($users as $user)
      <div class="calendar__week">
        <div class="calendar__day ">
        @if($sc_t->day=="Monday" && $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day ">
        @if($sc_t->day=="Tuesday" && $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day ">
        @if($sc_t->day=="Wednesday" &&  $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day ">
        @if($sc_t->day=="Thursday" && $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day ">
        @if($sc_t->day=="Friday"  && $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day ">
        @if($sc_t->day==" Saturday" && $sc_t->s_id==$user->id)
          {{$sc_t->start_time}}
          {{$sc_t->end_time}}
          {{$user->firstName}}  {{$user->lastName}}
        @endif
        </div>
        <div class="calendar__day "></div>
      </div>
     @endforeach
      @endforeach
    </div>


  </main>




</body>
</html>



