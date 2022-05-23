@extends('layouts.plantilla')

@section('title','Datos alumno')
    
@section('content')

<form action="{{route('homealumno.guardardatosalumno',auth()->user()->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="bg-green-300 w-1/4 h-3/4 m-auto mt-24 shadow rounded flow-root">
        <div class='border border-2px h-7 bg-purple-200 text-center'>
            <label class='font-serif ml-2 text-xl text-center'>Datos alumno</label>
        </div>
        @csrf
            {{-- INPUT NOMBRE --}}
            <div class='mb-4 relative ml-3 mt-5 mr-3'>
                <label htmlFor='nombre' class='block text-gray-700 text-sm font-bold mb-2'>Nombre</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='nombre'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' value="{{auth()->user()->nombre}}">
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">person</i>
                    </div>
                </div>
            </div>

            {{-- INPUT USUARIO--}}
            <div class='mb-4 relative ml-3 mr-3 mt-2'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-bold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' value="{{auth()->user()->usuario}}">
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
            </div>

            {{-- INPUT EMAIL --}}
            <div class='mb-6 relative ml-3 mt-2 mr-3'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-bold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' value="{{auth()->user()->email}}">
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">email</i>
                    </div>
                </div>
            </div>
            <a class="mt-2"><button type="submit" class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-1/4 float-left'>Guardar</button></a>
            <a class="mb-5" href="{{route('homedocente.index')}}"><button type="button" class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-1/4 float-right'>Cancelar</button></a>
            <br>
            <br>
            <br>
    </div>
</form>

@endsection