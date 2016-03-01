<?php

 date_default_timezone_set('Asia/Manila');
class Print_file extends CI_Controller {

     public function __construct()
       {
            parent::__construct();

            $this->load->model('Jobdata');  
            $this->load->library('email');
            $this->load->library('m_pdf');
            $this->load->helper('file');
            $this->load->helper('download');
       }

function index(){
       $jbNo    = $this->input->get('jbNo');
       $montype = $this->input->get('montype');
       $to_print = $this->createDoc($jbNo,$montype);

       /* $this->m_pdf->pdf->SetWatermarkText('Confidential/Proprietory');
        $this->m_pdf->pdf->showWatermarkText = true;*/
        $this->m_pdf->pdf->mirrorMargins  = 1;
        $this->m_pdf->pdf->WriteHTML($to_print);
        $this->m_pdf->pdf->Output();
  }



function send_mail(){

  $jbNo    = $this->input->post('jbNo');
  $montype = $this->input->post('montype');

  $toSend = $this->createDoc($jbNo,$montype);
  $dateSend =  date('Y-m-d H:i:s a');


  
  $datePath = './resources/pdf/' .date('Y-m-d');
     
      $filePath = './resources/pdf/' .date('Y-m-d') . '/';
      $date = date('Y-m-d');
      $path =  './resources/pdf/';

         //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($toSend);

        //eli's code
            if(!is_dir($path)){ //create the folder if it's not yet existing
              mkdir($path, 0777, TRUE);
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
               }
            }else{ // if the folder already exist
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
               }
            }
          

            //email
          if(is_dir($datePath)){
            //you can send email again with the same date,jobfile
            if(is_dir($datePath)){
                  $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');

                    $consignee = $this->Jobdata->get_email_jobfile($jbNo,$montype);
                    foreach($consignee as $row){
                     echo "Email Successfully Sent to " . '</br>';
                     echo "Consignee: ".$consign = $row->ConsigneeName . '</br>';
                     echo "Email: "    .$emailadd = $row->EmailAddress;
                    }


                  //email
                  /*ONLINE*/
                  $config['protocol'] = 'sendmail'; 
                  $config['smtp_host']    = 'smtpout.secureserver.net';
                  $config['smtp_port']    = '80';
                  $config['smtp_timeout'] = '20';
  /*                $config['smtp_user']    = 'filportsupport@topconnection.com';
                  $config['smtp_pass']    = 'asiagroup7';*/
                  $config['charset']    = 'utf-8';
                  $config['newline']    = "\r\n";
                  $config['mailtype'] = 'text'; // or html
                  $config['validation'] = TRUE; // bool whether to validate email or not     

                  /*LOCALHOST*/
/*                  $config['protocol']    = 'smtp';
                  $config['smtp_host']    = 'ssl://smtp.gmail.com';
                  $config['smtp_port']    = '465';
                  $config['smtp_timeout'] = '7';
                  $config['smtp_user']    = 'eli@topconnection.asia';
                  $config['smtp_pass']    = 'asiagroup7';
                  $config['charset']    = 'utf-8';
                  $config['newline']    = "\r\n";
                  $config['mailtype'] = 'text'; // or html
                  $config['validation'] = TRUE; // bool whether to validate email or not   */    

                  $this->email->initialize($config);

                  $always = $this->Jobdata->get_allways_email();
                  $ccme = array();
                       foreach($always as $row){
                        $ccme[] =  $row->EmailAddress;
                       }
                  
                  //$alwaysCc=array('mbtreyes@filport.com','ecnunga@filport.com');
                  if($montype=='1'){
                    //manila
                       $get_manila= $this->Jobdata->get_email_manila();
                        foreach($get_manila as $row){
                          $man_email =  $row->EmailAddress;
                           array_push($ccme,$man_email);
                        }
                    //  array_push($alwaysCc,'jdmendoza@filport.com','zsdemesa@filport.com');
                  }elseif ($montype=='2') {
                    //outport
                       $get_outport = $this->Jobdata->get_email_outport();
                       foreach($get_outport as $row){
                         $out_email = $row->EmailAddress;
                         array_push($ccme,$out_email);
                       }
                     // array_push($alwaysCc,'jcgalang@filport.com');
                  }else{
                    //air
                       $get_air = $this->Jobdata->get_email_air();
                        foreach($get_air as $row){
                         $air_email =  $row->EmailAddress;
                         array_push($ccme,$air_email);
                        }
                      //array_push($alwaysCc,'jfcanindo@filport.com');
                  }
                  $this->email->from('eli@topconnection.asia','Topconnection Asia');
                  //$this->email->to($emailadd);
                  $this->email->to('eliseo.montefalcon@gmail.com','eli@topconnection.asia');
                  $this->email->cc($ccme); 
                  $this->email->reply_to('eli@topconnection.asia','Topconnection Asia');
                 $this->email->subject('Filport Email Testing');
               /*   $this->email->subject('Filport Document  Jobfile No : ' . $jbNo);*/
                  $this->email->message('Please reply if you recieved this email for confirmation,Thanks!');
                /*  $this->email->message("Status Report of \r\nJobfile No : " . $jbNo . "\r\nSent: " . $dateSend); */
                  $this->email->attach($filePath.$jbNo."-" . $date ."-report.pdf",'F'); 
                  $this->email->send();
            }
          }

} 


