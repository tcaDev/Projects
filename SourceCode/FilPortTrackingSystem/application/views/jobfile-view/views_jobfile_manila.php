
<div class="row">
		<div class="container-fluid"> 
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px; margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 			<label for="search_manila">Search:</label>

						<input type="search" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" class="form-control input-sm light-table-filter"  id="search_manila"  ><!-- onkeyup="search_manila(this.value)"
 -->
						<input type="hidden" class="manila_total" value="<?php echo $count_total_manila;?>">
						<input type="hidden" class="manila_total_new">
				
			
			 		</div>	

				</div>



				<div class="col-lg-6 col-md-6 col-sm-6 pull-right" style="padding: 20px;">

					<div class="row">

					<!-- Update -->

					<!-- Trigger the modal with a button -->


					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-1" data-backdrop="static" data-keyboard="false" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->

					      <?php $this->load->view('jobfile-view/views_jobfile_manila_updateData'); ?>

					      

					    </div>

					  </div>



					  <!-- Add -->

					<!-- Trigger the modal with a button -->

					  <button type="button" class="col-lg-4 col-md-4 col-sm-4 pull-right btn btn-primary btn-md btn-AddData-mnila" data-toggle="modal" href="#myModal-1-2" style="margin-right: 10px;"><span class="fa fa-plus fa-fw"></span> Add Data</button>



					  <!-- Modal -->

					  <div class="modal fade" id="myModal-1-2" data-backdrop="static" data-keyboard="false" role="dialog">

					    <div class="modal-dialog">

					    

					      <!-- Modal content-->
					      
					    	<?php $this->load->view('jobfile-view/views_jobfile_manila_addData'); ?>


					    </div>

					  </div>

					</div>

				</div>

			 </div>
			
				

			  <div id="scroller" class="table-responsive " style= "overflow-y:auto; height :485px; width:100%;">
				    <table class="table table_manila table-bordered table-condensed order-tablejob " style="width:5000px;">
				        <thead>
				             <tr style="cursor:w-resize ;">
								          <th > No. </th>

								          <th > Update </th>
										 
								          <th >Jobfile Number</th>

								          <th >Color Stages</th>

								          <th> Shipper </th>
										   
										  <th >Consignee</th>

										   <th >Vessel/Voyage</th>

								          <th >Container No.</th>

								          <th >Description of Goods</th>

 										  <th >PI/PO No.</th>

 										   <th >House Bill of Lading No.</th>

								          <th >Master Bill of Lading No.</th>

								          <th >Master Bill of Lading No. 2</th>

								          <th >Letter of Credit No. from Bank</th> 

								          <th >Registry</th>

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
				        				<?php $i= 0; foreach ($manila as $row) {
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
								          <td><button type="button" class="btn btn-Update btn-sm btn-default" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
								          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								           <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
								          <td>
									  			<button type="button" class="btn btn-Vessel btn-info view_vessels" data-toggle="modal" data-target="#viewvessels"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  			<button type="button" class="btn btn-Add-Vessel-mnla btn-success" data-toggle="modal" data-target="#addVessel-mnla"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
								          <td>
								          		<button type="button" class="btn btn-Container btn-info view_containers"  data-toggle="modal" data-target="#viewcontainers"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          		<button type="button" class="btn btn-Add-Container-mnla btn-success" data-toggle="modal" href="#addContainer-mnla"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods btn-info view_goods" data-toggle="modal" data-target="#viewgoods"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
										  		<button type="button" class="btn btn-Add-Product-mnla btn-success" data-toggle="modal" data-target="#addProduct-mnla"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
										  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
 										  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo2); ?></td>
										  <td><?php echo stripslashes($row->LetterCreditFromBank); ?></td>
 									      <td><?php echo stripslashes($row->Registry); ?></td>
										 
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
								          		<button type="button" class="btn btn-StatusReport btn-info reports" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          		<button type="button" class="btn btn-Add-Report-mnla btn-success" data-toggle="modal" data-target="#addReport-mnla"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
								          <td class="view_charges"><button type="button" class="btn btn-StatusReport btn-info runchar" data-toggle="modal" data-target="#runchar"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
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
				  <div class="modal fade" id="viewvessels" data-backdrop="static" data-keyboard="false" role="dialog">
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
				  <div class="modal fade" id="viewgoods"  data-backdrop="static" data-keyboard="false"role="dialog">
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
				  <div class="modal fade" id="statrepo" data-backdrop="static" data-keyboard="false" role="dialog">
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
				  <div class="modal fade" id="viewcontainers" data-backdrop="static" data-keyboard="false" role="dialog">
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
				  <div class="modal fade" id="runchar" data-backdrop="static" data-keyboard="false" role="dialog">
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
				       	 <button type="button" class="btn btn-danger qwerty">Update</button>
				        	<button type="button" class="btn btn-danger asd update-charges-mnila" disabled>Save</button>
				          <button type="button" class="btn btn-danger btn-close-mnila" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>
   <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
   <!-- numeral script won't work without net -->
   <script>
   //for update charges

   $(document).on('click','.btn-Container',function(){
   		$('.list_conts').html('<div class="list_conts"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Containers </div>');
   });
    $(document).on('click','.btn-Goods',function(){
   		$('.list_products').html('<div class="list_products"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });
     $(document).on('click','.btn-Vessel',function(){
   		$('.list_vessels').html('<div class="list_vessels"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Vessels </div>');
   });
      $(document).on('click','.btn-StatusReport',function(){
   		$('.list_status').html('<div class="list_status"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });
       $(document).on('click','.runchar',function(){
   		$('.list_charges').html('<div class="list_charges"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');
   });

$(document).ready(function(){
var jbfl;
	$(document).on('click','.runchar',function(){
			var jobfile = $(this).closest('tr').children('td:eq(2)').text();
			jbfl = jobfile;
	});

	$(document).on('click','.btn-close-mnila',function(){
			$('.qwerty').removeAttr('disabled');
			$('.asd').attr('disabled','disabled');
	});

	//check  if num or not
              $(document).on('keypress','.checkDec',function (e) {
					  if(event.which < 46
					    || event.which > 59) {
					        event.preventDefault();
					    } // prevent if not number/dot

					    if(event.which == 46
					    && $(this).val().indexOf('.') != -1) {
					        event.preventDefault();
					    } // prevent if already dot

               });

	$(document).on('click','.qwerty',function(){

			$('#runchar .lodge_update').removeAttr('disabled');
			$('#runchar .cont-deposit').removeAttr('disabled');
			$('#runchar .thc-charges').removeAttr('disabled');
			$('#runchar .arrastre').removeAttr('disabled');
			$('#runchar .wharfage').removeAttr('disabled');
			$('#runchar .weight').removeAttr('disabled');
			$('#runchar .del').removeAttr('disabled');
			$('#runchar .dispatch').removeAttr('disabled');
			$('#runchar .storage').removeAttr('disabled');
			$('#runchar .demurrage').removeAttr('disabled');
			$('#runchar .detention').removeAttr('disabled');			
			$('#runchar .EIC').removeAttr('disabled');
			$('#runchar .bai-app').removeAttr('disabled');
			$('#runchar .bai-inspect').removeAttr('disabled');
			$('#runchar .sra-app').removeAttr('disabled');
			$('#runchar .sra-inspect').removeAttr('disabled');
			$('#runchar .bad-cargo').removeAttr('disabled');

			$('.asd').removeAttr('disabled');
			$(this).attr('disabled','disabled');
	});
   $(document).on('click','.asd',function(){

     var lodge        = $('#runchar .lodge_update').val().replace(/,/g,'');
     var cont_deposit = $('#runchar .cont-deposit').val().replace(/,/g,'');
     var thc_charges  = $('#runchar .thc-charges').val().replace(/,/g,'');
     var arrastre     = $('#runchar .arrastre').val().replace(/,/g,'');
     var wharfage     = $('#runchar .wharfage').val().replace(/,/g,'');
     var weight       = $('#runchar .weight').val().replace(/,/g,'');
     var del          = $('#runchar .del').val().replace(/,/g,'');
     var dispatch     = $('#runchar .dispatch').val().replace(/,/g,'');
     var storage      = $('#runchar .storage').val().replace(/,/g,'');
     var demurrage    = $('#runchar .demurrage').val().replace(/,/g,'');
     var detention    = $('#runchar .detention').val().replace(/,/g,'');
     var eic 		  = $('#runchar .EIC').val().replace(/,/g,'');
     var bai_app 	  = $('#runchar .bai-app').val().replace(/,/g,'');
     var bai_inspect  = $('#runchar .bai-inspect').val().replace(/,/g,'');
     var sra_app 	  = $('#runchar .sra-app').val().replace(/,/g,'');
     var sra_inspect  = $('#runchar .sra-inspect').val().replace(/,/g,'');
     var bad_cargo    = $('#runchar .bad-cargo').val().replace(/,/g,'');

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
			  	   	           jbfl   		:jbfl,
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
									$('.qwerty').removeAttr('disabled');
									$('.asd').attr('disabled','disabled');
				        			$('#runchar').modal('hide');
				        	    }
				   			   });
	    		    })

  });
 });
  $(document).on('change',' .checkDec',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var newInp = inp.replace(/,/g,'');
 		var holders = newInp.toString().split('.');
 		var n = newInp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,0.00');
 			$('#runchar #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar #' + holder).val('0.00');
 		}
 	});
  
   </script>

			<!--Add Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addContainer-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Container_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Vessel when Adding New vessel  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addVessel-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Vessel_manila'); ?>
				      	
				    </div>
				 </div>

				 <!--Add Product when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addProduct-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Product_manila'); ?>
				      	
				    </div>
				 </div>

				  <!--Add Report when Adding New Container  -->
			
				  <!-- Modal -->
				  <div class="modal fade" id="addReport-mnla" tabindex="-1" data-replace="true"  style="display: none;" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-manila-container/add_Report_manila'); ?>
				      	
				    </div>
				 </div>
				  
			
