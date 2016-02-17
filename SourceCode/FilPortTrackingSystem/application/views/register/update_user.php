<div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Account</h4>
      </div>

      <div class="modal-body">

      		<div class="col-lg-12">
      			<div class="row">
      				<div class="col-lg-6" style="border-right : 1px solid #ddd;">


      						<div class="form-group">
                    <label for="uname">UserName:</label>
			      				<input type="text" class="form-control input-sm uname">
			      			</div>
			    			
			    			  <div class="form-group">
			    				  <label for="fname">FirstName:</label>
                    <input type="text" class="form-control input-sm fname">
			      			</div>

			      			<div class="form-group">
                    <label for="mname">MiddleName:</label>
                    <input type="text" class="form-control input-sm mname">
                  </div>

                  <div class="form-group">
                    <label for="lname">LastName:</label>
                    <input type="text" class="form-control input-sm lname">
                  </div>

                  <div class="form-group">
                    <label for="bdate">Birthdate:</label>
                    <input type="date" class="form-control input-sm bdate">
                  </div>

                  <div class="form-group">
                    <label for="fname">Email:</label>
                    <input type="text" class="form-control input-sm email">
                  </div>

                  <div class="form-group">
                    <label for="c1">Contact No.1:</label>
                    <input type="text" class="form-control input-sm c1">
                  </div>

                 
                 
      				</div>

      				<div class="col-lg-6">

               <div class="form-group">
                    <label for="c2">Contact No.2:</label>
                    <input type="text" class="form-control input-sm c2">
                  </div>

                  <div class="form-group">
                    <label for="addr">House/Building No./Street:</label>
                    <input type="text" class="form-control input-sm addr">
                  </div>

                  <div class="form-group">
                    <label for="brgy">Barangay/Village:</label>
                    <input type="text" class="form-control input-sm brgy">
                  </div>

                  <div class="form-group">
                    <label for="city">Town/City Province:</label>
                    <input type="text" class="form-control input-sm city">
                  </div>

                  <div class="form-group">
                   <label for="country">Country:</label>
                    <select name="country" class="form-control country" data-placement="left">
                      <?php 
                        echo "<option value='0' selected='selected'>Select your Country</option>";
                        foreach($countries as $row)
                         echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
                      ?>
                    </select>
                </div>

                <div class="hidden form-group consignee_update_user">
                   <label for="consignee_update_user">Consignee:</label>
                  <select name="consignee" class="form-control consignee" data-placement="left">
                    <?php 
                      echo "<option value='0' selected='selected'>Select your Consignee</option>";
                      foreach($consignee as $row)
                       echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                    ?>
                 </select>
                </div>


      						<div class="form-group">
			      				<span style="font:13px;font-weight:900;">Activate/Deactivate Account</span>
			      			</div>

			      			<div class="form-group">
			      				 <label class="radio-inline"><input type="radio" value="1" name="update_activate" class="activate_user"  style="transform: scale(1.5);">Activate</label>
                     <label class="radio-inline"><input type="radio" value="0" name="update_activate" class="deactivate_user" style="transform: scale(1.5);">Deactivate</label>
			      			</div>
      				</div>
      			</div>
      		</div>
      			


       </div>

  <div class="footer-modal">
    <hr>
     <button type="button" class="btn btn-default btn-danger btn-UpdateUser">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</div>



<script>

/*Hidden Consignee If Filport is User*/
var user_admin=0;

  $(document).on('click',' #user_client_list',function(){
     $('.consignee_update_user').fadeIn('slow').removeClass('hidden');
      user_admin=1;
  });

  $(document).on('click','#user_internal_list',function(){
      $('.consignee_update_user').fadeIn('slow').addClass('hidden');
      user_admin=2;
  });
  $(document).on('click','#user_admin_list',function(){
      $('.consignee_update_user').fadeIn('slow').addClass('hidden');
      user_admin=3;
  });

</script>

