 <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Vessel(s)</h4>
        </div>
	        <div class="modal-body">
	           <!--Vessel WINDOW-->
  				<div id="table-AddVessel-outport" class="vessel-outport-add">

						<div class="col-lg-6">


							<div class="form-group ">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-addVessel-outport form-control input-sm"disabled>
							</div>

							<div class="form-group">
								<label>Vessel/Voyage #</label> 
								<span class="vessel-msg-addVessel-outports"> </span>
								<input type="text" class="form-control input-sm vessel-addVessel-outport" id="vessel" name="vessel" onkeyup="check_vessel_avail_outport(this.value)">
								 <i class="vessel-msg-addVessel-outport" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Estimated Departure Time</label>
								 	<input type="datetime-local" name="es_dep_time" class="form-control input-sm edt-addVessel-outport">
						     </div>

						     <div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm eat-addVessel-outport" />
							 </div>

						</div>

						<div class="col-lg-6">

						    <div class="form-group">
                                                            <!--Actual Arrival Time -->
								<label>Actual Verting Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-addVessel-outport" />
							 </div>

							<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt-addVessel-outport">
							 </div>

							 <div class="form-group">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control carrier-addVessel-outport" name="countries">
									<option value="0" selected>Select Shipping Line/Carrier</option>
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo stripslashes($row->CarrierName);?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg-addVessel-outport" style="color:red;"></i>
							</div>

							<button type="button" class="btn-addVessel-outport btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Vessel</button>
							<i class="tableVessel-msg-addVessel-outport" style="color:red;"></i>
						</div>
					

						<div style="width: 100%; overflow-x: auto;">
						    <table class="table" style="width: 1300px;" border="1">
							    <thead>
							    	 <tr>
								        <th>Vessel/Voyage #</th>
								        <th>Estimated Departure Time</th>
								        <th>Estimated Arrival Time</th>
								        <th>Actual Arrival Time</th>
								        <th>Discharge Time of Vessel</th>
								        <th class="hidden">Vessel Value</th>
						       			<th>Shipping Lines / Carrier</th>
								        <th></th>
							      	</tr>
							    </thead>
						    </table>
						</div>

					</div>
	        </div>

        <div class="modal-footer" >
	       	 <button type="button " class="btn btn-danger save_vessel-outport">Save</button>
	         <button type="button" class="btn btn-default btn-close-vessels" data-dismiss="modal">Close</button>
        </div>
      </div>

<script>



