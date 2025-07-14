@extends('layouts.app')

@section('content')

<div class="m-5">
    
    <div class="flex items-center">

        <div>
            <h1 class="font-geologica text-3xl font-bold text-slate-700">My Articles</h1>
            <p class="font-geologica text-slate-700 mt-2 font-light">Manage articles you've created</p>
        </div>
        
        <a href="{{ route('articles.create', ['username' => Auth::user()->username]) }}"
        class="text-sm flex items-center gap-3 ml-auto bg-blue hover:bg-[#357ABD] text-[#F9FAFB] font-semibold py-3 px-4 rounded-xl shadow-sm transition duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-[15px] h-[15px] mt-[2px] fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>    
        Create New Article
        </a>

    </div>

    <form method="GET" action="{{ route('articles.index') }}" class="mt-6 flex items-center gap-3">
        <label for="status" class="text-sm text-gray-700 font-medium">Filter by Status:</label>
        <div class="relative">
        <select name="status" id="status" onchange="this.form.submit()" class="border border-gray-300 rounded-lg py-2 px-3 text-sm appearance-none focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue transition">
                <option value="">All</option>
                <option value="Published" {{ request('status') === 'Published' ? 'selected' : '' }}>Published</option>
                <option value="Draft" {{ request('status') === 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Under Review" {{ request('status') === 'Under Review' ? 'selected' : '' }}>Under Review</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                <svg class="w-4 h-4 my-auto" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
        </div>
    </form>

    @if($articles->isEmpty())
        <p class="mt-8 text-gray-500 font-geologica">You haven't published any articles yet.</p>
    @endif
    
    @foreach($articles as $article)
    <div class="mt-6">
        <div class="p-6 border-[1px] border-gray-300 rounded-xl bg-white hover:shadow-sm transition">
            <div class="flex items-center">
                <div class="block">
                    <h2 class="text-xl font-bold text-slate-700 mb-2">
                        <a href="{{ route('articles.show', ['article' => $article->id, 'from' => 'my-articles']) }}" class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </h2>
                    
                    <div class="text-gray-500 text-sm">Last edited: {{ $article->created_at->diffForHumans() }}</div>
                    <p class="text-sm text-gray-500">Views: {{ $article->views }}</p>
                </div>

                <div class="text-xs text-gray-500 ml-auto">
                    @if($article->status === 'Published')
                    <span class="bg-green-100 text-green-700 font-medium px-3 py-1 rounded-full">Published</span>
                    @elseif($article->status === 'Draft')
                    <span class="bg-yellow-100 text-yellow-700 font-medium px-3 py-1 rounded-full">Draft</span>
                    @elseif($article->status === 'Under Review')
                    <span class="bg-gray-100 text-gray-700 font-medium px-3 py-1 rounded-full">Under Review</span>
                    @endif
                </div>
            </div>

            
            <div class="border-t border-gray-300 mt-4 pt-5 flex space-x-4 items-center">
                <a href="{{ route('articles.edit', $article) }}" class="text-gray-600 flex text-sm font-semibold px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 my-auto">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
    
                Edit</a>
                <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-gray-600 text-sm font-semibold px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg flex gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 my-auto">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="mt-6">
        {{ $articles->appends(request()->query())->links() }} {{-- Laravel pagination links --}}
    </div>
</div>
@endsection