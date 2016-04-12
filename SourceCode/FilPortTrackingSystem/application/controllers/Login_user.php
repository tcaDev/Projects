<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User');	
            $this->load->model('UserAccess');	
            $this->load->model('Jobdata');	
            $this->load->library('form_validation');



			$this->output->set_header('Pragma: no-cache');
			$this->output->set_header('Cache-Control: no-cache, must-revalidate');
			$this->output->set_header('Expires: Mon, 26 Jul 2015 05:00:00 GMT');

       }


	 public function index()
	{
		  //check if the user is already login
		if($this->session->userdata('logged_in'))
		{

			$this->menu();

		}
		else{
			  //This method will have the credentials validation
			   $this->load->library('form_validation');

			   $this->form_validation->set_rules('username', 'Username', 'trim|required');
			   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

			   if($this->form_validation->run() == FALSE)
			   {
			     //Field validation failed.  User redirected to login page
			     $this->login();
			   }
			   else
			   {
			     //Go to private area
			     //redirect('home');
			   	  $this->menu();
			   }
		}

	}

	//for password checking
	 function check_database()
 	{
		   //Field validation succeeded.  Validate against database
		   $username = $this->input->post('username');
		   $mypass = $this->input->post('password');
		    $salt  = 'fwodhsljkfhnouh';
		    $salt2 = 'djaoiuelanwdoiwq';
		    $pass = sha1($salt.$mypass.$salt2);
		   //query the database
		   $result = $this->User->login($username, $pass);


		   if($result)
		   {
		     $sess_array = array();
		     foreach($result as $row)
		     {
		      $active =   $row->IsActive;
				      if(!$active){
				      	$this->form_validation->set_message('check_database','User account is not activated');
				         return false;
				      }else{


							       $sess_array = array(
							         'email'     =>   $row->EmailAddress,
							         'username'  =>   $row->UserName,
							         'fname'     =>   $row->FirstName,
							         'mname'     =>   $row->MiddleName,
							         'lname'     =>   $row->LastName,
							         'uid'		 =>	  $row->UserId,
							         'roleID'	 =>   $row->RoleId,
							         'img'		 =>	  $row->ProfileImageSource,
							       );
							       $this->session->set_userdata('logged_in', $sess_array);
							         return TRUE;
					 }
		     }
		   
		   }
		   else
		   {
		     $this->form_validation->set_message('check_database','Invalid Username or Password');
		     return false;
		   }
 	}	

	 function menu()
	{
		 //check if the user is already login
				//$cName = $this->Jobdata->get_consignee_name($session_data['uid']);
            	//$data["jobfiles"] = $cName->ConsigneeName;
		if($this->session->userdata('logged_in')){
			 /* $this->output->cache(5);*/
		  	$data['tab'] = "Main Menu";
		  	$session_data = $this->session->userdata('logged_in');
		  	$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['uid'] = $session_data['uid'];
		 	$data['img'] = $session_data['img'];
		 	$data['countries']=$this->User->countries();
		 	$data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();
            $role = $this->User->get_role($session_data['uid']);
            $data['role'] = $this->User->get_role($session_data['uid']);	

          	 //global Search
	            $roleglobal= $this->UserAccess->RolesGlobal($session_data['roleID']);
	            if($roleglobal == NULL){
	            	$data['roleglobal'] = 	0;
	            }else{
	            	$data['roleglobal'] = 	$roleglobal->AccessTypesId;
	            }

	            //DashBoard
	            $roledash= $this->UserAccess->RolesDash($session_data['roleID']);
	             if($roledash == NULL){
	            	
	            	$data['roledash'] = 0;
	            }else{
	            	$data['roledash'] = $roledash->AccessTypesId;
	            }
	        //Report
	            $rolereport= $this->UserAccess->RolesReport($session_data['roleID']);
	            if($rolereport == NULL){
	            	
	            	$data['rolereport'] = 	0;
	            }else{
	            	$data['rolereport'] = 	$rolereport->AccessTypesId;
	            }


            if($role->RoleId == 2){
				$this->load->view('header/header',$data);
				$this->load->view('menu/views_menu_consignee' , $data);
            }else{
            //JobFIle
            	$rolejobfile = $this->UserAccess->RolesJobFile($session_data['roleID']);
	            if($rolejobfile == NULL){
	            	
	            	$data['rolejobfile'] = 0;
	            }else{
	            	$data['rolejobfile'] = $rolejobfile->AccessTypesId;
	            }
	        //Site Settings
	            $rolesite= $this->UserAccess->RolesSite($session_data['roleID']);
	             if($rolesite == NULL){
	            	$data['rolesite'] = 0;
	            }else{
	            	$data['rolesite'] = $rolesite->AccessTypesId;
	            }
	       
	        
	        
	        //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }
				

            	$this->load->view('header/header',$data);
				$this->load->view('menu/views_menu' , $data);
            }
			
		}else{
			 $this->login();
		}
	}

	function clientmenu()
	{
		 //check if the user is already login
		if($this->session->userdata('logged_in')){
		  	$data['tab'] = "Main Menu";
		  	$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 	$data['img'] = $session_data['img'];
		 	$data['uid'] = $session_data['uid'];
		 	$data['countries']=$this->User->countries();
		 	$data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

			$this->load->view('clientheader/header',$data);
			$this->load->view('client_menu/views_clientmenu' , $data);

		}else{
			 $this->login();
		}
	}

	 function jobfile(){
	 	 //check if the user is already login
		if($this->session->userdata('logged_in')){	
	    	//$this->db->cache_delete_all();	
			//$this->output->cache(5);

			$data['tab'] = "JobFile Monitoring";
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

		    // drop down in add data form in jobfile start
		    $data['shipper_data']   = $this->User->dropdown_shipper();
		    $data['vessel_data']   = $this->User->settings_vessel();
		  /*  $data['container_data']   = $this->User->dropdown_container();*/
		    $data['consignee_data'] = $this->User->dropdown_consignee();
		    $data['broker_data']    = $this->User->dropdown_broker();
		    $data['color_data']     = $this->User->dropdown_colors();
		    $data['hauler_data']    = $this->User->dropdown_hauler();

		    $data['countries']      =  $this->User->countries();
		    // drop down in add data form in jofile end


		    /* get status*/
		    $data['status'] =     $this->User->get_status();

		    $data['color_selectivity'] =     $this->User->color_selectivity();
		  	

		  	/*Jobfile manila*/

		  	$data['manila']    = $this->User->get_jobfile_manila();
		  	$data['outport']    = $this->User->get_jobfile_outport();
		  	$data['air']    = $this->User->get_jobfile_air();
		  	$data['carrier'] = $this->User->get_carrier();
		  	$data['products'] = $this->User->get_products();

		  	$data['role'] = $this->User->get_role($session_data['uid']);

		  	//each page will view 10 items
		  	$item_per_page = 20;

		    //getting the total count of jobfile in manila
		    $query = $this->db->query('SELECT * FROM vw_JobFile where MonitoringTypeId=1');
			$m=  $query->num_rows();
		  	$data['count_total_manila']= $m;
		  	//for total count of page in manila
		  	$page_m 	= ceil($m/$item_per_page);
		  	$data['count_total_manila_page'] = $page_m;

            //getting the total count of jobfile in outport
		  	$query = $this->db->query('SELECT * FROM vw_JobFile where MonitoringTypeId=2');
			$o=  $query->num_rows();
		  	$data['count_total_outport']= $o;
		    //for total count of page in outport
		  	$page_a	= ceil($o/$item_per_page);
		  	$data['count_total_outport_page'] = $page_a;
 
            //getting the total count of jobfile in air
		    $query = $this->db->query('SELECT * FROM vw_JobFileAir');
			$a=  $query->num_rows();
		  	$data['count_total_air']= $a;
		  	//for total count of page in air
		  	$page_o = ceil($a/$item_per_page);
		  	$data['count_total_air_page'] = $page_o;


		  	//User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

	        //Manila Role
	            $rolemnila = $this->UserAccess->RolesManila($session_data['roleID']);
	            if($rolemnila == NULL){
	            	$data['rolemnila'] = 	0;
	            }else{
	            	$data['rolemnila'] = explode(',', $rolemnila->AccessTypesId);
	            }

	         //Outport Role
	            $roleoutport = $this->UserAccess->RolesOutport($session_data['roleID']);
	            if($roleoutport == NULL){
	            	$data['roleoutport'] = 	0;
	            }else{
	            	$data['roleoutport'] = explode(',', $roleoutport->AccessTypesId);
	            }

	         //Air Role
	            $roleair = $this->UserAccess->RolesAir($session_data['roleID']);
	            if($roleair == NULL){
	            	$data['roleair'] = 	0;
	            }else{
	            	$data['roleair'] = explode(',', $roleair->AccessTypesId);
	            }

 
			$this->load->view('header/header',$data);
			$this->load->view('jobfile-view/views_jobfile' , $data);
		}else{
			$this->login();
		}
	}


	function new_jobfile(){
		$this->load->library('pagination');
			$config['base_url'] = 'http://localhost/FilPortTrackingSystem/Login_user/new_jobfile/';
			$config['per_page'] = 20; 
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';

			$this->pagination->initialize($config); 

			echo $this->pagination->create_links();
	}

	function clientjobfile(){
	 	 //check if the user is already login
		if($this->session->userdata('logged_in')){		
			$data['tab'] = "JobFile Monitoring - Sea";
			$this->load->view('jobfile-client/client_jobfile' , $data);
		}else{
			$this->login();
		}
	}

	function login()
	{	
		    //$this->output->clear_all_cache();
	        //$this->db->cache_delete_all();
			$data['tab'] = "Log In";
			$this->load->view('login/login_page' , $data);
	}

	function forgot()
	{	
			$data['msg'] = "";
			$data['alert'] = "";
			$data['tab'] = "Forgot Password";
			$this->load->view('forgotpass/password' , $data);
	}

 	 function logout()
	 {

	   //$this->output->clear_path_cache('Login_user');
	   //$this->output->clear_path_cache('reports');
	   //$this->output->clear_path_cache('settings');
	   $this->output->clear_all_cache();
	   $this->db->cache_delete_all();
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   $this->index();
	 }


	function reports()
	{	
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
		    //$this->output->cache(5);
			$data['tab'] = "REPORTS";
			$session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);
		 	$role = $this->User->get_role($session_data['uid']);
		 	
            if($role->RoleId == 2){
            	$data["jobfiles"] =  $session_data['uid'];
				$this->load->view('header/header',$data);
				$this->load->view('reports/reports_page_consignee',$data);
            }else{
            	//User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

	            //Audit Trail
	            $roleaudit= $this->UserAccess->RolesAudit($session_data['roleID']);
	             if($roleaudit == NULL){
	            	
	            	$data['roleaudit'] = 	0;
	            }else{
	            	$data['roleaudit'] = 	$roleaudit->AccessTypesId;
	            }

          	    $this->load->view('header/header',$data);
				$this->load->view('reports/reports_page');
            }

			
		}else{
			$this->login();
		}
	}

	function clientreports()
	{	
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "DOCUMENTS";
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['roleID'] = $session_data['roleID'];
		    $data['img'] = $session_data['img'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();


		    /* get status*/
		    $data['consignee'] = $this->User->get_consignee();
		    $data['broker'] = $this->User->get_broker();
		    $data['shipper'] = $this->User->get_shipper();
		    /*$data['vessel'] = $this->User->get_vessel();*/
		 
			$this->load->view('clientheader/header',$data);
			$this->load->view('clientreports/report_client' , $data);
		}else{
			$this->login();
		}
	}


	 function account()
	{		
		//check if the user is already login
		if($this->session->userdata('logged_in')){	

			$session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['uid'] = $session_data['uid'];
		    $data['img'] = $session_data['img'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

		  	$data['tab'] = "";
		  	$data['msg'] = "";
		  	$data['alert'] = "";

		  	//User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }
		 
			$this->load->view('header/header',$data);
			$this->load->view('account/account_page',$data);
		}else{
			$this->login();
		}
	}

 	 function registration()
	{	
			 redirect('Add_user');
	}
	 function settings()
	{
	//check if the user is already login
	 if($this->session->userdata('logged_in')){		
	 	//$this->output->cache(2);

	 	 $item_per_page = 10;

	 	//total page of consignee start
	 	$this->db->from('vw_consignee_full_info');
		$total_consignee= $this->db->count_all_results();
		$page = ceil($total_consignee/$item_per_page);
		$data['consignee_total'] = $page;
		//total page of consignee end

	     //total page of broker start
	 	$this->db->from('vw_broker_full_info');
		$total_broker= $this->db->count_all_results();
		$page = ceil($total_broker/$item_per_page);
		$data['broker_total'] = $page;
		//total page of broker end

		  //total page of shipper start
	 	$this->db->from('Shipper');
		$total_shipper= $this->db->count_all_results();
		$page = ceil($total_shipper/$item_per_page);
		$data['shipper_total'] = $page;
		//total page of shipper end

		 //total page of shipper start
	 /*	$this->db->from('ShipperVessel');*/
	 	$this->db->from('Carrier');
		$total_shipper= $this->db->count_all_results();
		$page = ceil($total_shipper/$item_per_page);
		$data['vessel_total'] = $page;
		//total page of shipper end

	    //total page of haulers start
	 	$this->db->from('HaulerOrTruck');
		$total_hauler= $this->db->count_all_results();
		$page = ceil($total_hauler/$item_per_page);
		$data['hauler_total'] = $page;
		//total page of haulers end

	    //total page of prduct start
	 	$this->db->from('Products');
		$total_product= $this->db->count_all_results();
		$page = ceil($total_product/$item_per_page);
		$data['product_total'] = $page;
		//total page of product end



	    //total page of forward start
	/* 	$this->db->from('ForwarderWarehouse');
		$total_forward= $this->db->count_all_results();
		$page = ceil($total_forward/$item_per_page);
		$data['forward_total'] = $page;*/
		//total page of forward end

		//total page of legend start
	 	$this->db->from('Status');
		$total_legend= $this->db->count_all_results();
		$page = ceil($total_legend/$item_per_page);
		$data['legend_total'] = $page;
		//total page of legend end



		

		//select country
		$data['countries']   =  $this->User->countries();
	 	$data['lconsignee']  =  $this->User->settings_consignee();
	 	$data['lbroker']	 =  $this->User->settings_broker();
	 	$data['lvessel'] 	 =  $this->User->settings_vessel();
	 	$data['lshipper'] 	 =  $this->User->settings_shipper();
	 	$data['lshippercon'] =  $this->User->settings_shipper_con();
		$data['clients']     =  $this->User->clients();
		$data['tab']         =  "SITE SETTINGS";

		$session_data = $this->session->userdata('logged_in');
		$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		$data['roleName'] = $logInDetails;
	    $data['username'] = $session_data['username'];
	    $data['email'] =  $session_data['email'];
	    $data['fname'] = $session_data['fname'];
	    $data['mname'] = $session_data['mname'];
	    $data['lname'] = $session_data['lname'];
	    $data['img'] = $session_data['img'];
	    $data['uid'] = $session_data['uid'];
	    $data['countries']=$this->User->countries();
	    $data['questions'] =$this->User->question();
        $data['consignee'] =$this->User->dropdown_consignee();

        $data['role'] = $this->User->get_role($session_data['uid']);

        //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

	    //Consignee
	            $consignee = 6;
	            $roleconsignee = $this->UserAccess->RoleSetting($session_data['roleID'],$consignee);  
	            if($roleconsignee == NULL){
	            	$data['roleconsignee'] = 0;
	            }else{
	            	$data['roleconsignee'] = explode(',', $roleconsignee->AccessTypesId);
	            }

	    //Broker
	            $broker = 7;
	            $rolebroker = $this->UserAccess->RoleSetting($session_data['roleID'],$broker);  
	            if($rolebroker == NULL){
	            	$data['rolebroker'] = 0;
	            }else{
	            	$data['rolebroker'] = explode(',', $rolebroker->AccessTypesId);
	            }

	    //Shipper
	            $shipper = 8;
	            $roleshipper = $this->UserAccess->RoleSetting($session_data['roleID'],$shipper);  
	            if($roleshipper == NULL){
	            	$data['roleshipper'] = 0;
	            }else{
	            	$data['roleshipper'] = explode(',', $roleshipper->AccessTypesId);
	            }

	    //ShippingLine/Carrier
	            $carrier = 9;
	            $rolecarrier = $this->UserAccess->RoleSetting($session_data['roleID'],$carrier);  
	            if($rolecarrier == NULL){
	            	$data['rolecarrier'] = 0;
	            }else{
	            	$data['rolecarrier'] = explode(',', $rolecarrier->AccessTypesId);
	            }

	    //Hauler
	            $hauler = 10;
	            $rolehauler = $this->UserAccess->RoleSetting($session_data['roleID'],$hauler);  
	            if($rolehauler == NULL){
	            	$data['rolehauler'] = 0;
	            }else{
	            	$data['rolehauler'] = explode(',', $rolehauler->AccessTypesId);
	            }
	    //Commodity
	            $commodity = 11;
	            $rolecommodity = $this->UserAccess->RoleSetting($session_data['roleID'],$commodity);  
	            if($rolecommodity == NULL){
	            	$data['rolecommodity'] = 0;
	            }else{
	            	$data['rolecommodity'] = explode(',', $rolecommodity->AccessTypesId);
	            }
	    //Legend
	            $legend = 12;
	            $rolelegend = $this->UserAccess->RoleSetting($session_data['roleID'],$legend);  
	            if($rolelegend == NULL){
	            	$data['rolelegend'] = 0;
	            }else{
	            	$data['rolelegend'] = explode(',', $rolelegend->AccessTypesId);
	            }
	 
		$this->load->view('header/header',$data);
		$this->load->view('settings/settings_page' , $data);
	 }else{
	 	$this->login();
	 }
	}
	 function search()
	{	
		//$this->output->cache(2);
			//check if the user is already login
		 if($this->session->userdata('logged_in')){		
			$data['tab'] = "GLOBAL SEARCH";
			$session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

            $role = $this->User->get_role($session_data['uid']);
            if($role->RoleId == 2){
            	$data["jobfiles"] =  $session_data['uid'];
            	$this->load->view('header/header',$data);
				$this->load->view('global/global_page',$data);
            }else{
            	$data["jobfiles"] = "";
            	//User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }
            	$this->load->view('header/header',$data);
				$this->load->view('global/global_page');
            }
			
		 }else{
		 	$this->login();
		  }
	}
	function help()
	{
		//check if the user is already login
		 if($this->session->userdata('logged_in')){	
		   // $this->output->cache(5);
			$data['tab'] = "USER MANUAL";
			$session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

            //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }
		 
			$this->load->view('header/header',$data);
			$this->load->view('help/help_page' , $data);
		}else{
			$this->login();
		}
	}

	function tracking()
	{
		 //check if the user is already login
		if($this->session->userdata('logged_in')){
		  	$data['tab'] = "Tracking Summary";
		  	$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 	$data['img'] = $session_data['img'];
		 	$data['uid'] = $session_data['uid'];
		 	$data['countries']=$this->User->countries();
		 	$data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

			$this->load->view('clientheader/header',$data);
			$this->load->view('tracking/tracking_page' , $data);
		}else{
			 $this->login();
		}
	}
	function dashboard()
	{
		//$this->output->cache(2);
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "Charts";
			$session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();
		    $data['uid'] = $session_data['uid'];

		    $data['role'] = $this->User->get_role($session_data['uid']);
		    //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }
		 
			$this->load->view('header/header',$data);
			$this->load->view('dashboard/dashboard_page' , $data);
		}else{
			$this->login();
		}
	}



	/*
	---------------------------------------------
		Upload Photo
	---------------------------------------------
	*/
			
	function upload_photo(){



		    $session_data = $this->session->userdata('logged_in');
			$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    $data['roleName'] = $logInDetails;
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['uid'] = $session_data['uid'];
		    $data['img'] = $session_data['img'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $data['role'] = $this->User->get_role($session_data['uid']);

            //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

		  	$data['tab'] = "";
		  	$data['msg'] = "";
		  	$data['alert'] = "";

		 





		$status ="";
		$msg = "";
		$imageName = "img-file";

/*
		if(empty($imageName)){
			$status = "error";
		}*/

		if($status != "error"){

			$config['upload_path'] = './upload/user/';
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_size']	= '1024 * 8';
			$config['encrypt_name']  = true;
		
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload($imageName)){
				$status = "error";
				$msg = $this->upload->display_errors('','');
				$this->not_updated_photo();
			}
			else{

				$id = $this->input->post('user_id');
				$data = $this->upload->data();
				$image = $this->User->update_photo($id,$data['file_name']);

			
		   		$photo =  $this->User->get_updated_data($id);

		   		$sess_array = array();
		   		foreach ($photo as $row) {
		   		 	
				
				       $sess_array = array(
				         'email'     =>   $row->EmailAddress,
				         'username'  =>   $row->UserName,
				         'fname'     =>   $row->FirstName,
				         'mname'     =>   $row->MiddleName,
				         'lname'     =>   $row->LastName,
				         'uid'		 =>	  $row->UserId,
				         'roleID'	 =>   $row->RoleId,
				         'img'		 =>	  $row->ProfileImageSource
				         
				       );
				       $this->session->set_userdata('logged_in', $sess_array);
				     }

				     $this->updated_photo();
		   		 }
				
			}
		}


		/*
		----------------------------------
		 Alert if Success changing Photo
		---------------------------------
		*/
	function updated_photo(){
				$session_data = $this->session->userdata('logged_in');
				$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    	$data['roleName'] = $logInDetails;
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			    $data['roleID'] = $session_data['roleID'];
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Photo Successfully Change !";
			    
			    $data['countries']=$this->User->countries();
		        $data['questions'] =$this->User->question();
                $data['consignee'] =$this->User->dropdown_consignee();
                $data['role'] = $this->User->get_role($session_data['uid']);

                //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);
	}	

	/*
		----------------------------------
		 Alert if Not image 
		---------------------------------
		*/
	function not_updated_photo(){
				$session_data = $this->session->userdata('logged_in');
				$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    	$data['roleName'] = $logInDetails;
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			    $data['roleID'] = $session_data['roleID'];
			  	$data['tab'] = "";
			  	$data['alert'] = "danger";
				$data['msg'] = "Your photos couldn't be uploaded. Photos should be saved as JPG or PNG files.";

				//User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);
	}	
	

	/*
	-----------------------------------------
		Update Name
	-----------------------------------------
	*/

	function update_name(){
		$id = $this->input->post('user_id_name');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$lname = $this->input->post('lname');
		$this->User->updateName($id,$fname,$mname,$lname);


		$update =  $this->User->get_updated_data($id);

		   		$sess_array = array();
		   		foreach ($update as $row) {
		   		 	
				
				       $sess_array = array(
				         'email'     =>   $row->EmailAddress,
				         'username'  =>   $row->UserName,
				         'fname'     =>   $row->FirstName,
				         'mname'     =>   $row->MiddleName,
				         'lname'     =>   $row->LastName,
				         'uid'		 =>	  $row->UserId,
				         'roleID'	 =>	  $row->RoleId,
				         'img'		 =>	  $row->ProfileImageSource
				       );
				       $this->session->set_userdata('logged_in', $sess_array);
				     }
		   		 
		$this->updated_name();
	}


	/*
	----------------------------------
	 Alert if Success changing name
	---------------------------------
	*/
	function updated_name(){


				$session_data = $this->session->userdata('logged_in');
				$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    	$data['roleName'] = $logInDetails;
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			    $data['roleID'] = $session_data['roleID'];
			  	$data['tab'] = "";
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Name Successfully Change !";
			    
			    $data['countries']=$this->User->countries();
		        $data['questions'] =$this->User->question();
                $data['consignee'] =$this->User->dropdown_consignee();
                $data['role'] = $this->User->get_role($session_data['uid']);

                //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){
	            	
	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);
	}	

	/*
	-----------------------------------------
		Update Password
	-----------------------------------------
	*/

	function update_password(){

		$id = $this->input->post('user_id_pass');
		$current = $this->input->post('current');
		 	$salt  = 'fwodhsljkfhnouh';
		    $salt2 = 'djaoiuelanwdoiwq';
		    $pass = sha1($salt.$current.$salt2);

		$renewpass = $this->input->post('renewpass');
			$salt  = 'fwodhsljkfhnouh';
		    $salt2 = 'djaoiuelanwdoiwq';
		    $newpass = sha1($salt.$renewpass.$salt2);

		$db_pass =  $this->User->get_current_pass($id);

		foreach ($db_pass as $row) {
			$userpass = $row->Password;
		}

		if($pass != $userpass){
			
				$this->not_success_pass();
		}
		else{
				$this->User->updatePass($id,$newpass);
				$this->updated_pass();			
		}

	}


