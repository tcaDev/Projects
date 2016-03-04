<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_availability extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
            $this->load->model('Jobfile');
       }


   function index(){
   	  $jobfile = addslashes($this->input->post('jbfl'));
   	  $vessel  = addslashes($this->input->post('vessel'));
      $exist_vessel  = addslashes($this->input->post('exist_vessel'));

   /*   if($vessel){
        echo "<i style='color:green;'>This is your old vessel!</i>"; 
      }else{
*/
/*      if($vessel == ""){
        echo  "<i></i>";
      }else if($exist_vessel == 'true' ){
        echo "<i style='color:red;'>Already exists</i>";  
      }
      else if($exist_vessel == 'false' ){
         echo "<i style='color:green;'>Available</i>"; 
      }
      else{*/
         $query= $this->db->query("Select * from vw_CarrierByJobFile where JobFileNo ='$jobfile' and VesselVoyageNo='$vessel' limit 1");
            
          if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else{
             echo "<i style='color:green;'>Available</i>"; 
          }

                   $query= $this->db->query("Select * from vw_CarrierByJobFile where JobFileNo ='$jobfile' and VesselVoyageNo='$vessel' and CarrierName='$exist_vessel' limit 1");
            
          if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Carrier and Vessel are Already exists</i>";     
          }else{
             /*echo "<i style='color:green;'>Available</i>"; */
          }
      // }
      //}
   }

   function container_manila(){
   	 	  $jobfile    = addslashes($this->input->post('jbfl'));
   	    $container  = addslashes($this->input->post('containerno'));
        $vessel_voyage  = addslashes($this->input->post('vessel_voyage'));

          $query2= $this->db->query("Select * from vw_Containers where JobFileNo ='$jobfile' and ContainerNo='$container' and CarrierByJobFileId='$vessel_voyage' limit 1");
   	      /* $query= $this->db->query("Select * from vw_Containers where JobFileNo ='$jobfile' and ContainerNo='$container' limit 1");*/
      /*    if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else*/if($query2->num_rows() == 1){
            echo  "<i style='color:red;'>Container Number is already exists</i>"; 
          }else{
            echo "<i style='color:green;'>Available</i>"; 
          }
             
          
           
           
             	
   }

   function commodity_check(){
   	   $jobfile = $this->input->post('jbfl');
   	   $products = $this->input->post('products');

   	   if($products!=''){
	       $products = explode(',', $products);
	       $pro =  json_encode($products);
	       $finals = substr($pro, 1,-1);
	       echo $replace_single_quotes = str_replace('"',"'",$finals);
       }else{
       	$replace_single_quotes='No products';
       }
     /*  $res = $this->Jobdata->compare_products($jobfile,$replace_single_quotes);
*/   
  /*       $res = $this->eli($replace_single_quotes);
     	var_dump($res);*/


}
/*  function eli(){
  	

  }*/

  function check_content(){
  $old_total =   $this->input->get('total');
  $montype =   $this->input->get('montype');

  $query = $this->db->query("SELECT * FROM vw_JobFile where MonitoringTypeId='$montype'");
  $update_total=  $query->num_rows();


   if($update_total>$old_total){
    $data['manila'] =   $this->Jobdata->update_data($montype);;  
    $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
    ?>
    <script>
         $('.manila_total_new').val(<?php echo $update_total; ?>);
    </script>
   
    <?php
   }else
     echo 1;
  }

function check_air(){
 $jobfile =  $this->input->get('jobfile');
           $query= $this->db->query("Select * from JobFile_Air where JobFileNo ='$jobfile'  limit 1");
          if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Jobfile Already Exists in Air</i>";     
          }else{
             echo "<i style='color:green;'>Jobfile is Available</i>"; 
          }
}

