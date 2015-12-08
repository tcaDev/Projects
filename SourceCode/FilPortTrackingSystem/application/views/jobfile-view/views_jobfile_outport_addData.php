<div class="modal-content" style="width:180%;right:40%;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
      	<div class="form-group">
		  <div class="col-lg-12 outport-addData" style="margin-bottom: 10px;">
		  	<div class="row">
		  		<div class="col-lg-4" >	
	  				<label for="jbfl">JobFile No.:</label>
					  <input type="text" class="form-control input-sm " id="jbfl">

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
						  <input type="text" class="form-control input-sm" id="cnts">

						  <label for="cntr">Conainer Size:</label>
						  <input type="text" class="form-control input-sm" id="cntr">

						  <label for="pipo">PI / PO No.:</label>
						  <input type="text" class="form-control input-sm" id="pipo">

						  <label for="hbl">House Bill of Landding No.:</label>
						  <input type="text" class="form-control input-sm" id="hbl">

						  <label for="mbl">Master Bill of Landing No1.:</label>
						  <input type="text" class="form-control input-sm" id="mbl">

						  <label for="mbl">Master Bill of Landing No2.:</label>
						  <input type="text" class="form-control input-sm text-uppercase" placeholder="optional" id="mbl2">

						  <label for="origin">Origin:</label>
						  <input type="text" class="form-control input-sm" id="origin">

						  <label for="etd">Estimated Time of Departure:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="eta">Estimated Time of Arrival:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">
						</div>

						<div class="col-lg-4" >
						  <label for="AVT">AVT:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="ata" data-toggle="tooltip" title="Actual Time of Arrival">Actual Time of Arrival:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

		  				  <label for="bank">Letter of Credit No. from Bank:</label>
						  <input type="text" class="form-control input-sm " id="bank">

						  <label for="dem">Start of Demorage:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="storage">Start Storage:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="registry">Registry:</label>
						  <input type="text" class="form-control input-sm" id="registry">
<!-- -->
						  <label for="vsl">Vessel / Voyage No.:</label>
						  	<div id="vesel" >
						  		<input type="text" required/>
						  	</div>
						  
						  <div class="tab_manila hidden"> 	
							  <label for="carrier">Carrier:</label>
							  <input type="text" class="  form-control input-sm" id="carrier">
						  </div>
						  <label for="dtRcvd">Date Recieved Arrival Notice From Client / SLINE:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="dtPckRcv">Date Pick-up / Recieved Other Docs :</label>
						  <input type="datetime-local" class="form-control input-sm" name="">
		  			</div>

					<div class="col-lg-4" >
						  <label for="broker">Broker:</label>
				  			<select name="shipper" id="vsl"class="form-control">
				            	<?php  foreach($broker_data as $row){  ?> 
				                <option value="<?php echo $row->BrokerId ?>">
				                <?php echo $row->FirstName . " " . $row->MiddleName . " " . $row->LastName; ?>
				                </option> 
				             	<?php }?>
			               </select>

						  <label for="dtReq">Date Required Budget to GL:</label>
						  <input type="date" class="form-control input-sm" id="dtReq">


		  				 <label for="rfp">Reference Due Date:</label>
						 <input type="date" class="form-control input-sm " id="rfp">

						 <label for="dtSent">Date Sent Pre-Assess:</label>
						 <input type="date" class="form-control input-sm" id="dtSent">

						 <label for="dtFile">Date File Entry to BOC:</label>
						 <input type="date" class="form-control input-sm" id="dtFile">

						 <label for="slctvty">Color Selectivity:</label>
			  				<select class="form-control" id="colsel">
					          	<option value="" disabled selected>Jobfile Status</option>
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
						  <input type="datetime-local" class="form-control input-sm" name="">

						  <label for="dtClrd">Date Cleared BOC:</label>
						  <input type="datetime-local" class="form-control input-sm" name="">
		  			</div>
		  		</div>
		  </div>

		<!-- TRUCK PLATE WINDOW-->
		  	<div id="tableAddTruck-outport" class="hidden outport-truck-addData truck-editable col-lg-12">
			    <span class="table-add table-add-truck-outport glyphicon glyphicon-plus"></span>
			    <table class="table">
			      <tr>
			        <th>Truck /Plate No.</th>
			        <th>Gate In at Port</th>
			        <th>Gate Out at Port</th>
			        <th>Actual date Delivered to Warehouse</th>
			        <th>Status Report</th>
			        <th></th>
			      </tr>

			      <tr>
			        <td contenteditable="true">Untitled</td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true"><input type="datetime-local" class="form-control input-sm" name=""></td>
			        <td contenteditable="true">undefined</td>
			        <td>
			          <span class="table-remove table-remove-truck-outport glyphicon glyphicon-remove"></span>
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
			          <span class="table-remove table-remove-truck-outport glyphicon glyphicon-remove"></span>
			        </td>
			      </tr>
			    </table>
			</div>


		<!--CONTAINER WINDOW-->
		  	<div id="tableAddContainer-outport" class="hidden outport-table-addData table-editable col-lg-12">
			    <span class="table-add table-add-cont-outport glyphicon glyphicon-plus"></span>
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
			          <span class="table-remove table-remove-cont-outport glyphicon glyphicon-remove"></span>
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
			          <span class="table-remove table-remove-cont-outport glyphicon glyphicon-remove"></span>
			        </td>
			      </tr>
			    </table>
			</div>
		</div>
    </div>

    <div class="footer-modal" >
      <button type="button" class="hidden back_truck-outport btn btn-danger" >Back</button>
      <button type="button" class="hidden back_cont-outport btn btn-danger" >Back</button>
      <button type="button" class="hidden truck-outport btn btn-danger" >Truck/Plate</button>
      <button type="button" class="cont-outport btn btn-danger" >Container</button>
      <button type="button" class=" hidden save_add-outport btn btn-danger" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>



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
    $(".cont-outport").on('click', function(){
    	$(".outport-addData").addClass('hidden');
    	$(".cont-outport").addClass('hidden');


    	$(".truck-outport").removeClass('hidden');
    	$(".back_cont-outport").removeClass('hidden');
    	$(".outport-table-addData").removeClass('hidden');
    });


