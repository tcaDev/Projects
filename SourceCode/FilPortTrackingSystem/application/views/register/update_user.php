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
                    <label for="uname">UserName:</label><span id="check_uname_update"></span>
			      				<input type="text" class="form-control input-sm uname" onkeyup="uname_check_update(this.value)">
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
                  <select name="consignee" class="form-control consignee11" data-placement="left">
                    <?php 
                      echo "<option value='0' selected='selected'>Select your Consignee</option>";
                      foreach($consignee as $row)
                       echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                    ?>
                 </select>
                </div>


                <div class="hidden form-group consignee_update_user2">
                   <label for="consignee_update_user">Consignee 2:</label>
                  <select name="consignee" class="form-control consignee22" data-placement="left">
                    <?php 
                      echo "<option value='0' selected='selected'>Select your Consignee</option>";
                      foreach($consignee as $row)
                       echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                    ?>
                 </select>
                </div>


                <div class="hidden form-group consignee_update_user3">
                   <label for="consignee_update_user">Consignee 3:</label>
                  <select name="consignee" class="form-control consignee33" data-placement="left">
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
  var roleid;

	$(document).on('click','.btn-update-user',function(){
    var uname = $(this).closest('tr').children('td:eq(4)').text();
    $('#check_uname_update').text('');
    $.ajax({
                method: "POST",
                url : "<?php echo base_url('Access/user_admin');?>",
                beforeSend:function(){
                  
                   dia =  $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        closeIcon: false,
                        title: 'User Information',
                        backgroundDismiss: false,
                        content: 'Preparing Information',
                    });
                },
                data: {
                  uname : uname
                } 
              }).done(function(data){
                 var fills = JSON.parse(data);

                  var uname = fills[0].UserName;
                  var fname = fills[0].FirstName;;
                  var mname = fills[0].MiddleName;
                  var lname = fills[0].LastName;
                  
                  var email = fills[0].EmailAddress;
                   var title = fills[0].Title;
                  var department = fills[0].Department;

                  var contact1 = fills[0].ContactNo1;
                  var contact2 = fills[0].ContactNo2;

                   uid = fills[0].UserId;
                   roleid = fills[0].RoleId;
                  var status = fills[0].IsActive;

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


                  dia.close();


      });

		
	});


/*Button when Client USer update*/

$(document).on('click','.btn-update-user-client',function(){

    var uname = $(this).closest('tr').children('td:eq(4)').text();
    $('#check_uname_update').text('');
    $.ajax({
                method: "POST",
                url : "<?php echo base_url('Access/user_admin');?>",
                beforeSend:function(){
                  
                   dia =  $.dialog({
                        icon: 'fa fa-spinner fa-spin',
                        closeIcon: false,
                        title: 'User Information',
                        backgroundDismiss: false,
                        content: 'Preparing Information',
                    });
                },
                data: {
                  uname : uname
                } 
              }).done(function(data){
                 var fills = JSON.parse(data);

                  var uname = fills[0].UserName;
                  var fname = fills[0].FirstName;;
                  var mname = fills[0].MiddleName;
                  var lname = fills[0].LastName;
                  
                  var email = fills[0].EmailAddress;
                  var title = fills[0].Title;
                  var department = fills[0].Department;

                  var contact1 = fills[0].ContactNo1;
                  var contact2 = fills[0].ContactNo2;

                  var addr = fills[0].Address1;
                  var addr2 = fills[0].Address2;

                  var consignee = fills[0].ConsigneeId;
                  var consignee2 = fills[0].ConsigneeId2;
                  var consignee3 = fills[0].ConsigneeId3;

                   uid = fills[0].UserId;
                   roleid = fills[0].RoleId;
                  var status = fills[0].IsActive;

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
                      $(".consignee11 option:eq(0)").attr("selected","selected");
                  }else{
                    $('.consignee11').val(consignee);
                  }
                  
                  if(consignee2 == ""){
                      $(".consignee22 option:eq(0)").attr("selected","selected");
                  }else{
                    $('.consignee22').val(consignee2);
                  }
                  

                  if(consignee3 == ""){
                      $(".consignee33 option:eq(0)").attr("selected","selected");
                  }else{
                    $('.consignee33').val(consignee3);
                  }
                  
                     if(statuses==1){
                      $('.activate_user').prop('checked', true);
                     }else{
                      $('.deactivate_user').prop('checked', true);
                     }


                  dia.close();


      });

  });

	$(document).on('click','.btn-UpdateUser', function(){


    var consignee = $('.consignee11').val();
    var consignee2 = $('.consignee22').val();
    var consignee3 = $('.consignee33').val();

    var role1 = $('.update_user').val();

		var status = $('input[name=update_activate]:checked').val();
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


    if($('#check_uname_update i').text() == "Username already exists"){
      $.alert({
          title: 'Already Exists!',
          content: 'Please Choose Another Username!',
          confirm: function(){
            
          }
      });
    }else{

		 $.ajax({
            method: "POST",
            url: "<?php echo base_url('Access/user_update');?>",
            beforeSend: function() {
                dia = $.dialog({
                      icon: 'fa fa-spinner fa-pulse',
                      closeIcon: false,
                      title: 'Please wait...',
                      backgroundDismiss: false,
                      content: 'Currently Updating User',
                  });
              },
              data: {
                     consignee   :consignee,
                     consignee2  :consignee2,
                     consignee3  :consignee3,
                     role        :role1,
                     uid         :uid,
                     status      :status,
                     uname       :uname,
                     fname       :fname,
                     mname       :mname,
                     lname       :lname,
                     email       :email,
                     title       :title, 
                     department  :department,
                     c1          :c1,
                     c2          :c2,
                     addr        :addr,
                     addr2       :addr2,
                     
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

          }
	});


</script>