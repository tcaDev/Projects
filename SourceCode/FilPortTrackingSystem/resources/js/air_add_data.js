

//FOR COLOR SELECT DROPDOWN
	$(document).on('change','.required-fields-air .colsel-air',function(){
  var status = $(this).val();
  var color = $('.required-fields-air .colsel-air option:selected').attr('data-color');
    if(status==1){
    	$('.required-fields-air .colsel-air').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.required-fields-air .colsel-air').css({'background-color': color,'color': 'white'});
  	}
 });

var suc;

	$(document).ready(function(){

		$(".btn-save-air").click(function(){
			$(this).attr('disabled','disabled');
			air_add_charges();

		});

		$(".btn-cancel-air").click(function(){
			window.location.hash="#air";
			location.reload();
		});

		});
    $('[data-toggle="tooltip"]').tooltip(); 


		/*if(i==0){
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
		}*/
		

		/*
		* Next Button
		*/

		var i=0;

		$(document).on('click','.btn-Next-air',function(){
	

/*Start*/
/*
--------------------------------------------------------------------------------------------------------------------
*/
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
			else if($('.required-fields-air #check_jobfiles-air').text() == "Jobfile is already exists in Outport")
			{
				$('.jobfile-msg-air').text("Can't Proceed Jobfile Already Exists");
			}
				else if($('.required-fields-air #check_jobfiles-air').text() == "Jobfile is already exists in Manila")
			{
				$('.jobfile-msg-air').text("Can't Proceed Jobfile Already Exists");
			}

			else if($('.required-fields-air #check_jobfiles-air').text() == "Jobfile Already Exists in Air")
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

				if($("#tableAddTruck-air table tbody tr td").length == 0){
					$('.tableGoods-msg-air').text("Can't Proceed Need Vessel");
					i=1;
				}else{
				  $(this).attr('disabled','disabled');
				  ins_descriptions_air();
				}

			}
		
/*
--------------------------------------------------------------------------------------------------------------------------------
*/		
/*End*/			
		});

/*BAck Button*/

var back=0;
	 $(document).on('click','.btn-Back-air', function(){

	 	if(i==1){

	 		$('#btn-jobfile-air-add').addClass('active');
			$('#btn-truck-air-add').removeClass('active');
			$('#btn-charges-air-add').removeClass('active');
			$('.pill-jobfile-air-add').removeClass('hidden');
			$('.pill-truck-air-add').addClass('hidden');
			$('.pill-charges-air-add').addClass('hidden');
			$('.test_data').addClass('hidden');
			$('.btn-Next-air').removeClass('hidden');
			$('.btn-Next-air').removeAttr('disabled');
			$('.btn-Back-air').addClass('hidden');

			i=0;
			back=1;
	 	}else if(i==2){

	 		$('#btn-jobfile-air-add').removeClass('active');
			$('#btn-truck-air-add').addClass('active');
			$('#btn-charges-air-add').removeClass('active');
			$('.pill-jobfile-air-add').addClass('hidden');
			$('.pill-truck-air-add').removeClass('hidden');
			$('.pill-charges-air-add').addClass('hidden');
			$('.test_data').addClass('hidden');
			$('.btn-Next-air').removeClass('hidden');
			$('.btn-Next-air').removeAttr('disabled');
			$('.btn-Back-air').removeClass('hidden');

			i=1;
			back=2;
	 	}

	 });





 /*Delete Row*/

 $(document).on('click', '#tableAddVessel-air .deleteButton', function() {
		    var del = $(this).closest('tr').children('td:eq(0)').text();
		    $("#tableAddContainer-air .vessel-prod-air").find("option[value="+ del +"]").remove();
	    	$(this).closest("tr").remove();

		});