<script>
	var uid;

	$(document).on('click','.btn-update-user',function(){

		var uname = $(this).closest('tr').children('td:eq(6)').text();
		var fname = $(this).closest('tr').children('td:eq(7)').text();
    var mname = $(this).closest('tr').children('td:eq(8)').text();
		var lname = $(this).closest('tr').children('td:eq(9)').text();
    var bdate = $(this).closest('tr').children('td:eq(10)').text();

    var email = $(this).closest('tr').children('td:eq(11)').text();
    var contact1 = $(this).closest('tr').children('td:eq(12)').text();
    var contact2 = $(this).closest('tr').children('td:eq(13)').text();

    var addr = $(this).closest('tr').children('td:eq(14)').text();
    var brgy = $(this).closest('tr').children('td:eq(15)').text();
    var towncity = $(this).closest('tr').children('td:eq(16)').text();

    var country = $(this).closest('tr').children('td:eq(17)').text();


		 uid = $(this).closest('tr').children('td:eq(1)').text();
		var status = $(this).closest('tr').children('td:eq(2)').text();

		

		var statuses = parseInt(status);

		$('.uname').val(uname);
		$('.fname').val(fname);
		$('.lname').val(lname);
    $('.mname').val(mname);
    $('.bdate').val(bdate);
    $('.email').val(email);
    $('.c1').val(contact1);
    $('.c2').val(contact2);
    $('.addr').val(addr);
    $('.brgy').val(brgy);
    $('.city').val(towncity);
    $('.country').val(country);



	     if(statuses==1){
	      $('.activate_user').prop('checked', true);
	  	 }else{
	  	  $('.deactivate_user').prop('checked', true);
	  	 }

	});


/*Button when Client USer update*/

$(document).on('click','.btn-update-user-client',function(){

    var consignee = $(this).closest('tr').children('td:eq(6)').text();
    var uname = $(this).closest('tr').children('td:eq(8)').text();
    var fname = $(this).closest('tr').children('td:eq(9)').text();
    var mname = $(this).closest('tr').children('td:eq(10)').text();
    var lname = $(this).closest('tr').children('td:eq(11)').text();
    var bdate = $(this).closest('tr').children('td:eq(12)').text();

    var email = $(this).closest('tr').children('td:eq(13)').text();
    var contact1 = $(this).closest('tr').children('td:eq(14)').text();
    var contact2 = $(this).closest('tr').children('td:eq(15)').text();

    var addr = $(this).closest('tr').children('td:eq(16)').text();
    var brgy = $(this).closest('tr').children('td:eq(17)').text();
    var towncity = $(this).closest('tr').children('td:eq(18)').text();

    var country = $(this).closest('tr').children('td:eq(19)').text();


     uid = $(this).closest('tr').children('td:eq(1)').text();
    var status = $(this).closest('tr').children('td:eq(2)').text();

    

    var statuses = parseInt(status);

    $('.uname').val(uname);
    $('.fname').val(fname);
    $('.lname').val(lname);
    $('.mname').val(mname);
    $('.bdate').val(bdate);
    $('.email').val(email);
    $('.c1').val(contact1);
    $('.c2').val(contact2);
    $('.addr').val(addr);
    $('.brgy').val(brgy);
    $('.city').val(towncity);
    $('.country').val(country);
    $('.consignee').val(consignee);


       if(statuses==1){
        $('.activate_user').prop('checked', true);
       }else{
        $('.deactivate_user').prop('checked', true);
       }

  });

	$(document).on('click','.btn-UpdateUser', function(){


		var role = $('input[name=update_activate]:checked').val();
    var uname = $('.uname').val();
    var fname = $('.fname').val();
    var mname = $('.mname').val();
    var lname = $('.lname').val();
    var bdate = $('.bdate').val();
    var email = $('.email').val();
    var c1 = $('.c1').val();
    var c2 = $('.c2').val();
    var addr = $('.addr').val();
    var brgy = $('.brgy').val();
    var city = $('.city').val();
    var country = $('.country').val();
     var consignee = $('.consignee').val();

		 $.ajax({
            method: "POST",
            url: "<?php echo base_url('Job/user_update');?>",
            beforeSend: function() {
                dia = $.dialog({
                      icon: 'fa fa-spinner fa-pulse',
                      closeIcon: false,
                      title: 'Please wait...',
                      backgroundDismiss: false,
                      content: 'Currently Updating User',
                  });
              },
              data: {uid    :uid,
                     status :role,
                     uname  :uname,
                     fname  :fname,
                     mname  :mname,
                     lname  :lname,
                     bdate  :bdate,
                     email  :email,
                     c1     :c1,
                     c2     :c2,
                     addr   :addr,
                     brgy   :brgy,
                     city   :city,
                     country:country,
                     consignee:consignee,
                }
        })
           .done(function(data) {
                          $.alert({
                            backgroundDismiss: false,   
                              title: 'Success!',
                              content: 'User Updated!',
                              confirm: function(){
                                  dia.close();
                                  $('#myModal_updateUser').modal('hide');
                                  $('.get_list').trigger('click');
                              }
                           });
              })

            .fail(function(data) {
                   $.alert({
                  backgroundDismiss: false,
                    title: 'Error!',
                    content: 'There is a problem in adding updating ,please try another data or reload the page!',
                    confirm: function(){
                         dia.close();
                         $('#myModal_updateUser').modal('hide');
                         $('.get_list').trigger('click');
                         location.reload();
                    }
                   });
              });
	});


  /*button when Client User Update*/



</script>