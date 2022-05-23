<?php

use App\Http\Controllers\HomeAlumnoController;
use App\Http\Controllers\HomeDocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/register', [RegisterController::class, 'create'])->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/', [SessionsController::class, 'create'])->name('login.index');

Route::post('/', [SessionsController::class, 'store'])->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
->middleware('auth')
->name('login.destroy');

Route::get('/recuperarpassword', [SessionsController::class, 'recuperarpassword'])
->name('recuperarpassword');

Route::get('/recuperarpassword/cambiarpassword/{id}', [SessionsController::class, 'cambiarpassword'])
->name('cambiarpassword');

Route::post('/recuperarpassword/recuperar', [SessionsController::class, 'buscarusuario'])
->name('buscarusuario');

Route::put('/recuperarpassword/restablece/{user}', [SessionsController::class, 'restablecer'])
->name('restablecer');
//-------------------------------------------------------------------------------------------

Route::get('/homealumno', [HomeAlumnoController::class, 'index'])
->name('homealumno.index')
->middleware('auth.alumno');

Route::get('/simuladorexamenes/examenesdisponibles', [HomeAlumnoController::class, 'examenesdisponibles'])
->name('homealumno.examenes')
->middleware('auth.alumno');

Route::get('/simuladorexamenes/examenesdisponibles/preguntasexamen/{id}', [HomeAlumnoController::class, 'preguntasexamen'])
->name('homealumno.preguntasexamen')
->middleware('auth.alumno');

Route::post('/simuladorexamenes/examenesdisponibles/preguntasexamen/responderpreguntas', [HomeAlumnoController::class, 'respuestasexamen'])->name('homealumno.respuestasexamen')
->middleware('auth.alumno');

Route::get('/simuladorexamenes/resultados/alumno', [HomeAlumnoController::class, 'resultado'])
->name('homealumno.resultado')
->middleware('auth.alumno');

Route::get('simuladorexamenes/resultados/generarpdf/alumno', [HomeAlumnoController::class, 'createPDF'])->name('homealumno.pdf');

Route::get('simuladorexamenes/resultadosalumno/graficar', [HomeAlumnoController::class,'generargrafica'])->name('homealumno.generargrafica');

Route::get('/simuladorexamenes/datos/alumno', [HomeAlumnoController::class, 'datosalumno'])
->name('homealumno.datosalumno')
->middleware('auth.alumno');

Route::put('/simuladorexamenes/datos/alumno/guardar/{user}', [HomeAlumnoController::class, 'guardardatosalumno'])
->name('homealumno.guardardatosalumno')
->middleware('auth.alumno');

//-----------------------------------------------------------------------------------------------

Route::get('/homedocente', [HomeDocenteController::class, 'index'])
->name('homedocente.index')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente', [HomeDocenteController::class, 'examenes'])
->name('homedocente.examenes')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente/crearexamendocente', [HomeDocenteController::class, 'crearexamen'])
->name('homedocente.crearexamen')
->middleware('auth.docente')->middleware('auth.docente');

Route::post('/simuladorexamenes/examenesdocente/crearexamendocente/guardarexamendocente', [HomeDocenteController::class, 'storecredentialsexamen'])->name('homedocente.createexamen')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente/crearexamen/crearpreguntasexamen', [HomeDocenteController::class, 'crearpreguntas'])
->name('homedocente.crearpreguntas')
->middleware('auth.docente');

Route::post('/simuladorexamenes/examenesdocente/crearexamen/guardarpreguntasexamen', [HomeDocenteController::class, 'storecrearpreguntas'])
->name('homedocente.crearpreguntasexamen')
->middleware('auth.docente');

Route::delete('/simuladorexamenes/examenesdocente/examenesdocente/{id}', [HomeDocenteController::class, 'destroy'])
->name('homedocente.examendestroy')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente/editarexamen/{id}', [HomeDocenteController::class, 'editarexamen'])->name('homedocente.editarexamen')
->middleware('auth.docente');

Route::delete('/simuladorexamenes/examenesdocente/editarexamen/eliminar/{id}', [HomeDocenteController::class, 'eliminarpregunta'])
->name('homedocente.eliminarpregunta')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente/editarexamen/agregarpregunta/{id}', [HomeDocenteController::class, 'agregarpregunta'])
->name('homedocente.agregarpregunta')
->middleware('auth.docente');

Route::post('/simuladorexamenes/examenesdocente/editarexamen/agregarpregunta', [HomeDocenteController::class, 'guardarnuevapregunta'])
->name('homedocente.guardarnuevapregunta')
->middleware('auth.docente');

Route::get('/simuladorexamenes/examenesdocente/editarexamen/editarpregunta/{id}', [HomeDocenteController::class, 'editarpregunta'])
->name('homedocente.editarpregunta')
->middleware('auth.docente');

Route::put('/simuladorexamenes/examenesdocente/editarexamen/editarpregunta/{pregunta}',[HomeDocenteController::class, 'update'])
->name('homedocente.updatepregunta')
->middleware('auth.docente');

Route::get('/simuladorexamenes/resultados/docente', [HomeDocenteController::class, 'resultados'])
->name('homedocente.resultados')
->middleware('auth.docente');

Route::get('/simuladorexamenes/resultados/generarpdf/docente', [HomeDocenteController::class, 'createPDF'])
->name('homedocente.pdf')
->middleware('auth.docente');

Route::get('/simuladorexamenes/resultadosdocente/graficar', [HomeDocenteController::class,'generargrafica'])
->name('homedocete.generargrafica')
->middleware('auth.docente');

Route::get('/simuladorexamenes/datos/docente', [HomeDocenteController::class, 'datosdocente'])
->name('homedocente.datosdocente')
->middleware('auth.docente');

Route::put('/simuladorexamenes/datos/docente/guardar/{user}', [HomeDocenteController::class, 'guardardatosdocente'])
->name('homedocente.guardardatosdocente')
->middleware('auth.docente');