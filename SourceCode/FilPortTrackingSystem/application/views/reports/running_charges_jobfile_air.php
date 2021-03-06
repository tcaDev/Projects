<div class="tab-pane tab_runningcharges_air" id="tab_runningcharges_air">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
				        				<div class="col-md-12">
				        			 	 <span style="padding-bottom: 10px;"> <h4>Reports-Running Charges : <b> Sea Freight Air </b></h4></span>
				        				</div>
				 	</div>
        	</div>  
        	<div class="col-md-12" style="margin-top:10px;">

				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="#pi-client-air">Search By Proforma Invoice No.</a></li>
				    <li><a data-toggle="tab" href="#consignee-client-air">Search By Consignee</a></li>
				 </ul>

				 <div class="tab-content"  style="margin-top:10px;">
	<!--  PI NO. -->
				 	<div id="pi-client-air" class="tab-pane fade in active" >

				       <div class="col-md-12">
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-air-po" placeholder='Enter Proforma Invoice Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-air-po" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
					       
					       <div class="col-md-1">
					       		
						       		<span><h6 style="text-align: center;">-Or-</h6></span>
						       
					       </div>
						       
					       
					       	<div class="col-md-5">
							    <div class="input-group">
							      <input type="text" class="form-control light-table-filter input-sm" id="txt-table-runningcharges-air-hbl" placeholder='Enter House Bill Lading Number..'>
							      <span class="input-group-btn">
							        <button class="btn btn-primary btn-sm" id="btn-runningcharges-air-hbl" type="button"><span class="fa fa-search fa-fw"></span></button>
							      </span>
							    </div>
							</div>
				       </div>

				       <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:320px;margin-top: 63px;">
				    		<div class="table-runningcharges-air" ></div>
				    	</div>
				    </div>

	<!-- Consignee -->
				    <div id="consignee-client-air" class="tab-pane fade">

				       <div class="col-md-6 col-md-offset-3">
					       	<div class="col-md-12">
					       		<div class="form-group">
					       			<h5> Consignee Name : </h5>
									<select class="form-control input-sm reports_consignee_name_air">
										
									</select>    
					       		</div>
					       		
								
							</div>

							<div class="col-md-12">
								<span><h6 style="text-align: center;">-Or-</h6></span>

							</div>

							<div class="col-md-12" style="border-bottom: 1px solid #ddd;">
								<h5>Actual Arrival Date : </h5>
								<div class="form-group">
									<input type="text" class="form-control input-sm dtpFrom_RunningCharges-air" onfocus="(this.type='date')" placeholder="From :" />	
								</div>

								<div class="form-group">
									<input type="text" class="form-control input-sm dtpTo_RunningCharges-air" onfocus="(this.type='date')" placeholder="To :" />	
								</div>


							</div>

							<div class="col-md-12 ">
								<div class="form-group">
									<h5>Charges :</h5>
									<select class="form-control input-sm cbo-charges-air">
										<option id="*"> All Charges</option>
										<option id="LodgementFee">Lodgement Fee</option>
										<option id="BreakBulkFee">Break Bulk Fee</option>
										<option id="StorageFee">Storage Fee</option>
										<option id="BadCargoOrderFee">Bad Cargo Order Fee</option>
										<option id="VCRC">VCRC</option>
										<option id="CNI">CNI</option>
										<option id="CNIU">CNIU</option>
										<option id="OtherFees">Other Fees</option>	
									</select>
								</div>
								<button type="button" class="btn btn-primary col-md-12 btn-sm  btn-search-byConName-air" id="btn-runningcharges-air"><span class="fa fa-search fa-fw"></span> Search</button>
							</div>
							
							
						</div>
				    </div>

				 </div>
				</div>	   		
    	</div>

    
</div>	

	<div class="modal fade" id="view-runningcharges-air-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
				    <div class="modal-dialog">
				   		 <div class="modal-content">
				   			
				   		 </div>
				    </div>
	</div>
<div class="modal fade" id="running-charges-air-options" role="dialog" style="top:30%;">
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
                      <a href='#' id="running-charges-air_csv"><input type="button" class="btn btn-success btn-save-as-running-charges-air form-control" value="CSV File"/></a>
                    </div>
                    <div class="col-md-4" style="padding-top:15px;">
                      <a href='#' id="running-charges-air_pdf"><input type="button" class="btn btn-danger btn-save-as-running-charges-air form-control" value="PDF File"/></a>
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

var montype_rr_air = 3;


function loadConsigneeNames(){
   var con_name = $('.conName').attr('id');
   $.ajax({
    url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
    type : "POST",
    data : {
      userID : con_name
    },
    success : function(suc){
      $('.reports_consignee_name_air').html(suc);
    }
  });
}

loadConsigneeNames();


$(document).on('click','.btn-search-byConName-air',function(){
	var charges	 = $('.cbo-charges-air option:selected').attr('id');
	var user_id  = $('.conName').attr('id');
	var con_id 	 = $('.reports_consignee_name_air option:selected').attr('id');
	var frm 	 = $('.dtpFrom_RunningCharges-air').val();
	var to 		 = $('.dtpTo_RunningCharges-air').val();
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
	  			montype   : montype_rr_air,
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
						    $('#running-charges-air-options').modal('show');
						    $('#running-charges-air_csv').html('<a href="<?php echo base_url('Print_Report_excel/csv_run_charge_consignee')?>" target="blank" id="running-charges-air_csv"><input type="button" class="btn btn-save-as-running-charges-air btn-success form-control" value="CSV File"/></a>');
                       		$('#running-charges-air_pdf').html('<a href=' + data +' target="blank" id="running-charges-air_pdf"><input type="button" class="btn btn-save-as-running-charges-air btn-danger form-control" value="PDF File"/></a>');
						}
		});
	}
});

$(document).on('keydown','#txt-table-runningcharges-air',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-air').click();
	}
})	
	


$(document).on('click','#btn-runningcharges-air-po',function(){
	var po_number = $('#txt-table-runningcharges-air-po').val();
	var con_name = $('.conName').attr('id');
	//alert(po_number + ' ' + con_name + ' ' + montype_rr_air);
	if(po_number.trim() == ''){
		$(".table-runningcharges-air").html('<div class="table-runningcharges-air" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadPO');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-air').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			po_number : po_number,
	  			montype   : montype_rr_air,
	  			userID    : con_name,
	  			frm 	  : 'PO'
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-runningcharges-air").html(resultData[0].disp);
  			

		});
	}
});
	

$(document).on('click','#btn-runningcharges-air-hbl',function(){
	var hbl = $('#txt-table-runningcharges-air-hbl').val();
	var con_name = $('.conName').attr('id');
	if(hbl.trim() == ''){
		$(".table-runningcharges-air").html('<div class="table-runningcharges-air" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadPO');?>",
			  beforeSend: function() {
		              $('.table-runningcharges-air').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			po_number : hbl,
	  			montype   : montype_rr_air,
	  			userID    : con_name,
	  			frm 	  : 'HBL'
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-runningcharges-air").html(resultData[0].disp);
		});
	}
});
</script>


