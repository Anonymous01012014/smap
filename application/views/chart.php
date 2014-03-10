<script type="text/javascript">

$(function () {
        $('#chart').highcharts({
            chart: {
                type: 'column',
                zoomType: 'x'
            },
            title: {
                text: 'Site scheduler connection status percentage'
            },
            xAxis: {
                categories: [
								<?php  
								for($i=0;$i<count($chart_data['categories']) - 1;$i++){
											echo "'".$chart_data['categories'][$i]."',";
										}
										echo "'".$chart_data['categories'][count($chart_data['categories']) - 1]."'"; ?>
							]
					//type: 'datetime',
					//maxZoom: 14 * 24 * 3600000 // two weeks
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'percentage %'
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
                
                <?php
                $start_date = explode("/",$chart_data['categories'][0]);
                
                 for($i=0;$i<count($chart_data['series']) - 1;$i++){
							echo "{name: '".$chart_data['series'][$i]['name']."',";
							if($i==0) echo "color: '#ABF59E',";
							//else
								 //echo "color: '#FF0000',";
								 ///echo "type: 'column',";
								 //echo "pointInterval: 24 * 3600 * 1000,";
								// echo "pointStart: Date.UTC(".$start_date[2].",".($start_date[0] - 1).",".$start_date[1]."),";
								 echo "  data: [";
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



<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

