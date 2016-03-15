	<div class="tab-pane tab_reports_volume-manila active" id="tab_reports_volume-manila">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
        				<div class="col-md-12">
        					<div class="row">
        						<div class="col-md-6">
	        						<span style="padding-bottom: 10px;"> <h4>Reports-Volume : <b> Sea Freight Manila </b></h4></span>
	        					</div>
        					</div>
        				</div>
			 		</div>		 		
        		</div>

        		<div class="col-md-12" style="margin-top:10px;">
        			<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#comm-client">Search By Commodity</a></li>
					    <li><a data-toggle="tab" href="#ata-client">Search By Actual Arrival Time</a></li>
					 </ul>

					 <div class="tab-content"  style="margin-top:10px;">
	<!--  Commodity NO. -->
				 		<div id="comm-client" class="tab-pane fade in active" >
				 			<h5>Search : </h5>

					       <div class="col-md-12">
						       	<div class="col-md-6">
						       		<div class="form-group">
						       			<h5>Commodity : </h5>
							       		<select class="form-control input-sm">
							       			
							       		</select>
						       		</div>
						       	</div>

						       	<div class="col-md-6">
						       		<div class="form-group">
						       			<h5>Consignee: </h5>
							       		<select class="form-control input-sm reports_consignee_volume_manila">
							       			
							       		</select>
						       		</div>
						       	</div>

						       	<div class="col-md-12">
						       		<button type="button" class="btn btn-primary btn-sm col-md-3 pull-right"><span class="fa fa-search fa-fw"></span> Search</button>
						       	</div>
					       </div>

					       <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:440px;">
					    		<div class="table-volume-manila" ></div>
					    	</div>
				 		</div>

		<!-- ATA -->
						<div id="ata-client" class="tab-pane fade">
							<h5>Search : </h5>

					       <div class="col-md-6 col-md-offset-3">
						       	<div class="col-md-12">
						       		<h5>Actual Arrival Date : </h5>
									<div class="form-group">
										<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" id="dtpATAFrom-manila"/>	
									</div>

									<div class="form-group">
										<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" id="dtpATAFrom-manila"/>	
									</div>
						       	</div>

						       	<div class="col-md-12">
						       		<div class="form-group">
						       			<h5>Consignee: </h5>
							       		<select class="form-control input-sm reports_consignee_volume_manila">
							       			
							       		</select>
						       		</div>
						       	</div>

						       	<div class="col-md-12">
						       		<button type="button" class="btn btn-primary btn-sm col-md-12 pull-right" id="btn-volume-manila"><span class="fa fa-search fa-fw"></span> Search</button>
						       	</div>
					       </div>
						</div>
				 	</div>


        		</div>    		
    	</div>
    	
</div>	

	<div class="modal fade" id="view-volume-manila-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
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

var montype_volume_manila = 1;


$(document).on('click','#collapse1',function(){
	$('.reports-consignee').removeClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').addClass('hidden');
	$('.truck').addClass('hidden');
	$('.consolidate_reports').addClass('hidden');
});

$(document).on('click','#collapse5',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').removeClass('hidden');
	$('.volume').addClass('hidden');
	$('.truck').addClass('hidden');
	$('.consolidate_reports').addClass('hidden');
});

$(document).on('click','#collapse6',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').removeClass('hidden');
	$('.truck').addClass('hidden');
	$('.consolidate_reports').addClass('hidden');
});

$(document).on('click','#collapse7',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').addClass('hidden');
	$('.truck').removeClass('hidden');
	$('.consolidate_reports').addClass('hidden');
});

$(document).on('click','#collapse8',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').addClass('hidden');
	$('.truck').addClass('hidden');
	$('.consolidate_reports').removeClass('hidden');
});

/*
$(document).on('click','#runningcharges-jobfile-manila',function(){
	var active_accreditation = $('.nav-data-runningcharges .active').attr('id');
	if(active_accreditation.trim() == 'runningcharges-jobfile-manila'){
		$('#txt-table-runningcharges-manila').val('');
		$('#btn-runningcharges-manila').click();
	}
});*/

$(document).ready(function(){
	$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
		type : "POST",
		data : {
			userID : con_name
		},
		success : function(suc){
			$('.reports_consignee_volume_manila').html(suc);
		}
	})
});

$(document).on('click','#btn-volume-manila',function(){
	var con_id = $('.reports_consignee_volume_manila option:selected').attr('id');
	var con_name = $('.reports_consignee_volume_manila option:selected').text();
	var frm 	 = $('#dtpATAFrom-manila').val();
	var to 		 = $('#dtpATATo-manila').val();
	if(frm == '' && to == ''){
		$(".table-runningcharges-manila").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadVolumeDetails');?>",
			  beforeSend: function() {
		              $('.table-volume-manila').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			montype   : montype_volume_manila,
	  			userID    : con_id,
	  			frm 	  : frm,
	  			to 		  : to
	  		}
		})
  		.done(function(data) {
  				$(".table-volume-manila").html(data);
  				
		});	
	}
});
/*
$(document).on('keydown','#txt-table-runningcharges-manila',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-manila').click();
	}
})	*/

</script>


