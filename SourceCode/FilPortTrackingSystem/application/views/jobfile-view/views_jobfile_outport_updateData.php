 <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Jobfile(s)</h4>
        </div>
	        <div class="modal-body">

    	<div class="jobfile-outport-update">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="2" name="monitoring_type" class="monitoring_type-outport"/>

				           <input type="hidden"  name="monitoring_type" class="monitoring_type_id-outport "/>

				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span class="check_jobfiles-update"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles-update-outport" name="jbfl" id="jbfl" onkeyup="check_jobfile_avi(this.value)">
								 <i class="jobfile-msg-outport" style="color:red;"></i>
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check" style="color:red;"></span></label> 
								  		<select name="shipper"  class="form-control input-sm shipper-update-outport ">
							            	<option> </option>
							            	<?php  foreach($shipper_data as $row){  ?> 
							                <option value="<?php echo $row->ShipperId ?>">
							                <?php echo stripslashes($row->ShipperName) ?>
							                </option> 
							             	<?php }?>
						               	</select>
						            <i class="shipper-msg"  style="color:red;"></i>
						      </div>

						     <div class="form-group">
								  <label for="consignee">Consignee:<i style="color:red;">*</i></label> 
								  		<select name="consignee" class="form-control input-sm consignee-update-outport">
								  			<option> </option>
							            	<?php  foreach($consignee_data as $row){  ?> 
							                <option value="<?php echo $row->ConsigneeId ?>">
							                <?php echo stripslashes($row->ConsigneeName) ?>
							                </option> 
							             	<?php }?>
							            </select>
							            <i class="consignee-msg" style="color:red;" style="color:red;"></i>
							   </div>
								   	
				           	

				           	<div class="form-group">
								<label>Color Stages</label> 									
								<select name="colors" class="form-control colsel-update-outport input-sm" >
									  	<option value="0" disabled selected>Jobfile Status</option>
										<?php  foreach($color_data as $row){ 
										   $status = $row->StatusId;
										   if($status==0){?> 
										   	<option  data-color='<?php echo $row->ColorCode;?>' style="color:<?php echo $row->ColorCode;?>" value="<?php echo $row->StatusId ?>">					
									 <?php }else{?>
									    	<option data-color='<?php echo $row->ColorCode;?>'style="background-color:<?php echo $row->ColorCode;?>; color:white;" value="<?php echo $row->StatusId ?>">
									    <?php }?>
									    <?php echo $row->StatusName; ?>
									    </option> 
									 	<?php }?>
									</select>
									
							</div>

				           </div>
					
						<!-- 		<div class="form-group">
								  <label for="pipo">PI / PO No.:</label>
								  <input type="text" class="form-control input-sm" name="pipo" id="pipo">
								 </div> -->

								<div class="form-group">

								  <label for="hbl">House Bill of Lading No.:</label><i style="color:red;">*</i>
								  <input type="text" class="form-control input-sm hbl-update-outport" name="hbl" id="hbl">
								  <i class="colsel-msg" style="color:red;"></i>
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 1.:</label>
								  <input type="text" class="form-control input-sm mbl-update-outport" name="mbl" id="mbl">
								 </div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 2.:</label>
								  <input type="text" class="form-control input-sm mbl2-update-outport" name="mbl2" placeholder="Optional" id="mbl2">
								</div>

						

						</div>

					<div class="col-lg-4">

						<div class="form-group">
									  <label for="bank">Letter of Credit No. from Bank:</label>
									  <input type="text" class="form-control input-sm bank-update-outport" name="bank" id="bank">
									</div>

									<div class="form-group">
									  <label for="registry">Registry:</label>
									  <input type="text" class="form-control input-sm registry-update-outport" name="registry" id="registry">
									</div>

									<div class="form-group origin-update-outport">
										<label>Origin Country</label><i style="color:red;">*</i>
											<select  class="form-control country_update-outport" name="countries">
												<?php foreach($countries as $row){ ?>
												 <option value="<?php echo $row->CountryId?>">
												 <?php echo $row->CountryName;?>
												 </option>
												<?php }?> 
											</select>	

											<i class="origin-msg" style="color:red;"></i>
								   </div>

								<div class="form-group">
									<label>Origin City</label>
									<input type="text" name="origcity" class="form-control input-sm origcity-update-outport" />
								</div>

							
								

								<div class="form-group">
								  <label for="dtRcvd">Date Received Arrival Notice From Client / SLINE:</label>
								  <input type="date" name="dtRcvd" class="form-control input-sm dtRcvd-update-outport" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Received O-BL:</label>
								  <input type="date" name="dt_pickup_obl" class="form-control input-sm dt_pickup_obl-update-outport" >
								</div>

				  			</div>

							<div class="col-lg-4" >

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Received Other Document :</label>
								  <input type="date" name="dt_pickup_docs" class="form-control input-sm dt_pickup_docs-update-outport" >
								 </div>

							 <div class="form-group">
									 <label for="broker">Broker:</label>
							  			<select name="broker"id="Broker"class="form-control input-sm broker-update-outport">
							            	<?php  foreach($broker_data as $row){  ?> 
							                <option value="<?php echo $row->BrokerId ?>">
							                <?php echo stripslashes($row->FirstName) . " " . stripslashes($row->MiddleName) . " " . stripslashes($row->LastName); ?>
							                </option> 
							             	<?php }?>
						               </select>
						          </div>
						           <div class="form-group">
						              <label for="dtPckRcv">Purchase Order No.</label>
								      <input type="text"  class="form-control input-sm purch_order_no_update-outport" id="purch_order_no">

						           </div>

						           <div class="form-group">
						               <label for="dtReq">Date Request Budget to GL:</label>
									   <input type="date" name="dt_req_budget" class="form-control input-sm dt-req-update-outport" id="dt_req_budget">
								  </div>

						         
								<div class="form-group">
									 <label for="rfp">Reference Due Date:</label>
									 <input type="date" name="ref_due_dt" class="form-control input-sm rfp-update-outport" id="ref_due_dt">
								 </div>
								 


						<div class="form-group">
									<label>Color Selectivity :</label>
									<select name="color-select" id="color-select" class="form-control input-sm color-select-update-outport">
											<?php foreach($color_selectivity as $row){ ?>
												 <option value="<?php echo $row->ColorSelectivityId?>">
												 <?php echo $row->ColorSelectivityName;?>
												 </option>
												<?php }?> 
									</select>
								</div>
				  			</div>
				  		</div>
				  </div>
    </div>
    <input type="hidden" class="jobid-outport">
    <div class="footer-modal" >
    <hr>
      <button type="submit" class="btn btn-danger update_jobfiles-outport" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>

