<nav class="fixed top-0 left-0 right-0 z-50 flex justify-center w-full py-4 border-b border-gray-200 bg-[#F9FAFB]">
  
  
  <div class="absolute left-10 top-1/2 -translate-y-1/2 group">
    <a href="{{ Route('blog.index')}}" class="font-bold text-slate-700 hover:text-blue font-geologica">
      EXPLORE
    </a>
    <div class="absolute top-full mt-2 left-1/2 -translate-x-1/2 px-2 py-2 bg-black text-white text-[13px] rounded-lg opacity-0 group-hover:opacity-100 transition duration-100 z-50 whitespace-nowrap pointer-events-none">
      All articles
    </div>
  </div>
  
  <a href="/" class="">
    <img src="{{ asset('img/askly-high-resolution-logo-transparent.png')}}" alt="askly-logo" class="h-10 w-auto">
  </a>

  <div id="user-section" class="absolute right-10 top-1/2 -translate-y-1/2 flex items-center gap-4">
    @auth
      <div class="flex items-center gap-4 relative">
        <!-- Use actual logged-in user avatar if you have one, otherwise fallback image -->
        <div class="relative group">
          <a href="{{ route('profile', ['username' => Auth::user()->username]) }}">
            <img
              src="{{ Auth::user()->profile_picture_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->username) . '&background=4A90E2&color=fff&size=40' }}"
              alt="User Avatar"
              class="w-10 h-10 rounded-full ring-2 ring-white cursor-pointer object-cover" />

            <!-- Tooltip -->
            <div class="absolute left-1/2 transform -translate-x-1/2 top-12 mt-1 px-2 py-2 bg-black text-white text-[13px] rounded-lg opacity-0 group-hover:opacity-100 transition duration-100 pointer-events-none whitespace-nowrap z-50">
              View Profile
            </div>
          </a>
          
        </div>

        <div class="relative">
          <!-- Chevron icon to toggle dropdown -->
           <div class="relative group">
            <svg id="chevronToggle" xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-5 text-gray-600 cursor-pointer hover:bg-gray-200 rounded-full"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>

            <!-- Tooltip on dropdown button-->
            <div class="absolute left-0.5 transform -translate-x-1/2 top-8 mt-1 px-2 py-2 bg-black text-white text-[13px] rounded-lg opacity-0 group-hover:opacity-100 transition duration-100 pointer-events-none whitespace-nowrap z-50">
              Accounts
            </div>
          </div>

          <!-- Dropdown menu -->
          <div id="dropdownMenu"
               class="absolute top-9 right-0 p-2 hidden bg-white border border-gray-200 rounded-lg shadow-lg w-55 z-50 font-medium text-md">
            <a href="{{ route('dashboard', ['username' => Auth::user()->username]) }}"
               class="block px-4 py-3 text-slate-700 hover:bg-gray-100 hover:rounded-lg transition duration-300 font-geologica">
              Dashboard
            </a>
            <a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
               class="block px-4 py-3 text-slate-700 hover:bg-gray-100 hover:rounded-lg transition duration-300 font-geologica">
              Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit"
                      class="block w-full text-left px-4 py-3 text-slate-700 hover:bg-gray-100 hover:rounded-lg duration-300 font-geologica">
                Log out
              </button>
            </form>
          </div>
        </div>
      </div>
    @else
      <a href="{{ route('login') }}"
         class="bg-[#4A90E2] font-bold text-white rounded-xl py-2 px-4 hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1]">
         Log in
      </a>
      <a href="{{ route('registerForm') }}"
         class="text-base text-slate-700 font-bold hover:text-[#357ABD] font-geologica">
         Sign up
      </a>
    @endauth
  </div>
</nav>
