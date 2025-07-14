<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $article->comments()->create([
            'content' => $request->input('content'),
            'user_id' => auth()->id(),
            'parent_id' => $request->parent_id,
        ]);

        

        return back()->with('success', 'Comment posted!');
    }

    // delete the comment
    public function destroy(Comment $comment)
    {
        // Optional: authorize so users can only delete their own comments
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'Unauthorized');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted.');
    }

    // edit the comment
    public function update(Request $request, Comment $comment)
    {
        // Authorize only the comment owner
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Comment updated successfully.');
    }
}
