<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
 class Print_Report_Truck_Admin extends CI_Controller {

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
          $documnt = $this->createDocToPrint($monitoringType,$cID,$ataFrom,$ataTo);
          $this->m_pdf->pdf->AddPage('L');
          $mpdf->useSubstitutions=false;
          $mpdf->simpleTables = true;
          $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
          $this->m_pdf->pdf->WriteHTML($stylesheet,1);
          $this->m_pdf->pdf->WriteHTML($documnt);
          $this->m_pdf->pdf->Output();
  
          //echo $documnt;
        }

  function createDocToPrint($monitoringType,$cID,$ataFrom,$ataTo){
            $dispOutput = '';
            $monHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }
             $cName = $this->Charges->getcName($cID);  
             $truckReports = $this->loadReportTruck($monitoringType,$cID,$ataFrom,$ataTo);
             $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
      
            $dispOutput .= '
            <html>
              
              <body>
                <div class="change_print'.$i.'"  >  

                <div class="">
                   <h5 style="text-align:center">FIL-PORT EXPRESS BROKERAGE, INC.</h5>
                </div>
                <span style="font-size:18px;font-weight:bold;"><b>Reports on Truck Booking</b></span><br>
                <span style="font-size:16px;">'.$monHeader.'</span>
                <br>
                <br>
                <div class="col-md-12">
                  <table>
                      <tr>
                        <th>
                         <span>
                          <h4>Consignee Name :</h4>
                          </span>
                        </th>
                        <td>
                          <span>
                            ' . $cName->ConsigneeName . '
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th >
                          <span> 
                           <h4>Target Delivery Date :</h4>
                          </span>
                        </th>
                        <td>
                          <span>
                             From :  ' . $ataFrom . '
                          </span>
                        </td>
                      </tr>
                       <tr>
                        <th >
                          <span> 
                           
                          </span>
                        </th>
                        <td>
                          <span>
                           To : ' . $ataTo . '
                          </span>
                        </td>
                      </tr>
                  </table>
                </div>
                <div class="mycontent">
                    <div>' . $truckReports;
        $dispOutput .= '
              </tbody>
            </table>
          </div> 
          </div> <br>'  . $footer_proprietary . $footer .'
          </body>
      </html>';

      return $dispOutput;
              
  }

  function loadReportTruck($monitoringType , $cID , $ataFrom , $ataTo){
    $report_truck = $this->Charges->getCharges_Truck($monitoringType , $cID , $ataFrom , $ataTo); 
  
    if($monitoringType == 1|| $monitoringType == 2){
      if(count($report_truck) > 0){
         $dispOutput .="<table class ='table table-bordered'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>";
                      if($monitoringType == 1){
                         $dispOutput .="  
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                      }
                    
         $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Shipping Line</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <td style='padding:10;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;' >" . $row->JobFileNo . "</td>
                                <td style='padding:10px;' >" . $row->ContainerNo . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->Origin) . "</td>";
                  if($monitoringType == 1){
               $dispOutput .= " <td style='padding:10px;' >" . $row->GateInAtPort . "</td>
                                <td style='padding:10px;' >" . $row->GateOutAtPort . ")</td>";
                  }
                               
              $dispOutput .= " <td style='padding:10px;' >" . $row->ActualDeliveryAtWarehouse . "</td>
                                <td style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                <td style='padding:10px;' >" . number_format($row->Storage,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                <td style='padding:10px;'>" . number_format($row->Demorage,2,'.',','). "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->CarrierName . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck witd tdis Span of Target Delivery Date </center>";      
        }
      }else{
        if(count($report_truck) > 0){
         $dispOutput .="<table class ='table table-bordered'>
                    <tdead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Number Of Cartons</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Airline/Forwarder</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
              $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
               $dispOutput .= "<tr>
                                <td style='padding:10px;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                <td style='padding:10px;'>" . $row->NoOfCartons . "</td>
                                <td style='padding:10px;'>" . $row->GrossWeight . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->Origin) . "</td>
                                <td style='padding:10px;'>" . number_format($row->StorageFee,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . $row->Forwarder . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck with this Span of Target Delivery Date </center>";      
        }
      }

      return $dispOutput;
  }
}

?>