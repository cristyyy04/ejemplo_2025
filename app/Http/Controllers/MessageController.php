<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\CreateMessageRequest;

class MessageController extends Controller
{
    /**
     * Mostrar todos los mensajes.
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Formulario para crear un nuevo mensaje.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Guardar un nuevo mensaje en la base de datos.
     */
    public function store(CreateMessageRequest $request)
    {
        Message::create($request->validated());

        return redirect()->route('messages.index')
                         ->with('info', 'Your message has been sent!');
    }

    /**
     * Mostrar un mensaje específico.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);
        return view('messages.show', compact('message'));
    }

    /**
     * Formulario para editar un mensaje.
     */
    public function edit(string $id)
    {
        $message = Message::findOrFail($id);
        return view('messages.edit', compact('message'));
    }

    /**
     * Actualizar un mensaje en la base de datos.
     */
    public function update(CreateMessageRequest $request, string $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->validated());

        return redirect()->route('messages.index')
                         ->with('info', 'Message updated successfully!');
    }

    /**
     * Eliminar un mensaje.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index')
                         ->with('info', 'Message deleted successfully!');
    }
}
