	<div class="tab-pane tab_reports_volume-air" id="tab_reports_volume-air">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar col-md-12">
        				<div class="col-md-12">
        					<div class="row">
        						<div class="col-md-6">
	        						<span style="padding-bottom: 10px;"> <h4>Reports-Volume : <b> Sea Freight Air </b></h4></span>
	        					</div>
        					</div>
        				</div>
			 		</div>		 		
        		</div>

        		<div class="panel panel-default" style="margin-top: 15px;">
				  <div class="panel-heading"></div>
				  <div class="panel-body">
				  		<div class="col-md-6 col-md-offset-3">
				  			<!-- Search by Commodity  -->


				  			<div class="col-md-12">
				  				<div class="form-group">
					       			<div class="col-md-6">
					       				<h5>Consignee : </h5>
					       			</div>
					       			<div class="col-md-6">
					       				<span class="pull-right"><h6 class="loadConsignee-air"></h6></span>
					       			</div>
						       		<select class="form-control input-sm reports_consignee_volume_air">
						       			
						       		</select>
					       		</div>
				  			</div>

				  			<div class="col-md-12" style="border-top: 1px solid #ddd;">
					       		<div class="form-group">
					       			<div class="col-md-6">
					       				<h5>Commodity : </h5>
					       			</div>
					       			<div class="col-md-6">
					       				<span class="pull-right"><h6 class="loadCommodities-air"></h6></span>
					       			</div>
						       		<select class="form-control input-sm cbo-commodities-air">
						       			
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
										<input type="text" class="form-control input-sm dtpFrom-commodityVolume-air" onfocus="(this.type='date')" placeholder="From :" id="dtpATAFrom-air"/>	
									</div>

									<div class="form-group">
										<input type="text" class="form-control input-sm dtpTo-commodityVolume-air" onfocus="(this.type='date')" placeholder="To :" id="dtpATATo-air"/>	
									</div>
				  			</div>
				  			<!-- ATA -->
				  			
				  			<div class="col-md-12" style="margin-bottom:10px;">
				  				<div class="form-group">
						       		<button type="button" class="btn btn-primary btn-sm col-md-12 pull-right btn-volume-air" id="btn-volume-air"><span class="fa fa-search fa-fw"></span> Search</button>
						       	</div>
				  			</div>

				  		</div>
				  </div>
			</div> 		
    	</div>
    	
</div>	
<div class="subOutput">

</div>
		
<script>



		$("th").css("vertical-align","middle");
		$("tbody td").css("white-space","nowrap");
		$("tbody td").css("min-width","60px");
		$("thead th").css("white-space","nowrap");

var montype_volume_air = 3;


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

function loadConisngeeNamesVolume_air(){
	$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/getConsigneeNames');?>",
		type : "POST",
		beforeSend : function(){
			$('.loadConsignee-air').html('<span class="fa fa-spinner fa-pulse"></span>Loading Commodities...');
		},
		data : {
			userID : con_name
		},
		success : function(suc){
			$('.reports_consignee_volume_air').html(suc);
			$('.loadConsignee-air').html('');
		}
	});
}

$(document).on('change','.reports_consignee_volume_air',function(){
	var con_id = $('.reports_consignee_volume_air option:selected').attr('id');
	$.ajax({
		url  : "<?php echo base_url('Reports_Running_Charges/get_commodity_consignee');?>",
		type : "POST",
		beforeSend : function(){
			$('.loadCommodities-air').html('<span class="fa fa-spinner fa-pulse"></span>Loading Commodities...');
		},
		data : {
			con_id : con_id,
			montype : montype_volume_air
		},
		success : function(suc){
			$('.cbo-commodities-air').html(suc);
			$('.loadCommodities-air').html('');
		}
	})
});

$(document).ready(function(){
	loadConisngeeNamesVolume_air();
});


$(document).on('click','.btn-volume-air',function(){
	var con_id   = $('.reports_consignee_volume_air option:selected').attr('id');
	var prod_id  = $('.cbo-commodities-air option:selected').attr('id');
	var ataFrom  = $('.dtpFrom-commodityVolume-air').val();
	var ataTo 	 = $('.dtpTo-commodityVolume-air').val();
	if(con_id == "" || con_id == null){
		
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
				frm 	: ataFrom,
				to 		: ataTo,
				montype : montype_volume_air
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


