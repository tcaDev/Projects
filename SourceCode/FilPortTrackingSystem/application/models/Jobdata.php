<?php

Class Jobdata extends CI_Model

{

	//getting vessel data base on shipperid
	function get_vessel($id){

	$query = $this->db->query("Select ShipperVesselId,Vesselname from ShipperVessel
	where ShipperId=$id  ");
	return $query->result();

	}

	//get the last inserted id
function getLastInserted($table, $id) {
	$this->db->select_max($id);
	$Q = $this->db->get($table);
	$row = $Q->row_array();
	return $row[$id];
 }

function get_chargess($charges){
    $this->  db ->select('*');
    $this -> db -> from('vw_RunningCharges');
    $this -> db ->where('JobFileNo', $charges);
    $query=$this->db->get();
    return $query->result();
}
function get_vessels($JobFile){
    $this->  db ->select('*');
    $this -> db -> from('vw_CarrierByJobFile');
    $this -> db ->where('JobFileNo', $JobFile);
    $query=$this->db->get();
    return $query->result();
}
 function get_goods($products){
    $this->  db ->select('*');
    $this -> db -> from('vw_Products');
    $this -> db ->where('JobFileNo', $products);
    $query=$this->db->get();
    return $query->result();
 }

 function get_containers($id){
 	$this->  db ->select('*');
    $this -> db -> from('vw_Containers');
    $this -> db ->where('JobFileNo', $id);
    $query=$this->db->get();
    return $query->result();
 }
 function get_charges($id){
 	$this->  db ->select('*');
    $this -> db -> from('RunningCharges');
    $this -> db ->where('JobFileId', $id);
    $query=$this->db->get();
    return $query->result();
 }

  function select_jobfile($job){
 	$this->  db ->select('*');
    $this -> db -> from('JobFile');
    $this -> db ->where('JobFileNo', $job);
    $query=$this->db->get();
    return $query->result();
 }
 function select_carrier($vessel){
    $query = $this->db->query("Select CarrierByJobFileId from CarrierByJobFile
    where VesselVoyageNo='$vessel'  ORDER BY CarrierByJobFileId desc limit 1");
    return $query->result();
 }
  function select_productcontainer($cont){
    $query = $this->db->query("Select ContainerByCarrierId from ContainerByCarrier
    where ContainerNo='$cont'  ORDER BY ContainerByCarrierId desc limit 1");
    return $query->result();
 }

 

function comodity($comodity){
  $this->db->insert('ProductsByContainer',$comodity); 
     $insert_id = $this->db->insert_id();
     return  $insert_id;
}

function get_vessel_container($vessel_container){
     $query = $this->db->query("Select VesselVoyageNo from vw_CarrierByJobFile
            where JobFileNo='$vessel_container' ");
    return $query->result();
}



}


?>