<div class="row">
		<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_outport">Search:</label>

					  	<input type="text" class="form-control input-sm" id="search_outport" >	

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

					      <div class="modal-content">

					        <div class="modal-header">

					          <button type="button" class="close" data-dismiss="modal">&times;</button>

					          <h4 class="modal-title">Modal Header</h4>

					        </div>

					        <div class="modal-body">

					          <p>Some text in the modal.</p>

					        </div>

					        <div class="modal-footer">

					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

					        </div>

					      </div>

					      

					    </div>

					  </div> 



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					<button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-2-2" style="margin-right: 10px;">Add Data</button>

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

				



			<div id="scroller" class="table-responsive job-manila" style= "overflow-y:auto; height :485px; width:100%;">

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
								          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
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
 									      <td><?php echo stripslashes($row->Registry); ?></td>
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
				          <input type="text" class="jobfile_mnila_update_vessel hidden">
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
				          <input type="text" class="jobfile_mnila_update_product hidden">
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
				          <input type="text" class="jobfile_mnila_update hidden">
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
				        	<button type="button " class="btn btn-danger ">Save</button>
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>
                        
                <!--Add Container Outport -->

                          <!-- Modal -->
                          <div class="modal fade" id="addContainer-outport" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog" >

                              <!-- Modal content-->
                                <?php $this->load->view('jobfile-view/add-outport-container/add_Container_outport'); ?>

                            </div>
                         </div>
                        
    <script>
    /*Refresh Modal When Close*/  
    
    /*Add New Container Modal*/
	 var myBackup_container = $('#addContainer-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addContainer-outport', function() {
        $('#addContainer-outport').modal('hide').remove();
        var myClone_container = myBackup_container.clone();
        $('body').append(myClone_container);
    });
        
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
         $('.view_goods-ouport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_goods');?>",
                                    data: { id:jobfileno,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_products').html(data);
                                });
        });
        
        
        /* View Vessel*/
        $('.view_vessels-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_vessels');?>",
                                    data: { id:jobfileno,
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
        
        /*Add Container outport*/
        $(".btn-Add-Container-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();

		$(".jobfile-addContainer-outport").val(jobfile_mnla) ;

                    $.ajax({
                            method: "POST",
                              url: "<?php echo base_url('Job/get_vessel_container');?>",
                            data: { jobfile:jobfile_mnla,
                            }
                    })
                    .done(function(data) {
                            $('.vessel-addContainer-outport-get').html(data);
                    });
	 });
        
        
    </script>