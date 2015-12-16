
<div class="row">
		<div class="container-fluid"> 
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_manila">Search:</label>

						<input type="search" class="form-control input-sm light-table-filter" data-table="order-tablejob" id="search_manila" >

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

					      <?php $this->load->view('jobfile-view/views_jobfile_manila_updateData'); ?>

					      

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
				    <table class="table table_manila table-bordered table-condensed order-tablejob" style="width:7000px;">
				        <thead>
				             <tr style="cursor:w-resize ;">
								          

								          <th > No. </th>

								          <th > Update </th>

								          <th >Jobfile Number</th>

								          <th >Color Stages</th>

								          <th >Shipper</th>

								          <th >Consignee</th>

								          <th >Description of Goods</th>

								          <th >PI / PO No.</th>

								          <th >House Bill of Lading No.</th>

								          <th >Master Bill of Lading No.</th>

								          <th >Container No.</th>

								          <th >Letter of Credit No. from Bank</th>

								          <th >Registry</th>

								          <th >Vessel / Voyage no.</th>

								          <th >Date Received Arrival Notice from Client/s</th>

								          <th >Date Pick-up / Recieved O-BL</th>

								          <th >Date Pick-up / Recieved other Documents</th>

								          <th >Broker</th>

								          <th >Date Request Budget to GL</th>

								          <th >Reference Due Date</th>

								          <th >Date Sent Pre-Assess</th>

								          <th >Date File Entry to BOC</th>

								          <th >Date Sent Final Assess</th>

								          <th >Reference Entry No.</th>

								          <th>Color Selectivity</th>

								          <th >Date Paid (Date&Time)</th>

								          <th >Status Reports</th>

								          <th >Running Charges</th>

								      </tr>
				        </thead>
				        <tbody>
				        				<?php $i= 0; foreach ($manila as $row) {
				        					$i++;

				        					$pick =$row->IsBackground;
							    			if($pick==0){
									        	$pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
									        }else{
									        	$pick1 ='<td style="background-color:'.$row->ColorCode.'; color: white;">'.$row->StatusName.'</td>';
									        }

				        				?>
				            <tr>
								         <td class="list_goods hidden"><?php echo $row->ContainerByVesselId;?>   </td>
								         <td class="list_containers hidden "><?php echo $row->VesselByJobFileId;?>   </td>
								          <td><?php echo $i;?></td>
								          <td><button type="button" class="btn btn-Update btn-sm btn-default" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>

								          <td><?php echo $row->JobFileId; ?><button  type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>

								          <?php echo $pick1 ;?>

								          <td><?php echo $row->ShipperName; ?></td>

								          <td><?php echo $row->ConsigneeName; ?></td>

								          <td class="view_goods"><button type="button" class="btn btn-Goods btn-info" data-toggle="modal" data-target="#viewgoods"><span class="fa fa-modx fa-fw"></span> View Goods</button></td>

								          <td><?php echo $row->PurchaseOrderNo; ?></td>

								          <td><?php echo $row->HouseBillLadingNo; ?></td>

								          <td><?php echo $row->MasterBillLadingNo; ?></td>

								          <td class="view_containers"><button type="button" class="btn btn-Container btn-info" data-toggle="modal" data-target="#viewcontainers"><span class="fa fa-modx fa-fw"></span> View Container No.</button></td>

								          <td><?php echo $row->LetterCreditFromBank; ?></td>

								          <td><?php echo $row->Registry; ?></td>

								          <td><?php echo $row->VSL_NO; ?></td>
								        
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

								          <td>Color Selectivity</td>

								          <td><?php echo $row->DatePaid; ?></td>

								          <td><button type="button" class="btn btn-StatusReport btn-info" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button></td>
								          <td><button type="button" class="btn btn-StatusReport btn-info" data-toggle="modal" data-target="#runchar"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
								      
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
				  <div class="modal fade" id="viewgoods" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Products</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_products"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

				<!--pop up for Status Report -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="statrepo" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Status Report</h4>
				        </div>
				        <div class="modal-body">
				            <div class=""> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>	


		<!--pop up for containers start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewcontainers" role="dialog">
				    <div class="modal-dialog" style="width: 65%;">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Containers</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_conts"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				        </div>
				        <div class="modal-body">
				            <div class=""> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>

 


<script>
$(document).ready(function(){



	//for getting the product goods
 $('.view_goods').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(0)').text();
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_goods');?>",
				  		data: { id:ids,
				  		}
					})
			  		.done(function(data) {
				  				$('.list_products').html(data);
					});
 });


  $('.view_containers').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(1)').text();
 	
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_containers');?>",
				  		data: { id:ids,
				  		}
					})
			  		.done(function(data) {
				  				$('.list_conts').html(data);
					});
 });


});