<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel-update-outport').change(function(){
  var status = $(this).val();
  var color = $('.colsel-update-outport option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-update-outport').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-update-outport').css({'background-color': color,'color': 'white'});
  	}
 });

</script>



<script>
function check_jobfile_avi(jobfile){
/*    var id = $('.monitoring_type_id').val(); 
    alert(id);
    		 	$.ajax({
		           method: "GET",
	 		       url: "<?php echo base_url('Job/check_jobfiless');?>",
			  	   data: {
			  	   			   jbid 		       :id,
			  	   	           jobfile   		   :jobfile,
			  	   		 }
	              })
					.done(function(data) {
						$('.check_jobfiles-update').html(data);
	    		    });*/
}
$(document).on('click','.update_jobfiles-outport',function(){
 var jbfl 			=   $('.jobfiles-update-outport').val();
 var jbid           =   $('.monitoring_type_id-outport').val();
 var shipper        =   $('.shipper-update-outport').val();
 var consignee 	    =   $('.consignee-update-outport').val();
 var colsel         =   $('.colsel-update-outport').val();
 var hbfl 			=   $('.hbl-update-outport').val();
 var mbl            =   $('.mbl-update-outport').val();
 var mbl2           =   $('.mbl2-update-outport').val();
 var bank 	        =   $('.bank-update-outport').val();
 var reg            =   $('.registry-update-outport').val();
 var country 	    =   $('.country_update-outport').val();
 var city 	    	=   $('.origcity-update-outport').val();
 var dtRcvd_arr_client   =   $('.dtRcvd-update-outport').val();
 var dtPckup_obl    =   $('.dt_pickup_obl-update-outport').val();
 var dt_pickup_docs =   $('.dt_pickup_docs-update-outport').val();
 var broker         =   $('.broker-update-outport').val();
 var purch_order_no =   $('.purch_order_no_update-outport').val();
 var dtReq_budge_gl =   $('.dt-req-update-outport').val();
 var ref_due_dt     =   $('.rfp-update-outport').val();
 var color_selectivity     =   $('.color-select-update-outport').val();

		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job_manila_update/jobfile_update');?>",
	 		       beforeSend: function() {
					 	  dia_jobfile =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Jobfile',
				   			});
 					  },
			  	   data: {
			  	   			   jbid 		   :jbid,
			  	   	           jbfl   		   :jbfl,
			  	   			   shipper         :shipper,
			                   consignee       :consignee,   
			                   colsel  		   :colsel,
			                   hbfl       	   :hbfl,
			                   mbl     		   :mbl,
			                   mbl2	           :mbl2,
			                   bank		       :bank,
			                   reg             :reg,
			                   country         :country,
			                   city            :city,
			                   dtRcvd_arr_client    :dtRcvd_arr_client,
			                   dtPckup_obl          :dtPckup_obl,
			                   dt_pickup_docs       :dt_pickup_docs,
			                   broker               :broker,
			                   purch_order_no       :purch_order_no,
			                   dtReq_budge_gl       :dtReq_budge_gl,
			                   ref_due_dt           :ref_due_dt,
			                   color_selectivity    :color_selectivity

			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Jobfile is Updated',
				        		confirm: function(){
									dia_jobfile.close();
									location.reload();
				        		
				        	    }
				   			   });
	    		    })


 
 
 

 
});
</script>



