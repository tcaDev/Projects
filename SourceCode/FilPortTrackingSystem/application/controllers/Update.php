<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Update extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	

       }
//index function is no longer use
	  function index(){
			$id 	   = $this->input->post('ConsigneeId');
			$Consignee = $this->input->post('Cons');
			$Address   = $this->input->post('Addr');
			$stat      = $this->input->post('stat');
			$this->User->update_cosignee($id,$Consignee,$Address,$stat);

		}

	function update_consignee(){
		$id 	= 	$this->input->post('consig_id');
		$name 	= 	$this->input->post('consig_name');
		$hbno 	=	$this->input->post('hbno');
		$vilage =	$this->input->post('vilage');
		$city 	=	$this->input->post('city');
	    $country=	$this->input->post('country');
		$ofnum  = 	$this->input->post('consig_ofnum');
		$status = 	$this->input->post('status');

		$query= $this->db->query("Select * from Consignee where ConsigneeName = '$name' limit 1");

        $query2= $this->db->query("Select * from Consignee where 
          ConsigneeId   = $id              and
          ConsigneeName = '$name'          and 
          OfficeNumber='$ofnum'            and 
          IsActive='$status'               and 
          HouseBuildingNoOrStreet ='$hbno' and 
          BarangayOrVillage='$vilage'      and 
          CountryId='$country'             and 
          TownOrCityProvince='$city'  
          limit 1");
		
          if(($query->num_rows() ==1) && ($query2->num_rows() ==1)){
              $this->session->failed= 'update_failed';
          }else{            
			     $this->User->update_cosignee($id,$name,$hbno,$vilage,$city,$country,$ofnum,$status);
			     $this->session->success= 'update_success';
		  }
		   redirect('Login_User/settings');

	
	}
	function update_vessel(){
		$id 	= 	$this->input->post('ves_id');
		$name 	= 	$this->input->post('ves_name');
		$vesno 	= 	$this->input->post('vesno');
		
		    $query= $this->db->query("Select * from 
		    	ShipperVessel where Vesselname = '$name' and 
                ShipperVesselId=$id and VesselNo='$vesno' limit 1");
            
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          } 
       else{  
				$this->User->update_vessel($id,$name,$vesno);
				$this->session->success= 'update_success';
		 }
		redirect('Login_User/settings/#vessel');

	
	}
		function update_shipper(){
		$id 	= 	$this->input->post('ship_id');
		$name 	= 	$this->input->post('ship_name');
		

		$query= $this->db->query("Select * from Shipper where ShipperName = '$name' limit 1");
          
		if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          } 
       else{ 
       		$this->User->update_shipper($id,$name);
       		 $this->session->success= 'update_success';
       	   }
		redirect('Login_User/settings/#shipper');

	
	}
	function update_shippercon(){
		$id 	= 	$this->input->post('ship_id');
		$fname 	= 	$this->input->post('fname');
		$mname 	= 	$this->input->post('mname');
		$lname 	= 	$this->input->post('lname');
		$c1 	= 	$this->input->post('c1');
		$c2 	= 	$this->input->post('c2');

	$this->User->update_shippercon($id,$fname,$mname,$lname,$c1,$c2);
	redirect('Login_User/settings');
	}
    function update_consigneecon(){
		$id 	= 	$this->input->post('c_id');
		$fname 	= 	$this->input->post('fname');
		$mname 	= 	$this->input->post('mname');
		$lname 	= 	$this->input->post('lname');
		$c1 	= 	$this->input->post('c1');
		$c2 	= 	$this->input->post('c2');

	$this->User->update_consigneecon($id,$fname,$mname,$lname,$c1,$c2);
	redirect('Login_User/settings');
	}
		function update_broker(){
		$id 			= 			$this->input->post('broker_id');
		$broker_fname 	= 			$this->input->post('broker_fname');
		$broker_mname 	= 			$this->input->post('broker_mname');
		$broker_lname 	= 			$this->input->post('broker_lname');

		$broker_houseno = 			$this->input->post('houseno');
		$broker_vil	    = 			$this->input->post('village');
		$broker_city	= 			$this->input->post('city');
	    $broker_cid	    = 			$this->input->post('country');


		$broker_contact1 = 			$this->input->post('c1');
		$broker_contact2 = 			$this->input->post('c2');

		$status_broker 	= 			$this->input->post('status_broker');
		
		$query= $this->db->query("Select * from Broker where FirstName = '$broker_fname' 
              and MiddleName='$broker_mname' and LastName='$broker_lname' limit 1");
        $query2= $this->db->query("Select * from Broker where
            BrokerId  =$id              and
        	FirstName = '$broker_fname' and 
        	MiddleName='$broker_mname'  and 
        	LastName='$broker_lname'    and
        	HouseBuildingNoStreet='$broker_houseno'      and
        	BarangarOrVillage='$broker_vil'   and
        	TownOrCityProvince='$broker_city' and
        	CountryId='$broker_cid'             and
        	IsActive=$status_broker
        	limit 1");
             
		if(($query->num_rows() ==1) && ($query2->num_rows() ==1)){
             $this->session->failed= 'update_failed';
          } 
       else{ 
  			$this->User->update_broker($id,$broker_fname,$broker_mname,
			$broker_lname,$broker_houseno,$broker_vil,$broker_city,
			$broker_cid,$broker_contact1,$broker_contact2,$status_broker);
  	  		 $this->session->success= 'update_success';
  	  	}
		redirect('Login_User/settings/#broker');

	}

}	





?>