		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Stock on Hand</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
              
                    <div class="panel-body" >
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
							<table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIStok/view/?gudang_id='.$gudang_id)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
								<thead>
								<tr>
									<th data-field="nm_gudang" >Gudang</th>
									<th data-field="kode" data-align="center">Kode</th>
									<th data-field="nm_produk" >Produk</th>
									<th data-formatter="NumberFormatter" data-field="qty" data-align="right" >Qty</th>
									<th data-formatter="KonversiFormatter" data-field="satuan" data-align="center" >Konversi</th>
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
		
		var gudang = $('#gudang_id').val();
			
		
		$('#tbl').bootstrapTable('refresh', {
			url: '<?= base_url()?>api/APIStok/view/?gudang_id='+ gudang
		});
				
		console.log("refreshing...");
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