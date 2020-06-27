        <form id="formActions" role="form" action="<?= base_url('api/APIProduk/edit')?>">
            <div class="row">         
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Kode</label>
                        <input value="<?= $produk->kode ?>" style="text-transform: uppercase" name="kode" type="text" class="form-control" maxlength="7" readonly required>
					</div>
                </div>
			</div>
			<div class="row">         
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input value="<?= $produk->nm_produk ?>" style="text-transform: uppercase" name="nm_produk" type="text" class="form-control" maxlength="50" required>
                    </div>
                </div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<div>
							<label>
								<input type="hidden" name="id" value="<?= $produk->produk_id ?>">
								<button type="submit" class="btn btn-success">Update</button>
							</label>
						</div>
					</div>
				</div>
            </div>
        </form>