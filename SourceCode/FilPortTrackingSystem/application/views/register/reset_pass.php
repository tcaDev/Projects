<div class="modal-content" style="top: 115px;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal" >&times;</button>
        <h4 class="modal-title">Reset Password</h4>
      </div>

      <div class="modal-body">
	      <div class="col-lg-12">
	      	<div class="row">
	      		<div class="col-lg-12">
	      			<div class="form-group">
			      		<span style="font-size: 13px;font-weight: 600;">Username : <a class="uname"></a></span>
			      	</div>
			      	<hr>
			      	<div class="form-group">
			      		<label for="password">Reset Password:</label>
			      		<input type="password" class="form-control input-sm password-reset">
			      	</div>
			      	<div class="form-group">
			      		<label for="con-password">Confirm Reset Password:</label>
			      		<input type="password" class="form-control input-sm con-password-reset">
			      	</div>

			      	<div class="col-lg-12"><span id="message-reset"></span></div>
			      	<div class="col-lg-12"><i id="message_user-reset"></i></div>
		      </div>
	      	</div>
     	 </div>
      </div>

  <div class="footer-modal">
    <hr>
     <button type="button" class="btn  btn-danger btn-ResetPass">Save</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  </div>
</div>


<script>

/*
* Password Matching
*/
    $('.password-reset').on('keyup', function () {

        if($(this).val() == ""){
            $('#message-reset').html('');
        }
        else if ($(this).val() == $('.con-password-reset').val()) {
            $('#message-reset').html('Password Match').css('color', 'green');

        } else $('#message-reset').html('Password not Match').css('color', 'red');
    });

     $('.con-password-reset').on('keyup', function () {

      if($(this).val() == ""){
            $('#message-reset').html('');
        }
       else if ($(this).val() == $('.password-reset').val()) {
            $('#message-reset').html('Password Match').css('color', 'green');

        } else $('#message-reset').html('Password not Match').css('color', 'red');
    });
/*
* End Password Matching
*/

var uid;

	$(document).on('click','.btn-reset-pass',function(){

		var uname = $(this).closest('tr').children('td:eq(4)').text();

    $.ajax({
                method: "POST",
                url : "<?php echo base_url('Access/user_admin');?>",
                data: {
                  uname : uname
                } 
              }).done(function(data){
                  var fills = JSON.parse(data);
                   uid = fills[0].UserId;
      });


		$('.uname').text(uname);

		$('#message-reset').text("");
		$('.password-reset').text("");
		$('.con-password-reset').text("");
		$('.password-reset').val("");
		$('.con-password-reset').val("");
	});


$(document).on('click','.btn-ResetPass',function(){
	if($('.password-reset').val() == ''){
      $('.password-reset').focus();
    }
    else if($('.con-password-reset').val() == ''){
      $('.con-password-reset').focus();
    }
    else if($('#message-reset').text() == "Password not Match"){
      $('#message_user-reset').fadeIn('slow').text("Password does not Match. Please Check...");
      $('#message_user-reset').fadeOut(3000);
    }else{


    	var pass = $('.password-reset').val();
    	var cpass = $('.con-password-reset').val();

    	$.ajax({
            method: "POST",
            url: "<?php echo base_url('Job_availability/reset_password');?>",
            beforeSend: function() {
                dia = $.dialog({
                      icon: 'fa fa-spinner fa-pulse',
                      closeIcon: false,
                      title: 'Please wait...',
                      backgroundDismiss: false,
                      content: 'Currently Resetting Password',
                  });
              },
              data: {
              		  uid : uid,
                    cpass :cpass,
                    pass :pass,
              }
        })
           .done(function(data) {
                          $.alert({
                            backgroundDismiss: false,   
                              title: 'Success!',
                              content: 'Password Change.!',
                              confirm: function(){
                                  dia.close();
                                  userList(role);
                                  $('#myModal_resetPass').modal('hide');
                              }
                           });
              })

            .fail(function(data) {
                   $.alert({
                  backgroundDismiss: false,
                    title: 'Error!',
                    content: 'There is a problem in resetting data ,please try another data or reload the page!',
                    confirm: function(){
                         dia.close();
                         $('.get_list').trigger('click');
                         location.reload();
                    }
                   });
              });

    }
});
</script>