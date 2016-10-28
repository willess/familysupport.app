<?php

namespace App\Http\Controllers;

use App\Accept;
use App\Family;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(Auth::user()->accept)
        {
//            return Auth::user()->accept;
            return view('user/home');
        }
        else
        {
            $accept = new Accept([
                'accepts' => 0
            ]);
            Auth::user()->accept()->save($accept);
            return view('user/home');
        }

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
        $allFamilies = DB::table('families')
            ->orwhere('name', 'LIKE', '%' . $query . '%')
            ->orwhere('country', 'LIKE', '%' . $query . '%')
            ->orwhere('about', 'LIKE', '%' . $query . '%')
            ->where('supported', 0)
            ->get();

        $families = $allFamilies->where('supported', 0);
        return view('user/families', compact('families'));
    }

    public function filter(Request $request)
    {
        $children = $request['children'];
        $parents = $request['parents'];
        if($parents == ""){
            $allFamilies = DB::table('families')
                ->where('children', $children)
                ->get();
        }
        elseif($children == "")
        {
            $allFamilies = DB::table('families')
                ->where('parents', $parents)
                ->get();
        }
        else
        {
            $allFamilies = DB::table('families')
                ->where('children', $children)
                ->where('parents', $parents)
                ->get();
        }

        $families = $allFamilies->where('supported', 0);

        return view('user/families', compact('families'));

    }
}
