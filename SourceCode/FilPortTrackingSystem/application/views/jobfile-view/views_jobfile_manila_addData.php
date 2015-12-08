<div class="modal-content" style="width:180%;right:40%;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
      	<div class="form-group">
		  <div class="col-lg-12 addData" style="margin-bottom: 10px;">
		  	<div class="row">
		  		<div class="col-lg-4" >	
		  <?php echo  form_open('Job');?>
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

						  <label for="eta">Estimated Time of Arrival:</label>
						  <input type="datetime-local" class="form-control input-sm" name="eta">
						</div>

						<div class="col-lg-4" >
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
						  	<div id="vesel" >
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
		  			</div>
		  		</div>
		  </div>

		<!-- TRUCK PLATE WINDOW-->
		  	<div id="tableAddTruck" class="hidden truck-addData truck-editable col-lg-12">
			    <span class="table-add table-add-truck glyphicon glyphicon-plus"></span>
			    <table class="table">
			      <tr>
			        <th>Truck /Plate No.</th>
			        <th>Gate In at Port</th>
			        <th>Gate Out at Port</th>
			        <th>Actual date Delivered to Warehouse</th>
			        <th>Status Report</th>
			        <th></th>
			      </tr>
<!-truck plate is no names yet -->
			      <tr>
			        <td contenteditable="true">Untitled</td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
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

<!-container plate is no names yet -->
		<!--CONTAINER WINDOW-->
		  	<div id="tableAddContainer" class="hidden table-addData table-editable col-lg-12">
			    <span class="table-add table-add-cont glyphicon glyphicon-plus"></span>
			    <table class="table ">
			      <tr>
			        <th>Container Number</th>
			        <th>Description of Goods</th>
			        <th>Target Delivery Date</th>
			        <th>Actual P-Out date of container at Port</th>
			        <th>Actual date recieved container to Warehouse</th>
			        <th>Status Report</th>
			        <th></th>
			      </tr>

			      <tr>
			        <td contenteditable="true">Untitled</td>
			        <td contenteditable="true">undefined</td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true">undefined</td>
			        <td>
			          <span class="table-remove table-remove-cont glyphicon glyphicon-remove"></span>
			        </td>
			      </tr>

			      <!-- This is our clonable table line -->
			      <tr class="hide">
			        <td contenteditable="true">Untitled</td>
			        <td contenteditable="true">undefined</td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true">undefined</td>
			        <td>
			          <span class="table-remove table-remove-cont glyphicon glyphicon-remove"></span>
			        </td>
			      </tr>
			    </table>
			</div>
		</div>
    </div>

    <div class="footer-modal" >
      <button type="button" class="hidden back_truck btn btn-danger" >Back</button>
      <button type="button" class="hidden back_cont btn btn-danger" >Back</button>
      <button type="button" class="hidden truck btn btn-danger" >Truck/Plate</button>
      <button type="button" class="cont btn btn-danger" >Container</button>
      <button type="submit" class=" hidden save_add btn btn-danger" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
<?php echo form_close();?>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('#colsel').change(function(){
  var status = $(this).val();
  var color = $('#colsel option:selected').attr('data-color');
    if(status==1){
    	$('#colsel').css({ 'color': 'red','background-color':'white' });
    }else{
     $('#colsel').css({'background-color': color,'color': 'white'});
  	}
 });

</script>


  <script>
	$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip(); 

/*
* Container Button
*/
    $(".cont").on('click', function(){
    	$(".addData").addClass('hidden');
    	$(".cont").addClass('hidden');


    	$(".truck").removeClass('hidden');
    	$(".back_cont").removeClass('hidden');
    	$(".table-addData").removeClass('hidden');
    });


/*
* back Button container
*/

	$(".back_cont").on('click', function(){
    	$(".back_cont").addClass('hidden');
    	$(".truck-addData").addClass('hidden');
    	$(".table-addData").addClass('hidden');
    	$(".truck").addClass('hidden');

    	$(".cont").removeClass('hidden');
    	$(".addData").removeClass('hidden');
    });


/*
* Truck Button
*/
    $(".truck").on('click', function(){
    	$(".truck").addClass('hidden');
    	$(".table-addData").addClass('hidden');
    	$(".cont").addClass('hidden');
    	$(".addData").addClass('hidden');
    	$(".back_cont").addClass('hidden');


    	$(".back_truck").removeClass('hidden');
    	$(".save_add").removeClass('hidden');
    	$(".truck-addData").removeClass('hidden')
    });

/*
* back Button truck
*/

	$(".back_truck").on('click', function(){
    	$(this).addClass('hidden');
    	$(".addData").addClass('hidden');
    	$(".cont").addClass('hidden');
    	$(".truck-addData").addClass('hidden');
		$(".cont").addClass('hidden');	
		$(".save_add").addClass('hidden');

    	$(".truck").removeClass('hidden');
    	$(".table-addData").removeClass('hidden');;
    	$(".back_cont").removeClass('hidden');
    	
    });



});


</script>


<script>
/*
-----------------------------
Truck Table Adding row table  : agrc(12/8/15)
-----------------------------
*/

var truck= $('#tableAddTruck');

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
		  		 $('#vesel').html(data);	
		  			
		  		
		  		});

	});
});
</script>

