

//FOR COLOR SELECT DROPDOWN
	$(document).on('change','.colsel-outport',function(){
  var status = $(this).val();
  var color = $('.colsel-outport option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-outport').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-outport').css({'background-color': color,'color': 'white'});
  	}
 });

var suc;

	$(document).ready(function(){

		$(document).on('click','.btn-save',function(){
			$(this).attr('disabled','disabled');
		});

		$(".btn-cancel").click(function(){
			window.location.hash="#outport";
			location.reload();
		});

		});
		
    $('[data-toggle="tooltip"]').tooltip(); 


		/*if(i==0){
			$('#btn-jobfile-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-truck-outport-add').removeClass('active');
			$('#btn-vessel-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').removeClass('hidden');
			$('.pill-truck-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.pill-vessel-outport-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next-outport').removeClass('hidden');

			i=0;
		});

		}
		else{
			$('#btn-jobfile-outport-add').click(false);
		}*/
		

		/*
		* Next Button
		*/

		var i=0;

		$(document).on('click','.btn-Next-outport',function(){

/*Start*/
/*
---------------------------------------------------------------------------------------------------------------------
*/

			 if($('.required-fields .jobfiles-outport').val() == "")
			{
				$('.jobfile-msg-outport').text("Need Jobfile");
			}
			else if($('.required-fields .shipper-outport').val() == "")
			{
				$('.shipper-msg-outport').text("Need Shipper");
			}
			else if($('.required-fields .consignee-outport').val() == "")
			{
				$('.consignee-msg-outport').text("Need Consignee");
			}
			else if($('#check_jobfiles-outport i').text() == "Jobfile already exists in Air")
			{
				$('.jobfile-msg-outport').text("Can't Proceed Jobfile Already Exists");
			}
				else if($('#check_jobfiles-outport i').text() == "Jobfile already exists in Manila")
			{
				$('.jobfile-msg-outport').text("Can't Proceed Jobfile Already Exists");
			}
			else if($('#check_jobfiles-outport i').text() == "Jobfile already exists in Outport")
			{
				$('.jobfile-msg-outport').text("Can't Proceed Jobfile Already Exists");
			}
			else{i++;}


			
				   

			/*Next Page*/
			if(i==2){

				if($("#tableAddVessel-outport table tbody tr td").length == 0){
					$('.tableVessel-msg-outport').text("Can't Proceed Need Vessel");
					i=1;
				}else{
				  $('.btn-Next-outport').attr('disabled','disabled');
				  insert_vessels_outport();
				}

			}else if(i==3){
				if($("#tableAddContainer-outport table tbody tr td").length == 0){
					$('.tableContainer-msg-outport').text("Can't Proceed Need Container");
					i=2;
				}else{
					i=2;
						/*$('.btn-Next-outport').attr('disabled','disabled');*/
									$.confirm({
										    title: 'Confirm',
										    content: 'Are  you sure to add this containers?',
										    confirm: function(){
									        				    $.confirm({
														    	      backgroundDismiss: false, 
											   						  title: 'Add Container', 
											   						  confirmButton: 'Yes',
									    							  cancelButton: 'No',
											  						  content: 'Do you want to Add Commodity?',
											 					      confirm: function(){
											  					        	/*$("#btn-truck-outport-add").click();*/ 
											  					        	$('#btn-truck-outport-add').addClass('active');
																			$('#btn-jobfile-outport-add').removeClass('active');
																			$('#btn-container-outport-add').removeClass('active');
																			$('#btn-charges-outport-add').removeClass('active');
																			$('#btn-vessel-outport-add').removeClass('active');
																			$('.pill-jobfile-outport-add').addClass('hidden');
																			$('.pill-truck-outport-add').removeClass('hidden');
																			$('.pill-charges-outport-add').addClass('hidden');
																			$('.pill-container-outport-add').addClass('hidden');
																			$('.pill-vessel-outport-add').addClass('hidden');
																			$('.test_data').addClass('hidden');
																			$('.btn-Next-outport').removeClass('hidden'); 
																			$('.btn-Next-outport').removeAttr('disabled');
											  					  },
											  						  cancel: function(){
											  						  	 ins_contains_outport();
											   						 }
															});
									    },
									    cancel: function(){
									        /*$.alert('Canceled!')*/
									    }
									});

			 		}
			
			}else if(i==4){
				if($("#tableAddTruck-outport table tbody tr td").length == 0){
					$('.tableGoods-msg-outport').text("Can't Proceed Need Commodity");
					i=3;
				}else{
			    var add_comodity=1;
			    $('.btn-Next-outport').attr('disabled','disabled');
  		        ins_contains_outport(add_comodity);
				}
			}
			else if(i==1){
    			insert_jobfile_outport();
    			$(this).attr('disabled','disabled');
				/*$("#btn-vessel-outport-add").click();*/
			}
/*End*/
/*
---------------------------------------------------------------------------------------------------------------------------------
*/

		});