/*
----------------------------------
 Alert if Success changing Password
---------------------------------
*/
	function updated_pass(){
/*				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Password Successfully Change !";

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);*/

				$session_data = $this->session->userdata('logged_in');
				$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    	$data['roleName'] = $logInDetails;
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			    $data['roleID'] = $session_data['roleID'];
			  	$data['tab'] = "";
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Password Successfully Change !";
			    
			    $data['countries']=$this->User->countries();
		        $data['questions'] =$this->User->question();
                $data['consignee'] =$this->User->dropdown_consignee();
                $data['role'] = $this->User->get_role($session_data['uid']);

                //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);
	}		

/*
----------------------------------
 Alert if Not Success changing Password
---------------------------------
*/
	function not_success_pass(){
/*				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			  	$data['tab'] = "";
			  	$data['alert'] = "danger";
				$data['msg'] = "Incorrect Current Password. Try Again.";

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);*/

				$session_data = $this->session->userdata('logged_in');
				$logInDetails = $this->User->getAccessType($session_data['uid'],$session_data['roleID']);
		    	$data['roleName'] = $logInDetails;
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			    $data['roleID'] = $session_data['roleID'];
			  	$data['tab'] = "";
			  	$data['alert'] = "danger";
				$data['msg'] = "Incorrect Current Password. Try Again.";
			    
			    $data['countries']=$this->User->countries();
		        $data['questions'] =$this->User->question();
                $data['consignee'] =$this->User->dropdown_consignee();
                $data['role'] = $this->User->get_role($session_data['uid']);

                //User 
	            $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
	            if($roleuser == NULL){

	            }else{
	            	$data['roleuser'] = explode(',', $roleuser->AccessTypesId);
	            }

				$this->load->view('header/header',$data);
				$this->load->view('account/account_page',$data);

	}		



	//foe selecting country
