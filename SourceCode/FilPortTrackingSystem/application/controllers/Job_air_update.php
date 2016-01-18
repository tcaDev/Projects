<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_air_update extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');  
            $this->load->model('Jobdata'); 
       }



     function index(){
      $session_data    =  $this->session->userdata('logged_in');
      $userid          =  $session_data['uid'];

      $jbfl_new        =  addslashes($this->input->post('jbfl_new'));
      $jbfl 	         =  addslashes($this->input->post('jbfl'));
      $shipperid       =	addslashes($this->input->post('shipperid'));
      $cosigid 		     =	addslashes($this->input->post('cosigid'));
      $nocart 	       =	addslashes($this->input->post('nocart'));
      $purchord 	     =	addslashes($this->input->post('purchord'));  
      $letcred 	       =	addslashes($this->input->post('letcred'));
      $hbl		         =	addslashes($this->input->post('hbl'));
      $mbl 		         =	addslashes($this->input->post('mbl'));
      $countryid       =	addslashes($this->input->post('countryid'));
      $city            =	addslashes($this->input->post('city'));
      $etd             =	addslashes($this->input->post('etd'));
      $eta             =	addslashes($this->input->post('eta'));
      $ata			       =	addslashes($this->input->post('ata'));
      $flight 	       =	addslashes($this->input->post('flight'));
      $aircraft 			 =	addslashes($this->input->post('aircraft'));
      $forward				 =	addslashes($this->input->post('forward'));
      $warehouse 			 =	addslashes($this->input->post('warehouse'));
      $dt_rec_arv_aline 	   =	addslashes($this->input->post('dt_rec_arv_aline'));
      $dt_rec_arv_client     =	addslashes($this->input->post('dt_rec_arv_client'));
      $dtpickup_hawb	       =	addslashes($this->input->post('dtpickup_hawb'));
      $dtpikup_docs 	    	 =	addslashes($this->input->post('dtpikup_docs'));
      $brokerid 			       = addslashes($this->input->post('brokerid'));
      $dtreqbudget   	       =	addslashes($this->input->post('dtreqbudget'));
      $rfpduedate 			     =	addslashes($this->input->post('rfpduedate'));
      $color_select		       = addslashes($this->input->post('color_select'));
      $status		             = addslashes($this->input->post('status'));
      $status_report		     = addslashes($this->input->post('status_report'));

         $job= $this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
         $job_id =  $row->JobFile_AirId;
        }


         //stop inserting data in jobfile to avoid duplication
/*    $chek= $this->db->query("Select * from JobFile_Air where
        JobFileNo in ($jbfl_new,$jbfl) limit 1");
    if($chek->num_rows() ==1){
      echo "JobFile already Exists";
     }else{*/
       echo "Jobfile Updated";


      $air_job = array(
                'JobFileNo'                =>$jbfl_new,
      					'ShipperId' 			         =>$shipperid, 
      					'ConsigneeId'   	      	 =>$cosigid,
      					'NoOfCartons'			         =>$nocart,
      					'PurchaseOrderNo'   	     =>$purchord,
      					'LetterCreditNoFromBank'   =>$letcred,
      					'HouseBillLadingNo'		     =>$hbl,
      					'MasterBillLadingNo'	     =>$mbl,
      					'Origin_CountryId'		     =>$countryid,
      					'OriginCity'			         =>$city,
      					'ETD'					             =>$etd,
      					'ETA'					             =>$eta,
      					'ATA'					             =>$ata,
      					'FlightNo'				         =>$flight,
      					'Aircraft'				         =>$aircraft,
      					'Forwarder'				         =>$forward,
      					'Warehouse'				         =>$warehouse,
      					'DateReceivedArrivalFromALine'      =>$dt_rec_arv_aline,
      					'DateReceivedArrivalFromClient'     =>$dt_rec_arv_client,
      					'DatePickUpHawb'				            =>$dtpickup_hawb,
      					'DatePickUpOtherDocs'			          =>$dtpikup_docs,
      					'BrokerId'					              	=>$brokerid,
      					'DateRequestBudgetToGL'		        	=>$dtreqbudget,
      					'RFPDueDate'					              =>$rfpduedate,
      					'ColorSelectivityId'			          =>$color_select,
      					'IsLocked'					              	=>1,
      					'LockedBy_UserId'			             	=>$userid,
      					'StatusId'						              =>$status

      				   );

       $this->db->where('JobFile_AirId',$job_id); 
       $this->db->update('JobFile_Air',$air_job); 

