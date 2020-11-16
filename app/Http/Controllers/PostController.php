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
        if (Gate::allows('do-post')) {
            $post = new Post();
            $post->user_id = auth()->user()->id;
            $post->content = $request->content;

            $post->save();
        }

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

    public function deletePost(Request $request) {
        $post = Post::findOrFail($request->id);
        if (Gate::allows('delete-post', $post)) {
            // Delete post's comments before delete the post
            foreach ($post->comments as $comment) {
                $comment->delete();
            }
            $post->delete();
        }

        return redirect('/posts');
    }

    public function showPost()
    {
        $posts = Post::all();
        if(Gate::allows('view-post') && auth()->user()->isAdmin()) {
            return view('posts', [
                'posts' => $posts,
                'isAdmin' => true,
            ]);
        } else if (Gate::allows('view-post')) {
            return view('posts', [
                'posts' => $posts,
                'isAdmin' => false,
            ]);
        } else {
            return redirect('/login');
        }
    }
}
