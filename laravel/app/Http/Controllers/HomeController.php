<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Message;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Pusher\Pusher;

class HomeController extends Controller
{
    //
    public function index()
    {
        $suggestions=DB::table('users')
      ->join('feedback','id','feedback.t_id')
      ->distinct('users.email')
      ->orderby('rate','desc')
      ->paginate(5);

      return view('home',['suggestions'=>$suggestions]);
    }

    public function joinus()
    {
        return view('Teacher.register');
    }
    public function create(Request $request){
        $email =  $request->input('email');
        $password = $request->input('password');
        $firstname=$request->input('firstName');
        $lastname=$request->input('lastName');
        $phone=$request->input('phone');
        $education=$request->input('education');
        $university=$request->input('uni');
        $subject=$request->input('subject');
        $teachingLang=$request->input('teachingLang');
        $teachingGrade=$request->input('teachingGrade');
        $address=$request->input('address');
        $description=$request->input('description');

        //$resume=$request->input('resume');
        $data = $request->validate([
            'firstName' => ['required', 'string', 'max:255','min:3'],
            'lastName' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=new User();
        $user->firstName=$firstname;
        $user->lastName=$lastname;
        $user->email=$email;
        $user->phone=$phone;
        $user->imageUser='noimage.png';
        $user->password=Hash::make($password);
        $user->role='teacher';
        $user->save();

        //insert teacher
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
        return view('Rsponse');

    }

    public function Response()
    {
        return view('Rsponse');
    }
    public function live_chat()
    {
        return view('livechat');
    }
    public function user_list(){
        $users = User::latest()->where('id','!=', auth()->user()->id)
                               ->where('role','student')
                               ->orWhere('role','teacher')
                               ->where('isDeleted',0)
                               ->get();

        if(\Request::ajax()){
         return response()->json($users,200);
             }

          return abort(404);

    }
    public function user_message($id=null){
        if(!\Request::ajax()){
            return abort(404);
        }
        $user = User::findOrFail($id);
       $messages = $this-> message_by_user_id($id);
        return response()->json([
            'messages'=>$messages,
            'user'=>$user,
        ]);
    }

    public function send_message(Request $request){
        if(!$request->ajax()){
             abort(404);
         }
        $messages = Message::create([
            'message'=>$request->message,
            'from'=>auth()->user()->id,
            'to'=>$request->user_id,
            'type'=>0
        ]);
        $messages = Message::create([
         'message'=>$request->message,
         'from'=>auth()->user()->id,
         'to'=>$request->user_id,
         'type'=>1
     ]);
     //    broadcast(new MessageSend($messages));
        return response()->json($messages,201);


     }

    public function delete_single_message($id=null){
        if(!\Request::ajax()){
          return  abort(404);
        }
        Message::findOrFail($id)->delete();
        return response()->json('deleted',200);
 }
 public function delete_all_message($id=null){
    $messages =  $this->message_by_user_id($id);
      foreach ($messages as $value) {
        Message::findOrFail($value->id)->delete();
      }
      return response()->json('all deleted',200);
  }
  public function message_by_user_id($id){
    $messages = Message::where(function($q) use($id){
        $q->where('from',auth()->user()->id);
        $q->where('to',$id);
        $q->where('type',0);
    })->orWhere(function($q) use ($id){
        $q->where('from',$id);
        $q->where('to',auth()->user()->id);
        $q->where('type',1);
    })->with('user')->get();
    return $messages;
}

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('15cd983d49c26c406330', 'd87e680bdb02c21cfa03', '1112962', [
            'cluster' => 'ap2',
            'encrypted' => true
        ]);

        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($key);
    }
    public function Livechat()
    {
       return view('livemeet');
    }




}
