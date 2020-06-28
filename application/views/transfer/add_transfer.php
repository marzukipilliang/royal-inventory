
			<div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Pengirim</label>
						<select id="gudang_id" name="gudang_id" class="form-control">
							<?php foreach($gudang as $g): ?>
							<option value="<?= $g->gudang_id ?>"><?= $g->nm_gudang ?></option>
							<?php endforeach; ?>
						</select>
                    </div>
                </div>
				<div class="col-md-6">
                    <div class="form-group">
                        <label>Tujuan</label>
						<select id="tujuan_id" name="tujuan_id" class="form-control">
							<?php foreach(array_reverse($gudang) as $g): ?>
							<option value="<?= $g->gudang_id ?>"><?= $g->nm_gudang ?></option>
							<?php endforeach; ?>
						</select>
                    </div>
                </div>
			</div>
			
			<div class="row">         
				<div class="col-md-8">
					<div class="form-group">
						<label>Produk</label>
						<select id="produk_id" name="produk_id"  data-live-search="true" class="form-control selectpicker" data-dropup-auto="false">
							<?php foreach($produk as $p): ?>
							<option value="<?= $p->produk_id ?>"><?= $p->nm_produk ?></option>
							<?php endforeach; ?>
						</select>
					</div> 	
				</div>
				<div class="col-md-4">
					<div class="form-group input-sm">
						<label>Qty</label>
						<div class="input-group">
							<input id="qty" type="number" class="form-control input-md" value="1"/><span class="input-group-btn">
								<button class="btn btn-primary btn-md" onClick="return addQty()" id="btn-add">Add</button>
						</span></div>
					</div>
				</div>
			</div>
			<div class="row">   
				<div class="col-md-12">
					 <br />
					 <table id="tblAdjust" data-toggle="table" data-url="<?= base_url('api/APIAdjust/view')?>"  >
						<thead>
						<tr>
							<th data-field="nm_produk">Produk</th>
							<th data-field="qty" data-align="right">Qty</th>
							<th data-formatter="RemoveFormatter" data-field="temp_id" data-align="center"><i class="fa fa-trash"  ></i></th>        
						</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">    
					<div class="form-group">
						<label>&nbsp;</label>
						<div style="text-align: right">
							<label>
							<button onclick="return prosesTransfer()" type="submit" class="btn btn-primary">Proses Transfer</button>
							</label>
						</div>
					</div>
				</div>
			</div>
<script>
    
	function prosesTransfer(){
		var gudang = $("#gudang_id").val();
		var tujuan = $("#tujuan_id").val();
		
		if (gudang == tujuan){
			alert('Gudang tujuan tidak boleh sama dengan pengirim!');
			
		}else {	
			$.get('<?= base_url()?>api/APITransfer/proses/?gudang_id='+gudang+'&tujuan_id='+tujuan,
			function(data, status){
				alert(data['message']);
				if (data['success']){
					var Cntl = '<?= $this->router->class ?>';
					var theUrl = '<?= base_url()?>' + Cntl;
					window.location = theUrl;
				
				}
			});
		}
	}
		
	function RemoveFormatter(value, row, index) {
		var el = '<span class="glyphicon glyphicon-remove"  onClick="return removeAdjust('+ value + ')" style="cursor: pointer;" ></span>';
		return el;
			
	}

	function addQty(){
		
		var i = $('#qty').val();
		var produk = $('#produk_id').val();
		var gudang = $("#gudang_id").val();
		
		$.get('<?= base_url()?>api/APITransfer/add/?gudang_id='+ gudang + '&produk_id='+ produk + '&qty=' + i, function(data, status){
			if (data['success']){
				console.log(data['message']);
				$("#gudang_id").attr("disabled", true); 
			}else {
				alert(data['message']);
			}
		});
		
		$('#tblAdjust').bootstrapTable('destroy');
		$('[data-toggle="table"]').bootstrapTable();
		
		setTimeout(function () {
			$('#tblAdjust').bootstrapTable('refresh');
		}, 2000);
		
		
	}

	function removeAdjust(id){
		if (confirm('Yakin hapus item ini?')) {
			$.post('<?= base_url()?>api/APIAdjust/delete',
			{
				temp_id: id
			},
			function(data, status){
				console.log(data['message']);
			});
		}
		setTimeout(function () {
			$('#tblAdjust').bootstrapTable('destroy');
			$('[data-toggle="table"]').bootstrapTable();
		}, 1000);
		
		setTimeout(function () {
			$('#tblAdjust').bootstrapTable('refresh');
		}, 2000);
		
	}


   
	// BOOTSTRAP TABLE INIT
	// =======================
	$(function () {
		$.get('<?= base_url()?>api/APIAdjust/delete_temp');
		$('.selectpicker').selectpicker();
		$('[data-toggle="table"]').bootstrapTable();
		setTimeout(function () {
			$('#tblAdjust').bootstrapTable('refresh');
		}, 2000);
	});


</script>