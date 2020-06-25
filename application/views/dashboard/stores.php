<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" >
                <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/stores/?nik='.$admin->nik)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="subarea" data-align="center">Kode</th>
                        <th data-field="nama_toko" >Toko</th>
                        <th data-field="alamat_toko" >Alamat</th>
                        <th data-field="sublocation" >Kordinat</th>
                        <th data-field="radius" data-align="center">Radius</th>
                    </tr>
                    </thead>
                </table>

                
            </div>
        </div>	
    </div>
</div><!--/.row-->		