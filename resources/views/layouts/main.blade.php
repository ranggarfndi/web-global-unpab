<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Global Engagement') | UNPAB</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        /* Transisi halus untuk slider */
        .fade-enter-active, .fade-leave-active { transition: opacity 1s ease; }
        .fade-enter-from, .fade-leave-to { opacity: 0; }
    </style>
</head>
<body class="bg-white text-green-900 flex flex-col min-h-screen">

    @include('partials.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>