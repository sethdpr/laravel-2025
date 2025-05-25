<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\NewsItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, NewsItem $newsItem)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $newsItem->comments()->create([
            'body' => $request->body,
            'user_id' => optional(Auth::user())->id,
        ]);

        return redirect()->back()->with('success', 'Reactie geplaatst.');
    }

    public function destroy(Comment $comment)
    {
        if (!Auth::user() || !Auth::user()->is_admin) {
            abort(403);
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted');
    }
}