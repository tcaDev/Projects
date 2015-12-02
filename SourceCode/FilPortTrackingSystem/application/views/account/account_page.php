

<!DOCTYPE html>

<html lang="en">

<head>

	<?php $this->load->view('header/header'); ?>

</head>



<body>

	<div class="container container-case">



	<!-- Header -->

		<?php $this->load->view('header/views_header'); ?>

	<!-- End HEader -->

	

		<!-- login continer -->

		<div class="col-lg-12  account-cont">

						<h3 style="font-weight: 600;">Account Setting</h3>

						<hr class="line">

				<!-- end login continer -->

							<div class="col-lg-4 pull-right account-user">

								<img class="img-responsive" src="<?php echo base_url('resources/img/user.png')?>" />

							</div>

							<button class="upload-pic pull-right btn btn-default">Change Photo</button>	

							<input type="file" class="hidden file"/>

				<!--Login form-->

					<form class="log-form" role="form">



						<div class="row">

				            <div class="form-group col-lg-12">

				            	<label>Emloyee No.</label>

				                <input type="text" class="form-control" placeholder="" />

				            </div>

				        </div>

				        <div class="row">

				            <div class="form-group col-lg-12">

				            	<label>Username</label>

				                <input type="text" class="form-control" placeholder="Username" />

				            </div>

				        </div>

				        <hr class="line">

				   

				        <h4>Change Password</h4>

				        <div class="row">

				            <div class="form-group col-lg-12">

				            	

				                <input type="password" class="form-control input-normal" placeholder="Old Password" />

				            </div>

				        </div>



				        <div class="row">

				            <div class="form-group col-lg-12">

				            	

				                <input type="password" class="form-control input-normal" placeholder="New Password" />

				            </div>

				        </div>



				         <div class="row">

				            <div class="form-group col-lg-12">

				                <input type="password" class="form-control input-normal" placeholder="Retype New Password" />

				            </div>

				        </div>



				        <div class="row">

				        	<div class="form-group col-lg-12">
								<a style="display:block" href="<?php echo base_url('Login_user/menu')?>"><button type="button" class="pull-right btn btn-default btn-sm">Cancel</button></a>
				            	<button type="submit" class="pull-right btn btn-danger btn-sm" style="margin-right:5px;">Save Changes</button>
				            	

				            </div>	

				        </div>

				    </form>
			   
				<!--end Login form-->

			</div>

		</div>

	</div>

</body>

</html>







<script >

	

	$(document).ready(function(){





		$(".upload-pic").on('click',function(){

			$(".file").click();

		});

	});

</script>