<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
 class Print_Report_Volume_Admin extends CI_Controller {


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
           
              $reportsVolume = $this->Charges->get_Volume_Reports($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges);
              //var_dump($reportsVolume);
              $documnt = $this->createDocToPrint($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges);

              $mpdf->useSubstitutions=false;
              $mpdf->simpleTables = true;
              $this->m_pdf->pdf->AddPage('L');
              $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
              $this->m_pdf->pdf->WriteHTML($stylesheet,1);

              $this->m_pdf->pdf->WriteHTML($documnt);
              $this->m_pdf->pdf->Output();

              echo $documnt;
  }

  function createDocToPrint($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges){
         $reportsVolume = $this->Charges->get_Volume_Reports($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges);
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
         $vcrc  = 0;
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
                <div class="col-md-12">
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
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->TargetDeliveryDate . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'><center>" . $volume. "</center></td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->Weighing . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->DEL . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->OtherFees . "</td>";
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
                         $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='padding:5px;border:1px solid #ddd;'>" . $row->TargetDeliveryDate . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:5px;border:1px solid #ddd;'><center>" . $volume. "</center></td>";
                         $tVolume += $volume;
                        $content .= "<td style='padding:5px;border:1px solid #ddd;'>" .number_format($row->RCharges, 2, '.', ',')."</td>";
                            $rCharges   += $row->RCharges;
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td style='padding:5px;border:1px solid #ddd;font-weight:bold;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'></td>
                            <td style='padding:5px;border:1px solid #ddd;'></td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:5px;border:1px solid #ddd;'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='padding:5px;border:1px solid #ddd;'>" . number_format($otherfees, 2, '.', ',') . "</td> 
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
                               <td style='padding:5px;border:1px solid #ddd;font-weight:bold;'>TOTAL</td>
                               <td style='padding:5px;border:1px solid #ddd;'> </td>
                               <td style='padding:5px;border:1px solid #ddd;'> </td>
                               <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:5px;border:1px solid #ddd;'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Delivery At Warehouse</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>";
                      $tableHeader .= " <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table class='table table-bordered' style='width:100%'  border=1>
                    <thead>
                       " .   $tableHeader . "
                    </thead>
                    <tbody>
                    " . $content . $total;


                 
            }else{
              foreach ($reportsVolume as $row) {
                  if($oldJBNo != $row->JobFileNo){
                     $content .= "<tr>";
                     $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->JobFileNo . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->ATA . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->TargetDeliveryDate . "</td>";
                  
                    if($charges == "*"){
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->LodgementFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BreakBulkFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->StorageFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BadCargoOrderFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->VCRC . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNI . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNIU . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->OtherFees . "</td>";
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
                      $content .= "<td style='padding:5px;border:1px solid #ddd;'><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->RCharges . "</td>";
                      $tVolume      += $volume;
                      $rCharges    += $row->RCharges;
                    }
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             if($charges == "*"){
                $total = "<tr>
                            <td colspan=3 style='padding:5px; font-weight:bold;border:1px solid #ddd;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($vcrc, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cni, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cniu, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";
             }else{
                 $total = "<tr>
                            <td colspan=3 style='padding:5px;border:1px solid #ddd;font-weight:bold;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Break Bulk Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Storage Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Bad Cargo Order Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>VCRC</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNI</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNIU</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }else{
              $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> " . $charges . " </th>
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