<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
class Print_Report_Consolidated extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            $this->load->model('RunningCharges_Reports','Charges');
            $this->load->model('Jobdata');  
            $this->load->library('email');
            $this->load->library('m_pdf');
            $this->load->helper('file');
            $this->load->helper('download');
       }

  function index(){
          $ataFrom              =  $this->input->get('frm');  
          $ataTo                =  $this->input->get('to');  
          $monitoringType       =  $this->input->get('montype');
          $cID                  =  $this->input->get('cID');
          $poNum                 =  $this->input->get('poNum');
          
          $documnt = $this->createDocToPrint($monitoringType,$cID,$ataFrom,$ataTo,$poNum);
          $mpdf->useSubstitutions=false;
          $mpdf->simpleTables = true;
          $this->m_pdf->pdf->AddPage('L');
          $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
          $this->m_pdf->pdf->WriteHTML($stylesheet,1);
          $this->m_pdf->pdf->WriteHTML($documnt);
          $this->m_pdf->pdf->Output();
          //echo $documnt;
  }

  function createDocToPrint($monitoringType,$cID,$ataFrom,$ataTo,$poNum){
         $consolidations = $this->loadConsolidatedDocs($monitoringType,$cID,$ataFrom,$ataTo,$poNum);
         $dispOutput = '';
         $monHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }

         $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
       
         $dispOutput .= '
            <html>
              <style>
                img, td, th { page-break-inside: avoid }
              </style>
              <body>
                <div class="col-md-12" style="text-align:center;">
                 <span >FIL-PORT EXPRESS BROKERAGE, INC.</span>
                </div>
                <div class="change_print'.$i.'"  >  

                ' . $footer . '

                <div class="mycontent">
                    <div style="font-size:16px;" class="">
             <div>
              <span><b> Consolidated Reports </b></span><br>
              <span style="font-size:14px;">'.$monHeader.'</span>
                <br>
                <br>
             <div class="col-md-12" style="font-size:16px;">
                  <table class="table table-bordered" style="width:100%;font-family:Century Gothic;" style="white-space:wrap;">
                      
                      <tr>
                        <th style="text-align:left">
                          <span class=""> 
                          Actual Arrival Time :
                          </span>
                        </th>
                        <td>
                          <span class="">
                             From :  ' . $ataFrom . ' To : ' . $ataTo . '
                          </span>
                        </td>
                      </tr>
                  </table>
                </div>
                <hr>' . $consolidations;   

          $dispOutput .= '
              </tbody>
            </table>
          </div> 
          </div>'  . $footer_proprietary . $footer .'
          </body>
      </html>'; 
      return $dispOutput;
  }

  function loadConsolidatedDocs($monitoringType,$cID,$ataFrom,$ataTo,$poNum){
       $consolidateReport = $this->Charges->getConsolidated($monitoringType,$cID,$ataFrom,$ataTo,$poNum);
       $oldJBNo = '';
         if($monitoringType == 1 || $monitoringType == 2){
            if(count($consolidateReport) > 0){
               $dispOutput .="<table class ='table table-bordered'>
                          <thead>
                          <tr>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival Time</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Volume</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>BL No.</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Received Docs</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Pre-Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Final Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Paid</th>";
                            if($monitoringType == 1){
                            $dispOutput .= "<th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                            }
                            
               $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Running Charges</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Status Report</th>
                          </tr>
                          </thead>
                          <tbody>
                          "; 
                foreach ($consolidateReport as $row){
                      if($oldJBNo != $row->JobFileNo){
                           $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                      <td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>
                                      <td style='padding:10px;'>" . $volume . "</td>
                                      <td style='padding:10px;'>" . $row->HouseBillLadingNo . "</td>
                                      <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                      <td style='padding:10px;'>" . $row->DateReceivedOfOtherDocs . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentPreAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentFinalAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DatePaid . "</td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td style='padding:10px;'>" . $row->GateInAtPort . "</td>
                                                        <td style='padding:10px;'>" . $row->GateOutAtPort . "</td>";
                                      }

                                      
                          $dispOutput .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td style='padding:10px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                      <td style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Storage,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Demorage,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . $row->Description . "</td>
                                    </tr>";
                      }else{
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td style='padding:10px;'>" . $row->ProductName . "</td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td > </td>
                                                       <td > </td>";
                                      }
                                      
                           $dispOutput .= "
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                    </tr>";
                      }
                   
                      $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
            }else{
              if(count($consolidateReport) > 0){
               $dispOutput .="<table class ='table table-bordered'>
                                <thead>
                                <tr>
                                  <th style='border:1px solid gray'>Jobfile No</th>
                                  <th style='border:1px solid gray'>Actual Arrival Time</th>
                                  <th style='border:1px solid gray'>Weight(kgs)</th>
                                  <th style='border:1px solid gray'>House Airway Bill No.</th>
                                  <th style='border:1px solid gray'>Commodity</th>
                                  <th style='border:1px solid gray'>Date Received Docs</th>
                                  <th style='border:1px solid gray'>Pre-Assessment Date</th>
                                  <th style='border:1px solid gray'>Final Assessment Date</th>
                                  <th style='border:1px solid gray'>Date Paid</th>
                                  <th style='border:1px solid gray'>Target Delivery Date</th>
                                  <th style='border:1px solid gray'>Actual Date of Delivery</th>
                                  <th style='border:1px solid gray'>Total Storage</th>
                                  <th style='border:1px solid gray'>Running Charges</th>
                                  <th style='border:1px solid gray'>Status Reports</th>
                                </tr>
                                </thead>
                                <tbody>
                          "; 
                foreach ($consolidateReport as $row){

                    if($oldJBNo != $row->JobFileNo){
                          $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                          $dispOutput .= "<tr>
                                      <td>" . $row->JobFileNo . "</td>
                                      <td>" . $row->ATA . "</td>
                                      <td>" . $volume . "</td>
                                      <td>" . $row->HouseBillLadingNo . "</td>
                                      <td>" . stripslashes($row->ProductName) . "</td>
                                      <td>" . $row->DatePickUpOtherDocs . "</td>
                                      <td>" . $row->DateSentPreAssessment . "</td>
                                      <td>" . $row->DateSentFinalAssessment . "</td>
                                      <td>" . $row->DatePaid . "</td>
                                      <td>" . $row->TargetDeliveryDate . "</td>
                                      <td>" . $row->DateReceivedAtWhse . "</td>
                                      <td>" . $row->StorageFee . "</td>
                                      <td>" . $row->Total_Charges . "</td>
                                      <td>" . $row->Description . "</td>
                                    </tr>";
                    }else{
                      $dispOutput .= "<tr>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <t style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                    </tr>";
                    }
                 

                    $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
           }

      return $dispOutput;

  }


}

?>