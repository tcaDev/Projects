<div id="top_x_div-permonth" style="width:700px;height: 480px;"></div>


 <?php 
         foreach ($barchart_mnila_perMonth as $row) {
            $jan = $row->January;
            $feb = $row->February;
            $mar = $row->March;
            $apr = $row->April;
            $may = $row->May;
            $june = $row->June;
            $july = $row->July;
            $aug = $row->August;
            $sept = $row->September;
            $oct = $row->October;
            $nov = $row->November;
            $dec = $row->December;
        }

        foreach ($barchart_outport_perMonth as $row) {
            $jan_outport = $row->January;
            $feb_outport = $row->February;
            $mar_outport = $row->March;
            $apr_outport = $row->April;
            $may_outport = $row->May;
            $june_outport = $row->June;
            $july_outport = $row->July;
            $aug_outport = $row->August;
            $sept_outport = $row->September;
            $oct_outport = $row->October;
            $nov_outport = $row->November;
            $dec_outport = $row->December;
        }

        foreach ($barchart_air_perMonth as $row) {
            $jan_air = $row->January;
            $feb_air = $row->February;
            $mar_air = $row->March;
            $apr_air = $row->April;
            $may_air = $row->May;
            $june_air = $row->June;
            $july_air = $row->July;
            $aug_air = $row->August;
            $sept_air = $row->September;
            $oct_air = $row->October;
            $nov_air = $row->November;
            $dec_air = $row->December;
        }
?>
<script>
$(function () {
    $('#top_x_div-permonth').highcharts({
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'JobFile Transaction Per Month'
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
                    enabled: true
                   
                },
            }
        },
        xAxis: {
            categories: Highcharts.getOptions().lang.shortMonths
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [
        {
            //Manila
            name: 'Sea Freight Manila',
           
            data: [<?php echo $jan ?> , <?php echo $feb ?> , <?php echo $mar ?>,<?php echo $apr ?>,<?php echo $may ?>,<?php echo $june ?>,<?php echo $july ?>,<?php echo $aug ?>,<?php echo $sept ?>,<?php echo $oct ?>,<?php echo $nov ?>,<?php echo $dec ?>]
        },
        {
            //Outport
            name: 'Sea Freight Outport',
           
            data: [<?php echo $jan_outport ?> , <?php echo $feb_outport ?> , <?php echo $mar_outport ?>,<?php echo $apr_outport ?>,<?php echo $may_outport ?>,<?php echo $june_outport ?>,<?php echo $july_outport ?>,<?php echo $aug_outport ?>,<?php echo $sept_outport ?>,<?php echo $oct_outport ?>,<?php echo $nov_outport ?>,<?php echo $dec_outport ?>]
        },
        {
            //Outport
            name: 'Air Freight',
           
            data: [<?php echo $jan_air ?> , <?php echo $feb_air ?> , <?php echo $mar_air ?>,<?php echo $apr_air ?>,<?php echo $may_air ?>,<?php echo $june_air ?>,<?php echo $july_air ?>,<?php echo $aug_air ?>,<?php echo $sept_air ?>,<?php echo $oct_air ?>,<?php echo $nov_air ?>,<?php echo $dec_air ?>]
        }

        ]
    });
});

</script>