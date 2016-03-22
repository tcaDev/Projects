/*User rOLES*/

var module = 0;
var role;


	$(document).on('click','.jbfile',function(){
		$('.access_admin').attr('id','jobfile-admin');
		module = 1;
		jobfile_admin(role,module);
	});

	$(document).on('click','.sitesettings',function(){
		$('.access_admin').attr('id','sitesettings-admin');
		module = 2;
		jobfile_admin(role,module);
		
	});

	$(document).on('click','.global',function(){
		$('.access_admin').attr('id','globalsearch-admin');
		module = 3;
		jobfile_admin(role,module);
	});

	$(document).on('click','.reports',function(){
		$('.access_admin').attr('id','reports-admin');
		module = 4;
		jobfile_admin(role,module);
	});

	$(document).on('click','.audit',function(){
		$('.access_admin').attr('id','audit-admin');
		module = 5;
		jobfile_admin(role,module);
	});

	$(document).on('click','.dashboard-access',function(){
		$('.access_admin').attr('id','dashboard-admin');
		module = 6;
		jobfile_admin(role,module);
	});

	$(document).on('click','.user',function(){
		$('.access_admin').attr('id','user-admin');
		module = 7;
		jobfile_admin(role,module);
	});

/*Function JobFile Access*/

function jobfile_admin(role,module){

	$.ajax({
            method: "POST",
              url: link + "/Access/admin_access/",
              beforeSend: function() {
                      $('.jobfile-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { role:role,
            		module:module,
            }
        })
        .done(function(data) {
                $(".jobfile-admin").html(data);
        });
}


/*SAve Button*/
var global_access;
var SystemId;
var set_global;

$(document).on('click','.jobfile_accessRole',function(){
	getValue_check();
});


$(document).on('click','.site_accessRole',function(){
	getValue_check_sitesettings();
});

$(document).on('click','.global_accessRole',function(){
	 global_access = $(".global_access:checked").val();
	 SystemId = 13;
	 set_global = '.global';
	getValue_check_global(global_access,SystemId,set_global);
});


$(document).on('click','.report_accessRole',function(){
	getValue_check_report();
});

$(document).on('click','.audit_accessRole',function(){
	global_access = $(".audit_access:checked").val();
	SystemId = 18;
	set_global = '.audit';
	getValue_check_global(global_access,SystemId,set_global);
});

$(document).on('click','.dash_accessRole',function(){
	 global_access = $(".dash_access:checked").val();
	 SystemId = 19;
	 set_global = '.dashboard-access';
	 getValue_check_global(global_access,SystemId,set_global);
});

$(document).on('click','.user_accessRole',function(){
	var user = [];
	$(".user_access").each(function() {
		if($(this).is(':checked')){
			user.push($(this).val());
		}else{
			user.push('');
		}

	/*	if($(this).not(':checked') == "" || $(this).val() == null){
			user.push(' ');
		}else{
			user.push($(this).val());	
		}*/
	});

	var user_list = user.join(',') + ",";
	 global_access = user_list;
	 SystemId = 20;
	 set_global = '.user';
	 getValue_check_global(global_access,SystemId,set_global);
});

function getValue_check(){
	/* declare an checkbox array */
	var mnila = [];
	var outport = [];
	var air = [];
	
	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
	$(".sea_mnila").each(function() {
		if($(this).is(':checked')){
			mnila.push($(this).val());
		}else{
			mnila.push('');
		}
	});

	$(".sea_outport").each(function() {
		if($(this).is(':checked')){
			outport.push($(this).val());
		}else{
			outport.push('');
		}
	});

	$(".air_freight").each(function() {
		if($(this).is(':checked')){
			air.push($(this).val());
		}else{
			air.push('');
		}
	});
	
	/* we join the array separated by the comma */
	var mnila_list;
	var outport_list;
	var air_list;
	var jobfile;
	mnila_list = mnila.join(',') + ",";
	outport_list = outport.join(',') + ",";
	air_list = air.join(',') + ",";
	jobfile = $(".jobfile_access:checked").val();

	/* check if there is selected checkboxes, */
	$.ajax({
            method: "POST",
              url: link + "/Access_update/jobfile_update_access/",
              beforeSend: function() {
		                dia = $.dialog({
		                      icon: 'fa fa-spinner fa-pulse',
		                      closeIcon: false,
		                      title: 'Please wait...',
		                      backgroundDismiss: false,
		                      content: 'Currently Saving',
		                  });
                 },  
            data: { 
            		jobfile:jobfile,
            		mnila_list:mnila_list,
            		outport_list:outport_list,
            		air_list:air_list,
            		role:role,

            }
        })
        .done(function(data) {
                 $.alert({
                            backgroundDismiss: false,   
                              title: 'Save Success.!',
                              content: '<i>Press Okay.</i>',
                              confirm: function(){
                                  dia.close();
                                  $('#jbfl').trigger('click');
                                  window.location.reload();
                              }
                           });
        });
}

/*Site Settings*/
function getValue_check_sitesettings(){
	/* declare an checkbox array */
	var consignee = [];
	var broker = [];
	var shipper = [];
	var carrier = [];
	var hauler = [];
	var commodity = [];
	var legend = [];
	
	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
	$(".consignee_access").each(function() {
		if($(this).is(':checked')){
			consignee.push($(this).val());
		}else{
			consignee.push('');
		}
	});

	$(".broker_access").each(function() {
		if($(this).is(':checked')){
			broker.push($(this).val());
		}else{
			broker.push('');
		}
	});

	$(".shipper_access").each(function() {
		if($(this).is(':checked')){
			shipper.push($(this).val());
		}else{
			shipper.push('');
		}
	});

	$(".carrier_access").each(function() {
		if($(this).is(':checked')){
			carrier.push($(this).val());
		}else{
			carrier.push('');
		}
	});

	$(".hauler_access").each(function() {
		if($(this).is(':checked')){
			hauler.push($(this).val());
		}else{
			hauler.push('');
		}
	});

	$(".commodity_access").each(function() {
		if($(this).is(':checked')){
			commodity.push($(this).val());
		}else{
			commodity.push('');
		}
	});

	$(".legend_access").each(function() {
		if($(this).is(':checked')){
			legend.push($(this).val());
		}else{
			legend.push('');
		}
	});

	
	/* we join the array separated by the comma */
	site = $(".site_access:checked").val();
	var consignee_list = consignee.join(',') + ",";
	var broker_list = broker.join(',') + ",";
	var shipper_list = shipper.join(',') + ",";
	var carrier_list = carrier.join(',') + ",";
	var hauler_list = hauler.join(',') + ",";
	var commodity_list = commodity.join(',') + ",";
	var legend_list = legend.join(',') + ",";
	/* check if there is selected checkboxes, */
	
	$.ajax({
            method: "POST",
              url: link + "/Access_update/site_update_access/",
              beforeSend: function() {
		                dia = $.dialog({
		                      icon: 'fa fa-spinner fa-pulse',
		                      closeIcon: false,
		                      title: 'Please wait...',
		                      backgroundDismiss: false,
		                      content: 'Currently Saving',
		                  });
                 },  
            data: { 
            		site:site,
            		consignee_list:consignee_list,
            		broker_list:broker_list,
            		shipper_list:shipper_list,
            		carrier_list:carrier_list,
            		hauler_list:hauler_list,
            		commodity_list:commodity_list,
            		legend_list:legend_list,
            		role:role,

            }
        })
        .done(function(data) {
                 $.alert({
                            backgroundDismiss: false,   
                              title: 'Save Success.!',
                              content: '<i>Press Okay.</i>',
                              confirm: function(){
                                  dia.close();
                                  $('.sitesettings').trigger('click');
                                  window.location.reload();
                              }
                           });
        });
}

function getValue_check_global(global_access,SystemId,set_global){
	



	/* check if there is selected checkboxes, */
	
	$.ajax({
            method: "POST",
              url: link + "/Access_update/global_update_access/",
              beforeSend: function() {
		                dia = $.dialog({
		                      icon: 'fa fa-spinner fa-pulse',
		                      closeIcon: false,
		                      title: 'Please wait...',
		                      backgroundDismiss: false,
		                      content: 'Currently Saving',
		                  });
                 },  
            data: { 
            		global_access:global_access,
            		SystemId:SystemId,
            		role:role,

            }
        })
        .done(function(data) {
                 $.alert({
                            backgroundDismiss: false,   
                              title: 'Save Success.!',
                              content: '<i>Press Okay.</i>',
                              confirm: function(){
                                  dia.close();
                                  $(set_global).trigger('click');
                                  window.location.reload();
                              }
                           });
        });
}


function getValue_check_report(){
	/* declare an checkbox array */
	var mnila = [];
	var outport = [];
	var air = [];
	
	/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
	$(".rep_mnila_access").each(function() {
		if($(this).is(':checked')){
			mnila.push($(this).val());
		}else{
			mnila.push('');
		}
	});

	$(".rep_outport_access").each(function() {
		if($(this).is(':checked')){
			outport.push($(this).val());
		}else{
			outport.push('');
		}
	});

	$(".rep_air_access").each(function() {
		if($(this).is(':checked')){
			air.push($(this).val());
		}else{
			air.push('');
		}
	});
	
	/* we join the array separated by the comma */
	var mnila_list;
	var outport_list;
	var air_list;
	var report;
	mnila_list = mnila.join(',') + ",";
	outport_list = outport.join(',') + ",";
	air_list = air.join(',') + ",";
	report = $(".reports_access:checked").val();
	/* check if there is selected checkboxes, */
	
	$.ajax({
            method: "POST",
              url: link + "/Access_update/report_update_access/",
              beforeSend: function() {
		                dia = $.dialog({
		                      icon: 'fa fa-spinner fa-pulse',
		                      closeIcon: false,
		                      title: 'Please wait...',
		                      backgroundDismiss: false,
		                      content: 'Currently Saving',
		                  });
                 },  
            data: { 
            		report:report,
            		mnila_list:mnila_list,
            		outport_list:outport_list,
            		air_list:air_list,
            		role:role,

            }
        })
        .done(function(data) {
                 $.alert({
                            backgroundDismiss: false,   
                              title: 'Save Success.!',
                              content: '<i>Press Okay.</i>',
                              confirm: function(){
                                  dia.close();
                                  $('.reports').trigger('click');
                                  window.location.reload();
                              }
                           });
        });
}

