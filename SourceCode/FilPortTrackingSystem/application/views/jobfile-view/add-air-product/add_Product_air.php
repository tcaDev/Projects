<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Commodity(s)</h4>
        </div>
	        <div class="modal-body">
	        	<!-- Product Adding Table-->
						<div id="table-AddTruck-air" class=" table-editable">
						
						<div class="col-lg-6">
							
							<div class="form-group">
								<label>Commodity Name</label><i style="color:red;">*</i>
								<select class="form-control input-sm prodname-air" name="prodname-air">
								<option value="0" selected></option>
									<?php foreach($products as $row){ ?>
											 <option value="<?php echo $row->ProductId?>">
											 <?php echo stripslashes($row->ProductName);?>
											 </option>
											<?php }?> 
								</select> 
								<i class="prodname-msg-air" style="color:red;"></i>
							</div>

							<div class="form-group">
								<label>Gross Weight (kgs):</label> 
								<input type="text" class="form-control input-sm gross" >
							</div>

							<div class="form-group">
										 <label for="rfp">Date Sent Pre-Assess:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="pre-assess-air">
									 </div>

							<div class="form-group">
										 <label for="rfp">Date Sent Final Assess:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="final-assess-air">
									 </div>

									 <div class="form-group">
										 <label for="rfp">Date Paid (Date & Time):</label>
										 <input type="datetime-local" name="ref_due_dt" class="form-control input-sm " id="date_paid-air">
									 </div>
							
							 <div class="form-group">
										 <label for="rfp">Date BOC Cleared:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="boc-cleared-air">
									 </div>

									  <div class="form-group">
										 <label for="rfp">Target Delivery Date:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="target-delivery-air">
									 </div>
						</div>

						<div class="col-lg-6">

						   <div class="form-group">
										 <label for="rfp">Actual Pull Out Date at NAIA:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="act-pull-naia-air">
									 </div>

									  <div class="form-group">
										 <label for="rfp">Date Received At Warehouse:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="date-recvd-whse-air">
									 </div>

									 <div class="form-group">
										<label>Hauler/Truck Name</label>
										<select class="form-control truckname-air" >
										<option value="0" selected></option>
												<?php foreach($hauler_data as $row){ ?>
													 <option value="<?php echo $row->HaulerOrTruckId?>">
													 <?php echo stripslashes($row->HaulerOrTruck);?>
													 </option>
													<?php }?> 
										</select>
									</div>


							<div class="form-group">
								<label>Total Storage</label> 
								<input type="text" class="form-control input-sm total-storage" >
							</div>

							<div class="form-group">
								<label>Additional Per day Include VAT</label>
								<input type="text" class="form-control input-sm addtl-per-day" >
							</div>


							<div class="form-group">
								<label>Reference Entry No.</label>
								<input type="text" class="form-control input-sm ref-entry-no-air" >
							</div>

							 

							<button type="button" class="btn-Add-Product-Data-air btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Product</button>
							<i class="tableVessel-msg-air" style="color:red;"></i>
						</div>
					

						<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 3000px;" border="1">

							    <thead>
							    	 <tr>
							    	 		<th class="hidden">Value Commodity</th>
								        <th>Commodity</th>
								        <th>Gross Weight(kgs)</th>
								        <th>Date Sent Pre-Assess</th>
								        <th>Date Sent Final Assess</th>
								        <th>Date Paid (Date&Time)</th>
								        <th>Date BOC Cleared</th>
								        <th>Target Delivery Date</th>
								        <th>Actual Pull Date at NAIA</th>
								        <th>Date Received At Warehouse</th>
								        	<th class="hidden">Value HAuler</th>
								        <th>Hauler/Trucker Name</th>
								        <th>Total Storage</th>
								        <th>Additional Per Day Include VAT</th>
								        <th>Reference Entry No.</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>
					</div>
	        </div>

        <div class="modal-footer" >
      		  <i class="tableProd-msg-air" style="color:red;"></i>
	       	 <button type="button" class="btn btn-danger  submit_air_add">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>


      <script>
