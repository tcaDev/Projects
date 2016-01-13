<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Commodity(s)</h4>
        </div>
	        <div class="modal-body">
	        		<!-- Product Adding Table-->
						<div id="table-updateTruck-air" class=" table-editable">
						
						<div class="col-lg-6">
							

							<div class="form-group">
								<label>Jobfile No:</label>
								<input type="text" class="form-control input-sm jobfile-update-air" disabled>
							</div>

							<div class="form-group">
								<label>Commodity Name</label><i style="color:red;">*</i>
								<select class="form-control input-sm prodname-air" name="prodname-air">
									<?php foreach($products as $row){ ?>
											 <option value="<?php echo $row->ProductId?>">
											 <?php echo stripslashes($row->ProductName);?>
											 </option>
											<?php }?> 
								</select> 
								<i class="prodname-msg-air" style="color:red;"></i>
							</div>

							<div class="form-group">
								<label>Gross Weight (kgs):</label> <span id="errmsg-air" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm gross_arss" >
							</div>

					


							<div class="form-group">
										 <label for="rfp">Date Sent Pre-Assess:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm pre-assess-air" >
							</div>

							<div class="form-group">
										 <label for="rfp">Date Sent Final Assess:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm final-assess-air" >
									 </div>

									 <div class="form-group">
										 <label for="rfp">Date Paid (Date & Time):</label>
										 <input type="datetime-local" name="ref_due_dt" class="form-control input-sm dt_paid_air" >
									 </div>
							
							 <div class="form-group">
										 <label for="rfp">Date BOC Cleared:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm  dt_boc_cleared_air" >
									 </div>

									  <div class="form-group">
										 <label for="rfp">Target Delivery Date:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm target_delivery_air" >
									 </div>
						</div>

						<div class="col-lg-6">

						   <div class="form-group">
										 <label for="rfp">Actual Pull Out Date at NAIA:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm act-pull-naia-air" >
									 </div>

									  <div class="form-group">
										 <label for="rfp">Date Received At Warehouse:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm date-recvd-whse-air">
									 </div>

									 <div class="form-group">
										<label>Hauler/Truck Name</label>
										<select class="form-control truckname_air" >
												<?php foreach($hauler_data as $row){ ?>
													 <option value="<?php echo $row->HaulerOrTruckId?>">
													 <?php echo stripslashes($row->HaulerOrTruck);?>
													 </option>
													<?php }?> 
										</select>
									</div>


							<div class="form-group">
								<label>Total Storage</label> <span id="errmsg-air" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm total_storage" id="cartons-aira" name="numofcartons-air">
							</div>

							<div class="form-group">
								<label>Additional Per day Include VAT</label> <span id="errmsg-air" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm addtl-per-day "  name="numofcartons-air">
							</div>


							<div class="form-group">
								<label>Reference Entry No.</label>
								<input type="text" step="1" class="form-control input-sm ref-entry-no-air "  name="numofcartons-air">
							</div>
							
						</div>
					</div>

					<div style="width: 100%; overflow-x: auto;"> </div>
	        </div>

        <div class="modal-footer" >
	       	 <button type="button" class="btn btn-danger products_air_updates">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>


<script>

