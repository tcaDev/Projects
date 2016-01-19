                    <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
	</div>

    	<div class="modal-body">
    		<div class="container-fluid">
	    		 <ul class="nav nav-pills">
				    <li id="btn-jobfile-air-add" class="active"><a>Jobfile</a></li>
				    <li id="btn-truck-air-add"><a>Description of Goods</a></li>
				    <li id="btn-charges-air-add"><a>Running Charges</a></li>
				  </ul>
    			<hr>


    			<div class="container-fluid">

    				<div class="form-group">
					  <div class="col-lg-12  pill-jobfile-air-add">
					  	<div class="row">
					  		<div class="col-lg-4" >	
					
					           <input type="hidden" value="3" name="monitoring_type" class="monitoring_type-air"/>


					           	<div class="required-fields-air">
					           		<div class="form-group">
					              <!--check if jofile is already exists -->
					           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i></label>
					           		<span class="check_jobfiles-air"></span> 
									 <input type="text" class="form-control input-sm jobfiles-air" name="jbfl" id="jbfl" onkeyup="myjob_air_add(this.value)">
									 <i class="jobfile-msg-air" style="color:red;"></i>
					           </div>
					  				
					           <div class="form-group">
								 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check" style="color:red;"></span></label> 
									  		<select name="shipper"  class="form-control input-sm shipper-air ">
								            	<option> </option>
								            	<?php  foreach($shipper_data as $row){  ?> 
								                <option value="<?php echo $row->ShipperId ?>">
								                <?php echo stripslashes($row->ShipperName) ?>
								                </option> 
								             	<?php }?>
							               	</select>
							            <i class="shipper-msg-air"  style="color:red;"></i>
							      </div>

							     <div class="form-group">
									  <label for="consignee">Consignee:<i style="color:red;">*</i></label> 
									  		<select name="consignee" class="form-control input-sm consignee-air">
									  			<option> </option>
								            	<?php  foreach($consignee_data as $row){  ?> 
								                <option value="<?php echo $row->ConsigneeId ?>">
								                <?php echo stripslashes($row->ConsigneeName) ?>
								                </option> 
								             	<?php }?>
								            </select>
								            <i class="consignee-msg-air" style="color:red;" style="color:red;"></i>
								   </div>
									   	
					           	

					           	<div class="form-group">
									<label>Color Stages</label> 									
										<select name="colors" class="form-control colsel-air input-sm" >
										  	<option value="0" disabled selected>Jobfile Status</option>
											<?php  foreach($color_data as $row){ 
											   $status = $row->StatusId;
											   if($status==0){?> 
											   	<option  data-color='<?php echo $row->ColorCode;?>' style="color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">					
										 <?php }else{?>
										    	<option data-color='<?php echo $row->ColorCode;?>'style="background-color:<?php echo $row->ColorCode;?>; color:white;" value="<?php echo $row->StatusId ?>">
										    <?php }?>
										    <?php echo $row->StatusName; ?>
										    </option> 
										 	<?php }?>
										</select>
										
								</div>

					           
						
							
									<div class="form-group">

									  <label for="hbl">House Airway Bill:</label>
									  <input type="text" class="form-control input-sm hbl-air">
									
									</div>

									</div>
									<div class="form-group">
									  <label for="mbl">Master Airway Bill:</label>
									  <input type="text" class="form-control input-sm mbl-air">
									 </div>

									 <div class="form-group">
									  <label for="mbl">Flight No.:</label>
									  <input type="text" class="form-control input-sm flight-air" >
									 </div>

									 <div class="form-group">
									  <label for="mbl">Forwarder:</label>
									  <input type="text" class="form-control input-sm forwarder-air" >
									 </div>

									  <div class="form-group">
									  <label for="mbl">Warehouse:</label>
									  <input type="text" class="form-control input-sm warehouse-air" >
									 </div>

									 <div class="form-group">
									  <label for="mbl">Air Craft No. :</label>
									  <input type="text" class="form-control input-sm aircraft-air" >
									 </div>


									


							</div>

						<div class="col-lg-4">

									 <div class="form-group">
										  	<label for="dtClrd">Estimated Departure</label>
										 	<input type="date" name="es_dep_time" class="form-control input-sm edt-air">
								     </div>
								
								     <div class="form-group">
										<label>Estimated Arrival</label>
										<input type="date" name="est-dept" class="form-control input-sm eat-air" />
									 </div>

							   <div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-air" />
							 </div>


										<div class="form-group">
											<label>Number of Cartons</label> <span id="errmsg-air" style="color:red;"></span>
											<input type="text" step="1" class="form-control input-sm cartons-air" id="cartons-air" name="numofcartons-air">
										</div>

									<div class="form-group">
										  <label for="bank">Letter of Credit No. from Bank:</label>
										  <input type="text" class="form-control input-sm bank-air" name="bank">
										</div>

										<div class="form-group">
										  <label for="registry">Registry:</label>
										  <input type="text" class="form-control input-sm registry-air">
										</div>

										<div class="form-group ">
											<label>Origin Country</label>
												<select  class="form-control origin-air" name="countries">
													<?php foreach($countries as $row){ ?>
													 <option value="<?php echo $row->CountryId?>">
													 <?php echo $row->CountryName;?>
													 </option>
													<?php }?> 
												</select>	

												<i class="origin-msg-air" style="color:red;"></i>
									   </div>

									<div class="form-group">
										<label>Origin City</label>
										<input type="text" name="origcity" class="form-control input-sm origcity-air" />
									</div>

								
									<div class="form-group">
									  <label for="dtRcvd">Date Received Arrival Notice From Airline/Forwader:</label>
									  <input type="date" name="dtRcvd" class="form-control input-sm dtRcvd-airline-air" >
									</div>


									
									 	
					  			</div>

								<div class="col-lg-4" >

								

									<div class="form-group">
									  <label for="dtRcvd">Date Received Arrival Notice From Client/SLINE:</label>
									  <input type="date" name="dtRcvd" class="form-control input-sm dtRcvd-air" >
									</div>

									<div class="form-group">
									  <label for="dtPckup">Date Pick-up / Received O-HAWB:</label>
									  <input type="date" name="dt_pickup_obl" class="form-control input-sm dt_pickup_obl-air" >
									</div>

								<div class="form-group">
									  <label for="dtPckRcv">Date Pick-up / Received Other Document :</label>
									  <input type="date" name="dt_pickup_docs" class="form-control input-sm dt_pickup_docs-air" >
									 </div>

								 <div class="form-group">
										 <label for="broker">Broker:</label>
								  			
								  			<select name="broker" class="form-control input-sm broker-air">
								            	<option> </option>
								            	<?php  foreach($broker_data as $row){  ?> 
								                <option value="<?php echo $row->BrokerId ?>">
								                <?php echo stripslashes($row->FirstName) . " " . stripslashes($row->MiddleName) . " " . stripslashes($row->LastName); ?>
								                </option> 
								             	<?php }?>
							               </select>
							          </div>
							           <div class="form-group">
							              <label for="dtPckRcv">Purchase Order No.</label>
									      <input type="text"  class="form-control input-sm purch_order_no-air" id="purch_order_no-air">

							           </div>

							           <div class="form-group">
							               <label for="dtReq">Date Request Budget to GL:</label>
										   <input type="date" name="dt_req_budget" class="form-control input-sm" id="dt_req_budget-air">
									  </div>

							         
									<div class="form-group">
										 <label for="rfp">Reference Due Date:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm " id="ref_due_dt-air">
									 </div>
									 


							<div class="form-group">
										<label>Color Selectivity :</label>
										<select name="color-select" id="color-select-air" class="form-control input-sm color-select-air">
												<?php foreach($color_selectivity as $row){ ?>
													 <option value="<?php echo $row->ColorSelectivityId?>">
													 <?php echo $row->ColorSelectivityName;?>
													 </option>
													<?php }?> 
										</select>
									</div>

									 <div class="form-group">
									   <label for="status">Status Report:</label>
									  	<textarea name="status" rows="5" class="form-control input-sm status-air" id="status_air"></textarea>
									 </div>
					  			</div>
					  		</div>
					  </div>



					<!-- Product Adding Table-->
						<div id="tableAddTruck-air" class="hidden pill-truck-air-add table-editable col-lg-12">
						
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
								<input type="text" step="1" class="form-control input-sm gross" name="numofcartons-air">
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
								<input type="text"  class="form-control input-sm total-storage" >
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

					<!-- Add Charges -->

					<div class="hidden pill-charges-air-add table-editable col-lg-12">
						
						<div class="form-group">
								<span class='numbers_only'></span>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>Lodgement Fee</label>
								<input type="decimal" name="lodge" class="form-control input-sm checkDec-air" id="lodge-air"/>
							</div>

							<div class="form-group">
								<label>Container Deposit</label>
								<input type="text" name="cont-deposit" class="form-control input-sm checkDec-air" id="cont-deposit-air"/>
							</div>

							<div class="form-group">
								<label>THC Charges</label>
								<input type="text" name="thc-charges" class="form-control input-sm checkDec-air" id="thc-charges-air" />
							</div>

							<div class="form-group">
								<label>Arrastre </label>
								<input type="text" name="arrastre" class="form-control input-sm checkDec-air" id="arrastre-air" />
							</div>

							<div class="form-group">
								<label>Wharfage</label>
								<input type="text" name="wharfage" class="form-control input-sm checkDec-air" id="wharfage-air" />
							</div>

							<div class="form-group">
								<label>Weighing</label>
								<input type="text" name="weight" class="form-control input-sm checkDec-air" id="weight-air"/>
							</div>

							<div class="form-group">
								<label>DEL</label>
								<input type="text" name="del" class="form-control input-sm checkDec-air" id="del-air"/>
							</div>

							<div class="form-group">
								<label>Dispatch Fee</label>
								<input type="text" name="dispatch" class="form-control input-sm checkDec-air" id="dispatch-air" />
							</div>

							<div class="form-group">
								<label>Storage</label>
								<input type="text" name="storage" class="form-control input-sm checkDec-air" id="storage-air"/>
							</div>

							


						</div>
							

						<div class="col-lg-6">

								<div class="form-group">
									<label>Demurrage</label>
									<input type="text" name="demurrage" class="form-control input-sm checkDec-air" id="demurrage-air" />
								</div>
							
								<div class="form-group">
									<label>Detention</label>
									<input type="text" name="detention" class="form-control input-sm checkDec-air"  id="detention-air"/>
								</div>
								
								<div class="form-group">
									<label>EIC</label>
									<input type="text" name="EIC" class="form-control input-sm checkDec-air" id="EIC-air" />
								</div>

								<div class="form-group">
									<label>BAI Application</label>
									<input type="text" name="bai-app" class="form-control input-sm checkDec-air" id="bai-app-air" />
								</div>

								<div class="form-group">
									<label>BAI Inspection</label>
									<input type="text" name="bai-inspect" class="form-control input-sm checkDec-air" id="bai-inspect-air"/>
								</div>

								<div class="form-group">
									<label>SRA Application</label>
									<input type="text" name="sra-app" class="form-control input-sm checkDec-air" id="sra-app-air"/>
								</div>

								<div class="form-group">
									<label>SRA Inspection</label>
									<input type="text" name="sra-inspect" class="form-control input-sm checkDec-air" id="sra-inspect-air"/>
								</div>

								<div class="form-group">
									<label>Bad Cargo</label>
									<input type="text" name="bad-cargo" class="form-control input-sm checkDec-air" id="bad-cargo-air"/>
								</div>
								

						</div>
					</div>

				  </div>
    			</div>
    		 </div>
    	</div>

    <div class="footer-modal" >
    	<hr>
    	 <button type="button" class=" hidden btn btn-danger btn-Back-air" >Back</button>
      <button type="button" class="btn btn-danger btn-Next-air submit_jobfile-air" >Next</button>
      <button type="button" class="hidden btn btn-danger btn-save-air test_data-air save_charge-air" >Save</button>
      <button type="button" class="btn btn-danger btn-cancel-air" data-dismiss="modal">Cancel</button>
    </div>
