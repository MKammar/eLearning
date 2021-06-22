<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function index()
    {
        $students = DB::table('users')
                    ->where('role','student')
                    ->get();

        return response()->json($students);
    }
}
