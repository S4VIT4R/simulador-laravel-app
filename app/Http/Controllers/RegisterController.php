<?php

namespace App\Http\Controllers;


use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){

        $email = request('email');
        $usuario = request('usuario');

        if(User::where('usuario',$usuario)->exists()){
            return back()->withErrors([
                'usuario' => 'Usuario registrado',
            ]);
        }else{
            if (User::where('email', $email)->exists()){
                return back()->withErrors([
                    'email' => 'Correo registrado',
                ]);
            }else{
                $user = User::create(request(['nombre','usuario','tipoUsuario','email','password']));
    
                auth()->login($user);
    
                if(auth()->user()->tipoUsuario === 'Alumno'){
                    return redirect()->route('homealumno.index');
                }
    
                if(auth()->user()->tipoUsuario === 'Docente'){
                    return redirect()->route('homedocente.index');
                }   
                
            }
        }

        

    }
}
