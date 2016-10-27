<?php

namespace App\Http\Controllers;

use App\Family;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user/home');
    }

    public function allFamilies()
    {

        $families = Family::all()
            ->where('supported', 0);

        return view('user/families', compact('families'));
    }

    public function store($id)
    {
        $user = Auth::User();
        $user->families()->attach($id);
        $family = Family::findorfail($id);
        $family->supported = true;
        $family->save();
        return redirect('user/myfamilies');
    }

    public function myFamilies()
    {
        $user = User::find(Auth::User()->id);

        $families = $user
            ->families()
            ->get();

        return view('user/myfamilies', compact('families'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {

        $query = $request->input('search');
        $families = Family::all()
            ->where('name','Like', '%' . $query . '%');

        return view('user/families', compact('families'));
    }
}
