  





  <div class="modal-content" style="width:180%;right:40%;">

    <div class="modal-header" style="background-color: deepskyblue;">

      <button type="button" class="close" data-dismiss="modal">&times;</button>

      <h4 class="modal-title text-uppercase ">update Data Form</h4>

    </div>

    <div class="modal-body">

      	<div class="form-group">

		  <div class="col-lg-12 updateData" style="margin-bottom: 10px;">

		  	<div class="row">

		  			<div class="col-lg-4" >	

		  				<input type="hidden" name="jobfile_id" class="jobfile_id" />

		  				<label for="jbfl">JobFile No.:</label>

						  <input type="text" class="form-control input-sm " id="jbfl">



						   <label for="shipper">Shipper:</label>

						  <input type="text" class="form-control input-sm" id="shipper">



						   <label for="consignee">Consignee:</label>

						  <input type="text" class="form-control input-sm" id="consignee">



						   <label for="cnts">No. of CTNS:</label>

						  <input type="text" class="form-control input-sm" id="cnts">



						   <label for="cntr">CNTR Size:</label>

						  <input type="text" class="form-control input-sm" id="cntr">



						   <label for="pipo">PI / PO No.:</label>

						  <input type="text" class="form-control input-sm" id="pipo">



						   <label for="hbl">HBL No.:</label>

						  <input type="text" class="form-control input-sm" id="hbl">



						   <label for="mbl">MBL No.:</label>

						  <input type="text" class="form-control input-sm" id="mbl">



						   <label for="origin">Origin:</label>

						  <input type="text" class="form-control input-sm" id="origin">



						  <label for="etd">ETD:</label>

						  <input type="text" class="form-control input-sm" id="etd">



						  <label for="eta">ETA:</label>

						  <input type="text" class="form-control input-sm" id="eta">



						  <label for="ata" data-toggle="tooltip" title="Actual Time of Arrival">ATA:</label>

						  <input type="text" class="form-control input-sm" id="ata">

		  			</div>



		  			<div class="col-lg-4" >

		  				<label for="bank">LC No. Bank:</label>

						  <input type="text" class="form-control input-sm " id="bank">



						   <label for="dem">Start of DEM:</label>

						  <input type="text" class="form-control input-sm" id="dem">



						   <label for="storage">Start Storage:</label>

						  <input type="text" class="form-control input-sm" id="storage">



						   <label for="registry">Registry:</label>

						  <input type="text" class="form-control input-sm" id="registry">



						   <label for="vsl">VSL / VOY No.:</label>

						  <input type="text" class="form-control input-sm" id="vsl">



						   <label for="carrier">Carrier:</label>

						  <input type="text" class="form-control input-sm" id="carrier">



						   <label for="dtRcvd">DT RCVD Arrival Notice FRM Client / SLINE:</label>

						  <input type="text" class="form-control input-sm" id="dtRcvd">



						   <label for="dtPckup">DT Pick-up / RCVD O-BL:</label>

						  <input type="text" class="form-control input-sm" id="dtPckup">



						   <label for="dtPckRcv">DT Pick-up / RCVD Other Docs :</label>

						  <input type="text" class="form-control input-sm" id="dtPckRcv">



						  <label for="broker">Broker:</label>

						  <input type="text" class="form-control input-sm" id="broker">



						  <label for="dtReq">DT Req. Budget to GL:</label>

						  <input type="text" class="form-control input-sm" id="dtReq">

		  			</div>



					<div class="col-lg-4" >

		  				<label for="rfp">RFP Due Date:</label>

						  <input type="text" class="form-control input-sm " id="rfp">



						   <label for="dtSent">DT Sent Pre-Assess:</label>

						  <input type="text" class="form-control input-sm" id="dtSent">



						   <label for="dtFile">Date File Entry to BOC:</label>

						  <input type="text" class="form-control input-sm" id="dtFile">



						   <label for="slctvty">Selectivity:</label>

						  <input type="text" class="form-control input-sm" id="slctvty">



						   <label for="dtPaid">DT Paid D&T:</label>

						  <input type="text" class="form-control input-sm" id="dtPaid">



						   <label for="dtClrd">DT Cleared BOC:</label>

						  <input type="text" class="form-control input-sm" id="dtClrd">



						   <label for="plteNum">Plate No. /Truck Name:</label>

						  <input type="text" class="form-control input-sm" id="plteNum">



						   <label for="gateIn">Gate In at Port:</label>

						  <input type="text" class="form-control input-sm" id="gateIn">



						   <label for="gateOut">Gate Out at Port:</label>

						  <input type="text" class="form-control input-sm" id="gateOut">



		  			</div>

		  		</div>

		  </div>



		 

		  	<div id="table1" class="hidden table-update table-editable col-lg-12">

			    <span class="table-add table-updateData glyphicon glyphicon-plus"></span>

			    <table class="table ">

			      <tr>

			        <th>Container Number</th>

			        <th>Description of Goods</th>

			        <th>Target Delivery Date</th>

			        <th>Actual P-Out DT of CNTR at Port</th>

			        <th>Actual DT RCVD CNTR to WHSE</th>

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

			          <span class="table-remove table-updateData-remove glyphicon glyphicon-remove"></span>

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

			          <span class="table-remove table-updateData-remove glyphicon glyphicon-remove"></span>

			        </td>

			        

			      </tr>

			    </table>

			  </div>

		</div>

    </div>

    <div class="footer-modal" >

      <button type="button" class="next_edit btn btn-danger" >Next</button>

      <button type="button" class="hidden save_edit btn btn-danger" >Save</button>

      <button type="button" class="hidden back_edit btn btn-danger" >Back</button>

      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

    </div>

  </div>









  <script>

$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip();  





    $(".next_edit").on('click', function(){



    	$(".next_edit").addClass('hidden');

    	$(".updateData").addClass('hidden');



    	$(".save_edit").removeClass('hidden');

    	$(".back_edit").removeClass('hidden');

    	$(".table-update").removeClass('hidden');

    });



	$(".back_edit").on('click', function(){

    	$(".back_edit").addClass('hidden');

    	$(".save_edit").addClass('hidden');

    	$(".table-update").addClass('hidden');



    	$(".next_edit").removeClass('hidden');

    	$(".updateData").removeClass('hidden');



    });



});







var $TABLE = $('#table1');

var $BTN = $('#export-btn');

var $EXPORT = $('#export');



$('.table-updateData').click(function () {

  var $clone1 = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');

  $TABLE.find('table').append($clone1);

});



$('.table-updateData-remove').click(function () {

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