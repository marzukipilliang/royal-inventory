<div class="row">
    
    <div class="col-lg-9">
        <div class="panel panel-default">
        <?php if ($task_id != 0){ ?>
            <div class="panel-heading">
                Task Detail
                <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
            <div class="panel-body" >
                <table id="tbl" data-toggle="table" data-url="<?= base_url('api/APIDashboard/tasks/?id='.$task_id)?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="date_created" data-sort-order="desc">
                    <thead>
                    <tr>
                        <th data-field="seq">Seq</th>
                        <th data-formatter="ListFormatter" data-field="description">Check List</th>
                        <th data-formatter="ImageFormatter"  data-field="image">Image</th>
                        <th data-field="bobot" data-align="right">Bobot</th>
                        <th data-field="group_name" >Group</th>
                        <th data-field="category_name" >Category</th>
                        
                    </tr>
                    </thead>
                </table>

                
            </div>
        <?php } ?>
        </div>	
    </div>
    <div class="col-lg-3">
        <div class="panel panel-default chat">
        <?php  if ($admin->jabatan == 'SUPERUSER') { ?>
        <div class="panel-heading"><a href="<?= base_url('Task/add')?>" class="btn btn-primary">+Add New</a></div>
        <?php } ?>
            <div class="panel-body" >
                <div class="form-group">
                    <label>All of Tasks</label>
                    <?php foreach ($tasks as $t): ?>
                        <div class="radio">
                            <label>
                                <input onClick="viewDetail(this.id)" type="radio" name="optionsRadios" id="task<?= $t->task_id ?>" value="<?= $t->task_id ?>" <?= $task_id == $t->task_id ? ' checked' : ''?>>
                                    <?= $t->task_id.' '.date('d-M-Y ', strtotime($t->effective_date))?><?= $t->is_active == 1 ? ' <em class="fa fa-check-square" style="font-size:15px;color:red"></em>' : '' ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <ul>
            </div>
        </div>	

        <div class="panel panel-default">
        <?php  if ($task_id != 0) { ?>
            <div class="panel-heading">Total Bobot</div>
            <div class="panel-body" >
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
				        <div class="row no-padding" >
							<div class="large" style="text-align:right"><?= $bobot->jumlah ?></div>							
						</div>
					</div>
				</div>
            </div>
        <?php } ?>
        </div>	
    </div>
</div><!--/.row-->		
<script>
    function viewDetail(id){
        var task_id = document.getElementById(id).value;
        var theUrl = '<?= base_url()?>Dashboard/?view=tasks&id='+task_id;
        window.location = theUrl;
    }

    function ListFormatter(value, row, index){
        var el = '';
        if (row.is_active == 0) el += '<del>';  
		    el += value;
        if (row.is_active == 0) el += '</del>';
		return el;
			
	}
</script>