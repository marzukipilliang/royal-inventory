        <form id="formActions" role="form" action="<?= base_url('api/APIGudang/edit')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Gudang</label>
                        <input style="text-transform: uppercase"  value="<?= $gudang->nm_gudang ?>" name="nm_gudang" type="text" class="form-control"  maxlength="25" required>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<div>
							<label>
								<input type="hidden" name="id" value="<?= $gudang->gudang_id ?>">
								<button type="submit" class="btn btn-success">Update</button>
							</label>
						</div>
					</div>
				</div>
            </div>
        </form>