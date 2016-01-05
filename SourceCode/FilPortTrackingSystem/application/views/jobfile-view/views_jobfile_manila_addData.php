

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
				
				           <input type="hidden" value="1" name="monitoring_type" id="manila"/>


				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span id="check_jobfiles" style="color:red;"></span></label> 
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
				  	<div id="tableAddTruck-mnla" class="hidden pill-truck-mnla-add truck-editable col-lg-12">

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Product Name</label><i style="color:red;">*</i>
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
								        <th>Product Name</th>
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
								<select class="vessel_voyage form-control input-sm"> 
								</select>
							</div>

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
					        		<input type="datetime-local" class="dt_paid form-control input-sm">
							</div>
							<div class="form-group">
								<label>Date Sent PreAssessment</label>					     
					        		<input type="datetime-local" class="dt_pre_assess form-control input-sm">
							</div>

							<div class="form-group">
								<label>Date Sent Final Assessment-</label>
								<input type="datetime-local" name="" class="form-control input-sm dt_final_assess" />
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
								<label>Target Delivery Date</label>
								<input type="datetime-local" name="" class="form-control input-sm tdt " />
							</div>

							<div class="form-group">
								<label>Pull out Date at Port</label>
								<input type="datetime-local" name="" class="form-control input-sm pul_out_port " />
							</div>


						    <div class="form-group">
								  	<label for="dtClrd">Date File Entry To BOC:</label>
								  	<input type="datetime-local" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc" id="">
							</div>	

							<div class="form-group">
								  	<label for="dtClrd">Date Cleared BOC:</label>
								  	<input type="datetime-local" name="dt_boc" class="form-control input-sm dt_boc" id="dt_boc">
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
								<label>Vessel/Voyage #</label> 
								<input type="text" class="form-control input-sm vessel" id="vessel" name="vessel">
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
      <button type="button" class="btn btn-danger btn-Next submit_jobfile" >Next</button>
      <button type="button" class="hidden btn btn-danger test_data save_charge" >Save</button>
      <button type="button" class="btn btn-danger btn-cancel-mnla" data-dismiss="modal">Cancel</button>
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

		$(".btn-cancel-mnla").click(function(){
			location.reload();
		});

    $('[data-toggle="tooltip"]').tooltip(); 


		if(i==0){
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

		}else{
			$('#btn-jobfile-mnla-add').click(false);
		}
		
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

				if($("#tableAddVessel-mnla table tbody tr td").length == 0){
					$('.tableVessel-msg').text("Can't Proceed Need Vessel");
					i=1;
				}else{

				  insert_vessels();
				
				
				/*$("#btn-container-mnla-add").click();*/
				$('#btn-container-mnla-add').addClass('active');
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
				}

			}else if(i==3){

				if($("#tableAddContainer-mnla table tbody tr td").length == 0){
					$('.tableContainer-msg').text("Can't Proceed Need Container");
					i=2;
				}else{

					    $.confirm({
		   						  title: 'Please Choose!',
		  						  content: 'Do you want to add a comodity?',
		 					      confirm: function(){
		  					        	/*$("#btn-truck-mnla-add").click();*/ 
		  					        	$('#btn-truck-mnla-add').addClass('active');
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
		  					  },
		  						  cancel: function(){
		  						  	 ins_contains();
		    				    	/*$("#btn-charges-mnla-add").click();*/
		    				    	$('#btn-charges-mnla-add').addClass('active');
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
		   						 }
						});
			 		}
			
			}else if(i==4){

				if($("#tableAddTruck-mnla table tbody tr td").length == 0){
					$('.tableGoods-msg').text("Can't Proceed Need Product");
					i=3;
				}else{
			    var add_comodity=1;
  		        ins_contains(add_comodity);
				/*ins_description();*/
				/*$("#btn-charges-mnla-add").click();*/
				$('#btn-charges-mnla-add').addClass('active');
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
				}
			}
			else if(i==1){
    				insert_jobfile();
				/*$("#btn-vessel-mnla-add").click();*/

				$('#btn-vessel-mnla-add').addClass('active');
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
			}

		});




});

