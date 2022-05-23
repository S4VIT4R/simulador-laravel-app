@extends('layouts.plantilla')

@section('title','Examenes')

@section('content')

        <div class='w-3/4 bg-green-300 h-3/4 m-auto mt-5 shadow rounded relative flow-root flex'>
            <div class='border border-2px h-11 bg-purple-200 text-center'>
                <label class='font-serif ml-2 text-2xl text-center mt-1'>Tus exámenes</label>
                    <a href="{{route('homedocente.crearexamen')}}" class='float-right mr-0 mt-1'>
                        <img class="btnedit" src="{{ asset('imagenes/agregar-archivo.png') }}" alt="">
                    </a>
            </div>
            <div>
                @foreach ($examenes as $examen)
                <div class="mb-3">
                    <div class="card-container">
                        <div class="card-title-exam">
                        <h3>{{$examen->titulo}}</h3>
                        </div>
                        <div class="image-exam-docente"><img src="{{ asset('imagenes/examen.jpg') }}" alt='' class="imagenExamen"/>
                        </div>

                        <div class="mitad-exa">
                            <div class="btn">
                                {{--BOTÓN EDITAR--}}
                                 <a href="{{route('homedocente.editarexamen',$examen)}}">
                                    <button>
                                        <svg class="h-8 w-8 text-blue-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                </a>
                                {{--ELIMINAR--}}
                                <form action="{{route('homedocente.examendestroy',$examen)}}" method="POST" id="form-eliminar" class="form-eliminar">
                                    @csrf
                                    @method('delete')
                                        <button type="submit">
                                            <svg class="h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" /><line x1="15" y1="9" x2="9" y2="15" /><line x1="9" y1="9" x2="15" y2="15" /></svg>
                                        </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection()

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('eliminar') == 'eliminado')
        <script>
            Swal.fire({
                icon: 'success',
                text: 'Examen eliminado',
            });
        </script>
    @endif

    <script type="text/javascript">
        $('.form-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            text: "¿Estás seguro de eliminar el examen?",
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

