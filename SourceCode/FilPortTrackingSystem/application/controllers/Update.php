<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Update extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	

       }
    //userid 
    function userids(){
              $session_data = $this->session->userdata('logged_in');
             return  $userid = $session_data['uid'];
          
    }

	function update_consignee(){
		$id 	= 	addslashes($this->input->post('consig_id'));
		$name 	= 	addslashes($this->input->post('consig_name'));
		$hbno 	=	addslashes($this->input->post('hbno'));
		$vilage =	addslashes($this->input->post('vilage'));
		$city 	=	addslashes($this->input->post('city'));
	    $country=	addslashes($this->input->post('country'));
		$ofnum  = 	addslashes($this->input->post('consig_ofnum'));
		$status = 	addslashes($this->input->post('status'));

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
          		 $userid = $this->userids();         
			     $this->User->update_cosignee($id,$name,$hbno,$vilage,$city,$country,$ofnum,$status,$userid);
			     $this->session->success= 'update_success';
		  }
		   redirect('Login_user/settings');

	
	}
	function update_vessel(){
		$id 	= 	addslashes($this->input->post('ves_id'));
		$name 	= 	addslashes($this->input->post('ves_name'));
		$address_carrier = 	addslashes($this->input->post('address_carrier'));
		$number_carrier = addslashes($this->input->post('number_carrier'));
		$status = 	addslashes($this->input->post('status'));
		
		    $query= $this->db->query("Select * from 
		    	Carrier where CarrierName = '$name' 
		    	and CarrierId=$id
		    	and Address='$address_carrier' 
		    	and OfficeNo='$number_carrier'
		    	and IsActive='$status'
		    	limit 1");
            
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          } 
       else{  
       	        $userid = $this->userids();     
				$this->User->update_vessel($id,$name,$address_carrier,$number_carrier,$status,$userid);
				$this->session->success= 'update_success';
		 }
		redirect('Login_user/settings/#vessel');

	
	}
		function update_shipper(){
		$id 	   = 	addslashes($this->input->post('ship_id'));
		$name 	   = 	addslashes($this->input->post('ship_name'));
		$hbno 	   = 	addslashes($this->input->post('hbno'));
		$vilage    = 	addslashes($this->input->post('vilage'));
		$city 	   = 	addslashes($this->input->post('city'));
		$country   = 	addslashes($this->input->post('country'));
		$status    = 	addslashes($this->input->post('status'));

		

		$query= $this->db->query("Select * from Shipper where ShipperName = '$name' 
		and HouseBuildingNoStreet='$hbno'
		and BarangarOrVillage='$vilage'
		and TownOrCityProvince='$city'
		and CountryId='$country'
	    and IsActive='$status'
		limit 1");
          
		if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          } 
       else{ 
        	  $userid = $this->userids();    
       		 $this->User->update_shipper($id,$name,$hbno,$vilage,$city,$country,$status,$userid);
       		 $this->session->success= 'update_success';
       	   }
		redirect('Login_user/settings/#shipper');

	
	}
	function update_shippercon(){
		$id 	= 	addslashes($this->input->post('ship_id'));
		$fname 	= 	addslashes($this->input->post('fname'));
		$mname 	= 	addslashes($this->input->post('mname'));
		$lname 	= 	addslashes($this->input->post('lname'));
		$c1 	= 	addslashes($this->input->post('c1'));
		$c2 	= 	addslashes($this->input->post('c2'));
     
    $userid = $this->userids(); 
	$this->User->update_shippercon($id,$fname,$mname,$lname,$c1,$c2,$userid);
	redirect('Login_user/settings');
	}
    function update_consigneecon(){
		$id 	= 	addslashes($this->input->post('c_id'));
		$fname 	= 	addslashes($this->input->post('fname'));
		$mname 	= 	addslashes($this->input->post('mname'));
		$lname 	= 	addslashes($this->input->post('lname'));
		$c1 	= 	addslashes($this->input->post('c1'));
		$c2 	= 	addslashes($this->input->post('c2'));
    $userid = $this->userids();
	$this->User->update_consigneecon($id,$fname,$mname,$lname,$c1,$c2,$userid);
	redirect('Login_user/settings');
	}
		function update_broker(){
		$id 			= 			addslashes($this->input->post('broker_id'));
		$broker_fname 	= 			addslashes($this->input->post('broker_fname'));
		$broker_mname 	= 			addslashes($this->input->post('broker_mname'));
		$broker_lname 	= 			addslashes($this->input->post('broker_lname'));

		$broker_houseno = 			addslashes($this->input->post('houseno'));
		$broker_vil	    = 			addslashes($this->input->post('village'));
		$broker_city	= 			addslashes($this->input->post('city'));
	    $broker_cid	    = 			addslashes($this->input->post('country'));


		$broker_contact1 = 			addslashes($this->input->post('c1'));
		$broker_contact2 = 			addslashes($this->input->post('c2'));

    	$status_broker 	= 			addslashes($this->input->post('status'));
    	$status_broker =  (int) $status_broker; 
		
/*		$query= $this->db->query("Select * from Broker where FirstName = '$broker_fname' 
              and MiddleName='$broker_mname' and LastName='$broker_lname' limit 1");*/
        $query2= $this->db->query("Select * from Broker where
            BrokerId                 =   '$id'               and
        	FirstName                =   '$broker_fname'    and 
        	MiddleName			     =   '$broker_mname'    and 
        	LastName		         =   '$broker_lname'    and
        	HouseBuildingNoStreet    =   '$broker_houseno'  and
        	BarangarOrVillage		 =   '$broker_vil'  	and
        	TownOrCityProvince		 =   '$broker_city' 	and
        	CountryId				 =   '$broker_cid'      and
        	IsActive				 =    $status_broker 
        	limit 1");
             
		if($query2->num_rows() ==1){
             $this->session->failed= 'update_failed';
          } 
       else{ 
       	    $userid = $this->userids();
  			$this->User->update_broker($id,$broker_fname,$broker_mname,
			$broker_lname,$broker_houseno,$broker_vil,$broker_city,
			$broker_cid,$broker_contact1,$broker_contact2,$status_broker,$userid);
  	  		 $this->session->success= 'update_success';
  	    	}
		redirect('Login_user/settings/#broker');

	}

    function update_hauler(){
		$id 	= 	addslashes($this->input->post('hauler_id'));
		$name 	= 	addslashes($this->input->post('hauler_name'));
		$add 	= 	addslashes($this->input->post('hauler_address'));
		$tin 	= 	addslashes($this->input->post('hauler_tin'));
	    $status = 	addslashes($this->input->post('status'));


   		 $query= $this->db->query("Select * from HaulerOrTruck where
     		  HaulerOrTruck='$name' and Address='$add' and
     		  TIN='$tin' and
     		  HaulerOrTruckId='$id' and 
     		  IsActive  ='$status'
     		   limit 1");
    
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          }else{  
          	     $userid = $this->userids();
			     $this->User->update_hauler($id,$name,$add,$tin,$status,$userid);
			     $this->session->success= 'update_success';    
		       }
		        redirect('Login_user/settings/#hauler');

	}


	function update_forward(){
		$id 	= 	$this->input->post('forward_id');
		$name 	= 	$this->input->post('forward_name');
		$status =   $this->input->post('status');


   		 $query= $this->db->query("Select * from ForwarderWarehouse where
     		  ForwarderWarehouseName='$name' and
     		  IsActive='$status'
     		  limit 1");
    
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          }else{  
             	 $userid = $this->userids();
			     $this->User->update_forward($id,$name,$status,$userid);
			     $this->session->success= 'update_success';    
		       }
		        redirect('Login_user/settings/#forward');

	}

    function update_legend(){
		$legend_id 	    = 	addslashes($this->input->post('legend_id'));
		$name 			= 	addslashes($this->input->post('name'));
	    $description    = 	addslashes($this->input->post('legend_descrip'));
	    $back_ground 	=	addslashes($this->input->post('legend_bacg'));
 		$legend_color 	= 	addslashes($this->input->post('legend_color'));
 		$status 		= 	addslashes($this->input->post('status'));
 		$back_ground			= (int) $back_ground;


   		 $query= $this->db->query("Select * from Status where
     		  StatusName='$name' and Description='$description' and
     		  IsBackground='$back_ground' and
     		  ColorCode='$legend_color'   and
     		  IsActive ='$status'
     		   limit 1");
    
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          }else{  
          	     $userid = $this->userids();
			     $this->User->update_legend($legend_id,$name,$description,$legend_color,$status,$back_ground,$userid);
			     $this->session->success= 'update_success';    
		       }
		        redirect('Login_user/settings/#legend');
	}
	    function update_container(){
		$container_id 	= 	addslashes($this->input->post('container_id'));
		$con 	        = 	addslashes($this->input->post('con'));
	    $con_descrip    = 	addslashes($this->input->post('con_descrip'));
		$con_size 	    = 	addslashes($this->input->post('con_size'));


   	/*	 $query= $this->db->query("Select * from Container where
     		  ContainerNo='$con' and ContainerDescription='$con_descrip' and
     		  ContainerSize='$con_size' limit 1");*/
		   $query= $this->db->query("Select * from Container where
     		  ContainerNo='$con' and ContainerDescription='$con_descrip' and
     		  ContainerSize='$con_size' limit 1");
    
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          }else{
          	     $userid = $this->userids();
			     $this->User->update_container($container_id,$con,$con_descrip,$con_size,$userid);
			     $this->session->success= 'update_success';    
		       }
		        redirect('Login_user/settings/#container');
	}


    function update_products(){
		$id 	= 	addslashes($this->input->post('prod_id'));
		$name 	= 	addslashes($this->input->post('prod_name'));
		$status = 	addslashes($this->input->post('status'));
		$status = (int) $status;


   		 $query= $this->db->query("Select * from Products where
     		  ProductName='$name'    and
     		  ProductId='$id' and 
     		  IsActive = $status
     		   limit 1");
    
          if($query->num_rows() ==1){
             $this->session->failed= 'update_failed';
          }else{  
          	     $userid = $this->userids();
			     $this->User->update_products($id,$name,$status,$userid);
			     $this->session->success= 'update_success';    
		       }
		        redirect('Login_user/settings/#product');

	}

}




?>