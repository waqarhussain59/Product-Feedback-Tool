<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback.create');
    }

    public function index()
    {
        $feedbackItems = Feedback::paginate(10);
        return view('feedback.index', compact('feedbackItems'));
    }
    public function vote($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->increment('votes_count');

        return response()->json(['votes_count' => $feedback->votes_count]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:bug,feature,improvement',
        ]);

        $feedback = Feedback::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully!');
    }
    public function toggleCommentStatus($id)
    {
        $feedback = Feedback::findOrFail($id);

        if (Auth::user()->isAdmin()) {
            $status = !$feedback->comments_enabled;
            $feedback->update(['comments_enabled' => $status]);

            return response()->json(['status' => $status]);
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
