 <!-- 	<meta charset="utf-8">

	<title>FilPort</title>
	<link rel="stylesheet" href="<?php //echo base_url('resources/my/bootstrap.min.css');?>" >
	<?php //echo link_tag('resources/css/style.css') ?>
	<script src="<?php //echo base_url('resources//my/jquery.js');?>"></script>
    <script src="<?php //echo base_url('resources/my/bootstrap.min.js');?>"></script>
 -->
 

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Filport</title>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/jquery_confirm/css/jquery-confirm.css');?>" />
	<?php echo link_tag('resources/css/style.css') ?>
	<?php echo link_tag('resources/css/dropdowns-enhancement.css') ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url('resources/jquery_confirm/js/jquery-confirm.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/dropdowns-enhancement.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/bootpag.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('resources/js/print.js'); ?>"></script>

</head>



<body>

	<div class="container container-case">

	<!-- Header -->
		<!-- Home Button-->
		<div class="col-lg-2 col-md-2 col-sm-2 pull-right home-btn">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 btn btn-info">
						<span><i class="fa fa-home fa-lg"></i> Home</span>
					</div>
				</div>
		</div>
		<!-- End Home Button -->
		<!-- Header -->
			<div class="col-lg-12 col-md-12 col-sm-12" style="top:-34px;">
				<div class="row">
				<!-- Logo -->
					<div class="col-lg-1 col-md-1 col-sm-1 user-img">
						<?php echo img('resources/img/logo.png'); ?> 
					</div>
				<!-- end Logo -->

				<!-- Title -->

					<div class="col-lg-6 col-md-6 col-sm-6" style="padding-top: 20px; color : #FFF; text-shadow:3px 3px 0 #000,-1px -1px 0 #000,  1px -1px 0 #000,-1px  1px 0 #000,1px  1px 0 #000;">

						<h3 class="text-uppercase" style="font-weight: 600;font-size: 20px;">Fil-Port Express brokerage , inc.</h3>

						<h5 class="text-uppercase" style="font-weight: 600;"><?php echo $tab ?></h5>
					</div>

				<!-- end Title -->
				<!-- User -->
					<div class="col-lg-4 col-md-4 col-sm-4 pull-right" style="padding-top: 20px;">
						<div class="row">
							<div class=" img-user pull-right">
								<img class="img-responsive" src="<?php echo base_url('upload/user/'.$img)?>" />	
							</div> 

							<div class="pull-right" style="padding: 10px; color : #FFF;">
								 <div class="btn-group" >
									<!-- Username -->
									  <a class="btn btn-primary" href="<?= base_url('Login_user/account') ?>" style="background-color: rgba(0,0,0,0.0); border-color :rgba(0,0,0,0.0); ">
									  	<i class="fa fa-user fa-fw"></i><?php echo " ".$fname." ".$lname."";?>
									  </a>
									<!-- End Username -->
									  <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: rgba(0,0,0,0.0); border-color :rgba(0,0,0,0.0); ">
									    <span class="fa fa-caret-down"></span></a>
									  <ul class="dropdown-menu bullet pull-right">
									    <li><a href="<?= base_url('Login_user/account') ?>"><i class="fa fa-cogs fa-fw"></i> Account Setting</a></li>
									    <li class="divider"></li>
									    <li><a href="<?= base_url('Login_user/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
									  </ul>
								</div>
							</div>
						</div>
					</div>
				<!-- end USer -->
				</div>
			</div>
	<!-- End Header -->



	<script>

	 $(document).ready(function(){
	 	$('.home-btn').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/menu/');?>";
	 	});
	
	 	$('.img-user').click(function(){
	 		window.location.href="<?php echo base_url('Login_user/account/');?>";
	 	});
	 });
	</script>

	<!-- End HEader -->