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
   	  $jobfile = stripslashes($this->input->post('jbfl'));
   	  $vessel  = stripslashes($this->input->post('vessel'));
      $exist_vessel  = stripslashes($this->input->post('exist_vessel'));



      if($vessel == ""){
        echo  "<i></i>";
      }else if($exist_vessel == 'true' ){
        echo "<i style='color:red;'>Already exists</i>";  
      }
      else if($exist_vessel == 'false' ){
         echo "<i style='color:green;'>Available</i>"; 
      }
      else{
         $query= $this->db->query("Select * from vw_CarrierByJobFile where JobFileNo ='$jobfile' and VesselVoyageNo='$vessel' limit 1");
            
          if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else{
             echo "<i style='color:green;'>Available</i>"; 
          }
      }
     
   }

   function container_manila(){
   	 	  $jobfile = stripslashes($this->input->post('jbfl'));
   	      $container  = stripslashes($this->input->post('containerno'));

   	       $query= $this->db->query("Select * from vw_Products where JobFileNo ='$jobfile' and ContainerNo='$container' limit 1");
          if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else{
             echo "<i style='color:green;'>Available</i>"; 
          }   	
   }

   function commodity_check(){
   	   $jobfile = $this->input->post('jbfl');

   	      $query= $this->db->query("Select * from vw_Products where JobFileNo ='$jobfile' limit 1");
          if($query->num_rows() != 1){ 
            echo  "<i style='color:red;'>No Products Available</i>";     
          }else{


     		$p = $this->Jobdata->get_goods($jobfile);
            echo '<select>';
                   $i=0;
	               foreach ($p as $row){
	                   $i++;
                      echo "<option value=".stripslashes($row->ProductId)."> ".stripslashes($row->ProductName)."</option>";
                    }

             echo '</select>';
          }

    }

}
?>