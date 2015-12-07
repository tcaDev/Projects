<?php

Class Jobdata extends CI_Model

{

	//getting vessel data base on shipperid
	function get_vessel($id){

	$query = $this->db->query("Select ShipperVesselId,Vesselname from ShipperVessel
	where ShipperId=$id  ");
	return $query->result();

	}


}


?>