        <form id="formActions" role="form" action="<?= base_url('api/APIUserGroup/add')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Group Name</label>
                        <input name="group_name" type="text" class="form-control" placeholder="Group Name" maxlength="50" required>
                    </div>
                </div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Active?</label>
							<div class="radio">
								<label>
									<input type="radio" name="is_active" id="optionsRadios1" value="1" checked>Yes &nbsp;
								</label>
								<label>
									<input type="radio" name="is_active" id="optionsRadios2" value="0">No
								</label>
							</div>						   
					</div>
				</div>
            </div>
            
			<div class="row">         
                <div class="col-md-12">
					<div class="form-group">
						<label>Superiority</label>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="allow_insert" value="0" id="allow_insert" onClick="myCheckValue(this.id)">Allow Insert
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="allow_update" value="0" id="allow_update" onClick="myCheckValue(this.id)">Allow Update
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="allow_delete" value="0" id="allow_delete" onClick="myCheckValue(this.id)">Allow Delete
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="allow_report" value="0" id="allow_report" onClick="myCheckValue(this.id)">Allow Report
							</label>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="allow_approve" value="0" id="allow_approve" onClick="myCheckValue(this.id)">Allow Approve
							</label>
						</div>
					</div>
                </div> 
            </div>
			
            <div class="row">
				<div class="col-md-12">   
                    <div class="form-group">
						<label>&nbsp;</label>
						<div>
							<label>
								<button type="submit" class="btn btn-primary">Submit</button>
							</label>
						</div>
					</div>
                </div>
			</div>
        </form>