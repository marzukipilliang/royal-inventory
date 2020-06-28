		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stock Balance</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-body" >
						<div class="form-group col-md-3">
							<label>Periode</label>
							<div class="input-group date" data-provide="datepicker" data-date-format= "yyyymm">
								<input id="periode" type="text" class="form-control input-lg" name="periode" value="<?= $periode ?>">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						<div class="form-group col-md-3">
							<label>Gudang</label>
							<div class="input-group">
							<select id="gudang_id" name="gudang_id" class="form-control input-lg">
								<?php foreach($gudang as $g): ?>
								<option value="<?= $g->gudang_id ?>" <?= $g->gudang_id == $gudang_id ? ' selected' : ''?>><?= $g->nm_gudang ?></option>
								<?php endforeach; ?>
							</select><span class="input-group-btn">
								<button id="inquiry" class="btn btn-primary btn-md" id="btn-todo"><i class="fa fa-search"></i></button>
								</span></div>
						</div>
						
						
						<div id="div-tbl">
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIStok/balance/?periode='.$periode.'&gudang_id='.$gudang_id)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
                            <thead>
                            <tr>
								<th data-field="kode" data-align="center">Kode</th>
								<th data-field="nm_produk" >Produk</th>
								<th data-formatter="NumberFormatter" data-field="awal" data-align="right" >Awal</th>
								<th data-formatter="NumberFormatter" data-field="masuk" data-align="right" >Masuk</th>
								<th data-formatter="NumberFormatter" data-field="keluar" data-align="right" >Keluar</th>
								<th data-formatter="NumberFormatter" data-field="adjust" data-align="right" >Adjust</th>
								<th data-formatter="NumberFormatter" data-field="akhir" data-align="right" >Akhir</th>
                            </tr>
                            </thead>
                        </table>
						</div>
						<div id="div-progress" style="display: none"><img src="<?= base_url()?>assets/images/loading.gif" /></div>
                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
<script>

	$('#inquiry').click(function(){
		$('#div-tbl').hide();
		$('#div-progress').show();
		
		var periode = $('#periode').val();
		var gudang = $('#gudang_id').val();
			
		$('#tbl').bootstrapTable('refresh', {
			url: '<?= base_url()?>api/APIStok/balance/?periode=' + periode + '&gudang_id='+ gudang
		});
		setTimeout(function () {
			$('#div-tbl').show();
			$('#div-progress').hide();
		}, 2000);
	});
	
    function KonversiFormatter(value, row, index) {
        var el = '';
        if (value != null){
			try {
				el += '<table class="table table-condensed">';
				el += '<tbody>';
				var obj = JSON.parse(value);
				var satuan;
				$.each(obj, function(i, item) {
					el += '<tr>';
					el += '<td align="right">'+ (row.qty / item['konversi']).toFixed(2).replace(/\.0+$/,'') +'</td>';
					if (item['konversi'] != 1){
						satuan = ' (' + item['konversi'] + ')';
					}else {
						satuan = '';
					}
					el += '<td>'+ item['nm_satuan']+ satuan +'</td>';
					el += '</tr>';		
				
				});
				el += '</tbody>';
				el += '</table>';
			} catch(e) {
				console.log(e); 
			}
			
        } 
        return el;
    }
     
</script>