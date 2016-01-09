 var link = 'http://localhost/FilPortTrackingSystem';

//FOR COLOR SELECT DROPDOWN
	$('.colsel').change(function(){
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

		$(".btn-save-mnla").click(function(){
			$(this).attr('disabled','disabled');
		});

		$(".btn-cancel-mnla").click(function(){
			location.reload();
		});

		
    $('[data-toggle="tooltip"]').tooltip(); 


		if(i==0){
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
		}
		

		/*
		* Next Button
		*/

		var i=0;

		$(".btn-Next").click(function(){
			
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
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg').text("Need Reference Entry No.");
			}
			else if($('#check_jobfiles').text() == "Jobfile already exists")
			{
				$('.jobfile-msg').text("Can't Proceed Jobfile Already Exists");
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
						$('.btn-Next').attr('disabled','disabled');
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
		  					  },
		  						  cancel: function(){
		  						  	 ins_contains();
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
				}
			}
			else if(i==1){
    			insert_jobfile();
    			$(this).attr('disabled','disabled');
				/*$("#btn-vessel-mnla-add").click();*/
			}

		});


});


 function myjob(jobfile){
   jobfile = jobfile.value;
   var mon = $('.monitoring_type').val();

   			$.ajax({
			  		method: "POST",
					url: link + "/Job/check_jobfiless/",
			  		data: { jobfile:jobfile,
			  		        mon    :mon}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles').html(data);
				});

 }

       
            $(document).ready(function () {
              //called when key is pressed in textbox
              $("#cartons").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Numbers Only").show().fadeOut("slow");
                           return false;
                }
               });


                $(".num_only").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg").html("Numbers Only").show().fadeOut("slow");
                           return false;*/
                           alert('Numbers Only');
                           return false;
                }
               });
            });


	
	$(function(){
  
    
   /* $(".deleteButton").click(function(){
        $(this).closest("tr").remove();
    });*/

    $('#tableAddContainer-mnla').on('click', '.deleteButton', function() {

    	var del = $(this).closest('tr').children('td:eq(1)').text();

      	$("#tableAddTruck-mnla .containers-prod").find("option[value="+ del +"]").remove();

    	$(this).closest("tr").remove();
    	
    	/*$(".containers-prod option[value='1']").remove();*/

  		  

	});

	$('#tableAddTruck-mnla').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

	});

		$('#tableAddVessel-mnla').on('click', '.deleteButton', function() {
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
					    if($('td:nth(0)',$(this)).html()===strd) {
					       testme=true;            
					        }   
					     })
				    return testme;
				}

				

		$(".btn-Add-Container-Data-mnla").click(function(){

			var compare = $('#tableAddContainer-mnla .containerss').val();
			

			if(isExist_mnla($('#tableAddContainer-mnla .containerss').val()))
			{	
				$('.container-msg').text("Container Number Already Exists.");
			}
			else if($('#tableAddContainer-mnla .containerss').val() == ""){

				$('.container-msg').text("Need Container Number.");
			}
			else{

	       $('#tableAddContainer-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       
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
	                $('#tableAddContainer-mnla table tr:last td:nth-child(12)').html($(".lodging").val());
	                $('#tableAddContainer-mnla table tr:last td:nth-child(13)').html($(".dt_pre_assess").val());
	                 $('#tableAddContainer-mnla table tr:last td:nth-child(14)').html($(".dt_final_assess").val());
	                  $('#tableAddContainer-mnla table tr:last td:nth-child(15)').html($(".gtinport").val());
	                   $('#tableAddContainer-mnla table tr:last td:nth-child(16)').html($(".gtoutport").val());
	                    $('#tableAddContainer-mnla table tr:last td:nth-child(17)').html($(".act-del-whse").val());
	                    		 $('#tableAddContainer-mnla table tr:last td:nth-child(18)').html($(".tdt").val());
	                      		 $('#tableAddContainer-mnla table tr:last td:nth-child(19)').html($(".pul_out_port").val());
	                    	 $('#tableAddContainer-mnla table tr:last td:nth-child(20)').html($(".dt_file_entry_boc").val());
	                       $('#tableAddContainer-mnla table tr:last td:nth-child(21)').html($(".dt_boc").val());
	                     $('#tableAddContainer-mnla table tr:last td:nth-child(22)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	                     $('.containers-prod').append('<option value='+ $(".containerss").val() +'>' + $(".containerss").val() + '</option>');

	        $('.container-msg').text('');
			$('.container-msg').text('');
			$('.container-size-msg').text('');
			$('.truckplate-msg').text('');
			$('.carrier-msg').text('');
			$('.tableContainer-msg').text("");



			$('#tableAddContainer-mnla .containerss').val('');
			$('#tableAddContainer-mnla .containerss-size').val('');
			$('#tableAddContainer-mnla .plate').val('');
			$('#tableAddContainer-mnla .cartons').val('');

			$('#tableAddContainer-mnla .ref_entry_no').val('');
			$('#tableAddContainer-mnla .dt_paid').val('');
			$('#tableAddContainer-mnla .dt_pre_assess').val('');
		    $('#tableAddContainer-mnla .dt_file_entry_boc').val('');
		    $('#tableAddContainer-mnla .tdt').val('');
		    $('#tableAddContainer-mnla .pul_out_port').val('');

			$('#tableAddContainer-mnla .storage').val('');
			$('#tableAddContainer-mnla .demorage').val('');
			$('#tableAddContainer-mnla .lodging').val('');
			$('#tableAddContainer-mnla .dt_final_assess').val('');
			$('#tableAddContainer-mnla .gtinport').val('');
			$('#tableAddContainer-mnla .gtoutport').val('');
			$('#tableAddContainer-mnla .act-del-whse').val('');
			$('#tableAddContainer-mnla .dt_boc').val('');
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

		$(".btn-Add-Product-Data-mnla").click(function(){

			var cont = $('#tableAddTruck-mnla .containers-prod option:selected').val();
			var prod = $('#tableAddTruck-mnla .prodname option:selected').val();

			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg').text("The Commodity is already in this Container");
			}
			else if($('#tableAddTruck-mnla .prodname').val() == "")
			{
				$('.prodname-msg').text("Need Commodity Name.");
			}else{
				$('#tableAddTruck-mnla table').append('<tr><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-mnla table tr:last td:nth-child(1)').html($(".prodname").val()).hide();
			 	$('#tableAddTruck-mnla table tr:last td:nth-child(2)').html($(".prodname option:selected").text());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(3)').html($(".containers-prod").val());
	
			       	$('#tableAddTruck-mnla table tr:last td:nth-child(4)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			
			$('#tableAddTruck-mnla .PON').val('');

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
	
	$(".btn-Add-Vessel-Data-mnla").click(function(){

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

		$('#tableAddVessel-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		
		$('#tableAddVessel-mnla table tr:last td:nth-child(1)').html($(".vessel").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(2)').html($(".edt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(3)').html($(".eat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(4)').html($(".aat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(5)').html($(".vdt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(6)').html($(".carrier").val()).hide();
	    $('#tableAddVessel-mnla table tr:last td:nth-child(7)').html($(".carrier option:selected").text());
		$('#tableAddVessel-mnla table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

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







function insert_jobfile(){
       var monitoring_type   = $('.monitoring_type').val();
	   var jbfl       = $('.jobfiles').val();
       var shipper 	  = $('.shipper').val();
       var consignee  = $('.consignee').val();
       var mbl 		  = $('.mbl').val();
       var mbl2 	  = $('.mbl2').val();
       var hbl 	 	  = $('.hbl').val(); 
       var bank       = $('.bank').val();
       var registry   = $('.registry').val(); 
       var vdt        = $('.vdt').val();
       var dtRcvd     = $('.dtRcvd').val();
       var dt_pickup_obl  = $('.dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.dt_pickup_docs').val();  
       var broker         =  $('.broker').val();
       var dt_req_budget  =  $('#dt_req_budget').val();
       var ref_due_dt     =  $('#ref_due_dt').val();
 	   var dt_boc         =  $('#dt_boc').val();
       var status         =  $('#status').val();
       var purch_order_no =  $('#purch_order_no').val();
       var color          =  $('.colsel').val();
	   var vessels        =  $('.vessels').val();
       var color_select   =  $('#color-select').val();
       var origin     =  $('.origin').val();
       var origcity   =  $('.origcity').val();

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
									location.reload();
				        	    }
				   			   });
	  							 suc = 0;
	    		    });







 }

 function insert_vessels(){

 				dia_vessels =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Vessel(s)',
				   	});
 	   var jbfl   = $('.jobfiles').val();
       var table = $("#tableAddVessel-mnla table tbody");
         var t3  = $("#tableAddVessel-mnla table tbody tr").length;
		 table.find('tr').each(function (count1) {
	     var c3 = count1+1;
			var $tds = $(this).find('td'),
			vessel 	= $tds.eq(0).text(),
		    edt 	= $tds.eq(1).text();
		    eat     = $tds.eq(2).text();
		    aat     = $tds.eq(3).text();
	        vdt    	= $tds.eq(4).text();
		    lines   = $tds.eq(5).text();
		       $.ajax({
			  		method: "POST",
					url: link + "/Job/vessel/",
			  		data: {
			  			    //from jobfile tab
			  			    jbfl           :jbfl,
			  			    vessel 		   :vessel,
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
									dia_vessels.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });		    
 }

function ins_contains(add_comodity){
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
				            lodging    	    = $tds.eq(11).text();
				            dt_pre_assess   = $tds.eq(12).text(); 
				        	dt_final_assess = $tds.eq(13).text(); 
				        	gip  		   	= $tds.eq(14).text();
				         	gop  		   	= $tds.eq(15).text(); 
				         	adw             = $tds.eq(16).text(); 
				         	tdt    		    = $tds.eq(17).text(); 
				         	pul_out_port    = $tds.eq(18).text();  
				         	dt_file_entry_boc = $tds.eq(19).text(); 
				         	dtboc             = $tds.eq(20).text();

				         	/*alert(trucker_id);*/
  	
			$.ajax({
			  		method: "POST",
					url: link + "/Job/container/",
			  		data: {
			  				//from container tab
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
			  			    gip            :gip,
			  			    gop            :gop,
			  			    adw            :adw,
			  			    dtboc		   :dtboc,
			  			    tdt            :tdt,
			  			    pul_out_port   :pul_out_port
			  		
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
 
 	/*			if(c<=ct){	*/
   				if(c2<=ct2){
				          var $tds		   = $(this).find('td'),
						     product_name  = $tds.eq(0).text(),
						     prod_orderno  = $tds.eq(1).text();  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 

	        	$.ajax({
			  		method: "POST",
					url: link + "/Job/comodity/",
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
				 //} 	    
				});


}



$('.save_charge').click(function(){
	        //for running charges

	   var jbfl       = $('.jobfiles').val();
       var lodge 		  =  $('#lodge').val();
 	   var cont_deposit   =  $('#cont-deposit').val();
       var thc_charges    =  $('#thc-charges').val();
       var arrastre       =  $('#arrastre').val();
       var wharfage 	  =  $('#wharfage').val();
       var weight         =  $('#weight').val();
	   var del       	  =  $('#del').val();
       var dispatch  	  =  $('#dispatch').val();
       var storage 	 	  =  $('#storage').val();
       var demurrage      =  $('#demurrage').val();
	   var detention      =  $('#detention').val();
       var eic  	  	  =  $('#EIC').val();
       var bai_app 	 	  =  $('#bai-app').val();
       var bai_inspect    =  $('#bai-inspect').val();
	   var sra_app        =  $('#sra-app').val();
       var sra_inspect    =  $('#sra-inspect').val();
       var bad_cargo 	  =  $('#bad-cargo').val();
       var all_charges    =  $('#all-charges').val();
	   var part_charges   =  $('#part-charges').val();

	    var totalCharges = [lodge,cont_deposit,thc_charges,arrastre,wharfage,weight,del,dispatch,storage,demurrage,detention,eic,bai_app,bai_inspect,sra_app,sra_inspect,bad_cargo];
        var wVal = 0;
		var len = totalCharges.length;
		 for($x = 0 ; $x <= len ; $x++){
		 	if(totalCharges[$x] == "" || totalCharges[$x] == 0 || totalCharges[$x] == null){
		 		wVal = wVal+1;;
		 	}
		 	//alert(totalCharges[$x]);
		 }
		 if(wVal == 18){
		 		$.confirm({
		 			 title: 'Add Running Charges',
		 			 content:'You have not Entered any Running Charges. Do you wish to Continue?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	location.reload();
  					 },
  					 cancel: function(){
  					 	$('.btn-save-mnla').removeAttr('disabled');
  					 }
		 		});
		 }else{
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
			                   all_charges  :all_charges,
			                   part_charges :part_charges
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
				        			location.reload();
				        	    }
				   			   });
	    		    })

		 }
	    

});  

