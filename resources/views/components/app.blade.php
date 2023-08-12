<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' ?? 'Document')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    <nav class="fixed top-0 z-50 w-full border-b bg-gray-800 border-gray-700">
        @include('partials.nav')
    </nav>
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-52 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        @include('partials.aside')
    </aside>
    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-20 border">
            @yield('homeContent')
        </div>
    </div>
    @livewireScripts
    @livewireChartsScripts
</body>
    @yield('scripts')
</html>
