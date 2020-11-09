<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use DB;

class PostController extends Controller
{
    public function doPost(Request $request) {
        $post = new Post();
        $post->user_id = session('id');
        $post->content = $request->content;

        $post->save();

        return redirect('/posts');
    }

    public function updatePost(Request $request) {
        $post = Post::findOrFail($request->id);
        if (Gate::allows('update-post', $post)) {
            $post->content = $request->content;
            $post->save();
        }

        return redirect('/posts');
    }

    public function showPost()
    {
        $posts = Post::all();
        if(auth()->user()->isAdmin()) {
            return view('posts', [
                'posts' => $posts,
                'isAdmin' => true,
            ]);
        } else {
            return view('posts', [
                'posts' => $posts,
                'isAdmin' => false,
            ]);
        }
    }
}
