
@extends('layouts.app')

@section('content')

<!-- avatar icon -->
<div class="m-5">
    <div class="flex items-center">
        <!-- Avatar  -->
        <img src="{{ Auth::user()->profile_picture_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->username) . '&background=4A90E2&color=fff&size=40' }}"
            alt="User Avatar"
            class="w-18 h-18 rounded-full cursor-pointer object-cover" />

        <div class="block ml-5 mb-1">
            <h2 class="font-geologica font-medium text-3xl text-slate-700 capitalize">
                {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
            </h2>    
            <h3 class="font-geologica font-light text-sm text-[#6B7280]">
                {{ Auth::user()->email }}
            </h3>
        </div>

        
        <a href="{{ route('settings', ['username' => Auth::user()->username]) }}"
        class="ml-auto bg-blue hover:bg-[#357ABD] text-[#F9FAFB] font-semibold py-3 px-6 rounded-xl shadow-sm transition duration-200">
            Edit Profile
        </a>
    </div>

    <div class="max-w-2xl bg-white p-6 rounded-xl shadow-md mt-8 font-geologica">
        <h2 class="text-xl font-semibold text-blue mb-1">About Me</h2>
        <p class="text-gray-600 italic leading-relaxed font-geologica">
            {{ Auth::user()->bio ?? 'No bio added yet.' }}
        </p>
    </div>

    <div class="max-w-2xl mt-8 p-6 bg-white rounded-xl shadow-md border border-gray-200">
        <h2 class="text-2xl font-semibold text-gray-800 font-geologica mb-4">Expertise</h2>           
        @include('components.expertise-badges', ['expertise' => $user->expertise ?? []])
    </div>
</div>

@endsection

