<?php

Class Jobdata extends CI_Model

{

	//getting vessel data base on shipperid
	function get_shippingline($id){

	$query = $this->db->query("Select CarrierId,Carriername from Carrier
	where CarrierId=$id  ");
	return $query->result();

	}

	//get the last inserted id
function getLastInserted($table, $id) {
	$this->db->select_max($id);
	$Q = $this->db->get($table);
	$row = $Q->row_array();
	return $row[$id];
 }


 function get_goods($products){
    $this->  db ->select('*');
    $this -> db -> from('Products');
    $this -> db ->where('ContainerByVesselId', $products);
    $query=$this->db->get();
    return $query->result();
 }

 function get_containers($id){
 	$this->  db ->select('*');
    $this -> db -> from('ContainerByVessel');
    $this -> db ->where('VesselByJobFileId', $id);
    $query=$this->db->get();
    return $query->result();
 }



}


?>