$(document).on('click', '#tableAddTruck-air .deleteButton', function() {

    	$(this).closest("tr").remove();

	});



		
	 $(document).on('click','.btn-Add-Product-Data-air', function(){

			if($('#tableAddTruck-air .prodname-air option:selected').val() == "0")
			{
				$('#tableAddTruck-air .prodname-msg-air').text("Need Commodity Name.");
			}else{
				$('#tableAddTruck-air table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-air table tr:last td:nth-child(1)').html($("#tableAddTruck-air .prodname-air").val()).hide();
			 	$('#tableAddTruck-air table tr:last td:nth-child(2)').html($("#tableAddTruck-air .prodname-air option:selected").text());
			    $('#tableAddTruck-air table tr:last td:nth-child(3)').html($("#tableAddTruck-air .gross").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(4)').html($("#tableAddTruck-air #pre-assess-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(5)').html($("#tableAddTruck-air #final-assess-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(6)').html($("#tableAddTruck-air #date_paid-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(7)').html($("#tableAddTruck-air #boc-cleared-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(8)').html($("#tableAddTruck-air #target-delivery-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(9)').html($("#tableAddTruck-air #act-pull-naia-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(10)').html($("#tableAddTruck-air #date-recvd-whse-air").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(11)').html($("#tableAddTruck-air .truckname-air").val()).hide();
			    $('#tableAddTruck-air table tr:last td:nth-child(12)').html($("#tableAddTruck-air .truckname-air option:selected").text());
			    $('#tableAddTruck-air table tr:last td:nth-child(13)').html($("#tableAddTruck-air .total-storage").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(14)').html($("#tableAddTruck-air .addtl-per-day").val());
			    $('#tableAddTruck-air table tr:last td:nth-child(15)').html($("#tableAddTruck-air .ref-entry-no-air").val());

	
			    $('#tableAddTruck-air table tr:last td:nth-child(16)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			

			    $('#tableAddTruck-air .prodname-msg-air').text("");

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
			    $("#tableAddTruck-air .ref-entry-no-air").val('');

			    $("#tableAddTruck-air  .prodname-air option:eq(0)").attr("selected","selected");
			    $("#tableAddTruck-air  .truckname-air option:eq(0)").attr("selected","selected");
			}
				

			});

/*Function Inserting Jobfile*/

	function insert_jobfile_air(){
	   var jbfl          	 = $('.pill-jobfile-air-add .jobfiles-air').val();
	   var shipper 	  	     = $('.pill-jobfile-air-add .shipper-air').val();
       var consignee  		 = $('.pill-jobfile-air-add .consignee-air').val();
       var color          	 =  $('.pill-jobfile-air-add .colsel-air').val();
       var hbl 	 	  		 = $('.pill-jobfile-air-add .hbl-air').val();
       var mbl 		  		 = $('.pill-jobfile-air-add .mbl-air').val();
       var flight  	 		 =  $('.pill-jobfile-air-add .flight-air').val();
  	   var forwarder   		 =  $('.pill-jobfile-air-add .forwarder-air').val();
       var warehouse   	     =  $('.pill-jobfile-air-add .warehouse-air').val();
       var aircraft   		 =  $('.pill-jobfile-air-add .aircraft-air').val();
       var edtair			 =  $('.pill-jobfile-air-add .edt-air').val();
       var eatair		     =  $('.pill-jobfile-air-add .eat-air').val();
       var aatair		     =  $('.pill-jobfile-air-add .aat-air').val();
 	   var cartons		     =  $('.pill-jobfile-air-add .cartons-air').val();
 	   var bank       		 = $('.pill-jobfile-air-add .bank-air').val();
 	   var registry   		 = $('.pill-jobfile-air-add .registry-air').val(); 
       var origin_air        = $('.pill-jobfile-air-add .origin-air').val();  
       var origcity   	 	 =  $('.pill-jobfile-air-add .origcity-air').val();
       var dt_airline   	 =  $('.pill-jobfile-air-add .dtRcvd-airline-air').val();
       var dtRcvd     		 = $('.pill-jobfile-air-add .dtRcvd-air').val();
       var dt_pickup_obl  	 = $('.pill-jobfile-air-add .dt_pickup_obl-air').val(); 
 	   var dt_pickup_docs 	 = $('.pill-jobfile-air-add .dt_pickup_docs-air').val();  
       var broker         	 =  $('.pill-jobfile-air-add .broker-air').val(); 
       var purch_order_no 	 =  $('.pill-jobfile-air-add #purch_order_no-air').val();
       var dt_req_budget  	 =  $('.pill-jobfile-air-add #dt_req_budget-air').val();
       var ref_due_dt     	 =  $('.pill-jobfile-air-add #ref_due_dt-air').val();
       var color_select   	 =  $('.pill-jobfile-air-add #color-select-air').val();
       var status_air   	 =  $('.pill-jobfile-air-add  #status_air').val();



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
				        		content:data,
				        		confirm: function(){
				        			
									$('#btn-jobfile-air-add').removeClass('active');
									$('#btn-truck-air-add').addClass('active');
									$('#btn-charges-air-add').removeClass('active');
									$('.pill-jobfile-air-add').addClass('hidden');
									$('.pill-truck-air-add').removeClass('hidden');
									$('.pill-charges-air-add').addClass('hidden');
									$('.test_data').addClass('hidden');
									$('.btn-Next-air').removeClass('hidden');
									$('.btn-Next-air').removeAttr('disabled');
									$('.btn-Back-air').removeClass('hidden');
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





 function ins_descriptions_air(){
     dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Commodity',
	});
 	     var jbfl      = $('.pill-jobfile-air-add .jobfiles-air').val();
 	   
       var table = $("#tableAddTruck-air table tbody");
         var t3  = $("#tableAddTruck-air table tbody tr").length;
		 table.find('tr').each(function (count1) {
	     var c3 = count1+1;
			var $tds = $(this).find('td'),
			prodname 		    = $tds.eq(0).text(),
			gross			    = $tds.eq(2).text(),
		    pre_assess_air 		= $tds.eq(3).text(),
		    final_assess_air    = $tds.eq(4).text(),
		    date_paid_air       = $tds.eq(5).text(),
	        boc_cleared_air   	= $tds.eq(6).text(),
		    target_delivery_air = $tds.eq(7).text(),  
			act_pull_naia_air 	= $tds.eq(8).text(),
			date_recvd_whse_air = $tds.eq(9).text(),
			truckname_air 		= $tds.eq(10).text(),
			total_storage 		= $tds.eq(12).text(),
		    addtl_per_day 		= $tds.eq(13).text(),
		    ref_entry_no_air    = $tds.eq(14).text()


		
		       $.ajax({
			  		method: "POST",
					url: link + "/Job_air/products/",
			  		data: {
			  			    //from jobfile tab
			  			    jbfl                        :jbfl,
			  			    prodname          		    :prodname,
			  			    gross 		  				:gross,
			  			    pre_assess_air		        :pre_assess_air,
			  			    final_assess_air            :final_assess_air,
			  		        date_paid_air          		:date_paid_air,
			  		        boc_cleared_air             :boc_cleared_air,
			  			    target_delivery_air		    :target_delivery_air,
			  			    act_pull_naia_air			:act_pull_naia_air,
			  			    date_recvd_whse_air  		:date_recvd_whse_air,
			  			    truckname_air				:truckname_air,
			  			    total_storage				:total_storage,
			  			    addtl_per_day				:addtl_per_day,
			  			    ref_entry_no_air			:ref_entry_no_air
			  		}
				})
			    .done(function(data) {
			    	       if(t3==c3){
	  						$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'New  Commodity added!',
				        		confirm: function(){
				        			
									$('#btn-jobfile-air-add').removeClass('active');
									$('#btn-truck-air-add').removeClass('active');
									$('#btn-charges-air-add').addClass('active');
									$('.pill-jobfile-air-add').addClass('hidden');								
									$('.pill-truck-air-add').addClass('hidden');
									$('.pill-charges-air-add').removeClass('hidden');
									$('.test_data-air').removeClass('hidden');
									$('.btn-Next-air').addClass('hidden');
									$('.btn-Next-air').removeAttr('disabled');
									$('.btn-Back-air').removeClass('hidden');
									dia.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });	

    


}

function air_add_charges(){
	    var jbfl      = $('.pill-jobfile-air-add .jobfiles-air').val();

       var get_lodge 		 	  =  $('.pill-charges-air-add .lodge_airs').val();
 	   var get_break_airs  	      =  $('.pill-charges-air-add .break_airs').val();
       var get_bad_cargo          =  $('.pill-charges-air-add .bad-cargo_airs').val();
       var get_storage            =  $('.pill-charges-air-add .storage_airs').val();
       var get_vrc 	  			  =  $('.pill-charges-air-add .VCRC_airs').val();
       var get_cni        		  =  $('.pill-charges-air-add .CNI_airs').val();
	   var get_cniu       		  =  $('.pill-charges-air-add .CNIU_airs').val();
	   var get_otherfee       	  =  $('.pill-charges-air-add .otherFee_airs').val();

	   var lodge 	 	  =  get_lodge.replace(/,/g,'');
 	   var break_air      =  get_break_airs.replace(/,/g,'');
       var bad_cargo      =  get_bad_cargo.replace(/,/g,'');
       var storage        =  get_storage.replace(/,/g,'');
       var vrc 	 		  =  get_vrc.replace(/,/g,'');
       var cni            =  get_cni.replace(/,/g,'');
	   var cniu       	  =  get_cniu.replace(/,/g,'');
	   var otherfee       =  get_otherfee.replace(/,/g,'');

	    var totalCharges = [lodge,break_air,bad_cargo,storage,vrc,cni,cniu,otherfee];
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
  					 	window.location.hash="#air";
  					 	location.reload();
  					 },
  					 cancel: function(){
  					 	$('.btn-save-mnla').removeAttr('disabled');
  					 }
		 		});
		 }else{*/


			       $.ajax({
			  		method: "POST",
					url: link + "/Job_air_update/jobfile_add_charge_air/",
				    beforeSend: function() {
					 	  dia_running_charges =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-pulse',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Running Charges',
				   			});
 					  },
			  		data: {
			  			    //from jobfile tab
			  	   	           jbfl   		:jbfl,
			  	   			   lodge        :lodge,
			  	   			   break_airs   :break_air,
			  	   			   bad_cargo    :bad_cargo,
			  	   			   storage      :storage,
			  	   			   vrc          :vrc,
			  	   			   cni          :cni,
			  	   			   cniu         :cniu,
			  	   			   otherfee 	:otherfee

			  		}
				})
			    .done(function(data) {
	  						$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'Running Charges Added!',
				        		confirm: function(){
				        		window.location.hash="#air";	
				        	      dia_running_charges.close();		
				        		  location.reload();	
				        	    }
				   			});

	    	  });
			//}
}




//check  if num or not
              $(document).on('keypress','.checkDec',function (e) {
					  if(event.which < 46
					    || event.which > 59) {
					        event.preventDefault();
					    } // prevent if not number/dot

					    if(event.which == 46
					    && $(this).val().indexOf('.') != -1) {
					        event.preventDefault();
					    } // prevent if already dot

               });



