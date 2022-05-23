@extends('layouts.plantilla')

@section('title','Home Docente')

@section('content')

<div class="welcome-content">
    <img src="{{ asset('imagenes/docente.jpg') }}" class="welcome-image"/>
            <h2>BIENVENIDO!</h2>
        <div class="user">
            <h3>{{auth()->user()->tipoUsuario}}: {{auth()->user()->nombre}}</h3>
        </div>
</div>
    
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('updatedatos') == 'update')
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Datos actualizados',
        });
    </script>
@endif
@endsection