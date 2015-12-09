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
			    <li id="btn-truck-mnla-add"><a role="button">Truck / Plate</a></li>
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

								<div class="col-lg-4" >
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
								<input type="text" name="veselid" class="veselid">
								  <label for="vsl">Vessel / Voyage No.:</label>
								  	<div class="vesel" >
								  	
								  	</div>
								  	 <label for="dtClrd">Vessel Arrival Time</label>
								 		 <input type="datetime-local" name="ves_arrival_time" class="form-control input-sm">
								    <label for="dtClrd">Vessel Discharge Time</label>
								 		 <input type="datetime-local" name="ves_discharge_time" class="form-control input-sm">
								  
								  
								  <div class="tab_manila hidden"> 	
									  <label for="carrier">Carrier:</label>
									  <input type="text" name="carrier" class="  form-control input-sm" id="carrier">
								  </div>
								  <label for="dtRcvd">Date Recieved Arrival Notice From Client / SLINE:</label>
								  <input type="datetime-local" name="dtRcvd" class="form-control input-sm" >

								  <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>
								  <input type="datetime-local" name="dt_pickup_obl" class="form-control input-sm" >

								  <label for="dtPckRcv">Date Pick-up / Recieved Other Docs :</label>
								  <input type="datetime-local" name="dt_pickup_docs" class="form-control input-sm" >

					<!-- 			  <label for="dtPckRcv">Date Pick-up / Recieved Other Docs :</label>
								  <input type="datetime-local" name="dt_pickup_docs" class="form-control input-sm" > -->

								  <!--fo testing only -->
								  <label for="" >Ware House</label>
								   <select name="warehouseid" class="form-control">
								   	<option value="1">PAL</option>
								   	<option value="2">PAIR CARGO</option>

								   </select>

								   <label for="" >Hauler</label>
								   <select name="hauler" class="form-control">
							  			<option> </option>
						            	<?php  foreach($hauler_data as $row){  ?> 
						                <option value="<?php echo $row->HaulerId ?>">
						                <?php echo $row->HaulerName ?>
						                </option> 
						             	<?php }?>
						            </select>

								  <label for="dtPckup">Date Paid</label>
								  <input type="datetime-local" name="DatePaid" class="form-control input-sm" >

								  <div class="flight hidden">
										  <label for="dtPckRcv">Flight No. :</label>
										  <input type="text"  name="FlightNo" class="form-control input-sm hidden" >
									  <label for="dtPckRcv">Air Craft No.:</label>
									  <input type="datetime-local" name="P_AirCraftNo" class="form-control input-sm" >
								  </div>
								  <label for="dtPckRcv">DateReceived Notice From Forwarder :</label>
								  <input type="datetime-local" name="DateReceivedNoticeFromForwarder" class="form-control input-sm" >



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
					  				<select class="form-control colsel" >
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

				<!-- TRUCK PLATE WINDOW-->
				  	<div id="tableAddTruck" class="hidden pill-truck-mnla-add truck-editable col-lg-12">
					    <span class="table-add table-add-truck glyphicon glyphicon-plus"></span>
					    <table class="table trucker">
					      <tr>
					        <th>Truck Name</th>
					        <th>Truck /Plate No.</th>
					        
					        <th>Actual date Delivered to Warehouse</th>
					        <th>Status Report</th>
					        <th></th>
					      </tr>
		<!--truck plate is no names yet -->
					      <tr>
					        <td contenteditable="true"><input type="text"  name="truckername" class="truckername form-control" placeholder="Trucker Name" /></td>
					        <td contenteditable="true"><input type="text"  name="plateno" class="plateno form-control" placeholder="Plate No." /></td>
					        <td contenteditable="true"><input type="datetime-local"  class="form-control input-sm" name="gip"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="gop"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="adtw"></td>
					        <td contenteditable="true">undefined</td>
					        <td>
					          <span class="table-remove table-remove-truck glyphicon glyphicon-remove"></span>
					        </td>
					      </tr>

					      <!-- This is our clonable table line -->
					      <tr class="hide">
					        <td contenteditable="true">Untitled</td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">undefined</td>
					        <td>
					          <span class="table-remove table-remove-truck glyphicon glyphicon-remove"></span>
					        </td>
					      </tr>
					    </table>
					</div>

		<!--container plate is no names yet -->
				<!--CONTAINER WINDOW-->
				  	<div id="tableAddContainer" class="hidden pill-container-mnla-add table-editable col-lg-12">
					    <table class="table " style="width: 3000px;">
					      <tr>
					      	<th>Number of Cartons</th>
					        <th>Container Number</th>
					        <th>Description of Goods</th>
					        <th>Lodging</th>
					        <th>Target Delivery Date</th>
					        <th>Actual P-Out date of container at Port</th>
					        <th>Actual date recieved container to Warehouse</th>
					        <th>Gate In at Port</th>
					        <th>Gate Out at Port</th>
					        <th>Status Report</th>
					        <th><button type="button" class="btn btn-default table-add-cont"><span class="table-add  fa fa-plus"></span></button></th>
					      </tr>

					      <tr>
					        <td contenteditable="true">Untitled</td>
					        <td><button type="button" class="btn btn-View"><span class="fa fa-eye fa-fw"></span>View</button></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="lodging"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="tdt"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">undefined</td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">undefined</td>
					        <td>
					      	  <button type="button" class="btn btn-default table-remove-cont"><span class="table-remove  fa fa-times"></span></button>
					          
					        </td>
					      </tr>

					      <!-- This is our clonable table line -->
					      <tr class="hide">
					         <td contenteditable="true">Untitled</td>
					        <td><button type="button" class="btn btn-View"><span class="fa fa-eye fa-fw"></span>View</button></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="lodging"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name="tdt"></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">undefined</td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
					        <td contenteditable="true">undefined</td>
					        <td>
					           <button type="button" class="btn btn-default table-remove-cont"><span class="table-remove fa fa-times"></span></button>
					        </td>
					      </tr>
					    </table>
					</div>

					<div class="hidden pill-charges-mnla-add table-editable col-lg-12">
						
					</div>
				</div>
			</div>
		</div>
		</div>	
    </div>

    <div class="footer-modal" >
    <hr>
      <button type="submit" class="btn btn-danger test_data" >Save</button>
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
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-charges-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').removeClass('hidden');
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
		});

		/*
		* Show Truck
		*/

		$('#btn-charges-mnla-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').addClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').removeClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
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



<script>
//for trucker
$('.test_data').click(function(){
 var p = $('.plateno').val();
  alert(p);
});
  
  var gate_in_port 			    = $(this).closest('tr').children('td:eq(1)').text();
  var gate_out_port    			= $(this).closest('tr').children('td:eq(2)').text();	
  var time_to_deliver_warehouse = $(this).closest('tr').children('td:eq(3)').text();
  var status_report             = $(this).closest('tr').children('td:eq(4)').text();



</script>

