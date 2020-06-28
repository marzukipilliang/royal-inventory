		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Soal Query No. 2.1</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-body" >

						<ul class="timeline">
							<li>
								<div class="timeline-badge"><em class="glyphicon glyphicon-pushpin"></em></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h3 class="timeline-title">Menampilkan 10 barang yang paling sering keluar dari setiap Gudang per Periode</h3>
									</div>
									<div class="timeline-body">
										<p id="sql"><?= $sql ?></p>
									</div>
								</div>
							</li>
							
						</ul>
						<div id="div-tbl">
							<table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIConfig/satu') ?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" >
								<thead>
								<tr>
									<th data-field="nm_gudang" >Gudang</th>
									<th data-field="periode" data-align="center">Periode</th>
									<th data-field="kode" data-align="center">Kode</th>
									<th data-field="nm_produk" >Produk</th>
									<th data-formatter="NumberFormatter" data-field="brpx_keluar" data-align="right" >Brpx Keluar</th>
								</tr>
								</thead>
							</table>
						</div>
						<div id="div-progress" style="display: none"><img src="<?= base_url()?>assets/images/loading.gif" /></div>
					</div>
                </div>	
			</div>
		</div><!--/.row-->		
	