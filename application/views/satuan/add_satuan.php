        <form id="formActions" role="form" action="<?= base_url('api/APISatuan/add')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Satuan</label>
                        <input style="text-transform: uppercase" name="nm_satuan" type="text" class="form-control " maxlength="15" required>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">					
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
            </div>
        </form>