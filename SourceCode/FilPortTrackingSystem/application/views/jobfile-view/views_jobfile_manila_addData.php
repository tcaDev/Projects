<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile-mnla-add" class="active"><a role="button">Jobfile</a></li>
			    <li id="btn-container-mnla-add"><a role="button">Container</a></li>
			    <li id="btn-truck-mnla-add"><a role="button">Description of Goods</a></li>
			    <li id="btn-charges-mnla-add"><a role="button">Running Charges</a></li>
			  </ul>
    	<hr>
    	<div style="overflow-x:auto;">
    		<div class="container-fluid">


		      	<div class="form-group">
				  <div class="col-lg-12 pill-jobfile-mnla-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				  	<?php echo  form_open('Job/jofile_data');?>
				           <input type="hidden" value="1" name="monitoring_type" id="manila"/>

				           <div class="form-group">
				           		<label for="jbfl">JobFile No.:</label>
								 <input type="text" class="form-control input-sm " name="jbfl" id="jbfl">
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:</label>
								  		<select name="shipper" id="shipper" class="form-control input-sm">
							            	<option> </option>
							            	<?php  foreach($shipper_data as $row){  ?> 
							                <option value="<?php echo $row->ShipperId ?>">
							                <?php echo $row->ShipperName ?>
							                </option> 
							             	<?php }?>
						               	</select>
						      </div>

						     <div class="form-group">
								  <label for="consignee">Consignee:</label>
								  		<select name="consignee" class="form-control input-sm">
								  			<option> </option>
							            	<?php  foreach($consignee_data as $row){  ?> 
							                <option value="<?php echo $row->ConsigneeId ?>">
							                <?php echo $row->ConsigneeName ?>
							                </option> 
							             	<?php }?>
							            </select>
							   </div>
								   	
					
						<!-- 		<div class="form-group">
								  <label for="pipo">PI / PO No.:</label>
								  <input type="text" class="form-control input-sm" name="pipo" id="pipo">
								 </div> -->

								<div class="form-group">
								  <label for="hbl">House Bill of Landing No.:</label>
								  <input type="text" class="form-control input-sm" name="hbl" id="hbl">
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Landing No1.:</label>
								  <input type="text" class="form-control input-sm" name="mbl" id="mbl">
								 </div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Landing No2.:</label>
								  <input type="text" class="form-control input-sm text-uppercase" name="mbl2" placeholder="optional" id="mbl2">
								</div>

								<div class="form-group">
								  <label for="bank">Letter of Credit No. from Bank:</label>
								  <input type="text" class="form-control input-sm " name="bank" id="bank">
								</div>
						</div>

					<div class="col-lg-4">

								<div class="form-group">
								  <label for="registry">Registry:</label>
								  <input type="text" class="form-control input-sm" name="registry" id="registry">
								</div>

								<div class="form-group">
				  				  <input type="text" name="veselid" class="veselid hidden">
									  <label for="vsl">Vessel / Voyage No.:</label>
									  	<div class="vesel" >
								  	
								  		</div>
								 </div>

								 <div class="form-group">
								  	<label for="dtClrd">Vessel Arrival Time</label>
								 	<input type="datetime-local" name="ves_arrival_time" class="form-control input-sm">
								 </div>

								<div class="form-group">	 
								    <label for="dtClrd">Vessel Discharge Time</label>
								 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm">
								 </div>

								<div class="form-group">
								  <label for="dtRcvd">Date Recieved Arrival Notice From Client / SLINE:</label>
								  <input type="datetime-local" name="dtRcvd" class="form-control input-sm" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>
								  <input type="datetime-local" name="dt_pickup_obl" class="form-control input-sm" >
								</div>

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Recieved Other Document :</label>
								  <input type="datetime-local" name="dt_pickup_docs" class="form-control input-sm" >
								 </div>
								 	

								 <div class="form-group">
									 <label for="broker">Broker:</label>
							  			<select name="broker" id="vsl"class="form-control input-sm">
							            	<?php  foreach($broker_data as $row){  ?> 
							                <option value="<?php echo $row->BrokerId ?>">
							                <?php echo $row->FirstName . " " . $row->MiddleName . " " . $row->LastName; ?>
							                </option> 
							             	<?php }?>
						               </select>
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
						               <label for="dtReq">Date Request Budget to GL:</label>
									   <input type="date" name="dt_req_budget" class="form-control input-sm" id="dtReq">
								  </div>

								<div class="form-group">
									 <label for="rfp">Reference Due Date:</label>
									 <input type="date" name="ref_due_dt" class="form-control input-sm " id="rfp">
								 </div>

								 <div class="form-group">
									 <label for="dtSent">Date Sent Pre-Assess:</label>
									 <input type="date" name="dt_sent_preassed" class="form-control input-sm" id="dtSent">
								</div>

								<div class="form-group">
									 <label for="dtFile">Date File Entry to BOC:</label>
									 <input type="date" name="dt_file_entry_boc" class="form-control input-sm" id="dtFile">
								</div>

								<div class="form-group">
								 	<label for="dtSent">Date Sent Final-Assess:</label>
								 	<input type="date" name="dt_sent_finalassed" class="form-control input-sm" id="dtSent">
								</div>

								<div class="form-group">
								 	<label for="dtClrd">Reference Entry No.:</label>
								 	<input type="text" name="entryno" class="form-control input-sm">
								</div>

							     <div class="form-group">
								 	 <label for="dtPaid">Date Paid(Date& Time):</label>
									  <input type="datetime-local" name="dt_paid" class="form-control input-sm">
								 </div>

								 <div class="form-group">
								  	<label for="dtClrd">Date Cleared BOC:</label>
								  	<input type="datetime-local" name="dt_boc" class="form-control input-sm">
								 </div>

								 <div class="form-group">
								   <label for="status">Status Report:</label>
								  	<input type="text" name="status" class="form-control input-sm">
								 </div>
				  			</div>
				  		</div>
				  </div>

				<!-- Products PLATE WINDOW-->
				  	<div id="tableAddTruck" class="hidden pill-truck-mnla-add truck-editable col-lg-12">
					    <table class="table" style="width: 2000px;">
					      <tr>
					        <th>Product Name</th>
					       <!--  <th>Container by Vessel ID</th> -->
					        <th>Color Selectivity</th>
					        <th>Purchase Order Number</th>
					        <th>Origin Country ID</th>
					        <th>Origin City</th>
					        <th><button type="button" class="btn btn-default table-add-truck"><span class="table-add  fa fa-plus"></span></button></th>
					      </tr>
		<!--Products plate is no names yet -->
					      <tr>
					        <!-- <td><input type="text" name="products" /></td> -->
					        <td><input type="text" name="products" /></td>
					        <td><select name="colors"class="form-control colsel input-sm" >
												          	<option  value="" disabled selected>Jobfile Status</option>
															<?php  foreach($color_data as $row){ 
															   $status = $row->IsBackground;
															   if($status==1){?> 
															   			<option  data-color='<?php echo $row->ColorCode;?>' style="color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">					
														 <?php }else{?>
											                			<option data-color='<?php echo $row->ColorCode;?>'style="background-color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">
											                <?php }?>
											                <?php echo $row->StatusName; ?>
											                </option> 
											             	<?php }?>
												        </select></td>
					       
					        <td><input type="text" name="purch_order_no" /></td>
					        <td>
					        	<select name="countries">
					        		<?php foreach($countries as $row){ ?>
					        		 <option value="<?php echo $row->CountryId?>">
					        		 <?php echo $row->CountryName;?>
					        		 </option>
					        		<?php }?> 
					        	</select>		
					        </td>
					        <td><input type="text" name="city" /></td>
					        <td>
					          <button type="button" class="btn btn-default table-remove-truck"><span class="table-remove  fa fa-times"></span></button>
					        </td>
					      </tr>

					      <!-- This is our clonable table line -->
					      <tr class="hide">
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td><select  name="colors" class="form-control colsel input-sm" >
												          	<option  value="" disabled selected>Jobfile Status</option>
															<?php  foreach($color_data as $row){ 
															   $status = $row->IsBackground;
															   if($status==1){?> 
															   			<option  data-color='<?php echo $row->ColorCode;?>' style="color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">					
														 <?php }else{?>
											                			<option data-color='<?php echo $row->ColorCode;?>'style="background-color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">
											                <?php }?>
											                <?php echo $row->StatusName; ?>
											                </option> 
											             	<?php }?>
												        </select></td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td>
					          <button type="button" class="btn btn-default table-remove-truck"><span class="table-remove  fa fa-times"></span></button>
					        </td>
					      </tr>
					    </table>
					</div>

		<!--container plate is no names yet -->
				<!--CONTAINER WINDOW-->
				  	<div id="tableAddContainer" class="hidden pill-container-mnla-add table-editable col-lg-12">
					    <table class="table " style="width: 3000px;">
					      <tr>
					      	<th>Container Number</th>
					        <th>Vessel by JobFile</th>
					        <th>Number of Cartons</th>
					        <th>Trucker Plate No.</th>
					        <th>Trucker Name</th>
					        <th>Estimated Departure Time</th>
					        <th>Estimated Arrival Time</th>
					        <th>Actual Arrival Time</th>
					        <th>Start of Storage</th>
					        <th>Start of Demorage</th>
					        <th>Lodging</th>
					        <th>Hauler</th>
					        <th>Target Delivery Date</th>
					        <th>Gate In at Port</th>
					        <th>Gate Out at Port</th>
					        <th>Actual Delivery at Warehouse</th>
					        <th><button type="button" class="btn btn-default table-add-cont"><span class="table-add  fa fa-plus"></span></button></th>
					      </tr>

					      <tr>
					      <!--for container -->
					        <td>
					            <select name="container_nos">
					            <?php foreach($container_data as $row){?>
					                <option value="<?php echo $row->ContainerId;?>"><?php echo $row->ContainerNo;?></option>
					             <?php }?>
					            </select>
					        </td>
					       <!--for shippervessel -->
					        <td>
					            <select name="vessels">
					            <?php foreach($vessel_data as $row){?>
					                <option value="<?php echo $row->ShipperVesselId;?>"><?php echo $row->Vesselname;?></option>
					             <?php }?>
					            </select>
					        </td> 

					        <td><input type="text" name="cartons"/></td>
					        <td><input type="text" name="plateno" /></td>
					        <td><input type="text" name="truckername" /></td>
					        <td ><input type="datetime-local" class="form-control input-sm" name="etd"></td>
					        <td ><input type="datetime-local" class="form-control input-sm" name="eta"></td>
					        <td><input type="datetime-local" class="form-control input-sm" name="ata"></td>
					        <td><input type="text" name="start_storage" /></td>
					        <td><input type="text" name="start_demorage" /></td>
					        <td><input type="text" name="lodging"/></td>
					        <td><input type="text" name="hauler"/></td>
					        <td><input type="datetime-local" class="form-control input-sm" name="tdt"></td>
					        <td><input type="datetime-local" class="form-control input-sm" name="gip"></td>
					        <td><input type="datetime-local" class="form-control input-sm" name="gop"></td>
					        <td><input type="datetime-local" class="form-control input-sm" name="adtw"></td>
					        <td>
					      	  <button type="button" class="btn btn-default table-remove-cont"><span class="table-remove  fa fa-times"></span></button>
					          
					        </td>
					      </tr>

					      <!-- This is our clonable table line -->
					      <tr class="hide">
					       	 <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td>
					           <button type="button" class="btn btn-default table-remove-cont"><span class="table-remove fa fa-times"></span></button>
					        </td>
					      </tr>
					    </table>
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

							<div class="form-group">
									<label>Demurrage</label>
									<input type="text" name="demurrage" class="form-control input-sm" />
								</div>


						</div>
							

						<div class="col-lg-6">
							
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
    </div>

    <div class="footer-modal" >
    <hr>
      <button type="button" class="btn btn-danger btn-Next">Next</button>
      <button type="submit" class="hidden btn btn-danger test_data" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
