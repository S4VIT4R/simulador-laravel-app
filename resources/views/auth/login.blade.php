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
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 m-auto" method="POST" action="">
            
            @csrf
            {{-- Input del email--}}
            <div class='mb-4 relative'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-fold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email' placeholder='Ingresa tu correo'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">email</i>
                    </div>
                </div>
            </div>
            {{-----------------------------------------------------------}}

            {{-- Input de la contraseña--}}
            <div class='mb-4 relative flow-root'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-10 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                    </div>
                    <div class=' absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">verified_user</i>
                    </div>
                    <div class="absolute inset-y-0  right-2 flex items-center topping float-right">
                        <button type="button" onclick="mostrar()"><i class="material-icons" id="ojo"></i></button>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}

            {{-- MENSAJE DE ERROR--}}

            @error('message')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$message}}</p>

            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN LOGIN --}}
            <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 mb-3 rounded focus:outline-none focus:shadow-outline w-full'>Iniciar Sesión
            </button>
            <a href="{{route('recuperarpassword')}}" class="text-blue-600 w-full py-2 px-4 mt-5"><u>¿Has olvidado la contraseña?</u></a>
            
        </form>
            {{-- BOTÓN REGISTRAR --}}
            <p class='my-2 text-sm flex justify-center px-3 '>¿No tienes una cuenta?</p>
            <a href="http://localhost/simuladorexamenes/public/register">
                <button class="bg-white hover:bg-blue-400 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full">Crear Cuenta
                </button>
            </a>
    </div>
</div>

<script>
    function mostrar(){
        var x = document.getElementById('password')
            if(x.type==='password'){
                document.getElementById('ojo').innerHTML = '';
                x.type = 'text'
                document.getElementById('ojo').innerHTML = 'visibility_off';
            }else{
                document.getElementById('ojo').innerHTML = '';
                x.type = 'password'
                document.getElementById('ojo').innerHTML = 'visibility';
            }
    }

    document.getElementById('password').addEventListener('keyup',(event)=>{
       var input = event.path[0].value;
       if(input.length >0){
        document.getElementById('ojo').innerHTML = 'visibility';
       }else{
        document.getElementById('ojo').innerHTML = '';
       }   
    });

   

</script>


@endsection()

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('update pass') == 'update pass')
    <script>
        Swal.fire({
            icon: 'success',
            text: 'Contraseña actualizada',
        });
    </script>
@endif
@endsection