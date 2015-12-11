<div class="modal-content" style="width:180%;right:40%;padding: 10px;">
	<div class="modal-header" style="background-color: deepskyblue;">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title text-uppercase ">Add Data Form</h4>
</div>

    <div class="modal-body">
    	<div class="container-fluid">
    		 <ul class="nav nav-pills">
			    <li id="btn-jobfile-outport-add" class="active"><a role="button">Jobfile</a></li>
			    <li id="btn-container-outport-add"><a role="button">Container</a></li>
			    <li id="btn-product-outport-add"><a role="button">Description of Goods</a></li>
			    <li id="btn-charges-outport-add"><a role="button">Running Charges</a></li>
			  </ul>
    	<hr>
    	<div style="overflow-x:auto;">
    		<div class="container-fluid">


		      	<div class="form-group">
				  <div class="col-lg-12 pill-jobfile-outport-add">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				  	<?php echo  form_open('Job/jofile_data');?>
				           <input type="hidden" value="2" name="monitoring_type" id="manila"/>

				           <div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:</label>   <span id="check_jobfiles"></span>
								 <input type="text" class="form-control input-sm " name="jbfl" id="jbfl" onchange="search_jobfile(this)">
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
								  <label for="hbl">House Bill of Lading No.:</label>
								  <input type="text" class="form-control input-sm" name="hbl" id="hbl">
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No1.:</label>
								  <input type="text" class="form-control input-sm" name="mbl" id="mbl">
								 </div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No2.:</label>
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
								  <label for="carrier">Carrier:</label>
								  <input type="text" class="form-control input-sm" name="registry" id="registry">
								</div>

								<div class="form-group">
								  <label for="dtRcvd">Date Recieved Arrival Notice From Client/s:</label>
								  <input type="datetime-local" name="dtRcvd" class="form-control input-sm" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Recieved O-BL:</label>
								  <input type="datetime-local" name="dt_pickup_obl" class="form-control input-sm" >
								</div>

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Recieved Other Documents :</label>
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
								 	 <label for="dtPaid">Date Paid(Date & Time):</label>
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
				  	<div id="tableAddProduct-outport" class="hidden pill-product-outport-add truck-editable col-lg-12">

				  		<div class="col-lg-6">
				  			<div class="form-group">
								<label>Product Name</label>
								<input type="text" class="form-control input-sm prodname-outport" name="prodname">
							</div>

							<div class="form-group">
								<label>Color Selectivity</label>
									<select name="colors" class="form-control colsel-outport input-sm" >
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
									</select>
							</div>

							<div class="form-group">
								<label>Purchase Order Number</label> 
								<input type="text" class="form-control input-sm PON-outport"  name="PON">
							</div>
				  		</div>

				  		<div class="col-lg-6">
					  		<div class="form-group ">
									<label>Origin Country</label>
										<select  class="form-control origin-outport" name="countries">
											<?php foreach($countries as $row){ ?>
											 <option value="<?php echo $row->CountryId?>">
											 <?php echo $row->CountryName;?>
											 </option>
											<?php }?> 
										</select>	
							</div>

							<div class="form-group">
								<label>Origin City</label>
								<input type="text" name="origcity" class="form-control input-sm origcity-outport" />
							</div>

							<button type="button" class="btn-Add-Product-Data-outport btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Add Product</button>
				  			<button type="button" class="btn-Add-Product-Alert-outport btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Alert</button>

				  		</div>

					    <table class="table" style="width: 2000px;" border="1">
						    <thead>
						    	 <tr>
							        <th>Product Name</th>
							        <th class="">Color Value</th>
							        <th>Color Selectivity</th>
							        <th>Purchase Order Number</th>
							        <th class="">Origin Value</th>
							        <th>Origin Country ID</th>
							        <th>Origin City</th>
							        <th></th>
						      	</tr>
						    </thead>
					    </table>
					</div>

		<!--container plate is no names yet -->
				<!--CONTAINER WINDOW-->
				  	<div id="tableAddContainer-outport" class="hidden pill-container-outport-add table-editable col-lg-12">

				  	 	
					  	<div class="col-lg-6">
				  			<div class="form-group">
								<label>Container Number</label>
							     <select name="container" class="form-control container-outport" >
					        		<?php foreach($container_data as $row){ ?>
					        		 <option value="<?php echo $row->ContainerId?>">
					        		 <?php echo $row->ContainerNo;?>
					        		 </option>
					        		<?php }?> 
					        	</select>	
							</div>

							<div class="form-group">
								<input type="text" name="veselid" class="veselid-outport">
				  				  <input type="text" name="veselid" class="veseltext-outport">
								<label>Vessel by JobFile</label>
									<div class="vesel" ></div>
							</div>

							<div class="form-group">
								<label>Number of Cartons</label> <span id="errmsg" style="color:red;"></span>
								<input type="text" step="1" class="form-control input-sm cartons-outport" id="cartonss" name="numofcartons">
							</div>

							<div class="form-group">
								<label>Estimated Departure Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm est-dept-outport" />
							</div>

							<div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-arr" class="form-control input-sm est-arr-ouport" />
							</div>

							<div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="act-arr" class="form-control input-sm act-arr-ouport" />
							</div>

					  	</div>
					  	
				  			



					  	<div class="col-lg-6">
					  		<div class="form-group">
								<label>Start of Storage</label>
								<input type="datetime-local" name="strtstrge" class="form-control input-sm storage-outport" />
							</div>

							<div class="form-group">
								<label>Start of Demorage</label>
								<input type="datetime-local" name="strtdmrage" class="form-control input-sm demorage-outport" />
							</div>

							<div class="form-group">
								<label>Lodging</label>
								<input type="datetime-local" name="lodging" class="form-control input-sm lodging-outport" />
							</div>

							<div class="form-group">
								 	  <label for="" >Hauler</label>
								   <select name="hauler" class="form-control hauler">
							  			<option> </option>
						            	<?php  foreach($hauler_data as $row){  ?> 
						                <option value="<?php echo $row->HaulerId ?>">
						                <?php echo $row->HaulerName ?>
						                </option> 
						             	<?php }?>
						            </select> 
								 </div>

							<div class="form-group">
								<label>Target Delivery Date</label>
								<input type="datetime-local" name="trgtdeldt" class="form-control input-sm trgtdeldt-outport" />
							</div>

							<div class="form-group">
								<label>Actual Date Received Container to  Warehouse</label>
								<input type="datetime-local" name="act-del-whse" class="form-control input-sm act-del-whse-outport" />
							</div>

							<button type="button" class="btn-Add-Container-Data-outport btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
					  		<button type="button" class="btn-Add-Container-Alert-outport btn btn-primary pull-right"><span class=" fa fa-plus fa-fw"></span> alert</button>

					  	</div>
					    <table class="table" style="width: 3000px;" border="1">
					      <thead>
						      <tr>
						      	<th class="">Container Value</th>
						      	<th>Container Number</th>
						      	<th class="">Vessel Value</th>
						        <th>Vessel by JobFile</th>
						        <th>Number of Cartons</th>
						        <th>Estimated Departure Time</th>
						        <th>Estimated Arrival Time</th>
						        <th>Actual Arrival Time</th>
						        <th>Start of Storage</th>
						        <th>Start of Demorage</th>
						        <th>Lodging</th>
						        <th>Hauler</th> 
						        <th>Target Delivery Date</th>
						        <th>Actual Delivery at Warehouse</th>
						        <th></th>
						      </tr>
					      </thead>
					    </table>



					</div>
					<div class="hidden pill-charges-outport-add table-editable col-lg-12">
						
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
      <button type="button" class="btn btn-danger btn-Next-outport-add">Next</button>
      <button type="submit" class="hidden btn btn-danger btn-Save-ouport-add" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>
