

<!DOCTYPE html>

<html lang="en">

<head>

	<?php $this->load->view('header/header'); ?>

	
<style type="text/css">
	
	p {
    background-color: red;
}


</style>
</head>



<body>

<div class="container-case" style="margin-right: 20px;">
	
	<div class="container ">



	<!-- Header -->

		<!-- login continer -->

		<div class="col-lg-12 col-md-12 col-sm-12  con-reg">



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





				<div class="con-regtxt">

					<span>Create New Account</span>

				</div>

			
  						<p><?php echo validation_errors(); ?></p>

				
				<?php echo form_open('Add_user');?>
				<div class="col-lg-12 col-md-12 col-sm-12 reg-form">

					<div class="row">

				<!--Login form-->

						<div class="col-lg-6 col-md-6 col-sm-6">

							<div class="row">

								 <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                <input type="text" name='uname' placeholder="Username" class="form-control"  value="<?php echo set_value('uname'); ?>" required >

					            </div>



					             <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="email" name="email" placeholder="Email" class="form-control"   value="<?php echo set_value('email'); ?>"required>

					            </div>



								<div class="form-group col-lg-12 col-md-12 col-sm-12">

					                <input type="text" name='fname' placeholder="First Name" class="form-control"  value="<?php echo set_value('fname'); ?>" required >

					            </div>



					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                  <input type="text" name='mname' placeholder="Middle Name" class="form-control"  value="<?php echo set_value('mname'); ?>"required>

					            </div>



					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="text" name="lname"  placeholder="Last Name" class="form-control"  value="<?php echo set_value('lname'); ?>"required >

					            </div>

					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="text" name="contact1"  placeholder="Contact number" class="form-control"  value="<?php echo set_value('contact1'); ?>"required >

					            </div>

					             <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="text" name="addr"  placeholder="Address" class="form-control"  value="<?php echo set_value('addr'); ?>"required >

					            </div>

							</div>

						</div>



						<div class="col-lg-6 col-md-6 col-sm-6">

							<div class="row">

								<div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="password" name="password"  placeholder="Password" class="form-control" value="<?php echo set_value('password'); ?>"required>

					            </div>

					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="password" name="passconf" placeholder="Confirm Password" class="form-control" value="<?php echo set_value('passconf'); ?>"required>

					            </div>



					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					               <!--  <input type="text" name="question" class="form-control"  placeholder="question" value="<?php //echo set_value('question'); ?>"required> -->
					               
					               <select class="form-control" id="qstn">
					               <?php 
					               $i=0;
					               foreach ($questions as $row) {
					               		$i++;
					               		echo "<option value='".$i."'>". $row->SecretQuestion ."</option>";
					           		}
					               ?>
					               </select>
					            </div>



					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                 <input type="text" name="answer"class="form-control"  placeholder="Answer" value="<?php echo set_value('answer'); ?>"required>

					            </div>



					            <div class="form-group col-lg-12 col-md-12 col-sm-12">

					                  <input type="text" name="shint"class="form-control" placeholder="Secret Hint"  value="<?php echo set_value('shint'); ?>"required>

					            </div>

							</div>

						</div>



						<div class="row">

				        	<div class="form-group col-lg-12 col-md-12 col-sm-12">
				        		<button type="submit" class="pull-right btn btn-primary" style="margin-right: 10px;">Create Account</button>
				       </form>
				            	

				            	

				            </div>

				        </div>    
				        	<a style="display:block" href="<?php echo base_url('Login_user/login')?>">Back</a>
			<!--end Login form-->		        	

				</div>

			</div>
			  
		</div>

	</div>

	</div>
</body>

</html>





