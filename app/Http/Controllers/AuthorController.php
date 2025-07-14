<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
    // profile for public
    public function showByUsername($username)
    {
        // find user by username
        $user = User::where('username', $username)->firstOrFail();

        // Get published articles
        $articles = $user->articles()
            ->where('status', 'Published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(12);

        // Return the public profile view
        return view('author.show', compact('user', 'articles'));
    }
}
