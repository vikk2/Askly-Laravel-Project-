<footer class="bg-gray-100 py-12 w-full px-10">
  <div class="w-full">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 pt-10">
      <!-- Column 1: Logo + Description -->
      <div class="font-geologica text-slate-700">
        <a href="/">
          <img src="{{ asset('img/askly-high-resolution-logo-transparent.png') }}" alt="askly-logo" class="h-12 w-auto mb-4">
        </a>
      </div>

      <!-- Column 2: Navigation -->
      <div>
        <ul class="font-geologica font-bold text-slate-700 space-y-2">
          <li><a href="/">HOME</a></li>
          <li><a href="{{ route('blog.index')}}">ALL ARTICLES</a></li>
          <li><a href="{{ route('about')}}">ABOUT</a></li>
          <li><a href="{{ route('faq')}}">FAQ</a></li>
        </ul>
      </div>

      <!-- Column 3: Legal & Account -->
      <div>
        <ul class="font-geologica font-bold text-slate-700 space-y-2">
          @auth
          <li><a href="{{ route('profile', ['username' => Auth::user()->username]) }}">ACCOUNT</a></li>
          @endauth
          <li><a href="{{ route('privacy')}}">PRIVACY POLICY</a></li>
          <li><a href="{{ route('terms')}}">TERMS OF USE</a></li>
          <li><a href="{{ route('contact')}}">CONTACT US</a></li>
        </ul>
      </div>

      <!-- Column 4: Contact Info -->
      <div class="font-geologica text-slate-700">
        <h2 class="font-bold pb-2">CONTACT US</h2>
        <p>+855 123 456 789</p>
        <p>Phnom Penh, Cambodia</p>
        <p class="pb-2">askly.heaven@gmail.com</p>
        <div class="flex gap-5 mt-2">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 fill-current"><title>facebook</title><path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96A10 10 0 0 0 22 12.06C22 6.53 17.5 2.04 12 2.04Z" /></svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-7 h-7 fill-current"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-7 h-7 fill-current"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 mt-10"></div>

    <div class="flex items-center mt-6 text-xs text-slate-500">
      <p>© 2025 Askly by php artisan serve. All rights reserved.</p>
    </div>
  </div>
</footer>