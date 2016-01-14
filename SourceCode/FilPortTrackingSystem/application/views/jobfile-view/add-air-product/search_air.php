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


<script>
var jbfl;
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
 		var jobfileno =  $(this).closest('tr').children('td:eq(33)').text();
 		jbfl = jobfileno;
	 		  $.ajax({
                                    method: "POST",
                                      url: "<?php echo base_url('Job/get_charges_air');?>",
                                    data: { 
                                    	id:jobfileno,
                                    }
                                })
                                .done(function(data) {

                                    $('.list_charges_air').html(data);

                                });
        });



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



  });

$('.btn-Add-Product-air').click(function(){

			 jb_air =  $(this).closest('tr').children('td:eq(33)').text();

			
});

$('.btn-Add-Report-air').click(function(){
		  jbfl_airs = $(this).closest('tr').children('td:eq(33)').text();
		var jbfl_haha = $(this).closest('tr').children('td:eq(2)').text();

		 $('.jobfile-addReport-air').val(jbfl_haha);

		/* alert(jbfl);*/
});
</script>



