 @extends('layouts.app')

 @section('content')
 <section class="mt-40">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-8 rounded-4xl shadow-lg">
            <div class="text-center font-geologica mb-8">
                <img src="{{ asset('img/askly-logo1.png')}}" alt="askly_logo" class="w-12 h-12 mx-auto">
                <h1 class="font-bold text-4xl text-slate-700 mt-5">Welcome to <span class="text-blue">Askly</span></h1>
                <!-- <h2 class="text-slate-700 mt-4 text-xl font-medium">Log in to your Askly account</h2> -->
            </div>

            
            <form action="/login" method="post" class="space-y-5 font-geologica">
                @csrf
                <!-- first name and last name -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" required placeholder="Email"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required placeholder="Password"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium" />
                    </div>

                <!-- error message -->
                    @error('email')
                        <div class="text-red-400 text-sm font-geologica">{{ $message }}</div>
                    @enderror
                    

                    <!-- Forgot Password -->
                    <div class="flex justify-between items-center text-md">
                        <a href="{{ route('password.request') }}" class="text-blue hover:underline font-geologica">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full bg-blue text-white py-2 rounded-xl hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1] font-geologica">
                        Log In
                        </button>
                    </div>

                    <!-- OR Divider -->
                    <!-- <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-md text-gray-500">
                        <span class="bg-white px-2 font-geologica">or</span>
                        </div>
                    </div> -->

                    <!-- Google Login -->
                    <!-- <a href="#"
                        class="flex items-center justify-center gap-3 border border-gray-300 rounded-xl px-5 py-2 hover:bg-gray-50 transition duration-200 text-gray-700 font-semibold text-sm">
                        <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M533.5 278.4c0-17.6-1.5-34.6-4.3-51H272v96.6h146.9c-6.3 33.7-25 62.3-53.4 81.5v67h86.2c50.5-46.5 79.8-115 79.8-194.1z"/>
                        <path fill="#34A853" d="M272 544.3c72.6 0 133.6-24 178.2-65.2l-86.2-67c-24 16.2-54.8 25.8-92 25.8-70.7 0-130.6-47.8-152-112.3h-89.5v70.7C85.6 484.1 170 544.3 272 544.3z"/>
                        <path fill="#FBBC04" d="M120 323.5c-10-29.5-10-61.6 0-91.1v-70.7h-89.5c-38.9 75.7-38.9 166.7 0 242.4l89.5-70.6z"/>
                        <path fill="#EA4335" d="M272 107.7c39.5-.6 77.5 14.4 106.4 41.3l79.8-79.8C403.2 24 345.2 0 272 0 170 0 85.6 60.2 49.5 146.8l89.5 70.7c21.4-64.6 81.3-112.3 133-109.8z"/>
                        </svg>
                        <span>Continue with Google</span>
                    </a> -->

                    <!-- Sign Up Prompt -->
                    <p class="text-center text-sm text-gray-600 mt-4 font-geologica">
                        New to Askly?
                        <a href="/sign-up-page" class="text-blue hover:text-[#357ABD] font-semibold ml-1">Sign up</a>
                    </p>
            </form>
        </div>
    </div>
 </section>
 @endsection