@extends('layout')
<h1>Saludos</h1>
@section('contenido')
    @forelse ($consolas as $consola)
        <li>{{$consola}}</li>
    @empty
        <p>No hay consolas</p>
    @endforelse
@stop
