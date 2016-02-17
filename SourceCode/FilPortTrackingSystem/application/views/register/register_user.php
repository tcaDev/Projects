<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
      <div class="modal-header" style="background-color:#eee">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Account</h4>
      </div>

      <div class="modal-body">
        <div class="container-fluid">

          <ul class="nav nav-pills">
            <li class="active "><a class="add_User" data-toggle="pill" href="#addForm">Add User Account Form</a></li>
            <li><a class="get_list" data-toggle="pill" href="#listUser">List of User Account</a></li>
          </ul>


              <div class="tab-content">
                       <!-- Add Form -->
                            <div id="addForm" class="tab-pane fade in active">
                              <div class="col-lg-12">
                              
                                    <h4>Type Of User :</h4>

                                     <label class="radio-inline"><input type="radio" value="5" name="optradio" class="filport-user" checked="checked" style="transform: scale(1.5);">Filport User</label>
                                     <label class="radio-inline"><input type="radio" value="2" name="optradio" class="client" style="transform: scale(1.5);">Client User</label>
                                    <label class="radio-inline"><input type="radio" value="1" name="optradio" class="filport-user" style="transform: scale(1.5);">Administrator User</label>
                                     
                                <hr>
                            </div>

                              <!-- Information -->
                                    <div class="col-lg-6" style="border-right : 1px solid #ddd;">
                                          
                                          <div class="form-group">
                                              <input type="text" name='fname' placeholder="First Name" class="form-control" data-toggle="tooltip" data-placement="left" title="First Name" required >
                                          </div>

                                          <div class="form-group">
                                                <input type="text" name='mname' placeholder="Middle Name" class="form-control" data-toggle="tooltip" data-placement="left" title="Middle Name" required>
                                          </div>

                                          <div class="form-group ">
                                                <input type="text" name="lname"  placeholder="Last Name" class="form-control"  data-toggle="tooltip" data-placement="left" title="Last Name" required >
                                          </div>

                                          <div class="form-group">
                                            <input type="text" name="title" placeholder="Title" class="form-control" data-toggle="tooltip" data-placement="left" title="Title" required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="department" placeholder="Department" class="form-control department" data-toggle="tooltip" data-placement="left" title="Department" required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="addr" placeholder="Address 1" class="form-control hidden addr" data-toggle="tooltip" data-placement="left" title="Address 1" required >
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="addr2" placeholder="Address 2" class="form-control hidden addr2" data-toggle="tooltip" data-placement="left" title="Address 2" required >
                                        </div>

                                          <div class="form-group">
                                             <input type="text" name="contact1"  placeholder="Contact Number 1" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 1" required >
                                          </div>

                                          <div class="form-group">
                                             <input type="text" name="contact2"  placeholder="Contact Number 2" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 2" >
                                          </div>
                                    </div>


                                    <!-- UserName and Password -->
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <select name="consignee" class="form-control hidden consignee_add_user" data-toggle="tooltip" data-placement="left" title="Consignee">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="consignee2" class="form-control hidden consignee_add_user2" data-toggle="tooltip" data-placement="left" title="Consignee 2">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <select name="consignee3" class="form-control hidden consignee_add_user3" data-toggle="tooltip" data-placement="left" title="Consignee 3">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Consignee</option>";
                                                foreach($consignee as $row)
                                                 echo "<option value=".$row->ConsigneeId."> ".$row->ConsigneeName."</option>"; 
                                              ?>
                                            </select>
                                        </div>

                                   

                                        <div class="form-group"><span id="check_uname"></span>
                                            <input type="text" name='uname' placeholder="Username" class="form-control" data-toggle="tooltip" data-placement="left" title="Username" required onkeyup="uname_check(this.value)">
                                        </div>

                                         <div class="form-group "><span id="check_email"></span>
                                             <input type="email" name="email" placeholder="Email" class="form-control"  data-toggle="tooltip" data-placement="left" title="Email Address" required onkeyup="email_check(this.value)">
                                        </div>

                                        <div class="form-group ">
                                             <input type="password" name="password"  placeholder="Password" id="pass" class="form-control" data-toggle="tooltip" data-placement="left" title="Password" required>
                                        </div>

                                        <div class="form-group">
                                             <input type="password" name="passconf" placeholder="Confirm Password" id="conpass" class="form-control"  data-toggle="tooltip" data-placement="left" title="Re-type Password" required>
                                             <span id='message'></span>
                                             
                                        </div>

                                        <i id='message_user'></i><br>
                                        <i style="color:red" id='message_user_email'></i>
                                    </div>
                                
                            </div>


                            <!-- List of User Account -->

                            <div id="listUser" class="tab-pane fade">
                                <br>
                              
                                    <ul class="nav nav-tabs update_list">
                                        <li class="active"><a data-toggle="tab" href="#user_internal" id="user_internal_list" style="border: 0px solid #ddd !important;"><span class="fa fa-user fa-fw"></span> Filport User Account</a></li>
                                        <li><a data-toggle="tab" href="#client_user" id="user_client_list" style="border: 0px solid #ddd !important;"><span class="fa fa-user fa-fw"></span> Client User Account</a></li>
                                        <li><a data-toggle="tab" href="#admin_user" id="user_admin_list" style="border: 0px solid #ddd !important;"><span class="fa fa-user fa-fw"></span> Admin User Account</a></li>
                                    </ul>
                               
                                  
                                      <div class="tab-content">
                                      
                                        <div id="user_internal" class="tab-pane fade in active">
                                          <div class="table_UserList" style="width:100%;position:relative;overflow-y:auto;height:400px"></div>
                                        </div>

                                        <div id="client_user" class="tab-pane fade">
                                          <div class="table_UserList_client" style="width:100%;position:relative;overflow-y:auto;height:400px"></div>
                                        </div>

                                        <div id="admin_user" class="tab-pane fade">
                                          <div class="table_UserList_admin" style="width:100%;position:relative;overflow-y:auto;height:400px"></div>
                                        </div>

                                      </div>
                                </div>



                            <!-- End List Form -->          
              </div>

     
        </div>
      </div>

      <div class="footer-modal">
        <hr>
         <button type="button" class="btn btn-default btn-primary btn-Save-AddUser"><span class="fa fa-plus fa-fw"></span> Add User</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>



