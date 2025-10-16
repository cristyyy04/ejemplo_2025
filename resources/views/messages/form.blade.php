<div class="space-y-4">
    <label class="flex flex-col">
    Nombre
    <input class="form-control" type="text" name="nombre" value="{{ $message->nombre ?? old('nombre') }}">
    {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
   </label>
    <label class="flex flex-col">
    Email
    <input class="form-control" type="text" name="email" value="{{ $message->email ?? old('email') }}">
    {!! $errors->first('email', '<span class=error>:message</span>') !!}
   </label>
    <label class="flex flex-col">
    Mensaje
    <textarea class="form-control" name="mensaje">{{ $message->mensaje ?? old('mensaje') }}</textarea>
    {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
</label></p>

<input class="btn btn-primary" id="guardar" type="submit" value="{{ $btnText ?? 'Guardar' }}">
</div>