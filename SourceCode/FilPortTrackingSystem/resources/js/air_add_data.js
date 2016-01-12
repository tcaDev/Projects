 var link = 'http://localhost/FilPortTrackingSystem';

//FOR COLOR SELECT DROPDOWN
	$('.colsel-air').change(function(){
  var status = $(this).val();
  var color = $('.colsel-air option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-air').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-air').css({'background-color': color,'color': 'white'});
  	}
 });

var suc;

	$(document).ready(function(){

		$(".btn-save-air").click(function(){
			$(this).attr('disabled','disabled');
		});

		$(".btn-cancel-air").click(function(){
			location.reload();
		});

		
    $('[data-toggle="tooltip"]').tooltip(); 


		if(i==0){
			$('#btn-jobfile-air-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-air-add').removeClass('active');
			$('#btn-container-air-add').removeClass('active');
			$('#btn-truck-air-add').removeClass('active');
			$('#btn-vessel-air-add').removeClass('active');

			$('.pill-jobfile-air-add').removeClass('hidden');
			$('.pill-truck-air-add').addClass('hidden');
			$('.pill-charges-air-add').addClass('hidden');
			$('.pill-container-air-add').addClass('hidden');
			$('.pill-vessel-air-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next-air').removeClass('hidden');

			i=0;
		});

		}
		else{
			$('#btn-jobfile-air-add').click(false);
		}
		

		/*
		* Next Button
		*/

		var i=0;

		$(".btn-Next-air").click(function(){
	
			 if($('.required-fields-air .jobfiles-air').val() == "")
			{
				$('.jobfile-msg-air').text("Need Jobfile");
			}
			else if($('.required-fields-air .shipper-air').val() == "")
			{
				$('.shipper-msg-air').text("Need Shipper");
			}
			else if($('.required-fields-air .consignee-air').val() == "")
			{
				$('.consignee-msg-air').text("Need Consignee");
			}
			else if($('.hbl-air').val() == '')
			{
				$('.colsel-msg-air').text("Need House Bill of Lading No.");
			}
			else if($('#check_jobfiles-air').text() == "Jobfile is already exists in Outport")
			{
				$('.jobfile-msg-air').text("Can't Proceed Jobfile Already Exists");
			}
				else if($('#check_jobfiles-air').text() == "Jobfile is already exists in Manila")
			{
				$('.jobfile-msg-air').text("Can't Proceed Jobfile Already Exists");
			}
			else{i++;}

			/*Next Page*/

			if(i==1){
				insert_jobfile_air();
				$(this).attr('disabled','disabled');
    			
				/*$("#btn-vessel-air-add").click();*/
			}

			else if(i==2){

				if($("#tableAddVessel-air table tbody tr td").length == 0){
					$('.tableVessel-msg-air').text("Can't Proceed Need Vessel");
					i=1;
				}else{
				  $('.btn-Next').attr('disabled','disabled');
				  insert_vessels_air();
				}

			}else if(i==3){

					if($("#tableAddTruck-air table tbody tr td").length == 0){
						$('.tableGoods-msg').text("Can't Proceed Need Commodity");
						i=3;
					}else{
					    var add_comodity=1;
					    $('.btn-Next').attr('disabled','disabled');
		  		        ins_descriptions_air();
					}


				/*if($("#tableAddContainer-air table tbody tr td").length == 0){
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
		  					        	$("#btn-truck-air-add").click();
		  					        	$('#btn-truck-air-add').addClass('active');
										$('#btn-jobfile-air-add').removeClass('active');
										$('#btn-container-air-add').removeClass('active');
										$('#btn-charges-air-add').removeClass('active');
										$('#btn-vessel-air-add').removeClass('active');
										$('.pill-jobfile-air-add').addClass('hidden');
										$('.pill-truck-air-add').removeClass('hidden');
										$('.pill-charges-air-add').addClass('hidden');
										$('.pill-container-air-add').addClass('hidden');
										$('.pill-vessel-air-add').addClass('hidden');
										$('.test_data').addClass('hidden');
										$('.btn-Next').removeClass('hidden'); 
										$('.btn-Next').removeAttr('disabled');
		  					  },
		  						  cancel: function(){
		  						  	 ins_contains();
		   						 }
						});
			 		}*/
			
			}
			
		});


});



