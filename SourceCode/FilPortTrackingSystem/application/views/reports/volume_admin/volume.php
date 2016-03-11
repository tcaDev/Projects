	<div class="tab-pane tab_reports_volume-admin" id="tab_admin_volume">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top:20%;">
			        				<div class="col-md-12">
			        					<div class="row">
			        						<div class="col-md-6">
				        						<span style="padding-bottom: 10px;"> <h4>Reports Volume : <b class="active-volume"> Sea Freight Manila </b></h4></span>
				        					</div>
				        			 	 	
				        			 	 	<div class="col-md-6">
								    			<select class="form-control input-sm volume_consignee">
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
								    	<div class="col-md-12">
									    		<span><b>Actual Time of Arrival : </b></span>
									    	</div>
									      <div class="">

								    	<div class="col-md-5">
								    		<div class="">
								    			<input placeholder="From :" class="textbox-n form-control" id="dtpATAFrom-manila-volume" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
								    		</div>
								    		
								    	</div>

								    	<div class="col-md-5">
								    		<div class="">
								    			<input placeholder="To :" class="textbox-n form-control" id="dtpATATo-manila-volume" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
								    		</div>
								    	</div>

								    	<div class="col-md-2">
								    		<div class="row">
								    				<span class="input-group-btn">
								    					<button class="btn btn-danger col-md-12" type="button" id="btn-volume-admin"><span class="fa fa-search fa-fw"></span></button>
								    				</span>
								    		</div>
								    	</div>
								    </div>
								</div>
							
			 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:440px;">
    		<div class="table-volume-admin" ></div>
    	</div>
</div>	


<script>
	var volume = 0;
$('#admin_volume-manila').click(function(){
	$('.active-volume').html('<b> Sea Freight Manila</b>');
	volume = 1;
	$('.table-volume-admin').empty();
	$(".tab_reports_volume-admin .tools-bar").css('marginTop','20%');
	$('.volume_consignee').val(0);
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-outport').click(function(){
	$('.active-volume').html('<b> Sea Freight Outport</b>');
	volume = 2;
	$('.table-volume-admin').empty();
	$(".tab_reports_volume-admin .tools-bar").css('marginTop','20%');
	$('.volume_consignee').val(0);
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-air').click(function(){
	$('.active-volume').html('<b> Air Freight</b>');
	volume = 3;
	$('.table-volume-admin').empty();
	$(".tab_reports_volume-admin .tools-bar").css('marginTop','20%');
	$('.volume_consignee').val(0);
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$(document).on('click','#btn-volume-admin',function(){
	var con_id = $('.volume_consignee').val();
	var con_name = $('.volume_consignee option:selected').text();
	var frm 	 = $('#dtpATAFrom-manila-volume').val();
	var to 		 = $('#dtpATATo-manila-volume').val();
	if(frm == '' && to == ''){
		$(".table-volume-admin").html('<div class="table-runningcharges-manila" ></div>');
	}else{
			$.ajax({
	  		method: "POST",
			  url: "<?php echo base_url('Reports_Running_Charges/get_Volume');?>",
			  beforeSend: function() {
		              $('.table-volume-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
		            },  
	  		data: { 
	  			montype   : volume,
	  			consigneeID    : con_id,
	  			frm 	  : frm,
	  			to 		  : to
	  		}
		})
  		.done(function(data) {
  				$(".table-volume-admin").html(data);
  				$(".tools-bar").animate({marginTop:'0%'});
		});	
	}
});
</script>