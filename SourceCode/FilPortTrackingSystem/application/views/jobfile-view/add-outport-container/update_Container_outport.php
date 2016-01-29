 <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Container(s)</h4>
        </div>
	        <div class="modal-body">
	        	<div style="height: 600px;overflow-y: auto;">
  	<div id="table-updateContainer-outport" class="container-outport-update ">

	  	<div class="col-lg-6">

	  		<div class="form-group ">
				<label>JobFile</label>
	        	<input type="text" class="jobfile-updateContainer-outport form-control input-sm" disabled>
			</div>

	  	   <div class="form-group hidden vessel-updateContainer-outport-get">
	  	   		<label>Vessel/Voyage #</label>
            	    <select class=" form-control input-sm vessel-updateContainer-outport-select">

            	    </select>
			</div>
		   <div class="form-group">
	  	   		<label>Vessel/Voyage #</label>
  					<input type="text" class="ves-outport form-control input-sm" disabled>	
			</div>
  			<div class="form-group">
				<label>Container Number</label>	
				<div class="check_exists_containers"> </div>				     
	        	<input type="text" class="container-updateContainer-outport form-control input-sm" onkeyup="check_Container_outport(this.value)"> 
	        	<i class="container-msg-addContainer-outport" style="color:red;"></i>
			</div>

			<div class="form-group">
				<label>Container Size</label>
	        	<input type="text" class="container-size-updateContainer-outport form-control input-sm">
			</div>


			<div class="form-group">
				<label>Number of Cartons</label> <span id="errmsg-updateContainer-outport" style="color:red;"></span>
				<input type="text" step="1" class="form-control input-sm cartons-updateContainer-outport" id="cartons-updateContainer-outport">
			</div>


		    <div class="form-group">
				<label>Hauler/Truck Name</label>
				<select class="form-control truckname-updateContainer-outport" >
						<option value="0" selected></option>
						<?php foreach($hauler_data as $row){ ?>
							 <option value="<?php echo $row->HaulerOrTruckId?>">
							 <?php echo stripslashes($row->HaulerOrTruck);?>
							 </option>
							<?php }?> 
				</select>
			</div>

			<div class="form-group">
				<label>Trucker Plate No.</label>
				<input type="text" name="trckplte" class="form-control input-sm plate-updateContainer-outport" />
				
			</div>

		   <div class="form-group">
				<label>Referrence Entry Number</label>					     
	        		<input type="text" class="ref_entry_no-updateContainer-outport form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Paid</label>					     
	        		<input type="datetime-local" class="dt_paid-updateContainer-outport form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Sent PreAssessment</label>					     
	        		<input type="date" class="dt_pre_assess-updateContainer-outport form-control input-sm">
			</div>

			


	  	</div>
	  	
  			

	  	<div class="col-lg-6">

	  	<div class="form-group">
				<label>Date Sent Final Assessment</label>
				<input type="date" name="" class="form-control input-sm dt_final_assess-updateContainer-outport" />
			</div>

	  		<div class="form-group">
				<label>Start of Storage</label>
				<input type="date" name="strtstrge" class="form-control input-sm storage-updateContainer-outport" />
			</div>

			<div class="form-group">
				<label>Start of Demurrage </label>
				<input type="date" name="strtdmrage" class="form-control input-sm demorage-updateContainer-outport" />
			</div>

		 	<div class="form-group">
				<label>Lodging</label>
				<input type="date" name="lodging" class="form-control input-sm lodging-updateContainer-outport" />
			</div> 

			
			<div class="form-group">
				<label>Actual Delivery at Warehouse</label>
				<input type="date" name="act-del-whse" class="form-control input-sm act-del-whse-updateContainer-outport" />
			</div>

		    <div class="form-group">
				<label>Target Delivery Date</label>
				<input type="date" name="" class="form-control input-sm tdt-updateContainer-outport" />
			</div>

			 <div class="form-group">
				<label>Pull out Date at Port</label>
				<input type="date" name="" class="form-control input-sm pull_out_port-updateContainer-outport" />
			</div> 


		    <div class="form-group">
				  	<label for="dtClrd">Date File Entry To BOC:</label>
				  	<input type="date" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc-updateContainer-outport">
			</div>	

			<div class="form-group">
				  	<label for="dtClrd">Date Cleared BOC:</label>
				  	<input type="date" name="dt_boc" class="form-control input-sm dt_boc-updateContainer-outport">
			</div>

			<div class="form-group hidden">
				  	<label for="dtClrd">ID:</label>
				  	<input type="text" class="form-control input-sm carrier_jobfile_outport-update-container">
			</div>

			  <div class="form-group">
				<label>Actual Date Received Container to Warehouse </label>
				<input type="date" name="act_dt_to_whse" class="form-control input-sm act_dt_to_whse-updateContainer-outport" />
			</div>

	  	</div>

	</div>
	</div>
	        </div>
	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_container-outport">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>

