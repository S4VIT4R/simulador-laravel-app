<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .titulo{
            text-align: center;
            font: 0.5rem;
            color: black;
            width: 100%;
        } 

        .title, label{
            font: 0.5rem;
            color: black;
            margin-left: 15px
        }
        
        .tabla1{
            border: 2px;
            margin: auto;
        }

        .titulos{
            background-color: rgb(94, 160, 172);
            width: 100px;
            box-shadow: 2px;
            padding: 5px;
        }

        .columnas{
            background-color: rgb(221, 216, 216);
        }

        .th{
            text-align: center
        }

        .label{
            text-align: center;
            margin-left: 100px;
        }
    </style>
</head>
<body>
    <div class="titulo"><h1>RESULTADOS GENERALES Y CALIFICACIONES POR INTENTO</h1></div>
    <br>
    <div class="title"><label style="font: bold">Datos del Docente</label></div>
    <br>
    <div class="title"><label>ID: {{auth()->user()->id}}</label></div>
    <br>
    <div class="title"><label>Nombre: {{auth()->user()->nombre}}</label></div>
    <br>
    <div class="titulo"><label style="color: blue">Tabla de resultados generales por cada examen</label></div>
    <br>
    <table class="tabla1" border="">
        <thead>
            <tr class="titulos">
                <th style="width: 100px">ID Resultado</th>
                <th style="width: 100px">ID Alumno</th>
                <th style="width: 100px">Alumno</th>
                <th style="width: 100px">Examen</th>
                <th style="width: 100px">Intentos</th>
                <th style="width: 100px">Promedio</th>
            </tr>
            <tbody>
                @foreach ($resultados as $resultado)
                <tr style="text-center" class="columnas">
                    <td style="text-align: center">
                        {{$resultado->id}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->idAlumno}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->alumno}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->tituloExamen}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->intentos}}
                    </td>
                    <td style="text-align: center">
                        {{$resultado->promedio}}
                    </td>
                </tr>
                  @endforeach
            </tbody>
        </thead>
    </table>
    <br>
    <div class="titulo"><label style="color: blue">Tabla de calificaciones por intento de cada examen</label></div>
    <br>
    <table class="tabla1" border="1">
        <thead>
            <tr class="titulos">
              <th style="width: 200px">ID Resultado</th>
              <th style="width: 200px">ID Alumno</th>
              <th style="width: 200px">Calificación</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($calificaciones as $calificacion)
              <tr  class="columnas">
                <td style="text-align: center">
                    {{$calificacion->idResultado}}
                </td>
                <td style="text-align: center">
                    {{$calificacion->idAlumno}}
                </td>
                <td style="text-align: center">
                    {{$calificacion->calificacion}}
                </td>
            </tr>
              @endforeach
          </tbody>
    </table>

</body>
</html>