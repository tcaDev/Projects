<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Update extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->model('User');	

       }

	  function index(){
			$id 	   = $this->input->post('ConsigneeId');
			$Consignee = $this->input->post('Cons');
			$Address   = $this->input->post('Addr');
			$stat      = $this->input->post('stat');
			$this->User->update_cosignee($id,$Consignee,$Address,$stat);

		$data['clients'] = $this->User->clients();
		$client = $data['clients'];


			 echo     '<table class="table table-striped" id="table">
					    <thead>
					      <tr>
					        <th>Consignee</th>
					        <th>Address</th>
					        <th>Status</th>
					        <th>Update</th>
					      </tr>
					    </thead>
					    <tbody>';

				

					  

					      	foreach ($client as $row) {	
					      	    $active= $row->IsActive;
					      		if($active==1){ 
					      		  $stat = 'activated';
					      		  $mystat = 1;
					      		}else{
					      		  $stat = 'deactivated';
					      		  $mystat= 0;
					      		}
					      		if($stat=='activated')
					      		{
					      			$stats = 'deactivated';
					      			$mystats = 0;	
					      		}else{
					      			$stats = 'activated';
					      			$mystats =1;
					         	}
					          echo '<tr>
						    		    <td   class="hidden">'. $row->ConsigneeId .'</td>
								        <td   contenteditable="true">'. $row->ConsigneeName .'</td>
								        <td   contenteditable="true">'. $row->Address .'</td>
								        <td><select class="status">
								        		<option value='.$mystat.'> '.$stat.' </option>
								        		<option value='.$mystats.'> '.$stats.' </option>
								       		</select>
								         </td>
								        <td><button class="btn update"><span class="glyphicon glyphicon-edit"></span></button></td>		       
					     		    </tr>';
					      	}
					 echo  '</tbody>
					  </table>';

		}

	function update_consignee(){
		$id 	= 	$this->input->post('consig_id');
		$name 	= 	$this->input->post('consig_name');
		$addr 	=	$this->input->post('consig_addr');
		$ofnum  = 	$this->input->post('consig_ofnum');
		$status = 	$this->input->post('status');

		$this->User->update_cosignee($id,$name,$addr,$ofnum,$status);
		redirect('Login_User/settings');

	
	}
	function update_vessel(){
		$id 	= 	$this->input->post('ves_id');
		$name 	= 	$this->input->post('ves_name');
	
		$this->User->update_vessel($id,$name);
		/*redirect('Login_User/settings');*/

	
	}
		function update_shipper(){
		$id 	= 	$this->input->post('ship_id');
		$name 	= 	$this->input->post('ship_name');
		$this->User->update_shipper($id,$name);
	
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
		function update_broker(){
		$id 	= 	$this->input->post('broker_id');
		$broker_fname 	= 			$this->input->post('broker_fname');
		$broker_mname 	= 			$this->input->post('broker_mname');
		$broker_lname 	= 			$this->input->post('broker_lname');
		$broker_address = 	 		$this->input->post('broker_address');
		$broker_contact = 			$this->input->post('broker_contact');
		$status_broker 	= 			$this->input->post('status_broker');
		
		$this->User->update_broker($id,$broker_fname,$broker_mname,
		$broker_lname,$broker_address,$broker_contact,$status_broker);
		/*redirect('Login_User/settings');*/

	}

}	





?>