/*Function Check if Jobfile is Exist*/

 function myjob_air(jobfile){
   jobfile = jobfile.value;
   if(jobfile==''){
   	$('#check_jobfiles-air').empty();
   }else{
      /* var mon = $('.monitoring_type-air').val();*/

   			$.ajax({
			  		method: "POST",
					url: link + "/Job/check_jobfiless/",
			  		data: { jobfile:jobfile,
			  		        mon    :mon}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles-air').html(data);
				});
    }
 }

 /*Delete Row*/

 $('#tableAddVessel-air').on('click', '.deleteButton', function() {
		    var del = $(this).closest('tr').children('td:eq(0)').text();
		    $("#tableAddContainer-air .vessel-prod-air").find("option[value="+ del +"]").remove();
	    	$(this).closest("tr").remove();

		});

$('#tableAddTruck-air').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

	});

 /*Adding Vessel*/

		/*var vessel_check=false;
				function isExist2(prod,vessel){

				var table_air_2 = $("#tableAddTruck-air table tbody");

				    vessel_check=false;
				 	  table_air_2.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===vessel) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       vessel_check=true;            
					        }   
					     })
				    return vessel_check;
				}*/

		
	 $(".btn-Add-Product-Data-air").click(function(){

			/*var vessel = $('#tableAddTruck-air .vessel-prod-air option:selected').val();
			var prod = $('#tableAddTruck-air .prodname-air option:selected').val();

			if(isExist2(prod,vessel))
			{	
				$('.vessel-size-msg-air').text("The Commodity is already in this Container");
			}
			else*/ 
			if($('#tableAddTruck-air .prodname-air').val() == "")
			{
				$('.prodname-msg-air').text("Need Commodity Name.");
			}else{
				$('#tableAddTruck-air table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-air table tr:last td:nth-child(1)').html($(".prodname-air").val()).hide();
			 	$('#tableAddTruck-air table tr:last td:nth-child(2)').html($(".prodname-air option:selected").text());
			    $('#tableAddTruck-air table tr:last td:nth-child(3)').html($(".gross").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(4)').html($("#pre-assess-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(5)').html($("#final-assess-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(6)').html($("#date_paid-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(7)').html($("#boc-cleared-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(8)').html($("#target-delivery-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(9)').html($("#act-pull-naia-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(10)').html($("#date-recvd-whse-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(11)').html($(".truckname-air").val()).hide();
			    $('#tableAddTruck-air table tr:last td:nth-child(12)').html($(".truckname-air option:selected").text());
			    $('#tableAddTruck-air table tr:last td:nth-child(13)').html($(".total-storage").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(14)').html($(".addtl-per-day").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(15)').html($(".ref-entry-no-air").val());

	
			    $('#tableAddTruck-air table tr:last td:nth-child(16)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			    $("#tableAddTruck-air .gross").val('');
			    $("#tableAddTruck-air #pre-assess-air").val('');
			    $("#tableAddTruck-air #final-assess-air").val('');
			    $("#tableAddTruck-air #date_paid-air").val('');
			    $("#tableAddTruck-air #boc-cleared-air").val('');
			    $("#tableAddTruck-air #target-delivery-air").val('');
			    $("#tableAddTruck-air #act-pull-naia-air").val('');
			    $("#tableAddTruck-air #date-recvd-whse-air").val('');
			    $("#tableAddTruck-air .total-storage").val('');
			    $("#tableAddTruck-air .addtl-per-day").val('');
			    $("#tableAddTruck-air .ref-entry-no-air").val();

			    $("#tableAddTruck-air  .prodname-air option:eq(0)").attr("selected","selected");
			    $("#tableAddTruck-air  .truckname-air option:eq(0)").attr("selected","selected");
			}
				

			});

/*Function Inserting Jobfile*/

	function insert_jobfile_air(){
	   var jbfl          	 = $('.jobfiles-air').val();
	   var shipper 	  	     = $('.shipper-air').val();
       var consignee  		 = $('.consignee-air').val();
       var color          	 =  $('.colsel-air').val();
       var hbl 	 	  		 = $('.hbl-air').val();
       var mbl 		  		 = $('.mbl-air').val();
       var flight  	 		 =  $('.flight-air').val();
  	   var forwarder   		 =  $('.forwarder-air').val();
       var warehouse   	     =  $('.warehouse-air').val();
       var aircraft   		 =  $('.aircraft-air').val();
       var edtair			 =  $('.edt-air').val();
       var eatair		     =  $('.eat-air').val();
       var aatair		     =  $('.aat-air').val();
 	   var cartons		     =  $('.cartons-air').val();
 	   var bank       		 = $('.bank-air').val();
 	   var registry   		 = $('.registry-air').val(); 
       var origin_air        = $('.origin-air').val();  
       var origcity   	 	 =  $('.origcity-air').val();
       var dt_airline   	 =  $('.dtRcvd-airline-air').val();
       var dtRcvd     		 = $('.dtRcvd-air').val();
       var dt_pickup_obl  	 = $('.dt_pickup_obl-air').val(); 
 	   var dt_pickup_docs 	 = $('.dt_pickup_docs-air').val();  
       var broker         	 =  $('.broker-air').val(); 
       var purch_order_no 	 =  $('#purch_order_no-air').val();
       var dt_req_budget  	 =  $('#dt_req_budget-air').val();
       var ref_due_dt     	 =  $('#ref_due_dt-air').val();
       var color_select   	 =  $('#color-select-air').val();
       var status_air   	 =  $('#status_air').val();


        		$.ajax({
			  		method: "POST",
					url: link + "/Job_air/",
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
			  			    jbfl      	 :jbfl,
			  			    shipper  	 :shipper,
			  			    consignee    :consignee,
			  			    color        :color,
			  			    hbl          :hbl,
			  			    mbl          :mbl,
			  			    flight       :flight,
			  			    forwarder    :forwarder,
			  			    warehouse    :warehouse,
			  			    aircraft     :aircraft,
			  			    edtair       :edtair,
			  			    eatair       :eatair,
			  			    aatair       :aatair,
			  			    cartons      :cartons,
			  			   	bank         :bank, 
			  			   	registry     :registry,
			  			   	origin_air   :origin_air,
			  			   	origcity     :origcity,
			  			    dt_airline   :dt_airline,
			  			    dtRcvd       :dtRcvd,
			  			    dt_pickup_obl:dt_pickup_obl,
			  			    dt_pickup_docs:dt_pickup_docs,
			  			    broker        :broker,
			  			    purch_order_no:purch_order_no,
			  			    dt_req_budget :dt_req_budget,
			  			    ref_due_dt    :ref_due_dt,
			  			    color_select  :color_select,
			  			    status_air    :status_air  


			  		}
				})
			    .done(function(data) {
	  						$.alert({
	  							backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content: 'New JobFile Added!',
				        		confirm: function(){
				        			$('#btn-vessel-air-add').addClass('active');
									$('#btn-jobfile-air-add').removeClass('active');
									$('#btn-truck-air-add').removeClass('active');
									$('#btn-charges-air-add').removeClass('active');
									$('.pill-jobfile-air-add').addClass('hidden');
									$('.pill-truck-air-add').addClass('hidden');
									$('.pill-charges-air-add').addClass('hidden');
									$('.pill-vessel-air-add').removeClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next-air').removeClass('hidden');
									$('.btn-Next-air').removeAttr('disabled');
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
									dia.close();
				        	    }
				   			   });
	  							 suc = 0;
	    		    });
 }


/*  function insert_vessels_air(){

 				dia_vessels =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Vessel(s)',
				   	});
 	   var jbfl   = $('.jobfiles-air').val();
       var table = $("#tableAddVessel-air table tbody");
         var t3  = $("#tableAddVessel-air table tbody tr").length;
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
				        			
									$('#btn-jobfile-air-add').removeClass('active');
									$('#btn-truck-air-add').addClass('active');
									$('#btn-charges-air-add').removeClass('active');
									$('#btn-vessel-air-add').removeClass('active');
									$('.pill-jobfile-air-add').addClass('hidden');
									$('.pill-vessel-air-add').addClass('hidden');
									$('.pill-truck-air-add').removeClass('hidden');
									$('.pill-charges-air-add').addClass('hidden');
									$('.test_data-air').addClass('hidden');
									$('.btn-Next-air').removeClass('hidden');
									$('.btn-Next-air').removeAttr('disabled');
									dia_vessels.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });	



	   		    $.ajax({
			  		method: "POST",
					url: link + "/Job/get_vessel/",
			  		data: {jbfl :jbfl}
				})
			    .done(function(data) {
			    	$('.vessel-prod-air').html(data);
	    	   });	    
 }


 function ins_descriptions_air(){
  
    


}*/

