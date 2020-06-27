		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Mutasi Barang</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading"><button id="btnAddNew" data-toggle="modal" data-target="#myActions" class="btn btn-primary">+New Transfer</button></div>
                    <div class="panel-body" >
						<div class="col-md-7">
							<form role="form" method="post" action="<?= base_url('Transfer')?>">
								<div class="form-group col-md-4">
								<div class="input-group date" data-provide="datepicker" data-date-format= "yyyy-mm-dd">
									<input type="text" class="form-control" name="awal" value="<?= $awal?>">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								</div>
								<div class="form-group col-md-4">
								<div class="input-group date" data-provide="datepicker" data-date-format= "yyyy-mm-dd">
									<input type="text" class="form-control" name="akhir" value="<?= $akhir?>">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								</div>
								<button type="submit" class="btn btn-info">Inquiry</button>
							</form>
				
						</div>
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APITransaksi/view/?tipe=TRF&awal='.$awal.'&akhir='.$akhir)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
                            <thead>
                            <tr>
								<th data-field="transaksi_id" >Nomor</th>
                                <th data-field="nm_gudang" >Gudang</th>
								<th data-field="tanggal" data-align="center" >Tanggal</th>
								<th data-field="nm_mutasi" data-align="center" >Tipe</th>
								<th data-formatter="DetailFormatter" data-field="transaksi_id" data-align="center" >Detail</th>
								<th data-field="date_created" data-align="center" >Created</th>
                            </tr>
                            </thead>
                        </table>

                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
		