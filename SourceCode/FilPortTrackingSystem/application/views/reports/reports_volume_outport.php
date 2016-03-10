<div class="tab-pane tab_reports_volume-outport" id="tab_reports_volume-outport">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar">
				        				<div class="col-md-12">
				        					<div class="row">
				        						<div class="col-md-6">
					        						<span style="padding-bottom: 10px;"> <h4>Reports Volume : <b> Sea Freight Outport </b></h4></span>
					        					</div>
					        			 	 	
					        			 	 	<div class="col-md-6">
									    			<select class="form-control reports_consignee_volume_outport">
								    			
								    			</select>  
							    				</div>
				        					</div>
				        					
				        				</div>
									    <div class="input-group col-md-12">
									    	<div class="col-md-12">
									    		<span><b>Actual Time of Arrival : </b></span>
									    	</div>
									      <div class="">

									    	<div class="col-md-5">
									    		<div class="">
									    			<input placeholder="From :" class="textbox-n form-control" id="dtpATAFrom-outport" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
									    		</div>
									    		
									    	</div>

									    	<div class="col-md-5">
									    		<div class="">
									    			<input placeholder="To :" class="textbox-n form-control" id="dtpATATo-outport" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
									    		</div>
									    	</div>

									    	<div class="col-md-2">
									    		<div class="row">
									    				<span class="input-group-btn">
									    					<button class="btn btn-danger col-md-12" type="button" id="btn-volume-outport"><span class="fa fa-search fa-fw"></span></button>
									    				</span>
									    		</div>
									    	</div>
									    </div>
									      
									    

									    </div>
						
				 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:440px;">
    		<div class="table-volume-outport" ></div>
    	</div>
</div>	

	<div class="modal fade" id="view-volume-outport-commodity" role="dialog" data-keyboard="false" data-backdrop="static" style="top:20%;">
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

var montype_volume_outport = 2;


$(document).on('click','#collapse1',function(){
	$('.reports-consignee').removeClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').addClass('hidden');
});

$(document).on('click','#collapse5',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').removeClass('hidden');
	$('.volume').addClass('hidden');
});

$(document).on('click','#collapse6',function(){
	$('.reports-consignee').addClass('hidden');
	$('.runningcharges').addClass('hidden');
	$('.volume').removeClass('hidden');
});
$(document).ready(function(){
	$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
		type : "POST",
		data : {
			userID : con_name
		},
		success : function(suc){
			$('.reports_consignee_volume_outport').html(suc);
		}
	})
});
/*
$(document).on('click','#runningcharges-jobfile-outport',function(){
	var active_accreditation = $('.nav-data-runningcharges .active').attr('id');
	if(active_accreditation.trim() == 'runningcharges-jobfile-outport'){
		$('#txt-table-runningcharges-outport').val('');
		$('#btn-runningcharges-outport').click();
	}
});*/


$(document).on('click','#btn-volume-outport',function(){
	var con_id = $('.reports_consignee_volume_outport option:selected').attr('id');
	var con_name = $('.reports_consignee_volume_outport option:selected').text();
	var frm 	 = $('#dtpATAFrom-outport').val();
	var to 		 = $('#dtpATATo-outport').val();
	if(frm == '' && to == ''){
		$(".table-runningcharges-outport").html('<div class="table-runningcharges-outport" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/loadVolumeDetails');?>",
			  beforeSend: function() {
		              $('.table-volume-outport').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			montype   : montype_volume_outport,
	  			userID    : con_name,
	  			frm 	  : frm,
	  			to 		  : to
	  		}
		})
  		.done(function(data) {
  				$(".table-volume-outport").html(data);
  				$(".tools-bar").animate({marginTop:'0%'});
		});
	}
});
/*
$(document).on('keydown','#txt-table-runningcharges-outport',function(e){
	if(e.keyCode == 13){
		$('#btn-runningcharges-outport').click();
	}
})	*/

</script>


