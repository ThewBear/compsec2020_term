<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;

class CommentController extends Controller
{
    public function doComment(Request $request) {
        if (Gate::allows('do-comment')) {
            $comment = new Comment();
            $comment->content = $request->content;
            $comment->user_id = auth()->user()->id;
            $comment->post_id = $request->post_id;

            $comment->save();
        }

        return redirect('/posts');
    }

    public function updateComment(Request $request) {
        $comment = Comment::findOrFail($request->comment_id);
        if (Gate::allows('update-comment', $comment)) {
            $comment->content = $request->content;
            $comment->save();
        }

        return redirect('/posts');
    }
}
