<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
class Print_Report_Volume extends CI_Controller {

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
          $userID               =  $this->input->get('userID');
          $documnt = $this->createDocToPrint($monitoringType,$userID,$ataFrom,$ataTo);
          //$this->m_pdf->pdf->AddPage('L');
          ini_set("memory_limit", "256M"); 
          (set_time_limit(300000));
          $this->m_pdf->pdf->mirrorMargins  = 1;
          $this->m_pdf->pdf->WriteHTML($documnt);
          $this->m_pdf->pdf->Output();
  }

  function createDocToPrint($monitoringType,$userID,$ataFrom,$ataTo){
         $reportsVolume = $this->Charges->getReportsVolume($monitoringType,$userID,$ataFrom,$ataTo);
         $cName = $this->Charges->getcName($userID);
         $dispOutput = '';
         $content ='';
         $lodgementFee = 0;
         $thcCharges   = 0;
         $arrastre     = 0;
         $wharfage     = 0;
         $weighing     = 0;
         $DispatchFee  = 0;
         $del = 0;
         $sraApplication   = 0;
         $sraInspection     = 0;
         $baiApplication     = 0;
         $baiInspection  = 0;
         $bpiInspection  = 0;
         $breakbulkfee = 0;
         $badcargofee     = 0;
         $storagefee = 0;
         $vcrc     = 0;
         $cni  = 0;
         $cniu  = 0;
         $otherfees  = 0;
          
         $oldJBNo = '';
         $newJBNo = '';
         $monHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }

         $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
         $footer ='';
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

                <div style="font-family:Century Gothic;" class="mycontent">
                    <div style="font-size:22px;" class="">
              
                <br>
                <br>
                <div>
                <div class="col-md-12" style="font-family:Century Gothic; font-size:16px;">
                  <table style="width:100%;font-family:Century Gothic;" style="white-space:wrap;">
                      <tr>
                        <th>
                         <span class="pull-left">
                           ' . $monHeader . '
                          </span>
                        </th>
                      </tr>
                      <tr>
                        <th>
                         <span class="pull-left">
                          Consignee Name :
                          </span>
                        </th>
                        <td>
                          <span class="pull-left">
                            ' . $cName->ConsigneeName . '
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <th>
                          <span class="pull-left"> 
                          Actual Arrival Time :
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
                <hr>
                <div class="table-volume-manila">';
                if($monitoringType == 1 || $monitoringType == 2){
                foreach ($reportsVolume as $row) {
                    $content .= "<tr>";
                    $content .= "<td style='border:1px solid gray'>" . $row->JobFileNo . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->ActualArrivalTime . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->ContainerNo . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->ProductName . "</td>";
                   
                    if($oldJBNo != $row->JobFileNo){
                        $content .= "<td style='border:1px solid gray'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->Weighing . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->DEL . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='border:1px solid gray'>" . $row->OtherFees . "</td>";
                            $lodgementFee   += $row->LodgementFee;
                            $thcCharges     += $row->THCCharges;
                            $arrastre       += $row->Arrastre;
                            $wharfage       += $row->Wharfage;
                            $weighing       += $row->Weighing;
                            $dispatchFee    += $row->DispatchFee;
                            $del            += $row->DEL;
                            $sraApplication += $row->SRAApplication;
                            $sraInspection  += $row->SRAInspection;
                            $baiApplication += $row->BAIApplication;
                            $baiInspection  += $row->BAIInspection;
                            $otherfees      += $row->OtherFees;
                    }else{
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                        $content .= "<td style='border:1px solid gray'></td>";
                    }
                $content .='</tr>';

                    $oldJBNo = $row->JobFileNo;

                  }

                  $total = "<tr>
                            <td style='border:1px solid gray'><b>TOTAL </b></td>
                            <td style='border:1px solid gray'> </td>
                            <td style='border:1px solid gray'> </td>
                            <td style='border:1px solid gray'></td>
                            <td style='border:1px solid gray'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='border:1px solid gray'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='border:1px solid gray'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='border:1px solid gray'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";
                $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray'>
                    <thead>
                    <tr>
                      <th style='border:1px solid gray'>Jobfile No</th>
                      <th style='border:1px solid gray'>Actual Arrival Time</th>
                      <th style='border:1px solid gray'>List of Containers Per Jobfile</th>
                      <th style='border:1px solid gray'>Commodity</th>
                      <th style='border:1px solid gray'>Lodgement Fee</th>
                      <th style='border:1px solid gray'>THC Charges</th>
                      <th style='border:1px solid gray'>Arrastre</th>
                      <th style='border:1px solid gray'>Wharfage</th>
                      <th style='border:1px solid gray'>Weighing</th>
                      <th style='border:1px solid gray'>Dispatch Fee</th>
                      <th style='border:1px solid gray'>DEL</th>
                      <th style='border:1px solid gray'>SRA Application</th>
                      <th style='border:1px solid gray'>SRA Inspection</th>
                      <th style='border:1px solid gray'>BAI Application</th>
                      <th style='border:1px solid gray'>BAI Inspection Fee</th>
                      <th style='border:1px solid gray'>BPI Inspection Fee</th>
                      <th style='border:1px solid gray'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>
                    " . $content . $total;

                 
            }else{
              foreach ($reportsVolume as $row) {
                  $content .= "<tr>";
                  $content .= "<td style='border:1px solid gray'>" . $row->JobFileNo . "</td>";
                  $content .= "<td style='border:1px solid gray'>" . $row->ATA . "</td>";
                  $content .= "<td style='border:1px solid gray'>" . $row->Aircraft . "</td>";
                  $content .= "<td style='border:1px solid gray'>" . $row->ProductName . "</td>";

                  if($oldJBNo != $row->JobFileNo){
                    $content .= "<td style='border:1px solid gray'>" . $row->LodgementFee . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->BreakBulkFee . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->StorageFee . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->BadCargoOrderFee . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->VCRC . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->CNI . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->CNIU . "</td>";
                    $content .= "<td style='border:1px solid gray'>" . $row->OtherFees . "</td>";
                    $lodgementFee += $row->LodgementFee;
                    $breakbulkfee += $row->BreakBulkFee;
                    $storagefee   += $row->StorageFee;
                    $badcargofee  += $row->BadCargoOrderFee;
                    $vcrc         += $row->vcrc;
                    $cni          += $row->cni;
                    $cniu         += $row->cniu;
                    $otherfees    += $row->OtherFees;
                  }else{
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                      $content .= "<td style='border:1px solid gray'></td>";
                     
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             $total = "<tr>
                            <td style='border:1px solid gray'><b>TOTAL </b></td>
                            <td style='border:1px solid gray'> </td>
                            <td style='border:1px solid gray'> </td>
                            <td style='border:1px solid gray'> </td>
                            <td style='border:1px solid gray'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td style='border:1px solid gray'>" . number_format($vcrc, 2, '.', ','). "</td>
                            <td style='border:1px solid gray'>" . number_format($cni, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($cniu, 2, '.', ',') . "</td>
                            <td style='border:1px solid gray'>" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";

                $dispOutput .="<table class ='table-condensed table-bordered'  style='border:1px solid gray'>
                    <thead>
                    <tr>
                      <th style='border:1px solid gray'>Jobfile No</th>
                      <th style='border:1px solid gray'>Actual Arrival Time</th>
                      <th style='border:1px solid gray'>Aircraft</th>
                      <th style='border:1px solid gray'>Commodity</th>
                      <th style='border:1px solid gray'>Lodgement Fee</th>
                      <th style='border:1px solid gray'>Break Bulk Fee</th>
                      <th style='border:1px solid gray'>Storage Fee</th>
                      <th style='border:1px solid gray'>Bad Cargo Order Fee</th>
                      <th style='border:1px solid gray'>VCRC</th>
                      <th style='border:1px solid gray'>CNI</th>
                      <th style='border:1px solid gray'>CNIU</th>
                      <th style='border:1px solid gray'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;

          
          }
           $dispOutput .= '
              </tbody>
            </table>
          </div> 
          </div>'  . $footer_proprietary . $footer .'
          </body>
      </html>';

      return $dispOutput;
  }


}

?>