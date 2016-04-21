    <?php 
          if(count($air)==0){
           echo "<center><h2><span style='color:red'>No Records Found</span></h2></center>";
          }else{
      ?>      
        <table class="tablesorter table table_manila table-bordered table-condensed order-tablejob" id="table_air_sort_search">
            <thead>
                 <tr style="cursor:w-resize ;">

                  <th> No. </th>

                  <th data-sorter="false"> Update </th>

                  <th>Jobfile Number</th>

                  <th>Color Stages</th>

                  <th>Shipper</th>

                  <th>Consignee</th>

                  <th>No. Of Cartons</th>

                  <th data-sorter="false">Description of Goods</th>

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

                  <th data-sorter="false">Status Reports</th>

                  <th data-sorter="false">Running Charges</th>
              </tr>

              <tbody>
                <?php
                         if(isset($page_number)){
                           if($page_number==1){
                                $mynum = $page_number-1;        
                             }else{
                              $this->session->page_air = $page_number-1;
                              $page_number2 = 0;
                              $nums = $this->session->page_air;
                              $page_number = $nums*2;      
                            $mynum = $page_number.$page_number2;
                            }
                          }else{
                            $mynum=0;
                          }
               ?>



          

              <?php $i= $mynum; 
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
                      <td>
                      <?php if($roleair[1] == '2'){ ?>
                        <button type="button" class="btn btn-Update-air btn-sm btn-default" data-toggle="modal" data-target="#myModal-3-1"><span class="fa fa-pencil fa-lg update_jobfile"></span></button>
                      <?php }else{?>
                        <button type="button" class="btn btn-Update-air btn-sm btn-default disabled"><span class="fa fa-pencil fa-lg update_jobfile"></span></button>
                      <?php }?>
                      </td>
                      <td><?php echo stripslashes($row->JobFileNo); ?><button  type="button" data-toggle="modal" data-target="" class="btn btn-xs btn-default  pull-right "><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button></td>
                       <?php echo $pick1 ;?>
                      <td><?php echo stripslashes($row->ShipperName); ?></td>
                      <td><?php echo stripslashes($row->ConsigneeName); ?></td>
                      <td><?php echo stripslashes($row->NoOfCartons); ?></td>
                      <td>
                          <button type="button" class="btn btn-Goods-air btn-info view_goods-air btn-sm" data-toggle="modal" data-target="#viewgoods-air"><span class="fa fa-modx fa-fw"></span> View Commodity(s)</button>
                        <?php if($roleair[0] == '1'){ ?>
                          <button type="button" class="btn btn-Add-Product-air btn-success btn-sm" data-toggle="modal" data-target="#addProduct-air"  title="Add New Commodity(s)"><span class="fa fa-plus fa-fw"></span> </button>
                        <?php }else{}?>
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
                       
                      <td><?php echo stripslashes($row->ETD); ?></td>
                       
                      <td><?php echo stripslashes($row->ETA); ?></td>
                       
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
                          <button type="button" class="btn btn-StatusReport-air btn-info reports-air btn-sm" data-toggle="modal" data-target="#statrepo-air"><span class="fa fa-modx fa-fw"></span> View Status Report</button>
                        <?php if($roleair[0] == '1'){ ?>
                          <button type="button" class="btn btn-Add-Report-air btn-success btn-sm" data-toggle="modal" data-target="#addReport-air"  title="Add New Report(s)"><span class="fa fa-plus fa-fw"></span> </button>
                        <?php }else{} ?>
                      </td>
                      <td class="view_charges-air">
                          <button type="button" class="btn btn-StatusReport btn-info runchar-air btn-sm" data-toggle="modal" data-target="#runchar-air"><span class="fa fa-modx fa-fw"></span> View Running Charges</button>
                      </td>
                      <td class="get_me_id hidden"><?php echo stripslashes($row->JobFile_AirId); ?></td>
                  </tr>

                  <?php } ?>
              </tbody>
            
          </table>
<?php }?>

          <script>
            //table fixed
      $("th").css("vertical-align","middle");
    $("tbody td").css("white-space","nowrap");
    $("tbody td").css("min-width","60px");
    $("thead th").css("white-space","nowrap"); 
/*add New jobfile*/
   // var myBackup_jobfile_air = $('#myModal-3-2').clone();
    
   //  // Delegated events because we make a copy, and the copied button does not exist onDomReady
   //  $('body').on('hidden.bs.modal','#myModal-3-2',function() {
   //      $('#myModal-3-2').modal('hide').remove();
   //      var myClone_jobfile_air = myBackup_jobfile_air.clone();
   //      $('body').append(myClone_jobfile_air);
   //      i=0;
   //  }); 
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
      var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
         $('.jbNo-air').html(' <span class="jbNo-air">' + jobfileno + '</span> ');
   });  

   $(document).on('click','.btn-StatusReport-air',function(){
      $('.list_status_air').html('<div class="list_status_air"><br><span class="fa fa-spinner fa-spin" style="font-size: 20px;"></span> Loading Status Reports </div>');
      var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
         $('.jbNo-air').html(' <span class="jbNo-air">' + jobfileno + '</span> ');
   });

       $(document).on('click','.runchar-air',function(){
        var jobfileno =  $(this).closest('tr').children('td:eq(2)').text();
         $('.jbNo-air').html(' <span class="jbNo-air">' + jobfileno + '</span> ');

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

       
  <!-- Pick a theme, load the plugin & initialize plugin -->

<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/dist/js/widgets/widget-scroller.min.js');?>"></script>
<script src="<?php echo base_url('resources/table_sort/tablesortFilport.js');?>"></script>



  