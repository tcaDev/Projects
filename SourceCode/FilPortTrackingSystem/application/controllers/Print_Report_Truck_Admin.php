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
                   <h5 style="text-align:center">Filport Document</h5>
                </div>
                <div class="col-md-12">
                  <table>
                       <tr>
                        <th>
                         <span>
                          <h4>' . $monHeader . '</h4>
                          </span>
                        </th>
                        <td>
                        </td>
                      </tr>
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
  
    if($monitoringType == 1 || $monitoringType == 2){
      if(count($report_truck) > 0){
         $dispOutput .="<br><table class ='table table-condensed table-bordered '>
                    <thead >
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>
                    ";
                    if($monitoringType == 1){
                      $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                                    <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                    }
          
                     $dispOutput .="<th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Shipping Line</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Trucking Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <td style='padding:5px;'>" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:5px;'>" . $row->JobFileNo . "</td>
                                <td style='padding:5px;'>" . $row->ContainerNo . "</td>
                                <td style='padding:5px;'>" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:5px; '>" . stripslashes($row->Origin) . "</td> ";

                    if($monitoringType == 1){
                      $dispOutput .=" <td style='padding: 5px;'>" . $row->GateInAtPort . "</td>
                                <td style='padding:5px;'>" . $row->GateOutAtPort . "</td>";
                    }
                $dispOutput .= "
                                <td style='padding:5px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                <td style='padding:5px;'>" . $row->CarrierName . "</td>
                                <td style='padding:5px;'>" . $row->HaulerOrTruck . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'>No Records of Truck with this Span of Target Delivery Date </center>";      
        }
      }else{
        if(count($report_truck) > 0){
         $dispOutput .="<table class ='table table-condensed table-bordered'>
                    <thead >
                    <tr >
                      <th>Target Delivery Date</th>
                      <th>Jobfile No</th>
                      <th>No. of Cartons</th>
                      <th>Weight(kgs)</th>
                      <th>Commodity</th>
                      <th>Origin</th>
                      <th>Actual Delivery Date</th>
                      <th>Airline/Forwarder</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <td>" . $row->TargetDeliveryDate . "</td>
                                <td>" . $row->JobFileNo . "</td>
                                <td>" . $row->NoOfCartons . "</td>
                                <td>" . $row->GrossWeight . "</td>
                                <td>" . stripslashes($row->ProductName) . "</td>
                                <td>" . stripslashes($row->Origin) . "</td>
                                <td>" . $row->TargetDeliveryDate . "</td>
                                <td>" . $row->Forwarder . "</td>
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