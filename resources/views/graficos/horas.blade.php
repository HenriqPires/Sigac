@extends('layouts.sidebar')

@section('header', 'Gráfico de Horas por Turma')

@section('content')
    @if (count($dadosParaGrafico) > 0)
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    @else
        <div class="alert alert-info">
            Nenhuma hora complementar aprovada foi encontrada para exibir no gráfico.
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            const chartData = @json($dadosParaGrafico);

            // Evita erro se o array estiver vazio
            if (!chartData || chartData.length === 0) {
                document.getElementById('chart_div').innerHTML = 'Sem dados para exibir.';
                return;
            }

            chartData.unshift(['Turma', 'Horas Aprovadas']);

            const data = google.visualization.arrayToDataTable(chartData);

            const options = {
                title: 'Horas Complementares por Turma',
                hAxis: { title: 'Turma' },
                vAxis: { title: 'Horas' },
                legend: { position: 'none' },
                colors: ['#198754'],
                animation: {
                    duration: 1000,
                    easing: 'out',
                    startup: true
                }
            };

            const chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
