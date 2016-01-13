<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Jobfile(s)</h4>
        </div>
	        <div class="modal-body">
	        	<!-- Product Adding Table-->

    			 <div class="col-lg-12  pill-jobfile-air-update">
					  	<div class="row">
					  		<div class="col-lg-4" >	
					
					           <input type="hidden" value="3" name="monitoring_type" class="monitoring_type-air"/>


					           	<div class="required-fields-air">
					           		<div class="form-group">
					              <!--check if jofile is already exists -->
					           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span id="check_jobfiles-air"></span></label> 
									 <input type="text" class="form-control input-sm jobfiles-air" name="jbfl" id="jbfl" onkeyup="myjob_air(this.value)">
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

					           </div>
						
							
									<div class="form-group">

									  <label for="hbl">House Airway Bill:</label><i style="color:red;">*</i>
									  <input type="text" class="form-control input-sm hbl-air">
									  <i class="colsel-msg-air" style="color:red;"></i>
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
										  	<label for="dtClrd">Estimated Departure Time</label>
										 	<input type="datetime-local" name="es_dep_time" class="form-control input-sm edt-air">
								     </div>
								
								     <div class="form-group">
										<label>Estimated Arrival Time</label>
										<input type="datetime-local" name="est-dept" class="form-control input-sm eat-air" />
									 </div>

							   <div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-air" />
							 </div>


										<div class="form-group">
											<label>Number of Cartons</label> <span id="errmsg-air" style="color:red;"></span>
											<input type="text" step="1" class="form-control input-sm cartons-air" name="numofcartons-air">
										</div>

									<div class="form-group">
										  <label for="bank">Letter of Credit No. from Bank:</label>
										  <input type="text" class="form-control input-sm bank-air" name="bank">
										</div>

										<div class="form-group">
										  <label for="registry">Registry:</label>
										  <input type="text" class="form-control input-sm registry-air">
										</div>

										<div class="form-group origin-air-update">
											<label>Origin Country</label><i style="color:red;">*</i>
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
										   <input type="date" name="dt_req_budget" class="form-control input-sm dt_req_budget-air" id="dt_req_budget-air">
									  </div>

							         
									<div class="form-group">
										 <label for="rfp">Reference Due Date:</label>
										 <input type="date" name="ref_due_dt" class="form-control input-sm ref_due_dt-air" id="ref_due_dt-air">
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

					  			</div>
					  		</div>
					  </div>
    	

					<div style="width: 100%; overflow-x: auto;"> </div>
    	</div>
	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_container_air">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>

