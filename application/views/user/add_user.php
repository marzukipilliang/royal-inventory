        <form id="formActions" role="form" action="<?= base_url('api/APIUser/add')?>">
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <label>NIK</label>
                        <input id="nik" name="nik" type="number" class="form-control" placeholder="Nomor Induk" maxlength="20" required>
                        <p id="nama"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" maxlength="50" required>
                       
                    </div>
                </div>
                 
            </div>
            <div class="row">  
                <div class="col-md-6">   
                    <div class="form-group">
                        <input name="password" type="hidden" value="<?= generateRandomString(8) ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            
        </form>

<script>
    $("#nik").change(function(){
        $("#nama").html("");
        var nik = $("#nik").val();
        $.getJSON("<?= base_url()?>api/APIUser/checkNIK/?nik=" + nik, function( data ) {
            $("#nama").html(data['nama']);
        });
    }); 
</script>