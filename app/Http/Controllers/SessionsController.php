<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }


    public function store(){
        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'Correo o Contraseña incorrectas, intenta de nuevo',
            ]);
        }else{
            if(auth()->user()->tipoUsuario == 'Alumno'){
                return redirect()->to('/homealumno');
            }
    
            if(auth()->user()->tipoUsuario == 'Docente'){
                return redirect()->to('/homedocente');
            }
        }
        
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }

    public function recuperarpassword(){
        return view('auth.recuperarpassword');
    }

    public function cambiarpassword($id){
        $user = User::where('id',$id)->get();
        return view('auth.cambiarpassword',compact('user'));
    }


    public function buscarusuario(Request $request){
        if(User::where('usuario',$request->usuario)->exists() && User::where('email',$request->email)->exists()){
            $user = User::where('usuario',$request->usuario)->where('email',$request->email)->get();
            foreach ($user as $value) {
                $id = $value->id;
            }
            return redirect()->route('cambiarpassword',$id);
        }else{
            return redirect()->route('recuperarpassword')->with('no encontrado','error');
        }
    }

    public function restablecer(Request $request, User $user){
        if($request->password == $request->password2){
            $id = $request->id;
            $pass = bcrypt($request->password);
            $user->where('id',$id)
            ->update(['password'=>$pass]);

            return redirect()->route('login.index')->with('update pass','update pass');
        }else{
            $id = $request->id;
            return redirect()->route('cambiarpassword',$id)->with('update pass error','error');
        }

        

    }
}
