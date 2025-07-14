@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-20 font-geologica">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-35 items-center">
        
        
        <div>
            <h1 class="text-5xl font-bold text-slate-700 leading-tight">
                Contact <span class="text-blue">Askly</span>
            </h1>
            <p class="text-slate-500 text-lg mt-4 font-light">
                We'd love to hear from you. Whether you have a question, feedback, or need help — just drop us a message!
            </p>
        </div>

        
        <div class="bg-white p-8 rounded-4xl shadow-lg">
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf

                <div class="space-y-1">
                    <h2 class="text-slate-700 font-bold text-lg">Send a message</h2>
                    <p class="text-gray-500 font-light text-sm">Fill out the form below and we'll get back to you as soon as possible.</p>
                </div>
                
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" required placeholder="Your name"
                        value="{{ old('name') }}"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium placeholder:text-sm" />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email"
                        value="{{ old('email') }}"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium placeholder:text-sm" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                    <textarea name="message" id="message" rows="5" required placeholder="Write your message here..."
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium resize-none overflow-y-scroll placeholder:text-sm">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-blue text-white py-2 rounded-xl hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1] font-geologica">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection