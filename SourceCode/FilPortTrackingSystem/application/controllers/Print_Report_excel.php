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

function csv_run_charge_consignee(){
    $conditions = '';
	$execQuery = '';
	$preQuery = '';

//$monitoringType,$consigneeID,$ataFrom,$ataTo,$charges



	       	$ataFrom        = $this->session->volume_ataFrom;
          	$charges        = $this->session->volume_charges;
          	$ataTo          = $this->session->volume_ataTo;
          	$monitoringType = $this->session->volume_monitoringType;
          	$consigneeID    = $this->session->volume_consigneeID;

		        if($monitoringType==1){
		        	$montype_message = ' Sea Freight Manila';
		        }elseif($monitoringType==2){
		        	$montype_message = ' Sea Freight Outport';
		        }else{
		        	$montype_message = ' Air Freight';
		        }
		

		if($monitoringType == 1 || $monitoringType == 2){

			if($charges != "*"){
				//COALESCE(f.".$charges.",0) as 'Total ".$charges."'
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
						    c.TargetDeliveryDate as 'Delivery Date', 
							(select count(*) from vw_Containers  as cons
							 WHERE  cons.JobFileId = f.JobFileId) as Volume,f.".$charges."";

			}else{
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
							c.TargetDeliveryDate as 'Delivery Date ',
							(select count(*) from vw_Containers  as cons
							 WHERE  cons.JobFileId = b.JobFileId) as Volume,
							f.LodgementFee as 'Lodgement Fee',
							f.THCCharges as  'THC Charges',
							f.Arrastre,
							f.Wharfage,
							f.Weighing,
							f.DispatchFee as 'Dispatch Fee',
							f.DEL,f.SRAApplication as 'SRAApplication',
							f.SRAInspection as 'SRA Inspection',
							f.BAIApplication  as 'BAI Application',
							f.BAIInspection as 'BAI Inspection',
							f.BPIInspection as 'BPIInspection',
							f.OtherFees as 'OtherFees'

							 ";
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
							 Distinct(a.JobFileNo), a.ATA as 'Actual Arrival Time', d." . $charges ."
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}else{

				$preQuery = "SELECT 
							 Distinct(a.JobFileNo), a.ATA as 'Actual Arrival Time',b.TargetDeliveryDate as 'Delivery Date',
							 prod.GrossWeight as 'Gross Weight',d.LodgementFee as 'Lodgement Fee',
							 d.BreakBulkFee as 'BreakBulk Fee',d.StorageFee as 'Storage Fee',
							 d.BadCargoOrderFee as 'Bad Cargo',d.VCRC,d.CNI,d.CNIU,d.OtherFees as 'Other Fees'
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 LEFT JOIN vw_ProductsAir AS  prod  ON prod.JobFile_AirId= a.JobFile_AirId

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
						" . $conditions . " ";

			$query = $this->db->query($execQuery);
		}
		//echo $execQuery;
						    $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);
}

