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
           $consigneeId          =  $this->input->get('consigneeId');
           $charges              =  $this->input->get('charges');
          
              $documnt = $this->createDocToPrint($monitoringType,$userID,$consigneeId,$ataFrom,$ataTo,$charges);
              $mpdf->useSubstitutions=false;
              $mpdf->simpleTables = true;
              $this->m_pdf->pdf->AddPage('L');
               $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
          $this->m_pdf->pdf->WriteHTML($stylesheet,1);
              $this->m_pdf->pdf->WriteHTML($documnt);
              $this->m_pdf->pdf->Output();

              //echo $documnt;
  }

  function createDocToPrint($monitoringType,$userID,$consigneeId,$ataFrom,$ataTo,$charges){
         $reportsVolume = $this->Charges->getReportsVolume($monitoringType,$userID,$consigneeId,$ataFrom,$ataTo,$charges);
        // $cName = $this->Charges->getcName($userID);
         $volume = 0;
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
         $rCharges = 0;
         $tVolume = 0;
          
         $oldJBNo = '';
         $newJBNo = '';
         $monHeader = '';
         $tableHeader = '';
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
              <body>
                
                <div class="change_print'.$i.'"  >  

                <div style="font-family:Century Gothic;" class="mycontent">
                    <div  class="">
                          <h5 style="text-align:center">FIL-PORT EXPRESS BROKERAGE, INC.</h5>
                <div>
                <div class="col-md-12" style="font-family:Century Gothic; font-size:16px;">
                  <table style="width:100%;" style="white-space:wrap;">
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
                          <span class="pull-left">
                             From :  ' . $ataFrom . '
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <th style="text-align:left">
                          <span class=""> 
                          
                          </span>
                        </th>
                        <td>
                          <span class="pull-left">
                              To : ' . $ataTo . '
                          </span>
                        </td>
                      </tr>

                  </table>
                </div>
                <hr>
                <div class="table-volume-manila">';

                if($monitoringType == 1 || $monitoringType == 2){

                foreach ($reportsVolume as $row) {

                   
                   if($charges == "*"){
                       if($oldJBNo != $row->JobFileNo){
                        $content .= "<tr>";
                        $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                        $content .= "<td style='padding:10px;'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Weighing . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DEL . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->OtherFees . "</td>";
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
                            $bpiInspection  += $row->BPIInspection;
                            $otherfees      += $row->OtherFees;
                            $tVolume        += $volume;
                      }
                  }else{
                       if($oldJBNo != $row->JobFileNo){
                         $content .= "<tr>";
                         $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                         $tVolume += $volume;
                        $content .= "<td style='padding:10px;'>" .number_format($row->RCharges, 2, '.', ',')."</td>";
                            $rCharges   += $row->RCharges;
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td  colspan=3 style='padding:10px;'><b>TOTAL </b></td>

                            <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='padding:10px;'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";

                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>THC Charges</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Arrastre</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Wharfage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Weighing</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Dispatch Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>DEL</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Inspection</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BPI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                                      </tr>";
                 }else{
                    $total = "<tr>
                               <td style='padding:10px;'><b>TOTAL </b></td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Delivery At Warehouse</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>";
                      $tableHeader .= " <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table class='table table-condensed table-bordered'>
                    <thead>
                       " .   $tableHeader . "
                    </thead>
                    <tbody>
                    " . $content . $total;


                 
            }else{
              foreach ($reportsVolume as $row) {
                  if($oldJBNo != $row->JobFileNo){
                     $content .= "<tr>";
                     $content .= "<td style='padding:10px;' >" . $row->JobFileNo . "</td>";
                    $content .= "<td style='padding:10px;' >" . $row->ATA . "</td>";
                    $content .= "<td style='padding:10px;' >" . $row->TargetDeliveryDate . "</td>";
                  
                    if($charges == "*"){
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:10px;' >" . $row->LodgementFee . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->BreakBulkFee . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->StorageFee . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->BadCargoOrderFee . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->VCRC . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->CNI . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->CNIU . "</td>";
                      $content .= "<td style='padding:10px;' >" . $row->OtherFees . "</td>";
                      $tVolume      += $volume;
                      $lodgementFee += $row->LodgementFee;
                      $breakbulkfee += $row->BreakBulkFee;
                      $storagefee   += $row->StorageFee;
                      $badcargofee  += $row->BadCargoOrderFee;
                      $vcrc         += $row->VCRC;
                      $cni          += $row->CNI;
                      $cniu         += $row->CNIU;
                      $otherfees    += $row->OtherFees;
                    }else{
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td style='padding:10px;' ><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:10px;' >" . $row->RCharges . "</td>";
                      $tVolume      += $volume;
                      $rCharges    += $row->RCharges;
                    }
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             if($charges == "*"){
                $total = "<tr>
                            <td colspan=3 kailan ka punta dito ><b>TOTAL </b></td>
                            <td style='padding:10px;'>" . $tVolume . "</td>
                            <td style='padding:10px;' >" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;' >" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td style='padding:10px;' >" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td style='padding:10px;' >" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td style='padding:10px;' >" . number_format($vcrc, 2, '.', ','). "</td>
                            <td style='padding:10px;' >" . number_format($cni, 2, '.', ',') . "</td>
                            <td style='padding:10px;' >" . number_format($cniu, 2, '.', ',') . "</td>
                            <td style='padding:10px;' >" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";
             }else{
                 $total = "<tr>
                            <td colspan=3 style='padding:10px;text-align:center;font-weight:bold;'>bTOTAL</td>
                            <td style='padding:10px;'>" . $tVolume . "</td>
                            <td style='padding:10px;'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table table-bordered' >
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Lodgement Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Break Bulk Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Storage Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Bad Cargo Order Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>VCRC</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>CNI</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>CNIU</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }else{
              $dispOutput .="<table class ='table table-bordered' >
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'> " . $charges . " </th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }
          }
           $dispOutput .= '
              </tbody>
            </table>
          </div> 
        </div>
      </body>
    </html>';

      return $dispOutput;
  }


}

?>