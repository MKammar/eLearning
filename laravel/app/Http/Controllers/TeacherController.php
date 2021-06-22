<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Collections;
use App\Models\Schedule;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Question;
use App\Models\Requestteacher;
use App\Notifications\ResumeUpdated;
use App\Notifications\TeacherResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PDF;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('teacher');
    }


    public function index(){
        $teacher = Teacher::where('user_id',Auth::user()->id)->first();
        $students = DB::table('users')
                    ->join('requestteachers','id','=','requestteachers.user_id')
                    ->where('requestteachers.t_id',$teacher->t_id)
                    ->where('requestteachers.Response',1)
                    ->get();


        return view('Teacher.Dashboard',[
            'students' => $students,
        ]);
    }

    public function Profile(){
        return view('Teacher.Profile');
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
       $teacher = Teacher::where('user_id',$id)->first();
       $teacher->education = $request->input('education');
       $teacher->university = $request->input('university');
       if($request->input('teachingLang') != null){
        $teacher->teachingLang = $request->input('teachingLang');
       }
       if($request->input('teachingGrade') != null) {
        $teacher->teachingGrade = $request->input('teachingGrade');
       }

       $teacher->address = $request->input('address');
       $teacher->description = $request->input('description');
       if($request->input('subject') != null){
        $teacher->subject = $request->input('subject');
       }

       if($request->hasFile('resume')){
           $destinationfile = 'upload/resumes/' .$teacher->resume;
           if(file::exists($destinationfile)){
               file::delete($destinationfile);
           }
           $filefile = $request->file('resume');
           $extensionfile = $filefile->getClientOriginalExtension();
           $filenamefile = time().'.'.$extensionfile;
           $filefile->move('upload/resumes/'.$filenamefile);
           $teacher->resume = $filenamefile;
           $admin = User::where('role','admin')->first();
           $admin->notify(new ResumeUpdated($filenamefile));
       }




         $user->update();
         $teacher->update();
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

    public function ViewWorkExperience()
    {
        $teacher = Teacher::where('user_id',Auth::user()->id)->first();
        $exps = Experience::where('t_id',$teacher->t_id)->get();
        return view('Teacher.WorkExperience',[
            'exps' => $exps,
        ]);
    }

    public function AddWorkExperience(Request $request)
    {
        $teacher = Teacher::where('user_id',Auth::user()->id)->first();
        if($request->expStart > $request->expEnd){
            return redirect()->back()->with('error','Start date is bigger than end date');
        }
        else {
            Experience::create([

                'expTitle' => $request->input('expTitle'),
                'expDes' => $request->input('expDes'),
                'expStart' => $request->input('expStart'),
                'expEnd' => $request->input('expEnd'),
                't_id' => $teacher->t_id,

            ]);


            return redirect()->back()->with('status','Work experience add successfully');
        }

    }

    public function DeleteWorkExperience($id)
    {
        DB::table('experiences')->where('exp_id',$id)->delete();

        return redirect()->back()->with('status','Work experience deleted successfully');
    }

    public function EditWorkExperience($id)
    {
        $exp = Experience::where('exp_id',$id)->first();

        return view('Teacher.EditWorkExperience',[
            'exp'=>$exp,
        ]);
    }

    public function SaveEditWorkExperience(Request $request,$id)
    {
        DB::table('experiences')
            ->where('exp_id',$id)
            ->update([
                'expTitle' => $request->input('expTitle'),
                'expDes' => $request->input('expDes'),
                'expStart' => $request->input('expStart'),
                'expEnd' => $request->input('expEnd'),
            ]);


        return redirect('/teacher/workexperience')->with('status', 'Work experience edited successfully');
    }
    public function ViewActivity()
    {
        $reqs = DB::table('requestteachers')
                    ->join('users','user_id','=','users.id')
                    ->where('t_id', Auth::user()->teacher['t_id'])

                    ->get();

     return view('Teacher.Activity',[
         'reqs'=> $reqs,
     ]);
    }
    public function EditActivity($id)
    {
       return view('Teacher.AddDateTimeRequest',[
           'id' => $id,
       ]);
    }

    public function SaveActivity(Request $request,$id)
    {
       $req = Requestteacher::find($id);
         $req->meetingDate = $request->input('meetingDate');
        $req->meetingTime = $request->input('meetingTime');
       $req->Response = 1;
       $req->update();
       $teacher = Teacher::find($req->t_id);
       $userTeacher = User::find($teacher->user_id);
       User::find($req->user_id)->notify(new TeacherResponse('Teacher '. $userTeacher->firstName . ' accepted your request'));

       return  redirect('/teacher/activity');
    }

    public function ViewAssignments()
    {
        $assgs = Assignment::where('t_id',auth()->user()->id)->get();

        return view('Teacher.Assignments',[
            'assgs' => $assgs,
        ]);

    }

    public function CreateAssignment()
    {
        $teacher = Teacher::where('user_id',auth()->user()->id)->first();
        $students = DB::table('users')
                    ->join('requestteachers','id','=','requestteachers.user_id')
                    ->where('requestteachers.t_id',$teacher->t_id)
                    ->where('requestteachers.response',1)
                    ->get();

        return view('Teacher.CreateAssignmnet',[
            'students' => $students,
        ]);

    }

    public function AddAssignment(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            's_id' => 'required',
            'startDatetime' => 'required',
            'endDatetime' => 'required',

        ]);
        if($request->startDatetime < $request->endDatetime){
            $data['t_id'] = auth()->user()->id;
            $assg = Assignment::create($data);

            return redirect('/teacher/question/'.$assg->a_id);
        }
        $assgs = Assignment::where('t_id',auth()->user()->id)->get();

        // return view('Teacher.Assignments',[
        //     'assgs' => $assgs,
        // ])->with('error','chech date');
        return Redirect('/teacher/assignments')->with('error','check date');

    }


    public function CreateQuestion($id)
    {
        return view('Teacher.CreateQuestion',[
            'id' => $id,
        ]);
    }

    public function AddQuestion(Request $request, $id)
    {

       $data = $request->validate([
           'question' => 'required',
           'choice1' => 'required',
           'choice2' => 'required',

       ]);
       $data['choice3'] = $request->input('choice3');
       $data['choice4'] = $request->input('choice4');
       $data['a_id'] = $id;
       $data['correctAnswer'] = $request->input('choice1');
        Question::create($data);



        return redirect('/teacher/question/'.$id);
    }

    public function ViewTheAssignment($id)
    {
        $assg = Assignment::find($id);
        $qustions = Question::where('a_id',$id)->get();
        return view('Teacher.ViewAssignment',[
            'assg' => $assg,
            'questions' => $qustions,
        ]);


    }

    public function UpdateAssignment(Request $request,$id)
    {
        $assg = Assignment::find($id);
        $qustions = Question::where('a_id',$id)->get();

        foreach($qustions as $question){
            $question->correctAnswer = $request->input('question-'.$question->q_id);
            $question->update();
        }

        return Redirect('/teacher/assignment/'.$id);
    }

    public function DeleteQuestionAssignment($id)
    {

        $question = Question::find($id);
        $assg = Assignment::where('a_id',$question->a_id);
        $question->delete();

        return Redirect('/teacher/assignment/'.$question->a_id);
    }

    public function Schedule(){
        $teacher = Teacher::where('user_id',auth()->user()->id)->first();
        $students = DB::table('users')
                    ->join('requestteachers','id','=','requestteachers.user_id')
                    ->where('requestteachers.t_id',$teacher->t_id)
                    ->where('requestteachers.response',1)
                    ->get();

        $sc_teacher=Schedule::where('t_id',auth()->user()->id)->get();
        $users=User::all();

        return view('Teacher.Schedule',[
            'students' => $students,
            'sc_teacher'=>$sc_teacher,
            'users'=>$users
        ]);

    }

    public function CreateSchedule(Request $request){

        // $st=SubjectTime::create(
        //     [ 's_id' => $request->input('s_id'),
        //         't_id' => auth()->user()->id,]
        //    );
        //  $id=$st->sub_id;
        //  $s_id=$st->s_id;
         $id= $request->input('s_id');
       return redirect('/teacher/schedule/'.$id);
    }

   public function ViewSchedule($id){
     return View('Teacher.CreateSchedule',['id'=>$id]);
        }

     public function AddSchedule(Request $req,$id)
    {
        $sc=new Schedule;
        $sc->s_id=$id;
        $sc->t_id=auth()->user()->id;
        $sc->day=$req->input('day');
        $sc->start_time=$req->input('start');
        $sc->end_time=$req->input('end');

        $sc_between = Schedule::Where('s_id',$id)
                           ->where('schedules.day',$sc->day)
                           ->where('schedules.start_time','<=',$sc->start_time)
                           ->where('schedules.end_time','>=',$sc->end_time)
                           ->first();

        if($sc_between !=null){
            return redirect('/teacher/schedule/'.$id)->with('error','There is conflict time');
        }
        if($sc->day==null){
            return redirect('/teacher/schedule/'.$id)->with('error','Please enter date');
        }
        if($sc->start_time>$sc->end_time || $sc->start_time==$sc->end_time){
         return redirect('/teacher/schedule/'.$id)->with('error','Check your session time');
        }
        $sc->save();
       return redirect('/teacher/schedule/'.$id);
    }

    public function viewStudentAnswers($id)
    {

        $assg = Assignment::find($id);
        $student = User::find($assg->s_id);
        if($assg->isSubmitted == 1){
            $questions = Question::where('a_id',$id)->get();
             return view('Teacher.ViewStudentAnswers',[
                'assg' => $assg,
                'questions' => $questions,
                'totalGrade' => $assg->grade,
                'student' => $student,
            ]);
        }
        $assgs = Assignment::where('s_id',Auth::user()->id)->get();

        return view('Teacher\Assignments',[
            'assgs' => $assgs,
        ]);

    }
    public function ViewCertificate($id)
    {
        $student = User::find($id);
        $teacher = Teacher::where('user_id',auth()->user()->id)->first();
        $certificate = Certificate::where('s_id',$id)->where('t_id',auth()->user()->id)->first();
        if($certificate == null){
            Certificate::create([
                's_id' => $id,
                't_id' =>auth()->user()->id,
                'isgenerated' => 1,
            ]);
        }


        return view('Certificate',[
            'student' =>$student,
            'teacher' => $teacher,
        ]);
    }

    public function DownloadCertificate($id)
    {
        $student = User::find($id);
        $teacher = Teacher::where('user_id',auth()->user()->id)->first();
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('Certificate',[
            'student' =>$student,
            'teacher' => $teacher,
        ]);

        return $pdf->download('Certificate.pdf');
    }

    public function ViewFeedbacks()
    {
        $feedbacks = DB::table('users')
        ->join('feedback','id','=','feedback.s_id')
        ->where('feedback.t_id',auth()->user()->id)
        ->get();

        return view('Teacher.MyFeedbacks',[
            'feedbacks' => $feedbacks,
        ]);
    }

}
