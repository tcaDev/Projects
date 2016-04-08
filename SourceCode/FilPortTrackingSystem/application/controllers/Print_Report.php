<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
class Print_Report extends CI_Controller {

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
          $PO_Number            =  $this->input->get('po_num');  
          $monitoringType       =  $this->input->get('montype');
          $userID               =  $this->input->get('userId');
          $searchBy             =  $this->input->get('type');

          $documnt = $this->loadDoc($monitoringType,$PO_Number,$userID,$searchBy);
           ini_set("memory_limit", "256M"); 
          (set_time_limit(600000));
          $this->m_pdf->pdf->mirrorMargins  = 1;
          $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
          $this->m_pdf->pdf->WriteHTML($stylesheet,1);
          $this->m_pdf->pdf->WriteHTML($documnt);
          $this->m_pdf->pdf->Output();
  }

   function loadDoc($monitoringType,$PO_Number,$userID,$searchBy){
          
          if($searchBy == 'PO'){
               $pre_details =  $this->Charges->getPre_Details_RunningCharges_PO($monitoringType,$PO_Number,$userID);
          }else{
               $pre_details =  $this->Charges->getPre_Details_RunningCharges_HBL($monitoringType,$PO_Number,$userID);
          }
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
                                 <tr><td><span style="text-align:center;font-size:10px;"><b> FIL-PORT EXPRESS BROKERAGE, INC. </b></span> </td></tr>
                                </table>
                          </htmlpageheader>

                        <htmlpagefooter name="myFooter_odd'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
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
                                 <tr><td><span style="text-align:center;font-size:10px;"><b> FIL-PORT EXPRESS BROKERAGE, INC. </b></span> </td></tr>
                               </table>
                             </htmlpageheader>
                        <htmlpagefooter name="myFooter_even'.$footer_header.'" style="display:none">
                          <table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 8pt; 
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
                <div class="change_print'.$i.'">  

                ' . $footer . '

                <div class="mycontent">
                    <div style="font-size:22px;" class="">
              
                </br>
                <span style="font-size:18px;font-weight: bold;"><b>Report on Running Charges</b></span><br>
                <span style="font-size:16px;">'.$monHeader.'</span>
                <br>
                <br>
                <div class="col-md-12">
                      <div class="col-md-12" style="font-size:12px;">
                        <div class="col-md-6">
                         <span class="pull-left" style="font-size:14px;"><b>Consignee : </b> &nbsp;&nbsp;</span>
                           '
                              . $pre_details->ConsigneeName .
                          '</div>
                        <div class="col-md-6">
                           <span class="pull-left" style="font-size:14px;"><b>Jobfile Number : </b> &nbsp;&nbsp;</span>
                          '
                              . $pre_details->JobFileNo .
                          ' 
                        </div>
                      </div>    
                      <div class="col-md-12" style="font-size:12px;">

                        <div class="col-md-6">
                          <span class="pull-left" style="font-size:14px;"><b>PI / PO Number : </b> &nbsp;&nbsp;</span>
                          '
                              . $PO_Number .
                          '
                        </div>
                        <div class="col-md-6">';
                          if($monitoringType == 1 || $monitoringType ==2 ){
                                $dispOutput .= '
                                        <span class="pull-left" style="font-size:14px;"><b>Volume : </b> </span>
                                        '
                                        . $volume .
                                        '';
                              }else{
                                $dispOutput .= '
                                        <span class="pull-left" style="font-size:14px;"><b>Gross Weight(kg) : </b> </span>
                                        <u>'
                                        . $volume .
                                        ' kg </u>
                                        ';
                              }
                        $dispOutput .=  '</div>
                    </div>    
                    <hr>
                      <div class="col-md-12">
                        <div class="col-md-6">
                          <span class="pull-left"><b style="font-size:16px;">Receipted Charges Only</b>
                            <br>
                            <br>
                            ' . $charge . '
                          </span>
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div style="font-size:12px;margin-top:5px;">
                            <u><i>Note: Brokerage Fees, Delivery Charges and other Customs related fees are not included</u></i>
                          </div>
                          <div class="col-md-6"> 
                      </div>
                      <br>
                      <hr>
                      <br>
                      <div class="col-md-6">
                          <div class="col-md-6">'; 
                            if($monitoringType == 1 || $monitoringType == 2){
                              $dispOutput .= '<span class="pull-left"><b style="font-size:16px;">Containers</b>';
                            }
                            $dispOutput .=  '<br>
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
           $total += $charges->OtherFees;

        $chargesOutput = '<div style="width:100%;">
                  <table style="margin-left:35px; width:100%; font-size:14px;">';     
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Lodgement Fee <span class="pull-right"> : </span>
                  </td>
                  <td margin-left:10px;> 
                    <span class="pull-right">' . $charges->LodgementFee 

                    . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    THC Charges <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->THCCharges . '</span>
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
                    <span class="pull-right">' . $charges->Arrastre . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Wharfage <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->Wharfage . ' </span>
                  </td>
                  </tr>';

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Weighing <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->Weighing . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Dispatch Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->DispatchFee . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    DEL <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->DEL . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Storage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->Storage . ' </span>
                  </td>
                  </tr>'; 

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Demurrage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->Demorage . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Detention Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->Detention . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    SRA Application <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->SRAApplication . '</span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    SRA Processing Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->SRAInspection . '</span>
                  </td>
                  </tr>'; 
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BAI Application <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->BAIApplication . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BAI Inspection Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->BAIInspection . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    BPI Inspection Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">'. $charges->BPIInspection . ' </span>
                  </td>
                  </tr>';     
      
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                   Other Fees <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">'. $charges->OtherFees . ' </span>
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
                    <span class="pull-right">' . $charges->LodgementFee 

                    . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Break Bulk Fee <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->BreakBulkFee . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Storage Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->StorageFee . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Bad Cargo Fee <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->BadCargoOrderFee . ' </span>
                  </td>
                  </tr>';

        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    VRC <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->VCRC . ' </span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    CNI <span class="pull-right"> : </span>
                  </td>
                  <td> 
                    <span class="pull-right">' . $charges->CNI . '</span>
                  </td>
                  </tr>';
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    CNIU <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->CNIU . ' </span>
                  </td>
                  </tr>';         
        $chargesOutput .= '<tr>
                  <td style="text-align:left;">
                    Other Fees <span class="pull-right"> : </span>
                  </td>
                  <td>
                    <span class="pull-right">' . $charges->OtherFees . ' </span>
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
                               $commoditiesOutput .= "<td><span class='pull-left'><b>Container No. </b></span></td>";
                            }
                             $commoditiesOutput .= "<td><span class='pull-left'><b>Commodity </b></span></td></tr>";
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