      
        <form id="formActions" role="form" action="<?= base_url('api/APIDashboard/editSchedule')?>">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Store </label>
                        <input name="store" type="text" class="form-control" value="<?= $schedule->kode.' '.$schedule->nama_toko ?>" readonly>
                    </div>
                </div>
				<div class="col-md-4">
                    <div class="form-group">
                        <label>Visit Schedule </label>
                        <input name="visit" type="text" class="form-control" value="<?= date('d M Y', strtotime($schedule->visit_date)).' '.$schedule->visit_hour ?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Active?</label>
							<div class="radio">
							<label>
								<input type="radio" name="is_active" id="optionsRadios1" value="1" <?php if ($schedule->is_active == 1) echo ' checked'?>>Yes &nbsp;
							</label>
							<label>
								<input type="radio" name="is_active" id="optionsRadios2" value="0" <?php if ($schedule->is_active == 0) echo ' checked'?>>No
							</label>
						</div>						   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">    
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $schedule->schedule_id ?>">
                        <button type="submit" class="btn btn-success" <?= strtotime($schedule->visit_date) < time() ? ' disabled' : ''?> >Update</button>
                    </div>
                </div>
            </div>
        </form>