/*
* back Button container
*/

	$(".back_cont-outport").on('click', function(){
    	$(".back_cont-outport").addClass('hidden');
    	$(".outport-truck-addData").addClass('hidden');
    	$(".outport-table-addData").addClass('hidden');
    	$(".truck-outport").addClass('hidden');

    	$(".cont-outport").removeClass('hidden');
    	$(".outport-addData").removeClass('hidden');
    });


/*
* Truck Button
*/
    $(".truck-outport").on('click', function(){
    	$(".truck-outport").addClass('hidden');
    	$(".outport-table-addData").addClass('hidden');
    	$(".cont-outport").addClass('hidden');
    	$(".outport-addData").addClass('hidden');
    	$(".back_cont-outport").addClass('hidden');


    	$(".back_truck-outport").removeClass('hidden');
    	$(".save_add-outport").removeClass('hidden');
    	$(".outport-truck-addData").removeClass('hidden')
    });

/*
* back Button truck
*/

	$(".back_truck-outport").on('click', function(){
    	$(this).addClass('hidden');
    	$(".outport-addData").addClass('hidden');
    	$(".cont-outport").addClass('hidden');
    	$(".outport-truck-addData").addClass('hidden');
		$(".cont-outport").addClass('hidden');	
		$(".save_add-outport").addClass('hidden');

    	$(".truck-outport").removeClass('hidden');
    	$(".outport-table-addData").removeClass('hidden');;
    	$(".back_cont-outport").removeClass('hidden');
    	
    });



});


</script>


<script>
/*
-----------------------------
Truck Table Adding row table  : agrc(12/8/15)
-----------------------------
*/

var truck= $('#tableAddTruck-outport');

$('.table-add-truck-outport').click(function () {
  var $clone = truck.find('tr.hide').clone(true).removeClass('hide table-line');
  truck.find('table').append($clone);
});

$('.table-remove-truck-outport').click(function () {
  $(this).parents('tr').detach();
});

</script>

<script>
/*
-----------------------------
Container Table Adding row table  : agrc(12/8/15)
-----------------------------
*/

var container = $('#tableAddContainer-outport');

$('.table-add-cont-outport').click(function () {
  var $clone = container.find('tr.hide').clone(true).removeClass('hide table-line');
  container.find('table').append($clone);
});

$('.table-remove-cont-outport').click(function () {
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

