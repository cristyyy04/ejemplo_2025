<x-layouts.app
    title="Blog"
    meta-description="Blog meta description"
>
    <header class="px-6 py-4 space-y-2 text-center">
        <h1 class="font-serif text-3xl text-sky-600 dark:text-sky-500">Blog</h1>

        @auth
            <a class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-sky-800 hover:bg-sky-700" href="{{ route('messages.create') }}">
                Create new post
            </a>
        @endauth
    </header>

    <main class="w-full px-4 max-w-7xl mx-auto">
        <table class="w-full text-sm text-left border-collapse border border-gray-300 dark:border-gray-600">
            <thead class="bg-sky-700 text-white">
                <tr>
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Nombre</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Mensaje</th>
                    <th class="px-3 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr class="border-t dark:border-gray-700">
                        <td class="px-3 py-2">
                            <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 hover:underline">
                                {{ $message->id }}
                            </a>
                        </td>
                        <td class="px-3 py-2">{{ $message->nombre }}</td>
                        <td class="px-3 py-2">{{ $message->email }}</td>
                        <td class="px-3 py-2">{{ $message->mensaje }}</td>
                        <td class="px-3 py-2">
                            @auth
                                <div class="flex gap-2">
                                    <a class="px-2 py-1 text-xs text-white bg-blue-600 rounded hover:bg-blue-500" href="{{ route('messages.edit', $message->id) }}">Editar</a>
                                    <form method="POST" action="{{ route('messages.destroy', $message->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-1 text-xs text-white bg-red-600 rounded hover:bg-red-500" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</x-layouts.app>
