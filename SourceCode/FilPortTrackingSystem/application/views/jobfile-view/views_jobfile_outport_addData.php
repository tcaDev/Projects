<meta http-equiv="Refresh" content="1200">

<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile-outport-add" class="active"><a>Jobfile</a></li>
			    <li id="btn-vessel-outport-add"><a>Vessel</a></li>
			    <li id="btn-container-outport-add"><a>Container</a></li>
			    <li id="btn-truck-outport-add"><a>Description of Goods</a></li>
			    <li id="btn-charges-outport-add"><a>Running Charges</a></li>
			  </ul>
    	<hr>
    		<div class="container-fluid">


		      	<div class="form-group">
				  <div class="col-lg-12 pill-jobfile-outport-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="1" name="monitoring_type" id="manila"/>


				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span id="check_jobfiles-outport"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles-outport" name="jbfl" id="jbfl" onkeyup="search_jobfiless(this)">
								 <i class="jobfile-msg-outport" style="color:red;"></i>
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check"></span></label> 
								  		<select name="shipper"  class="form-control input-sm shipper-outport ">
							            	<option> </option>
							            	<?php  foreach($shipper_data as $row){  ?> 
							                <option value="<?php echo $row->ShipperId ?>">
							                <?php echo $row->ShipperName ?>
							                </option> 
							             	<?php }?>
						               	</select>
						            <i class="shipper-msg-outport"  style="color:red;"></i>
						      </div>

						     <div class="form-group">
								  <label for="consignee">Consignee:<i style="color:red;">*</i></label> 
								  		<select name="consignee" class="form-control input-sm consignee-outport">
								  			<option> </option>
							            	<?php  foreach($consignee_data as $row){  ?> 
							                <option value="<?php echo $row->ConsigneeId ?>">
							                <?php echo $row->ConsigneeName ?>
							                </option> 
							             	<?php }?>
							            </select>
							            <i class="consignee-msg-outport" style="color:red;"></i>
							   </div>
								   	
				           	

				           	<div class="form-group">
								<label>Color Stages</label> 									
								<select name="colors" class="form-control colsel-outport input-sm" >
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
								  <input type="text" class="form-control input-sm hbl-outport" name="hbl" id="hbl">
								  <i class="colsel-msg-outport" style="color:red;"></i>
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 1.:</label>
								  <input type="text" class="form-control input-sm mbl" name="mbl" id="mbl">
								 </div>

								
						</div>

					<div class="col-lg-4">

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

								

								<div class="form-group">
									<label>Color Selectivity :</label>
									<select name="color-select" id="color-select" class="form-control input-sm color-select">
										<option value="1">YELLOW</option>
										<option value="2">RED</option>
										<option value="3">GREEN</option>
									</select>
								</div>

							    

								 <div class="form-group">
								   <label for="status">Status Report:</label>
								  	<textarea name="status" rows="5" class="form-control input-sm status" id="status"></textarea>
								 </div>
				  			</div>
				  		</div>
				  </div>

				<!-- Products PLATE WINDOW-->
				  	<div id="tableAddTruck-outport" class="hidden pill-truck-outport-add truck-editable col-lg-12">

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
								<select class="form-control input-sm prodname-outport" name="prodname">
									<?php foreach($products as $row){ ?>
											 <option value="<?php echo $row->ProductId?>">
											 <?php echo $row->ProductName;?>
											 </option>
											<?php }?> 
								</select> 
								<i class="prodname-msg-outport" style="color:red;"></i>
							</div>