<!-- Update Modals -->

			<!--Update Container  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateContainer-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Container_manila'); ?>
					      	
					    </div>
					 </div>

			<!--Update product  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateProduct-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Product_manila'); ?>
					      	
					    </div>
					 </div>


			<!--Update Vessel  -->
					  <!-- Modal -->
					  <div class="modal fade" id="updateVessel-mnla" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
					    <div class="modal-dialog" >
					    
					      <!-- Modal content-->
					      	<?php $this->load->view('jobfile-view/add-manila-container/update_Vessel_manila'); ?>
					      	
					    </div>
					 </div>
 






<script>
	//for search
/*	function search_manila(jbfl){
       
    		 	$.ajax({
		           method: "GET",
	 		       url: "<?php echo base_url('search/get_jobfile_search');?>",
			  	   beforeSend: function() {
							$('.job-manila').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   			   montype  		   :1,
			  	   	           jobfile   		   :jbfl,
			  	   		 }
	              })
					.done(function(data) {
						$('.job-manila').html(data);
	  		    });
    }*/


</script>

<script>
$(document).ready(function(){

/*Refresh Modal When Close*/

	/*add New jobfile*/
	 var myBackup_jobfile = $('#myModal-1-2').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#myModal-1-2',function() {
        $('#myModal-1-2').modal('hide').remove();
        var myClone_jobfile = myBackup_jobfile.clone();
        $('body').append(myClone_jobfile);
        i=0;
    }); 



	/* Refresh Jobfile*/

