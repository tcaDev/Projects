 <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
        <div class="modal-header" style="background-color:#eee">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Jobfile(s)</h4>
        </div>
	        <div class="modal-body">

    	<div class="jobfile-mnla-update">
				  	<div class="row">
				  		<div class="col-lg-4" >	
				
				           <input type="hidden" value="1" name="monitoring_type" class="monitoring_type"/>

				           <input type="hidden"  name="monitoring_type" class="monitoring_type_id"/>
				           	<div class="required-fields">
				           		<div class="form-group">
				              <!--check if jofile is already exists -->
				           		 <label for="jbfl">JobFile No.:<i style="color:red;">*</i> <span class="check_jobfiles-update"></span></label> 
								 <input type="text" class="form-control input-sm jobfiles-update" name="jbfl" id="jbfl" onkeyup="check_jobfile_avi(this.value)">
								 <i class="jobfile-msg" style="color:red;"></i>
				           </div>
				  				
				           <div class="form-group">
							 	 <label for="shipper">Shipper:<i style="color:red;">*</i><span class"ship-check" style="color:red;"></span></label> 
								  		<select name="shipper"  class="form-control input-sm shipper-update ">
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
								  		<select name="consignee" class="form-control input-sm consignee-update">
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
								<select name="colors" class="form-control colsel-update input-sm" >
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
								  <input type="text" class="form-control input-sm hbl-update" name="hbl" id="hbl">
								</div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 1.:</label>
								  <input type="text" class="form-control input-sm mbl-update" name="mbl" id="mbl">
								 </div>

								<div class="form-group">
								  <label for="mbl">Master Bill of Lading No 2.:</label>
								  <input type="text" class="form-control input-sm mbl2-update" name="mbl2" placeholder="Optional" id="mbl2">
								</div>

						

						</div>

					<div class="col-lg-4">

						<div class="form-group">
									  <label for="bank">Letter of Credit No. from Bank:</label>
									  <input type="text" class="form-control input-sm bank-update" name="bank" id="bank">
									</div>

									<div class="form-group">
									  <label for="registry">Registry:</label>
									  <input type="text" class="form-control input-sm registry-update" name="registry" id="registry">
									</div>

									<div class="form-group origin-update">
										<label>Origin Country</label><i style="color:red;">*</i>
											<select  class="form-control country_update" name="countries">
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
									<input type="text" name="origcity" class="form-control input-sm origcity-update" />
								</div>

							
								

								<div class="form-group">
								  <label for="dtRcvd">Date Received Arrival Notice From Client / SLINE:</label>
								  <input type="date" name="dtRcvd" class="form-control input-sm dtRcvd-update" >
								</div>

								<div class="form-group">
								  <label for="dtPckup">Date Pick-up / Received O-BL:</label>
								  <input type="date" name="dt_pickup_obl" class="form-control input-sm dt_pickup_obl-update" >
								</div>

				  			</div>

							<div class="col-lg-4" >

								<div class="form-group">
								  <label for="dtPckRcv">Date Pick-up / Received Other Document :</label>
								  <input type="date" name="dt_pickup_docs" class="form-control input-sm dt_pickup_docs-update" >
								 </div>

							 <div class="form-group">
									 <label for="broker">Broker:</label>
							  			<select name="broker"id="Broker"class="form-control input-sm broker-update">
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
								      <input type="text"  class="form-control input-sm purch_order_no_update" id="purch_order_no">

						           </div>

						           <div class="form-group">
						               <label for="dtReq">Date Request Budget to GL:</label>
									   <input type="date" name="dt_req_budget" class="form-control input-sm dt-req-update" id="dt_req_budget">
								  </div>

						         
								<div class="form-group">
									 <label for="rfp">Request for Payment Due Date:</label>
									 <input type="date" name="ref_due_dt" class="form-control input-sm rfp-update" id="ref_due_dt">
								 </div>
								 


						<div class="form-group">
									<label>Color Selectivity :</label>
									<select name="color-select" id="color-select" class="form-control input-sm color-select-update">
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
    <input type="hidden" class="jobid">
    <div class="footer-modal" >
    <hr>
      <button type="submit" class="btn btn-danger update_jobfiles" >Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </div>

<script type="text/javascript">
//FOR COLOR SELECT DROPDOWN
	$('.colsel-update').change(function(){
  var status = $(this).val();
  var color = $('.colsel-update option:selected').attr('data-color');
    if(status==1){
    	$('.colsel-update').css({ 'color': 'red','background-color':'white' });
    }else{
     $('.colsel-update').css({'background-color': color,'color': 'white'});
  	}
 });

</script>



<script>

$(document).on('show.bs.modal','body',function(){
	$('.check_jobfiles-update').html('<span class="check_jobfiles-update"></span>');
});

$(document).on('keyup','.jobfiles-update',function(){
	var id = $('.monitoring_type_id').val(); 
	var num = $('.jobfiles-update').val();
    		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job/check_jobfiles_update');?>",
	 		       beforeSend:function(){
	 		       	$('.check_jobfiles-update').html('<span class="fa fa-spinner fa-spin" style="font-size:12px;"></span>Please Wait...');
	 		       },
			   	   data: {
			  	   			   jbid 		       :id,
			  	   	           jobfile   		   :num,
			  	   	           mon 				   :1
			  	   		 }
	              })
					.done(function(data) {
						$('.check_jobfiles-update').html(data);
	    		    });

});
</script>

