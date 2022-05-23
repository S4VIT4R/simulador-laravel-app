@extends('layouts.plantilla')

@section('title','Resultados Examen')

@section('content')

<div class='content-result'>
    <div class='bg-transparent w-50 m-auto shadow rounded'>
        <div class='bg-purple-200 flow-root text-center'>
            <label class='font-serif p-1 text-center text-lg'>Alumno: {{auth()->user()->nombre}}</label>
            <a href="{{route('homealumno.examenes')}}" class='float-right mr-1'>
                <img src="{{ asset('imagenes/cerrar.png') }}" alt="">
            </a>
        </div>
        <div class='text-center flow-root'>
            @if($correctas == 1)
                <label class='result-resp'>Tu calificación es 20/100 Respuestas correctas: {{$correctas}}</label>
            @endif
            @if ($correctas == 2)
                <label class='result-resp'>Tu calificación es 40/100 Respuestas correctas: {{$correctas}}</label>
            @endif
            @if ($correctas == 3)
                <label class='result-resp'>Tu calificación es 60/100 Respuestas correctas: {{$correctas}}</label>
            @endif
            @if ($correctas == 4)
                <label class='result-resp'>Tu calificación es 80/100 Respuestas correctas: {{$correctas}}</label>
            @endif
            @if ($correctas == 5)
                <label class='result-resp'>Tu calificación es 100/100 Respuestas correctas: {{$correctas}}</label>
            @endif
        </div>
        <div class='w-full  content-center h-full'>
            @if($correctas == 0)
                <div class='img-result'><img src="{{ asset('imagenes/0respuestas.jpg') }}" alt='' width='400'></div>
            @endif
            @if ($correctas == 1)
                <div class='img-result'><img src="{{ asset('imagenes/1buena.jpg') }}" alt='' width='400'></div>
            @endif
            @if ($correctas == 2)
                <div class='img-result'><img src="{{ asset('imagenes/2buenas.jpg') }}" alt='' width='400'></div>
            @endif
            @if ($correctas == 3)
                <div class='img-result'><img src="{{ asset('imagenes/3buenas.jpg') }}" alt='' width='400'></div>
            @endif
            @if ($correctas == 4)
                <div class='img-result'><img src="{{ asset('imagenes/4buenas.jpg') }}" alt='' width='400'></div>
            @endif
            @if ($correctas == 5)
                <div class='img-result'><img src="{{ asset('imagenes/5buenas.jpg') }}" alt='' width='400'></div>
            @endif
        </div>
    </div>
</div>

@endsection()