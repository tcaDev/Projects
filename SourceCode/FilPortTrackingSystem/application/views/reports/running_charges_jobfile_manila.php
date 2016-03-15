<div class="tab-pane tab_runningcharges_manila active" id="tab_runningcharges_manila">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
	        				<div class="col-md-12">
	        			 	 	<span style="padding-bottom: 10px;"> <h4> Running Charges Reports : <b> Sea Freight Manila </b></h4></span>
	        				</div>
						   
				 	</div>
        	</div>

        	<div class="col-md-12" style="margin-top:10px;">

				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#pi-client">Search By Purchase Order No.</a></li>
				    <li><a data-toggle="tab" href="#consignee-client">Search By Consignee</a></li>
				 </ul>

				 <div class="tab-content"  style="margin-top:10px;">
	<!--  PI NO. -->
				 	<div id="pi-client" class="tab-pane fade in active" >
				      <h5>Search : </h5>

				       <div class="col-md-12">
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-manila" placeholder='Enter Purchase Order Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-danger btn-sm" id="btn-runningcharges-manila" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
					       
					       <div class="col-md-1">
					       		
						       		<span><h6 style="text-align: center;">-Or-</h6></span>
						       
					       </div>
						       
					       
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-manila" placeholder='Enter House Bill Lading Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-danger btn-sm" id="btn-runningcharges-manila" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
				       </div>

				       <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:320px;margin-top: 63px;">
				    		<div class="table-runningcharges-manila" ></div>
				    	</div>
				    </div>

	<!-- Consignee -->
				    <div id="consignee-client" class="tab-pane fade">
				      <h5>Search : </h5>

				       <div class="col-md-6 col-md-offset-3">
					       	<div class="col-md-12">
					       		<div class="form-group">
					       			<h5> Consignee Name : </h5>
									<select class="form-control input-sm">
										
									</select>    
					       		</div>
					       		
								
							</div>

							<div class="col-md-12">
								<span><h6 style="text-align: center;">-Or-</h6></span>

							</div>

							<div class="col-md-12">
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
									<select class="form-control input-sm">
										<option disabled selected value="0"> Select Charges</option>
										<option>All Charges</option>
										<option>Lodgement Fee</option>
										<option>OLRS Fee</option>
										<option>Local Charges</option>
										<option>Arrestre</option>
										<option>Wharfage</option>
										<option>Weighing</option>
										<option>Dispatch Fee</option>
										<option>DEL</option>	
										<option>Spotcheck</option>
										<option>Storage Fee</option>
										<option>Demurrage Fee</option>
										<option>Detention Fee</option>
										<option>SRA Application</option>
										<option>SRA Processing Fee</option>
										<option>BAI Application</option>
										<option>BAI Inspection Fee</option>
										<option>BPI Applciaiton Fee</option>
										<option>BPI Inspection Fee</option>
									</select>
								</div>
								<button type="button" class="btn btn-danger col-md-12 btn-sm"><span class="fa fa-search fa-fw"></span> Search</button>
							</div>
							
							
						</div>
				    </div>

				 </div>
				</div>	
			    		
    	</div>
    	
</div>	

		<div class="modal fade" id="view-runningcharges-manila-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				   		 <div class="modal-content">
				   			
				   		 </div>
				    </div>
	</div>

		
<script>
		$("th").css("vertical-align","middle");
		$("tbody td").css("white-space","nowrap");
		$("tbody td").css("min-width","60px");
		$("thead th").css("white-space","nowrap");

var montype_rr_manila = 1;

$(document).on('click','#collapse1',function(){
	$('.reports-consignee').removeClass('hidden');
	$('.runningcharges').addClass('hidden');
});

$(document).on('click','#collapse5',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').removeClass('hidden');
});

$(document).on('click','#runningcharges-jobfile-manila',function(){
	var active_accreditation = $('.nav-data-runningcharges .active').attr('id');
	if(active_accreditation.trim() == 'runningcharges-jobfile-manila'){
		$('#txt-table-runningcharges-manila').val('');
		$('#btn-runningcharges-manila').click();
	}
});

$(document).on('click','#btn-runningcharges-manila',function(){
	var po_number = $('#txt-table-runningcharges-manila').val();
	var con_name = $('.conName').attr('id');
	//alert(po_number + ' ' + con_name + ' ' + montype_rr_manila);
	if(po_number.trim() == ''){
		$(".table-runningcharges-manila").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadPO');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-manila').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			po_number : po_number,
	  			montype   : montype_rr_manila,
	  			userID    : con_name
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-runningcharges-manila").html(resultData[0].disp);
  			

		});
	}
});

$(document).on('keydown','#txt-table-runningcharges-manila',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-manila').click();
	}
})	

</script>


