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
    $this -> db -> from('vw_Products');
    $this -> db ->where('JobFileNo', $products);
    $query=$this->db->get();
    return $query->result();
 }

 function get_goods_air($products){
    $this->  db ->select('*');
    $this -> db -> from('vw_ProductsAir');
    $this -> db ->where('JobFile_AirId', $products);
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
 function get_status($id){
    $this->  db ->select('*');
    $this -> db -> from('vw_StatusReports');
    $this -> db ->where('JobFileNo', $id);
    $query=$this->db->get();
    return $query->result(); 
 }

 function get_status_air($id){
    $this->  db ->select('*');
    $this -> db -> from('vw_StatusReportsAir');
    $this -> db ->where('JobFileNo', $id);
    $query=$this->db->get();
    return $query->result(); 
 }

  function select_jobfile($job){
    $this->  db ->select('JobFileId');
    $this -> db -> from('JobFile');
    $this -> db ->where('JobFileNo', $job);
    $query=$this->db->get();
    return $query->result();
 }
   function select_jobfile_air($job){
    $this->  db ->select('JobFile_AirId');
    $this -> db -> from('JobFile_Air');
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

 function select_productcontainer_manila($cont){
        $query = $this->db->query("Select ContainerByCarrierId from ContainerByCarrier
    where ContainerNo='$cont'  ORDER BY ContainerByCarrierId desc limit 1");
    return $query->result();
 }


 

function comodity($comodity){
  $this->db->insert('ProductsByContainer',$comodity); 
     $insert_id = $this->db->insert_id();
     return  $insert_id;
}

function get_vessel_container($vessel_container,$vessel){
     $query = $this->db->query("Select VesselVoyageNo,CarrierByJobFileId from vw_CarrierByJobFile
            where JobFileNo='$vessel_container' and VesselVoyageNo !='$vessel' ");
    return $query->result();
}

function get_container_product($container_product){
     $query = $this->db->query("Select ContainerNo,ContainerByCarrierId from vw_Containers
            where JobFileNo='$container_product' ");
    return $query->result();
}

function get_countryID_manila($jobfile){
    $query = $this->db->query("Select Origin_CountryId,OriginCity from JobFile where JobFileNo ='$jobfile'");
    return $query->result();
  }

  function get_countryID_air($jobfile){
    $query = $this->db->query("Select Origin_CountryId,OriginCity from JobFile_Air where JobFileNo ='$jobfile'");
    return $query->result();
  }

 function all_goods(){
    $this->  db ->select('*');
    $this -> db -> from('vw_Products');
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