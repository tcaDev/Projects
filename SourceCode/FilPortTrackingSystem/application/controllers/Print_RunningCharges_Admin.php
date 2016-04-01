<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
class Print_RunningCharges_Admin extends CI_Controller {

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
          $PO_Number          =  $this->input->get('po_num');  
          $monitoringType     =  $this->input->get('montype');
          $consigneeID        =  $this->input->get('consigneeId');

          $documnt = $this->loadDoc($monitoringType,$PO_Number,$consigneeID);
          $mpdf->useSubstitutions=false;
          $mpdf->simpleTables = true;
          $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
          $this->m_pdf->pdf->WriteHTML($stylesheet,1);
          $this->m_pdf->pdf->WriteHTML($documnt);
          $this->m_pdf->pdf->Output();
  }

   function loadDoc($monitoringType,$PO_Number,$consigneeID){
          
          $pre_details = $this->Charges->get_PO($monitoringType,$PO_Number,$consigneeID);

          $dispOutput = '';
          $ct = count($pre_details);
          if($ct > 0){
          $get_containerDetails =  $this->Charges->getContainerDetails($monitoringType,$pre_details->JobFileNo);
          $charge               =  $this->getCharges($pre_details->JobFileNo,$monitoringType);
          $commodity            =  $this->getGoods($pre_details->JobFileNo,$monitoringType);
          $volume               =  $this->Charges->getVolume($monitoringType,$pre_details->JobFileNo);

           $monHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }
          $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
           
             for($footer_header = 1; $footer_header <= 10; $footer_header++) {
               if ($footer_header % 2) {
               $footer .= '<htmlpageheader name="myHeader_odd'.$footer_header.'" style="display:none">
                                 <table style="width:100%;text-align:center;">
                                 <tr><td><span style="text-align:center;font-size:10px;font-weight: bold;">FIL-PORT EXPRESS BROKERAGE, INC.</span></td></tr>
                                </table>
                          </htmlpageheader>

                        <htmlpagefooter name="myFooter_odd'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-size: 8pt; 
                              color: #000000;font-style: italic;"><tr>
                              <td width="33%"><span style="font-style: italic;">{DATE Y-m-j}</span></td>
                              <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Confidential | Proprietory</span></td>
                              <td width="33%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
                              </tr></table>
                        </htmlpagefooter>



                       ';
                  } else {
                $footer .= ' <htmlpageheader name="myHeader_even'.$footer_header.'" style="display:none">
                                <table style="width:100%;text-align:center;">
                                 <tr><td><span style="text-align:center;font-size:10px;font-weight: bold;">FIL-PORT EXPRESS BROKERAGE, INC.</span> </td></tr>
                               </table>
                             </htmlpageheader>
                        <htmlpagefooter name="myFooter_even'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-size: 8pt; 
                              color: #000000;font-style: italic;"><tr>
                              <td width="33%"><span style="font-style: italic;">{DATE Y-m-j}</span></td>
                              <td width="33%" align="center" style="font-weight: bold; font-style: italic;">Confidential | Proprietory</span></td>
                              <td width="33%" style="text-align: right; ">{PAGENO}/{nbpg}</td>
                              </tr></table>
                          </htmlpagefooter>
                         ';
                  }
            }
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
                ' . $footer . '
                <br>
                <div class="mycontent">
                    <div style="font-size:20px;" class="">
              
                </br>
                <span style="font-size:18px;font-weight: bold;">Report On Running Charges</span><br>
                <span style="font-size:16px; width:100%;">'.$monHeader.'</span>
                <br>
                <br>
                <div class="col-md-12">
                      <div class="col-md-12" style="font-size:14px;">
                        <div class="col-md-6">
                         <span class="pull-left" style="font-size:14px;font-weight: bold;">Consignee :&nbsp;&nbsp;</span>
                          <span>'
                              . $pre_details->ConsigneeName.
                          '</span>
                        </div>
                        <div class="col-md-6">
                           <span class="pull-left" style="font-weight: bold;font-size:14px;">Jobfile Number :&nbsp;&nbsp;</span>
                          <span>'
                              . $pre_details->JobFileNo .
                          '</span>
                        </div>
                    </div>    
                      <div class="col-md-12" style="font-size:14px;">

                        <div class="col-md-6">
                          <span class="pull-left" style="font-size:14px;font-weight: bold;">PI / PO Number : &nbsp;&nbsp;</span>
                          <span>'
                              . $PO_Number .
                          '</span>
                        </div>
                        <div class="col-md-6">';
                          if($monitoringType == 1 || $monitoringType ==2 ){
                                $dispOutput .= '
                                        <span class="pull-left" style="font-size:14px;font-weight: bold;">Volume :</span>
                                        <span>'
                                        . $volume .
                                        '</span>
                                        ';
                              }else{
                                $dispOutput .= '
                                        <span class="pull-left" style="font-size:14px;font-weight: bold;">Gross Weight(kg) :</span>
                                        <span>'
                                        . $volume .
                                        ' kg </span>
                                        ';
                              }
                        $dispOutput .=  '</div>
                    </div>    
                    <hr>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <span class="pull-left" style="font-weight: bold; font-size:14px;">Receipted Charges Only
                            <br>
                            <br>
                            ' . $charge . '
                          </span>
                        </div>
                      </div>
                     
                      <br>
                      <hr>
                      <br>
                      <div class="col-md-6">
                          <div class="col-md-6">'; 
                            if($monitoringType == 1 || $monitoringType == 2){
                              $dispOutput .= '<span class="pull-left"><span style="font-size:14px;font-weight: bold;">Containers</span>';
                            }
                            $dispOutput .=  '<br><br>
                                ' . $commodity . '
                              </span>
                         </div>
                      </div>
                     </div>
                    </div>'  .   $footer_proprietary . $footer .'
               </body>
      </html>';
          }else{
            $dispOutput = "<center style='font-color:RED;'> No PO Number From your Accounts Matches Your Search </center>";
          }
             /*  $output = array(
                          array(
                              "disp" => $dispOutput,
                            )
                      );
                      echo json_encode($output);*/
          return $dispOutput;
      }

      function getCharges($jbNo, $monitoringType){
        $charges = $this->Charges->getRunningCharges($monitoringType, $jbNo);
      
            if($monitoringType == 1 || $monitoringType == 2){
             $total = 0;
           $total += $charges->LodgementFee;
           $total += $charges->THCCharges;
           $total += $charges->Arrastre;
           $total += $charges->Weighing;
           $total += $charges->Wharfage;
           $total += $charges->DispatchFee;
           $total += $charges->DEL;
           $total += $charges->Storage;
           $total += $charges->Demorage;
           $total += $charges->Detention;
           $total += $charges->SRAApplication;
           $total += $charges->SRAInspection;
           $total += $charges->BAIApplication;
           $total += $charges->BAIInspection;
           $total += $charges->BPIInspection;

        $chargesOutput = '<div style="width:100%;">
                  <table style="margin-left:35px; width:100%; font-size:14px;">';     
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Lodgement Fee <span class="pull-right"> : </span>
                  </td>
                  <td margin-left:10px;> 
                    <span class="pull-right">' . number_format($charges->LodgementFee , 2, '.', ',')

                    . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    THC Charges <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->THCCharges, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Local Charges <span class="pull-right"> : </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Arrastre <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->Arrastre, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Wharfage <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->Wharfage, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Weighing <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->Weighing, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Dispatch Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->DispatchFee, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    DEL <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->DEL, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Storage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->Storage, 2, '.', ',') . ' </span>
                  </td>
                  </tr>'; 

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Demurrage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->Demorage, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Detention Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->Detention, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    SRA Application <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->SRAApplication, 2, '.', ',') . '</span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    SRA Processing Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->SRAInspection, 2, '.', ',') . '</span>
                  </td>
                  </tr>'; 
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BAI Application <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->BAIApplication, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BAI Inspection Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->BAIInspection, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BPI Inspection Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">'. number_format($charges->BPIInspection, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';     
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                   Other Fees <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">'. number_format($charges->BPIInspection, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';     

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    <hidden>
                  </td>
                  </tr>'; 

        $chargesOutput .= '<tr style="margin-top:15px;">
                  <td style="text-align:left;">
                    <b> Total </b> <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($total, 2, '.', ',') . '</span>
                  </td>
                  </tr>
                  </table>
                 </div>';     
            }else{
             $total = 0;
           $total += $charges->LodgementFee;
           $total += $charges->BreakBulkFee;
           $total += $charges->StorageFee;
           $total += $charges->BadCargoOrderFee;
           $total += $charges->VCRC;
           $total += $charges->CNI;
           $total += $charges->CNIU;
           $total += $charges->OtherFees;

        $chargesOutput = '<div style="width:100%;">
                  <table style="margin-left:35px; width:100%; font-size:14px;">';     
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Lodgement Fee <span class="pull-right"> : </span>
                  </td>
                  <td margin-left:10px;> 
                    <span class="pull-right">' . number_format($charges->LodgementFee , 2, '.', ',')

                    . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Break Bulk Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->BreakBulkFee, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Storage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->StorageFee, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Bad Cargo Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->BadCargoOrderFee, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    VRC <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->VCRC, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    CNI <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($charges->CNI, 2, '.', ',') . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    CNIU <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->CNIU, 2, '.', ',') . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Other Fees <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . number_format($charges->OtherFees, 2, '.', ',') . ' </span>
                  </td>
                  </tr>'; 

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    <hidden>
                  </td>
                  </tr>
                  '; 

        $chargesOutput .= '
                 <tr style="margin-top:15px;">
                  <td style="text-align:left;">
                    <b> Total </b> <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . number_format($total, 2, '.', ',') . '</span>
                  </td>
                  </tr>
                  </table>
                 </div>';
            }

    if($total == 0){
      $chargesOutput = '<center><span style="color:red">No Record of Charges </span></center>';
    }       

    return $chargesOutput;                                      

      }

      function getGoods($jbNo, $monitoringType){
        $goods = $this->Charges->getCommodities($monitoringType,$jbNo);
        $commoditiesOutput = '';
          if(count($goods) > 0 ){
           $commoditiesOutput .=  "<div style='width:100%;'>
                  <table id='tbl-charges-commodities' style='width:100%;margin-left:35px;font-size:14px;'>
                        <tr>";
                            if($monitoringType == 1 || $monitoringType == 2){
                               $commoditiesOutput .= "<td><span class='pull-left' style='font-weight: bold;'>Container No.</span></td>";
                            }
                             $commoditiesOutput .= "<td><span class='pull-left' style='font-weight: bold;'>Commodity</span></td></tr>";
           foreach($goods as $row){
                $commoditiesOutput .=  "<tr>";
                if($monitoringType == 1 || $monitoringType == 2){
                $commoditiesOutput .=   "<td><span class='pull-left'>".stripslashes($row->ContainerNo) ."</span></td>";
          }
                $commoditiesOutput .=  "<td><span class='pull-left'>".stripslashes($row->ProductName)."</span></td>";
                $commoditiesOutput .=  "</tr>";
           }
            $commoditiesOutput .=  "</table>
            </div>";

          }else{
             $commoditiesOutput =  '<br><center><span style="color:red">No Goods Yet </span></center>';
          }

    return $commoditiesOutput;    
        
      }

}

?>