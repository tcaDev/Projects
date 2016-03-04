<div class="tab-pane tab_runningcharges_air" id="tab_runningcharges_air">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
				        				<div class="col-md-6">
				        			 	 <span style="padding-bottom: 10px;"> <h4> Running Charges Jobfile : <b> Sea Freight Air </b></h4></span>
				        				</div>
									    <div class="input-group col-md-6">
									       <input type="text" class="form-control light-table-filter" data-table="order-table-runningcharges-air" id="txt-table-runningcharges-air" placeholder='Search by Purchase Order Number'>
									      <span class="input-group-btn">
									       <button class="btn btn-danger" id="btn-runningcharges-air" type="button"><span class="fa fa-search fa-fw"></span></button>
									      </span>
									    </div>
				 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;">
    		<div class="table-runningcharges-air" ></div>
    	</div>
</div>	

	<div class="modal fade" id="view-runningcharges-air-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
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

var montype_rr_air = 3;

$(document).on('click','#runningcharges-jobfile-air',function(){
	var active_accreditation = $('.nav-data-runningcharges .active').attr('id');
	if(active_accreditation.trim() == 'runningcharges-jobfile-air'){
		$('#txt-table-runningcharges-air').val('');
		$('#btn-runningcharges-air').click();
	}	
});


$(document).on('click','#btn-runningcharges-air',function(){
	var po_number = $('#txt-table-runningcharges-air').val();
	var con_name = $('.conName').attr('id');
	if(po_number.trim() == ''){
		$(".table-runningcharges-air").html('<div class="table-runningcharges-manila" ></div>');
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
	  			userID    : con_name
	  		}
		})
  		.done(function(data) {
  				var resultData = JSON.parse(data);
  				$(".table-runningcharges-air").html(resultData[0].disp);
  				$(".tools-bar").animate({marginTop:'0%'});
		});
  	}
});

$(document).on('keydown','#txt-table-runningcharges-air',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-air').click();
	}
})	
	

</script>


