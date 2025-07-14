    @extends('layouts.app')

    @section('title', 'Forgot Password')
    @section('content')

    <section class="mt-40">
        <div class="flex justify-center items-center">
            <div class="w-full max-w-lg bg-white p-8 rounded-4xl shadow-lg" id="forgot-password-form">
                <div class="text-center font-geologica mb-5">
                    <h1 class="font-bold text-4xl text-slate-700">Forgot Password?</h1>
                    <p class="text-slate-500 mt-2 text-md font-medium">Enter your email and we'll send you a reset link.</p>
                </div>

                @if (session('status'))
                    <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg text-center mb-5">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg text-center mb-5">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <form action="{{ route('password.email') }}" method="post" class="space-y-5">
                    @csrf
                    <!-- first name and last name -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                        id="email"
                        name="email"
                        type="email"
                        required
                        placeholder="your@email.com"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-md focus:ring focus:ring-blue-200 focus:outline-none placeholder-gray-400 font-geologica"
                        />
                    </div>

                    <div>
                        <button
                        type="submit"
                        class="w-full font-geologica bg-blue text-white py-2 rounded-md hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1]"
                        >
                        Send Reset Link
                        </button>
                    </div>
                </form>
                <p class="mt-4 text-sm text-gray-600 text-center font-geologica">
                Remembered your password?
                <a href="/log-in-page" class="text-blue hover:text-[#357ABD] font-semibold ml-1">Log in</a>
                </p>
            </div>

            <!-- <div class="bg-white p-8 rounded-4xl shadow-lg text-center mb-6 max-w-lg mx-auto hidden" id="success-message" >
                <div class="flex justify-center mb-4">
                    <svg class="w-10 h-10 text-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Check Your Email</h2>
                <p class="text-gray-600 mt-2">We've sent a password reset link to your email address. Please check your inbox and follow the instructions.</p>
                <div class="bg-sky-100 text-blue rounded-xl px-4 py-2 mt-4 font-medium">
                    The link will expire in 30 minutes
            </div> -->
        </div>
    </section>
    @endsection
