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
            /* $footer ='';
             for($footer_header = 1; $footer_header <= 10; $footer_header++) {
               if ($footer_header % 2) {
               $footer .= '<htmlpageheader name="myHeader_odd'.$footer_header.'" style="display:none">
                               <span style="font-size:10px;">'.date('Y-m-d').'</span>
                                 <table style="width:100%;text-align:center;">
                                 <tr><td><span style="text-align:center;font-size:10px;"><b> FILPORT DOCUMENT </b></span> </td></tr>
                                </table>
                          </htmlpageheader>

                        <htmlpagefooter name="myFooter_odd'.$footer_header.'" style="display:none">
                          <table width="100%" style="font-family: serif; font-size: 8pt; 
                              color: #000000;font-style: italic;"><tr>
                              <td width="33%"><span style="font-style: italic;">{DATE j-m-Y}</span></td>
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
                          <table width="100%" style="font-family: serif; font-size: 8pt; 
                              color: #000000;font-style: italic;"><tr>
                              <td width="33%"><span style="font-style: italic;">{DATE j-m-Y}</span></td>
                              <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Confidential | Proprietory</span></td>
                              <td width="33%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
                              </tr></table>
                          </htmlpagefooter>
                         ';
                  }
            }*/
            $dispOutput .= '
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

                <div class="">
                   <h5 style="text-align:center"> Filport Document</h5>
                </div>
                <div class="col-md-12" style="font-family:Century Gothic; font-size:16px;">
                  <table style="width:100%;font-family:Century Gothic;" style="white-space:wrap;">
                       <tr>
                        <th style="text-align:left">
                         <span  style="font-size:18px;">
                          <h4 style="text-align:left">' . $monHeader . '</h4>
                          </span>
                        </th>
                        <td>
                        </td>
                      </tr>
                      <tr>
                        <th style="text-align:left">
                         <span>
                          <h4 style="text-align:left">Consignee Name :</h4>
                          </span>
                        </th>
                        <td>
                          <span>
                            ' . $cName->ConsigneeName . '
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th style="text-align:left">
                          <span> 
                           <h4 style="text-align:left">Target Delivery Date :</h4>
                          </span>
                        </th>
                        <td>
                          <span class="pull-left">
                             From :  ' . $ataFrom . ' To : ' . $ataTo . '
                          </span>
                        </td>
                      </tr>
                  </table>
                </div>
                <div style="font-family:Century Gothic;" class="mycontent">
                    <div style="font-size:22px;" class="">' . $truckReports;
        $dispOutput .= '
              </tbody>
            </table>
          </div> 
          </div>'  . $footer_proprietary . $footer .'
          </body>
      </html>';

      return $dispOutput;
              
  }

  function loadReportTruck($monitoringType , $cID , $ataFrom , $ataTo){
    $report_truck = $this->Charges->getCharges_Truck($monitoringType , $cID , $ataFrom , $ataTo); 
  
    if($monitoringType == 1 || $monitoringType == 2){
      if(count($report_truck) > 0){
         $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray'>
                    <thead>
                    <tr>
                      <th style='border:1px solid gray'>Target Delivery Date</th>
                      <th style='border:1px solid gray'>Jobfile No</th>
                      <th style='border:1px solid gray'>Container No</th>
                      <th style='border:1px solid gray'>Commodity</th>
                      <th style='border:1px solid gray'>Gate In (Date/Time)</th>
                      <th style='border:1px solid gray'>Gate Out (Date/Time)</th>
                      <th style='border:1px solid gray'>Actual Delivery Date</th>
                      <th style='border:1px solid gray'>Shipping Line</th>
                      <th style='border:1px solid gray'>Trucking Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <th style='border:1px solid gray'>" . $row->TargetDeliveryDate . "</th>
                                <th style='border:1px solid gray'>" . $row->JobFileNo . "</th>
                                <th style='border:1px solid gray'>" . $row->ContainerNo . "</th>
                                <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                <th style='border:1px solid gray'>" . $row->GateInAtPort . "</th>
                                <th style='border:1px solid gray'>" . $row->GateOutAtPort . "</th>
                                <th style='border:1px solid gray'>" . $row->ActualDeliveryAtWarehouse . "</th>
                                <th style='border:1px solid gray'>" . $row->CarrierName . "</th>
                                <th style='border:1px solid gray'>" . $row->HaulerOrTruck . "</th>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck with this Span of Target Delivery Date </center>";      
        }
      }else{
        if(count($report_truck) > 0){
         $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray'>
                    <thead>
                    <tr>
                      <th style='border:1px solid gray'>Target Delivery Date</th>
                      <th style='border:1px solid gray'>Jobfile No</th>
                      <th style='border:1px solid gray'>No. of Cartons</th>
                      <th style='border:1px solid gray'>Weight(kgs)</th>
                      <th style='border:1px solid gray'>Commodity</th>
                      <th style='border:1px solid gray'>Origin</th>
                      <th style='border:1px solid gray'>Actual Delivery Date</th>
                      <th style='border:1px solid gray'>Airline/Forwarder</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <th style='border:1px solid gray'>" . $row->TargetDeliveryDate . "</th>
                                <th style='border:1px solid gray'>" . $row->JobFileNo . "</th>
                                <th style='border:1px solid gray'>" . $row->NoOfCartons . "</th>
                                <th style='border:1px solid gray'>" . $row->GrossWeight . "</th>
                                <th style='border:1px solid gray'>" . $row->ProductName . "</th>
                                <th style='border:1px solid gray'>" . $row->OriginCity . "</th>
                                <th style='border:1px solid gray'>" . $row->TargetDeliveryDate . "</th>
                                <th style='border:1px solid gray'>" . $row->Forwarder . "</th>
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