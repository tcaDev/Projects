<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_air extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');     
       }



     function index(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];
      $jbfl 	     =$this->input->post('jbfl');
      $shipperid     =	$this->input->post('shipperid');
      $cosigid 		 =	$this->input->post('cosigid');
      $nocart 	     =	$this->input->post('nocart');
      $purchord 	 =	$this->input->post('purchord');  
      $letcred 	     =	$this->input->post('letcred');
      $hbl		     =	$this->input->post('hbl');
      $mbl 		     =	$this->input->post('mbl');
      $countryid     =	$this->input->post('countryid');
      $city          =	$this->input->post('city');
      $etd           =	$this->input->post('etd');
      $eta           =	$this->input->post('eta');
      $ata			 =	$this->input->post('ata');
      $flight 	     =	$this->input->post('flight');
      $aircraft 			 =	$this->input->post('aircraft');
      $forward				 =	$this->input->post('forward');
      $warehouse 			 =	$this->input->post('warehouse');
      $dt_rec_arv_aline 	 =	$this->input->post('dt_rec_arv_aline');
      $dt_rec_arv_client     =	$this->input->post('dt_rec_arv_client');
      $dtpickup_hawb	     =	$this->input->post('dtpickup_hawb');
      $dtpikup_docs 		 =	$this->input->post('dtpikup_docs');
      $brokerid 			 = $this->input->post('brokerid');
      $dtreqbudget   	     =	$this->input->post('dtreqbudget');
      $rfpduedate 			 =	$this->input->post('rfpduedate');
      $color_select		     = $this->input->post('color_select');
      $status		         = $this->input->post('status');
      $status_report		 = $this->input->post('status_report');

      $air_job = array(
      					'JobFileNo' 			 =>$jbfl,
      					'ShipperId' 			 =>$shipperid, 
      					'ConsigneeId'   		 =>$cosigid,
      					'NoOfCartons'			 =>$nocart,
      					'PurchaseOrderNo'   	 =>$purchord,
      					'LetterCreditNoFromBank' =>$letcred,
      					'HouseBillLadingNo'		 =>$hbl,
      					'MasterBillLadingNo'	 =>$mbl,
      					'Origin_CountryId'		 =>$countryid,
      					'OriginCity'			 =>$city,
      					'ETD'					 =>$etd,
      					'ETA'					 =>$eta,
      					'ATA'					 =>$ata,
      					'FlightNo'				 =>$flight,
      					'Aircraft'				 =>$aircraft,
      					'Forwarder'				 =>$forward,
      					'Warehouse'				 =>$warehouse,
      					'DateReceivedArrivalFromALine' =>$dt_rec_arv_aline,
      					'DateReceivedArrivalFromClient' =>$dt_rec_arv_client,
      					'DatePickUpHawb'				=>$dtpickup_hawb,
      					'DatePickUpOtherDocs'			=>$dtpikup_docs,
      					'BrokerId'						=>$brokerid,
      					'DateRequestBudgetToGL'			=>$dtreqbudget,
      					'RFPDueDate'					=>$rfpduedate,
      					'ColorSelectivityId'			=>$color_select,
      					/*'IsLocked'						=>1*/
      					/*'LockedBy_UserId'				=>*/
      					'StatusId'						=>$status

      				   );

       $this->db->insert('JobFile_Air',$air_job); 
       $lastid =  $this->db->insert_id();

             $air_job2 = array(
             	        'JobFile_AirId'			 =>$lastid,
      					'JobFileNo' 			 =>$jbfl,
      					'ShipperId' 			 =>$shipperid, 
      					'ConsigneeId'   		 =>$cosigid,
      					'NoOfCartons'			 =>$nocart,
      					'PurchaseOrderNo'   	 =>$purchord,
      					'LetterCreditNoFromBank' =>$letcred,
      					'HouseBillLadingNo'		 =>$hbl,
      					'MasterBillLadingNo'	 =>$mbl,
      					'Origin_CountryId'		 =>$countryid,
      					'OriginCity'			 =>$city,
      					'ETD'					 =>$etd,
      					'ETA'					 =>$eta,
      					'ATA'					 =>$ata,
      					'FlightNo'				 =>$flight,
      				     'Aircraft'				 =>$aircraft,
      					'Forwarder'				 =>$forward,
      					'Warehouse'				 =>$warehouse,
      					'DateReceivedArrivalFromALine' =>$dt_rec_arv_aline,
      					'DateReceivedArrivalFromClient' =>$dt_rec_arv_client,
      					'DatePickUpHawb'				=>$dtpickup_hawb,
      					'DatePickUpOtherDocs'			=>$dtpikup_docs,
      					'BrokerId'						=>$brokerid,
      					'DateRequestBudgetToGL'			=>$dtreqbudget,
      					'RFPDueDate'					=>$rfpduedate,
      					'ColorSelectivityId'			=>$color_select,
/*      					'IsLocked'						=>1,
      					'LockedBy_UserId'				=>$userid,*/
      					'StatusId'						=>$status,
      					'DateUpdated'					=>date('Y-m-d H:i'),
      					'UpdatedBy_UserId'				=>$userid
      				   );

       $this->db->insert('JobFile_AirHistory',$air_job2); 

        $job           = $this->Jobdata->select_jobfile($jbfl);
        foreach($job as $row){
         $job =  $row->JobFileId;
        }
          if($status!=''){
          		$this->status_reports($status_report,$job,$userid);
          }

     }

     function status_reports(){
     	             $air_insert = array(
                     'StatusDescription' => $status_report,
                     'JobFile_AirId'     => $job,  
                     'DateAdded'		 => date('Y-m-d H:i'), 
                     'AddedBy_UserId'    => $userid
                     );
              $this->db->insert('HistoricalStatus_Air',$air_insert);
     }


     function products(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];

      $prodid    			 =	$this->input->post('prodid');
      $jbfl 	 			 =$this->input->post('jbfl');

      $refentry 			 =	$this->input->post('refentry');
      $gross 	     		 =	$this->input->post('gross');
      $dtfinal_assess 		 =	$this->input->post('dtfinal_assess');  
      $dtpaid 	    		 =	$this->input->post('dtpaid');
      $dtpre_assess		     =	$this->input->post('dtpre_assess');
      $dt_boc_cleared 		 =	$this->input->post('dt_boc_cleared');
      $tdt     				 =	$this->input->post('tdt');
      $ac_pu_dt_naia         =	$this->input->post('ac_pu_dt_naia');
      $dt_rec_whse           =	$this->input->post('dt_rec_whse');
      $hauler_trucker        =	$this->input->post('hauler_trucker');
      $total_stor			 =	$this->input->post('total_stor');
      $adtlperday 	 	     =	$this->input->post('adtlperday');
      

      $products_insert = array
      					(
      						'ProductId'			  		    =>$prodid, 
      						'JobFile_AirId'					=>$jbfl,
      						'RefEntryNo'					=>$refentry,
      						'GrossWeight'					=>$gross,
      						'DateSentFinalAssessment' 		=>$dtfinal_assess,
      						'DatePaid'						=>$dtpaid,
      						'DateSentPreAssessment'			=>$dtpre_assess,
      						'DateBOCCleared'				=>$dt_boc_cleared,
      						'TargetDeliveryDate'			=>$tdt,
      						'ActualPullOutDateAtNAIA'		=>$ac_pu_dt_naia,
      						'DateReceivedAtWhse'			=>$dt_rec_whse,
      						'HaulerOrTruckId'				=>$hauler_trucker,
      						'TotalStorage'					=>$total_stor,
      						'AdtlPerDayncludeVat'			=>$adtlperday

      					);	

       $this->db->insert('Products_Air',$products_insert); 
       $lastid =  $this->db->insert_id();

       $products_insert_h = array
      					(
      						'Products_AirId'				=>$lastid,
      						'ProductId'			  		    =>$prodid, 
      						'JobFile_AirId'					=>$jbfl,
      						'RefEntryNo'					=>$refentry,
      						'GrossWeight'					=>$gross,
      						'DateSentFinalAssessment' 		=>$dtfinal_assess,
      						'DatePaid'						=>$dtpaid,
      						'DateSentPreAssessment'			=>$dtpre_assess,
      						'DateBOCCleared'				=>$dt_boc_cleared,
      						'TargetDeliveryDate'			=>$tdt,
      						'ActualPullOutDateAtNAIA'		=>$ac_pu_dt_naia,
      						'DateReceivedAtWhse'			=>$dt_rec_whse,
      						'HaulerOrTruckId'				=>$hauler_trucker,
      						'TotalStorage'					=>$total_stor,
      						'AdtlPerDayncludeVat'			=>$adtlperday,
      						'DateUpdated'					=>date('Y-m-d H:i'),
      						'UpdatedBy_UserId'				=>$userid

      					);	

       $this->db->insert('Products_AirHistory',$products_insert_h); 
     }


  


 }

 ?>