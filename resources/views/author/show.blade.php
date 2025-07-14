@extends('layouts.app')

@section('content')
<div class="w-full mx-auto py-10 px-4">
    <div class="flex items-center gap-5 mb-10">
        <img src="{{ asset($user->profile_picture_url) }}"
             class="w-20 h-20 rounded-full object-cover border border-gray-300" 
             alt="{{ $user->username }}">
        <div>
            <h1 class="text-3xl font-bold text-slate-700 capitalize mb-2">{{ $user->firstName }} {{ $user->lastName }}</h1>
            <p class="text-gray-600">{{ $user->bio ?? 'No bio yet.' }}</p>
        </div>
    </div>

    <div class="mb-10">
        <h2 class="text-xl font-semibold text-slate-700 mb-4">Expertise</h2>
        @include('components.expertise-badges', ['expertise' => $user->expertise ?? []])
    </div>

    @if ($articles->isEmpty())
        <p class="text-gray-500">This user hasn't published any articles yet.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($articles as $article)
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
                        <a href="{{ route('blog.show', ['article' => $article->id, 'from' => 'author', 'username' => $user->username, 'page' => request()->get('page', 1)]) }}" class="text-slate-700 hover:underline font-bold">
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
                                <p class="font-semibold text-slate-700 capitalize font-geologica">{{ $article->user->firstName }} {{ $article->user->lastName }}</p>
                            </div>
                        </a>
                        <a href="{{ route('blog.show', ['article' => $article->id, 'search' => request('search'), 'page' => request()->get('page', 1)]) }}" class="w-9 h-9 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current text-blue" aria-hidden="true" focusable="false">
                                <title>arrow-top-right</title>
                                <path d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection