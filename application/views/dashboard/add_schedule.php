<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add Visit Schedule</h1>
    </div>
</div><!--/.row-->
        
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading"><label>SCHEDULE <?= $schedule->schedule_name ?></label></div>
            <div class="panel-body"> 
                <form id="formActions" role="form" action="<?= base_url('api/APIDashboard/addSchedule')?>">
                
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Store</label>
                                <select name="kode"  data-live-search="true" class="selectpicker form-control" data-dropup-auto="false">
                                    <?php foreach($toko as $t): ?>
                                    <option value="<?= $t->singkatan_toko ?>"><?= $t->nama_toko. ' '.$t->subarea ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Visit Date </label>
                                <div class="input-group date" data-provide="datepicker" data-date-format= "yyyy-mm-dd">
                                    <input type="text" class="form-control" name="visit_date" value="<?= date('Y-m-d', strtotime(substr($schedule->schedule_number,0,4)))?>">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Visit Hour </label>
                                <select name="hour" class="form-control">
                                    <?php for($i=1;$i<=23;$i++){ ?>
                                    <?php $hour = $i < 10 ? '0'.$i : $i  ?>
                                        <?php if ($i >= 7 &&  $i <= 22){ ?>
                                            <option value="<?= $hour ?>"><?= $hour ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Minute</label>
                                <select name="minute" class="form-control">
                                    <?php for($i=0;$i<=59;$i++){ ?>
                                    <?php $minute = $i < 10 ? '0'.$i : $i ?>
                                        <?php if ($i % 15 == 0){ ?>
                                        <option value="<?= $minute ?>"><?= $minute ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-md-4">    
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div>
                                    <label>
                                    <input type="hidden" name="number" value="<?= $schedule->schedule_number ?>" />
                                    <input type="hidden" name="periode" value="<?= $schedule->period ?>" />
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>


            </div>
        </div>	
    </div>
</div><!--/.row-->		
