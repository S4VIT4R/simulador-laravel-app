@extends('layouts.app')

@section('title', 'Login')

<style>
    #div1{
        background-image: url('../public/imagenes/fondo2.jpg');
    }
</style>


@section('content')

<div id="div1" class=' h-screen text-black flex'>
    <div class="w-full max-w-xs m-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 m-auto" method="POST" action="{{route('buscarusuario')}}">
            @csrf
           <div>
            <label class="mb-3 font-bold">Para recuperar tu contraseña ingresa los siguientes datos</label>
           </div>
                        {{-- Input del email--}}
            <div class='mb-4 relative mt-3'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-fold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email' placeholder='Ingresa tu correo'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">email</i>
                    </div>
                </div>
            </div>
            
            {{-- Input del usuario--}}
            <div class='mb-4 relative'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario' placeholder='Ingresa tu usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
            </div>

            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN LOGIN --}}
            <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 mb-3 rounded focus:outline-none focus:shadow-outline w-full'>Recuperar
            </button>
            
           <div class="w-full justify-center text-center">
            <a href="{{route('login.index')}}" class="text-blue-600 m-auto justify-center text-center w-full py-2 px-4 mt-5"><u>Volver</u></a>
           </div>

        </form>
    </div>
</div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('no encontrado') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Usuario y email no encontrados',
        });
    </script>
@endif
@endsection