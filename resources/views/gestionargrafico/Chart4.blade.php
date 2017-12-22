@extends('layouts.app')
@section('titulo')
@section('content')


    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Nombre de Indicadores', 'Porcentaje de Respuestas de Usuarios'],
                        @foreach($users as $u)
                    ['{{$u->descripcion}}',{{$u->user_count*10}}],
                    @endforeach
                ]);

                var options = {
                    chart: {
                        title: 'Estadisticas de Respuestas Negativas por Encuesta',
                        title: 'Cantidad de Respuestas Negativas',
                        subtitle: '{{count($users)}}',
                    },
                    bars: 'horizontal' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>
    </head>
    <body>
    <div id="barchart_material" style="width: 1000px; height: 1000px;"></div>
    </body>
    </html>

    </head>


    <body>

    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
    </html>

@endsection