   <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_Report_excel extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
             $this->load->model('RunningCharges_Reports','Charges');
             $this->load->model('Jobdata');  
             $this->load->model('Excel_data');		
             $this->load->dbutil();
	         $this->load->helper('file');
	         $this->load->helper('download');
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
            $userID         = $this->session->volume_userid;


		        if($monitoringType==1){
		        	$montype_message = ' Sea Freight Manila';
		        }elseif($monitoringType==2){
		        	$montype_message = ' Sea Freight Outport';
		        }else{
		        	$montype_message = ' Air Freight';
		        }

		         $this->script_dl_csv($montype_message);
		        $this->createDocToPrint_volume_client($monitoringType,$userID,$consigneeID,$ataFrom,$ataTo,$charges);
		       
		


}

function csv_run_charge_admin(){
/*    $conditions = '';
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
							a.JobFileNo, b.ActualArrivalTime as 'Actual Arrival',
						    c.TargetDeliveryDate as 'Delivery Date', 
							(select count(*) from vw_Containers  as cons WHERE  cons.JobFileId = b.JobFileId) as Volume,
							f.".$charges."";

			}else{
				$preQuery = "SELECT 
							a.JobFileNo, b.ActualArrivalTime as 'Actual Arrival',
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
			        force_download('CSV_Report_RunningCharges-'.$montype_message.'.csv', $data);*/
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
	        	$montype_message = ' Running Charges Report - Sea Freight Manila';
	        }elseif($monitoringType==2){
	        	$montype_message = ' Running Charges Report - Sea Freight Outport';
	        }else{
	        	$montype_message = ' Running Charges Report -Air Freight';
	        }
	        	$this->script_dl_csv($montype_message);
				$this->createDocToPrint_volume_admin($monitoringType,$consigneeID,$ataFrom,$ataTo,$charges);
				
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

         $this->script_dl_csv($montype_message);

          $pre_details = $this->Charges->get_PO($monitoringType,$PO_Number,$consigneeID);

          $get_containerDetails =  $this->Charges->getContainerDetails($monitoringType,$pre_details->JobFileNo);
          $charge               =  $this->getCharges($pre_details->JobFileNo,$monitoringType);
          //$commodity            =  $this->getGoods($pre_details->JobFileNo,$monitoringType);
          $volume               =  $this->Charges->getVolume($monitoringType,$pre_details->JobFileNo);

         
}


			function csv_running_charges(){
		          $PO_Number            =  $this->input->get('po_num');  
		          $monitoringType       =  $this->input->get('montype');
		          $userID               =  $this->input->get('userId');
		          $searchBy               =  $this->input->get('type');
		          //$jbNo            =  $this->input->get('jobfile'); 




			       if($monitoringType==1){
			        	$montype_message = ' Sea Freight Manila';
			        }elseif($monitoringType==2){
			        	$montype_message = ' Sea Freight Outport';
			        }else{
			        	$montype_message = ' Air Freight';
			        }

			   if($searchBy == 'PO'){
               $pre_details =  $this->Charges->getPre_Details_RunningCharges_PO($monitoringType,$PO_Number,$userID);
               }else{
               $pre_details =  $this->Charges->getPre_Details_RunningCharges_HBL($monitoringType,$PO_Number,$userID);
               }

               	$this->script_dl_csv($montype_message);	
                $get_containerDetails =  $this->Charges->getContainerDetails($monitoringType,$pre_details->JobFileNo);
                $charge               =  $this->getCharges($pre_details->JobFileNo,$monitoringType);
                //$commodity            =  $this->getGoods($pre_details->JobFileNo,$monitoringType);
                $volume               =  $this->Charges->getVolume($monitoringType,$pre_details->JobFileNo);

                
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
	        	$montype_message = ' Volume Reports-Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Volume Reports-Sea Freight Outport';
	        }else{
	        	$montype_message = ' Volume Reports-Air Freight';
	        }
	    $this->script_dl_csv($montype_message);
		$this->createDocToPrint($cID,$prodId,$frm,$to,$monType);
		



 }



 function truck_booking(){
      

 	        $ataFrom = $this->session->truck_ataFrom;
          	$ataTo = $this->session->truck_ataTo;
          	$monType = $this->session->truck_monitoringType;
          	$cID = $this->session->truck_cID;

            if($monType==1){
	        	$montype_message = ' Truck Booking Reports(client)-Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = ' Truck Booking Reports(client)-Sea Freight Outport';
	        }else{
	        	$montype_message = ' Truck Booking Reports(client)-Air Freight';
	        }
	    $this->script_dl_csv($montype_message);
        $this->loadReportTruck_client($monType,$cID,$ataFrom,$ataTo);
    	
  
 }

  function truck_booking_admin(){
      

 	        $ataFrom = $this->session->truck_ataFrom;
          	$ataTo = $this->session->truck_ataTo;
          	$monType = $this->session->truck_monitoringType;
          	$cID = $this->session->truck_cID;

            if($monType==1){
	        	$montype_message = 'Truck Booking Reports(admin)- Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = 'Truck Booking Reports(admin)- Sea Freight Outport';
	        }else{
	        	$montype_message = 'Truck Booking Reports(admin)- Air Freight';
	        }
	            $this->script_dl_csv($montype_message);
	        	$this->loadReportTruck_admin($monType,$cID,$ataFrom,$ataTo);
	        	
	    



 }


  function csv_consolidate(){
  	       	$ataFrom = $this->session->consolidate_ataFrom;
          	$ataTo   = $this->session->consolidate_ataTo;
          	$monType = $this->session->consolidate_monitoringType;
          	$poNum   = $this->session->consolidate_poNum;
          	$userid = $this->userids();
            if($monType==1){
	        	$montype_message = 'Consolidate Reports(client) -  Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = 'Consolidate Reports(client) - Sea Freight Outport';
	        }else{
	        	$montype_message = 'Consolidate Reports(client) - Air Freight';
	        }


				$this->loadConsolidatedDocs_client($monType,$userid,$ataFrom,$ataTo,$poNum);
			    $this->script_dl_csv($montype_message);

  }


  function csv_consolidate_admin(){
  	  	   	$ataFrom = $this->session->consolidate_ataFrom;
          	$ataTo   = $this->session->consolidate_ataTo;
          	$monType = $this->session->consolidate_monitoringType;
          	$poNum   = $this->session->consolidate_poNum;


          	if($monType==1){
	        	$montype_message = 'Consolidate Reports(admin) - Sea Freight Manila';
	        }elseif($monType==2){
	        	$montype_message = 'Consolidate Reports(admin) - Sea Freight Outport';
	        }else{
	        	$montype_message = 'Consolidate Reports(admin) - Air Freight';
	        }

	         $this->loadConsolidatedDocs_admin($monType,$ataFrom,$ataTo,$poNum);
	         $this->script_dl_csv($montype_message);

  }

    //get the current userid
  function userids(){
              $session_data = $this->session->userdata('logged_in');
             return  $userid = $session_data['uid'];       
    }




    /*output view page
    #
	#
	#
    */

      function getCharges($jbNo, $monitoringType){
        $charges = $this->Charges->getRunningCharges($monitoringType, $jbNo);
        $goods = $this->Charges->getCommodities($monitoringType,$jbNo);
       $commoditiesOutput = '';
            if($monitoringType == 1 || $monitoringType == 2){
             $total = 0;
           $total += $charges->LodgementFee;
           $total += $charges->THCCharges;
           $total += $charges->Arrastre;
           $total += $charges->Weighing;
           $total += $charges->Wharfage;
           $total += $charges->DispatchFee;
           $total += $charges->DEL;
           $total += $charges->Storage;
           $total += $charges->Demorage;
           $total += $charges->Detention;
           $total += $charges->SRAApplication;
           $total += $charges->SRAInspection;
           $total += $charges->BAIApplication;
           $total += $charges->BAIInspection;
           $total += $charges->BPIInspection;
           $total += $charges->OtherFees;

           $total += $charges->PlugInForReefer;
           $total += $charges->BadCargo;
           $total += $charges->ContainerDeposit;
           $total += $charges->EIC;
 //<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        $chargesOutput = '<div style="width:100%;">
				<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                  <table class="table-bordered table">';   
          $chargesOutput.='
				
	      <tr>
	        <th>Lodgement Fee </th>
	        <th>Container Deposit</th>
	        <th>THC Charges</th>
	        <th>Arrastre</th>
	        <th>Wharfage</th>
	        <th>Weighing</th>
	        <th>Dispatch Fee</th>
	        <th>DEL</th>
	        <th>Storage Fee</th>
	        <th>Demurrage Fee</th>
	        <th>EIC</th>
	        <th>Bad Cargo</th>
	        <th>Detention Fee</th>
	        <th>SRA Application</th>
	        <th>SRA Processing Fee</th>
	        <th>Plug In For Reefer</th>
	        <th>BAI Application</th>
	        <th>BAI Inspection Fee</th>
	        <th>BPI Inspection Fee</th>
	        <th>Other Fees</th>
	        <th>Total</th>
	        <th></th>
	        <th></th>
	        <th></th>
	        <th>Container No.</th>
	        <th>Commodity</th>
	        </tr>

	    <tr>
        <tr>
		   
                   <td>' . number_format($charges->LodgementFee , 2, '.', ','). '</td>
                   <td>' . number_format($charges->ContainerDeposit , 2, '.', ',') .'</td>
                   <td>' . number_format($charges->THCCharges, 2, '.', ',') . '</td>
                   <td>' . number_format($charges->Arrastre, 2, '.', ',') . ' </td>
                   <td>' . number_format($charges->Wharfage, 2, '.', ',') . ' </td>

                   <td>' . number_format($charges->Weighing , 2, '.', ','). '</td>
                   <td>' . number_format($charges->DispatchFee , 2, '.', ',') .'</td>
                   <td>' . number_format($charges->DEL, 2, '.', ',') . '</td>
                   <td>' . number_format($charges->Storage, 2, '.', ',') . ' </td>
                   <td>' . number_format($charges->Demorage, 2, '.', ',') . ' </td>

                   <td>' . number_format($charges->EIC , 2, '.', ','). '</td>
                   <td>' . number_format($charges->BadCargo , 2, '.', ',') .'</td>
                   <td>' . number_format($charges->Detention, 2, '.', ',') . '</td>
                   <td>' . number_format($charges->SRAApplication, 2, '.', ',') . ' </td>
                   <td>' . number_format($charges->SRAInspection, 2, '.', ',') . ' </td>

                   <td>' . number_format($charges->PlugInForReefer , 2, '.', ','). '</td>
                   <td>' . number_format($charges->BAIApplication , 2, '.', ',') .'</td>
                   <td>' . number_format($charges->BAIInspection, 2, '.', ',') . '</td>
                   <td>' . number_format($charges->BPIInspection, 2, '.', ',') . ' </td>
                   <td>' . number_format($charges->OtherFees, 2, '.', ',') . ' </td>

                   <td>' .number_format($total, 2, '.', '').'</td>
				   <td></td>
				   <td></td>
				   <td></td>	
                   ';

                   	   $i=0;
                       foreach($goods as $row){ 
                       $i++;
                        if($i==1){
                         $chargesOutput .='<td>'.stripslashes($row->ContainerNo).'</td>';
                         $chargesOutput .='<td>'.stripslashes($row->ProductName).'</td>';
                        }
                       if(($i>1)&&(count($goods>1))){
                         $chargesOutput.='<tr>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';	
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';	
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';	
                         $chargesOutput.='<td></td>';
                       	 $chargesOutput .='<td>'.stripslashes($row->ContainerNo).'</td>';
                         $chargesOutput .='<td>'.stripslashes($row->ProductName).'</td>';
                          $chargesOutput.='</tr>';

                       }
        		      }

        	   $chargesOutput.= '</tr>';
           // $chargesOutput.= '<tr>';          
          // $chargesOutput.= '</tr>';

        $chargesOutput.='</table>
                 </div>';     
            }else{
             $total = 0;
           $total += $charges->LodgementFee;
           $total += $charges->BreakBulkFee;
           $total += $charges->StorageFee;
           $total += $charges->BadCargoOrderFee;
           $total += $charges->VCRC;
           $total += $charges->CNI;
           $total += $charges->CNIU;
           $total += $charges->OtherFees;

        $chargesOutput = '<div style="width:100%;">
                  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">     
                   <table class="table-bordered table">';     
        $chargesOutput .= '<tr>
                            <th>Lodgement Fee</th>
                            <th>Break Bulk Fee</th>
                            <th>Storage Fee </th>
                            <th>Bad Cargo Fee </th>
                            <th>VCRC</th>
                            <th>CNI</th>
                            <th>CNIU</th>
                            <th>Other Fees</th>
                            <th>TOTAL</th>

			                <th></th>
	                        <th></th>
	         				<th></th>
	        				<th>Commodity</th>
						  </tr>';
		$chargesOutput .='<tr>
							  <td>' . number_format($charges->LodgementFee , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->BreakBulkFee , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->StorageFee , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->BadCargoOrderFee , 2, '.', ','). '</td>
  					          <td>' . number_format($charges->VCRC , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->CNI , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->CNIU , 2, '.', ','). '</td>
  							  <td>' . number_format($charges->OtherFees , 2, '.', ','). '</td>

  							    <td>' .number_format($total, 2, '.', '').'</td>
  							    <td></td>
  							    <td></td>
  							    <td></td>';


  					   $i=0;
                       foreach($goods as $row){ 
                       $i++;
                        if($i==1){
                         $chargesOutput .='<td rowspan="2">'.stripslashes($row->ProductName).'</td>';
                        }
                       if(($i>1)&&(count($goods>1))){
                         $chargesOutput.='<tr>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
                         $chargesOutput.='<td></td>';
      
                         $chargesOutput .='<td>'.stripslashes($row->ProductName).'</td>';
                          $chargesOutput.='</tr>';

                       }
        		      }
        $chargesOutput.=' </tr>';	


     }

    if($total == 0){
      $chargesOutput = '<center><span style="color:red">No Record of Charges </span></center>';
    }       

    echo $chargesOutput;                                      

      }