/*        $job= $this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
         $job_id =  $row->JobFile_AirId;
        }
          $air_job2 = array(
             	  'JobFile_AirId'			          =>$job_id,
      					'JobFileNo' 			            =>$jbfl,
      					'ShipperId' 			            =>$shipperid, 
      					'ConsigneeId'   		          =>$cosigid,
      					'NoOfCartons'			            =>$nocart,
      					'PurchaseOrderNo'   	        =>$purchord,
      					'LetterCreditNoFromBank'      =>$letcred,
      					'HouseBillLadingNo'		        =>$hbl,
      					'MasterBillLadingNo'	        =>$mbl,
      					'Origin_CountryId'		        =>$countryid,
      					'OriginCity'			            =>$city,
      					'ETD'					                =>$etd,
      					'ETA'					                =>$eta,
      					'ATA'					                =>$ata,
      					'FlightNo'				            =>$flight,
      				  'Aircraft'				            =>$aircraft,
      					'Forwarder'				            =>$forward,
      					'Warehouse'				             =>$warehouse,
      					'DateReceivedArrivalFromALine' =>$dt_rec_arv_aline,
      					'DateReceivedArrivalFromClient'=>$dt_rec_arv_client,
      					'DatePickUpHawb'			         =>$dtpickup_hawb,
      					'DatePickUpOtherDocs'			     =>$dtpikup_docs,
      					'BrokerId'						         =>$brokerid,
      					'DateRequestBudgetToGL'		     =>$dtreqbudget,
      					'RFPDueDate'					         =>$rfpduedate,
      					'ColorSelectivityId'			     =>$color_select,
      					'IsLocked'					           =>1,
      					'LockedBy_UserId'				       =>$userid,
      					'StatusId'					           =>$status,
      					'DateUpdated'				           =>date('Y-m-d H:i'),
      					'UpdatedBy_UserId'			    	 =>$userid
      				   );

       $this->db->insert('JobFile_AirHistory',$air_job2); */
     // }

     }



     function products(){
      $session_data     = $this->session->userdata('logged_in');
      $userid           = $session_data['uid'];

      $prodid          =  addslashes($this->input->post('prodid'));
      $jbfl            =  addslashes($this->input->post('jbfl'));
      $refentry        =  addslashes($this->input->post('refentry'));
      $gross           =  addslashes($this->input->post('gross'));
      $dtfinal_assess  =  addslashes($this->input->post('dtfinal_assess'));  
      $dtpaid          =  addslashes($this->input->post('dtpaid'));
      $dtpre_assess    =  addslashes($this->input->post('pre_assess'));
      $dt_boc_cleared  =  addslashes($this->input->post('dt_boc_cleared'));
      $tdt             =  addslashes($this->input->post('tdt'));
      $ac_pu_dt_naia   =  addslashes($this->input->post('ac_pu_dt_naia'));
      $dt_rec_whse     =  addslashes($this->input->post('dt_rec_whse'));
      $hauler_trucker  =  addslashes($this->input->post('truckname_air'));
      $total_stor      =  addslashes($this->input->post('total_storage'));
      $adtlperday      =  addslashes($this->input->post('addtl_per_day'));

      //air id history
       $Products_arid  =  $this->input->post('ProductAirID');
        $job     = $this->Jobdata->select_jobfile_air($jbfl);
        foreach($job as $row){
      echo   $job_id =  $row->JobFile_AirId;
        }

      

      $products_update = array
      					(
                  'ProductId'                   =>$prodid,
      						'JobFile_AirId'				   	    =>$job_id,
      						'RefEntryNo'					        =>$refentry,  
      						'GrossWeight'					        =>$gross,
      						'DateSentFinalAssessment' 		=>$dtfinal_assess,
      						'DatePaid'						        =>$dtpaid,
      						'DateSentPreAssessment'		   	=>$dtpre_assess, //la
      						'DateBOCCleared'				      =>$dt_boc_cleared,
      						'TargetDeliveryDate'		    	=>$tdt,
      						'ActualPullOutDateAtNAIA'	  	=>$ac_pu_dt_naia,
      						'DateReceivedAtWhse'			    =>$dt_rec_whse,
      						'HaulerOrTruckId'				      =>$hauler_trucker,
      						'TotalStorage'					      =>$total_stor,
      						'AdtlPerDayncludeVat'		     	=>$adtlperday
      					);	
       $this->db->where('Products_AirId',$Products_arid);
       $this->db->update('Products_Air',$products_update); 


       $products_insert_h = array
      					(
      						'Products_AirId'				      =>$Products_arid,
      						'ProductId'			  		        =>$prodid, 
      						'JobFile_AirId'					      =>$job_id,
      						'RefEntryNo'					        =>$refentry,
      						'GrossWeight'				        	=>$gross,
      						'DateSentFinalAssessment' 		=>$dtfinal_assess,
      						'DatePaid'						        =>$dtpaid,
      						'DateSentPreAssessment'		  	=>$dtpre_assess,
      						'DateBOCCleared'				      =>$dt_boc_cleared,
      						'TargetDeliveryDate'		    	=>$tdt,
      						'ActualPullOutDateAtNAIA'	   	=>$ac_pu_dt_naia,
      						'DateReceivedAtWhse'		    	=>$dt_rec_whse,
      						'HaulerOrTruckId'				      =>$hauler_trucker,
      						'TotalStorage'					      =>$total_stor,
      						'AdtlPerDayncludeVat'		     	=>$adtlperday,
      						'DateUpdated'					        =>date('Y-m-d H:i'),
      						'UpdatedBy_UserId'			     	=>$userid
      					);	

       $this->db->insert('Products_AirHistory',$products_insert_h); 
     }

