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
                    <label for="fname">Email:</label>
                    <input type="text" class="form-control input-sm email">
                  </div>

                  <div class="form-group">
                    <label for="fname">Title:</label>
                    <input type="text" class="form-control input-sm title">
                  </div>

                  <div class="form-group">
                    <label for="fname" class="department">Department:</label>
                    <input type="text" class="form-control input-sm department_update">
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

                  <div class="form-group hidden addr_update" >
                    <label for="addr">Address 1:</label>
                    <input type="text" class="form-control input-sm addr_1">
                  </div>

                  <div class="form-group hidden addr_update2">
                    <label for="brgy">Address 2:</label>
                    <input type="text" class="form-control input-sm addr_2">
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


                <div class="hidden form-group consignee_update_user2">
                   <label for="consignee_update_user">Consignee 2:</label>
                  <select name="consignee" class="form-control consignee2" data-placement="left">
                    <?php 
                      echo "<option value='0' selected='selected'>Select your Consignee</option>";
                      foreach($consignee as $row)
                       echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                    ?>
                 </select>
                </div>


                <div class="hidden form-group consignee_update_user3">
                   <label for="consignee_update_user">Consignee 3:</label>
                  <select name="consignee" class="form-control consignee3" data-placement="left">
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
              <div class="col-md-12">
               <div class=" col-md-12">     
                    <hr>
                </div>
                  <h4>Type Of User :</h4>
                 
                  <div class="col-md-6">
                    <select class="form-control user_type update_user">

                    </select>
                  </div>
                  <div class=" col-md-12">     
                    <hr>
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
	var uid;

	$(document).on('click','.btn-update-user',function(){

		var uname = $(this).closest('tr').children('td:eq(4)').text();
		var fname = $(this).closest('tr').children('td:eq(5)').text();
    var mname = $(this).closest('tr').children('td:eq(6)').text();
		var lname = $(this).closest('tr').children('td:eq(7)').text();
    
    var email = $(this).closest('tr').children('td:eq(8)').text();
     var title = $(this).closest('tr').children('td:eq(9)').text();
    var department = $(this).closest('tr').children('td:eq(10)').text(); 

    var contact1 = $(this).closest('tr').children('td:eq(11)').text();
    var contact2 = $(this).closest('tr').children('td:eq(12)').text();

		 uid = $(this).closest('tr').children('td:eq(13)').text();
		var status = $(this).closest('tr').children('td:eq(14)').text();

		var statuses = parseInt(status);

		$('.uname').val(uname);
		$('.fname').val(fname);
		$('.lname').val(lname);
    $('.mname').val(mname);

    $('.title').val(title);
    $('.department_update').val(department);

    $('.email').val(email);

    $('.c1').val(contact1);
    $('.c2').val(contact2);
    $('.update_user').val(role);
    
	     if(statuses==1){
	      $('.activate_user').prop('checked', true);
	  	 }else{
	  	  $('.deactivate_user').prop('checked', true);
	  	 }
	});


/*Button when Client USer update*/

$(document).on('click','.btn-update-user-client',function(){

    var consignee = $(this).closest('tr').children('td:eq(20)').text();
    var consignee2 = $(this).closest('tr').children('td:eq(21)').text();
    var consignee3 = $(this).closest('tr').children('td:eq(22)').text();

    var uname = $(this).closest('tr').children('td:eq(7)').text();
    var fname = $(this).closest('tr').children('td:eq(8)').text();
    var mname = $(this).closest('tr').children('td:eq(9)').text();
    var lname = $(this).closest('tr').children('td:eq(10)').text();
    var email = $(this).closest('tr').children('td:eq(11)').text();
    var title = $(this).closest('tr').children('td:eq(12)').text();
    var department = $(this).closest('tr').children('td:eq(13)').text(); 

    var contact1 = $(this).closest('tr').children('td:eq(14)').text();
    var contact2 = $(this).closest('tr').children('td:eq(15)').text();

    var addr = $(this).closest('tr').children('td:eq(16)').text();
    var addr2 = $(this).closest('tr').children('td:eq(17)').text();

     uid = $(this).closest('tr').children('td:eq(18)').text();
    var status = $(this).closest('tr').children('td:eq(19)').text();

    

    var statuses = parseInt(status);

    $('.uname').val(uname);
    $('.fname').val(fname);
    $('.lname').val(lname);
    $('.mname').val(mname);
    
    $('.email').val(email);

    $('.title').val(title);
    $('.department_update').val(department);

    $('.c1').val(contact1);
    $('.c2').val(contact2);

    $('.addr_1').val(addr);
    $('.addr_2').val(addr2);

     $('.update_user').val(role);

    if(consignee == ""){
        $(".consignee option:eq(0)").attr("selected","selected");
    }else{
      $('.consignee').val(consignee);
    }
    
    if(consignee2 == ""){
        $(".consignee2 option:eq(0)").attr("selected","selected");
    }else{
      $('.consignee2').val(consignee2);
    }
    

    if(consignee3 == ""){
        $(".consignee3 option:eq(0)").attr("selected","selected");
    }else{
      $('.consignee3').val(consignee3);
    }
    
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
 
    var email = $('.email').val();

    var title = $('.title').val();
    var department = $('.department_update').val();

    var c1 = $('.c1').val();
    var c2 = $('.c2').val();
    var addr = $('.addr_1').val();
    var addr2 = $('.addr_2').val();

    
    var consignee = $('.consignee').val();
    var consignee2 = $('.consignee2').val();
    var consignee3 = $('.consignee3').val();

    var role = $('.update_user').val();

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
                     email  :email,
                     title : title,
                     department : department,
                     c1     :c1,
                     c2     :c2,
                     addr   :addr,
                     addr2   :addr2,
                     consignee:consignee,
                     consignee2:consignee2,
                     consignee3:consignee3,
                     role:role,
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
                                  userList(role);
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