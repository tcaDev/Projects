<meta http-equiv="Refresh" content="1200">

<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile-mnla-add" class="active"><a role="button">Jobfile</a></li>
			     <li id="btn-vessel-mnla-add"><a role="button">Vessel</a></li>
			    <li id="btn-container-mnla-add"><a role="button">Container</a></li>
			    <li id="btn-truck-mnla-add"><a role="button">Description of Goods</a></li>
			    <li id="btn-charges-mnla-add"><a role="button">Running Charges</a></li>
			  </ul>
    	<hr>
    		<div class="container-fluid">


		      	<div class="form-group">
				  <div class="col-lg-12 pill-jobfile-mnla-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="1" name="monitoring_type" id="manila"/>


				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span id="check_jobfiles"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles" name="jbfl" id="jbfl" onkeyup="search_jobfile(this)">
								 <i class="jobfile-msg" style="color:red;"></i>
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check"></span></label> 
								  		<select name="shipper"  class="form-control input-sm shipper ">
							            	<option> </option>
							            	<?php  foreach($shipper_data as $row){  ?> 
							                <option value="<?php echo $row->ShipperId ?>">
							                <?php echo $row->ShipperName ?>
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
							                <?php echo $row->ConsigneeName ?>
							                </option> 
							             	<?php }?>
							            </select>
							            <i class="consignee-msg" style="color:red;"></i>
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

								<div class="form-group">
								  <label for="bank">Letter of Credit No. from Bank:</label>
								  <input type="text" class="form-control input-sm bank" name="bank" id="bank">
								</div>

								<div class="form-group">
								  <label for="registry">Registry:</label>
								  <input type="text" class="form-control input-sm registry" name="registry" id="registry">
								</div>
						</div>

					<div class="col-lg-4">
								

								<div class="form-group">
								  <label for="dtRcvd">Date Received Arrival Notice From Client / SLINE:</label>
								  <input type="datetime-local" name="dtRcvd" class="form-control input-sm dtRcvd" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Received O-BL:</label>
								  <input type="datetime-local" name="dt_pickup_obl" class="form-control input-sm dt_pickup_obl" >
								</div>

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Received Other Document :</label>
								  <input type="datetime-local" name="dt_pickup_docs" class="form-control input-sm dt_pickup_docs" >
								 </div>
								 	

								 <div class="form-group">
									 <label for="broker">Broker:</label>
							  			<select name="broker"id="Broker"class="form-control input-sm broker">
							            	<?php  foreach($broker_data as $row){  ?> 
							                <option value="<?php echo $row->BrokerId ?>">
							                <?php echo $row->FirstName . " " . $row->MiddleName . " " . $row->LastName; ?>
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
									   <input type="date" name="dt_req_budget" class="form-control input-sm" id="dtReq">
								  </div>

						         
								<div class="form-group">
									 <label for="rfp">Reference Due Date:</label>
									 <input type="date" name="ref_due_dt" class="form-control input-sm " id="rfp">
								 </div>
				  				



								  <!--  <label for="" >Hauler</label>
								   <select name="hauler" class="form-control">
							  			<option> </option>
						            	<?php  //foreach($hauler_data as $row){  ?> 
						                <option value="<?php //echo $row->HaulerId ?>">
						                <?php //echo $row->HaulerName ?>
						                </option> 
						             	<?php //}?>
						            </select> -->

				  			</div>

							<div class="col-lg-4" >
								 


								 <div class="form-group">
									 <label for="dtSent">Date Sent Pre-Assess:</label>
									 <input type="date" name="dt_sent_preassed" class="form-control input-sm" id="dtSent-preassess">
								</div>

								<div class="form-group">
									 <label for="dtFile">Date File Entry to BOC:</label>
									 <input type="date" name="dt_file_entry_boc" class="form-control input-sm" id="dtFile">
								</div>

								<div class="form-group">
								 	<label for="dtSent">Date Sent Final-Assess:</label>
								 	<input type="date" name="dt_sent_finalassed" class="form-control input-sm" id="dtfinal-assess">
								</div>

								<div class="form-group">
								 	<label for="dtClrd">Reference Entry No.:</label><i style="color:red;">*</i>
								 	<input type="text" name="entryno" class="form-control input-sm reference" id="entryno">
								 	<i class="reference-msg" style="color:red;"></i>
								</div>

								<div class="form-group">
									<label>Color Selectivity :</label>
									<select name="color-select" id="color-select" class="form-control input-sm color-select">
										<option value="1">YELLOW</option>
										<option value="2">RED</option>
										<option value="3">GREEN</option>
									</select>
								</div>

							     <div class="form-group">
								 	 <label for="dtPaid">Date Paid(Date& Time):</label>
									  <input type="datetime-local" name="dt_paid" class="form-control input-sm " id="dt_paid">
								 </div>

								 <div class="form-group">
								   <label for="status">Status Report:</label>
								  	<textarea name="status" rows="5" class="form-control input-sm status" id="status"></textarea>
								 </div>
				  			</div>
				  		</div>
				  </div>

				<!-- Products PLATE WINDOW-->
				  	<div id="tableAddTruck-mnla" class="hidden pill-truck-mnla-add truck-editable col-lg-12">

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
								<select class="form-control input-sm prodname" name="prodname">
									<?php foreach($products as $row){ ?>
											 <option value="<?php echo $row->ProductId?>">
											 <?php echo $row->ProductName;?>
											 </option>
											<?php }?> 
								</select> 
								<i class="prodname-msg" style="color:red;"></i>
							</div>

<!-- 						<div class="form-group">
								<label>Purchase Order Number</label> <i style="color:red;">*</i>
								<input type="text" class="form-control input-sm PON"  name="PON">
								<i class="pon-msg" style="color:red;"></i>
							</div>
 -->
							<div class="form-group">
								<label>Container Number</label>
								<select class="containers-prod form-control input-sm"> 

								</select>
								
		
							</div>

							
				  		</div>

				  		<div class="col-lg-6">
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

							

							<button type="button" class="btn-Add-Product-Data-mnla btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Add Product</button>
				  			

				  		</div>

				  		<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 1000px;" border="1">
							    <thead>
							    	 <tr>
							    	 	<th class="hidden">Product Value</th>
								        <th>Product Name</th>
								        <th>Container</th>
								        <th class="hidden">Origin Value</th>
								        <th>Origin Country ID</th>
								        <th>Origin City</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>
					</div>

		<!--container plate is no names yet -->
				<!--CONTAINER WINDOW-->
				  	<div id="tableAddContainer-mnla" class="hidden pill-container-mnla-add table-editable ">

				  	 	
					  	<div class="col-lg-6">
				  			<div class="form-group">
								<label>Container Number</label>
							     
					        		<input type="text" class="containerss form-control input-sm">
							
					        	
							</div>

							<div class="form-group">
								<label>Container Size</label>
							     
					        		<input type="text" class="containerss-size form-control input-sm">
								
					        	
							</div>

							

							

						
							<div class="form-group">
								<label>Number of Cartons</label> <span id="errmsg" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm cartons" id="cartons" name="numofcartons">
							</div>

				
						    <div class="form-group">
								<label>Hauler/Truck Name</label>
								<select class="form-control truckname" >
										<?php foreach($hauler_data as $row){ ?>
											 <option value="<?php echo $row->HaulerOrTruckId?>">
											 <?php echo $row->HaulerOrTruck;?>
											 </option>
											<?php }?> 
								</select>
							</div>

							<div class="form-group">
								<label>Trucker Plate No.</label>
								<input type="text" name="trckplte" class="form-control input-sm plate" />
								
							</div>

							<div class="form-group">
								<label>Estimated Departure Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm est-dept" />
							</div>

							<div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-arr" class="form-control input-sm est-arr" />
							</div>

							
							<div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="act-arr" class="form-control input-sm act-arr" />
							</div>

							<div class="form-group">
								<label>Vessel/Voyage #</label>
								<select class="containers-vessel form-control input-sm"> 

								</select>
								
		
							</div>


					  	</div>
					  	
				  			



					  	<div class="col-lg-6">

					  		

					  		<div class="form-group">
								<label>Start of Storage</label>
								<input type="datetime-local" name="strtstrge" class="form-control input-sm storage" />
							</div>

							<div class="form-group">
								<label>Start of Demurrage </label>
								<input type="datetime-local" name="strtdmrage" class="form-control input-sm demorage" />
							</div>

							<div class="form-group">
								<label>Lodging</label>
								<input type="datetime-local" name="lodging" class="form-control input-sm lodging" />
							</div>

							<!-- <div class="form-group">
								<label>Hauler</label>
								<input type="text" name="lodge" class="form-control input-sm" />
							</div> -->

							<div class="form-group">
								<label>Target Delivery Date</label>
								<input type="datetime-local" name="trgtdeldt" class="form-control input-sm trgtdeldt" />
							</div>

							<div class="form-group">
								<label>Gate In at Port</label>
								<input type="datetime-local" name="gtinport" class="form-control input-sm gtinport" />
							</div>

							<div class="form-group">
								<label>Gate Out at Port</label>
								<input type="datetime-local" name="gtoutport" class="form-control input-sm gtoutport" />
							</div>

							<div class="form-group">
								<label>Actual Delivery at Warehouse</label>
								<input type="datetime-local" name="act-del-whse" class="form-control input-sm act-del-whse" />
							</div>

							<div class="form-group">
								  	<label for="dtClrd">Date Cleared BOC:</label>
								  	<input type="datetime-local" name="dt_boc" class="form-control input-sm dt_boc" id="dt_boc">
							</div>

							<button type="button" class="btn-Add-Container-Data-mnla btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
					  		<i class="table-msg" style="color:red;"></i>

					  	</div>

					  	<div style="width: 100%; overflow-x: auto;">
					    <table class="table" style="width: 3000px;" border="1">
					      <thead>
						      <tr>
						      	<th>Container Number</th>
						      	<th>Container Size</th>
						      	
						        <th>Number of Cartons</th>
						        <th>Trucker Plate No.</th>
						        <th>Trucker Name</th>
						        <th>Estimated Departure Time</th>
						        <th>Estimated Arrival Time</th>
						        <th>Actual Arrival Time</th>
						        <th>Vessel/Voyage #</th>
						        <th>Start of Storage</th>
						        <th>Start of Demurrage </th>
						        <th>Lodging</th>
						        <!-- <th>Hauler</th> -->
						        <th>Target Delivery Date</th>
						        <th>Gate In at Port</th>
						        <th>Gate Out at Port</th>
						        <th>Actual Delivery at Warehouse</th>
						        <th>Date Cleared BOC</th>
						        <th></th>
						      </tr>
					      </thead>
					    </table>
					</div>


					</div>


					<div id="tableAddVessel-mnla" class="hidden pill-vessel-mnla-add table-editable col-lg-12">
						
						<div class="col-lg-6">
							<div class="form-group">
								<label>Vessel/Voyage #</label> 
								<input type="text" class="form-control input-sm vessel" id="vessel" name="vessel">
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Actual Verting Time of Vessel</label>
								 	<input type="datetime-local" name="ves_arrival_time" class="form-control input-sm vat">
								 </div>

							
						</div>

						<div class="col-lg-6">

							<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt">
							 </div>

							 <div class="form-group">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control carrier" name="countries">
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo $row->CarrierName;?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg" style="color:red;"></i>
							</div>

							<button type="button" class="btn-Add-Vessel-Data-mnla btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Add Vessel</button>
						</div>
					

						<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 1000px;" border="1">

							    <thead>
							    	 <tr>
								        <th>Vessel/Voyage #</th>
								        <th>Actual Verting Time of Vessel</th>
								        <th>Discharge Time of Vessel</th>
								        <th class="hidden">Vessel Value</th>
						       			<th>Shipping Lines / Carrier</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>

					</div>

					<div class="hidden pill-charges-mnla-add table-editable col-lg-12">
						
						<div class="col-lg-6">
							<div class="form-group">
								<label>Lodgement Fee</label>
								<input type="text" name="lodge" class="form-control input-sm" id="lodge"/>
							</div>

							<div class="form-group">
								<label>Container Deposit</label>
								<input type="text" name="cont-deposit" class="form-control input-sm" id="cont-deposit"/>
							</div>

							<div class="form-group">
								<label>THC Charges</label>
								<input type="text" name="thc-charges" class="form-control input-sm" id="thc-charges" />
							</div>

							<div class="form-group">
								<label>Arrastre </label>
								<input type="text" name="arrastre" class="form-control input-sm" id="arrastre" />
							</div>

							<div class="form-group">
								<label>Wharfage</label>
								<input type="text" name="wharfage" class="form-control input-sm" id="wharfage" />
							</div>

							<div class="form-group">
								<label>Weighing</label>
								<input type="text" name="weight" class="form-control input-sm" id="weight"/>
							</div>

							<div class="form-group">
								<label>DEL</label>
								<input type="text" name="del" class="form-control input-sm" id="del"/>
							</div>

							<div class="form-group">
								<label>Dispatch Fee</label>
								<input type="text" name="dispatch" class="form-control input-sm" id="dispatch" />
							</div>

							<div class="form-group">
								<label>Storage</label>
								<input type="text" name="storage" class="form-control input-sm" id="storage"/>
							</div>

							<div class="form-group">
									<label>Demurrage</label>
									<input type="text" name="demurrage" class="form-control input-sm" id="demurrage" />
								</div>


						</div>
							

						<div class="col-lg-6">
							
								<div class="form-group">
									<label>Detention</label>
									<input type="text" name="detention" class="form-control input-sm"  id="detention"/>
								</div>
								
								<div class="form-group">
									<label>EIC</label>
									<input type="text" name="EIC" class="form-control input-sm" id="EIC" />
								</div>

								<div class="form-group">
									<label>BAI Application</label>
									<input type="text" name="bai-app" class="form-control input-sm" id="bai-app" />
								</div>

								<div class="form-group">
									<label>BAI Inspection</label>
									<input type="text" name="bai-inspect" class="form-control input-sm" id="bai-inspect"/>
								</div>

								<div class="form-group">
									<label>SRA Application</label>
									<input type="text" name="sra-app" class="form-control input-sm" id="sra-app"/>
								</div>

								<div class="form-group">
									<label>SRA Inspection</label>
									<input type="text" name="sra-inspect" class="form-control input-sm" id="sra-inspect"/>
								</div>

								<div class="form-group">
									<label>Bad Cargo</label>
									<input type="text" name="bad-cargo" class="form-control input-sm" id="bad-cargo"/>
								</div>

								<div style="text-align:right;">
									<button type="button" class="btn btn-primary "><span class=" fa fa-th-list fa-fw"></span> Particular Charges</button>
									<button type="button" class="btn btn-primary "><span class=" fa fa-th-list fa-fw"></span> All Charges</button>	
								</div>
								

						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>

    <div class="footer-modal" >
    <hr>
 <!--     <button type="button" class="btn btn-danger container_insert">test insert</button> -->
      <button type="button" class="btn btn-danger btn-Next submit_jobfile" >Next</button>
      <button type="button" class="hidden btn btn-danger test_data save_charges" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel').change(function(){
  var status = $(this).val();
  var color = $('.colsel option:selected').attr('data-color');
    if(status==1){
    	$('.colsel').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel').css({'background-color': color,'color': 'white'});
  	}
 });

