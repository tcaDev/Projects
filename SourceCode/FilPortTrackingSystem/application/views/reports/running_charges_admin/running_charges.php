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
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-admin" placeholder='Enter Purchase Order Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-admin" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
					       
					       <div class="col-md-1">
					       		
						       		<span><h6 style="text-align: center;">-Or-</h6></span>
						       
					       </div>
						       
					       
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-admin" placeholder='Enter House Bill Lading Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-admin" type="button"><span class="fa fa-search fa-fw"></span></button>
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
									<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" />	
								</div>

								<div class="form-group">
									<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" />	
								</div>


							</div>

							<div class="col-md-12 ">
								<div class="form-group">
									<h5>Charges :</h5>
									<select class="form-control input-sm data_charges">
										
									</select>
								</div>
								<button type="button" class="btn btn-primary col-md-12 btn-sm" id="btn-runningcharges-manila"><span class="fa fa-search fa-fw"></span> Search</button>
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
	$('#txt-table-runningcharges-admin').val('');
	$('.data_charges').html("<option disabled selected value='0'> Select Charges</option>"+
							"<option>All Charges</option>"+
							"<option>Lodgement Fee</option>"+
							"<option>OLRS Fee</option>"+
							"<option>Local Charges</option>"+
							"<option>Arrestre</option>"+
							"<option>Wharfage</option>"+
							"<option>Weighing</option>"+
							"<option>Dispatch Fee</option>"+
							"<option>DEL</option>"+	
							"<option>Spotcheck</option>"+
							"<option>Storage Fee</option>"+
							"<option>Demurrage Fee</option>"+
							"<option>Detention Fee</option>"+
							"<option>SRA Application</option>"+
							"<option>SRA Processing Fee</option>"+
							"<option>BAI Application</option>"+
							"<option>BAI Inspection Fee</option>"+
							"<option>BPI Applciaiton Fee</option>"+
							"<option>BPI Inspection Fee</option>");
});

$('#admin_running-outport').click(function(){
	$('.active-tabRun').html('<b> Sea Freight Outport</b>');
	runn_char = 2;
	$('.table-runningcharges-admin').empty();
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin').val('');
	$('.data_charges').html("<option disabled selected value='0'> Select Charges</option>"+
							"<option>All Charges</option>"+
							"<option>Lodgement Fee</option>"+
							"<option>OLRS Fee</option>"+
							"<option>Local Charges</option>"+
							"<option>Arrestre</option>"+
							"<option>Wharfage</option>"+
							"<option>Weighing</option>"+
							"<option>Dispatch Fee</option>"+
							"<option>DEL</option>"+	
							"<option>Spotcheck</option>"+
							"<option>Storage Fee</option>"+
							"<option>Demurrage Fee</option>"+
							"<option>Detention Fee</option>"+
							"<option>SRA Application</option>"+
							"<option>SRA Processing Fee</option>"+
							"<option>BAI Application</option>"+
							"<option>BAI Inspection Fee</option>"+
							"<option>BPI Applciaiton Fee</option>"+
							"<option>BPI Inspection Fee</option>");
});

$('#admin_running-air').click(function(){
	$('.active-tabRun').html('<b> Air Freight</b>');
	runn_char = 3;
	$('.table-runningcharges-admin').empty();
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin').val('');
	$('.data_charges').html("<option disabled selected value='0'> Select Charges</option>"+
							"<option>All Charges</option>"+
							"<option>Lodgement Fee</option>"+
							"<option>Break Bulk Fee</option>"+
							"<option>Storage Fee</option>"+
							"<option>Bad Cargo Order Fee</option>"+
							"<option>VCRC</option>"+
							"<option>CNI</option>"+
							"<option>CNIU</option>"+
							"<option>Other Fees</option>");
});

$(document).on('keydown','#txt-table-runningcharges-admin',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-admin').click();
	}
});


$(document).on('click','#btn-runningcharges-admin',function(){
	var po_number = $('#txt-table-runningcharges-admin').val();
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
</script>