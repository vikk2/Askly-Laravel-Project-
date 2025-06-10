 @extends('layouts.app')

 @section('content')
 <section class="mt-40">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-lg bg-white p-8 rounded-4xl shadow-lg">
            <div class="text-center font-geologica mb-8">
                <h1 class="font-bold text-3xl text-slate-700">Create new password</h1>
            </div>

            <form action="/register-submit" method="post" class="space-y-5">
                @csrf
                <!-- first name and last name -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                        <input id="password" name="password" type="password" required placeholder="Password"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input id="password" name="password" type="password" required placeholder="Re-enter password"
                            class="w-full mt-1 px-4 py-2 border border-blue rounded-xl focus:ring focus:ring-blue-200 focus:outline-none placeholder-stone-400 font-medium" />
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full bg-blue text-white py-2 rounded-xl hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1] font-geologica">
                        Reset Password
                        </button>
                    </div>
            </form>
        </div>
    </div>
 </section>
 @endsection