 @extends('layouts.app')

 @section('content')
 <section class="mt-40">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-8 rounded-4xl shadow-lg">
            <div class="text-center font-geologica">
                <h1 class="font-bold text-4xl text-slate-700">Get Started</h1>
                <h2 class="font-medium text-slate-600 mt-1 text-md">Join Askly and never stop learning.</h2>
            </div>

            <form action="/register-submit" method="post" class="space-y-5">
                @csrf
                <!-- first name and last name -->
                <div class="flex space-x-7 mt-5">
                    <div class="flex-1">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="first_name" name="first_name" type="text" required placeholder="First Name"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none" />
                    </div>

                    <div class="flex-1">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required placeholder="Last Name"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none" />
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required placeholder="Email"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none" />
                </div>
        
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required placeholder="Password"
                        class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none" />
                </div>

                 <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required placeholder="Re-enter Password"
                        class="w-full mt-1 px-4 py-2 border rounded-xl border-blue focus:ring focus:ring-blue-200 focus:outline-none" />
                </div>

                <!-- Terms and Privacy Policy Checkbox -->
                <div class="flex items-start font-geologica">
                <input id="terms" name="terms" type="checkbox" required
                        class="mt-1 mr-2 border-gray-300 rounded text-blue-600 focus:ring-blue-500" />
                <label for="terms" class="text-sm text-gray-700">
                    I agree to Askly's
                    <a href="#" class="text-blue hover:underline">Terms</a> &
                    <a href="#" class="text-blue hover:underline">Privacy Policy</a>.
                </label>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                            class="w-full bg-blue text-white py-2 rounded-xl hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1] font-geologica">
                    Sign Up
                    </button>
                </div>

                <div class="border border-gray-200 shadow-xs"></div>

                <a href="#"
                class="flex items-center justify-center gap-3 border border-gray-300 rounded-xl px-5 py-2 hover:bg-gray-50 transition duration-200 text-gray-700 font-semibold text-sm">

                <!-- Google Logo SVG -->
                <svg class="w-5 h-5" viewBox="0 0 533.5 544.3" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#4285F4" d="M533.5 278.4c0-17.6-1.5-34.6-4.3-51H272v96.6h146.9c-6.3 33.7-25 62.3-53.4 81.5v67h86.2c50.5-46.5 79.8-115 79.8-194.1z"/>
                    <path fill="#34A853" d="M272 544.3c72.6 0 133.6-24 178.2-65.2l-86.2-67c-24 16.2-54.8 25.8-92 25.8-70.7 0-130.6-47.8-152-112.3h-89.5v70.7C85.6 484.1 170 544.3 272 544.3z"/>
                    <path fill="#FBBC04" d="M120 323.5c-10-29.5-10-61.6 0-91.1v-70.7h-89.5c-38.9 75.7-38.9 166.7 0 242.4l89.5-70.6z"/>
                    <path fill="#EA4335" d="M272 107.7c39.5-.6 77.5 14.4 106.4 41.3l79.8-79.8C403.2 24 345.2 0 272 0 170 0 85.6 60.2 49.5 146.8l89.5 70.7c21.4-64.6 81.3-112.3 133-109.8z"/>
                </svg>

                <span>Sign up with Google</span>
                </a>

                <p class="mt-4 text-sm text-gray-600 text-center">
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