<div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
    <div class="modal-header" style="background-color:#eee">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Vessel(s)</h4>
    </div>

    <div class="modal-body">

    		 <!--Vessel WINDOW-->
  				<div id="table-updateVessel-outport" class="vessel-outport-update">

						<div class="col-lg-6">

					

							<div class="form-group ">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-updateVessel-outport form-control input-sm"disabled>
							</div>

							

							<div class="form-group">
								<label>Vessel/Voyage #</label>
								<span class="vessel-msg-updateVessel-outports"> </span>
								<input type="text" class="form-control input-sm vessel-updateVessel-outport" id="vessel" name="vessel" ><!-- onkeyup="check_vessel_avail_update(this.value)" -->
								 <i class="vessel-msg-updateVessel-outport" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Estimated Departure</label>
								 	<input type="date" name="es_dep_time" class="form-control input-sm edt-updateVessel-outport">
						     </div>

						     <div class="form-group">
								<label>Estimated Arrival</label>
								<input type="date" name="est-dept" class="form-control input-sm eat-updateVessel-outport" />
							 </div>

							

						</div>

						<div class="col-lg-6">

						 <div class="form-group">	 
							    <label for="dtClrd">Actual Berthing Time</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm abt-updateVessel-outport">
							 </div>

						<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt-updateVessel-outport">
							 </div>

						    <div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-updateVessel-outport" />
							 </div>

							

							 <div class="form-group carrier-updateVessel-outport">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control shipping_lines-outport " name="countries">
									<option value="0">Select Shipping Line/Carrier</option>
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo stripslashes($row->CarrierName);?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg-updateVessel-outport" style="color:red;"></i>
							</div>
						</div>
						<div style="width: 100%; overflow-x:auto;"></div>
					</div>
     </div>

	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_vessel-outport">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>

<script>
var Carrierid;
function check_vessel_avail_update(vess){
   			var jbfl = $('.jobfile-updateVessel-outport').val();
   			var vessel = $(this).closest('tr').children('td:eq(2)').text();
   	        
   				 $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_availability');?>",
				  		data: { jbfl   :jbfl,
				  			    vessel :vess
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-msg-updateVessel-outports').html(data);
					});
   			
}
$(document).ready(function(){

	$(document).on('click','.btn-update-vessel-outport',function(){

		var jobfile_outport = $(".jobfile_outport_update_vessel").val();

		$(".jobfile-updateVessel-outport").val(jobfile_outport);

		 var vessel = $(this).closest('tr').children('td:eq(2)').text();
		 var carrier_name= $(this).closest('tr').children('td:eq(3)').text();
		 var act_arrival_time = $(this).closest('tr').children('td:eq(4)').text();
		  var berting_time = $(this).closest('tr').children('td:eq(6)').text();
		 var discharge_time = $(this).closest('tr').children('td:eq(8)').text();
		 var est_dept_time = $(this).closest('tr').children('td:eq(10)').text();
		 var est_arrival_time = $(this).closest('tr').children('td:eq(12)').text();
		 var carrier_value = $(this).closest('tr').children('td:eq(14)').text();
		
		 Carrierid = carrier_value;

		 	/*alert(carrier_name);*/
		 $('.vessel-updateVessel-outport').val(vessel);
		 $('.edt-updateVessel-outport').val(est_dept_time);
		 $('.eat-updateVessel-outport').val(est_arrival_time);
		 $('.aat-updateVessel-outport').val(act_arrival_time);
		 $('.vdt-updateVessel-outport').val(discharge_time);
		 $('.abt-updateVessel-outport').val(berting_time);
		

		  $(".carrier-updateVessel-outport option").filter(function() {
		    return this.text == carrier_name; 
		}).attr('selected', 'selected');


	});
});

     $(document).on('click','.update_vessel-outport',function(){
     	job     = $('.jobfile-updateVessel-outport').val();
        vessel 			  =   $('.vessel-updateVessel-outport').val();
		est_dept_time     =   $('.edt-updateVessel-outport').val();
		est_arrival_time  =   $('.eat-updateVessel-outport').val();
		act_arrival_time  =   $('.aat-updateVessel-outport').val();
		discharge_time    =   $('.vdt-updateVessel-outport').val();
		berting_time    =   $('.abt-updateVessel-outport').val();
        shipping_lines    =   $('.shipping_lines-outport').val();
       
      		
					$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_manila_update/vessel');?>",
				  		data: { 
				  			    job        		   :job,
				  				Vessel             : vessel,
				  			    est_dept_time      : est_dept_time,
				  			    est_arrival_time   : est_arrival_time,
				  			    act_arrival_time   : act_arrival_time,
				  			    discharge_time     : discharge_time,
				  			    act_berthing_time  : berting_time,
				  			    Carrierid  		   : Carrierid,
				  			    cr 				   : shipping_lines
				  		}
					})
			  		.done(function(data) {
				  			$.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content:'Vessel is updated!',
				        		confirm: function(){
				        			 $('#updateVessel-outport').modal('hide');
				        			 $('#viewvessels-outport').modal('hide');
				        	    }
				   			  }); 
								
					});


     });
</script>