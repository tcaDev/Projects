
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_manila_update extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Update_jobfile');
            $this->load->model('Jobdata');      
       }


      function container(){
      $cbcid =$this->input->post('cbcid');
      $carrierbyjobfile  =	addslashes($this->input->post('carrierbyjobfile'));
      $containerno 		 =	addslashes($this->input->post('containerno'));
      $contno 			 =	addslashes($this->input->post('contno'));
      $cartons 			 =	addslashes($this->input->post('cartons'));
      $truckid 			 =	addslashes($this->input->post('truckid'));
      $truckername		 =	addslashes($this->input->post('truckername'));
      $refentry 		 =	addslashes($this->input->post('refentry'));
      $dtpaid 			 =	addslashes($this->input->post('dtpaid'));
      $dt_pre_assess     =	addslashes($this->input->post('dt_pre_assess'));
      $dt_final_assess   =	addslashes($this->input->post('dt_final_assess'));
      $storage           =	addslashes($this->input->post('storage'));
      $demorage			 =	addslashes($this->input->post('demorage'));
      $lodging 			 =	addslashes($this->input->post('lodging'));
      $gip 				 =	addslashes($this->input->post('gip'));
      $gop				 =	addslashes($this->input->post('gop'));
      $adw 				 =	addslashes($this->input->post('adw'));
      $tdt 				 =	addslashes($this->input->post('tdt'));
      $pull_out_date     =	addslashes($this->input->post('pull_out_date'));
      $dt_final_entry_boc=	addslashes($this->input->post('dt_final_entry_boc'));
      $dt_boc 			 =	addslashes($this->input->post('dt_boc'));
      $actual_dt_rcvd_cont_whse = addslashes($this->input->post('actual_dt_rcvd_cont_whse'));

     if(($gop='') && ($gip='')){
      $gop=NULL;
      $gip=NULL;
     }

	$this->Update_jobfile->jobfile_up($cbcid,
		$carrierbyjobfile,
    $containerno,
    $contno,
		$cartons,
    $truckid,
    $truckername,
    $refentry,
    $dtpaid,
    $dt_pre_assess,
		$dt_final_assess,
    $storage,
    $demorage,
    $lodging,
    $gip,
    $gop,
    $adw,
    $tdt,
		$pull_out_date,
    $dt_final_entry_boc,
    $dt_boc,
    $actual_dt_rcvd_cont_whse);
  
      }


    function vessel(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];
      
      $job                   =  $this->input->post('job');
      $v             	     =	$this->input->post('Vessel');
      $est_dept_time         =	$this->input->post('est_dept_time');
      $est_arrival_time 	 =	$this->input->post('est_arrival_time');
      $act_arrival_time      =	$this->input->post('act_arrival_time');
      $discharge_time 	     =	$this->input->post('discharge_time');
      $act_berthing_time       =  $this->input->post('act_berthing_time');
      $Carrierid 			 =	$this->input->post('Carrierid');
      $cr 					 =	$this->input->post('cr');

        $job= $this->Jobdata->select_jobfile($job);
            foreach($job as $row){
                $jb =  $row->JobFileId;
            }

       $this->Update_jobfile->vessel($jb,$v,$est_dept_time,$est_arrival_time,
      	$act_arrival_time,$discharge_time,$act_berthing_time,$Carrierid,$cr,$userid);
      echo "Vessel is Updated";
    }

    function jobfile_update(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];

      
      $montype        = addslashes($this->input->post('montype'));
      $jb        =	addslashes($this->input->post('jbid'));
      $jbfl      =	addslashes($this->input->post('jbfl'));
      $shipper 	 =	addslashes($this->input->post('shipper'));
      $consignee =	addslashes($this->input->post('consignee'));
      $colsel 	 =	addslashes($this->input->post('colsel'));
      $hbfl      =	addslashes($this->input->post('hbfl'));
      $mbl 		 =	addslashes($this->input->post('mbl'));
      $mbl2      =	addslashes($this->input->post('mbl2'));
      $bank 	 =	addslashes($this->input->post('bank'));
      $reg       =	addslashes($this->input->post('reg'));
      $country 	 =	addslashes($this->input->post('country'));
      $city      =	addslashes($this->input->post('city'));
      $dtRcvd_arr_client 		 =	addslashes($this->input->post('dtRcvd_arr_client'));
      $dtPckup_obl       =	addslashes($this->input->post('dtPckup_obl'));
      $dt_pickup_docs 	 =	addslashes($this->input->post('dt_pickup_docs'));
      $broker            =	addslashes($this->input->post('broker'));
      $purch_order_no 	 =	addslashes($this->input->post('purch_order_no'));
      $dtReq_budge_gl    =	addslashes($this->input->post('dtReq_budge_gl'));
      $ref_due_dt 		 =	addslashes($this->input->post('ref_due_dt'));
      $color_selectivity =	addslashes($this->input->post('color_selectivity'));

  

            $data = array(
               'JobFileNo'              => $jbfl,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'       => $montype,
               'IsLocked'               => 1,
               'StatusId'               => $colsel,
               'ColorSelectivityId'     => $color_selectivity,
               'Registry'               => $reg,
               'LockedBy_UserId'        => $userid,
/*               'DateCreated'            => Date('Y-m-d H:i'),*/
               'Origin_CountryId'       => $country, 
               'OriginCity'             => $city,   
               'HouseBillLadingNo'      => $hbfl,
               'MasterBillLadingNo'     => $mbl,
               'MasterBillLadingNo2'           =>$mbl2,
               'LetterCreditFromBank'          =>$bank,
               'DateReceivedNoticeFromClients' =>$dtRcvd_arr_client,
               'DateReceivedOfBL'              =>$dtPckup_obl,
               'DateReceivedOfOtherDocs'       =>$dt_pickup_docs,
               'DateRequestBudgetToGL'         =>$dtReq_budge_gl,
               'RFPDueDate'                    =>$ref_due_dt,
/*               'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder' =>NULL*/
               
        );


        $this->db->where('JobFileId', $jb);
        $this->db->update('JobFile', $data);

    $session_data = $this->session->userdata('logged_in');
    $userid = $session_data['uid'];
    
        $data2 = array(
               'JobFileId'              => $jb,
               'JobFileNo'              => $jbfl,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'       => $montype,
               'IsLocked'               => 1,
               'StatusId'               => $colsel,
               'ColorSelectivityId'     => $color_selectivity,
               'Registry'               => $reg,
               'LockedBy_UserId'        => $userid,
               'Origin_CountryId'       => $country, 
               'OriginCity'             => $city,   
               'HouseBillLadingNo'      => $hbfl,
               'MasterBillLadingNo'     => $mbl,
               'MasterBillLadingNo2'           =>$mbl2,
               'LetterCreditFromBank'          =>$bank,
               'DateReceivedNoticeFromClients' =>$dtRcvd_arr_client,
               'DateReceivedOfBL'              =>$dtPckup_obl,
               'DateReceivedOfOtherDocs'       =>$dt_pickup_docs,
               'DateRequestBudgetToGL'         =>$dtReq_budge_gl,
               'RFPDueDate'                    =>$ref_due_dt,
               'DateUpdated'                      => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'                 =>$userid

          );

       		 $this->db->insert('JobFileHistory', $data2);

          $data_lock1 = array('IsLocked' =>0);
          $this->db->where('JobFileId',$jb);
          $this->db->update('JobFile', $data_lock1);

            $data_lock2 = array('IsLocked' =>0);
          $this->db->where('JobFileId',$jb);
          $this->db->update('JobFileHistory', $data_lock2);
      
    }


    function select_jobfileid(){
    	 $jbfl      =	$this->input->post('jbfl');
    	        $job= $this->Jobdata->select_jobfile($jbfl);
               foreach($job as $row)
            echo   $jb =  $row->JobFileId;
    }


    function product(){
      $prodconid   =	$this->input->post('prodconid');
      $prodid      =	$this->input->post('prodid');
      $cbc 	       =	$this->input->post('cbcid');
      $jbfl 	   =	$this->input->post('jbfl');

       $query = $this->db->query("select ProductId from vw_Products where ProductId='$prodid'
          and ContainerByCarrierId='$cbc'
          and JobFileNo='$jbfl' "); 
      if($query->num_rows()==1) {
      	echo "Not Updated because the Data already exists";
      }else{
      	echo "Comodity is Updated";
      $this->Update_jobfile->product($prodconid,$prodid,$cbc);
  	  }


    }

}
?>