<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Requestteacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TeacherAccepted;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
    return view('admin.dashboard');
    }
    public function usersList()
    {
    $users=User::all();
    return view('admin.users')->with('users',$users);
    }
    public function teachersList()
    {
    $teachers=Teacher::all();
    return view('admin.teachers')->with('teachers',$teachers);
    }
    public function edit($id){
        $user=User::find($id);
        if($user!=null){
            return view('admin.edit',['user'=>$user]);
        }
    }
    public function update(Request $req){
        $data=User::find($req->id);
        if($data !=null){           
        $data->firstName=$req->firstName;
        $data->lastName=$req->lastName;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->role=$req->role;
        $data->isDeleted=$req->del;
        $data->save();}
        return redirect ('users')->with('status','user updated successfully');
    }

    public function delete($id){
        $user=User::find($id);
        $teacher = DB::table('users')
        ->join('teachers','id','=','teachers.user_id')
        ->where('id',$id)
        ->first();
        if($user->isDeleted==0){ 
            if( $user->role=='teacher' && $teacher->isstaff==0 ){
            $user->isDeleted=1;
            $user->save();
        return redirect ('users')->with('error','user is Teacher and  deleted successfully');
            }
            elseif($teacher==null){
                $user->isDeleted=1;
                $user->save();
            return redirect ('users')->with('error','user deleted successfully'); 
            }
            else{
                return redirect ('users')->with('error','Cannot delete user is a Teacher');
            }

    }
        else{
            return redirect ('users')->with('status','user already deleted');
        }
       
    }

    public function Addteacher(Request $request){
        $user_id=$request->user;
        $user=User::find($user_id);
        $education=$request->input('education');
        $university=$request->input('uni');
        $subject=$request->input('subject');
        $teachingLang=$request->input('teachingLang');
        $teachingGrade=$request->input('teachingGrade');
        $address=$request->input('address');
        $description=$request->input('description');
        
        if($user!=null){
            $user->role='teacher';
            $user->save();
            $teacher=new Teacher();
            $teacher->user_id=$user->id;
            $teacher->education=$education;
            $teacher->university=$university;
            $teacher->subject=$subject;
            $teacher->address=$address;
            $teacher->description=$description;
            $teacher->teachingLang=$teachingLang;
            $teacher->teachingGrade=$teachingGrade;
            if($request->hasFile('resume')){

                $file=$request->file('resume');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('upload/resumes/',$filename);
                $teacher->resume=$filename;
        
                }
                else{
                    return dd($request->all());
                }
                $teacher->save();
    

            return redirect ('teachers')->with('status','teacher added ');
        }
        else{
            return redirect ('teachers')->with('error','user doesnot exist');
        }

    }
    public function Addstudent(Request $request){
        $firstName=$request->input('firstName');
        $lastName=$request->input('lastName');
        $phone=$request->input('phone');
        $email =  $request->input('email');
        $password = $request->input('password');
        $data = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => ['required',  'email', 'max:255'],
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->phone=$phone;
        $user->imageUser='noimage.png';
        $user->password=Hash::make($password);
        $user->role='student';
        $user->save();
        return redirect ('users')->with('status','student added successfully');
        

    }

    public function Acceptteacher($id){
        $teacher = Teacher::where('t_id', '=', $id)->first();
        if($teacher->isstaff==0){
            $user_id=$teacher->user_id;
            $user=User::find($user_id);
            User::find($user_id)->notify(new TeacherAccepted);
            $user->role="teacher";
            $user->save();
            $teacher->isstaff=1; 
            $teacher->save();
            return redirect ('teachers')->with('status','Teacher Accepted');
        }
        else{
            return redirect ('teachers')->with('error','Teacher Already is Staff');
        }
       

    }
    public function Deleteteacher($id){
        $teacher = Teacher::where('t_id', '=', $id)->first();
            $user_id=$teacher->user_id;
            $user=User::find($user_id);
            $user->isDeleted=1;
            $user->save();
            $teacher->isstaff=0; 
            $teacher->save();
            return redirect ('teachers')->with('error','Teacher Removed');
        }

        public function Editteacher($id){
            $teacher = Teacher::where('t_id', '=', $id)->first();
            if($teacher!=null){
                return view('admin.teacheredit',['teacher'=>$teacher]);
            }
        }
        public function Updateteacher(Request $request){
            $t_id=$request->id;
            $teacher = Teacher::where('t_id', '=', $t_id)->first();
            $user_id=$request->user;
            $user=User::find($user_id);
            if($user !=null && $user->isDeleted==0){  
            $user->role='teacher';
            $user->save();
            $teacher->user_id=$user_id;
            $teacher->education=$request->education;
            $teacher->university=$request->uni;
            $teacher->subject=$request->subject;
            $teacher->address=$request->address;
            $teacher->description=$request->description;
            $teacher->teachingLang=$request->teachingLang;
            $teacher->teachingGrade=$request->teachingGrade;
            if($request->hasFile('resume')){
                $destination='upload/resumes/'. $teacher->resume;
                if(file::exists($destination)){
                    file::delete($destination);
                 }
                $file=$request->file('resume');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $file->move('upload/resumes/',$filename);
                $teacher->resume=$filename;

        
                }
            $teacher->save();
            return redirect ('teachers')->with('status','teacher updated successfully');

            }
            else{
                return redirect ('teachers')->with('error','user not found'); 
            }
    
        }
     public function Requestlist()
        {
            $reqs = DB::table('requestteachers')
            ->join('users','user_id','=','users.id')
            ->join('teachers','requestteachers.t_id','=','teachers.t_id')
            ->get();
        $users = DB::table('users')
         ->join('teachers','id','=','teachers.user_id')
         ->get();
         return view('admin.requests',['reqs'=> $reqs,'users'=>$users]);

        }
        public function Addrequest(Request $request){
            $req=new Requestteacher();
            $t_id=$request->input('t_id');
            $u_id=$request->input('u_id');
            $teacher=Teacher::where('t_id','=',$t_id)->first();
            $user=User::where('id','=',$u_id)->first();
            $row=Requestteacher::where('user_id','=',$u_id)
                                 ->where('t_id','=',$t_id)
                                 ->first();
            if($teacher->isstaff==0 || $teacher==null){
                return redirect ('requests')->with('error','teacher not a staff'); 
            }
            elseif($user->isDeleted==1 || $user->role!='student'){
                return redirect ('requests')->with('error','student not found'); 
            }
            elseif($row!=null){
                return redirect ('requests')->with('error','it is an entry'); 
            }
            else{
                $req->user_id=$u_id;
                $req->t_id=$t_id;
                $req->save();
                return redirect ('requests')->with('status','request created successfully'); 
            }
        }

        public function Editrequest($r_id){
            $req = Requestteacher::where('r_id', '=', $r_id)->first();
            if($req!=null){
                return view('admin.requestedit',['req'=>$req]);
            }
        }
        public function Updaterequest(Request $request){
            $r_id=$request->id;
            $req=Requestteacher::where('r_id','=',$r_id)->first();
            $u_id=$request->user;
            $t_id=$request->teacher;
            $md=$request->meetingDate;
            $mt=$request->meetingTime;
            $response=$request->Response;
            $teacher=Teacher::where('t_id','=',$t_id)->first();
            $user=User::where('id','=',$u_id)->first();
            if($teacher->isstaff==0 || $teacher==null){
                return redirect ('requests')->with('error','teacher not a staff'); 
            }
            elseif($user->isDeleted==1 || $user->role!='student'){
                return redirect ('requests')->with('error','student not found'); 
            }
            else{
                $req->user_id=$u_id;
                $req->t_id=$t_id;
                $req->meetingDate=$md;
                $req->meetingTime=$mt;
                $req->Response=$response;
                $req->save();
                return redirect ('requests')->with('status','request updated successfully'); 
            }
            
        }
        public function Deleterequest($id){
            $request=Requestteacher::where('r_id','=',$id)->delete();
            return redirect ('requests')->with('status','request deleted successfully'); 

        }


    }

