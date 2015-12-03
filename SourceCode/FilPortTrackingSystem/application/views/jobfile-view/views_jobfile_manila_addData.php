  





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

		  				<label for="jbfl">JobFile No.:</label>

						  <input type="text" class="form-control input-sm " id="jbfl">



						   <label for="shipper">Shipper:</label>
					  		<select name="shipper" id="shipper" class="form-control">
				            	<?php  foreach($drop as $row){  ?> 
				                <option value="<?php echo $row->ConsigneeId ?>">
				                <?php echo $row->ShipperName ?>
				                </option> 
				             	<?php }?>
			               	</select>


						   <label for="consignee">Consignee:</label>

						  		<select name="shipper" class="form-control">
					            	<?php  foreach($drop as $row){  ?> 
					                <option value="<?php echo $row->ConsigneeId ?>">
					                <?php echo $row->ShipperName ?>
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
						  
						  <input type="date" class="form-control input-sm" id="etd" size="100" >
						  <input type="time" class="form-control input-sm" id="etd_time" size="100" >


						  <label for="eta">Estimated Time of Arrival:</label>

						  <input type="date" class="form-control input-sm" id="eta">
						  <input type="time" class="form-control input-sm" id="eta_time" size="100" >
						</div>

						<div class="col-lg-4" >
						  <label for="AVT">AVT:</label>

						  <input type="date" class="form-control input-sm" id="avt">
						  <input type="time" class="form-control input-sm" id="avt_time" size="100" >


						  <label for="ata" data-toggle="tooltip" title="Actual Time of Arrival">Actual Time of Arrival:</label>

						  <input type="date" class="form-control input-sm" id="ata">
						  <input type="time" class="form-control input-sm" id="ata_time" size="100" >

		  				<label for="bank">Letter of Credit No. from Bank:</label>

						  <input type="text" class="form-control input-sm " id="bank">



						   <label for="dem">Start of Demorage:</label>

						  <input type="text" class="form-control input-sm" id="dem">



						   <label for="storage">Start Storage:</label>

						  <input type="text" class="form-control input-sm" id="storage">



						   <label for="registry">Registry:</label>

						  <input type="text" class="form-control input-sm" id="registry">



						   <label for="vsl">Vessel / Voyage No.:</label>

						  		<select name="shipper" id="vsl"class="form-control">
					            	<?php  foreach($drop as $row){  ?> 
					                <option value="<?php echo $row->ConsigneeId ?>">
					                <?php echo $row->ShipperName ?>
					                </option> 
					             <?php }?>
					               </select>



						   <label for="carrier">Carrier:</label>

						  <input type="text" class="form-control input-sm" id="carrier">



						   <label for="dtRcvd">Date Recieved Arrival Notice From Client / SLINE:</label>

						  <input type="text" class="form-control input-sm" id="dtRcvd">



						   <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>

						  <input type="text" class="form-control input-sm" id="dtPckup">



						   <label for="dtPckRcv">Date Pick-up / Recieved Other Docs :</label>

						  <input type="text" class="form-control input-sm" id="dtPckRcv">

		  			</div>

					<div class="col-lg-4" >

						  <label for="broker">Broker:</label>

						  
				  			<select name="shipper" id="vsl"class="form-control">
			            	<?php  foreach($drop as $row){  ?> 
			                <option value="<?php echo $row->ConsigneeId ?>">
			                <?php echo $row->ShipperName ?>
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



						   <label for="slctvty">Selectivity:</label>

						  <input type="text" class="form-control input-sm" id="slctvty">



						   <label for="dtPaid">Date Paid(Date& Time):</label>

						  <input type="date" class="form-control input-sm" id="dtPaid">



						   <label for="dtClrd">Date Cleared BOC:</label>

						  <input type="date" class="form-control input-sm" id="dtClrd">



						   <label for="plteNum">Plate No. /Truck Name:</label>

						  <input type="text" class="form-control input-sm" id="plteNum">



						   <label for="gateIn">Gate In at Port:</label>

						  <input type="date" class="form-control input-sm" id="gateIn">



						   <label for="gateOut">Gate Out at Port:</label>

						  <input type="date" class="form-control input-sm" id="gateOut">



		  			</div>

		  		</div>

		  </div>



		 

		  	<div id="tableAdd" class="hidden table-addData table-editable col-lg-12">

			    <span class="table-add glyphicon glyphicon-plus"></span>

			    <table class="table ">

			      <tr>

			        <th>Container Number</th>

			        <th>Description of Goods</th>

			        <th>Target Delivery Date</th>

			        <th>Actual P-Out date of container at Port</th>

			        <th>Actual date recieved container to WHSE</th>

			        <th>Status Report</th>

			        <th></th>

			      </tr>

			      <tr>

			        <td contenteditable="true">Untitled</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td>

			          <span class="table-remove glyphicon glyphicon-remove"></span>

			        </td>

			        

			      </tr>

			      <!-- This is our clonable table line -->

			      <tr class="hide">

			        <td contenteditable="true">Untitled</td>

			        <td contenteditable="true">undefined</td>

			         <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td contenteditable="true">undefined</td>

			        <td>

			          <span class="table-remove glyphicon glyphicon-remove"></span>

			        </td>

			        

			      </tr>

			    </table>

			  </div>

		</div>

    </div>

    <div class="footer-modal" >

      <button type="button" class="next_add btn btn-danger" >Next</button>

      <button type="button" class="hidden save_add btn btn-danger" >Save</button>

      <button type="button" class="hidden back_add btn btn-danger" >Back</button>

      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

    </div>

  </div>









  <script>

$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();  





    $(".next_add").on('click', function(){



    	$(".next_add").addClass('hidden');

    	$(".addData").addClass('hidden');



    	$(".save_add").removeClass('hidden');

    	$(".back_add").removeClass('hidden');

    	$(".table-addData").removeClass('hidden');

    });



	$(".back_add").on('click', function(){

    	$(".back_add").addClass('hidden');

    	$(".save_add").addClass('hidden');

    	$(".table-addData").addClass('hidden');



    	$(".next_add").removeClass('hidden');

    	$(".addData").removeClass('hidden');



    });



});







var $TABLE = $('#tableAdd');

var $BTN = $('#export-btn');

var $EXPORT = $('#export');



$('.table-add').click(function () {

  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');

  $TABLE.find('table').append($clone);

});



$('.table-remove').click(function () {

  $(this).parents('tr').detach();

});



$('.table-up').click(function () {

  var $row = $(this).parents('tr');

  if ($row.index() === 1) return; // Don't go above the header

  $row.prev().before($row.get(0));

});



$('.table-down').click(function () {

  var $row = $(this).parents('tr');

  $row.next().after($row.get(0));

});



// A few jQuery helpers for exporting only

jQuery.fn.pop = [].pop;

jQuery.fn.shift = [].shift;



$BTN.click(function () {

  var $rows = $TABLE.find('tr:not(:hidden)');

  var headers = [];

  var data = [];

  

  // Get the headers (add special header logic here)

  $($rows.shift()).find('th:not(:empty)').each(function () {

    headers.push($(this).text().toLowerCase());

  });

  

  // Turn all existing rows into a loopable array

  $rows.each(function () {

    var $td = $(this).find('td');

    var h = {};

    

    // Use the headers from earlier to name our hash keys

    headers.forEach(function (header, i) {

      h[header] = $td.eq(i).text();   

    });

    

    data.push(h);

  });

  

  // Output the result

/*  $EXPORT.text(JSON.stringify(data));*/

});

</script>


<script>
//for	

</script>