</script>


<script>
 function myjob(jobfile){
   jobfile = jobfile.value; 

   			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/check_jobfiless');?>",
			  		data: { jobfile:jobfile}
			})
			.done(function(data) {
		   		 	   $('#check_jobfiles').html(data);
				});

 }

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
	    $("#tableAddContainer-mnla .vessel_voyage").find("option[value="+ del +"]").remove();


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

	       $('#tableAddContainer-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	       

	        $('#tableAddContainer-mnla table tr:last td:nth-child(1)').html($(".vessel_voyage option:selected").text());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(2)').html($(".containerss").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(3)').html($(".containerss-size").val());
	        $('#tableAddContainer-mnla table tr:last td:nth-child(4)').html($(".cartons").val());
	         $('#tableAddContainer-mnla table tr:last td:nth-child(5)').html($(".plate").val());
	          $('#tableAddContainer-mnla table tr:last td:nth-child(6)').html($(".truckname").val()).hide();
	           $('#tableAddContainer-mnla table tr:last td:nth-child(7)').html($(".truckname option:selected").text());
	           $('#tableAddContainer-mnla table tr:last td:nth-child(8)').html($(".ref_entry_no").val());
	          $('#tableAddContainer-mnla table tr:last td:nth-child(9)').html($(".demorage").val()); 
	              $('#tableAddContainer-mnla table tr:last td:nth-child(10)').html($(".storage").val());
	               $('#tableAddContainer-mnla table tr:last td:nth-child(11)').html($(".dt_paid").val());
	                $('#tableAddContainer-mnla table tr:last td:nth-child(12)').html($(".lodging").val());
	                $('#tableAddContainer-mnla table tr:last td:nth-child(13)').html($(".dt_pre_assess").val());
	                 $('#tableAddContainer-mnla table tr:last td:nth-child(14)').html($(".dt_final_assess").val());
	                  $('#tableAddContainer-mnla table tr:last td:nth-child(15)').html($(".gtinport").val());
	                   $('#tableAddContainer-mnla table tr:last td:nth-child(16)').html($(".gtoutport").val());
	                    $('#tableAddContainer-mnla table tr:last td:nth-child(17)').html($(".act-del-whse").val());
	                    		 $('#tableAddContainer-mnla table tr:last td:nth-child(18)').html($(".tdt").val());
	                      		 $('#tableAddContainer-mnla table tr:last td:nth-child(19)').html($(".pul_out_port").val());
	                    	 $('#tableAddContainer-mnla table tr:last td:nth-child(20)').html($(".dt_file_entry_boc").val());
	                       $('#tableAddContainer-mnla table tr:last td:nth-child(21)').html($(".dt_boc").val());
	                     $('#tableAddContainer-mnla table tr:last td:nth-child(22)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
					
	                     $('.containers-prod').append('<option value='+ $(".containerss").val() +'>' + $(".containerss").val() + '</option>');

	        $('.container-msg').text('');
			$('.container-msg').text('');
			$('.container-size-msg').text('');
			$('.truckplate-msg').text('');
			$('.carrier-msg').text('');
			$('.tableContainer-msg').text("");


			$('#tableAddContainer-mnla .containerss').val('');
			$('#tableAddContainer-mnla .containerss-size').val('');
			$('#tableAddContainer-mnla .plate').val('');
			$('#tableAddContainer-mnla .cartons').val('');

			$('#tableAddContainer-mnla .ref_entry_no').val('');
			$('#tableAddContainer-mnla .dt_paid').val('');
			$('#tableAddContainer-mnla .dt_pre_assess').val('');
		    $('#tableAddContainer-mnla .dt_file_entry_boc').val('');
		    $('#tableAddContainer-mnla .tdt').val('');
		    $('#tableAddContainer-mnla .pul_out_port').val('');

			$('#tableAddContainer-mnla .storage').val('');
			$('#tableAddContainer-mnla .demorage').val('');
			$('#tableAddContainer-mnla .lodging').val('');
			$('#tableAddContainer-mnla .dt_final_assess').val('');
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
			}else{
				$('#tableAddTruck-mnla table').append('<tr><td></td><td></td><td></td><td></td></tr>');
				$('#tableAddTruck-mnla table tr:last td:nth-child(1)').html($(".prodname").val()).hide();
			 	$('#tableAddTruck-mnla table tr:last td:nth-child(2)').html($(".prodname option:selected").text());
			    $('#tableAddTruck-mnla table tr:last td:nth-child(3)').html($(".containers-prod").val());
	
			       	$('#tableAddTruck-mnla table tr:last td:nth-child(4)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
			
			
			$('#tableAddTruck-mnla .PON').val('');

			$('.cont-size-msg').text('');
			$('.prodname-msg').text('');
			$('.tableGoods-msg').text("");

			}
				

			});


	
	var testme3=false;
				function isExist3(strds){

				var table3 = $("#tableAddVessel-mnla table tbody");

				    testme3=false;
				 	  table3.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===strds) {
					       testme3=true;            
					        }   
					     })
				    return testme3;
				}
	
	$(".btn-Add-Vessel-Data-mnla").click(function(){

		if(isExist3($('#tableAddVessel-mnla .vessel').val()))
			{	
				$('.vessel-msg').text("Vessel Already Exists.");
			}
		else if($('#tableAddVessel-mnla .carrier').val() == "0")
			{
				$('.carrier-msg').text("Need Shipping Line/Carrier.");
			}
		else if($('#tableAddVessel-mnla .vessel').val() == "")
			{
				$('.vessel-msg').text("Need Vessel");
			}
		else{

		$('#tableAddVessel-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		$('#tableAddVessel-mnla table tr:last td:nth-child(1)').html($(".vessel").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(2)').html($(".edt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(3)').html($(".eat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(4)').html($(".aat").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(5)').html($(".vdt").val());
		$('#tableAddVessel-mnla table tr:last td:nth-child(6)').html($(".carrier").val()).hide();
	    $('#tableAddVessel-mnla table tr:last td:nth-child(7)').html($(".carrier option:selected").text());
		$('#tableAddVessel-mnla table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.containers-vessel').append('<option value='+ $(".vessel").val() +'>' + $(".vessel").val() + '</option>');

		//to know what is the vessel of container
		  $('.vessel_voyage').append('<option value='+ $(".vessel").val() +'>' + $(".vessel").val() + '</option>');
		//

		$('.vessel-msg').text("");
		$('.carrier-msg').text("");
		$('.tableVessel-msg').text("");

		$('#tableAddVessel-mnla .vessel').val('');
		$('#tableAddVessel-mnla .edt').val('');
		$('#tableAddVessel-mnla .eat').val('');
		$('#tableAddVessel-mnla .aat').val('');
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

function insert_jobfile(){

	   var jbfl       = $('.jobfiles').val();
       var shipper 	  = $('.shipper').val();
       var consignee  = $('.consignee').val();
       var mbl 		  = $('.mbl').val();
       var mbl2 	  = $('.mbl2').val();
       var hbl 	 	  = $('.hbl').val(); 
       var bank       = $('.bank').val();
       var registry   = $('.registry').val(); 
  /*     var vat 		  = $('.vat').val();*/
       var vdt        = $('.vdt').val();
       var dtRcvd     = $('.dtRcvd').val();
       var dt_pickup_obl  = $('.dt_pickup_obl').val();  
 	   var dt_pickup_docs = $('.dt_pickup_docs').val();  
       var broker         =  $('.broker').val();
       var dt_req_budget  =  $('#dt_req_budget').val();
       var ref_due_dt     =  $('#ref_due_dt').val();
    /*   var dtSent  		  =  $('#dtSent-preassess').val();*/
/* 	   var dtFile  		  =  $('#dtFile').val();*/
 /*	   var dtfinal_assess =  $('#dtfinal-assess').val();*/
/* 	   var dt_paid        =  $('#dt_paid').val();*/
 	   var dt_boc         =  $('#dt_boc').val();
       var status         =  $('#status').val();
 /*      var entryno        =  $('#entryno').val();*/
       var purch_order_no =  $('#purch_order_no').val();
       var color          =  $('.colsel').val();
	   var vessels        =  $('.vessels').val();
       var color_select   =  $('#color-select').val();


       var origin     =  $('.origin').val();
       var origcity   =  $('.origcity').val();

     
      




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
			  			/*    vat            :vat,*/
			  			 /*   vdt            :vdt,*/
			  			    dtRcvd         :dtRcvd,
			  			    dt_pickup_obl  :dt_pickup_obl,
			  			    dt_pickup_docs :dt_pickup_docs,
			  			    broker         :broker,
			  			    dt_req_budget  :dt_req_budget,
			  			    ref_due_dt     :ref_due_dt,
			  			/*    dtSent         :dtSent,
			  			    dtFile         :dtFile,*/
			  			 /*   dtfinal_assess :dtfinal_assess,*/
			  		/*	    dt_paid	       :dt_paid,*/
			  			    status		   :status,
			  			    dt_boc 		   :dt_boc,
			  			/*    entryno		   :entryno,*/
			  			    purch_order_no :purch_order_no,
			  			    color          :color,
			  			    color_select   :color_select,
			  			    origin   	   :origin,
			  			    origcity       :origcity



			  		}
				})
			    .done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'New JobFile is added!',
				        		confirm: function(){
				        	    }
				   			   });
	    		    })
			     .fail(function(data) {
	  							 $.alert({
	  							backgroundDismiss: false,
				        		title: 'Error!',
				        		content: 'There is a problem in adding data ,please try another data or reload the page!',
				        		confirm: function(){
									location.reload();

				        	    }
				   			   });
	    		    });






 }
 function insert_vessels(){

 
 	  var jbfl   = $('.jobfiles').val();
       var table = $("#tableAddVessel-mnla table tbody");
         var t3  = $("#tableAddVessel-mnla table tbody tr").length;
		     table.find('tr').each(function (count1) {
	     var c3 = count1+1;
			var $tds = $(this).find('td'),
			vessel 	= $tds.eq(0).text(),
		    edt 	= $tds.eq(1).text();
		    eat     = $tds.eq(2).text();
		    aat     = $tds.eq(3).text();
	        vdt    	= $tds.eq(4).text();
		    lines   = $tds.eq(5).text();

/*
		    alert("vessel=" + vessel + " vat=" +vat + " vdt="+vdt +
		    " lines="+lines +"t=" +t);
*/



		           		  		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/vessel');?>",
			  		data: {
			  				//from container tab


			  			    //from jobfile tab
			  			    jbfl           :jbfl,
			  			    vessel 		   :vessel,
			  			    vdt		       :vdt,
			  			    edt            :edt,
			  		        eat            :eat,
			  		        aat            :aat,
			  			    lines		   :lines
		
			  		}
				})
			    .done(function(data) {
			    	       if(t3==c3){
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'New Vessel is added!',
				        		confirm: function(){
				        	    }
				   			   });
	  					    }
	    		    });
		  


	   });
		    


 }