/*BACK Button*/

var back=0;
	 $(document).on('click','.btn-Back-outport', function(){

	 		if(i==1){
	 			$('#btn-vessel-outport-add').removeClass('active');
				$('#btn-jobfile-outport-add').addClass('active');
				$('#btn-truck-outport-add').removeClass('active');
				$('#btn-charges-outport-add').removeClass('active');
				$('#btn-container-outport-add').removeClass('active');
				$('.pill-jobfile-outport-add').removeClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').addClass('hidden');
				$('.pill-container-outport-add').addClass('hidden');
				$('.pill-vessel-outport-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next-outport').removeClass('hidden');
				$('.btn-Next-outport').removeAttr('disabled');
				$('.btn-Back-outport').addClass('hidden');
				back=1;
				i=0;

	 		}else if(i==2){
	 			$('#btn-container-outport-add').removeClass('active');
				$('#btn-jobfile-outport-add').removeClass('active');
				$('#btn-truck-outport-add').removeClass('active');
				$('#btn-charges-outport-add').removeClass('active');
				$('#btn-vessel-outport-add').addClass('active');
				$('.pill-jobfile-outport-add').addClass('hidden');
				$('.pill-vessel-outport-add').removeClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').addClass('hidden');
				$('.pill-container-outport-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next-outport').removeClass('hidden');
				$('.btn-Next-outport').removeAttr('disabled');
				$('.btn-Back-outport').removeClass('hidden');

				i=1;
				back=2;

	 		}else if(i==3){


	 			$('#btn-truck-outport-add').removeClass('active');
				$('#btn-jobfile-outport-add').removeClass('active');
				$('#btn-container-outport-add').addClass('active');
				$('#btn-charges-outport-add').removeClass('active');
				$('#btn-vessel-outport-add').removeClass('active');
				$('.pill-jobfile-outport-add').addClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').addClass('hidden');
				$('.pill-container-outport-add').removeClass('hidden');
				$('.pill-vessel-outport-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next-outport').removeClass('hidden'); 
				$('.btn-Next-outport').removeAttr('disabled');
				$('.btn-Back-outport').removeClass('hidden');

	 			i=2;
	 			back=3;

	 		}else if(i==4){
	 			if(proceed==1){

	 				$('#btn-truck-outport-add').removeClass('active');
					$('#btn-jobfile-outport-add').removeClass('active');
					$('#btn-container-outport-add').addClass('active');
					$('#btn-charges-outport-add').removeClass('active');
					$('#btn-vessel-outport-add').removeClass('active');
					$('.pill-jobfile-outport-add').addClass('hidden');
					$('.pill-truck-outport-add').addClass('hidden');
					$('.pill-charges-outport-add').addClass('hidden');
					$('.pill-container-outport-add').removeClass('hidden');
					$('.pill-vessel-outport-add').addClass('hidden');
					$('.test_data').addClass('hidden');
					$('.btn-Next-outport').removeClass('hidden'); 
					$('.btn-Next-outport').removeAttr('disabled');
					$('.btn-Back-outport').removeClass('hidden');

		 			i=2;
		 			back=3;

	 			}else if(proceed==2){
	 				$('#btn-truck-outport-add').addClass('active');
					$('#btn-jobfile-outport-add').removeClass('active');
					$('#btn-container-outport-add').removeClass('active');
					$('#btn-charges-outport-add').removeClass('active');
					$('#btn-vessel-outport-add').removeClass('active');
					$('.pill-jobfile-outport-add').addClass('hidden');
					$('.pill-truck-outport-add').removeClass('hidden');
					$('.pill-charges-outport-add').addClass('hidden');
					$('.pill-container-outport-add').addClass('hidden');
					$('.pill-vessel-outport-add').addClass('hidden');
					$('.test_data').addClass('hidden');
					$('.btn-Next-outport').removeClass('hidden'); 
					$('.btn-Next-outport').removeAttr('disabled');
					$('.btn-Back-outport').removeClass('hidden');

		 			i=3;
		 			back=4;
	 			}
	 		}
	 });


 function myjob_outport(jobfile){
   jobfile = jobfile.value;
   var mon = $('.monitoring_type').val();
    if(jobfile==''){
   	$('#check_jobfiles-outport').empty();
   }else{
   			$.ajax({
			  		method: "POST",
					url: link + "/Job/check_jobfiless/",
					 beforeSend: function() {
							$('#check_jobfiles-outport').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  		data: { jobfile:jobfile,
			  		        mon    :mon}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles-outport').html(data);
				});

	 }
}

       
            $(document).ready(function () {
              //called when key is pressed in textbox
              $(document).on('keypress','#cartons-outport',function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                  /*  $("#errmsg-outport").html("Numbers Only").show().fadeOut("slow");*/
                           return false;
                
                	
                }
               });


             //   $(document).on('keypress','.num_only',function (e) {
                 //if the letter is not digit then display error and don't type anything
               //  if (e.which!=110 || e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg-outport").html("Numbers Only").show().fadeOut("slow");
                           return false;*/
                           /*alert('Numbers Only');*/
                          // return false;
               // }
 
              // });
            });


	
	$(function(){
  

    $(document).on('click', '#tableAddContainer-outport .deleteButton', function() {

    	var del = $(this).closest('tr').children('td:eq(1)').text();

      	$("#tableAddTruck-outport .containers-prod-outport").find("option[value="+ del +"]").remove();

    	$(this).closest("tr").remove();
    	
	});

	$(document).on('click', '#tableAddTruck-outport .deleteButton', function() {

    	$(this).closest("tr").remove();

	});

		$(document).on('click', '#tableAddVessel-outport .deleteButton', function() {
			$(this).closest("tr").remove();
	    var del = $(this).closest('tr').children('td:eq(0)').text();
	    
	    $("#tableAddContainer-outport .vessel_voyage-outport").find("option[value="+ del +"]").remove();
    	

	});
});
	$(document).ready(function(){
			var testme=false;
				function isExist_outport(strd){

				var table = $("#tableAddContainer-outport table tbody");

				    testme=false;
				 	  table.find('tr').each(function(){
					    if($('td:nth(1)',$(this)).html()===strd) {
					       testme=true;            
					        }   
					     })
				    return testme;
				}

				

		$(document).on('click','.btn-Add-Container-Data-outport',function(){

			var compare = $('#tableAddContainer-outport .containerss').val();
			

			if(isExist_outport($('#tableAddContainer-outport .containerss-outport').val()))
			{	
				$('.container-msg-outport').text("Container Number Already Exists.");
			}
			else if($('#tableAddContainer-outport .containerss-outport').val() == ""){

				$('.container-msg-outport').text("Need Container Number.");
			}
			else{

	       $('#tableAddContainer-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       
	        $('#tableAddContainer-outport table tr:last td:nth-child(1)').html($(".vessel_voyage-outport option:selected").text());
	        $('#tableAddContainer-outport table tr:last td:nth-child(2)').html($(".containerss-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(3)').html($(".containerss-size-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(4)').html($(".cartons-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(5)').html($(".plate-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(6)').html($(".truckname-outport").val()).hide();
	        $('#tableAddContainer-outport table tr:last td:nth-child(7)').html($(".truckname-outport option:selected").text());
	        $('#tableAddContainer-outport table tr:last td:nth-child(8)').html($(".ref_entry_no-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(9)').html($(".demorage-outport").val()); 
	        $('#tableAddContainer-outport table tr:last td:nth-child(10)').html($(".storage-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(11)').html($(".dt_paid-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(12)').html($(".lodging-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(13)').html($(".dt_pre_assess-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(14)').html($(".dt_final_assess-outport").val());

	        $('#tableAddContainer-outport table tr:last td:nth-child(15)').html($(".act-del-whse-outport").val());
			$('#tableAddContainer-outport table tr:last td:nth-child(16)').html($(".tdt-outport").val());
	  		$('#tableAddContainer-outport table tr:last td:nth-child(17)').html($(".pul_out_port-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(18)').html($(".dt_file_entry_boc-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(19)').html($(".dt_boc-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(20)').html($(".act_dt_to_whse-outport").val());

	        $('#tableAddContainer-outport table tr:last td:nth-child(21)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	        $('.containers-prod-outport').append('<option value='+ $(".containerss-outport").val() +'>' + $(".containerss-outport").val() + '</option>');

	        $('.container-msg-outport').text('');
			$('.container-msg-outport').text('');
			$('.container-size-msg-outport').text('');
			$('.truckplate-msg-outport').text('');
			$('.carrier-msg-outport').text('');
			$('.tableContainer-msg-outport').text("");

			/*$("#tableAddContainer-outport  .truckname-outport option:eq(0)").attr("selected","selected");
			$("#tableAddContainer-outport  .vessel_voyage-outport option:eq(0)").attr("selected","selected");*/

			$('#tableAddContainer-outport .containerss-outport').val('');
			/*$('#tableAddContainer-outport .containerss-size-outport').val('');*/
			$('#tableAddContainer-outport .plate-outport').val('');
			/*$('#tableAddContainer-outport .cartons-outport').val('');*/

			/*$('#tableAddContainer-outport .ref_entry_no-outport').val('');
			$('#tableAddContainer-outport .dt_paid-outport').val('');
			$('#tableAddContainer-outport .dt_pre_assess-outport').val('');
		    $('#tableAddContainer-outport .dt_file_entry_boc-outport').val('');*/
		    $('#tableAddContainer-outport .tdt-outport').val('');
		    $('#tableAddContainer-outport .pul_out_port-outport').val('');

			/*$('#tableAddContainer-outport .storage-outport').val('');*/
			$('#tableAddContainer-outport .demorage-outport').val('');
			/*$('#tableAddContainer-outport .lodging-outport').val('');
			$('#tableAddContainer-outport .dt_final_assess-outport').val('');*/
			/*$('#tableAddContainer-outport .gtinport-outport').val('');
			$('#tableAddContainer-outport .gtoutport-outport').val('');*/
			$('#tableAddContainer-outport .act-del-whse-outport').val('');
			/*$('#tableAddContainer-outport .dt_boc-outport').val('');*/
			$('#tableAddContainer-outport .act_dt_to_whse-outport').val('');
			}

		


			
});

	
		var testme2=false;
				function isExist2(prod,cont){

				var table2 = $("#tableAddTruck-outport table tbody");

				    testme2=false;
				 	  table2.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===cont) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       testme2=true;            
					        }   
					     })
				    return testme2;
				}

		$(document).on('click','.btn-Add-Product-Data-outport',function(){

			var cont = $('#tableAddTruck-outport .containers-prod-outport option:selected').val();
			var prod = $('#tableAddTruck-outport .prodname-outport option:selected').val();

			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg-outport').text("The Commodity is already in this Container");
			}
			else if($('#tableAddTruck-outport .prodname-outport option:selected').val() == "0")
			{
				$('.prodname-msg-outport').text("Need Commodity Name.");
			}else{
				$('#tableAddTruck-outport table').append('<tr><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-outport table tr:last td:nth-child(1)').html($(".prodname-outport").val()).hide();
			 	$('#tableAddTruck-outport table tr:last td:nth-child(2)').html($(".prodname-outport option:selected").text());
			    $('#tableAddTruck-outport table tr:last td:nth-child(3)').html($(".containers-prod-outport").val());
	
			    $('#tableAddTruck-outport table tr:last td:nth-child(4)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			$('.cont-size-msg-outport').text('');
			$('.prodname-msg-outport').text('');
			$('.tableGoods-msg-outport').text("");

			/*$("#tableAddTruck-outport  .containers-prod-outport option:eq(0)").attr("selected","selected");*/
			/*$("#tableAddTruck-outport  .prodname-outport option:eq(0)").attr("selected","selected");*/

			}
				

			});


	
	var testme3=false;
				function isExist3(strds){

				var table3 = $("#tableAddVessel-outport table tbody");

				    testme3=false;
				 	  table3.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===strds) {
					       testme3=true;            
					        }   
					     })
				    return testme3;
				}
	
	$(document).on('click','.btn-Add-Vessel-Data-outport',function(){

		if(isExist3($('#tableAddVessel-outport .vessel-outport').val()))
			{	
				$('.vessel-msg-outport').text("Vessel Already Exists.");
			}
			else if($('#tableAddVessel-outport .vessel-outport').val() == "")
			{
				$('.vessel-msg-outport').text("Need Vessel");
			}
		else if($('#tableAddVessel-outport .carrier-outport').val() == "0")
			{
				$('.carrier-msg-outport').text("Need Shipping Line/Carrier.");
			}
		
		else{

		$('#tableAddVessel-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		
		$('#tableAddVessel-outport table tr:last td:nth-child(1)').html($(".vessel-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(2)').html($(".edt-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(3)').html($(".eat-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(4)').html($(".abt-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(5)').html($(".vdt-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(6)').html($(".aat-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(7)').html($(".carrier-outport").val()).hide();
	    $('#tableAddVessel-outport table tr:last td:nth-child(8)').html($(".carrier-outport option:selected").text());
		$('#tableAddVessel-outport table tr:last td:nth-child(9)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		//to know what is the vessel of container
		  $('.vessel_voyage-outport').append('<option value='+ $(".vessel-outport").val() +'>' + $(".vessel-outport").val() + '</option>');
		//

		$('.vessel-msg-outport').text("");
		$('.carrier-msg-outport').text("");
		$('.tableVessel-msg-outport').text("");

		$("#tableAddVessel-outport  .carrier-outport option:eq(0)").attr("selected","selected");

		$('#tableAddVessel-outport .vessel-outport').val('');
		$('#tableAddVessel-outport .edt-outport').val('');
		$('#tableAddVessel-outport .eat-outport').val('');
		$('#tableAddVessel-outport .aat-outport').val('');
		$('#tableAddVessel-outport .vdt-outport').val('');
		$('#tableAddVessel-outport .abt-outport').val('');

		}
	});
		

		$(".btn-Add-Product-Alert-outport").click(function(){
		    	  var table = $("#tableAddTruck-outport table tbody");

				    table.find('tr').each(function (i) {
				        var $tds = $(this).find('td'),
				            productId = $tds.eq(0).text(),
				            product = $tds.eq(1).text(),
				            Quantity = $tds.eq(2).text();
				        // do something with productId, product, Quantity
				        alert('Row ' + (i + 1) + ':\nContainer: ' + productId
				              + '\nVessel: ' + product
				              + '\nCartons: ' + Quantity);
				    });
		    });
		       

		  

		});



function insert_jobfile_outport(){
       var monitoring_type   = $('.monitoring_type-outport').val();
	   var jbfl       = $('.jobfiles-outport').val();
       var shipper 	  = $('.shipper-outport').val();
       var consignee  = $('.consignee-outport').val();
       var mbl 		  = $('.mbl-outport').val();
       var mbl2 	  = $('.mbl2-outport').val();
       var hbl 	 	  = $('.hbl-outport').val(); 
       var bank       = $('.bank-outport').val();
       var registry   = $('.registry-outport').val(); 
       var vdt        = $('.vdt-outport').val();
       var dtRcvd     = $('.dtRcvd-outport').val();
       var dt_pickup_obl  = $('.dt_pickup_obl-outport').val();  
 	   var dt_pickup_docs = $('.dt_pickup_docs-outport').val();  
       var broker         =  $('.broker-outport').val();
       var dt_req_budget  =  $('#dt_req_budget-outport').val();
       var ref_due_dt     =  $('#ref_due_dt-outport').val();
 	   var dt_boc         =  $('#dt_boc-outport').val();
       var status         =  $('#status-outport').val();
       var purch_order_no =  $('#purch_order_no-outport').val();
       var color          =  $('.colsel-outport').val();
	   var vessels        =  $('.vessels-outport').val();
       var color_select   =  $('#color-select-outport').val();
       var origin     =  $('.origin-outport').val();
       var origcity   =  $('.origcity-outport').val();

        		$.ajax({
			  		method: "POST",
					url: link + "/Job/jobfile_add/",
					beforeSend: function() {
					 	  dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Jobfile',
				   			});
 					  },
			  		data: {
			  			    //from jobfile tab
			  			    monitoring_type:monitoring_type,
			  			    jbfl 		   :jbfl,
			  			    shipper        :shipper,
			  			    consignee      :consignee,
			  			    mbl		       :mbl,
			  			    mbl2		   :mbl2,
			  			    hbl			   :hbl,
			  			    bank		   :bank,
			  			    registry	   :registry,
			  			    dtRcvd         :dtRcvd,
			  			    dt_pickup_obl  :dt_pickup_obl,
			  			    dt_pickup_docs :dt_pickup_docs,
			  			    broker         :broker,
			  			    dt_req_budget  :dt_req_budget,
			  			    ref_due_dt     :ref_due_dt,
			  			    status		   :status,
			  			    dt_boc 		   :dt_boc,
			  			    purch_order_no :purch_order_no,
			  			    color          :color,
			  			    color_select   :color_select,
			  			    origin   	   :origin,
			  			    origcity       :origcity
			  		}
				})
			    .done(function(data) {
	  						$.alert({
	  							backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content: 'New JobFile Added!',
				        		confirm: function(){
				        			$('.pp').html(data);
				        			$('#btn-vessel-outport-add').addClass('active');
									$('#btn-jobfile-outport-add').removeClass('active');
									$('#btn-truck-outport-add').removeClass('active');
									$('#btn-charges-outport-add').removeClass('active');
									$('#btn-container-outport-add').removeClass('active');
									$('.pill-jobfile-outport-add').addClass('hidden');
									$('.pill-truck-outport-add').addClass('hidden');
									$('.pill-charges-outport-add').addClass('hidden');
									$('.pill-container-outport-add').addClass('hidden');
									$('.pill-vessel-outport-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next-outport').removeClass('hidden');
									$('.btn-Next-outport').removeAttr('disabled');
									$('.btn-Back-outport').removeClass('hidden');
									dia.close();
				        	    }
				   			 });
	    		    })
			     .fail(function(data) {
	  							 $.alert({
	  							backgroundDismiss: false,
				        		title: 'Error!',
				        		content: 'There is a problem in adding data ,please try another data or reload the page!',
				        		confirm: function(){
				        			 window.location.hash="#outport";
									location.reload();
				        	    }
				   			   });
	  							 suc = 0;
	    		    });







 }

 function insert_vessels_outport(){

 				dia_vessels =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Vessel(s)',
				   	});
 	   var jbfl   = $('.jobfiles-outport').val();
       var table = $("#tableAddVessel-outport table tbody");
         var t3  = $("#tableAddVessel-outport table tbody tr").length;
		 table.find('tr').each(function (count1) {
	     var c3 = count1+1;
			var $tds = $(this).find('td'),
			vessel 	= $tds.eq(0).text(),
		    edt 	= $tds.eq(1).text();
		    eat     = $tds.eq(2).text();
		    abt    	= $tds.eq(3).text();
		    vdt    	= $tds.eq(4).text();
		    aat     = $tds.eq(5).text();
		    lines   = $tds.eq(6).text();
		       $.ajax({
			  		method: "POST",
					url: link + "/Job/vessel/",
			  		data: {
			  			    //from jobfile tab
			  			    jbfl           :jbfl,
			  			    vessel 		   :vessel,
			  			    abt		       :abt,
			  			    vdt		       :vdt,
			  			    edt            :edt,
			  		        eat            :eat,
			  		        aat            :aat,
			  			    lines		   :lines
			  		}
				})
			    .done(function(data) {
			    	       if(t3==c3){
	  						$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'New Vessel Added!',
				        		confirm: function(){
				        			$('#btn-container-outport-add').addClass('active');
									$('#btn-jobfile-outport-add').removeClass('active');
									$('#btn-truck-outport-add').removeClass('active');
									$('#btn-charges-outport-add').removeClass('active');
									$('#btn-vessel-outport-add').removeClass('active');
									$('.pill-jobfile-outport-add').addClass('hidden');
									$('.pill-vessel-outport-add').addClass('hidden');
									$('.pill-truck-outport-add').addClass('hidden');
									$('.pill-charges-outport-add').addClass('hidden');
									$('.pill-container-outport-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next-outport').removeClass('hidden');
									$('.btn-Next-outport').removeAttr('disabled');
									$('.btn-Back-outport').removeClass('hidden');
									dia_vessels.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });		    
 }

function ins_contains_outport(add_comodity){
	   var jbfl       = $('.jobfiles-outport').val();
			var loadingText;
			if(add_comodity == 1){
				loadingText = "Currently Adding Container and Commodity";
			}
			else{
				loadingText = "Currently Adding Container"
			}
			dia_containers = $.dialog({
					 	  	    icon: 'fa fa-spinner fa-pulse',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: loadingText,
				   			});
		    var table = $("#tableAddContainer-outport table tbody");
		    var ct    = $("#tableAddContainer-outport table tbody tr").length;
		    table.find('tr').each(function (count1) {
			  var c = count1+1;

				        var $tds = $(this).find('td'),
				            vessel_voyage 	= $tds.eq(0).text(),
							containerId 	= $tds.eq(1).text(),
							consize 	   	= $tds.eq(2).text();
							cartons_no  	= $tds.eq(3).text(); 
							trucker_plate   = $tds.eq(4).text(); 
							trucker_id   	= $tds.eq(5).text();
							trucker_name   	= $tds.eq(6).text();
							ref_entry_no    = $tds.eq(7).text();
							start_demorage  = $tds.eq(8).text(); 
							start_storage 	= $tds.eq(9).text();
							dt_paid		    = $tds.eq(10).text();
							lodging    	    = $tds.eq(11).text();
							dt_pre_assess   = $tds.eq(12).text(); 
							dt_final_assess = $tds.eq(13).text(); 
							adw             = $tds.eq(14).text(); 
							tdt    		    = $tds.eq(15).text(); 
							pul_out_port    = $tds.eq(16).text();  
							dt_file_entry_boc = $tds.eq(17).text(); 
							dtboc             = $tds.eq(18).text();
							dt_recvd_cont_whse     = $tds.eq(19).text();

				         	/*alert(trucker_id);*/
  	
			$.ajax({
			  		method: "POST",
					url: link + "/Job/container/",
			  		data: {
			  				//from container tab
			  				jbfl           :jbfl,
			  				vessel_voyage  :vessel_voyage,
			  			    containerId    :containerId,
			  			    consize  	   :consize, 
			  			    cartons_no	   :cartons_no,
			  			    trucker_plate  :trucker_plate,
			  			    trucker_name   :trucker_name,
			  			    trucker_id	   :trucker_id,
			  			    ref_entry_no   :ref_entry_no,
			  			    start_storage  :start_storage,
			  			    start_demorage :start_demorage,
			  			    dt_paid        :dt_paid,
			  			    lodging        :lodging,				
			  			    dt_pre_assess  :dt_pre_assess,
			  			    dt_file_entry_boc :dt_file_entry_boc,
			  			    dt_final_assess:dt_final_assess,
			  			   /* gip            :gip,
			  			    gop            :gop,*/
			  			    adw            :adw,
			  			    dtboc		   :dtboc,
			  			    tdt            :tdt,
			  			    pul_out_port   :pul_out_port,
			  			    dt_recvd_cont_whse:dt_recvd_cont_whse
			  		
			  		}
				})
				 .done(function() {	
				 	  if(add_comodity==1){
			           	var container="container";
			    		 if(c<=ct){
			    		 ins_descriptions_outport(c,ct,container);
				        }
			          }		
			        if(add_comodity!=1){ 
			            if(c==ct){	
			    	 	  	 $.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content: 'New Container Added!',
				        		confirm: function(){
				        		    $('#btn-charges-outport-add').addClass('active');
									$('#btn-jobfile-outport-add').removeClass('active');
									$('#btn-container-outport-add').removeClass('active');
									$('#btn-truck-outport-add').removeClass('active');
									$('#btn-vessel-outport-add').removeClass('active');
									$('.test_data').removeClass('hidden');
									$('.pill-jobfile-outport-add').addClass('hidden');
									$('.pill-truck-outport-add').addClass('hidden');
									$('.pill-charges-outport-add').removeClass('hidden');
									$('.pill-container-outport-add').addClass('hidden');
									$('.pill-vessel-outport-add').addClass('hidden');
									$('.btn-Next-outport').addClass('hidden');
									$('.btn-Next-outport').removeAttr('disabled');
									$('.btn-Back-outport').removeClass('hidden');
									dia_containers.close();
				        	    }
				   			  }); 
			    	 	}
			        }
	    		  });
		     });
}

function ins_descriptions_outport(c,ct,container){
		        var table = $("#tableAddTruck-outport table tbody");
			    var ct2   = $("#tableAddTruck-outport table tbody tr").length;
			      var jbfl       = $('.jobfiles-outport').val();	 
 				table.find('tr').each(function (count1) {		 			  
  				var c2 = count1+1;
 
 	/*			if(c<=ct){	*/
   				if(c2<=ct2){
				          var $tds		   = $(this).find('td'),
						     product_name  = $tds.eq(0).text(),
						     prod_orderno  = $tds.eq(1).text();  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 
			/*alert(jbfl + " " +  con_id);*/

			/*

HINDI N PASOK UNG COMMODITY SA OUTPORT
LOOK MO QUERY MO
PERO WAG KA MAG ALALA AYOS NA.

				  function select_productcontainer($cont){
				    $query = $this->db->query("Select ContainerByCarrierId from ContainerByCarrier
				    where ContainerByCarrierId='$cont'  ORDER BY ContainerByCarrierId desc limit 1");
				    return $query->result();
					 }
					 
			*/
	        	$.ajax({
			  		method: "POST",
					url: link + "/Job/comodity/",
					data: {
			  				//from comodity tab
			  			    product_name   :product_name,
			  			    prod_orderno   :prod_orderno, 
			  			    con_id	   	   :con_id,
			  			    jbfl           :jbfl
		
			  		}
				})
			    .done(function(data) {
			    	          if(container!=''){
			    	          	var message = "New Commodity and Container Added!";
			    	          }else{
			    	          	var message = "New Commodity Added!";
			    	          }
			    	           if(c==ct){	
			    	             if(c2==ct2){
			  						  $.alert({
			  						  	backgroundDismiss: false, 	
						        		title: 'Success!',
						        		content: message,
						        		confirm: function(){
						        		    $('#btn-charges-outport-add').addClass('active');
											$('#btn-jobfile-outport-add').removeClass('active');
											$('#btn-container-outport-add').removeClass('active');
											$('#btn-truck-outport-add').removeClass('active');
											$('#btn-vessel-outport-add').removeClass('active');
											$('.test_data').removeClass('hidden');
											$('.pill-jobfile-outport-add').addClass('hidden');
											$('.pill-truck-outport-add').addClass('hidden');
											$('.pill-charges-outport-add').removeClass('hidden');
											$('.pill-container-outport-add').addClass('hidden');
											$('.pill-vessel-outport-add').addClass('hidden');
											$('.btn-Next-outport').addClass('hidden');
											$('.btn-Next-outport').removeAttr('disabled');
											$('.btn-Back-outport').removeClass('hidden');
						        	    }
						   			  });
						   		dia_containers.close();
						   	   }
						   	  }
	    		    });
				 }
				 //} 	    
				});


}



$('.save_charges-outport').click(function(){
	        //for running charges

	    var jbfl       = $('.jobfiles-outport').val();
	  
	        //for running charges
	   var get_lodge 		 	  = $('#lodge-outport').val();
	   var get_cont_deposit  	  =  $('#cont-deposit-outport').val();
	   var get_thc_charges    	  =  $('#thc-charges-outport').val();
       var get_arrastre       	  =  $('#arrastre-outport').val();
       var get_wharfage 	  	  =  $('#wharfage-outport').val();
       var get_weight         	  =  $('#weight-outport').val();
	   var get_del       	  	  =  $('#del-outport').val();
       var get_dispatch  	  	  =  $('#dispatch-outport').val();
       var get_storage 	 	  	  =  $('#storage-outport').val();
       var get_demurrage      	  =  $('#demurrage-outport').val();
	   var get_detention      	  =  $('#detention-outport').val();
       var get_eic  	  	  	  =  $('#EIC-outport').val();
       var get_bai_app 	 	  	  =  $('#bai-app-outport').val();
       var get_bai_inspect    	  =  $('#bai-inspect-outport').val();
	   var get_sra_app       	  =  $('#sra-app-outport').val();
       var get_sra_inspect    	  =  $('#sra-inspect-outport').val();
       var get_bad_cargo 	  	  =  $('#bad-cargo-outport').val();
       var get_bpi    	  =  $('#bpi-outport').val();
       var get_reefer 	  	  =  $('#reefer-outport').val();
     /*  var get_all_charges    	  =  $('#all-charges-outport').val();
	   var get_part_charges   	  =  $('#part-charges-outport').val();*/

	  
       var lodge 	 	  =  get_lodge.replace(/,/g,'');
 	   var cont_deposit   =  get_cont_deposit.replace(/,/g,'');
       var thc_charges    =  get_thc_charges.replace(/,/g,'');
       var arrastre       =  get_arrastre.replace(/,/g,'');
       var wharfage 	  =  get_wharfage.replace(/,/g,'');
       var weight         =  get_weight.replace(/,/g,'');
	   var del       	  =  get_del.replace(/,/g,'');
       var dispatch  	  =	 get_dispatch.replace(/,/g,'');
       var storage 	 	  =  get_storage.replace(/,/g,'');
       var demurrage      =  get_demurrage.replace(/,/g,'');
	   var detention      =  get_detention.replace(/,/g,'');
       var eic  	  	  =  get_eic.replace(/,/g,'');
       var bai_app 	 	  =  get_bai_app.replace(/,/g,'');
       var bai_inspect    =  get_bai_inspect.replace(/,/g,'');
	   var sra_app        =  get_sra_app.replace(/,/g,'');
       var sra_inspect    =  get_sra_inspect.replace(/,/g,'');
       var bad_cargo 	  =  get_bad_cargo.replace(/,/g,'');
        var bpi    =  get_bpi.replace(/,/g,'');
       var reefer 	  =  get_reefer.replace(/,/g,'');
      /* var all_charges    =  get_all_charges;
	   var part_charges   =  get_part_charges;*/

	    var totalCharges = [lodge,cont_deposit,thc_charges,arrastre,wharfage,weight,del,dispatch,storage,demurrage,detention,eic,bai_app,bai_inspect,sra_app,sra_inspect,bad_cargo,bpi,reefer];
        var wVal = 0;
		var len = totalCharges.length;
		 for($x = 0 ; $x <= len ; $x++){
		 	if(totalCharges[$x] == "" || totalCharges[$x] == 0 || totalCharges[$x] == null){
		 		wVal = wVal+1;;
		 	}
		 	//alert(totalCharges[$x]);
		 }
/*		 if(wVal == 18){
		 		$.confirm({
		 			 title: 'Add Running Charges',
		 			 content:'You have not Entered any Running Charges. Do you wish to Continue?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	window.location.hash="#outport";
  					 	location.reload();
  					 },
  					 cancel: function(){
  					 	$('.btn-save').removeAttr('disabled');
  					 }
		 		});
		 }else{*/
		 	$.ajax({
		           method: "POST",
	 		       url: link + "/Job/jobfile_add_charge/",
	 		       beforeSend: function() {
					 	  dia_running_charges =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Running Charges',
				   			});
 					  },
			  	   data: {
			  	   	           jbfl   		:jbfl,
			  	   			   lodge        :lodge,
			                   cont_deposit :cont_deposit,   
			                   thc_charges  :thc_charges,
			                   wharfage     :wharfage,
			                   arrastre     :arrastre,
			                   weight	    :weight,
			                   del			:del,
			                   dispatch     :dispatch,
			                   storage      :storage,
			                   demurrage    :demurrage,
			                   detention    :detention,
			                   eic          :eic,
			                   bai_app      :bai_app,
			                   bai_inspect  :bai_inspect,
			                   sra_app      :sra_app,
			                   sra_inspect  :sra_inspect,
			                   bad_cargo    :bad_cargo,
			                   bpi  :bpi,
			                   reefer    :reefer

			                   /*all_charges  :all_charges,
			                   part_charges :part_charges*/
			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Added!',
				        		confirm: function(){
				        		    $('#btn-charges-outport-add').addClass('active');
									$('#btn-jobfile-outport-add').removeClass('active');
									$('#btn-container-outport-add').removeClass('active');
									$('#btn-truck-outport-add').removeClass('active');
									$('#btn-vessel-outport-add').removeClass('active');
									$('.test_data').removeClass('hidden');
									$('.pill-jobfile-outport-add').addClass('hidden');
									$('.pill-truck-outport-add').addClass('hidden');
									$('.pill-charges-outport-add').removeClass('hidden');
									$('.pill-container-outport-add').addClass('hidden');
									$('.pill-vessel-outport-add').addClass('hidden');
									$('.btn-Next-outport').addClass('hidden');
									$('.btn-Back-outport').removeClass('hidden');
									dia_running_charges.close();
									window.location.hash="#outport";
				        			location.reload();
				        	    }
				   			   });
	    		    })

		// }
	    

});  

