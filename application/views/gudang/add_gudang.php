        <form id="formActions" role="form" action="<?= base_url('api/APIGudang/add')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nama Gudang</label>
                        <input style="text-transform: uppercase" name="nm_gudang" type="text" class="form-control" maxlength="25" required>
                    </div>
                </div>
				<div class="col-md-6">
					<div class="form-group">
						<div>
							<label>
								<button type="submit" class="btn btn-primary">Submit</button>
							</label>
						</div>
					</div>
				</div>
            </div>
        </form>