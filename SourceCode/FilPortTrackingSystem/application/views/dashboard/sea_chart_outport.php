


	<div id="piechart-outport" style="width: 900px; height: 470px;"></div>

<script>
	 $(function () {
    $('#piechart-outport').highcharts({
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
            text: 'Color Stages Sea Freight Outport'
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

