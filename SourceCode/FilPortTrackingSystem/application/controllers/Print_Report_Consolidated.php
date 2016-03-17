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
                <div class="change_print'.$i.'"  >  

                ' . $footer . '

                <div style="font-family:Century Gothic;" class="mycontent">
                    <div style="font-size:22px;" class="">
              <h4 class="pull-left">Consolidated Reports </h4>
             <div>

             <div class="col-md-12" style="font-family:Century Gothic; font-size:16px;">
                  <table style="width:100%;font-family:Century Gothic;" style="white-space:wrap;">
                      <tr>
                        <th style="text-align:left">
                         <span class="">
                           ' . $monHeader . '
                          </span>
                        </th>
                      </tr>
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
               $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray;width:100%;'>
                          <thead>
                          <tr>
                            <th style='border:1px solid gray'>Jobfile No</th>
                            <th style='border:1px solid gray'>Actual Arrival Time</th>
                            <th style='border:1px solid gray'>Volume</th>
                            <th style='border:1px solid gray'>BL No.</th>
                            <th style='border:1px solid gray'>Commodity</th>
                            <th style='border:1px solid gray'>Date Received Docs</th>
                            <th style='border:1px solid gray'>Pre-Assessment Date</th>
                            <th style='border:1px solid gray'>Final Assessment Date</th>
                            <th style='border:1px solid gray'>Date Paid</th>";
                            if($monitoringType == 1){
                            $dispOutput .= "<th style='border:1px solid gray'>Gate In (Date/Time)</th>
                                            <th style='border:1px solid gray'>Gate Out (Date/Time)</th>";
                            }
                            
               $dispOutput .=" <th style='border:1px solid gray'>Target Delivery Date</th>
                            <th style='border:1px solid gray'>Actual Date Delivered</th>
                            <th style='border:1px solid gray'>Date Start of Storage</th>
                            <th style='border:1px solid gray'>Total Storage</th>
                            <th style='border:1px solid gray'>Date Start of Demurrage</th>
                            <th style='border:1px solid gray'>Total Demurrage</th>
                            <th style='border:1px solid gray'>Running Charges</th>
                            <th style='border:1px solid gray'>Status Report</th>
                          </tr>
                          </thead>
                          <tbody>
                          "; 
                foreach ($consolidateReport as $row){
                      if($oldJBNo != $row->JobFileNo){
                           $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <th style='border:1px solid gray'>" . $row->JobFileNo . "</th>
                                      <th style='border:1px solid gray'>" . $row->ActualArrivalTime . "</th>
                                      <th style='border:1px solid gray'>" . $volume . "</th>
                                      <th style='border:1px solid gray'>" . $row->HouseBillLadingNo . "</th>
                                      <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateReceivedOfOtherDocs . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateSentPreAssessment . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateSentFinalAssessment . "</th>
                                      <th style='border:1px solid gray'>" . $row->DatePaid . "</th>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<th style='border:1px solid gray'>" . $row->GateInAtPort . "</th>
                                                        <th style='border:1px solid gray'>" . $row->GateOutAtPort . "</th>";
                                      }

                                      
                          $dispOutput .= "<th style='border:1px solid gray'>" . $row->TargetDeliveryDate . "</th>
                                      <th style='border:1px solid gray'>" . $row->ActualDeliveryAtWarehouse . "</th>
                                      <th style='border:1px solid gray'>" . $row->StartOfStorage . "</th>
                                      <th style='border:1px solid gray'>" . number_format($row->Storage,2,',','.') . "</th>
                                      <th style='border:1px solid gray'>" . $row->StartOfDemorage . "</th>
                                      <th style='border:1px solid gray'>" . number_format($row->Demorage,2,',','.') . "</th>
                                      <th style='border:1px solid gray'>" . number_format($row->Total_Charges,2,',','.') . "</th>
                                      <th style='border:1px solid gray'>" . $row->Description . "</th>
                                    </tr>";
                      }else{
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<th style='border:1px solid gray'></th>
                                                       <th style='border:1px solid gray'></th>";
                                      }
                                      
                           $dispOutput .= "
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
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
               $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray'>
                                <thead>
                                <tr>
                                  <th style='border:1px solid gray'>Jobfile No</th>
                                  <th style='border:1px solid gray'>Actual Arrival Time</th>
                                  <th style='border:1px solid gray'>Volume</th>
                                  <th style='border:1px solid gray'>Bill Lading No.</th>
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
                                      <th style='border:1px solid gray'>" . $row->JobFileNo . "</th>
                                      <th style='border:1px solid gray'>" . $row->ATA . "</th>
                                      <th style='border:1px solid gray'>" . $volume . "</th>
                                      <th style='border:1px solid gray'>" . $row->HouseBillLadingNo . "</th>
                                      <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                      <th style='border:1px solid gray'>" . $row->DatePickUpOtherDocs . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateSentPreAssessment . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateSentFinalAssessment . "</th>
                                      <th style='border:1px solid gray'>" . $row->DatePaid . "</th>
                                      <th style='border:1px solid gray'>" . $row->TargetDeliveryDate . "</th>
                                      <th style='border:1px solid gray'>" . $row->DateReceivedAtWhse . "</th>
                                      <th style='border:1px solid gray'>" . $row->StorageFee . "</th>
                                      <th style='border:1px solid gray'>" . $row->Total_Charges . "</th>
                                      <th style='border:1px solid gray'>" . $row->Description . "</th>
                                    </tr>";
                    }else{
                      $dispOutput .= "<tr>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
                                      <th style='border:1px solid gray'></th>
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