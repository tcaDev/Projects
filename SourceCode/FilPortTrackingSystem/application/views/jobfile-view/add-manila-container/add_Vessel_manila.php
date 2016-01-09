 <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Vessel(s)</h4>
        </div>
	        <div class="modal-body">
	           <!--Vessel WINDOW-->
  				<div id="table-AddVessel-mnla" class="vessel-mnla-add">

						<div class="col-lg-6">


							<div class="form-group ">
								<label>JobFile</label>
					        	<input type="text" class="jobfile-addVessel-mnla form-control input-sm"disabled>
							</div>

							<div class="form-group">
								<label>Vessel/Voyage #</label> 
								<span class="vessel-msg-addVessel-mnilas"> </span>
								<input type="text" class="form-control input-sm vessel-addVessel-mnila" id="vessel" name="vessel" onkeyup="check_vessel_avail(this.value)">
								 <i class="vessel-msg-addVessel-mnila" style="color:red;"></i>
							</div>

							 <div class="form-group">
								  	<label for="dtClrd">Estimated Departure Time</label>
								 	<input type="datetime-local" name="es_dep_time" class="form-control input-sm edt-addVessel-mnila">
						     </div>

						     <div class="form-group">
								<label>Estimated Arrival Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm eat-addVessel-mnila" />
							 </div>

						</div>

						<div class="col-lg-6">

						    <div class="form-group">
                                                            <!--Actual Arrival Time -->
								<label>Actual Verting Time</label>
								<input type="datetime-local" name="est-dept" class="form-control input-sm aat-addVessel-mnila" />
							 </div>

							<div class="form-group">	 
							    <label for="dtClrd">Discharge Time of Vessel</label>
							 	<input type="datetime-local" name="ves_discharge_time" class="form-control input-sm vdt-addVessel-mnila">
							 </div>

							 <div class="form-group">

							<label>Shipping Line/Carrier</label><i style="color:red;">*</i>
								<select class="form-control carrier-addVessel-mnila" name="countries">
									<option value="0" selected>Select Shipping Line/Carrier</option>
										<?php foreach($carrier as $row){ ?>
											 <option value="<?php echo $row->CarrierId?>">
											 <?php echo stripslashes($row->CarrierName);?>
											 </option>
											<?php }?> 
								</select>
									<i class="carrier-msg-addVessel-mnila" style="color:red;"></i>
							</div>

							<button type="button" class="btn-addVessel-mnila btn btn-primary pull-right" style="margin-bottom:10px;"><span class=" fa fa-plus fa-fw"></span> Add Vessel</button>
							<i class="tableVessel-msg-addVessel-mnila" style="color:red;"></i>
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
	       	 <button type="button " class="btn btn-danger save_vessel">Save</button>
	         <button type="button" class="btn btn-default btn-close-vessels" data-dismiss="modal">Close</button>
        </div>
      </div>

<script>



/*Delete Row*/
	  	$(document).on('click', '#table-AddVessel-mnla .deleteButton', function() {
	    	$(this).closest("tr").remove();
		});

	var check_vessel=false;
				function isExist_vessel_mnila(vessel){

				var table_vessel_mnila = $("#table-AddVessel-mnla table tbody");

				    check_vessel=false;
				 	  table_vessel_mnila.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===vessel) {
					       check_vessel=true;            
					        }   
					     })
				    return check_vessel;
				}
	
	$(document).on('click','.btn-addVessel-mnila', function(){

		if(isExist_vessel_mnila($('#table-AddVessel-mnla .vessel-addVessel-mnila').val()))
			{	
				$('.vessel-msg-addVessel-mnila').text("Place another Vessel.");
				$('#table-AddVessel-mnla .vessel-msg-addVessel-mnilas').text("");
			}
			else if($('#table-AddVessel-mnla .vessel-msg-addVessel-mnilas i').text() == "Already exists")
			{
				$('.vessel-msg-addVessel-mnila').text("Place another Vessel");
			}
			else if($('#table-AddVessel-mnla .vessel-addVessel-mnila').val() == "")
			{
				$('.vessel-msg-addVessel-mnila').text("Need Vessel");
			}
		else if($('#table-AddVessel-mnla .carrier-addVessel-mnila').val() == "0")
			{
				$('.carrier-msg-addVessel-mnila').text("Need Shipping Line/Carrier.");
			}
		
		else{

		$('#table-AddVessel-mnla table').append('<tr class="remove_tr"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
		
		$('#table-AddVessel-mnla table tr:last td:nth-child(1)').html($(".vessel-addVessel-mnila").val());
		$('#table-AddVessel-mnla table tr:last td:nth-child(2)').html($(".edt-addVessel-mnila").val());
		$('#table-AddVessel-mnla table tr:last td:nth-child(3)').html($(".eat-addVessel-mnila").val());
		$('#table-AddVessel-mnla table tr:last td:nth-child(4)').html($(".aat-addVessel-mnila").val());
		$('#table-AddVessel-mnla table tr:last td:nth-child(5)').html($(".vdt-addVessel-mnila").val());
		$('#table-AddVessel-mnla table tr:last td:nth-child(6)').html($(".carrier-addVessel-mnila").val()).hide();
	    $('#table-AddVessel-mnla table tr:last td:nth-child(7)').html($(".carrier-addVessel-mnila option:selected").text());
		$('#table-AddVessel-mnla table tr:last td:nth-child(8)').html("<button type='button' class='btn btn-default table-remove deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

		$('.vessel-msg-addVessel-mnila').text("");
		$('.carrier-msg-addVessel-mnila').text("");
		$('.tableVessel-msg-addVessel-mnila').text("");
		$('#table-AddVessel-mnla .vessel-msg-addVessel-mnilas').text("");

		$("#table-AddVessel-mnla .carrier-addVessel-mnila option:eq(0)").attr("selected","selected");

		$('#table-AddVessel-mnla .vessel-addVessel-mnila').val('');
		$('#table-AddVessel-mnla .edt-addVessel-mnila').val('');
		$('#table-AddVessel-mnla .eat-addVessel-mnila').val('');
		$('#table-AddVessel-mnla .aat-addVessel-mnila').val('');
		$('#table-AddVessel-mnla .vdt-addVessel-mnila').val('');

		}
	});
</script>




<script>
function check_vessel_avail(vess){
   			var jbfl = $('.jobfile-addVessel-mnla').val();
   			var exist_vessel = isExist_vessel_mnila($('#table-AddVessel-mnla .vessel-addVessel-mnila').val());
   		
   				 $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_availability');?>",
				  		data: { jbfl   :jbfl,
				  			    vessel :vess,
				  			    exist_vessel: exist_vessel
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-msg-addVessel-mnilas').html(data);
					});
   			
}
/*$('.carrier-addVessel-mnila').change(function(){
   var $(".carrier-addVessel-mnila option:selected").text();
});*/

 $(document).on('click', '.save_vessel',function(){


				 	  dia =	$.dialog({
				 	  	    icon: 'fa fa-spinner fa-spin',
				 	  	    closeIcon: false,
			        		title: 'Please wait!',
			        		backgroundDismiss: false,
			        		content: 'Currently Adding Vessel',
			   			});

 	var jbfl = $('.jobfile-addVessel-mnla').val();


		//for adding vessel
            var table = $("#table-AddVessel-mnla table tbody");
            var t3    = $("#table-AddVessel-mnla table tbody tr").length;
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
				        			$('.vessel-msg-addVessel-mnilas').empty();
				        			$(".remove_tr" ).remove();
				        			dia.close();
				        			location.reload();
				        	    }
				   			});
	  					   }
	    		    });		  
	   });	
		//end
});
</script>

