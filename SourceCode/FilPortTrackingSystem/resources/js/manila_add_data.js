

//FOR COLOR SELECT DROPDOWN
	$(document).on('change','.colsel',function(){
  var status = $(this).val();
  var color = $('.colsel option:selected').attr('data-color');
    if(status==1){
    	$('.colsel').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel').css({'background-color': color,'color': 'white'});
  	}
 });

var suc;

	$(document).ready(function(){

		$(document).on('click','.btn-save-mnla', function(){
			$(this).attr('disabled','disabled');
		});

		$(document).on('click','.btn-cancel-mnla',function(){
			 location.reload();
		});
		});

		
    $('[data-toggle="tooltip"]').tooltip(); 


		/*if(i==0){
			$('#btn-jobfile-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-vessel-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').removeClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

			i=0;
		});

		}
		else{
			$('#btn-jobfile-mnla-add').click(false);
		}*/
		

		/*
		* Next Button
		*/

		var i=0;

		var proceed = 0;

		$(document).on('click','.btn-Next',function(){
			
			// if(back==1){

			// 	/*Update Jobfile*/
			// 	update_jobfile_back();
			// 	$(this).attr('disabled','disabled');
			// 	back=0;
			// }
			//  else if(back==2){
			//  		/*Update vessel*/
			//  }
			//   else if(back==2){
			//  		Update Container
			//  }
			//   else if(back==2){
			//  		/*Update product*/
			//  }
			// else{

	/*Start*/
	/*
	-------------------------------------------------------------------------------------------------
	*/
					 if($('.required-fields .jobfiles').val() == "")
						{
							$('.jobfile-msg').text("Need Jobfile");
						}
						else if($('.required-fields .shipper').val() == "")
						{
							$('.shipper-msg').text("Need Shipper");
						}
						else if($('.required-fields .consignee').val() == "")
						{
							$('.consignee-msg').text("Need Consignee");
						}
						else if($('.reference').val() == "")
						{
							$('.reference-msg').text("Need Reference Entry No.");
						}
						else if($('#check_jobfiles').text() == "Jobfile already exists in Outport")
						{
							$('.jobfile-msg').text("Can't Proceed -Jobfile Already Exist");
						}
							else if($('#check_jobfiles').text() == "Jobfile already exists in Air")
						{
							$('.jobfile-msg').text("Can't Proceed -Jobfile Already Exists");
						}
						else if($('#check_jobfiles').text() == "Jobfile already exists in Manila")
						{
							$('.jobfile-msg').text("Can't Proceed -Jobfile Already Exists");
						}
						else{i++;}


						
							  
						/*Next Page*/
						if(i==2){
							
							if($("#tableAddVessel-mnla table tbody tr td").length == 0){
								$('.tableVessel-msg').text("Can't Proceed Need Vessel");
								i=1;
							}else{
							  $('.btn-Next').attr('disabled','disabled');
							  insert_vessels();
							}

						}else if(i==3){
							
							if($("#tableAddContainer-mnla table tbody tr td").length == 0){
								$('.tableContainer-msg').text("Can't Proceed Need Container");
								i=2;
							}else{
								/*	$('.btn-Next').attr('disabled','disabled');*/
								i=2;
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
											  					        	/*$("#btn-truck-mnla-add").click();*/ 
											  					        	$('#btn-truck-mnla-add').addClass('active');
																			$('#btn-jobfile-mnla-add').removeClass('active');
																			$('#btn-container-mnla-add').removeClass('active');
																			$('#btn-charges-mnla-add').removeClass('active');
																			$('#btn-vessel-mnla-add').removeClass('active');
																			$('.pill-jobfile-mnla-add').addClass('hidden');
																			$('.pill-truck-mnla-add').removeClass('hidden');
																			$('.pill-charges-mnla-add').addClass('hidden');
																			$('.pill-container-mnla-add').addClass('hidden');
																			$('.pill-vessel-mnla-add').addClass('hidden');
																			$('.test_data').addClass('hidden');
																			$('.btn-Next').removeClass('hidden'); 
																			$('.btn-Next').removeAttr('disabled');
																			$('.btn-Back').removeClass('hidden');
											  					  },
											  						  cancel: function(){
											  						  	 ins_contains();
											  						  	 proceed = 1;
											   						 }
															});
										     
										    },
										    cancel: function(){
										        /*$.alert('Canceled!')*/
										    }
										});	

						 		}
						
						}else if(i==4){
							
							if($("#tableAddTruck-mnla table tbody tr td").length == 0){
								$('.tableGoods-msg').text("Can't Proceed Need Commodity");
								i=3;
							}else{
						    var add_comodity=1;
						    $('.btn-Next').attr('disabled','disabled');
			  		        ins_contains(add_comodity);
			  		        proceed=2;
							}
						}
						else if(i==1){
							
			    			insert_jobfile();
			    			$(this).attr('disabled','disabled');
							/*$("#btn-vessel-mnla-add").click();*/
						}
	
	/*
	--------------------------------------------------------------------------------------------------
	*/
	/*End*/
			// }

			

		});



