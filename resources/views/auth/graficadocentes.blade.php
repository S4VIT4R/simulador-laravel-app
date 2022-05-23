@extends('layouts.plantilla')


@section('title','Gráfica')

@section('content')

<div class="w-3/4 h-3/4 mt-5 bg-green-300 flow root m-auto">
    <div class='border border-2px h-10 bg-purple-200 text-center flow-root'>
        <label class='font-bold ml-2 text-2xl text-center'>Gráfica promedio de cada examen de los alumnos</label>
        <a href="{{route('homedocente.resultados')}}" class='float-right'>
            <img src="{{ asset('imagenes/cerrar.png') }}" alt="">
        </a>
    </div>
    <br>
    <div class="w-3/4 h-2/4 mt-5 mb-5 m-auto bg-white">
        <canvas id="myChart"></canvas>
    </div>
    <br>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script type="text/javascript">
    var arregloPromedios = <?php echo json_encode($arregloPromedios) ?>;
    var arregloAlumnos = <?php echo json_encode ($arregloAlumnos) ?>;
   
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: arregloAlumnos,
            boxWidth: 100,
            datasets: [{
                label: 'Promedio',
                data: arregloPromedios,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
            }]
        },
        options: {
            
            scales: {
                // y: {
                //     beginAtZero: false
                // }
                y: {
                                beginAtZero: true,
                                min: 0,
                                max: 100
                        }
            }
        }
    });
    
</script>
    
@endsection