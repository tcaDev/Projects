

<!DOCTYPE html>

<html lang="en">

<head>

	<?php $this->load->view('header/header'); ?>
	

</head>



<body>

<div class="container-case">
	

	<div class="container">



	<!-- Header -->

		<!-- login continer -->

		<div class="col-lg-12 col-md-12 col-sm-12 login-container">



			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12">

					<div class="row">

						<div class="col-lg-2 col-md-2 col-sm-2">

							<!-- Logo -->

							<div class="fil-title pull-left">

								<?php echo img("resources/img/logo.png"); ?>

							</div>

							<!-- end Logo -->

						</div>

						<div class="col-lg-10 col-md-10 col-sm-10" style="top: 30px;">

							<h3 class="text-uppercase" style="font-weight: 600;font-size: 20px;">Fil-Port Express brokerage , inc.</h3>

							<h5 class="text-uppercase" style="font-weight: 600;"><?php echo $tab ?></h5>

						</div>

					</div>	

				</div>

			</div>

				<!-- end login continer -->

				<!-- end login continer -->

				<hr class="line">

				<!--Login form-->

					<!-- <form class="log-form" role="form"> -->

					<?php echo form_open('Login_user'); ?>

					   <?php echo validation_errors(); ?>

					<div class="log-form">

				        <div class="row">

				            <div class="form-group col-lg-12 col-md-12 col-sm-12">

				                <input type="text" class="form-control" name="username" placeholder="Email or Username" value="" required/>

				            </div>

				        </div>



				        <div class="row">

				            <div class="form-group col-lg-12 col-md-12 col-sm-12">

				                <input type="password" class="form-control input-normal" name="password" placeholder="Password" value="" required/>

				            </div>

				        </div>

				        <div class="row">

				        	<div class="form-group col-lg-12 col-md-12 col-sm-12">

			      				<div class="checkbox pull-left">

								  <label><input type="checkbox" value="">Remember me</label>

								</div>

								<span class="pull-right"><a href="" style="font-size: 15px !important; "> Forgot Email or Password? </a></span>

				            </div>	

				        </div>



				        <div class="row">

				        	<div class="form-group col-lg-12 col-md-12 col-sm-12">

				            	<button type="submit" class="pull-right btn btn-primary">Login</button>

				            	<a href="<?php echo base_url('login_user/registration');?>"><button type="button" class="pull-right btn btn-primary" style="margin-right: 10px;">Register</button></a>

				            	

				            </div>	

				        </div>

				    </div>

				    	<?php echo form_close(); ?>

			    

				<!--end Login form-->



			</div>

		</div>

	</div>

</body>

</html>





