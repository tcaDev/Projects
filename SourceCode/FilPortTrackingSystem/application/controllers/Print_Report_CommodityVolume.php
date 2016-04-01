<?php

 date_default_timezone_set('Asia/Manila');
 require_once APPPATH.'libraries/swift_mailer/swift_required.php';
class Print_Report_CommodityVolume extends CI_Controller {

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
           $montype =  $this->input->get('montype');  
           $con_id  =  $this->input->get('cID');  
           $prod_id =  $this->input->get('pID');
           $frm   =  $this->input->get('frm');  
           $to    =  $this->input->get('to'); 
          
              $documnt = $this->createDocToPrint($con_id,$prod_id,$frm,$to,$montype);
              $mpdf->useSubstitutions=false;
              $mpdf->simpleTables = true;
              //$this->m_pdf->pdf->AddPage('L');
              $stylesheet = file_get_contents('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'); // external css
              $this->m_pdf->pdf->WriteHTML($stylesheet,1);
              $this->m_pdf->pdf->WriteHTML($documnt);
              $this->m_pdf->pdf->Output();

              //echo $documnt;
  }

  function createDocToPrint($con_id,$prod_id,$frm,$to,$monitoringType){
         $commodityVolume = $this->Charges->getCommodityVolume($con_id,$prod_id,$frm,$to,$monitoringType);
         $cName = $this->Charges->getcName($con_id);
         $volume = 0;
         $tVolume = 0;
         $rCharges = 0;
         $dispOutput = '';
         $content ='';
         $total ='';
          
         $oldJBNo = '';
         $monHeader = '';
         $tableHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }

           if($monitoringType == 1 || $monitoringType == 2){
                foreach($commodityVolume as $row){
                  $content .= "<tr>";
                  if($row->JobFileNo != $oldJBNo){
                    $content .= "<td style='padding:5px;'>" . $row->JobFileNo . "</td>";
                    $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                    $content .= "<td style='padding:5px;'>" . $volume . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ActualArrivalTime . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td style='padding:5px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>";
                    $tVolume  += $volume;
                    $rCharges += $row->Total_Charges;
                  }else{
                    if($row->ProductName != ""){
                      $content .= "<td></td>";
                      $content .= "<td></td>";
                      $content .= "<td></td>";
                      $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                      $content .= "<td></td>";
                    }
                  }
                  $content .= "</tr>"; 
                  $oldJBNo = $row->JobFileNo;
               }
            }else{
               foreach($commodityVolume as $row){
                  $content .= "<tr>";
                  if($row->JobFileNo != $oldJBNo){
                    $content .= "<td style='padding:5px;'>" . $row->JobFileNo . "</td>";
                    $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                    $content .= "<td style='padding:5px;'>" . $volume . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ATA . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td style='padding:5px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>";
                    $tVolume  += $volume;
                    $rCharges += $row->Total_Charges; 
                  }else{
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td></td>";
                  }
                  $content .= "</tr>"; 
                  $oldJBNo = $row->JobFileNo;
               }
            }

            $total .= '
                        <tr>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> <b> TOTAL </b> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">' . $tVolume . '</th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">' . number_format($rCharges,2,'.',',') . '</th>
                        </tr>
                      ';
   
         $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
          $footer ='';
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
              <body>
                
                <div class="change_print'.$i.'"  >  
                ' . $footer . '
                <div class="mycontent">
                <div>
                <div>
                <span style="font-size:18px;font-weight: bold;">Reports on Volume</span><br>
                <span style="font-size:16px;">'.$monHeader.'</span>
                <br>
                <br>
                <div class="col-md-12"><br>
                  <table>
                      <tr>
                        <th>
                          <span style="font-weight:bold;">Consignee Name :</span> 
                        </th>
                        <th>
                        &nbsp;
                         <span class="pull-left">
                           ' . $cName->ConsigneeName . '
                          </span>
                        </th>
                      </tr>
                  </table>
                </div>
                <hr>
                <div class="table-volume-manila">';
            $dispOutput .= '
            <table class="table-bordered table">
              <tr>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Jobfile No</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Volume</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Actual Arrival Time</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Commodity</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Running Charges</th>
              <tr>' . $content . $total .' 
            </table>
            ';
         
           $dispOutput .= '
          </div> 
        </div>'  . $footer_proprietary . $footer .'
      </body>
    </html>';

      return $dispOutput;
  }


}

?>