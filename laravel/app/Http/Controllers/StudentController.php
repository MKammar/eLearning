<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\TeacherResponse;
use App\Models\Requestteacher;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PDF;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('student');
    }

    public function StudentDashboardView()
    {
        $student = User::find(auth()->user()->id);
        $teachers = DB::table('users')
                    ->join('teachers','id','=','teachers.user_id')
                    ->join('requestteachers','teachers.t_id','=','requestteachers.t_id')
                    ->where('requestteachers.user_id',$student->id)
                    ->where('requestteachers.Response',1)
                    ->get();

        return view('Student.Dashboard',[
            'teachers' => $teachers,
        ]);
    }

    public function GetTeacherSubject($subject)
    {
        $teachers = DB::table('users')
                        ->join('teachers','id','=','teachers.user_id')
                        ->where('teachers.subject', $subject)
                        ->where('isstaff',1)
                        ->get();

        return view('Student.Subject',[
            'teachers' => $teachers,
        ]);
    }

    public function TeacherDetails($id)
    {
        $teacher = DB::table('users')
                    ->join('teachers','id','=','teachers.user_id')
                    ->where('id',$id)
                    ->first();
        $exps  = Experience::where('t_id',$teacher->t_id)->get();

        $feedbacks = DB::table('users')
                    ->join('feedback','id','=','feedback.s_id')
                    ->where('feedback.t_id',$teacher->id)
                    ->get();

        $teachers = DB::table('users')
                    ->join('teachers','id','=','teachers.user_id')
                    ->where('teachers.subject',$teacher->subject)
                    ->where('users.id','!=',$teacher->id)
                    ->where('isstaff',1)
                    ->paginate(5);



        return view('Student.TeacherDetails',[
            'teacher' => $teacher,
            'teachers' => $teachers,
            'exps' => $exps,
            'feedbacks' => $feedbacks,
        ]);


    }
    public function profile(){
        return view('Student.Profile');
    }

    public function Profileupdate(Request $request){
        $id=Auth::user()->id;
        $user=User::find($id);
        $user->firstName=$request->firstname;
        $user->lastName=$request->lastname;
        $user->email=$request->email;
        $user->phone=$request->phone;
       if($request->hasfile('imageUser')){
           $destination='upload/images/'. $user->imageUser;

           if(file::exists($destination)){
               if($user->imageUser!='noimage.png'){
               file::delete($destination);
            }
           }
           $file=$request->file('imageUser');
           $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $user->imageUser=$filename;
       }


        $user->update();
        return redirect()->back()->with('status','Your profile is updated');


    }
    public function Profiledelete(Request $request){
        $id=Auth::user()->id;
        $user=User::find($id);
        $destination='upload/images/'. $user->imageUser;
        if(file::exists($destination)){
            file::delete($destination);
         }
        $user->imageUser='noimage.png';
        $user->update();
        return redirect()->back()->with('status','Your profile is removed');

}
public function Profilechangepass(Request $request){
    $email=Auth::user()->email;
    $user = User::where('email', '=', $email)->first();
    $pass=$user->password;
    $currentpass=$request->cpass;
    if (Hash::check($currentpass, $pass)){
        $newpass=$request->newpass;
        $cnfrmpass=$request->cfrmpass;
        if(strlen($newpass)<8){
            return redirect()->back()->with('status','the password must be greater than 8 charcs');
        }

        if($newpass==$cnfrmpass){
            $user->password=Hash::make($newpass);
            $user->save();
            return redirect()->back()->with('status','password changed');
        }
        else{
            return redirect()->back()->with('status','new password and confirmed pass are not equal');
        }

    }
    else{
        return redirect()->back()->with('status','current password not equal your pass');
    }
}


