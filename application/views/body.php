<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Soal No. 1.1.3</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body" >
						<table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/ac/?nik='.$admin->nik)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
							<thead>
							<tr>
								<th data-field="empid" data-align="center">NIK</th>
								<th data-field="name" >Nama</th>
								<th data-field="pmtelp" >HP</th>
								<th data-field="gender" data-align="center" >Gender</th>
								<th data-formatter="ScheduleFormatter" data-field="empid" data-align="center">Schedule</th> 
								<th data-field="position_begin" data-align="center">Tgl Aktif</th>
								<th data-field="termination" data-align="center">Termination</th>
							</tr>
							</thead>
						</table>

						
					</div>
				</div>	
			</div>
		</div><!--/.row-->		
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