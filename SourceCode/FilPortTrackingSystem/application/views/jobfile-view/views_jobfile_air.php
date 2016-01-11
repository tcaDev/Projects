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

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-3-2" style="margin-right: 10px;">Add Data</button>



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

				          <th>Description of Goods</th>

				          <th>WK/PI/PO No.</th>

				          <th >Letter of Credit No. from Bank</th>

				          <th>House Airway Bill </th>

				          <th>Master Bill of Airway No.</th>

				           <th>Origin</th>

				          <th>Flight No.</th>

				          <th>Forwarder</th>

				          <th>Warehouse</th>

				          <th>Date Recieved Arrival notice from Airline/Forwarder</th>

						  <th>Date Recieved Arrival Notice from Client</th>

				          <th>Date Pick-up O-Hawb</th>

				          <th>Date Pick-up Other Docs</th>

				          <th>Broker</th>

				          <th>Date Request Budget to GL</th>

				          <th>Reference Due Date</th>

				          <th>Reference Entry No.</th>

				          <th>Color Selectivity</th>

				          <th>Date Paid (Date & Time)</th>

				          <th>Date Cleared BOC</th>

				          <th>Target Delivery Date</th>

				          <th>Actual P-Out Date of at NAIA</th>

				          <th>Actual Date Recieved Good at Warehouse</th>

				          <th>Haulers</th>

				          <th>Total Storage</th>

				          <th>Additional per Day Included VAT</th>

				          <th>Status Reports</th>

				          <th>Running Charges</th>
				      </tr>

				      <tbody>

				      <?php $i= 0; 
				      		foreach ($air as $row) {
				      			$i++;
				      	?>
				      		<tr>
					         	  <td><?php echo stripslashes($i);?></td>
						          <td><button type="button" class="btn btn-Update-air btn-sm btn-default" data-toggle="modal" data-target="#myModal-2-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
						          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
						           <?php echo $pick1 ;?>
						          <td><?php echo stripslashes($row->ShipperName); ?></td>
						          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
				      		</tr>

				      		<?php } ?>
				      </tbody>
				    
				  </table>

			  </div>

		  	</div>

		  </div>
