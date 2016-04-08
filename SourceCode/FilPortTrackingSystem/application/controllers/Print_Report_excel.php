   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_Report_excel extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
             $this->load->model('RunningCharges_Reports');	
             $this->load->dbutil();
	         $this->load->helper('file');
	         $this->load->helper('download');
       }

   function excel_fomater(){
/*		   	// The function header by sending raw excel
		header("Content-type: application/vnd-ms-excel");
		 
		// Defines the name of the export file "Filport.xls"
		header("Content-Disposition: attachment; filename=Filport.xlsx");*/
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

		$this->export_data();
   }



		 function export_data(){
		  $goods =  $this->Excel_data->goods();

		  echo '<table border=1>
		    	 <th>JobFile No</th>
		  	     <th>Product Name</th>';

		   foreach ($goods as $row) {
		   	  echo '<tr>';
		   	  echo '<td>'.$row->JobFileNo.' </td>';
		   	  echo '<td>'.$row->ProductName.' </td>';
		   	  echo '</tr>';
		   }

		   echo '</table>';

		 }

			function csv()
			{
			        $this->load->dbutil();
			        $this->load->helper('file');
			        $this->load->helper('download');
			        $query =  $this->Excel_data->goods();
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report.csv', $data);
			}



function csv_run_charge(){
    $conditions = '';
	$execQuery = '';
	$preQuery = '';

//$monitoringType,$consigneeID,$ataFrom,$ataTo,$charges

	       	$ataFrom        = $this->session->volume_ataFrom;
          	$charges        = $this->session->volume_charges;
          	$ataTo          = $this->session->volume_ataTo;
          	$monitoringType = $this->session->volume_monitoringType;
          	$consigneeID    = $this->session->volume_consigneeID;
		

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
						    $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_RunningCharges.csv', $data);
}


			function csv_running_charges(){
		          $PO_Number            =  $this->input->get('po_num');  
		          $monType       =  $this->input->get('montype');
		          $userID               =  $this->input->get('userId');
		          $jbNo            =  $this->input->get('jobfile'); 


			    		if($monType == 1 || $monType == 2){
							/*$query = $this->db->query("SELECT `R`.`LodgementFee`,`R`.`ContainerDeposit`,
								`R`.`THCCharges`,`R`.`Arrastre`,`R`.`Wharfage`,`R`.`Weighing`,`R`.`DEL`,
								`R`.`DispatchFee`,`R`.`Storage`,`R`.`Demorage`,`R`.`Detention`,`R`.`EIC`,
								`R`.`BAIApplication`,`R`.`BAIInspection`,`R`.`SRAApplication`,`R`.`SRAInspection`,
								`R`.`BadCargo`,`R`.`BPIInspection`,`R`.`PlugInForReefer`,`OtherFees`,
								
								sum(`R`.`LodgementFee`+`R`.`ContainerDeposit`) as total,

							    `R`.`ParticularCharges` as ' ',`P`.`ContainerNo`,`P`.`ProductName` AS Commodity

								FROM vw_RunningCharges as R INNER JOIN vw_Products  as P
								  ON `R`.`JobFileNo`=`R`.`JobFileNo`
								WHERE `R`.JobFileNo = '$jbNo'");*/
								$query= $this->db->query("select 
							    `R`.`LodgementFee` as 'Lodgement Fee' ,
								`R`.`THCCharges` as 'THC Charges',
								`R`.`Arrastre`,
								`R`.`Wharfage`,
								`R`.`Weighing`,
								`R`.`DispatchFee`,
								`R`.`DEL`,
								`R`.`Storage` as 'Storage Fee' ,
								`R`.`Demorage` as 'Demurrage Fee',
								`R`.`Detention` as 'Detention Fee',
								`R`.`SRAApplication`as 'SRA Application',
								`R`.`SRAInspection` as 'SRA Processing Fee',
								`R`.`BAIApplication`as 'BAI Application',
								`R`.`BAIInspection` as 'BAI Inspection Fee',
								`R`.`BPIInspection` as 'BPI Inspection Fee',
								`R`.`OtherFees`     as 'Other Fees',
								
								(COALESCE(R.LodgementFee,0) + COALESCE(R.ContainerDeposit,0)  +  COALESCE(R.THCCharges,0)  +  COALESCE(R.Arrastre,0) + COALESCE(R.Wharfage,0) + COALESCE(R.Weighing,0) +  COALESCE(R.DEL,0) +  COALESCE(R.DispatchFee,0) + COALESCE(R.Storage,0) + COALESCE(R.Demorage,0) + COALESCE(R.Detention,0) + COALESCE(R.BAIApplication,0) + COALESCE(R.BAIInspection,0) + COALESCE(R.SRAApplication,0) + COALESCE(R.SRAInspection,0)  + COALESCE(R.OtherFees,0)+
								    COALESCE(R.BPIInspection,0)) AS 'Running Charges',








								 `R`.`ParticularCharges` as ' ',`P`.`ContainerNo`,`P`.`ProductName` AS Commodity

								 from vw_RunningCharges as R   

					             inner JOIN vw_Products as P
								  ON `R`.`JobFileNo`=`P`.`JobFileNo`
								  where `R`.`JobFileNo`='$jbNo' limit 1");
						}else{
							$query = $this->db->query("SELECT a.LodgementFee, a.BreakBulkFee, a.StorageFee, a.BadCargoOrderFee, a.VCRC, a.CNI, a.CNIU, a.OtherFees,
								(COALESCE(a.LodgementFee,0)+COALESCE(a.BreakBulkFee,0) + COALESCE(a.StorageFee,0)+COALESCE(a.BadCargoOrderFee,0)+COALESCE(a.VCRC,0)+COALESCE(a.CNI,0)+COALESCE(a.CNIU,0)+COALESCE(a.OtherFees,0)) as Total,ProductName 
							  FROM RunningCharges_Air as a, vw_JobFileAir as b
							  inner JOIN vw_ProductsAir as c
							  ON `b`.`JobFile_AirId`=`c`.`JobFile_AirId`		
							  WHERE a.JobFile_AirId = b.JobFile_AirId AND b.JobFileNo = '$jbNo'");
						}
	         

			       // $query = $this->db->query("select * from vw_JobFile limit 1");
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_RunningCharges.csv', $data);
			}


  function csv_charges_cosignee(){
	   	$ataFrom = $this->session->volume_consignee_ataFrom ;
      	$ataTo = $this->session->volume_consignee_ataTo;
       	$monType = $this->session->volume_consignee_monitoringType;
      	$userID = $this->session->volume_consignee_userID;
       	$consigneeId = $this->session->volume_consignee_consigneeId;
       	$charges = $this->session->volume_consignee_charges;

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
					        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_RunningCharges.csv', $data);
  }


function csv_volume(){
		$conditions = '';
		$execQuery = '';
		$preQuery = '';

		$monType = $this->session->csv_montype;
     	$cID = $this->session->csv_con_id;
       	$prodId = $this->session->csv_prod_id;
     	$frm = $this->session->csv_frm;
		$to = $this->session->csv_to;
		
		if($monType =='1' || $monType == '2'){
			
			$preQuery = "SELECT a.JobFileNo,(SELECT count(*) FROM vw_Containers  as contain WHERE contain.JobFileId=f.JobFileId ) as Volume, b.ActualArrivalTime, e.ProductName as 'Commodity',(COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS 'Running Charges'
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
				//echo 'yes';
				$conditions .= "
								AND 
								b.ActualArrivalTime >= '$frm'
								AND
								b.ActualArrivalTime <= '$to'";
			}

			if($prodId != ""){
				//	echo 'yes';
				$conditions .= "
								AND 
								e.ProductId = '$prodId'";
			}

			$execQuery = $preQuery . $conditions . "
						 							ORDER BY a.JobFileNo";

		$query = $this->db->query($execQuery);						 						

		}else{
			//echo 'no';
				$preQuery = "SELECT a.JobFileNo, a.ATA, c.ProductName, c.ProductId,(COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Running Charges'
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
						 							ORDER BY a.JobFileNo";

			$query = $this->db->query($execQuery);		


	}
	  			//download as csv
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_Volume.csv', $data);


 }


 function truck_booking(){
      

 	        $ataFrom = $this->session->truck_ataFrom;
          	$ataTo = $this->session->truck_ataTo;
          	$monType = $this->session->truck_monitoringType;
          	$cID = $this->session->truck_cID;


          			if($monType == 1){
			$query = $this->db->query("SELECT c.TargetDeliveryDate as 'TargetDeliveryDate' ,a.JobFileNo, c.ContainerNo,e.ProductName as Commodity, CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin, c.GateInAtPort as 'Gate In(Date/Time)' , c.GateOutAtPort as 'Gate Out(Date/Time)', c.ActualDeliveryAtWarehouse as 'Actual Date Delivered', c.StartOfStorage as 'Start Of Storage', f.Storage as 'Total Storage',
			    c.StartOfDemorage as 'Start Of Demurrage', f.Demorage as 'Total Demurrage', (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS 'Total Running Charges' , CR.CarrierName as 'Shipping Line'
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
			}elseif($monType == 2){
							$query = $this->db->query("SELECT c.TargetDeliveryDate as 'TargetDeliveryDate' ,a.JobFileNo, c.ContainerNo,e.ProductName as Commodity, CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin, 
							     c.ActualDeliveryAtWarehouse as 'Actual Date Delivered', c.StartOfStorage as 'Start Of Storage', f.Storage as 'Total Storage',
			    c.StartOfDemorage as 'Start Of Demurrage', f.Demorage as 'Total Demurrage', (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS 'Total Running Charges' , CR.CarrierName as 'Shipping Line'
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
										      b.TargetDeliveryDate,a.JobFileNo, a.NoOfCartons , a.Aircraft, c.ProductName, f.StorageFee as 'Storage Fee' , (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Total Running Charges', CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin , a.Forwarder ,b.TargetDeliveryDate ,a.NoOfCartons , b.GrossWeight
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


					//download as csv
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_Truck_booking.csv', $data);
 }


  function csv_consolidate(){
  	       	$ataFrom = $this->session->consolidate_ataFrom;
          	$ataTo   = $this->session->consolidate_ataTo;
          	$monType = $this->session->consolidate_monitoringType;
          	$poNum   = $this->session->consolidate_poNum;

          	//$monType,$ataFrom,$ataTo,$poNum
//c.ContainerNo, b.EstArrivalTime,
		if($monType == 1 || $monType == 2){
			$query = $this->db->query("SELECT a.JobFileNo, b.ActualArrivalTime,
				       (select count(*) from vw_Products as prod where prod.JobFileId=f.JobFileId)as Volume,a.HouseBillLadingNo as 'HBL',
				        e.ProductName as Commodity , a.DateReceivedOfOtherDocs as 'Date Received Docs',
				        c.DateSentPreAssessment as 'Pre-Assessment Date',
				        c.DateSentFinalAssessment   as 'Final Assessment Date',	
				        c.DatePaid as 'Date Paid',	
				        c.GateInAtPort as 'Gate In(Date/Time)',
				        c.GateOutAtPort as 'Gate Out(Date/Time)',
				        c.TargetDeliveryDate as 'Target Delivery Date',
				        c.ActualDeliveryAtWarehouse  as 'Actual Date Delivered',
				        c.StartOfStorage as 'Date Start of Storage',
				        f.Storage  as 'Total Storage',
				        c.StartOfDemorage as 'Date Start of Demurrage',
				        f.Demorage as 'Total Demurrage',



		              	 (COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  + 
					      COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  
					      COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + 
					      COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + 
					      COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + 
					      COALESCE(f.OtherFees,0)) AS 'Running Charges', h.Description as 'Status Report'
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
										a.PurchaseOrderNo = '$poNum'  group by f.JobFileId");
		}else{
			$query = $this->db->query("SELECT  group by f.JobFileId
									   a.JobFileNo, a.ATA, a.HouseBillLadingNo, c.ProductName, a.DatePickUpOtherDocs, b.DateSentPreAssessment, b.DateSentFinalAssessment, b.DatePaid, b.TargetDeliveryDate, b.DateReceivedAtWhse, f.StorageFee, (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Running Charges', h.Description
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

							//download as csv
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_consolidate.csv', $data);
  }

}


?>