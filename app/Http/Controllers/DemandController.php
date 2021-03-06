<?php

namespace App\Http\Controllers;

use App\Demand;
use App\Family;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DemandController extends Controller
{
    public function index()
    {
        return 'test';
    }

    public function create($id)
    {
        return view('demand/create', compact('id'));
    }

    public function store(Request $request)
    {
        $family = Family::find($request->id);
        $demand = new Demand();
        $demand['text'] = $request['text'];

//dd($request->id);
        $family->demands()->save($demand);

        return redirect('mentor/families/'.$family->id);
    }

    public function accept($id)
    {
        $accepts = Auth::user()->accept->accepts;
        $accepts +=1;

        $accept = Auth::user()->accept;
        $accept->accepts = $accepts;
        $accept->save();

        $demand = Demand::findorfail($id);
        $demand->accepted = true;
//        dd($demand);
        $demand->save();




//        dd($demand);
        return redirect('/family/'.$demand->family_id);
    }
}
