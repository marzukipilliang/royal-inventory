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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>ROYAL</span> INVENTORY</a>
				
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			
			<div class="image-responsive">
				<img class="img-responsive" src="<?= base_url().'assets/'?>images/logo.jpg" alt="Chania"> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li class="<?= $active=='dashboard' ? 'active' : '' ?>"><a href="<?= base_url() ?>"><em class="fa fa-question-circle">&nbsp;</em> Soal No. 1.1.3</a></li>
		
			<li class="parent "><a data-toggle="collapse" href="#sub-master">
				<em class="fa fa-navicon">&nbsp;</em> Master <span data-toggle="collapse" href="#sub-master" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= in_array($active, array('satuan','produk','gudang')) ? '' : 'collapse' ?>" id="sub-master">
					<li><a class="<?= $active == 'gudang' ? 'active' : '' ?>" href="<?= base_url('Gudang')?>">
						<span class="fa fa-institution">&nbsp;</span> Gudang
					</a></li>	
					<li><a class="<?= $active == 'satuan' ? 'active' : '' ?>" href="<?= base_url('Satuan')?>">
						<span class="fa fa-archive">&nbsp;</span> Satuan
					</a></li>
					<li><a class="<?= $active == 'produk' ? 'active' : '' ?>" href="<?= base_url('Produk')?>">
						<span class="fa fa-shopping-basket">&nbsp;</span> Produk
					</a></li>
					
				</ul>
			</li>
			
			<li class="parent "><a data-toggle="collapse" href="#sub-trans">
				<em class="fa fa-navicon">&nbsp;</em> Transaksi <span data-toggle="collapse" href="#sub-trans" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= in_array($active, array('adjust','transfer')) ? '' : 'collapse' ?>" id="sub-trans">
					<li><a class="<?= $active == 'adjust' ? 'active' : '' ?>" href="<?= base_url('Adjustment')?>">
						<span class="fa fa-refresh">&nbsp;</span> Adjustment
					</a></li>	
					<li><a class="<?= $active == 'transfer' ? 'active' : '' ?>" href="<?= base_url('Transfer')?>">
						<span class="fa fa-share">&nbsp;</span> Transfer
					</a></li>
					
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-report">
				<em class="fa fa-bar-chart">&nbsp;</em> Report <span data-toggle="collapse" href="#sub-report" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= in_array($active, array('stok','mutasi')) ? '' : 'collapse' ?>" id="sub-report">
					<li><a class="<?= $active == 'stok' ? 'active' : '' ?>" href="<?= base_url('Stok')?>">
						<span class="fa fa-list-ol">&nbsp;</span> Stock on Hand
					</a></li>	
					<li><a class="<?= $active == 'balance' ? 'active' : '' ?>" href="<?= base_url('Balance')?>">
						<span class="fa fa-calendar">&nbsp;</span> Stock Balance
					</a></li>
					
				</ul>
			</li>

			<li class="parent "><a data-toggle="collapse" href="#sub-config">
				<em class="fa fa-cog">&nbsp;</em> Config <span data-toggle="collapse" href="#sub-config" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children <?= in_array($active, array('movement','erd','flowchart')) ? '' : 'collapse' ?>" id="sub-config">
					<li><a class="<?= $active == 'movement' ? 'active' : '' ?>" href="<?= base_url('Movement')?>">
						<span class="fa fa-arrows-h">&nbsp;</span> Movement Type
					</a></li>	
					<li><a class="<?= $active == 'erd' ? 'active' : '' ?>" href="<?= base_url('Erd')?>">
						<span class="fa fa-database">&nbsp;</span> ERD
					</a></li>
					<li><a class="<?= $active == 'flowchart' ? 'active' : '' ?>" href="<?= base_url('Flowchart')?>">
						<span class="fa fa-calendar">&nbsp;</span> Flowchart
					</a></li>
				</ul>
			</li>
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
		