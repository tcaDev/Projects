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

                                     <label class="radio-inline"><input type="radio" value="2" name="optradio" class="filport" checked="checked">Filport User</label>
                                     <label class="radio-inline"><input type="radio" value="1" name="optradio" class="client">Client User</label>
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
                                                <input placeholder="Birth Date" class="form-control" type="text" onfocus="(this.type='date')" name="bdate"  data-toggle="tooltip" data-placement="left" title="Birth Date" required>
                                            </div>

                                          <div class="form-group">
                                             <input type="text" name="contact1"  placeholder="Contact Number 1" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 1" required >
                                          </div>

                                          <div class="form-group">
                                             <input type="text" name="contact2"  placeholder="Contact Number 2" class="form-control" min="7" max="11" data-toggle="tooltip" data-placement="left" title="Contact Number 2" >
                                          </div>

                                          <div class="form-group">
                                            <input type="text" name='addr' placeholder="House / Building No. / Street" class="form-control"  data-toggle="tooltip" data-placement="left" title="House / Building No. / Street"  required >
                                        </div>

                                         <div class="form-group">
                                             <input type="text" name="brgy" placeholder="Barangay / Village" class="form-control" data-toggle="tooltip" data-placement="left" title="Barangay / Village"  required>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="towncity" placeholder="Town / City Province" class="form-control" data-toggle="tooltip" data-placement="left" title="Town / City Province" required >
                                        </div>

                                    </div>


                                    <!-- UserName and Password -->
                                    <div class="col-lg-6">

                                         <div class="form-group">

                                            <select name="country" class="form-control country_addUser" data-toggle="tooltip" data-placement="left" title="Country">
                                              <?php 
                                                echo "<option value='0' selected='selected'>Select your Country</option>";
                                                foreach($countries as $row)
                                                 echo "<option value=".$row->CountryId."> ".$row->CountryName."</option>"; 
                                              ?>
                                            </select>
                                        
                                        </div>

                                        <div class="form-group">

                                          <select name="consignee" class="form-control hidden consignee_add_user" data-toggle="tooltip" data-placement="left" title="Consignee">
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
                                <div class="table_UserList"></div>
                            </div>


                            <!-- End List Form -->          
              </div>

     
        </div>
      </div>

      <div class="footer-modal">
        <hr>
         <button type="submit" class="btn btn-default btn-primary btn-Save-AddUser"><span class="fa fa-plus fa-fw"></span> Add User</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>



<script>
 var link = 'http://localhost/FilPortTrackingSystem';


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



/*Hidden Consignee If Client is User*/

var legit=0;

 $('.client').click(function(){
    if ($(this).is(':checked'))
    {
      $('.consignee_add_user').fadeIn('slow').removeClass('hidden');
     
      legit=1;
    }
  });

  $('.filport').click(function(){
    if ($(this).is(':checked'))
    {
      $('.consignee_add_user').fadeIn('slow').addClass('hidden');
     
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
    var bdate = $("input[name=bdate]").val();
    var contact1 = $("input[name=contact1]").val();
    var contact2 = $("input[name=contact2]").val();
    var addr = $("input[name=addr]").val();
    var brgy = $("input[name=brgy]").val();
    var towncity = $("input[name=towncity]").val();

    var country = $(".country_addUser option:selected").val();
    var consignee = $(".consignee_add_user option:selected").val();

    var uname = $("input[name=uname]").val();
    var email = $("input[name=email]").val();
    var pass = $("input[name=password]").val();
    var passconf = $("input[name=passconf]").val();

    var activation = $(".activation option:selected").val();

    var role = $('input[name=optradio]:checked').val();


    if(fname == ''){
      $("input[name=fname]").focus();
    }else if(mname == ''){
      $("input[name=mname]").focus();
    }
    else if(lname == ''){
      $("input[name=lname]").focus();
    }
    else if(bdate == ''){
      $("input[name=bdate]").focus();
    }
    else if(contact1 == ''){
      $("input[name=contact1]").focus();
    }
    else if(addr == ''){
      $("input[name=addr]").focus();
    }
    else if(brgy == ''){
      $("input[name=brgy]").focus();
    }
    else if(towncity == ''){
      $("input[name=towncity]").focus();
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
    }
    else if($('.country_addUser option:selected').val() == '0'){
        $('#message_user').text("");
        $('#message_user_email').fadeIn('slow').text("Please Choose Country...");
        $('#message_user_email').fadeOut(3000);
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
                    bdate :bdate,
                    contact1 :contact1,
                    contact2 :contact2,
                    addr :addr,
                    brgy :brgy,
                    towncity :towncity,

                    country :country,
                    consignee :consignee,

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