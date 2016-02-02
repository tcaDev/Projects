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


 function getAccessType($uID,$roleID , $consigneeID){
    if($consigneeID == 0){
      $query = $this->db->query("SELECT c.UserName, a.RoleName AS My_RoleName FROM Role AS a , User as c WHERE c.RoleId = a.RoleId AND c.UserId = '$uID'");
      $q = "SELECT c.UserName, a.RoleName FROM Role AS a , User as c WHERE c.RoleId = a.RoleId AND c.UserId = '$uID'";
    }else{
      $query = $this->db->query("SELECT c.UserName, a.RoleName , b.ConsigneeName, CONCAT(a.RoleName, ' - ',b.ConsigneeName) AS My_RoleName FROM Role AS a , Consignee AS b , User as c WHERE c.RoleId = a.RoleId AND c.ConsigneeId = b.ConsigneeId AND c.UserId = '$uID'");
      $q = "SELECT c.UserName, a.RoleName , b.ConsigneeName, CONCAT(a.RoleName, ' - ',b.ConsigneeName) AS My_RoleName FROM Role AS a , Consignee AS b , User as c WHERE c.RoleId = a.RoleId AND c.ConsigneeId = b.ConsigneeId AND c.UserId = '$uID'";
    }
    return $query->result();
 }



  function question(){
   $this -> db -> select('SecretQuestion,SecretQuestionId');
   $this -> db -> from('SecretQuestion');
   $query = $this -> db -> get();
   return $query->result();
  }

 function search_global($search,$search_Type,$search_from){
   $this -> db -> select('*');
   $this -> db -> from($search_from);
   $this -> db -> like($search_Type, $search);
   /*$this->db->limit(10);*/
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
    function update_vessel($id,$name,$address_carrier,$number_carrier,$status){
        $status =  (int) $status;
        $data = array(
        'CarrierName'    => $name,
        'Address' => $address_carrier,
        'OfficeNo' => $number_carrier,
        'IsActive'      => $status

        );
          $this->db->where('CarrierId', $id);
          $this->db->update('Carrier', $data);
  }

     /* function update_shipper($id,$name,$fname,$mname,$lname,$c1,$c2){
      */
       function update_shipper($id,$name,$hbno,$vilage,$city,$country,$status){
         $status =  (int) $status;
        $data = array(
        'ShipperName'               => $name,
        'DateAdded'                 => date('Y-m-d'),
        'HouseBuildingNoStreet'     => $hbno,
        'BarangarOrVillage'         => $vilage,
        'TownOrCityProvince'        => $city,
        'CountryId'                 => $country,
        'IsActive'                  => $status
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

    function update_products($id,$name,$status){
        $data = array(
        'ProductName'    => $name,
        'IsActive'       => $status

        );
          $this->db->where('ProductId', $id);
          $this->db->update('Products', $data);
    
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
    $this->db->where('IsActive', 1);
    $query=$this->db->get();
    return $query->result();
  }
   function dropdown_broker(){
    $this->db->select('BrokerId,FirstName,MiddleName,LastName');
    $this ->db -> from('Broker');
    $this->db->where('IsActive', 1);
    $this ->db->order_by('FirstName');
    $query=$this->db->get();
    return $query->result();
  }
     function dropdown_colors(){
    $this->db->select('StatusId,StatusName,ColorCode,IsActive,IsBackground');
    $this ->db -> from('Status');
    $this->db->where('IsActive', 1);
    $query=$this->db->get();
    return $query->result();
  }
       function dropdown_hauler(){
    $this->db->select('*');
    $this ->db -> from('HaulerOrTruck');
    $this->db->where('IsActive', 1);
    $query=$this->db->get();
    return $query->result();
  }
 /*function dropdown_container(){
    $this->db->select('*');
    $this ->db -> from('Container');
    $query=$this->db->get();
    return $query->result();
  }*/

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
  /*  $this -> db -> from('ShipperVessel');*/
    $this -> db -> from('Carrier');
    $this ->db->order_by('CarrierName');
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
    function vessel_shipper($id){

    $this->  db ->select('Vesselname,VesselNo');
    $this -> db -> from('ShipperVessel');
    $this -> db ->where('ShipperId', $id);
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
   MiddleName LIKE '%$search_broker%' or LastName LIKE '%$search_broker%'   order by FirstName AND MiddleName AND LastName  ");
   return $query->result();
  }
    function search_shipper($search_shipper){
   $query = $this->db->query("select * from vw_shipper_full_info WHERE ShipperName LIKE '%$search_shipper%' order by ShipperId  ");
   return $query->result();
  }
      function search_vessel($search_vessel){
   $query = $this->db->query("select * from Carrier WHERE CarrierName LIKE '%$search_vessel%' order by CarrierId  ");
   return $query->result();
  }
     function search_hauler($search_hauler){
   $query = $this->db->query("select * from HaulerOrTruck WHERE HaulerOrTruckId LIKE '%$search_hauler%' order by HaulerOrTruckId  ");
   return $query->result();
  }

   function search_product($search_product){
   $query = $this->db->query("select * from Products WHERE ProductId LIKE '%$search_product%' order by ProductId  ");
   return $query->result();
  }
/*     function search_forward($search_forward){
   $query = $this->db->query("select * from ForwarderWarehouse WHERE ForwarderWarehouseName LIKE '%$search_forward%' order by ForwarderWarehouseId  ");
   return $query->result();
  }*/
    function search_legend($search_status){
   $query = $this->db->query("select * from Status WHERE StatusName LIKE '%$search_status%' order by StatusId  ");
   return $query->result();
  }
    function search_container($search_container){
   $query = $this->db->query("select * from Container WHERE ContainerNo LIKE '%$search_container%' order by ContainerId  ");
   return $query->result();
  }


  //for searching end

//for pagimation start
 function findlimit($page_position,$item_per_page)
  {
   return $this->db->get('vw_consignee_full_info',$page_position, $item_per_page)->result();
   $query = $this->db->query("select * from vw_consignee_full_info order by ConsigneeName ",$page_position, $item_per_page);
  }
   function findlimit_broker($page_position,$item_per_page)
  {
   return $this->db->get('vw_broker_full_info',$page_position, $item_per_page)->result();
   $query = $this->db->query("select * from vw_broker_full_info order by FirstName ",$page_position, $item_per_page);
  }
  function findlimit_shipper($page_position,$item_per_page)
  {
   return $this->db->get('vw_shipper_full_info',$page_position, $item_per_page)->result();
       $query = $this->db->query("select * from vw_shipper_full_info order by ShipperName ",$page_position, $item_per_page);
  }
    function findlimit_vessel($page_position,$item_per_page)
  {
   return $this->db->get('Carrier',$page_position, $item_per_page)->result();
  }
  function findlimit_hauler($page_position,$item_per_page)
  {
   return $this->db->get('HaulerOrTruck',$page_position, $item_per_page)->result();
  }
  function findlimit_product($page_position,$item_per_page)
  {
   return $this->db->get('Products',$page_position, $item_per_page)->result();
  }
  function findlimit_forward($page_position,$item_per_page)
  {
   return $this->db->get('ForwarderWarehouse',$page_position, $item_per_page)->result();
  }
   function findlimit_legend($page_position,$item_per_page)
  {
   return $this->db->get('Status',$page_position, $item_per_page)->result();
  }
   function findlimit_container($page_position,$item_per_page)
  {
   return $this->db->get('Container',$page_position, $item_per_page)->result();
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

   function color_selectivity(){
     $query = $this->db->query("select * from ColorSelectivity   ");
   return $query->result();

  }

  function carrierbyjobfile($jobfile){
     $query = $this->db->query("select * from CarrierByJobFile where JobFileId = '$jobfile' ");
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
   $query = $this->db->query("select * from Status where IsActive=1 ");
    return $query->result();
  }

  

//////////////////////////////
// FOR REPORT PAGE
//////////////////////////////  
  function get_consignee(){
    $query = $this->db->query("select * from vw_consignee_full_info order by ConsigneeName asc");
    return $query->result();
  }

  function get_broker(){
    $query = $this->db->query("select * from vw_broker_full_info order by FirstName asc");
    return $query->result();
  }

  function get_shipper(){
    $query = $this->db->query("select * from vw_shipper_full_info order by ShipperName asc");
    return $query->result();
  }

  /*function get_vessel(){
    $query = $this->db->query("select * from vw_shipper_vessel order by ShipperName asc");
    return $query->result();
  }
*/


function get_carrier(){
    $query = $this->db->query("select * from Carrier where IsActive");
    return $query->result();
  }


function get_products(){
    $query = $this->db->query("select * from Products where IsActive ORDER BY ProductName ASC");
    return $query->result();
  }

function get_jobfile_manila(){
    $query = $this->db->query("select * from vw_JobFile where MonitoringTypeId='1'  ORDER BY JobFileId desc ");
    return $query->result();
  }

function get_jobfile_outport(){
    $query = $this->db->query("select * from vw_JobFile where MonitoringTypeId='2'  ORDER BY JobFileId desc ");
    return $query->result();
  }

  function get_jobfile_air(){
    $query = $this->db->query("select * from vw_JobFileAir  ORDER BY JobFile_AirId desc");
    return $query->result();
  }

  function get_jobfile_manila_global(){
    $query = $this->db->query("select * from vw_JobFile");
    return $query->result();
  }

 function update_hauler($id,$name,$add,$tin,$status){
   $status =  (int) $status;
         $data = array(
                'HaulerOrTruck' => $name,
                'Address' => $add,
                'TIN' => $tin,
                'IsActive'   => $status
                );

          $this->db->where('HaulerOrTruckId', $id);
          $this->db->update('HaulerOrTruck', $data); 
  }
/*   function update_forward($id,$name,$status){
       $status =  (int) $status;
         $data = array(
                'ForwarderWarehouseName' => $name,
                'IsActive'               => $status
                );

          $this->db->where('ForwarderWarehouseId', $id);
          $this->db->update('ForwarderWarehouse', $data); 
  }*/
  function update_legend($legend_id,$legend_status,$description,$legend_color,$status,$back_ground){
           $status =  (int) $status;
         $data = array(
                'StatusName' => $legend_status,
                'Description'=> $description,
                'ColorCode'  => $legend_color,
                'IsActive'   => $status,
                'IsBackground' => $back_ground
                );

          $this->db->where('StatusId', $legend_id);
          $this->db->update('Status', $data); 
  }
    function update_container($container_id,$con,$con_descrip,$con_size){
         $data = array(
                'ContainerNo' => $con,
                'ContainerDescription'=> $con_descrip,
                'ContainerSize'  => $con_size
                );

          $this->db->where('ContainerId', $container_id);
          $this->db->update('Container', $data); 
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


    function search_manila($montype,$jobfile){
    $query = $this->db->query("Select * from vw_JobFile where MonitoringTypeId='$montype' and JobFileNo like '%$jobfile%' ");
    return $query->result();
    }

    function search_air($jobfile){
    $query = $this->db->query("Select * from vw_JobFileAir where  JobFileNo like '%$jobfile%' order by  JobFile_AirId desc ");
    return $query->result();
    }


    function get_role($uID){
     $query = $this->db->query("Select RoleId from User WHERE UserId = '$uID'");
     return $query->row();
    }





    //pagination in jobfile
      //for searching  start
/*  function paginate_manila($montype){
   
  
   $query = $this->db->query("SELECT * FROM vw_JobFile where MonitoringTypeId=$montype order by JobFileId desc");
   return $query->result();
  }*/

  function findlimit_manila($page_position,$item_per_page)
  {
    $this->db->select('*');
    $this->db->from('vw_JobFile');
    $this->db->where('MonitoringTypeId',1);
    $this->db->limit($page_position,$item_per_page); 
    $query = $this->db->get();
      return $query->result();
  /* return $this->db->get('vw_JobFile',$page_position, $item_per_page)->result();*/
  /* $query = $this->db->query("select * from vw_JobFile order by JobFileId desc ",$page_position, $item_per_page);*/
  }

  function findlimit_search($page_position,$item_per_page,$jobfile,$montype){
    $this->db->select('*');
    $this->db->from('vw_JobFile');
    $this->db->where('MonitoringTypeId',$montype);
    $this->db->like('JobFileNo',$jobfile);
    $this->db->limit($page_position,$item_per_page); 
    $query = $this->db->get();
      return $query->result();
  }

  function findlimit_outport($page_position,$item_per_page)
  {
    $this->db->select('*');
    $this->db->from('vw_JobFile');
    $this->db->where('MonitoringTypeId',2);
    $this->db->limit($page_position,$item_per_page); 
    $query = $this->db->get();
      return $query->result();
  /* return $this->db->get('vw_JobFile',$page_position, $item_per_page)->result();*/
  /* $query = $this->db->query("select * from vw_JobFile order by JobFileId desc ",$page_position, $item_per_page);*/
  }

  function findlimit_air($page_position,$item_per_page)
  {
    $this->db->select('*');
    $this->db->from('vw_JobFileAir');
    $this->db->limit($page_position,$item_per_page); 
    $query = $this->db->get();
      return $query->result();
  /* return $this->db->get('vw_JobFile',$page_position, $item_per_page)->result();*/
  /* $query = $this->db->query("select * from vw_JobFile order by JobFileId desc ",$page_position, $item_per_page);*/
  }

    function findlimit_search_air($page_position,$item_per_page,$jobfile){
    $this->db->select('*');
    $this->db->from('vw_JobFileAir');
    $this->db->like('JobFileNo',$jobfile);
    $this->db->limit($page_position,$item_per_page); 
    $query = $this->db->get();
      return $query->result();
  }


}
?>