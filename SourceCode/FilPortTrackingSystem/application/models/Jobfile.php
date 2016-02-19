<?php

Class Jobfile extends CI_Model

{

	//getting vessel data base on shipperid
	function get_vessel($id){

	$query = $this->db->query("Select ShipperVesselId,Vesselname from ShipperVessel
	where ShipperId=$id  ");
	return $query->result();

	}

	function get_settings_consignee(){
 	 $query = $this->db->query("select C.*, CT.CountryName 
							 from Consignee C
							 JOIN Countries CT ON CT.CountryId = C.CountryId");
   	 return $query->result();
	}

	function get_settings_broker(){
 	 $query = $this->db->query("select B.*, CONCAT(B.FirstName,' ',B.MiddleName,' ',B.LastName) as FullName ,CT.CountryName 
								from Broker B
								JOIN Countries CT ON CT.CountryId = B.CountryId");
   	 return $query->result();
	}

	function get_settings_shipper(){
 	 $query = $this->db->query("select S.*, CT.CountryName 
								from Shipper S
								JOIN Countries CT ON CT.CountryId = S.CountryId");
   	 return $query->result();
	}

	function get_settings_shipping(){
 	 $query = $this->db->query("select * from Carrier");
   	 return $query->result();
	}

	function get_settings_hauler(){
 	 $query = $this->db->query("select * from HaulerOrTruck");
   	 return $query->result();
	}

	function get_settings_commodity(){
 	 $query = $this->db->query("select * from Products");
   	 return $query->result();
	}

	function get_settings_legend(){
 	 $query = $this->db->query("select * from Status");
   	 return $query->result();
	}
	
	/*History*/
	function get_settings_consignee_history($settings_ids){
 	 $query = $this->db->query("select C.*, CT.CountryName , CONCAT(U.FirstName,' ', U.MiddleName,' ',U.LastName) as FullName 
								from ConsigneeHistory C
								JOIN Countries CT ON CT.CountryId = C.CountryId
								JOIN User U ON U.UserId = C.UpdatedBy_UserId
								Where C.ConsigneeId = '$settings_ids'
								ORDER BY DateUpdated desc");
   	 return $query->result();
	}

	function get_contacts($settings_ids){
		$query = $this->db->query("select *, CONCAT(FirstName,' ',MiddleName,' ',LastName) as FullName from ConsigneeContacts where ConsigneeId = '$settings_ids' ");
   	 return $query->result();
	}

	function get_contacts_history($settings_ids){
		$query = $this->db->query("select CH.*, CONCAT(CH.FirstName,' ',CH.MiddleName,' ',CH.LastName) as FullName , CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy 
									from ConsigneeContactsHistory CH
									JOIN User U ON U.UserId = CH.UpdatedBy_UserId
									where ConsigneeContactId = '$settings_ids' ORDER BY DateUpdated desc ");
   	 return $query->result();
	}

	function get_settings_broker_history($settings_ids){
			$query = $this->db->query(" select 
										B.*,
										Concat(B.FirstName,' ',B.MiddleName,' ',B.LastName) as Broker, 
										C.CountryName , 
										Concat(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy 
										from BrokerHistory B
										JOIN Countries C ON C.CountryId = B.CountryId
										JOIN User U ON U.UserId = B.UpdatedBy_UserId
										where BrokerId = '$settings_ids' 
										ORDER BY DateUpdated desc");
   	        return $query->result();
	}

	function get_settings_shipper_history($settings_ids){
			$query = $this->db->query(" select S.*,
										C.CountryName,
										Concat(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy 
										from ShipperHistory S
										JOIN Countries C ON C.CountryId = S.CountryId
										JOIN User U ON U.UserId = S.UpdatedBy_UserId
										where ShipperId = '$settings_ids' 
										ORDER BY DateUpdated desc");
   	        return $query->result();
	}

	function get_contacts_shipper($settings_ids){
		$query = $this->db->query(" select S.*, CONCAT(S.FirstName,' ',S.MiddleName,' ',S.LastName) as FullName  
									,CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy  
									from ShipperContactsHistory  S
									JOIN User U ON U.UserId = S.UpdatedBy_UserId
									where ShipperContactId = '$settings_ids' 
									ORDER BY DateUpdated desc ");
   	 return $query->result();
	}

	function get_settings_shipping_history($settings_ids){
		$query = $this->db->query(" select C.*, CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy
									from CarrierHistory C
									JOIN User U ON U.UserId = C.UpdatedBy_UserId
									where CarrierId = '$settings_ids'
									ORDER BY DateUpdated desc");
   	 return $query->result();
	}

	function get_settings_hauler_history($settings_ids){
		$query = $this->db->query(" select H.*,CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy 
									from HaulerOrTruckHistory H
									JOIN User U ON U.UserId = H.UpdatedBy_UserId
									where HaulerOrTruckId = '$settings_ids'
									ORDER BY DateUpdated desc");
   	 return $query->result();
	}

	function get_settings_commodity_history($settings_ids){
		$query = $this->db->query(" select P.*, CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy
									from ProductsHistory P
									JOIN User U ON U.UserId = P.UpdatedBy_UserId
									where ProductId = '$settings_ids'
									ORDER BY DateUpdated desc");
   	 return $query->result();
	}

	function get_settings_legend_history($settings_ids){
		$query = $this->db->query(" select S.*, CONCAT(U.FirstName,' ',U.MiddleName,' ',U.LastName) as UpdatedBy
									from StatusHistory S
									JOIN User U ON U.UserId = S.UpdatedBy_UserId
									where StatusId = '$settings_ids'
									ORDER BY DateUpdated desc");
   	 return $query->result();
	}
}


?>