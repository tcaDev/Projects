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
                if(!$this->session->userdata('logged_in')){
                    redirect('Login_user/login');
                }
       }

 // function for getting the page number and page position
  function paginate_number_position($page,$item_per_page){
          //Get page number from Ajax POST
      if(isset($page)){
           $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
           if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
       }else{
        $page_number = 1; //if there's no page number, set it to 1
      }
      $data['page_number'] =$page_number;    
      //get starting position to fetch the records
      return  $page_position = (($page_number-1) * $item_per_page);
  }

   //for pagination  start
	function pagination_manila(){
      $data['userid'] = $this->userids();
      $this->session->unset_userdata('jbfl');
      $this->session->unset_userdata('color_stages');
      $this->session->unset_userdata('montype_manila');
    
      //for getting the page number and page position

        $page        =  $this->input->post('page');
        $item_per_page=20;
        $page_position = $this->paginate_number_position($page,$item_per_page);

   	$montype        =  $this->input->post('montype');
    $jobfile        =  $this->input->post('jobfile');
    $color_stages   =  $this->input->post('color_stages');

    $session_data = $this->session->userdata('logged_in');
      
      //Role Manila
     $data['rolemnila']= $this->rolemanila();
  //check the jobfile content start
      if($jobfile==''){
       $jobfile = 'blank';
      }
      $this->session->jbfl = $jobfile;
      $jobfile_session = $this->session->jbfl;
  //check the jobfile content end 

  //check the color_stages content start
      if(!isset($color_stages)){
        $color_stages = 'blank_color';
      }

      $this->session->color_stages = $color_stages;
      $color_stages = $this->session->color_stages;
  //check the color_stages content end


    //set the montype
/*      $this->session->montype_manila = $montype ;
      $montype = $this->session->montype_manila;*/

   	if(isset($jobfile_session)&&($color_stages=='blank_color')){
        $color_stages='blank';
            if($jobfile_session=='blank'){
                     $this->insert_tempodata(1,$jobfile_session,$item_per_page,$color_stages);
                     $data['manila']  =  $this->User->findlimit_man_outport($item_per_page,$page_position,1);   
            }else{
                  $this->insert_tempodata(1,$jobfile,$item_per_page,$color_stages);
                  $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,1);
            }      
    }elseif(isset($color_stages)){  
        $jobfile_session='blank';
        $this->insert_tempodata($montype,$jobfile_session,$item_per_page,$color_stages);
        $data['manila']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$color_stages,1);
     }else{
   	   $data['manila']  =  $this->User->findlimit_man_outport($item_per_page,$page_position,1);
   	 }

     //load the view page
      $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
}

	function pagination_outport(){
    $data['userid'] = $this->userids();
	  $this->session->unset_userdata('jbfl');
    $this->session->unset_userdata('color_stages');
    $this->session->unset_userdata('montype_outport');

      //for getting the page number and page position
        $page        =  $this->input->post('page');
        $item_per_page=20;
      $page_position = $this->paginate_number_position($page,$item_per_page);


    $montype        =  $this->input->post('montype');
    $jobfile        =  $this->input->post('jobfile');
    $color_stages   =  $this->input->post('color_stages');

    $jobfile_2 = $jobfile;

   // if(isset($jobfile)){
      if($jobfile==''){
       $jobfile = 'blank';
      }
      $this->session->jbfl = $jobfile;
      $jobfile_session = $this->session->jbfl;

      if(!isset($color_stages)){
        $color_stages = 'blank_color';
      }

      $this->session->color_stages = $color_stages;
      $color_stages = $this->session->color_stages;


/*      $this->session->montype_outport = $montype ;
      $montype = $this->session->montype_outport;*/

    if(isset($jobfile_session)&&($color_stages=='blank_color')){
      // store temp data
        $color_stages='blank';
         
            if($jobfile_session=='blank'){
                 //echo 'blank';
                 $this->insert_tempodata(2,$jobfile_session,$item_per_page,$color_stages);
                 $data['outport']  =  $this->User->findlimit_man_outport($item_per_page,$page_position,2);
            }else{
                   //echo 'search';
                  $this->insert_tempodata($montype,$jobfile,$item_per_page,$color_stages);
                  $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jobfile,$montype);
            }
               
       //  $this->session->unset_userdata('jbfl');
    }elseif(isset($color_stages)){  
       $jobfile_session='blank';
       //echo '2';
        $this->insert_tempodata($montype,$jobfile_session,$item_per_page,$color_stages);
        $data['outport']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$color_stages,$montype);
       /* $this->session->unset_userdata('color_stages');*/
     }else{
      //echo '3';
       $data['outport']  =  $this->User->findlimit_man_outport($item_per_page,$page_position,$montype);
     }
	
   //}

        //outport Role()
     $data['roleoutport']= $this->roleoutport();
        $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
}
	function pagination_air(){
   $data['userid'] = $this->userids();
    $jobfile   =  $this->input->post('jobfile');
    $color_stages   =  $this->input->post('color_stages');

      //for getting the page number and page position
        $page        =  $this->input->post('page');
        $item_per_page=20;
        $page_position = $this->paginate_number_position($page,$item_per_page);
	

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
 echo  $this->session->page_number;
}

     function search_paging(){
       $data['userid'] = $this->userids();
       //for getting the page number and page position
        $page          =  $this->input->post('page');
        $item_per_page =20;
        $page_position = $this->paginate_number_position($page,$item_per_page);
      

         $jb      =  $this->session->data;
         $montype = $this->session->montype;

           if($montype==1){

             $session_data = $this->session->userdata('logged_in');
           //Manila Role
              $data['rolemnila']= $this->rolemanila();
             $data['manila']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
             $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
           }
           if($montype==2){
            //outport Role()
              $data['roleoutport']= $this->roleoutport();
             $data['outport']  =  $this->User->findlimit_search($item_per_page,$page_position,$jb,$montype);
                                  $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
           }
    }

     function search_paging_air(){
       $data['userid'] = $this->userids();
       //for getting the page number and page position
        $page          =  $this->input->post('page');
        $item_per_page =20;
        $page_position = $this->paginate_number_position($page,$item_per_page);

        $jb      =  $this->session->data;

        $data['air']  =  $this->User->findlimit_search_air($item_per_page,$page_position,$jb);
        $this->load->view('jobfile-view/add-air-product/search_air',$data);


    }

     function search_paging_color(){
       $data['userid'] = $this->userids();
        //for getting the page number and page position
        $page          =  $this->input->post('page');
        $item_per_page =20;
        $page_position = $this->paginate_number_position($page,$item_per_page);

         $jb      =  $this->session->data;
         $montype = $this->session->montype;

           if($montype==1){
             $data['manila']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$jb,$montype);
             $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
           }
           if($montype==2){
             $data['outport']  =  $this->User->findlimit_search_color($item_per_page,$page_position,$jb,$montype);
                                  $this->load->view('jobfile-view/add-outport-container/search_outport',$data);
           }

    }


    function search_paging_color_air(){
       $data['userid'] = $this->userids();
        //for getting the page number and page position
        $page          =  $this->input->post('page');
        $item_per_page =20;
        $page_position = $this->paginate_number_position($page,$item_per_page);
      
          $jb      =  $this->session->data;
          $data['air']  =  $this->User->findlimit_search_color_air($item_per_page,$page_position,$jb);

        $this->load->view('jobfile-view/add-air-product/search_air',$data);


    }


      function insert_tempodata($montype,$jobfile,$item_per_page,$color_stages){
        if($color_stages!='blank'){
             $query = $this->db->query("SELECT  * FROM vw_JobFile where StatusName='$color_stages' and MonitoringTypeId=$montype" );
             $content= $color_stages;
        }elseif($jobfile=='blank'){
            $query = $this->db->query("SELECT  * FROM vw_JobFile where  MonitoringTypeId=$montype" );
             $content=NULL;

        }else{
            $query = $this->db->query("SELECT  * FROM vw_JobFile where JobFileNo like '%$jobfile%' and MonitoringTypeId=$montype" );
            $content = $jobfile;
        }
                     $m2=  $query->num_rows();
                    $datako = ceil($m2/$item_per_page);

                      $this->session->page_number= $datako;
                      $this->session->data       = trim($content);
                      $this->session->montype    = $montype;
                      $this->session->userid     = $user;
  }
      function insert_tempodata_air($jobfile,$color_stages,$item_per_page){
        if($color_stages=='blank'){
                $query = $this->db->query("SELECT  * FROM vw_JobFileAir where JobFileNo like '%$jobfile%'");
        }else{
                $query = $this->db->query("SELECT  * FROM vw_JobFileAir where StatusName='$color_stages'" );
        }
                      $m2=  $query->num_rows();
                      $datako = ceil($m2/$item_per_page);

                      if($jobfile=='blank'){
                        $content = $color_stages;
                      }else{
                        $content = $jobfile;
                      }

                      $this->session->page_number= $datako;
                      $this->session->data       = trim($content);
  }


  //get the current userid
  function userids(){
              $session_data = $this->session->userdata('logged_in');
             return  $userid = $session_data['uid'];       
    }


  /*      
  ##Getting the Roles start##
  */

     function rolemanila(){  
       $session_data = $this->session->userdata('logged_in');  
      //Manila Role
              $rolemnila = $this->UserAccess->RolesManila($session_data['roleID']);
              if($rolemnila == NULL){
                 $role =  0;
              }else{
                 $role = explode(',', $rolemnila->AccessTypesId);
              }
              return $role;
    }
    function roleoutport(){
         $session_data = $this->session->userdata('logged_in');
        //Outport Role
              $roleoutport = $this->UserAccess->RolesOutport($session_data['roleID']);
              if($roleoutport == NULL){
                $role =  0;
              }else{
                $role = explode(',', $roleoutport->AccessTypesId);
              }
              return $role;
    }

  /*      
    ##Getting the Roles End##
  */
}
  ?>