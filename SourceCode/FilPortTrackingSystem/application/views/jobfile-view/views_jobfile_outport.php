<div class="row">
		<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_outport">Search:</label>

					  	<input type="text" class="form-control input-sm" id="search_outport" onkeyup="search_outport(this.value)">	
					  	<input type="hidden" class="outport_total">
			 		</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

						<!-- Update -->

					<!-- Trigger the modal with a button -->
			  <!-- Modal -->

					   <div class="modal fade" id="myModal-2-1" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->


					      	<?php $this->load->view('jobfile-view/views_jobfile_outport_updateData'); ?>

					      
					    </div>

					  </div> 



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					<button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-2-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>

					  <!-- Modal -->

						   <div class="modal fade" id="myModal-2-2" role="dialog">

					    <div class="modal-dialog">

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_jobfile_outport_addData'); ?>				      

					    </div>

					  </div> 

					</div>

				</div>

			 </div>

				



			<div id="scroller" class="table-responsive job-outport" style= "overflow-y:auto; height :485px; width:100%;">

				    <table class="table  table-striped table-bordered table-hover table-condensed" style="width:5000px;">

				      <thead>

					  		<tr style="cursor:w-resize ;">

								          <th > No. </th>

								          <th > Update </th>
										 
								          <th >Jobfile Number</th>

								          <th >Color Stages</th>

								          <th> Shipper </th>
										   
										  <th >Consignee</th>

								          <th >Container No.</th>

								          <th >Description of Goods</th>

 										  <th >PI/PO No.</th>

 										   <th >House Bill of Lading No.</th>

								          <th >Master Bill of Lading No.</th>

								          <th >Master Bill of Lading No. 2</th>

								          <th >Letter of Credit No. from Bank</th> 

								          <th >Registry</th>

								          <th >Vessel/Voyage</th>

								          <th >Origin</th>  

								          <th class="hidden"> value date received Arrival notice</th>

								          <th >Date Received Arrival Notice from Client/s</th>

								          <th class="hidden"> value date pick up received 0-BL</th>

								          <th >Date Pick-up/Received O-BL</th>

								          <th class="hidden"> value date pick up other docs</th>
         								 
         								  <th >Date Pick-up/Received other Documents</th>
							   	
							   		      <th >Broker</th>

							   		      <th class="hidden"> value date req budget</th>

							   		      <th >Date Request Budget to GL</th>

							   		      <th class="hidden"> value ref due date</th>

										  <th >Reference Due Date</th>

										  <th>Color Selectivity</th>

								          <th >Status Reports</th>

								          <th >Running Charges</th>

								      </tr>
				   </thead>

				   <tbody>
									<?php $i= 0; foreach ($outport as $row) {
				        					$i++;

				        					$pick =$row->IsBackground;
							    			if($pick==0){
									        	$pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
									        }else{
									        	$pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
									        }

									        if($row->DateReceivedNoticeFromClients == "0000-00-00"){
								                $DateReceivedNoticeFromClients = $row->DateReceivedNoticeFromClients;
								             }else{
								                 $DateReceivedNoticeFromClients = strftime('%Y-%m-%d', strtotime($row->DateReceivedNoticeFromClients));
								             }

								             if($row->DateReceivedOfBL == "0000-00-00"){
								                $DateReceivedOfBL = $row->DateReceivedOfBL;
								             }else{
								                 $DateReceivedOfBL = strftime('%Y-%m-%d', strtotime($row->DateReceivedOfBL));
								             }

								             if($row->DateReceivedOfOtherDocs == "0000-00-00"){
								                $DateReceivedOfOtherDocs = $row->DateReceivedOfBL;
								             }else{
								                 $DateReceivedOfOtherDocs = strftime('%Y-%m-%d', strtotime($row->DateReceivedOfOtherDocs));
								             }

								              if($row->DateRequestBudgetToGL == "0000-00-00"){
								                $DateRequestBudgetToGL = $row->DateRequestBudgetToGL;
								             }else{
								                 $DateRequestBudgetToGL = strftime('%Y-%m-%d', strtotime($row->DateRequestBudgetToGL));
								             }

								              if($row->RFPDueDate == "0000-00-00"){
								                $RFPDueDate = $row->RFPDueDate;
								             }else{
								                 $RFPDueDate = strftime('%Y-%m-%d', strtotime($row->RFPDueDate));
								             }


				        				?>
				            <tr>
								         <!-- <td class="list_goods hidden"><?php// echo $row->ContainerByVesselId;?>   </td>
								         <td class="list_containers hidden "><?php //echo $row->VesselByJobFileId;?>   </td> -->
								          <td><?php echo stripslashes($i);?></td>
								          <td><button type="button" class="btn btn-Update-outport btn-sm btn-default" data-toggle="modal" data-target="#myModal-2-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
								          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								           <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td><?php echo stripslashes($row->ConsigneeName);?></td>
								          <td>
								          		<button type="button" class="btn btn-Container-outport btn-info view_containers-outport"  data-toggle="modal" data-target="#viewcontainers-outport"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          		<button type="button" class="btn btn-Add-Container-outport btn-success" data-toggle="modal" data-target="#addContainer-outport"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods-outport btn-info view_goods-outport" data-toggle="modal" data-target="#viewgoods-outport"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
										  		<button type="button" class="btn btn-Add-Product-outport btn-success" data-toggle="modal" data-target="#addProduct-outport"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
										  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
 										  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo2); ?></td>
										  <td><?php echo stripslashes($row->LetterCreditFromBank); ?></td>
 									      <td><?php echo stripslashes($row->Registry);?></td>
										  <td>
									  			<button type="button" class="btn btn-Vessel-outport btn-info view_vessels-outport" data-toggle="modal" data-target="#viewvessels-outport"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  			<button type="button" class="btn btn-Add-Vessel-outport btn-success" data-toggle="modal" data-target="#addVessel-outport"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
								           <td><?php echo stripslashes($row->Origin); ?></td>
								           	<td class="hidden"><?php echo stripcslashes($DateReceivedNoticeFromClients) ?></td>
								          <td><?php echo stripslashes($row->DateReceivedNoticeFromClients); ?></td>
								          	<td class="hidden"><?php echo stripcslashes($DateReceivedOfBL) ?></td>
								          <td><?php echo stripslashes($row->DateReceivedOfBL); ?></td>
								          	<td class="hidden"><?php echo stripcslashes($DateReceivedOfOtherDocs) ?></td>
								          <td><?php echo stripslashes($row->DateReceivedOfOtherDocs); ?></td>
 										  <td><?php echo stripslashes($row->Broker); ?></td>
 										  	<td class="hidden"><?php echo stripcslashes($DateRequestBudgetToGL) ?></td>
								          <td><?php echo stripslashes($row->DateRequestBudgetToGL); ?></td>
								           	<td class="hidden"><?php echo stripcslashes($RFPDueDate) ?></td>
								          <td><?php echo stripslashes($row->RFPDueDate); ?></td>
								          <td><?php echo stripslashes($row->ColorSelectivityName); ?></td>
								          <td>
								          		<button type="button" class="btn btn-StatusReport-outport btn-info reports-outport" data-toggle="modal" data-target="#statrepo-outport"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          		<button type="button" class="btn btn-Add-Report-outport btn-success" data-toggle="modal" data-target="#addReport-outport"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
								          <td class="view_charges"><button type="button" class="btn btn-StatusReport btn-info runchar-outport" data-toggle="modal" data-target="#runchar-outport"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
								        	<td class="get_me_id hidden"><?php echo stripslashes($row->JobFileId); ?></td>
								        </tr>

								        <?php } ?>
				        </tbody>
				  </table>

			  </div>

		  	</div>
		 </div>


