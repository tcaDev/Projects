<div id="top_x_div" style="width:700px;height: 480px;"></div>

<script>
    $(function () {
    $('#top_x_div').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 17,
                beta: 16,
                depth: 70
            }
        },
        title: {
            text: 'JobFile Transaction'
        },
        subtitle: {
            text: 'Freights'
        },
        plotOptions: {
            column: {
                depth: 25
            },
             series:{
                dataLabels: {
                    enabled: true,
                    format: '{y}'
                },

            }
        },
        xAxis: {
           categories:['Sea Freight Manila', 'Sea Freight Outport', 'Air Freight']
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Transactions',
            colorByPoint:true,
            colors:['#801638','#027878','#FDB632'],
            data: [{
                name: 'Sea Freight Manila',
                y:<?php foreach ($barchart_mnila as $row) {
                    echo $row->Ratings;
                  }?>,
            }, {
                name: 'Sea Freight Outport',
                y: <?php foreach ($barchart_outport as $row) {
                    echo $row->Ratings;
                  }?>,

            }, {
                name: 'Air Freight',
                y:<?php foreach ($barchart_air as $row) {
                    echo $row->Ratings;
                 }?>,
            }]
        }],
        
    });
});
</script>