/*	$('.btn-AddData-mnila').click(function(){

			$('#btn-jobfile-mnila-add').addClass('active');
			$('#btn-charges-mnla-add').removeClass('active');
			$('#btn-container-mnla-add').removeClass('active');
			$('#btn-truck-mnla-add').removeClass('active');
			$('#btn-vessel-mnla-add').removeClass('active');

			$('.pill-jobfile-mnla-add').removeClass('hidden');
			$('.pill-truck-mnla-add').addClass('hidden');
			$('.pill-charges-mnla-add').addClass('hidden');
			$('.pill-container-mnla-add').addClass('hidden');
			$('.pill-vessel-mnla-add').addClass('hidden');
			$('.test_data').addClass('hidden');

			$('.btn-Next').removeClass('hidden');

	});
*/



	/*add New Vessel Modal*/
	 var myBackup_vessel = $('#addVessel-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addVessel-mnla',function() {
        $('#addVessel-mnla').modal('hide').remove();
        var myClone_vessel = myBackup_vessel.clone();
        $('body').append(myClone_vessel);
    });

    /*add New Container Modal*/
	 var myBackup_container = $('#addContainer-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addContainer-mnla', function() {
        $('#addContainer-mnla').modal('hide').remove();
        var myClone_container = myBackup_container.clone();
        $('body').append(myClone_container);
    });

    /*add New Product Modal*/
	 var myBackup_product = $('#addProduct-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addProduct-mnla ',function() {
        $('#addProduct-mnla').modal('hide').remove();
        var myClone_product = myBackup_product.clone();
        $('body').append(myClone_product);
    });	

    /*add New Report Modal*/
	 var myBackup_report = $('#addReport-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addReport-mnla',function() {
        $('#addReport-mnla').modal('hide').remove();
        var myClone_report = myBackup_report.clone();
        $('body').append(myClone_report);
    });


