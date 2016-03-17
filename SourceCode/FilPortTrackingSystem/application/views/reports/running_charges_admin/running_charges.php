<div class="tab-pane tab_runningcharges_admin" id="tab_admin_running">	

    	<div class="col-md-12 ">
        	<div class="row">
        		<div class="tools-bar col-md-12">
	        		<div class="col-md-12">
	        			 <div class="row">
		        			<div class="col-md-6">
			        			<span style="padding-bottom: 10px;"> <h4> Running Charges Reports : <b class='active-tabRun'> Sea Freight Manila </b></h4></span>
			        		</div>
		        		</div>
	        		</div>
				 </div>
        	</div> 

        	<div class="col-md-12" style="margin-top:10px;">

				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#pi-admin">Search By Purchase Order No.</a></li>
				    <li><a data-toggle="tab" href="#consignee-admin">Search By Consignee</a></li>
				 </ul>

				 <div class="tab-content"  style="margin-top:10px;">
	<!--  PI NO. -->
				 	<div id="pi-admin" class="tab-pane fade in active" >
				      <h5>Search : </h5>

				       <div class="col-md-12">
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-admin-po" placeholder='Enter Purchase Order Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-admin-po" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
					       
					       <div class="col-md-1">
					       		
						       		<span><h6 style="text-align: center;">-Or-</h6></span>
						       
					       </div>
						       
					       
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-admin-hbl" placeholder='Enter House Bill Lading Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-admin-hbl" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
				       </div>

				       <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:320px;">
				    		<div class="table-runningcharges-admin" ></div>
				    	</div>
				    </div>

	<!-- Consignee -->
				    <div id="consignee-admin" class="tab-pane fade">
				      <h5>Search : </h5>

				       <div class="col-md-6 col-md-offset-3">
					       	<div class="col-md-12">
					       		<div class="form-group">
					       			<h5> Consignee Name : </h5>
									<select class="form-control input-sm rc_consignee">
							  			<option disabled selected value="0">Select Consignee</optio>
						            	<?php  foreach($consignee as $row){  ?> 
						                <option value="<?php echo $row->ConsigneeId ?>">
						                <?php echo stripslashes($row->ConsigneeName) ?>
						                </option> 
						             	<?php }?>
						            </select>     
					       		</div>
					       		
								
							</div>

							<div class="col-md-12">
								<span><h6 style="text-align: center;">-Or-</h6></span>

							</div>

							<div class="col-md-12" style="border-bottom: 1px solid #ddd;">
								<h5>Actual Arrival Date : </h5>
								<div class="form-group">
									<input type="text" class="form-control input-sm ata-rc-admin-frm" onfocus="(this.type='date')" placeholder="From :" />	
								</div>

								<div class="form-group">
									<input type="text" class="form-control input-sm ata-rc-admin-to" onfocus="(this.type='date')" placeholder="To :" />	
								</div>


							</div>

							<div class="col-md-12 ">
								<div class="form-group">
									<h5>Charges :</h5>
									<select class="form-control input-sm data_charges">
										
									</select>
								</div>
								<button type="button" class="btn btn-primary col-md-12 btn-sm" id="btn-runningcharges-manila-consignee"><span class="fa fa-search fa-fw"></span> Search</button>
							</div>
							
							
						</div>
				    </div>

				 </div>
				</div>	

    	</div>

    	
</div>	
<script>

var runn_char = 0;
$('#admin_running-manila').click(function(){
	$('.active-tabRun').html('<b> Sea Freight Manila</b>');
	runn_char = 1;
	$('.table-runningcharges-admin').empty();
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin-po').val('');
	$('#txt-table-runningcharges-admin-hbl').val('');
	$('.ata-rc-admin-frm').val('');
	$('.ata-rc-admin-to').val('');
	$('.data_charges').html("<option value='*'>All Charges</option>"+
							"<option value='LodgementFee'>Lodgement Fee</option>"+
							"<option value='THCCharges'>THC Charges</option>"+
							"<option value='Arrestre'>Arrestre</option>"+
							"<option value='Wharfage'>Wharfage</option>"+
							"<option value='Weighing'>Weighing</option>"+
							"<option value='DispatchFee'>Dispatch Fee</option>"+
							"<option value='DEL'>DEL</option>"+	
							"<option value='Spotcheck'>Spotcheck</option>"+
							"<option value='Storage'>Storage Fee</option>"+
							"<option value='Demorage'>Demurrage Fee</option>"+
							"<option value='Detention'>Detention Fee</option>"+
							"<option value='SRAApplication'>SRA Application</option>"+
							"<option value='BAIApplication'>BAI Application</option>"+
							"<option value='BAIInspection'>BAI Inspection Fee</option>"+
							"<option value='BPIInspection'>BPI Inspection Fee</option>");
});