<script>


 $(document).on('click','.add_User',function(){
    $('.btn-Save-AddUser').removeClass('hidden');
});

 /*Get List Of User*/

$(document).on('click','.get_list',function(){

$('.btn-Save-AddUser').addClass('hidden');
    $.ajax({    //create an ajax request 
        type: "GET",
        url:  "<?php echo base_url('Job/get_User_list');?>",             
        dataType: "html", 
        beforeSend: function() {
              $('.table_UserList').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },          
        success: function(response){                    
            $(".table_UserList").html(response); 
            
        }

    });

    $.ajax({    //create an ajax request 
        type: "GET",
        url:  "<?php echo base_url('Job/get_User_list_client');?>",             
        dataType: "html", 
        beforeSend: function() {
              $('.table_UserList_client').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },               
        success: function(response){                    
            $(".table_UserList_client").html(response); 
            
        }

    });

     $.ajax({    //create an ajax request 
        type: "GET",
        url:  "<?php echo base_url('Job_availability/get_User_list_admin');?>",             
        dataType: "html", 
        beforeSend: function() {
              $('.table_UserList_admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },               
        success: function(response){                    
            $(".table_UserList_admin").html(response); 
            
        }

    });

});

 /*End*/


function uname_check(uname){
   if(uname==''){
      $('#check_uname').empty();
   }else{
       
        $.ajax({
            method: "POST",
          url: "<?php echo base_url('Job/check_uname');?>",
           beforeSend: function() {
              $('#check_uname').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {uname:uname}
      })
      .done(function(data) {
             $('#check_uname').html(data);
        });
    }
 }

 function email_check(email){
   if(email==''){
      $('#check_email').empty();
   }else if(!validateEmail(email))
   {
      $('#check_email').empty();
   }
   else{
       
        $.ajax({
            method: "POST",
          url: "<?php echo base_url('Job/check_email');?>",
           beforeSend: function() {
              $('#check_email').html('<span class="loading-email"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {email:email}
      })
      .done(function(data) {
             $('#check_email').html(data);
        });
    }
 }


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


/*
* Password Matching
*/
    $('#conpass').on('keyup', function () {

        if($(this).val() == ""){
            $('#message').html('');
        }
        else if ($(this).val() == $('#pass').val()) {
            $('#message').html('Password Match').css('color', 'green');

        } else $('#message').html('Password not Match').css('color', 'red');
    });

     $('#pass').on('keyup', function () {

      if($(this).val() == ""){
            $('#message').html('');
        }
       else if ($(this).val() == $('#conpass').val()) {
            $('#message').html('Password Match').css('color', 'green');

        } else $('#message').html('Password not Match').css('color', 'red');
    });
/*
* End Password Matching
*/



/*Hidden Consignee If Filport is User*/

var legit=0;

 $('.client').click(function(){
    if ($(this).is(':checked'))
    {
      $('.consignee_add_user').fadeIn('slow').removeClass('hidden');
      $('.consignee_add_user2').fadeIn('slow').removeClass('hidden');
      $('.consignee_add_user3').fadeIn('slow').removeClass('hidden');

      $('.addr').fadeIn('slow').removeClass('hidden');
      $('.addr2').fadeIn('slow').removeClass('hidden');

      $('.department').attr('placeholder','Company');
      

      legit=1;
    }
  });

  $('.filport-user').click(function(){
    if ($(this).is(':checked'))
    {
      $('.consignee_add_user').fadeIn('slow').addClass('hidden');
      $('.consignee_add_user2').fadeIn('slow').addClass('hidden');
      $('.consignee_add_user3').fadeIn('slow').addClass('hidden');

      $('.addr').fadeIn('slow').addClass('hidden');
      $('.addr2').fadeIn('slow').addClass('hidden');

      $('.department').attr('placeholder','Department');

      legit=2;
    }
  });

function validateEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test(email);
}

  /*Save To Database AJAX*/

  $(document).on('click','.btn-Save-AddUser',function(){

    var fname = $("input[name=fname]").val();
    var mname = $("input[name=mname]").val();
    var lname = $("input[name=lname]").val();

    var title = $("input[name=title]").val();
    var department = $("input[name=department]").val();
    
    var contact1 = $("input[name=contact1]").val();
    var contact2 = $("input[name=contact2]").val();

    var addr = $("input[name=addr]").val();
    var addr2 = $("input[name=addr2]").val();

    var consignee = $(".consignee_add_user option:selected").val();
    var consignee = $(".consignee_add_user2 option:selected").val();
    var consignee = $(".consignee_add_user3 option:selected").val();

    var uname = $("input[name=uname]").val();
    var email = $("input[name=email]").val();
    var pass = $("input[name=password]").val();
    var passconf = $("input[name=passconf]").val();


    var role = $('input[name=optradio]:checked').val();


    if(fname == ''){
      $("input[name=fname]").focus();
    }
    else if(mname == ''){
      $("input[name=mname]").focus();
    }
    else if(lname == ''){
      $("input[name=lname]").focus();
    }
    else if(contact1 == ''){
      $("input[name=contact1]").focus();
    }
    else if(title == ''){
      $("input[name=title]").focus();
    }
    else if(department == ''){
      $("input[name=department]").focus();
    }
    else if(uname == ''){
      $("input[name=uname]").focus();
    }
    else if(email == ''){
      $("input[name=email]").focus();
    }
    else if(pass == ''){
      $("input[name=password]").focus();
    }
    else if(passconf == ''){
      $("input[name=passconf]").focus();
    }
    else if($('#message').text() == "Password not Match"){
      $('#message_user').fadeIn('slow').text("Password does not Match...");
      $('#message_user_email').text("");
      $('#message_user').fadeOut(3000);
    }
    else if(!validateEmail(email)){
       $('#message_user').text("");
      $('#message_user_email').fadeIn('slow').text("Please input Valid Email...");
      $('#message_user_email').fadeOut(3000);
    }
    else if($('#check_uname i').text() == "Username already exists"){ 
      $('#message_user').text("");
      $('#message_user_email').fadeIn('slow').text("Please Choose another Username...");
      $('#message_user_email').fadeOut(3000);
    }
    else if($('#check_email i').text() == "EmailAddress already exists"){ 
      $('#message_user').text("");
      $('#message_user_email').fadeIn('slow').text("Please Choose another EmailAddress...");
      $('#message_user_email').fadeOut(3000);
    }
    else if(legit == 1){
        if($('.consignee_add_user option:selected').val() == '0'){
          $('#message_user').text("");
          $('#message_user_email').fadeIn('slow').text("Please Choose Consignee...");
          $('#message_user_email').fadeOut(3000);
        }
        else if(addr == ''){
            $("input[name=addr]").focus();
        }
        else{
          legit =0;
          $(this).click();
        }
    }
    else{

       $('#message_user_email').text("");
       $('#message_user').text("");

      $.ajax({
            method: "POST",
            url: "<?php echo base_url('Job/user_add');?>",
            beforeSend: function() {
                dia = $.dialog({
                      icon: 'fa fa-spinner fa-pulse',
                      closeIcon: false,
                      title: 'Please wait...',
                      backgroundDismiss: false,
                      content: 'Currently Adding User',
                  });
              },
              data: {

                    fname :fname,
                    lname :lname,
                    mname :mname,

                    title : title,
                    department :department,

                    contact1 :contact1,
                    contact2 :contact2,

                    addr :addr,
                    addr2 :addr2,

                    consignee :consignee,
                    consignee2 :consignee2,
                    consignee3 :consignee3,

                    uname :uname,
                    email :email,
                    pass :pass,
                    passconf :passconf,

                    role :role
              }
        })
           .done(function(data) {
                          $.alert({
                            backgroundDismiss: false,   
                              title: 'Success!',
                              content: 'New User Added.!',
                              confirm: function(){
                                  dia.close();
								  
								 $("input[name=fname]").val('');
								 $("input[name=mname]").val('');
								 $("input[name=lname]").val('');
								 $("input[name=contact1]").val('');
								 $("input[name=contact2]").val('');
								 $("input[name=addr]").val('');
                 $("input[name=addr2]").val('');

								 $(".consignee_add_user option:eq(0)").attr('selected','selected');
                 $(".consignee_add_user2 option:eq(0)").attr('selected','selected');
                 $(".consignee_add_user3 option:eq(0)").attr('selected','selected');

								 $("input[name=uname]").val('');
								 $("input[name=email]").val('');
								 $("input[name=password]").val('');
								 $("input[name=passconf]").val('');

								$('#check_uname i').text("");
								$('#check_email i').text("");
								$('#message').text('');
                                  

                 $('#myModal_addUser').modal('hide');
                              }
                           });
              })

            .fail(function(data) {
                   $.alert({
                  backgroundDismiss: false,
                    title: 'Error!',
                    content: 'There is a problem in adding data ,please try another data or reload the page!',
                    confirm: function(){
                         dia.close();
                         location.reload();
                    }
                   });
              });
            
    }

        

  });

    </script>