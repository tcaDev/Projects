 <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Container(s)</h4>
        </div>
	        <div class="modal-body">
	        	<div style="height: 600px;overflow-y: auto;">
  	<div id="table-updateContainer-mnla" class="container-mnla-add ">

	  	<div class="col-lg-6">

	  		<div class="form-group ">
				<label>JobFile</label>
	        	<input type="text" class="jobfile-updateContainer-mnla form-control input-sm" disabled>
			</div>

	  	   <div class="form-group ">
	  	   		<label>Vessel/Voyage #</label>
            	    <select class="vessel-updateContainer-manila-get form-control input-sm">

            	    </select>
			</div>

  			<div class="form-group">
				<label>Container Number</label>	
				<div class="check_exists_containers"> </div>				     
	        	<input type="text" class="container-updateContainer-manila form-control input-sm" onkeyup="check_Container_mnilas(this.value)"> 
	        	<i class="container-msg-addContainer-manila" style="color:red;"></i>
			</div>

			<div class="form-group">
				<label>Container Size</label>
	        	<input type="text" class="container-size-updateContainer-manila form-control input-sm">
			</div>


			<div class="form-group">
				<label>Number of Cartons</label> <span id="errmsg-updateContainer-manila" style="color:red;"></span>
				<input type="text" step="1" class="form-control input-sm cartons-updateContainer-manila" id="cartons-updateContainer-manila">
			</div>


		    <div class="form-group">
				<label>Hauler/Truck Name</label>
				<select class="form-control truckname-updateContainer-manila" >
						<?php foreach($hauler_data as $row){ ?>
							 <option value="<?php echo $row->HaulerOrTruckId?>">
							 <?php echo stripslashes($row->HaulerOrTruck);?>
							 </option>
							<?php }?> 
				</select>
			</div>

			<div class="form-group">
				<label>Trucker Plate No.</label>
				<input type="text" name="trckplte" class="form-control input-sm plate-updateContainer-manila" />
				
			</div>

		   <div class="form-group">
				<label>Referrence Entry Number</label>					     
	        		<input type="date-time-local" class="ref_entry_no-updateContainer-manila form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Paid</label>					     
	        		<input type="datetime-local" class="dt_paid-updateContainer-manila form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Sent PreAssessment</label>					     
	        		<input type="datetime-local" class="dt_pre_assess-updateContainer-manila form-control input-sm">
			</div>

			<div class="form-group">
				<label>Date Sent Final Assessment</label>
				<input type="datetime-local" name="" class="form-control input-sm dt_final_assess-updateContainer-manila" />
			</div>


	  	</div>
	  	
  			

	  	<div class="col-lg-6">

	  		<div class="form-group">
				<label>Start of Storage</label>
				<input type="datetime-local" name="strtstrge" class="form-control input-sm storage-updateContainer-manila" />
			</div>

			<div class="form-group">
				<label>Start of Demurrage </label>
				<input type="datetime-local" name="strtdmrage" class="form-control input-sm demorage-updateContainer-manila" />
			</div>

			<div class="form-group">
				<label>Lodging</label>
				<input type="datetime-local" name="lodging" class="form-control input-sm lodging-updateContainer-manila" />
			</div>

			<!-- <div class="form-group">
				<label>Hauler</label>
				<input type="text" name="lodge" class="form-control input-sm" />
			</div> -->

			<div class="form-group">
				<label>Gate In at Port</label>
				<input type="datetime-local" name="gtinport" class="form-control input-sm gtinport-updateContainer-manila" />
			</div>

			<div class="form-group">
				<label>Gate Out at Port</label>
				<input type="datetime-local" name="gtoutport" class="form-control input-sm gtoutport-updateContainer-manila" />
			</div>

			<div class="form-group">
				<label>Actual Delivery at Warehouse</label>
				<input type="datetime-local" name="act-del-whse" class="form-control input-sm act-del-whse-updateContainer-manila" />
			</div>

		    <div class="form-group">
				<label>Target Delivery Date</label>
				<input type="datetime-local" name="" class="form-control input-sm tdt-updateContainer-manila" />
			</div>

			<div class="form-group">
				<label>Pull out Date at Port</label>
				<input type="datetime-local" name="" class="form-control input-sm pull_out_port-updateContainer-manila" />
			</div>


		    <div class="form-group">
				  	<label for="dtClrd">Date File Entry To BOC:</label>
				  	<input type="datetime-local" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc-updateContainer-manila">
			</div>	

			<div class="form-group">
				  	<label for="dtClrd">Date Cleared BOC:</label>
				  	<input type="datetime-local" name="dt_boc" class="form-control input-sm dt_boc-updateContainer-manila">
			</div>

			<div class="form-group hidden">
				  	<label for="dtClrd">ID:</label>
				  	<input type="text" class="form-control input-sm carrier_jobfile_manila-update-container">
			</div>

	  	</div>

	</div>
	</div>
	        </div>
	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_container">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>

