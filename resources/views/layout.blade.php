<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/css/app.css">
	<script>
		window.Laravel ={
			csrfToken: "{{ csrf_token() }}"
		}
	</script>
	<title>Mi sitio</title>
</head>
<body>

  <h1>{{ activeMenu('/') ? 'Esta en el home' : 'NO esta en el home' }}</h1>

    <header>
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('saludos/*')  }}" href="{{ route('saludos', 'Jorge') }}">Saludos</a>
            <a class="{{ activeMenu('messages/create') }}" href="{{ route('messages.create') }}">Contacto</a>
            <a class="{{ activeMenu('messages') }}" href="{{ route('messages.index') }}">Mostrar messages</a>

        </nav>
    </header>

	<div class="container">
		@yield('contenido')

		<footer>Copyright ® {{ date('Y') }}</footer>
  <div class="ml-auto">
                    <div class="flex space-x-4">
                        <a href="{{ route('register') }}"
                           class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('register') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Register
                        </a>
                        @guest
                            <a href="{{ route('register') }}"
                               class="lg:px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('register') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                Register
                            </a>
                            <a href="{{ route('login') }}"
                               class="lg:px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('login') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                                Login
                            </a>
                        @endguest
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="#"
                                   class="lg:px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white text-slate-400"
                                   onclick="this.closest('form').submit()"
                                >Logout</a>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
	<script src="/js/app.js"></script>
</body>
</html>
