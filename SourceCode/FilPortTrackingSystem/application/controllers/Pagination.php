   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	
             $this->load->model('UserAccess');  
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



   	$montype        =  $this->input->post('montype');
    $jobfile        =  $this->input->post('jobfile');
    $color_stages   =  $this->input->post('color_stages');
   	if(isset($jobfile)){
      // store temp data
        $color_stages='blank';
        $this->insert_tempodata($montype,$jobfile,$item_per_page,$color_stages);
       	$data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,$montype);
    }elseif(isset($color_stages)){  
       $jobfile=' ';
        $this->insert_tempodata($montype,$jobfile,$item_per_page,$color_stages);
        $data['manila']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$color_stages,$montype);
     }else{
   	   $data['manila']  =  $this->User->findlimit_manila($item_per_page,$page_position);
   	 }
	
   //}

      $session_data = $this->session->userdata('logged_in');
        //Manila Role
              $rolemnila = $this->UserAccess->RolesManila($session_data['roleID']);
              if($rolemnila == NULL){
                $data['rolemnila'] =  0;
              }else{
                $data['rolemnila'] = explode(',', $rolemnila->AccessTypesId);
              }
 
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



    $montype        =  $this->input->post('montype');
    $jobfile        =  $this->input->post('jobfile');
    $color_stages   =  $this->input->post('color_stages');
    if(isset($jobfile)){
      // store temp data
        $color_stages='blank';
        $this->insert_tempodata($montype,$jobfile,$item_per_page,$color_stages);
        $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,$montype);
    }elseif(isset($color_stages)){  
       $jobfile=' ';
        $this->insert_tempodata($montype,$jobfile,$item_per_page,$color_stages);
        $data['outport']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$color_stages,$montype);
     }else{
       $data['outport']  =  $this->User->findlimit_manila($item_per_page,$page_position);
     }
	
   //}

      $session_data = $this->session->userdata('logged_in');
        //Outport Role
              $roleoutport = $this->UserAccess->RolesOutport($session_data['roleID']);
              if($roleoutport == NULL){
                $data['roleoutport'] =  0;
              }else{
                $data['roleoutport'] = explode(',', $roleoutport->AccessTypesId);
              }

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
    $color_stages   =  $this->input->post('color_stages');
   	if(isset($jobfile)){
             $color_stages = 'blank';
              $this->insert_tempodata_air($jobfile,$color_stages,$item_per_page);
       	      $data['air']  =  $this->User->findlimit_search_air($item_per_page,$page_position,$jobfile);
     }elseif(isset($color_stages)){
              $jobfile = 'blank';
              $this->insert_tempodata_air($jobfile,$color_stages,$item_per_page);
              $data['air']  =  $this->User->findlimit_search_color_air($item_per_page,$page_position,$color_stages);
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

/*             $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
             $this->load->view('jobfile-view/add-manila-container/search_manila',$data);*/

           if($montype==1){

             $session_data = $this->session->userdata('logged_in');
        //Manila Role
              $rolemnila = $this->UserAccess->RolesManila($session_data['roleID']);
              if($rolemnila == NULL){
                $data['rolemnila'] =  0;
              }else{
                $data['rolemnila'] = explode(',', $rolemnila->AccessTypesId);
              }
 
 
             $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
             $this->load->view('jobfile-view/add-manila-container/search_manila',$data);

           }
           if($montype==2){
              $session_data = $this->session->userdata('logged_in');
        //Outport Role
              $roleoutport = $this->UserAccess->RolesOutport($session_data['roleID']);
              if($roleoutport == NULL){
                $data['roleoutport'] =  0;
              }else{
                $data['roleoutport'] = explode(',', $roleoutport->AccessTypesId);
              }

             $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
                                  $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
           }

    }

     function search_paging_color(){
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

  /*     $data['manila']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$jb,$montype);
       $this->load->view('jobfile-view/add-manila-container/search_manila',$data);*/

           if($montype==1){
             $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
             $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
           }
           if($montype==2){
             $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
                                  $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
           }

    }


    function search_paging_color_air(){
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
           }

      //get starting position to fetch the records
      $page_position = (($page_number-1) * $item_per_page);

            $data['air']  =  $this->User->findlimit_search_color_air($item_per_page,$page_position,$jb);

      $this->load->view('jobfile-view/add-air-product/search_air',$data);


    }


      function insert_tempodata($montype,$jobfile,$item_per_page,$color_stages){
        $this->db->truncate('Tempo');
        if($color_stages!='blank'){
             $query = $this->db->query("SELECT  * FROM vw_JobFile where StatusName='$color_stages' and MonitoringTypeId=$montype" );
             $content= $color_stages;
       }else{
            $query = $this->db->query("SELECT  * FROM vw_JobFile where JobFileNo like '%$jobfile%' and MonitoringTypeId=$montype" );
            $content = $jobfile;
       }
                     $m2=  $query->num_rows();
                    $datako = ceil($m2/$item_per_page);

                      $datas = array(
                         'data_tempo'       => $datako,
                         //JBFL CAN CONTAIN BLANK IF COLOR_STAGES HAS CONTENT
                         'jbfl'              => trim($content),
                         'montype'           => $montype
                      );

                      $this->db->insert('Tempo', $datas);
  }
      function insert_tempodata_air($jobfile,$color_stages,$item_per_page){
          $this->db->truncate('tempo');
        if($color_stages=='blank'){
                $query = $this->db->query("SELECT  * FROM vw_JobFileAir where JobFileNo like '%$jobfile%'");
        }else{
                $query = $this->db->query("SELECT  * FROM vw_JobFileAir where StatusName='$color_stages'" );
        }
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