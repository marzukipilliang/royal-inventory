<script>
    
     $('#formActions').on('submit',(function(e) {
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
                    window.alert(data['message']);
                    if (data['success']){
                        var Cntl = '<?= $this->router->class ?>';
                        var theUrl = '<?= base_url()?>' + Cntl;
                        window.location = theUrl;
                    
                    }
                },
                error: function(data){
                    var errHtml =  data['responseText'];
                    $('#formActions').html(errHtml);

                }
            });
        }));


</script>

