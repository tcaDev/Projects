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

				    <table class="table  table-striped table-bordered table-hover" style="width:7000px;">

				      <thead>

				        <tr style="cursor:w-resize">

				          <th class="hidden"> ID </th>
				          
				          <th> No. </th>

				          <th > Update </th>

				          <th>Jobfile Number</th>

				          <th>Shipper</th>

				          <th>Consignee</th>

				          <th>Number of Cartons</th>

				          <th>Container Size</th>

				          <th>Description of Goods</th>

				          <th>PI / PO No.</th>

				          <th>House Bill of Lading No.</th>

				          <th>Master Bill of Landing No.</th>

				          <th>Container No.</th>

				          <th>Origin</th>

				          <th>Estimated Time of Departure</th>

				          <th>Estimated Time of Arrival</th>

				          <th>Actual Time of Arrival</th>

				          <th>Letter of Credit No. from Bank</th>

				          <th>Start of Demorage</th>

				          <th>Start Storage</th>

				          <th>Registry</th>

				          <th>Vessel / Voyage no.</th>

				          <th>Carrier</th>

				          <th>Date Recieved Arrival Notice from Client/s</th>

				          <th>Date Pick-up / Recieved O-BL</th>

				          <th>Date Pick-up / Recieved other Documents</th>

				          <th>Broker</th>

				          <th>Date Required Budget to GL</th>

				          <th>Reference Due Date</th>

				          <th>Date sent Pre-Assess</th>

				          <th>Date File Entry to BOC</th>

				          <th>Date Sent Final Assess</th>

				          <th>Reference Entry No.</th>

				          <th>Selectivity</th>

				          <th>Date Paid (Date&Time)</th>

				          <th>Date Cleared BOC</th>

				          <th>Target Delivery Date</th>

				          <th>Plate No. / Truckers Name</th>

				          <th>Gate In at Port</th>

				          <th>Gate Out at Port</th>

				          <th style="text-align:center !important">Actual Delivery WHSE</th>

				          <th style="text-align:center !important">Status Reports</th>

				      </thead>

				    <tbody>

				     <tr>

				     	 <td class="hidden">1</td>
								          <td>1</td>
								          <td><button type="button" class="btn update_jobfile" data-toggle="modal" data-target="#myModal-1-1"><span class="glyphicon glyphicon-edit"></span></button></td>

								          <td>SOC-15-10-009<a data-toggle="modal" data-target="#jobfiles" href="#"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a></td>

								          <td>MOTOROLA</td>

								          <td>Open Comm</td>
								          <td>11 PKGS</td>

								          <td>1x20</td>

								          <td>Tablet Computer</td>

								          <td>61406573556</td>

								          <td>HKG158121912</td>

								          <td>N/A</td>

								          <td>FCIU5273883</td>

								          <td>HONGKONG</td>

								          <td>9/15/2015 11:00AM</td>

								          <td>9/27/2015 11:00AM</td>

								          <td>9/27/2015 11:00AM</td>

								          <td>10/27/2015 11:00AM</td>

								          <td>TT</td>

								          <td>11/3/2015</td>

								          <td>10/31/2015</td>

								          <td>TSL0065-15</td>

								          <td>ISTRIAN EXPRESS V.15015S</td>

								          <td>CEVA/BENLINE</td>

								          <td>10/27/2015</td>

								          <td>10/27/2015</td>

								          <td>10/27/2015</td>

								          <td>MONA</td>

								          <td>10/27/2015</td>

								          <td>0.37037037037037</td>

								          <td>11/6/2015</td>

								          <td>10/27/2015</td>

								          <td>C254093</td>

								          <td><select class="form-control" id="select">
								          	 <option value="" disabled selected>Select your option</option>
											<option value="B" style="background-color: red;">Red</option>
											<option value="C" style="background-color: yellow;">Yellow</option>
											<option value="D" style="background-color: green;">Green</option>
											<option value="E" style="background-color: pink;">pink</option>
								          </select></td>

								          <td>11/9/2015  1300H </td>

								          <td>11/9/2015</td>

								          <td>11/10/2015</td>

								          <td>Mardean Jaems/ ALA7300</td>

								          <td>11/10 5:30am</td>

								          <td>11/10 6:20am</td>

								          <td>11/10 1230h abd</td>

								          <td>10/27- receive original docs   11/3- start processing of lifting,  11/6 - lifting of abandonement</td>
								      
								        </tr>

				    </tbody>

				  </table>

			  </div>

		  	</div>
		 </div>