function csv_run_charge_admin(){
    $conditions = '';
	$execQuery = '';
	$preQuery = '';

//$monitoringType,$consigneeID,$ataFrom,$ataTo,$charges


	       	$ataFrom        = $this->session->volume_ataFrom;
          	$charges        = $this->session->volume_charges;
          	$ataTo          = $this->session->volume_ataTo;
          	$monitoringType = $this->session->volume_monitoringType;
          	$consigneeID    = $this->session->volume_consigneeID;

	         if($monitoringType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monitoringType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }



		

		if($monitoringType == 1 || $monitoringType == 2){

			if($charges != "*"){
				//COALESCE(f.".$charges.",0) as 'Total ".$charges."'
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
						    c.TargetDeliveryDate as 'Delivery Date', 
							(select count(*) from vw_Containers  as cons WHERE  cons.JobFileId = b.JobFileId) as Volume,
							f.".$charges."";

			}else{
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
							c.TargetDeliveryDate as 'Delivery Date ',
							(select count(*) from vw_Containers  as cons  WHERE  cons.JobFileId = b.JobFileId) as Volume,
							f.LodgementFee as 'Lodgement Fee',
							f.THCCharges as  'THC Charges',
							f.Arrastre,
							f.Wharfage,
							f.Weighing,
							f.DispatchFee as 'Dispatch Fee',
							f.DEL,f.SRAApplication as 'SRAApplication',
							f.SRAInspection as 'SRA Inspection',
							f.BAIApplication  as 'BAI Application',
							f.BAIInspection as 'BAI Inspection',
							f.BPIInspection as 'BPIInspection',
							f.OtherFees as 'OtherFees'

							 ";
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
							 a.JobFileNo, a.ATA, b.TargetDeliveryDate as 'Delivery Date',a.Aircraft, d." . $charges ."
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}else{
				$preQuery = "SELECT 
							 a.JobFileNo, a.ATA, b.TargetDeliveryDate as 'Delivery Date', a.Aircraft, d.LodgementFee,
							 d.BreakBulkFee,d.StorageFee,d.BadCargoOrderFee,d.VCRC,d.CNI,d.CNIU,d.OtherFees
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
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);
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

	         if($monitoringType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monitoringType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }



		

		if($monitoringType == 1 || $monitoringType == 2){

			if($charges != "*"){
				//COALESCE(f.".$charges.",0) as 'Total ".$charges."'
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
						    c.TargetDeliveryDate as 'Delivery Date', 
						    (select count(*) from vw_Containers  as cons WHERE  cons.JobFileId = b.JobFileId) as Volume,
						    f.".$charges."";

			}else{
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime,
							c.TargetDeliveryDate as 'Delivery Date ',
							(select count(*) from vw_Containers  as cons WHERE  cons.JobFileId = b.JobFileId) as Volume,
							f.LodgementFee as 'Lodgement Fee',
							f.THCCharges as  'THC Charges',
							f.Arrastre,
							f.Wharfage,
							f.Weighing,
							f.DispatchFee as 'Dispatch Fee',
							f.DEL,f.SRAApplication as 'SRAApplication',
							f.SRAInspection as 'SRA Inspection',
							f.BAIApplication  as 'BAI Application',
							f.BAIInspection as 'BAI Inspection',
							f.BPIInspection as 'BPIInspection',
							f.OtherFees as 'OtherFees'

							 ";
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
							 a.JobFileNo, a.ATA as 'Actual Arrival Time', b.TargetDeliveryDate as 'Delivery Date', d." . $charges ."
							 FROM 
							 JobFile_Air a
							 LEFT JOIN Products_Air AS b ON b.JobFile_AirId = a.JobFile_AirId 
							 ";
			}else{
				$preQuery = "SELECT 
							 a.JobFileNo, a.ATA as 'Actual Arrival Time', b.TargetDeliveryDate as 'Delivery Date', 
						     b.GrossWeight,d.LodgementFee,
							 d.BreakBulkFee,d.StorageFee,d.BadCargoOrderFee,d.VCRC,d.CNI,d.CNIU,d.OtherFees
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
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);
}



function csv_running_charges_admin(){
	    $PO_Number          =  $this->input->get('po_num');  
        $monitoringType     =  $this->input->get('montype');
        $consigneeID        =  $this->input->get('consigneeId');


        if($monitoringType==1){
        	$montype_message = ' Sea Freight Manila';
        }elseif($monitoringType==2){
        	$montype_message = ' Sea Freight Outport';
        }else{
        	$montype_message = ' Air Freight';
        }

		if($monitoringType == 1 || $monitoringType == 2){
			$query = $this->db->query(" select 


								`C`.`ConsigneeName`,
								`J`.`JobFileNo`,
								`J`.`PurchaseOrderNo` as 'PI / PO Number ',
								(SELECT count(*) FROM vw_Containers as cons WHERE cons.JobFileNo=J.JobFileNo) as 'Volume',
		                        `RC`.`LodgementFee` as 'Lodgement Fee' ,
							    `RC`.`ContainerDeposit` as 'Container Deposit',
								`RC`.`THCCharges` as 'THC Charges',
								`RC`.`Arrastre`,
								`RC`.`Wharfage`,
								`RC`.`Weighing`,
								`RC`.`DispatchFee` as 'Dispatch Fee',
								`RC`.`DEL`,
								`RC`.`Storage` as 'Storage Fee' ,
								`RC`.`Demorage` as 'Demurrage Fee',
								`RC`.`Detention` as 'Detention Fee',
								`RC`.`EIC`,
								`RC`.`BadCargo`,
								`RC`.`SRAApplication`as 'SRA Application',
								`RC`.`SRAInspection` as 'SRA Processing Fee',
								`RC`.`PlugInForReefer`as 'Plug In For Reefer',
								`RC`.`BAIApplication`as 'BAI Application',
								`RC`.`BAIInspection` as 'BAI Inspection Fee',
								`RC`.`BPIInspection` as 'BPI Inspection Fee',
								`RC`.`OtherFees`     as 'Other Fees',
								
								(COALESCE(RC.LodgementFee,0) + COALESCE(RC.ContainerDeposit,0)  +  COALESCE(RC.THCCharges,0)  +  COALESCE(RC.Arrastre,0) + COALESCE(RC.Wharfage,0) + COALESCE(RC.Weighing,0) +  COALESCE(RC.DEL,0) +  COALESCE(RC.DispatchFee,0) + COALESCE(RC.Storage,0) + COALESCE(RC.Demorage,0) + COALESCE(RC.Detention,0) + COALESCE(RC.BAIApplication,0) + COALESCE(RC.BAIInspection,0) + COALESCE(RC.SRAApplication,0) + COALESCE(RC.SRAInspection,0)  + COALESCE(RC.OtherFees,0)+COALESCE(RC.BadCargo,0)+COALESCE(RC.PlugInForReefer,0)+
							    	COALESCE(RC.EIC,0) +
								    COALESCE(RC.BPIInspection,0)) AS 'Total Running Charges',


									 CBC.ContainerNo,
								     P.ProductName

									   
										from JobFile J
										inner JOIN RunningCharges RC ON RC.JobFileId = J.JobFileId 
										JOIN CarrierByJobFile CBJ ON CBJ.JobFileId = J.JobFileId
										JOIN ContainerByCarrier CBC ON CBC.CarrierByJobFileId = CBJ.CarrierByJobFileId
										JOIN ProductsByContainer PBC ON PBC.ContainerByCarrierId = CBC.ContainerByCarrierId
										JOIN Products P ON P.ProductId = PBC.ProductId
										JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
										where J.PurchaseOrderNo = '$PO_Number' AND MonitoringTypeId = '$monitoringType'
										");
		}else{
			$query = $this->db->query("select 
									   C.ConsigneeName,
									   J.JobFileNo,
									   J.PurchaseOrderNo as 'PI / PO Number ',
									    (SELECT prod.GrossWeight FROM vw_ProductsAir as prod where prod.JobFileNo= J.JobFileNo)
									    as 'Gross Weight(kg)',
					                   RC.LodgementFee,RC.BreakBulkFee,RC.StorageFee,
					                   RC.BadCargoOrderFee,RC.VCRC,RC.CNI,RC.CNIU,RC.OtherFees,

					                   (COALESCE(RC.LodgementFee,0)+COALESCE(RC.BreakBulkFee,0) + COALESCE(RC.StorageFee,0)+COALESCE(RC.BadCargoOrderFee,0)+COALESCE(RC.VCRC,0)+COALESCE(RC.CNI,0)+COALESCE(RC.CNIU,0)+COALESCE(RC.OtherFees,0)) as 'Total Running Charges',PROD.ProductName

											
											from JobFile_Air J
											JOIN RunningCharges_Air RC ON RC.JobFile_AirId = J.JobFile_AirId
											LEFT JOIN  vw_productsair PROD ON 
											PROD.JobFile_AirId = J.JobFile_AirId
											JOIN  Consignee C ON C.ConsigneeId = J.ConsigneeId
											where J.PurchaseOrderNo = '$PO_Number'
											");

		}
				
				        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);
}


			function csv_running_charges(){
		          $PO_Number            =  $this->input->get('po_num');  
		          $monType       =  $this->input->get('montype');
		          $userID               =  $this->input->get('userId');
		          $jbNo            =  $this->input->get('jobfile'); 


			       if($monType==1){
			        	$montype_message = ' Sea Freight Manila';
			        }elseif($monType==2){
			        	$montype_message = ' Sea Freight Outport';
			        }else{
			        	$montype_message = ' Air Freight';
			        }


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

								////EIC,ContainerDeposit,BadCargo,PlugInForReefer
								$query= $this->db->query("select 
							    `R`.`LodgementFee` as 'Lodgement Fee' ,
							    `R`.`ContainerDeposit` as 'Container Deposit',
								`R`.`THCCharges` as 'THC Charges',
								`R`.`Arrastre`,
								`R`.`Wharfage`,
								`R`.`Weighing`,
								`R`.`DispatchFee` as 'Dispatch Fee',
								`R`.`DEL`,
								`R`.`Storage` as 'Storage Fee' ,
								`R`.`Demorage` as 'Demurrage Fee',
								`R`.`Detention` as 'Detention Fee',
								`R`.`EIC`,
								`R`.`BadCargo`,
								`R`.`SRAApplication`as 'SRA Application',
								`R`.`SRAInspection` as 'SRA Processing Fee',
								`R`.`PlugInForReefer`as 'Plug In For Reefer',
								`R`.`BAIApplication`as 'BAI Application',
								`R`.`BAIInspection` as 'BAI Inspection Fee',
								`R`.`BPIInspection` as 'BPI Inspection Fee',
								`R`.`OtherFees`     as 'Other Fees',
								
								(COALESCE(R.LodgementFee,0) + COALESCE(R.ContainerDeposit,0)  +  COALESCE(R.THCCharges,0)  +  COALESCE(R.Arrastre,0) + COALESCE(R.Wharfage,0) + COALESCE(R.Weighing,0) +  COALESCE(R.DEL,0) +  COALESCE(R.DispatchFee,0) + COALESCE(R.Storage,0) + COALESCE(R.Demorage,0) + COALESCE(R.Detention,0) + COALESCE(R.BAIApplication,0) + COALESCE(R.BAIInspection,0) + COALESCE(R.SRAApplication,0) + COALESCE(R.SRAInspection,0)  + COALESCE(R.OtherFees,0)+COALESCE(R.BadCargo,0)+COALESCE(R.PlugInForReefer,0)+
							    	COALESCE(R.EIC,0) +
								    COALESCE(R.BPIInspection,0)) AS 'Running Charges',








								 `R`.`ParticularCharges` as ' ',`P`.`ContainerNo`,`P`.`ProductName` AS Commodity

								 from vw_RunningCharges as R   

					             LEFT JOIN vw_Products as P
								  ON `R`.`JobFileNo`=`P`.`JobFileNo`
								  where `R`.`JobFileNo`='$jbNo'");
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
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);
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

			if($monType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }
		
		if($monType =='1' || $monType == '2'){
			
			$preQuery = "SELECT a.JobFileNo,(SELECT count(*) FROM vw_Containers  as contain WHERE contain.JobFileId=f.JobFileId ) 
			as 'Volume', b.ActualArrivalTime, e.ProductName as 'Commodity',(COALESCE(f.LodgementFee,0) + COALESCE(f.ContainerDeposit,0)  +  COALESCE(f.THCCharges,0)  +  COALESCE(f.Arrastre,0) + COALESCE(f.Wharfage,0) + COALESCE(f.Weighing,0) +  COALESCE(f.DEL,0) +  COALESCE(f.DispatchFee,0) + COALESCE(f.Storage,0) + COALESCE(f.Demorage,0) + COALESCE(f.Detention,0) + COALESCE(f.EIC,0) + COALESCE(f.BAIApplication,0) + COALESCE(f.BAIInspection,0) + COALESCE(f.SRAApplication,0) + COALESCE(f.SRAInspection,0) + COALESCE(f.BadCargo,0) + COALESCE(f.OtherFees,0)) AS 'Running Charges'
						 FROM 
						 JobFile a
						 inner JOIN CarrierByJobFile    AS b ON a.JobFileId = b.JobFileId
						 left JOIN ContainerByCarrier  AS c ON b.CarrierByJobFileId = c.CarrierByJobFileId
						 inner JOIN ProductsByContainer AS d ON c.ContainerByCarrierId = d.ContainerByCarrierId
						 LEFT JOIN Products 		   AS e ON d.ProductId = e.ProductId
						 inner JOIN RunningCharges 	   AS f ON a.JobFileId = f.JobFileId
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
				$preQuery = "SELECT a.JobFileNo,b.GrossWeight as 'Gross Weight', a.ATA as 'Actual Arrival Time', c.ProductName as 'Commodity',(COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Running Charges'
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
			        force_download('CSV_Report_Volume-'.$montype_message.'.csv', $data);


 }


 function truck_booking(){
      

 	        $ataFrom = $this->session->truck_ataFrom;
          	$ataTo = $this->session->truck_ataTo;
          	$monType = $this->session->truck_monitoringType;
          	$cID = $this->session->truck_cID;

            if($monType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }


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
										      b.TargetDeliveryDate,a.JobFileNo, a.NoOfCartons as 'Number of Cartons', 
										      b.GrossWeight as 'Gross Weight',
										      c.ProductName as 'Commodity',
										      CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin,
										      f.StorageFee as 'Total Storage' ,
										      (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) 
										          AS 'Total Running Charges',
										      a.Forwarder as 'Air Line/Forwarder'
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
			        force_download('CSV_Report_Truck_booking='.$montype_message.'.csv', $data);
 }

  function truck_booking_admin(){
      

 	        $ataFrom = $this->session->truck_ataFrom;
          	$ataTo = $this->session->truck_ataTo;
          	$monType = $this->session->truck_monitoringType;
          	$cID = $this->session->truck_cID;

            if($monType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }


          			if($monType == 1){
			$query = $this->db->query("SELECT c.TargetDeliveryDate as 'TargetDeliveryDate' ,a.JobFileNo, c.ContainerNo,e.ProductName as Commodity, CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin, c.GateInAtPort as 'Gate In(Date/Time)' , c.GateOutAtPort as 'Gate Out(Date/Time)', c.ActualDeliveryAtWarehouse as 'Actual Delivery Date', CR.CarrierName as 'Shipping Line',HT.HaulerOrTruck as 'Trucking Company'
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
							     c.ActualDeliveryAtWarehouse as 'Actual Delivery Date',CR.CarrierName as 'Shipping Line',
							     HT.HaulerOrTruck as 'Trucking Company'
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
										      b.TargetDeliveryDate,a.JobFileNo, a.NoOfCartons as 'Number of Cartons', 
										      b.GrossWeight as 'Gross Weight',
										      c.ProductName as 'Commodity',
										      CONCAT(TRIM(g.CountryName), ', ' , a.OriginCity) AS Origin,
										      a.Forwarder as 'Air Line/Forwarder'
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
			        force_download('CSV_Report_Truck_booking='.$montype_message.'.csv', $data);
 }


  function csv_consolidate(){
  	       	$ataFrom = $this->session->consolidate_ataFrom;
          	$ataTo   = $this->session->consolidate_ataTo;
          	$monType = $this->session->consolidate_monitoringType;
          	$poNum   = $this->session->consolidate_poNum;

            if($monType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }



          	$userid = $this->userids();

          	//$monType,$ataFrom,$ataTo,$poNum
//c.ContainerNo, b.EstArrivalTime,
		if($monType ==1){
			$query = $this->db->query("SELECT a.JobFileNo, b.ActualArrivalTime,
				       (select count(*) from vw_Products as prod where prod.JobFileId=f.JobFileId)as Volume,c.ContainerNo,a.HouseBillLadingNo as 'HBL',
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
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum' group by c.ContainerNo");
	    }elseif ($monType == 2) {
	    				$query = $this->db->query("SELECT a.JobFileNo, b.ActualArrivalTime,
				       (select count(*) from vw_Products as prod where prod.JobFileId=f.JobFileId)as Volume,c.ContainerNo,a.HouseBillLadingNo as 'HBL',
				        e.ProductName as Commodity , a.DateReceivedOfOtherDocs as 'Date Received Docs',
				        c.DateSentPreAssessment as 'Pre-Assessment Date',
				        c.DateSentFinalAssessment   as 'Final Assessment Date',	
				        c.DatePaid as 'Date Paid',
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
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'  group by c.ContainerNo");
	    
		}else{
			$query = $this->db->query("SELECT 
									   a.JobFileNo, a.ATA as 'Actual Arrival Time',
									   b.GrossWeight as 'Gross Weight',
									   a.HouseBillLadingNo as 'House Airway Bill No.',
									   c.ProductName as 'Commodity', a.DatePickUpOtherDocs as 'Date Recieved Docs ', 
									   b.DateSentPreAssessment as 'Pre-Assessment Date', 
									   b.DateSentFinalAssessment as 'Final Assessment Date', b.DatePaid as 'Date Paid',
									   b.TargetDeliveryDate as 'Target Delivery Date', b.DateReceivedAtWhse as 'Actual Date of Delivery',
									    f.StorageFee as 'Total Storage', (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Running Charges', h.Description as 'Status Report'
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
										a.PurchaseOrderNo = '$poNum'");
		}

							//download as csv
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_consolidate-'.$montype_message.'.csv', $data);
  }


  function csv_consolidate_admin(){
  	  	       	$ataFrom = $this->session->consolidate_ataFrom;
          	$ataTo   = $this->session->consolidate_ataTo;
          	$monType = $this->session->consolidate_monitoringType;
          	$poNum   = $this->session->consolidate_poNum;


          	if($monType==1){
	        	$montype_message = ' Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Sea Freight Outport';
	        }else{
	        	$montype_message = ' Air Freight';
	        }

          	//$monType,$ataFrom,$ataTo,$poNum
//c.ContainerNo, b.EstArrivalTime,
		if($monType == 1){
			$query = $this->db->query("SELECT a.JobFileNo, b.ActualArrivalTime,
				       (select count(*) from vw_Containers as con where con.JobFileId=f.JobFileId)as Volume,c.ContainerNo,a.HouseBillLadingNo as 'HBL',
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
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'  group by c.ContainerNo   ");
		}elseif ($monType == 2) {
						$query = $this->db->query("SELECT a.JobFileNo, b.ActualArrivalTime,
				       (select count(*) from vw_Containers as con where con.JobFileId=f.JobFileId)as Volume,c.ContainerNo,a.HouseBillLadingNo as 'HBL',
				        e.ProductName as Commodity , a.DateReceivedOfOtherDocs as 'Date Received Docs',
				        c.DateSentPreAssessment as 'Pre-Assessment Date',
				        c.DateSentFinalAssessment   as 'Final Assessment Date',	
				        c.DatePaid as 'Date Paid',	
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
										a.MonitoringTypeId = '$monType'
										AND
										a.PurchaseOrderNo = '$poNum'  group by c.ContainerNo  ");
		}else{
			$query = $this->db->query("SELECT  
										   a.JobFileNo, a.ATA as 'Actual Arrival Time',
									   b.GrossWeight as 'Gross Weight',
									   a.HouseBillLadingNo as 'House Airway Bill No.',
									   c.ProductName as 'Commodity', a.DatePickUpOtherDocs as 'Date Recieved Docs ', 
									   b.DateSentPreAssessment as 'Pre-Assessment Date', 
									   b.DateSentFinalAssessment as 'Final Assessment Date', b.DatePaid as 'Date Paid',
									   b.TargetDeliveryDate as 'Target Delivery Date', b.DateReceivedAtWhse as 'Actual Date of Delivery',
									    f.StorageFee as 'Total Storage', (COALESCE(f.LodgementFee,0) + COALESCE(f.BreakBulkFee,0)  +  COALESCE(f.StorageFee,0)  +  COALESCE(f.BadCargoOrderFee,0) + COALESCE(f.VCRC,0) + COALESCE(f.CNI,0) +  COALESCE(f.CNIU,0) +  COALESCE(f.OtherFees,0)) AS 'Running Charges', h.Description as 'Status Report'
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
										a.PurchaseOrderNo = '$poNum'");
		}

							//download as csv
			        $delimiter = ",";
			        $newline = "\r\n";
			        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
			        force_download('CSV_Report_consolidate-'.$montype_message.'.csv', $data);
  }

    //get the current userid
  function userids(){
              $session_data = $this->session->userdata('logged_in');
             return  $userid = $session_data['uid'];       
    }

}


?>