function select_country(){
	$id      = $this->input->post('countryid');
	$country = $this->input->post('conname');
	
	$newdata = $this->User->country($id); 
	echo "<select name='country' class='form-control'>";
		echo '<option value='.$id.'> '.$country.'</option>';
		foreach ($newdata as $row) {
			$cid      = $row->CountryId;
			$cname    = $row->CountryName;
			echo '<option value='.$cid.'> '.$cname.'</option>';
		}
	echo "</select>";
		
}



   //for pagination  start


	function consignee_content(){
	
    $item_per_page=10;
	//Get page number from Ajax POS T
	if(isset($_POST["page"])){
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
		 if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
	 }else{
		$page_number = 1; //if there's no page number, set it to 1
	}
	
	//get starting position to fetch the records
	$page_position = (($page_number-1) * $item_per_page);

   $id   =  $this->input->post('consignee_id');
   if(isset($id)){
   	$clients = $this->User->search_consignee($id);
   }else{
   	 $clients  =  $this->User->findlimit($item_per_page,$page_position);
	
   }
  $session_data = $this->session->userdata('logged_in');

//Consignee
  $consignee = 6;
    $roleconsignee = $this->UserAccess->RoleSetting($session_data['roleID'],$consignee);  
    if($roleconsignee == NULL){
    	$roleconsignee1 = 0;
    }else{
    	$roleconsignee1 = explode(',', $roleconsignee->AccessTypesId);
    }
			echo '<table class="table table-bordered table_consignee tablesorter table-condensed" id="table_consignee"> 
					    <thead>
					      <tr>
					        <th>Consignee Name <span class="glyphicon glyphicon-sort"></span></th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					         <th>Town/City/Province</th>
					         <th>Country</th>
					         <th>OfficeNumber</th>';
					         
					      if($roleconsignee1[0] == '1' || $roleconsignee1[1] == '2'){
					         echo '<th data-sorter="false">Contact Persons</th>';
					      }else{}
					        echo '<th>Status</th>';
					      
					      if($roleconsignee1[1] =='2'){
					      	echo '<th data-sorter="false">Update</th>';
					      } else{}
					        
					      echo '</tr>
					    </thead>
					    <tbody>' ?>
					      	<?php 
					         $i=0;
					      		foreach ($clients as $row) {
					      	    $i++;

					      	   
					      	    //for default value
					      	    if($i==1){
					      	    	$cid   = $row->ConsigneeId; 
					      		}

					     	    $active= $row->IsActive;
					      		if($active==1){ 
					      		  $stat = 'activated';
					      		  $mystat = '1';
					      		}else{
					      		  $stat = 'deactivated';
					      		  $mystat= '0';
					      		}
					      		if($stat=='activated')
					      		{
					      			$stats = 'deactivated';
					      			$mystats = '0';	
					      		}else{
					      			$stats = 'activated';
					      			$mystats = '1';
					         	}
					         	$number = $row->OfficeNumber;
	
					   echo     '<tr style="cursor:pointer;">
					    		    <td class="hidden">'. $row->ConsigneeId .'</td>
							        <td>'.  stripslashes($row->ConsigneeName).'</td>
							      	<td>'. stripslashes($row->HouseBuildingNoOrStreet) .'</td>
							        <td>'. stripslashes($row->BarangayOrVillage) .'</td>  
							        <td>'. stripslashes($row->TownOrCityProvince) .'</td> 
							        <td>'.stripslashes($row->Country) .'</td>          
							        <td>'. stripslashes($number) .'</td> ';
						           
						           if($roleconsignee1[1] == '2' || $roleconsignee1[0] == '1'){
						           	echo '<td>';
						           		if($roleconsignee1[1] == '2'){ 
						           		  echo '<button type="button" class="btn view_consignee_contact btn-sm" data-toggle="modal" data-target="#modal_view_consignee_contact">Edit</button>';
						           		}else{}

						           		if($roleconsignee1[0] == '1'){
				       					  echo' <button type="button" class="btn add_consignee_contact btn-sm"  data-toggle="modal" data-target="#modal_add_consignee_contact">Add</button> ';
						           		}else{}
						           		
				       			   echo '</td>';
				       			   }else{}
				       			   
							      echo'  <td>'.$stat .'</td>
							        <td   class="hidden">'. $mystat .'</td>
							        <td   class="hidden">'. $row->CountryId .'</td>
							        ';
							        
							        if($roleconsignee1[1] == '2'){
							        	echo '<td><button type="button" class="btn get_consignee_datas btn-sm" data-toggle="modal" data-target="#modal_update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button></td>';
							        }else{}
							        	
							        echo '
							  								        
					     		 </tr>';
							        
					      		}

//for message popup when update  adding data is success/failed start			      		
  
  if(isset($_SESSION['success'])){
    $success = $_SESSION['success'];
  	if($success=='success'){
  	 $message_success = 'Data is successfully added!';
  	}
    if($success=='update_success'){
  	$message_success = 'Data is successfully updated!';
    }

	 echo  "<script>
			    $.alert({
							title: 'Alert!',
						    content: '$message_success',
						    confirm: function(){
														    
							}
							});
	  </script>";

	  	$this->session->unset_userdata('success');
  }
  if(isset($_SESSION['failed'])){
  	$failed = $_SESSION['failed'];
  	if($failed=='failed'){
  	 $message = 'Failed to Add, because the Data Already exists!';
  	
  	}
    if($failed=='update_failed'){
  	$message = 'Failed to Update, because the Data Already exists!';
  }

  
 		echo "<script>
		 		   $.alert({
						title: 'Alert!',
					    content: '$message',
					    confirm: function(){
													    
						}
						});
  			</script>";

  	$this->session->unset_userdata('failed');
  }
  //for message popup when update  adding data is success/failed start	


					      ?>
					    <!--   <td><button class="btn update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button></td> -->
					    </tbody>
					  </table> 

 <script src="<?php echo base_url('resources/js/higlight.js');?>"></script>
 <script src="<?php echo base_url('resources/js/get_datas.js');?>"></script>
 <script src="<?php echo base_url('resources/js/settings.js');?>"></script>
  				  
<script>
	$('#table_consignee').tablesorter({
		    widthFixed : true,
			widgets        : ['zebra','stickyHeaders'],	
			usNumberFormat : false,
			sortReset      : true,
			sortRestart    : true,
			widgetOptions: {
	     	
	     		stickyHeaders_attachTo: '.report_header-consignee'
	     }
	});
</script>
		
	<?php	
	}
   //for pagination  end
}



