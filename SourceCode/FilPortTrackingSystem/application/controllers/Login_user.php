<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User');	
            $this->load->model('Jobdata');	
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
		         'img'		 =>	  $row->ProfileImageSource,
		         'bdate'		 =>	  $row->BirthDate
		       );
		       $this->session->set_userdata('logged_in', $sess_array);
		     }
		     return TRUE;
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
		if($this->session->userdata('logged_in')){
		  	$data['tab'] = "Main Menu";
		  	$session_data = $this->session->userdata('logged_in');
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

            if($role->RoleId == 2){
				$this->load->view('header/header',$data);
				$this->load->view('menu/views_menu_consignee' , $data);
            }else{
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

			$this->load->view('clientheader/header',$data);
			$this->load->view('client_menu/views_clientmenu' , $data);

		}else{
			 $this->login();
		}
	}

	 function jobfile(){
	 	 //check if the user is already login
		if($this->session->userdata('logged_in')){		

			$data['tab'] = "JobFile Monitoring";
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


		    $query = $this->db->query('SELECT * FROM vw_JobFile where MonitoringTypeId=1');
			$m=  $query->num_rows();
		  	$data['count_total_manila']= $m;

		  	$query = $this->db->query('SELECT * FROM vw_JobFile where MonitoringTypeId=2');
			$o=  $query->num_rows();
		  	$data['count_total_outport']= $o;

		    $query = $this->db->query('SELECT * FROM vw_JobFile where MonitoringTypeId=3');
			$a=  $query->num_rows();
		  	$data['count_total_air']= $a;

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

	function forgot()
	{	
			$data['msg'] = "";
			$data['alert'] = "";
			$data['tab'] = "Forgot Password";
			$this->load->view('forgotpass/password' , $data);
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
			$data['tab'] = "REPORTS";
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

		    /* get status*/
		    /*$data['consignee'] = $this->User->get_consignee();
		    $data['broker'] = $this->User->get_broker();
		    $data['shipper'] = $this->User->get_shipper();*/
		    /*$data['vessel'] = $this->User->get_vessel();*/
		 	
		 	 /*$data['manila'] = $this->User->get_jobfile_manila_global();*/
		 	$role = $this->User->get_role($session_data['uid']);
            if($role->RoleId == 2){
            	$cName = $this->Jobdata->get_consignee_name($session_data['uid']);
            	$data["jobfiles"] = $cName->ConsigneeName;
				$this->load->view('header/header',$data);
				$this->load->view('reports/reports_page_consignee',$data);
            }else{
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
		    $data['username'] = $session_data['username'];
		    $data['email'] =  $session_data['email'];
		    $data['fname'] = $session_data['fname'];
		    $data['mname'] = $session_data['mname'];
		    $data['lname'] = $session_data['lname'];
		    $data['uid'] = $session_data['uid'];
		    $data['img'] = $session_data['img'];
		    $data['bdate'] = $session_data['bdate'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

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
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();

            $role = $this->User->get_role($session_data['uid']);
            if($role->RoleId == 2){
            	$cName = $this->Jobdata->get_consignee_name($session_data['uid']);
            	$data['manila'] = $this->User->get_jobfile_manila_global_consignee($cName->ConsigneeName);
				$this->load->view('header/header',$data);
				$this->load->view('global/global_page' , $data);
            }else{
            	$data['manila'] = $this->User->get_jobfile_manila_global();
          	    $this->load->view('header/header',$data);
				$this->load->view('global/global_page' , $data);
            }

		   
		 	
			
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
		    $data['uid'] = $session_data['uid'];
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();
		 
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

			$this->load->view('clientheader/header',$data);
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
		    $data['countries']=$this->User->countries();
		    $data['questions'] =$this->User->question();
            $data['consignee'] =$this->User->dropdown_consignee();
		    $data['uid'] = $session_data['uid'];
		 
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
				         'img'		 =>	  $row->ProfileImageSource,
				         'bdate'	 =>	  $row->BirthDate
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
			    $data['bdate'] = $session_data['bdate'];
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
			    $data['bdate'] = $session_data['bdate'];
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
		$bdate = $this->input->post('bdate');

		$this->User->updateName($id,$fname,$mname,$lname,$bdate);


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
				         'img'		 =>	  $row->ProfileImageSource,
				         'bdate'	 =>	  $row->BirthDate
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
			    $data['bdate'] = $session_data['bdate'];
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
				$session_data = $this->session->userdata('logged_in');
			    $data['username'] = $session_data['username'];
			    $data['email'] =  $session_data['email'];
			    $data['fname'] = $session_data['fname'];
			    $data['mname'] = $session_data['mname'];
			    $data['lname'] = $session_data['lname'];
			    $data['uid'] = $session_data['uid'];
			    $data['img'] = $session_data['img'];
			     $data['bdate'] = $session_data['bdate'];
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
			     $data['bdate'] = $session_data['bdate'];
			  	$data['tab'] = "";
			  	$data['alert'] = "danger";
				$data['msg'] = "Incorrect Current Password. Try Again.";

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
	//Get page number from Ajax POST
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


  
			echo	  '<table class="table table-bordered table_consignee" id="table_consignee"> 
					    <thead>
					      <tr>
					        <th>Consignee Name <span class="glyphicon glyphicon-sort"></span></th>
					        <th>HouseBuildingNo/Street</th>
					        <th>Barangay/Village</th>
					         <th>Town/City/Province</th>
					         <th>Country</th>
					         <th>OfficeNumber</th>
					         <th>Contact Persons</th>
					        <th>Status</th>
					        <th colspan="2">Update</th>
					      </tr>
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
							        <td>'. stripslashes($number) .'</td> 
							           <td>
							           		   <button type="button" class="btn  view_consignee_contact" data-toggle="modal" data-target="#modal_view_consignee_contact">Edit</button>   
					       					   <button type="button" class="btn  add_consignee_contact"  data-toggle="modal" data-target="#modal_add_consignee_contact">Add</button> 
					       			   </td>   
							        <td>'.$stat .'</td>
							        <td   class="hidden">'. $mystat .'</td>
							        <td   class="hidden">'. $row->CountryId .'</td>
							        <td><button type="button" class="btn get_consignee_datas" data-toggle="modal" data-target="#modal_update_consignee"><span class="glyphicon glyphicon-edit data-toggle="modal" data-target="#myModal""></span></button>
							  								        
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
  	 $message = 'Failed to Add, because the data already exists!';
  	
  	}
    if($failed=='update_failed'){
  	$message = 'Failed to Update, because the data already exists!';
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
   <script src="<?php echo base_url('resources/js/jquery.tablesorter.min.js');?>"></script>
  <link href="<?php echo base_url('resources/css/tabl_sort.css');?>" rel="stylesheet" />
<script>
	$(document).ready(function() { 
        $("#table_consignee").tablesorter();}); 
</script> 
	<?php	
	}
   //for pagination  end
}



