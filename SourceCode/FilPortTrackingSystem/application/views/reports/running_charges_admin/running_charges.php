<div class="tab-pane tab_runningcharges_admin" id="tab_admin_running">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top: 20%;">
	        				<div class="col-md-12">
	        			 	
	        			 	 		<div class="row">
				        						<div class="col-md-6">
					        						 <span style="padding-bottom: 10px;"> <h4> Running Charges Reports : <b class='active-tabRun'> Sea Freight Manila </b></h4></span>
					        					</div>
					        			 	 	
					        			 	 	<div class="col-md-6">
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
	        				</div>
						    <div class="input-group col-md-12">
						       <input type="text" class="form-control light-table-filter" data-table="order-table-runningcharges-admin" id="txt-table-runningcharges-admin" placeholder='Search by Purchase Order Number'>
						      <span class="input-group-btn">
						       <button class="btn btn-danger" id="btn-runningcharges-admin" type="button"><span class="fa fa-search fa-fw"></span></button>
						      </span>
						    </div>
				 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:440px;">
    		<div class="table-runningcharges-admin" ></div>
    	</div>
</div>	

<script>


var runn_char = 0;
$('#admin_running-manila').click(function(){
	$('.active-tabRun').html('<b> Sea Freight Manila</b>');
	runn_char = 1;
	$('.table-runningcharges-admin').empty();
	$(".tab_runningcharges_admin .tools-bar").css('marginTop','20%');
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin').val('');
});

$('#admin_running-outport').click(function(){
	$('.active-tabRun').html('<b> Sea Freight Outport</b>');
	runn_char = 2;
	$('.table-runningcharges-admin').empty();
	$(".tab_runningcharges_admin .tools-bar").css('marginTop','20%');
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin').val('');
});

$('#admin_running-air').click(function(){
	$('.active-tabRun').html('<b> Air Freight</b>');
	runn_char = 3;
	$('.table-runningcharges-admin').empty();
	$(".tab_runningcharges_admin .tools-bar").css('marginTop','20%');
	$('.rc_consignee').val(0);
	$('#txt-table-runningcharges-admin').val('');
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
  				$(".tab_runningcharges_admin .tools-bar").animate({
  					marginTop:'0%',
  				});

		});
	}
});
</script>