<!-- Home Button-->
	<div class="col-lg-2 col-md-2 col-sm-2 pull-right home-btn">


			<div class="row">



				<div class="col-lg-12 col-md-12 col-sm-12 btn btn-info home">



					<span>Home</span>



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



				<div class="col-lg-4 col-md-4 col-sm-4 pull-right" style="padding-top: 30px;">



					<div class="row">



						<div class=" img-user pull-right">



							<img class="img-responsive" src="<?php echo base_url('resources/img/user.png')?>" />	



						</div> 







						<div class="pull-right" style="padding: 10px; color : #FFF;">



							



							 <div class="dropdown">



							    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: rgba(0,0,0,0.0); border-color :rgba(0,0,0,0.0); ">Username Account



							    <span class="caret"></span></button>



							    <ul class="dropdown-menu">

							      <li><a href="<?= base_url('Login_user/account') ?>">Account Settings</a></li>  

							      <li role="presentation" class="divider"></li>

							      <li><a href="<?= base_url('Login_user/logout') ?>">Logout</a></li>  



							    </ul>



							  </div>



						</div>



					</div>



				</div>



				<!-- end USer -->



			</div>



		</div>



	<!-- End Header -->











	<script type="text/javascript">



	 $(document).ready(function(){



	 	$('.home-btn').click(function(){



	 		window.location.href="<?php echo base_url('Login_user/menu/');?>";



	 	});



	 });



	 $(document).ready(function(){



	 	$('.img-user').click(function(){



	 		window.location.href="<?php echo base_url('Login_user/account/');?>";



	 	});



	 });







	</script>