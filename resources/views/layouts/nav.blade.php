<nav class="relative flex justify-center w-screen py-4 border-b-[1px] border-gray-200">
  <a href="#" class="absolute left-10 top-1/2 -translate-y-1/2 font-bold text-slate-700 hover:text-blue font-geologica">EXPLORE</a>
  <a href="#" class="">
    <img src="img/askly-high-resolution-logo-transparent.png" alt="askly-logo" class="h-10 w-auto">
  </a>
  <div id="user-section" class="absolute right-10 top-1/2 -translate-y-1/2 flex items-center gap-4"></div>
</nav>

<script>
  let isLoggedIn = true;

  function renderUserSection() {
    const userSection = document.getElementById('user-section');

    if (isLoggedIn) {
      userSection.innerHTML = `
        <div class="flex items-center gap-4 relative">
      <!-- Avatar (no interaction) -->
      
      <img src="https://i.pinimg.com/736x/c3/1f/75/c31f753adb6ca0fff10755d6649269e1.jpg"
           alt="User Avatar"
           class="w-10 h-10 rounded-full ring-2 ring-white cursor-pointer" />
      

      <!-- Chevron and dropdown (interactive) -->
      <div class="relative">
        <!-- Chevron -->
        <svg id="chevronToggle" xmlns="http://www.w3.org/2000/svg"
             class="w-4 h-4 text-gray-600 cursor-pointer hover:bg-gray-200 rounded-full w-6 h-5"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>

        <!-- Dropdown -->
        <div id="dropdownMenu"
             class="absolute top-6 right-0 p-2 hidden bg-white border border-gray-200 rounded-lg shadow-lg w-55 z-50 font-semibold text-sm">
          <div class="">
          <a href="/profile"
             class="block px-4 py-3 text-gray-700 hover:bg-gray-100 hover:rounded-lg font-geologica">Profile</a>
             </div>
             
          <button onclick="logout()"
             class="block w-full text-left px-4 py-3 text-red-600 hover:bg-gray-100 hover:rounded-lg font-geologica">Logout</button>
        </div>
      </div>
    </div>
  `;

      // Add click event to toggle dropdown visibility
      const chevronToggle = document.getElementById("chevronToggle");
      const dropdownMenu = document.getElementById('dropdownMenu');

      chevronToggle.addEventListener("click", (e) => {
        e.stopPropagation(); // Prevent click from bubbling up
        dropdownMenu.classList.toggle("hidden");
      });

      

      // Close dropdown if clicking outside
      document.addEventListener("click", (e) => {
        if (!dropdownMenu.contains(e.target) && !chevronToggle.contains(e.target)) {
          dropdownMenu.classList.add("hidden");
        }
      });
    } else {
      userSection.innerHTML = `
        <a href="/log-in-page" class="bg-[#4A90E2] font-bold text-white rounded-lg py-2 px-4 hover:bg-[#357ABD] transition duration-300 active:bg-[#2C65A1]">Log in</a>
        <a href="/sign-up-page" class="text-base text-slate-700 font-bold hover:text-[#357ABD] font-geologica">Sign up</a>
      `;
    }
  }

  function login() {
    isLoggedIn = true;
    renderUserSection();
  }

  function logout() {
    isLoggedIn = false;
    renderUserSection();
  }

  document.addEventListener("DOMContentLoaded", renderUserSection);
</script>