<?php echo form_close();?>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel').change(function(){
  var status = $(this).val();
  var color = $('.colsel option:selected').attr('data-color');
    if(status==1){
    	$('.colsel:first').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel:first').css({'background-color': color,'color': 'white'});
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
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-charges-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').removeClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

			i=1;
		});

		/*
		* Show Truck
		*/

		$('#btn-truck-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-charges-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').removeClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

			i=2;
		});

		/*
		* Show Charges
		*/

		$('#btn-charges-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('.test_data').removeClass('hidden');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').removeClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');

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

			$('.pill-jobfile-mnla-add').removeClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

			i=0;
		});

		/*
		* Next Button
		*/

		var i=0;

		$(".btn-Next").on('click',function(){
			i++;

			if(i==1){
				$("#btn-container-mnla-add").click();
			}else if(i==2){
				$("#btn-truck-mnla-add").click();
			}else if(i==3){
				$("#btn-charges-mnla-add").click();
			}
		});

});


</script>


<script>
/*
-----------------------------
Truck Table Adding row table  : agrc(12/8/15)
-----------------------------
*/

var truck= $('.tableAddTruck');

$('.table-add-truck').click(function () {
  var $clone = truck.find('tr.hide').clone(true).removeClass('hide table-line');
  truck.find('table').append($clone);
});

$('.table-remove-truck').click(function () {
  $(this).parents('tr').detach();
});

</script>

<script>
/*
-----------------------------
Container Table Adding row table  : agrc(12/8/15)
-----------------------------
*/

var container = $('#tableAddContainer');

$('.table-add-cont').click(function () {
  var $clone = container.find('tr.hide').clone(true).removeClass('hide table-line');
  container.find('table').append($clone);
});

$('.table-remove-cont').click(function () {
  $(this).parents('tr').detach();
});

</script>




<script>
//for  getting the vessel based on shipper
$(document).ready(function(){
	 $(' #shipper').change(function(){
		
 var shipids= $(this).val();

			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/');?>",
			  		 data: { ship_id:shipids}
				})
		  		.done(function(data) {
		  		 $('div .vesel').html(data);	
		  			
		  		
		  		});

	});
});
</script>





