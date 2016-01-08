<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Update Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="col-lg-12 pill-jobfile-mnla-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="1" name="monitoring_type" class="monitoring_type"/>


				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span id="check_jobfiles"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles" name="jbfl" id="jbfl" onkeyup="myjob(this)">
								 <i class="jobfile-msg" style="color:red;"></i>
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check" style="color:red;"></span></label> 
								  		<select name="shipper"  class="form-control input-sm shipper ">
							            	<option> </option>
							            	<?php  foreach($shipper_data as $row){  ?> 
							                <option value="<?php echo $row->ShipperId ?>">
							                <?php echo stripslashes($row->ShipperName) ?>
							                </option> 
							             	<?php }?>
						               	</select>
						            <i class="shipper-msg"  style="color:red;"></i>
						      </div>

						     <div class="form-group">
								  <label for="consignee">Consignee:<i style="color:red;">*</i></label> 
								  		<select name="consignee" class="form-control input-sm consignee">
								  			<option> </option>
							            	<?php  foreach($consignee_data as $row){  ?> 
							                <option value="<?php echo $row->ConsigneeId ?>">
							                <?php echo stripslashes($row->ConsigneeName) ?>
							                </option> 
							             	<?php }?>
							            </select>
							            <i class="consignee-msg" style="color:red;" style="color:red;"></i>
							   </div>
								   	
				           	

				           	<div class="form-group">
								<label>Color Stages</label> 									<select name="colors" class="form-control colsel input-sm" >
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

				           </div>
					
						<!-- 		<div class="form-group">
								  <label for="pipo">PI / PO No.:</label>
								  <input type="text" class="form-control input-sm" name="pipo" id="pipo">
								 </div> -->

								<div class="form-group">

								  <label for="hbl">House Bill of Lading No.:</label><i style="color:red;">*</i>
								  <input type="text" class="form-control input-sm hbl" name="hbl" id="hbl">
								  <i class="colsel-msg" style="color:red;"></i>
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 1.:</label>
								  <input type="text" class="form-control input-sm mbl" name="mbl" id="mbl">
								 </div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 2.:</label>
								  <input type="text" class="form-control input-sm mbl2" name="mbl2" placeholder="Optional" id="mbl2">
								</div>

								

			

						</div>

					<div class="col-lg-4">

						<div class="form-group">
									  <label for="bank">Letter of Credit No. from Bank:</label>
									  <input type="text" class="form-control input-sm bank" name="bank" id="bank">
									</div>

									<div class="form-group">
									  <label for="registry">Registry:</label>
									  <input type="text" class="form-control input-sm registry" name="registry" id="registry">
									</div>

									<div class="form-group ">
										<label>Origin Country</label><i style="color:red;">*</i>
											<select  class="form-control origin" name="countries">
												<?php foreach($countries as $row){ ?>
												 <option value="<?php echo $row->CountryId?>">
												 <?php echo $row->CountryName;?>
												 </option>
												<?php }?> 
											</select>	

											<i class="origin-msg" style="color:red;"></i>
								   </div>

								<div class="form-group">
									<label>Origin City</label>
									<input type="text" name="origcity" class="form-control input-sm origcity" />
								</div>

							
								

								<div class="form-group">
								  <label for="dtRcvd">Date Received Arrival Notice From Client / SLINE:</label>
								  <input type="date" name="dtRcvd" class="form-control input-sm dtRcvd" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Received O-BL:</label>
								  <input type="date" name="dt_pickup_obl" class="form-control input-sm dt_pickup_obl" >
								</div>

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Received Other Document :</label>
								  <input type="date" name="dt_pickup_docs" class="form-control input-sm dt_pickup_docs" >
								 </div>
								 	
				  			</div>

							<div class="col-lg-4" >

							 <div class="form-group">
									 <label for="broker">Broker:</label>
							  			<select name="broker"id="Broker"class="form-control input-sm broker">
							            	<?php  foreach($broker_data as $row){  ?> 
							                <option value="<?php echo $row->BrokerId ?>">
							                <?php echo stripslashes($row->FirstName) . " " . stripslashes($row->MiddleName) . " " . stripslashes($row->LastName); ?>
							                </option> 
							             	<?php }?>
						               </select>
						          </div>
						           <div class="form-group">
						              <label for="dtPckRcv">Purchase Order No.</label>
								      <input type="text"  class="form-control input-sm dt_pickup_docs" id="purch_order_no">

						           </div>

						           <div class="form-group">
						               <label for="dtReq">Date Request Budget to GL:</label>
									   <input type="date" name="dt_req_budget" class="form-control input-sm" id="dt_req_budget">
								  </div>

						         
								<div class="form-group">
									 <label for="rfp">Reference Due Date:</label>
									 <input type="date" name="ref_due_dt" class="form-control input-sm " id="ref_due_dt">
								 </div>
								 


						<div class="form-group">
									<label>Color Selectivity :</label>
									<select name="color-select" id="color-select" class="form-control input-sm color-select">
											<?php foreach($color_selectivity as $row){ ?>
												 <option value="<?php echo $row->ColorSelectivityId?>">
												 <?php echo $row->ColorSelectivityName;?>
												 </option>
												<?php }?> 
									</select>
								</div>

								 <div class="form-group">
								   <label for="status">Status Report:</label>
								  	<textarea name="status" rows="5" class="form-control input-sm status" id="status"></textarea>
								 </div>
				  			</div>
				  		</div>
				  </div>
    </div>

    <div class="footer-modal" >
    <hr>
      <button type="submit" class="btn btn-danger btn-Save-update" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
<?php echo form_close();?>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel-update').change(function(){
  var status = $(this).val();
  var color = $('.colsel-update option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-update').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-update').css({'background-color': color,'color': 'white'});
  	}
 });

</script>