<script>
var cbcid_outport;
	$(document).ready(function(){

				$(document).on('click','.btn-update-container-outport',function(){

					 var jobfile_outport =  $('.jobfile_outport_update').val();
					 var vessel = $(this).closest('tr').children('td:eq(2)').text();
					 var containerNo = $(this).closest('tr').children('td:eq(3)').text();
					 var containerSize = $(this).closest('tr').children('td:eq(4)').text();
					 var NoofCartons = $(this).closest('tr').children('td:eq(5)').text();
					 var startofstorage = $(this).closest('tr').children('td:eq(6)').text();
					 var lodging = $(this).closest('tr').children('td:eq(8)').text();
					 var hauler = $(this).closest('tr').children('td:eq(10)').text();
					 var taget_date = $(this).closest('tr').children('td:eq(11)').text();
					 var actual_delivery = $(this).closest('tr').children('td:eq(13)').text();
					 var startofdemorage = $(this).closest('tr').children('td:eq(15)').text();
					 var pull_out = $(this).closest('tr').children('td:eq(17)').text();
					 var date_boc_cleared = $(this).closest('tr').children('td:eq(19)').text();
					 var date_file_entry = $(this).closest('tr').children('td:eq(21)').text();
					 var date_pre_assess = $(this).closest('tr').children('td:eq(23)').text();
					 var date_paid = $(this).closest('tr').children('td:eq(25)').text();
					 var date_final_assess = $(this).closest('tr').children('td:eq(27)').text();
					 var refEntryNo = $(this).closest('tr').children('td:eq(29)').text();
					 var value_vessel = $(this).closest('tr').children('td:eq(30)').text();
					 var actual_dt_rcvd_cont_whse = $(this).closest('tr').children('td:eq(31)').text();
    				 var containerbycarrierId = $(this).closest('tr').children('td:eq(33)').text();	
    				 var plate_no = $(this).closest('tr').children('td:eq(34)').text();	
                      cbcid_outport = containerbycarrierId;

                     $('.ves-outport').val(vessel);
					 $(".jobfile-updateContainer-outport").val(jobfile_outport);

					 $('.carrier_jobfile_outport-update-container').val(value_vessel);

					 $('.container-updateContainer-outport').val(containerNo);
					 $('.container-size-updateContainer-outport').val(containerSize);
					 $('.cartons-updateContainer-outport').val(NoofCartons);
					  
					 $(".truckname-updateContainer-outport option").filter(function() {
						    return this.text == hauler; 
						}).attr('selected', 'selected');

						/*Not in Database*/$('.plate-updateContainer-outport').val(plate_no);
					 $('.ref_entry_no-updateContainer-outport').val(refEntryNo);
					 $('.dt_paid-updateContainer-outport').val(date_paid);
					 $('.dt_pre_assess-updateContainer-outport').val(date_pre_assess);
					 $('.dt_final_assess-updateContainer-outport').val(date_final_assess);
					 $('.storage-updateContainer-outport').val(startofstorage);
					 $('.demorage-updateContainer-outport').val(startofdemorage);
					 $('.lodging-updateContainer-outport').val(lodging);
					 $('.act-del-whse-updateContainer-outport').val(actual_delivery);
					 $('.tdt-updateContainer-outport').val(taget_date);
					 $('.pull_out_port-updateContainer-outport').val(pull_out);
					 $('.dt_file_entry_boc-updateContainer-outport').val(date_file_entry);
					 $('.dt_boc-updateContainer-outport').val(date_boc_cleared);
					 
					 $('.act_dt_to_whse-updateContainer-outport').val(actual_dt_rcvd_cont_whse);
					
					
					
					var modal_ID= "#addVessel-outport";

						$.ajax({
					  		method: "POST",
							url: "<?php echo base_url('Job/get_vessel_container');?>",
					  		data: { jobfile:jobfile_outport,
					  			    vessel:vessel,
					  			    href:modal_ID
					  		}
						})
				  		.done(function(data) {
				  			/* alert(data);*/
					  				$('.vessel-updateContainer-outport-get').html(data);
					  				$('.vessel-updateContainer-outport-get select').val(vessel);
						});

				
			});





 				//get the value in container popup
 					

 				//

 				
 					$(document).on('click','.update_container-outport',function(){

                     
 						var vesid_outport 		     =$('.vessel-updateContainer-outport-select').val();
 						var containerno_outport 	 =$('.container-updateContainer-outport').val();
 						var	carrierbyjobfile_outport =$('.carrier_jobfile_outport-update-container').val();
                        var	contno_outport           =$('.container-size-updateContainer-outport').val();    
                        var	cartons_outport          =$('.cartons-updateContainer-outport').val();  
     					var	truckid_outport          =$('.truckname-updateContainer-outport').val();
     					var	truckername_outport      =$('.plate-updateContainer-outport').val();	
     					var	refentry_outport         =$('.ref_entry_no-updateContainer-outport').val(); 
     					var	dtpaid_outport           =$('.dt_paid-updateContainer-outport').val();  
     					var	dt_pre_assess_outport    =$('.dt_pre_assess-updateContainer-outport').val();
     				    var	dt_final_assess_outport  =$('.dt_final_assess-updateContainer-outport').val();
     					var	storage_outport          =$('.storage-updateContainer-outport').val(); 
     				    var	demorage_outport         =$('.demorage-updateContainer-outport').val(); 
     					var	lodging_outport          =$('.lodging-updateContainer-outport').val(); 
     					var	adw_outport              =$('.act-del-whse-updateContainer-outport').val();
     					var	tdt_outport              =$('.tdt-updateContainer-outport').val();
     					var	pull_out_date_outport    =$('.pull_out_port-updateContainer-outport').val();
     					var	dt_final_entry_boc_outport    =$('.dt_file_entry_boc-updateContainer-outport').val(); 
     					var	dt_boc_outport           =$('.dt_boc-updateContainer-outport').val(); 
     					var	actual_dt_rcvd_cont_whse_outport  =$('.act_dt_to_whse-updateContainer-outport').val(); 

 						$.ajax({
					  		method: "POST",
							url: "<?php echo base_url('Job_manila_update/container');?>",
							beforeSend: function() {
					 	  dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-pulse',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating container',
				   			});
 					     },
					  		data: { carrierbyjobfile         :carrierbyjobfile_outport,
					  			    cbcid                    :cbcid_outport,
					  			    containerno   			 :containerno_outport,
					  			    contno       		     :contno_outport,
					  			    cartons     		     :cartons_outport,
					  			    truckid      			 :truckid_outport,
					  			    truckername  		     :truckername_outport,
					  			    refentry     			 :refentry_outport,
					  			    dtpaid         		     :dtpaid_outport,
					  			    dt_pre_assess            :dt_pre_assess_outport,
					  			    dt_final_assess          :dt_final_assess_outport,
					  			    storage                  :storage_outport,
					  			    demorage                 :demorage_outport,
					  			    lodging                  :lodging_outport,
					  			    adw                      :adw_outport,
					  			    tdt            		     :tdt_outport,
					  			    pull_out_date   		 :pull_out_date_outport,
					  			    dt_final_entry_boc   	 :dt_final_entry_boc_outport,
					  			    dt_boc          	     :dt_boc_outport,
					  			    actual_dt_rcvd_cont_whse :actual_dt_rcvd_cont_whse_outport
					  		}
						})
				  		.done(function(data) {
				  			 $.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: ' Success!',
				        		content:'Container is updated!',
				        		content:data,
				        		confirm: function(){
				        			dia.close();
				        			 $('#updateContainer-outport').modal('hide');
				        			 $('#viewcontainers-outport').modal('hide');
				        	    }
				   			  }); 
						});
 					});

 				
		 });

   
</script>

