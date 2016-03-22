<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Access_update extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('UserAccess');
            $this->load->model('Jobfile');
       }

       function jobfile_update_access(){

       		$jobfile = $this->input->post('jobfile');
       		$mnila_list = $this->input->post('mnila_list');
       		$outport_list = $this->input->post('outport_list');
       		$air_list = $this->input->post('air_list');
       		$role = $this->input->post('role');

       		

       		$data = array(
               array(
               	  'RoleId'            => $role,
               		'SystemSubModuleId' => 1,
               		'AccessTypesId'     => $jobfile
               		),
               array(
               	    'RoleId'            => $role,
               		'SystemSubModuleId' => 2,
               		'AccessTypesId'     => $mnila_list
               		),
               array(
               	  'RoleId'             => $role,
               		'SystemSubModuleId' => 3,
               		'AccessTypesId'     => $outport_list
               		), 
               array(
               	  'RoleId'            => $role,
               		'SystemSubModuleId' => 4,
               		'AccessTypesId'     => $air_list
               		)
            );

          $this->db->where_in('SystemSubModuleId', 1);
       		$this->db->where('RoleId',$role); 
          $result = $this->db->get('RoleAccess');

    			if($result->num_rows() > 0){
    				$this->db->where('RoleId',$role);
    				$this->db->update_batch('RoleAccess',$data,'SystemSubModuleId');
            $this->output->clear_all_cache();
    			}
    			else{
    				$this->db->insert_batch('RoleAccess',$data);
            $this->output->clear_all_cache();
    			}
       }

        function site_update_access(){
        	$site = $this->input->post('site');
        	$consignee = $this->input->post('consignee_list');
        	$broker = $this->input->post('broker_list');
        	$shipper = $this->input->post('shipper_list');
        	$carrier = $this->input->post('carrier_list');
        	$hauler = $this->input->post('hauler_list');
        	$commodity = $this->input->post('commodity_list');
        	$legend = $this->input->post('legend_list');
        	$role = $this->input->post('role');

        	$data = array(
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 5,
               		'AccessTypesId' => $site
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 6,
               		'AccessTypesId' => $consignee
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 7,
               		'AccessTypesId' => $broker
               		), 
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 8,
               		'AccessTypesId' => $shipper
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 9,
               		'AccessTypesId' => $carrier
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 10,
               		'AccessTypesId' => $hauler
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 11,
               		'AccessTypesId' => $commodity
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 12,
               		'AccessTypesId' => $legend
               		)
            );

           $this->db->where_in('SystemSubModuleId', 5);
           $this->db->where('RoleId',$role); 
           $result = $this->db->get('RoleAccess');

        	if($result->num_rows() > 0){
        		$this->db->where('RoleId',$role);
        		$this->db->update_batch('RoleAccess',$data,'SystemSubModuleId');
            $$this->output->clear_all_cache();
        	}
        	else{
        		$this->db->insert_batch('RoleAccess',$data);
            $this->output->clear_all_cache();
        	}
        }

        function global_update_access(){
        	$global = $this->input->post('global_access');
        	$ids = $this->input->post('SystemId');
        	$role = $this->input->post('role');

        	$data = array(
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => $ids,
               		'AccessTypesId' => $global
               		)
            );
             $this->db->where_in('SystemSubModuleId', $ids);
            $this->db->where('RoleId',$role); 
           $result = $this->db->get('RoleAccess');

    			if($result->num_rows() > 0){
    				$this->db->where('RoleId',$role);
    				$this->db->update_batch('RoleAccess',$data,'SystemSubModuleId');
            $this->output->clear_all_cache();
    			}
    			else{
    				$this->db->insert_batch('RoleAccess',$data);
            $this->output->clear_all_cache();
    			}
        }

        function report_update_access(){

       		$report = $this->input->post('report');
       		$mnila_list = $this->input->post('mnila_list');
       		$outport_list = $this->input->post('outport_list');
       		$air_list = $this->input->post('air_list');
       		$role = $this->input->post('role');

       		$data = array(
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 14,
               		'AccessTypesId' => $report
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 15,
               		'AccessTypesId' => $mnila_list
               		),
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 16,
               		'AccessTypesId' => $outport_list
               		), 
               array(
               		'RoleId'            => $role,
               		'SystemSubModuleId' => 17,
               		'AccessTypesId' => $air_list
               		)
            );
           $this->db->where_in('SystemSubModuleId', 14);
       		$this->db->where('RoleId',$role); 
           $result = $this->db->get('RoleAccess');

    			if($result->num_rows() > 0){
    				$this->db->where('RoleId',$role);
    				$this->db->update_batch('RoleAccess',$data,'SystemSubModuleId');
            $this->output->clear_all_cache();
    			}
    			else{
    				$this->db->insert_batch('RoleAccess',$data);
            $this->output->clear_all_cache();
    			}
       }

     
 }
 ?>