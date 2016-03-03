<?php

Class RunningCharges_Reports extends CI_Model
{

	function getPre_Details_RunningCharges($monType,$po_num,$userID){
		if($monType == 1 || $monType == 2){
		  $query = $this->db->query("SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'");	
		}else{
		  $query = $this->db->query("SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'");	
		}
		return $query->row();
	}

	function getContainerDetails($monType,$jbNo){
		$query = $this->db->query("SELECT * FROM vw_Containers WHERE JobFileNo = '$jbNo'");
		return $query->result();
	}

	function getRunningCharges($monType, $jbNo){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT * FROM vw_RunningCharges WHERE JobFileNo = '$jbNo'");
		}else{
			$query = $this->db->query("SELECT a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU, a.OtherFees  FROM RunningCharges_Air as a, vw_JobFileAir as b WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$jbNo'");
		}
		return $query->row();
	}

	function getCommodities($monType, $jbNo){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT * FROM vw_Products WHERE JobFileNo = '$jbNo'");
		}else{
			$query = $this->db->query("SELECT a.*, b.* FROM vw_JobFileAir as a , vw_ProductsAir as b where a.JobFileNo = '$jbNo' AND a.JobFile_AirId = b.JobFile_AirId");
		}
		return $query->result();
	}

	function getVolume($monType, $jbNo){
	 $ct = 0;
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT * FROM vw_Containers WHERE JobFileNo = '$jbNo'");
			$dataToCount = $query->result();
			$ct = count($dataToCount);
		}else{
			$query2 = $this->db->query("SELECT a.*, b.* FROM vw_JobFileAir as a , vw_ProductsAir as b where a.JobFileNo = '$jbNo' AND a.JobFile_AirId = b.JobFile_AirId");
			$data["datas"] 	= $query2->result();	
			foreach($data["datas"] as $row){
				$ct = $row->GrossWeight;
			}		
		}
		return $ct;
	}

	function getReportsVolume($monType,$userID,$ataFrom,$ataTo){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.ContainerNo, d.ProductId, e.ProductName, f.*
							FROM 
							User  con1,
							JobFile a
							LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
							LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
							LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
							LEFT JOIN Products				AS e ON d.ProductId = e.ProductId
							LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
							WHERE 
							con1.ConsigneeId = a.ConsigneeId 
							AND
							b.ActualArrivalTime >= '$ataFrom' 
							AND
							b.ActualArrivalTime <= '$ataTo'
							AND 
							con1.UserId = '$userID'
							AND 
							a.MonitoringTypeId = '$monType'
							UNION
							SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.ContainerNo, d.ProductId, e.ProductName, f.*
							FROM 
							User  con1,
							JobFile a
							LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
							LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
							LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
							LEFT JOIN Products				AS e ON d.ProductId = e.ProductId
							LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
							WHERE 
							con1.ConsigneeId2 = a.ConsigneeId 
							AND
							b.ActualArrivalTime >= '$ataFrom' 
							AND
							b.ActualArrivalTime <= '$ataTo'
							AND 
							con1.UserId = '$userID'
							AND 
							a.MonitoringTypeId = '$monType'
							UNION
							SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.ContainerNo, d.ProductId, e.ProductName, f.*
							FROM 
							User  con1,
							JobFile a
							LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
							LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
							LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
							LEFT JOIN Products				AS e ON d.ProductId = e.ProductId
							LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
							WHERE 
							con1.ConsigneeId3 = a.ConsigneeId 
							AND
							b.ActualArrivalTime >= '$ataFrom' 
							AND
							b.ActualArrivalTime <= '$ataTo'
							AND 
							con1.UserId = '$userID'
							AND 
							a.MonitoringTypeId = '$monType'");
		}else{
			$query = $this->db->query("SELECT 
										a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, a.Aircraft, b.ProductId, c.ProductName, d.*
										FROM
										User  con1,
										JobFile_Air a
										LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId
										LEFT JOIN Products 	  AS c ON b.ProductId = c.ProductId
										LEFT JOIN RunningCharges_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
										WHERE 
										con1.ConsigneeId3 = a.ConsigneeId 
										AND 
										a.ATA >= '$ataFrom'
										AND
										a.ATA <= '$ataTo'
										AND 
										con1.UserId = '$userID'
										UNION
										SELECT 
										a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, a.Aircraft, b.ProductId, c.ProductName, d.*
										FROM
										User  con1,
										JobFile_Air a
										LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId
										LEFT JOIN Products 	  AS c ON b.ProductId = c.ProductId
										LEFT JOIN RunningCharges_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
										WHERE 
										con1.ConsigneeId2 = a.ConsigneeId 
										AND 
										a.ATA >= '$ataFrom'
										AND
										a.ATA <= '$ataTo'
										AND 
										con1.UserId = '$userID'
										UNION
										SELECT 
										a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, a.Aircraft, b.ProductId, c.ProductName, d.*
										FROM
										User  con1,
										JobFile_Air a
										LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId
										LEFT JOIN Products 	  AS c ON b.ProductId = c.ProductId
										LEFT JOIN RunningCharges_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
										WHERE 
										con1.ConsigneeId = a.ConsigneeId 
										AND 
										a.ATA >= '$ataFrom'
										AND
										a.ATA <= '$ataTo'
										AND 
										con1.UserId = '$userID'
									");
		}
		
		return $query->result();
	}


}

?>