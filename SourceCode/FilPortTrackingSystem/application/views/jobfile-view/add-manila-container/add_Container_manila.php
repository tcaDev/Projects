 <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Container(s)</h4>
        </div>
	        <div class="modal-body">
	           <!--CONTAINER WINDOW-->
  	<div id="table-AddContainer-mnla" class="container-mnla-add ">

	  	<div class="col-lg-6">

	  		<div class="form-group hidden">
				<label>JobFile</label>
	        	<input type="text" class="jobfile-addContainer-mnla form-control input-sm">
			</div>


	  	   	<div class="form-group">
				<label>Vessel/Voyage #</label>
					<select class="vessel-addContainer-manila form-control input-sm"> 
						
					</select>
			</div>

  			<div class="form-group">
				<label>Container Number</label>					     
	        	<input type="text" class="container-addContainer-manila form-control input-sm" onkeyup="check_Container_mnila(this)">
	        	<i class="container-msg-addContainer-manila" style="color:red;"></i>
			</div>

			<div class="form-group">
				<label>Container Size</label>
	        	<input type="text" class="container-size-addContainer-manila form-control input-sm">
			</div>


			<div class="form-group">
				<label>Number of Cartons</label> <span id="errmsg-addContainer-manila" style="color:red;"></span>
				<input type="text" step="1" class="form-control input-sm cartons-addContainer-manila" id="cartons-addContainer-manila">
			</div>


		    <div class="form-group">
				<label>Hauler/Truck Name</label>
				<select class="form-control truckname-addContainer-manila" >
						<?php foreach($hauler_data as $row){ ?>
							 <option value="<?php echo $row->HaulerOrTruckId?>">
							 <?php echo stripslashes($row->HaulerOrTruck);?>
							 </option>
							<?php }?> 
				</select>
			</div>

			<div class="form-group">
				<label>Trucker Plate No.</label>
				<input type="text" name="trckplte" class="form-control input-sm plate-addContainer-manila" />
				
			</div>

		   <div class="form-group">
				<label>Referrence Entry Number</label>					     
	        		<input type="date-time-local" class="ref_entry_no-addContainer-manila form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Paid</label>					     
	        		<input type="date" class="dt_paid-addContainer-manila form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Sent PreAssessment</label>					     
	        		<input type="date" class="dt_pre_assess-addContainer-manila form-control input-sm">
			</div>

			<div class="form-group">
				<label>Date Sent Final Assessment</label>
				<input type="date" name="" class="form-control input-sm dt_final_assess-addContainer-manila" />
			</div>


	  	</div>
	  	
  			

	  	<div class="col-lg-6">

	  		<div class="form-group">
				<label>Start of Storage</label>
				<input type="date" name="strtstrge" class="form-control input-sm storage-addContainer-manila" />
			</div>

			<div class="form-group">
				<label>Start of Demurrage </label>
				<input type="date" name="strtdmrage" class="form-control input-sm demorage-addContainer-manila" />
			</div>

			<div class="form-group">
				<label>Lodging</label>
				<input type="date" name="lodging" class="form-control input-sm lodging-addContainer-manila" />
			</div>

			<!-- <div class="form-group">
				<label>Hauler</label>
				<input type="text" name="lodge" class="form-control input-sm" />
			</div> -->

			<div class="form-group">
				<label>Gate In at Port</label>
				<input type="date" name="gtinport" class="form-control input-sm gtinport-addContainer-manila" />
			</div>

			<div class="form-group">
				<label>Gate Out at Port</label>
				<input type="date" name="gtoutport" class="form-control input-sm gtoutport-addContainer-manila" />
			</div>

			<div class="form-group">
				<label>Actual Delivery at Warehouse</label>
				<input type="date" name="act-del-whse" class="form-control input-sm act-del-whse-addContainer-manila" />
			</div>

		    <div class="form-group">
				<label>Target Delivery Date</label>
				<input type="date" name="" class="form-control input-sm tdt-addContainer-manila" />
			</div>

			<div class="form-group">
				<label>Pull out Date at Port</label>
				<input type="date" name="" class="form-control input-sm pull_out_port-addContainer-manila" />
			</div>


		    <div class="form-group">
				  	<label for="dtClrd">Date File Entry To BOC:</label>
				  	<input type="date" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc-addContainer-manila">
			</div>	

			<div class="form-group">
				  	<label for="dtClrd">Date Cleared BOC:</label>
				  	<input type="date" name="dt_boc" class="form-control input-sm dt_boc-addContainer-manila">
			</div>

			<button type="button" class="btn-addContainer-manila btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
	  		<i class="tableContainer-msg-addContainer-manila" style="color:red;"></i>

	  	</div>

	  	<div style="width: 100%; overflow-x: auto;">
	    <table class="table" style="width: 3000px;" border="1">
	      <thead>
		      <tr>
		        <th>Vessel/Voyage #</th> 
		      	<th>Container Number</th>
		      	<th>Container Size</th>      	
		        <th>Number of Cartons</th>
		        <th>Trucker Plate No.</th>
		        <th>Trucker Name</th>
		        <th>Referrence Entry Number</th>
		        <th>Start of Demurrage </th>
		        <th>Start of Storage</th>
		        <th>Date Paid</th>
		         <th>Lodging</th>
		        <th>Date Sent PreAssessment</th>
		        <th>Date Sent Final Assessment</th>
		        <th>Gate In at Port</th>
		        <th>Gate Out at Port</th>
		        <th>Actual Delivery at Warehouse</th>
		        <th>Target Delivery Date</th>
		        <th>Pull out Date at Port </th>
		        <th>Date File Entry To BOC</th>
		        <th>Date Cleared BOC</th>
		        <th></th>
		      </tr>
	      </thead>
	    </table>
	</div>


	</div>
	        </div>
        <div class="modal-footer">
	       	 <button type="button" class="btn btn-danger">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>




