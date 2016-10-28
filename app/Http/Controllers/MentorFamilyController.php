<?php

namespace App\Http\Controllers;

use App\Family;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MentorFamilyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mentor');
    }

    public function index()
    {
        $user = User::find(Auth::User()->id);

        $myFamilies = $user
            ->families()
            ->orderBy('created_at', 'desc')
            ->get();
        return view('mentor/family/myFamilies', compact('myFamilies'));
    }

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

            $posts = $family
                ->posts()
                ->orderBy('created_at', 'desc')
                ->get();

            $demands = $family
                ->demands()
                ->orderBy('created_at', 'desc')
                ->get();

            return view('mentor/family/showFamily', compact('family', 'posts', 'demands'));
        }
        else
        {
            return redirect('/mentor/families');
        }
    }

    public function edit ($id)
    {
        $user = User::find(Auth::User()->id);

        $family = $user
            ->families()
            ->Where('id', $id)
            ->get();

        $family = $family[0];

        return view('mentor/family/edit', compact('family'));
    }

    public function update (Request $request, $id)
    {
        $family = Family::findorfail($id);
        $family->name = $request['name'];
        $family->country = $request['country'];
        $family->city = $request['city'];
        $family->parents = $request['parents'];
        $family->children = $request['children'];
        $family->about = $request['about'];
        $family->save();

        return redirect('/mentor/families/'.$family->id);
    }

    public function destroy($id)
    {
        $family = Family::findorfail($id);

        $family->delete();

        return redirect('mentor/families');
    }

}
