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
				           		<label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span class="check_jobfiles-update-outport"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles-update-outport" name="jbfl" id="jbfl">
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

								  <label for="hbl">House Bill of Lading No.:</label>
								  <input type="text" class="form-control input-sm hbl-update-outport" name="hbl" id="hbl">
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
							  			<option> </option>
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
									 <label for="rfp">Request for Payment Due Date:</label>
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


$(document).on('show.bs.modal','body',function(){
	$('.check_jobfiles-update-outport').html('<span class="check_jobfiles-update-outport"></span>');
});

function clear_outport_data(){
	$('.jobfiles-update-outport').val('');
	$('.monitoring_type_id-outport').val('');
							     
	$(".broker-update-outport").val('');

	 $(".shipper-update-outport option").filter(function() {
	    return this.text == ''; 
	}).attr('selected', 'selected');

	 $(".consignee-update-outport option").filter(function() {
	    return this.text == ''; 
	}).attr('selected', 'selected');

	 $(".colsel-update-outport option").filter(function() {
	    return this.text == ''; 
	}).attr('selected', 'selected');


	 $('.hbl-update-outport').val('');
	 $('.mbl-update-outport').val('');
	 $('.mbl2-update-outport').val('');
	 $('.bank-update-outport').val('');
	 $('.registry-update-outport').val('');

	$('.dtRcvd-update-outport').val('');
	$('.dt_pickup_obl-update-outport').val('');
	$('.dt_pickup_docs-update-outport').val('');

	$('.purch_order_no_update-outport').val('');
	$('.dt-req-update-outport').val('');
	$('.rfp-update-outport').val('');

  }

$(document).ready(function(){
 	$(document).on('click','.btn-Update-outport',function(){
 				     var jobfileNo  = $(this).closest('tr').children('td:eq(2)').text();
					      $.ajax({	
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origin-update-outport select").val(data);
							});


						    $.ajax({
								method: "POST",
								url : "<?php echo base_url('Job/get_jobcontent_manila');?>",
								beforeSend:function(){
									clear_outport_data();
										 dia_outport =	$.dialog({
								 	  	    icon: 'fa fa-spinner fa-spin',
								 	  	    closeIcon: false,
							        		title: 'Jobfile',
							        		backgroundDismiss: false,
							        		content: 'Preparing Jobfile Information',
							   			});
									
								},
								data: {
									jobfile : jobfileNo,
									monType : 1
								} 
							}).done(function(data){

								 var fills = JSON.parse(data);
							     var ShipperName    = fills[0].ShipperName;
							     var ConsigneeName  = fills[0].ConsigneeName;
							     var PurchaseOrderNo= fills[0].PurchaseOrderNo;
								 var color_stages  = fills[0].StatusName;
								 var color_stages_id  = fills[0].StatusId;
								 var HouseBillLadingNo      = fills[0].HouseBillLadingNo;
							     var MasterBillLadingNo     = fills[0].MasterBillLadingNo;
								 var MasterBillLadingNo2    = fills[0].MasterBillLadingNo2;
							     var LetterCreditFromBank   = fills[0].LetterCreditFromBank;
						
							     var registry   = fills[0].Registry;

							     var DateReceivedNoticeFromClients     = fills[0].DateReceivedNoticeFromClients;
							     var date_rcvd_bl     = fills[0].DateReceivedOfBL;
							     var date_rcvd_other_docs    = fills[0].DateReceivedOfOtherDocs;
							     var broker    = fills[0].BrokerId;
							     var date_req_budget    = fills[0].DateRequestBudgetToGL;
							     var rfpduedate    = fills[0].RFPDueDate;
							     var color_selectivity    = fills[0].ColorSelectivityName;
							     var JobFileId            = fills[0].JobFileId;

							     $('.jobfiles-update-outport').val(jobfileNo);
							     $('.monitoring_type_id-outport').val(JobFileId);
							     
							      $(".broker-update-outport").val(broker);

							     $(".shipper-update-outport option").filter(function() {
								    return this.text == ShipperName; 
								}).attr('selected', 'selected');

							    $(".consignee-update-outport option").filter(function() {
								    return this.text == ConsigneeName; 
								}).attr('selected', 'selected');

							    $(".colsel-update-outport option").filter(function() {
								    return this.text == color_stages; 
								}).attr('selected', 'selected');

								 var status = $('.colsel-update-outport').val();
								  var color = $('.colsel-update-outport option:selected').attr('data-color');
								    if(status==1){
								    	$('.colsel-update-outport').css({ 'color': 'red','background-color':'white' });
								    }else{
								     $('.colsel-update-outport').css({'background-color': color,'color': 'white'});
								  	}

							     $('.hbl-update-outport').val(HouseBillLadingNo);
							     $('.mbl-update-outport').val(MasterBillLadingNo);
							     $('.mbl2-update-outport').val(MasterBillLadingNo2);
							     $('.bank-update-outport').val(LetterCreditFromBank);
							     $('.registry-update-outport').val(registry);

							    $('.dtRcvd-update-outport').val(DateReceivedNoticeFromClients);
							    $('.dt_pickup_obl-update-outport').val(date_rcvd_bl);
							    $('.dt_pickup_docs-update-outport').val(date_rcvd_other_docs);

							     

							      $('.purch_order_no_update-outport').val(PurchaseOrderNo);
							      $('.dt-req-update-outport').val(date_req_budget);
							      $('.rfp-update-outport').val(rfpduedate);

							      $(".color-select-update-outport option").filter(function() {
								    return this.text == color_selectivity; 
								}).attr('selected', 'selected');

							    $.ajax({
								 	method: "POST",
								    url: "<?php echo base_url('Job/get_country_name');?>",
									data: { jobfile:jobfileNo
								  		}
								})
							  	.done(function(data) {
										$(".origcity-update-outport").val(data);
								});
							 dia_outport.close();
	     		  });
			 }); 
 });

$(document).on('keyup','.jobfiles-update-outport',function(){
	var id = $('.monitoring_type_id-outport').val(); 
	var num = $('.jobfiles-update-outport').val();
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job/check_jobfiles_update');?>",
	 		       beforeSend:function(){
	 		       	$('.check_jobfiles-update-outport').html('<span class="fa fa-spinner fa-spin" style="font-size:12px;"></span>Please Wait...');
	 		       },
			   	   data: {
			  	   			   jbid 		       :id,
			  	   	           jobfile   		   :num,
			  	   	           mon 				   :2
			  	   		 }
	              })
					.done(function(data) {
						$('.check_jobfiles-update-outport').html(data);
	    		    });

});
$(document).on('click','.update_jobfiles-outport',function(){
	
 var montype 		=   $('.monitoring_type-outport').val();
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
	if($('.check_jobfiles-update-outport').text().trim() == "Jobfile Already Exists"){
							 $.alert({
				        		title: 'Update!',
				        		content: 'Cannot Proceed with the Update <br> Please Check your inputs if there are Errors',
				   			   });
	}else{
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
			  	   	           montype         :montype,
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
									window.location.hash="#outport";
									location.reload();
				        	    }
				   			   });
	    		    })
	}
 
});
</script>



