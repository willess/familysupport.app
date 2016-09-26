<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class MentorController extends Controller
{

    public function register()
    {

        if (Auth::check())
        {
            return redirect('/home');
        }
        else
        {
            return view('auth/mentor/register');
        }

    }

    public function index()
    {
        if (Auth::check())
        {
            $mentor_id = Auth::user()->mentor;

            if($mentor_id == false)
            {
                return redirect('/home');
            }
            else
            {

                $user = Auth::user();

                return view('mentor/home', ['user' => $user]);
            }
        }
        else
        {
            return redirect('/login');
        }



    }


}
