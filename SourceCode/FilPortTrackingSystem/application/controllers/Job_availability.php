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
   	 	  $jobfile    = $this->input->post('jbfl');
   	    $container  = $this->input->post('containerno');
        $vessel_voyage  = $this->input->post('vessel_voyage');

          $query2= $this->db->query("Select * from vw_Containers where JobFileNo ='eli' and ContainerNo='$container' and CarrierByJobFileId='$vessel_voyage' limit 1");
   	      /* $query= $this->db->query("Select * from vw_Containers where JobFileNo ='$jobfile' and ContainerNo='$container' limit 1");*/
      /*    if($query->num_rows() == 1){ 
            echo  "<i style='color:red;'>Already exists</i>";     
          }else*/if($query2->num_rows() == 1){
            echo  "<i style='color:red;'>VesselVoyageNo and  Container Number
            is already exists</i>"; 
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
            echo  "<i style='color:red;'>Already exists</i>";     
          }else{
             echo "<i style='color:green;'>Available</i>"; 
          }
}

}
?>   