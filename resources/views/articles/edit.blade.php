@extends('layouts.app')

@section('content')
<a href="{{ route('articles.index') }}" class="flex items-center text-blue hover:text-[#357ABD] transition m-5 mb-8 font-geologica font-medium">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current"><title>keyboard-backspace</title><path d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg>
</a>

<div class="m-5">
    <h1 class="text-xl font-bold font-geologica mb-1 text-slate-700">Edit Article</h1>
    <p class="font-geologica text-slate-700 mb-6 font-light text-md">Update your article details and content.</p>

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-500 rounded-xl px-4 py-4">
            <ul class="list-disc pl-6">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-8 font-geologica">
        @csrf
        @method('PUT')

        <div class="flex-1 space-y-6 text-sm">
            <div>
                <label for="title" class="block font-medium text-gray-700">Article Title</label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $article->title) }}"
                    class="w-full border rounded-xl px-4 py-4 border-gray-400 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue"
                    required>
            </div>

            <div>
                <label for="category_id" class="block font-medium text-gray-700">Category</label>

                <div class="relative">
                    <select name="category_id" id="category_id"
                        class="w-full appearance-none border border-gray-400 rounded-xl px-4 py-4 bg-white text-gray-800 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue transition pr-10">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-gray-500 text-xs font-light mt-1">Choose a category for your article</p>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="w-4 h-4 mb-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div>
                <label for="tiptap-editor" class="block font-medium text-gray-700 mb-1">Content</label>
                <div id="app">
                    <tiptap-editor :initial-content="@js($article->body)"></tiptap-editor>
                </div>
            </div>

            <div class="min-w-sm mx-auto">
                <label for="image_url" class="block font-medium text-gray-700 mb-2">Update Cover Image</label>

                <div id="dropzone" class="relative w-full max-w-xl aspect-video border-2 border-dashed border-gray-300 bg-gray-100 rounded-3xl cursor-pointer hover:bg-gray-200 transition overflow-hidden">
                    @if ($article->image_url)
                        <img id="imagePreview" src="{{ asset('storage/' . $article->image_url) }}" alt="Image Preview" class="absolute inset-0 w-full h-full object-cover rounded-3xl" />
                    @else
                        <div id="dropzoneText" class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 mb-2 fill-slate-700"><path d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z"/></svg>
                            <p class="text-sm text-gray-700">Choose a file or drag and drop<br>it here</p>
                            <p class="text-xs text-gray-500 mt-4">PNG or JPG up to 5MB</p>
                        </div>
                    @endif
                </div>
                <input type="file" id="image_url" name="image_url" accept="image/*" class="hidden">
            </div>

            <h3 class="font-semibold text-slate-700 text-lg">Article Settings</h3>
            <div class="grid grid-cols-2 gap-4 -mt-4">
                <div>
                    <label for="status" class="block font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="w-full border border-gray-400 rounded-xl px-4 py-4">
                        <option value="Draft" {{ $article->status === 'Draft' ? 'selected' : '' }}>Draft</option>
                        <option value="Published" {{ $article->status === 'Published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div>
                    <label for="visibility" class="block font-medium text-gray-700">Visibility</label>
                    <select name="visibility" id="visibility" class="w-full border border-gray-400 rounded-xl px-4 py-4">
                        <option value="public" {{ $article->visibility === 'public' ? 'selected' : '' }}>Public</option>
                        <option value="private" {{ $article->visibility === 'private' ? 'selected' : '' }}>Private</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="inline-flex items-center text-gray-700">
                    <input
                    type="hidden"
                    name="comments_allowed"
                    value="0"
                    />
                    <input
                    type="checkbox"
                    name="comments_allowed"
                    value="1"
                    class="form-checkbox h-5 w-5 text-blue"
                    {{ old('comments_allowed', $article->comments_allowed) ? 'checked' : '' }}
                    />
                    <span class="ml-2">Allow people to comment</span>
                </label>
            </div>

            <button type="submit" class="bg-blue text-white px-6 py-2 rounded-lg hover:bg-[#357ABD] transition w-fit">
                Update Article
            </button>
        </div>
    </form>
</div>
@endsection