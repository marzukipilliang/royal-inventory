        <form id="formKonversi" role="form" action="<?= base_url('api/APIProduk/konversi')?>">
			<div class="row">         
                <div class="col-lg-12">
                    <div class="form-group">
                        <label><?= $produk->kode.' '.$produk->nm_produk ?></label>
						
                    </div>
                </div>
			</div>
			
			<div class="row">         
				<div class="col-lg-5">
					<div class="row">
						<div class="form-group" style="padding-left: 15px;">
							<label>Satuan</label>
							<select name="satuan_id" class="form-control">
								<?php foreach($satuan as $s): ?>
								<option value="<?= $s->satuan_id ?>"><?= $s->nm_satuan ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						
					</div>
					<div class="row"> 
						<div class="form-group col-md-5">
							<label>Konversi</label>
							<input name="konversi" type="number" class="form-control" value="1" maxlength="4" required>
						</div>
						 	
					</div>
					<div class="row">    
						<div class="form-group col-md-3">
							<div>
								<label>
									<input type="hidden" name="produk_id" value="<?= $produk->produk_id ?>">
									<button type="submit" class="btn btn-primary">Submit</button>
								</label>
							</div>
						</div>
				
					</div>
				</div>
				<div class="col-lg-7">
					 <br />
					 <table id="tblKonversi" data-toggle="table" data-url="<?= base_url('api/APIProduk/view_konversi/'.$produk->produk_id)?>" >
						<thead>
						<tr>
							<th data-field="nm_satuan" data-align="center">Satuan</th>
							<th data-field="konversi" data-align="center">Konversi</th>
							<th data-formatter="RemoveFormatter" data-field="satuan_id" data-align="center"><i class="fa fa-trash"  ></i></th>        
						</tr>
						</thead>
					</table>
					<p id="help" class="help-block"><?= $produk->satuan_id == 0 ? '*belum ada konversi satuan!' : '' ?></p>
				</div>
			</div>
        </form>
		
<script>
    
	$('#formKonversi').on('submit',(function(e) {
		e.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			type:'POST',
			url: $(this).attr('action'),
			data:formData,
			cache:false,
			contentType: false,
			processData: false,
			success:function(data){
				console.log(data['message']);
				$('#help').html('');
			},
			error: function(data){
				console.log(data);
				alert(data['message']);

			}
		});
		
		$('#tblKonversi').bootstrapTable('destroy');
		$('[data-toggle="table"]').bootstrapTable();
		setTimeout(function () {
			$('#tblKonversi').bootstrapTable('refresh');
		}, 2000);
	}));


	function RemoveFormatter(value, row, index) {
		var el = '<span class="glyphicon glyphicon-remove"  onClick="return removeKonversi('+ value +')" style="cursor: pointer;" ></span>';
		return el;
			
	}

	function removeKonversi(id){
		
		if (confirm('Yakin hapus konversi ini?')) {
			$.post('<?= base_url()?>api/APIProduk/delete_konversi',
			{
				produk_id: <?= $produk->produk_id ?>,
				satuan_id: id
			},
			function(data, status){
				console.log(data['message']);
			});
			setTimeout(function () {
				$('#tblKonversi').bootstrapTable('destroy');
				$('[data-toggle="table"]').bootstrapTable();
			}, 1000);
		} 
		setTimeout(function () {
			$('#tblKonversi').bootstrapTable('refresh');
		}, 2000);
		
	}

   
	// BOOTSTRAP TABLE INIT
	// =======================
	$(function () {
		$('[data-toggle="table"]').bootstrapTable();
	});


</script>