<!-- 						<div class="form-group">
								<label>Purchase Order Number</label> <i style="color:red;">*</i>
								<input type="text" class="form-control input-sm PON"  name="PON">
								<i class="pon-msg-outport" style="color:red;"></i>
							</div>
 -->
							<div class="form-group">
								<label>Container Number</label>
								<select class="containers-prod-outport form-control input-sm"> 

								</select>
									<i class="cont-size-msg-outport" style="color:red;"></i>
		
							</div>

							
				  		</div>

				  		<div class="col-lg-6">
					  		<div class="form-group ">
									<label>Origin Country</label><i style="color:red;">*</i>
										<select  class="form-control origin-outport" name="countries">
											<?php foreach($countries as $row){ ?>
											 <option value="<?php echo $row->CountryId?>">
											 <?php echo $row->CountryName;?>
											 </option>
											<?php }?> 
										</select>	

										<i class="origin-msg-outport" style="color:red;"></i>
							</div>

							<div class="form-group">
								<label>Origin City</label>
								<input type="text" name="origcity" class="form-control input-sm origcity-outport" />
							</div>

							

							<button type="button" class="btn-Add-Product-Data-outport btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Product</button>

				  			<i class="tableGoods-msg-outport" style="color:red;font-size:20px;"></i>

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
				  	<div id="tableAddContainer-outport" class="hidden pill-container-outport-add table-editable ">

				  	 	
					  	<div class="col-lg-6">
				  			<div class="form-group">
								<label>Container Number</label>
							     
					        		<input type="text" class="containerss-outport form-control input-sm">
							
					        	
							</div>

							<div class="form-group">
								<label>Container Size</label>
							     
					        		<input type="text" class="containerss-size-outport form-control input-sm">
								
					        	
							</div>

							

							

						
							<div class="form-group">
								<label>Number of Cartons</label> <span id="errmsg-outport" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm cartons-outport" id="cartons-outport" name="numofcartons">
							</div>

				
						    <div class="form-group">
								<label>Hauler/Truck Name</label>
								<select class="form-control truckname-outport" >
										<?php foreach($hauler_data as $row){ ?>
											 <option value="<?php echo $row->HaulerOrTruckId?>">
											 <?php echo $row->HaulerOrTruck;?>
											 </option>
											<?php }?> 
								</select>
							</div>

							<div class="form-group">
								<label>Trucker Plate No.</label>
								<input type="text" name="trckplte" class="form-control input-sm plate-outport" />
								
							</div>

							<div class="form-group">
								<label>Estimated Departure Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm est-dept-outport" />
							</div>

							<div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-arr" class="form-control input-sm est-arr-outport" />
							</div>

							
							<div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="act-arr" class="form-control input-sm act-arr-outport" />
							</div>

							<div class="form-group">
								<label>Vessel/Voyage #</label>
								<select class="containers-vessel-outport form-control input-sm"> 

								</select>
								
		
							</div>

							<div class="form-group">
								<label>Start of Storage</label>
								<input type="datetime-local" name="strtstrge" class="form-control input-sm storage-outport" />
							</div>

						


					  	</div>
					  	
				  			



					  	<div class="col-lg-6">
					  		<div class="form-group">
								<label>Start of Demurrage </label>
								<input type="datetime-local" name="strtdmrage" class="form-control input-sm demorage-outport" />
							</div>

							<div class="form-group">
								<label>Lodging</label>
								<input type="datetime-local" name="lodging" class="form-control input-sm lodging-outport" />
							</div>

							<div class="form-group">
								<label>Target Delivery Date</label>
								<input type="datetime-local" name="trgtdeldt" class="form-control input-sm trgtdeldt-outport" />
							</div>

							<div class="form-group">
								<label>Actual Delivery at Warehouse</label>
								<input type="datetime-local" name="act-del-whse" class="form-control input-sm act-del-whse-outport" />
							</div>

							<div class="form-group">
								  	<label for="dtClrd">Date Cleared BOC:</label>
								  	<input type="datetime-local" name="dt_boc" class="form-control input-sm dt_boc-outport" id="dt_boc">
							</div>

						<!-- Added Field  -->
							 	<div class="form-group">
									 <label for="dtSent">Date Sent Pre-Assess:</label>
									 <input type="date" name="dt_sent_preassed" class="form-control input-sm pre-assess-outport" id="dtSent-preassess">
								</div>

								<div class="form-group">
									 <label for="dtFile">Date File Entry to BOC:</label>
									 <input type="date" name="dt_file_entry_boc" class="form-control input-sm filetoboc-outport" id="dtFile">
								</div>

								<div class="form-group">
								 	<label for="dtSent">Date Sent Final-Assess:</label>
								 	<input type="date" name="dt_sent_finalassed" class="form-control input-sm final-assess-outport" id="dtfinal-assess">
								</div>

								<div class="form-group">
								 	<label for="dtClrd">Reference Entry No.:</label><i style="color:red;">*</i>
								 	<input type="text" name="entryno" class="form-control input-sm reference-outport" id="entryno">
								 	<i class="reference-msg-outport" style="color:red;"></i>
								</div>

								 <div class="form-group">
								 	 <label for="dtPaid">Date Paid(Date& Time):</label>
									  <input type="datetime-local" name="dt_paid" class="form-control input-sm dtpaid-outport " id="dt_paid">
								 </div>
						<!-- End of Added Field -->

							<button type="button" class="btn-Add-Container-Data-outport btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
					  		<i class="tableContainer-msg-outport" style="color:red;font-size:20px;"></i>

					  	</div>

					  	<div style="width: 100%; overflow-x: auto;">
					    <table class="table" style="width: 3000px;" border="1">
					      <thead>
						      <tr>
						      	<th>Container Number</th>
						      	<th>Container Size</th>
						        <th>Number of Cartons</th>
						        <th>Trucker Plate No.</th>
						        <th>Hauler/Trucker Name</th>
						        <th>Estimated Departure Time</th>
						        <th>Estimated Arrival Time</th>
						        <th>Actual Arrival Time</th>
						        <th>Vessel/Voyage #</th>
						        <th>Start of Storage</th>
						        <th>Start of Demurrage </th>
						        <th>Lodging</th>
						        <th>Target Delivery Date</th>
						        <th>Actual Delivery at Warehouse</th>
						        <th>Date Cleared BOC</th>
						        <th>Date Sent Pre-Assessment</th>
						        <th>Date File Entry to BOC</th>
						        <th>Date Sent Final-Assessment</th>
						        <th>Reference Entry No.</th>
						        <th>Date Paid(Date&Time)</th>
						        <th></th>
						      </tr>
					      </thead>
					    </table>
					</div>


					</div>


					<div id="tableAddVessel-outport" class="hidden pill-vessel-outport-add table-editable col-lg-12">
						
						<div class="col-lg-6">
							<div class="form-group">
								<label>Vessel/Voyage #</label> 
								<input type="text" class="form-control input-sm vessel-outport" id="vessel" name="vessel">
								<i class="vessel-msg-outport" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Actual Verting Time of Vessel</label>
								 	<input type="datetime-local" name="ves_arrival_time" class="form-control input-sm vat-outport">
								 </div>

							
						</div>

						<div class="col-lg-6">

							<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt-outport">
							 </div>

							 <div class="form-group">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control carrier-outport" name="countries">
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo $row->CarrierName;?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg-outport" style="color:red;"></i>
							</div>

							<button type="button" class="btn-Add-Vessel-Data-outport btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Vessel</button>
							<i class="tableVessel-msg-outport" style="color:red;font-size:20px;"></i>

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

					<div class="hidden pill-charges-outport-add table-editable col-lg-12">
						
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

							


						</div>
							

						<div class="col-lg-6">

							<div class="form-group">
									<label>Demurrage</label>
									<input type="text" name="demurrage" class="form-control input-sm" id="demurrage" />
								</div>
							
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
<!-- 
								<div style="text-align:right;">
									<button type="button" class="btn btn-primary "><span class=" fa fa-th-list fa-fw"></span> Particular Charges</button>
									<button type="button" class="btn btn-primary "><span class=" fa fa-th-list fa-fw"></span> All Charges</button>	
								</div> -->
								

						</div>
					</div>
				</div>
			</div>
		</div>	
    </div>

    <div class="footer-modal" >
    <hr>
 <!--     <button type="button" class="btn btn-danger container_insert">test insert</button> -->
      <button type="button" class="btn btn-danger btn-Next-outport-outport submit_jobfile" >Next</button>
      <button type="button" class="hidden btn btn-danger test_data save_charges" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel-outport').change(function(){
  var status = $(this).val();
  var color = $('.colsel-outport option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-outport').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-outport').css({'background-color': color,'color': 'white'});
  	}
 });