public function activity(){
    $reqs = DB::table('requestteachers')
          ->join('users','user_id','=','users.id')
          ->join('teachers','requestteachers.t_id','=','teachers.t_id')
          ->where('requestteachers.user_id', Auth::user()->id)
          ->get();
    $users = DB::table('users')
         ->join('teachers','id','=','teachers.user_id')
         ->get();
         return view('Student.activity',['reqs'=> $reqs,'users'=>$users]);
    }

    public function Deleteactivity($r_id){
        $request=DB::table('requestteachers')->where('r_id', '=', $r_id);
        $req=$request->first();
        if($req->Response==0){
            $request->delete();
            return redirect()->back()->with('status','Request Deleted successfully');
        }
        else {
            return redirect()->back()->with('error','You donot have the permission to delete it');
        }


        }
        public function SendRequest(Request $req){
            $u_id=Auth::user()->id;
            $t_id= $req->input('teacher');
            $requests=Requestteacher::where('user_id','=',$u_id)
                                         ->where('t_id','=',$t_id)
                                         ->first();
            $teacher=Teacher::where('t_id','=',$t_id)->first();
            $user=User::where('id','=',$teacher->user_id)->first();
            $user->notify(new TeacherResponse(Auth::user()->firstName.' '.'sends you a request'));
            if($requests!=null){
                return redirect('/student/activity')->with('error','Already requested teacher');
            }
            else{
                $request=new Requestteacher();
                $request->user_id=$u_id;
                $request->t_id=$req->teacher;
                $request->save();
                return redirect('/student/activity')->with('status','Wait for your teacher response!');
            }

    }
    public function ViewNotification()
    {
        foreach (Auth::user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }






    public function ViewAssignments()
    {
        $assgs = Assignment::where('s_id',Auth::user()->id)->get();

        return view('Student.Assignments',[
            'assgs' => $assgs,
        ]);
    }

    public function TakeAssignment($id)
    {
        $assg = Assignment::find($id);

        if($assg->isSubmitted == 0){
            $qustions = Question::where('a_id',$id)->get();
            return view('Student.TakeAssignment',[
                'assg' => $assg,
                'questions' => $qustions,
            ]);

        }
        $assgs = Assignment::where('s_id',Auth::user()->id)->get();

        return view('Student.Assignments',[
            'assgs' => $assgs,
        ]);
    }

    public function SubmitAssignment(Request $request,$id)
    {
        $assg = Assignment::find($id);
        $questions = Question::where('a_id',$id)->get();

        foreach($questions as $question){
            $question->answer = $request->input('question-'.$question->q_id);
            $question->update();
        }

        $assg->isSubmitted = 1;

        $countAllquestions = $questions->count();
        $questionGrade = 100/$countAllquestions;

        $studentcorrectanswer = 0;

        foreach($questions as $question){
            if($question->correctAnswer == $question->answer){
               $studentcorrectanswer++;
            }
        }
        $totalGrade = $studentcorrectanswer*$questionGrade;

        $assg->grade = $totalGrade;

        $assg->update();

        $assgs = Assignment::where('s_id',Auth::user()->id)->get();

        return view('Student.Assignments',[
            'assgs' => $assgs,
        ]);
    }

    public function ReviewAssignment($id)
    {

        $assg = Assignment::find($id);
        if($assg->isSubmitted == 1){
            $questions = Question::where('a_id',$id)->get();
             return view('Student.ReviewAssignment',[
                'assg' => $assg,
                'questions' => $questions,
                'totalGrade' => $assg->grade,
            ]);
        }
        $assgs = Assignment::where('s_id',Auth::user()->id)->get();

        return view('Student.Assignments',[
            'assgs' => $assgs,
        ]);

    }
    public function Schedule(){
        $sc_students=Schedule::where('s_id',auth()->user()->id)->get();
        $users=User::all();

        return view('Student.Schedule',[
            'sc_students'=>$sc_students,
            'users'=>$users
        ]);

    }



    public function Certificates()
    {
       $certs = DB::table('users')
                ->join('certificates','id','=','certificates.s_id')
                ->where('certificates.s_id',auth()->user()->id)
                ->get();


        $users = User::all();
        return view('Student.StudentCertificates',[
            'certs' => $certs,
            'users' => $users
        ]);
    }

    public function ViewCertificate($id)
    {

        $cert = Certificate::find($id);
        $student = User::find(auth()->user()->id);
        $teacher = Teacher::where('user_id',$cert->t_id)->first();
        if($cert != null){
            return view('Certificate',[
                'student' =>$student,
                'teacher' => $teacher,
                'cert' => $cert,
            ]);
        }
    }
    public function DownloadCertificate($id)
    {
        $cert = Certificate::find($id);
        $student = User::find(auth()->user()->id);
        $teacher = Teacher::where('user_id',$cert->t_id)->first();
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('Certificate',[
            'student' =>$student,
            'teacher' => $teacher,
            'cert' => $cert,
        ]);

        return $pdf->download('Certificate.pdf');
    }
    public function Feedback($id)
    {
        return view('Student.Feedback',[
            'id' => $id,
        ]);
    }

    public function SubmitFeedback(Request $request, $id)
    {
        $feedback = Feedback::where('s_id','=',Auth::user()->id)->where('t_id','=',$id)->first();
        if($feedback == null){
            Feedback::create([
                's_id' => auth()->user()->id,
                't_id' => $id,
                'rate' => $request->input('rate'),
                'description' => $request->input('description'),
            ]);
            return Redirect('student/dashboard');
        }
        return Redirect('student/dashboard');

    }
}