</script>


  <script>
	$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip(); 

		/*
		* Show Container
		*/

		$('#btn-container-mnla-add').on('click',function(){
			
			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg').text("Need Reference Entry No.");
			}
			else{
				

			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-charges-mnla-add').removeClass('active');
			$('#btn-vessel-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').removeClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');
				i=2;}


			

		});

		/*
		* Show Truck
		*/

		$('#btn-truck-mnla-add').on('click',function(){

			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg').text("Need Reference Entry No.");
			}
			else{

				
					$(this).addClass('active');
					$('#btn-jobfile-mnla-add').removeClass('active');
					$('#btn-container-mnla-add').removeClass('active');
					$('#btn-charges-mnla-add').removeClass('active');
					$('#btn-vessel-mnla-add').removeClass('active');

					$('.pill-jobfile-mnla-add').addClass('hidden');
					$('.pill-truck-mnla-add').removeClass('hidden');
					$('.pill-charges-mnla-add').addClass('hidden');
					$('.pill-container-mnla-add').addClass('hidden');
					$('.pill-vessel-mnla-add').addClass('hidden');
					$('.test_data').addClass('hidden');

					$('.btn-Next').removeClass('hidden');

					i=3;
				
			};
		});

		/*
		* Show Charges
		*/

		$('#btn-charges-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-vessel-mnla-add').removeClass('active');
			$('.test_data').removeClass('hidden');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').removeClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').addClass('hidden');

			$('.btn-Next').addClass('hidden');
		});

		/*
		* Show Jobfile
		*/

		$('#btn-jobfile-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-vessel-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').removeClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

			i=0;
		});

		/*
		* Next Button
		*/

		var i=0;

		$(".btn-Next").click(function(){
			
			 if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg').text("Need Reference Entry No.");
			}
			else if($('#check_jobfiles').text() == "Jobfile already exists")
			{
				$('.jobfile-msg').text("Can't Proceed Jobfile Already Exists");
			}
			else{i++;}

			
				   

			/*Next Page*/
			if(i==2){
				  insert_vessel();
				$("#btn-container-mnla-add").click();
			}else if(i==3){
			 		ins_contain();
				$("#btn-truck-mnla-add").click();
			}else if(i==4){

				ins_description();
				$("#btn-charges-mnla-add").click();
			}
			else if(i==1){
    				insert_job();
				$("#btn-vessel-mnla-add").click();
			}

		});


		$('#btn-vessel-mnla-add').on('click',function(){
			
			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg').text("Need Reference Entry No.");
			}
			else{

			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-charges-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');


			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').removeClass('hidden');

			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');
				i=1;}

		});

});

