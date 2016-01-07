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

      $query= $this->db->query("Select * from vw_CarrierByJobFile where JobFileNo ='$jobfile' and VesselVoyageNo='$vessel' limit 1");
            
          if($query->num_rows() ==1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else{
             echo "<i style='color:green;'>Available</i>"; 
          }
   }

}


?>