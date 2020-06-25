<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" >
                <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/ac/?nik='.$admin->nik)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="empid" data-align="center">NIK</th>
                        <th data-field="name" >Nama</th>
                        <th data-field="pmtelp" >HP</th>
                        <th data-field="gender" data-align="center" >Gender</th>
                        <th data-formatter="ScheduleFormatter" data-field="empid" data-align="center">Schedule</th> 
                        <th data-field="position_begin" data-align="center">Tgl Aktif</th>
						<th data-field="termination" data-align="center">Termination</th>
                    </tr>
                    </thead>
                </table>

                
            </div>
        </div>	
    </div>
</div><!--/.row-->		
<script>
    function ScheduleFormatter(value, row, index) {
        var el = '';
        if (row.schedule != null){
			try {
				var obj = JSON.parse(row.schedule);
				$.each(obj, function(i, item) {
					el += '<a href="<?= base_url()?>Dashboard/?view=schedule&id=' + row.empid + '-' + item.schedule_number + '">' + item.schedule_name + ' <span class="glyphicon glyphicon-calendar"></span></a><br />';
				});
				
			} catch(e) {
				console.log(e); 
			}
			
           
        } 
        return el;
    }
     
</script>