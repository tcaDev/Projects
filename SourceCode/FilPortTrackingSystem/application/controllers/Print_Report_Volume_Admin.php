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

                   
                   if($charges == "*"){
                       if($oldJBNo != $row->JobFileNo){
                        $content .= "<tr>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->TargetDeliveryDate . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='border: 1px solid gray'><center>" . $volume. "</center></td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->Weighing . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->DEL . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='border: 1px solid gray'>" . $row->OtherFees . "</td>";
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
                            $tVolume        += $volume;
                      }
                  }else{
                       if($oldJBNo != $row->JobFileNo){
                         $content .= "<tr>";
                         $content .= "<td style='border: 1px solid gray'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='border: 1px solid gray'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='border: 1px solid gray'>" . $row->TargetDeliveryDate . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='border: 1px solid gray'><center>" . $volume. "</center></td>";
                         $tVolume += $volume;
                        $content .= "<td style='border: 1px solid gray'>" .number_format($row->RCharges, 2, '.', ',')."</td>";
                            $rCharges   += $row->RCharges;
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td style='border: 1px solid gray'><b>TOTAL </b></td>
                            <td style='border: 1px solid gray'></td>
                            <td style='border: 1px solid gray'></td>
                            <td style='border: 1px solid gray'>" . $tVolume . "</td>";
                    $total .= "<td style='border: 1px solid gray'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='border: 1px solid gray'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='border: 1px solid gray'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='border: 1px solid gray'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='border: 1px solid gray'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";

                    $tableHeader = "  <tr>
                                        <th style='border: 1px solid gray'>Jobfile No</th>
                                        <th style='border: 1px solid gray'>Actual Arrival Time</th>
                                        <th style='border: 1px solid gray'>Delivery Date</th>
                                        <th style='border: 1px solid gray'>Volume </th>
                                        <th style='border: 1px solid gray'>Lodgement Fee</th>
                                        <th style='border: 1px solid gray'>THC Charges</th>
                                        <th style='border: 1px solid gray'>Arrastre</th>
                                        <th style='border: 1px solid gray'>Wharfage</th>
                                        <th style='border: 1px solid gray'>Weighing</th>
                                        <th style='border: 1px solid gray'>Dispatch Fee</th>
                                        <th style='border: 1px solid gray'>DEL</th>
                                        <th style='border: 1px solid gray'>SRA Application</th>
                                        <th style='border: 1px solid gray'>SRA Inspection</th>
                                        <th style='border: 1px solid gray'>BAI Application</th>
                                        <th style='border: 1px solid gray'>BAI Inspection Fee</th>
                                        <th style='border: 1px solid gray'>BPI Inspection Fee</th>
                                        <th style='border: 1px solid gray'>Other Fees</th>
                                      </tr>";
                 }else{
                    $total = "<tr>
                               <td style='border: 1px solid gray'><b>TOTAL </b></td>
                               <td style='border: 1px solid gray'> </td>
                               <td style='border: 1px solid gray'> </td>
                               <td style='border: 1px solid gray'>" . $tVolume . "</td>";
                    $total .= "<td style='border: 1px solid gray'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th style='border: 1px solid gray'>Jobfile No</th>
                                        <th style='border: 1px solid gray'>Actual Arrival Time</th>
                                        <th style='border: 1px solid gray'>Actual Delivery At Warehouse</th>
                                        <th style='border: 1px solid gray'>Volume </th>";
                      $tableHeader .= " <th style='border: 1px solid gray'> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table style='border: 1px solid gray;width:100%'>
                    <thead>
                       " .   $tableHeader . "
                    </thead>
                    <tbody>
                    " . $content . $total;


                 
            }else{
              foreach ($reportsVolume as $row) {
                  if($oldJBNo != $row->JobFileNo){
                     $content .= "<tr>";
                     $content .= "<td >" . $row->JobFileNo . "</td>";
                    $content .= "<td >" . $row->ATA . "</td>";
                    $content .= "<td >" . $row->TargetDeliveryDate . "</td>";
                  
                    if($charges == "*"){
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td><center>" . $volume. "</center></td>";
                      $content .= "<td >" . $row->LodgementFee . "</td>";
                      $content .= "<td >" . $row->BreakBulkFee . "</td>";
                      $content .= "<td >" . $row->StorageFee . "</td>";
                      $content .= "<td >" . $row->BadCargoOrderFee . "</td>";
                      $content .= "<td >" . $row->VCRC . "</td>";
                      $content .= "<td >" . $row->CNI . "</td>";
                      $content .= "<td >" . $row->CNIU . "</td>";
                      $content .= "<td >" . $row->OtherFees . "</td>";
                      $tVolume      += $volume;
                      $lodgementFee += $row->LodgementFee;
                      $breakbulkfee += $row->BreakBulkFee;
                      $storagefee   += $row->StorageFee;
                      $badcargofee  += $row->BadCargoOrderFee;
                      $vcrc         += $row->vcrc;
                      $cni          += $row->cni;
                      $cniu         += $row->cniu;
                      $otherfees    += $row->OtherFees;
                    }else{
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td><center>" . $volume. "</center></td>";
                      $content .= "<td >" . $row->RCharges . "</td>";
                      $tVolume      += $volume;
                      $rCharges    += $row->RCharges;
                    }
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             if($charges == "*"){
                $total = "<tr>
                            <td ><b>TOTAL </b></td>
                            <td > </td>
                            <td > </td>
                            <td style='border: 1px solid gray'>" . $tVolume . "</td>
                            <td >" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td >" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td >" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td >" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td >" . number_format($vcrc, 2, '.', ','). "</td>
                            <td >" . number_format($cni, 2, '.', ',') . "</td>
                            <td >" . number_format($cniu, 2, '.', ',') . "</td>
                            <td >" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";
             }else{
                 $total = "<tr>
                            <td ><b>TOTAL </b></td>
                            <td > </td>
                            <td > </td>
                            <td style='border: 1px solid gray'>" . $tVolume . "</td>
                            <td >" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table-condensed table-bordered; width:100%' border=1>
                    <thead>
                    <tr>
                      <th >Jobfile No</th>
                      <th >Actual Arrival Time</th>
                      <th >Delivery Date</th>
                      <th >Gross Weight</th>
                      <th >Lodgement Fee</th>
                      <th >Break Bulk Fee</th>
                      <th >Storage Fee</th>
                      <th >Bad Cargo Order Fee</th>
                      <th >VCRC</th>
                      <th >CNI</th>
                      <th >CNIU</th>
                      <th >Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }else{
              $dispOutput .="<table class ='table-condensed table-bordered; width:100%'  border=1>
                    <thead>
                    <tr>
                      <th >Jobfile No</th>
                      <th >Actual Arrival Time</th>
                      <th >Delivery Date</th>
                      <th >Gross Weight</th>
                      <th > " . $charges . " </th>
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