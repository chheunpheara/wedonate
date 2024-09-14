<div>
    <div id="chart"></div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    if (typeof funds === 'undefined') {
        let funds = '{!! $data !!}';
        funds = JSON.parse(funds);
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawTrendlines);

        function drawTrendlines() {
            var data = new google.visualization.arrayToDataTable(funds);

            var options = {
                title: 'Daily Supporter',
                colors: ['blue'],
                height: 300,
                width: '100%',
                hAxis: {
                    direction: -1,
                    slantedText: true,
                    slantedTextAngle: 45
                },
                fontSize: 10,
                chartArea: {
                    width: '90%'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('chart'));
            chart.draw(data, options);
        }
    }
</script>