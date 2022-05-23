<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use App\Models\Examenes;
use App\Models\Preguntas;
use App\Models\Resultados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;


class HomeAlumnoController extends Controller
{
    public function index(){
        return view('auth.homealumno');
    }

    public function examenesdisponibles(){
        $examenes = Examenes::all();
        return view('auth.examenesdisponibles', compact('examenes'));
    }

    public function preguntasexamen($id){
        $idExamen = $id;
        $pregunta = Preguntas::where('idExamen',$idExamen)->inRandomOrder()->limit(5)->get();
        $examentitulo = Examenes::all()->where('idExamen',$idExamen);

        return view('auth.responderpreguntas', compact('pregunta','examentitulo'));
    }



    public function respuestasexamen(Request $request){

        $calificacion = 0;
        $correctas = 0;
        $resp1 = "";
        $resp2 = "";
        $resp3 = "";
        $resp4 = "";
        $resp5 = "";

        if($request->resp1 != ""){
            $resp1 = $resp1.$request->resp1;
        }

        if($request->resp2 != ""){
            $resp1 = $resp1.','.$request->resp2;
        }

        if($request->resp3 != ""){
            $resp1 = $resp1.','.$request->resp3;
        }

        if($resp1 == $request->correcta1){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //------------------------------------
        if($request->resp4 != ""){
            $resp2 = $resp2.$request->resp4;
        }

        if($request->resp5 != ""){
            $resp2 = $resp2.','.$request->resp5;
        }

        if($request->resp6 != ""){
            $resp2 = $resp2.','.$request->resp6;
        }

        if($resp2 == $request->correcta2){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //---------------------------------------

        if($request->resp7 != ""){
            $resp3 = $resp3.$request->resp7;
        }

        if($request->resp8 != ""){
            $resp3 = $resp3.','.$request->resp8;
        }

        if($request->resp9 != ""){
            $resp3 = $resp3.','.$request->resp9;
        }

        if($resp3 == $request->correcta3){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        //--------------------------------------

        if($request->resp10 != ""){
            $resp4 = $resp4.$request->resp10;
        }

        if($request->resp11 != ""){
            $resp4 = $resp4.','.$request->resp11;
        }

        if($request->resp12 != ""){
            $resp4 = $resp4.','.$request->resp12;
        }

        if($resp4 == $request->correcta4){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }
        

        //----------------------------------------
        if($request->resp13 != ""){
            $resp5 = $resp5.$request->resp13;
        }

        if($request->resp14 != ""){
            $resp5 = $resp5.','.$request->resp14;
        }

        if($request->resp15 != ""){
            $resp5 = $resp5.','.$request->resp15;
        }

        if($resp5 == $request->correcta5){
            $correctas++;
            $calificacion =  $calificacion + 20;
        }

        // if($request->correcta1 == $request->pregunta1){
        //     $correctas++;
        //     $calificacion = $calificacion + 20;
        // }

        // if($request->correcta2 == $request->pregunta2){
        //     $correctas++;
        //     $calificacion = $calificacion + 20;
        // }

        // if($request->correcta3 == $request->pregunta3){
        //     $correctas++;
        //     $calificacion = $calificacion + 20;
        // }

        // if($request->correcta4 == $request->pregunta4){
        //     $correctas++;
        //     $calificacion = $calificacion + 20;
        // }

        // if($request->correcta5 == $request->pregunta5){
        //     $correctas++;
        //     $calificacion = $calificacion + 20;
        // }
        $idExamen = $request->idExamen;
        $idAlumno = auth()->user()->id;
        $alumno = auth()->user()->nombre;

        if(Resultados::where('idExamen',$idExamen)->where('idAlumno',$idAlumno)->exists()){

            $intento = Resultados::where('idExamen',$idExamen)->where('idAlumno',$idAlumno)->get();

            foreach ($intento as  $datos) {
                $intentos = $datos->intentos;
                $idResultado = $datos->id;
            }

            //GUARDAMOS CALIFICACIÓN
            $calificaciones = new Calificaciones();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $request->iduser;
            $calificaciones->calificacion = $calificacion;
            $calificaciones->save();

            //sacar promedio
            $promedios = Calificaciones::where('idResultado',$idResultado)->get();
            $cali = 0;
            $totalCal = 0;
            foreach ($promedios as $value) {
                $totalCal++;
                $cali = $cali + $value->calificacion;
            }

            $promedio = ($cali/$totalCal);
            
            $intentos = $intentos+1;

            $resultado = Resultados::find($idResultado);
            $resultado->idAlumno = $idAlumno;
            $resultado->alumno = $alumno;
            $resultado->idDocente = $request->iduser;
            $resultado->idExamen = $request->idExamen;
            $resultado->tituloExamen = $request->titulo;
            $resultado->intentos = $intentos;
            $resultado->promedio = $promedio;
            $resultado->save();
            
        }else{
            $resultado = new Resultados();
            $resultado->idAlumno = $idAlumno;
            $resultado->alumno = $alumno;
            $resultado->idDocente = $request->iduser;
            $resultado->idExamen = $request->idExamen;
            $resultado->tituloExamen = $request->titulo;
            $resultado->intentos = 1;
            $resultado->promedio = $calificacion;
            $resultado->save();

            $idResultado = $resultado->id;
            $calificaciones = new Calificaciones();
            $calificaciones->idResultado = $idResultado;
            $calificaciones->idAlumno = $idAlumno;
            $calificaciones->idDocente = $request->iduser;
            $calificaciones->calificacion = $calificacion;
            $calificaciones->save();
        } 
        return view('auth.resultadoexamen',compact('correctas'));
    }

    public function resultado(){
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);
        $calificaciones = Calificaciones::all()->where('idAlumno',$idAlumno);
        return view('auth.resultado',compact('resultados','calificaciones'));
    }

    public function createPDF(){
        $dompdf = App::make("dompdf.wrapper");
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);
        $calificaciones = Calificaciones::all()->where('idAlumno',$idAlumno);
        $dompdf->loadView('pdf.generarpdf',compact('resultados','calificaciones'))->setOptions(['defaultFont' => 'sans-serif']);;
        return $dompdf->download('resultados.pdf');
    }
    
    public function generargrafica(){
        $idAlumno = auth()->user()->id;
        $resultados = Resultados::all()->where('idAlumno',$idAlumno);

        $arregloExamenes = [];
        $arregloIntentos = [];

        foreach ($resultados as $key => $value) {
            $arregloExamenes[] = $value->tituloExamen;
            $arregloIntentos[] = $value->intentos;
        }
        return view('auth.graficaalumnos', compact('arregloExamenes','arregloIntentos'));
    }

    public function datosalumno(){
        return view('auth.editardatosalumno');
    }

    public function guardardatosalumno(Request $request, User $user){

        $user->where('id',auth()->user()->id)
       ->update(['nombre'=>$request['nombre'], 'usuario'=>$request['usuario'],
        'email'=>$request['email']]);

        return redirect()->route('homealumno.index')->with('actualizado','update');
    }
}