</script>


  <script>
	$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip(); 

		/*
		* Show Container
		*/

		/*$('#btn-container-outport-add').on('click',function(){
			
			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg-outport').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg-outport').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg-outport').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg-outport').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg-outport').text("Need Reference Entry No.");
			}
			else{
				

			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-truck-outport-add').removeClass('active');
			$('#btn-charges-outport-add').removeClass('active');
			$('#btn-vessel-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-vessel-outport-add').addClass('hidden');
			$('.pill-truck-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').removeClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next-outport').removeClass('hidden');
				i=2;}
		});*/

		/*
		* Show Truck
		*/

		/*$('#btn-truck-outport-add').on('click',function(){

			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg-outport').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg-outport').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg-outport').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg-outport').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg-outport').text("Need Reference Entry No.");
			}
			else{

				
					$(this).addClass('active');
					$('#btn-jobfile-outport-add').removeClass('active');
					$('#btn-container-outport-add').removeClass('active');
					$('#btn-charges-outport-add').removeClass('active');
					$('#btn-vessel-outport-add').removeClass('active');

					$('.pill-jobfile-outport-add').addClass('hidden');
					$('.pill-truck-outport-add').removeClass('hidden');
					$('.pill-charges-outport-add').addClass('hidden');
					$('.pill-container-outport-add').addClass('hidden');
					$('.pill-vessel-outport-add').addClass('hidden');
					$('.test_data').addClass('hidden');

					$('.btn-Next-outport').removeClass('hidden');

					i=3;
				
			};
		});*/

		/*
		* Show Charges
		*/

		/*$('#btn-charges-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-truck-outport-add').removeClass('active');
			$('#btn-vessel-outport-add').removeClass('active');
			$('.test_data').removeClass('hidden');

			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-truck-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').removeClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.pill-vessel-outport-add').addClass('hidden');

			$('.btn-Next-outport').addClass('hidden');
		});*/

		/*
		* Show Jobfile
		*/

		if(ii==0){
			$('#btn-jobfile-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-truck-outport-add').removeClass('active');
			$('#btn-vessel-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').removeClass('hidden');
			$('.pill-truck-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.pill-vessel-outport-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next-outport').removeClass('hidden');

			ii=0;
		});

		}else{
			$('#btn-jobfile-outport-add').click(false);
		}
		
		/*
		* Next Button
		*/




		var ii=0;

		$(".btn-Next-outport-outport").click(function(){
			
			 if($('.required-fields .jobfiles-outport').val() == "")
			{
				$('.jobfile-msg-outport').text("Need Jobfile");
			}
			else if($('.required-fields .shipper-outport').val() == "")
			{
				$('.shipper-msg-outport').text("Need Shipper");
			}
			else if($('.required-fields .consignee-outport').val() == "")
			{
				$('.consignee-msg-outport').text("Need Consignee");
			}
			else if($('.hbl-outport').val() == '')
			{
				$('.colsel-msg-outport').text("Need House Bill of Lading No.");
			}
			else if($('#check_jobfiles-outport').text() == "Jobfile already exists")
			{
				$('.jobfile-msg-outport').text("Can't Proceed Jobfile Already Exists");
			}
			else{ii++;}

			
				   

			/*Next Page*/
			if(ii==2){

				if($('#tableAddVessel-outport table tbody tr td').length == 0){
					$('.tableVessel-msg-outport').text("Need Vessel to Proceed.! ");
					ii=1;
				}else{
				  insert_vessel();
				
				/*$("#btn-container-outport-add").click();*/
				$('#btn-container-outport-add').addClass('active');
				$('#btn-jobfile-outport-add').removeClass('active');
				$('#btn-truck-outport-add').removeClass('active');
				$('#btn-charges-outport-add').removeClass('active');
				$('#btn-vessel-outport-add').removeClass('active');

				$('.pill-jobfile-outport-add').addClass('hidden');
				$('.pill-vessel-outport-add').addClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').addClass('hidden');
				$('.pill-container-outport-add').removeClass('hidden');
				$('.test_data').addClass('hidden');

				$('.btn-Next-outport').removeClass('hidden');

				}
			}else if(ii==3){
				if($('#tableAddContainer-outport table tbody tr td').length == 0){
					$('.tableContainer-msg-outport').text("Need Container to Proceed.! ");
					ii=2;
				}else{
					 $.confirm({
   						  title: 'Please Choose!',
  						  content: 'Do you want to add a comodity?',
 					      confirm: function(){
  					        	/*$("#btn-truck-outport-add").click();*/ 
  					        	$('#btn-truck-outport-add').addClass('active');
								$('#btn-jobfile-outport-add').removeClass('active');
								$('#btn-container-outport-add').removeClass('active');
								$('#btn-charges-outport-add').removeClass('active');
								$('#btn-vessel-outport-add').removeClass('active');

								$('.pill-jobfile-outport-add').addClass('hidden');
								$('.pill-truck-outport-add').removeClass('hidden');
								$('.pill-charges-outport-add').addClass('hidden');
								$('.pill-container-outport-add').addClass('hidden');
								$('.pill-vessel-outport-add').addClass('hidden');
								$('.test_data').addClass('hidden');

								$('.btn-Next-outport').removeClass('hidden'); 
  					  },
  						  cancel: function(){
  						  	 ins_contain();
    				    	/*$("#btn-charges-outport-add").click();*/
    				    	$('#btn-charges-outport-add').addClass('active');
							$('#btn-jobfile-outport-add').removeClass('active');
							$('#btn-container-outport-add').removeClass('active');
							$('#btn-truck-outport-add').removeClass('active');
							$('#btn-vessel-outport-add').removeClass('active');
							$('.test_data').removeClass('hidden');

							$('.pill-jobfile-outport-add').addClass('hidden');
							$('.pill-truck-outport-add').addClass('hidden');
							$('.pill-charges-outport-add').removeClass('hidden');
							$('.pill-container-outport-add').addClass('hidden');
							$('.pill-vessel-outport-add').addClass('hidden');

							$('.btn-Next-outport').addClass('hidden');
   						 }
				});
				}

			   
			 		
			
			}else if(ii==4){

				if($('#tableAddTruck-outport table tbody tr td').length == 0){
					$('.tableGoods-msg-outport').text("Need Product to Proceed.! ");
					ii=3;
				}else{
				    var add_comodity=1;
	  		        ins_contain(add_comodity);
  		   		 
				/*ins_description();*/
				/*$("#btn-charges-outport-add").click();*/
				$('#btn-charges-outport-add').addClass('active');
				$('#btn-jobfile-outport-add').removeClass('active');
				$('#btn-container-outport-add').removeClass('active');
				$('#btn-truck-outport-add').removeClass('active');
				$('#btn-vessel-outport-add').removeClass('active');
				$('.test_data').removeClass('hidden');

				$('.pill-jobfile-outport-add').addClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').removeClass('hidden');
				$('.pill-container-outport-add').addClass('hidden');
				$('.pill-vessel-outport-add').addClass('hidden');

				$('.btn-Next-outport').addClass('hidden');
				}
			}
			else if(ii==1){
    				insert_job();
				/*$("#btn-vessel-outport-add").click();*/

				$('#btn-vessel-outport-add').addClass('active');
				$('#btn-jobfile-outport-add').removeClass('active');
				$('#btn-truck-outport-add').removeClass('active');
				$('#btn-charges-outport-add').removeClass('active');
				$('#btn-container-outport-add').removeClass('active');


				$('.pill-jobfile-outport-add').addClass('hidden');
				$('.pill-truck-outport-add').addClass('hidden');
				$('.pill-charges-outport-add').addClass('hidden');
				$('.pill-container-outport-add').addClass('hidden');
				$('.pill-vessel-outport-add').removeClass('hidden');

				$('.test_data').addClass('hidden');

				$('.btn-Next-outport').removeClass('hidden');
			}

		});


		/*$('#btn-vessel-outport-add').on('click',function(){
			
			if($('.required-fields .jobfiles').val() == "")
			{
				$('.jobfile-msg-outport').text("Need Jobfile");
			}
			else if($('.required-fields .shipper').val() == "")
			{
				$('.shipper-msg-outport').text("Need Shipper");
			}
			else if($('.required-fields .consignee').val() == "")
			{
				$('.consignee-msg-outport').text("Need Consignee");
			}
			else if($('.hbl').val() == '')
			{
				$('.colsel-msg-outport').text("Need House Bill of Lading No.");
			}
			else if($('.reference').val() == "")
			{
				$('.reference-msg-outport').text("Need Reference Entry No.");
			}
			else{

			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-truck-outport-add').removeClass('active');
			$('#btn-charges-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');


			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-truck-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.pill-vessel-outport-add').removeClass('hidden');

			$('.test_data').addClass('hidden');

			$('.btn-Next-outport').removeClass('hidden');
				i=1;}

		});*/

});

</script>


<script>
 function search_jobfiless(jobfile){
   jobfile = jobfile.value; 

   			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/check_jobfile');?>",
			  		data: { jobfile:jobfile}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles-outport').html(data);
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
              $("#cartons-outport").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg-outport").html("Numbers Only").show().fadeOut("slow");
                           return false;
                }
               });


                $(".num_only").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    /*$("#errmsg-outport").html("Numbers Only").show().fadeOut("slow");
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

    $('#tableAddContainer-outport').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

    	var del = $(this).closest('tr').children('td:eq(0)').text();

      	$("#tableAddTruck-outport .containers-prod-outport").find("option[value="+ del +"]").remove();

    	
    	/*$(".containers-prod option[value='1']").remove();*/
	});

	$('#tableAddTruck-outport').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

	});

		$('#tableAddVessel-outport').on('click', '.deleteButton', function() {

		var del = $(this).closest('tr').children('td:eq(0)').text();

      	$("#tableAddContainer-outport .containers-vessel-outport").find("option[value="+ del +"]").remove();


    	$(this).closest("tr").remove();

	});
});
	$(document).ready(function(){

			var testme=false;
				function isExist(strd){

				var table = $("#tableAddContainer-outport table tbody");

				    testme=false;
				 	  table.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===strd) {
					       testme=true;            
					        }   
					     })
				    return testme;
				}

				

		$(".btn-Add-Container-Data-outport").click(function(){

			var compare = $('#tableAddContainer-outport .containerss-outport').val();
			

			if(isExist($('#tableAddContainer-outport .containerss-outport').val()))
			{	
				$('.container-msg-outport').text("Container Number Already Exists.");
			}
			else if($('.reference-outport').val() == "")
			{
				$('.reference-msg-outport').text("Need Reference Entry No.");
			}
			
			else{

	       $('#tableAddContainer-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       
	        $('#tableAddContainer-outport table tr:last td:nth-child(1)').html($(".containerss-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(2)').html($(".containerss-size-outport").val());
	       
	        $('#tableAddContainer-outport table tr:last td:nth-child(3)').html($(".cartons-outport").val());
	         $('#tableAddContainer-outport table tr:last td:nth-child(4)').html($(".plate-outport").val());
	          $('#tableAddContainer-outport table tr:last td:nth-child(5)').html($(".truckname-outport").val()).hide();
	           $('#tableAddContainer-outport table tr:last td:nth-child(6)').html($(".truckname-outport option:selected").text());
	           $('#tableAddContainer-outport table tr:last td:nth-child(7)').html($(".est-dept-outport").val());
	            $('#tableAddContainer-outport table tr:last td:nth-child(8)').html($(".est-arr-outport").val());
	             $('#tableAddContainer-outport table tr:last td:nth-child(9)').html($(".act-arr-outport").val());
	              $('#tableAddContainer-outport table tr:last td:nth-child(10)').html($(".containers-vessel-outport").val());
	              $('#tableAddContainer-outport table tr:last td:nth-child(11)').html($(".storage-outport").val());
	               $('#tableAddContainer-outport table tr:last td:nth-child(12)').html($(".demorage-outport").val());
	                $('#tableAddContainer-outport table tr:last td:nth-child(13)').html($(".lodging-outport").val());
	                 $('#tableAddContainer-outport table tr:last td:nth-child(14)').html($(".trgtdeldt-outport").val());
	                    $('#tableAddContainer-outport table tr:last td:nth-child(15)').html($(".act-del-whse-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(16)').html($(".dt_boc-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(17)').html($(".pre-assess-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(18)').html($(".filetoboc-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(19)').html($(".final-assess-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(20)').html($(".reference-outport").val());
	                      $('#tableAddContainer-outport table tr:last td:nth-child(21)').html($(".dtpaid-outport").val());
	                 
	                     $('#tableAddContainer-outport table tr:last td:nth-child(22)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	                     $('.containers-prod-outport').append('<option value='+ $(".containerss-outport").val() +'>' + $(".containerss-outport").val() + '</option>');

	        $('.container-msg-outport').text('');
			$('.container-msg-outport').text('');
			$('.container-size-msg-outport').text('');
			$('.truckplate-msg-outport').text('');
			$('.carrier-msg-outport').text('');
			$('.reference-msg-outport').text('');
			$('.tableContainer-msg-outport').text("");


			$('#tableAddContainer-outport .containerss-outport').val('');
			$('#tableAddContainer-outport .containerss-size-outport').val('');
			$('#tableAddContainer-outport .plate-outport').val('');
			$('#tableAddContainer-outport .cartons-outport').val('');
			$('#tableAddContainer-outport .est-dept-outport').val('');
			$('#tableAddContainer-outport .est-arr-outport').val('');
			$('#tableAddContainer-outport .act-arr-outport').val('');
			$('#tableAddContainer-outport .storage-outport').val('');
			$('#tableAddContainer-outport .demorage-outport').val('');
			$('#tableAddContainer-outport .lodging-outport').val('');
			$('#tableAddContainer-outport .trgtdeldt-outport').val('');
			$('#tableAddContainer-outport .act-del-whse-outport').val('');
			$('#tableAddContainer-outport .dt_boc-outport').val('');
			$('#tableAddContainer-outport .pre-assess-outport').val('');
			$('#tableAddContainer-outport .filetoboc-outport').val('');
			$('#tableAddContainer-outport .final-assess-outport').val('');
			$('#tableAddContainer-outport .reference-outport').val('');
			$('#tableAddContainer-outport .dtpaid-outport').val('');
			}

		


			
});

	
		var testme2=false;
				function isExist2(prod,cont){

				var table2 = $("#tableAddTruck-outport table tbody");

				    testme2=false;
				 	  table2.find('tr').each(function(){
				 	  	if($('td:nth(2)',$(this)).html()===cont) 
					    if($('td:nth(0)',$(this)).html()===prod) {
					       testme2=true;            
					        }   
					     })
				    return testme2;
				}

		$(".btn-Add-Product-Data-outport").click(function(){

			var cont = $('#tableAddTruck-outport .containers-prod-outport option:selected').val();
			var prod = $('#tableAddTruck-outport .prodname-outport option:selected').val();

			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg-outport').text("The Product is already in this Container");
			}
			else if($('#tableAddTruck-outport .prodname-outport').val() == "")
			{
				$('.prodname-msg-outport').text("Need Product Name.");
			}
			else if($('#tableAddTruck-outport .origin-outport').val() == "")
			{
				$('.origin-msg-outport').text("Need Origin.");
			}else{
				$('#tableAddTruck-outport table').append('<tr><td></td><td></td><td></td><td><td></td></td><td></td><td></td></tr>');
				$('#tableAddTruck-outport table tr:last td:nth-child(1)').html($(".prodname-outport").val()).hide();
			 	$('#tableAddTruck-outport table tr:last td:nth-child(2)').html($(".prodname-outport option:selected").text());
			    $('#tableAddTruck-outport table tr:last td:nth-child(3)').html($(".containers-prod-outport").val());
			    $('#tableAddTruck-outport table tr:last td:nth-child(4)').html($(".origin-outport").val()).hide();
			     $('#tableAddTruck-outport table tr:last td:nth-child(5)').html($(".origin-outport option:selected").text());
			      $('#tableAddTruck-outport table tr:last td:nth-child(6)').html($(".origcity-outport").val());
			       	$('#tableAddTruck-outport table tr:last td:nth-child(7)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			
			$('#tableAddTruck-outport .PON').val('');
			$('#tableAddTruck-outport .origincity-outport').val('');

			$('.cont-size-msg-outport').text('');
			$('.prodname-msg-outport').text('');
			$('.origin-msg-outport').text('');
			$('.tableGoods-msg-outport').text("");

			}
				

			});


	$(".btn-Add-Vessel-Data-outport").click(function(){

		if($('#tableAddVessel-outport .carrier-outport').val() == "0")
			{
				$('.carrier-msg-outport').text("Need Shipping Line/Carrier.");
			}
		else if($('#tableAddVessel-outport .vessel-outport').val() == "")
			{
				$('.vessel-msg-outport').text("Need Vessel");
			}
		else{

		$('#tableAddVessel-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		$('#tableAddVessel-outport table tr:last td:nth-child(1)').html($(".vessel-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(2)').html($(".vat-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(3)').html($(".vdt-outport").val());
		$('#tableAddVessel-outport table tr:last td:nth-child(4)').html($(".carrier-outport").val()).hide();
	    $('#tableAddVessel-outport table tr:last td:nth-child(5)').html($(".carrier-outport option:selected").text());
		$('#tableAddVessel-outport table tr:last td:nth-child(6)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.containers-vessel-outport').append('<option value='+ $(".vessel-outport").val() +'>' + $(".vessel-outport").val() + '</option>');

		$('.vessel-msg-outport').text("");
		$('.carrier-msg-outport').text("");
		$('.tableVessel-msg-outport').text("");

		$('#tableAddVessel-outport .vessel-outport').val('');
		$('#tableAddVessel-outport .vat-outport').val('');
		$('#tableAddVessel-outport .vdt-outport').val('');

		}
	});
		

		$(".btn-Add-Product-Alert-outport").click(function(){
		    	  var table = $("#tableAddTruck-outport table tbody");

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
	  							backgroundDismiss: false,
				        		title: 'Error!',
				        		content: 'Jobfile already exists!',
				        		confirm: function(){
				        			i=0;
				        			$('#btn-jobfile-outport-add').click();
				        	    }
				   			   });
	    		    });






 }
 function insert_vessel(){
 	  var jbfl       = $('.jobfiles').val();
       var table = $("#tableAddVessel-outport table tbody");
         var t3 = $("#tableAddVessel-outport table tbody tr").length;
		     table.find('tr').each(function (count1) {
	     var c3 = count1+1;
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
			    	       if(t3==c3){
	  							 $.alert({
				        		title: 'Alert!',
				        		content: 'New Vessel is added!',
				        		confirm: function(){
				        	    }
				   			   });
	  					    }
	    		    });
		  


	   });
		    


 }

function ins_contain(add_comodity){

	
       			  	
		    	  var table = $("#tableAddContainer-outport table tbody");
		    	  var ct    = $("#tableAddContainer-outport table tbody tr").length;
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
				 .done(function() {	
				 	  if(add_comodity==1){
			           	var container="container";
			    		 if(c<=ct){
			    		 ins_description(c,ct,container);
				        }
			          }		
			        if(add_comodity!=1){ 
			            if(c==ct){	
			    	 	  	 $.alert({
				        		title: 'Alert!',
				        		content: 'New container is added!',
				        		confirm: function(){
				        	    }
				   			  }); 
			    	 	}
			        }
	    		  });




		     });


}

function ins_description(c,ct,container){
			    	   var table = $("#tableAddTruck-outport table tbody");
			    	   var ct2   = $("#tableAddTruck-outport table tbody tr").length;

 table.find('tr').each(function (count1) {		 			   var c2 = count1+1;
   if(c==ct){
	if(c2=ct2){
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
			    	          if(container!=''){
			    	          	var message = "New Comodity and container is added!";
			    	          }else{
			    	          	var message = "New Comodity is added!";
			    	          }
			    	           if(c==ct){
								if(c2=ct2){
			  						  $.alert({
						        		title: 'Alert!',
						        		content: message,
						        		confirm: function(){
						        	    }
						   			  });
						   	   }}
	    		    });
	}
  }		    
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



