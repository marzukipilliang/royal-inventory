<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Traffic Overview
                <ul class="pull-right panel-settings panel-button-tab-right">
							<li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
								<em class="fa fa-cogs"></em>
							</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li>
										<ul class="dropdown-settings">
											<li><a href="#">
												<em class="fa fa-cog"></em> Authorized Access
											</a></li>
											<li class="divider"></li>
											<li><a href="#">
												<em class="fa fa-cog"></em> Unauthorized Access
											</a></li>
											<li class="divider"></li>
									
										</ul>
									</li>
								</ul>
							</li>
						</ul>
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body">
                <div class="canvas-wrapper">
                    <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
<script>
    <?php 
    print 'var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};';
    print '
            var lineChartData = {
                labels : ["'.$traffic[0]->bulan.'","'.$traffic[2]->bulan.'","'.$traffic[4]->bulan.'","'.$traffic[6]->bulan.'","'.$traffic[8]->bulan.'","'.$traffic[10]->bulan.'","'.$traffic[12]->bulan.'"],
                datasets : [
                    {
                        label: "Auth Dataset",
                        fillColor : "rgba(220,220,220,0.2)",
                        strokeColor : "rgba(220,220,220,1)",
                        pointColor : "rgba(220,220,220,1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(220,220,220,1)",
                        data : ['.$traffic[0]->jumlah.','.$traffic[2]->jumlah.','.$traffic[4]->jumlah.','.$traffic[6]->jumlah.','.$traffic[8]->jumlah.','.$traffic[10]->jumlah.','.$traffic[12]->jumlah.']
                    },
                    {
                        label: "Reject Dataset",
                        fillColor : "rgba(48, 164, 255, 0.2)",
                        strokeColor : "rgba(48, 164, 255, 1)",
                        pointColor : "rgba(48, 164, 255, 1)",
                        pointStrokeColor : "#fff",
                        pointHighlightFill : "#fff",
                        pointHighlightStroke : "rgba(48, 164, 255, 1)",
                        data : ['.$traffic[1]->jumlah.','.$traffic[3]->jumlah.','.$traffic[5]->jumlah.','.$traffic[7]->jumlah.','.$traffic[9]->jumlah.','.$traffic[11]->jumlah.','.$traffic[13]->jumlah.']
                    }
                ]

            }';
    ?>
</script>