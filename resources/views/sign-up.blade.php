 @extends('layouts.app')

 @section('content')
 <section class="mt-20">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-8 rounded-4xl shadow-lg">
            <div class="text-center font-geologica">
                <h1 class="font-bold text-4xl text-slate-700">Get Started</h1>
                <h2 class="font-medium text-slate-600 mt-1 text-md">Join Askly and never stop learning.</h2>
            </div>

    
            <form action="{{ route('register') }}" method="post" class="space-y-5">
                @csrf
                <!-- first name and last name -->

                @if ($errors->any())
                <div class="text-red-400 text-sm mt-3 font-geologica">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="flex space-x-7 mt-5">
                    <div class="flex-1">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="first_name" name="first_name" type="text" required placeholder="First Name"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />
                    </div>

                    <div class="flex-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required placeholder="Last Name"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />
                    </div>
                </div>

                <!-- username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input id="username" name="username" type="text" required placeholder="Username"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required placeholder="Email"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />
                </div>
        
                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Password"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />

                    <!-- Eye Icon show password -->
                    <span id="togglePassword" class="absolute right-3 top-[36px] cursor-pointer text-gray-500">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5">
                            <path fill="#909192" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>


                        <!-- hide password -->
                        <svg id="eyeSlashIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 h-5 hidden"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#909192" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                        </svg>
                    </span>
                    
                </div>

                 <!-- Confirm Password -->
                <div class="relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Re-enter Password"
                        class="w-full mt-1 px-4 py-2 border rounded-xl border-blue focus:ring focus:ring-blue-200 focus:outline-none font-geologica" />
                    
                    <!-- Eye Icon for confirm password -->
                    <span id="toggleConfirmPassword" class="absolute right-3 top-[36px] cursor-pointer text-gray-500">
                        <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5 h-5">
                        <path fill="#909192" d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                        </svg>

                        <svg id="eyeSlashIconConfirm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5 h-5 hidden"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#909192" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/>
                        </svg>
                    </span>
                </div>

                <!-- Terms and Privacy Policy Checkbox -->
                <div class="flex items-start font-geologica">
                <input id="terms" name="terms" type="checkbox" required
                        class="mt-1 mr-2 border-gray-300 rounded text-blue-600 focus:ring-blue-500" />
                <label for="terms" class="text-sm text-gray-700">
                    I agree to Askly's
                    <a href="#" class="text-blue hover:underline">Terms</a> &
                    <a href="#" class="text-blue hover:underline">Privacy Policy</a>
                </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full bg-blue text-white py-2 rounded-xl hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1] font-geologica">
                    Sign Up
                    </button>
                </div>

                <!-- <div class="border border-gray-200 shadow-xs"></div> -->

                <!-- <a href="#"
                    class="flex items-center justify-center gap-3 border border-gray-300 rounded-xl px-5 py-2 hover:bg-gray-50 transition duration-200 text-gray-700 font-semibold text-sm">

                    <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M533.5 278.4c0-17.6-1.5-34.6-4.3-51H272v96.6h146.9c-6.3 33.7-25 62.3-53.4 81.5v67h86.2c50.5-46.5 79.8-115 79.8-194.1z"/>
                        <path fill="#34A853" d="M272 544.3c72.6 0 133.6-24 178.2-65.2l-86.2-67c-24 16.2-54.8 25.8-92 25.8-70.7 0-130.6-47.8-152-112.3h-89.5v70.7C85.6 484.1 170 544.3 272 544.3z"/>
                        <path fill="#FBBC04" d="M120 323.5c-10-29.5-10-61.6 0-91.1v-70.7h-89.5c-38.9 75.7-38.9 166.7 0 242.4l89.5-70.6z"/>
                        <path fill="#EA4335" d="M272 107.7c39.5-.6 77.5 14.4 106.4 41.3l79.8-79.8C403.2 24 345.2 0 272 0 170 0 85.6 60.2 49.5 146.8l89.5 70.7c21.4-64.6 81.3-112.3 133-109.8z"/>
                    </svg>

                    <span>Sign up with Google</span>
                </a> -->

                <p class="mt-4 text-sm text-gray-600 text-center font-geologica">
                Already a member?
                <a href="/log-in-page" class="text-blue hover:text-[#357ABD] font-semibold ml-1">
                    Log in
                </a>
                </p>
            </form>
        </div>
    </div>
 </section>
 @endsection

 