<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class MentorController extends Controller
{

    public function register()
    {
        $mentor_id = Auth::user()->mentor;

        if ($mentor_id == false)
        {
            return redirect('/home');
        }
        else
        {
            if(!isset(Auth::user()->profile->accepted))
            {
                return view('auth/mentor/register');
            }
            elseif(Auth::user()->profile->accepted) {
                return redirect('mentor/home');
            }
            else
            {
                return view('auth/mentor/register');
            }
        }
    }

    public function index()
    {
        if (Auth::check()) {
            $mentor_id = Auth::user()->mentor;

            if (!isset(Auth::user()->profile->accepted))
            {
                return redirect('/mentor/register');
            }
            else
            {
                $accepted = Auth::user()->profile->accepted;
                if ($mentor_id == false)
                {
                    return redirect('/home');
                }

                if ($mentor_id == true && $accepted == false)
                {
                    return redirect('/mentor/register');
                }
                else
                {
                    return view('/mentor/home');
                }
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    public function mentor_info(Request $request){

        $id = Auth::user()->id;

        $mentor_info = new Profile([
            'organisation' => $request['organisation'],
            'country' => $request['country'],
            'accepted' => false
        ]);

        $user = User::find($id);
        $user->Profile()->save($mentor_info);

        //insert the data
        //one-to-one relation
        return redirect('/mentor/home');
    }


}