function reset_password(){
  $pass =   $this->input->post('pass');
  $cpass =   $this->input->post('cpass');
  $uid =   $this->input->post('uid');

  $salt  = 'fwodhsljkfhnouh';
  $salt2 = 'djaoiuelanwdoiwq';
  $password = sha1($salt.$cpass.$salt2);

   $data = array(
              'Password'    => $password
           );
          $this->db->where('UserId', $uid);
          $this->db->update('User', $data);
  }



      function dashboard_legend_sea(){

        $piechart =  $this->Jobdata->chart_sea();

        $data['piechart'] = $piechart;

        $this->load->view('dashboard/sea_chart',$data);
      }

       function dashboard_legend_sea_outport(){

        $piechart =  $this->Jobdata->chart_sea_outport();

        $data['piechart'] = $piechart;

        $this->load->view('dashboard/sea_chart_outport',$data);
      }

      function dashboard_legend_air(){

        $piechart =  $this->Jobdata->chart_air();

        $data['piechart'] = $piechart;

        $this->load->view('dashboard/air_chart',$data);
      }

      function dashboard_jobfile(){
        $barchart_mnila =  $this->Jobdata->jobfile_graph_manila();
        $barchart_outport =  $this->Jobdata->jobfile_graph_outport();
        $barchart_air =  $this->Jobdata->jobfile_graph_air();

        $data['barchart_mnila'] = $barchart_mnila;
        $data['barchart_outport'] = $barchart_outport;
        $data['barchart_air'] = $barchart_air;

        $this->load->view('dashboard/jobfile_bargraph',$data);
      }


     /* function accreditations(){
        $consignee_name    =  $this->input->post('consignee_name');  
        $monitoringType    =  $this->input->post('monType');
        $rowCt = 0;
        
        $dispOutput = ""; 
        $dispCount = 0;
        $jobfiles= $this->Jobdata->get_consignees_report($consignee_name);
         $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table  class="tablesorter tableReports table table-bordered table-striped table-condensed order-table">';
          $dispOutput .= '
                        <thead>
                           <tr>
                              <th><center> Consignee Name </center> </th>
                            </tr>
                        </thead>
                      ';

           $dispOutput .='<tbody>';
          foreach($jobfiles as $row){
              $dispOutput .='
                        <tr class="accreditations-row">
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                        </tr>
                      
              ';
          }
              $dispOutput .='</tbody>';
              $dispOutput .= '</table>';
        }
          $rowCt = $ct;
           $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableReportSort.js") . '"></script>
                      ';

              $dispCount =  $rowCt ;
              $output = array(
                array(
                   "disp" => $dispOutput,
                   "result_count" => $dispCount
                  )
                );
              
             echo json_encode($output);
      }*/

      function loadAccreditations(){
        // $consignee_name    =  $this->input->post('consignee_name');  
          $monitoringType    =  $this->input->post('montype');
          $jobfiles= $this->Jobdata->get_accreditations($monitoringType);
           $ct = count($jobfiles);
           $i = 0;
            if($ct > 0){
            $dispOutput = '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
             <table class="tablesorter tableReports table table-bordered table-striped table-condensed order-table order-table-accreditations" style="width:100%">';
            $dispOutput .= '
                          <thead>
                             <tr>
                                <th><center> No </center> </th>
                                <th><center> JobFile No </center> </th>
                                <th><center> Client </center> </th>
                                <th><center> Commodity </center> </th>
                                <th><center> Contact Person </center> </th>
                                <th><center> Date Received Notice From Clients </center> </th>
                                <th><center> Date Received of Other Documents </center> </th>
                                <th><center> Status Reports </center> </th>
                              </tr>
                          </thead>
                        ';

             $dispOutput .='<tbody>';
            foreach($jobfiles as $row){
              $i = $i + 1;
                $dispOutput .='
                          <tr class="accreditations-row">
                                <td>'. $i .'</td>
                                <td>'.stripslashes($row->JobFileNo).'</td>
                                <td>'.stripslashes($row->ConsigneeName).'</td>
                                <td> <button class="btn btn-success btn-show-commodity" id="'.stripslashes($row->JobFileId).'"> Commodity </button></td>
                                <td> <button class="btn btn-success btn-show-contact-person"> Contact Person </button></td>
                                <td>'.stripslashes($row->DateReceivedNoticeFromClients).'</td>
                                <td>'.stripslashes($row->DateReceivedOfOtherDocs).'</td>
                                <td> <button class="btn btn-success btn-status-report" id="'.stripslashes($row->JobFileId).'"> Status Reports </button></td>
                          </tr>                  
                ';
            }
                $dispOutput .='</tbody>';
                $dispOutput .= '</table></div></div>';
          }
          $dispCount = $ct; 
          //$dispOutput = $jobfiles;
           $dispOutput .=  '<script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.min.js") . '"></script>
                            <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                            <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                            <script src="' .  base_url("resources/table_sort/tableAccreditationSort.js") . '"></script>
                      ';

                      $output = array(
                          array(
                              "disp" => $dispOutput,
                              "ct" => $dispCount,
                            )
                      );
                      echo json_encode($output);
      }

      function accreditaions_get_commodity(){
            $jbID    =  $this->input->post('jbNo');  
            $monitoringType    =  $this->input->post('montype');
            $dispOutput = '';
            if($monitoringType == 1 || $monitoringType == 2){
            $product  = $this->Jobdata->get_goods($jbID);
            }else if($monitoringType == 3){
               $product  = $this->Jobdata->get_goods_air($jbID);
            }
             if($product==NULL){
                   $dispOutput .= '<center><span style="color:red">No Commodities Yet </span></center>';
              }else{
                    $dispOutput .=  "<table id='tbl-commodities' class='table table-striped tableOverFlow'>
                        <tr>
                             <th>No.</th>
                             <th>Commodity</th>";
                             if($monitoringType == 1 || $monitoringType == 2){
                               $dispOutput .= "<th> Container No  </th>";
                             }          
                         $dispOutput .= "</tr>";

                    $i=0;
                   foreach($product as $row){
                    $i++;
                    if($i==1){
                       if($row->ProductName==''){
                           $dispOutput .=  "</table>";
                           $dispOutput .=     '<center><span style="color:red">No Goods Yet </span></center>';
                          break;
                        }
                    }else{
                        if($row->ProductName==''){
                          break;
                        }
                    }
                        $dispOutput .=  "<tr>";
                        $dispOutput .=  "<td class='tdOverFlow'>".$i." </td>";
                        $dispOutput .=  "<td class='tdOverFlow'>".stripslashes($row->ProductName)."</td>";
                        if($monitoringType == 1 || $monitoringType == 2){
                        $dispOutput .=   "<td class='tdOverFlow'>".stripslashes($row->ContainerNo) ."</td>";
                        }
                        $dispOutput .=  "</tr>";
                   }
                    $dispOutput .=  "</table>";
              }


        echo $dispOutput;
      }

      function accreditations_get_contacts(){
          $conName           =  $this->input->post('conName');  
          $monitoringType    =  $this->input->post('montype');
          $dispOutput = '';
          $contacts = $this->Jobdata->get_consignee_contacts($conName);
          $dispOutput .=  "<table id='tbl-contact-person' class='table table-striped tableOverFlow'>
                        <tr>
                             <th>Consignee Name</th>
                             <th>Contact No </th>
                             <th>E-mail Address</th>
                        </tr>";

                    $i=0;
                    if(count($contacts) > 0){
                       foreach($contacts as $row){
                        $dispOutput .=  "<tr>";
                        $dispOutput .=  "<td class='tdOverFlow'>".stripslashes($row->ConsigneeName)."</td>";
                        $dispOutput .=   "<td class='tdOverFlow'>".stripslashes($row->ContactNo1) ."</td>";
                        $dispOutput .=   "<td class='tdOverFlow'>".stripslashes($row->ContactNo2) ."</td>";
                        $dispOutput .=  "</tr>";
                      }
                    }else{
                           $dispOutput .=  "</table>";
                           $dispOutput .=     '<center><span style="color:red">No Data of Contact Information from this Consignee </span></center>';
                    }
                  
                $dispOutput .=  "</table>";


                echo $dispOutput;
      }

      function accreditations_get_status_report(){
      $status    =  $this->input->post('id');   
      $monType   = $this->input->post('monType');
      $charges   = $this->Jobdata->report_get_status($status,$monType);

      if(count($charges)){
         echo "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;'>
                <tr>
                      <th style='border: 1px solid gray'>Date Added.</th>
                      <th style='border: 1px solid gray'>Status Description</th>
                </tr>";
        $i=0;
        foreach ($charges as $row) {
          $i++;
         $description = $row->StatusDescription;
         echo " <tr>
                   <td class='loadaccreditation-reports tdOverFlow' id='loadaccreditation-reports' style='border: 1px solid gray'>".$row->DateAdded."</td>
                   <td class='loadaccreditation-reports tdOverFlow' id='loadaccreditation-reports' style='border: 1px solid gray'>". $description ."</td>
                </tr>
              ";
        }
         echo "</table>";
      }else{
        echo '<center><span style="color:red">No Record of Status Report </span></center>';
      }
   }

    function user_type(){
      $types = $this->Jobfile->user_types();

      $output = '';
      $output .= '<i><option value="0" disabled selected>Select User</option></i>';
      foreach ($types as $row) {
        $output .='<option value="'.$row->RoleId.'">'.$row->RoleName.'</option>';
      }

      echo $output;
      
    }

}
?>   