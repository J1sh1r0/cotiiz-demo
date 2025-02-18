@extends('layouts.app')

@section('title', 'Nueva Empresa')

@section('content')
    <div class="container">
        <h1>Registrar Nueva Empresa</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('empresas.store') }}" method="POST">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" required>

            <label for="correo">Correo</label>
            <input type="email" name="correo" required>

            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono">

            <button type="submit">Guardar</button>
        </form>

    </div>
@endsection
