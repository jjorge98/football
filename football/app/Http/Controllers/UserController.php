<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function register(){
        return view('studentRegisterAdm');
    }

    public function studentList(){
        $students = DB::table('aluno as a')
        ->get();

        return view('studentList', compact(['students']));
    }
}
