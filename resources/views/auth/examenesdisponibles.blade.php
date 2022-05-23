@extends('layouts.plantilla')

@section('title','Examenes Disponibles')

@section('content')

<div class='w-3/4 bg-green-300 h-3/4 m-auto mt-5 shadow rounded relative flow-root flex'>
    <div class='border border-2px h-9 bg-purple-200 text-center'>
        <label class='font-serif ml-2 text-2xl text-center'>Exámenes Disponibles</label>
    </div>
    <div>
        @foreach ($examenes as $examen)
            <div class="mb-3">
                <div class="card-container">
                <div class="card-title"><h3 class="titulo">Examen</h3>
                </div>
                <div class="image-container"><img src="{{ asset('imagenes/cardimage.jpg') }}" alt=''/></div>
                    <div class="mitad">
                        <div class="card-content">     
                           <div class="card-body"><p class="card-title-p">{{$examen->titulo}}</p> </div>
                        </div>
                        <div class="btn"><a href="{{route('homealumno.preguntasexamen',$examen)}}"><button>Ver Examen</button></a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection()