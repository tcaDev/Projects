

<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile-mnla-add" class="active"><a>Jobfile</a></li>
			    <li id="btn-vessel-mnla-add"><a>Vessel</a></li>
			    <li id="btn-container-mnla-add"><a>Container</a></li>
			    <li id="btn-truck-mnla-add"><a>Description of Goods</a></li>
			    <li id="btn-charges-mnla-add"><a>Running Charges</a></li>
			  </ul>
    	<hr>
    		<div class="container-fluid">


		      	<div class="form-group">
				  <div class="col-lg-12 pill-jobfile-mnla-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="1" name="monitoring_type" class="monitoring_type"/>


				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:</label> <i style="color:red;font-size: 20px;">*</i> <span id="check_jobfiles"></span>
								 <input type="text" class="form-control input-sm jobfiles" name="jbfl" id="jbfl" onchange="search_jobfile(this)">
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

				<!-- Products PLATE WINDOW-->
				  	<div id="tableAddTruck-mnla" class="hidden pill-truck-mnla-add truck-editable col-lg-12">

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Commodity Name</label><i style="color:red;">*</i>
								<select class="form-control input-sm prodname" name="prodname">
									<?php foreach($products as $row){ ?>
											 <option value="<?php echo $row->ProductId?>">
											 <?php echo stripslashes($row->ProductName);?>
											 </option>
											<?php }?> 
								</select> 
								<i class="prodname-msg" style="color:red;"></i>
							</div>

						



							
				  		</div>

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Container Number</label>
								<select class="containers-prod form-control input-sm"> 

								</select>
									<i class="cont-size-msg" style="color:red;"></i>
		
							</div>
		                				<button type="button" class="btn-Add-Product-Data-mnla btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Product</button>
				  				<i class="tableGoods-msg" style="color:red;"></i>
				  		</div>

				  		<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 950px;" border="1">
							    <thead>
							    	 <tr>
							    	 	<th class="hidden">Product Value</th>
								        <th>Commodity Name</th>
								        <th>Container</th>
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
								<label>Vessel/Voyage #</label>
								<select class="vessel_voyage form-control input-sm "> 
								</select>
							</div>

				  			<div class="form-group">
								<label>Container Number</label>					     
					        		<input type="text" class="containerss form-control input-sm">
					        		<i class="container-msg" style="color:red;"></i>
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
											 <?php echo stripslashes($row->HaulerOrTruck);?>
											 </option>
											<?php }?> 
								</select>
							</div>

							<div class="form-group">
								<label>Trucker Plate No.</label>
								<input type="text" name="trckplte" class="form-control input-sm plate" />
								
							</div>

						   <div class="form-group">
								<label>Referrence Entry Number</label>					     
					        		<input type="date-time-local" class="ref_entry_no form-control input-sm">
							</div>
							<div class="form-group">
								<label>Date Paid</label>					     
					        		<input type="date" class="dt_paid form-control input-sm">
							</div>
							<div class="form-group">
								<label>Date Sent PreAssessment</label>					     
					        		<input type="date" class="dt_pre_assess form-control input-sm">
							</div>

							<div class="form-group">
								<label>Date Sent Final Assessment-</label>
								<input type="date" name="" class="form-control input-sm dt_final_assess" />
							</div>


					  	</div>
					  	
				  			



					  	<div class="col-lg-6">

					  		

					  		<div class="form-group">
								<label>Start of Storage</label>
								<input type="date" name="strtstrge" class="form-control input-sm storage" />
							</div>

							<div class="form-group">
								<label>Start of Demurrage </label>
								<input type="date" name="strtdmrage" class="form-control input-sm demorage" />
							</div>

							<div class="form-group">
								<label>Lodging</label>
								<input type="date" name="lodging" class="form-control input-sm lodging" />
							</div>

							<!-- <div class="form-group">
								<label>Hauler</label>
								<input type="text" name="lodge" class="form-control input-sm" />
							</div> -->


							<div class="form-group">
								<label>Gate In at Port</label>
								<input type="date" name="gtinport" class="form-control input-sm gtinport" />
							</div>

							<div class="form-group">
								<label>Gate Out at Port</label>
								<input type="date" name="gtoutport" class="form-control input-sm gtoutport" />
							</div>

							<div class="form-group">
								<label>Actual Delivery at Warehouse</label>
								<input type="date" name="act-del-whse" class="form-control input-sm act-del-whse" />
							</div>

						    <div class="form-group">
								<label>Target Delivery Date</label>
								<input type="date" name="" class="form-control input-sm tdt " />
							</div>

							<div class="form-group">
								<label>Pull out Date at Port</label>
								<input type="date" name="" class="form-control input-sm pul_out_port " />
							</div>


						    <div class="form-group">
								  	<label for="dtClrd">Date File Entry To BOC:</label>
								  	<input type="date" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc" id="">
							</div>	

							<div class="form-group">
								  	<label for="dtClrd">Date Cleared BOC:</label>
								  	<input type="date" name="dt_boc" class="form-control input-sm dt_boc" id="dt_boc">
							</div>

							<button type="button" class="btn-Add-Container-Data-mnla btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
					  		<i class="tableContainer-msg" style="color:red;"></i>

					  	</div>

					  	<div style="width: 100%; overflow-x: auto;">
					    <table class="table" style="width: 3000px;" border="1">
					      <thead>
						      <tr>
						        <th>Vessel/Voyage #</th> 
						      	<th>Container Number</th>
						      	<th>Container Size</th>      	
						        <th>Number of Cartons</th>
						        <th>Trucker Plate No.</th>
						        <th>Trucker Name</th>
						        <th>Referrence Entry Number</th>
						        <th>Start of Demurrage </th>
						        <th>Start of Storage</th>
						       
						        <!-- <th>Hauler</th> -->
						        <th>Date Paid</th>
						         <th>Lodging</th>
						        <th>Date Sent PreAssessment</th>
						        <th>Date Sent Final Assessment</th>
						        <th>Gate In at Port</th>
						        <th>Gate Out at Port</th>
						        <th>Actual Delivery at Warehouse</th>
						        <th>Target Delivery Date</th>
						        <th>Pull out Date at Port </th>
						        <th>Date File Entry To BOC</th>
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
								<label>Vessel/Voyage #</label><span class="first-vessel-msg-addVessel-mnilas"></span> 
								<input type="text" class="form-control input-sm vessel" id="vessel" name="vessel"> <!-- onkeyup="check_vessel_avail_first(this.value)" -->
								<i class="vessel-msg" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Estimated Departure Time</label>
								 	<input type="datetime-local" name="es_dep_time" class="form-control input-sm edt">
						     </div>

						     <div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm eat" />
							 </div>

						 


							
						</div>

						<div class="col-lg-6">

						    <div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat" />
							 </div>

							<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt">
							 </div>

							 <div class="form-group">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control carrier" name="countries">
									<option value="0" selected>Select Shipping Line/Carrier</option>
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo stripslashes($row->CarrierName);?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg" style="color:red;"></i>
							</div>

							<button type="button" class="btn-Add-Vessel-Data-mnla btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Vessel</button>
							<i class="tableVessel-msg" style="color:red;"></i>
						</div>
					

						<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 1000px;" border="1">

							    <thead>
							    	 <tr>
								        <th>Vessel/Voyage #</th>
								        <th>Estimated Departure Time</th>
								        <th>Estimated Arrival Time</th>
								        <th>Actual Arrival Time</th>
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
								<input type="text" name="lodge" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Container Deposit</label>
								<input type="text" name="cont-deposit" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>THC Charges</label>
								<input type="text" name="thc-charges" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Arrastre </label>
								<input type="text" name="arrastre" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Wharfage</label>
								<input type="text" name="wharfage" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Weighing</label>
								<input type="text" name="weight" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>DEL</label>
								<input type="text" name="del" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Dispatch Fee</label>
								<input type="text" name="dispatch" class="form-control input-sm" />
							</div>

							<div class="form-group">
								<label>Storage</label>
								<input type="text" name="storage" class="form-control input-sm" />
							</div>

							


						</div>
							

						<div class="col-lg-6">

								<div class="form-group">
									<label>Demurrage</label>
									<input type="text" name="demurrage" class="form-control input-sm" />
								</div>
							
								<div class="form-group">
									<label>Detention</label>
									<input type="text" name="detention" class="form-control input-sm" />
								</div>
								
								<div class="form-group">
									<label>EIC</label>
									<input type="text" name="EIC" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>BAI Application</label>
									<input type="text" name="bai-app" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>BAI Inspection</label>
									<input type="text" name="bai-inspect" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>SRA Application</label>
									<input type="text" name="sra-app" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>SRA Inspection</label>
									<input type="text" name="sra-inspect" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>Bad Cargo</label>
									<input type="text" name="bad-cargo" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>All Charges</label>
									<input type="text" name="all-charges" class="form-control input-sm" />
								</div>

								<div class="form-group">
									<label>Particular Charges</label>
									<input type="text" name="part-charges" class="form-control input-sm" />
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
      <button type="button" class="hidden btn btn-danger btn-save-mnla test_data save_charge" >Save</button>
      <button type="button" class="btn btn-danger btn-cancel-mnla" data-dismiss="modal">Cancel</button>
    </div>
  </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
