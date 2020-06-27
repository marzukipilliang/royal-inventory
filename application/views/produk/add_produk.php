        <form id="formActions" role="form" action="<?= base_url('api/APIProduk/add')?>">
            <div class="row">         
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Kode</label>
                        <input style="text-transform: uppercase" name="kode" type="text" class="form-control" maxlength="7" required>
						<p class="help-block">*7 karakter.</p>
					</div>
                </div>
			</div>
			<div class="row">         
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input style="text-transform: uppercase" name="nm_produk" type="text" class="form-control" maxlength="50" required>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-md-4">
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