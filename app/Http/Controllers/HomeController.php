<?php

namespace App\Http\Controllers;

use App\Family;
use App\Post;
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

        //moet nog worden aangemaakt!!!!!!!
        $accepted = Auth::user()->accepted;

        if($mentor_id == true && $accepted == true){

            return redirect('/mentor/register');

        }
//        elseif($mentor_id == 1 && $accepted == 1)

        elseif($mentor_id == 1)
        {
            return redirect('/mentor/home');
        }
        else
        {
            return redirect('user');
//
//            $families = Family::all()
//                ->where('supported', 0);
//
//            return view('/home', compact('families'));
        }
    }

    public function showFamily($id)
    {
        $family = Family::findorfail($id);

            $posts = $family
                ->posts()
                ->get();

            return view('family', compact('family', 'posts'));

    }
}
