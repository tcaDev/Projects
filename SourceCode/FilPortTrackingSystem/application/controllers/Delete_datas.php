<?php

//for deleting purposed

class Delete_datas extends CI_Controller {


 function index(){
 	$id = $this->input->post('id');
 	$this->db->delete('Consignee', array('ConsigneeId' => $id)); 
 }
 function del_vessel(){
 	 $id = $this->input->post('id');
 	$this->db->delete('ShipperVessel', array('ShipperVesselId' => $id)); 
 }
 function del_shipper(){
 	 $id = $this->input->post('id');
 	$this->db->delete('Shipper', array('ShipperId' => $id));
 	$this->db->delete('ShipperContacts', array('ShipperId' => $id));
 }
 function del_shipper_con(){
 	 $id = $this->input->post('id');
 	 $this->db->delete('ShipperContacts', array('ShipperContactId' => $id));
 }
 function del_broker(){
 	 $id = $this->input->post('id');
 	 $this->db->delete('Broker', array('BrokerId' => $id));
 }


}




?>





