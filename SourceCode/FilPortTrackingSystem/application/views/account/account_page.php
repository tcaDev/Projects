
		<!-- Account continer -->

		<div class="col-lg-12  account-cont">

						<h3 style="font-weight: 600;">Account Setting</h3>

						<hr class="line">

				<!-- End Account Container -->
				<form>
					<div class="col-lg-12 col-md-12 col-sm-12"> 
								<div class="col-lg-4 pull-right">
									<div class="row">
										<div class="col-lg-12">
											<img class="img-responsive" id="user_img" style="border: 1px solid #ddd;height:130px;" src="<?php echo base_url('resources/img/user.png')?>" />								
										</div>
									</div>
								</div>

								<button class="upload-pic pull-right btn btn-info btn-sm"><i class="fa fa-pencil-square-o fa-lg"></i> Change Photo</button>	

								<button type="submit" class="save-pic pull-right btn btn-info btn-sm"><i class="fa fa-floppy-o fa-lg"></i> Save Photo</button>
								
								<input type="file" class="hidden file" id="pic-file"  accept="image/*" onchange="readURL(this);"/>
					</div>
				</form>
				<div class="col-lg-12 col-md-12 col-sm-12"> 
				<!--Account form-->

					<form class="log-form" role="form">

						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingOne">
						      <h4 class="panel-title">
						      		<span><i>Name</i></span>
						        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          	<span class="pull-right small"><i class="fa fa-pencil"></i>Edit</span>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						      <div class="panel-body">
						      	<form>
						      		

						        	<div class="form-group">
						        		<label>First : </label>
						        		<input class="form-control input-sm" type="text" name="fname" value="<?php echo $fname; ?>"/>
						        	</div>

						        	<div class="form-group">
						        		<label>Middle : </label>
						        		<input class="form-control input-sm" type="text" name="mname" value="<?php echo $mname; ?>"/>
						        	</div>
						        	
						        	<div class="form-group">
						        		<label for="fname">Last : </label>
						        		<input class="form-control input-sm" type="text" name="lname" value="<?php echo $lname; ?>"/>
						        	</div>
						        		<hr>
						        	<div class="form-group">
						        		<button type="submit" class="pull-right btn btn-primary btn-sm" >Save Changes</button>
						        	</div>

						        </form>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingTwo">
						      <h4 class="panel-title">
						        	<span><i>Password</i></span>
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          	<span class="pull-right small"><i class="fa fa-pencil"></i>Edit</span>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						      <div class="panel-body">
						        	<form>
						        	<div class="form-group">
						        		<label>Current : </label>
						        		<input class="form-control input-sm" type="password" name="current" id="current"/>
						        	</div>

						        	<div class="form-group">
						        		<label>New : </label>
						        		<input class="form-control input-sm" type="password" name="newpass" id="pass"/>
						        	</div>
						        	
						        	<div class="form-group">
						        		<label for="fname">Re-type New : </label>
						        		<input class="form-control input-sm" type="password" name="renewpass" id="renewpass"/>
						        	</div>
						        	<span id='message'></span>

						        	<hr>
						     		   	

						        	<div class="form-group">
						        		<button type="submit" class="pull-right btn btn-primary btn-sm" >Save Changes</button>
						        	</div>

						        </form>
						      </div>
						    </div>
						  </div>
						  <div class="panel panel-default">
						    <div class="panel-heading" role="tab" id="headingThree">
						      <h4 class="panel-title">
						      		<span><i>Email</i></span>
						        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          <span class="pull-right small"><i class="fa fa-pencil"></i>Edit</span>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						      <div class="panel-body">
						       	<form>

						       		<div class="form-group">
						        		<label>Email Address : </label>
						        		<input class="form-control input-sm" type="text" name="email" value= "<?php echo $email; ?>" disabled />
						        	</div>

						       		<div class="form-group">
						        		<label>Username : </label>
						        		<input class="form-control input-sm" type="text" name="uname" value="<?php echo $username; ?>" disabled/>
						        	</div>

						        	<hr>

						       	</form>
						      </div>
						    </div>
						  </div>
						</div>

				    </form>
			   
			   	</div>
				<!--end Account form-->

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

	/*
	* if input type has data
	*/

		$(".save-pic").on('click',function(){
			if($(".file").val() == ""){
				alert("Choose Image.!");
			}
		});

	});

/*
* Password Matching
*/
    $('#renewpass').on('keyup', function () {
        if ($(this).val() == $('#pass').val()) {
            $('#message').html('Password Match').css('color', 'green');

        } else $('#message').html('Password not Match').css('color', 'red');
    });

     $('#pass').on('keyup', function () {
        if ($(this).val() == $('#renewpass').val()) {
            $('#message').html('Password Match').css('color', 'green');

        } else $('#message').html('Password not Match').css('color', 'red');
    });
/*
* End Password Matching
*/




/*
* Preview Image
*/

   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#user_img')
                        .attr('src', e.target.result);
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>