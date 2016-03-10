

<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">
	<title>Filport</title>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<?php echo link_tag('resources/css/style.css') ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
	

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

				<hr class="line">

				<!--Pass form-->

					<div class="forgot-form">
						<form action="<?php echo base_url('Add_user/update_password'); ?>" method="post" enctype="multipart/form-data" role="form">

				            <div class="input-group margin-bottom-sm col-lg-12 col-md-12 col-sm-12" style="padding: 20px;">
				            		<?php if(isset($email_hash,$email_code)){ ?>
				            			<input type="hidden" value="<?php echo $email_hash ?>" name="email_hash" />
				            			<input type="hidden" value="<?php echo $email_code ?>" name="email_code" />

				            		<?php } ?>
								  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
								  <input class="form-control" type="text" placeholder="Email address" name="email" value-"<?php echo (isset($email)) ? $email : '' ; ?>">
							</div>

							<div class="input-group margin-bottom-sm col-lg-12 col-md-12 col-sm-12" style="padding: 20px;">
								  <span class="input-group-addon"><i class="fa fa-key-o fa-fw"></i></span>
								  <input class="form-control" type="text" placeholder=" New Password" name="pass" value-"<?php echo set_value('pass'); ?>">
							</div>

							<div class="input-group margin-bottom-sm col-lg-12 col-md-12 col-sm-12" style="padding: 20px;">
								  <span class="input-group-addon"><i class="fa fa-key-o fa-fw"></i></span>
								  <input class="form-control" type="text" placeholder=" Re-type New Password" name="newpass" value-"<?php echo set_value('newpass'); ?>">
							</div>

				        	<div class="form-group col-lg-12 col-md-12 col-sm-12">

				            	<button type="submit" class="pull-right btn btn-primary" >Update Password</button>

				            </div>	
				          </form>
				    </div>

				    	
				    	<a style="display:block" href="<?php echo base_url('Login_user/login')?>">Back</a>

			    

				<!--end Pass form-->


			</div>

		</div>

	</div>

</body>

</html>





