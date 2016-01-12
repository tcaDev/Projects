<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">update New Commodity(s)</h4>
        </div>
	        <div class="modal-body">
	        		<!-- Product Adding Table-->
						<div id="table-updateTruck-air" class=" table-editable">
						
						<div class="col-lg-6">
							
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
								<input type="text" step="1" class="form-control input-sm gross" id="cartons-air" name="numofcartons-air">
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
												<?php foreach($hauler_data as $row){ ?>
													 <option value="<?php echo $row->HaulerOrTruckId?>">
													 <?php echo stripslashes($row->HaulerOrTruck);?>
													 </option>
													<?php }?> 
										</select>
									</div>


							<div class="form-group">
								<label>Total Storage</label> <span id="errmsg-air" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm total-storage" id="cartons-air" name="numofcartons-air">
							</div>

							<div class="form-group">
								<label>Additional Per day Include VAT</label> <span id="errmsg-air" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm addtl-per-day" id="cartons-air" name="numofcartons-air">
							</div>


							<div class="form-group">
								<label>Reference Entry No.</label>
								<input type="text" step="1" class="form-control input-sm ref-entry-no-air" id="cartons-air" name="numofcartons-air">
							</div>
							
						</div>
					</div>

					<div style="width: 100%; overflow-x: auto;"> </div>
	        </div>

        <div class="modal-footer" >
	       	 <button type="button" class="btn btn-danger submit_vessel-update">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>
