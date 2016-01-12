<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_air extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
       }



     function index(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];
      $jbfl 	     =$this->input->post('jbfl');
      $shipperid     =	$this->input->post('shipper');
      $cosigid 		 =	$this->input->post('consignee');
      $nocart 	     =	$this->input->post('cartons');
      $purchord 	 =	$this->input->post('purch_order_no');  
      $letcred 	     =	$this->input->post('bank');
      $hbl		     =	$this->input->post('hbl');
      $mbl 		     =	$this->input->post('mbl');
      $countryid     =	$this->input->post('origin_air');
      $city          =	$this->input->post('origcity');
      $etd           =	$this->input->post('edtair');
      $eta           =	$this->input->post('eatair');
      $ata			 =	$this->input->post('aatair');
      $flight 	     =	$this->input->post('flight');
      $aircraft 			 =	$this->input->post('aircraft');
      $forward				 =	$this->input->post('forwarder');
      $warehouse 			 =	$this->input->post('warehouse');
      $dt_rec_arv_aline 	 =	$this->input->post('dt_airline');
      $dt_rec_arv_client     =	$this->input->post('dtRcvd');
      $dtpickup_hawb	     =	$this->input->post('dt_pickup_obl');
      $dtpikup_docs 		 =	$this->input->post('dt_pickup_docs');
      $brokerid 			 = $this->input->post('broker');
      $dtreqbudget   	     =	$this->input->post('dt_req_budget');
      $rfpduedate 			 =	$this->input->post('ref_due_dt');
      $color_select		     = $this->input->post('color_select');
      $status		         = $this->input->post('color');
      $status_report		 = $this->input->post('status_air');

    $chek= $this->db->query("Select * from JobFile_Air where JobFileNo='$jbfl' limit 1");
   if($chek->num_rows() ==1){
        echo "JobFile already Exists";
   }else{
         echo "New Jobfile is Added";
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

        $job=$this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
         $jobs =  $row->JobFile_AirId;
        }
          if($status_report!=''){
     	             $air_insert = array(
                     'StatusDescription' => $status_report,
                     'JobFile_AirId'     => $jobs,  
                     'DateAdded'		 => date('Y-m-d H:i'), 
                     'AddedBy_UserId'    => $userid
                     );
              $this->db->insert('HistoricalStatus_Air',$air_insert);
          		/*$this->status_reports($status_report,$job,$userid);*/
          }
  }
 }

     function status_reports(){
     	             $air_insert = array(
                     'StatusDescription' => 1,
                     'JobFile_AirId'     => 1,  
                     'DateAdded'		 => date('Y-m-d H:i'), 
                     'AddedBy_UserId'    => 1
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


  
    function check_jobfile(){
      //$dt = Date("Y/m/d H:i:s");
      $jobfile =  $this->input->post('jobfile');


      $query= $this->db->query("Select * from JobFile_Air where JobFileNo ='$jobfile' limit 1");
          if($query->num_rows() ==1){
                echo  "<i style='color:red;font-size:12px;'>Jobfile Already Exists in Air</i>";     
          }else{
             echo "<i style='color:green;'>Jobfile  is Available</i>";      
    		}
 }

 }

 ?>