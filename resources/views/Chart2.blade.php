@extends('layouts.app')

@section('content')

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Cantidad de Usuarios', 'Nombre de Facultad'],
                        @foreach($users as $u)
                    ['{{$u->descripcion}}',{{$u->user_count}}],
                    @endforeach
                ]);

                var options = {
                    title: 'Cantidad de Usuarios por Facultad'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
    </head>
    <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    </body>
    </html>


@endsection