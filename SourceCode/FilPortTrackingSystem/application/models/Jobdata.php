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
       $query = $this->db->query("select a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU, a.OtherFees  FROM RunningCharges_Air as a, vw_JobFileAir as b WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$charges'");
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
         $query = $this->db->query("select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR PurchaseOrderNo LIKE '%$consigneeName%'  AND MonitoringTypeId = '$monitoringType'");
     }else if($monitoringType == 4){
         $query = $this->db->query("SELECT JobFileId, JobFileNo, ConsigneeName, ShipperName, IsBackGround, ColorCode, StatusName,PurchaseOrderNo from vw_JobFile WHERE ConsigneeName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR PurchaseOrderNo LIKE '%$consigneeName%'
                                    UNION ALL
                                    select JobFile_AirId AS 'JobFileId', JobFileNo, ConsigneeName, ShipperName, IsBackGround, ColorCode, StatusName,PurchaseOrderNo from vw_JobFileAir WHERE ConsigneeName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR PurchaseOrderNo LIKE '%$consigneeName%'");
     }else if($monitoringType == 5){
       $query = $this->db->query("select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR PurchaseOrderNo LIKE '%$consigneeName%'");
     }
     else{
         $query = $this->db->query("select * FROM vw_JobFileAir where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' OR PurchaseOrderNo LIKE '%$consigneeName%'");
    }
    //return "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%' OR ShipperName LIKE '%$consigneeName%' OR JobFileNo LIKE '%$consigneeName%' AND MonitoringTypeId = '$monitoringType'";
    return $query->result();
 }

 function getJobfiles_Reports_Consignee($uID,$monitoringType){
  $userID = $uID;
 // echo $uID . '  //// ' . $monitoringType . ' <br>';
   if($monitoringType == 1 || $monitoringType == 2){
         $query = $this->db->query("SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'  
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'");
     
    }else if($monitoringType == 4){
         $query = $this->db->query("SELECT a.JobFileId, a.JobFileNo, a.ConsigneeName, a.ShipperName, a.IsBackGround, a.ColorCode, a.StatusName, a.PurchaseOrderNo FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION
                                    SELECT a.JobFileId, a.JobFileNo, a.ConsigneeName, a.ShipperName, a.IsBackGround, a.ColorCode, a.StatusName,a.PurchaseOrderNo FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION
                                    SELECT a.JobFileId, a.JobFileNo, a.ConsigneeName, a.ShipperName, a.IsBackGround, a.ColorCode, a.StatusName,a.PurchaseOrderNo FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION ALL
                                    SELECT a.JobFile_AirId AS 'JobFileId', a.JobFileNo,  a.ConsigneeName,  a.ShipperName,  a.IsBackGround,  a.ColorCode,  a.StatusName,a.PurchaseOrderNo FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'
                                    UNION
                                    SELECT a.JobFile_AirId AS 'JobFileId', a.JobFileNo,  a.ConsigneeName,  a.ShipperName,  a.IsBackGround,  a.ColorCode,  a.StatusName,a.PurchaseOrderNo FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'
                                    UNION
                                    SELECT a.JobFile_AirId AS 'JobFileId', a.JobFileNo,  a.ConsigneeName,  a.ShipperName,  a.IsBackGround,  a.ColorCode,  a.StatusName,a.PurchaseOrderNo FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'");
         //$q = "select * FROM vw_JobFile where ConsigneeName LIKE '%$consigneeName%'";
    } else{
       $query = $this->db->query("SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' 
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID'");
    }
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

function get_user_admin($role){
  $query = $this->db->query("select * from User where RoleId = '$role' ");
    return $query->result();
}


 function get_user_client(){
    $query = $this->db->query(" SELECT  
                                C2.ConsigneeName as 'C2Name',C2.ConsigneeId as C2Id,
                                C3.ConsigneeName as C3Name,C3.ConsigneeId as C3Id,
                                U.*,C.ConsigneeName as CName ,C.ConsigneeId as CId
                                FROM User U
                                LEFT JOIN Consignee C ON C.ConsigneeId = U.ConsigneeId
                                LEFT JOIN Consignee C2 ON C2.ConsigneeId = U.ConsigneeId2
                                LEFT JOIN Consignee C3 ON C3.ConsigneeId = U.ConsigneeId3
                                WHERE U.RoleId = 2");
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
  $query = $this->db->query("select * from vw_JobFileAirHistory where JobFile_AirId ='$jobfile' ORDER BY JobFile_AirHistoryId desc");
    return $query->result();
}

 function get_consignee_name($uid){
   $query=$this->db->query("    SELECT  
                                C2.ConsigneeName AS 'ConsigneeName_2',C2.ConsigneeId AS 'ConsigneeID_2',
                                C3.ConsigneeName AS 'ConsigneeName_3',C3.ConsigneeId AS 'ConsigneeName_3',
                                U.ConsigneeId, U.ConsigneeId2, U.ConsigneeId3,C.ConsigneeName as 'ConsigneeName_1' ,C.ConsigneeId as 'ConsigneeID_1'
                                FROM User U
                                LEFT JOIN Consignee C ON C.ConsigneeId = U.ConsigneeId
                                LEFT JOIN Consignee C2 ON C2.ConsigneeId = U.ConsigneeId2
                                LEFT JOIN Consignee C3 ON C3.ConsigneeId = U.ConsigneeId3
                                WHERE U.UserId =  '$uid'");
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

  function update_user($uid,$status){

     $data = array(
        'IsActive' => $status
        );
          $this->db->where('UserId', $uid);
          $this->db->update('User', $data);
  }


  function chart_sea(){
    $query = $this->db->query("select S.StatusName,S.ColorCode, count(*) as Ratings FROM JobFile JF
                              JOIN `Status` S On JF.StatusId = S.StatusId
                               where JF.MonitoringTypeId = 1
                              Group By S.StatusName ORDER BY S.StatusId");
    return $query->result();
 }

 function chart_sea_outport(){
   $query = $this->db->query("select S.StatusName,S.ColorCode, count(*) as Ratings FROM JobFile JF
                              JOIN `Status` S On JF.StatusId = S.StatusId
                              where JF.MonitoringTypeId = 2
                              Group By S.StatusName ORDER BY S.StatusId");
    return $query->result();
 }

function chart_air(){
  $query = $this->db->query("select S.StatusName,S.ColorCode, count(*) as Ratings FROM JobFile_Air JFA
                            JOIN `Status` AS S On JFA.StatusId = S.StatusId
                            Group By S.StatusName Order By S.StatusId");
    return $query->result();
}

  function get_email_jobfile($jbfl,$monType){

    if($monType != 3){
      $jb = $this->db->query("Select * from vw_JobFile where JobFileNo='$jbfl'");
    }else{
       $jb = $this->db->query("Select * from vw_JobFileAir where JobFileNo='$jbfl'");  
    }

    return $jb->result();
  }


  function get_email_jobfile_autoemail($jbfl){
    $jb = $this->db->query("Select * from vw_JobFile where JobFileNo in ($jbfl)");
    return $jb->result();
  }
  function get_email_jobfile_autoemail_air($jbfl){
    $jb = $this->db->query("Select * from vw_JobFileAir where JobFileNo in ($jbfl)");
    return $jb->result();
  }


  function Today(){
  $query = $this->db->query("Select DISTINCT JobFileNo,DateUpdated,ConsigneeName,EmailAddress from vw_JobFileHistory order by DateUpdated desc");
  return $query->result();
  }
  function Today_air(){
  $query = $this->db->query("select DISTINCT JobFileNo,DateUpdated,ConsigneeName,EmailAddress from vw_JobFileAirHistory order by DateUpdated desc");
  return $query->result();
  }


  function get_charges_email($charges){
    $query = $this->db->query("select * FROM vw_RunningCharges WHERE JobFileNo = '$charges'");
    return $query->result();
  }
    function get_charges_email_air($charges){
    $query = $this->db->query("select a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU  FROM RunningCharges_Air as a, vw_JobFileAir as b WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$charges'");
    return $query->result();
  }
  function select_temp($userid){
    $query = $this->db->query("select * FROM Tempo where userid=$userid ");
    return $query->result();
  }

function jobfile_graph_manila(){
  $query = $this->db->query("select count(*) as Ratings FROM JobFile where MonitoringTypeId =1");
    return $query->result();
}

function jobfile_graph_manila_perMonth($mon){
   $query = $this->db->query("select
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 1 AND MonitoringTypeId = '$mon') AS January,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 2 AND MonitoringTypeId = '$mon') AS February,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 3 AND MonitoringTypeId = '$mon') AS March,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 4 AND MonitoringTypeId = '$mon') AS April,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 5 AND MonitoringTypeId = '$mon') AS May,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 6 AND MonitoringTypeId = '$mon') AS June,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 7 AND MonitoringTypeId = '$mon') AS July,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 8 AND MonitoringTypeId = '$mon') AS August,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 9 AND MonitoringTypeId = '$mon') AS September,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 10 AND MonitoringTypeId = '$mon') AS October,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 11 AND MonitoringTypeId = '$mon') AS November,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 12 AND MonitoringTypeId = '$mon') AS December
                                
                              FROM JobFileHistory
                              Where MonitoringTypeId = '1' AND YEAR(DateUpdated) = YEAR(CURDATE()) limit 1");
    return $query->result();
}

