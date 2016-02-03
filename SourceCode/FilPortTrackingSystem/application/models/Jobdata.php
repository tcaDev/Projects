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

function get_chargess($charges,$mon_type){
    if($mon_type == 3){
       $query = $this->db->query("select a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU  FROM RunningCharges_Air as a, vw_JobFileAir as b WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$charges'");
    }else{
      $query = $this->db->query("select * FROM vw_RunningCharges WHERE JobFileNo = '$charges'");
    }
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
    $query = $this->db->query("select a.*, b.* FROM vw_JobFileAir as a , vw_ProductsAir as b where a.JobFileNo = '$products' AND a.JobFile_AirId = b.JobFile_AirId");
    return $query->result();
 }

 function get_containers($id,$monType){
    if($monType == 3){
      $query =  $this->db->query("select * FROM vw_JobFileAir WHERE JobFileNo = '$id'");
    }else{
      $query =  $this->db->query("select * FROM vw_Containers WHERE JobFileNo = '$id'");
    }

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

 function report_get_status($id,$monType){
   if($monType == 3){
      $query =  $this->db->query("select * FROM vw_StatusReportsAir WHERE JobFileNo = '$id'");
    }else{
      $query =  $this->db->query("select * FROM vw_StatusReports WHERE JobFileNo = '$id'");
    }
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
 function select_carrier_job($job,$vessel_voyage){
    $query = $this->db->query("Select CarrierByJobFileId from CarrierByJobFile
    where JobFileId='$job' and VesselVoyageNo='$vessel_voyage' limit 1");
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
       ProductName not in ('Kopiko Blanca Hanger 24x10x30G')");
/*      if($query->num_rows() ==0){
            $query = $this->db->query("Select * from Products");
      } */
    return $query->result(); 
 }

 function getJobFiles_Consignee($consigneeName,$monitoringType){

    if($monitoringType == 1 || $monitoringType == 2){
         $query = $this->db->query("select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' AND MonitoringTypeId = '$monitoringType'");
         //$q = "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' AND MonitoringTypeId = '$monitoringType'";
     }else if($monitoringType == 4){
         $query = $this->db->query("SELECT JobFileId, JobFileNo, ConsigneeName, ShipperName, IsBackGround, ColorCode, StatusName from vw_JobFile WHERE ConsigneeName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%'
                                    UNION ALL
                                    select JobFile_AirId AS 'JobFileId', JobFileNo, ConsigneeName, ShipperName, IsBackGround, ColorCode, StatusName from vw_JobFileAir WHERE ConsigneeName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%'");
         //$q = "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%'";
     }else if($monitoringType == 5){
       $query = $this->db->query("select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%'");
      // $q = "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%'";
     }
     else{
         $query = $this->db->query("select * FROM vw_JobFileAir where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%'");
         // $q = "select * FROM vw_JobFileAir where ConsigneeName LIKE '%$consigneeName%'";
    }
    //return $q . " MT : " . $monitoringType;
    //return "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' AND MonitoringTypeId = '$monitoringType'";
    return $query->result();
 }

 function getCarriers_Consignee($consigneeName,$monitoringType,$jbNo){
     if($monitoringType != 3){
         $query = $this->db->query("select b.ActualArrivalTime as ActualArrivalTime, b.VesselVoyageNo As VesselNumber FROM vw_JobFile AS a , CarrierByJobFile AS b WHERE a.ConsigneeName LIKE '%$consigneeName%' AND a.MonitoringTypeId = '$monitoringType' AND b.JobFileId = a.JobFileId AND a.JobFileNo = '$jbNo'");
     }else{
         $query = $this->db->query("select ATA as ActualArrivalTime, AirCraft As VesselNumber FROM vw_JobFileAir WHERE ConsigneeName LIKE '%$consigneeName%' AND JobFileNo = '$jbNo'");
     }
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

function get_user(){
    $query = $this->db->query("select * from User where RoleId = 5 OR RoleId = 2");
    return $query->result();
 }

 function get_manilaAudit($montype){
    $query = $this->db->query("select * from vw_JobFileHistory where MonitoringTypeId ='$montype' ORDER BY JobFileHistoryId desc");
    return $query->result();
 }

 function get_vessel_audit($veselID){
  $query = $this->db->query("select * from vw_CarrierByJobFileHistory where CarrierByJobFileId = '$veselID' ORDER BY CarrierByJobFileHistoryId desc");
    return $query->result();
 }

 function get_jobfile_audit($jobfile){
  $query = $this->db->query("select * from vw_JobFileHistory where JobFileId ='$jobfile' ORDER BY JobFileHistoryId  desc ");
    return $query->result();
 }

 function get_container_audit($containerID){
  $query = $this->db->query("select * from vw_ContainersHistory where ContainerByCarrierId = '$containerID' ORDER BY ContainerByCarrierHistoryId desc");
    return $query->result();
 }

  function get_commodity_audit($commodity){
  $query = $this->db->query("select * from vw_ProductsHistory where ProductsByContainerId = '$commodity' ORDER BY ProductsByContainerHistoryId desc");
    return $query->result();
 }

 function get_charges_audit($jobfile){
  $query = $this->db->query("select * from vw_RunningChargesHistory where JobFileId = '$jobfile' ORDER BY RunningChargesHistoryId desc");
    return $query->result();
 }
 function get_update_container_view($jbfl){
      $query=$this->db->query("SELECT * FROM `vw_Containers` where `JobFileNo`='$jbfl'");
   return $query->result();
 }

 function get_air_audit(){
  $query = $this->db->query("select * from vw_JobFileAir");
    return $query->result();
 }
/*View Commodity in AIr*/
 function get_commodity_air_audit($jobfile){
  $query = $this->db->query("select * from vw_ProductsAir where JobFile_AirId ='$jobfile'");
    return $query->result();
 }
 /*End*/

 /*VIew Running Charges Air*/

 function get_charges_air_audit($jobfile){
  $query = $this->db->query("select * from vw_RunningChargesAirHistory where JobFile_AirId ='$jobfile' ORDER BY RunningCharges_AirHistoryId desc");
    return $query->result();
 }
 /*end*/

/*History AIr Commodity*/
function get_commodity_air_audit_history($commodityID){
  $query = $this->db->query("select * from vw_ProductsAirHistory where Products_AirId ='$commodityID' ORDER BY Products_AirHistoryId desc");
    return $query->result();
}

/*end*/
function get_jobfile_air_audit($jobfile){
  $query = $this->db->query("select * from vw_JobFileAirHistory where JobFile_AirId ='$jobfile' ORDER BY JobFileAirHistoryId desc");
    return $query->result();
}

 function get_consignee_name($uid){
   $query=$this->db->query("SELECT a.ConsigneeName FROM Consignee as a , User as b WHERE UserId = '$uid' AND a.ConsigneeId = b.ConsigneeId");
   return $query->row();
 }

 function select_jobfile_air_charges($jbfl){
      $query=$this->db->query("SELECT * FROM `RunningCharges_Air` where `JobFile_AirId`='$jbfl'");
   return $query->result();

 }
 function select_jobfile_created($jb){
        $query=$this->db->query("SELECT * FROM `JobFile` where `JobFileNo`='$jb'");
   return $query->result();
 }

 /*VIew AUdit Trail*/

 function get_manilaAudit_view($montype){
    $query = $this->db->query("select * from vw_JobFile where MonitoringTypeId ='$montype' ");
    return $query->result();

 }
 function get_vessel_audit_view($jobfile){
    $query = $this->db->query("select * from vw_CarrierByJobFile where JobFileId ='$jobfile' ");
    return $query->result();
 }

  function get_container_audit_view($jobfile){
     $query = $this->db->query("select * from vw_Containers where JobFileId ='$jobfile' ");
    return $query->result();
  }
  function get_commodity_audit_view($jobfile){
     $query = $this->db->query("select * from vw_Products where JobFileId ='$jobfile' ");
    return $query->result();
  }

    function contentJobfileID($jobfile,$montype){
      if($montype == 3){
        $query = $this->db->query("select JobFile_AirId from vw_JobFileAir where JobFileNo ='$jobfile'");
        $q = "select JobFile_AirId from vw_JobFileAir where JobFileNo ='$jobfile'";
      }else{
        $query = $this->db->query("select JobFileId from vw_JobFile where JobFileNo ='$jobfile' ");
        $q = "select JobFileId from vw_JobFile where JobFileNo ='$jobfile'";
      }

    return $query->result();
  }

  function contentJobfile($jobfile,$montype){
    if($montype != 3){
      $query = $this->db->query("select * from vw_JobFile where JobFileId ='$jobfile'");
    }else{
      $query = $this->db->query("select * from vw_JobFileAir where JobFile_AirId ='$jobfile'");
    }
    return $query->result();
  }

  function check_jobfile_update_data($jbId, $jobfile, $montype){
     if($montype != 3){
      $query = $this->db->query("select * from vw_JobFile where JobFileId <> '$jbId' AND JobFileNo = '$jobfile' AND MonitoringTypeId = '$montype'");
      }else{
        $query = $this->db->query("select * from vw_JobFileAir where JobFile_AirId <>'$jbId' AND JobFileNo = '$jobfile'");
      }
    return $query->result();
  }

}


?>