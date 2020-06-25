<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" >
				<div class="col-md-7">
					<form role="form" method="get" action="<?= base_url()?>Dashboard">
						<div class="form-group col-md-4">
						<div class="input-group date" data-provide="datepicker" data-date-format= "yyyy-mm-dd">
							<input type="text" class="form-control" name="awal" value="<?= $awal?>">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						</div>
						<div class="form-group col-md-4">
						<div class="input-group date" data-provide="datepicker" data-date-format= "yyyy-mm-dd">
							<input type="text" class="form-control" name="akhir" value="<?= $akhir?>">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						</div>
						<input type="hidden" name="view" value="visited">
						<button type="submit" class="btn btn-primary">Inquiry</button>
					</form>
				
				</div>
                <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/visited/?nik='.$admin->nik.'&awal='.$awal.'&akhir='.$akhir)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="kode" >Kode</th>
                        <th data-field="nama_toko" >Toko</th>
                        <th data-field="name" >Coordinator</th>
                        <th data-formatter="DateFormatter" data-field="date_created" data-align="center">Visited</th>
						<th data-field="reason_name">Reason</th>
                        <th data-field="group_name" data-align="center">Group</th>
                        <th data-field="duration" data-align="center">Duration</th>
                        <th data-field="nama_nilai" >Nilai</th>
                        <th data-field="rekomendasi" >Rekomendasi</th>
                        <th data-field="notes">Notes</th>
                    </tr>
                    </thead>
                </table>

                
            </div>
        </div>	
    </div>
</div><!--/.row-->
