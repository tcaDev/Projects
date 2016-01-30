	    <table class="tablesorter table-striped table-bordered table-hover table-condensed" style="width:5000px;">

				      <thead>

					  		<tr>

								          <th > No. </th>

								          <th data-sorter="false"> Update </th>
										 
								          <th >Jobfile Number</th>

								          <th >Color Stages</th>

								          <th> Shipper </th>
										   
										  <th >Consignee</th>

								          <th data-sorter="false">Container No.</th>

								          <th data-sorter="false">Description of Goods</th>

 										  <th >PI/PO No.</th>

 										   <th >House Bill of Lading No.</th>

								          <th >Master Bill of Lading No.</th>

								          <th >Master Bill of Lading No. 2</th>

								          <th >Letter of Credit No. from Bank</th> 

								          <th >Registry</th>

								          <th data-sorter="false">Vessel/Voyage</th>

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

								          <th data-sorter="false">Status Reports</th>

								          <th data-sorter="false">Running Charges</th>

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
								          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#askjd" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								           <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td><?php echo stripslashes($row->ConsigneeName);?></td>
								          <td>
								          		<button type="button" class="btn btn-Container-outport btn-info view_containers-outport btn-sm"  data-toggle="modal" data-target="#viewcontainers-outport"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          		<button type="button" class="btn btn-Add-Container-outport btn-success btn-sm" data-toggle="modal" data-target="#addContainer-outport"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods-outport btn-info view_goods-outport btn-sm" data-toggle="modal" data-target="#viewgoods-outport"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
										  		<button type="button" class="btn btn-Add-Product-outport btn-success btn-sm" data-toggle="modal" data-target="#addProduct-outport"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
										  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
 										  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo2); ?></td>
										  <td><?php echo stripslashes($row->LetterCreditFromBank); ?></td>
 									      <td><?php echo stripslashes($row->Registry);?></td>
										  <td>
									  			<button type="button" class="btn btn-Vessel-outport btn-info view_vessels-outport btn-sm" data-toggle="modal" data-target="#viewvessels-outport"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  			<button type="button" class="btn btn-Add-Vessel-outport btn-success btn-sm" data-toggle="modal" data-target="#addVessel-outport"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
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
								          		<button type="button" class="btn btn-StatusReport-outport btn-info reports-outport btn-sm" data-toggle="modal" data-target="#statrepo-outport"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          		<button type="button" class="btn btn-Add-Report-outport btn-success btn-sm" data-toggle="modal" data-target="#addReport-outport"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
								          <td ><button type="button" class="btn btn-StatusReport btn-info runchar-outport view_charges-outport btn-sm" data-toggle="modal" data-target="#runchar-outport"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
								        	<td class="get_me_id hidden"><?php echo stripslashes($row->JobFileId); ?></td>
								        </tr>

								        <?php } ?>
				        </tbody>
				  </table>



				    <script>
 /*Refresh Modal When Close*/  

  	/*add New jobfile*/
	 var myBackup_jobfile_outport = $('#myModal-2-2').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#myModal-2-2',function() {
        $('#myModal-2-2').modal('hide').remove();
        var myClone_jobfile_outport = myBackup_jobfile_outport.clone();
        $('body').append(myClone_jobfile_outport);
        i=0;
    }); 
    
    /*Add New Container Modal*/
	 var myBackup_container_outport = $('#addContainer-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addContainer-outport', function() {
        $('#addContainer-outport').modal('hide').remove();
        var myClone_container_outport = myBackup_container_outport.clone();
        $('body').append(myClone_container_outport);
    });

    /*Add New Container Modal*/
	 var myBackup_product_outport = $('#addProduct-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addProduct-outport', function() {
        $('#addProduct-outport').modal('hide').remove();
        var myClone_product_outport = myBackup_product_outport.clone();
        $('body').append(myClone_product_outport);
    });

   /*add New Report Modal*/
	 var myBackup_report_outport = $('#addReport-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addReport-outport',function() {
        $('#addReport-mnla-outport').modal('hide').remove();
        var myClone_report_outport = myBackup_report_outport.clone();
        $('body').append(myClone_report_outport);
    });

    var myBackup_vessel_outport = $('#addVessel-outport').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#addVessel-outport',function() {
        $('#addVessel-outport').modal('hide').remove();
        var myClone_vessel_outport = myBackup_vessel_outport.clone();
        $('body').append(myClone_vessel_outport);
    });


/*View Modal*/

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
                                    $('.list_conts_outport').html(data);
                                });
        });
        
        /*View Commodity */
         $('.view_goods-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		var button_update = "btn-update-product-outport";
 		var modal ="outport";
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_goods');?>",
                                    data: { id:jobfileno,
                                    		button_update:button_update,
                                    		href:modal,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_products_outport').html(data);
                                });
        });
        
        
        /* View Vessel*/
        $('.view_vessels-outport').click(function(){	
 		var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
 		var button_update = "btn-update-vessel-outport";
 		var modal ="outport";
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_vessels');?>",
                                    data: { id:jobfileno,
                                    		button_update:button_update,
                                    		href:modal,
                                    }
                                })
                                .done(function(data) {
                                    $('.list_vessels_outport').html(data);
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
                                    $('.list_charges_outport').html(data);
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
                                            $('.list_status_outport').html(data);
                                    });
        });
        
