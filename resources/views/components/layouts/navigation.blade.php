<nav class="sticky top-0 z-50 w-full border-b border-sky-100/50 bg-white/90 backdrop-blur-lg dark:bg-gray-900/90 dark:border-sky-900/50 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3 transition-opacity hover:opacity-90">
                {{-- He usado un icono de "cohete" (rocket) para un look más dinámico --}}
                <svg class="w-9 h-9 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                <span class="text-xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    <span class="text-indigo-600 dark:text-indigo-400">Cristy</span>Blog
                </span>
            </a>

            {{-- Menú principal (Desktop) --}}
            <div id="menu" class="hidden lg:flex lg:items-center lg:space-x-7 text-sm font-medium">
                {{-- Enlaces de Navegación --}}
                <a href="{{ route('home') }}"
                   class="py-2 px-2 transition-all duration-200 rounded-md 
                          {{ request()->routeIs('home') ? 'text-indigo-600 dark:text-indigo-400 font-bold bg-indigo-50/50 dark:bg-gray-800/50' : 'text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400' }}">
                    Home
                </a>

                <a href="{{ route('messages.index') }}"
                   class="py-2 px-2 transition-all duration-200 rounded-md
                          {{ request()->routeIs('messages.*') ? 'text-indigo-600 dark:text-indigo-400 font-bold bg-indigo-50/50 dark:bg-gray-800/50' : 'text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400' }}">
                    Blog
                </a>

                <a href="{{ route('sobre') }}"
                   class="py-2 px-2 transition-all duration-200 rounded-md
                          {{ request()->routeIs('sobre') ? 'text-indigo-600 dark:text-indigo-400 font-bold bg-indigo-50/50 dark:bg-gray-800/50' : 'text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400' }}">
                    About
                </a>

                <a href="{{ route('contactos') }}"
                   class="py-2 px-2 transition-all duration-200 rounded-md
                          {{ request()->routeIs('contactos') ? 'text-indigo-600 dark:text-indigo-400 font-bold bg-indigo-50/50 dark:bg-gray-800/50' : 'text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400' }}">
                    Contact
                </a>
            </div>

            {{-- Autenticación y Botón Hamburguesa --}}
            <div class="flex items-center space-x-4">
                {{-- Autenticación (Desktop) --}}
                <div class="hidden lg:flex items-center space-x-3">
                    @guest
                        <a href="{{ route('login') }}"
                           class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full shadow-md 
                                  hover:bg-indigo-700 transition-colors duration-300 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Register
                        </a>
                    @endguest

                    @auth
                        {{-- Puedes reemplazar esto por un avatar/dropdown si quieres un look más profesional --}}
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-full shadow-md 
                                       hover:bg-red-600 transition-colors duration-300 dark:bg-red-600 dark:hover:bg-red-700">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>

                {{-- Botón hamburguesa (mobile) --}}
                <button id="menu-toggle" class="lg:hidden p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-colors duration-200" aria-label="Toggle Menu">
                    <i class="bi bi-list text-2xl"></i> {{-- Asumiendo que usas Bootstrap Icons (bi) o un equivalente --}}
                </button>
            </div>
        </div>
    </div>

    {{-- Menú móvil desplegable --}}
    <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 absolute w-full shadow-lg">
        <div class="px-4 py-4 space-y-3 font-medium">
            <a href="{{ route('home') }}" class="block p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600">Home</a>
            <a href="{{ route('messages.index') }}" class="block p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600">Blog</a>
            <a href="{{ route('sobre') }}" class="block p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600">About</a>
            <a href="{{ route('contactos') }}" class="block p-2 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-indigo-50 dark:hover:bg-gray-800 hover:text-indigo-600">Contact</a>
            
            <hr class="border-gray-100 dark:border-gray-800">
            
            @guest
                <a href="{{ route('register') }}" class="block text-center mt-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-full shadow-md hover:bg-indigo-700 transition-colors duration-300 dark:bg-indigo-500 dark:hover:bg-indigo-600">Register</a>
                <a href="{{ route('login') }}" class="block text-center py-2 text-sm font-medium text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-800 rounded-full hover:bg-indigo-100 dark:hover:bg-gray-700 transition-colors">Login</a>
            @endguest
            @auth
                <form action="{{ route('logout') }}" method="POST">@csrf
                    <button type="submit" class="w-full text-center mt-3 py-2 text-sm font-semibold text-white bg-red-500 rounded-full shadow-md hover:bg-red-600 transition-colors duration-300">Logout</button>
                </form>
            @endauth
        </div>
    </div>
</nav>
<script>
    // Toggle del menú móvil
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>