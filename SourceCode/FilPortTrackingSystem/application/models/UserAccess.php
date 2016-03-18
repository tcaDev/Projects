<?php

Class UserAccess extends CI_Model

{
	function get_jbfl($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (1,2,3,4) AND R.RoleId = '$role'");
   	 	return $query->result();
	}

	function get_sitesettings($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (5,6,7,8,9,10,11,12) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}

	function get_global($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (13) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}

	function get_reports($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (14,15,16,17) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}

	function get_audit($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (18) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}
	function get_board($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (19) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}
	function get_user($role){
	 	$query = $this->db->query(" select R.*, S.SystemSubModuleName 
									from RoleAccess R
									JOIN SystemSubModule S ON S.SystemSubModuleId = R.SystemSubModuleId 
									where R.SystemSubModuleId IN (20) AND R.RoleId = '$role' ");
   	 	return $query->result();
	}

	function get_desc($role){
		$query = $this->db->query(" select * from Role where RoleId = '$role' limit 1");
   	 	return $query->result();
	}

	/*Insert New ROle*/

	function roleCreate($RoleName,$RoleDesc){

           $data = array(
              'RoleName'    => $RoleName,
              'RoleDescription'  => $RoleDesc
           );

         $this->db->insert('Role',$data);
	}


	function Role($role){
         $query = $this->db->query(" select * from Role where RoleId = '$role'");
         return $query->result();
	}

	function RolesJobFile($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '1'");
   	 	return $query->row();
	}

	function RolesSite($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '5'");
   	 	return $query->row();
	}

	function RolesGlobal($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '13'");
   	 	return $query->row();
	}

	function RolesDash($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '19'");
   	 	return $query->row();
	}

	function RolesReport($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '14'");
   	 	return $query->row();
	}

	function RolesAudit($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '18'");
   	 	return $query->row();
	}

	function RolesUser($roleId){
		$query = $this->db->query(" select * from RoleAccess where RoleId = '$roleId' AND SystemSubModuleId = '20'");
   	 	return $query->row();
	}

}

?>