@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full mx-auto px-4 py-10">

    <!-- profile -->
    <div class="mb-8 flex justify-between">
        <h1 class="text-4xl font-bold text-slate-700">Your Dashboard</h1>
        <div class="flex items-center gap-4">
            <img src="{{ Auth::user()->profile_picture_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->username) . '&background=4A90E2&color=fff&size=40' }}" alt="Profile Picture" class="w-16 h-16 rounded-full object-cover border border-gray-300">
            <div>
                <h2 class="text-lg font-semibold text-slate-700 capitalize font-geologica">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h2>
            </div>
            <a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
                class="text-sm text-white bg-blue hover:bg-[#357ABD] py-2 px-3 rounded-xl">
                View Profile
            </a>
            
        </div>
        

    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-10 text-sm text-slate-700 font-geologica">
        <div class="bg-gray-100 p-4 rounded-xl">
            <p class="font-semibold text-lg">{{ Auth::user()->articles()->count() }}</p>
            <p class="text-gray-500">Total Articles</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl">
            <p class="font-semibold text-lg">{{ Auth::user()->articles()->where('status', 'Published')->count() }}</p>
            <p class="text-gray-500">Published</p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl">
            <p class="font-semibold text-lg">{{ Auth::user()->articles()->where('status', 'Draft')->count() }}</p>
            <p class="text-gray-500">Drafts</p>
        </div>
    </div>

    {{-- Shortcuts --}}
    <div class="flex gap-4 mb-12">
        <a href="{{ route('articles.index') }}"
            class="bg-blue text-white px-4 py-2 rounded-xl hover:bg-[#357ABD] transition">
            Go to My Articles
        </a>
        <!-- <a href="{{ route('articles.create') }}"
            class="border border-blue text-blue px-4 py-2 rounded-lg hover:bg-blue-50 transition">
            + New Article
        </a>
        <a href="{{ route('settings', Auth::user()->username) }}"
            class="text-gray-600 hover:underline px-4 py-2 rounded-lg">
            Edit Profile
        </a> -->
    </div>

   
    <h3 class="text-xl font-semibold text-slate-700 mb-5 font-geologica">Recent Articles</h3>

    @php
        $recent = Auth::user()->articles()->latest()->take(4)->get();
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($recent as $article)
            <div class="p-3 bg-white rounded-xl shadow-sm hover:shadow-md transition flex flex-col h-full">
                @if ($article->image_url)
                    <img    
                        src="{{ asset('storage/' . $article->image_url) }}" 
                        alt="{{ $article->title }}" 
                        class="w-full h-[240px] object-cover rounded-xl mb-4"
                        loading="lazy"
                    >
                @endif
                @if ($article->published_at)
                    <p class="text-sm text-gray-400 mb-1">
                        {{ $article->published_at->format('F j, Y') }}
                    </p>
                @endif
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('articles.show', ['article' => $article->id, 'from' => 'dashboard']) }}" class="text-slate-700 hover:underline font-bold">
                        {{ $article->title }}
                    </a>
                </h2>
                <p class="mt-3 text-gray-700 line-clamp-4 flex-grow">{!! Str::limit(strip_tags($article->body), 200) !!}</p>
                <div class="flex items-center justify-between mt-4 text-blue hover:text-[#357ABD] font-semibold">
                    <a href="{{ auth()->check() && auth()->id() === $article->user->id ? route('dashboard', ['username' => auth()->user()->username]) : url('/' . $article->user->username) }}" class="flex items-center gap-3 text-gray-600">
                        <img 
                            src="{{ asset($article->user->profile_picture_url) }}" 
                            alt="{{ $article->user->username }}" 
                            class="w-8 h-8 rounded-full object-cover border border-gray-300"
                        />
                        <div class="text-sm">
                            <p class="font-semibold text-slate-700">{{ $article->user->username }}</p>
                        </div>
                    </a>
                    <a href="{{ route('articles.show', ['article' => $article->id, 'from' => 'dashboard']) }}" class="w-9 h-9 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current text-blue" aria-hidden="true" focusable="false">
                            <title>arrow-top-right</title>
                            <path d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-gray-500">You haven’t published anything yet.</p>
        @endforelse
    </div>

</div>
@endsection