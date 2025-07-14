<div class="flex">
    <!-- Sidebar -->
    <div class="fixed top-20 left-0 w-64 h-[calc(100vh-4rem)] bg-[#F9FAFB] border-gray-200 flex flex-col justify-between z-40">
        <div>
            <ul class="space-y-2 text-gray-700 p-2 font-geologica">
                <li>
                    <a href="{{ route('dashboard', ['username' => Auth::user()->username]) }}"
                    class="flex items-center gap-3 px-6 py-2 hover:bg-sky-100 hover:rounded-lg {{ request()->routeIs('dashboard') ? 'bg-sky-100 font-semibold rounded-lg text-blue' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-[14px] h-[14px] fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                    Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile', ['username' => Auth::user()->username]) }}"
                    class="flex gap-3 px-6 py-2 hover:bg-sky-100 hover:rounded-lg {{ request()->routeIs('profile') ? 'bg-sky-100 font-semibold rounded-lg text-blue' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-[14px] h-[14px] mt-[3px] fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>
                    Profile
                    </a>
                </li>

                <li>
                    <a href="{{ route('articles.index', ['username' => Auth::user()->username]) }}"
                    class="flex gap-3 px-6 py-2 hover:bg-sky-100 hover:rounded-lg {{ request()->routeIs('articles.index') ? 'bg-sky-100 font-semibold rounded-lg text-blue' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-[14px] h-[14px] mt-[4px] fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 96c0-35.3 28.7-64 64-64l288 0c35.3 0 64 28.7 64 64l0 320c0 35.3-28.7 64-64 64L80 480c-44.2 0-80-35.8-80-80L0 128c0-17.7 14.3-32 32-32s32 14.3 32 32l0 272c0 8.8 7.2 16 16 16s16-7.2 16-16L96 96zm64 24l0 80c0 13.3 10.7 24 24 24l112 0c13.3 0 24-10.7 24-24l0-80c0-13.3-10.7-24-24-24L184 96c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l48 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-48 0c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16l256 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-256 0c-8.8 0-16 7.2-16 16z"/></svg>
                    My Article
                    </a>
                </li>

                <li>
                    <a href="{{ route('settings', ['username' => Auth::user()->username]) }}"
                    class="flex items-center gap-3 px-6 py-2 hover:bg-sky-100 hover:rounded-lg {{ request()->routeIs('settings') ? 'bg-sky-100 font-semibold rounded-lg text-blue' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-[14px] h-[14px] fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>    
                    Settings
                    </a>
                </li>
            </ul>
        </div>

        <!-- Bottom More Options -->
        <div class="p-2 mb-7">
            <button id="toggleMoreOptions" class="w-full text-left px-6 py-2 text-slate-700 hover:bg-sky-100 hover:rounded-lg flex justify-between items-center font-geologica">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-current"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z"/></svg>    
            More Options
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-200" id="moreOptionsArrow" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
            <ul id="moreOptionsList" class="pl-8 mt-2 space-y-1 text-sm text-gray-500 hidden font-geologica">
                <li>
                    <a href="{{ route('terms') }}" class="block hover:underline hover:text-blue">Terms of Use</a>
                </li>
                <li>
                    <a href="{{ route('privacy') }}" class="block hover:underline hover:text-blue">Privacy Policy</a>
                </li>
            </ul>
        </div>
    </div>
</div>