<script src="<?php echo base_url('resources/js/manila_add_data.js');?>"></script>
<script>

 $(document).ready(function(){
   $(document).on('change',' .checkDec',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var holders = inp.toString().split('.');
 		var n = inp.indexOf('.');
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

	
		

		$(".btn-Add-Product-Data-mnla").click(function(){

			var cont = $('#tableAddTruck-mnla .containers-prod option:selected').val();
			var prod = $('#tableAddTruck-mnla .prodname').val();


			if(isExist2(prod,cont))
			{	
				$('.cont-size-msg').text("The Product is already in this Container");
			}
			else if($('#tableAddTruck-mnla .prodname').val() == "0")
			{
				$('.prodname-msg').text("Need Product Name.");
			}
			else if($('#tableAddTruck-mnla .containers-prod').val() == "")
			{
				$('.cont-size-msg').text("Need Container Size.");
			}
			else if($('#tableAddTruck-mnla .origin').val() == "")
			{
				$('.origin-msg').text("Need Origin.");
			}else{
				$('#tableAddTruck-mnla table').append('<tr><td></td><td></td><td></td><td><td></td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-mnla table tr:last td:nth-child(1)').html($(".prodname").val()).hide();
			 	$('#tableAddTruck-mnla table tr:last td:nth-child(2)').html($(".prodname option:selected").text());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(3)').html($(".containers-prod").val());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(4)').html($(".dt_boc").val());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(5)').html($(".origin").val()).hide();
			     $('#tableAddTruck-mnla table tr:last td:nth-child(6)').html($(".origin option:selected").text());
			      $('#tableAddTruck-mnla table tr:last td:nth-child(7)').html($(".origcity").val());
			       	$('#tableAddTruck-mnla table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			$('#tableAddTruck-mnla .prodname').val('');
			$('#tableAddTruck-mnla .PON').val('');
			$('#tableAddTruck-mnla .origincity').val('');

			$('.cont-size-msg').text('');
			$('.prodname-msg').text('');
			$('.cont-size-msg').text('');
			$('.origin-msg').text('');

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
	

</script>


<script>
	//for testing of multiple insert of containers
	$(".container_insert").click(function(){    
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

     /*  alert(purch_order_no);*/

       

       

       

       //for containers table
       			  	
		    	  var table = $("#tableAddContainer-mnla table tbody");
		    	  var ct = $("#tableAddContainer-mnla table tbody tr").length;
		table.find('tr').each(function (count1) {
			  var c = count1+1;

				        var $tds = $(this).find('td'),
				            containerId 	= $tds.eq(0).text(),
				            vesselid    	= $tds.eq(2).text();
				          	cartons_no  	= $tds.eq(4).text(); 
				        	trucker_plate   = $tds.eq(5).text(); 

				            trucker_name 	= $tds.eq(6).text(),
				            edt    	        = $tds.eq(7).text();
				           	eat  			= $tds.eq(8).text(); 
				          	aat  		   	= $tds.eq(9).text(); 
				          	start_storage   = $tds.eq(10).text(); 

				            start_demorage 	= $tds.eq(11).text(),
				            lodging    	    = $tds.eq(12).text();
				        	tdt  			= $tds.eq(13).text(); 
				        	gip  		   	= $tds.eq(14).text();
				         	gop  		   	= $tds.eq(15).text(); 
				         	adw             = $tds.eq(16).text(); 

				    
		  		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/jobfile_add');?>",
			  		data: {
			  				//from container tab
			  			    containerId    :containerId,
			  			    vesselid       :vesselid, 
			  			    cartons_no	   :cartons_no,
			  			    trucker_plate  :trucker_plate,
			  			    trucker_name   :trucker_name,
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
			  			   // from description goods tab
			  			   /* product_name   :product_name,
			  			    color_id 	   :color_id,
			  			    prod_order_no  :prod_order_no,
			  			    origin_id	   :origin_id,
			  			    origin_cty	   :origin_cty,*/


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
				});	
					
					if(c<=ct){
						 insert_container(ct,c);
					}
		/*			var b = 1;		
					while (b < ct) {
    					
    					if(b<=c){
    					
    					}else{
    						break;
    					}	
    				b++;	
					}*/
											



		});

	
	});

	
  
</script>

<script>
	function insert_container(ct,c){


				       //for the 4th proc insert start
		             //description of goods
	var table2 	  = $("#tableAddTruck-mnla table tbody");
	var ct2  = $("#tableAddTruck-mnla table tbody tr").length;         
	table2.find('tr').each(function (i) {
	    var c2 = i+1;
if(ct2==c2){
	if(ct==c){
 			    	
				       //unset the maxid
				        var $tds		   = $(this).find('td'),

				       	 	 prodid        = $tds.eq(0).text(),
						     product_name  = $tds.eq(1).text(),
						   /*  prod_orderno  = $tds.eq(1).text();*/  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 
						     dt_boc        = $tds.eq(3).text(); 
						     origin_id     = $tds.eq(4).text();  //origin_id
					         origin_cty    = $tds.eq(6).text();
					    

					         alert("prodid:" +prodid + " product_name" + product_name +
					         " con_id" + con_id + " dt_boc:" + dt_boc + " origin_id" +
					          "origin_cty" + origin_cty);

					            $.ajax({
				  		           method: "POST",
						 		   url: "<?php echo base_url('Job/jobfile_add2');?>",
				  			  	   data: {
				  			  	   			   product_name    :product_name,
				  			                   con_id 	       :con_id,   
				  			                   prodid          :prodid,
				  			                   dt_boc          :dt_boc,
				  			                   origin_id	   :origin_id,
				  			                   origin_cty	   :origin_cty
				  			                  /* max 			   :maxid
				  			                  /* status		   :status*/
				  			                  /* dt_boc 		   :dt_boc*/
				  			  	   		 }
						              })
										.done(function(data) {
				  								if(ct==c){
												}
											  }
						    		    })
						    		    .fail(function(data) {
						    		    	alert('Data error');
						    			});
	} 
}    								

</script>




