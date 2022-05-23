@extends('layouts.plantilla')

@section('title','Examen')

@section('content')

<div class='w-2/4 bg-green-300 h-2/4 m-auto mt-7 shadow rounded relative flow-root flex'>

    <form action="{{Route('homedocente.createexamen')}}" method="POST">
        @csrf
        {{-- TITLE BARRA SUPERIOR --}}
        <div class='border border-2px h-9 bg-purple-200 text-center'>
            <label class='font-serif ml-2 text-2xl text-center'>Examen</label>
        </div>
        {{-------------------------------------------------------------------------------------}}

        {{-- NOMBRE USUARIO CREADOR DEL EXAMEN --}}
        <div class='mb-4 relative ml-7 mr-7 mt-3'>
            <label htmlFor='docente' class='block text-gray-700 text-xl font-fold mb-2'>Docente:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='docente' value="{{auth()->user()->nombre}}"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' readonly>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">person</i>
                </div>
            </div>
        </div>
        {{-------------------------------------------------------------------------------------}}

        {{-- ID DEL USUARIO QUE CREA EL EXAMEN --}}
        <div class='mb-4 relative ml-7 mr-7 mt-3'>
            <label htmlFor='id_user' class='block text-gray-700 text-xl font-fold mb-2'>ID usuario:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='id_user' value="{{auth()->user()->id}}"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' readonly>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">fingerprint</i>
                </div>
            </div>
        </div>
        {{-------------------------------------------------------------------------------------}}

        {{-- TITULO DEL EXAMEN --}}
        <div class='mb-4 relative ml-7 mr-7 mt-3'>
            <label htmlFor='titulo' class='block text-gray-700 text-xl font-fold mb-2'>Titulo del examen:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='titulo' placeholder='Ingrese titulo del examen'
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">assignment</i>
                </div>
            </div>
        </div>
        @error('titulo')
        <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- BOTÓN ENVIAR--}}
        <button type="submit" class='bg-red-100 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 ml-7 mb-5 float-left m-auto mt-2'>Siguiente</button>

    </form>
        {{-------------------------------------------------------------------------------------}}

        {{-- REGRESAR A EXAMENES--}}
        <a href="{{route('homedocente.examenes')}}" class="float-rigth ml-10">
            <button class='float-right bg-red-100 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 mr-7 px-4 w-1/4 mt-2'>Cancelar</button>
        </a>
</div>

@endsection()