<script>
	$(document).ready(function(){


/*Button Close*/
	$(".btn-close").click(function(){
		location.reload();
	});


/*Number Only*/
	  //called when key is pressed in textbox
	  $("#cartons-addContainer-manila").keypress(function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $("#errmsg-addContainer-manila").html("Numbers Only").show().fadeOut("slow");
	               return false;
	    }
	   });

 /*Delete Row*/
	  	$('#table-AddContainer-mnla').on('click', '.deleteButton', function() {
	    	$(this).closest("tr").remove();

		});


/*Check if exist in Database*/

function check_Container_mnila(container){

  	container = container.value;

   			/*$.ajax({
			  		method: "POST",
					url: link + "/Job/container_manila/",
			  		data: { container_manila:container_manila}
			})
			.done(function(data) {
		   		 	   $('.container-msg-addContainer-manila').html(data);
				});
*/
 }

/*If Container Is Exist in table*/
			var check=false;
				function isExist_cont(container){

				var table = $("#table-AddContainer-mnla table tbody");

				    check=false;
				 	  table.find('tr').each(function(){
					    if($('td:nth(0)',$(this)).html()===container) {
					       check=true;            
					        }   
					     })
				    return check;
				}



				

		$(".btn-addContainer-manila").click(function(){

		
			if(isExist_cont($('#table-AddContainer-mnla .container-addContainer-manila').val()))
			{	
				$('.container-msg-addContainer-manila').text("Container Number Already Exists.");
			}
			
			else{

	       $('#table-AddContainer-mnla table').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	        
	        $('#table-AddContainer-mnla table tr:last td:nth-child(1)').html($(".vessel-addContainer-manila option:selected").text());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(2)').html($(".container-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(3)').html($(".container-size-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(4)').html($(".cartons-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(5)').html($(".plate-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(6)').html($(".truckname-addContainer-manila").val()).hide();
	        $('#table-AddContainer-mnla table tr:last td:nth-child(7)').html($(".truckname-addContainer-manila option:selected").text());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(8)').html($(".ref_entry_no-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(9)').html($(".demorage-addContainer-manila").val()); 
	        $('#table-AddContainer-mnla table tr:last td:nth-child(10)').html($(".storage-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(11)').html($(".dt_paid-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(12)').html($(".lodging-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(13)').html($(".dt_pre_assess-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(14)').html($(".dt_final_assess-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(15)').html($(".gtinport-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(16)').html($(".gtoutport-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(17)').html($(".act-del-whse-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(18)').html($(".tdt-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(19)').html($(".pull_out_port-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(20)').html($(".dt_file_entry_boc-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(21)').html($(".dt_boc-addContainer-manila").val());
	        $('#table-AddContainer-mnla table tr:last td:nth-child(22)').html("<button type='button' class='btn btn-danger deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

	        $('.container-msg-addContainer-manila').text('');

			$('.tableContainer-msg-addContainer-manila').text("");

			$('#table-AddContainer-mnla .container-addContainer-manila').val('');
			$('#table-AddContainer-mnla .container-size-addContainer-manila').val('');
			$('#table-AddContainer-mnla .plate-addContainer-manila').val('');
			$('#table-AddContainer-mnla .cartons-addContainer-manila').val('');

			$('#table-AddContainer-mnla .ref_entry_no-addContainer-manila').val('');
			$('#table-AddContainer-mnla .dt_paid-addContainer-manila').val('');
			$('#table-AddContainer-mnla .dt_pre_assess-addContainer-manila').val('');
		    $('#table-AddContainer-mnla .dt_file_entry_boc-addContainer-manila').val('');
		    $('#table-AddContainer-mnla .tdt-addContainer-manila').val('');
		    $('#table-AddContainer-mnla .pull_out_port-addContainer-manila').val('');

			$('#table-AddContainer-mnla .storage-addContainer-manila').val('');
			$('#table-AddContainer-mnla .demorage-addContainer-manila').val('');
			$('#table-AddContainer-mnla .lodging-addContainer-manila').val('');
			$('#table-AddContainer-mnla .dt_final_assess-addContainer-manila').val('');
			$('#table-AddContainer-mnla .gtinport-addContainer-manila').val('');
			$('#table-AddContainer-mnla .gtoutport-addContainer-manila').val('');
			$('#table-AddContainer-mnla .act-del-whse-addContainer-manila').val('');
			$('#table-AddContainer-mnla .dt_boc-addContainer-manila').val('');
			}
			
		});
	});

</script>