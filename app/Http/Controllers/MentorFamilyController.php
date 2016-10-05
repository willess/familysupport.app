<?php

namespace App\Http\Controllers;

use App\Family;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MentorFamilyController extends Controller
{
//    public function create()
//    {
//        return view('mentor/family/create');
//    }
//
//    public function createFamily(Request $request)
//    {
//        $family = new Family();
//        $family->name = $request['name'];
//        $family->country = $request['country'];
//        $family->city = $request['city'];
//        $family->parents = $request['parents'];
//        $family->children = $request['children'];
//        $family->about = $request['about'];
//        $family->supported = false;
//        $family->save();
//
//        $user = User::find(Auth::User()->id);
//        $user->families()->attach($family->id);
//
//        return redirect('/mentor/family/myFamilies');
//    }
//
//    public function myFamilies()
//    {
//        $user = User::find(Auth::User()->id);
////        dd($user->email);
//
//        $myFamilies = $user
//            ->families()
//            ->orderBy('created_at', 'desc')
//            ->get();
//        return view('mentor/family/myFamilies', compact('myFamilies'));
//    }

//    Testing the resource method!!

    public function create()
    {
        return view('mentor/family/create');
    }

    public function store(Request $request)
    {
        $family = new Family();
        $family->name = $request['name'];
        $family->country = $request['country'];
        $family->city = $request['city'];
        $family->parents = $request['parents'];
        $family->children = $request['children'];
        $family->about = $request['about'];
        $family->supported = false;
        $family->save();

        $user = User::find(Auth::User()->id);
        $user->families()->attach($family->id);

        return redirect('/mentor/families');
    }

    public function index()
    {
        $user = User::find(Auth::User()->id);
//        dd($user->email);

        $myFamilies = $user
            ->families()
            ->orderBy('created_at', 'desc')
            ->get();
        return view('mentor/family/myFamilies', compact('myFamilies'));
    }

    public function show ($id)
    {
        $user = User::find(Auth::User()->id);

        $family = $user
            ->families()
            ->Where('id', $id)
            ->get();

        if(isset($family[0]['id']))
        {
            $family = $family[0];
            return view('mentor/family/showFamily', compact('family'));
        }
        else
        {
            return redirect('/mentor/families');
        }
    }

}
