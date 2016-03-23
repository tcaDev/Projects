
				    <table class="tablesorter table table_manila table-bordered table-condensed order-tablejob "  >
				        <thead>
				             <tr>
								          <th > No. </th>

								        <?php if($rolemnila[1] == '2'){ ?>  
								          <th data-sorter="false"> Update </th>
								        <?php }else {?>
								        	<th data-sorter="false"></th>
								        <?php }?>
										
								          <th >Jobfile Number</th>

								          <th >Color Stages</th>

								          <th> Shipper </th>
										   
										  <th >Consignee</th>

										   <th data-sorter="false">Vessel/Voyage</th>

								          <th data-sorter="false">Container No.</th>

								          <th data-sorter="false">Description of Goods</th>

 										  <th >PI/PO No.</th>

 										   <th >House Bill of Lading No.</th>

								          <th >Master Bill of Lading No.</th>

								          <th >Master Bill of Lading No. 2</th>

								          <th >Letter of Credit No. from Bank</th> 

								          <th >Registry</th>

								          <th >Origin</th>  
								      
								          <th >Date Received Arrival Notice from Client/s</th>
								         
								          <th >Date Pick-up/Received O-BL</th>
         								 
         								  <th >Date Pick-up/Received other Documents</th>
							   	
							   		      <th >Broker</th>

							   		      <th >Date Request Budget to GL</th>

										  <th >Reference Due Date</th>

										  <th>Color Selectivity</th>

								          <th data-sorter="false">Status Reports</th>

								          <th data-sorter="false">Running Charges</th>

								      </tr>
				        </thead>
				        <tbody>

                       <?php
                        if(isset($page_number)){
	                         if($page_number==1){
						   	    $mynum = $page_number-1;		    
						     }else{
						     	$this->session->page_manila = $page_number-1;
	   							$page_number2 = 0;
	   							$nums = $this->session->page_manila;
							   	$page_number = $nums*2;		   
								$mynum = $page_number.$page_number2;
	   						}
	   					}else{
	   						$mynum=0;
	   					}
                       ?>

				        				<?php $i=$mynum; foreach ($manila as $row) {
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
								         
								         <td><?php echo $i;?></td>
								        <?php if($rolemnila[1] == '2'){ ?>  
								        	<td><button type="button" class="btn btn-Update btn-sm btn-default" data-toggle="modal" data-target="#myModal-1-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button></td>
								       	<?php }else{ ?>
								       		<td></td>
								       	<?php } ?>
								          <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
								           <?php echo $pick1 ;?>
								          <td><?php echo stripslashes($row->ShipperName); ?></td>
								          <td><?php echo stripslashes($row->ConsigneeName); ?></td>
								          <td>
									  			<button type="button" class="btn btn-Vessel btn-info view_vessels btn-sm" data-toggle="modal" data-target="#viewvessels"><span class="fa fa-modx fa-fw"></span> View Vessel(s)</button>
									  		<?php if($rolemnila[0] == '1'){ ?> 
									  			<button type="button" class="btn btn-Add-Vessel-mnla btn-success btn-sm" data-toggle="modal" data-target="#addVessel-mnla"  title="Add New Vessel(s)"><span class="fa fa-plus fa-fw"></span> </button>
									  		<?php }else{}?>
										  </td>
								          <td>
								          		<button type="button" class="btn btn-Container btn-info view_containers btn-sm"  data-toggle="modal" data-target="#viewcontainers"><span class="fa fa-modx fa-fw"></span> View Container(s)</button>
								          	<?php if($rolemnila[0] == '1'){ ?> 
								          		<button type="button" class="btn btn-Add-Container-mnla btn-success btn-sm" data-toggle="modal" href="#addContainer-mnla"  title="Add New Container(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          	<?php }else{}?>
								          </td>
										  <td>
										  		<button type="button" class="btn btn-Goods btn-info view_goods btn-sm" data-toggle="modal" data-target="#viewgoods"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
										  	<?php if($rolemnila[0] == '1'){ ?> 
										  		<button type="button" class="btn btn-Add-Product-mnla btn-success btn-sm" data-toggle="modal" data-target="#addProduct-mnla"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
										  	<?php }else{}?>
										  </td>
										  <td><?php echo stripslashes($row->PurchaseOrderNo); ?></td>
 										  <td><?php echo stripslashes($row->HouseBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo); ?></td>
								          <td><?php echo stripslashes($row->MasterBillLadingNo2); ?></td>
										  <td><?php echo stripslashes($row->LetterCreditFromBank); ?></td>
 									      <td><?php echo stripslashes($row->Registry); ?></td>
										 
								           <td><?php echo stripslashes($row->Origin); ?></td>
								           	
								          <td><?php echo stripslashes($row->DateReceivedNoticeFromClients); ?></td>
								          	
								          <td><?php echo stripslashes($row->DateReceivedOfBL); ?></td>
								          	
								          <td><?php echo stripslashes($row->DateReceivedOfOtherDocs); ?></td>
 										  <td><?php echo stripslashes($row->Broker); ?></td>
 										  	
								          <td><?php echo stripslashes($row->DateRequestBudgetToGL); ?></td>
								           	
								          <td><?php echo stripslashes($row->RFPDueDate); ?></td>
								          <td><?php echo stripslashes($row->ColorSelectivityName); ?></td>
								          <td>
								          		<button type="button" class="btn btn-StatusReport btn-info reports btn-sm" data-toggle="modal" data-target="#statrepo"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
								          	<?php if($rolemnila[0] == '1'){ ?> 
								          		<button type="button" class="btn btn-Add-Report-mnla btn-success btn-sm" data-toggle="modal" data-target="#addReport-mnla"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
								          	<?php }else{}?>
								          </td>
								          <td class="view_charges"><button type="button" class="btn btn-StatusReport btn-info runchar btn-sm" data-toggle="modal" data-target="#runchar"><span class="fa fa-modx fa-fw"></span> View Running Charges</button></td>
								          <td class="get_me_id hidden"><?php echo stripslashes($row->JobFileId); ?></td>
								        </tr>

								        <?php } ?>
				        </tbody>
				    </table>

				  

<script>
  		$("th").css("vertical-align","middle");
		$("tbody td").css("white-space","nowrap");
		$("tbody td").css("min-width","60px");
		$("thead th").css("white-space","nowrap");
/*add New jobfile*/

/*Refresh Modal When Close*/

	 var myBackup_jobfile_mnila = $('#myModal-1-2').clone();
    
    // Delegated events because we make a copy, and the copied button does not exist onDomReady
    $('body').on('hidden.bs.modal','#myModal-1-2',function() {
        $('#myModal-1-2').modal('hide').remove();
        var myClone_jobfile_mnila = myBackup_jobfile_mnila.clone();
        $('body').append(myClone_jobfile_mnila);
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

$(document).ready(function(){
	 



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

 	var href = "#updateReport-mnla";
 	var btn = "btn-update-report";
 		var ids =  $(this).closest('tr').children('td:eq(2)').text();
 	/* alert(ids);*/
	 		  $.ajax({
				  		method: "POST",
						  url: "<?php echo base_url('Job/status_report');?>",
				  		data: { id:ids,
				  				href:href,
				  				btn:btn,
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

	});

	$(".btn-Add-Report-mnla").click(function(){
		var jobfile_mnla =  $(this).closest('tr').children('td:eq(2)').text();
		$(".jobfile-addReport-mnla").val(jobfile_mnla) ;
	});

});




</script>

		<!--end -->




	<!-- Pick a theme, load the plugin & initialize plugin -->

<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/widgets/widget-scroller.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/tablesortFilport.js');?>"></script>



  