</script>


<script>
 function search_jobfile(jobfile){
   jobfile = jobfile.value; 

   			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/check_jobfile');?>",
			  		data: { jobfile:jobfile}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles').html(data);
				});

 }

</script>

<script>
//for  getting the vessel based on shipper
/*$(document).ready(function(){

		
 var jobfile= $('.jobfiles').val();

			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/carrierjobfile');?>",
			  		 data: {jbfl-vessel:jobfile}
				})
		  		.done(function(data) {
		  		 $('.containers-vessel').html(data);	
		  			
		  		
		  		});


});*/
</script>


<script type="text/javascript">        
            $(document).ready(function () {
              //called when key is pressed in textbox
              $("#cartons").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Numbers Only").show().fadeOut("slow");
                           return false;
                }
               });


                $(".num_only").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg").html("Numbers Only").show().fadeOut("slow");
                           return false;*/
                           alert('Numbers Only');
                           return false;
                }
               });
            });

            </script>

<script>
	
	$(function(){
  
    
   /* $(".deleteButton").click(function(){
        $(this).closest("tr").remove();
    });*/

    $('#tableAddContainer-mnla').on('click', '.deleteButton', function() {

    	var del = $(this).closest('tr').children('td:eq(0)').text();

      	$("#tableAddTruck-mnla .containers-prod").find("option[value="+ del +"]").remove();

    	$(this).closest("tr").remove();
    	
    	/*$(".containers-prod option[value='1']").remove();*/

  		  

	});

	$('#tableAddTruck-mnla').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

	});

		$('#tableAddVessel-mnla').on('click', '.deleteButton', function() {

		var del = $(this).closest('tr').children('td:eq(0)').text();

      	$("#tableAddContainer-mnla .containers-vessel").find("option[value="+ del +"]").remove();


    	$(this).closest("tr").remove();

	});
});
	$(document).ready(function(){

			var testme=false;
				function isExist(strd){

				var table = $("#tableAddContainer-mnla table tbody");

				    testme=false;
				 	  table.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===strd) {
					       testme=true;            
					        }   
					     })
				    return testme;
				}

				

		$(".btn-Add-Container-Data-mnla").click(function(){

			var compare = $('#tableAddContainer-mnla .containerss').val();
			

			if(isExist($('#tableAddContainer-mnla .containerss').val()))
			{	
				$('.container-msg').text("Container Number Already Exists.");
			}
			
			else{

	       $('#tableAddContainer-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       
	        $('#tableAddContainer-mnla table tr:last td:nth-child(1)').html($(".containerss").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(2)').html($(".containerss-size").val());
	       
	        $('#tableAddContainer-mnla table tr:last td:nth-child(3)').html($(".cartons").val());
	         $('#tableAddContainer-mnla table tr:last td:nth-child(4)').html($(".plate").val());
	          $('#tableAddContainer-mnla table tr:last td:nth-child(5)').html($(".truckname").val()).hide();
	           $('#tableAddContainer-mnla table tr:last td:nth-child(6)').html($(".truckname option:selected").text());
	           $('#tableAddContainer-mnla table tr:last td:nth-child(7)').html($(".est-dept").val());
	            $('#tableAddContainer-mnla table tr:last td:nth-child(8)').html($(".est-arr").val());
	             $('#tableAddContainer-mnla table tr:last td:nth-child(9)').html($(".act-arr").val());
	              $('#tableAddContainer-mnla table tr:last td:nth-child(10)').html($(".containers-vessel").val());
	              $('#tableAddContainer-mnla table tr:last td:nth-child(11)').html($(".storage").val());
	               $('#tableAddContainer-mnla table tr:last td:nth-child(12)').html($(".demorage").val());
	                $('#tableAddContainer-mnla table tr:last td:nth-child(13)').html($(".lodging").val());
	                 $('#tableAddContainer-mnla table tr:last td:nth-child(14)').html($(".trgtdeldt").val());
	                  $('#tableAddContainer-mnla table tr:last td:nth-child(15)').html($(".gtinport").val());
	                   $('#tableAddContainer-mnla table tr:last td:nth-child(16)').html($(".gtoutport").val());
	                    $('#tableAddContainer-mnla table tr:last td:nth-child(17)').html($(".act-del-whse").val());
	                       $('#tableAddContainer-mnla table tr:last td:nth-child(18)').html($(".dt_boc").val());
	                 
	                     $('#tableAddContainer-mnla table tr:last td:nth-child(19)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	                     $('.containers-prod').append('<option value='+ $(".containerss").val() +'>' + $(".containerss").val() + '</option>');





	        $('.container-msg').text('');
			$('.container-msg').text('');
			$('.container-size-msg').text('');
			$('.truckplate-msg').text('');
			$('.carrier-msg').text('');


			$('#tableAddContainer-mnla .containerss').val('');
			$('#tableAddContainer-mnla .containerss-size').val('');
			$('#tableAddContainer-mnla .plate').val('');
			$('#tableAddContainer-mnla .cartons').val('');
			$('#tableAddContainer-mnla .est-dept').val('');
			$('#tableAddContainer-mnla .est-arr').val('');
			$('#tableAddContainer-mnla .act-arr').val('');
			$('#tableAddContainer-mnla .storage').val('');
			$('#tableAddContainer-mnla .demorage').val('');
			$('#tableAddContainer-mnla .lodging').val('');
			$('#tableAddContainer-mnla .trgtdeldt').val('');
			$('#tableAddContainer-mnla .gtinport').val('');
			$('#tableAddContainer-mnla .gtoutport').val('');
			$('#tableAddContainer-mnla .act-del-whse').val('');
			$('#tableAddContainer-mnla .dt_boc').val('');
			}

		


			
});

	
		var testme2=false;
				function isExist2(prod,cont){

				var table2 = $("#tableAddTruck-mnla table tbody");

				    testme2=false;
				 	  table2.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===cont) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       testme2=true;            
					        }   
					     })
				    return testme2;
				}

		$(".btn-Add-Product-Data-mnla").click(function(){

			var cont = $('#tableAddTruck-mnla .containers-prod option:selected').val();
			var prod = $('#tableAddTruck-mnla .prodname option:selected').val();

			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg').text("The Product is already in this Container");
			}
			else if($('#tableAddTruck-mnla .prodname').val() == "")
			{
				$('.prodname-msg').text("Need Product Name.");
			}
			else if($('#tableAddTruck-mnla .origin').val() == "")
			{
				$('.origin-msg').text("Need Origin.");
			}else{
				$('#tableAddTruck-mnla table').append('<tr><td></td><td></td><td></td><td><td></td></td><td></td><td></td></tr>');
				$('#tableAddTruck-mnla table tr:last td:nth-child(1)').html($(".prodname").val()).hide();
			 	$('#tableAddTruck-mnla table tr:last td:nth-child(2)').html($(".prodname option:selected").text());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(3)').html($(".containers-prod").val());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(4)').html($(".origin").val()).hide();
			     $('#tableAddTruck-mnla table tr:last td:nth-child(5)').html($(".origin option:selected").text());
			      $('#tableAddTruck-mnla table tr:last td:nth-child(6)').html($(".origcity").val());
			       	$('#tableAddTruck-mnla table tr:last td:nth-child(7)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			
			$('#tableAddTruck-mnla .PON').val('');
			$('#tableAddTruck-mnla .origincity').val('');

			$('.cont-size-msg').text('');
			$('.prodname-msg').text('');
			$('.origin-msg').text('');

			}
				

			});


	$(".btn-Add-Vessel-Data-mnla").click(function(){

		if($('#tableAddContainer-mnla .carrier').val() == "0")
			{
				$('.carrier-msg').text("Need Shipping Line/Carrier.");
			}else{

		$('#tableAddVessel-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		$('#tableAddVessel-mnla table tr:last td:nth-child(1)').html($(".vessel").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(2)').html($(".vat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(3)').html($(".vdt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(4)').html($(".carrier").val()).hide();
	    $('#tableAddVessel-mnla table tr:last td:nth-child(5)').html($(".carrier option:selected").text());
		$('#tableAddVessel-mnla table tr:last td:nth-child(6)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.containers-vessel').append('<option value='+ $(".vessel").val() +'>' + $(".vessel").val() + '</option>');

		$('#tableAddVessel-mnla .vessel').val('');
		$('#tableAddVessel-mnla .vat').val('');
		$('#tableAddVessel-mnla .vdt').val('');

		}
	});
		

		$(".btn-Add-Product-Alert-mnla").click(function(){
		    	  var table = $("#tableAddTruck-mnla table tbody");

				    table.find('tr').each(function (i) {
				        var $tds = $(this).find('td'),
				            productId = $tds.eq(0).text(),
				            product = $tds.eq(1).text(),
				            Quantity = $tds.eq(2).text();
				        // do something with productId, product, Quantity
				        alert('Row ' + (i + 1) + ':\nContainer: ' + productId
				              + '\nVessel: ' + product
				              + '\nCartons: ' + Quantity);
				    });
		    });
		       

		  

		});
