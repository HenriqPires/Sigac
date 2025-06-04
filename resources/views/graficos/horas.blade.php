@extends('layouts.sidebar')

@section('header', 'Gráfico de Horas por Turma')

@yield('scripts')
</body>
</html>

@section('content')
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const chartData = @json($dadosParaGrafico);
            chartData.unshift(['Turma', 'Horas Aprovadas']);

            const data = google.visualization.arrayToDataTable(chartData);

            const options = {
                title: 'Horas Complementares por Turma',
                hAxis: { title: 'Turma' },
                vAxis: { title: 'Horas' },
                legend: { position: 'none' }
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

@endsection
