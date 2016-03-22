<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('UserAccess');
            $this->load->model('Jobfile');
             $this->load->model('Jobdata');
       }


       function get_dataAccess(){
       		$role = $this->input->post('role');

       		$desc = $this->UserAccess->get_desc($role);

       		foreach ($desc as $row) {
       			$desc_role = $row->RoleDescription;
       		}

       		$data['name'] = $desc_role;

       		$this->load->view('register/access/admin' , $data);

       }

       /*Create New Role*/

       function create_roleAccess(){

       		$this->load->view('register/access/create_role');
       }

       /*Insert New Role*/

       function insert_role(){
       		$RoleName = $this->input->post('RoleName');
       		$RoleDesc = $this->input->post('RoleDesc');

       		$this->UserAccess->roleCreate($RoleName,$RoleDesc);

       }


       function get_userList(){
       		$role = $this->input->post('role');

       		$desc = $this->UserAccess->get_desc($role);

       		foreach ($desc as $row) {
       			$desc_role = $row->RoleDescription;
       		}

       		$data['name'] = $desc_role;

                     $session_data = $this->session->userdata('logged_in');
                      //User 
                          $roleuser = $this->UserAccess->RolesUser($session_data['roleID']);  
                          if($roleuser == NULL){

                          }else{
                            $data['roleuser'] = explode(',', $roleuser->AccessTypesId);
                          }

       		if($role == 2){
       			$client = $this->Jobdata->get_user_client();
       			$data['User_list'] = $client;
       			if($client == NULL){
       				echo '<i style="color:red;">Nothing was Found</i>';
       			}
   				else{
       				$this->load->view('register/list_User/clientUser' , $data);
       			}
       		}
       		else{
       			$admin = $this->Jobdata->get_user_admin($role);
       			$data['User_list'] = $admin;
       			if($admin == NULL){
       				echo '<i style="color:red;">Nothing was Found</i>';
       			}
   				else{
   					$this->load->view('register/list_User/adminUser' , $data);	
   				}
       			
       		}
       		

       }

	   function admin_access(){
	   	$module = $this->input->post('module');
	   	$role = $this->input->post('role');

	   	if($module == '1'){
			echo $this->jobfile_admin_access($role);	
	   	}else if($module == '2'){
			echo $this->sitesettings_admin_access($role);	   		
	   	}else if($module == '3'){
			echo $this->global_admin_access($role);	   		
	   	}else if($module == '4'){
			echo $this->reports_access($role);	   		
	   	}else if($module == '5'){
			echo $this->audit_admin_access($role);	   		
	   	}else if($module == '6'){
			echo $this->dashboard_admin_access($role);	   		
	   	}else if($module == '7'){
			echo $this->user_admin_access($role);	   		
	   	}

	   }

       function jobfile_admin_access($role){


       		
       		$jobfile = $this->UserAccess->get_jbfl($role);
       		$jbfl;
       		$seaManila;
       		$seaOutport;
       		$airFreight;

       		if($jobfile == NULL){
       			$jbfl = 0;
       			$seaManila = 0;
       			$seaOutport = 0;
       			$airFreight = 0;
       		}

       		else{

       		foreach ($jobfile as $row) {
       				$accesstype1 = $row->AccessTypesId;
       				if(trim($row->SystemSubModuleId) == "1"){
       					$jbfl = $row->AccessTypesId;
       				}
       				if(trim($row->SystemSubModuleId) == "2"){
       					$seaManila = $row->AccessTypesId;
       					$seaManila = explode(',',$seaManila);
       				}
       				if(trim($row->SystemSubModuleId) == "3"){
       					$seaOutport = $row->AccessTypesId;
       					$seaOutport = explode(',',$seaOutport);
       				}
       				if(trim($row->SystemSubModuleId) == "4"){
       					$airFreight = $row->AccessTypesId;
       					$airFreight = explode(',',$airFreight);
       				}
       			}
       		}

       		$subOutput = '';
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Jobfile</b></td>
       								<td></td>
       								<td></td>
       								<td>
       									
										 <input type="checkbox" value="4" class="jobfile_access access_checkall" '.($jbfl == 4 ? 'checked' : '').'>
										
       								</td>
       								<td></td>
       							</tr>
       							<tr>
       								<td>Sea Freight Manila</td>
       								';
       								$i=0;
       								for($y = 1 ; $y <= 5 ; $y++){
       									$i++;
										for($x = 0 ; $x <= count($seaManila) - 1 ; $x++){
											if($seaManila[$x] == $y){
												$subOutput = "<td> <input type='checkbox' value='".$y."' class='sea_mnila' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox'  value='".$y."' class='sea_mnila' /> </td>";
											}	
										}
											$output .= $subOutput;
										}
       							$output.='</tr>

       							<tr>
       								<td>Sea Freight Outport</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($seaOutport) - 1 ; $x++){
											if($seaOutport[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='sea_outport' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='sea_outport' value='".$y."'/> </td>";
											}
										}
											$output .= $subOutput;
										}

       						$output.='</tr>

       							<tr>
       								<td>Air Freight</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($airFreight) - 1 ; $x++){
											if($airFreight[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='air_freight' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='air_freight' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
       						$output.='</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right jobfile_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

       		echo $output;
       }

       function sitesettings_admin_access($role){
       		$sitesettings = $this->UserAccess->get_sitesettings($role);
       		$site;
       		$consignee;
       		$broker;
       		$shipper;
       		$carrier;
       		$hauler;
       		$commodity;
       		$legend;

       		if($sitesettings == NULL){
       			$site = 0;
	       		$consignee = 0;
	       		$broker = 0;
	       		$shipper = 0;
	       		$carrier = 0;
	       		$hauler = 0;
	       		$commodity = 0;
	       		$legend = 0;
       		}

       		else{

       			foreach ($sitesettings as $row) {

       				if(trim($row->SystemSubModuleId) == "5"){
       					$site = $row->AccessTypesId;
       				}
       				if(trim($row->SystemSubModuleId) == "6"){
       					$consignee = $row->AccessTypesId;
       					$consignee = explode(',',$consignee);
       				}
       				if(trim($row->SystemSubModuleId) == "7"){
       					$broker = $row->AccessTypesId;
       					$broker = explode(',',$broker);
       				}
       				if(trim($row->SystemSubModuleId) == "8"){
       					$shipper = $row->AccessTypesId;
       					$shipper = explode(',',$shipper);
       				}
       				if(trim($row->SystemSubModuleId) == "9"){
       					$carrier = $row->AccessTypesId;
       					$carrier = explode(',',$carrier);
       				}
       				if(trim($row->SystemSubModuleId) == "10"){
       					$hauler = $row->AccessTypesId;
       					$hauler = explode(',',$hauler);
       				}
       				if(trim($row->SystemSubModuleId) == "11"){
       					$commodity = $row->AccessTypesId;
       					$commodity = explode(',',$commodity);
       				}
       				if(trim($row->SystemSubModuleId) == "12"){
       					$legend = $row->AccessTypesId;
       					$legend = explode(',',$legend);
       				}
       			}
       		}


       		$subOutput = '';
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Site Settings</b></td>
       								<td></td>
       								<td></td>
       								<td>
										 <input type="checkbox" class="site_access access_checkall" value="4" '.($site == 4 ? 'checked' : '').'>
       								</td>
       								<td></td>
       							</tr>
       							<tr>
       								<td>Consignee</td>
       								';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($consignee) - 1 ; $x++){
											if($consignee[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='consignee_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='consignee_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Broker</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($broker) - 1 ; $x++){
											if($broker[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='broker_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='broker_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Shipper</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($shipper) - 1 ; $x++){
											if($shipper[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='shipper_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='shipper_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Shipping Line/Carrier</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($carrier) - 1 ; $x++){
											if($carrier[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='carrier_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='carrier_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Hauler/Trucker</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($hauler) - 1 ; $x++){
											if($hauler[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='hauler_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='hauler_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Commodity</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($commodity) - 1 ; $x++){
											if($commodity[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='commodity_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='commodity_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
								$output.='</tr>

       							<tr>
       								<td>Legend</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($legend) - 1 ; $x++){
											if($legend[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='legend_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='legend_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}

								$output.='</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right site_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

			echo $output;
       }		

       function global_admin_access($role){
       		$global = $this->UserAccess->get_global($role);
       		$search;

       		if($global == NULL){
       			$search = 0;
       		}
       		else{
       			foreach ($global as $row) {

       				if(trim($row->SystemSubModuleId) == "13"){
       					$search = $row->AccessTypesId;
       				}
       			}

       		}

       		
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Global Search</b></td>
       								<td></td>
       								<td></td>
       								<td>
										 <input type="checkbox" value="4" class="global_access" '.($search == 4 ? 'checked' : '').'>
       								</td>
       								<td></td>
       							</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right global_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

			echo $output;
       }

       function reports_access($role){
       	$reports = $this->UserAccess->get_reports($role);
       		$report;
       		$seaManila;
       		$seaOutport;
       		$airFreight;

       		if($reports == NULL){
       			$report = 0;
	       		$seaManila = 0;
	       		$seaOutport = 0;
	       		$airFreight = 0;
       		}
       		else{
       			foreach ($reports as $row) {
       				if(trim($row->SystemSubModuleId) == "14"){
       					$report = $row->AccessTypesId;
       				}
       				if(trim($row->SystemSubModuleId) == "15"){
       					$seaManila = $row->AccessTypesId;
       					$seaManila = explode(',',$seaManila);
       				}
       				if(trim($row->SystemSubModuleId) == "16"){
       					$seaOutport = $row->AccessTypesId;
       					$seaOutport = explode(',',$seaOutport);
       				}
       				if(trim($row->SystemSubModuleId) == "17"){
       					$airFreight = $row->AccessTypesId;
       					$airFreight = explode(',',$airFreight);
       				}
       			}
       		}
       		
       		$subOutput = '';
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Reports</b></td>
       								<td></td>
       								<td></td>
       								<td>
       									
										 <input type="checkbox" value="4" class="reports_access access_checkall" '.($report == 4 ? 'checked' : '').'>
										
       								</td>
       								<td></td>
       							</tr>
       							<tr>
       								<td>Sea Freight Manila</td>
       								';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($seaManila) - 1 ; $x++){
											if($seaManila[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='rep_mnila_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if(($y == 1) || ($y == 2)){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='rep_mnila_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
       							$output.='</tr>

       							<tr>
       								<td>Sea Freight Outport</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($seaOutport) - 1 ; $x++){
											if($seaOutport[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='rep_outport_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if(($y == 1) || ($y == 2)){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='rep_outport_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}

       						$output.='</tr>

       							<tr>
       								<td>Air Freight</td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($airFreight) - 1 ; $x++){
											if($airFreight[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='rep_air_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if(($y == 1) || ($y == 2)){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='rep_air_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
       						$output.='</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right report_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

       		echo $output;
       }
       function audit_admin_access($role){
       		$audit = $this->UserAccess->get_audit($role);
       		$trail;

       		if($audit == NULL){
       			$trail = 0;
       		}
       		else{
       			foreach ($audit as $row) {

       				if(trim($row->SystemSubModuleId) == "18"){
       					$trail = $row->AccessTypesId;
       				}
       			}
       		}

       		
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Audit Trail</b></td>
       								<td></td>
       								<td></td>
       								<td>
										 <input type="checkbox" value="4"  class="audit_access" '.($trail == 4 ? 'checked' : '').'>
       								</td>
       								<td></td>
       							</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right audit_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

			echo $output;
       }
        function dashboard_admin_access($role){
       		$dash = $this->UserAccess->get_board($role);
       		$board;

       		if($dash == NULL){
       			$board = 0;
       		}

       		else{
       			foreach ($dash as $row) {
       				if(trim($row->SystemSubModuleId) == "19"){
       					$board = $row->AccessTypesId;
       				}
       			}
       		}
       		
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>Dashboard</b></td>
       								<td></td>
       								<td></td>
       								<td>
										 <input type="checkbox" value="4"  class="dash_access" '.($board == 4 ? 'checked' : '').'>
       								</td>
       								<td></td>
       							</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right dash_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

			echo $output;
       }

        function user_admin_access($role){
       		$user = $this->UserAccess->get_user($role);
       		$access_user;

       		if($user == NULL){
       			$access_user =0;
       		}
       		else{
       			foreach ($user as $row) {
       				if(trim($row->SystemSubModuleId) == "20"){
       					$access_user = $row->AccessTypesId;
       					$access_user = explode(',',$access_user);
       				}
       			}
       		}

       		
       		$output = '';
       		
       		$output .='
       				<div style="width:100%;">
       					<table class="table table-condensed table-bordered">
       						<thead>
       							<tr>
       								<th></th>
       								<th>Create</th>
       								<th>Modify</th>
       								<th>View</th>
       								<th>Print</th>
       							</tr>
       						</thead>
       						<tbody>
       							<tr>
       								<td><b>User</b></td>';
       								for($y = 1 ; $y <= 5 ; $y++){
										for($x = 0 ; $x <= count($access_user) - 1 ; $x++){
											if($access_user[$x] == $y){
												$subOutput = "<td> <input type='checkbox' class='user_access' value='".$y."' checked/></td>";
											break;
											}else if($y == 3){
												$subOutput = '';
											}else if($y == 5){
												$subOutput = '<td></td>';
											}
											else{
												$subOutput = "<td> <input type='checkbox' class='user_access' value='".$y."'/> </td>";
											}	
										}
											$output .= $subOutput;
										}
       						$output.='</tr>
       						</tbody>
       					</table>
       					<div style="width:100%">
		               		<a class="btn btn-primary btn-sm col-md-2 pull-right user_accessRole"><span class="fa fa-floppy-o fa-fw"></span> Save</a>	
		               	</div>
       				</div>';

			echo $output;
       }


}
?>
