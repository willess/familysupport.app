<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MentorFamilyController extends Controller
{
    public function create()
    {
        return view('mentor/family/create');
    }
}
