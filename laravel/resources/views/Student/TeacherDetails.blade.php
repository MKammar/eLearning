<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/Student/css/style.css') }}" rel="stylesheet">
</head>
<body>


        <div class="row">
            <div class="col" id="teacherdetailstitle">
                <h1>Teacher Details</h1>
                <p>More Information about selected teacher</p>
            </div>
        </div>

            <div class="row" id="teacherdetailsbody">
                <div class="col-md-3  offset-sm-2">
                    <img id="teacherdetailsimage" src="{{ asset('upload/images/'.$teacher->imageUser)}}">
                    <form action="/student/request" method="get">
                    @csrf
                    <input type="hidden" name="teacher" value="{{ $teacher->t_id }} ">
                    <button type="submit" class="btn btn-primary btn-sm">Request Teacher</button>
                   </form>
                </div>


                <div class="col-md-6">

                    <div class="col-md-5" id="teacherdetailsName">
                        <p>Detailed information about {{ $teacher->firstName }}</p>
                        <h2>{{ $teacher->firstName }} {{ $teacher->lastName }}</h2>

                    </div>

                    <ul id="teacherdetaillist">
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i>   I am a {{ $teacher->subject }} Teacher</li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i>   I studied at {{ $teacher->university }}</li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i>   My teaching language is {{ $teacher->teachingLang }}</li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i>   I teach grade {{ $teacher->teachingGrade }}</li>
                    </ul>
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                  <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                      <button id="headingOnebutton" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Education Information
                                      </button>
                                    </h2>
                                  </div>

                                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                     I finished  my high education at {{ $teacher->university }} as a {{ $teacher->education }} teacher,
                                     {{ $teacher->university }} the university I graduated from.
                                     I passed in many difficulties in the university but at the end I graduated as a {{ $teacher->education }} teacher.
                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                      <button id="headingOnebutton" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Work Experience
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                    @foreach($exps as $exp)
                                    <h4>Experience Title : {{ $exp->expTitle }}</h4>
                                    <p>Experience Description: {{ $exp->expDes }}</p>
                                    <hr>
                                    @endforeach

                                    </div>
                                  </div>
                                </div>
                                <div class="card">
                                  <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                      <button id="headingOnebutton" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Feeddbacks
                                      </button>
                                    </h2>
                                  </div>
                                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                      @foreach($feedbacks as $feedback)
                                          <h4>{{ $feedback->firstName }} {{ $feedback->lastName }}  <span class="badge badge-warning">{{ $feedback->rate }}/5</span></h4>
                                            <p>{{ $feedback->description }}</p>
                                            <hr>
                                          @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>

                </div>
            </div>

<hr>
            <div class="row">
                <div class="col text-center">
                    <h2 style="font-family: 'Times New Roman', Times, serif">Related Teachers</h2>
                </div>

            </div>
            <div class="row">
                <div class="container container1">

                @foreach ($teachers as $sameTeacher)
                    <div class="card">
                        <div class="face face1">
                            <div class="content">
                                <div class="icon">

                                        <img src="{{ asset('upload/images/'.$sameTeacher->imageUser)}}">


                                </div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content">
                                <h3>
                                    <a href="{{ url('/teacherdetails/'. $sameTeacher->id) }}">{{ $sameTeacher->firstName }}  {{ $sameTeacher->lastName }}</a>
                                </h3>
                                <p>This is where I network and build my professional protfolio.</p>
                            </div>
                        </div>
                    </div>
                @endforeach



                </div>
            </div>
</body>
</html>