<!--pop up for viewvessels start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewvessels-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px; ">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Vessels</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_vessels"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update_vessel hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

		<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods-outport"  data-backdrop="static" data-keyboard="false"role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Commodity</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_products"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update_product hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

				<!--pop up for Status Report -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="statrepo-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Status Report</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_status"> </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>	


		<!--pop up for containers start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewcontainers-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog" style="width: 65%;">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Containers</h4>
				        </div>
				        <div class="modal-body">
				        	<div style='overflow-x:auto;'>	
				            	<div class="list_conts"> </div>
				            </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_outport_update hidden">
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar-outport" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_charges"> </div>

				        </div>
				        <div class="footer-modal">
				        <hr>
				        	<button type="button" class="btn btn-danger update_charges-outport-qwerty">Update</button>

				        	<button type="button" class="btn btn-danger update_charges-outport" disabled>Save</button>

				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>
<script>
   //for update charges

$(document).ready(function(){


   $(document).on('click','.btn-Container-outport',function(){
   		$('.list_conts').html('<div class="list_conts"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Containers </div>');
   });
    $(document).on('click','.btn-Goods-outport',function(){
   		$('.list_products').html('<div class="list_products"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });
     $(document).on('click','.btn-Vessel-outport',function(){
   		$('.list_vessels').html('<div class="list_vessels"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Vessels </div>');
   });
      $(document).on('click','.btn-StatusReport-outport',function(){
   		$('.list_status').html('<div class="list_status"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });
       $(document).on('click','.runchar-outport',function(){
   		$('.list_charges').html('<div class="list_charges"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');
   });

var jbfl_outport;
	$(document).on('click','.runchar-outport',function(){
			var jobfile = $(this).closest('tr').children('td:eq(2)').text();
			jbfl_outport = jobfile;
	});

	$(document).on('click','.update_charges-outport-qwerty',function(){
			$('#runchar-outport .lodge_update').removeAttr('disabled');
			$('#runchar-outport .cont-deposit').removeAttr('disabled');
			$('#runchar-outport .thc-charges').removeAttr('disabled');
			$('#runchar-outport .arrastre').removeAttr('disabled');
			$('#runchar-outport .wharfage').removeAttr('disabled');
			$('#runchar-outport .weight').removeAttr('disabled');
			$('#runchar-outport .del').removeAttr('disabled');
			$('#runchar-outport .dispatch').removeAttr('disabled');
			$('#runchar-outport .storage').removeAttr('disabled');
			$('#runchar-outport .demurrage').removeAttr('disabled');
			$('#runchar-outport .detention').removeAttr('disabled');			
			$('#runchar-outport .EIC').removeAttr('disabled');
			$('#runchar-outport .bai-app').removeAttr('disabled');
			$('#runchar-outport .bai-inspect').removeAttr('disabled');
			$('#runchar-outport .sra-app').removeAttr('disabled');
			$('#runchar-outport .sra-inspect').removeAttr('disabled');
			$('#runchar-outport .bad-cargo').removeAttr('disabled');

			$('.update_charges-outport').removeAttr('disabled');
			$(this).attr('disabled','disabled');
	});

   $(document).on('click','.update_charges-outport',function(){
     var lodge        = $('#runchar-outport .lodge_update').val();
     var cont_deposit = $('#runchar-outport .cont-deposit').val();
     var thc_charges  = $('#runchar-outport .thc-charges').val();
     var arrastre     = $('#runchar-outport .arrastre').val();
     var wharfage     = $('#runchar-outport .wharfage').val();
     var weight       = $('#runchar-outport .weight').val();
     var del          = $('#runchar-outport .del').val();
     var dispatch     = $('#runchar-outport .dispatch').val();
     var storage      = $('#runchar-outport .storage').val();
     var demurrage    = $('#runchar-outport .demurrage').val();
     var detention    = $('#runchar-outport .detention').val();
     var eic 		  = $('#runchar-outport .EIC').val();
     var bai_app 	  = $('#runchar-outport .bai-app').val();
     var bai_inspect  = $('#runchar-outport .bai-inspect').val();
     var sra_app 	  = $('#runchar-outport .sra-app').val();
     var sra_inspect  = $('#runchar-outport .sra-inspect').val();
     var bad_cargo    = $('#runchar-outport .bad-cargo').val();

		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job/jobfile_add_charge');?>",
	 		       beforeSend: function() {
					 	  dia_running_charges =	$.dialog({
					 	  	    icon: 'fa fa-spinner fa-spin',
					 	  	    closeIcon: false,
				        		title: 'Please wait!',
				        		backgroundDismiss: false,
				        		content: 'Currently Updating Running Charges',
				   			});
 					  },
			  	   data: {
			  	   	           jbfl   		:jbfl_outport,
			  	   			   lodge        :lodge,
			                   cont_deposit :cont_deposit,   
			                   thc_charges  :thc_charges,
			                   wharfage     :wharfage,
			                   arrastre     :arrastre,
			                   weight	    :weight,
			                   del			:del,
			                   dispatch     :dispatch,
			                   storage      :storage,
			                   demurrage    :demurrage,
			                   detention    :detention,
			                   eic          :eic,
			                   bai_app      :bai_app,
			                   bai_inspect  :bai_inspect,
			                   sra_app      :sra_app,
			                   sra_inspect  :sra_inspect,
			                   bad_cargo    :bad_cargo

			  	   		 }
	              })
					.done(function(data) {
	  							 $.alert({
				        		title: 'Success!',
				        		content: 'Running Charges Updated!',
				        		confirm: function(){
									dia_running_charges.close();
				        	    }
				   			   });
	    		    })
  });
 $(document).on('change',' .checkDec',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var holders = inp.toString().split('.');
 		var n = inp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,00');
 			$('#runchar-outport #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar-outport #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar-outport #' + holder).val('0.00');
 		}
 	});
   });
  
   </script>
                        
                <!--Add Container Outport -->

                          <!-- Modal -->
                          <div class="modal fade" id="addContainer-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" >

                              <!-- Modal content-->
                                <?php $this->load->view('jobfile-view/add-outport-container/add_Container_outport'); ?>

                            </div>
                         </div>

                <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Product_outport'); ?>
				      	
				    </div>
				 </div>

				<!--Add Vessel when Adding New vessel  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addVessel-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Vessel_outport'); ?>
				      	
				    </div>
				 </div>

			 <!--Add Report when Adding New Container  -->
		
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-outport" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-outport-container/add_Report_outport'); ?>
				      	
				    </div>
				 </div>

<!-- Update Modals -->

			<!--Update Container  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateContainer-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Container_outport'); ?>
					      	
					    </div>
					 </div>

			<!--Update product  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateProduct-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Product_outport'); ?>
					      	
					    </div>
					 </div>

			<!--Update Vessel  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateVessel-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-outport-container/update_Vessel_outport'); ?>
					      	
					    </div>
					 </div>
      
<script>
	//for search
	function search_outport(jbfl){
       
    		 	$.ajax({
		           method: "GET",
	 		       url: "<?php echo base_url('search/get_jobfile_search');?>",
			  	   beforeSend: function() {
							$('.job-outport').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   			   montype  		   :2,
			  	   	           jobfile   		   :jbfl,
			  	   		 }
	              })
					.done(function(data) {
						$('.job-outport').html(data);
	  		    });
    }
   setInterval(refresh_table_outport, 3000);

function refresh_table_outport() {
	var manila = $('.manila_total').val();
 		 	$.ajax({
		           method: "GET",
	 		       url: link + "/Job_availability/check_content",
	 		       data:{total : manila,
	 		                     montype:2
	 		            }

	              })
					.done(function(data) {
						
							if(data!=1){
							
								$('.job-outport').html(data);
							}

	    		    })
}

</script>

    <script>
 /*Refresh Modal When Close*/  
    
    /*Add New Container Modal*/
	 var myBackup_container_outport = $('#addContainer-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addContainer-outport', function() {
        $('#addContainer-outport').modal('hide').remove();
        var myClone_container_outport = myBackup_container_outport.clone();
        $('body').append(myClone_container_outport);
    });

    /*Add New Container Modal*/
	 var myBackup_product_outport = $('#addProduct-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addProduct-outport', function() {
        $('#addProduct-outport').modal('hide').remove();
        var myClone_product_outport = myBackup_product_outport.clone();
        $('body').append(myClone_product_outport);
    });

   /*add New Report Modal*/
	 var myBackup_report_outport = $('#addReport-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addReport-outport',function() {
        $('#addReport-mnla-outport').modal('hide').remove();
        var myClone_report_outport = myBackup_report_outport.clone();
        $('body').append(myClone_report_outport);
    });

    var myBackup_vessel_outport = $('#addVessel-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addVessel-outport',function() {
        $('#addVessel-outport').modal('hide').remove();
        var myClone_vessel_outport = myBackup_vessel_outport.clone();
        $('body').append(myClone_vessel_outport);
    });


/*View Modal*/

        /*View Container */
         $('.view_containers-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 	/* alert(ids);*/
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_containers_outport');?>",
                                    data: { id:jobfileno,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_conts').html(data);
                                });
        });
        
        /*View Commodity */
         $('.view_goods-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		var button_update = "btn-update-product-outport";
 		var modal ="outport";
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_goods');?>",
                                    data: { id:jobfileno,
                                    		button_update:button_update,
                                    		href:modal,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_products').html(data);
                                });
        });
        
        
        /* View Vessel*/
        $('.view_vessels-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		var button_update = "btn-update-vessel-outport";
 		var modal ="outport";
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_vessels');?>",
                                    data: { id:jobfileno,
                                    		button_update:button_update,
                                    		href:modal,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_vessels').html(data);
                                });
        });
        
        /*View Charges*/
        $('.view_charges-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_charges');?>",
                                    data: { id:jobfileno,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_charges').html(data);
                                });
        });
        
        /*View Reports*/
        $('.reports-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
	 		  $.ajax({
                                        method: "POST",
                                          url: "<?php echo base_url('Job/status_report');?>",
                                        data: { id:jobfileno,
                                        }
                                    })
                                    .done(function(data) {
                                            $('.list_status').html(data);
                                    });
        });
        