</div>


<script src="<?php echo base_url('resources/js/air_add_data.js');?>"></script>


<script>
	
	 $(document).ready(function () {
              //called when key is pressed in textbox
              $("#cartons-air").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg-air").html("Numbers Only").show().fadeOut("slow");
                           return false;
                }
               });

             $(document).on('change',' .checkDec-air',function(){
			 		var inp = $(this).val();
			 		var newInp = inp.replace(/,/g,'');
			 		var holder = $(this).attr('id');
			 		var holders = newInp.toString().split('.');
			 		var n = newInp.indexOf('.');
			 		if(n < 0){
			 			holders[0] =  numeral(holders[0]).format('0,0.00');
			 			$('#' + holder).val(holders.join('.'));
			 		}else{
			 			holders[0] =  numeral(holders[0]).format('0,0');
			 			holders[1] =  numeral("0." + holders[1]).format('.000');
			 			$('#' + holder).val(holders.join(''));
			 		}
			 		if(inp.trim() == ""){
			 			$('#' + holder).val('0.00');
			 		}
			 	});
       });





</script>

<script>
function myjob_air_add(jbfl){
  	//for search
    if(jbfl==''){
   	$('.check_jobfiles-air').empty();
   }else{
    		 	$.ajax({
		           method: "GET",
	 		       url: "<?php echo base_url('Job_availability/check_air');?>",
			  	   beforeSend: function() {
							$('.check_jobfiles-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   	           jobfile   		   :jbfl
			  	   		 }
	              })
					.done(function(data) {
						
						$('.check_jobfiles-air').html(data);
	  		    });
}
}
</script>