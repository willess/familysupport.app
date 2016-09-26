<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //check if user is a mentor
        $mentor_id = Auth::user()->mentor;
        if($mentor_id == true){

            return redirect('/mentor/home');

//            return view('/mentor/home', ['user' => $user]);
        }
        else {
            return view('/home');
        }
    }
}