/*Add Modal*/
        /*Add Container outport*/
        $(".btn-Add-Container-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		var modal_ID= "#addVessel-outport";


		$(".jobfile-addContainer-outport").val(jobfile_mnla) ;
		$(".jobfile-addVessel-outport").val(jobfile_mnla) ;


                    $.ajax({
                            method: "POST",
                              url: "<?php echo base_url('Job/get_vessel_container');?>",
                            data: { jobfile:jobfile_mnla,
                            		href:modal_ID
                            }
                    })
                    .done(function(data) {
                            $('.vessel-addContainer-outport-get').html(data);
                    });
	 });

      $(".btn-Add-Product-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		var modal_ID = "#addContainer-outport";
		var onclick = "click_vessel_outport";
		$(".jobfile-addProduct-outport").val(jobfile_mnla) ;
		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;

				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_container_product');?>",
				  		data: { jobfile:jobfile_mnla,
				  				href:modal_ID,
				  				onclick:onclick
				  		}
					})
			  		.done(function(data) {
				  				$('.container-addProduct-outport-get').html(data);
					});
 
 					//get only the record that is already record

 						var values = $.map($('.prodname-addProduct-outport option'), function(e) { return e.value; });
					// as a comma separated string
					/*$('#values').text("values are: " + values.join(','));*/
					var  products = values.join(',');
			    /*	$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job_availability/commodity_check');?>",
				  		data: { jbfl:jobfile_mnla,
				  			    products:products
				  		}
					})
			  		.done(function(data) {
				  				$('.get_my_products').html(data);
					});*/
	});

	$(".btn-Add-Vessel-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addVessel-outport").val(jobfile_mnla) ;
	});

	$(".btn-Add-Report-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addReport-outport").val(jobfile_mnla) ;
	});


