@extends('layouts.plantilla')

@section('title','Preguntas')

@section('content')

<form action="{{route('homealumno.respuestasexamen')}}"  method="POST">
    @csrf
    <div class='bg-slate-300 w-full h-full'>
        <div class='bg-green-200 w-3/4 h-9/10 m-auto mt-5 shadow rounded'>
            <div class='border border-2px h-11 bg-purple-200 flow-root'>
                <label class='font-serif ml-2 text-lg mr-80'>Alumno: {{auth()->user()->nombre}}</label>
                @foreach ($examentitulo as $titulo)
                    <label class='font-bold ml-10 text-xl'>{{$titulo->titulo}}</label>
                    <input hidden name="idExamen" value="{{$titulo->idExamen}}">
                    <input hidden name="titulo" value="{{$titulo->titulo}}">
                    <input hidden name="iduser" value="{{$titulo->id_user}}">

                @endforeach

                <a class="float-right" href="{{route('homealumno.examenes')}}">
                    <img class="btnedit" src="{{ asset('imagenes/cerrar.png') }}" alt="">
                </a>

                <button type="submit" class='float-right mr-1'>
                    <img class="btnedit" src="{{ asset('imagenes/salvar.png') }}" alt="">
                </button>

            </div>
        <div>
               @foreach ($pregunta as $index => $preguntas)
                    @if ($index == 0)
                    <div class="rounded bg-blue-400 mr-4 ml-4 mt-2 mb-3">
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="resp1" type="radio" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="resp2" type="radio" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="resp3" type="radio"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 1)
                        <div class="rounded bg-blue-400 mr-4 ml-4 mt-2 mb-3">
                            <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntas->opcion1}}" name="resp4" type="radio" /> {{$preguntas->opcion1}}
                            </label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntas->opcion2}}" name="resp5" type="radio" /> {{$preguntas->opcion2}}
                            </label>
                            <br>
                            <label class='mx-2'>
                                <input value="{{$preguntas->opcion3}}" name="resp6" type="radio"/> {{$preguntas->opcion3}}
                            </label>
                            <br>
                            <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                        </div>
                    @endif
                    @if ($index == 2)
                    <div class="rounded bg-blue-400 mr-4 ml-4 mt-2 mb-3">
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="resp7" type="radio" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="resp8" type="radio" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="resp9" type="radio"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 3)
                    <div class="rounded bg-blue-400 mr-4 ml-4 mt-2 mb-3">
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="resp10" type="radio" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="resp11" type="radio" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="resp12" type="radio"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                    </div>
                    @endif
                    @if ($index == 4)
                    <div class="rounded bg-blue-400 mr-4 ml-4 mt-2 mb-3">
                        <label class='font-bold ml-2 text-xl'>{{$index+1}}. {{$preguntas->pregunta}}</label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion1}}" name="resp13" type="radio" /> {{$preguntas->opcion1}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion2}}" name="resp14" type="radio" /> {{$preguntas->opcion2}}
                        </label>
                        <br>
                        <label class='mx-2'>
                            <input value="{{$preguntas->opcion3}}" name="resp15" type="radio"/> {{$preguntas->opcion3}}
                        </label>
                        <br>
                        <input name="correcta{{$index+1}}" value="{{$preguntas->correcta}}" hidden>
                    </div>
                    @endif
               @endforeach    
        </div>
    </div>
</form>
@endsection()