/*Update Reset Data Modal*/

    /*Update Container*/
	 var myBackup_update_container = $('#updateContainer-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#updateContainer-mnla ',function() {
        $('#updateContainer-mnla').modal('hide').remove();
        var myClone_update_container = myBackup_update_container.clone();
        $('body').append(myClone_update_container);
    });	

    /*Update Product Modal*/
	 var myBackup_product_update = $('#updateProduct-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#updateProduct-mnla ',function() {
        $('#updateProduct-mnla').modal('hide').remove();
        var myClone_product_update = myBackup_product_update.clone();
        $('body').append(myClone_product_update);
    });	

     /*Update Vessel Modal*/
	 var myBackup_vessel_update = $('#updateVessel-mnla').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#updateVessel-mnla ',function() {
        $('#updateVessel-mnla').modal('hide').remove();
        var myClone_vessel_update = myBackup_vessel_update.clone();
        $('body').append(myClone_vessel_update);
    });	


    $('[data-toggle="tooltip"]').tooltip();   


	//for getting the product goods
 $('.view_vessels').click(function(){	
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 		var button_update = "btn-update-vessel";
 		var modal ="mnla";
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_vessels');?>",
				  		data: { id:ids,
				  				button_update:button_update,
                                 href:modal,
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
 			var button_update = "btn-update-product";
 			var modal = "mnla";
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_goods');?>",
				  		data: { id:ids,
				  				button_update:button_update,
				  				href:modal,
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



/*Get Jobfile No for Updating Container*/
$(".btn-Container").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_mnila_update").val(jobfile_mnla) ;
	});

/*Get Jobfile No for Updating Product*/
$(".btn-Goods").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_mnila_update_product").val(jobfile_mnla) ;
});

/*Get Jobfile No for Updating Vessel*/
$(".btn-Vessel").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_mnila_update_vessel").val(jobfile_mnla) ;
});




	$(".btn-Add-Container-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		var modal_ID= "#addVessel-mnla";
		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;
		$(".jobfile-addVessel-mnla").val(jobfile_mnla) ;

					$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_vessel_container');?>",
				  		data: { jobfile:jobfile_mnla,
				  				href:modal_ID
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
		var modal_ID= "#addContainer-mnla";
		var onclick = "click_vessel";
		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;
		$(".jobfile-addProduct-mnla").val(jobfile_mnla) ;

				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_container_product');?>",
				  		data: { jobfile:jobfile_mnla,
				  				href:modal_ID,
				  				onclick:onclick
				  		}
					})
			  		.done(function(data) {
				  				$('.container-addProduct-manila-get').html(data);
					});
 

 						//get only the record that is already record

 						var values = $.map($('.prodname-addProduct-mnila option'), function(e) { return e.value; });
					// as a comma separated string
					/*$('#values').text("values are: " + values.join(','));*/
					var  products = values.join(',');
/*			    	$.ajax({
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


	 $(document).on('click','.btn-Update',function(){


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
						  			$(".origin-update select").val(data);
							});

							


			     var color_stages  = $(this).closest('tr').children('td:eq(3)').text();
			     var ShipperName    = $(this).closest('tr').children('td:eq(4)').text();

			     var ConsigneeName  = $(this).closest('tr').children('td:eq(5)').text();
			     var PurchaseOrderNo= $(this).closest('tr').children('td:eq(9)').text();
					
				 var HouseBillLadingNo      = $(this).closest('tr').children('td:eq(10)').text();
			     var MasterBillLadingNo     = $(this).closest('tr').children('td:eq(11)').text();
				 var MasterBillLadingNo2    = $(this).closest('tr').children('td:eq(12)').text();
			     var LetterCreditFromBank   = $(this).closest('tr').children('td:eq(13)').text();
		
			     var registry   = $(this).closest('tr').children('td:eq(14)').text();

			     var DateReceivedNoticeFromClients     = $(this).closest('tr').children('td:eq(16)').text();
			     var date_rcvd_bl     = $(this).closest('tr').children('td:eq(18)').text();
			     var date_rcvd_other_docs    = $(this).closest('tr').children('td:eq(20)').text();
			     var broker    = $(this).closest('tr').children('td:eq(22)').text();
			     var date_req_budget    = $(this).closest('tr').children('td:eq(23)').text();
			     var rfpduedate    = $(this).closest('tr').children('td:eq(25)').text();
			     var color_selectivity    = $(this).closest('tr').children('td:eq(27)').text();


			     $('.jobfiles-update').val(jobfileNo);
			     $('.monitoring_type_id').val(jobfileID);
			     
			      $(".broker-update option").filter(function() {
				    return this.text == broker; 
				}).attr('selected', 'selected');

			     $(".shipper-update option").filter(function() {
				    return this.text == ShipperName; 
				}).attr('selected', 'selected');

			     $(".consignee-update option").filter(function() {
				    return this.text == ConsigneeName; 
				}).attr('selected', 'selected');

			      $(".colsel-update option").filter(function() {
				    return this.text == color_stages; 
				}).attr('selected', 'selected');

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

			      $.ajax({
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country_name');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origcity-update").val(data);
							});
			     

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


<style>

</style>










