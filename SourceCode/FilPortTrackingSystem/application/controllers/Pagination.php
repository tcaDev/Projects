   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	
            $this->load->model('Jobdata');	
       }


   //for pagination  start


	function pagination_manila(){
	
    $item_per_page=20;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	$data['page_number'] =$page_number;
	

	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);

/*   $id   =  $this->input->post('consignee_id');
   if(isset($id)){
   	$clients = $this->User->search_consignee($id);
   }else{*/

   	$montype   =  $this->input->post('montype');
    $jobfile   =  $this->input->post('jobfile');
   	if(isset($jobfile)){
       	   $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,$montype);
     }else{
   	   $data['manila']  =  $this->User->findlimit_manila($item_per_page,$page_position);
   	 }
	
   //}

 
    	$this->load->view('jobfile-view/add-manila-container/search_manila',$data);

}
	function pagination_outport(){
	
    $item_per_page=20;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	$data['page_number'] =$page_number;
	

	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);

/*   $id   =  $this->input->post('consignee_id');
   if(isset($id)){
   	$clients = $this->User->search_consignee($id);
   }else{*/

   	$montype   =  $this->input->post('montype');
   	$jobfile   =  $this->input->post('jobfile');
   	if(isset($jobfile)){
       	   $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,$montype);
     }else{
   	   $data['outport']  =  $this->User->findlimit_outport($item_per_page,$page_position);
   	 }
	
   //}

 
        $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
}
	function pagination_air(){
	
    $item_per_page=20;
	//Get page number from Ajax POST
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	$data['page_number'] =$page_number;
	

	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);

/*   $id   =  $this->input->post('consignee_id');
   if(isset($id)){
   	$clients = $this->User->search_consignee($id);
   }else{*/

   	$jobfile   =  $this->input->post('jobfile');
   	if(isset($jobfile)){
       	   $data['air']  =  $this->User->findlimit_search_air($item_per_page,$page_position,$jobfile);
     }else{
   	   $data['air']  =  $this->User->findlimit_air($item_per_page,$page_position);
   	 }
	
   //}

 
      $this->load->view('jobfile-view/add-air-product/search_air',$data);
}


}
  ?>