<script>
var jbs_air;

	$(document).on('click','.btn-Update-air', function(){
			var jobfile =  $(this).closest('tr').children('td:eq(2)').text();
			var color_stages =  $(this).closest('tr').children('td:eq(3)').text();
			var shipper =  $(this).closest('tr').children('td:eq(4)').text();
			var consignee =  $(this).closest('tr').children('td:eq(5)').text();
			var cartons =  $(this).closest('tr').children('td:eq(6)').text();
			var purchaseno =  $(this).closest('tr').children('td:eq(8)').text();
			var lcfrmbank =  $(this).closest('tr').children('td:eq(9)').text();
			var hbl =  $(this).closest('tr').children('td:eq(10)').text();
			var mbl =  $(this).closest('tr').children('td:eq(11)').text();
			var origin =  $(this).closest('tr').children('td:eq(12)').text();
			var flightno =  $(this).closest('tr').children('td:eq(13)').text();
			var Forwader =  $(this).closest('tr').children('td:eq(14)').text();
			var warehouse =  $(this).closest('tr').children('td:eq(15)').text();
			var aircraft =  $(this).closest('tr').children('td:eq(16)').text();
			var ETD =  $(this).closest('tr').children('td:eq(17)').text();
			var ETA =  $(this).closest('tr').children('td:eq(19)').text();
			var ATA =  $(this).closest('tr').children('td:eq(21)').text();
			var date_airline =  $(this).closest('tr').children('td:eq(23)').text();
			var date_client =  $(this).closest('tr').children('td:eq(24)').text();
			var date_hawb =  $(this).closest('tr').children('td:eq(25)').text();
			var dateotherdocs =  $(this).closest('tr').children('td:eq(26)').text();
			var broker =  $(this).closest('tr').children('td:eq(27)').text();
			var date_req_budget =  $(this).closest('tr').children('td:eq(28)').text();
			var rfpduedate =  $(this).closest('tr').children('td:eq(29)').text();
			var color_selectivity =  $(this).closest('tr').children('td:eq(30)').text();
			var JobFileID =  $(this).closest('tr').children('td:eq(33)').text();
		
    jbs_air=jobfile;


				$('.pill-jobfile-air-update .jobfiles-air').val(jobfile);
				  
				  $(".pill-jobfile-air-update .shipper-air option").filter(function() {
				    return this.text == shipper; 
				}).attr('selected', 'selected');

			     $(".pill-jobfile-air-update .consignee-air option").filter(function() {
				    return this.text == consignee; 
				}).attr('selected', 'selected');

			      $(".pill-jobfile-air-update .colsel-air option").filter(function() {
				    return this.text == color_stages; 
				}).attr('selected', 'selected');

			      $('.pill-jobfile-air-update .jobfiles-air').val(jobfile);
			      $('.pill-jobfile-air-update .hbl-air').val(hbl);
			      $('.pill-jobfile-air-update .mbl-air').val(mbl);
				  $('.pill-jobfile-air-update .flight-air').val(flightno);
				  $('.pill-jobfile-air-update .aircraft-air').val(aircraft);
			      $('.pill-jobfile-air-update .forwarder-air').val(Forwader);
			      $('.pill-jobfile-air-update .warehouse-air').val(warehouse);
			      $('.pill-jobfile-air-update .edt-air').val(ETD);
			      $('.pill-jobfile-air-update .eat-air').val(ETA);
			      $('.pill-jobfile-air-update .aat-air').val(ATA);
			      $('.pill-jobfile-air-update .cartons-air').val(cartons);
			      $('.pill-jobfile-air-update .bank-air').val(lcfrmbank);
			      $('.pill-jobfile-air-update .dtRcvd-airline-air').val(date_airline);
			      $('.pill-jobfile-air-update .dtRcvd-air').val(date_client);
			      $('.pill-jobfile-air-update .dt_pickup_obl-air').val(date_hawb);
			      $('.pill-jobfile-air-update .dt_pickup_docs-air').val(dateotherdocs);

			       $(".pill-jobfile-air-update .broker-air option").filter(function() {
				    return this.text == broker; 
				}).attr('selected', 'selected');

			        $(".pill-jobfile-air-update .color-select-air option").filter(function() {
				    return this.text == color_selectivity; 
				}).attr('selected', 'selected');

			      $('.pill-jobfile-air-update #purch_order_no-air').val(purchaseno);
			      $('.pill-jobfile-air-update #dt_req_budget-air').val(date_req_budget);
			      $('.pill-jobfile-air-update #ref_due_dt-air').val(rfpduedate);

			       $('.pill-jobfile-air-update #ref_due_dt-air').val(rfpduedate);

			      
			        $.ajax({	
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country_air');?>",
						  		data: { jobfile:jobfile
						  		}
							})
					  		.done(function(data) {
						  			$(".pill-jobfile-air-update .origin-air-update select").val(data);
							});
			      
			       $.ajax({
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country_name_air');?>",
						  		data: { jobfile:jobfile
						  		}
							})
					  		.done(function(data) {
						  			$(".pill-jobfile-air-update .origcity-air").val(data);
							});


							
	});
	$(document).on('click','.update_container_air', function(){
		
	  var   j_new	        = $(".jobfiles-air").val();
      var  shipper_air 		= $(".shipper-air").val();
 	  var  consignee_air 	= $(".consignee-air").val();
      var  colsel_air 	    = $(".colsel-air").val();
      var  hbl_air          = $(".hbl-air").val();
      var  mbl_air 			= $(".mbl-air").val();
      var  flight_air 		= $(".flight-air").val();
      var  forwarder_air 	= $(".forwarder-air").val();
 	  var  warehouse_air 	= $(".warehouse-air").val();
      var  aircraft_air 	= $(".aircraft-air").val();
      var  edt_air 			= $(".edt-air").val();
      var  eat_air 			= $(".eat-air").val();
      var  aat_air 			= $(".aat-air").val();
      var  cartons_air 		= $(".cartons-air").val();
 	  var  bank_air 		= $(".bank-air").val();
      var  registry_air 	= $(".registry-air").val();
      var  origin_air 		= $(".origin-air").val();
      var  origcity_air 	= $(".origcity-air").val();
      var  dtRcvd_airline_air = $(".dtRcvd-airline-air").val();
      var  dtRcvd_air 		  = $(".dtRcvd-air").val();
 	  var  dt_pickup_obl_air  = $(".dt_pickup_obl-air").val();
      var  dt_pickup_docs_air = $(".dt_pickup_docs-air").val();
      var  broker_air 		  = $(".broker-air").val();
      var  purch_order_no_air = $(".purch_order_no-air").val();
      var  dt_req_budget_air  = $(".dt_req_budget-air").val();
      var  ref_due_dt_air 	  = $(".ref_due_dt-air").val();
 	  var  color_select_air   = $(".color-select-air").val();

  

 	  			 $.ajax({
			  		method: "POST",
					url:"<?php echo base_url('Job_air_update')?>",
				    beforeSend: function() {
					 	  dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Updating Jobfile ',
				   			});
 					  },
			  		data: {
			  			    jbfl_new               :j_new,
			  			    jbfl                   :jbs_air,
			  			    shipperid          	   :shipper_air,
			  			    cosigid 		  	   :consignee_air,
			  			    nocart		           :cartons_air,
			  			    purchord               :purch_order_no_air,
			  		        letcred          	   :bank_air,
			  		        hbl                    :hbl_air,
			  			    mbl		  			   :mbl_air,
			  			    countryid			   :origin_air,
			  			    city  				   :origcity_air,
			  			    etd					   :edt_air,
			  			    eta					   :eat_air,
			  			    ata					   :aat_air,
			  			    flight				   :flight_air,
			  			    aircraft               :aircraft_air,
			  			    forward                :forwarder_air,
			  			    warehouse              :warehouse_air,
			  			    dt_rec_arv_aline       :dtRcvd_airline_air,
			  			    dt_rec_arv_client      :dtRcvd_air,
			  			    dtpickup_hawb          :dt_pickup_obl_air,
			  			    dtpikup_docs           :dt_pickup_obl_air,
			  			    brokerid               :broker_air,
			  			    dtreqbudget            :dt_req_budget_air,
			  			    rfpduedate             :ref_due_dt_air,
			  			    color_select           :color_select_air,
			  			    status                 :colsel_air
	


			  		}
				})
			    .done(function(data) {
			    		$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content:data,
				        		confirm: function(){
									dia.close();
								   location.reload();
				        	    }
				   			});   	  
	    	     });
		
    });
	
</script>