		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Pendaftaran Master Satuan</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-10">
				<div class="panel panel-default">
                    <div class="panel-heading"><button id="btnAddNew" data-toggle="modal" data-target="#myActions" class="btn btn-primary">+Add New</button></div>
                    <div class="panel-body" >
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APISatuan/view')?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc" >
                            <thead>
                            <tr>
                                <th data-field="nm_satuan" >Nama Satuan</th>
							    <th data-field="date_created" data-align="center">Created</th>
								<th data-field="date_updated" data-align="center">Updated</th>
						        <th data-formatter="EditFormatter" data-field="satuan_id" data-align="center">Actions</th>        
                            </tr>
                            </thead>
                        </table>

                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
		