function ins_contains(add_comodity){

	
       			  	
		    	  var table = $("#tableAddContainer-mnla table tbody");
		    	  var ct    = $("#tableAddContainer-mnla table tbody tr").length;
		    table.find('tr').each(function (count1) {
			  var c = count1+1;




				        var $tds = $(this).find('td'),
				            vessel_voyage 	= $tds.eq(0).text(),
				         	containerId 	= $tds.eq(1).text(),
				            consize 	   	= $tds.eq(2).text();
				          	cartons_no  	= $tds.eq(3).text(); 
				        	trucker_plate   = $tds.eq(4).text(); 
				            trucker_id   	= $tds.eq(5).text();
				            trucker_name   	= $tds.eq(6).text();
				            ref_entry_no    = $tds.eq(7).text();
				          	start_demorage  = $tds.eq(8).text(); 
				            start_storage 	= $tds.eq(9).text();
				            dt_paid		    = $tds.eq(10).text();
				            lodging    	    = $tds.eq(11).text();
				            dt_pre_assess   = $tds.eq(12).text(); 
				        	dt_final_assess = $tds.eq(13).text(); 
				        	gip  		   	= $tds.eq(14).text();
				         	gop  		   	= $tds.eq(15).text(); 
				         	adw             = $tds.eq(16).text(); 
				         	tdt    		    = $tds.eq(17).text(); 
				         	pul_out_port    = $tds.eq(18).text();  

				         	dt_file_entry_boc = $tds.eq(19).text(); 
				         	dtboc             = $tds.eq(20).text();


		$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/container');?>",
			  		data: {
			  				//from container tab
			  				vessel_voyage  :vessel_voyage,
			  			    containerId    :containerId,
			  			    consize  	   :consize, 
			  			    cartons_no	   :cartons_no,
			  			    trucker_plate  :trucker_plate,
			  			    trucker_name   :trucker_name,
			  			    trucker_id	   :trucker_id,
			  			    ref_entry_no   :ref_entry_no,
			  			    start_storage  :start_storage,
			  			    start_demorage :start_demorage,
			  			    dt_paid        :dt_paid,
			  			    lodging        :lodging,				
			  			    dt_pre_assess  :dt_pre_assess,
			  			    dt_file_entry_boc :dt_file_entry_boc,
			  			    dt_final_assess:dt_final_assess,
			  			    gip            :gip,
			  			    gop            :gop,
			  			    adw            :adw,
			  			    dtboc		   :dtboc,
			  			    tdt            :tdt,
			  			    pul_out_port   :pul_out_port
			  		
			  		}
				})
				 .done(function() {	
				 	  if(add_comodity==1){
			           	var container="container";
			    		 if(c<=ct){
			    		 ins_descriptions(c,ct,container);
				        }
			          }		
			        if(add_comodity!=1){ 
			            if(c==ct){	
			    	 	  	 $.alert({
				        		title: 'Success!',
				        		content: 'New container is added!',
				        		confirm: function(){
				        	    }
				   			  }); 
			    	 	}
			        }
	    		  });




		     });


}

