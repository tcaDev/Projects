<div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
    <div class="modal-header" style="background-color:#eee">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Vessel(s)</h4>
    </div>

    <div class="modal-body">

    		 <!--Vessel WINDOW-->
  				<div id="table-updateVessel-mnla" class="vessel-mnla-update">

						<div class="col-lg-6">

					

							<div class="form-group ">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-updateVessel-mnla form-control input-sm"disabled>
							</div>

							

							<div class="form-group">
								<label>Vessel/Voyage #</label>
								<span class="vessel-msg-updateVessel-mnilas"> </span>
								<input type="text" class="form-control input-sm vessel-updateVessel-mnila" id="vessel" name="vessel" ><!-- onkeyup="check_vessel_avail_update(this.value)" -->
								 <i class="vessel-msg-updateVessel-mnila" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Estimated Departure</label>
								 	<input type="date" name="es_dep_time" class="form-control input-sm edt-updateVessel-mnila">
						     </div>

						     <div class="form-group">
								<label>Estimated Arrival</label>
								<input type="date" name="est-dept" class="form-control input-sm eat-updateVessel-mnila" />
							 </div>

							

						</div>

						<div class="col-lg-6">

						 <div class="form-group">	 
							    <label for="dtClrd">Actual Berthing Time</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm abt-updateVessel-mnila">
							 </div>

						<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt-updateVessel-mnila">
							 </div>

						    <div class="form-group">
								<label>Actual Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-updateVessel-mnila" />
							 </div>

							
							 <div class="form-group carrier-updateVessel-mnila">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control shipping_lines " name="countries">
									<option value="0">Select Shipping Line/Carrier</option>
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo stripslashes($row->CarrierName);?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg-updateVessel-mnila" style="color:red;"></i>
							</div>
						</div>
						<div style="width: 100%; overflow-x:auto;"></div>
					</div>
     </div>

	<div class="modal-footer">
	   	 <button type="button" class="btn btn-danger update_vessel">Save</button>
	     <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
	</div>
</div>

<script>
var Carrierid;
function check_vessel_avail_update(vess){
   			var jbfl = $('.jobfile-updateVessel-mnla').val();
   			var vessel = $(this).closest('tr').children('td:eq(2)').text();
   	        
   				 $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_availability');?>",
				  		data: { jbfl   :jbfl,
				  			    vessel :vess
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-msg-updateVessel-mnilas').html(data);
					});
   			
}
$(document).ready(function(){

	$(document).on('click','.btn-update-vessel',function(){

		var jobfile_mnla = $(".jobfile_mnila_update_vessel").val();

		$(".jobfile-updateVessel-mnla").val(jobfile_mnla);

		 var vessel = $(this).closest('tr').children('td:eq(2)').text();
		 var carrier_name= $(this).closest('tr').children('td:eq(3)').text();
		 var act_arrival_time = $(this).closest('tr').children('td:eq(4)').text();
		 var discharge_time = $(this).closest('tr').children('td:eq(6)').text();
		 var est_dept_time = $(this).closest('tr').children('td:eq(8)').text();
		 var est_arrival_time = $(this).closest('tr').children('td:eq(10)').text();
		 var carrier_value = $(this).closest('tr').children('td:eq(12)').text();
		  var act_berthing_time = $(this).closest('tr').children('td:eq(13)').text();
		 Carrierid = carrier_value;

		 	/*alert(carrier_name);*/
		 $('.vessel-updateVessel-mnila').val(vessel);
		 $('.edt-updateVessel-mnila').val(est_dept_time);
		 $('.eat-updateVessel-mnila').val(est_arrival_time);
		 $('.aat-updateVessel-mnila').val(act_arrival_time);
		 $('.vdt-updateVessel-mnila').val(discharge_time);
		  $('.abt-updateVessel-mnila').val(act_berthing_time);
		

		  $(".carrier-updateVessel-mnila option").filter(function() {
		    return this.text == carrier_name; 
		}).attr('selected', 'selected');


	});
});

     $(document).on('click','.update_vessel',function(){
     	job     		  = $('.jobfile-updateVessel-mnla').val();
        vessel 			  =   $('.vessel-updateVessel-mnila').val();
		est_dept_time     =   $('.edt-updateVessel-mnila').val();
		est_arrival_time  =   $('.eat-updateVessel-mnila').val();
		act_arrival_time  =   $('.aat-updateVessel-mnila').val();
		discharge_time    =   $('.vdt-updateVessel-mnila').val();
		act_berthing_time    =   $('.abt-updateVessel-mnila').val();
        shipping_lines    =   $('.shipping_lines').val();
       
      		
					$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_manila_update/vessel');?>",
				  		data: { 
				  			    job         	   :job,
				  				Vessel             : vessel,
				  			    est_dept_time      : est_dept_time,
				  			    est_arrival_time   : est_arrival_time,
				  			    act_arrival_time   : act_arrival_time,
				  			    discharge_time     : discharge_time,
				  			    act_berthing_time  : act_berthing_time,
				  			    Carrierid  		   : Carrierid,
				  			    cr 				   : shipping_lines
				  		}
					})
			  		.done(function(data) {
				  			$.alert({
			    	 	  	 	backgroundDismiss: false, 	
				        		title: 'Success!',
				        		content:data,
				        		confirm: function(){
				        			 $('#updateVessel-mnla').modal('hide');
				        			 $('#viewvessels').modal('hide');
				        	    }
				   			  }); 
								
					});


     });
</script>