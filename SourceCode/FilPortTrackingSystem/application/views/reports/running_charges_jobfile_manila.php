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
				    <li><a data-toggle="tab" href="#consignee-client-manila">Search By Consignee</a></li>
				 </ul>

				 <div class="tab-content"  style="margin-top:10px;">
	<!--  PI NO. -->
				 	<div id="pi-client" class="tab-pane fade in active" >

				       <div class="col-md-12">
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-manila" placeholder='Enter Purchase Order Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-manila-po" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
					       
					       <div class="col-md-1">
					       		
						       		<span><h6 style="text-align: center;">-Or-</h6></span>
						       
					       </div>
						       
					       
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-manila-hbl" placeholder='Enter House Bill Lading Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-manila-hbl" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
				       </div>

				       <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:320px;margin-top: 63px;">
				    		<div class="table-runningcharges-manila" ></div>
				    	</div>
				    </div>

	<!-- Consignee -->
				    <div id="consignee-client-manila" class="tab-pane fade">

				       <div class="col-md-6 col-md-offset-3">
					       	<div class="col-md-12">
					       		<div class="form-group">
					       			<h5> Consignee Name : </h5>
									<select class="form-control input-sm reports_consignee_name_manila">
										
									</select>    
					       		</div>
					       		
								
							</div>

							<div class="col-md-12">
								<span><h6 style="text-align: center;">-Or-</h6></span>

							</div>

							<div class="col-md-12">
								<h5>Actual Arrival Date : </h5>
								<div class="form-group">
									<input type="text" class="form-control input-sm dtpFrom_RunningCharges-manila" onfocus="(this.type='date')" placeholder="From :" />	
								</div>

								<div class="form-group">
									<input type="text" class="form-control input-sm dtpTo_RunningCharges-manila" onfocus="(this.type='date')" placeholder="To :" />	
								</div>


							</div>

							<div class="col-md-12 ">
								<div class="form-group">
									<h5>Select Charges :</h5>
									<select class="form-control input-sm cbo-charges-manila">
										<option id="*">All Charges</option>
										<option id="LodgementFee">Lodgement Fee</option>
										<option id="THCCharges">THC Charges</option>
										<!-- <option>OLRS Fee</option> -->
										<option id="Arrastre">Arrastre</option>
										<option id="Wharfage">Wharfage</option>
										<option id="Weighing">Weighing</option>
										<option id="DispatchFee">Dispatch Fee</option>
										<option id="DEL">DEL</option>	
										<!-- <option>Spotcheck</option> -->
										<option id="Storage">Storage Fee</option>
										<option id="Demorage">Demurrage Fee</option>
										<option id="Detention">Detention Fee</option>
										<option id="SRAApplication">SRA Application</option>
										<!-- <option>SRA Processing Fee</option> -->
										<option id="BAIApplication">BAI Application</option>
										<option id="BAIInspection">BAI Inspection Fee</option>
										<!-- <option>BPI Applciaiton Fee</option> -->
										<option id="BPIInspection">BPI Inspection Fee</option>
									</select>
								</div>
								<button type="button" class="btn btn-primary col-md-12 btn-sm  btn-search-byConName-manila"><span class="fa fa-search fa-fw"></span> Search</button>
							</div>
							
							
						</div>
				    </div>

				 </div>
				</div>	
			    		
			    		<div class="subOutput">

			    		</div>
    	</div>
    	
</div>	

	<hidden class="conName" id="<?php echo stripslashes($jobfiles); ?>"></hidden>
<div class="modal fade" id="running-charges-manila-options" role="dialog" style="top:30%;">
            <div class="modal-dialog" >
               <div class="modal-content" style="height:150px;">
               <div class="modal-header">
                  <button type="button" data-dismiss="modal" class="close" style="padding-bottom: 5px;"><span>x</span></button>  
                  <br>
               </div>
               
                <div class="modal-body">
                   <div class="col-md-12">
                    <div class="col-md-4"> 
                      <h3>Save As</h3>
                    </div>
                    <div class="col-md-4" style="padding-top:15px;"> 
                      <a href='#' id="running-charges-manila_csv"><input type="button" class="btn btn-success btn-save-as-running-charges-manila_csv form-control" value="CSV File"/></a>
                    </div>
                    <div class="col-md-4" style="padding-top:15px;">
                      <a href='#' id="running-charges-manila_pdf"><input type="button" class="btn btn-danger btn-save-as-running-charges-manila_pdf form-control" value="PDF File"/></a>
                     </div>
                   </div>
                </div>
               </div>
            </div>
</div>
<script>
		$("th").css("vertical-align","middle");
		$("tbody td").css("white-space","nowrap");
		$("tbody td").css("min-width","60px");
		$("thead th").css("white-space","nowrap");

var montype_rr_manila = 1;

function loadConsigneeNames(){
   var con_name = $('.conName').attr('id');
   $.ajax({
    url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
    type : "POST",
    data : {
      userID : con_name
    },
    success : function(suc){
      $('.reports_consignee_name_manila').html(suc);
    }
  });
}

loadConsigneeNames();


$(document).on('click','.btn-search-byConName-manila',function(){
	var charges	 = $('.cbo-charges-manila option:selected').attr('id');
	var user_id  = $('.conName').attr('id');
	var con_id 	 = $('.reports_consignee_name_manila option:selected').attr('id');
	var frm 	 = $('.dtpFrom_RunningCharges-manila').val();
	var to 		 = $('.dtpTo_RunningCharges-manila').val();
	if(con_id == "" || con_id == null && frm == "" || frm == null && to == "" || to == null){

	}else{
		$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadVolumeDetails');?>",
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
	  			montype   : montype_volume_manila,
	  			userID    : user_id,
	  			con_id	  : con_id,
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
	                        $('#running-charges-manila-options').modal('show');
	                         $('#running-charges-manila_csv').html('<a href="<?php echo base_url('Print_Report_excel/csv_run_charge_consignee/')?>" target="blank" id="running-charges-manila_csv"><input type="button" class="btn btn-save-as-running-charges-manila btn-success form-control" value="CSV File"/></a>');
	                        $('#running-charges-manila_pdf').html('<a href=' + data +' target="blank" id="running-charges-manila_pdf"><input type="button" class="btn btn-save-as-running-charges-manila btn-danger form-control" value="PDF File"/></a>');
                      }
		});
	}
});

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


$(document).on('click','#btn-runningcharges-manila-po',function(){
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
	  			userID    : con_name,
	  			frm 	  : 'PO'
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
		$('#btn-runningcharges-manila-po').click();
	}
})	

$(document).on('click','#btn-runningcharges-manila-hbl',function(){
	var hbl = $('#txt-table-runningcharges-manila-hbl').val();
	var con_name = $('.conName').attr('id');
	if(hbl.trim() == ''){
		$(".table-runningcharges-manila").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadPO');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-manila').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			po_number : hbl,
	  			montype   : montype_rr_manila,
	  			userID    : con_name,
	  			frm 	  : 'HBL'
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-runningcharges-manila").html(resultData[0].disp);
		});
	}
});

</script>


