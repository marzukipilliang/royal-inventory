<script>
    function myCheckValue(id) {
        var checkBox = document.getElementById(id);
        // If the checkbox is checked, display the output text
        if (checkBox.checked == true){
            checkBox.value = 1;

        } else {
            checkBox.value = 0;
            
        }
    } 
</script>
