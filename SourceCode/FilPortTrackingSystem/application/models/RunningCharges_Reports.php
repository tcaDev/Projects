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


}

?>