<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function doComment(Request $request) {
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = session('id');
        $comment->post_id = $request->post_id;

        $comment->save();

        return redirect('/posts');
    }
}
