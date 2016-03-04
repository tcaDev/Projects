<div class="tab-pane tab_runningcharges_manila active" id="tab_runningcharges_manila">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top: 20%;">
				        				<div class="col-md-6">
				        			 	 <span style="padding-bottom: 10px;"> <h4> Running Charges Jobfile : <b> Sea Freight Manila </b></h4></span>
				        				</div>
									    <div class="input-group col-md-6">
									       <input type="text" class="form-control light-table-filter" data-table="order-table-runningcharges-manila" id="txt-table-runningcharges-manila" placeholder='Search by Purchase Order Number'>
									      <span class="input-group-btn">
									       <button class="btn btn-danger" id="btn-runningcharges-manila" type="button"><span class="fa fa-search fa-fw"></span></button>
									      </span>
									    </div>
				 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-runningcharges-manila" ></div>
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
  				$(".tools-bar").animate({marginTop:'0%'});

		});
	}
});

$(document).on('keydown','#txt-table-runningcharges-manila',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-manila').click();
	}
})	

</script>


