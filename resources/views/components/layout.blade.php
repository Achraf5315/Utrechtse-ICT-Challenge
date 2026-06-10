<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kombijde.politie - Vacatures</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            /* Fallback mocht je Vite nog niet hebben draaien */
            body {
                font-family: sans-serif;
                background: #f8fafc;
            }
        </style>
    @endif
</head>

<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col font-sans">

    <header class="bg-[#002547] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
            <a href="{{ route('jobs.index') }}" class="text-2xl font-bold tracking-wider flex items-center gap-2">
                <span class="text-amber-400">●</span> POLITIE VACATURES
            </a>
        </div>
    </header>

    <main class="flex-grow max-w-7xl w-full mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="bg-slate-900 text-slate-400 text-center py-6 border-t border-slate-800 text-sm">
        &copy; {{ date('Y') }} Nationale Politie Werken-bij Demosite.
    </footer>
</body>

</html>