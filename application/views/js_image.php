
    <script>
    
        $('#uploadImage').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type:'POST',
                url: $(this).attr('action'),
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    $('#tblImages').bootstrapTable('refresh');
                    console.log(data['message']);
                },
                error: function(data){
                    console.log(data);
                    alert(data['message']);

                }
            });
        }));


        function SeqFormatter(value, row, index) {
			
            var opt = '<select id="' + row.id +'" onchange="return changeSeq(this)">';
            for (i = 0; i < 7; i++) { 
                if (value == i){
                    opt = opt + '<option selected value="' + i + '">' + i +'</option>'; 

                }else {
                    opt = opt + '<option value="' + i + '">' + i +'</option>'; 

                }
                
            }
            opt = opt + "</select>";
            return opt;
			
		}

        function changeSeq(opt){
            var id = opt.id;
            $.post('<?= base_url()?>api/<?= $cntl ?>/changeseq',
                {
                    id: id,
                    seq: opt.value
                },
                function(data, status){
                    $('#tblImages').bootstrapTable('refresh');
                    console.log(data['message']);

            });

        }


        function RemoveFormatter(value, row, index) {
            var el = '<span class="glyphicon glyphicon-remove"  onClick="return removeImage('+ value +')" style="cursor: pointer;" ></span>';
            return el;
                
        }

        function removeImage(id){
            
            if (confirm('Are you sure you want to remove this image?')) {
                $.post('<?= base_url()?>api/<?= $cntl ?>/deleteimage',
                {
                    id: id
                },
                function(data, status){
                    $('#tblImages').bootstrapTable('refresh');
                    console.log(data['message']);
                });
            } 
        }

       
        // BOOTSTRAP TABLE INIT
        // =======================
        $(function () {
            $('[data-toggle="table"]').bootstrapTable();
        });
    

    </script>