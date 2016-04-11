


	<div id="piechart" style="width: 100%; height: 100%;"></div>

<script>
	 $(function () {
    $('#piechart').highcharts({
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
            text: 'Color Stages Sea Freight Manila'
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
                format: '<b>{point.name}</b>: {point.percentage:.1f}%',
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Ratings',
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

