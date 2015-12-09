<div class="row">
		<div class="container-fluid"> 
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_manila">Search:</label>

						<input type="text" class="form-control input-sm" id="search_manila" >

			 		</div>	

				</div>



				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

					<!-- Update -->

					<!-- Trigger the modal with a button -->

					  



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-1" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_manila_update'); ?>

					      

					    </div>

					  </div>



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md" data-toggle="modal" data-target="#myModal-1-2" style="margin-right: 10px;">Add Data</button>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-2" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					    	<?php $this->load->view('jobfile-view/views_jobfile_manila_addData'); ?>


					    </div>

					  </div>

					</div>

				</div>

			 </div>
			
				

			  <div id="scroller" class="table-responsive job-manila" style= "overflow-y:auto; height :635px; width:100%;">
				    <table class="table table_manila table-striped table-bordered table-hover table-condensed" style="width:7000px;">
				        <thead>
				             <tr style="cursor:w-resize ;">
								        
								          <th > No. </th>
								          <th > Update </th>
								          <th >Jobfile Number</th>

								          <th >Shipper</th>

								          <th >Consignee</th>
								          <th >Number of Cartons</th>

								          <th >Container Size</th>

								          <th >Description of Goods</th>

								          <th >PI / PO No.</th>

								          <th >House Bill of Lading No.</th>

								          <th >Master Bill of Landing No.</th>

								          <th >Container No.</th>

								          <th >Origin</th>

								          <th >Estimated Time of Departure</th>

								          <th >Estimated Time of Arrival</th>

								          <th >Actual Time of Arrival</th>

								          <th >Letter of Credit No. from Bank</th>

								          <th >Start of Demorage</th>

								          <th >Start Storage</th>

								          <th >Registry</th>

								          <th >Vessel / Voyage no.</th>

								          <th >Carrier</th>

								          <th >Date Recieved Arrival Notice from Client/s</th>

								          <th >Date Pick-up / Recieved O-BL</th>

								          <th >Date Pick-up / Recieved other Documents</th>

								          <th >Broker</th>

								          <th >Date Required Budget to GL</th>

								          <th >Reference Due Date</th>

								          <th >Date sent Pre-Assess</th>

								          <th >Date File Entry to BOC</th>

								          <th >Date Sent Final Assess</th>

								          <th >Reference Entry No.</th>

								          <th >Color Selectivity</th>

								          <th >Date Paid (Date&Time)</th>

								          <th >Date Cleared BOC</th>

								          <th >Target Delivery Date</th>

								          <th >Plate No. / Truckers Name</th>

								          <th >Gate In at Port</th>

								          <th >Gate Out at Port</th>

								          <th >Actual Delivery WHSE</th>

								          <th >Status Reports</th>

								      </tr>
				        </thead>
				        <tbody>
				        				<?php $i= 0; foreach ($manila as $row) {
				        					$i++;
				        				?>
				            <tr>
								         
								          <td><?php echo $i;?></td>
								          <td><button type="button" class="btn btn-Update" data-toggle="modal" data-target="#myModal-1-1"><span class="glyphicon glyphicon-edit"></span></button></td>

								          <td><?php echo $row->JobFileId; ?><a data-toggle="modal" data-target="#jobfiles" href="#" class="pull-right"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a></td>

								          <td><?php echo $row->ShipperName; ?></td>

								          <td><?php echo $row->ConsigneeName; ?></td>
								          <td><?php echo $row->NoOfCartons; ?></td>

								          <td><?php echo $row->ContainerSize; ?></td>

								          <td><button type="button" class="btn btn-Goods" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-eye fa-fw"></span> View All Goods</button></td>

								          <td><?php echo $row->PurchaseOrderNo; ?></td>

								          <td><?php echo $row->HouseBillLadingNo; ?></td>

								          <td><?php echo $row->MasterBillLadingNo; ?></td>

								          <td><button type="button" class="btn btn-Container" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-eye fa-fw"></span> View All Container No.</button></td>

								          <td><?php echo $row->Origin; ?></td>

								          <td><?php echo $row->EstDepartureTime; ?></td>

								          <td><?php echo $row->EstArrivalTime; ?></td>

								          <td><?php echo $row->ActualArrivalTime; ?></td>

								          <td><?php echo $row->LetterCreditFromBank; ?></td>

								          <td><?php echo $row->StartOfDemorage; ?></td>

								          <td><?php echo $row->StartOfStorage; ?></td>

								          <td><?php echo $row->Registry; ?></td>

								          <td><?php echo $row->VSL_NO; ?></td>
								          
								          <td><?php echo $row->CarrierName; ?></td>

								          <td><?php echo $row->DateReceivedNoticeFromClients; ?></td>

								          <td><?php echo $row->DateReceivedOfBL; ?></td>

								          <td><?php echo $row->DateReceivedOfOtherDocs; ?></td>

								          <td><?php echo $row->Broker; ?></td>

								          <td><?php echo $row->DateRequestBudgetToGL; ?></td>

								          <td><?php echo $row->RFPDueDate; ?></td>

								          <td><?php echo $row->DateSentPreAssessment; ?></td>

								          <td><?php echo $row->DateFileEntryToBOC; ?></td>

								          <td><?php echo $row->DateSentFinalAssessment; ?></td>

								          <td><?php echo $row->RefEntryNo; ?></td>

								          <td><?php echo $row->StatusName; ?></td>

								          <td><?php echo $row->DatePaid; ?></td>

								          <td><?php echo $row->DateBOCCleared; ?></td>

								          <td><?php echo $row->TargetDeliveryDate; ?></td>

								          <td><?php echo $row->PlateNo_Trucker; ?></td>

								          <td><?php echo $row->GateInAtPort; ?></td>

								          <td><?php echo $row->GateOutAtPort; ?></td>

								          <td><?php echo $row->ActualDeliveryAtWarehouse; ?></td>

								          <td><button type="button" class="btn btn-StatusReport" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-eye fa-fw"></span> View All Status Report</button></td>
								      
								        </tr>

								        <?php } ?>
				           
				         
				        </tbody>
				    </table>

			  </div> 
			 
		  	</div>
		</div>