var ProductAirID;
/*var ProductID;*/
var jobs_air;
	$(document).on('click','.btn-update-air', function(){

		 var Product_AirId= $(this).closest('tr').children('td:eq(2)').text();
		 var ProductName = $(this).closest('tr').children('td:eq(3)').text();
		 var RefEntryNo = $(this).closest('tr').children('td:eq(4)').text();
		 var GrossWeight = $(this).closest('tr').children('td:eq(5)').text();
		 var DateSentPreAssess = $(this).closest('tr').children('td:eq(6)').text();
		 var DatePaid = $(this).closest('tr').children('td:eq(7)').text();
		 var DateSentFinalAsssess = $(this).closest('tr').children('td:eq(9)').text();
		 var DateBOCCleared = $(this).closest('tr').children('td:eq(10)').text();
		 var TargetDeliveryDate = $(this).closest('tr').children('td:eq(11)').text();
		 var ActualPullOutDateNAIA = $(this).closest('tr').children('td:eq(12)').text();
		 var DateReceivedAtWhse = $(this).closest('tr').children('td:eq(13)').text();
		 var Hauler = $(this).closest('tr').children('td:eq(14)').text();
		 var TotalStorage = $(this).closest('tr').children('td:eq(15)').text();
		 var AdditionalPerDayIncludeVAT = $(this).closest('tr').children('td:eq(16)').text();
		 var JobfileNo = $(this).closest('tr').children('td:eq(17)').text();
		 var ProductId = $(this).closest('tr').children('td:eq(18)').text();

		
		 ProductAirID = Product_AirId;
		/* ProductID = ProductId;*/
		 jobs_air = JobfileNo;

$('#table-updateTruck-air .jobfile-update-air').val(JobfileNo);
		 $("#table-updateTruck-air .prodname-air option").filter(function() {
						    return this.text == ProductName; 
						}).attr('selected', 'selected');
		 $('#table-updateTruck-air .gross_arss').val(GrossWeight);
		 $('#table-updateTruck-air .pre-assess-air').val(DateSentPreAssess);
		 $('#table-updateTruck-air .final-assess-air').val(DateSentFinalAsssess);
		 $('#table-updateTruck-air .dt_paid_air').val(DatePaid);
		 $('#table-updateTruck-air .dt_boc_cleared_air').val(DateBOCCleared);
		 $('#table-updateTruck-air .target_delivery_air').val(TargetDeliveryDate);
		 $('#table-updateTruck-air .act-pull-naia-air').val(ActualPullOutDateNAIA);
		 $('#table-updateTruck-air .date-recvd-whse-air').val(DateReceivedAtWhse);
		  $("#table-updateTruck-air .truckname_air option").filter(function() {
						    return this.text == Hauler; 
						}).attr('selected', 'selected');
		 $('#table-updateTruck-air .total_storage').val(TotalStorage);
		 $('#table-updateTruck-air .addtl-per-day').val(AdditionalPerDayIncludeVAT);
		 

		  $('#table-updateTruck-air .ref-entry-no-air').val(RefEntryNo);

	});

	$(document).on('click','.products_air_updates', function(){

		 var gross_arss 		=  $('#table-updateTruck-air .gross_arss').val();
		 var final_assess_air   =  $('#table-updateTruck-air .final-assess-air').val();
		 var dt_paid_air 		=  $('#table-updateTruck-air .dt_paid_air').val();
		 var dt_boc_cleared_air =  $('#table-updateTruck-air .dt_boc_cleared_air').val();

		 var target_delivery_air 		 =  $('#table-updateTruck-air .target_delivery_air').val();
		 var act_pull_naia_air  		 =  $('#table-updateTruck-air .act-pull-naia-air').val();
		 var date_recvd_whse_air 		 =  $('#table-updateTruck-air .date-recvd-whse-air').val();
		 var truckname_air			     =  $('#table-updateTruck-air .truckname_air option:selected').val();

		 var total_storage  		 =  $('#table-updateTruck-air .total_storage').val();
		 var addtl_per_day 		     =  $('#table-updateTruck-air .addtl-per-day').val();
		 var cartons_air			 =  $('#table-updateTruck-air .cartons-air').val();
		 var ref					 =  $('#table-updateTruck-air .ref-entry-no-air').val();
         var pre_assess				 =  $('#table-updateTruck-air .pre-assess-air').val();
   
   	   var ProductID				 =  $('#table-updateTruck-air .prodname-air option:selected').val();


    

		 	

  		 			      $.ajax({
						  		method: "POST",
								  url: "<?php echo base_url('Job_air_update/products');?>",
								  beforeSend: function() {
							 	    dia =	$.dialog({
							 	  	    icon: 'fa fa-spinner fa-spin',
							 	  	    closeIcon: false,
						        		title: 'Please wait!',
						        		backgroundDismiss: false,
						        		content: 'Updating Commodity ',
						   			});
		 					 		 },
						  		data: { jbfl                 :jobs_air,
						  			    prodid   			 :ProductID,
						  			    ProductAirID         :ProductAirID,
						  			    gross				 :gross_arss,
						  			    dtfinal_assess		 :final_assess_air,
						  			    dtpaid				 :dt_paid_air,
						  			    dt_boc_cleared	     :dt_boc_cleared_air,
						  			    tdt					 :target_delivery_air,
						  			    ac_pu_dt_naia	     :act_pull_naia_air,
						  			    dt_rec_whse			 :date_recvd_whse_air,
						  			    refentry             :ref,
						  			    pre_assess			 :pre_assess,
						  			    addtl_per_day        :addtl_per_day,
						  			    total_storage        :total_storage,
						  			    truckname_air        :truckname_air

						  		}
							})
					  	.done(function(data) {
						     $.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'Commodity is Updated!',
				        		confirm: function(){
				        			$('#updateProduct-air').modal('hide');
								    $('#viewgoods-air').modal('hide');
								    dia.close();	

				        	    }
				   			});
						});
			     

    });

	
</script>


