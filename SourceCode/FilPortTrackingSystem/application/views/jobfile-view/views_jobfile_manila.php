
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
				    <table class="table table_manila table-bordered table-condensed order-tablejob" style="width:5000px;">
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

								          <th >Date Received Arrival Notice from Client/s</th>

								          <th >Date Pick-up/Received O-BL</th>
         								 
         								  <th >Date Pick-up/Received other Documents</th>
							   	
							   		      <th >Broker</th>

							   		      <th >Date Request Budget to GL</th>

										  <th >Reference Due Date</th>

										  <th>Color Selectivity</th>

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
									        	$pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
									        }

				        				?>
				            <tr>
								         <!-- <td class="list_goods hidden"><?php// echo $row->ContainerByVesselId;?>   </td>
								         <td class="list_containers hidden "><?php //echo $row->VesselByJobFileId;?>   </td> -->
								          <td><?php echo stripslashes($i);?></td>
								          <td><button type="button" class="btn btn-Update btn-sm btn-default" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
								          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								           <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
								          <td >
								          		<button type="button" class="btn btn-Container btn-info view_containers"  data-toggle="modal" data-target="#viewcontainers"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          		<button type="button" class="btn btn-Add-Container-mnla btn-success" data-toggle="modal" data-target="#addContainer-mnla"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods btn-info view_goods" data-toggle="modal" data-target="#viewgoods"><span class="fa fa-modx fa-fw"></span> View Good(s)</button>
										  		<button type="button" class="btn btn-Add-Product-mnla btn-success" data-toggle="modal" data-target="#addProduct-mnla"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
										  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
 										  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo2); ?></td>
										  <td><?php echo stripslashes($row->LetterCreditFromBank); ?></td>
 									      <td><?php echo stripslashes($row->Registry); ?></td>
										  <td>
									  			<button type="button" class="btn btn-Goods btn-info view_vessels" data-toggle="modal" data-target="#viewvessels"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  			<button type="button" class="btn btn-Add-Vessel-mnla btn-success" data-toggle="modal" data-target="#addVessel-mnla"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
								           <td><?php echo stripslashes($row->Origin); ?></td>
								          <td><?php echo stripslashes($row->DateReceivedNoticeFromClients); ?></td>
								          <td><?php echo stripslashes($row->DateReceivedOfBL); ?></td>
								          <td><?php echo stripslashes($row->DateReceivedOfOtherDocs); ?></td>
 										  <td><?php echo stripslashes($row->Broker); ?></td>
								          <td><?php echo stripslashes($row->DateRequestBudgetToGL); ?></td>
								          <td><?php echo stripslashes($row->RFPDueDate); ?></td>
								          <td><?php echo stripslashes($row->ColorSelectivityName); ?></td>
								          <td>
								          		<button type="button" class="btn btn-StatusReport btn-info reports" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          		<button type="button" class="btn btn-Add-Report-mnla btn-success" data-toggle="modal" data-target="#addReport-mnla"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
								          <td class="view_charges"><button type="button" class="btn btn-StatusReport btn-info runchar" data-toggle="modal" data-target="#runchar"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
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
				  <div class="modal fade" id="viewvessels" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Vessels</h4>
				        </div>
				        <div class="modal-body">
				            <div class="list_vessels"> </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
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
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>


			<!--Add Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addContainer-mnla" tabindex="-1" data-replace="true" style="display: none;">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Container_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Vessel when Adding New vessel  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addVessel-mnla" tabindex="-1" data-replace="true" style="display: none;">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Vessel_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-mnla" tabindex="-1" data-replace="true"  style="display: none;">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Product_manila'); ?>
				      	
				    </div>
				 </div>

				  <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-mnla" tabindex="-1" data-replace="true"  style="display: none;">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Report_manila'); ?>
				      	
				    </div>
				 </div>
				  
			

 


<script>
$(document).ready(function(){

/*Remove Data From Modal When Close*/

	/*add New Vessel Modal*/
	 var myBackup_vessel = $('#addVessel-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal', '.modal',function() {
        $('#addVessel-mnla').modal('hide').remove();
        var myClone_vessel = myBackup_vessel.clone();
        $('body').append(myClone_vessel);
    });

    /*add New Container Modal*/
	 var myBackup_container = $('#addContainer-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal', '.modal',function() {
        $('#addContainer-mnla').modal('hide').remove();
        var myClone_container = myBackup_container.clone();
        $('body').append(myClone_container);
    });

    /*add New Product Modal*/
	 var myBackup_product = $('#addProduct-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal', '.modal',function() {
        $('#addProduct-mnla').modal('hide').remove();
        var myClone_product = myBackup_product.clone();
        $('body').append(myClone_product);
    });


    $('[data-toggle="tooltip"]').tooltip();   


	//for getting the product goods
 $('.view_vessels').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 		
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_vessels');?>",
				  		data: { id:ids,
				  		}
					})
			  		.done(function(data) {
				  				$('.list_vessels').html(data);
					});
 });

 $('.view_charges').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 		
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_charges');?>",
				  		data: { id:ids,
				  		}
					})
			  		.done(function(data) {
				  				$('.list_charges').html(data);
					});
 })



 $('.view_goods').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 		
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
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 	/* alert(ids);*/
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



 $('.reports').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 	/* alert(ids);*/
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/status_report');?>",
				  		data: { id:ids,
				  		}
					})
			  		.done(function(data) {
				  				$('.list_status').html(data);
					});
 });





	$(".btn-Add-Container-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();

		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;

					$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_vessel_container');?>",
				  		data: { jobfile:jobfile_mnla,
				  		}
					})
			  		.done(function(data) {
				  				$('.vessel-addContainer-manila-get').html(data);
					});
	 });

	$(".btn-Add-Vessel-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addVessel-mnla").val(jobfile_mnla) ;
	});

	$(".btn-Add-Product-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();

		$(".jobfile-addProduct-mnla").val(jobfile_mnla) ;

				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_container_product');?>",
				  		data: { jobfile:jobfile_mnla,
				  		}
					})
			  		.done(function(data) {
				  				$('.container-addProduct-manila-get').html(data);
					});
	});

	$(".btn-Add-Report-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addReport-mnla").val(jobfile_mnla) ;
	});

});




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