/*Delete Row*/
	  	$(document).on('click', '#table-AddVessel-outport .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

	var check_vessel=false;
				function isExist_vessel_outport(vessel){

				var table_vessel_outport = $("#table-AddVessel-outport table tbody");

				    check_vessel=false;
				 	  table_vessel_outport.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===vessel) {
					       check_vessel=true;            
					        }   
					     })
				    return check_vessel;
				}
	
	$(document).on('click','.btn-addVessel-outport', function(){

		if(isExist_vessel_outport($('#table-AddVessel-outport .vessel-addVessel-outport').val()))
			{	
				$('.vessel-msg-addVessel-outport').text("Place another Vessel.");
				$('#table-AddVessel-outport .vessel-msg-addVessel-outports').text("");
			}
			else if($('#table-AddVessel-outport .vessel-msg-addVessel-outports i').text() == "Already exists")
			{
				$('.vessel-msg-addVessel-outport').text("Place another Vessel");
			}
			else if($('#table-AddVessel-outport .vessel-addVessel-outport').val() == "")
			{
				$('.vessel-msg-addVessel-outport').text("Need Vessel");
			}
		else if($('#table-AddVessel-outport .carrier-addVessel-outport').val() == "0")
			{
				$('.carrier-msg-addVessel-outport').text("Need Shipping Line/Carrier.");
			}
		
		else{

		$('#table-AddVessel-outport table').append('<tr class="remove_tr"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		
		$('#table-AddVessel-outport table tr:last td:nth-child(1)').html($(".vessel-addVessel-outport").val());
		$('#table-AddVessel-outport table tr:last td:nth-child(2)').html($(".edt-addVessel-outport").val());
		$('#table-AddVessel-outport table tr:last td:nth-child(3)').html($(".eat-addVessel-outport").val());
		$('#table-AddVessel-outport table tr:last td:nth-child(4)').html($(".aat-addVessel-outport").val());
		$('#table-AddVessel-outport table tr:last td:nth-child(5)').html($(".vdt-addVessel-outport").val());
		$('#table-AddVessel-outport table tr:last td:nth-child(6)').html($(".carrier-addVessel-outport").val()).hide();
	    $('#table-AddVessel-outport table tr:last td:nth-child(7)').html($(".carrier-addVessel-outport option:selected").text());
		$('#table-AddVessel-outport table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.vessel-msg-addVessel-outport').text("");
		$('.carrier-msg-addVessel-outport').text("");
		$('.tableVessel-msg-addVessel-outport').text("");
		$('#table-AddVessel-outport .vessel-msg-addVessel-outports').text("");

		$("#table-AddVessel-outport .carrier-addVessel-outport option:eq(0)").attr("selected","selected");

		$('#table-AddVessel-outport .vessel-addVessel-outport').val('');
		$('#table-AddVessel-outport .edt-addVessel-outport').val('');
		$('#table-AddVessel-outport .eat-addVessel-outport').val('');
		$('#table-AddVessel-outport .aat-addVessel-outport').val('');
		$('#table-AddVessel-outport .vdt-addVessel-outport').val('');

		}
	});
</script>




<script>
function check_vessel_avail_outport(vess){
   			var jbfl = $('.jobfile-addVessel-outport').val();
   			var exist_vessel = isExist_vessel_outport($('#table-AddVessel-outport .vessel-addVessel-outport').val());
   		
   				 $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_availability');?>",
				  		data: { jbfl   :jbfl,
				  			    vessel :vess,
				  			    exist_vessel: exist_vessel
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-msg-addVessel-outports').html(data);
					});
   			
}
/*$('.carrier-addVessel-outport').change(function(){
   var $(".carrier-addVessel-outport option:selected").text();
});*/

 $(document).on('click', '.save_vessel-outport',function(){

	$('.save_vessel-outport').attr('disabled','disabled');
 	if($("#table-AddVessel-outport  table tbody tr td").length == 0){
 					$.confirm({
		 			 title: 'Add New Vessel',
		 			 closeIcon:false,
		 			 content:'You have not Added Any Vessel. Do you wish to Continue Exitting?',
		 			 backgroundDismiss: false,
		 			 confirmButton: 'Yes',
  					 cancelButton: 'No',
  					 confirm: function(){
  					 	$('.modal').modal('hide');
  					 	$('.save_vessel-outport').removeAttr('disabled');
  					 },
  					 cancel: function(){
  					 	$('.save_vessel-outport').removeAttr('disabled');
  					 }
		 		});
				}else{
					  dia =	$.dialog({
				 	  	    icon: 'fa fa-spinner fa-spin',
				 	  	    closeIcon: false,
			        		title: 'Please wait!',
			        		backgroundDismiss: false,
			        		content: 'Currently Adding Vessel',
			   			});

 			var jbfl = $('.jobfile-addVessel-outport').val();


		//for adding vessel
            var table = $("#table-AddVessel-outport table tbody");
            var t3    = $("#table-AddVessel-outport table tbody tr").length;
		    table.find('tr').each(function (count1) {
	        var c3   = count1+1;
			var $tds = $(this).find('td'),
			vessel   = $tds.eq(0).text(),
		    edt 	= $tds.eq(1).text();
		    eat     = $tds.eq(2).text();
		    aat     = $tds.eq(3).text();
	        vdt    	= $tds.eq(4).text();
		    lines   = $tds.eq(5).text();

	
		         $.ajax({
			  		method: "POST",
					url: "<?php echo base_url('Job/vessel');?>",

			  		data: {
			  			    //from jobfile tab
			  			    jbfl           :jbfl,
			  			    vessel 		   :vessel,
			  			    vdt		       :vdt,
			  			    edt            :edt,
			  		        eat            :eat,
			  		        aat            :aat,
			  			    lines		   :lines
			  		}
				})
			    .done(function(data) {
			    	       if(t3==c3){
	  						$.alert({
	  							backgroundDismiss: false, 	 	
				        		title: 'Success!',
				        		content: 'New Vessel Added!',
				        		confirm: function(){
				        			$('.vessel-msg-addVessel-outports').empty();
				        			$(".remove_tr" ).remove();
				        			dia.close();
				        			$('.save_vessel-outport').removeAttr('disabled');
				        			$('.modal').modal('hide');
				        	    }
				   			});
	  					   }
	    		    });		  
	   });	
		//end

				}


});
</script>

