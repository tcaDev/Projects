<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User');	
            $this->load->library('form_validation');

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
		       $sess_array = array(
		         'email' => $row->EmailAddress,
		         'username' => $row->UserName
		       );
		       $this->session->set_userdata('logged_in', $sess_array);
		     }
		     return TRUE;
		   }
		   else
		   {
		     $this->form_validation->set_message('check_database','');
		     return false;
		   }
 	}	

	 function menu()
	{
		 //check if the user is already login
		if($this->session->userdata('logged_in')){
			$data['tab'] = "Main Menu";
			$this->load->view('menu/views_menu' , $data);
		}else{
			 $this->login();
		}

			
	
	}

	 function jobfile(){
	 	 //check if the user is already login
		if($this->session->userdata('logged_in')){		
			$data['tab'] = "JobFile Monitoring - Sea";
			$this->load->view('jobfile-view/views_jobfile' , $data);
		}else{
			$this->login();
		}
	}

	function login()
	{	

			$data['tab'] = "Log In";
			$this->load->view('login/login_page' , $data);
	}

 	 function logout()
	 {
	   $this->session->unset_userdata('logged_in');
	   session_destroy();
	   $this->index();
	 }


	function reports()
	{	
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "CONTAINER TRACKING";
			$this->load->view('reports/reports_page' , $data);
		}else{
			$this->login();
		}
	}

	 function account()
	{		
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "";
			$data['username'] = $this->session->has_userdata('username');;
			$this->load->view('account/account_page' , $data);
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
	 	$data['lconsignee']  =  $this->User->settings_consignee();
	 	$data['lbroker']	 =  $this->User->settings_broker();
	 	$data['lvessel'] 	 =  $this->User->settings_vessel();
	 	$data['lshipper'] 	 =  $this->User->settings_shipper();
	 	$data['lshippercon'] =  $this->User->settings_shipper_con();
		$data['clients'] =     $this->User->clients();
		$data['tab'] = "SITE SETTINGS";
		$this->load->view('settings/settings_page' , $data);
	 }else{
	 	$this->login();
	 }
	}
	 function search()
	{	
			//check if the user is already login
		 if($this->session->userdata('logged_in')){		
			$data['tab'] = "GLOBAL SEARCH";
			$this->load->view('global/global_page' , $data);
		 }else{
		 	$this->login();
		  }
	}
	function help()
	{
		//check if the user is already login
		 if($this->session->userdata('logged_in')){	
			$data['tab'] = "USER MANUAL";
			$this->load->view('help/help_page' , $data);
		}else{
			$this->login();
		}
	}

	function dashboard()
	{
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "Charts";
			$this->load->view('dashboard/dashboard_page' , $data);
		}else{
			$this->login();
		}
	}
									
}