<script>

	$(function() {

	    var pressed = false;
	    var start = undefined;
	    var startX, startWidth;

	    $("table th").mousedown(function(e) {
	        start = $(this);
	        pressed = true;
	        startX = e.pageX;
	        startWidth = $(this).width();
	        $(start).addClass("resizing");
	    });
	    $(document).mousemove(function(e) {
	        if(pressed) {
	            $(start).width(startWidth+(e.pageX-startX));
	        }

	    });

	    $(document).mouseup(function() {
	        if(pressed) {
	            $(start).removeClass("resizing");
	            pressed = false;
	        }
	    });

	});


/*
*
*Table
*/
// $('#scroller table').each(function(){
//     var table = $(this),
//         fixedCol = table.clone(true),
//         fixedWidth = table.find('th').eq(0).width(),
//         tablePos = table.position();
    
//     // Remove all but the first column from the cloned table
//     fixedCol.find('th').not(':eq(0),:eq(1)').remove();
//     fixedCol.find('tbody tr').each(function(){
//         $(this).find('td').not(':eq(0),:eq(1)').remove();
//     });
    
//     // Set positioning so that cloned table overlays
//     // first column of original table
//     fixedCol.addClass('fixedCol');
//     fixedCol.css({
//         left: tablePos.left,
//         top: tablePos.top
//     });
   
//     // Match column width with that of original table
//     fixedCol.find('th,td').css('width',fixedWidth+'px');
    
//     $('#scroller').append(fixedCol);
// });
/*
*
*end Table
*/


	

	$(document).ready(function(){

		$("th").css("vertical-align","middle");


	 $('.update_jobfile').click(function(){

			     var jobfile_id   = $(this).closest('tr').children('td:eq(0)').text();
			     var jobfile_num  = $(this).closest('tr').children('td:eq(3)').text();
			     var jobfile_shipper  = $(this).closest('tr').children('td:eq(4)').text();



			      $('#jobfile_id').val(jobfile_id);
			      $('#jbfl').val(jobfile_num);
			      $('#shipper').val(jobfile_shipper);
			 }); 
});






$('#select').change(function(){
  if($(this).val() == 'A'){ 
    $("select").css('background-color', 'white');
  }
    if($(this).val() == 'B'){
    $("select").css('background-color', 'red');
  }
    if($(this).val() == 'C'){
    $("select").css('background-color', 'yellow');
  }
    if($(this).val() == 'D'){
    $("select").css('background-color', 'green');
  }

  if($(this).val() == 'E'){
    $("select").css('background-color', 'pink');
  }
});

</script>


<!---JOBFILE MODALSSS-->

<div class="modal fade" id="jobfiles" role="dialog">
    <div class="modal-dialog">		      
		<?php $this->load->view('jobfile-view/views_jobfiledata_manila'); ?>
    </div>
  </div>