/*BACK Button*/

var back=0;
	 $(document).on('click','.btn-Back', function(){

	 		if(i==1){
	 			$('#btn-vessel-mnla-add').removeClass('active');
				$('#btn-jobfile-mnla-add').addClass('active');
				$('#btn-truck-mnla-add').removeClass('active');
				$('#btn-charges-mnla-add').removeClass('active');
				$('#btn-container-mnla-add').removeClass('active');
				$('.pill-jobfile-mnla-add').removeClass('hidden');
				$('.pill-truck-mnla-add').addClass('hidden');
				$('.pill-charges-mnla-add').addClass('hidden');
				$('.pill-container-mnla-add').addClass('hidden');
				$('.pill-vessel-mnla-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next').removeClass('hidden');
				$('.btn-Next').removeAttr('disabled');
				$('.btn-Back').addClass('hidden');
				
				i=0;
				back=1;

	 		}else if(i==2){
	 			$('#btn-container-mnla-add').removeClass('active');
				$('#btn-jobfile-mnla-add').removeClass('active');
				$('#btn-truck-mnla-add').removeClass('active');
				$('#btn-charges-mnla-add').removeClass('active');
				$('#btn-vessel-mnla-add').addClass('active');
				$('.pill-jobfile-mnla-add').addClass('hidden');
				$('.pill-vessel-mnla-add').removeClass('hidden');
				$('.pill-truck-mnla-add').addClass('hidden');
				$('.pill-charges-mnla-add').addClass('hidden');
				$('.pill-container-mnla-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next').removeClass('hidden');
				$('.btn-Next').removeAttr('disabled');
				$('.btn-Back').removeClass('hidden');

				i=1;
				back=2;

	 		}else if(i==3){


	 			$('#btn-truck-mnla-add').removeClass('active');
				$('#btn-jobfile-mnla-add').removeClass('active');
				$('#btn-container-mnla-add').addClass('active');
				$('#btn-charges-mnla-add').removeClass('active');
				$('#btn-vessel-mnla-add').removeClass('active');
				$('.pill-jobfile-mnla-add').addClass('hidden');
				$('.pill-truck-mnla-add').addClass('hidden');
				$('.pill-charges-mnla-add').addClass('hidden');
				$('.pill-container-mnla-add').removeClass('hidden');
				$('.pill-vessel-mnla-add').addClass('hidden');
				$('.test_data').addClass('hidden');
				$('.btn-Next').removeClass('hidden'); 
				$('.btn-Next').removeAttr('disabled');
				$('.btn-Back').removeClass('hidden');

	 			i=2;
	 			back=3;

	 		}else if(i==4){
	 			if(proceed==1){

	 				$('#btn-truck-mnla-add').removeClass('active');
					$('#btn-jobfile-mnla-add').removeClass('active');
					$('#btn-container-mnla-add').addClass('active');
					$('#btn-charges-mnla-add').removeClass('active');
					$('#btn-vessel-mnla-add').removeClass('active');
					$('.pill-jobfile-mnla-add').addClass('hidden');
					$('.pill-truck-mnla-add').addClass('hidden');
					$('.pill-charges-mnla-add').addClass('hidden');
					$('.pill-container-mnla-add').removeClass('hidden');
					$('.pill-vessel-mnla-add').addClass('hidden');
					$('.test_data').addClass('hidden');
					$('.btn-Next').removeClass('hidden'); 
					$('.btn-Next').removeAttr('disabled');
					$('.btn-Back').removeClass('hidden');

		 			i=2;
		 			back=3;

	 			}else if(proceed==2){
	 				$('#btn-truck-mnla-add').addClass('active');
					$('#btn-jobfile-mnla-add').removeClass('active');
					$('#btn-container-mnla-add').removeClass('active');
					$('#btn-charges-mnla-add').removeClass('active');
					$('#btn-vessel-mnla-add').removeClass('active');
					$('.pill-jobfile-mnla-add').addClass('hidden');
					$('.pill-truck-mnla-add').removeClass('hidden');
					$('.pill-charges-mnla-add').addClass('hidden');
					$('.pill-container-mnla-add').addClass('hidden');
					$('.pill-vessel-mnla-add').addClass('hidden');
					$('.test_data').addClass('hidden');
					$('.btn-Next').removeClass('hidden'); 
					$('.btn-Next').removeAttr('disabled');
					$('.btn-Back').removeClass('hidden');

		 			i=3;
		 			back=4;
	 			}
	 		}
	 });





 function myjob(jobfile){
   jobfile = jobfile.value;
   if(jobfile==''){
   	$('#check_jobfiles').empty();
   }else{
       var mon = $('.monitoring_type').val();

   			$.ajax({
			  		method: "POST",
					url: link + "/Job/check_jobfiless/",
					 beforeSend: function() {
							$('#check_jobfiles').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  		data: { jobfile:jobfile,
			  		        mon    :mon}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles').html(data);
				});
    }
 }

       
            $(document).ready(function () {
              //called when key is pressed in textbox
              $(document).on('keypress','#cartons',function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0  && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg").html("Numbers Only").show().fadeOut("slow");*/
                           return false;
                }

               });


 /*               $(document).on('keypress','.num_only',function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which!=110 || e.which != 8 && e.which != 0  && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg").html("Numbers Only").show().fadeOut("slow");
                           return false;*/
  
                  //         return false;
              //  }
      
              // });*/
            });


	
	$(function(){
  
    
   /* $(".deleteButton").click(function(){
        $(this).closest("tr").remove();
    });*/

    $(document).on('click', '#tableAddContainer-mnla .deleteButton', function() {

    	var del = $(this).closest('tr').children('td:eq(1)').text();

      	$("#tableAddTruck-mnla .containers-prod").find("option[value="+ del +"]").remove();

    	$(this).closest("tr").remove();
    	
    	/*$(".containers-prod option[value='1']").remove();*/

  		  

	});

	$(document).on('click', '#tableAddTruck-mnla .deleteButton', function() {

    	$(this).closest("tr").remove();

	});

		$(document).on('click', '#tableAddVessel-mnla .deleteButton', function() {
		    var del = $(this).closest('tr').children('td:eq(0)').text();
		    $("#tableAddContainer-mnla .vessel_voyage").find("option[value="+ del +"]").remove();
	    	$(this).closest("tr").remove();

		});
});
	$(document).ready(function(){
			var testme=false;
				function isExist_mnla(strd){

				var table = $("#tableAddContainer-mnla table tbody");

				    testme=false;
				 	  table.find('tr').each(function(){
					    if($('td:nth(1)',$(this)).html()===strd) {
					       testme=true;            
					        }   
					     })
				    return testme;
				}

				

		$(document).on('click','.btn-Add-Container-Data-mnla',function(){

			var compare = $('#tableAddContainer-mnla .containerss').val();
			

			if(isExist_mnla($('#tableAddContainer-mnla .containerss').val()))
			{	
				$('.container-msg').text("Container Number Already Exists.");
			}
			else if($('#tableAddContainer-mnla .containerss').val() == ""){

				$('.container-msg').text("Need Container Number.");
			}
			else{

	       $('#tableAddContainer-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       
	        $('#tableAddContainer-mnla table tr:last td:nth-child(1)').html($(".vessel_voyage option:selected").text());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(2)').html($(".containerss").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(3)').html($(".containerss-size").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(4)').html($(".cartons").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(5)').html($(".plate").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(6)').html($(".truckname").val()).hide();
	        $('#tableAddContainer-mnla table tr:last td:nth-child(7)').html($(".truckname option:selected").text());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(8)').html($(".ref_entry_no").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(9)').html($(".demorage").val()); 
	        $('#tableAddContainer-mnla table tr:last td:nth-child(10)').html($(".storage").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(11)').html($(".dt_paid").val());
	         /*$('#tableAddContainer-mnla table tr:last td:nth-child(12)').html($(".lodging").val());*/
	        $('#tableAddContainer-mnla table tr:last td:nth-child(12)').html($(".dt_pre_assess").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(13)').html($(".dt_final_assess").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(14)').html($(".gtinport").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(15)').html($(".gtoutport").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(16)').html($(".act-del-whse").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(17)').html($(".tdt").val());
	         /* $('#tableAddContainer-mnla table tr:last td:nth-child(19)').html($(".pul_out_port").val());*/
	        $('#tableAddContainer-mnla table tr:last td:nth-child(18)').html($(".dt_file_entry_boc").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(19)').html($(".dt_boc").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(20)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	         $('.containers-prod').append('<option value='+ $(".containerss").val() +'>' + $(".containerss").val() + '</option>');

	        $('.container-msg').text('');
			$('.container-msg').text('');
			$('.container-size-msg').text('');
			$('.truckplate-msg').text('');
			$('.carrier-msg').text('');
			$('.tableContainer-msg').text("");



			$('#tableAddContainer-mnla .containerss').val('');
			/*$('#tableAddContainer-mnla .containerss-size').val('');*/
			$('#tableAddContainer-mnla .plate').val('');
			/*$('#tableAddContainer-mnla .cartons').val('');*/

			/*$('#tableAddContainer-mnla .ref_entry_no').val('');
			$('#tableAddContainer-mnla .dt_paid').val('');
			$('#tableAddContainer-mnla .dt_pre_assess').val('');
		    $('#tableAddContainer-mnla .dt_file_entry_boc').val('');
		    	
		    $('#tableAddContainer-mnla .pul_out_port').val('');*/

			$('#tableAddContainer-mnla .tdt').val('');
			/*$('#tableAddContainer-mnla .storage').val('');*/
			$('#tableAddContainer-mnla .demorage').val('');
			/*$('#tableAddContainer-mnla .lodging').val('');*/
		/*	$('#tableAddContainer-mnla .dt_final_assess').val('');*/
			$('#tableAddContainer-mnla .gtinport').val('');
			$('#tableAddContainer-mnla .gtoutport').val('');
			$('#tableAddContainer-mnla .act-del-whse').val('');
			/*$('#tableAddContainer-mnla .dt_boc').val('');*/
			}

});

	
		var testme2=false;
				function isExist2(prod,cont){

				var table2 = $("#tableAddTruck-mnla table tbody");

				    testme2=false;
				 	  table2.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===cont) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       testme2=true;            
					        }   
					     })
				    return testme2;
				}

		$(document).on('click','.btn-Add-Product-Data-mnla',function(){

			var cont = $('#tableAddTruck-mnla .containers-prod option:selected').val();
			var prod = $('#tableAddTruck-mnla .prodname option:selected').val();

			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg').text("The Commodity Already Exists in this Container");
			}
			else if($('#tableAddTruck-mnla .prodname option:selected').val() == "0")
			{
				$('.prodname-msg').text("Need Commodity Name.");
			}else{
				$('#tableAddTruck-mnla table').append('<tr><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-mnla table tr:last td:nth-child(1)').html($(".prodname").val()).hide();
			 	$('#tableAddTruck-mnla table tr:last td:nth-child(2)').html($(".prodname option:selected").text());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(3)').html($(".containers-prod").val());
	
			       	$('#tableAddTruck-mnla table tr:last td:nth-child(4)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			
			/*$('#tableAddTruck-mnla .PON').val('');*/

			$('.cont-size-msg').text('');
			$('.prodname-msg').text('');
			$('.tableGoods-msg').text("");

			}
				

			});


	
	var testme3=false;
				function isExist3(strds){

				var table3 = $("#tableAddVessel-mnla table tbody");

				    testme3=false;
				 	  table3.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===strds) {
					       testme3=true;            
					        }   
					     })
				    return testme3;
				}
	
	$(document).on('click','.btn-Add-Vessel-Data-mnla',function(){

		if(isExist3($('#tableAddVessel-mnla .vessel').val()))
			{	
				$('.vessel-msg').text("Vessel Already Exists.");
			}
			else if($('#tableAddVessel-mnla .vessel').val() == "")
			{
				$('.vessel-msg').text("Need Vessel");
			}
		else if($('#tableAddVessel-mnla .carrier').val() == "0")
			{
				$('.carrier-msg').text("Need Shipping Line/Carrier.");
			}
		
		else{

		$('#tableAddVessel-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		
		$('#tableAddVessel-mnla table tr:last td:nth-child(1)').html($(".vessel").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(2)').html($(".edt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(3)').html($(".eat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(4)').html($(".abt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(5)').html($(".vdt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(6)').html($(".aat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(7)').html($(".carrier").val()).hide();
	    $('#tableAddVessel-mnla table tr:last td:nth-child(8)').html($(".carrier option:selected").text());
		$('#tableAddVessel-mnla table tr:last td:nth-child(9)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.containers-vessel').append('<option value='+ $(".vessel").val() +'>' + $(".vessel").val() + '</option>');

		//to know what is the vessel of container
		  $('.vessel_voyage').append('<option value='+ $(".vessel").val() +'>' + $(".vessel").val() + '</option>');
		//

		$('.vessel-msg').text("");
		$('.carrier-msg').text("");
		$('.tableVessel-msg').text("");

		$("#tableAddVessel-mnla  .carrier option:eq(0)").attr("selected","selected");

		$('#tableAddVessel-mnla .vessel').val('');
		$('#tableAddVessel-mnla .edt').val('');
		$('#tableAddVessel-mnla .eat').val('');
		$('#tableAddVessel-mnla .aat').val('');
		$('#tableAddVessel-mnla .vdt').val('');
		$('#tableAddVessel-mnla .abt').val('');

		}
	});
		

		$(".btn-Add-Product-Alert-mnla").click(function(){
		    	  var table = $("#tableAddTruck-mnla table tbody");

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





var Jobfile_num;

function insert_jobfile(){
       var monitoring_type   = $('.pill-jobfile-mnla-add .monitoring_type').val();
	   var jbfl       = $('.pill-jobfile-mnla-add .jobfiles').val();
       var shipper 	  = $('.pill-jobfile-mnla-add .shipper').val();
       var consignee  = $('.pill-jobfile-mnla-add .consignee').val();
       var mbl 		  = $('.pill-jobfile-mnla-add .mbl').val();
       var mbl2 	  = $('.pill-jobfile-mnla-add .mbl2').val();
       var hbl 	 	  = $('.pill-jobfile-mnla-add .hbl').val(); 
       var bank       = $('.pill-jobfile-mnla-add .bank').val();
       var registry   = $('.pill-jobfile-mnla-add .registry').val(); 
       var vdt        = $('.pill-jobfile-mnla-add .vdt').val();
       var dtRcvd     = $('.pill-jobfile-mnla-add .dtRcvd').val();
       var dt_pickup_obl  = $('.pill-jobfile-mnla-add .dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.pill-jobfile-mnla-add .dt_pickup_docs').val();  
       var broker         =  $('.pill-jobfile-mnla-add .broker').val();
       var dt_req_budget  =  $('.pill-jobfile-mnla-add #dt_req_budget').val();
       var ref_due_dt     =  $('.pill-jobfile-mnla-add #ref_due_dt').val();
 	   var dt_boc         =  $('.pill-jobfile-mnla-add #dt_boc').val();
       var status         =  $('.pill-jobfile-mnla-add #status').val();
       var purch_order_no =  $('.pill-jobfile-mnla-add #purch_order_no').val();
       var color          =  $('.pill-jobfile-mnla-add .colsel').val();
	   var vessels        =  $('.pill-jobfile-mnla-add .vessels').val();
       var color_select   =  $('.pill-jobfile-mnla-add #color-select').val();
       var origin     =  $('.pill-jobfile-mnla-add .origin').val();
       var origcity   =  $('.pill-jobfile-mnla-add .origcity').val();

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
				        			$('.job-manila').html(data);
				        			$('#btn-vessel-mnla-add').addClass('active');
									$('#btn-jobfile-mnla-add').removeClass('active');
									$('#btn-truck-mnla-add').removeClass('active');
									$('#btn-charges-mnla-add').removeClass('active');
									$('#btn-container-mnla-add').removeClass('active');
									$('.pill-jobfile-mnla-add').addClass('hidden');
									$('.pill-truck-mnla-add').addClass('hidden');
									$('.pill-charges-mnla-add').addClass('hidden');
									$('.pill-container-mnla-add').addClass('hidden');
									$('.pill-vessel-mnla-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next').removeClass('hidden');
									$('.btn-Next').removeAttr('disabled');
									$('.btn-Back').removeClass('hidden');
									dia.close();

									Jobfile_num = jbfl;
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
				        	    }
				   			   });
	  							 suc = 0;
	    		    });







 }


 function update_jobfile_back(){

	  /* var monitoring_type   = $('.pill-jobfile-mnla-add .monitoring_type').val();*/
	   var jbfl       = $('.pill-jobfile-mnla-add .jobfiles').val();
       var shipper 	  = $('.pill-jobfile-mnla-add .shipper').val();
       var consignee  = $('.pill-jobfile-mnla-add .consignee').val();
       var mbl 		  = $('.pill-jobfile-mnla-add .mbl').val();
       var mbl2 	  = $('.pill-jobfile-mnla-add .mbl2').val();
       var hbl 	 	  = $('.pill-jobfile-mnla-add .hbl').val(); 
       var bank       = $('.pill-jobfile-mnla-add .bank').val();
       var registry   = $('.pill-jobfile-mnla-add .registry').val(); 
       var dtRcvd     = $('.pill-jobfile-mnla-add .dtRcvd').val();
       var dt_pickup_obl  = $('.pill-jobfile-mnla-add .dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.pill-jobfile-mnla-add .dt_pickup_docs').val();  
       var broker         =  $('.pill-jobfile-mnla-add .broker').val();
       var dt_req_budget  =  $('.pill-jobfile-mnla-add #dt_req_budget').val();
       var ref_due_dt     =  $('.pill-jobfile-mnla-add #ref_due_dt').val();
 	   var dt_boc         =  $('.pill-jobfile-mnla-add #dt_boc').val();
     /*  var status         =  $('.pill-jobfile-mnla-add #status').val();*/
       var purch_order_no =  $('.pill-jobfile-mnla-add #purch_order_no').val();
       var color          =  $('.pill-jobfile-mnla-add .colsel').val();
       var color_select   =  $('.pill-jobfile-mnla-add #color-select').val();
       var origin     =  $('.pill-jobfile-mnla-add .origin').val();
       var origcity   =  $('.pill-jobfile-mnla-add .origcity').val();   
 

 		alert(Jobfile_num);
/*alert(jbid);*/
		 	$.ajax({
		           method: "POST",
	 		       url:  link + "/Job_manila_update/jobfile_update/",
	 		       beforeSend: function() {
					 	  dia_jobfile =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Jobfile',
				   			});
 					  },
			  	   data: {
			  	   			   jbid 		   		:Jobfile_num,
			  	   	           jbfl   		   		:jbfl,
			  	   			   shipper         		:shipper,
			                   consignee       		:consignee,   
			                   colsel  		   		:color,
			                   hbfl       	   		:hbl,
			                   mbl     		   		:mbl,
			                   mbl2	           		:mbl2,
			                   bank		       		:bank,
			                   reg             		:registry,
			                   country         		:origin,
			                   city           		:origcity,
			                   dtRcvd_arr_client    :dtRcvd,
			                   dtPckup_obl          :dt_pickup_obl,
			                   dt_pickup_docs       :dt_pickup_docs,
			                   broker               :broker,
			                   purch_order_no       :purch_order_no,
			                   dtReq_budge_gl       :dt_req_budget,
			                   ref_due_dt           :ref_due_dt,
			                   color_selectivity    :color_select

			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Jobfile is Updated',
				        		confirm: function(){

				        			$('.job-manila').html(data);
				        			$('#btn-vessel-mnla-add').addClass('active');
									$('#btn-jobfile-mnla-add').removeClass('active');
									$('#btn-truck-mnla-add').removeClass('active');
									$('#btn-charges-mnla-add').removeClass('active');
									$('#btn-container-mnla-add').removeClass('active');
									$('.pill-jobfile-mnla-add').addClass('hidden');
									$('.pill-truck-mnla-add').addClass('hidden');
									$('.pill-charges-mnla-add').addClass('hidden');
									$('.pill-container-mnla-add').addClass('hidden');
									$('.pill-vessel-mnla-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next').removeClass('hidden');
									$('.btn-Next').removeAttr('disabled');
									$('.btn-Back').removeClass('hidden');						
									dia_jobfile.close();
				        	    }
				   			   });
	    		    })


 
 
 

 
}

 function insert_vessels(){

 				dia_vessels =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Vessel(s)',
				   	});
 	     var jbfl       = $('.pill-jobfile-mnla-add .jobfiles').val();
       var table = $("#tableAddVessel-mnla table tbody");
         var t3  = $("#tableAddVessel-mnla table tbody tr").length;
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
			  			    vdt		       :vdt,
			  			    abt		       :abt,
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
				        			$('#btn-container-mnla-add').addClass('active');
									$('#btn-jobfile-mnla-add').removeClass('active');
									$('#btn-truck-mnla-add').removeClass('active');
									$('#btn-charges-mnla-add').removeClass('active');
									$('#btn-vessel-mnla-add').removeClass('active');
									$('.pill-jobfile-mnla-add').addClass('hidden');
									$('.pill-vessel-mnla-add').addClass('hidden');
									$('.pill-truck-mnla-add').addClass('hidden');
									$('.pill-charges-mnla-add').addClass('hidden');
									$('.pill-container-mnla-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next').removeClass('hidden');
									$('.btn-Next').removeAttr('disabled');
									$('.btn-Back').removeClass('hidden');
									dia_vessels.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });		    
 }

