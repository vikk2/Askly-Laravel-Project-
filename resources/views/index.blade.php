  <!-- Nav bar-->
  @extends('layouts.app')
  <!--End Nav bar-->

  <!-- Content -->
   @section('content')
  <section class="mt-50">
    <div class="text-center font-geologica">
      <h1 class="font-bold text-5xl text-slate-700">Welcome to <span class="text-blue">Askly</span></h1>
      <h2 class="font-medium text-slate-600 text-lg">Find answers to what you're curious about</h2>
      
       <!-- Search Bar -->
      <div class="w-[553px] h-11 border-[1.5px] flex items-center rounded-[60px] border-blue bg-gray-50 px-4 mt-6 mx-auto shadow-xl">
        <input type="text" placeholder="Search knowledge base" class="w-full bg-transparent focus:outline-none text-md font-geologica font-medium "/>
        <i class="fa-solid fa-magnifying-glass" style="color: #4A90E2;"></i>
      </div>
      <div class="mt-6 text-center">
        <a href="#" class="mt-5 inline-block bg-blue text-white font-geologica font-semibold px-6 py-2 rounded-full shadow-md hover:bg-[#357ABD] transition duration-400">
        Browse All Articles</a>
      </div>
    </div>

    <!-- <div class="mt-10">
      <div class="bg-gray-50 border border-gray-200 rounded-xl shadow-lg p-6 text-left max-w-2xl mx-auto hover:shadow-xl transition">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">
          🧠 Featured: Getting Started Guide
        </h2>
        <p class="text-gray-600 mb-4">
          New to Askly? Learn how to find the right answers quickly and explore the knowledge base effectively.
        </p>
        <a
          href="/articles/getting-started"
          class="text-blue-600 font-medium hover:underline"
        >
          Read more →
        </a>
      </div>
    </div> -->

    <div class="text-3xl font-geologica font-bold text-slate-700 mt-30 w-98 ml-10 items-center flex">
      <h2>Popular Articles</h2>
    </div>

    <div class="grid grid-cols-4 gap-6 ml-10 mt-8 " >

      <!-- Article 1 -->
      <div class="max-w-sm bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition h-min">
          <!-- Image Placeholder -->
        <div class="h-40 bg-gray-100 flex items-center justify-center">
          <img src="https://miro.medium.com/v2/resize:fit:1400/1*ImTT0nd7BZUPe3S8XS_juA.png" alt="c++ image" class="w-full h-40 object-cover rounded-t-xl">
        </div>

        <!-- Content -->
        <div class="p-5">
        <!-- Category and Date -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
          <span class="bg-blue-100 text-blue-600 font-medium px-2 py-0.5 rounded-full text-xs">Programming</span>
          <span>June 2, 2025</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg font-semibold text-gray-800 mb-1">
          Getting Start with C++ Today!
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4">
          C++ is a general purpose programming language designed to make programming more enjoyable for the serious programmer.
        </p>

        <!-- Author and Link -->
        <div class="flex items-center justify-between text-sm">
          <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
              <span class="text-gray-700 font-medium">Soksambo Sun</span>
            </div>
          <a href="#" class="text-blue font-medium hover:underline flex items-center gap-1">
            Read more
          </a>
          </div>
        </div>
      </div>

      <!-- Article 2 -->
      <div class="max-w-sm bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition h-min">
          <!-- Image Placeholder -->
        <div class="h-40 bg-gray-100 flex items-center justify-center">
          <img src="https://vuejsdevelopers.com/images/posts/vue_laravel_crud.png" alt="laravel vue.js image" class="w-full h-40 object-cover rounded-t-xl">
        </div>

          <!-- Content -->
        <div class="p-5">
        <!-- Category and Date -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
          <span class="bg-blue-100 text-blue-600 font-medium px-2 py-0.5 rounded-full text-xs">Programming</span>
          <span>May 15, 2025</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg font-semibold text-gray-800 mb-1">
          Building a Vue and laravel in a single-page
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4">
          CRUD (Create, Read, Update and Delete) are the basic data operations and one of the first things you learn as a Laravel developer. Vue.js 2.6 is part of the laravel/ui package available with Laravel 6. Vue is a great option for creating a dynamic user interface for your CRUD operations.
        </p>

        <!-- Author and Link -->
        <div class="flex items-center justify-between text-sm">
          <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
              <span class="text-gray-700 font-medium">Soksambo Sun</span>
            </div>
          <a href="#" class="text-blue font-medium hover:underline flex items-center gap-1">
            Read more
          </a>
          </div>
        </div>
      </div>

      <!-- Article 3 -->
      <div class="max-w-sm bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition h-min">
          <!-- Image Placeholder -->
        <div class="h-40 bg-gray-100 flex items-center justify-center">
          <img src="https://paragoniu.edu.kh/wp-content/uploads/2025/05/497540918_688965837206826_8084809668439747565_n.jpg" alt="badminton" class="w-full h-40 object-cover object-[50%_80%] rounded-t-xl">
        </div>

          <!-- Content -->
        <div class="p-5">
        <!-- Category and Date -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
          <span class="bg-gray-100 text-black font-medium px-2 py-0.5 rounded-full text-xs">Sport</span>
          <span>May 15, 2023</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg font-semibold text-gray-800 mb-1">
          Paragon.U Badminton Tournament 2025
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4">
          A mixed doubles friendly match on June 8, 2025, from 9 AM to 12 PM at T-Badminton Court, Phnom Penh.
        </p>

        <!-- Author and Link -->
        <div class="flex items-center justify-between text-sm">
          <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
              <span class="text-gray-700 font-medium">Soksambo Sun</span>
            </div>
          <a href="#" class="text-blue font-medium hover:underline flex items-center gap-1">
            Read more
          </a>
          </div>
        </div>
      </div>

      <!-- Article 4 -->
      <div class="max-w-sm bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition h-min">
          <!-- Image Placeholder -->
        <div class="h-40 bg-gray-100 flex items-center justify-center">
          <img src="https://i.pinimg.com/736x/de/91/3d/de913de5070ac4b35d244b5fdcf28606.jpg" alt="haelth image" class="w-full object-cover h-40 object-[50%_75%]">
        </div>

          <!-- Content -->
        <div class="p-5">
        <!-- Category and Date -->
        <div class="flex items-center justify-between text-sm text-gray-500 mb-2">
          <span class="bg-red-100 text-red-500 font-medium px-2 py-0.5 rounded-full text-xs">Health</span>
          <span>May 15, 2023</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg font-semibold text-gray-800 mb-1">
          Healthy Living: Small Changes, Big Impact
        </h3>

        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4">
          Maintaining good health doesn't always require a complete lifestyle overhaul. In fact, it's the small, consistent habits that often bring the biggest results. From drinking more water to incorporating 30 minutes of walking into your day,
        </p>

        <!-- Author and Link -->
        <div class="flex items-center justify-between text-sm">
          <div class="flex items-center space-x-2">
            <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
              <span class="text-gray-700 font-medium">Soksambo Sun</span>
            </div>
          <a href="#" class="text-blue font-medium hover:underline flex items-center gap-1">
            Read more
          </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection
  <!-- End Content -->

  <!-- footer -->
  