function jobfile_add_charge_air(){
   $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
   $jobfile =  $this->input->post('jbfl');
   $check             =  $this->input->post('check');
   $lodge             =  $this->input->post('lodge');
   $cont_deposit      =  $this->input->post('cont_deposit');
   $thc_charges       =  $this->input->post('thc_charges');   
   $wharfage          =  $this->input->post('wharfage');
   $arrastre          =  $this->input->post('arrastre');
   $weight            =  $this->input->post('weight');
   $del               =  $this->input->post('del');
   $dispatch          =  $this->input->post('dispatch');
   $storage           =  $this->input->post('storage');   
   $demurrage         =  $this->input->post('demurrage');
   $detention         =  $this->input->post('detention');
   $eic               =  $this->input->post('eic');
   $bai_app           =  $this->input->post('bai_app');
   $bai_inspect       =  $this->input->post('bai_inspect');
   $sra_app           =  $this->input->post('sra_app');   
   $sra_inspect       =  $this->input->post('sra_inspect');
   $bad_cargo         =  $this->input->post('bad_cargo');
/*   $all_charges       =  addslashes($this->input->post('all_charges'));
   $part_charges      =  addslashes($this->input->post('part_charges'));
*/

  //stop inserting data in jobfile to avoid duplication
 /* $query= $this->db->query("Select * from vw_RunningCharges where
        JobFileId='$job' limit 1");
if($query->num_rows() ==1){*/

      $job     = $this->Jobdata->select_jobfile_air($jobfile);
        foreach($job as $row){
         $job_id =  $row->JobFile_AirId;
        }

  
      $update_charges = array(
              'LodgementFee'     => $lodge,
               'ContainerDeposit' => $cont_deposit,
               'THCCharges'       => $thc_charges,
               'Arrastre'         => $arrastre,
               'Wharfage'         => $wharfage,
               'Weighing'         => $weight,
               'DEL'              => $del,
               'DispatchFee'      => $dispatch,
               'Storage'          => $storage,
               'Demorage'         => $demurrage,
               'Detention'        => $detention,
               'EIC'              => $eic,
               'BAIApplication'   => $bai_app,
               'BAIInspection'    => $bai_inspect,
               'SRAApplication'   => $sra_app,
               'SRAInspection'    => $sra_inspect,
               'BadCargo'         => $bad_cargo
            /*   'AllCharges'       => $all_charges,
               'ParticularCharges'=> $part_charges*/
            );

              $this->db->where('JobFile_AirId', $job_id);
              $this->db->update('RunningCharges_Air', $update_charges);

/*
             $update_charges_history = array(
               'JobFile_AirId'        => $job,
               'LodgementFee'     => $lodge,
               'ContainerDeposit' => $cont_deposit,
               'THCCharges'       => $thc_charges,
               'Arrastre'         => $arrastre,
               'Wharfage'         => $wharfage,
               'Weighing'         => $weight,
               'DEL'              => $del,
               'DispatchFee'      => $dispatch,
               'Storage'          => $storage,
               'Demorage'         => $demurrage,
               'Detention'        => $detention,
               'EIC'              => $eic,
               'BAIApplication'   => $bai_app,
               'BAIInspection'    => $bai_inspect,
               'SRAApplication'   => $sra_app,
               'SRAInspection'    => $sra_inspect,
               'BadCargo'         => $bad_cargo,
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UsrId'  => $userid
            );
          $this->db->insert('RunningCharges_AirHistory', $update_charges_history);*/
//}
   }






 }

 ?>