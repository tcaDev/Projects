
var RoleName;
var RoleDesc;
 $(document).on('click','.btn-create-role',function(){
 	RoleName = $('.role-name').val();
 	RoleDesc = $('.role-desc').val();

 	if(RoleName == ""){
 		$('.role-name').focus();
 		$('.message-role').fadeIn('slow').html('<i style="color:red;">Please Enter Role Name...</i>');	
 		$('.message-role').fadeOut(3000);
 	}

 	else if(RoleDesc == ""){
 		$('.role-desc').focus();
 		$('.message-role').fadeIn('slow').html('<i style="color:red;">Please Enter Role Description...</i>');	
 		$('.message-role').fadeOut(3000);
 	}

 	else {

 		$.ajax({
            method: "POST",
            url: link + "/Access/insert_role/",
            beforeSend: function() {
                dia = $.dialog({
                      icon: 'fa fa-spinner fa-pulse',
                      closeIcon: false,
                      title: 'Please wait...',
                      backgroundDismiss: false,
                      content: 'Currently Adding Role',
                  });
              },
              data: {

                    RoleName :RoleName,
                    RoleDesc :RoleDesc,
              }
        })
           .done(function(data) {
                          $.alert({
                            backgroundDismiss: false,   
                              title: 'Success!',
                              content: 'New Role Added.!',
                              confirm: function(){
                                  dia.close();
                                  $('.role-name').val("");
 								  $('.role-desc').val("");
 								  location.reload();
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