function ins_contains(add_comodity){
	   var jbfl       = $('.pill-jobfile-mnla-add .jobfiles').val();
			var loadingText;
			if(add_comodity == 1){
				loadingText = "Currently Adding Container and Commodity";
			}
			else{
				loadingText = "Currently Adding Container"
			}
			dia_containers = $.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: loadingText,
				   			});
		    var table = $("#tableAddContainer-mnla table tbody");
		    var ct    = $("#tableAddContainer-mnla table tbody tr").length;
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
				           /* lodging    	    = $tds.eq(11).text();*/
				            dt_pre_assess   = $tds.eq(11).text(); 
				        	dt_final_assess = $tds.eq(12).text(); 
				        	gip  		   	= $tds.eq(13).text();
				         	gop  		   	= $tds.eq(14).text(); 
				         	adw             = $tds.eq(15).text(); 
				         	tdt    		    = $tds.eq(16).text(); 
				        /* 	pul_out_port    = $tds.eq(18).text();  */
				         	dt_file_entry_boc = $tds.eq(17).text(); 
				         	dtboc             = $tds.eq(18).text();

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
			  			   /* lodging        :lodging,*/				
			  			    dt_pre_assess  :dt_pre_assess,
			  			    dt_file_entry_boc :dt_file_entry_boc,
			  			    dt_final_assess:dt_final_assess,
			  			    gip            :gip,
			  			    gop            :gop,
			  			    adw            :adw,
			  			    dtboc		   :dtboc,
			  			    tdt            :tdt,
			  			/*    pul_out_port   :pul_out_port*/
			  		
			  		}
				})
				 .done(function() {	
				 	  if(add_comodity==1){
			           	var container="container";
			    		 if(c<=ct){
			    		 ins_descriptions(c,ct,container);
				        }
			          }		
			        if(add_comodity!=1){ 
			            if(c==ct){	
			    	 	  	 $.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content: 'New Container Added!',
				        		confirm: function(){
				        		    $('#btn-charges-mnla-add').addClass('active');
									$('#btn-jobfile-mnla-add').removeClass('active');
									$('#btn-container-mnla-add').removeClass('active');
									$('#btn-truck-mnla-add').removeClass('active');
									$('#btn-vessel-mnla-add').removeClass('active');
									$('.test_data').removeClass('hidden');
									$('.pill-jobfile-mnla-add').addClass('hidden');
									$('.pill-truck-mnla-add').addClass('hidden');
									$('.pill-charges-mnla-add').removeClass('hidden');
									$('.pill-container-mnla-add').addClass('hidden');
									$('.pill-vessel-mnla-add').addClass('hidden');
									$('.btn-Next').addClass('hidden');
									$('.btn-Next').removeAttr('disabled');
									dia_containers.close();
				        	    }
				   			  }); 
			    	 	}
			        }
	    		  });
		     });
}

