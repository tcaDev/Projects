<div class="tab-pane tab_reports_truck-admin" id="tab_admin_truck">	

    	<div class="col-md-12 ">
        	<div class="row">
        		<div class="tools-bar col-md-12">
    				<div class="col-md-12">
    					<div class="row">
    						<div class="col-md-6">
        						<span style="padding-bottom: 10px;"> <h4>Reports-Truck Booking : <b class="active-truck"> Sea Freight Manila </b></h4></span>
        					</div>
    					</div>
    				</div>
			 	</div>
        	</div>   

        	<div class="col-md-12" style="margin-top: 15px;">
	            <div class="row">
	                <div class="panel panel-default">
	                  <div class="panel-heading">LCL Shipments :</div>
	                  <div class="panel-body">
	                   <h5>Search : </h5>

	                     <div class="col-md-6 col-md-offset-3">
	                        <div class="col-md-12">
	                          <div class="form-group">
	                            <h5>Consignee: </h5>
	                            <select class="form-control input-sm truck_consignee">
						  			<option disabled selected value="0">Select Consignee</optio>
					            	<?php  foreach($consignee as $row){  ?> 
					                <option value="<?php echo $row->ConsigneeId ?>">
					                <?php echo stripslashes($row->ConsigneeName) ?>
					                </option> 
					             	<?php }?>
					            </select>    
	                          </div>
	                        </div>

	                        <div class="col-md-12">
	                          <h5>Target Delivery Date : </h5>
	                          <div class="form-group">
	                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="From :" id="dtpATAFrom-truck"/> 
	                          </div>

	                          <div class="form-group">
	                            <input type="text" class="form-control input-sm" onfocus="(this.type='date')" placeholder="To :" id="dtpATATo-truck"/> 
	                          </div>
	                        </div>

	                        <div class="col-md-12">
	                          <button type="button" class="btn btn-primary btn-sm col-md-12 pull-right " id="btn-truck-admin"><span class="fa fa-search fa-fw"></span> Search</button>
	                        </div>

	                          <div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:110px;">
					    		<div class="table-truck-admin" ></div>
					    	</div>
	                     </div>
	                  </div>
	                </div>  
	            </div>
          </div>
    	</div>
</div>	

<script>
	
 var truck = 1;
 $('#admin_truck-manila').click(function(){
	$('.active-truck').html('<b> Sea Freight Manila</b>');
	truck = 1;
	$('.table-truck-admin').empty();
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$('#admin_truck-outport').click(function(){
	$('.active-truck').html('<b> Sea Freight Outport</b>');
	truck = 2;
	$('.table-truck-admin').empty();
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$('#admin_truck-air').click(function(){
	$('.active-truck').html('<b> Air Freight</b>');
	truck = 3;
	$('.table-truck-admin').empty();
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$(document).on('click','#btn-truck-admin',function(){
      var con_id   = $('.truck_consignee').val();
      var con_name = $('.reports_consignee_truck option:selected').text();
      var frm    = $('#dtpATAFrom-truck').val();
      var to     = $('#dtpATATo-truck').val();
      if(frm == '' && to == '' && con_id == ''){
       
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/get_truck');?>",
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
              montype   : truck,
              con_id    : con_id,
              frm       : frm,
              to        : to
            }
        })
          .done(function(data) {
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
        }); 
      }
  });
</script>