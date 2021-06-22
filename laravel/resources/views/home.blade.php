@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha512-f8mUMCRNrJxPBDzPJx3n+Y5TC5xp6SmStstEfgsDXZJTcxBakoB5hvPLhAfJKa9rCvH+n3xpJ2vQByxLk4WP2g==" crossorigin="anonymous" />


    <!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>






</head>
<body>

<div class="row">
    <div class="col">
        <img src="{{ asset('Images/backgroundTop.jpg') }}" class="img-fluid" style="opacity: 0.5">
        <div class="centered">
            <h2>Start Learning</h2>
            <p>Sign up and find a private teacher</p>
            <a class="btn btn-lg" href="#signup" id="signupbtn">Get Started</a>
        </div>
    </div>
</div>
<!--How it works-->
<div class="container">

    <div class="row row-content">
        <div class="col-12">
            <h3 class="col-md-4 offset-md-4 title text-center">How It Works</h3>
        </div>
    </div>
    <div class="row row-content">

        <div class="col-lg-12">
            <div class="row row-grid ">
                <div class="col-4 col-grid align-self-center">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-flag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                      </svg>
                      <h5 class="col-grid-title">Start Learning easily</h5>
                      <p class="d-md-block d-none">Register is lot easier than you think!!</p>
                </div>
                <div class="col-4 col-grid align-self-center">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                      </svg>
                      <h5 class="col-grid-title">Pick a Subject</h5>
                      <p class="d-md-block d-none">Pick a subject you would like to lean, anyone</p>
                </div>
                <div class="col-4 col-grid">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-1 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm-3 4c2.623 0 4.146.826 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-1.245C3.854 11.825 5.377 11 8 11z"/>
                      </svg>
                      <h5 class="col-grid-title">Choose a teacher</h5>
                      <p class="d-md-block d-none">Register is lot easier than you think, Register</p>
                </div>
            </div>
            <div class="row row-grid">
                <div class="col-4 col-grid">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                      </svg>
                      <h5 class="col-grid-title">Replay your Courses</h5>
                      <p class="d-md-block d-none">Replay your courses any time you need</p>
                </div>
                <div class="col-4 col-grid">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-chat-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
                      </svg>
                      <h5 class="col-grid-title">Live Chat with teacher</h5>
                      <p class="d-md-block d-none">Start live chat with you teacher</p>
                </div>
                <div class="col-4 col-grid">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-earmark-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                        <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                      </svg>
                      <h5 class="col-grid-title">Do your exmas online</h5>
                      <p class="d-md-block d-none">Make online exams and submit them directly </p>
                </div>
            </div>

        </div>
    </div>
    <!--Suggestions-->
    {{-- <div class="row row-content">
        <div class="col-12">
            <h3 class="col-md-4 offset-md-4 title text-center">Suggestions</h3>
        </div>
    </div>
    <div class="row row-content">
    @foreach($suggestions as $sugg)
        <div class="col-md-3 col-12 card-border">

            <div class="card">
                <img src=" {{ asset('upload/images/'.$sugg->imageUser)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$sugg->firstName}} {{$sugg->lastName}} </h5>
                  <p class="card-text">Contact teacher through :{{$sugg->email}} </p>
                  <a href="#" class="btn btn-primary">Rate: {{$sugg->rate}} /5</a>
                </div>
              </div>
        </div>

     @endforeach


    </div> --}}
    <div class="row row-services">
        <div class="col-md-6 col-12">
            <img src="{{ asset('Images/services.jpg') }}" class="img-fluid">
        </div>
        <div class="col-md-6 col-12 align-self-center text-center ">
            <h2 class="title">OUR SERVICES</h2>
           <p>
            Student Can find private teachers<br>
            Teachers can sign up and start teaching students<br>
            Teaching process can be done through home or online<br>
           </p>
            <a class="btn btn-lg" style="background-color:#FA8072;">Start Learning</a>
        </div>
    </div>
</div>



    <!--Register Now -->
    <div class="row register row-register" id="signup">

            <div class="col-md-5 d-none d-md-block">
                <img src="{{ asset('Images/student2.png')}}">
            </div>
            <div class="col-md-4 offset-sm-2 align-self-center text-center">
                <h3 class="title">Register Now</h3>
                <p>Not Registerd Yet! Its time to start new way of learning in very simple and easy way.</p>
                <a class="btn btn-lg" style="background-color: #FA8072" href="{{ route('register') }}">Register</a>
            </div>

    </div>
    <!--subjects-->
