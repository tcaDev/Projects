<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Container(s)</h4>
        </div>
	        <div class="modal-body">
	           <!--CONTAINER WINDOW-->


	           <div style="height: 600px;overflow-y: auto;">
  	<div id="table-AddContainer-outport" class="container-outport-add ">

	  	<div class="col-lg-6">

	  		<div class="form-group ">
                            <label>JobFile</label>
                            <input type="text" class="jobfile-addContainer-outport form-control input-sm" disabled>
			</div>

	  	   	<div class="form-group vessel-addContainer-outport-get">

			</div>

  			<div class="form-group">
				<label>Container Number</label>	
                            <span class="check_exists_container-outport"> </span>				     
                                <input type="text" class="container-addContainer-outport form-control input-sm" onkeyup="check_Container_outport(this.value)"> 
                                <i class="container-msg-addContainer-outport" style="color:red;"></i>
			</div>

			<div class="form-group">
				<label>Container Size</label>
	        	<input type="text" class="container-size-addContainer-outport form-control input-sm">
			</div>


			<div class="form-group">
				<label>Number of Cartons</label> <span id="errmsg-addContainer-outport" style="color:red;"></span>
				<input type="text" step="1" class="form-control input-sm cartons-addContainer-outport" id="cartons-addContainer-outport">
			</div>


		    <div class="form-group">
				<label>Hauler/Truck Name</label>
				<select class="form-control truckname-addContainer-outport" >
                                        <?php foreach($hauler_data as $row){ ?>
                                                 <option value="<?php echo $row->HaulerOrTruckId?>">
                                                 <?php echo stripslashes($row->HaulerOrTruck);?>
                                                 </option>
                                                <?php }?> 
				</select>
			</div>

			<div class="form-group">
				<label>Trucker Plate No.</label>
				<input type="text" name="trckplte" class="form-control input-sm plate-addContainer-outport" />
				
			</div>

		   <div class="form-group">
				<label>Reference Entry Number</label>					     
	        		<input type="text" class="ref_entry_no-addContainer-outport form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Paid(Date & Time)</label>					     
	        		<input type="datetime-local" class="dt_paid-addContainer-outport form-control input-sm">
			</div>
			<div class="form-group">
				<label>Date Sent Pre-Assessment</label>					     
	        		<input type="date" class="dt_pre_assess-addContainer-outport form-control input-sm">
			</div>
	  	</div>
	  	
  			

	  	<div class="col-lg-6">

                        <div class="form-group">
				<label>Date Sent Final Assessment</label>
				<input type="date" name="" class="form-control input-sm dt_final_assess-addContainer-outport" />
			</div>
                    
	  		<div class="form-group">
				<label>Start of Storage</label>
				<input type="date" name="strtstrge" class="form-control input-sm storage-addContainer-outport" />
			</div>

			<div class="form-group">
				<label>Start of Demurrage </label>
				<input type="date" name="strtdmrage" class="form-control input-sm demorage-addContainer-outport" />
			</div>

			<div class="form-group">
				<label>Lodging</label>
				<input type="date" name="lodging" class="form-control input-sm lodging-addContainer-outport" />
			</div>
                    
			<div class="form-group">
				<label>Actual Delivery at Warehouse</label>
				<input type="datetime-local" name="act-del-whse" class="form-control input-sm act-del-whse-addContainer-outport" />
			</div>

		    <div class="form-group">
				<label>Target Delivery Date</label>
				<input type="date" name="" class="form-control input-sm tdt-addContainer-outport" />
			</div>

			<div class="form-group">
				<label>Pull out Date at Port</label>
				<input type="date" name="" class="form-control input-sm pull_out_port-addContainer-outport" />
			</div>

                        <div class="form-group">
                                <label for="dtClrd">Date File Entry To BOC:</label>
                                <input type="date" name="dt_file_entry_boc" class="form-control input-sm dt_file_entry_boc-addContainer-outport">
			</div>	

			<div class="form-group">
                                <label for="dtClrd">Date Cleared BOC:</label>
                                <input type="date" name="dt_boc" class="form-control input-sm dt_boc-addContainer-outport">
			</div>
                    
                        <div class="form-group">
				<label>Actual Date Received Container to Warehouse </label>
				<input type="date" name="act_dt_to_whse" class="form-control input-sm act_dt_to_whse-addContainer-outport" />
			</div>

			<button type="button" class="btn-addContainer-outport btn btn-primary pull-right" style="margin-bottom: 10px;"><span class=" fa fa-plus fa-fw"></span> Add Container</button>
	  		<i class="tableContainer-msg-addContainer-outport" style="color:red;"></i>

	  	</div>

	  	<div style="width: 100%; overflow-x: auto;">
	    <table class="table" style="width: 3000px;" border="1">
	      <thead>
		      <tr>
		      	<th class="hidden">Value Vessel</th>
		        <th>Vessel/Voyage #</th> 
		      	<th>Container Number</th>
		      	<th>Container Size</th>      	
		        <th>Number of Cartons</th>
		        <th>Trucker Plate No.</th>
		        <th class="hidden">Value Truck</th>
		        <th>Trucker Name</th>
		        <th>Reference Entry Number</th>
		        <th>Start of Demurrage </th>
		        <th>Start of Storage</th>
		        <th>Date Paid</th>
		        <th>Lodging</th>
		        <th>Date Sent Pre-Assessment</th>
		        <th>Date Sent Final Assessment</th>
		        <th>Actual Delivery at Warehouse</th>
		        <th>Target Delivery Date</th>
		        <th>Pull out Date at Port </th>
		        <th>Date File Entry To BOC</th>
		        <th>Date Cleared BOC</th>
                        <th>Actual Date Received Container to Warehouse</th>
		        <th></th>
		      </tr>
	      </thead>
	    </table>
	</div>

	</div>
	</div>
	        </div>
        <div class="modal-footer">
	       	 <button type="button" class="btn btn-danger save_container_outport">Save</button>
	         <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
      </div>


