<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $teacher = DB::table('teachers')
                    ->where('user_id',Auth::user()->id)
                    ->first();
        if(Auth::check()){
            if(Auth::user()->role == 'teacher'){
                if ($teacher->isstaff == 1){
                    return $next($request);
                }
                else
                return redirect('AdminResponse');
            }

            else
                return redirect('/home');
        }

        else
                return redirect('/home');

    }

    }

