</div>	<!--/.main-->
	<!-- Bootstrap modal  -->
    <div class="modal fade" id="myActions" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">AGTI Billing</h4>
        </div>
        <div class="modal-body">
            <img src="<?= base_url('assets/images/')?>loading.gif" /> 
        </div>
        
        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            
        </div>
        
        </div>
    </div>
	</div>
	
	<script src="<?= base_url().'assets/'?>js/bootstrap.min.js"></script>
	<script src="<?= base_url().'assets/'?>js/chart.min.js"></script>
	<script src="<?= base_url().'assets/'?>js/chart-data.js"></script>
	<script src="<?= base_url().'assets/'?>js/easypiechart.js"></script>
	<script src="<?= base_url().'assets/'?>js/easypiechart-data.js"></script>
	<script src="<?= base_url().'assets/'?>js/bootstrap-datepicker.js"></script>
	<script src="<?= base_url().'assets/'?>js/custom.js"></script>
	<script src="<?= base_url().'assets/'?>js/bootstrap-table.js"></script>

	<!-- Javascript Moment -->
	<script src="<?= base_url().'assets/'?>js/moment.min.js"></script>

	<script>
		!function ($) {
			// Bootstrap Modal for Actions
			$(document).on("click", ".Actions", function () {
			
				var Id = $(this).data('id');
				var Cntl = '<?= $this->router->class ?>';
				var Title =  $(this).attr('title');
				var Mthd = Title.toLowerCase();
				var theUrl = '<?= base_url()?>' + ''+ Cntl + '/' + Mthd + '/' + Id;
				//alert(theUrl);
				$("#myModalLabel").html("Form " + Mthd.charAt(0).toUpperCase() + Mthd.slice(1) + " " + Cntl);
				$(".modal-body").html('<img src="<?= base_url()?>assets/images/loading.gif" />');
				$(".modal-body").load(theUrl);
				
			});

			// Bootstrap Modal for bntAddNew
			$("#btnAddNew").click(function () {
				
				
				var Cntl = '<?= $this->router->class ?>';
				var Mthd = 'Add';
				var Id;
				var theUrl;
				if (typeof $(this).data('id') === 'undefined') {
					theUrl = '<?= base_url()?>' + ''+ Cntl + '/' + Mthd;
				}else {
					theUrl =  '<?= base_url()?>' + ''+ Cntl + '/' + Mthd + '/' + $(this).data('id');
				}
				
				$("#myModalLabel").html("Form " + Mthd.charAt(0).toUpperCase() + Mthd.slice(1)  + " " + Cntl);
				$(".modal-body").html('<img src="<?= base_url()?>assets/images/loading.gif" />');
				$(".modal-body").load(theUrl);
				
		
			});
		
		}(window.jQuery);
    </script>
    
    <!-- standart number formating function -->
    <script>
		function NumberFormatter(value, row, index) {
			return 'Rp '+new Intl.NumberFormat('id-ID').format(value);
		
		}

		function ActionFormatter(value, row, index) {
			var el = '<a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>';
				el += ' <a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>';
			//console.log(value);
			return el;
				
		}


		function EditFormatter(value, row, index) {
			var el = '<a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>';
			return el;
				
		}

		function TrashFormatter(value, row, index) {
			var el = '<a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Delete"><span class="glyphicon glyphicon-trash"></span></a>';
			return el;
				
		}

		function DateFormatter(value, row, index) {
			var tgl = '';
			if (value != null) {
				dt = new Date(value);
				tgl = moment(dt).format('D MMM YYYY');
			}
			return tgl;
		}

		//JS isActive
		function ActiveFormatter(value, row, index) {
			var el = '<strong>';
			if (value==1) {
				el += 'Active';
			
			}else {
				el += 'Inactive';    
			}

			el += '</strong>';
			return el;
				
		}

       function ImageFormatter(value, row, index) {
		   var el;
		   if (value != null){
				var imgSrc = '<?= base_url()?>uploads/150/' + value;
				el = '<p align="center"><img class="img-responsive" src="'+ imgSrc + '" ></p>';	
		   }
		   return el;    
        }

		function CameraFormatter(value, row, index) {
                var el = ' <a class="Actions" data-toggle="modal" href="#myActions" data-id="' + value + '" title="Images"><span class="glyphicon glyphicon-camera"></span></a>';
		            return el;
        }

		function ListFormatter(value, row, index){
			var el = '';
			if (row.is_active == 0) el += '<del>';  
				el += value;
			if (row.is_active == 0) el += '</del>';
			return el;
		}


		function ChevronFormatter(value, row, index){
			var el = '';
			if (value == 1) el += '<i class="fa fa-check"></i>';

			return el;
		}
	</script>

</body>
</html>
