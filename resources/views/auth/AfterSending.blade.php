@extends('layouts.app')

@section('title', 'Askly')
@section('content')

<section class="mt-40">
    <div class="flex justify-center items-center">
        <div class="bg-white p-8 rounded-4xl shadow-lg text-center mb-6 max-w-lg mx-auto">
            <div class="flex justify-center mb-4">
                <svg class="w-10 h-10 text-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-xl font-bold text-gray-800">Check Your Email</h2>
            <p class="text-gray-600 mt-2">We've sent a password reset link to your email address. Please check your inbox and follow the instructions.</p>
            <div class="bg-sky-100 text-blue rounded-xl px-4 py-2 mt-4 font-medium">
                The link will expire in 30 minutes
        </div>
    </div>
</section>

@endsection