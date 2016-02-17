<?php


class Email extends CI_Controller {
     public function __construct()
       {
            parent::__construct();

            $this->load->model('Jobdata');  
            $this->load->library('email');
            $this->load->library('m_pdf');
            $this->load->helper('file');
            $this->load->helper('download');
       }


 function today(){
echo '  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
 $this->email->clear(TRUE);
 $date =  date('Y-m-d');
 $date_now = explode(' ',$date);
$now = $date_now[0];

 //GET ALL JOBFILE IN CURRENT DATE start

   $jbs = '';
   $jobs = $this->Jobdata->Today(); 
   foreach ($jobs as $row) {
      $data_db = $row->DateUpdated;
    
     $date_explode = explode(' ',$data_db);
     $date = $date_explode[0];
         if($date==$now){
            //get the jobfile based on current date
            $jbfl_m_o =  $row->JobFileNo;
            $jbs.= ','.'\''.$jbfl_m_o.'\'';
         }
       //jobfile in manila and outport
       
    }
        $jb_m_o_final = substr($jbs,1);




      //$combine = $jb_m_o_final.','.$jb_a_final;

 //GET ALL JOBFILE IN CURRENT DATE end
     //get the consignee of outport and manila
     if($jb_m_o_final!=''){
       $jb_m_o =  $this->Jobdata->get_email_jobfile_autoemail($jb_m_o_final);
       $data_content ='';
       $i=0;
       foreach($jb_m_o as $row){
         $jobfile=  $row->JobFileNo;
         $montype = $row->MonitoringTypeId;

         if($montype==1){
          $mon ='SEA FREIGHT MANILA';
         }else{
           $mon ='SEA FREIGHT OUTPORT';
         }
        //containers
        $containers =  $this->Jobdata->get_update_container_view($jobfile);
        //vessel
        $vessel =  $this->Jobdata->get_vessels($jobfile);
        //comodity
        $comodity =  $this->Jobdata->get_goods($jobfile);
        //status
        $status =  $this->Jobdata->get_status($jobfile);
        //charges
        $charges =  $this->Jobdata->get_charges_email($jobfile);


        $emailadd  =     $row->EmailAddress;
        $jbfl_send =     $row->JobFileNo;
        $i++;
        echo  '  
        <div class="change_print'.$i.'"  >  

          <table style="width:100%">
            <th><span style="font-size:10px;">FILPORT  DOCUMENT</span></th>
          </table>

          <div style="font-family:Century Gothic;" class="mycontent">
              <div style="font-size:22px;" class="">
        
          </BR>
          </br>
                  <h4>'.$mon.'</h4>
                  </br>

              <table class="table-bordered">
                <tr>
                 <td class"col-md-6"><b>  Jobfile Number: </b></td>
                 <td class="col-md-6 jbfl">'.$row->JobFileNo.' </td>
                </tr>

               <tr>
                 <td class="col-md-3">Shipper:</td>
                 <td class="col-md-6 shipper">'.$row->ShipperName.'</td> 
                </tr>

                <tr>
                 <td class="col-md-3 ">Consignee:</td>
                 <td class="col-md-6 consignee">'.$row->ConsigneeName.'</td>  
                </tr>

                <tr>
                 <td class="col-md-3">Date Received of other Documents:</td>
                 <td class="col-md-6 dt_recieved">'.$row->DateReceivedOfOtherDocs.'</td> 
                </tr>

                <tr>
                 <td class="col-md-3 ">Vessel:</td>
                  <td>
                        <table   style="width:100%">';
                            foreach ($vessel as $row_vess) {
                              $ves =    $row_vess->VesselVoyageNo;
                              echo   '<tr>
                                          <td class="col-md-6 container">'.$ves.'</td>
                                      </tr>'; 
                             }
                echo '</table>
                    </td>
              </tr>

                <tr>
                 <td class="col-md-3 ">HBL# :</td>
                 <td class="col-md-6 hbl">'.$row->HouseBillLadingNo.'</td> 
                </tr>
              </table>

              </div>
              
                        <table style="font-family:Century Gothic;font-size:18px;table-layout:fixed;width:100%" id="table-pre-details-print">
                        </table>
              <br>
              <hr>
                        <h4 class="cnt">Containers</h4>';
                  if($containers==NULL){
                      echo '<p style="color:red">No Containers Yet</p>';
                      }else{
                         echo '<table  border="1"  style="width:100%">
                                  <th>No.</th>
                                  <th>ContainerNumber</th>
                                  <th>Date File Entry to BOC</th>
                                  <th>Date Sent Pre Assessment </th>
                                  <th>Date Sent Final Assessment </th>
                                  <th>Date Paid</th>
                                  <th>Target Delivery Date</th>
                                  <th>Actual Delivery at Warehouse</th> 

                                ';
                                    
                                    $i_contain=0;
                                    foreach ($containers as $row_contain) {
                                    $i_contain++;
                                    $cont            =    $row_contain->ContainerNo;
                                    $dt_entry_boc    =    $row_contain->DateFileEntryToBOC;
                                    $dt_preassess    =    $row_contain->DateSentPreAssessment;
                                    $dt_finalassess  =    $row_contain->DateSentFinalAssessment;
                                    $dtpaid          =    $row_contain->DatePaid;
                                    $tdt             =    $row_contain->TargetDeliveryDate;
                                    $adw             =     $row_contain->ActualDeliveryAtWarehouse;

                                    echo   '
                                              <tr>
                                                <td>'.$i_contain.'</td>
                                                <td>'.$cont.'</td>
                                                <td>'.$dt_entry_boc.' </td>
                                                <td>'.$dt_preassess.' </td>
                                                <td>'.$dt_finalassess.' </td>
                                                <td>'.$dtpaid.' </td>
                                                <td>'.$tdt.' </td>
                                                <td>'.$adw.' </td>
                                              </tr>
                                            '; 
                                   }       


                          echo '</table>';
                      }   
              echo  '<br>
              <hr>          
                        <h4>Commodity</h4>
                     <div>';
                      if($comodity==NULL){
                          echo '<p style="color:red">No Commodity Yet</p>';
                          }else{               
                                  echo'<table  border="1"  style="width:100%">
                                      <th>No.</th>
                                      <th>Container No.</th>
                                      <th>Commodity</th>';

                                              $i_comodity=0;
                                              foreach ($comodity as $row_comodity) {
                                              $i_comodity++;
                                              $contno  =    $row_comodity->ContainerNo;
                                              $prod    =    $row_comodity->ProductName;


                                              echo   '
                                                        <tr>
                                                          <td>'.$i_comodity.'</td>
                                                          <td>'.$contno.'</td>
                                                          <td>'.$prod.' </td>
                                                        </tr>
                                                      '; 
                                             }         


                                    echo'</table>';
                          }
                      
                     echo'</div>
              <br>
              <hr>
                    <h4> Status Reports </h4>';

          if($status==NULL){
              echo '<p style="color:red">No Status Reports Yet</p>';
              }else{

                 echo '<table  border="1"  style="width:100%">
                        <th>Date Added</th>
                        <th>Status Description</th>


                      ';
                          
                          foreach ($status as $row_status) {

                          $dateadd           =    $row_status->DateAdded;
                          $status            =    $row_status->StatusDescription;


                          echo   '
                                    <tr>
                                      <td>'.$dateadd.'</td>
                                      <td>'.$status.'</td>
                                    </tr>
                                  '; 
                         }       


                 echo '</table>';
              }
       echo        '<br>
              <hr>          
                        <h4>Running Charges</h4>
                        <div>
                                <table  border="1" style="width:100%">
                              ';
                                  

                                  foreach ($charges as $row_charges) {


          
                                  $LodgementFee                =    $row_charges->LodgementFee;
                                  $ContainerDeposit            =    $row_charges->ContainerDeposit;
                                  $THCCharges                  =    $row_charges->THCCharges;
                                  $Arrastre                    =    $row_charges->Arrastre;
                                  $Wharfage                    =    $row_charges->Wharfage;
                                  $Weighing                    =    $row_charges->Weighing;
                                  $DEL                         =    $row_charges->DEL;
                                  $DispatchFee                 =    $row_charges->DispatchFee;
                                  $Storage                     =    $row_charges->Storage;
                                  $Demorage                    =    $row_charges->Demorage;
                                  $Detention                   =    $row_charges->Detention;
                                  $EIC                         =    $row_charges->EIC;
                                  $BAIApplication              =    $row_charges->BAIApplication;
                                  $BAIInspection               =    $row_charges->BAIInspection;
                                  $SRAApplication              =    $row_charges->SRAApplication;
                                  $SRAInspection               =    $row_charges->SRAInspection;
                                  $BadCargo                    =    $row_charges->BadCargo;
                                  $AllCharges                  =    $row_charges->AllCharges;
               /*                   $ParticularCharges           =    $row_charges->ParticularCharges;*/
                                  $BPIInspection               =    $row_charges->BPIInspection;
                     /*             $PlugInForReefer             =    $row_charges->PlugInForReefer;*/
                                  $OtherFees                   =    $row_charges->OtherFees;

                                  $LodgementFee      = ($LodgementFee     == 0 ? number_format((float)$LodgementFee, 2, '.', ''):$LodgementFee);
                                  $ContainerDeposit  = ($ContainerDeposit == 0 ? number_format((float)$ContainerDeposit, 2, '.', ''):$ContainerDeposit);         
                                  $THCCharges        = ($THCCharges     == 0 ? number_format((float)$THCCharges, 2, '.', ''):$THCCharges);
                                  $Arrastre          = ($Arrastre == 0 ? number_format((float)$Arrastre, 2, '.', ''):$Arrastre);
                                  $Wharfage          = ($Wharfage     == 0 ? number_format((float)$Wharfage, 2, '.', ''):$Wharfage);
                                  $Weighing          = ($Weighing == 0 ? number_format((float)$Weighing, 2, '.', ''):$Weighing);         
                                  $DEL               = ($DEL     == 0 ? number_format((float)$DEL, 2, '.', ''):$DEL);
                                  $DispatchFee       = ($DispatchFee == 0 ? number_format((float)$DispatchFee, 2, '.', ''):$DispatchFee);
                                  $Storage           = ($Storage     == 0 ? number_format((float)$Storage, 2, '.', ''):$Storage);
                                  $Demorage          = ($Demorage == 0 ? number_format((float)$Demorage, 2, '.', ''):$Demorage);         
                                  $Detention         = ($Detention     == 0 ? number_format((float)$Detention, 2, '.', ''):$Detention);
                                  $EIC               = ($EIC == 0 ? number_format((float)$EIC, 2, '.', ''):$EIC);
                                  $BAIApplication    = ($BAIApplication     == 0 ? number_format((float)$BAIApplication, 2, '.', ''):$BAIApplication);
                                  $BAIInspection     = ($BAIInspection == 0 ? number_format((float)$BAIInspection, 2, '.', ''):$BAIInspection);         
                                  $SRAApplication    = ($SRAApplication     == 0 ? number_format((float)$SRAApplication, 2, '.', ''):$SRAApplication);
                                  $SRAInspection     = ($SRAInspection == 0 ? number_format((float)$SRAInspection, 2, '.', ''):$SRAInspection);
                                  $BadCargo          = ($BadCargo     == 0 ? number_format((float)$BadCargo, 2, '.', ''):$BadCargo);
                                  $AllCharges        = ($AllCharges == 0 ? number_format((float)$AllCharges, 2, '.', ''):$AllCharges);         
                                  $BPIInspection     = ($BPIInspection     == 0 ? number_format((float)$BPIInspection, 2, '.', ''):$BPIInspection);
                                  $OtherFees         = ($OtherFees == 0 ? number_format((float)$OtherFees, 2, '.', ''):$OtherFees);   


                                  $subtotal = 
                                                 $LodgementFee+$ContainerDeposit+$THCCharges+$Arrastre+$Wharfage+$Weighing+
                                                 $DEL+$DispatchFee+$Storage+$Demorage+$Detention+$EIC+$BAIApplication+$BAIInspection+
                                                 $SRAApplication+$SRAInspection+$BadCargo+$AllCharges+$BPIInspection+$OtherFees;




                                  echo   '
                                            <tr>
                                              <td>Lodgement Fee:<span class="pull-right">'.$LodgementFee.'</span></td>
                                              <td>Demurrage: <span class="pull-right">'.$Demorage.'</span></td>  
                                            </tr>
                                            <tr>
                                               <td>Container Deposit: <span class="pull-right">'.$ContainerDeposit.'</span></td>
                                                 <td>Detention: <span class="pull-right">'.$Detention.'</span></td>
                                         
                                     
                                           </tr>
                                            <tr>
                                                 <td>THC Charges: <span class="pull-right">'.$THCCharges.'</span></td>
                                                    <td>EIC: <span class="pull-right">'.$EIC.'</span></td> 
                                              
                                              
                                            </tr>
                                            <tr>        
                                                  <td>Arrastre: <span class="pull-right">'.$Arrastre.'</span></td>  
                                                  <td>BAI Application: <span class="pull-right">'.$BAIApplication.'</span></td>                                                                       
                                               
                                              </tr>
                                            <tr>       
                                               <td>Wharfage: <span class="pull-right">'.$Wharfage.'</span></td>   
                                               <td>BAI Inspection: <span class="pull-right">'.$BAIInspection.'</span></td>                                  
                                             
                                            
                                              </tr>
                                            <tr>                                           
                                                <td>Weighing: <span class="pull-right">'.$Weighing.'</span></td>   
                                                 <td>SRA Application: <span class="pull-right">'.$SRAApplication.'</span></td>
                                               
                                              </tr>
                                            <tr>                                             
                                                 <td>DEL: <span class="pull-right">'.$DEL.'</span></td>
                                                 <td>SRA Inspection: <span class="pull-right">'.$SRAInspection.'</span></td>  
                                              </tr>
                                            <tr>                                             
                                               <td>Dispatch Fee: <span class="pull-right">'.$DispatchFee.'</span></td>  
                                               <td>Bad Cargo:<span class="pull-right">'.$BadCargo.'</span></td>
                                           


                                              </tr>
                                            <tr>
                                              <td>Storage: <span class="pull-right">'.$Storage.'</span></td>
                                              <td>BPI Inspection: <span class="pull-right">'.$BPIInspection.'</span></td>  
                                              </tr>
                                            <tr>                                            
                                                  <td>Other Fees: <span class="pull-right">'.$OtherFees.'</span></td> 
                                              </tr>
                                              <tr>
                                                  <td> </td>
                                                  <td>Sub Total:<span class="pull-right">'.$subtotal.'</span></td> 
                                              </tr>

                                          '; 
                                 }       


                  echo         '</table>
                       </div>
              <br>
      </div>
          <table style="width:100%">
            <th><span style="font-size:10px;" >Confidential | Proprietory</span></th>
          </table>
      </div>
      '?>
        
        <script> 
          print = $('.change_print<?php echo $i;?>').html();
          $.ajax({
              method: "POST",
            url: "<?php echo base_url('Email/autoemail');?>",
              data: { 
                print:print,
                email:"<?php echo $emailadd; ?>",
                jbfl_send:"<?php echo $jbfl_send;?>"
              }
          })
           .done(function(data){

            alert(data);
           });
        </script>

      <?php ;
      //  $data['content'] = $data_content;
      //  $this->load->view('print/print_data',$data);
        }

     }
          //get the consignee of air



 }

function today_air(){
  echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
   $this->email->clear(TRUE);
 $date =  date('Y-m-d');
 $date_now = explode(' ',$date);
$now = $date_now[0];

      $jbs_air='';
      $jobs_air = $this->Jobdata->Today_air(); 
      foreach ($jobs_air as $row) {
          $data_air = $row->DateUpdated;
         $date_explode = explode(' ',$data_air);
         $date_airs = $date_explode[0];
         if($date_airs==$now){
           //jobfile in air
            $jbfl_a =  $row->JobFileNo;
            $jbs_air.= ','.'\''.$jbfl_a.'\'';
         }
      }
      $jb_a_final = substr($jbs_air,1);

          if($jb_a_final!=''){
        $jb_a = $this->Jobdata->get_email_jobfile_autoemail_air($jb_a_final);
        $jb_as = $this->Jobdata->get_email_jobfile_autoemail_air($jb_a_final);
        $i=0;
      
        foreach($jb_a as $row){
        $this->m_pdf->pdf->mirrorMargins  = 1;
        $jobfile=  $row->JobFileNo;

        //comodity
        $comodity =  $this->Jobdata->get_goods_air($jobfile);
        //status
        $status =  $this->Jobdata->get_status_air($jobfile);
        //charges
        $charges =  $this->Jobdata->get_charges_email_air($jobfile);


        $emailadd  =     $row->EmailAddress;
        $jbfl_send =     $row->JobFileNo;

/*        echo $i ;
         
            if ($i % 2) {
              $header_even =  ' even-header-name: html_myHeader_even'.$i.';';
            } else { 
              $header_odd =  'odd-header-name: html_myHeader_odd'.$i.';';
            }
            echo $page = $header_even.$header_odd;
*/
        $i++;
        echo  '
        <html >
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="text/html">

        
        <body>
        <div class="change_print'.$i.'"  > 
           <style>
              @page {
                size: auto;
                 odd-header-name: html_myHeader_odd1;
                 odd-header-name: html_myHeader_odd3;
                 odd-header-name: html_myHeader_odd5;
                 odd-header-name: html_myHeader_odd7;
                 odd-header-name: html_myHeader_odd9;

                 even-header-name: html_myHeader_even2;
                 even-header-name: html_myHeader_even4;
                 even-header-name: html_myHeader_even6;
                 even-header-name: html_myHeader_even8;
                 even-header-name: html_myHeader_even10;

                 odd-footer-name: html_myFooter_odd1;
                 odd-footer-name: html_myFooter_odd3;
                 odd-footer-name: html_myFooter_odd5;
                 odd-footer-name: html_myFooter_odd7;
                 odd-footer-name: html_myFooter_odd9;

                 even-footer-name: html_myFooter_even2;
                 even-footer-name: html_myFooter_even4;
                 even-footer-name: html_myFooter_even6;
                 even-footer-name: html_myFooter_even8;
                 even-footer-name: html_myFooter_even10;
              }
              @page chapter2 {
                  odd-header-name: myHeader_odd1;
                  even-header-name:myHeader_even2;
                  odd-footer-name: myFooter_odd1;
                  even-footer-name: myFooter_even2;

                 odd-header-name: myHeader_odd1;
                 odd-header-name: myHeader_odd3;
                 odd-header-name: myHeader_odd5;
                 odd-header-name: myHeader_odd7;
                 odd-header-name: myHeader_odd9;

                 even-header-name: myHeader_even2;
                 even-header-name: myHeader_even4;
                 even-header-name: myHeader_even6;
                 even-header-name: myHeader_even8;
                 even-header-name: myHeader_even10;

                 odd-footer-name: myFooter_odd1;
                 odd-footer-name: myFooter_odd3;
                 odd-footer-name: myFooter_odd5;
                 odd-footer-name: myFooter_odd7;
                 odd-footer-name: myFooter_odd9;

                 even-footer-name: myFooter_even2;
                 even-footer-name: myFooter_even4;
                 even-footer-name: myFooter_even6;
                 even-footer-name: myFooter_even8;
                 even-footer-name: myFooter_even10;

              }


              </style>
              </br>
          <div style="font-family:Century Gothic;" class="mycontent">
              <div style="font-size:22px;" class="">
        
              <table class="table-bordered">
                <tr>
                 <td class"col-md-6"><b>  Jobfile Number: </b></td>
                 <td class="col-md-6 jbfl">'.$row->JobFileNo.' </td>
                </tr>

               <tr>
                 <td class="col-md-3">Shipper:</td>
                 <td class="col-md-6 shipper">'.$row->ShipperName.'</td> 
                </tr>

                <tr>
                 <td class="col-md-3 ">Consignee:</td>
                 <td class="col-md-6 consignee">'.$row->ConsigneeName.'</td>  
                </tr>

                <tr>
                 <td class="col-md-3">Date Received of other Documents:</td>
                 <td class="col-md-6 dt_recieved">'.$row->DateReceivedOfOtherDocs.'</td> 
                </tr>

                <tr>
                 <td class="col-md-3 ">Aircraft :</td>
                 </tr>
                  <tr>
                  <td><span style="margin-left: 10%;">ATA of Aircraft No </span></td>
                  <td>'.$row->ATA.' </td>
                  </tr>
                  </tr>
                <tr>
                    <td class="col-md-3 ">HBL# :</td>
                    <td class="col-md-6 hbl">'.$row->HouseBillLadingNo.'</td> 
                 </tr>
                 </br>
                  <h4>AIR FREIGHT</h4>
                  </br>';
                    if($jb_as==NULL){
                        echo '<p style="color:red">No Aircraft Yet</p>';
                    }else{
                              echo   '<table  border="1" style="width:100%">
                                      <tr>
                                      <th>No.</th>
                                      <th>Aircraft</th>
                                      <th>Flight Number</th>
                                      </tr>
                               ';
                                    $i_air=0;
                                    foreach ($jb_as as $row_airs) {
                                      $air = $row_airs->Aircraft;
                                      $FlightN = $row_airs->FlightNo;

                                        if($air!=''){
                                         $i_air++; 
                                        
                                            echo  '
                                                      <td >'.$i_air.'</td>
                                                      <td >'.$air.'</td>
                                                      <td >'.$FlightN.'</td>
                                                  '; 
                                        }
                                      }

                                   
                                echo '
                                      </tr> 
                                      </table>';
                  }

          echo '</div>
              <br>
              <hr>          
                        <h4>Commodity</h4>
                     <div>';
                         if($jb_as==NULL){
                            echo '<p style="color:red">No Aircraft Yet</p>';
                         }else{    
                               echo '<table  border="1"  style="width:100%">
                                    <th>No.</th>
                                    <th>Container No.</th>
                                    <th>Commodity</th>';

                                            $i_comodity=0;
                                            foreach ($comodity as $row_comodity) {
                                            $i_comodity++;
                                            $contno  =    $row_comodity->ContainerNo;
                                            $prod    =    $row_comodity->ProductName;


                                            echo   '
                                                      <tr>
                                                        <td>'.$i_comodity.'</td>
                                                        <td>'.$contno.'</td>
                                                        <td>'.$prod.' </td>
                                                      </tr>
                                                    '; 
                                           }         


                              echo '</table>';
                          }
                      
                   echo '</div>
              <br>
              <hr>
                    <h4> Status Reports </h4>';
                         if($jb_as==NULL){
                            echo '<p style="color:red">No Status Report Yet</p>';
                         }else{  

                               echo'<table  border="1"  style="width:100%">
                                  <th>Date Added</th>
                                  <th>Status Description</th>


                                ';
                                    

                                    foreach ($status as $row_status) {
            
                                    $dateadd           =    $row_status->DateAdded;
                                    $status            =    $row_status->StatusDescription;


                                    echo   '
                                              <tr>
                                                <td>'.$dateadd.'</td>
                                                <td>'.$status.'</td>
                                              </tr>
                                            '; 
                                   }       


                              echo '</table>';
                        }     
              echo '<br>
              <hr>          
                        <h4>Running Charges</h4>
                        <div>
                                <table  border="1" style="width:100%">
                              ';
                                  

                                  foreach ($charges as $row_charges) {
          
                                  $LodgementFee                =    $row_charges->LodgementFee;
                                  $BreakBulkFee                =    $row_charges->BreakBulkFee;
                                  $StorageFee                  =    $row_charges->StorageFee;
                                  $BadCargoOrderFee            =    $row_charges->BadCargoOrderFee;
                                  $VCRC                        =    $row_charges->VCRC;
                                  $CNI                         =    $row_charges->CNI;
                                  $CNIU                        =    $row_charges->CNIU;
                                  $OtherFees                   =    $row_charges->OtherFees;

                                  $LodgementFee      = ($LodgementFee     == 0 ? number_format((float)$LodgementFee, 2, '.', ''):$LodgementFee);
                                  $BreakBulkFee      = ($BreakBulkFee     == 0 ? number_format((float)$BreakBulkFee, 2, '.', ''):$BreakBulkFee);
                                  $StorageFee      = ($StorageFee     == 0 ? number_format((float)$StorageFee, 2, '.', ''):$StorageFee);
                                  $BadCargoOrderFee      = ($BadCargoOrderFee     == 0 ? number_format((float)$BadCargoOrderFee, 2, '.', ''):$BadCargoOrderFee);
                                  $VCRC      = ($VCRC     == 0 ? number_format((float)$VCRC, 2, '.', ''):$VCRC);
                                  $CNI      = ($CNI     == 0 ? number_format((float)$CNI, 2, '.', ''):$CNI);
                                  $CNIU      = ($CNIU     == 0 ? number_format((float)$CNIU, 2, '.', ''):$CNIU);
                                  $OtherFees         = ($OtherFees == 0 ? number_format((float)$OtherFees, 2, '.', ''):$OtherFees);   


                                  $subtotal = 
                                                 $LodgementFee+$BreakBulkFee+$StorageFee+$BadCargoOrderFee+$VCRC+
                                                 $CNI+$CNIU+$OtherFees;

                                  




                                  echo   '
                                            <tr>
                                              <td>Lodgement Fee:<span class="pull-right">'.$LodgementFee.'</span></td>
                                              <td>Break Bulk Fee: <span class="pull-right">'.$BreakBulkFee.'</span></td>  
                                            </tr>
                                            <tr>
                                               <td>Storage Fee: <span class="pull-right">'.$StorageFee.'</span></td>
                                               <td>Bad Cargo Order Fee: <span class="pull-right">'.$BadCargoOrderFee.'</span></td>
                                         
                                     
                                           </tr>
                                            <tr>
                                                 <td>VCRC: <span class="pull-right">'.$VCRC.'</span></td>
                                                 <td>CNI: <span class="pull-right">'.$CNI.'</span></td> 
                                              
                                              
                                            </tr>
                                            <tr>       
                                               <td>CNIU: <span class="pull-right">'.$CNIU.'</span></td>   
                                               <td>Other Fees: <span class="pull-right">'.$OtherFees.'</span></td>   
                                              </tr>
                                              <tr>
                                                  <td></td>
                                                  <td>Sub Total:'.$subtotal.'</td>
                                              </tr>
                                           
                                          '; 
                                 }       


                  echo         '</table>
                       </div>
              <br>
      </div>';

          for ($footer_header = 1; $footer_header <= 10; $footer_header++) {
               if ($footer_header % 2) {
  echo '               <htmlpageheader name="myHeader_odd'.$footer_header.'" style="display:none">
                               <span style="font-size:10px;">'.date('Y-m-d').'</span>
                              <table style="width:100%">
                                 <th><span style="font-size:10px;">FILPORT  DOCUMENT</span></th>
                              </table>
                       </htmlpageheader>

                        <htmlpagefooter name="myFooter_odd'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
                              color: #000000; font-weight: bold; font-style: italic;"><tr>
                              <td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
                              <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Confidential | Proprietory</span></td>
                              <td width="33%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
                              </tr></table>
                        </htmlpagefooter>



                       ';
                  } else {
  echo '                 <htmlpageheader name="myHeader_even'.$footer_header.'" style="display:none">
                               <span style="font-size:10px;">'.date('Y-m-d').'</span>
                              <table style="width:100%">
                                 <th><span style="font-size:10px;">FILPORT  DOCUMENT</span></th>
                              </table>
                         </htmlpageheader>

                        <htmlpagefooter name="myFooter_even'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
                              color: #000000; font-weight: bold; font-style: italic;"><tr>
                              <td width="33%"><span style="font-weight: bold; font-style: italic;">{DATE j-m-Y}</span></td>
                              <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Confidential | Proprietory</span></td>
                              <td width="33%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
                              </tr></table>
                          </htmlpagefooter>


                         ';
                  }
            }
        



        
       
    echo '</div>
      </body>
      </html>
     
            '?>
        <script> 
          print = $('.change_print<?php echo $i;?>').html();
          $.ajax({
              method: "POST",
            url: "<?php echo base_url('Email/autoemail');?>",
              data: { 
                print:print,
                email:"<?php echo $emailadd; ?>",
                jbfl_send:"<?php echo $jbfl_send;?>"
              }
          })
           .done(function(data){
           alert(data);
           });
        </script>

      <?php ;

        }
     }
}