<div class="container">
    <div class="row row-content row-services">

        <div class="col-12">
            <h3 class="col-md-4 offset-md-4 title text-center title">Subjects</h3>
        </div>
    </div>


        <div class="row row-content" style="margin-top: 50px">
            <div id="carouselSubjects" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselSubjects" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselSubjects" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/math.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">Math</h5>
                                     <blockquote><q>In real life, I assure you, there is no such thing as algebra.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/physics.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">Physics</h5>
                                     <blockquote><q>In the beginning there was nothing, which exploded.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/chemistry.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">Chemistry</h5>
                                     <blockquote><q>Scientist believe in things, not in person .</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/english.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">English</h5>
                                     <blockquote><q>The best way to predict the future is to create it.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/english.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">English</h5>
                                     <blockquote><q>The best way to predict the future is to create it.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/biology.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">Biology</h5>
                                     <blockquote><q>Biology, meaning the science of all life, is a late notion.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/history.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">History</h5>
                                     <blockquote><q>History is written by the victors .</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="media">
                                    <img src="{{ asset('Images/arabic.jpg')}}" class=" mr-3" alt="math">
                                    <div class="media-body">
                                      <h5 class="mt-0">Arabic</h5>
                                     <blockquote><q>The best way to predict the future is to create it.</q></blockquote>
                                    </div>
                                  </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <div class="row row-team">
            <div class="col-md-6 col-12">
                <h2 class="title">OUR TEAM</h2>
                <p>We are computer and communications engineers who have passions <br>
                We are always working on improving ourselves and on enhacing our skills
                </p>
                <a class="btn btn-lg" style="background-color: #FA8072" href="#">Contact US</a>
            </div>
            <div class="col-md-6 col-12">
                <img src="{{ asset('Images/Team.jpg') }}" class="img-fluid">
            </div>
        </div>

        <!-- Teacher Register -->
    <div class="row row-services text-center">
        <div class="col-md-6 col-12 order-md-last">
            <h2 class="title">JOIN US</h2>
            <p>Are You a teacher and you would like to teach students from different places
                . join us now by creating an account and start teaching new students. <br>
                Create an account and add your experince info and eductaion info , so that students will
                be able to choose you.
            </p>
            <a class="btn  btn-lg" style="background-color: #FA8072" href={{ "/joinus" }}>Join Us</a>
        </div>

        <div class="col-md-6 col-12 order-md-first">
            <img src="{{ asset('Images/joinus.jpg') }}" class="img-fluid">
        </div>
    </div>
    </div>




<!-- about us -->
    {{-- <div class="container">

        <div class="row row-content">


            <div class="col-12">

                <h3 class="col-md-4 offset-md-4 title  text-center">About Us</h3>
            </div>
        </div>

        <div class="row row-content">

            <div class=" col-12 col-md-7 offset-md-1 ">


                <img src="{{ asset('Images/aboutus.jpg')}}"alt="test" class="img-responsive img">

                <div class="carousel-caption col-12  offset-1 align-self-center">

                  <p class="text-center about"> School closures at short notice created severe disruption, and headteachers had to mobilise staff to teach remotely with little preparation or training time. And it showed that learning online for students was difficult to both students and parents. Therefore, our team “DevOps” decided to solve the problem and make learning nowadays easier to both parents and student. Therefore, our project idea is to develop a web app for “Home and Online schooling”.<p>
                </div>

             </div>


        </div>


</div> --}}


<!--footer-->
<footer class="footer">
    <div class="container">
    <div class="row ">
    <div class="col-4 col-sm-3 align-self-center">
    <img src="{{ asset('Images/e-learning-logo-2.png')}}" class="d-block w-100" alt="joinus">

    <a class="text-white ml-5 d-none d-md-block" href="mailto:ammarmk7@gmail.com" >ammarmk7@gmail.com</a>
    </div>
    <div class="col-7 col-sm-4 align-items-center offset-1">
                        <h5 class="text-white">Our Address</h5>
                        <address class="text-white">
                          121, AlHadath,Baabda<br>
                         Baabda , Antonine University<br>
                          LEBANON<br>
                          <i class="fa fa-phone fa-lg"></i> +961 70 775 691<br>
                          <i class="fa fa-fax fa-lg"></i> +961 71 309 369<br>
                          <i class="fa fa-envelope fa-lg"></i>
                          <a href="mailto:info@elearning.net">info@elearning.net</a>
                       </address>
                       <div>
                        <p  style="color: aliceblue">Copyright &#169; 2021 </p>
                    </div>
                    </div>

                    <div class="col-12 col-sm-4 align-self-center">
                        <div class="text-center ">
                            <a class="btn btn-social-icon btn-google " href="http://google.com/+"><i class="fa fa-google-plus text-danger"></i></a>
                            <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook text-danger"></i></a>
                            <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin text-danger"></i></a>
                            <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter text-danger"></i></a>
                            <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube text-danger"></i></a>
                            <a class="btn btn-social-icon" href="mailto:aleen-sd@outlook.com"><i class="fa fa-envelope-o text-danger"></i></a>
                        </div>

                    </div>

    </div>
    </div>
    </footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $('#signupbtn').on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 2000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
 <style>
</html>
@endsection

