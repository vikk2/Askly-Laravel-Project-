@extends('layouts.app')

@section('content')
<a href="{{ 
    request('from') === 'author' ? url('/' . request('username')) :
    route('blog.index', ['page' => request('page', 1), 'search' => request('search')])
 }}"
    class="flex items-center text-blue hover:text-[#357ABD] transition m-5 font-geologica font-medium">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current"><title>keyboard-backspace</title><path d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg> 
</a>
<div class="max-w-4xl mx-auto py-5 px-6">
    
    @if($article->image_url)
    <div class="mb-7">
        <img src="{{ asset('storage/' . $article->image_url) }}" alt="Article Image" class="w-full rounded-xl shadow">
    </div>
    @endif


    <!-- category -->
    @if ($article->category)
        <span class="text-sm text-white mb-3 inline-block bg-blue rounded-2xl px-3 py-1 font-geologica">
            {{ $article->category->name }}
        </span>
    @else
        <span class="text-sm text-white bg-gray-400 mb-3 inline-block rounded-2xl px-3 py-1 font-geologica">
            Uncategorized
        </span>
    @endif
    <!-- article title -->
    <h1 class="text-5xl font-bold text-slate-800 mb-2 font-geologica">{{ $article->title }}</h1>

    
    <div class="flex justify-between items-center mt-3 text-gray-600">
        <!-- Left: Author Info -->
        <div class="flex items-center gap-3">
            <!-- Avatar and Name as Link -->
            <a href="{{ auth()->check() && auth()->id() === $article->user->id 
                        ? route('dashboard', ['username' => auth()->user()->username]) 
                        : url('/' . $article->user->username) }}" 
            class="flex items-center gap-3 text-slate-700 hover:underline"
            >
                <img 
                    src="{{ asset($article->user->profile_picture_url) }}" 
                    alt="{{ $article->user->username }}" 
                    class="w-9 h-9 rounded-full object-cover border border-gray-300"
                />
                <p class="font-semibold capitalize">
                    {{ $article->user->firstName }} {{ $article->user->lastName }}
                </p>
            </a>

            <!-- Published Date (outside the link) -->
            <span class="text-gray-400 text-xs">•</span>
            <span class="text-sm text-gray-500">
                Posted {{ optional($article->published_at)->format('F j, Y') }}
            </span>
        </div>


        <!-- Right: Share Buttons -->
        <div class="flex items-center gap-3">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="w-9 h-9 flex items-center justify-center bg-blue text-white rounded-full hover:bg-[#357ABD] transition"  target="_blank" rel="noopener noreferrer" title="Share on Facebook">
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4 fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg>
            </a>

            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($article->title) }}" class="w-9 h-9 flex items-center justify-center bg-blue text-white rounded-full hover:bg-[#357ABD] transition" target="_blank" rel="noopener noreferrer" title="Share on Twitter">
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
            </a>

            <button 
                onclick="navigator.clipboard.writeText('{{ request()->fullUrl() }}').then(() => { alert('Link copied to clipboard!'); })" 
                class="w-9 h-9 flex items-center justify-center bg-blue text-white rounded-full hover:bg-[#357ABD] transition"
                title="Copy Link"
            >
                <!-- link -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-4 h-4 fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
            </button>

        </div>
    </div>
    

    
    <!-- content -->
    <div class="prose max-w-none text-slate-700 mt-5">
        {!! \Illuminate\Support\Str::markdown($article->body) !!}
    </div>


    <!-- About the Author -->
    <div class="mt-12 bg-gray-100 rounded-xl p-5 flex items-start gap-5">
        <a href="{{ auth()->check() && auth()->id() === $article->user->id ? route('dashboard', ['username' => auth()->user()->username]) : url('/' . $article->user->username) }}" class="block flex-shrink-0">
            <img 
                src="{{ asset($article->user->profile_picture_url) }}" 
                alt="{{ $article->user->username }}" 
                class="w-16 h-16 rounded-full object-cover border border-gray-300 hover:ring-3 hover:ring-blue transition"
                loading="lazy"
            >
        </a>

        <div>
            <a href="{{ auth()->check() && auth()->id() === $article->user->id ? route('dashboard', ['username' => auth()->user()->username]) : url('/' . $article->user->username) }}" class="text-lg font-semibold text-slate-700 capitalize hover:underline hover:text-blue">
                {{ $article->user->firstName }} {{ $article->user->lastName }}
            </a>
            
            <p class="text-sm text-gray-600 mt-1">
                {{ $article->user->bio ?? 'This author writes about tech, tutorials, and insights from experience.' }}
            </p>
        </div>
    </div>

    <!-- comment section -->
    <div class="max-w-4xl mx-auto space-y-8 mt-8 font-geologica">

    <h3 class="text-2xl font-semibold text-gray-700 mb-6 ">Comments ({{ $article->comments->count() }})</h3>

    @foreach ($article->comments as $comment)
        @include('comments._comment', ['comment' => $comment])
    @endforeach

    {{-- New comment form --}}
    <div class="bg-white rounded-lg shadow p-6">
        <h4 class="text-lg font-semibold mb-3">Leave a Comment</h4>
        <form action="{{ route('comments.store', $article) }}" method="POST">
        @csrf
        <textarea name="content" rows="4" class="w-full border border-gray-300 rounded-md p-3 text-sm focus:ring-blue-500 focus:border-blue-500 resize-none" placeholder="Write your comment here..." required></textarea>
        <button type="submit" class="mt-3 bg-blue text-white px-6 py-2 rounded-xl hover:bg-[#357ABD] transition">Post Comment</button>
        </form>
    </div>
    </div>

</div>  

@endsection