/*Add Modal*/
        /*Add Container outport*/
        $(".btn-Add-Container-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		var modal_ID= "#addVessel-outport";


		$(".jobfile-addContainer-outport").val(jobfile_mnla) ;
		$(".jobfile-addVessel-outport").val(jobfile_mnla) ;


                    $.ajax({
                            method: "POST",
                              url: "<?php echo base_url('Job/get_vessel_container');?>",
                            data: { jobfile:jobfile_mnla,
                            		href:modal_ID
                            }
                    })
                    .done(function(data) {
                            $('.vessel-addContainer-outport-get').html(data);
                    });
	 });

      $(".btn-Add-Product-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		var modal_ID = "#addContainer-outport";
		var onclick = "click_vessel_outport";
		$(".jobfile-addProduct-outport").val(jobfile_mnla) ;
		$(".jobfile-addContainer-mnla").val(jobfile_mnla) ;

				$.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/get_container_product');?>",
				  		data: { jobfile:jobfile_mnla,
				  				href:modal_ID,
				  				onclick:onclick
				  		}
					})
			  		.done(function(data) {
				  				$('.container-addProduct-outport-get').html(data);
					});
 
 					//get only the record that is already record

 						var values = $.map($('.prodname-addProduct-outport option'), function(e) { return e.value; });
					// as a comma separated string
					/*$('#values').text("values are: " + values.join(','));*/
					var  products = values.join(',');
			    /*	$.ajax({
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

	$(".btn-Add-Vessel-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addVessel-outport").val(jobfile_mnla) ;
	});

	$(".btn-Add-Report-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addReport-outport").val(jobfile_mnla) ;
	});


/*Get Jobfile No for Updating Container*/
$(".btn-Container-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update").val(jobfile_mnla) ;
	});

/*Get Jobfile No for Updating Product*/
$(".btn-Goods-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update_product").val(jobfile_mnla) ;
});

/*Get Jobfile No for Updating Vessel*/
$(".btn-Vessel-outport").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile_outport_update_vessel").val(jobfile_mnla) ;
});
        

 $(document).ready(function(){
 	$(document).on('click','.btn-Update-outport',function(){


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
						  			$(".origin-update-outport select").val(data);
							});

							


			     var color_stages  = $(this).closest('tr').children('td:eq(3)').text();
			     var ShipperName    = $(this).closest('tr').children('td:eq(4)').text();

			     var ConsigneeName  = $(this).closest('tr').children('td:eq(5)').text();
			     var PurchaseOrderNo= $(this).closest('tr').children('td:eq(8)').text();
					
				 var HouseBillLadingNo      = $(this).closest('tr').children('td:eq(9)').text();
			     var MasterBillLadingNo     = $(this).closest('tr').children('td:eq(10)').text();
				 var MasterBillLadingNo2    = $(this).closest('tr').children('td:eq(11)').text();
			     var LetterCreditFromBank   = $(this).closest('tr').children('td:eq(12)').text();
		
			     var registry   = $(this).closest('tr').children('td:eq(13)').text();

			     var DateReceivedNoticeFromClients     = $(this).closest('tr').children('td:eq(16)').text();
			     var date_rcvd_bl     = $(this).closest('tr').children('td:eq(18)').text();
			     var date_rcvd_other_docs    = $(this).closest('tr').children('td:eq(20)').text();
			     var broker    = $(this).closest('tr').children('td:eq(22)').text();
			     var date_req_budget    = $(this).closest('tr').children('td:eq(23)').text();
			     var rfpduedate    = $(this).closest('tr').children('td:eq(25)').text();
			     var color_selectivity    = $(this).closest('tr').children('td:eq(27)').text();

			     $('.jobfiles-update-outport').val(jobfileNo);
			     $('.monitoring_type_id-outport').val(jobfileID);
			     

			     $(".shipper-update-outport option").filter(function() {
				    return this.text == ShipperName; 
				}).attr('selected', 'selected');

			     $(".consignee-update-outport option").filter(function() {
				    return this.text == ConsigneeName; 
				}).attr('selected', 'selected');

			      $(".colsel-update-outport option").filter(function() {
				    return this.text == color_stages; 
				}).attr('selected', 'selected');

			      $('.hbl-update-outport').val(HouseBillLadingNo);
			      $('.mbl-update-outport').val(MasterBillLadingNo);
			      $('.mbl2-update-outport').val(MasterBillLadingNo2);
			      $('.bank-update-outport').val(LetterCreditFromBank);
			      $('.registry-update-outport').val(registry);

			      $('.dtRcvd-update-outport').val(DateReceivedNoticeFromClients);
			      $('.dt_pickup_obl-update-outport').val(date_rcvd_bl);
			      $('.dt_pickup_docs-update-outport').val(date_rcvd_other_docs);

			      $(".broker-update-outport option").filter(function() {
				    return this.text == broker; 
				}).attr('selected', 'selected');

			      $('.purch_order_no_update-outport').val(PurchaseOrderNo);
			      $('.dt-req-update-outport').val(date_req_budget);
			      $('.rfp-update-outport').val(rfpduedate);

			      $(".color-select-update-outport option").filter(function() {
				    return this.text == color_selectivity; 
				}).attr('selected', 'selected');

			      $.ajax({
						  		method: "POST",
								  url: "<?php echo base_url('Job/get_country_name');?>",
						  		data: { jobfile:jobfileNo
						  		}
							})
					  		.done(function(data) {
						  			$(".origcity-update-outport").val(data);
							});
			     

			 }); 
 });
        
    </script>

    
    	<!-- Pick a theme, load the plugin & initialize plugin -->

<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/tablesortFilport.js');?>"></script>