</script>


<script>
//for getting the  data in update
  
  




</script>









		<!--end -->

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


	 $('.btn-Update').click(function(){
			     var jobfileid      = $(this).closest('tr').children('td:eq(4)').text();
			     var ShipperName    = $(this).closest('tr').children('td:eq(5)').text();
			     var ConsigneeName  = $(this).closest('tr').children('td:eq(6)').text();
			     var NoOfCartons    = $(this).closest('tr').children('td:eq(7)').text();
   				 var ContainerSize  = $(this).closest('tr').children('td:eq(8)').text();
			     var PurchaseOrderNo= $(this).closest('tr').children('td:eq(10)').text();
					
				 var HouseBillLadingNo      = $(this).closest('tr').children('td:eq(11)').text();
			     var MasterBillLadingNo     = $(this).closest('tr').children('td:eq(12)').text();
			     var Origin                 = $(this).closest('tr').children('td:eq(14)').text();
				
			     var EstDepartureTime      = $(this).closest('tr').children('td:eq(15)').text();
			     var EstArrivalTime        = $(this).closest('tr').children('td:eq(16)').text();
			     var ActualArrivalTime     = $(this).closest('tr').children('td:eq(17)').text();
	
			     var LetterCreditFromBank   = $(this).closest('tr').children('td:eq(18)').text();
			     var StartOfDemorage        = $(this).closest('tr').children('td:eq(19)').text();
			     var StartOfStorage         = $(this).closest('tr').children('td:eq(20)').text();
				
			     var Registry      = $(this).closest('tr').children('td:eq(21)').text();
			     var VSL_NO        = $(this).closest('tr').children('td:eq(22)').text();
			     var DateReceivedNoticeFromClients     = $(this).closest('tr').children('td:eq(23)').text();
		

			     DateReceivedOfBL  		  = $(this).closest('tr').children('td:eq(24)').text();
			     DateReceivedOfOtherDocs  = $(this).closest('tr').children('td:eq(25)').text();
			     Broker  				  = $(this).closest('tr').children('td:eq(26)').text();
			     DateRequestBudgetToGL    = $(this).closest('tr').children('td:eq(27)').text();
			     RFPDueDate 			  = $(this).closest('tr').children('td:eq(28)').text();
			     DateSentPreAssessment    = $(this).closest('tr').children('td:eq(29)').text();
			     DateFileEntryToBOC       = $(this).closest('tr').children('td:eq(30)').text();
			     DateSentFinalAssessment  = $(this).closest('tr').children('td:eq(31)').text();
			     RefEntryNo 			  = $(this).closest('tr').children('td:eq(32)').text();

			      $('#jbfl').val(jobfileid);
			    /*  $('#shipper').val(ShipperName);
			      $('#consignee').val(ConsigneeName);
			      $('#jbfl').val(NoOfCartons);*/
			       /*$('#pipo').val(jobfileid);*/  //wala one to many ata to
			       $('#mbl').val(MasterBillLadingNo);
			       


			      

			     
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
