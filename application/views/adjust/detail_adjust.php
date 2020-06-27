
			<div class="row">   
				<div class="col-md-10">
					<form class="form-horizontal" method="post">
						<fieldset>
							
							<div class="form-group">
								<label class="col-md-3 control-label" for="gudang">Gudang</label>
								<div class="col-md-7">
									<input type="text" class="form-control"  value="<?= $adjust->nm_gudang ?>"  readonly>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-md-3 control-label" for="tanggal">Tanggal</label>
								<div class="col-md-7">
									<input type="text" class="form-control" value="<?= date('d M Y', strtotime($adjust->tanggal)) ?>" readonly>
								</div>
							</div>
							
						</fieldset>
					</form>
				</div>
			</div>
			<div class="row">   
				<div class="col-md-12">
					 <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APITransaksi/detail/?id='.$adjust->transaksi_id)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
						<thead>
						<tr>
							<th data-field="nm_produk" >Produk</th>
							<th data-field="qty" data-align="right">Qty</th>
							<th data-field="nm_satuan" data-align="center">Satuan</th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
			
<script>
    
	// BOOTSTRAP TABLE INIT
	// =======================
	$(function () {
		$('[data-toggle="table"]').bootstrapTable();
	});


</script>