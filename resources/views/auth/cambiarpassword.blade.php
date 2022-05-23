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
        @foreach ($user as $item)
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 m-auto" method="POST" action="{{route('restablecer',$item)}}">
            @csrf
            @method('put')
           <div class="mb-3">
            <label class="mb-3 font-bold">Ingresa tu nueva contraseña</label>
           </div>
            
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

        <div class='mb-4 relative flow-root'>
            <label htmlFor='password2' class='block text-gray-700 text-sm font-fold mb-2'>Repite la contraseña</label>
            <div class='relative rounded shadow-sm'>
                <div>
                    <input type='password' name='password2' id='password2'
                    placeholder='*******' class='shadow appearence-none border rounded w-full py-2 pr-3 pl-10 px-4.5 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'>
                </div>
                <div class=' absolute  inset-y-0  left-2 flex items-center'>
                    <i class="material-icons">verified_user</i>
                </div>
                <div class="absolute inset-y-0  right-2 flex items-center topping float-right">
                    <button type="button" onclick="mostrar2()"><i class="material-icons" id="ojo2"></i></button>
                </div>
            </div>
        </div>
        @error('error')
            <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{$error}}</p>
        @enderror
        
        <input type="text" name="id" id="id" value="{{$item->id}}" hidden>
      

            {{---------------------------------------------------------------------------------}}

            {{-- BOTÓN LOGIN --}}
            <button class='bg-blue-500 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 mt-3 mb-3 rounded focus:outline-none focus:shadow-outline w-full'>Restablecer
            </button>
            
           <div class="w-full justify-center text-center">
            <a href="{{route('login.index')}}" class="text-blue-600 m-auto justify-center text-center w-full py-2 px-4 mt-5"><u>Volver</u></a>
           </div>

        </form>
        @endforeach
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

    function mostrar2(){
        var x = document.getElementById('password2')
            if(x.type==='password'){
                document.getElementById('ojo2').innerHTML = '';
                x.type = 'text'
                document.getElementById('ojo2').innerHTML = 'visibility_off';
            }else{
                document.getElementById('ojo2').innerHTML = '';
                x.type = 'password'
                document.getElementById('ojo2').innerHTML = 'visibility';
            }
    }

    document.getElementById('password2').addEventListener('keyup',(event)=>{
       var input = event.path[0].value;
       if(input.length >0){
        document.getElementById('ojo2').innerHTML = 'visibility';
       }else{
        document.getElementById('ojo2').innerHTML = '';
       }   
    });

   

</script>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('update pass error') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            text: 'Las contraseñas no son iguales',
        });
    </script>
@endif
@endsection