var jb_air;
      /*Delete Row*/

      $(document).on('click', '#table-AddTruck-air .deleteButton', function() {

    	$(this).closest("tr").remove();

	});


      	 $(document).on('click','.btn-Add-Product-Data-air', function(){

			/*var vessel = $('#tableAddTruck-air .vessel-prod-air option:selected').val();
			var prod = $('#tableAddTruck-air .prodname-air option:selected').val();

			if(isExist2(prod,vessel))
			{	
				$('.vessel-size-msg-air').text("The Commodity is already in this Container");
			}
			else*/ 
			if($('#table-AddTruck-air .prodname-air option:selected').val() == "0")
			{
				$('#table-AddTruck-air .prodname-msg-air').text("Need Commodity Name.");
			}else{
				$('#table-AddTruck-air table').append('<tr class="tr_remove"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
				$('#table-AddTruck-air table tr:last td:nth-child(1)').html($("#table-AddTruck-air .prodname-air").val()).hide();
			 	$('#table-AddTruck-air table tr:last td:nth-child(2)').html($("#table-AddTruck-air .prodname-air option:selected").text());
			    $('#table-AddTruck-air table tr:last td:nth-child(3)').html($("#table-AddTruck-air .gross").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(4)').html($("#table-AddTruck-air #pre-assess-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(5)').html($("#table-AddTruck-air #final-assess-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(6)').html($("#table-AddTruck-air #date_paid-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(7)').html($("#table-AddTruck-air #boc-cleared-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(8)').html($("#table-AddTruck-air #target-delivery-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(9)').html($("#table-AddTruck-air #act-pull-naia-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(10)').html($("#table-AddTruck-air #date-recvd-whse-air").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(11)').html($("#table-AddTruck-air .truckname-air").val()).hide();
			    $('#table-AddTruck-air table tr:last td:nth-child(12)').html($("#table-AddTruck-air .truckname-air option:selected").text());
			    $('#table-AddTruck-air table tr:last td:nth-child(13)').html($("#table-AddTruck-air .total-storage").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(14)').html($("#table-AddTruck-air .addtl-per-day").val());
			    $('#table-AddTruck-air table tr:last td:nth-child(15)').html($("#table-AddTruck-air .ref-entry-no-air").val());

	
			    $('#table-AddTruck-air table tr:last td:nth-child(16)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
		
			    $("#table-AddTruck-air .gross").val('');
			    $("#table-AddTruck-air #pre-assess-air").val('');
			    $("#table-AddTruck-air #final-assess-air").val('');
			    $("#table-AddTruck-air #date_paid-air").val('');
			    $("#table-AddTruck-air #boc-cleared-air").val('');
			    $("#table-AddTruck-air #target-delivery-air").val('');
			    $("#table-AddTruck-air #act-pull-naia-air").val('');
			    $("#table-AddTruck-air #date-recvd-whse-air").val('');
			    $("#table-AddTruck-air .total-storage").val('');
			    $("#table-AddTruck-air .addtl-per-day").val('');
			    $("#table-AddTruck-air .ref-entry-no-air").val();

			    $("#table-AddTruck-air  .prodname-air option:eq(0)").attr("selected","selected");
			    $("#table-AddTruck-air  .truckname-air option:eq(0)").attr("selected","selected");
		}
				

			});
      </script>


    <script>
    $(document).on('click','.submit_air_add',function(){
    	$('.submit_air_add').attr('disabled','disabled');
    	if($("#table-AddTruck-air table tbody tr td").length == 0){
    			$.confirm({
		 			 title: 'Add New Vessel',
		 			 closeIcon:false,
		 			 content:'You have not Added Any Product. Do you wish to Continue Exitting?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	$('.modal').modal('hide');
  					 },
  					 cancel: function(){
  					 	$('.submit_air_add').removeAttr('disabled');
  					 }
		 		});
    	}
    	else{

    		 dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Adding Commodity',
	});
       var table = $("#table-AddTruck-air table tbody");
         var t3  = $("#table-AddTruck-air table tbody tr").length;
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

/*
		    alert(jb_air);*/
		   
		       $.ajax({
			  		method: "POST",
					url:"<?php echo base_url('Job_air/products')?>",
			  		data: {
			  			    jbfl                        :jb_air,
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
				        			$('.tr_remove').empty();
				        			$('.tableProd-msg-air').text("");
									dia.close();
				        	    }
				   			});

				     	  }
	    	  });
	
	   });	

    	}
    

   
  });

    </script>