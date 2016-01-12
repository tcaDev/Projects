<div class="row">
	<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 		  	<label for="search_air">Search:</label>

				  		<input type="text" class="form-control input-sm" id="search_air" >		

			 		</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

						<!-- Update -->

					<!-- Trigger the modal with a button -->



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-3-1" role="dialog">

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

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-3-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-3-2" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					        <?php $this->load->view('jobfile-view/views_jobfile_air_addData'); ?>

					      

					    </div>

					  </div> 	

					</div>

				</div>

			 </div>

				



	 <div id="scroller" class="table-responsive job-manila" style= "overflow-y:auto; height :485px; width:100%;">
		    <table class="table table_manila table-bordered table-condensed order-tablejob" style="width:5000px;">
		        <thead>
		             <tr style="cursor:w-resize ;">

				          <th> No. </th>

				          <th> Update </th>

				          <th>Jobfile Number</th>

				          <th>Color Stages</th>

				          <th>Shipper</th>

				          <th>Consignee</th>

				          <th>No. Of Cartons</th>

				          <th>Description of Goods</th>

				          <th>Purchase Order No.</th>

				          <th>Letter of Credit No. from Bank</th>

				          <th>House Airway Bill </th>

				          <th>Master Bill of Airway</th>

				           <th>Origin</th>

				          <th>Flight No.</th>

				          <th>Forwarder</th>

				          <th>Warehouse</th>

				           <th>AirCraft No.</th>

				           <th>Estimated Time of Depatrure</th>

				           <th>Estimated Time of Arrival</th>

				           <th>Actual Time of Arrival</th>

				          <th>Date Recieved Arrival notice from Airline/Forwarder</th>

						  <th>Date Recieved Arrival Notice from Client</th>

				          <th>Date Pick-up O-Hawb</th>

				          <th>Date Pick-up Other Docs</th>

				          <th>Broker</th>

				          <th>Date Request Budget to GL</th>

				          <th>Reference Due Date</th>

				          <th>Color Selectivity</th>

				          <th>Status Reports</th>

				          <th>Running Charges</th>
				      </tr>

				      <tbody>

				      <?php $i= 0; 
				      		foreach ($air as $row) {
				      			$i++;

				      			$pick =$row->IsBackground;
				    			if($pick==0){
						        	$pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
						        }else{
						        	$pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
						        }
				      	?>
				      		<tr>
					         	  <td><?php echo stripslashes($i);?></td>
						          <td><button type="button" class="btn btn-Update-air btn-sm btn-default" data-toggle="modal" data-target="#myModal-3-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
						          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
						           <?php echo $pick1 ;?>
						          <td><?php echo stripslashes($row->ShipperName); ?></td>
						          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
						          <td><?php echo stripslashes($row->NoOfCartons); ?></td>
						          <td>
								  		<button type="button" class="btn btn-Goods-air btn-info view_goods-air" data-toggle="modal" data-target="#viewgoods-air"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
								  		<button type="button" class="btn btn-Add-Product-air btn-success" data-toggle="modal" data-target="#addProduct-air"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
								  </td>
								  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
								  <td><?php echo stripslashes($row->LetterCreditNoFromBank); ?></td>
								  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								  <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								  <td><?php echo stripslashes($row->ORIGIN); ?></td>
								  <td><?php echo stripslashes($row->FlightNo); ?></td>
								  <td><?php echo stripslashes($row->Forwarder); ?></td>
								  <td><?php echo stripslashes($row->Warehouse); ?></td>
								  <td><?php echo stripslashes($row->Aircraft); ?></td>
								  <td><?php echo stripslashes($row->ETD); ?></td>
								  <td><?php echo stripslashes($row->ETA); ?></td>
								  <td><?php echo stripslashes($row->ATA); ?></td>
								  <td><?php echo stripslashes($row->DateReceivedArrivalFromALine); ?></td>
								  <td><?php echo stripslashes($row->DateReceivedArrivalFromClient); ?></td>
								  <td><?php echo stripslashes($row->DatePickUpHawb); ?></td>
								  <td><?php echo stripslashes($row->DatePickUpOtherDocs); ?></td>
								  <td><?php echo stripslashes($row->Broker); ?></td>
								  <td><?php echo stripslashes($row->DateRequestBudgetToGL); ?></td>
								  <td><?php echo stripslashes($row->RFPDueDate); ?></td>
								  <td><?php echo stripslashes($row->ColorSelectivityName); ?></td>
								  <td>
						          		<button type="button" class="btn btn-StatusReport-air btn-info reports-air" data-toggle="modal" data-target="#statrepo-air"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
						          		<button type="button" class="btn btn-Add-Report-air btn-success" data-toggle="modal" data-target="#addReport-air"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
						          </td>
						          <td class="view_charges">
						          		<button type="button" class="btn btn-StatusReport btn-info runchar-air" data-toggle="modal" data-target="#runchar-air"><span class="fa fa-modx fa-fw"></span> View Running Charges</button>
						          </td>
						          <td class="get_me_id hidden"><?php echo stripslashes($row->JobFile_AirId); ?></td>
				      		</tr>

				      		<?php } ?>
				      </tbody>
				    
				  </table>

			  </div>

		  	</div>

		  </div>



<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods-air"  data-backdrop="static" data-keyboard="false"role="dialog">
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
				  <div class="modal fade" id="statrepo-air" data-backdrop="static" data-keyboard="false" role="dialog">
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



 <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-air" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/add_Product_air'); ?>
				      	
				    </div>
				 </div>

			 <!--Add Report when Adding New Container  -->
		
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-air" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/add_Report_air'); ?>
				      	
				    </div>
				 </div>




<script>
 $(document).on('click','.btn-Goods-air',function(){
   		$('.list_products').html('<div class="list_products"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });	

   $(document).on('click','.btn-StatusReport-air',function(){
   		$('.list_status').html('<div class="list_status"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });


  $('.view_goods-air').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		
  				$.ajax({
                    method: "POST",
                      url: "<?php echo base_url('Job/get_goods_air');?>",
                    data: { id:jobfileno,
                    		
                    }
                })
                .done(function(data) {
                    $('.list_products').html(data);
                });
        });


     /*View Reports*/
        $('.reports-air').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
	 		  $.ajax({
                            method: "POST",
                              url: "<?php echo base_url('Job/status_report_air');?>",
                            data: { id:jobfileno,
                            }
                        })
                        .done(function(data) {
                                $('.list_status').html(data);
                        });
        });

</script>