function createDocToPrint_volume_admin($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges){
         $reportsVolume = $this->Charges->get_Volume_Reports($monitoringType,$consigneeId,$ataFrom,$ataTo,$charges);
          $volume = 0;
         $dispOutput = '';
         $content ='';
         $lodgementFee = 0;
         $thcCharges   = 0;
         $containerdepo = 0;
         $storage = 0;
         $demorage = 0;
         $eic = 0;
         $badcargo = 0;
         $detention = 0;
         $pluginforreefer = 0 ;
         $arrastre     = 0;
         $wharfage     = 0;
         $weighing     = 0;
         $dispatchFee  = 0;
         $del = 0;
         $sraApplication   = 0;
         $sraInspection     = 0;
         $baiApplication     = 0;
         $baiInspection  = 0;
         $bpiInspection  = 0;
         $breakbulkfee = 0;
         $badcargofee     = 0;
         $storagefee = 0;
         $vcrc  = 0;
         $cni  = 0;
         $cniu  = 0;
         $otherfees  = 0;
         $rCharges = 0;
         $tVolume = 0;
          
         $oldJBNo = '';
         $newJBNo = '';
         $monHeader = '';
         $tableHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }
          $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
            $dispOutput .= '
            <html>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">     
     
                <table="table-volume-manila">';

                if($monitoringType == 1 || $monitoringType == 2){

                foreach ($reportsVolume as $row) {

                   
                   if($charges == "*"){
                          if($oldJBNo != $row->JobFileNo){
                        $content .= "<tr>";
                        $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                        $content .= "<td style='padding:10px;'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerDeposit . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Weighing . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DEL . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Storage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Demorage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->EIC . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BadCargo . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Detention . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->PlugInForReefer . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->OtherFees . "</td>";

                            $lodgementFee   += $row->LodgementFee;
                            $containerdepo  += $row->ContainerDeposit;
                            $thcCharges     += $row->THCCharges;
                            $arrastre       += $row->Arrastre;
                            $wharfage       += $row->Wharfage;
                            $weighing       += $row->Weighing;
                            $dispatchFee    += $row->DispatchFee;
                            $del            += $row->DEL;
                            $storage        += $row->Storage;
                            $demorage       += $row->Demorage;
                            $eic            += $row->EIC;
                            $badcargo       += $row->BadCargo;
                            $detention      += $row->Detention;
                            $sraApplication += $row->SRAApplication;
                            $sraInspection  += $row->SRAInspection;
                            $pluginforreefer += $row->PlugInForReefer;
                            $baiApplication += $row->BAIApplication;
                            $baiInspection  += $row->BAIInspection;
                            $bpiInspection  += $row->BPIInspection;
                            $otherfees      += $row->OtherFees;
                            $tVolume        += $volume;
                      }else{
                        $content .= "<tr>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;'><center></center></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";

                      }
                  }else{
                       if($oldJBNo != $row->JobFileNo){
                         $content .= "<tr>";
                         $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                         $tVolume += $volume;
                        $content .= "<td style='padding:10px;'>" .number_format($row->RCharges, 2, '.', ',')."</td>";
                            $rCharges   += $row->RCharges;
                        }else{
                         $content .= "<tr>";
                         $content .= "<td style='padding:10px;'></td>";
                         $content .= "<td style='padding:10px;'></td>";
                         $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;'><center></center></td>";
                         
                        $content .= "<td style='padding:10px;'></td>";
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td  colspan=4 style='padding:10px;'><b>TOTAL </b></td>
                            <td hidden> </td>
                            <td hidden> </td>
                            <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($containerdepo, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($storage, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($demorage, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($eic, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($badcargo, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($detention, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($pluginforreefer, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='padding:10px;'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";

                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container Deposit</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>THC Charges</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Arrastre</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Wharfage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Weighing</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Dispatch Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>DEL</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Storage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Demmurage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>EIC</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BadCargo</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Detention</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Inspection</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Plug in for Reefer</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BPI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                                      </tr>";
                 }else{
                    $total = "<tr>
                               <td style='padding:10px;'><b>TOTAL </b></td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>";
                      $tableHeader .= " <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table class='table table-condensed table-bordered'>
                    <thead>
                       " .   $tableHeader . "
                    </thead>
                    <tbody>
                    " . $content . $total;



                 
            }else{
              foreach ($reportsVolume as $row) {
                  if($oldJBNo != $row->JobFileNo){
                     $content .= "<tr>";
                     $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->JobFileNo . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->ATA . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->TargetDeliveryDate . "</td>";
                  
                    if($charges == "*"){
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->LodgementFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BreakBulkFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->StorageFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BadCargoOrderFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->VCRC . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNI . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNIU . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->OtherFees . "</td>";
                      $tVolume      += $volume;
                      $lodgementFee += $row->LodgementFee;
                      $breakbulkfee += $row->BreakBulkFee;
                      $storagefee   += $row->StorageFee;
                      $badcargofee  += $row->BadCargoOrderFee;
                      $vcrc         += $row->VCRC;
                      $cni          += $row->CNI;
                      $cniu         += $row->CNIU;
                      $otherfees    += $row->OtherFees;

                    }else{
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td style='padding:5px;border:1px solid #ddd;'><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->RCharges . "</td>";
                      $tVolume      += $volume;
                      $rCharges    += $row->RCharges;
                    }
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             if($charges == "*"){
                $total = "<tr>
                            <td colspan=3 style='padding:5px; font-weight:bold;border:1px solid #ddd;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($vcrc, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cni, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cniu, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";
             }else{
                 $total = "<tr>
                            <td colspan=3 style='padding:5px;border:1px solid #ddd;font-weight:bold;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Break Bulk Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Storage Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Bad Cargo Order Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>VCRC</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNI</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNIU</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }else{
              $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> " . $charges . " </th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }
          }
           $dispOutput .= '
              </tbody>
            </table>
          </div> 
        </div>
      </body>
    </html>';


      echo $dispOutput;
  }


   function createDocToPrint($con_id,$prod_id,$frm,$to,$monitoringType){
         $commodityVolume = $this->Charges->getCommodityVolume($con_id,$prod_id,$frm,$to,$monitoringType);
         $cName = $this->Charges->getcName($con_id);
         $volume = 0;
         $tVolume = 0;
         $rCharges = 0;
         $dispOutput = '';
         $content ='';
         $total ='';
          
         $oldJBNo = '';
         $monHeader = '';
         $tableHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }

           if($monitoringType == 1 || $monitoringType == 2){
                foreach($commodityVolume as $row){
                  $content .= "<tr>";
                  if($row->JobFileNo != $oldJBNo){
                    $content .= "<td style='padding:5px;'>" . $row->JobFileNo . "</td>";
                    $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                    $content .= "<td style='padding:5px;'>" . $row->PurchaseOrderNo . "</td>";
                    $content .= "<td style='padding:5px;'>" . $volume . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ActualArrivalTime . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ActualDeliveryAtWarehouse . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ContainerNo . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td style='padding:5px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>";
                    $tVolume  += $volume;
                    $rCharges += $row->Total_Charges;
                  }else{
                    if($row->ProductName != ""){
                      $content .= "<td></td>";
                      $content .= "<td></td>";
                      $content .= "<td></td>";
                      $content .= "<td></td>";
                      $content .= "<td style='padding:5px;'>" . $row->ActualDeliveryAtWarehouse . "</td>";
                      $content .= "<td style='padding:5px;'>" . $row->ContainerNo . "</td>";
                      $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                      $content .= "<td></td>";
                    }
                  }
                  $content .= "</tr>"; 
                  $oldJBNo = $row->JobFileNo;
               }
            }else{
               foreach($commodityVolume as $row){
                  $content .= "<tr>";
                  if($row->JobFileNo != $oldJBNo){
                    $content .= "<td style='padding:5px;'>" . $row->JobFileNo . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->PurchaseOrderNo . "</td>";
                   /* $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);*/
                    $volume = $row->GrossWeight;
                    $content .= "<td style='padding:5px;'>" . $row->GrossWeight . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ATA . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->DateReceivedAtWhse . "</td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td style='padding:5px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>";
                    $tVolume  += $volume;
                    $rCharges += $row->Total_Charges; 
                  }else{
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td></td>";
                    $content .= "<td style='padding:5px;'>" . $row->ProductName . "</td>";
                    $content .= "<td></td>";
                  }
                  $content .= "</tr>"; 
                  $oldJBNo = $row->JobFileNo;
               }
            }

/*            $total .= '<tr>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> <b> TOTAL </b> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">' . $tVolume . '</th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> </th>';
                             if($monitoringType == 1 || $monitoringType == 2){
                                $total .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"></th>';
                                $total .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"></th>';
                              }else{
                                 $total .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"></th>';
                              }
            $total .= '   <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;"> </th>
                          <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">' . number_format($rCharges,2,'.',',') . '</th>
                        </tr>
                      ';*/
   


            $dispOutput .= '
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <table class="table-bordered table">
              <tr>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Jobfile No</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Purchase Order No.</th>';
                  if($monitoringType == 1 || $monitoringType == 2){
                    $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Volume</th>';
                  }else{
                    $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Gross Weight</th>';
                  }
    
            $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Actual Arrival</th> ';
                   if($monitoringType == 1 || $monitoringType == 2){
                    $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Actual Delivery At Warehouse</th>';
                    $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Container No.</th>';
                  }else{
                    $dispOutput .= '<th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Date Received At Warehouse</th>';
                  }
             $dispOutput .= '   <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Commodity</th>
                <th style="text-align:center;background-color:#ccc; border:1px solid #ddd;">Running Charges</th>
              <tr>' . $content . $total .' 
            </table>
            ';
         
           $dispOutput .= '
          </div> 
        </div>
      </body>
    </html>';

      echo $dispOutput;
  }




 function loadReportTruck_client($monitoringType , $cID , $ataFrom , $ataTo){
 	$dispOutput='';
    $report_truck = $this->Charges->getCharges_Truck($monitoringType , $cID , $ataFrom , $ataTo); 
  
    if($monitoringType == 1|| $monitoringType == 2){
      if(count($report_truck) > 0){
         $dispOutput .="
         			   <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
         				<table class ='table table-bordered'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>";
                      if($monitoringType == 1){
                         $dispOutput .="  
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                      }
                    
         $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Shipping Line</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <td style='padding:10;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;' >" . $row->JobFileNo . "</td>
                                <td style='padding:10px;' >" . $row->ContainerNo . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->Origin) . "</td>";
                  if($monitoringType == 1){
               $dispOutput .= " <td style='padding:10px;' >" . $row->GateInAtPort . "</td>
                                <td style='padding:10px;' >" . $row->GateOutAtPort . ")</td>";
                  }
                               
              $dispOutput .= " <td style='padding:10px;' >" . $row->ActualDeliveryAtWarehouse . "</td>
                                <td style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                <td style='padding:10px;' >" . number_format($row->Storage,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                <td style='padding:10px;'>" . number_format($row->Demorage,2,'.',','). "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->CarrierName . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck witd tdis Span of Target Delivery Date </center>";      
        }
      }else{
        if(count($report_truck) > 0){
         $dispOutput .="
         				<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
         				<table class ='table table-bordered'>
                    <tdead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Number Of Cartons</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Airline/Forwarder</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
              $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
               $dispOutput .= "<tr>
                                <td style='padding:10px;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                <td style='padding:10px;'>" . $row->NoOfCartons . "</td>
                                <td style='padding:10px;'>" . $row->GrossWeight . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->Origin) . "</td>
                                <td style='padding:10px;'>" . number_format($row->StorageFee,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . $row->Forwarder . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck with this Span of Target Delivery Date </center>";      
        }
      }

      echo $dispOutput;
  }

function loadReportTruck_admin($monitoringType , $cID , $ataFrom , $ataTo){
	$dispOutput='';
    $report_truck = $this->Charges->getCharges_Truck($monitoringType , $cID , $ataFrom , $ataTo); 
  
    if($monitoringType == 1|| $monitoringType == 2){
      if(count($report_truck) > 0){
         $dispOutput .="
         		   <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
                   <table class ='table table-bordered'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>";
                      if($monitoringType == 1){
                         $dispOutput .="  
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                         <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                      }
                    
         $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Start Of Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Shipping Line</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
               $dispOutput .= "<tr>
                                <td style='padding:10;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;' >" . $row->JobFileNo . "</td>
                                <td style='padding:10px;' >" . $row->ContainerNo . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;' >" . stripslashes($row->Origin) . "</td>";
                  if($monitoringType == 1){
               $dispOutput .= " <td style='padding:10px;' >" . $row->GateInAtPort . "</td>
                                <td style='padding:10px;' >" . $row->GateOutAtPort . ")</td>";
                  }
                               
              $dispOutput .= " <td style='padding:10px;' >" . $row->ActualDeliveryAtWarehouse . "</td>
                                <td style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                <td style='padding:10px;' >" . number_format($row->Storage,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                <td style='padding:10px;'>" . number_format($row->Demorage,2,'.',','). "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                <td style='padding:10px;'>" . $row->CarrierName . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck witd tdis Span of Target Delivery Date </center>";      
        }
      }else{
        if(count($report_truck) > 0){
         $dispOutput .="
                <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
                <table class ='table table-bordered'>
                    <tdead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Number Of Cartons</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Origin</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Running Charges</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Airline/Forwarder</th>
                    </tr>
                    </thead>
                    <tbody>
                    "; 
          foreach ($report_truck as $row){
              $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
               $dispOutput .= "<tr>
                                <td style='padding:10px;' >" . $row->TargetDeliveryDate . "</td>
                                <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                <td style='padding:10px;'>" . $row->NoOfCartons . "</td>
                                <td style='padding:10px;'>" . $row->GrossWeight . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                <td style='padding:10px;'>" . stripslashes($row->Origin) . "</td>
                                <td style='padding:10px;'>" . number_format($row->StorageFee,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . number_format($row->Total_Charges,2, '.' , ',') . "</td>
                                <td style='padding:10px;'>" . $row->Forwarder . "</td>
                              </tr>";
          }
          $dispOutput .= "</tbody>";
        }else{
               $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Truck with this Span of Target Delivery Date </center>";      
        }
      }

      echo $dispOutput;
  }


	  function loadConsolidatedDocs_admin($monitoringType,$ataFrom,$ataTo,$poNum){
	  	$dispOutput = '';
       $consolidateReport = $this->Charges->get_Consolidated($monitoringType,$ataFrom,$ataTo,$poNum);
       $oldJBNo = '';
         if($monitoringType == 1 || $monitoringType == 2){
            if(count($consolidateReport) > 0){
               $dispOutput .="
					<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
               	<div class='col-md-12'>
               		<table class ='table table-bordered table-condensed '>
                          <thead>
                          <tr>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival </th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Volume</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>BL No.</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Received Docs</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Pre-Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Final Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Paid</th>";
                            if($monitoringType == 1){
                            $dispOutput .= "<th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                            }
                            
               $dispOutput .="<th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Running Charges</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Status Report</th>
                          </tr>
                          </thead>
                          <tbody>
                          "; 
                foreach ($consolidateReport as $row){
                      if($oldJBNo != $row->JobFileNo){
                           $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td  style='padding:10px;'>" . $row->JobFileNo . "</td>
                                      <td  style='padding:10px;'>" . $row->ActualArrivalTime . "</td>
                                      <td  style='padding:10px;'>" . $volume . "</td>
                                      <td  style='padding:10px;'>" . $row->ContainerNo . "</td>
                                      <td  style='padding:10px;'>" . $row->HouseBillLadingNo . "</td>
                                      <td  style='padding:10px;'>" . $row->ProductName . "</td>
                                      <td  style='padding:10px;'>" . $row->DateReceivedOfOtherDocs . "</td>
                                      <td  style='padding:10px;'>" . $row->DateSentPreAssessment . "</td>
                                      <td  style='padding:10px;'>" . $row->DateSentFinalAssessment . "</td>
                                      <td  style='padding:10px;'>" . $row->DatePaid . "</td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td  style='padding:10px;'>" . $row->GateInAtPort . "</td>
                                                        <td  style='padding:10px;'>" . $row->GateOutAtPort . "</td>";
                                      }

                                      
                          $dispOutput .= "<td  style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td  style='padding:10px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                      <td  style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                      <td  style='padding:10px;'>" . number_format($row->Storage,2,'.',',') . "</td>
                                      <td  style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                      <td  style='padding:10px;'>" . number_format($row->Demorage,2,'.',',') . "</td>
                                      <td  style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                      <td  style='padding:10px;'>" . $row->Description . "</td>
                                    </tr>";
                      }else{
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td style='padding:10px;'>" . $row->ContainerNo  . "</td>
                                      <td></td>
                                      <td  style='padding:10px;'>" . $row->ProductName . "</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td style='padding:10px;'>" . $row->GateInAtPort . "</td>
                                                        <td style='padding:10px;'>" . $row->GateOutAtPort . "</td>";
                                      }
                                      
                           $dispOutput .= "
                                      <td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td style='padding:10px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>";
                      }
                   
                      $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
            }else{
              if(count($consolidateReport) > 0){
               $dispOutput .="
                           <link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
                            <table class ='table table-condensed table-bordered'>
                                <thead>
                                <tr>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival </th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gross Weight</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>House Airway Bill No.</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Received Docs</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Pre-Assessment Date</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Final Assessment Date</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Paid</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date of Delivery</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Running Charges</th>
                                  <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Status Reports</th>
                                </tr>
                                </thead>
                                <tbody>
                          "; 
                foreach ($consolidateReport as $row){

                    if($oldJBNo != $row->JobFileNo){
                          $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                          $dispOutput .= "<tr>
                                      <td style='padding:5px;'>" . $row->JobFileNo . "</td>
                                      <td  style='padding:5px;'>" . $row->ATA . "</td>
                                      <td  style='padding:5px;'>" . $volume . "</td>
                                      <td  style='padding:5px;'>" . $row->HouseBillLadingNo . "</td>
                                      <td  style='padding:5px;'>" . $row->ProductName . "</td>
                                      <td  style='padding:5px;'>" . $row->DatePickUpOtherDocs . "</td>
                                      <td  style='padding:5px;'>" . $row->DateSentPreAssessment . "</td>
                                      <td  style='padding:5px;'>" . $row->DateSentFinalAssessment . "</td>
                                      <td  style='padding:5px;'>" . $row->DatePaid . "</td>
                                      <td  style='padding:5px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td  style='padding:5px;'>" . $row->DateReceivedAtWhse . "</td>
                                      <td  style='padding:5px;'>" . number_format($row->StorageFee,2,'.',','). "</td>
                                      <td  style='padding:5px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                      <td  style='padding:5px;'>" . $row->Description . "</td>
                                    </tr>";
                    }else{
                      $dispOutput .= "<tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td  style='padding:5px;'>" . $row->ProductName . "</td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                    </tr>";
                    }
                 

                    $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
           }

      echo  $dispOutput;

  }





 function loadConsolidatedDocs_client($monitoringType,$cID,$ataFrom,$ataTo,$poNum){
       $consolidateReport = $this->Charges->getConsolidated($monitoringType,$cID,$ataFrom,$ataTo,$poNum);
       $oldJBNo = '';
       $dispOutput = '';
         if($monitoringType == 1 || $monitoringType == 2){
            if(count($consolidateReport) > 0){
               $dispOutput .="
						<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
               			<table class ='table table-bordered'>
                          <thead>
                          <tr>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Jobfile No</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Arrival </th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Volume</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Container No.</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>BL No.</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Commodity</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Received Docs</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Pre-Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Final Assessment Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Paid</th>";
                            if($monitoringType == 1){
                            $dispOutput .= "<th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate In (Date/Time)</th>
                                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Gate Out (Date/Time)</th>";
                            }
                            
               $dispOutput .=" <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Target Delivery Date</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Actual Date Delivered</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Storage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Date Start of Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Total Demurrage</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Running Charges</th>
                            <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;'>Status Report</th>
                          </tr>
                          </thead>
                          <tbody>
                          "; 
                foreach ($consolidateReport as $row){
                      if($oldJBNo != $row->JobFileNo){
                           $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                      <td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>
                                      <td style='padding:10px;'>" . $volume . "</td>
                                      <td style='padding:10px;'>" . $row->ContainerNo  . "</td>
                                      <td style='padding:10px;'>" . $row->HouseBillLadingNo . "</td>
                                      <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                      <td style='padding:10px;'>" . $row->DateReceivedOfOtherDocs . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentPreAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentFinalAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DatePaid . "</td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td style='padding:10px;'>" . $row->GateInAtPort . "</td>
                                                        <td style='padding:10px;'>" . $row->GateOutAtPort . "</td>";
                                      }

                                      
                          $dispOutput .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td style='padding:10px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                      <td style='padding:10px;'>" . $row->StartOfStorage . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Storage,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . $row->StartOfDemorage . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Demorage,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . number_format($row->Total_Charges,2,'.',',') . "</td>
                                      <td style='padding:10px;'>" . $row->Description . "</td>
                                    </tr>";
                      }else{
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                           $dispOutput .= "<tr>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td style='padding:10px;'>" . $row->ContainerNo  . "</td>
                                      <td > </td>
                                      <td style='padding:10px;'>" . $row->ProductName . "</td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>";
                                      if($monitoringType == 1){
                                        $dispOutput .= "<td style='padding:10px;'>" . $row->GateInAtPort . "</td>
                                                        <td style='padding:10px;'>" . $row->GateOutAtPort . "</td>";
                                      }
                                      
                           $dispOutput .= "
                                      <td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td style='padding:10px;'>" . $row->ActualDeliveryAtWarehouse . "</td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                    </tr>";
                      }
                   
                      $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
            }else{
              if(count($consolidateReport) > 0){
               $dispOutput .="
               				<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
               						<table class ='table table-bordered'>
                                <thead>
                                <tr>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Jobfile No</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Actual Arrival </th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Gross Weight</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>House Airway Bill No.</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Commodity</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Date Received Docs</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Pre-Assessment Date</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Final Assessment Date</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Date Paid</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Target Delivery Date</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Actual Date of Delivery</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Total Storage</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Running Charges</th>
                                  <th style='text-align:center;background-color:#ccc;padding:5px;'>Status Reports</th>
                                </tr>
                                </thead>
                                <tbody>
                          "; 
                foreach ($consolidateReport as $row){

                    if($oldJBNo != $row->JobFileNo){
                          $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                          $dispOutput .= "<tr>
                                      <td style='padding:10px;'>" . $row->JobFileNo . "</td>
                                      <td style='padding:10px;'>" . $row->ATA . "</td>
                                      <td style='padding:10px;'>" . $volume . "</td>
                                      <td style='padding:10px;'>" . $row->HouseBillLadingNo . "</td>
                                      <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                      <td style='padding:10px;'>" . $row->DatePickUpOtherDocs . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentPreAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DateSentFinalAssessment . "</td>
                                      <td style='padding:10px;'>" . $row->DatePaid . "</td>
                                      <td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>
                                      <td style='padding:10px;'>" . $row->DateReceivedAtWhse . "</td>
                                      <td style='padding:10px;'>" . $row->StorageFee . "</td>
                                      <td style='padding:10px;'>" . $row->Total_Charges . "</td>
                                      <td style='padding:10px;'>" . $row->Description . "</td>
                                    </tr>";
                    }else{
                      $dispOutput .= "<tr>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td style='padding:10px;'>" . stripslashes($row->ProductName) . "</td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                      <td > </td>
                                    </tr>";
                    }
                 

                    $oldJBNo = $row->JobFileNo;
                }
                $dispOutput .= "</tbody>";
              }else{
                     $dispOutput = "<center style='font-color:Red;font-size:18px;'> No Records of Reports from this Span of Actual Delivery Date </center>";      
              }
           }

      echo $dispOutput;

  }

 function createDocToPrint_volume_client($monitoringType,$userID,$consigneeId,$ataFrom,$ataTo,$charges){
         $reportsVolume = $this->Charges->getReportsVolume($monitoringType,$userID,$consigneeId,$ataFrom,$ataTo,$charges);
        // $cName = $this->Charges->getcName($userID);
           $volume = 0;
         $dispOutput = '';
         $content ='';
         $lodgementFee = 0;
         $containerdepo = 0;
         $storage = 0;
         $demorage = 0;
         $eic = 0;
         $badcargo = 0;
         $detention = 0;
         $pluginforreefer = 0 ;
         $thcCharges   = 0;
         $arrastre     = 0;
         $wharfage     = 0;
         $weighing     = 0;
         $dispatchFee  = 0;
         $del = 0;
         $sraApplication   = 0;
         $sraInspection     = 0;
         $baiApplication     = 0;
         $baiInspection  = 0;
         $bpiInspection  = 0;
         $breakbulkfee = 0;
         $badcargofee     = 0;
         $storagefee = 0;
         $vcrc     = 0;
         $cni  = 0;
         $cniu  = 0;
         $otherfees  = 0;
         $rCharges = 0;
         $tVolume = 0;
          
         $oldJBNo = '';
         $newJBNo = '';
         $monHeader = '';
         $tableHeader = '';
           if($monitoringType == 1){
            $monHeader = 'Sea Freight Manila';
           }else if ($monitoringType == 2){
            $monHeader = 'Sea Freight Outport';
           }else{
            $monHeader = 'Air Freight';
           }

         $dispOutput .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
            $dispOutput .= '
            <html>
                  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
                <table class="table-volume-manila">';

                if($monitoringType == 1 || $monitoringType == 2){

                foreach ($reportsVolume as $row) {

                   
                  if($charges == "*"){
                          if($oldJBNo != $row->JobFileNo){
                        $content .= "<tr>";
                        $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                        $content .= "<td style='padding:10px;'>" . $row->LodgementFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerDeposit . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->THCCharges . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Arrastre . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Wharfage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Weighing . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DispatchFee . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->DEL . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Storage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Demorage . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->EIC . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BadCargo . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->Detention . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->SRAInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->PlugInForReefer . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIApplication . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BAIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->BPIInspection . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->OtherFees . "</td>";

                            $lodgementFee   += $row->LodgementFee;
                            $containerdepo  += $row->ContainerDeposit;
                            $thcCharges     += $row->THCCharges;
                            $arrastre       += $row->Arrastre;
                            $wharfage       += $row->Wharfage;
                            $weighing       += $row->Weighing;
                            $dispatchFee    += $row->DispatchFee;
                            $del            += $row->DEL;
                            $storage        += $row->Storage;
                            $demorage       += $row->Demorage;
                            $eic            += $row->EIC;
                            $badcargo       += $row->BadCargo;
                            $detention      += $row->Detention;
                            $sraApplication += $row->SRAApplication;
                            $sraInspection  += $row->SRAInspection;
                            $pluginforreefer += $row->PlugInForReefer;
                            $baiApplication += $row->BAIApplication;
                            $baiInspection  += $row->BAIInspection;
                            $bpiInspection  += $row->BPIInspection;
                            $otherfees      += $row->OtherFees;
                            $tVolume        += $volume;
                      }else{
                        $content .= "<tr>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                        $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                        $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                        $content .= "<td style='padding:10px;'><center></center></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";
                        $content .= "<td style='padding:10px;'></td>";

                      }
                  }else{
                       if($oldJBNo != $row->JobFileNo){
                         $content .= "<tr>";
                         $content .= "<td style='padding:10px;'>" . $row->JobFileNo . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ActualArrivalTime . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;'><center>" . $volume. "</center></td>";
                         $tVolume += $volume;
                        $content .= "<td style='padding:10px;'>" .number_format($row->RCharges, 2, '.', ',')."</td>";
                            $rCharges   += $row->RCharges;
                        }else{
                         $content .= "<tr>";
                         $content .= "<td style='padding:10px;'></td>";
                         $content .= "<td style='padding:10px;'></td>";
                         $content .= "<td style='padding:10px;'>" . $row->TargetDeliveryDate . "</td>";
                         $content .= "<td style='padding:10px;'>" . $row->ContainerNo . "</td>";
                         $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                         $content .= "<td style='padding:10px;'><center></center></td>";
                         
                        $content .= "<td style='padding:10px;'></td>";
                        }
                  }
                   $content .='</tr>';
                    $oldJBNo = $row->JobFileNo;
                }
                 if($charges == "*"){
                    $total = "<tr>
                            <td  colspan=4 style='padding:10px;'><b>TOTAL </b></td>
                            <td hidden></td>
                            <td hidden></td>
                            <td hidden></td>
	
                            
                            <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($containerdepo, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($thcCharges, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($arrastre, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($wharfage, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($weighing, 2, '.', ','). "</td>
                            <td style='padding:10px;'>" . number_format($dispatchFee, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($del, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($storage, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($demorage, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($eic, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($badcargo, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($detention, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($sraInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($pluginforreefer, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiApplication, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($baiInspection, 2, '.', ',') . "</td>
                            <td style='padding:10px;'>" . number_format($bpiInspection, 2, '.', ',') . "</td> 
                            <td style='padding:10px;'>" . number_format($otherfees, 2, '.', ',') . "</td> 
                            </tr>";

                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container Deposit</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>THC Charges</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Arrastre</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Wharfage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Weighing</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Dispatch Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>DEL</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Storage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Demmurage</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>EIC</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BadCargo</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Detention</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>SRA Inspection</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Plug in for Reefer</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Application</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BAI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>BPI Inspection Fee</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                                      </tr>";
                 }else{
                    $total = "<tr>
                               <td style='padding:10px;'><b>TOTAL </b></td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'> </td>
                               <td style='padding:10px;'>" . $tVolume . "</td>";
                    $total .= "<td style='padding:10px;'>" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
                    $tableHeader = "  <tr>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Container No</th>
                                        <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Volume </th>";
                      $tableHeader .= " <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> "  . $charges . "</th>
                                      </tr>";                            
                 }
               
                  
                $dispOutput .="<table class='table table-condensed table-bordered'>
                    <thead>
                       " .   $tableHeader . "
                    </thead>
                    <tbody>
                    " . $content . $total;



                 
            }else{
              foreach ($reportsVolume as $row) {
                  if($oldJBNo != $row->JobFileNo){
                     $content .= "<tr>";
                     $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->JobFileNo . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->ATA . "</td>";
                    $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->TargetDeliveryDate . "</td>";
                  
                    if($charges == "*"){
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->LodgementFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BreakBulkFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->StorageFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->BadCargoOrderFee . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->VCRC . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNI . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->CNIU . "</td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->OtherFees . "</td>";
                      $tVolume      += $volume;
                      $lodgementFee += $row->LodgementFee;
                      $breakbulkfee += $row->BreakBulkFee;
                      $storagefee   += $row->StorageFee;
                      $badcargofee  += $row->BadCargoOrderFee;
                      $vcrc         += $row->VCRC;
                      $cni          += $row->CNI;
                      $cniu         += $row->CNIU;
                      $otherfees    += $row->OtherFees;

                    }else{
                      $volume = $this->Charges->getVolume($monitoringType, $row->JobFileNo);
                      $content .= "<td style='padding:5px;border:1px solid #ddd;'><center>" . $volume. "</center></td>";
                      $content .= "<td style='padding:5px;border:1px solid #ddd;' >" . $row->RCharges . "</td>";
                      $tVolume      += $volume;
                      $rCharges    += $row->RCharges;
                    }
                  }
                  $content .= "</tr>";
                  $oldJBNo = $row->JobFileNo;
             }
             if($charges == "*"){
                $total = "<tr>
                            <td colspan=3 style='padding:5px; font-weight:bold;border:1px solid #ddd;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($lodgementFee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($breakbulkfee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($storagefee, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($badcargofee, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($vcrc, 2, '.', ','). "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cni, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($cniu, 2, '.', ',') . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($otherfees, 2, '.', ',') . "</td>
                            </tr>";
             }else{
                 $total = "<tr>
                            <td colspan=3 style='padding:5px;border:1px solid #ddd;font-weight:bold;'>TOTAL</td>
                            <td style='padding:5px;border:1px solid #ddd;'>" . $tVolume . "</td>
                            <td style='padding:5px;border:1px solid #ddd;' >" . number_format($rCharges, 2, '.', ',') . "</td>
                            </tr>";
             }
           
             if($charges == "*"){
                $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Lodgement Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Break Bulk Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Storage Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Bad Cargo Order Fee</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>VCRC</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNI</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>CNIU</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Other Fees</th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }else{
              $dispOutput .="<table class ='table table-condensed table-bordered; width:100%'>
                    <thead>
                    <tr>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Jobfile No</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Actual Arrival Time</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Delivery Date</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'>Gross Weight</th>
                      <th style='text-align:center;background-color:#ccc; border:1px solid #ddd;padding:5px;'> " . $charges . " </th>
                    </tr>
                    </thead>
                    <tbody>" . $content . $total;
             }
          }
           $dispOutput .= '
              </tbody>
            </table>
          </div> 
        </div>
      </body>
    </html>';

      echo $dispOutput;
  }



  //


  //

  	function script_dl_csv($montype_message){
  		?>
  		       <div class='button'>
              <div class="col-md-8" style="padding: 20px;">
              	<a href="#" id ="export" role='button' class="btn btn-primary">Click to download CSV File
                </a>
              </div>            
            </div>	

        <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {

            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')

                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character

                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';

                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';

                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                $(this)
                    .attr({
                    'download': filename
                        ,'href': csvData
                        //,'target' : '_blank' //if you want it to open in a new window
                });

                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  

                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();

                    return $text.replace('"', '""'); // escape double quotes

                }
            }


            // This must be a hyperlink
            $("#export").click(function (event) {
                // var outputFile = 'export'
                var outputFile = "<?php echo $montype_message;?>";
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>	
      <?php	
  	}


}


?>