    <!doctype html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.css" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Test</title>
    </head>
    <body class="overflow-x-hidden bg-[#F9FAFB] min-h-screen">
        <!-- nav -->
        @include('layouts.nav')

        <!-- Page layout with sidebar and content -->
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            @if(request()->routeIs('profile') || request()->routeIs('dashboard') || request()->routeIs('settings') || request()->routeIs('articles.*'))
                <aside class="fixed top-20 left-0 w-64 h-[calc(100vh-4rem)] bg-[#F9FAFB] border-r border-gray-200 shadow-md z-40 flex flex-col justify-between">
                    @include('layouts.sidebar')
                </aside>
            @endif

            <!-- Main content area -->
            <div class="@if(request()->routeIs('profile') || request()->routeIs('dashboard') || request()->routeIs('settings') || request()->routeIs('articles.*')) ml-64 flex-1 flex flex-col @else w-full @endif">
                <main class="flex-1 p-6 pb-20 pt-20">
                    @yield('content')
                </main>

                @if (!request()->routeIs('profile') && !request()->routeIs('settings') && !request()->routeIs('dashboard') && !request()->routeIs('articles.*'))
                    @include('layouts.footer')
                @endif
            </div>
        </div>
        <script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.js"></script>
    </body>