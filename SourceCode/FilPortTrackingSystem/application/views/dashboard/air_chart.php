


	<div id="piechart-air" style="width: 900px;height: 470px;"></div>

<script>
      $(function () {
    $('#piechart-air').highcharts({
         colors: [<?php foreach ($piechart as $row) {
            echo  "'".$row->ColorCode."',";
        } ?>],
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Color Stages Air Freight'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                },
                showInLegend: true,
                dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y}',
                }

            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                <?php
                    $remove_last="";
                    foreach ($piechart as $row) {
                      $remove_last.= "['".$row->StatusName."',".$row->Ratings."],";
                    }
                    echo substr($remove_last,0);
               ?>
            ]
        }]
    });
});
</script>

