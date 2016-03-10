<?php

Class RunningCharges_Reports extends CI_Model
{

	function getPre_Details_RunningCharges($monType,$po_num,$userID){
		if($monType == 1 || $monType == 2){
		  $query = $this->db->query("SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.PurchaseOrderNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'");	
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

	function getCharges_Truck($monType,$cID,$ataFrom,$ataTo){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo , b.CarrierByJobFileId, c.TargetDeliveryDate, c.ContainerNo, e.ProductName, c.GateInAtPort , c.GateOutAtPort, c.ActualDeliveryAtWarehouse, f.Storage, f.Demorage, (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges
									FROM JobFile AS a
									LEFT JOIN CarrierByJobFile    	AS b ON a.JobFileId = b.JobFileId
									LEFT JOIN ContainerByCarrier  	AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
									LEFT JOIN ProductsByContainer 	AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
									LEFT JOIN Products 				AS e ON d.ProductId = e.ProductId
									LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
									WHERE 
									c.TargetDeliveryDate >= '$ataFrom' 
									AND 
									c.TargetDeliveryDate <= '$ataTo'
									AND 
									a.ConsigneeId = '$cID'
									AND 
									a.MonitoringTypeId = '$monType'");
		
		}else{
			$query = $this->db->query("SELECT 
										a.JobFile_AirId AS JobFileId , a.JobFileNo,a.ConsigneeId , b.TargetDeliveryDate, a.Aircraft, c.ProductName, f.StorageFee , (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges
										FROM JobFile_Air AS a
										LEFT JOIN Products_Air AS b ON a.JobFile_AirId = b.JobFile_AirId
										LEFT JOIN Products AS c ON b.ProductId = c.ProductId									
										LEFT JOIN RunningCharges_Air AS f ON a.JobFile_AirId = f.JobFile_AirId
										WHERE 
										b.TargetDeliveryDate >= '$ataFrom'
										AND 
										b.TargetDeliveryDate <= '$ataTo' 
										AND 
										a.ConsigneeId = '$cID'");
		}
		
		return $query->result();
	}

	function getConsolidated($monType,$cID,$ataFrom,$ataTo,$poNum){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo , b.CarrierByJobFileId, c.ContainerNo, c.TargetDeliveryDate, b.EstArrivalTime , a.HouseBillLadingNo, a.DateReceivedOfOtherDocs, e.ProductName,  c.DateSentFinalAssessment , c.GateInAtPort , c.GateOutAtPort, c.ActualDeliveryAtWarehouse, c.StartOfStorage, f.Storage, c.StartOfDemorage, f.Demorage, (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges, g.StatusDescription
										FROM JobFile AS a
										LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
										LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
										LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
										LEFT JOIN Products 				AS e ON d.ProductId = e.ProductId
										LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
										LEFT JOIN HistoricalStatus 	AS g ON a.JobFileId = g.JobFileId
										WHERE 
										c.ActualDeliveryAtWarehouse >= '$ataFrom' 
										AND 
										c.ActualDeliveryAtWarehouse <= '$ataTo'
										AND 
										a.ConsigneeId = '$cID' 
										AND
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'");
		}else{
			$query = $this->db->query("SELECT 
										a.JobFile_AirId AS JobFileId, a.PurchaseOrderNo , a.JobFileNo, b.TargetDeliveryDate, a.Aircraft, a.ETA, a.HouseBillLadingNo, c.ProductName, b.DateSentFinalAssessment, a.DatePickUpOtherDocs, a.ATA, f.StorageFee , (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges, g.StatusDescription
										FROM JobFile_Air AS a
										LEFT JOIN Products_Air AS b ON a.JobFile_AirId = b.JobFile_AirId
										LEFT JOIN Products AS c ON b.ProductId = c.ProductId									
										LEFT JOIN RunningCharges_Air AS f ON a.JobFile_AirId = f.JobFile_AirId
										LEFT JOIN HistoricalStatus_Air AS g ON a.JobFile_AirId = g.JobFile_AirId
										WHERE 
										a.ATA >= '$ataFrom'
									 	AND 
										a.ATA <= '$ataTo' 
										AND 
										a.ConsigneeId = '$cID'
										AND 
										a.PurchaseOrderNo = '$poNum'");
		}

		return $query->result();
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

	function getConsigneeName($userID){
		$query = $this->db->query( "SELECT a.ConsigneeId , a.ConsigneeName FROM Consignee AS a , User AS b WHERE a.ConsigneeId = b.ConsigneeId AND b.UserId = '$userID'
					UNION
					SELECT a.ConsigneeId , a.ConsigneeName FROM Consignee AS a , User AS b WHERE a.ConsigneeId = b.ConsigneeId2 AND b.UserId = '$userID'
					UNION
					SELECT a.ConsigneeId , a.ConsigneeName FROM Consignee AS a , User AS b WHERE a.ConsigneeId = b.ConsigneeId3 AND b.UserId = '$userID'");

		return $query->result();
	}

	function getcName($cID){
		$q = $this->db->query("SELECT ConsigneeName FROM Consignee WHERE ConsigneeId = '$cID'");
		return $q->row();
	}

	function getReportsVolume($monType,$userID,$ataFrom,$ataTo){
		if($monType == 1 || $monType == 2){
			$query   = $this->db->query("SELECT 
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
							a.ConsigneeId = '$userID'
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
							a.ConsigneeId = '$userID'
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
							a.ConsigneeId = '$userID'
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
										a.ConsigeeId = '$userID'
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
										a.ConsigneeId = '$userID'
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
										a.ConsigneeId = '$userID'
									");
		}
		
		return $query->result();
	}


	function get_PO($monitoringType,$PO_Number,$consigneeID){
		if($monitoringType == 1 || $monitoringType == 2){
			$query = $this->db->query(" select J.* , RC.* , C.ConsigneeName
										from JobFile J
										JOIN RunningCharges RC ON RC.JobFileId = J.JobFileId 
										JOIN Consignee C ON C.ConsigneeId = J.ConsigneeId
										where J.ConsigneeID = '$consigneeID' AND J.PurchaseOrderNo = '$PO_Number' AND MonitoringTypeId = '$monitoringType' limit 1
											");
		}else{
			$query = $this->db->query(" select J.* , RC.* , C.ConsigneeName
											from JobFile_Air J
											JOIN RunningCharges_Air RC ON RC.JobFile_AirId = J.JobFile_AirId 
											JOIN Consignee C ON C.ConsigneeId = J.ConsigneeId
											where J.ConsigneeID = '$consigneeID' AND J.PurchaseOrderNo = '$PO_Number' limit 1
											");
		}
				
		return $query->row();
	}

}

?>