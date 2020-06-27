		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pendaftaran Master Produk</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-10">
				<div class="panel panel-default">
                    <div class="panel-heading"><button id="btnAddNew" data-toggle="modal" data-target="#myActions" class="btn btn-primary">+Add New</button></div>
                    <div class="panel-body" >
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIProduk/view')?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
                            <thead>
                            <tr>
								<th data-formatter="ListFormatter" data-field="kode" data-align="center">Kode</th>
                                <th data-formatter="ListFormatter" data-field="nm_produk" >Nama Produk</th>
								<th data-formatter="KonversiFormatter" data-field="produk_id" data-align="center">Satuan</th>
						        <th data-formatter="EditFormatter" data-field="produk_id" data-align="center">Actions</th>        
                            </tr>
                            </thead>
                        </table>

                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
<script>
	function KonversiFormatter(value, row, index) {
			var el = '<a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Konversi"><span class="glyphicon glyphicon-th"></span></a>';
			return el;
				
		}
</script>