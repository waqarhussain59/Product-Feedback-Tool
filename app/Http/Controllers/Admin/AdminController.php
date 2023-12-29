<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Comment;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {

        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('admin.users')->with('error', 'User not found.');
        }
    }

    public function feedbackItems()
    {
        $feedbackItems = Feedback::all();
        return view('admin.feedback', compact('feedbackItems'));
    }

    public function deleteFeedbackItem($id)
    {
        $feedbackItem = Feedback::find($id);
        if ($feedbackItem) {
            $feedbackItem->delete();
            return redirect()->route('admin.feedbackItems')->with('success', 'Feedback item deleted successfully.');
        } else {
            return redirect()->route('admin.feedbackItems')->with('error', 'Feedback item not found.');
        }
    }

}
