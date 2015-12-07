<?php

Class User extends CI_Model

{

 function login($username, $password)

 {

   $query = $this->db->query("select * from User where Password='$password' 
                                and (UserName='$username' or EmailAddress='$username' ) limit 1 ");

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
   $this ->db->order_by('ConsigneeName');
   $this->db->limit(10);
   $query=$this->db->get();
   return $query->result();
  }


  function update_cosignee($id,$name,$hbno,$vilage,$city,$country,$ofnum,$status){
     $status =  (int) $status;

   /*  $query = $this->db->query('Select * from Countries where CountryName=$country');
     foreach ($query as $row) {
      $country =  $row->CountryId;     
     }*/


        $data = array(
        'ConsigneeName'       => $name,
        'HouseBuildingNoOrStreet' => $hbno,
        'BarangayOrVillage'   =>$vilage,
        'TownOrCityProvince'  =>$city,
        'CountryId'           =>$country,
        'OfficeNumber'        => $ofnum,
        'DateAdded'           => date('Y-m-d'),
        'IsActive'            => $status
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

        function update_broker($id,$broker_fname,$broker_mname,
    $broker_lname,$broker_houseno,$broker_vil,$broker_city,
    $broker_cid,$broker_contact1,$broker_contact2,$status_broker){
        $data = array(
        'FirstName'         => $broker_fname,
        'MiddleName'        => $broker_mname,
        'LastName'          => $broker_lname,
        'ContactNo1'        => $broker_contact1,
        'ContactNo2'        => $broker_contact2,
        'HouseBuildingNoStreet' =>$broker_houseno,
        'BarangarOrVillage' => $broker_vil,
        'TownOrCityProvince'=> $broker_city,
        'CountryId'         => $broker_cid,
        'IsActive'          => $status_broker

        );
          $this->db->where('BrokerId', $id);
          $this->db->update('Broker', $data);
    
  }


  function dropdown_shipper(){
    $this->db->select('ShipperName,ShipperId');
    $this ->db -> from('Shipper');
    $this ->db->order_by('ShipperName');
    $query=$this->db->get();
    return $query->result();
  }

  //for settings datas start
  function settings_consignee(){
    $this->db->select('*');
    $this ->db -> from('Consignee');
    $this ->db->order_by('ConsigneeName');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }

    function settings_broker(){
    $this->db->select('*');
    $this -> db -> from('Broker');
    $this ->db->order_by('FirstName');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_vessel(){
    $this->db->select('*');
    $this -> db -> from('ShipperVessel');
    $this ->db->order_by('Vesselname');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_shipper(){
    $this->db->select('*');
    $this ->db-> from('Shipper');
    $this ->db->order_by('ShipperName');
    $this->db->limit(10);
    $query=$this->db->get();
    return $query->result();
  }
    function settings_shipper_con(){
    $this->db->select('*');
    $this -> db -> from('ShipperContacts');
     $this ->db->order_by('FirstName');
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
              $this ->db->order_by('ShipperId');
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
   
  
   $query = $this->db->query("select * from vw_consignee_full_info WHERE ConsigneeName LIKE '%$search%'  or HouseBuildingNoOrStreet like '%$search%'   
    or BarangayOrVillage like  '%$search%' or TownOrCityProvince  like  '%$search%'  or Country like '%$search%' 
    or OfficeNumber like '%$search%'  order by ConsigneeName  ");
   return $query->result();
  }
  function search_broker($search_broker){
   $query = $this->db->query("select * from vw_broker_full_info WHERE FirstName LIKE '%$search_broker%' or 
   MiddleName LIKE '%$search_broker%' or LastName LIKE '%$search_broker%'   order by FirstName  ");
   return $query->result();
  }
    function search_shipper($search_shipper){
   $query = $this->db->query("select * from Shipper WHERE ShipperName LIKE '%$search_shipper%' order by ShipperName  ");
   return $query->result();
  }
      function search_vessel($search_vessel){
   $query = $this->db->query("select * from ShipperVessel WHERE Vesselname LIKE '%$search_vessel%' order by Vesselname  ");
   return $query->result();
  }

  //for searching end

//for pagimation start
 function findlimit($page_position,$item_per_page)
  {
   return $this->db->get('vw_consignee_full_info',$page_position, $item_per_page)->result();
  }
   function findlimit_broker($page_position,$item_per_page)
  {
   return $this->db->get('vw_broker_full_info',$page_position, $item_per_page)->result();
  }
  function findlimit_shipper($page_position,$item_per_page)
  {
   return $this->db->get('Shipper',$page_position, $item_per_page)->result();
  }
    function findlimit_vessel($page_position,$item_per_page)
  {
   return $this->db->get('ShipperVessel',$page_position, $item_per_page)->result();
  }

  

//for pagimation end


  function country($id){
     $query = $this->db->query("select * from Countries where CountryId!=$id   ");
   return $query->result();

  }
    function countries(){
     $query = $this->db->query("select * from Countries   ");
   return $query->result();

  }
    
}

?>