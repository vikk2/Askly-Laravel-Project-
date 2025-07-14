@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="mx-auto max-w-6xl">

    <div class="mt-30">
        <img src="{{ asset('img/askly-logo1.png')}}" alt="askly-logo" class="h-22 w-auto mb-4">
        <h1 class="font-geologica font-semibold text-5xl text-slate-700">A focuses place to <span class="text-blue">explore</span>, <span class="text-blue">learn</span>, and <span class="text-blue">share knowledge</span> — <span class="font-plexSans">built for curious minds.</span></h1>
        <p class="font-geologica font-extralight text-gray-600 text-xl mt-2">Get organized answers to your questions — fast, clear, and easy to explore.</p>
    </div>
    
</div>
<div class="bg-gray-100 max-w-7xl w-full mx-auto p-15 mt-40 font-geologica rounded-xl">
    <a href="/" class="">
        <img src="{{ asset('img/askly-high-resolution-logo-transparent.png')}}" alt="askly-logo" class="h-10 w-auto">
    </a>
    <h2 class="font-light text-slate-700 mt-5">Askly is a structured knowledge base built to deliver clear, concise answers — fast. Whether you're solving problems, learning new things, or just curious, Askly gives you simple, reliable explanations across a growing range of topics.</h2>
    <h3 class="font-semibold text-slate-700 text-md mb-5 mt-5">Ready to explore Askly?</h3>
    <a href="" class="bg-blue text-white font-bold text-sm px-7 py-3 rounded-xl">Get Started</a>
</div>

<div class="bg-gray-100 max-w-7xl w-full mx-auto p-15 mt-20 font-geologica rounded-xl">
    <h1 class="text-slate-700 font-bold text-3xl">Our Purpose</h1>
    <h2 class="font-light text-slate-700 mt-5">At Askly, we believe that knowledge should be accessible to all. We've created a platform where questions find answers, expertise is shared, and communities of knowledge can thrive together.</h2>
</div>

<div class="mt-20 py-16 px-6 rounded-xl max-w-7xl mx-auto font-geologica">
    <h2 class="text-4xl font-bold text-slate-700 text-center mb-14">
        What Makes Askly Special
    </h2>

    <div class="flex flex-col md:flex-row flex-wrap justify-center gap-16">
        {{-- Feature 1 --}}
        <div class="w-64 text-center">
            <div class="mx-auto mb-4 w-10 h-10 text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full fill-current">
                    <title>check</title>
                    <path d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 mb-2">Expert Verification</h3>
            <p class="text-sm text-gray-600">Content reviewed by subject matter experts</p>
        </div>

        {{-- Feature 2 --}}
        <div class="w-64 text-center">
            <div class="mx-auto mb-4 w-10 h-10 text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full fill-current"><title>magnify</title><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 mb-2">Smart Search</h3>
            <p class="text-sm text-gray-600">Find exactly what you need with our intelligent search system</p>
        </div>

        {{-- Feature 3 --}}
        <div class="w-64 text-center">
            <div class="mx-auto mb-4 w-10 h-10 text-blue">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full fill-current"><title>google-circles-communities</title><path d="M15,12C13.89,12 13,12.89 13,14A2,2 0 0,0 15,16A2,2 0 0,0 17,14C17,12.89 16.1,12 15,12M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M14,9C14,7.89 13.1,7 12,7C10.89,7 10,7.89 10,9A2,2 0 0,0 12,11A2,2 0 0,0 14,9M9,12A2,2 0 0,0 7,14A2,2 0 0,0 9,16A2,2 0 0,0 11,14C11,12.89 10.1,12 9,12Z" /></svg>
            </div>
            <h3 class="text-lg font-semibold text-slate-800 mb-2">Community Driven</h3>
            <p class="text-sm text-gray-600">Built by and for knowledge seekers like you</p>
        </div>
    </div>
</div>
<div class="bg-gray-100 max-w-7xl rounded-xl mx-auto py-12 px-6 flex flex-col gap-12 items-center justify-center mt-16 font-geologica mb-15">
    <h2 class="text-4xl font-semibold text-slate-700 text-center">
        Knowledge Base Impact
    </h2>

    <div class="flex flex-wrap md:flex-nowrap justify-center gap-40 w-full max-w-5xl mt-3">
        {{-- Impact Item 1 --}}
        <div class="flex flex-col items-center">
            <div class="text-blue text-4xl font-bold">5,000+</div>
            <div class="text-gray-600 text-base font-medium">Articles</div>
        </div>

        {{-- Impact Item 2 --}}
        <div class="flex flex-col items-center">
            <div class="text-blue text-4xl font-bold">50+</div>
            <div class="text-gray-600 text-base font-medium">Categories</div>
        </div>

        {{-- Impact Item 3 --}}
        <div class="flex flex-col items-center">
            <div class="text-blue text-4xl font-bold">98%</div>
            <div class="text-gray-600 text-base font-medium">Resolution Rate</div>
        </div>

        {{-- Impact Item 4 --}}
        <div class="flex flex-col items-center">
            <div class="text-blue text-4xl font-bold">24/7</div>
            <div class="text-gray-600 text-base font-medium">Availability</div>
        </div>
    </div>
</div>



@endsection