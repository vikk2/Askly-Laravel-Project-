@extends('layouts.app')

@section('content')
<a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
    class="flex items-center text-blue hover:text-[#357ABD] transition m-5 mb-8 font-geologica font-medium">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 fill-current"><title>keyboard-backspace</title><path d="M21,11H6.83L10.41,7.41L9,6L3,12L9,18L10.41,16.58L6.83,13H21V11Z" /></svg>
</a>
<div class="m-5 max-w-md">
    <h1 class="text-3xl font-bold font-geologica mb-1 text-slate-700">Edit Profile</h1>
    <p class="font-geologica text-slate-700 mb-6 font-light">Information you add here is visible to anyone who can view your profile.</p>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-500 rounded-xl px-4 py-4 max-w-md">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('settingsUpdate', ['username' => $user->username]) }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4 max-w-md">
            <label class="block font-medium mb-2 text-gray-700 font-geologica">Profile Picture</label>

            <!-- Image with "Change" button -->
            <div class="relative w-24 h-24">
                <!-- Preview Image -->
                <img id="preview" 
                    src="{{ Auth::user()->profile_picture_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->username) . '&background=4A90E2&color=fff&size=40' }}" 
                    class="w-24 h-24 rounded-full object-cover border shadow">

                <!-- Change Button -->
                <label for="profile_picture" class="absolute inset-0 bg-gray-700 bg-opacity-40 flex items-center justify-center text-white text-sm font-medium rounded-full cursor-pointer opacity-0 hover:opacity-100 transition">
                    Change
                </label>
            </div>

            <!-- Hidden File Input -->
            <input type="file" name="profile_picture" id="profile_picture" class="hidden" accept="image/*">
            
            @error('profile_picture')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 max-w-md">
            <label for="first_name" class="block font-medium mb-1 text-gray-700 font-geologica">First name</label>
            <input type="text" name="firstName" id="first_name"
                placeholder="First name"
                value="{{ old('firstName', $user->firstName) }}"
                class="w-full border rounded-xl px-4 py-4 border-gray-400 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica"
                required>
            @error('first_name')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4 max-w-md">
            <label for="last_name" class="block font-medium mb-1 text-gray-700 font-geologica">Last name</label>
            <input type="text" name="lastName" id="last_name" placeholder="Last name" value="{{ old('lastName', $user->lastName) }}" class="w-full border-gray-400 border rounded-xl px-4 py-4 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica" required>
            @error('last_name')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4 max-w-md">
            <label for="email" class="block font-medium mb-1 text-gray-700 font-geologica">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email', $user->email) }}" class="w-full border-gray-400 border rounded-xl px-4 py-4 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica" required>
            @error('email')<p class="text-red-400 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4 max-w-md">
            <label for="bio" class="block mb-1 text-gray-700 font-semibold font-geologica">Bio</label>
            <textarea id="bio" name="bio" rows="5" placeholder="Tell us about yourself..." class="w-full border border-gray-400 rounded-xl px-4 py-4 text-gray-900 text-base leading-relaxed resize-none focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica"
            >{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4 max-w-md">
            <label for="expertise" class="block font-medium mb-1 text-gray-700 font-geologica">Expertise (comma-separated)</label>
            <input type="text" name="expertise" id="expertise"
                value="{{ old('expertise', is_array($user->expertise) ? implode(', ', $user->expertise) : '') }}"
                placeholder="e.g., Programming, Health, AI"
                class="w-full border border-gray-400 rounded-xl px-4 py-4 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica">
            @error('expertise')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6 max-w-md">
            <label for="username" class="block font-medium mb-1 text-gray-700 font-geologica">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username', $user->username) }}" class="w-full border border-gray-400 rounded-xl px-4 py-4 focus:outline-none focus:ring-1 focus:ring-blue focus:border-blue font-geologica">
            <p class="mt-2 text-sm text-gray-500 font-geologica font-light">
                Profile URL: <span id="usernamePreview" class="text-gray-500 font-light">{{ url('/' . $user->username) }}</span>
            </p>
            @error('profile_picture_url')
                <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue text-white px-6 py-2 rounded-lg hover:bg-[#357ABD] transition">Save Changes</button>
    </form>
</div>

@endsection