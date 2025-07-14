@php
    $isReply = $comment->parent_id !== null;
@endphp

<div class="bg-white rounded-lg shadow p-4 {{ $isReply ? 'ml-8 border-l-4 border-blue-400' : '' }}">
    <div class="flex justify-between items-start mb-2">
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0">
                <img
                    src="{{ $comment->user->profile_picture_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($comment->user->username) . '&background=357ABD&color=fff&size=40' }}"
                    alt="{{ $comment->user->username }}"
                    class="w-8 h-8 rounded-full object-cover"
                >
            </div>
            <div>
                <p class="font-semibold text-gray-700 capitalize">{{ $comment->user->firstName }} {{ $comment->user->lastName }}</p>
                <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>

        @if (auth()->check() && auth()->id() === $comment->user_id)
            <div class="flex items-center space-x-2">
                <button onclick="document.getElementById('edit-form-{{ $comment->id }}').classList.toggle('hidden')"
                    class="text-sm text-blue-500 hover:underline">
                    Edit
                </button>

                <form action="{{ route('comments.destroy', $comment) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this comment?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-sm text-red-400 hover:underline">Delete</button>
                </form>
            </div>
        @endif
    </div>

    <p class="text-gray-700 whitespace-pre-line">{{ $comment->content }}</p>

    @if(auth()->id() === $comment->user_id)
        <form
            id="edit-form-{{ $comment->id }}"
            action="{{ route('comments.update', $comment) }}"
            method="POST"
            class="hidden mt-2"
        >
            @csrf
            @method('PUT')
            <textarea
                name="content"
                rows="3"
                class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-blue-500 focus:border-blue-500 resize-none"
                required
            >{{ $comment->content }}</textarea>
            <div class="flex space-x-2 mt-2">
                <button type="submit" class="bg-blue text-white px-4 py-1 rounded-xl hover:bg-[#357ABD] transition">Update</button>
                <button
                    type="button"
                    onclick="document.getElementById('edit-form-{{ $comment->id }}').classList.add('hidden')"
                    class="bg-gray-300 px-4 py-1 rounded-xl hover:bg-gray-400 transition"
                >
                    Cancel
                </button>
            </div>
        </form>
    @endif

    <button
        onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')"
        class="text-sm text-blue mt-3 hover:underline focus:outline-none"
    >
        Reply
    </button>

    <form action="{{ route('comments.store', $comment->article_id) }}" method="POST" class="mt-3 hidden" id="reply-form-{{ $comment->id }}">
        @csrf
        <textarea name="content" rows="3" class="w-full border border-gray-300 rounded-md p-2 text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Write your reply..." required></textarea>
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <button type="submit" class="mt-2 bg-blue text-white px-4 py-1 rounded-xl hover:bg-[#357ABD] transition">Post Reply</button>
    </form>

    @if ($comment->replies && $comment->replies->count())
        @foreach ($comment->replies as $reply)
            @include('comments._comment', ['comment' => $reply])
        @endforeach
    @endif
</div>