/*Get Jobfile No for Updating Container*/
$(".btn-Container-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update").val(jobfile_mnla) ;
	});

/*Get Jobfile No for Updating Product*/
$(".btn-Goods-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update_product").val(jobfile_mnla) ;
});

/*Get Jobfile No for Updating Vessel*/
$(".btn-Vessel-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update_vessel").val(jobfile_mnla) ;
});
        

 $(document).ready(function(){
 	$(document).on('click','.btn-Update-outport',function(){


			     var jobfileNo  = $(this).closest('tr').children('td:eq(2)').text();
			      var jobfileID  = $(this).closest('tr').children('td:eq(30)').text();

			     /* alert(jobfileID);*/
					      $.ajax({	
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origin-update-outport select").val(data);
							});

							


			     var color_stages  = $(this).closest('tr').children('td:eq(3)').text();
			     var ShipperName    = $(this).closest('tr').children('td:eq(4)').text();

			     var ConsigneeName  = $(this).closest('tr').children('td:eq(5)').text();
			     var PurchaseOrderNo= $(this).closest('tr').children('td:eq(8)').text();
					
				 var HouseBillLadingNo      = $(this).closest('tr').children('td:eq(9)').text();
			     var MasterBillLadingNo     = $(this).closest('tr').children('td:eq(10)').text();
				 var MasterBillLadingNo2    = $(this).closest('tr').children('td:eq(11)').text();
			     var LetterCreditFromBank   = $(this).closest('tr').children('td:eq(12)').text();
		
			     var registry   = $(this).closest('tr').children('td:eq(13)').text();

			     var DateReceivedNoticeFromClients     = $(this).closest('tr').children('td:eq(16)').text();
			     var date_rcvd_bl     = $(this).closest('tr').children('td:eq(18)').text();
			     var date_rcvd_other_docs    = $(this).closest('tr').children('td:eq(20)').text();
			     var broker    = $(this).closest('tr').children('td:eq(22)').text();
			     var date_req_budget    = $(this).closest('tr').children('td:eq(23)').text();
			     var rfpduedate    = $(this).closest('tr').children('td:eq(25)').text();
			     var color_selectivity    = $(this).closest('tr').children('td:eq(27)').text();

			     $('.jobfiles-update-outport').val(jobfileNo);
			     $('.monitoring_type_id-outport').val(jobfileID);
			     

			     $(".shipper-update-outport option").filter(function() {
				    return this.text == ShipperName; 
				}).attr('selected', 'selected');

			     $(".consignee-update-outport option").filter(function() {
				    return this.text == ConsigneeName; 
				}).attr('selected', 'selected');

			      $(".colsel-update-outport option").filter(function() {
				    return this.text == color_stages; 
				}).attr('selected', 'selected');

			      $('.hbl-update-outport').val(HouseBillLadingNo);
			      $('.mbl-update-outport').val(MasterBillLadingNo);
			      $('.mbl2-update-outport').val(MasterBillLadingNo2);
			      $('.bank-update-outport').val(LetterCreditFromBank);
			      $('.registry-update-outport').val(registry);

			      $('.dtRcvd-update-outport').val(DateReceivedNoticeFromClients);
			      $('.dt_pickup_obl-update-outport').val(date_rcvd_bl);
			      $('.dt_pickup_docs-update-outport').val(date_rcvd_other_docs);

			      $(".broker-update-outport option").filter(function() {
				    return this.text == broker; 
				}).attr('selected', 'selected');

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
			     

			 }); 
 });
        
    </script>