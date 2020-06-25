<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php 
				if ((int) $schedule->period >= (int) date('Ym')){ 
			?>
            <div class="panel-heading"><a class="btn btn-primary" href="<?= base_url('Dashboard/add/'.$empid.'-'.$number) ?>" >+Add New</a></div>
            <?php } ?>
            <div class="panel-body" >
                <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/schedule/?nik='.$empid.'&number='.$number)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-formatter="DateFormatter" data-field="visit_date" data-align="center">Tanggal</th>
                        <th data-field="visit_hour" data-align="center">Jam</th>
                        <th data-field="kode" data-align="center" >Kode</th>
                        <th data-formatter="ListFormatter" data-field="nama_toko" >Toko</th>
                        <th data-formatter="ListFormatter" data-field="alamat_toko" >Alamat</th>
                        <th data-field="sublocation" >Kordinat</th>
                        <th data-formatter="ActiveFormatter" data-field="is_active" data-align="center">Status</th>
                        <th data-formatter="EditFormatter" data-field="schedule_id" data-align="center">Actions</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>	
    </div>
</div><!--/.row-->		
