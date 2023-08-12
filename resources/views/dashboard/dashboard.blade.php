@extends('components.app')
@section('homeContent')
    <div id="container"></div>
@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var data = <?php echo json_encode($data); ?>;
        var users = <?php echo json_encode($users); ?>;

        var categories = users.map(function(user) {
            return user.name;
        });

        console.log("Categorias:", categories);

        var values = users.map(function(user) {
            return data[user.id] || 0;
        });

        console.log("Valores:", values);

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Compras realizadas por Clientes'
            },
            subtitle: {
                text: 'TecnoShopSales'
            },
            xAxis: {
                categories: categories,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Importe ($)'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Importe',
                data: values
            }]
        });
    </script>
@endsection