function jobfile_graph_outport_perMonth($mon){
   $query = $this->db->query("select
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 1 AND MonitoringTypeId = '$mon') AS January,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 2 AND MonitoringTypeId = '$mon') AS February,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 3 AND MonitoringTypeId = '$mon') AS March,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 4 AND MonitoringTypeId = '$mon') AS April,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 5 AND MonitoringTypeId = '$mon') AS May,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 6 AND MonitoringTypeId = '$mon') AS June,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 7 AND MonitoringTypeId = '$mon') AS July,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 8 AND MonitoringTypeId = '$mon') AS August,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 9 AND MonitoringTypeId = '$mon') AS September,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 10 AND MonitoringTypeId = '$mon') AS October,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 11 AND MonitoringTypeId = '$mon') AS November,
                                (select count(*) from JobFileHistory Where DATE_FORMAT(DateUpdated,'%m') = 12 AND MonitoringTypeId = '$mon') AS December
                                
                              FROM JobFileHistory
                              Where MonitoringTypeId = '1' AND YEAR(DateUpdated) = YEAR(CURDATE()) limit 1");
    return $query->result();
}

function jobfile_graph_air_perMonth(){
   $query = $this->db->query("select
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 1 ) AS January,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 2 ) AS February,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 3 ) AS March,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 4 ) AS April,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 5 ) AS May,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 6 ) AS June,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 7 ) AS July,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 8 ) AS August,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 9 ) AS September,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 10 ) AS October,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 11 ) AS November,
                                (select count(*) from JobFile_AirHistory Where DATE_FORMAT(DateUpdated,'%m') = 12 ) AS December
                                
                              FROM JobFile_AirHistory
                              Where YEAR(DateUpdated) = YEAR(CURDATE()) limit 1");
    return $query->result();
}