$('#admin_running-outport').click(function(){
	$('.active-tabRun').html('<b> Sea Freight Outport</b>');
	runn_char = 2;
	$('.table-runningcharges-admin').empty();
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin-po').val('');
	$('#txt-table-runningcharges-admin-hbl').val('');
	$('.ata-rc-admin-frm').val('');
	$('.ata-rc-admin-to').val('');
	$('.data_charges').html("<option value='*'>All Charges</option>"+
							"<option value='LodgementFee'>Lodgement Fee</option>"+
							"<option value='THCCharges'>THC Charges</option>"+
							"<option value='Arrestre'>Arrestre</option>"+
							"<option value='Wharfage'>Wharfage</option>"+
							"<option value='Weighing'>Weighing</option>"+
							"<option value='DispatchFee'>Dispatch Fee</option>"+
							"<option value='DEL'>DEL</option>"+	
							"<option value='Spotcheck'>Spotcheck</option>"+
							"<option value='Storage'>Storage Fee</option>"+
							"<option value='Demorage'>Demurrage Fee</option>"+
							"<option value='Detention'>Detention Fee</option>"+
							"<option value='SRAApplication'>SRA Application</option>"+
							"<option value='BAIApplication'>BAI Application</option>"+
							"<option value='BAIInspection'>BAI Inspection Fee</option>"+
							"<option value='BPIInspection'>BPI Inspection Fee</option>");
});

$('#admin_running-air').click(function(){
	$('.active-tabRun').html('<b> Air Freight</b>');
	runn_char = 3;
	$('.table-runningcharges-admin').empty();
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin-po').val('');
	$('#txt-table-runningcharges-admin-hbl').val('');
	$('.ata-rc-admin-frm').val('');
	$('.ata-rc-admin-to').val('');
	$('.data_charges').html("<option value='*'>All Charges</option>"+
							"<option value='LodgementFee'>Lodgement Fee</option>"+
							"<option value='BreakBulkFee'>Break Bulk Fee</option>"+
							"<option value='StorageFee'>Storage Fee</option>"+
							"<option value='BadCargoorderFee'>Bad Cargo Order Fee</option>"+
							"<option value='VCRC'>VCRC</option>"+
							"<option value='CNI'>CNI</option>"+
							"<option value='CNIU'>CNIU</option>"+
							"<option value='OtherFees'>Other Fees</option>");
});

$(document).on('keydown','#txt-table-runningcharges-admin',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-admin').click();
	}
});


$(document).on('click','#btn-runningcharges-admin-po',function(){
	var po_number = $('#txt-table-runningcharges-admin-po').val();
	var rc_consignee = $('.rc_consignee').val();
	if(po_number.trim() == ''){
		$(".table-runningcharges-admin").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/get_PO_admin');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			btn : 1,
	  			po_number : po_number,
	  			montype   : runn_char,
	  			consigneeId  : rc_consignee
	  		}
		})
  		.done(function(data) {

  				$(".table-runningcharges-admin").html(data);
		});
	}
});

$(document).on('click','#btn-runningcharges-admin-hbl',function(){
	var po_number = $('#txt-table-runningcharges-admin-hbl').val();
	var rc_consignee = $('.rc_consignee').val();
	if(po_number.trim() == ''){
		$(".table-runningcharges-admin").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/get_PO_admin');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			btn : 2,
	  			po_number : po_number,
	  			montype   : runn_char,
	  			consigneeId  : rc_consignee
	  		}
		})
  		.done(function(data) {

  				$(".table-runningcharges-admin").html(data);
		});
	}
});

$(document).on('click','#btn-runningcharges-manila-consignee',function(){
	var rc_consignee = $('.rc_consignee').val();
	var frm = $('.ata-rc-admin-frm').val();
	var to = $('.ata-rc-admin-to').val();
	var charges = $('.data_charges').val();
	if(rc_consignee == "" && frm == "" && to == ""){

      }else{
         $.ajax({
	  		method: "POST",
			url: "<?php echo base_url('Reports_Running_Charges/get_Volume');?>",
			  beforeSend: function() {
					 	  dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Searching Your Files',
				   			});
		      },  
	  		data: { 
	  			montype   : runn_char,
	  			con_id	  : rc_consignee,
	  			frm 	  : frm,
	  			to 		  : to,
	  			charges   : charges
	  		}
		}).done(function(data){
			dia.close();
						if(data == 0){
							dia_2 = $.alert({
							icon: 'fa fa-exclamation-triangle-o',
						 	closeIcon: false,
					        title: 'No Data Match',
					        backgroundDismiss: false,
					        content: 'Sorry ! Data not Found ',
					        confirm : function(){
					        	dia_2.close();
					       	 }
							});
							
						}else{
							window.open(data);
						}
		});
      }

});
</script>