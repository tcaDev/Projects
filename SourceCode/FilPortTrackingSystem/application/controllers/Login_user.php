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
		         'fname'     =>   $row->FirstName,
		         'mname'     =>   $row->MiddleName,
		         'lname'     =>   $row->LastName,
		         'uid'		 =>	  $row->UserId,
		         'img'		 =>	  $row->ProfileImageSource
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
		 	$data['img'] = $session_data['img'];

			$this->load->view('header/header',$data);
			$this->load->view('menu/views_menu' , $data);

		}else{
			 $this->login();
		}
	}

	function clientmenu()
	{
		 //check if the user is already login
		if($this->session->userdata('logged_in')){
			$data['tab'] = "Main Menu";
			$this->load->view('client_menu/views_clientmenu' , $data);
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
		    $data['img'] = $session_data['img'];
		  
			$this->load->view('header/header',$data);
			$this->load->view('jobfile-view/views_jobfile' , $data);
		}else{
			$this->login();
		}
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
			$data['tab'] = "GENERAL REPORTS";
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['img'] = $session_data['img'];
		 
			$this->load->view('header/header',$data);
			$this->load->view('reports/reports_page' , $data);
		}else{
			$this->login();
		}
	}

	function clientreports()
	{	
		//check if the user is already login
		if($this->session->userdata('logged_in')){	
			$data['tab'] = "DOCUMENTS";
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
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['uid'] = $session_data['uid'];
		    $data['img'] = $session_data['img'];
		  	$data['tab'] = "";
		  	$data['msg'] = "";
		  	$data['alert'] = "";
		 
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
	    $data['img'] = $session_data['img'];
	 
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
		    $data['img'] = $session_data['img'];
		 
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
		    $data['img'] = $session_data['img'];
		 
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
			$this->load->view('tracking/tracking_page' , $data);
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
		    $data['img'] = $session_data['img'];
		 
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
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Photo Successfully Change !";

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
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			  	$data['tab'] = "";
			  	$data['alert'] = "danger";
				$data['msg'] = "Your photos couldn't be uploaded. Photos should be saved as JPG or PNG files.";

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
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			  	$data['tab'] = "";
			  	$data['alert'] = "success";
				$data['msg'] = "Name Successfully Change !";

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

				$this->updated_pass();			
		}

	}


/*
----------------------------------
 Alert if Success changing Password
---------------------------------
*/
	function updated_pass(){
				$session_data = $this->session->userdata('logged_in');
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
				$this->load->view('account/account_page',$data);
	}		

/*
----------------------------------
 Alert if Not Success changing Password
---------------------------------
*/
	function not_success_pass(){
				$session_data = $this->session->userdata('logged_in');
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
				$this->load->view('account/account_page',$data);
	}		


}

