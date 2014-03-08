<script type="text/javascript">
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Stacked column chart'
            },
            xAxis: {
                categories: [
								<?php for($i=0;$i<count($chart_data['categories']) - 1;$i++){
											echo "'".$chart_data['categories'][$i]."',";
										}
										echo "'".$chart_data['categories'][count($chart_data['categories']) - 1]."'"; ?>
							]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Site scheduler connection status percentage'
                }
            },
            tooltip: {
                pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                shared: true
            },
            plotOptions: {
                column: {
                    stacking: 'percent'
                }
            },
                series: [
                
                <?php for($i=0;$i<count($chart_data['series']) - 1;$i++){
							echo "{name: '".$chart_data['series'][$i]['name']."',
								   data: [";
							for($j=0;$j<count($chart_data['series'][$i]['data']) - 1;$j++){
								echo (int)$chart_data['series'][$i]['data'][$j].",";
							}
							echo (int)$chart_data['series'][$i]['data'][count($chart_data['series'][$i]['data']) - 1].",";
							echo ']},';
						}	
						echo "{name: '".$chart_data['series'][count($chart_data['series']) - 1]['name']."',
							   data: [";
						for($j=0;$j<count($chart_data['series'][count($chart_data['series']) - 1]['data']) - 1;$j++){
							echo (int)$chart_data['series'][count($chart_data['series']) - 1]['data'][$j].",";
						}
						echo (int)$chart_data['series'][count($chart_data['series']) - 1]['data'][count($chart_data['series'][count($chart_data['series']) - 1]['data']) - 1].",";
						echo ']}'; ?>
                
					]
        });
    });
    

</script>

<script src="<?php echo base_url();?>js/highcharts.js"></script>
<script src="<?php echo base_url();?>js/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
