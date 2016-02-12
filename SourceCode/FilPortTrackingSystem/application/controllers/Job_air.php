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
      $jbfl 	     = addslashes($this->input->post('jbfl'));
      $shipperid     =	addslashes($this->input->post('shipper'));
      $cosigid 		 =	addslashes($this->input->post('consignee'));
      $nocart 	     =	addslashes($this->input->post('cartons'));
      $purchord 	 =	addslashes($this->input->post('purch_order_no'));  
      $letcred 	     =	addslashes($this->input->post('bank'));
      $hbl		     =	addslashes($this->input->post('hbl'));
      $mbl 		     =	addslashes($this->input->post('mbl'));
      $countryid     =	addslashes($this->input->post('origin_air'));
      $city          =	addslashes($this->input->post('origcity'));
      $etd           =	addslashes($this->input->post('edtair'));
      $eta           =	addslashes($this->input->post('eatair'));
      $ata			 =	addslashes($this->input->post('aatair'));
      $flight 	     =	addslashes($this->input->post('flight'));
      $aircraft 			 =	addslashes($this->input->post('aircraft'));
      $forward				 =	addslashes($this->input->post('forwarder'));
      $warehouse 			 =	addslashes($this->input->post('warehouse'));
      $dt_rec_arv_aline 	 =	addslashes($this->input->post('dt_airline'));
      $dt_rec_arv_client     =	addslashes($this->input->post('dtRcvd'));
      $dtpickup_hawb	     =	addslashes($this->input->post('dt_pickup_obl'));
      $dtpikup_docs 		 =	addslashes($this->input->post('dt_pickup_docs'));
      $brokerid 			 = addslashes($this->input->post('broker'));
      $dtreqbudget   	     =	addslashes($this->input->post('dt_req_budget'));
      $rfpduedate 			 =	addslashes($this->input->post('ref_due_dt'));
      $color_select		     = addslashes($this->input->post('color_select'));
      $status		         = addslashes($this->input->post('color'));
      $status_report		 = addslashes($this->input->post('status_air'));

    $chek= $this->db->query("Select * from JobFile_Air where JobFileNo='$jbfl' limit 1");
   if($chek->num_rows() ==1){
        echo "JobFile Already Exists";
   }else{
         echo "New Jobfile Added";
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

            $add_charges = array(
              'JobFile_AirId'    => $jobs
            );
      $this->db->insert('RunningCharges_Air', $add_charges);

  }
 }

function status_reports(){

          $session_data = $this->session->userdata('logged_in');
          $userid = $session_data['uid'];
          $jbfl            = $this->input->post('jbfl');
          $reports         = stripslashes($this->input->post('reports'));

        $job=$this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
         $jobs =  $row->JobFile_AirId;
        }
     if($reports!=''){
         	             $air_insert = array(
                         'StatusDescription' => $reports,
                         'JobFile_AirId'     => $jobs,  
                         'DateAdded'		     => date('Y-m-d H:i'), 
                         'AddedBy_UserId'    => $userid
                         );
                  $this->db->insert('HistoricalStatus_Air',$air_insert);
     }
  }


     function products(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];

      $prodid    			 =	addslashes($this->input->post('prodname'));
      $jbfl 	 			   =  addslashes($this->input->post('jbfl'));

      $refentry 			 =	addslashes($this->input->post('ref_entry_no_air'));
      $gross 	     		 =	addslashes($this->input->post('gross'));
      $dtfinal_assess  =	addslashes($this->input->post('final_assess_air'));  
      $dtpaid 	    	 =	addslashes($this->input->post('date_paid_air'));
      $dtpre_assess		 =	addslashes($this->input->post('pre_assess_air'));
      $dt_boc_cleared  =	addslashes($this->input->post('boc_cleared_air'));
      $tdt     				 =	addslashes($this->input->post('target_delivery_air'));
      $ac_pu_dt_naia   =	addslashes($this->input->post('act_pull_naia_air'));
      $dt_rec_whse     =	addslashes($this->input->post('date_recvd_whse_air'));
      $hauler_trucker  =	addslashes($this->input->post('truckname_air'));
      $total_stor			 =	addslashes($this->input->post('total_storage'));
      $adtlperday 	 	 =	addslashes($this->input->post('addtl_per_day'));
      
          $job=$this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
         $jobs =  $row->JobFile_AirId;
        }
  if($prodid!=''){
      $products_insert = array
      					(
      						'ProductId'			  		    =>$prodid, 
      						'JobFile_AirId'					  =>$jobs,
      						'RefEntryNo'					    =>$refentry,
      						'GrossWeight'				    	=>$gross,
      						'DateSentFinalAssessment' =>$dtfinal_assess,
      						'DatePaid'					    	=>$dtpaid,
      						'DateSentPreAssessment'		=>$dtpre_assess,
      						'DateBOCCleared'				  =>$dt_boc_cleared,
      						'TargetDeliveryDate'			=>$tdt,
      						'ActualPullOutDateAtNAIA'	=>$ac_pu_dt_naia,
      						'DateReceivedAtWhse'			=>$dt_rec_whse,
      						'HaulerOrTruckId'				  =>$hauler_trucker,
      						'TotalStorage'					  =>$total_stor,
      						'AdtlPerDayncludeVat'			=>$adtlperday

      					);	

       $this->db->insert('Products_Air',$products_insert); 
        $lastid =  $this->db->insert_id();

       $products_insert_h = array
      					(
      						'Products_AirId'			  	=>$lastid,
                  'ProductId'               =>$prodid,
                  'JobFile_AirId'           =>$jobs,
                  'RefEntryNo'              =>$refentry,
                  'GrossWeight'             =>$gross,
                  'DateSentFinalAssessment' =>$dtfinal_assess,
                  'DatePaid'                =>$dtpaid,
                  'DateSentPreAssessment'   =>$dtpre_assess,
                  'DateBOCCleared'          =>$dt_boc_cleared,
                  'TargetDeliveryDate'      =>$tdt,
                  'ActualPullOutDateAtNAIA' =>$ac_pu_dt_naia,
                  'DateReceivedAtWhse'      =>$dt_rec_whse,
                  'HaulerOrTruckId'         =>$hauler_trucker,
                  'TotalStorage'            =>$total_stor,
                  'AdtlPerDayncludeVat'     =>$adtlperday,
      						'DateUpdated'				    	=>date('Y-m-d H:i'),
      						'UpdatedBy_UserId'				=>$userid

      					);	

       $this->db->insert('Products_AirHistory',$products_insert_h); 
}
     }
   

  
    function check_jobfiles(){
      //$dt = Date("Y/m/d H:i:s");
      $jobfile =  $this->input->post('jobfile');


      $query= $this->db->query("Select * from JobFile_Air where JobFileNo ='$jobfile' limit 1");
          if($query->num_rows() ==1){
                echo  "<i style='color:red;font-size:12px;'>Jobfile Already Exists in Air</i>";     
          }else{
                echo "<i style='color:green;'>Jobfile is Available</i>";      
    		}
 }

 }

 ?>