</script>




<script>

function contents(){
       var jbfl       = $('.jobfiles').val();
       var shipper 	  = $('.shipper').val();
       var consignee  = $('.consignee').val();
       var mbl 		  = $('.mbl').val();
       var mbl2 	  = $('.mbl2').val();
       var hbl 	 	  = $('.hbl').val(); 
       var bank       = $('.bank').val();
       var registry   = $('.registry').val(); 
       var vat 		  = $('.vat').val();
       var vdt        = $('.vdt').val();
       var dtRcvd     = $('.dtRcvd').val();
       var dt_pickup_obl  = $('.dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.dt_pickup_docs').val();  
       var broker         =  $('.broker').val();
       var dt_req_budget  =  $('#dtReq').val();
       var ref_due_dt     =  $('#rfp').val();
       var dtSent  		  =  $('#dtSent-preassess').val();
 	   var dtFile  		  =  $('#dtFile').val();
 	   var dtfinal_assess =  $('#dtfinal-assess').val();
 	   var dt_paid        =  $('#dt_paid').val();
 	   var dtfinal_assess =  $('#dtfinal-assess').val();
 	   var dt_boc         =  $('#dt_boc').val();
       var status         =  $('#status').val();
       var entryno        =  $('#entryno').val();
       var purch_order_no =  $('#purch_order_no').val();
       var color          =  $('.colsel').val();
	   var vessels        =  $('.vessels').val();
       var color_select   =  $('#color-select').val();

}
function insert_job(){

	       var jbfl       = $('.jobfiles').val();
       var shipper 	  = $('.shipper').val();
       var consignee  = $('.consignee').val();
       var mbl 		  = $('.mbl').val();
       var mbl2 	  = $('.mbl2').val();
       var hbl 	 	  = $('.hbl').val(); 
       var bank       = $('.bank').val();
       var registry   = $('.registry').val(); 
       var vat 		  = $('.vat').val();
       var vdt        = $('.vdt').val();
       var dtRcvd     = $('.dtRcvd').val();
       var dt_pickup_obl  = $('.dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.dt_pickup_docs').val();  
       var broker         =  $('.broker').val();
       var dt_req_budget  =  $('#dtReq').val();
       var ref_due_dt     =  $('#rfp').val();
       var dtSent  		  =  $('#dtSent-preassess').val();
 	   var dtFile  		  =  $('#dtFile').val();
 	   var dtfinal_assess =  $('#dtfinal-assess').val();
 	   var dt_paid        =  $('#dt_paid').val();
 	   var dtfinal_assess =  $('#dtfinal-assess').val();
 	   var dt_boc         =  $('#dt_boc').val();
       var status         =  $('#status').val();
       var entryno        =  $('#entryno').val();
       var purch_order_no =  $('#purch_order_no').val();
       var color          =  $('.colsel').val();
	   var vessels        =  $('.vessels').val();
       var color_select   =  $('#color-select').val();






        		  		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/jobfile_add');?>",
			  		data: {




			  			    //from jobfile tab
			  			    jbfl 		   :jbfl,
			  			    shipper        :shipper,
			  			    consignee      :consignee,
			  			    mbl		       :mbl,
			  			    mbl2		   :mbl2,
			  			    hbl			   :hbl,
			  			    bank		   :bank,
			  			    registry	   :registry,
			  			    vat            :vat,
			  			    vdt            :vdt,
			  			    dtRcvd         :dtRcvd,
			  			    dt_pickup_obl  :dt_pickup_obl,
			  			    dt_pickup_docs :dt_pickup_docs,
			  			    broker         :broker,
			  			    dt_req_budget  :dt_req_budget,
			  			    ref_due_dt     :ref_due_dt,
			  			    dtSent         :dtSent,
			  			    dtFile         :dtFile,
			  			    dtfinal_assess :dtfinal_assess,
			  			    dt_paid	       :dt_paid,
			  			    status		   :status,
			  			    dt_boc 		   :dt_boc,
			  			    entryno		   :entryno,
			  			    purch_order_no :purch_order_no,
			  			    color          :color,
			  			    color_select   :color_select

			  		}
				})
			    .done(function(data) {
	  							 $.alert({
				        		title: 'Alert!',
				        		content: data,
				        		confirm: function(){
				        	    }
				   			   });
	    		    })
			     .fail(function(data) {
	  							 $.alert({
				        		title: 'Error!',
				        		content: 'Failed to add!',
				        		confirm: function(){
				        			location.reload();
				        	    }
				   			   });
	    		    });






 }
 function insert_vessel(){
 	  var jbfl       = $('.jobfiles').val();
       var table = $("#tableAddVessel-mnla table tbody");
		table.find('tr').each(function (count1) {
			var $tds = $(this).find('td'),
			vessel 	= $tds.eq(0).text(),
		    vat 	= $tds.eq(1).text();
		    vdt    	= $tds.eq(2).text();
		    lines   = $tds.eq(3).text();
		    t =       $tds.eq(4).text();

/*
		    alert("vessel=" + vessel + " vat=" +vat + " vdt="+vdt +
		    " lines="+lines +"t=" +t);*/




		           		  		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/vessel');?>",
			  		data: {
			  				//from container tab


			  			    //from jobfile tab
			  			    jbfl           :jbfl,
			  			    vessel 		   :vessel,
			  			    vdt		       :vdt,
			  			    vat            :vat,
			  			    lines		   :lines
		
			  		}
				})
			    .done(function(data) {
	  							 $.alert({
				        		title: 'Alert!',
				        		content: 'New Vessel is added!',
				        		confirm: function(){
				        	    }
				   			   });
	    		    });
		  


	   });
		    


 }

