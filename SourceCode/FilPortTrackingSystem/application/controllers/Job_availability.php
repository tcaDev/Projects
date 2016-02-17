<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_availability extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
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


function get_User_list_admin(){

        $User_list = $this->Jobdata->get_user_admin();

        echo '
            <div class="col-lg-12 row">
            <table class=" table-bordered table-condensed " style="width:2000px;">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th>Status</th>
                      <th>Update</th>
                      <th>Reset Password</th>
                      <th>Username</th>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                      <th>EmailAddress</th>
                      <th>Title</th>
                      <th>Department</th>
                      <th>ContactNo1</th>
                      <th>ContactNo2</th>
                      <th>Address 1</th>
                      <th>Address 2</th>
                  </tr>
                </thead>      
                <tbody>


        ';
        $i=0;
        foreach ($User_list as $row) {
          $i++;
          $uid = $row->UserId;
          $uname = $row->UserName;
          $fname = $row->FirstName;
          $mname = $row->MiddleName;
          $lname = $row->LastName;
          $email = $row->EmailAddress;
          $contact1 = $row->ContactNo1;
          $contact2 = $row->ContactNo2;
          $addr = $row->Address1;
          $addr2 = $row->Address2;
         
          $active= $row->IsActive;
            if($active==1){ 
              $stat = 'activated';
              $mystat = '1';
            }else{
              $stat = 'deactivated';
              $mystat= '0';
            }

           echo '
            <tr>
              <td>'.$i.'</td>
              <td class="hidden">'.$uid.'</td>
              <td class="hidden">'.$mystat.'</td>
              <td>'.$stat.' </td>
              <td><button type="button" class="btn btn-default btn-sm btn-update-user" data-toggle="modal" href="#myModal_updateUser"><span class="fa fa-pencil fa-fw"></span></button></td>
              <td><button type="button" class="btn btn-default btn-sm btn-reset-pass" data-toggle="modal" href="#myModal_resetPass"><span class="fa fa-refresh fa-fw"></span></button></td>
              <td>'.$uname.'</td>
              <td>'.$fname.'</td>
              <td>'.$mname.'</td>
              <td>'.$lname.'</td>   
              <td>'.$email.'</td>
              <td>'.$row->Title.'</td>
              <td>'.$row->Department.'</td>
              <td>'.$contact1.'</td>
              <td>'.$contact2.'</td>
              <td>'.$addr.'</td>
              <td>'.$addr2.'</td>
            </tr>
           '; 

        }

          echo '
               </tbody>         
             </table>
            </div>
        
          ';

 


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
}
?>   