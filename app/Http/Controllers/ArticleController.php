<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;
use App\Models\Category;

class ArticleController extends Controller
{
    use AuthorizesRequests;
    // list the user's articles
    public function index(Request $request)
    {
        // // Get all articles, or filter by user if needed
        // $articles = Article::all(); // or ->where('user_id', auth()->id())->get();

        // // Return a view and pass the articles
        // return view('articles.index', compact('articles'));

        $query = Article::where('user_id', auth()->id());

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $articles = $query->latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }


    // view create article page
    public function create()
    {
        $categories = Category::all(); 
        return view('articles.create' , compact('categories'));
    }

    // store the article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|string',
            'status' => 'required|in:Published,Draft,Under Review',
            'visibility' => 'required|in:public,private,unlisted',
            'image_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);



        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('articles', 'public');
        }

        $finalStatus = $request->status === 'Published' ? 'Under Review' : $request->status;

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
            'status' => $finalStatus,
            'visibility' => $request->visibility,
            'comments_allowed' => $request->has('comments_allowed'),
            'published_at' => null,
            'image_url' => $imagePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('articles.index')
        ->with('success', $finalStatus === 'Draft'
            ? 'Article saved as draft.'
            : 'Article submitted for review.');
    }

    // delete the article
    public function destroy(Article $article){
        if ($article->user_id !== auth()->id()) {
            abort(403);
        }
        
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }

    // show single article
    public function show(Article $article){
        $article->load('category');
        if ($article->status !== 'Published' && $article->user_id !== auth()->id()) {
            abort(403); // Or return redirect()->route('home')->with('error', 'Unauthorized');
        }
        return view('articles.show', compact('article'));
    }

    // edit
    public function edit(Article $article)
    {
        $categories = Category::all();
        $this->authorize('update', $article);

        return view('articles.edit', compact('article', 'categories'));
    }

    // update 
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:Draft,Published',
            'visibility' => 'required|in:public,private',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'comments_allowed' => 'nullable|boolean',
            'category_id' => 'nullable|exists:categories,id',
        ]);
        

        

        if ($request->hasFile('image_url')) {
            // delete old image if exists
            if ($article->image_url) {
                Storage::disk('public')->delete($article->image_url);
            }

            $data['image_url'] = $request->file('image_url')->store('articles', 'public');
        }
        
        if ($request->status === 'Published' && !$article->published_at) {
            $data['published_at'] = now();
        }

        if (
            $request->status === 'Published')// Adjust this to your admin check
        {
            $data['status'] = 'Under Review';
        }
        

        $article->comments_allowed = $request->boolean('comments_allowed');
        $data['category_id'] = $request->category_id;

        $article->update($data);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }



}