function ins_descriptions(c,ct,container){
			    	   var table = $("#tableAddTruck-mnla table tbody");
			    	   var ct2   = $("#tableAddTruck-mnla table tbody tr").length;

 table.find('tr').each(function (count1) {		 			  
  var c2 = count1+1;
 
 if(c<=ct){
   if(c2<=ct2){
				          var $tds		   = $(this).find('td'),
						     product_name  = $tds.eq(0).text(),
						     prod_orderno  = $tds.eq(1).text();  //origin_id
						     con_id        = $tds.eq(2).text(), //change to  container 

	        	$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/comodity');?>",
			  		data: {
			  				//from comodity tab
			  			    product_name   :product_name,
			  			    prod_orderno   :prod_orderno, 
			  			    con_id	   	   :con_id

		
			  		}
				})
			    .done(function(data) {
			    	          if(container!=''){
			    	          	var message = "New Comodity and container is added!";
			    	          }else{
			    	          	var message = "New Comodity is added!";
			    	          }
			    	           if(c==ct){	
			    	             if(c2==ct2){
			  						  $.alert({
						        		title: 'Success!',
						        		content: message,
						        		confirm: function(){
						        	    }
						   			  });
						   	   } }
	    		    });
 }} 	    
});


}



$('.save_charge').click(function(){
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
	 		   url: "<?php echo base_url('Job/jobfile_add_charge');?>",
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
				        		title: 'Success!',
				        		content: 'Running Charges has been added!',
				        		confirm: function(){
				        			location.reload();
				        	    }
				   			   });
	    		    })

});  



 
  
</script>



