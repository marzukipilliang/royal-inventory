<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= ucfirst($active) ?></title>
	<link href="<?= base_url().'assets/'?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/datepicker3.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/styles.css" rel="stylesheet">
	<link href="<?= base_url().'assets/'?>css/bootstrap-table.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?= base_url().'assets/'?>js/html5shiv.js"></script>
	<script src="<?= base_url().'assets/'?>js/respond.min.js"></script>
	<![endif]-->
	<script src="<?= base_url().'assets/'?>js/jquery-1.11.1.min.js"></script>
	
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>AGTI</span> BILLING</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">0</span>
					</a>
						
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">0</span>
					</a>
						
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Administrator</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Manager</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="<?= $active=='dashboard' ? 'active' : '' ?>"><a href="<?= base_url() ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="<?= $active=='reports' ? 'active' : '' ?>"><a href="<?= base_url('JenisReport')?>"><em class="fa fa-bar-chart">&nbsp;</em> Report</a></li>
			
			<li class="parent "><a data-toggle="collapse" href="#sub-users">
				<em class="fa fa-navicon">&nbsp;</em> Users <span data-toggle="collapse" href="#sub-users" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= in_array($active, array('group','user','access')) ? '' : 'collapse' ?>" id="sub-users">
					<li><a class="<?= $active =='group' ? 'active' : '' ?>" href="<?= base_url('UserGroup')?>">
						<span class="fa fa-users">&nbsp;</span> User Group
					</a></li>	
				</ul>
			</li>
			
			<li><a href="<?= base_url('Dashboard/logout')?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?= base_url() ?>">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active"><?= $this->uri->segment(2) != null ? $this->uri->segment(2) : $this->uri->segment(1) ?></li>
			</ol>
		</div><!--/.row-->
		