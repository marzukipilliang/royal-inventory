<script>
	var pul0=0; var pul1=0; var pul2=0; var pul3=0; var pul4=0; var pul5=0; var pul6=0;
	var pob0=0; var pob1=0; var pob2=0; var pob3=0; var pob4=0; var pob5=0; var pob6=0;

<?php 
	$i=0;
	foreach ($pulsa as $pul):
		print 'pul'.$i.'='.$pul->qty.'; ';		
		$i++;
	endforeach;
	
	$i=0;
	foreach ($ppob as $pob):
		print 'pob'.$i.'='.$pob->qty.'; ';		
		$i++;
	endforeach;

?>
	var lineChartData = {
				 
			labels : ["<?= date('F Y', strtotime('-6 month'))?>","<?= date('F Y', strtotime('-5 month'))?>","<?= date('F Y', strtotime('-4 month'))?>","<?= date('F Y', strtotime('-3 month'))?>","<?= date('F Y', strtotime('-2 month'))?>","<?= date('F Y', strtotime('-1 month'))?>","<?= date('F Y')?>"],
			datasets : [
				{
					label: "Pulsa DataSet",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [pul0, pul1, pul2, pul3, pul4, pul5, pul6]
				
				},
				{
					label: "PPOB DataSet",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [pob0, pob1, pob2, pob3, pob4, pob5, pob6]
				}
			]

		}
		
	window.onload = function(){
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true
		});
	};
</script>