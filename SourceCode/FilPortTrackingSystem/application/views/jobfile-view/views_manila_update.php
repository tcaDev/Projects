<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
    <div class="modal-header" style="background-color: deepskyblue;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title text-uppercase">Update Data Form</h4>
    </div>

    <div class="modal-body" >
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile" class="active"><a role="button">Jobfile</a></li>
			    <li id="btn-container"><a role="button">Container</a></li>
			    <li id="btn-truck"><a role="button">Truck / Plate</a></li>
			    <li id="btn-charges"><a role="button">Running Charges</a></li>
			  </ul>
    	<hr>
    	<div style="overflow-x:auto;">
    		<div class="container-fluid">
		    	<form role="form">
			    	<div class="pill-jobfile col-lg-12 col-md-12">
			   			<div class="row">
			   				<div class="col-lg-4 col-md-4">
			   					
			   						<input type="hidden" value="1" name="monitoring_type" id="manila"/>
			  				
					  				<label for="jbfl">JobFile No.:</label>
									<input type="text" class="form-control input-sm " name="jbfl" id="jbfl">

								   	<label for="shipper">Shipper:</label>
							  		<select name="shipper" id="shipper" class="form-control">
						            	<option> </option>
						            	<?php  foreach($shipper_data as $row){  ?> 
						                <option value="<?php echo $row->ShipperId ?>">
						                <?php echo $row->ShipperName ?>
						                </option> 
						             	<?php }?>
					               	</select>

								   	<label for="consignee">Consignee:</label>
							  		<select name="consignee" class="form-control">
							  			<option> </option>
						            	<?php  foreach($consignee_data as $row){  ?> 
						                <option value="<?php echo $row->ConsigneeId ?>">
						                <?php echo $row->ConsigneeName ?>
						                </option> 
						             	<?php }?>
						            </select>
						             <label for="cnts">Number of Cartons:</label>
									  <input type="text" class="form-control input-sm" name="cartoons" id="cnts">

									  <label for="cntr">Container Size:</label>
									  <input type="text" class="form-control input-sm" name="container" id="cntr">

									  <label for="pipo">PI / PO No.:</label>
									  <input type="text" class="form-control input-sm" name="pipo" id="pipo">

									  <label for="hbl">House Bill of Landing No.:</label>
									  <input type="text" class="form-control input-sm" name="hbl" id="hbl">

									  <label for="mbl">Master Bill of Landing No1.:</label>
									  <input type="text" class="form-control input-sm" name="mbl" id="mbl">

									  <label for="mbl">Master Bill of Landing No2.:</label>
									  <input type="text" class="form-control input-sm text-uppercase" name="mbl2" placeholder="optional" id="mbl2">

									  <label for="origin">Origin:</label>
									  <input type="text" class="form-control input-sm" name="origin" id="origin">

									  <label for="etd">Estimated Time of Departure:</label>
									  <input type="datetime-local" class="form-control input-sm" name="etd">

									 
			   					
			   				</div>

			   				<div class="col-lg-4 col-md-4">
			   						
			   						 <label for="eta">Estimated Time of Arrival:</label>
									  <input type="datetime-local" class="form-control input-sm" name="eta">
									  
			   						 <label for="AVT">AVT:</label>
									  <input type="datetime-local" class="form-control input-sm" name="avt">

									  <label for="ata" data-toggle="tooltip" title="Actual Time of Arrival">Actual Time of Arrival:</label>
									  <input type="datetime-local" class="form-control input-sm" name="ata">

					  				  <label for="bank">Letter of Credit No. from Bank:</label>
									  <input type="text" class="form-control input-sm " name="bank" id="bank">

									  <label for="dem">Start of Demorage:</label>
									  <input type="datetime-local" class="form-control input-sm" name="start_demorage">

									  <label for="storage">Start Storage:</label>
									  <input type="datetime-local" class="form-control input-sm" name="start_storage">

									  <label for="registry">Registry:</label>
									  <input type="text" class="form-control input-sm" name="registry" id="registry">
			<!-- -->
									  <label for="vsl">Vessel / Voyage No.:</label>
									  	<div id="vesel">
									  		<select name="vessel" />
									  			<option></option>
									  		</select>
									  	</div>
									  
										  <div class="tab_manila hidden"> 	
											  <label for="carrier">Carrier:</label>
											  <input type="text" name="carrier" class="  form-control input-sm" id="carrier">
										  </div>
									  <label for="dtRcvd">Date Recieved Arrival Notice From Client / SLINE:</label>
									  <input type="datetime-local" name="dtRcvd" class="form-control input-sm" name="">

									  <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>
									  <input type="datetime-local" name="dt_pickup_obl" class="form-control input-sm" name="">

									  <label for="dtPckRcv">Date Pick-up / Recieved Other Docs :</label>
									  <input type="datetime-local" name="dt_pickup_docs" class="form-control input-sm" name="">
				  			</div>

				  			<div class="col-lg-4" >
								  <label for="broker">Broker:</label>
						  			<select name="broker" id="vsl"class="form-control">
						            	<?php  foreach($broker_data as $row){  ?> 
						                <option value="<?php echo $row->BrokerId ?>">
						                <?php echo $row->FirstName . " " . $row->MiddleName . " " . $row->LastName; ?>
						                </option> 
						             	<?php }?>
					               </select>

								  <label for="dtReq">Date Required Budget to GL:</label>
								  <input type="date" name="dt_req_budget" class="form-control input-sm" id="dtReq">


				  				 <label for="rfp">Reference Due Date:</label>
								 <input type="date" name="ref_due_dt" class="form-control input-sm " id="rfp">

								 <label for="dtSent">Date Sent Pre-Assess:</label>
								 <input type="date" name="dt_sent_preassed" class="form-control input-sm" id="dtSent">

								 <label for="dtFile">Date File Entry to BOC:</label>
								 <input type="date" name="dt_file_entry_boc" class="form-control input-sm" id="dtFile">

								 <label for="slctvty">Color Selectivity:</label>
					  				<select class="form-control" id="colsel">
							          	<option  name="colors" value="" disabled selected>Jobfile Status</option>
										<?php  foreach($color_data as $row){ 
										   $status = $row->StatusName;
										   if($status=='Red Font'){?> 
										   			<option  data-color='<?php echo $row->ColorCode;?>' style="color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">					
									 <?php }else{?>
						                			<option data-color='<?php echo $row->ColorCode;?>'style="background-color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">
						                <?php }?>
						                <?php echo $row->StatusName; ?>
						                </option> 
						             	<?php }?>
							        </select>

								  <label for="dtPaid">Date Paid(Date& Time):</label>
								  <input type="datetime-local" name="dt_paid" class="form-control input-sm">

								  <label for="dtClrd">Date Cleared BOC:</label>
								  <input type="datetime-local" name="dt_boc" class="form-control input-sm">

								   <label for="dtClrd">Reference Entry No.:</label>
								  <input type="text" name="entryno" class="form-control input-sm">
								   <label for="dtClrd">Registry:</label>
								  <input type="text" name="reg" class="form-control input-sm">
								  	<label for="dtClrd">Letter Credit From Bank:</label>
								  <input type="text" name="letter_cred_bank" class="form-control input-sm">
				  			</div>
			   			</div>
			    	</div>
				</form>
			 </div>
    	</div>
	    	
		 </div>
	</div>


    <div class="footer-modal">
    	<hr>
   	  <button type="button" class="btn btn-danger" data-dismiss="modal">Update</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>

  </div>