function ins_descriptions(c,ct,container){
		        var table = $("#tableAddTruck-mnla table tbody");
			    var ct2   = $("#tableAddTruck-mnla table tbody tr").length;
			    	 
 				table.find('tr').each(function (count1) {		 			  
  				var c2 = count1+1;
 
 				if(c<=ct){	
   				if(c2<=ct2){

				          var $tds		   = $(this).find('td'),
						     product_name  = $tds.eq(0).text(),
						     prod_orderno  = $tds.eq(1).text();  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 

	        	$.ajax({
			  		method: "POST",
					url: link + "/Job/comodity_manila/",
					data: {
			  				//from comodity tab
			  			    product_name   :product_name,
			  			    prod_orderno   :prod_orderno, 
			  			    con_id	   	   :con_id

		
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
						        		    $('#btn-charges-mnla-add').addClass('active');
											$('#btn-jobfile-mnla-add').removeClass('active');
											$('#btn-container-mnla-add').removeClass('active');
											$('#btn-truck-mnla-add').removeClass('active');
											$('#btn-vessel-mnla-add').removeClass('active');
											$('.test_data').removeClass('hidden');
											$('.pill-jobfile-mnla-add').addClass('hidden');
											$('.pill-truck-mnla-add').addClass('hidden');
											$('.pill-charges-mnla-add').removeClass('hidden');
											$('.pill-container-mnla-add').addClass('hidden');
											$('.pill-vessel-mnla-add').addClass('hidden');
											$('.btn-Next').addClass('hidden');
											$('.btn-Next').removeAttr('disabled');
						        	    }
						   			  });
						   		dia_containers.close();
						   	   }
						   	  }
	    		    });
				 }
				 } 	    
				});


}



