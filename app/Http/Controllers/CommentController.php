<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function postComment(Request $request, $postId)
    {
        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|max:500|string',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return back()->withErrors('Please login to post a comment.');
        }

        // Find the post associated with the comment
        $post = Post::find($postId);
        if (!$post) {
            return back()->withErrors('Unable to find the post. Please refresh the page and try again.');
        }

        // Create the comment
        Comment::create([
            'post_id' => $postId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment successfully created. Please wait for admin approval.');
    }











    public function ReplyComment(Request $request, $CommentId)
    {
        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|max:500|string',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return back()->withErrors('Please login to post a comment.');
        }

        // Find the comment associated with the reply
        $comment = Comment::find($CommentId);
        if (!$comment) {
            return back()->withErrors('Unable to find the comment. Please refresh the page and try again.');
        }

        // Create the reply
        CommentReply::create([
            'comment_id' => $CommentId,
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'CommentReply successfully created. Please wait for admin approval.');
    }


}