<?php echo form_close();?>


<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel-outport').change(function(){
  var status = $(this).val();
  var color = $('.colsel-outport option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-outport:first').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-outport:first').css({'background-color': color,'color': 'white'});
  	}
 });

</script>


  <script>
	$(document).ready(function(){

    $('[data-toggle="tooltip"]').tooltip(); 

		/*
		* Show Container
		*/

		$('#btn-container-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-product-outport-add').removeClass('active');
			$('#btn-charges-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-product-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').removeClass('hidden');
			$('.btn-Save-ouport-add').addClass('hidden');

			$('.btn-Next-outport-add').removeClass('hidden');

			i=1;
		});

		/*
		* Show Truck
		*/

		$('#btn-product-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-charges-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-product-outport-add').removeClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.btn-Save-ouport-add').addClass('hidden');

			$('.btn-Next-outport-add').removeClass('hidden');

			i=2;
		});

		/*
		* Show Charges
		*/

		$('#btn-charges-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-jobfile-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-product-outport-add').removeClass('active');
			$('.test_data').removeClass('hidden');

			$('.pill-jobfile-outport-add').addClass('hidden');
			$('.pill-product-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').removeClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');

			$('.btn-Next-outport-add').addClass('hidden');
		});

		/*
		* Show Jobfile
		*/

		$('#btn-jobfile-outport-add').on('click',function(){
			$(this).addClass('active');
			$('#btn-charges-outport-add').removeClass('active');
			$('#btn-container-outport-add').removeClass('active');
			$('#btn-product-outport-add').removeClass('active');

			$('.pill-jobfile-outport-add').removeClass('hidden');
			$('.pill-product-outport-add').addClass('hidden');
			$('.pill-charges-outport-add').addClass('hidden');
			$('.pill-container-outport-add').addClass('hidden');
			$('.btn-Save-ouport-add').addClass('hidden');

			$('.btn-Next-outport-add').removeClass('hidden');

			i=0;
		});

		/*
		* Next Button
		*/

		var i=0;

		$(".btn-Next-outport-add").on('click',function(){
			i++;

			if(i==1){
				$("#btn-container-outport-add").click();
			}else if(i==2){
				$("#btn-product-outport-add").click();
			}else if(i==3){
				$("#btn-charges-outport-add").click();
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


</script>

<script>
/*
-----------------------------
Container Table Adding row table  : agrc(12/8/15)
-----------------------------
*/


$('.table-remove-cont').click(function () {
  $(this).parents('tr:last').remove();
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
 function search_jobfile(jobfile){
   jobfile = jobfile.value; 

   			$.ajax({
			  		method: "POST",
					  url: "<?php echo base_url('Job/check_jobfile');?>",
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
              $("#cartonss").keypress(function (e) {
                 //if the letter is not digit then display error and don't type anything
                 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    //display error message
                    $("#errmsg").html("Numbers Only").show().fadeOut("slow");
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

	});
	$('#tableAddProduct-outport').on('click', '.deleteButton', function() {

    	$(this).closest("tr").remove();

	});
});
	$(document).ready(function(){
		$(".btn-Add-Container-Data-outport").click(function(){
			$('#tableAddContainer-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	        $('#tableAddContainer-outport table tr:last td:nth-child(1)').html($(".container-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(2)').html($(".container-outport option:selected").text());
	        $('#tableAddContainer-outport table tr:last td:nth-child(3)').html($(".veselid-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(4)').html($(".veseltext-outport").val());
	        $('#tableAddContainer-outport table tr:last td:nth-child(5)').html($(".cartons-outport").val());
	           $('#tableAddContainer-outport table tr:last td:nth-child(8)').html($(".est-dept-outport").val());
	            $('#tableAddContainer-outport table tr:last td:nth-child(9)').html($(".est-arr-ouport").val());
	             $('#tableAddContainer-outport table tr:last td:nth-child(10)').html($(".act-arr-ouport").val());
	              $('#tableAddContainer-outport table tr:last td:nth-child(11)').html($(".storage-outport").val());
	               $('#tableAddContainer-outport table tr:last td:nth-child(12)').html($(".demorage-outport").val());
	                $('#tableAddContainer-outport table tr:last td:nth-child(13)').html($(".lodging-outport").val());
	                 $('#tableAddContainer-outport table tr:last td:nth-child(14)').html($(".trgtdeldt-outport").val());
	                    $('#tableAddContainer-outport table tr:last td:nth-child(17)').html($(".act-del-whse-outport").val());
	                     $('#tableAddContainer-outport table tr:last td:nth-child(18)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
		});

	


		$(".btn-Add-Product-Data-outport").click(function(){
			$('#tableAddProduct-outport table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
			 $('#tableAddProduct-outport table tr:last td:nth-child(1)').html($(".prodname-outport").val());
			  $('#tableAddProduct-outport table tr:last td:nth-child(2)').html($(".colsel-outport").val());
			   $('#tableAddProduct-outport table tr:last td:nth-child(3)').html($(".colsel-outport option:selected").text());
			    $('#tableAddProduct-outport table tr:last td:nth-child(4)').html($(".PON-outport").val());
			     $('#tableAddProduct-outport table tr:last td:nth-child(5)').html($(".origin-outport").val());
			      $('#tableAddProduct-outport table tr:last td:nth-child(6)').html($(".origin-outport option:selected").text());
			       $('#tableAddProduct-outport table tr:last td:nth-child(7)').html($(".origcity-outport").val());
			       	 $('#tableAddProduct-outport table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");
		});
		

		$(".btn-Add-Container-Alert-outport").click(function(){
		    	  var table = $("#tableAddContainer-outport table tbody");

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
		       
		       $(".btn-Add-Product-Alert-outport").click(function(){
		    	  var table = $("#tableAddProduct-outport table tbody");

				    table.find('tr').each(function (i) {
				        var $tds = $(this).find('td'),
				            productId = $tds.eq(0).text(),
				            product = $tds.eq(1).text(),
				            Quantity = $tds.eq(2).text();
				        // do something with productId, product, Quantity
				        alert('Row ' + (i + 1) + ':\nProduct Name: ' + productId
				              + '\n Color Value: ' + product
				              + '\n Color: ' + Quantity);
				    });
		    });
		  

		});
</script>