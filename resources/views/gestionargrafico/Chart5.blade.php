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
                    ['Nombre de Indicadores', 'si'],
                        @foreach($users as $u)

                    ['{{$u->descripcion}}',{{$u->user_count}} ],

                    @endforeach

                ]);




                var options = {
                    chart: {
                        title: 'Cantidad de Respuestas Positivas',
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
    <div id="barchart_material" style="width: 1000px; height: 500px;"></div>
    </body>
    </html>

@endsection