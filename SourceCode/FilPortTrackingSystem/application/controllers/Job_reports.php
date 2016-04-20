<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_reports extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
       }

     function get_consignee_status_report(){
      $consignee_name    =  $this->input->post('consignee_name');  
      $monitoringType    =  $this->input->post('monType');
      $rowCt = 0;
       $dispOutput = "";
       $dispCount = 0;
        $jobfiles= $this->Jobdata->getJobfiles_Reports_Consignee($consignee_name,$monitoringType);
      if($monitoringType == 3){
          $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table class="tablesorter tableReports table-striped table-condensed table table-bordered order-table">';
          $dispOutput .= '
                        <thead>
                            <tr>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> House Airway Bill# </center></th>
                              <th hidden><center> Date Received of Other Documents </center></th>
                              <th><center>Purchase Order No. </center></th>
                            <tr>
                        </thead>
                      ';
            $dispOutput .='<tbody>';
          foreach($jobfiles as $row){
              $dispOutput .='
                      
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td hidden>'.stripslashes($row->DatePickUpOtherDocs).'</td>
                              <td>'.stripslashes($row->PurchaseOrderNo).'</td>
                        </tr>
                     
              ';
              $rowCt += 1;
          }
            $dispOutput .='</tbody>';
            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search</span></center>';
          }
      }else if($monitoringType == 1 || $monitoringType == 2){
      	
         $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table  class="tablesorter tableReports table table-bordered table-striped table-condensed order-table">';
          $dispOutput .= '
                        <thead>
                           <tr>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> HBL# </center></th>
                              <th hidden><center> Date Received of Other Documents </center></th>
                              <th><center>Purchase Order No. </center></th>
                            </tr>
                        </thead>
                      ';

           $dispOutput .='<tbody>';
          foreach($jobfiles as $row){
            if($monitoringType == $row->MonitoringTypeId){
              $dispOutput .='
                      
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td hidden>'.stripslashes($row->DateReceivedOfOtherDocs).'</td>
                              <td>'.stripslashes($row->PurchaseOrderNo).'</td>
                        </tr>
                      
              ';
              $rowCt += 1;
          	}
          }
              $dispOutput .='</tbody>';
            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search </span></center>';
          }
  }
       $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableReportSort.js") . '"></script>
                      ';

     /* $dispOutput = "Consignee ID  : "  . $consignee_name . " MID : " . $monitoringType;
      $dispCount = 0;*/
      $dispCount =  $rowCt ;
      $output = array(
        array(
           "disp" => $dispOutput,
           "result_count" => $dispCount
          )
        );
      
     echo json_encode($output);
   
  }

  function get_jobfile_global_search_consignee(){
	  $search         =  $this->input->post('search');
	  $monitoringType =  $this->input->post('monType');
	  $dispOutput = "";
	  $dispCount = 0;
	 
	 $jobfiles = $this->Jobdata->getJobfiles_Reports_Consignee($search,$monitoringType);
	 if(count($jobfiles) > 0){
	  $dispOutput .= '<table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;cursor:pointer" id="tbl-global-search"><thead><tr style="cursor:w-resize ;"><th > JobfileNumber </th><th >Color Stages</th><th>Consignee</th><th>Shipper </th><th> Status Report </th></tr></thead>';
	  if($monitoringType == 1 || $monitoringType == 2){
	    foreach ($jobfiles as $row) {
	     if($monitoringType == $row->MonitoringTypeId){
	           $dispCount += 1;
	           $dispOutput .='<tbody>';
	                             $pick =$row->IsBackground;
	                              if($pick==0){
	                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
	                                }else{
	                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
	                                }
	         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
	                         <td>' . stripslashes($row->JobFileNo) . '</td>
	                         ' . $pick1 . '
	                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
	                         <td>' .  stripslashes($row->ShipperName) .   '</td>
	                         <td>Status Reports</td>
	                         </tr>
	                        </tbody>';
	        }
	     }
	  }else if ($monitoringType == 3){
	    $dispCount = count($jobfiles);
	    foreach ($jobfiles as $row) {
	           $dispOutput .='<tbody>';
	                             $pick =$row->IsBackground;
	                              if($pick==0){
	                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
	                                }else{
	                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
	                                }
	         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
	                         <td>' . stripslashes($row->JobFileNo) . '</td>
	                         ' . $pick1 . '
	                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
	                         <td>' .  stripslashes($row->ShipperName) .   '</td>
	                         <td>Status Reports</td>
	                         </tr>
	                        </tbody>';
	     }
	  }else{
	    $dispCount = count($jobfiles);
	    foreach ($jobfiles as $row) {
	           $dispOutput .='<tbody>';
	                             $pick =$row->IsBackground;
	                              if($pick==0){
	                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
	                                }else{
	                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
	                                }
	         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
	                         <td>' . stripslashes($row->JobFileNo) . '</td>
	                         ' . $pick1 . '
	                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
	                         <td>' .  stripslashes($row->ShipperName) .   '</td>
	                         <td>Status Reports</td>
	                         </tr>
	                        </tbody>';
	     }
	  }
	 }

	 $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
	                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
	                      <script src="' .  base_url("resources/table_sort/tableReportSort.js") . '"></script>
	                      ';
	 $output = array(
	      array(
	          "disp" => $dispOutput,
	          "ct" => $dispCount,
	        )
	  );
	  echo json_encode($output);
	}
}


?>