$(document).on('click','.save_charge',function(){

	  var jbfl       = $('.jobfiles').val();
	  
	        //for running charges
	   var get_lodge 		 	  = $('#lodge').val();
	   var get_cont_deposit  	  =  $('#cont-deposit').val();
	   var get_thc_charges    	  =  $('#thc-charges').val();
       var get_arrastre       	  =  $('#arrastre').val();
       var get_wharfage 	  	  =  $('#wharfage').val();
       var get_weight         	  =  $('#weight').val();
	   var get_del       	  	  =  $('#del').val();
       var get_dispatch  	  	  =  $('#dispatch').val();
       var get_storage 	 	  	  =  $('#storage').val();
       var get_demurrage      	  =  $('#demurrage').val();
	   var get_detention      	  =  $('#detention').val();
       var get_eic  	  	  	  =  $('#EIC').val();
       var get_bai_app 	 	  	  =  $('#bai-app').val();
       var get_bai_inspect    	  =  $('#bai-inspect').val();
	   var get_sra_app       	  =  $('#sra-app').val();
       var get_sra_inspect    	  =  $('#sra-inspect').val();
       var get_bad_cargo 	  	  =  $('#bad-cargo').val();
        var get_bpi    	  =  $('#bpi').val();
       var get_reefer 	  	  =  $('#reefer').val();
      

	  
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
		 			 closeIcon:false,
		 			 content:'You have not Entered any Running Charges. Do you wish to Continue?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	 
  					 },
  					 cancel: function(){
  					 	$('.btn-save-mnla').removeAttr('disabled');
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
			  	   			   check        :1,
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
			                   bpi 			:bpi,
			                   reefer       :reefer
			                   /*all_charges  :all_charges,*/
			                   /*part_charges :part_charges*/
			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Added!',
				        		confirm: function(){
				        		    $('#btn-charges-mnla-add').addClass('active');
									$('#btn-jobfile-mnla-add').removeClass('active');
									$('#btn-container-mnla-add').removeClass('active');
									$('#btn-truck-mnla-add').removeClass('active');
									$('#btn-vessel-mnla-add').removeClass('active');
									$('.test_data').removeClass('hidden');
									$('.pill-jobfile-mnla-add').addClass('hidden');
									$('.pill-truck-mnla-add').addClass('hidden');
									$('.pill-charges-mnla-add').removeClass('hidden');
									$('.pill-container-mnla-add').addClass('hidden');
									$('.pill-vessel-mnla-add').addClass('hidden');
									$('.btn-Next').addClass('hidden');
									dia_running_charges.close();

									$('#myModal-1-2').modal('hide');
									location.reload();
									
				        			 
				        	    }
				   			   });
	    		    })

		// }
	    

});  


/*setInterval(refresh_table, 3000);

function refresh_table(update_total) {
	var h = 1;
	var manila = $('.manila_total').val();
    var manila_new = $('.manila_total_new').val();
  
    var  current_new =  parseInt(manila_new) -  parseInt(manila);


 		 	$.ajax({
		           method: "GET",
	 		       url: link + "/Job_availability/check_content",
	 		       data:{total : manila,
	 		       	   	 		montype:1
	 		            }

	              })
 		 		  .done(function(data) {
 		 		  
 		 		  
					if(data!=h){
					    alert(current_new);
					}

	    		})

 	h=0;	 	
}*/