<script>

function clearData(){

	  $('.jobfiles-update').val('');
	  $('.monitoring_type_id').val('');
	  
	   $(".broker-update").val('');

		 $(".shipper-update option").filter(function() {
								    return this.text == ''; 
		}).attr('selected', 'selected');

		 $(".consignee-update option").filter(function() {
								    return this.text == ''; 
		}).attr('selected', 'selected');

		 $(".colsel-update option").filter(function() {
								    return this.text == ''; 
		}).attr('selected', 'selected');

		  var status = $('.colsel-update').val();
		  var color = $('.colsel-update option:selected').attr('data-color');
		   if(status==1){
		    	$('.colsel-update').css({ 'color': 'red','background-color':'white' });
		    }else{
		     $('.colsel-update').css({'background-color': color,'color': 'white'});
		  	}


		  $('.hbl-update').val('');
		  $('.mbl-update').val('');
		  $('.mbl2-update').val('');
		  $('.bank-update').val('');
		  $('.registry-update').val('');

		  $('.dtRcvd-update').val('');
		  $('.dt_pickup_obl-update').val('');
		  $('.dt_pickup_docs-update').val('');

							     

			$('.purch_order_no_update').val('');
			$('.dt-req-update').val('');
			$('.rfp-update').val('');

			  $(".color-select-update option").filter(function() {
			    return this.text == ''; 
			}).attr('selected', 'selected');
	}

	$(document).ready(function(){



	 $(document).on('click','.btn-Update',function(){
			     var jobfileNo  = $(this).closest('tr').children('td:eq(2)').text();
					      $.ajax({	
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origin-update select").val(data);
							});

					  	 $.ajax({
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country_name');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origcity-update").val(data);
							});
							

							$.ajax({
								method: "POST",
								url : "<?php echo base_url('Job/get_jobcontent_manila');?>",
								beforeSend:function(){
									clearData();
									 dia =	$.dialog({
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

							     console.log(color_stages_id);

							     $('.jobfiles-update').val(jobfileNo);
							     $('.monitoring_type_id').val(JobFileId);
							     
							      $(".broker-update").val(broker);

							     $(".shipper-update option").filter(function() {
								    return this.text == ShipperName; 
								}).attr('selected', 'selected');

							     $(".consignee-update option").filter(function() {
								    return this.text == ConsigneeName; 
								}).attr('selected', 'selected');

							      $(".colsel-update option").filter(function() {
								    return this.text == color_stages; 
								}).attr('selected', 'selected');

							      var status = $('.colsel-update').val();
								  var color = $('.colsel-update option:selected').attr('data-color');
								    if(status==1){
								    	$('.colsel-update').css({ 'color': 'red','background-color':'white' });
								    }else{
								     $('.colsel-update').css({'background-color': color,'color': 'white'});
								  	}


							      $('.hbl-update').val(HouseBillLadingNo);
							      $('.mbl-update').val(MasterBillLadingNo);
							      $('.mbl2-update').val(MasterBillLadingNo2);
							      $('.bank-update').val(LetterCreditFromBank);
							      $('.registry-update').val(registry);

							      $('.dtRcvd-update').val(DateReceivedNoticeFromClients);
							      $('.dt_pickup_obl-update').val(date_rcvd_bl);
							      $('.dt_pickup_docs-update').val(date_rcvd_other_docs);

							     

							      $('.purch_order_no_update').val(PurchaseOrderNo);
							      $('.dt-req-update').val(date_req_budget);
							      $('.rfp-update').val(rfpduedate);

							      $(".color-select-update option").filter(function() {
								    return this.text == color_selectivity; 
								}).attr('selected', 'selected');
			     				dia.close();
			});

	 }); 



});


$(document).on('click','.update_jobfiles',function(){
 var jbfl 			=   $('.jobfiles-update').val();
 var jbid           =   $('.monitoring_type_id').val();
 var shipper        =   $('.shipper-update').val();
 var consignee 	    =   $('.consignee-update').val();
 var colsel         =   $('.colsel-update').val();
 var hbfl 			=   $('.hbl-update').val();
 var mbl            =   $('.mbl-update').val();
 var mbl2           =   $('.mbl2-update').val();
 var bank 	        =   $('.bank-update').val();
 var reg            =   $('.registry-update').val();
 var country 	    =   $('.country_update').val();
 var city 	    	=   $('.origcity-update').val();
 var dtRcvd_arr_client   =   $('.dtRcvd-update').val();
 var dtPckup_obl    =   $('.dt_pickup_obl-update').val();
 var dt_pickup_docs =   $('.dt_pickup_docs-update').val();
 var broker         =   $('.broker-update').val();
 var purch_order_no =   $('.purch_order_no_update').val();
 var dtReq_budge_gl =   $('.dt-req-update').val();
 var ref_due_dt     =   $('.rfp-update').val();
 var color_selectivity     =   $('.color-select-update').val();
   

/*   console.log('jbfl:'+jbfl+ " " + "montype:"+jbid);*/
 
/*alert(jbid);*/
	if($('.check_jobfiles-update').text().trim() == "Jobfile Already Exists"){
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
			  	   	           montype         :1,
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
	}
		 


 
 
 

 
});
</script>



