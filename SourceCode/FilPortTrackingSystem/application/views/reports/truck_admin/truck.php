<div class="tab-pane tab_reports_truck-admin active" id="tab_admin_truck">	

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
	                  <div class="panel-heading"><span class="shipments">FCL Shipments :</span></div>
	                  <div class="panel-body">
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
<div class="modal fade" id="truck-options" role="dialog" style="top:30%;">
				    <div class="modal-dialog" >
				   		 <div class="modal-content" style="height:150px;">
				   			<div class="modal-body">
				   				 <div class="col-md-12" style="padding-top:20px;">
				   					<div class="col-md-4"> 
				   				 		<h3>Save As</h3>
				   				 	</div>
				   				 	<div class="col-md-4" style="padding-top:20px;"> 
				   				 		<a href='#' id="truck_csv"><input type="button" class="btn btn-success btn-save-as-truck form-control" value="CSV File"/></a>
				   				 	</div>
				   				 	<div class="col-md-4" style="padding-top:20px;">
				   				 		<a href='#' id="truck_pdf"><input type="button" class="btn btn-danger btn-save-as-truck form-control" value="PDF File"/></a>
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
	$('.shipments').html('<span>FCL Shipments :</span>');
});

$('#admin_truck-outport').click(function(){
	$('.active-truck').html('<b> Sea Freight Outport</b>');
	truck = 2;
	$('.table-truck-admin').empty();
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
	$('.shipments').html('<span>FCL Shipments :</span>');
});

$('#admin_truck-air').click(function(){
	$('.active-truck').html('<b> Air Freight</b>');
	truck = 3;
	$('.table-truck-admin').empty();
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
	$('.shipments').html('<span>LCL Shipments :</span>');
});

$(document).on('click','#btn-truck-admin',function(){
      var con_id   = $('.truck_consignee').val();
      var con_name = $('.reports_consignee_truck option:selected').text();
      var frm    = $('#dtpATAFrom-truck').val();
      var to     = $('#dtpATATo-truck').val();
      if(con_id == '' || con_id == null){
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

      	if(frm == '' && to == ''){
      		 $.alert({
							icon: 'fa fa-exclamation-triangle-o',
						 	closeIcon: false,
					        title: 'No Data Match',
					        backgroundDismiss: false,
					        content: 'Sorry ! Data not Found ',
					        confirm : function(){
					        	
					       	 }
							});
      	}
      	else{
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
							$('#truck-options').modal('show');
							$('#truck_pdf').html('<a href=' + data +' target="blank" id="truck_pdf"><input type="button" class="btn btn-save-as-truck btn-danger form-control" value="PDF File"/></a>')
						}
        }); 
      	}
      }
  });
$(document).on('click','.btn-save-as-truck',function(){
	$('#truck-options').modal('hide');
});
</script>