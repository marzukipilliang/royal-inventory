        <form id="formActions" role="form" action="<?= base_url('api/APISatuan/edit')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Satuan</label>
                        <input style="text-transform: uppercase"  value="<?= $satuan->nm_satuan ?>" name="nm_satuan" type="text" class="form-control"  maxlength="15" required>
                    </div>
                </div>
			</div>
			<div class="row">     
				<div class="col-md-6">
					<div class="form-group">
						<div>
							<label>
								<input type="hidden" name="id" value="<?= $satuan->satuan_id ?>">
								<button type="submit" class="btn btn-success">Update</button>
							</label>
						</div>
					</div>
				</div>
            </div>
        </form>