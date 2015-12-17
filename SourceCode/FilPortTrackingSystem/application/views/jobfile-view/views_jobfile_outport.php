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

				



			<div id="scroller" class="table-responsive job-manila" style= "overflow-y:auto; height :635px; width:100%;">

				    <table class="table  table-striped table-bordered table-hover table-condensed" style="width:7000px;">

				      <thead>

					        <tr style="cursor:w-resize">

					          <th > No. </th>

					          <th > Update </th>

					          <th >Jobfile Number</th>

					          <th >Color Selectivity</th>

					          <th >Shipper</th>

					          <th >Consignee</th>

					          <th >Number of Cartons</th>

					          <th >Container Size</th>

					          <th >Description of Goods</th>

					          <th >PI / PO No.</th>

					          <th >House Bill of Lading No.</th>

					          <th >Master Bill of Lading No.</th>

					          <th >Container No.</th>

					          <th >Letter of Credit No. from Bank</th>

					          <th >Origin</th>

					          <th >Estimated Time of Departure</th>

					          <th >Estimated Time of Arrival</th>

					          <th >Actual Time of Arrival</th>

					          <th >Start of Demorage</th>

					          <th >Start Storage</th>

					          <th >Registry</th>

					          <th >Vessel / Voyage no.</th>

					          <th>Carrier</th>

					          <th >Date Recieved Arrival Notice from Client/s</th>

					          <th >Date Pick-up / Recieved O-BL</th>

					          <th >Date Pick-up / Recieved other Documents</th>

					          <th >Broker</th>

					          <th >Date Request Budget to GL</th>

					          <th >Reference Due Date</th>

					          <th >Date Sent Pre-Assess</th>

					          <th >Date File Entry to BOC</th>

					          <th >Date Sent Final Assess</th>

					          <th >Referrence Entry No.</th>

					          <th >Date Paid (Date&Time)</th>

					          <th >Date Cleared BOC</th>

					          <th >Target Delivery Date</th>

					          <th>Actual P-Out Date of Container</th>

					          <th >Actual Date Received Container to  Warehouse</th>

					          <th>Haulers</th>

					          <th >Status Reports</th>
					   </tr>
				   </thead>

				   <tbody>

				    
				            <tr>
								         
					          <td></td>

					          <td><button type="button" class="btn btn-Update btn-sm btn-default" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-pencil fa-lg"></span></button></td>

					          <td><button type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>

					          <td></td>
					          
					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td><button type="button" class="btn btn-Goods btn-info" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-modx fa-fw"></span> View Goods</button></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td><button type="button" class="btn btn-Container btn-info" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-modx fa-fw"></span> View Container No.</button></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>
					        
					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td>></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td></td>

					          <td><button type="button" class="btn btn-StatusReport btn-info" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-modx fa-fw"></span> View Status Report</button></td>
					      
					        </tr>

					  
				    </tbody>

				  </table>

			  </div>

		  	</div>
		 </div>