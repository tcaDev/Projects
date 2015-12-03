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
		         'email'     =>   $row->EmailAddress,
		         'username'  =>   $row->UserName,
		         'pass'      =>   $row->Password,
		         'fname'     =>   $row->FirstName,
		         'mname'     =>   $row->MiddleName,
		         'lname'     =>   $row->LastName
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
		  	$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 
			$this->load->view('header/header',$data);
			$this->load->view('menu/views_menu' , $data);
		}else{
			 $this->login();
		}

			
	
	}

	 function jobfile(){
	 	 //check if the user is already login
		if($this->session->userdata('logged_in')){		

			$data['tab'] = "JobFile Monitoring - Sea";
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		  
			$this->load->view('header/header',$data);
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
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 
			$this->load->view('header/header',$data);
			$this->load->view('reports/reports_page' , $data);
		}else{
			$this->login();
		}
	}

	 function account()
	{		
		//check if the user is already login
		if($this->session->userdata('logged_in')){	

			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		  	$data['tab'] = "";
		 
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
	 	$data['lconsignee']  =  $this->User->settings_consignee();
	 	$data['lbroker']	 =  $this->User->settings_broker();
	 	$data['lvessel'] 	 =  $this->User->settings_vessel();
	 	$data['lshipper'] 	 =  $this->User->settings_shipper();
	 	$data['lshippercon'] =  $this->User->settings_shipper_con();
		$data['clients'] =     $this->User->clients();
		$data['tab'] = "SITE SETTINGS";

		$session_data = $this->session->userdata('logged_in');
	    $data['username'] = $session_data['username'];
	    $data['email'] =  $session_data['email'];
	    $data['fname'] = $session_data['fname'];
	    $data['mname'] = $session_data['mname'];
	    $data['lname'] = $session_data['lname'];
	 
		$this->load->view('header/header',$data);
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
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 
			$this->load->view('header/header',$data);
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
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 
			$this->load->view('header/header',$data);
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
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		 
			$this->load->view('header/header',$data);
			$this->load->view('dashboard/dashboard_page' , $data);
		}else{
			$this->login();
		}
	}
									
}
