<?php

Class RunningCharges_Reports extends CI_Model
{

	function getPre_Details_RunningCharges_PO($monType,$po_num,$userID){
		
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

	function getPre_Details_RunningCharges_HBL($monType, $po_num, $userID){
		if($monType == 1 || $monType == 2){
		  $query = $this->db->query("SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'
                                    UNION
                                    SELECT a.* FROM vw_JobFile AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'
                                    AND a.MonitoringTypeId = '$monType'");	
		}else{
		  $query = $this->db->query("SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId2 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'
                                    UNION
                                    SELECT a.* FROM vw_JobFileAir AS a, User AS b , Consignee AS c WHERE b.ConsigneeId3 = c.ConsigneeID
                                    AND a.ConsigneeName = c.ConsigneeName AND b.UserId = '$userID' AND a.HouseBillLadingNo = '$po_num'");	
		}
		return $query->row();
	}

	function getCharges_Truck($monType,$cID,$ataFrom,$ataTo){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo , b.CarrierByJobFileId, c.TargetDeliveryDate, c.ContainerNo, CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin, e.ProductName, c.GateInAtPort , c.GateOutAtPort, c.ActualDeliveryAtWarehouse, c.StartOfStorage, f.Storage, c.StartOfDemorage, f.Demorage, (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges , CR.CarrierName , HT.HaulerOrTruck
									FROM JobFile AS a
									LEFT JOIN CarrierByJobFile    	AS b ON a.JobFileId = b.JobFileId
									LEFT JOIN ContainerByCarrier  	AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
									LEFT JOIN ProductsByContainer 	AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
									LEFT JOIN Products 				AS e ON d.ProductId = e.ProductId
									LEFT JOIN RunningCharges 		AS f ON a.JobFileId = f.JobFileId
									LEFT JOIN Countries				AS g ON a.Origin_CountryId = g.CountryId
									LEFT JOIN Carrier				AS CR ON CR.CarrierId = b.CarrierId
									LEFT JOIN HaulerOrTruck			AS HT ON HT.HaulerOrTruckId = c.HaulerOrTruckId
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
										a.JobFile_AirId AS JobFileId , a.JobFileNo,a.ConsigneeId, a.NoOfCartons , b.TargetDeliveryDate, a.Aircraft, c.ProductName, f.StorageFee , (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges, CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin , a.Forwarder ,b.TargetDeliveryDate ,a.NoOfCartons , b.GrossWeight
										FROM JobFile_Air AS a
										LEFT JOIN Products_Air 		 AS b ON a.JobFile_AirId = b.JobFile_AirId
										LEFT JOIN Products 			 AS c ON b.ProductId = c.ProductId									
										LEFT JOIN RunningCharges_Air AS f ON a.JobFile_AirId = f.JobFile_AirId
										LEFT JOIN Countries			 AS g ON a.Origin_CountryId = g.CountryId
										WHERE 
										b.TargetDeliveryDate >= '$ataFrom'
										AND 
										b.TargetDeliveryDate <= '$ataTo' 
										AND 
										a.ConsigneeId = '$cID'");
		}
		
		return $query->result();
	}

	function getConsolidated($monType,$userId,$ataFrom,$ataTo,$poNum){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo, b.CarrierByJobFileId, c.ContainerNo, c.TargetDeliveryDate, c.DateSentPreAssessment, c.DatePaid, b.EstArrivalTime, b.ActualArrivalTime , a.HouseBillLadingNo, a.DateReceivedOfOtherDocs, e.ProductName,c.DateSentFinalAssessment , c.GateInAtPort , c.GateOutAtPort, c.ActualDeliveryAtWarehouse, c.StartOfStorage, f.Storage, c.StartOfDemorage, f.Demorage, (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges, h.Description
										FROM JobFile AS a
										LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
										LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
										LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
										LEFT JOIN Products 			  AS e ON d.ProductId = e.ProductId
										LEFT JOIN RunningCharges 	  AS f ON a.JobFileId = f.JobFileId
										LEFT JOIN Status 			  AS h ON a.StatusId = h.StatusId
										LEFT JOIN User 				  AS con1 ON a.ConsigneeId = con1.ConsigneeId 
											            OR a.ConsigneeId = con1.ConsigneeId2 
											            OR a.ConsigneeId = con1.ConsigneeId3
										WHERE 
										c.ActualDeliveryAtWarehouse >= '$ataFrom' 
										AND 
										c.ActualDeliveryAtWarehouse <= '$ataTo'
										AND 
										con1.UserId = '$userId' 
										AND
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'");
		}else{
			$query = $this->db->query("SELECT 
									   a.JobFileNo, a.ATA, a.HouseBillLadingNo, c.ProductName, a.DatePickUpOtherDocs, b.DateSentPreAssessment, b.DateSentFinalAssessment, b.DatePaid, b.TargetDeliveryDate, b.DateReceivedAtWhse, f.StorageFee, (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges, h.Description
									   FROM JobFile_Air AS a
									   LEFT JOIN Products_Air        AS b ON a.JobFile_AirId = b.JobFile_AirId
									   LEFT JOIN Products 			 AS c ON b.ProductId = c.ProductId									
									   LEFT JOIN RunningCharges_Air  AS f ON a.JobFile_AirId = f.JobFile_AirId
									   LEFT JOIN Status 		     AS h ON a.StatusId = h.StatusId
									   LEFT JOIN User 			     AS con1 ON a.ConsigneeId = con1.ConsigneeId 
									   OR a.ConsigneeId = con1.ConsigneeId2 
										OR a.ConsigneeId = con1.ConsigneeId3
										WHERE 
										b.TargetDeliveryDate >= '$ataFrom'
									 	AND 
										b.TargetDeliveryDate <= '$ataTo' 
										AND 
										con1.UserId = '$userId'
										AND 
										a.PurchaseOrderNo = '$poNum'");
		}

		return $query->result();
	}

	function getContainerDetails($monType,$jbNo){
		$query = $this->db->query("SELECT * FROM vw_Containers WHERE JobFileNo = '$jbNo'");
		return $query->result();
	}

	function getCommodityVolume($cID,$prodId,$frm,$to,$monType){
		$conditions = '';
		$execQuery = '';
		$preQuery = '';
		
		if($monType == 1 || $monType == 2){
			$preQuery = "SELECT a.JobFileNo, b.ActualArrivalTime, e.ProductName, e.ProductId,(COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges
						 FROM 
						 JobFile a
						 LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
						 LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
						 LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
						 LEFT JOIN Products 		   AS e ON d.ProductId = e.ProductId
						 LEFT JOIN RunningCharges 	   AS f ON a.JobFileId = f.JobFileId
						 WHERE
						 a.MonitoringTypeId = '$monType' 
						 And
						 a.ConsigneeId = '$cID'";
						
			if($frm != "" && $to != ""){
				$conditions .= "
								AND 
								b.ActualArrivalTime >= '$frm'
								AND
								b.ActualArrivalTime <= '$to'";
			}

			if($prodId != ""){
				$conditions .= "
								AND 
								e.ProductId = '$prodId'";
			}

			$execQuery = $preQuery . $conditions . "
						 							ORDER BY e.ProductId";

		$query = $this->db->query($execQuery);						 						

		}else{
				$preQuery = "SELECT a.JobFileNo, a.ATA, c.ProductName, c.ProductId,(COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges
							 FROM JobFile_Air AS a
							 LEFT JOIN Products_Air AS b ON a.JobFile_AirId = b.JobFile_AirId
							 LEFT JOIN Products AS c ON b.ProductId = c.ProductId
							 LEFT JOIN RunningCharges_Air AS f ON a.JobFile_AirId = f.JobFile_AirId
							 WHERE
							 a.ConsigneeId = '$cID'";
						
			if($frm != "" && $to != ""){
				$conditions .= "
								AND 
								a.ATA >= '$frm'
								AND
								a.ATA <= '$to'";
			}

			if($prodId != ""){
				$conditions .= "
								AND 
								c.ProductId = '$prodId'";
			}

			$execQuery = $preQuery . $conditions . "
						 							ORDER BY c.ProductId";

			$query = $this->db->query($execQuery);		
		}
		//echo $execQuery;
		return $query->result();
	}

	function get_commodities($con_id,$monitoringType){
		$query = '';
		if($monitoringType == 1 || $monitoringType == 2 ){
			$query = $this->db->query("SELECT DISTINCT e.ProductName, e.ProductId
									FROM 
									JobFile a
									LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
									LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
									LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
									LEFT JOIN Products 			   AS e ON d.ProductId = e.ProductId
									WHERE
									a.ConsigneeId = '$con_id' 
									AND
									a.MonitoringTypeId = '$monitoringType'
									ORDER BY e.ProductId");
		}else{
			$query = $this->db->query("SELECT DISTINCT e.ProductName, e.ProductId
									   FROM 
									   JobFile_Air a
									   LEFT JOIN Products_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
									   LEFT JOIN Products 	   AS e ON d.ProductId = e.ProductId
									   WHERE
									   a.ConsigneeId = '$con_id' 
									   ORDER BY e.ProductId");
		}
		
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
		$query = $this->db->query("SELECT a.ConsigneeId , a.ConsigneeName FROM Consignee AS a , User AS b WHERE a.ConsigneeId = b.ConsigneeId AND b.UserId = '$userID'
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

	function getReportsVolume($monType,$userID,$consigneeId,$ataFrom,$ataTo,$charges){
		$conditions = '';
		$execQuery = '';
		$preQuery = '';
		

		if($monType == 1 || $monType == 2){

			if($charges != "*"){
				$preQuery = "SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.TargetDeliveryDate, c.ContainerNo, f." . $charges ." AS RCharges ";
			}else{
				$preQuery = "SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.TargetDeliveryDate, c.ContainerNo, f." . $charges . " ";
			}

			if($consigneeId == ""){
				$conditions .= "
								LEFT JOIN User AS con1 ON a.ConsigneeId = con1.ConsigneeId 
											           OR a.ConsigneeId = con1.ConsigneeId2 
											           OR a.ConsigneeId = con1.ConsigneeId3
								WHERE 
								con1.UserId = '$userID'";
			}else{
				$conditions .= "
				WHERE
				a.ConsigneeId = '$consigneeId'";
			}

			if($ataFrom != "" && $ataTo != ""){
				$conditions .= "
				AND
				b.ActualArrivalTime >= '$ataFrom'
				AND
				b.ActualArrivalTime <= '$ataTo'";
			}

			 $execQuery = $preQuery . "
						FROM 
						JobFile a
						LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
						LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
						LEFT JOIN RunningCharges 	  AS f ON a.JobFileId = f.JobFileId " . $conditions . "
						AND a.MonitoringTypeId = '$monType'";

			$query   = $this->db->query($execQuery);
		}else{

			if($charges != "*"){
				$preQuery = "SELECT 
							 a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, b.TargetDeliveryDate, a.Aircraft, d." . $charges ." AS RCharges
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}else{
				$preQuery = "SELECT 
							 a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, b.TargetDeliveryDate, a.Aircraft, d." . $charges . "
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}	

			if($consigneeId == ""){
				$conditions .= "
								LEFT JOIN User AS con1 ON a.ConsigneeId = con1.ConsigneeId 
											           OR a.ConsigneeId = con1.ConsigneeId2 
											           OR a.ConsigneeId = con1.ConsigneeId3
								WHERE 
								con1.UserId = '$userID'";
			}else{
				$conditions .= "
				WHERE
				a.ConsigneeId = '$consigneeId'";
			}

			if($ataFrom != "" && $ataTo != ""){
				$conditions .= "
				AND
				a.ATA >= '$ataFrom'
				AND
				a.ATA <= '$ataTo'";
			}

			$execQuery = $preQuery . "
						LEFT JOIN RunningCharges_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
						" . $conditions;

			$query = $this->db->query($execQuery);
		}
		//echo $execQuery;
		return $query->result();
	}


	function get_PO($monitoringType,$PO_Number,$consigneeID){
		if($monitoringType == 1 || $monitoringType == 2){
			$query = $this->db->query(" select J.* , RC.* , C.ConsigneeName
										from JobFile J
										JOIN RunningCharges RC ON RC.JobFileId = J.JobFileId 
										JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
										where J.PurchaseOrderNo = '$PO_Number' AND MonitoringTypeId = '$monitoringType' limit 1
										");
		}else{
			$query = $this->db->query(" select J.* , RC.* ,C.ConsigneeName
											from JobFile_Air J
											JOIN RunningCharges_Air RC ON RC.JobFile_AirId = J.JobFile_AirId 
											JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
											where J.PurchaseOrderNo = '$PO_Number' limit 1
											");
		}
				
		return $query->row();
	}

	function get_PO_hbl($monitoringType,$PO_Number,$consigneeID){
		if($monitoringType == 1 || $monitoringType == 2){
			$query = $this->db->query(" select J.* , RC.*,C.ConsigneeName
										from JobFile J
										JOIN RunningCharges RC ON RC.JobFileId = J.JobFileId 
										JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
										where J.HouseBillLadingNo = '$PO_Number' AND MonitoringTypeId = '$monitoringType' limit 1
											");
		}else{
			$query = $this->db->query(" select J.* , RC.* , C.ConsigneeName
											from JobFile_Air J
											JOIN RunningCharges_Air RC ON RC.JobFile_AirId = J.JobFile_AirId 
											JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
											where J.HouseBillLadingNo = '$PO_Number' limit 1
											");
		}
				
		return $query->row();
	}

function get_Volume_Reports($monitoringType,$consigneeID,$ataFrom,$ataTo,$charges){

	$conditions = '';
	$execQuery = '';
	$preQuery = '';
		

		if($monitoringType == 1 || $monitoringType == 2){

			if($charges != "*"){
				$preQuery = "SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.TargetDeliveryDate, c.ContainerNo, f." . $charges ." AS RCharges ";
			}else{
				$preQuery = "SELECT 
							a.JobFileNo , a.JobFileId, b.ActualArrivalTime, c.TargetDeliveryDate, c.ContainerNo, f." . $charges . " ";
			}

			if($consigneeID == ""){
				$conditions .= "WHERE";
			}else{
				$conditions .= "
				WHERE
				a.ConsigneeId = '$consigneeID'";
			}

			if($ataFrom != "" && $ataTo != ""){
				if($consigneeID != ""){
					$conditions .= "AND";
				}
				$conditions .= "
				b.ActualArrivalTime >= '$ataFrom'
				AND
				b.ActualArrivalTime <= '$ataTo'";
			}

			 $execQuery = $preQuery . "
						FROM 
						JobFile a
						LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
						LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
						LEFT JOIN RunningCharges 	  AS f ON a.JobFileId = f.JobFileId " . $conditions . "
						AND a.MonitoringTypeId = '$monitoringType'";		

			$query   = $this->db->query($execQuery);
		}else{

			if($charges != "*"){
				$preQuery = "SELECT 
							 a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, b.TargetDeliveryDate, a.Aircraft, d." . $charges ." AS RCharges
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}else{
				$preQuery = "SELECT 
							 a.JobFileNo , a.JobFile_AirId AS JobFileId, a.ATA, b.TargetDeliveryDate, a.Aircraft, d." . $charges . "
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}	

			if($consigneeID != ""){
				$conditions .= "
				WHERE
				a.ConsigneeId = '$consigneeID'";
			}

			if($ataFrom != "" && $ataTo != ""){
				if($consigneeID != ""){
					$conditions .= "AND";
				}
				$conditions .= "
				a.ATA >= '$ataFrom'
				AND
				a.ATA <= '$ataTo'";
			}

			$execQuery = $preQuery . "
						LEFT JOIN RunningCharges_Air AS d ON a.JobFile_AirId = d.JobFile_AirId
						" . $conditions;

			$query = $this->db->query($execQuery);
		}
		//echo $execQuery;
		return $query->result();

	}

	function get_Consolidated($monType,$ataFrom,$ataTo,$poNum){
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo, b.CarrierByJobFileId, c.ContainerNo, c.TargetDeliveryDate, c.DateSentPreAssessment, c.DatePaid, b.EstArrivalTime, b.ActualArrivalTime , a.HouseBillLadingNo, a.DateReceivedOfOtherDocs, e.ProductName,c.DateSentFinalAssessment , c.GateInAtPort , c.GateOutAtPort, c.ActualDeliveryAtWarehouse, c.StartOfStorage, f.Storage, c.StartOfDemorage, f.Demorage, (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS Total_Charges, h.Description
										FROM JobFile AS a
										LEFT JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
										LEFT JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
										LEFT JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
										LEFT JOIN Products 			  AS e ON d.ProductId = e.ProductId
										LEFT JOIN RunningCharges 	  AS f ON a.JobFileId = f.JobFileId
										LEFT JOIN Status 			  AS h ON a.StatusId = h.StatusId
										
										WHERE 
										c.ActualDeliveryAtWarehouse >= '$ataFrom' 
										AND 
										c.ActualDeliveryAtWarehouse <= '$ataTo'
										AND
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'");
		}else{
			$query = $this->db->query("SELECT 
									   a.JobFileNo, a.ATA, a.HouseBillLadingNo, c.ProductName, a.DatePickUpOtherDocs, b.DateSentPreAssessment, b.DateSentFinalAssessment, b.DatePaid, b.TargetDeliveryDate, b.DateReceivedAtWhse, f.StorageFee, (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS Total_Charges, h.Description
									   FROM JobFile_Air AS a
									   LEFT JOIN Products_Air        AS b ON a.JobFile_AirId = b.JobFile_AirId
									   LEFT JOIN Products 			 AS c ON b.ProductId = c.ProductId									
									   LEFT JOIN RunningCharges_Air  AS f ON a.JobFile_AirId = f.JobFile_AirId
									   LEFT JOIN Status 		     AS h ON a.StatusId = h.StatusId
										WHERE 
										b.TargetDeliveryDate >= '$ataFrom'
									 	AND 
										b.TargetDeliveryDate <= '$ataTo'
										AND 
										a.PurchaseOrderNo = '$poNum'");
		}

		return $query->result();
	}

}

?>