 function autoemail(){


    $this->email->clear(TRUE);
      $datePath = './resources/pdf/' .date('Y-m-d');
      $filePath = './resources/pdf/' .date('Y-m-d') . '/';
      $date = date('Y-m-d');
      $path =  './resources/pdf/';



      
      $print     =  $this->input->post('print');
    echo   $email     =  $this->input->post('email');
    echo   $jbNo =  $this->input->post('jbfl_send');

     //$print =  '<script>document.write(p);</script>'; 

      //generate the PDF from the given html

          $this->m_pdf->pdf->mirrorMargins  = 1;
          $this->m_pdf->pdf->WriteHTML($print);
           //eli's code
            if(!is_dir($path)){ //create the folder if it's not already exists
              mkdir($path, 0777, TRUE);
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
               }
            }else{ // if the folder already exist
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
            }

                                    //download file

           
                    $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
           
                    //email
                    $config['protocol']    = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '20';
                    $config['smtp_user']    = 'eli@topconnection.asia';
                    $config['smtp_pass']    = 'asiagroup7';
                    $config['charset']    = 'utf-8';
                    
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'text'; // or html
                    $config['validation'] = TRUE; // bool whether to validate email or not      

                    $this->email->initialize($config);


                    $this->email->from('eli@topconnection.asia', 'eli');
                    $this->email->to($email); 
                    $this->email->cc('daniel.tenefrancia@gmail.com');
                    $this->email->subject('Filport Testing');
                    $this->email->message('Email Testing.'); 
                    $this->email->attach($filePath.$jbNo."-" . $date ."-report.pdf",'F'); 
                    $this->email->send();
                    echo $this->email->print_debugger();
               }
            }







        //if($checker==1){

           // $checker=0;
      //  }
// }
}
?>