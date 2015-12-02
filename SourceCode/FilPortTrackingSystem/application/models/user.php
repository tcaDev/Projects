<?php

Class User extends CI_Model

{

 function login($username, $password)

 {
   $this -> db -> select('UserName,Password,EmailAddress');
   $this -> db -> from('User');
   $this -> db -> where('UserName', $username);
   $this -> db -> where('Password',$password);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   if($query -> num_rows() == 1){
     return $query->result();
   }else{
     return false;
   }
 }


  function question(){
   $this -> db -> select('SecretQuestion,SecretQuestionId');
   $this -> db -> from('SecretQuestion');
   $query = $this -> db -> get();
   return $query->result();
  }

  function search_global($search){
   $this -> db -> select('*');
   $this -> db -> from('search_global');
   $this -> db -> like('JobFileId', $search);
   $this->db->limit(10);
   $query = $this -> db -> get();
   return $query->result();
  }

  function clients(){
   $this -> db -> select('*');
   $this -> db -> from('Consignee');
   $this->db->limit(10);
   $query=$this->db->get();
   return $query->result();
  }


  function update_cosignee($id,$Consignee,$Address,$ofnum,$stat){
     $stat =  (int) $stat; 
        $data = array(
        'ConsigneeName'      => $Consignee,
        'Address'            => $Address,
        'OfficeNumber'       => $ofnum,
        'DateAdded'          => date('Y-m-d'),
        'IsActive'           => $stat
       /* 'DateAdded' => $date*/

        );
          $this->db->where('ConsigneeId', $id);
          $this->db->update('Consignee', $data);
    
      

  }
    function update_vessel($id,$name){
        $data = array(
        'Vesselname'      => $name

        );
          $this->db->where('ShipperVesselId', $id);
          $this->db->update('ShipperVessel', $data);
    
  }

     /* function update_shipper($id,$name,$fname,$mname,$lname,$c1,$c2){
      */
       function update_shipper($id,$name){
      
        $data = array(
        'ShipperName'      => $name,
        'DateAdded'        => date('Y-m-d')
        );
          $this->db->where('ShipperId', $id);
          $this->db->update('Shipper', $data);

/*        $data2 = array(
                'FirstName'        =>$fname,
                'MiddleName'       =>$mname,
                'LastName'         =>$lname,
                'ContactNo1'       =>$c1,
                'ContactNo2'       =>$c2


          );
         $this->db->where('ShipperId', $id);
         $this->db->update('ShipperContacts', $data2);*/

    
  }

    function update_shippercon($id,$fname,$mname,$lname,$c1,$c2){

              $data2 = array(
                'FirstName'        =>$fname,
                'MiddleName'       =>$mname,
                'LastName'         =>$lname,
                'ContactNo1'       =>$c1,
                'ContactNo2'       =>$c2


          );
         $this->db->where('ShipperContactId', $id);
         $this->db->update('ShipperContacts', $data2);
    }

        function update_broker($id,$broker_fname,
          $broker_mname,$broker_lname,$broker_address,
          $broker_contact,$status_broker ){
        $data = array(
        'FirstName'         => $broker_fname,
        'MiddleName'        => $broker_mname,
        'LastName'          => $broker_lname,
        'Address'           => $broker_address,
        'ContactNo'         => $broker_contact,
        'IsActive'          => $status_broker

        );
          $this->db->where('BrokerId', $id);
          $this->db->update('Broker', $data);
    
  }


  function dropdown_shipper(){
    $this->db->select('ShipperName,ShipperId');
    $this ->db -> from('Shipper');
    $query=$this->db->get();
    return $query->result();
  }

  //for settings datas start
  function settings_consignee(){
    $this->db->select('*');
    $this ->db -> from('Consignee');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }

    function settings_broker(){
    $this->db->select('*');
    $this -> db -> from('Broker');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_vessel(){
    $this->db->select('*');
    $this -> db -> from('ShipperVessel');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_shipper(){
    $this->db->select('*');
    $this ->db-> from('Shipper');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_shipper_con(){
    $this->db->select('*');
    $this -> db -> from('ShipperContacts');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    //for settings datas end



    function get_broker_info($id){

    $this ->  db ->select('*');
    $this ->  db -> from('Broker');
    $this ->  db ->where('BrokerId', $id);
    $query=$this ->db->get();
    return $query->result();

    }

    function get_shipper_info($id){

    $this ->  db ->select('*');
    $this ->  db -> from('Shipper');
    $this ->  db ->where('ShipperId', $id);
    $query=$this ->db->get();
    return $query->result();

    }


    function select_shipperid(){
             $this ->db->select('*');
               $this ->db->from('Shipper');
               $this ->db->order_by('ShipperId', 'DESC');
                $this ->db->limit(10);
               $count = $this -> db -> get();
                return $count->result();
    }

  function shippercons($id){

    $this->  db ->select('*');
    $this -> db -> from('ShipperContacts');
    $this -> db ->where('ShipperId', $id);
    $query=$this->db->get();
    return $query->result();
  }


  //for searching  start
  function search_consignee($search){
    if($search=='activated'){ 
      $search=1;
    }
      if($search=='deactivated'){ 
      $search=0;
    }
   $query = $this->db->query("select * from Consignee WHERE ConsigneeName LIKE '%$search%' ");
   return $query->result();
  }
  function search_broker($search_broker){
   $query = $this->db->query("select * from Broker WHERE FirstName LIKE '%$search_broker%' or 
   MiddleName LIKE '%$search_broker%' or LastName LIKE '%$search_broker%' or Address  
   LIKE '%$search_broker%'  ");
   return $query->result();
  }
    function search_shipper($search_shipper){
   $query = $this->db->query("select * from Shipper WHERE ShipperName LIKE '%$search_shipper%'  ");
   return $query->result();
  }
      function search_vessel($search_vessel){
   $query = $this->db->query("select * from ShipperVessel WHERE Vesselname LIKE '%$search_vessel%'  ");
   return $query->result();
  }

  //for searching end



    
}

?>