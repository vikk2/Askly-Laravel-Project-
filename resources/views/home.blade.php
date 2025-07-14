  <!-- Nav bar-->
  @extends('layouts.app')
  <!--End Nav bar-->

  <!-- Content -->
   @section('content')
  <section class="mt-60">
    <div class="text-center font-geologica">
      <h1 class="font-bold text-5xl text-slate-700">Welcome to <span class="text-blue">Askly</span></h1>
      <h2 class="font-medium text-slate-600 text-lg">Find answers to what you're curious about</h2>
      
       <!-- Search Bar -->
      <form action="{{ route('blog.index') }}" method="GET" class="w-[553px] h-11 border-[1.5px] flex items-center rounded-[60px] border-blue bg-gray-50 px-4 mt-6 mx-auto shadow-xl">
        <input
          type="text"
          name="search"
          placeholder="Search knowledge base"
          class="w-full bg-transparent focus:outline-none text-md font-geologica font-medium"
          value="{{ request('search') }}"
        />
        <button type="submit">
          <i class="fa-solid fa-magnifying-glass" style="color: #4A90E2;"></i>
        </button>
      </form>
      <!-- <div class="mt-6 text-center">
        <a href="#" class="mt-5 inline-block bg-blue text-white font-geologica font-semibold px-6 py-2 rounded-full shadow-md hover:bg-[#357ABD] transition duration-400">
        Browse All Articles</a>
      </div> -->
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

    <div class="px-10 mt-60">
      <h2 class="text-3xl font-geologica font-bold text-slate-700">
        Popular Articles
      </h2>


      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-7 mt-8">
        @foreach($popularArticles as $article)
          <div class="p-3 bg-white rounded-xl shadow-sm hover:shadow-md transition flex flex-col h-full">
            @if ($article->image_url)
              <img    
                src="{{ asset('storage/' . $article->image_url) }}" 
                alt="{{ $article->title }}" 
                class="w-full h-[240px] object-cover rounded-xl mb-4"
                loading="lazy"
              >
            @endif

            @if ($article->published_at)
              <p class="text-sm text-gray-400 mb-1">
                {{ $article->published_at->format('F j, Y') }}
              </p>
            @endif

            <h2 class="text-xl font-semibold">
              <a href="{{ route('blog.show', ['article' => $article->id, 'page' => request()->get('page', 1)]) }}" class="text-slate-700 hover:underline font-bold">
                {{ $article->title }}
              </a>
            </h2>

            <p class="mt-3 text-gray-700 line-clamp-4 flex-grow">
              {!! Str::limit(strip_tags($article->body), 200) !!}
            </p>

            <div class="flex items-center justify-between mt-4 text-blue hover:text-[#357ABD] font-semibold">
              <a href="{{ auth()->check() && auth()->id() === $article->user->id ? route('dashboard', ['username' => auth()->user()->username]) : url('/' . $article->user->username) }}" class="flex items-center gap-3 text-gray-600">
                <img 
                  src="{{ asset($article->user->profile_picture_url) }}" 
                  alt="{{ $article->user->username }}" 
                  class="w-8 h-8 rounded-full object-cover border border-gray-300"
                />
                <div class="text-sm">
                  <p class="font-semibold text-slate-700 capitalize font-geologica">
                    {{ $article->user->firstName }} {{ $article->user->lastName }}
                  </p>
                </div>
              </a>

              <a href="{{ route('blog.show', ['article' => $article->id, 'search' => request('search'), 'page' => request()->get('page', 1)]) }}" class="w-9 h-9 rounded-full bg-blue-100 hover:bg-blue-200 flex items-center justify-center transition">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 fill-current text-blue">
                  <title>arrow-top-right</title>
                  <path d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                </svg>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endsection
  <!-- End Content -->

  <!-- footer -->
  