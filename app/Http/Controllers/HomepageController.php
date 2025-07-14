<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomepageController extends Controller
{
    public function index()
    {
        $popularArticles = Article::where('status', 'Published')
            ->whereNotNull('published_at')
            ->orderBy('views', 'desc')
            ->take(4)
            ->with('user', 'category') // eager load relationships
            ->get();

        return view('home', compact('popularArticles'));
    }
}
