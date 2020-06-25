<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AGTI Billing - Login</title>
	<link href="<?= base_url().'assets/'?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/styles.css" rel="stylesheet">
		
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	
	<!--[if lt IE 9]>
	<script src="<?= base_url().'assets/'?>js/html5shiv.js"></script>
	<script src="<?= base_url().'assets/'?>js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" id="formLogin" method="post" action="<?= base_url('api/APIUser/login')?>">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Email" id="email" name="email" type="email" autofocus="" maxlength="30" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" id="password" name="password" type="password" maxlength="20" required>
							</div>
							<div id="notifLogin" class="alert bg-teal" role="alert">
								<em class="fa fa-lg fa-lock">&nbsp;</em> Masukkan id login anda!
							</div>
							<input type="submit" class="btn btn-primary" value="Login">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

	<script src="<?= base_url().'assets/'?>js/jquery-1.11.1.min.js"></script>
	<script src="<?= base_url().'assets/'?>js/bootstrap.min.js"></script>
	
	<script>
		
		$("#formLogin").submit(function(e) {
			
			//prevent Default functionality
			e.preventDefault();

			//get the action-url of the form
			var actionurl = e.currentTarget.action;
			
			//do your own request an handle the results
			$.post(actionurl,  $( this ).serialize())
				.done(function(data){
					
					if (data['success']){
						$("#notifLogin").toggleClass('bg-success').html('<em class="fa fa-lg fa-sign-in">&nbsp;</em> ' + data['message']);
						window.location = '<?= base_url()?>Dashboard';
					}else {
						$("#notifLogin").toggleClass('bg-warning').html('<em class="fa fa-lg fa-warning">&nbsp;</em> ' + data['message']);
					}	
				})
				.fail(function(xhr, status, error) {
					
					$("#notifLogin").toggleClass('bg-danger').html('<em class="fa fa-lg fa-exclamation">&nbsp;</em>  '+ error);
					
				});

		});

	</script>
</body>
</html>
