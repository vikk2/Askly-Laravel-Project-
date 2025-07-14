<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');

    $articles = Article::where('status', 'Published')
        ->whereNotNull('published_at')
        ->when($search, function ($query, $search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
        })
        ->orderBy('published_at', 'desc')
        ->paginate(12);

    

    return view('blog.index', compact('articles'));
}



    public function publicShow(Article $article)
    {
        if (auth()->id() !== $article->user_id) {
            $article->increment('views');
        }
        
        if ($article->status !== 'Published' || $article->visibility !== 'public') {
            abort(404); // Don't let people see drafts or private articles
        }

        

        return view('blog.show', compact('article'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        // Increment views safely
        

        // Return the view with the article
        return view('blog.show', compact('article'));
    }
}
