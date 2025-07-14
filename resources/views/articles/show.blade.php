@extends('layouts.app')

@section('content')
<a href="{{ request('from') === 'dashboard' 
    ? route('dashboard', ['username' => Auth::user()->username]) 
    : route('articles.index') }}"
    class="flex items-center text-blue hover:text-[#357ABD] transition m-5 font-geologica font-medium">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current"><title>keyboard-backspace</title><path d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg>
</a>
<div class="max-w-4xl mx-auto py-5 px-6">
    
    @if($article->image_url)
    <div class="mb-6">
        <img src="{{ asset('storage/' . $article->image_url) }}" alt="Article Image" class="w-full rounded-lg shadow">
    </div>
    @endif

    @if ($article->category)
        <span class="text-sm text-white mb-3 inline-block bg-blue rounded-2xl px-3 py-1 font-geologica">
            {{ $article->category->name }}
        </span>
    @else
        <span class="text-sm text-white bg-gray-400 mb-3 inline-block rounded-2xl px-3 py-1 font-geologica">
            Uncategorized
        </span>
    @endif
    <h1 class="text-4xl font-bold text-slate-800 mb-2">{{ $article->title }}</h1>

    <div class="text-sm text-gray-500 mb-6">
        {{ $article->created_at->format('F j, Y') }}  • 
        Last updated {{ $article->created_at->diffForHumans() }}  •   
        Status:
        @if($article->status === 'Published')
            <span class="bg-green-100 text-green-700 font-medium px-2 py-1 rounded-full text-xs">Published</span>
        @elseif($article->status === 'Draft')
            <span class="bg-yellow-100 text-yellow-700 font-medium px-2 py-1 rounded-full text-xs">Draft</span>
        @else
            <span class="bg-gray-100 text-gray-700 font-medium px-2 py-1 rounded-full text-xs">Under Review</span>
        @endif
    </div>

    

    <div class="prose max-w-none text-slate-700">
        {!! \Illuminate\Support\Str::markdown($article->body) !!}
    </div>

</div>
@endsection