<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function redirectTo(){
        if(Auth::user()->role == 'admin'){
            return 'admin';
        }
        if(Auth::user()->role == 'student'){
            return 'student/dashboard';
        }
        $teacher = DB::table('teachers')
                    ->where('user_id',Auth::user()->id)
                    ->first();
        if(Auth::user()->role == 'teacher'){
            if ($teacher->isstaff == 1){
                return 'teacher/dashboard';
            }
            else
                return 'AdminResponse';

        }



    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
