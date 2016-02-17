   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	
            $this->load->model('Jobdata');	
            $this->load->helper('string');
       }


   //for pagination  start


	function pagination_manila(){
	 //$this->session->unset_userdata('datako');
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



   	$montype   =  $this->input->post('montype');
    $jobfile   =  $this->input->post('jobfile');
   	if(isset($jobfile)){
      // store temp data
        $this->insert_tempodata($montype,$jobfile,$item_per_page);

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



   	$montype   =  $this->input->post('montype');
   	$jobfile   =  $this->input->post('jobfile');
   	if(isset($jobfile)){
      // store temp data
           $this->insert_tempodata($montype,$jobfile,$item_per_page);
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
   	$jobfile   =  $this->input->post('jobfile');

   	if(isset($jobfile)){
              $this->insert_tempodata_air($jobfile,$item_per_page);
       	   $data['air']  =  $this->User->findlimit_search_air($item_per_page,$page_position,$jobfile);
     }else{
   	   $data['air']  =  $this->User->findlimit_air($item_per_page,$page_position);
   	 }
	
   //}

 
      $this->load->view('jobfile-view/add-air-product/search_air',$data);
}

function select_temp(){
  $temp =  $this->Jobdata->select_temp();
  foreach($temp as $row){
   echo $tempo = $row->data_tempo;
   
 }
}

     function search_paging(){
      $item_per_page=20;

      //Get page number from Ajax POST
      if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
         if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
       }else{
        $page_number = 1; //if there's no page number, set it to 1
      }
      $data['page_number'] =$page_number;
      


        $temp =  $this->Jobdata->select_temp();
            foreach($temp as $row){
                  $jb= $row->jbfl;
                  $tempo =$row->data_tempo;
                  $montype = $row->montype;
           }

      //get starting position to fetch the records
      $page_position = (($page_number-1) * $item_per_page);

             $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
       $this->load->view('jobfile-view/add-manila-container/search_manila',$data);

    }
      function insert_tempodata($montype,$jobfile,$item_per_page){
        $this->db->truncate('Tempo');
        $query = $this->db->query("SELECT  * FROM vw_JobFile where JobFileNo like '%$jobfile%' and MonitoringTypeId=$montype" );
                         $m2=  $query->num_rows();
                  $datako = ceil($m2/$item_per_page);

                      $datas = array(
                         'data_tempo'       => $datako,
                         'jbfl'              => trim($jobfile),
                         'montype'           => $montype
                      );

                      $this->db->insert('Tempo', $datas);
  }
      function insert_tempodata_air($jobfile,$item_per_page){
          $this->db->truncate('Tempo');
        $query = $this->db->query("SELECT  * FROM vw_JobFileAir where JobFileNo like '%$jobfile%'");
                         $m2=  $query->num_rows();
                  $datako = ceil($m2/$item_per_page);

                      $datas = array(
                         'data_tempo'       => $datako,
                         'jbfl'              => trim($jobfile)
                      );

                      $this->db->insert('Tempo', $datas);
  }
}
  ?>