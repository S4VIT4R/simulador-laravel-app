@extends('layouts.plantilla')

@section('title','Preguntas')

@section('content')

<div class='w-2/4 bg-green-300 h-2/4 m-auto mt-2 shadow rounded relative flow-root flex'>

    
    <form action="{{Route('homedocente.guardarnuevapregunta')}}" method="POST">
        @csrf
        {{-- TITLE BARRA SUPERIOR --}}
        <div class='border border-2px h-9 bg-purple-200 text-center'>
            <label class='font-serif ml-2 text-2xl text-center'>Preguntas</label>
        </div>
        {{-------------------------------------------------------------------------------------}}

        {{-- PREGUNTA --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1'>
            <label htmlFor='pregunta' class='block text-gray-700 text-md font-fold mb-2'>Pregunta:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='pregunta' placeholder="Ingrese la pregunta"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">border_color</i>
                </div>
            </div>
        </div>
        @error('pregunta')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- OPCION 1 --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1'>
            <label htmlFor='opcion1' class='block text-gray-700 text-md font-fold mb-2'>Respuesta 1:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='opcion1' placeholder="Ingrese la respuesta"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">filter_1</i>
                </div>
            </div>
        </div>
        @error('opcion1')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- OPCION 2 --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1'>
            <label htmlFor='opcion2' class='block text-gray-700 text-md font-fold mb-2'>Respuesta 2:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='opcion2' placeholder="Ingrese la respuesta"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">filter_2</i>
                </div>
            </div>
        </div>
        @error('opcion2')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- OPCION 3 --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1'>
            <label htmlFor='opcion3' class='block text-gray-700 text-md font-fold mb-2'>Respuesta 3:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='opcion3' placeholder="Ingrese la respuesta"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">filter_3</i>
                </div>
            </div>
        </div>
        @error('opcion3')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- CORRECTA --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1'>
            <label htmlFor='correcta' class='block text-gray-700 text-md font-fold mb-2'>Respuesta correcta:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='correcta' placeholder="Ingrese la respuesta correcta"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">check_circle</i>
                </div>
            </div>
        </div>
        @error('correcta')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
        @enderror
        {{-------------------------------------------------------------------------------------}}

        {{-- ID EXAMEN --}}
        <div class='mb-4 relative ml-7 mr-7 mt-1' hidden>
            <label htmlFor='idExamen' class='block text-gray-700 text-md font-fold mb-2'>ID examen:</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='text' name='idExamen' value="{{$idExamen}}"
                    class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class='absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">assignment</i>
                </div>
            </div>
        </div>
        {{-------------------------------------------------------------------------------------}}

        {{-- BOTÓN ENVIAR--}}
        <button type="submit" class='bg-red-100 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-1/4 ml-7 mb-2 float-left m-auto mt-1'>Siguiente</button>

    </form>
        {{-------------------------------------------------------------------------------------}}

        {{-- REGRESAR A EXAMENES--}}
        <a href="{{route('homedocente.editarexamen',$idExamen)}}" class="float-rigth ml-10">
            <button class='float-right bg-red-100 hover:bg-slate-200 text-black shadow-md rounded border-2 border-gray-300 py-2 mr-7 px-4 w-1/4 mt-1'>Cancelar</button>
        </a>
</div>

@endsection()

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('add') == 'pregunta')
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Pregunta agregada',
        })
    </script>
@endif
@endsection