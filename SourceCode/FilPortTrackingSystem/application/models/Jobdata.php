<?php

Class Jobdata extends CI_Model

{

	//getting vessel data base on shipperid
	function get_vessel($id){

	$query = $this->db->query("Select ShipperVesselId,Vesselname from ShipperVessel
	where ShipperId=$id  ");
	return $query->result();

	}
 function get_legend_description($color){
   $query = $this->db->query("select Description from Status WHERE StatusName='$color' LIMIT 1");
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

function get_chargess_air($charges){
    $this->  db ->select('*');
    $this -> db -> from('RunningCharges_Air');
    $this -> db ->where('JobFile_AirId', $charges);
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

  function compare_products($jobfile,$finals){
    $query = $this->db->query("select * from Products where
       ProductName not in ('Kopiko Blanca Hanger 24x10x30G') ");
/*      if($query->num_rows() ==0){
            $query = $this->db->query("Select * from Products");
      } */
    return $query->result(); 
 }

 function getJobFiles_Consignee($consigneeName){
    $query = $this->db->query("select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%'");
    return $query->result();
 }

 function mon_type($mon){
      $query = $this->db->query("select `JobFileNo`,`MonitoringTypeId`,(select MonitoringTypeName from MonitoringType as m 
        where `m`.`MonitoringTypeId` = `jf`.`MonitoringTypeId`) as MonitoringTypeName from JobFile as jf where  `JobFileNo`='$mon' ");
    return $query->result();
 }

 function update_data($mon){
    $query = $this->db->query("select * from vw_JobFile where MonitoringTypeId='$mon' ORDER BY JobFileId desc limit 10 ");
    return $query->result();
 }



}


?>