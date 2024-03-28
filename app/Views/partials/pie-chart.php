<body>
    <div class="container">
        <div class="">
            <div id="GooglePieChart" style="height: 600px; width: 100%"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
    google.charts.load('current', {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawPieChart);

    function drawPieChart() {
        $.ajax({
            url: `${hostUrl}api/reports/report/initPieChart`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status == 200) {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Tipo');
                    data.addColumn('number', 'Monto');

                    var totalAmount = 0;
                    var entriesAmount = 0;
                    var exitsAmount = 0;

                    response.data.forEach(function(item) {
                        totalAmount += parseFloat(item.monto);
                        if (item.tipo_registro === 'Entrada') {
                            entriesAmount += parseFloat(item.monto);
                        } else if (item.tipo_registro === 'Salida') {
                            exitsAmount += parseFloat(item.monto);
                        }
                    });

                    var entriesPercentage = (entriesAmount / totalAmount) * 100;
                    var exitsPercentage = (exitsAmount / totalAmount) * 100;

                    data.addRow(['Entradas (' + entriesPercentage.toFixed(2) + '%)', entriesAmount]);
                    data.addRow(['Salidas (' + exitsPercentage.toFixed(2) + '%)', exitsAmount]);

                    var options = {
                        title: 'Registros de Entradas y Salidas',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('GooglePieChart'));
                    chart.draw(data, options);
                } else {
                    console.error('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
            }
        });
    }
</script>

</body>