function jobfile_graph_outport(){
  $query = $this->db->query("select count(*) as Ratings FROM JobFile where MonitoringTypeId =2");
    return $query->result();
}
function jobfile_graph_air(){
  $query = $this->db->query("select count(*) as Ratings FROM JobFile_Air");
    return $query->result();
}

function get_consignees_report($consigneeName){
  $query = $this->db->query("select * FROM Consignee WHERE ConsigneeName LIKE '%$consigneeName%'");
  return $query->result();
}

function get_accreditations($monitoringType){
  if($monitoringType != 3){
    $query = $this->db->query("SELECT JobFileId,JobFileNo, ConsigneeName, DateReceivedNoticeFromClients, DateReceivedOfOtherDocs from vw_JobFile WHERE MonitoringTypeId = '$monitoringType' ORDER BY ConsigneeName");
   // $q = "SELECT JobFileId,JobFileNo, ConsigneeName, DateReceivedNoticeFromClients, DateReceivedOfOtherDocs from vw_JobFile WHERE MonitoringTypeId = '$monitoringType' ORDER BY ConsigneeName";
  }else{
    $query = $this->db->query("SELECT JobFile_AirId As 'JobFileId',JobFileNo, ConsigneeName, DateReceivedArrivalFromClient AS 'DateReceivedNoticeFromClients', DatePickUpOtherDocs AS 'DateReceivedOfOtherDocs' from vw_JobFileAir ORDER BY ConsigneeName");
    //$q = "SELECT JobFile_AirId As 'JobFileId',JobFileNo, ConsigneeName, DateReceivedArrivalFromClient AS 'DateReceivedNoticeFromClients', DatePickUpOtherDocs AS 'DateReceivedOfOtherDocs' from vw_JobFileAir ORDER BY ConsigneeName";
  }
  return $query->result();
}

function get_consignee_contacts($conName){
  $query = $this->db->query("SELECT  CONCAT(a.FirstName , ' ' , a.MiddleName, ' ' ,a.LastName) AS ConsigneeName, a.ContactNo1, a.ContactNo2 FROM ConsigneeContacts AS a , Consignee AS c WHERE a.ConsigneeId = c.ConsigneeId AND c.ConsigneeName = '$conName'");
  return $query->result();
}  


function get_allways_email(){
 $query = $this->db->query("select EmailAddress from User where UserId IN (38)"); 
  return $query->result();
}
function get_email_manila(){
 $query = $this->db->query("select EmailAddress from User where UserId IN (4)"); 
  return $query->result();
}
function get_email_outport(){
 $query = $this->db->query("select EmailAddress from User where UserId IN (1)"); 
  return $query->result();
}
function get_email_air(){
 $query = $this->db->query("select EmailAddress from User where UserId IN (3)"); 
  return $query->result();
}


}
?>