function ins_contain(){

	
       			  	
		    	  var table = $("#tableAddContainer-mnla table tbody");
		    	  var ct = $("#tableAddContainer-mnla table tbody tr").length;
		    table.find('tr').each(function (count1) {
			  var c = count1+1;




				        var $tds = $(this).find('td'),
				         	containerId 	= $tds.eq(0).text(),
				            consize 	   	= $tds.eq(1).text();
				          	cartons_no  	= $tds.eq(2).text(); 
				        	trucker_plate   = $tds.eq(3).text(); 
				            trucker_id   	= $tds.eq(4).text();
				            trucker_name   	= $tds.eq(5).text();
				            edt    	        = $tds.eq(6).text();
				           	eat  			= $tds.eq(7).text(); 
				          	aat  		   	= $tds.eq(8).text(); 
				          	start_storage   = $tds.eq(9).text(); 
				            start_demorage 	= $tds.eq(10).text(),
				            lodging    	    = $tds.eq(11).text();
				        	tdt  			= $tds.eq(12).text(); 
				        	gip  		   	= $tds.eq(13).text();
				         	gop  		   	= $tds.eq(14).text(); 
				         	adw             = $tds.eq(15).text(); 
				         	dtboc           = $tds.eq(16).text();


		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/container');?>",
			  		data: {
			  				//from container tab
			  			    containerId    :containerId,
			  			    consize  	   :consize, 
			  			    cartons_no	   :cartons_no,
			  			    trucker_plate  :trucker_plate,
			  			    trucker_name   :trucker_name,
			  			    trucker_id		:trucker_id,
			  			    edt            :edt,
			  			    eat            :eat,
			  			    aat            :aat,
			  			    start_storage  :start_storage,
			  			    start_demorage :start_demorage,
			  			    lodging        :lodging,
			  			    tdt            :tdt,
			  			    gip            :gip,
			  			    gop            :gop,
			  			    adw            :adw,
			  			    dtboc		   :dtboc
			  		
			  		}
				})
			    .done(function(data) {
	  							 $.alert({
				        		title: 'Alert!',
				        		content: 'New container is added!',
				        		confirm: function(){
				        	    }
				   			   });
	    		    });

		     });


}

