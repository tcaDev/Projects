<div class="row">
	<div class="container-fluid">
		  		 <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 10px;margin-bottom: -15px;">

			 	<div class="form-group col-lg-4 col-md-4 col-sm-4" >

			 		<div class="row">

			 		  	<label for="search_air">Search:</label>

				  		<input type="text" class="form-control input-sm" id="search_air" onkeyup="search_airs(this.value)" >		

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

					     <?php $this->load->view('jobfile-view/views_jobfile_air_updateData'); ?>


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

				



	 <div id="scroller" class="table-responsive " style= "overflow-y:auto; height :485px; width:100%;">
		   <div class="job-air">
		    <table class="table table_manila table-bordered table-condensed order-tablejob" style="width:5500px;">
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

						        if($row->ETD == "0000-00-00 00:00:00"){
					                $ETD = $row->ETD;
					             }else{
					                 $ETD = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->ETD));
					             }

					              if($row->ETA == "0000-00-00 00:00:00"){
					                $ETA = $row->ETA;
					             }else{
					                 $ETA = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->ETA));
					             }

					              if($row->ATA == "0000-00-00 00:00:00"){
					                $ATA = $row->ATA;
					             }else{
					                 $ATA = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->ATA));
					             }

				      	?>
				      		<tr>
					         	  <td><?php echo stripslashes($i);?></td>
						          <td><button type="button" class="btn btn-Update-air btn-sm btn-default" data-toggle="modal" data-target="#myModal-3-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
						          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
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
								  	<td class="hidden"><?php echo stripslashes($ETD); ?></td>
								  <td><?php echo stripslashes($row->ETD); ?></td>
								  	<td class="hidden"><?php echo stripslashes($ETA); ?></td>
								  <td><?php echo stripslashes($row->ETA); ?></td>
								  	<td class="hidden"><?php echo stripslashes($ATA); ?></td>
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
						          <td class="view_charges-air">
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

		  </div>



<!--pop up for goods start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="viewgoods-air"  data-backdrop="static" data-keyboard="false"role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content"  style="width:180%;right:40%;padding: 10px; ">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">List of Commodity</h4>
				        </div>
				        <div class="modal-body">

				        	<div style='overflow-x:auto;'>	
				            	<div class="list_products_air"> </div>
				            </div>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				          <input type="text" class="jobfile_air_update_product hidden">
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
				            <div class="list_status_air"> </div>
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>	

			<!--pop up for Running Charges start -->
			<div class="container">
				  <!-- Modal -->
				  <div class="modal fade" id="runchar-air" data-backdrop="static" data-keyboard="false" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content" style="width:180%;right:40%;padding: 10px;">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Running Charges</h4>
				        </div>
				        <div class="modal-body">

				            <div class="list_charges_air"> </div>


				        </div>
				        <div class="footer-modal">
				        <hr>
				        	<button type="button" class="btn btn-danger update_charges-air-qwerty">Update</button>

				        	<button type="button" class="btn btn-danger update_charges-air" disabled>Save</button>

				          <button type="button" class="btn btn-danger btn-close-air" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				 </div>
				  
			</div>


	<script>
			$(document).on('click','.update_charges-air-qwerty',function(){
					$('#runchar-air .lodge_airs').removeAttr('disabled');
					$('#runchar-air .cont-deposit_airs').removeAttr('disabled');
					$('#runchar-air .thc-charges_airs').removeAttr('disabled');
					$('#runchar-air .arrastre_airs').removeAttr('disabled');
					$('#runchar-air .wharfage_airs').removeAttr('disabled');
					$('#runchar-air .weight_airs').removeAttr('disabled');
					$('#runchar-air .del_airs').removeAttr('disabled');
					$('#runchar-air .dispatch_airs').removeAttr('disabled');
					$('#runchar-air .storage_airs').removeAttr('disabled');
					$('#runchar-air .demurrage_airs').removeAttr('disabled');
					$('#runchar-air .detention_airs').removeAttr('disabled');			
					$('#runchar-air .EIC_airs').removeAttr('disabled');
					$('#runchar-air .bai-app_airs').removeAttr('disabled');
					$('#runchar-air .bai-inspect_airs').removeAttr('disabled');
					$('#runchar-air .sra-app_airs').removeAttr('disabled');
					$('#runchar-air .sra-inspect_airs').removeAttr('disabled');
					$('#runchar-air .bad-cargo_airs').removeAttr('disabled');

					$('.update_charges-air').removeAttr('disabled');
					$(this).attr('disabled','disabled');
			});

		$(document).on('click','.btn-close-air',function(){
					$('#runchar-air .update_charges-air-qwerty').removeAttr('disabled');
					$('#runchar-air .update_charges-air').attr('disabled','disabled');
			});

		//check  if num or not
              $(document).on('keypress','.checkDec-air',function (e) {
					  if(event.which < 46
					    || event.which > 59) {
					        event.preventDefault();
					    } // prevent if not number/dot

					    if(event.which == 46
					    && $(this).val().indexOf('.') != -1) {
					        event.preventDefault();
					    } // prevent if already dot

               });
	</script>



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


			 <!--Update product  -->
				  <!-- Modal -->
				  <div class="modal fade" id="updateProduct-air" tabindex="-1" data-replace="true" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog" >
				    
				      <!-- Modal content-->
				      	<?php $this->load->view('jobfile-view/add-air-product/update_Product_air'); ?>
				      	
				    </div>
				 </div>




<script>


