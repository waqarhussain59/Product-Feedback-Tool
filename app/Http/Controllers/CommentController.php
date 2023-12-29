<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request, $feedbackId)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $comment = Comment::create([
            'user_id' => auth()->id(),
            'feedback_id' => $feedbackId,
            'content' => $request->input('content'),
        ]);
        $comment->parseMentions();
        $comment->save();
        return redirect()->route('feedback.index')->with('success', 'Comment added successfully!');
    }

    public function searchUsers(Request $request, $query)
    {
        $users = User::where('name', 'like', '%' . $query . '%')->get();

        return response()->json(['users' => $users]);
    }


}
