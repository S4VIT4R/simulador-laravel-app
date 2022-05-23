@extends('layouts.plantilla')

@section('title','Editar Examen')

@section('content')
    <div class='bg-slate-300 w-full'>
        <div class='bg-green-200 w-3/4 h-9/10 m-auto mt-5 shadow rounded'>
            <div class='border border-2px h-12 bg-purple-200 flow-root flex'>
                @foreach ($examentitulo as $element)
                    <label class='font-bold ml-2 ml-100 text-2xl'>{{$element->titulo}}</label>
                    {{--BOTÓN SALIR--}}
                    <a href="{{route('homedocente.examenes')}}" class="float-right mr-1 mt-1">
                        <img class="btnedit" src="{{ asset('imagenes/cerrar.png') }}" alt="">
                     </a>
                {{--BOTÓN AGREGAR--}}
                    <a href="{{route('homedocente.agregarpregunta',$element->idExamen)}}" class="float-right mr-1 mt-1">
                        <img class="btnedit"  src="{{ asset('imagenes/agregar-pregunta.png') }}" alt="">
                    </a>
                @endforeach
            </div>

            <div style="padding: 15px">
                @foreach ($examen as $examenes)
                <div class="card-titlee">
                    <div class="card-cuestions">
                      <b>
                        <p>{{$examenes->pregunta}}</p>
                      </b>
                      <div class="buttonsDocente">
                        <a href="{{route('homedocente.editarpregunta',$examenes)}}">
                            <button class="btnedit">
                                <img src="{{ asset('imagenes/editar2.png') }}" alt=""/>
                            </button>
                        </a>
                        <form action="{{route('homedocente.eliminarpregunta',$examenes)}}" method="POST" class="form-eliminar">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btnedit">
                                <img src="{{ asset('imagenes/eliminar2.png') }}" alt=""/>
                            </button>
                        </form>
                      </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection()

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'eliminada')
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Pregunta eliminada',
            })
        </script>
    @endif
    @if (session('eliminar') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            text: 'No puedes eliminar la pregunta, el examen debe tener mínimo 5 preguntas',
        })
    </script>
@endif
    @if (session('update') == 'update')
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Pregunta actualizada',
            })
        </script>
    @endif

    <script type="text/javascript">
        $('.form-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            text: "¿Estás seguro de eliminar la pregunta?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Eliminar'
            }).then((result) => {
            if (result.isConfirmed) {
               this.submit();
            }
            })
        });
    </script>

@endsection


