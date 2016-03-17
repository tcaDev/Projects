	<div class="tab-pane tab_reports_volume-admin" id="tab_admin_volume">	

    	<div class="col-md-12 ">
        	<div class="row">
    			<div class="tools-bar col-md-12">
    				<div class="col-md-12">
    					<div class="row">
    						<div class="col-md-6">
        						<span style="padding-bottom: 10px;"> <h4>Reports Volume : <b class="active-volume"> Sea Freight Manila </b></h4></span>
        					</div>
    					</div>
    				</div>
			 	</div>
        	</div>     	

        	<div class="panel panel-default" style="margin-top: 15px;">
				  <div class="panel-heading"><h5>Search : </h5></div>
				  <div class="panel-body">
				  		<div class="col-md-6 col-md-offset-3">
				  			<!-- Search by Commodity  -->


				  			<div class="col-md-12">
				  				<div class="form-group">
					       			<h5>Consignee: </h5>
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

				  			<div class="col-md-12" style="border-top: 1px solid #ddd;">
					       		<div class="form-group">
					       			<h5>Commodity : </h5>
						       		<select class="form-control input-sm">
						       			
						       		</select>
					       		</div>
				  			</div>

				  			<!-- OR  -->
				  			<div class="col-md-12">
				  				<span><h6 style="text-align: center;">-Or-</h6></span>
				  			</div>

							<div class="col-md-12" >
				  				
						       		<h5>Actual Arrival Date : </h5>
									<div class="form-group">
										<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" id="dtpATAFrom-manila-volume"/>	
									</div>

									<div class="form-group">
										<input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" id="dtpATATo-manila-volume"/>	
									</div>
				  			</div>
				  			<!-- ATA -->
				  			
				  			<div class="col-md-12" style="margin-bottom:10px;">
				  				<div class="form-group">
						       		<button type="button" class="btn btn-primary btn-sm col-md-12 pull-right" id="btn-volume-admin"><span class="fa fa-search fa-fw"></span> Search</button>
						       	</div>
				  			</div>

				  		</div>
				  </div>
			</div> 		

    	</div>
    	
</div>	


<script>
	var volume = 0;
$('#admin_volume-manila').click(function(){
	$('.active-volume').html('<b> Sea Freight Manila</b>');
	volume = 1;
	$('.table-volume-admin').empty();
	$('.volume_consignee').val(0);
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-outport').click(function(){
	$('.active-volume').html('<b> Sea Freight Outport</b>');
	volume = 2;
	$('.table-volume-admin').empty();
	$('.volume_consignee').val(0);
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-air').click(function(){
	$('.active-volume').html('<b> Air Freight</b>');
	volume = 3;
	$('.table-volume-admin').empty();
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
		});	
	}
});
</script>