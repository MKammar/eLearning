<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/css/Certificatestyle.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
        body {
            color: black;

            font-family: Georgia, serif;
            font-size: 24px;
            text-align: center;
        }
        .container {
            border: 20px solid tan;
            width: 750px;
            height: 563px;

            vertical-align: middle;
        }
        .logo {
            color: tan;
        }

        .marquee {
            color: tan;
            font-size: 48px;
            margin: 20px;
        }
        .assignment {
            margin: 20px;
        }
        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
        }
        .reason {
            margin: 20px;
        }
    </style>
    </head>
    <body>
        @if (Auth::user()->role == 'student')

        <a href="{{ url('/downloadCertificate/'.$cert->certificate_id) }}">Download PDF</a>
        @else
        <a href="{{ url('/download/'.$student->id) }}">Download PDF</a>
        @endif

        <div class="container">
            <div class="logo">
                E-Learning
            </div>


            <div class="marquee">
                Certificate of Completion
            </div>

            <div class="assignment">
                This certificate is presented to
            </div>

            <div class="person">
                {{ $student->firstName }} {{ $student->lastName }}

            </div>

            <div class="reason">
                after successfully completing the {{ $teacher->subject }} course<br/><br>
                {{ Carbon\Carbon::now()->setTimezone('Asia/Beirut') }}
            </div>
        </div>


    </body>
</html>
