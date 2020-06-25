		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data User</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
                    <div class="panel-heading"><button id="btnAddNew" data-toggle="modal" data-target="#myActions" class="btn btn-primary">+Add New</button></div>
                    <div class="panel-body" >
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIUser/view')?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                            <thead>
                            <tr>
                                <th data-field="nik" data-align="center">NIK</th>
                                <th data-formatter="ListFormatter" data-field="nama" >Nama</th>
								<th data-field="email" data-align="center">Email</th>
                                <th data-field="jabatan" >Jabatan</th>
                                <th data-formatter="ActiveFormatter"  data-field="is_active" data-align="center">Status</th>
                                <th data-field="device_name" >Device</th>
                                <th data-formatter="DateFormatter" data-field="date_register" data-align="center">Register</th>
                                <th data-formatter="EditFormatter" data-field="user_id" data-align="center">Actions</th>
                                
                            </tr>
                            </thead>
                        </table>

                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
	