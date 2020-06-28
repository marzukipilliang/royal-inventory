<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Soal No. 1.3</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body" >
					<form method="post" id="formSoal" role="form" action="<?= base_url('Dashboard')?>">
							<div class="row">         
								<div class="col-md-3">
									<div class="form-group">
										<label>Silakan input angka 1 - 100:</label>
										<div class="input-group">
											<input value="<?= $angka ?>" id="angka" name="angka" type="number" class="form-control input-md" placeholder="Input Angka" maxlength="3" required /><span class="input-group-btn">
												<button class="btn btn-primary btn-md" id="btn-submit">Submit</button>
										</span></div>
									
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group has-success">
										<label>Your number:</label>
										<input id="result" name="result" type="text" class="form-control" value="<?= $result ?>" readonly>
										<p class="help-block" ><?= $jackpot ?></p>
									</div>
								</div>
								
							</div>
						
							
						</form>		
					</div>
				</div>	
			</div>
		</div><!--/.row-->		