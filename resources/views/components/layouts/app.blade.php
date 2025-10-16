<!doctype html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ? "Cristy — $title" : "Cristy Web" }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}">

      {{-- 💡 SOLUCIÓN: Carga el CSS de Tailwind y el JS --}}
@vite(['resources/css/app.scss', 'resources/js/app.js'])

    {{-- Fuente moderna opcional --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen font-[Inter] antialiased bg-slate-100 text-slate-800 dark:bg-slate-900 dark:text-slate-100 flex flex-col">

    {{-- Navegación superior --}}
    <x-layouts.navigation />

    {{-- Mensaje de estado (success, etc.) --}}
    @if (session('status'))
        <div class="max-w-7xl w-full mx-auto mt-4 px-4 sm:px-6 lg:px-8">
            <div class="rounded-lg px-4 py-3 text-sm font-semibold text-white bg-emerald-500 dark:bg-emerald-700 shadow-md">
                {{ session('status') }}
            </div>
        </div>
    @endif

    {{-- Contenido dinámico --}}
    <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    {{-- Footer moderno --}}
    <footer class="w-full mt-auto border-t border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/80 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row justify-between items-center text-sm text-slate-600 dark:text-slate-400">
            <p>&copy; {{ date('Y') }} <span class="font-semibold text-sky-600 dark:text-sky-400">Cristy Web</span>. Todos los derechos reservados.</p>
            <div class="flex space-x-4 mt-2 sm:mt-0">
                <a href="{{ route('sobre') }}" class="hover:text-sky-600 dark:hover:text-sky-400 transition">Sobre mí</a>
                <a href="{{ route('contactos') }}" class="hover:text-sky-600 dark:hover:text-sky-400 transition">Contacto</a>
                <a href="{{ route('messages.index') }}" class="hover:text-sky-600 dark:hover:text-sky-400 transition">Blog</a>
            </div>
        </div>
    </footer>

</body>
</html>