/*add New jobfile*/
	/* var myBackup_jobfile_air = $('#myModal-3-2').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#myModal-3-2',function() {
        $('#myModal-3-2').modal('hide').remove();
        var myClone_jobfile_air = myBackup_jobfile_air.clone();
        $('body').append(myClone_jobfile_air);
        i=0;
    }); 
*/

    /*add New jobfile*/
	 var myBackup_product_air = $('#addProduct-air').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addProduct-air',function() {
        $('#addProduct-air').modal('hide').remove();
        var myClone_product_air = myBackup_product_air.clone();
        $('body').append(myClone_product_air);
        
    }); 

    /*add New jobfile*/
	 var myBackup_report_air = $('#addReport-air').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addReport-air',function() {
        $('#addReport-air').modal('hide').remove();
        var myClone_report_air = myBackup_report_air.clone();
        $('body').append(myClone_report_air);
        
    }); 


var jbfl;
 $(document).on('change',' .checkDec-air',function(){
 		var inp = $(this).val();
 		var holder = $(this).attr('id');
 		var newInp = inp.replace(/,/g,'');
 		var holders = newInp.toString().split('.');
 		var n = newInp.indexOf('.');
 		if(n < 0){
 			holders[0] =  numeral(holders[0]).format('0,0.00');
 			$('#runchar-air #' + holder).val(holders.join('.'));
 		}else{
 			holders[0] =  numeral(holders[0]).format('0,0');
 			holders[1] =  numeral("0." + holders[1]).format('.000');
 			$('#runchar-air #' + holder).val(holders.join(''));
 		}
 		if(inp.trim() == ""){
 			$('#runchar-air #' + holder).val('0.00');
 		}
 });
 $(document).on('click','.btn-Goods-air',function(){
   		$('.list_products_air').html('<div class="list_products_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Products </div>');
   });	

   $(document).on('click','.btn-StatusReport-air',function(){
   		$('.list_status_air').html('<div class="list_status_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
   });

       $(document).on('click','.runchar-air',function(){

   		$('.list_charges_air').html('<div class="list_charges_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Charges </div>');

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
                	
                    $('.list_products_air').html(data);
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
                                $('.list_status_air').html(data);
                        });
        });


         /*View Charges*/
        $('.view_charges-air').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		jbfl = jobfileno;

	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_charges_air');?>",
                                    data: { 
                                    	id:jbfl,
                                    }
                                })
                                .done(function(data) {

                                    $('.list_charges_air').html(data);

                                });
        });


//air search
function search_airs(jbfl){
    		 	$.ajax({
		           method: "GET",
	 		       url: "<?php echo base_url('search/get_jobfile_search_air');?>",
			  	   beforeSend: function() {
							$('.job-air').html('<span class="loading-consignee"><i class="fa fa-spinner fa-spin"></i>Please Wait...</span>');
 					  },
			  	   data: {
			  	   	           jobfile   		   :jbfl
			  	   		 }
	              })
					.done(function(data) {
						$('.job-air').html(data);
	  		    });
    
}
   $(document).on('click','.update_charges-air',function(){
     var lodge        = $('#runchar-air .lodge_airs').val().replace(/,/g,'');
     var cont_deposit = $('#runchar-air .cont-deposit_airs').val().replace(/,/g,'');
     var thc_charges  = $('#runchar-air .thc-charges_airs').val().replace(/,/g,'');
     var arrastre     = $('#runchar-air .arrastre_airs').val().replace(/,/g,'');
     var wharfage     = $('#runchar-air .wharfage_airs').val().replace(/,/g,'');
     var weight       = $('#runchar-air .weight_airs').val().replace(/,/g,'');
     var del          = $('#runchar-air .del_airs').val().replace(/,/g,'');
     var dispatch     = $('#runchar-air .dispatch_airs').val().replace(/,/g,'');
     var storage      = $('#runchar-air .storage_airs').val().replace(/,/g,'');
     var demurrage    = $('#runchar-air .demurrage_airs').val().replace(/,/g,'');
     var detention    = $('#runchar-air .detention_airs').val().replace(/,/g,'');
     var eic 		  = $('#runchar-air .EIC_airs').val().replace(/,/g,'');
     var bai_app 	  = $('#runchar-air .bai-app_airs').val().replace(/,/g,'');
     var bai_inspect  = $('#runchar-air .bai-inspect_airs').val().replace(/,/g,'');
     var sra_app 	  = $('#runchar-air .sra-app_airs').val().replace(/,/g,'');
     var sra_inspect  = $('#runchar-air .sra-inspect_airs').val().replace(/,/g,'');
     var bad_cargo    = $('#runchar-air .bad-cargo_airs').val().replace(/,/g,'');

     	
		 	$.ajax({
		           method: "POST",
	 		       url: "<?php echo base_url('Job_air_update/jobfile_add_charge_air');?>",
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
									$('#runchar-air .update_charges-air-qwerty').removeAttr('disabled');
									$('#runchar-air .update_charges-air').attr('disabled','disabled');
				        			$('#runchar-air').modal('hide');
				        	    }
				   			   });
	    		    })

  });

$('.btn-Add-Product-air').click(function(){

			 jb_air =  $(this).closest('tr').children('td:eq(2)').text();

			
});

$('.btn-Add-Report-air').click(function(){
		  jbfl_airs = $(this).closest('tr').children('td:eq(33)').text();
		var jbfl_haha = $(this).closest('tr').children('td:eq(2)').text();

		 $('.jobfile-addReport-air').val(jbfl_haha);

		/* alert(jbfl);*/
});
</script>