<script>
    $(document).ready(function(){
        /*Number Only*/
	  //called when key is pressed in textbox
	  $(document).on('keypress','#cartons-addContainer-outport',function (e) {
	     //if the letter is not digit then display error and don't type anything
	     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
	        //display error message
	        $("#errmsg-addContainer-outport").html("Numbers Only").show().fadeOut("slow");
	               return false;
	    }
	   });
           
       /*Delete Row*/
            $(document).on('click', '#table-AddContainer-outport .deleteButton', function() {
                $(this).closest("tr").remove();
            });
            
       /*If Container Is Exist in table*/
            var check=false;
                function isExist_cont_outport(container){

                var table = $("#table-AddContainer-outport table tbody");

                    check=false;
                        table.find('tr').each(function(){
                          if($('td:nth(2)',$(this)).html()===container) {
                             check=true;            
                              }   
                           })
                    return check;
                }
                
         $(document).on('click', '.btn-addContainer-outport', function(){
             
            if(isExist_cont_outport($('#table-AddContainer-outport .container-addContainer-outport').val()))
            {	
                    $('.container-msg-addContainer-outport').text("Container Number Already Exists.");
            }
            else if($('#table-AddContainer-outport .check_exists_container-outport i').text() == "Already exists")
            {
                    $('.container-msg-addContainer-outport').text("Place Another Container Number.");
            }
            else if($('#table-AddContainer-outport .container-addContainer-outport').val() == "")
            {
                    $('.container-msg-addContainer-outport').text("Need Container Number.");
            }
            else{

	       $('#table-AddContainer-outport table').append('<tr class="remove_tr"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
	        
	        $('#table-AddContainer-outport table tr:last td:nth-child(1)').html($(".vessel-addContainer-outport option:selected").val()).hide();
	        $('#table-AddContainer-outport table tr:last td:nth-child(2)').html($(".vessel-addContainer-outport option:selected").text());
	        $('#table-AddContainer-outport table tr:last td:nth-child(3)').html($(".container-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(4)').html($(".container-size-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(5)').html($(".cartons-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(6)').html($(".plate-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(7)').html($(".truckname-addContainer-outport option:selected").val()).hide();
	        $('#table-AddContainer-outport table tr:last td:nth-child(8)').html($(".truckname-addContainer-outport option:selected").text());
	        $('#table-AddContainer-outport table tr:last td:nth-child(9)').html($(".ref_entry_no-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(10)').html($(".demorage-addContainer-outport").val()); 
	        $('#table-AddContainer-outport table tr:last td:nth-child(11)').html($(".storage-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(12)').html($(".dt_paid-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(13)').html($(".lodging-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(14)').html($(".dt_pre_assess-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(15)').html($(".dt_final_assess-addContainer-outport").val());
                
	        $('#table-AddContainer-outport table tr:last td:nth-child(16)').html($(".act-del-whse-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(17)').html($(".tdt-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(18)').html($(".pull_out_port-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(19)').html($(".dt_file_entry_boc-addContainer-outport").val());
	        $('#table-AddContainer-outport table tr:last td:nth-child(20)').html($(".dt_boc-addContainer-outport").val());
                $('#table-AddContainer-outport table tr:last td:nth-child(21)').html($(".act_dt_to_whse-addContainer-outport").val());
                
	        $('#table-AddContainer-outport table tr:last td:nth-child(22)').html("<button type='button' class='btn btn-danger deleteButton btn-sm'><span class='fa fa-times fa-lg'></span></button>");

                        $('.container-msg-addContainer-outport').text('');
			$('.tableContainer-msg-addContainer-outport').text("");
                        $('.container-msg-addContainer-outport').text("");
                        $('.check_exists_container-outport i').text("");

			$('#table-AddContainer-outport .container-addContainer-outport').val('');
			$('#table-AddContainer-outport .container-size-addContainer-outport').val('');
			$('#table-AddContainer-outport .plate-addContainer-outport').val('');
			$('#table-AddContainer-outport .cartons-addContainer-outport').val('');

			$('#table-AddContainer-outport .ref_entry_no-addContainer-outport').val('');
			$('#table-AddContainer-outport .dt_paid-addContainer-outport').val('');
			$('#table-AddContainer-outport .dt_pre_assess-addContainer-outport').val('');
                        
                        $('#table-AddContainer-outport .dt_file_entry_boc-addContainer-outport').val('');
                        $('#table-AddContainer-outport .tdt-addContainer-outport').val('');
                        $('#table-AddContainer-outport .pull_out_port-addContainer-outport').val('');

			$('#table-AddContainer-outport .storage-addContainer-outport').val('');
			$('#table-AddContainer-outport .demorage-addContainer-outport').val('');
			$('#table-AddContainer-outport .lodging-addContainer-outport').val('');
			$('#table-AddContainer-outport .dt_final_assess-addContainer-outport').val('');
			$('#table-AddContainer-outport .gtinport-addContainer-outport').val('');
			$('#table-AddContainer-outport .gtoutport-addContainer-outport').val('');
			$('#table-AddContainer-outport .act-del-whse-addContainer-outport').val('');
			$('#table-AddContainer-outport .dt_boc-addContainer-outport').val('');
                        $('#table-AddContainer-outport .act_dt_to_whse-addContainer-outport').val('');
			}
			
		});
    });
    
    
    
/*function Check if Container is existing in Database*/
    function check_Container_outport(container){
        var jbfl = $('.jobfile-addContainer-outport').val();
        var containerno = $('.container-addContainer-outport').val();
        
            $.ajax({
                        method: "POST",
                          url: "<?php echo base_url('Job_availability/container_manila');?>",
                        data: { jbfl:jbfl,
                                containerno :containerno
                        }
                   })
                   .done(function(data) {
                        $('.check_exists_container-outport').html(data);
                   });
    }
    
/*Add Container to Database*/
$(document).on('click','.save_container_outport',function(){

		    	  var table = $("#table-AddContainer-outport table tbody");
		    	  var ct    = $("#table-AddContainer-outport table tbody tr").length;
                          
		    table.find('tr').each(function (count1) {
			  var c = count1+1;
				        var $tds = $(this).find('td'),
				            vessel_voyage 	= $tds.eq(0).text();
                                            containerId 	= $tds.eq(2).text();
				            consize 	   	= $tds.eq(3).text();
                                            cartons_no  	= $tds.eq(4).text(); 
                                            trucker_plate       = $tds.eq(5).text(); 
				            trucker_name   	= $tds.eq(7).text();
				            trucker_id   	= $tds.eq(6).text();
				            ref_entry_no        = $tds.eq(8).text();
                                            start_demorage      = $tds.eq(9).text(); 
				            start_storage 	= $tds.eq(10).text();
				            dt_paid		= $tds.eq(11).text();
				            lodging             = $tds.eq(12).text();
				            dt_pre_assess       = $tds.eq(13).text(); 
                                            dt_final_assess     = $tds.eq(14).text(); 
                                            
                                            adw                 = $tds.eq(15).text(); 
                                            tdt    		= $tds.eq(16).text(); 
                                            pul_out_port        = $tds.eq(17).text();  
                                            dt_file_entry_boc   = $tds.eq(18).text(); 
                                            dtboc               = $tds.eq(19).text();
                                            dt_recvd_cont_whse  = $tds.eq(20).text();

				     						
		$.ajax({
                        method: "POST",
                        url: "<?php echo base_url('Job/container');?>",
/*					  beforeSend: function() {
                                  dia =	$.dialog({
                                            icon: 'fa fa-spinner fa-spin',
                                            closeIcon: false,
                                        title: 'Please wait!',
                                        backgroundDismiss: false,
                                        content: 'Currently Adding container',
                                        });
                          },*/
                        data: {
                                        //from container tab
                                    vessel_voyage  :vessel_voyage,
                                    containerId    :containerId,
                                    consize  	   :consize, 
                                    cartons_no	   :cartons_no,
                                    trucker_plate  :trucker_plate,
                                    trucker_name   :trucker_name,
                                    trucker_id	   :trucker_id,
                                    ref_entry_no   :ref_entry_no,
                                    start_storage  :start_storage,
                                    start_demorage :start_demorage,
                                    dt_paid        :dt_paid,
                                    lodging        :lodging,				
                                    dt_pre_assess  :dt_pre_assess,
                                    dt_file_entry_boc :dt_file_entry_boc,
                                    dt_final_assess:dt_final_assess,
                                    adw            :adw,
                                    dtboc	   :dtboc,
                                    tdt            :tdt,
                                    dt_recvd_cont_whse:dt_recvd_cont_whse,
                                    pul_out_port   :pul_out_port
                        }
                    })
                    .done(function() {		
                                if(c==ct){	
                                    $.alert({
                                        backgroundDismiss: false, 	
                                        title: 'Success!',
                                        content: 'New container is added!',
                                        confirm: function(){
                                                $(".remove_tr" ).remove();
                                                /*dia.close();*/
                                            }
                                  }); 
                                }
	    		  });
		     });	
});
</script>