<script>

	$(document).ready(function(){

				$(document).on('click','.btn-update-container',function(){

					 var jobfile_mnla =  $('.jobfile_mnila_update').val();
					 var vessel = $(this).closest('tr').children('td:eq(2)').text();
					 var containerNo = $(this).closest('tr').children('td:eq(3)').text();
					 var containerSize = $(this).closest('tr').children('td:eq(4)').text();
					 var NoofCartons = $(this).closest('tr').children('td:eq(5)').text();
					 var startofstorage = $(this).closest('tr').children('td:eq(6)').text();
					 var lodging = $(this).closest('tr').children('td:eq(8)').text();
					 var hauler = $(this).closest('tr').children('td:eq(10)').text();
					 var taget_date = $(this).closest('tr').children('td:eq(11)').text();
					 var gate_in = $(this).closest('tr').children('td:eq(13)').text();
					 var gate_out = $(this).closest('tr').children('td:eq(15)').text();
					 var actual_delivery = $(this).closest('tr').children('td:eq(17)').text();
					 var startofdemorage = $(this).closest('tr').children('td:eq(19)').text();
					 var pull_out = $(this).closest('tr').children('td:eq(21)').text();
					 var date_boc_cleared = $(this).closest('tr').children('td:eq(23)').text();
					 var date_file_entry = $(this).closest('tr').children('td:eq(25)').text();
					 var date_pre_assess = $(this).closest('tr').children('td:eq(27)').text();
					 var date_paid = $(this).closest('tr').children('td:eq(29)').text();
					 var date_final_assess = $(this).closest('tr').children('td:eq(31)').text();
					 var refEntryNo = $(this).closest('tr').children('td:eq(33)').text();
					 var value_vessel = $(this).closest('tr').children('td:eq(34)').text();
    
                       alert(hauler);
					 $('.container-updateContainer-manila').val(containerNo);
					 $('.container-size-updateContainer-manila').val(containerSize);
					 $('.cartons-updateContainer-manila').val(NoofCartons);
					  $(".truckname-updateContainer-manila option").filter(function() {
						    return this.text == hauler; 
						}).attr('selected', 'selected');
						/*Not in Database*/$('.plate-updateContainer-manila').val();
					 $('.ref_entry_no-updateContainer-manila').val(refEntryNo);
					 $('.dt_paid-updateContainer-manila').val(date_paid);
					 $('.dt_pre_assess-updateContainer-manila').val(date_pre_assess);
					 $('.dt_final_assess-updateContainer-manila').val(date_final_assess);
					 $('.storage-updateContainer-manila').val(startofstorage);
					 $('.demorage-updateContainer-manila').val(startofdemorage);
					 $('.lodging-updateContainer-manila').val(lodging);
					 $('.gtinport-updateContainer-manila').val(gate_in);
					 $('.gtoutport-updateContainer-manila').val(gate_out);
					 $('.act-del-whse-updateContainer-manila').val(actual_delivery);
					 $('.tdt-updateContainer-manila').val(taget_date);
					 $('.pull_out_port-updateContainer-manila').val(pull_out);
					 $('.dt_file_entry_boc-updateContainer-manila').val(date_file_entry);
					 $('.dt_boc-updateContainer-manila').val(date_boc_cleared);
					 $('.carrier_jobfile_manila-update-container').val(value_vessel);
					
					$(".jobfile-updateContainer-mnla").val(jobfile_mnla);

						$.ajax({
					  		method: "POST",
							url: "<?php echo base_url('Job/get_update_vessel_container');?>",
					  		data: { jobfile:jobfile_mnla,
					  			    vessel:vessel
					  		}
						})
				  		.done(function(data) {
				  			/* alert(data);*/
					  				$('.vessel-updateContainer-manila-get').html(data);
					  				$('.vessel-updateContainer-manila-get').prepend("<option value='"+value_vessel+"' selected>"+vessel+"</option>");
						});


				
			});





 				//get the value in container popup
 					

 				//

 				
 					$(document).on('click','.update_container',function(){

 						var vesid 		     =$('.vessel-updateContainer-manila-get').val();
 						var containerno 	 =$('.container-updateContainer-manila').val();
 						var	carrierbyjobfile =$('.carrier_jobfile_manila-update-container').val();
                        var	contno           =$('.container-size-updateContainer-manila').val();    
                        var	cartons          =$('.cartons-updateContainer-manila').val();  
     					var	truckid          =$('.truckname-updateContainer-manila').val();
     					var	truckername      =$('.plate-updateContainer-manila').val();	
     					var	refentry         =$('.ref_entry_no-updateContainer-manila').val(); 
     					var	dtpaid           =$('.dt_paid-updateContainer-manila').val();  
     					var	dt_pre_assess    =$('.dt_pre_assess-updateContainer-manila').val();
     				    var	dt_final_assess  =$('.dt_final_assess-updateContainer-manila').val();
     					var	storage          =$('.storage-updateContainer-manila').val(); 
     				    var	demorage         =$('.demorage-updateContainer-manila').val(); 
     					var	lodging          =$('.lodging-updateContainer-manila').val();  
     					var	gip              =$('.gtinport-updateContainer-manila').val(); 
     					var	gop              =$('.gtoutport-updateContainer-manila').val(); 
     					var	adw              =$('.act-del-whse-updateContainer-manila').val();
     					var	tdt              =$('.tdt-updateContainer-manila').val();
     					var	pull_out_date    =$('.pull_out_port-updateContainer-manila').val();
     					var	dt_final_entry_boc    =$('.dt_file_entry_boc-updateContainer-manila').val(); 
     					var	dt_boc           =$('.dt_boc-updateContainer-manila').val(); 
     					
 
 						$.ajax({
					  		method: "POST",
							url: "<?php echo base_url('Job_manila_update/container');?>",
					  		data: { carrierbyjobfile:carrierbyjobfile,
					  			    vesid:vesid,
					  			    containerno:containerno,
					  			    contno:contno,
					  			    cartons:cartons,
					  			    truckid:truckid,
					  			    truckername:truckername,
					  			    refentry:refentry,
					  			    dtpaid:dtpaid,
					  			    dt_pre_assess:dt_pre_assess,
					  			    dt_final_assess:dt_final_assess,
					  			    storage:storage,
					  			    demorage:demorage,
					  			    lodging:lodging,
					  			    gip:gip,
					  			    gop:gop,
					  			    adw:adw,
					  			    tdt:tdt,
					  			    pull_out_date:pull_out_date,
					  			    dt_final_entry_boc:dt_final_entry_boc,
					  			    dt_boc:dt_boc
					  		}
						})
				  		.done(function(data) {
				  			 $.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content:'Container is updated!',
				        		confirm: function(){
				        			 $('#updateContainer-mnla').modal('hide');
				        			 $('#viewcontainers').modal('hide');
				        	    }
				   			  }); 
						});
 					});

 				
		 });

   
</script>

