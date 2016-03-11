<div class="tab-pane tab_reports_truck-admin" id="tab_admin_truck">	

    	<div class="col-md-12 ">
        	<div class="row">
        			<div class="tools-bar" style="margin-top:20%;">
			        				<div class="col-md-12">
			        					<div class="row">
			        						<div class="col-md-6">
				        						<span style="padding-bottom: 10px;"> <h4>Truck : <b class="active-truck"> Sea Freight Manila </b></h4></span>
				        					</div>
				        			 	 	
				        			 	 	<div class="col-md-6">
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
			        			 		
			        				</div>

								    <div class="input-group col-md-12">
								    	<div class="col-md-12">
									    		<span><b>Target Delivery Date : </b></span>
									    	</div>
									      <div class="">

								    	<div class="col-md-5">
								    		<div class="">
								    			<input placeholder="From :" class="textbox-n form-control" id="dtpATAFrom-truck" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
								    		</div>
								    		
								    	</div>

								    	<div class="col-md-5">
								    		<div class="">
								    			<input placeholder="To :" class="textbox-n form-control" id="dtpATATo-truck" type="text" onfocus="(this.type='date')" onchange="(this.type='text')"> 
								    		</div>
								    	</div>

								    	<div class="col-md-2">
								    		<div class="row">
								    				<span class="input-group-btn">
								    					<button class="btn btn-danger col-md-12" type="button" id="btn-truck-admin"><span class="fa fa-search fa-fw"></span></button>
								    				</span>
								    		</div>
								    	</div>
								    </div>
								</div>
							
			 	</div>
        	</div>     		
    	</div>
    	<div class="stickyHeader" style="width:100%;overflow-y:auto;position:relative;height:440px;">
    		<div class="table-truck-admin" ></div>
    	</div>
</div>	

<script>
	var truck = 0;
$('#admin_truck-manila').click(function(){
	$('.active-truck').html('<b> Sea Freight Manila</b>');
	truck = 1;
	$('.table-truck-admin').empty();
	$(".tab_reports_truck-admin .tools-bar").css('marginTop','20%');
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$('#admin_truck-outport').click(function(){
	$('.active-truck').html('<b> Sea Freight Outport</b>');
	truck = 2;
	$('.table-truck-admin').empty();
	$(".tab_reports_truck-admin .tools-bar").css('marginTop','20%');
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$('#admin_truck-air').click(function(){
	$('.active-truck').html('<b> Air Freight</b>');
	truck = 3;
	$('.table-truck-admin').empty();
	$(".tab_reports_truck-admin .tools-bar").css('marginTop','20%');
	$('.truck_consignee').val(0);
	$('#dtpATAFrom-truck').val('');
	$('#dtpATATo-truck').val('');
});

$(document).on('click','#btn-truck-admin',function(){
      var con_id   = $('.truck_consignee').val();
      var con_name = $('.reports_consignee_truck option:selected').text();
      var frm    = $('#dtpATAFrom-truck').val();
      var to     = $('#dtpATATo-truck').val();
      if(frm == '' && to == ''){
        $(".table-truck-admin").html('<div class="table-truck-reports" ></div>');
      }else{
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('Reports_Running_Charges/get_truck');?>",
            beforeSend: function() {
                      $('.table-truck-admin').html('<span class="loading-uname"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</span>');
                    },  
            data: { 
              montype   : truck,
              con_id    : con_id,
              frm       : frm,
              to        : to
            }
        })
          .done(function(data) {
              $(".table-truck-admin").html(data);
              $(".tools-bar").animate({marginTop:'0%'});
        }); 
      }
  });
</script>