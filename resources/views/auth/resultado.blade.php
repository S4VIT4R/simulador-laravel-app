@extends('layouts.plantilla')

@section('title','Resultados')

@section('content')

<div class="bg-green-300 w-3/4 h-3/4 m-auto mt-8 flow-root shadow rounded relative">
    <div class='border border-2px h-10 bg-purple-200 text-center flow-root'>
        <label class='font-bold ml-2 text-2xl text-center'>Resultados</label>
       @if (auth()->check())
            @if (auth()->user()->tipoUsuario == 'Alumno')
            <a href="{{route('homealumno.pdf')}}">
                <button class='float-left ml-1'>
                    <img class="btnedit" src="{{ asset('imagenes/salvar.png') }}" alt="">
                </button>
            </a>
            <a href="{{route('homealumno.generargrafica')}}">
                <button class='float-right mr-1'>
                    <img class="btnedit" src="{{ asset('imagenes/grafica2.png') }}" alt="">
                </button>
            </a>
            @else
            <a href="{{route('homedocente.pdf')}}">
                <button class='float-left ml-1'>
                    <img class="btnedit" src="{{ asset('imagenes/salvar.png') }}" alt="">
                </button>
            </a>
            <a href="{{route('homedocete.generargrafica')}}">
                <button class='float-right mr-1'>
                    <img class="btnedit" src="{{ asset('imagenes/grafica2.png') }}" alt="">
                </button>
               </a>
            @endif
            
       @endif
    </div>
    <div class="relative overflow-x-auto shadow-md flow-root relative text-center sm:rounded-lg mt-5">
        <label class='font-serif ml-2 text-xl text-center'>Resultados Generales</label>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                  <th scope="col" class="px-10 py-3">No.Resultado</th>
                  <th scope="col" class="px-10 py-3">ID Alumno</th>
                  <th scope="col" class="px-10 py-3">Alumno</th>
                  <th scope="col" class="px-10 py-3">Examen</th>
                  <th scope="col" class="px-10 py-3">Intentos</th>
                  <th scope="col" class="px-10 py-3">Promedio</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($resultados as $resultado)
                  <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
                    <th class="px-6 py-4 font-medium">
                        {{$resultado->id}}
                    </th>
                    <th class="px-6 py-4 font-medium">
                        {{$resultado->idAlumno}}
                    </th>
                    <th class="px-6 py-4 font-medium">
                        {{$resultado->alumno}}
                    </th>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->tituloExamen}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->intentos}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$resultado->promedio}}
                    </td>
                </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
    <div class="relative overflow-x-auto shadow-md text-center sm:rounded-lg mt-5">
        <label class='font-serif ml-2 text-xl text-center'>Calificaciones por intento</label>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                <tr>
                  <th scope="col" class="px-10 py-3">No.Resultado</th>
                  <th scope="col" class="px-10 py-3">ID Alumno</th>
                  <th scope="col" class="px-10 py-3">Calificación</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($calificaciones as $calificacion)
                  <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50  bg-gray-300 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
                    <th class="px-6 py-4 font-medium">
                        {{$calificacion->idResultado}}
                    </th>
                    <td class="px-6 py-4 font-medium">
                        {{$calificacion->idAlumno}}
                    </td>
                    <td class="px-6 py-4 font-medium">
                        {{$calificacion->calificacion}}
                    </td>
                </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</div>
    
@endsection