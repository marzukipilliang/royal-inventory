    <form id="formActions" role="form" action="<?= base_url('api/' . $cntl . '/trash')?>">
        <div class="form-group">
            <label>Are you sure want to delete this record?</label>
            <input name="id" type="hidden" value="<?= $id ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>	
