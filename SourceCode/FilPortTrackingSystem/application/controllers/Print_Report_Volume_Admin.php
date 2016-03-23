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
               $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
              $this->m_pdf->pdf->WriteHTML($stylesheet,1);
              $this->m_pdf->pdf->WriteHTML($documnt);
              $this->m_pdf->pdf->Output();

              //echo $documnt;
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
                          <h5 style="text-align:center"> Filport Document</h5>
                <div>
                <div class="col-md-12" style="font-family:Century Gothic; font-size:16px;">
                  <table>
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
                        <th>
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
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->TargetDeliveryDate . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $volume. "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->THCCharges . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->Arrastre . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->Wharfage . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->Weighing . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->DEL . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='padding:10px;border:1px solid #ddd;''>" . $row->OtherFees . "</td>";
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
                         $content .= "<td style='padding:10px;border:1px solid #ddd;'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='padding:10px;border:1px solid #ddd;'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='padding:10px;border:1px solid #ddd;'>" . $row->TargetDeliveryDate . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;border:1px solid #ddd;'>" . $volume. "</td>";
                         $tVolume += $volume;
                        $content .= "<td style='padding:10px;border:1px solid #ddd;'>" . $row->RCharges . "</td>";
                            $rCharges   += $row->RCharges;
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td colspan=3 style='border:1px solid #ddd;padding:10px;'><b>TOTAL </b></td>
                            <td style='border:1px solid #ddd;padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='border:1px solid #ddd;padding:10px;'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:10px; border:1px solid #ddd;'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='padding:10px; border:1px solid #ddd;'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='padding:10px;border:1px solid #ddd;'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";

                    $tableHeader = "  <tr>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival Time</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Delivery Date</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Volume </th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Lodgement Fee</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>THC Charges</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Arrastre</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Wharfage</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Weighing</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Dispatch Fee</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>DEL</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>SRA Application</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>SRA Inspection</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>BAI Application</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>BAI Inspection Fee</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>BPI Inspection Fee</th>
                                        <th style='padding:5px;text-align:center;background-color:#ccc; border:1px solid #ddd;'>Other Fees</th>
                                      </tr>";
                 }else{
                    $total = "<tr>
                               <td style='padding:5px;text-align:center; border:1px solid #ddd;'><b>TOTAL </b></td>
                               <td> </td>
                               <td> </td>
                               <td>" . $tVolume . "</td>";
                    $total .= "<td>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th>Jobfile No</th>
                                        <th>Actual Arrival Time</th>
                                        <th>Actual Delivery At Warehouse</th>
                                        <th>Volume </th>";
                      $tableHeader .= " <th> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table class='table table-bordered'>
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
                      $content .= "<td>" . $volume. "</td>";
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
                            <td >" . $tVolume . "</td>
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
                            <td>" . $tVolume . "</td>
                            <td >" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table table-bordered'>
                    <thead>
                    <tr>
                      <th >Jobfile No</th>
                      <th >Actual Arrival Time</th>
                      <th >Delivery Date</th>
                      <th >Weight(kgs)</th>
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
              $dispOutput .="<table class ='table table-bordered'>
                    <thead>
                    <tr>
                      <th >Jobfile No</th>
                      <th >Actual Arrival Time</th>
                      <th >Delivery Date</th>
                      <th >Weight(kgs)</th>
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