function createDoc($jbNo , $montype){
$shipperName;
$consigneeName;
$DateReceivedOfOtherDocs;
$HBL;

$date =  date('Y-m-d');
$date_now = explode(' ',$date);
$now = $date_now[0];
/*GET CONTAINER CONTENT START*/
$container =  $this->Jobdata->get_containers($jbNo,$montype);
$container_content = '';
   if($montype == 3){
    $container_content = '<b>AirCraft</b><br>';
     if(count($container) == 0){
              $container_content = '<center><span style="color:red">No Aircraft Data </span></center>';
        }else{
             $container_content .=  "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;border: 1px solid gray;width:100%'>
                  <tr>
                        <th style='border: 1px solid gray'>No.</th>
                        <th style='border: 1px solid gray'>AirCraft</th>
                        <th style='border: 1px solid gray'>Flight Number</th>
                  </tr>";

              $i=0;
             foreach($container as $row){
              $i++;
                 $container = $row->Aircraft;
                if($i==1){
                 if($container==''){
                   $container_content .=    '</table>';
                   $container_content =    '<center><span style="color:red">No Aircarft Data </span></center>';
                  break;
                 }
                }
                 $container_content .=     "<tr>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".$i."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->Aircraft)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->FlightNo)."</td>";
                 $container_content .=     "</tr>";
             }
             $container_content .=     "</table>";
        }

   }else{
       $container_content = '<b>Containers</b><br><br>';
        if(count($container) == 0){
              $container_content = '<center><span style="color:red">No Containers Yet </span></center>';
        }else{
             $container_content .=     "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;border: 1px solid gray;width:100%;'>
                  <tr>
                        <th style='border: 1px solid gray'>No.</th>
                        <th style='border: 1px solid gray'>Container Number</th>
                        <th style='border: 1px solid gray'>Date File Entry to BOC</th>
                        <th style='border: 1px solid gray'>Date Sent Pre Assessment</th>
                        <th style='border: 1px solid gray'>Date Sent Final Assessment</th>
                        <th style='border: 1px solid gray'>Date Paid</th>
                        <th style='border: 1px solid gray'>Target Delivery Date</th>
                        <th style='border: 1px solid gray'>Actual Delivery At Warehouse</th>
                  </tr>";

              $i=0;
             foreach($container as $row){
              $i++;
                 $container = $row->ContainerNo;
                if($i==1){
                 if($container==''){
                   $container_content .=        '</table>';
                   $container_content =        '<center><span style="color:red">No Containers Yet </span></center>';
                  break;
                 }
                }
                 $container_content .=     "<tr>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".$i."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->ContainerNo)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateFileEntryToBOC)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateSentPreAssessment)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateSentFinalAssessment)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DatePaid)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->TargetDeliveryDate)."</td>";
                 $container_content .=     "<td class='row' style='border: 1px solid gray'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
                 $container_content .=     "</tr>";
             }
             $container_content .=     "</table>";
        }
   }

/*GET CONTAINER CONTENT END*/

/*GET PRODUCTS CONTENT START*/

if($montype == 3){
       $product  = $this->Jobdata->get_goods_air($jbNo);
     }else{
       $product  = $this->Jobdata->get_goods($jbNo);
     }
            
    if($product==NULL){
         $product_content = '<center><span style="color:red">No Commodities Yet </span></center>';
    }else{
          if($montype == 3){
              $product_content .= "<table id='tbl-second-report-data' class='table table-striped table-layout:fixed' style='cursor:pointer;border: 1px solid gray;width:100%'>
              <tr>
                   <th style='border: 1px solid gray'><center>No.</center></th>
                   <th style='border: 1px solid gray'><center>Commodity</center></th>
              </tr>";
          }else{
            $product_content .= "<table id='tbl-second-report-data' class='table table-striped table-layout:fixed' style='cursor:pointer;border: 1px solid gray;width:100%'>
              <tr>
                   <th style='border: 1px solid gray'><center>No.</center></th>
                   <th style='border: 1px solid gray'><center>Container No.</center></th>
                   <th style='border: 1px solid gray'><center>Commodity</center></th>
              </tr>";
          }
          $i=0;
         foreach($product as $row){
          $i++;
          if($i==1){
             if($row->ProductName==''){
                $product_content .= "</table>";
                $product_content .= '<center><span style="color:red">No Goods Yet </span></center>';
                break;
              }
          }else{
              if($row->ProductName==''){
                break;
              }
          }
          if($montype == 3){
             $product_content .= "<tr>";
             $product_content .= "<td style='border: 1px solid gray'>". $i ."</td>";
             $product_content .= "<td style='border: 1px solid gray'>".stripslashes($row->ProductName)."</td>";
             $product_content .= "</tr>";
          }else{
             $product_content .= "<tr>";
             $product_content .= "<td style='border: 1px solid gray'>". $i ."</td>";
             $product_content .= "<td style='border: 1px solid gray'>".stripslashes($row->ContainerNo) ."</td>";
             $product_content .= "<td style='border: 1px solid gray'>".stripslashes($row->ProductName)."</td>";
             $product_content .= "</tr>";
          }
         }
         $product_content .= "</table>";
    }

/*GET PRODUCTS CONTENT END*/

/*GET CHARGES CONTENT START */

$charge  = $this->Jobdata->get_chargess($jbNo,$montype);
     $charges_content = '';
     $total = 0;
     if(count($charge) > 0){
         foreach($charge as $row){
                if($montype == 3){
                     $total += $row->LodgementFee;
                     $total += $row->BreakBulkFee;
                     $total += $row->StorageFee;
                     $total += $row->BadCargoOrderFee;
                     $total += $row->VCRC;
                     $total += $row->CNI;
                     $total += $row->CNIU;
                     $total += $row->OtherFees;
                     $charges_content = '
                      <table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%text-align:left;border:1px solid gray;">
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Lodgement Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->LodgementFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Break Bulk Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->BreakBulkFee, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b> Storage Fee : </b>
                                <span class="pull-right">
                                   '.number_format($row->StorageFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Bad Cargo Order Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->BadCargoOrderFee, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  VCRC : </b>
                                <span class="pull-right">
                                   '.number_format($row->VCRC, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> CNI : </b>
                                <span class="pull-right">
                                    '.number_format($row->CNI, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> CNIU : </b>
                                <span class="pull-right">
                                   '.number_format($row->CNIU, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <b> Other Fees : </b>
                                <span class="pull-right">
                                   '.number_format($row->OtherFees, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                           
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <span class="pull-right">
                                  <b style="font-size: 18px;"> Sub Total : </b> '.number_format($total, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                      </table>';
                     
                }else{
                  $total += $row->LodgementFee;
                  $total += $row->Demorage;
                  $total += $row->ContainerDeposit;
                  $total += $row->Detention;
                  $total += $row->THCCharges;
                  $total += $row->EIC;
                  $total += $row->Arrastre;
                  $total += $row->BAIApplication;
                  $total += $row->Wharfage;
                  $total += $row->BAIInspection;
                  $total += $row->Weighing;
                  $total += $row->SRAApplication;
                  $total += $row->DEL;
                  $total += $row->SRAInspection;
                  $total += $row->BPIInspection;
                  $total += $row->DispatchFee;
                  $total += $row->BadCargo;
                  $total += $row->Storage;
                  $total += $row->OtherFees;
                  $charges_content = '
                      <table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%text-align:left;border:1px solid gray;">
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Lodgement Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->LodgementFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Demurrage : </b>
                                <span class="pull-right">
                                    '.number_format($row->Demorage, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Container Deposit : </b>
                                <span class="pull-right">
                                   '.number_format($row->ContainerDeposit, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Detention : </b>
                                <span class="pull-right">
                                    '.number_format($row->Detention, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  THC Charges : </b>
                                <span class="pull-right">
                                   '.number_format($row->THCCharges, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> EIC : </b>
                                <span class="pull-right">
                                    '.number_format($row->EIC, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Arrastre : </b>
                                <span class="pull-right">
                                   '.number_format($row->Arrastre, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  BAI Application : </b>
                                <span class="pull-right">
                                    '.number_format($row->BAIApplication, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Wharfage : </b>
                                <span class="pull-right">
                                   '.number_format($row->Wharfage, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  BAI Inspection :</b> 
                                <span class="pull-right">
                                    '.number_format($row->BAIInspection, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Weighing : </b>
                                <span class="pull-right">
                                   '.number_format($row->Weighing, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  SRA Application : </b>
                                <span class="pull-right">
                                    '.number_format($row->SRAApplication, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  DEL : </b>
                                <span class="pull-right">
                                   '.number_format($row->DEL, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  SRAInspection : </b>
                                <span class="pull-right">
                                    '.number_format($row->SRAInspection, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Dispatch Fee : </b>
                                <span class="pull-right">
                                   '.number_format($row->DispatchFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Bad Cargo : </b>
                                <span class="pull-right">
                                    '.number_format($row->BadCargo, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Storage : </b>
                                <span class="pull-right">
                                   '.number_format($row->Storage, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <b>  Other Fees : </b>
                                <span class="pull-right">
                                   '.number_format($row->OtherFees, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                           <tr>
                            <td style="border:1px solid gray;text-align: left;">
                                <b>  BPI Inspection : </b>
                                <span class="pull-right">
                                   '.number_format($row->BPIInspection, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                           
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <span class="pull-right">
                                  <b style="font-size: 18px;"> Sub Total : </b> '.number_format($total, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                      </table>';
                }
            }
     }else{
       $charges_content .= '<center><span style="color:red">No Record/s of Running Charges </span></center>';
     }
          

/*GET CHARGES CONTENT END*/


/*GET REPORTS CONTENT START*/
$reports   = $this->Jobdata->report_get_status($jbNo,$montype);

      if(count($reports)){
         $reports_content .= "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;border:1px solid gray;'>
                <tr>
                      <th style='border: 1px solid gray'>Date Added.</th>
                      <th style='border: 1px solid gray'>Status Description</th>
                </tr>";
        $i=0;
        foreach ($reports as $row) {
          $i++;
         $description = $row->StatusDescription;
         $reports_content .= " <tr>
                   <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>".$row->DateAdded."</td>
                   <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>". $description ."</td>
                </tr>
              ";
        }
         $reports_content .= "</table>";
      }else{
        $reports_content = '<center><span style="color:red">No Record of Status Report </span></center>';
      }

/*GET REPORTS CONTENT END*/


$output_print .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
     $monHeader = '';
       if($montype == 1){
        $monHeader = 'Sea Freight Manila';
       }else if ($montype == 2){
        $monHeader = 'Sea Freight Outport';
       }else{
        $monHeader = 'Air Freight';
       }
       $jobfiles = $this->Jobdata->getJobFiles_Consignee($jbNo,$montype);
       foreach($jobfiles as $row){
          $shipperName = $row->ShipperName;
          $consigneeName = $row->ConsigneeName;
          $DateReceivedOfOtherDocs = $row->DateReceivedOfOtherDocs;
          $HBL = $row->HouseBillLadingNo;
        }
                    $carriers = '';
                    if($montype == 3){
                      $carriers .= '<tr>
                                      <td style="text-align:left;">
                                         <span class="pull-left"><b>Aircraft  : </b></span>
                                      </td>
                                      <td style="text-align:left;">
                                        &nbsp;<a id="Carriers"> </a> 
                                      </td>
                                    </tr>';
                    }else{
                     $carriers .= '<tr>
                                      <td style="text-align:left;">
                                         <span class="pull-left"><b>Vessel  : </b></span>
                                      </td>
                                      <td style="text-align:left;">
                                        &nbsp;<a id="Carriers"> </a> 
                                      </td>
                                    </tr>';
                    }
                   
                    $jobfiles= $this->Jobdata->getCarriers_Consignee($consigneeName,$montype,$jbNo);
                    $ata = '';
                    $ct = count($jobfiles);
                     if($ct > 0){
                    foreach($jobfiles as $row){
                        if($montype == 3){
                            $ata .='
                                    
                                      <tr>
                                            <td style="text-align:left;font-style:12px;padding-left:50px;"><b>ATA of Aircraft No '.stripslashes($row->VesselNumber).'</b></td>
                                            <td style="text-align:left;font-style:12px;">'.stripslashes($row->ActualArrivalTime).'</td>
                                      </tr>
                            ';
                          }else{
                            $ata .='
                                      <tr>
                                            <td style="text-align:left;font-style:12px;padding-left:50px;"><b>ATA of Vessel '.stripslashes($row->VesselNumber).'</b></td>
                                            <td style="text-align:left;font-style:12px;">'.stripslashes($row->ActualArrivalTime).'</td>
                                      </tr>
                            ';
                          }
                    }
                    }else{
                       $ata .= ' <tr>
                                          <td style="text-align:left;font-style:15px;">No Data for Vessels</td>
                                        </tr>
                                      ';
                    }
                    $hbl .='
                    <tr>
                      <td style="text-align:left;">
                         <span class="pull-left"><b> HBL#  : </b></span>
                      </td>
                      <td style="text-align:left;">
                      &nbsp;<a id="hbl">' . $HBL . ' </a> 
                      </td>
                    </tr>
                  </table>';

       $footer_proprietary .='
      </div>
              <br>
      </div>
          <table style="width:100%">
            <th><span style="font-size:10px;" >Confidential | Proprietory</span></th>
          </table>
      </div>
      ';

         for($footer_header = 1; $footer_header <= 10; $footer_header++) {
               if ($footer_header % 2) {
               $footer .= '<htmlpageheader name="myHeader_odd'.$footer_header.'" style="display:none">
                               <span style="font-size:10px;">'.date('Y-m-d').'</span>
                                 <table style="width:100%;text-align:center;">
                                 <tr><td><span style="text-align:center;font-size:10px;"><b> FILPORT DOCUMENT </b></span> </td></tr>
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
                $footer .= ' <htmlpageheader name="myHeader_even'.$footer_header.'" style="display:none">
                               <span style="font-size:10px;">'.date('Y-m-d').'</span>
                                <table style="width:100%;text-align:center;">
                                 <tr><td><span style="text-align:center;font-size:10px;"><b> FILPORT DOCUMENT </b></span> </td></tr>
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

$output_print .=  '
        <html>
        
        <body>
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
          <div class="change_print'.$i.'"  >  

          ' . $footer . '

          <div style="font-family:Century Gothic;" class="mycontent">
              <div style="font-size:22px;" class="">
        
          </BR>
          </br>
                  <h5>'.$monHeader.'</h5>
                  </br><table class="table-bordered">
                              <tr>
                               <td class"col-md-6"><b>  Jobfile Number: </b></td>
                               <td class="col-md-6 jbfl">'. $jbNo .' </td>
                              </tr>

                             <tr>
                               <td class="col-md-3">Shipper:</td>
                               <td class="col-md-6 shipper">'.$shipperName.'</td> 
                              </tr>

                              <tr>
                               <td class="col-md-3 ">Consignee:</td>
                               <td class="col-md-6 consignee">'.$consigneeName.'</td>  
                              </tr>

                              <tr>
                               <td class="col-md-3">Date Received of other Documents:</td>
                               <td class="col-md-6 dt_recieved">'.$DateReceivedOfOtherDocs.'</td> 
                              </tr>'
                                  . $carriers  . $ata . $hbl . 
                               '
                        </table>

                     '   
                 . $footer_proprietary . $footer .
                ' <hr> ' . 
                  $container_content
                . '<br>
                <hr> <b> Commodities <b> <br><br>' . 
                  $product_content
                . '<br>
                <hr> <b> Status Reports <b> <br><br>' . 
                  $reports_content
                .'<br>
                <hr> <b> Running Charges <b> <br><br>' . 
                  $charges_content
                .'
               </body>
      </html>';

      return $output_print;
  }

     function eli(){
               $this->load->library('email');

     /*       $config['protocol']    = 'smtp';

            $config['smtp_host']    = ' smtpout.secureserver.net';

            $config['smtp_port']    = '80';*/

            $config['protocol'] = 'sendmail'; 
            $config['smtp_port']    = '80';
            $config['smtp_timeout'] = '20';
            $config['smtp_timeout'] = '0';
/*            $config['smtp_user']    = 'eli@topconnection.asia';

            $config['smtp_pass']    = 'asiagroup7';*/

            $config['charset']    = 'utf-8';

            $config['newline']    = "\r\n";

            $config['mailtype'] = 'text'; // or html

            $config['validation'] = TRUE; // bool whether to validate email or not      

            $this->email->initialize($config);


            $this->email->from('eli@topconnection.asia', 'eli');
            $this->email->to('eliseo.montefalcon@gmail.com'); 


            $this->email->subject('Email Test');

            $this->email->message('hoy eli !! haha.');  

            $this->email->send();

            echo $this->email->print_debugger();
   }

}

?>