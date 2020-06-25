<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
					<a href="<?= base_url('Dashboard'). '/?view=stores' ?>">
						<div class="row no-padding"><em class="fa fa-xl fa-home color-blue"></em>
							<div class="large"></div>
							<div class="text-muted">Stores</div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
					<a href="<?= base_url('Dashboard'). '/?view=ac' ?>">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?= number_count($ac->jumlah) ?></div>
							<div class="text-muted">Coordinators</div>
						</div>
					</a>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
					<a href="<?= base_url('Dashboard'). '/?view=tasks' ?>">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large"><?= number_count($task->jumlah) ?></div>
							<div class="text-muted">Tasks</div>
						</div>
					</a>
					</div>
				</div>
				
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
					<a href="<?= base_url('Dashboard'). '/?view=visited' ?>">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large"><?= number_count($visited->jumlah) ?></div>
							<div class="text-muted">Visited</div>
						</div>
					</a>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		<?php
			$view_path = VIEWPATH.'dashboard/'.$view.'.php';
			if (file_exists($view_path)) include_once($view_path); 
		?>

	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};
	</script>