/*Loads Access Roles*/

 $(document).on('change','.view_Roles',function(){
   role = $(this).val();
   roles_access(role);
 });

$(document).on('click','.create_roles',function(){
    create_role();
 });

function roles_access(role){
        $.ajax({
            method: "POST",
          url: link + "Access/get_dataAccess/",
           beforeSend: function() {
              $('.access_roles').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {role:role}
      })
      .done(function(data) {
             $('.access_roles').html(data);
        });
}


/*Create Role*/

function create_role(){
    $.ajax({    //create an ajax request 
        type: "GET",
        url: link + "/Access/create_roleAccess/",             
        dataType: "html", 
        beforeSend: function() {
              $('.access_roles').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },               
        success: function(response){                    
            $(".access_roles").html(response); 
            
        }

    });
}

/*load User Type*/
$(document).ready(function(){
 $.ajax({    //create an ajax request 
        type: "GET",
        url: link + "/Job_availability/user_type/",             
        dataType: "html", 
        beforeSend: function() {
              $('.user_type').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },               
        success: function(response){                    
            $(".user_type").html(response); 
            
        }

    });
});

 $(document).on('click','.add_User',function(){
    $('.btn-Save-AddUser').removeClass('hidden');
});



 /*Get List Of User*/

 $(document).on('change','.view_List',function(){
   role = $(this).val();
   userList(role);

   if($(this).val() == 2){
     $('.consignee_update_user').fadeIn('slow').removeClass('hidden');
     $('.consignee_update_user2').fadeIn('slow').removeClass('hidden');
     $('.consignee_update_user3').fadeIn('slow').removeClass('hidden');

     $('.addr_update').fadeIn('slow').removeClass('hidden');
     $('.addr_update2').fadeIn('slow').removeClass('hidden');

    $('.department').text("Company:");
  }else{
      $('.consignee_update_user').fadeIn('slow').addClass('hidden');
      $('.consignee_update_user2').fadeIn('slow').addClass('hidden');
      $('.consignee_update_user3').fadeIn('slow').addClass('hidden');

      $('.department').text("Department:");

      $('.addr_update').fadeIn('slow').addClass('hidden');
      $('.addr_update2').fadeIn('slow').addClass('hidden');
  }
 });


/*Get User List*/

function userList(role){
   $.ajax({
            method: "POST",
          url: link + "/Access/get_userList/",
           beforeSend: function() {
              $('.list_users').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {role:role}
      })
      .done(function(data) {
             $('.list_users').html(data);
        });
}


/*---------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------*/
/*Register Functions*/
/*---------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------*/

function uname_check(uname,role){
   if(uname==''){
      $('#check_uname').empty();
   }else{
       
        $('#check_uname span').show();
        $.ajax({
            method: "POST",
          url: link + "/Job/check_uname/",
           beforeSend: function() {
              $('#check_uname').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {uname:uname,
                  roleid:role}
      })
      .done(function(data) {
             $('#check_uname').html(data);
        });
    }
 }


 function uname_check_update(uname,role){
   if(uname==''){
      $('#check_uname_update').empty();
   }else{
       
        $('#check_uname_update span').show();
        $.ajax({
            method: "POST",
          url: link + "/Job/check_uname/",
           beforeSend: function() {
              $('#check_uname_update').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
            },
            data: {uname:uname,
                    roleid:role}
      })
      .done(function(data) {
             $('#check_uname_update').html(data);
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

     $('#check_email span').show();
       
        $.ajax({
            method: "POST",
          url: link + "/Job/check_email/",
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

  $(document).on('change','.user_type',function(){
     var User =  $('.user_type option:selected').val();

    if(User == '2'){
        $('.consignee_add_user').fadeIn('slow').removeClass('hidden');
        $('.consignee_add_user2').fadeIn('slow').removeClass('hidden');
        $('.consignee_add_user3').fadeIn('slow').removeClass('hidden');

        $('.addr').fadeIn('slow').removeClass('hidden');
        $('.addr2').fadeIn('slow').removeClass('hidden');

        $('.department').attr('placeholder','Company');
        $('.department').prop('title','Company');
        $('.department').attr('data-original-title','Company');

        legit=1;
    }else{

        $('.consignee_add_user').fadeIn('slow').addClass('hidden');
        $('.consignee_add_user2').fadeIn('slow').addClass('hidden');
        $('.consignee_add_user3').fadeIn('slow').addClass('hidden');

        $('.addr').fadeIn('slow').addClass('hidden');
        $('.addr2').fadeIn('slow').addClass('hidden');

        $('.department').attr('placeholder','Department');
        $('.department').prop('title','Department');
        $('.department').attr('data-original-title','Department');

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
    var consignee2 = $(".consignee_add_user2 option:selected").val();
    var consignee3 = $(".consignee_add_user3 option:selected").val();

    var uname = $("input[name=uname]").val();
    var email = $("input[name=email]").val();
    var pass = $("input[name=password]").val();
    var passconf = $("input[name=passconf]").val();


    var role = $('.user_type option:selected').val();

    if(role == '0'){
      $(".user_type").focus();
      $('#message_user').text("");
      $('#message_user_email').fadeIn('slow').text("Please Choose User Type...");
      $('#message_user_email').fadeOut(3000);
    }
    else if(fname == ''){
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
            url:  link + "/Job/user_add/",
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

                  $("input[name=title]").val('');
                   $("input[name=department]").val('');

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

                $('#check_uname span').hide();
                $('#check_email span').hide();
								$('#message').text('');
                                  

                 /*$('#myModal_addUser').modal('hide');*/
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