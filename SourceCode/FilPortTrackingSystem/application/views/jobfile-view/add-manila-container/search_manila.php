				    <table class="table table_manila table-bordered table-condensed order-tablejob " id="table_manila_sort_search" style="width:5000px;">
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
									  			<button type="button" class="btn btn-Vessel btn-info view_vessels btn-sm" data-toggle="modal" data-target="#viewvessels"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  			<button type="button" class="btn btn-Add-Vessel-mnla btn-success btn-sm" data-toggle="modal" data-target="#addVessel-mnla"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  </td>
								          <td>
								          		<button type="button" class="btn btn-Container btn-info view_containers btn-sm"  data-toggle="modal" data-target="#viewcontainers"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          		<button type="button" class="btn btn-Add-Container-mnla btn-success btn-sm" data-toggle="modal" href="#addContainer-mnla"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods btn-info view_goods btn-sm" data-toggle="modal" data-target="#viewgoods"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
										  		<button type="button" class="btn btn-Add-Product-mnla btn-success btn-sm" data-toggle="modal" data-target="#addProduct-mnla"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
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
								          		<button type="button" class="btn btn-StatusReport btn-info reports btn-sm" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          		<button type="button" class="btn btn-Add-Report-mnla btn-success btn-sm" data-toggle="modal" data-target="#addReport-mnla"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          </td>
								          <td class="view_charges"><button type="button" class="btn btn-StatusReport btn-info runchar btn-sm" data-toggle="modal" data-target="#runchar"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
								          <td class="get_me_id hidden"><?php echo stripslashes($row->JobFileId); ?></td>
								        </tr>

								        <?php } ?>
				        </tbody>
				    </table>

  <script>
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


</script>

   <!--sort table -->


	<!-- Demo styling -->
	<link href="<?php echo base_url('resources/table_sort/docs/css/jq.css')?>;" rel="stylesheet">


	<!-- Pick a theme, load the plugin & initialize plugin -->
	<link href="<?php echo base_url('resources/table_sort/dist/css/theme.default.min.css');?>" rel="stylesheet">
	<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
	<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
	<script>
	$(function(){
		$('table').tablesorter({
			widgets        : ['zebra', 'columns'],
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true
		});
	});
	</script>