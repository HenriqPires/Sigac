<!DOCTYPE html>
<html>
<head>
    <title>Teste Gráfico</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Turma', 'Horas'],
          ['Turma A', 20],
          ['Turma B', 40],
          ['Turma C', 30]
        ]);

        var options = {
          title: 'Horas por Turma',
          width: 600,
          height: 400
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
    <div id="chart_div"></div>
</body>
</html>
