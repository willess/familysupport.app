<?php

namespace App\Http\Controllers;

use App\Family;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class MentorFamilyPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('mentor');
    }

    public function index ($id)
    {
        return view('mentor/family/post/index', compact('id'));
    }

    public function store (Request $request)
    {
        $family = Family::find($request->id);

        $post = new Post();
        $post['title'] = $request['title'];
        $post['body'] = $request['body'];

        $family->posts()->save($post);

        return redirect('mentor/families/'.$family->id);
    }

    public function edit ($id)
    {
        $post = Post::find($id);
        return view('mentor/family/post/edit', compact('post'));
    }

    public function update (Request $request, $id)
    {
        $post = Post::find($id);
        $post['title'] = $request['title'];
        $post['body'] = $request['body'];
        $post->save();

    }

    public function delete($id)
    {
        $post = Post::find($id);
        $family = $post->family_id;
//        dd($post);
        $post->delete();

        return redirect('/mentor/families/'.$family);
    }

    public function onOff($id)
    {
        $post = Post::findorfail($id);
//        dd($post);
        if($post->show == true)
        {
            $post->show = false;
        }
        elseif($post->show == false)
        {
            $post->show = true;
        }

        $post->save();

        return redirect('mentor/families/'.$post->family_id);
    }
}
