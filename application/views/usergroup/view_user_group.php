		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User Group</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-10">
				<div class="panel panel-default">
                    <div class="panel-heading"><button id="btnAddNew" data-toggle="modal" data-target="#myActions" class="btn btn-primary">+Add New</button></div>
                    <div class="panel-body" >
                        <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIUserGroup/view')?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="is_active" data-sort-order="desc" >
                            <thead>
                            <tr>
                                <th data-formatter="ListFormatter" data-field="group_name" >Group Name</th>
								<th data-formatter="ChevronFormatter" data-field="allow_insert" data-align="center">Insert</th>
								<th data-formatter="ChevronFormatter" data-field="allow_update" data-align="center">Update</th>
								<th data-formatter="ChevronFormatter" data-field="allow_delete" data-align="center">Delete</th>
								<th data-formatter="ChevronFormatter" data-field="allow_report" data-align="center">Report</th>
								<th data-formatter="ChevronFormatter" data-field="allow_approve" data-align="center">Approve</th>
                                <th data-formatter="ActiveFormatter"  data-field="is_active" data-align="center">Status</th>
						        <th data-formatter="EditFormatter" data-field="user_group_id" data-align="center">Actions</th>        
                            </tr>
                            </thead>
                        </table>

                       
                    </div>
                </div>	
			</div>
		</div><!--/.row-->		
		