@extends('layouts.app')

@section('title','Registrar')

<style>
    #div1{
        background-image: url('../public/imagenes/fondo2.jpg');
    }
</style>

@section('content')

<div id="div1" class='h-screen text-black flex'>
    <div class='w-full max-w-xs m-auto'>
        <form class='bg-white shadow-md rounded px-8 pt-2 pb-5 mb-4' method="POST" action="">

            @csrf
            {{-- INPUT NOMBRE --}}
            <div class='mb-4 relative'>
                <label htmlFor='nombre' class='block text-gray-700 text-sm font-fold mb-2'>Nombre</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='nombre' placeholder='Ingresa tu nombre'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">person</i>
                    </div>
                </div>
            </div>
            {{-- @error('nombre')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror --}}
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT USUARIO--}}
            <div class='mb-4 relative'>
                <label htmlFor='usuario' class='block text-gray-700 text-sm font-fold mb-2'>Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='text' name='usuario' placeholder='Ingresa tu usuario'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">account_circle</i>
                    </div>
                </div>
            </div>
            @error('usuario')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT TIPO USUARIO --}}
            <div class='mb-4 relative'>
                <label htmlFor='tipoUsuario' class='block text-gray-700 text-sm font-fold mb-2'>Tipo de Usuario</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <select name='tipoUsuario' id='tipoUsuario' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                            <option value='Docente'>Docente</option>
                            <option value='Alumno'>Alumno</option>
                        </select>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">group</i>
                    </div>
                </div>
            </div>
            {{---------------------------------------------------------------------------------}}
            {{-- INPUT EMAIL --}}
            <div class='mb-4 relative'>
                <label htmlFor='email' class='block text-gray-700 text-sm font-fold mb-2'>Correo</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='email' name='email' placeholder='Ingresa tu correo'
                        class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">email</i>
                    </div>
                </div>
            </div>
            @error('email')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror
            {{---------------------------------------------------------------------------------}}

            {{-- INPUT CONTRASEÑA--}}
            <div class='mb-4 relative'>
                <label htmlFor='password' class='block text-gray-700 text-sm font-fold mb-2'>Contraseña</label>
                <div class='relative rounded shadow-sm'>
                    <div>
                        <input type='password' name='password' id='password'
                        placeholder='*******' class='shadow appearence-none border rounded w-full py-2 px-4.5 pr-3 pl-10 text-gray-700 leading-tight focus:outline-none focus:shadow-outline' required>
                    </div>
                    <div class='absolute  inset-y-0  left-2 flex items-center'>
                        <i class="material-icons">verified_user</i>
                    </div>
                    <div class="absolute inset-y-0  right-2 flex items-center topping float-right">
                        <button type="button" onclick="mostrar()"><i class="material-icons" id="ojo"></i></button>
                    </div>
                </div>
            </div>
            {{-- @error('password')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">* {{$message}}</p>
            @enderror --}}
            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN REGISTRAR --}}
            <a><button type="submit" class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full'>Registrar</button></a>
        </form>
            {{-- BOTÓN LOGIN --}}
            <p class='my-2 text-sm flex justify-center px-3 '>¿Ya tienes una cuenta?</p>
            <a href="http://localhost/simuladorexamenes/public/"><button onClick={handleNavigate} class='bg-white hover:bg-blue-400 text-black shadow-md rounded border-2 border-gray-300 py-2 px-4 w-full'>Iniciar Sesión</button>
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
       if(input.length > 0){
        document.getElementById('ojo').innerHTML = 'visibility';
       }else{
        document.getElementById('ojo').innerHTML = '';
       }   
    });
</script>

@endsection()