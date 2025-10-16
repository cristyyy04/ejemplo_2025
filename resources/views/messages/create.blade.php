<x-layouts.app
    title="Crear nuevo post"
    meta-description="Formulario para crear un nuevo blog post"
>
    <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Crear mensaje
</h1>


<h2>Escríbeme</h2>
@if( session()->has('info') )
	<h3>{{ session('info') }}</h3>

@else
<form method="POST" action="{{ route('messages.store') }}">
    @csrf

    @include('messages.form', [
        'btnText' => 'Crear mensaje',
    ])
</form>

     @endif
<hr>
</x-layouts.app>