function ins_description(){
			    	   var table= $("#tableAddTruck-mnla table tbody");
		 			   table.find('tr').each(function (count1) {

				          var $tds		   = $(this).find('td'),
						     product_name  = $tds.eq(0).text(),
						     prod_orderno  = $tds.eq(1).text();  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 
						     origin_id     = $tds.eq(3).text();  //origin_id
					         origin_cty    = $tds.eq(5).text();

		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/comodity');?>",
			  		data: {
			  				//from comodity tab
			  			    product_name   :product_name,
			  			    prod_orderno   :prod_orderno, 
			  			    con_id	   	   :con_id,
			  			    origin_id      :origin_id,
			  			    origin_cty     :origin_cty

		
			  		}
				})
			    .done(function(data) {
	  						alert('new comodity added');
	    		    });

    });


}



$('.save_charges').click(function(){
	        //for running charges
	   var jbfl       = $('.jobfiles').val();
       var lodge 		  =  $('#lodge').val();
 	   var cont_deposit   =  $('#cont-deposit').val();
       var thc_charges    =  $('#thc-charges').val();
       var arrastre       =  $('#arrastre').val();
       var wharfage 	  =  $('#wharfage').val();
       var weight         =  $('#weight').val();
	   var del       	  =  $('#del').val();
       var dispatch  	  =  $('#dispatch').val();
       var storage 	 	  =  $('#storage').val();
       var demurrage      =  $('#demurrage').val();
	   var detention      =  $('#detention').val();
       var eic  	  	  =  $('#EIC').val();
       var bai_app 	 	  =  $('#bai-app').val();
       var bai_inspect    =  $('#bai-inspect').val();
	   var sra_app        =  $('#sra-app').val();
       var sra_inspect    =  $('#sra-inspect').val();
       var bad_cargo 	  =  $('#bad-cargo').val();
       var all_charges    =  $('#all-charges').val();
	   var part_charges   =  $('#part-charges').val();

	 /*  alert(lodge);*/
    $.ajax({
		           method: "POST",
	 		   url: "<?php echo base_url('Job/jobfile_add_charges');?>",
			  	   data: {
			  	   	           jbfl   		:jbfl,
			  	   			   lodge        :lodge,
			                   cont_deposit :cont_deposit,   
			                   thc_charges  :thc_charges,
			                   wharfage     :wharfage,
			                   arrastre     :arrastre,
			                   weight	    :weight,
			                   del			:del,
			                   dispatch     :dispatch,
			                   storage      :storage,
			                   demurrage    :demurrage,
			                   detention    :detention,
			                   eic          :eic,
			                   bai_app      :bai_app,
			                   bai_inspect  :bai_inspect,
			                   sra_app      :sra_app,
			                   sra_inspect  :sra_inspect,
			                   bad_cargo    :bad_cargo,
			                   all_charges  :all_charges,
			                   part_charges :part_charges
			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Alert!',
				        		content: 'Running Charges has been inserted!',
				        		confirm: function(){
				        			location.reload();
				        	    }
				   			   });
	    		    })

});  



 
  
</script>



