<div class="modal-content" style="top: 145px;">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Account</h4>
      </div>

      <div class="modal-body">

      		<div class="col-lg-12">
      			<div class="row">
      				<div class="col-lg-6">
      						<div class="form-group">
			      				<span style="font:13px;font-weight:900;">User Name : <a class="uname"></a></span>
			      			</div>
			    			
			    			<div class="form-group">
			    				<span style="font:13px;font-weight:900;">First Name : <a class="fname"></a></span>
			      			</div>

			      			<div class="form-group">
			      				<span style="font:13px;font-weight:900;">Last Name : <a class="lname"></a></span>
			      			</div>
      				</div>

      				<div class="col-lg-6">
      						<div class="form-group">
			      				<span style="font:13px;font-weight:900;">Activate/Deactivate</span>
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
	var uid;

	$(document).on('click','.btn-update-user',function(){

		var uname = $(this).closest('tr').children('td:eq(5)').text();
		var fname = $(this).closest('tr').children('td:eq(6)').text();
		var lname = $(this).closest('tr').children('td:eq(8)').text();


		 uid = $(this).closest('tr').children('td:eq(1)').text();
		var status = $(this).closest('tr').children('td:eq(2)').text();

		

		var statuses = parseInt(status);

		$('.uname').text(uname);
		$('.fname').text(fname);
		$('.lname').text(lname);


	     if(statuses==1){
	      $('.activate_user').prop('checked', true);
	  	 }else{
	  	  	   $('.deactivate_user').prop('checked', true);
	  	 }





	});


	$(document).on('click','.btn-UpdateUser', function(){

		var role = $('input[name=update_activate]:checked').val();


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
              data: {uid :uid,
                    status :role,
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

</script>