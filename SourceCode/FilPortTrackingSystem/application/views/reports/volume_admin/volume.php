	<div class="tab-pane tab_reports_volume-admin active" id="tab_admin_volume">	

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
					       		<div class="form-group ">
					       			<h5>Commodity : </h5>
						       		<select class="form-control input-sm cbo-commodities-admin">
						       			
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
	var volume = 1;
$('#admin_volume-manila').click(function(){
	$('.active-volume').html('<b> Sea Freight Manila</b>');
	volume = 1;
	$('.table-volume-admin').empty();
	$('.volume_consignee').val(0);
	$('.cbo-commodities-admin').empty();
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-outport').click(function(){
	$('.active-volume').html('<b> Sea Freight Outport</b>');
	volume = 2;
	$('.table-volume-admin').empty();
	$('.volume_consignee').val(0);
	$('.cbo-commodities-admin').empty();
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});

$('#admin_volume-air').click(function(){
	$('.active-volume').html('<b> Air Freight</b>');
	volume = 3;
	$('.table-volume-admin').empty();
	$('.volume_consignee').val(0);
	$('.cbo-commodities-admin').empty();
	$('#dtpATAFrom-manila-volume').val('');
	$('#dtpATATo-manila-volume').val('');
});


$(document).on('change','.volume_consignee',function(){
	var con_id = $('.volume_consignee').val();
	$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/get_commodity_consignee');?>",
		type : "POST",
		beforeSend : function(){
			$('.cbo-commodities-admin').html('<option><span class="fa fa-spinner fa-pulse"></span><i>Loading Commodities...</i></option>');
		},
		data : {
			con_id  : con_id,
			montype : volume
		},
		success : function(suc){
			$('.cbo-commodities-admin').html(suc);
		
		}
	})
});

$(document).on('click','#btn-volume-admin',function(){
	var con_id = $('.volume_consignee').val();
	var con_name = $('.volume_consignee option:selected').text();
	var frm 	 = $('#dtpATAFrom-manila-volume').val();
	var to 		 = $('#dtpATATo-manila-volume').val();
	var prod_id = $('.cbo-commodities-admin option:selected').attr('id');

	if(con_id == "" || con_id == null && frm == '' && to == ''){
		 $.alert({
			icon: 'fa fa-exclamation-triangle-o',
		 	closeIcon: false,
	        title: 'No Data Match',
	        backgroundDismiss: false,
	        content: 'Sorry ! Data not Found ',
	        confirm : function(){
	        	
	       	 }
			});
	}else{
			$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/getCommodityVolume');?>",
		type : "POST",
		beforeSend : function(){
			dia =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Searching Your Files',
				   	  });
		},
		data : {
			con_id 	: con_id,
			prod_id : prod_id,
			frm 	: frm,
			to 		: to,
			montype : volume
		},
		success : function(data){
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
							window.open(data);
						}
		}
	});
	}
});

</script>