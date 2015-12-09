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
    function update_vessel($id,$name,$vesno){
        $data = array(
        'Vesselname'      => $name,
        'VesselNo'      => $vesno,

        );
          $this->db->where('ShipperVesselId', $id);
          $this->db->update('ShipperVessel', $data);
    
  }

     /* function update_shipper($id,$name,$fname,$mname,$lname,$c1,$c2){
      */
       function update_shipper($id,$name,$hbno,$vilage,$city,$country){
      
        $data = array(
        'ShipperName'               => $name,
        'DateAdded'                 => date('Y-m-d'),
        'HouseBuildingNoStreet'     => $hbno,
        'BarangarOrVillage'         => $vilage,
        'TownOrCityProvince'        => $city,
        'CountryId'                 => $country
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


// FOR UPDATING CONTACT PERSONS IN SETTINGS START
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
    function update_consigneecon($id,$fname,$mname,$lname,$c1,$c2){

              $data2 = array(
                'FirstName'        =>$fname,
                'MiddleName'       =>$mname,
                'LastName'         =>$lname,
                'ContactNo1'       =>$c1,
                'ContactNo2'       =>$c2


          );
         $this->db->where('ConsigneeContactId', $id);
         $this->db->update('ConsigneeContacts', $data2);
    }
// FOR UPDATING CONTACT PERSONS IN SETTINGS END

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

  function dropdown_consignee(){
    $this->db->select('ConsigneeName,ConsigneeId');
    $this ->db -> from('Consignee');
    $this ->db->order_by('ConsigneeName');
    $query=$this->db->get();
    return $query->result();
  }
   function dropdown_broker(){
    $this->db->select('BrokerId,FirstName,MiddleName,LastName');
    $this ->db -> from('Broker');
    $this ->db->order_by('FirstName');
    $query=$this->db->get();
    return $query->result();
  }
     function dropdown_colors(){
    $this->db->select('StatusId,StatusName,ColorCode');
    $this ->db -> from('Status');
    $query=$this->db->get();
    return $query->result();
  }
       function dropdown_hauler(){
    $this->db->select('*');
    $this ->db -> from('Hauler');
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



//for viewing and editing contacts in settings start
  function shippercons($id){

    $this->  db ->select('*');
    $this -> db -> from('ShipperContacts');
    $this -> db ->where('ShipperId', $id);
    $query=$this->db->get();
    return $query->result();
  }
    function consigneecon($id){

    $this->  db ->select('*');
    $this -> db -> from('ConsigneeContacts');
    $this -> db ->where('ConsigneeId', $id);
    $query=$this->db->get();
    return $query->result();
  }

//for viewing and editing contacts in settings end


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
   $query = $this->db->query("select * from vw_shipper_full_info WHERE ShipperName LIKE '%$search_shipper%' order by ShipperName  ");
   return $query->result();
  }
      function search_vessel($search_vessel){
   $query = $this->db->query("select * from ShipperVessel WHERE Vesselname LIKE '%$search_vessel%' order by Vesselname  ");
   return $query->result();
  }
     function search_hauler($search_hauler){
   $query = $this->db->query("select * from Hauler WHERE HaulerName LIKE '%$search_hauler%' order by HaulerName  ");
   return $query->result();
  }
     function search_forward($search_forward){
   $query = $this->db->query("select * from ForwarderWarehouse WHERE ForwarderWarehouseName LIKE '%$search_forward%' order by ForwarderWarehouseName  ");
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
   return $this->db->get('vw_shipper_full_info',$page_position, $item_per_page)->result();
  }
    function findlimit_vessel($page_position,$item_per_page)
  {
   return $this->db->get('ShipperVessel',$page_position, $item_per_page)->result();
  }
  function findlimit_hauler($page_position,$item_per_page)
  {
   return $this->db->get('Hauler',$page_position, $item_per_page)->result();
  }
  function findlimit_forward($page_position,$item_per_page)
  {
   return $this->db->get('ForwarderWarehouse',$page_position, $item_per_page)->result();
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

  /*
  --------------------------------------------
    Upload Photo
  --------------------------------------------
  */

  function update_photo($id,$imageName){

    $data = array(
                'ProfileImageSource' => $imageName 
                );

          $this->db->where('UserId', $id);
          $this->db->update('User', $data);
  }


  /*
  --------------------------------------
    Update Name
  --------------------------------------
  */

  function updateName($id,$fname,$mname,$lname,$bdate){

      $data = array(
                'FirstName' => $fname,
                'LastName'  => $lname,
                'MiddleName'=> $mname,
                'BirthDate' => $bdate
                );

          $this->db->where('UserId', $id);
          $this->db->update('User', $data);
  }


 /*
  --------------------------------------
    Get all data from User
  --------------------------------------
  */

  function get_updated_data($id){
   $query = $this->db->query("select * from User where UserId='$id' ");

    return $query->result();
  }

   /*
  --------------------------------------
    Get current Password
  --------------------------------------
  */

  function get_current_pass($id){
   
   $query = $this->db->query("select Password from User where UserId='$id' ");
   
    return $query->result();
  }

   /*
  --------------------------------------
    Update Password
  --------------------------------------
  */

  function updatePass($id,$renewpass){

     $data = array(
                'Password' => $renewpass
                );

          $this->db->where('UserId', $id);
          $this->db->update('User', $data); 
  }

  /*
  --------------------------------------
    Get all data from status
  --------------------------------------
  */

  function get_status(){
   $query = $this->db->query("select * from Status ");
    return $query->result();
  }

  

//////////////////////////////
// FOR REPORT PAGE
//////////////////////////////  
  function get_consignee(){
    $query = $this->db->query("select * from vw_consignee_full_info ");
    return $query->result();
  }

  function get_broker(){
    $query = $this->db->query("select * from vw_broker_full_info ");
    return $query->result();
  }

  function get_shipper(){
    $query = $this->db->query("select * from vw_shipper_full_info ");
    return $query->result();
  }

  function get_vessel(){
    $query = $this->db->query("select * from vw_shipper_vessel ");
    return $query->result();
  }


function get_jobfile_manila(){
    $query = $this->db->query("select * from vw_MLAJobFile");
    return $query->result();
  }



 function update_hauler($id,$name){
         $data = array(
                'HaulerName' => $name
                );

          $this->db->where('HaulerId', $id);
          $this->db->update('Hauler', $data); 
  }
   function update_forward($id,$name){
         $data = array(
                'ForwarderWarehouseName' => $name
                );

          $this->db->where('ForwarderWarehouseId', $id);
          $this->db->update('ForwarderWarehouse', $data); 
  }

     /*
  --------------------------------------
    Email Exist
  --------------------------------------
  */

  function email_exists($email){

    $query = "Select FirstName,EmailAddress from User where EmailAddress='$email' limit 1";
    $result = $this->db->query($query);
    $row = $result->row();

    return ($result->num_rows === 1 && $row->EmailAddress) ? $row->FirstName : false;
  }


    /*
      --------------------------------
        Verify Reset Password
      --------------------------------
    */

    function verify_reset_password_code($email , $email_code){

      $query = "Select `FirstName` , `EmailAddress` From `User` Where `EmailAddress` = '{$email}' limit 1";
      $result = $this->db->query($query);
      $row = $result->rows();

      if($result->num_rows === 1){
        return ($email_code == md5($this->config->item('salt') . $row->FirstName)) ? true : false;
      }else{
        return false;
      }

    }
}
?>