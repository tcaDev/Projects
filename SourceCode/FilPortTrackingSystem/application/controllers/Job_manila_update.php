
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
      $carrierbyjobfile  =	$this->input->post('carrierbyjobfile');
      $containerno 		 =	$this->input->post('containerno');
      $contno 			 =	$this->input->post('contno');
      $cartons 			 =	$this->input->post('cartons');
      $truckid 			 =	$this->input->post('truckid');
      $truckername		 =	$this->input->post('truckername');
      $refentry 		 =	$this->input->post('refentry');
      $dtpaid 			 =	$this->input->post('dtpaid');
      $dt_pre_assess     =	$this->input->post('dt_pre_assess');
      $dt_final_assess   =	$this->input->post('dt_final_assess');
      $storage           =	$this->input->post('storage');
      $demorage			 =	$this->input->post('demorage');
      $lodging 			 =	$this->input->post('lodging');
      $gip 				 =	$this->input->post('gip');
      $gop				 =	$this->input->post('gop');
      $adw 				 =	$this->input->post('adw');
      $tdt 				 =	$this->input->post('tdt');
      $pull_out_date     =	$this->input->post('pull_out_date');
      $dt_final_entry_boc=	$this->input->post('dt_final_entry_boc');
      $dt_boc 			 =	$this->input->post('dt_boc');
      $actual_dt_rcvd_cont_whse = $this->input->post('actual_dt_rcvd_cont_whse');

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
      $v             	     =	$this->input->post('Vessel');
      $est_dept_time         =	$this->input->post('est_dept_time');
      $est_arrival_time 	 =	$this->input->post('est_arrival_time');
      $act_arrival_time      =	$this->input->post('act_arrival_time');
      $discharge_time 	     =	$this->input->post('discharge_time');
      $Carrierid 			 =	$this->input->post('Carrierid');
      $cr 					 =	$this->input->post('cr');



      $this->Update_jobfile->vessel($v,$est_dept_time,$est_arrival_time,
      	$act_arrival_time,$discharge_time,$Carrierid,$cr,$userid);

    }

    function jobfile_update(){
      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];

      
      $jb        =	$this->input->post('jbid');
      $jbfl      =	$this->input->post('jbfl');
      $shipper 	 =	$this->input->post('shipper');
      $consignee =	$this->input->post('consignee');
      $colsel 	 =	$this->input->post('colsel');
      $hbfl      =	$this->input->post('hbfl');
      $mbl 		 =	$this->input->post('mbl');
      $mbl2      =	$this->input->post('mbl2');
      $bank 	 =	$this->input->post('bank');
      $reg       =	$this->input->post('reg');
      $country 	 =	$this->input->post('country');
      $city      =	$this->input->post('city');
      $dtRcvd_arr_client 		 =	$this->input->post('dtRcvd_arr_client');
      $dtPckup_obl       =	$this->input->post('dtPckup_obl');
      $dt_pickup_docs 	 =	$this->input->post('dt_pickup_docs');
      $broker            =	$this->input->post('broker');
      $purch_order_no 	 =	$this->input->post('purch_order_no');
      $dtReq_budge_gl    =	$this->input->post('dtReq_budge_gl');
      $ref_due_dt 		 =	$this->input->post('ref_due_dt');
      $color_selectivity =	$this->input->post('color_selectivity');

  

            $data = array(
               'JobFileNo'              => $jbfl,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
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
          /*     'JobFileId'              => $lastid,*/
               'JobFileNo'              => $jbfl,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
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
     /*          'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder'  =>NULL,*/
               'DateUpdated'                      => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'                 =>$userid

          );

              $this->db->where('JobFileId',$jb);
       		 $this->db->update('JobFileHistory', $data2);
      
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
      	echo "Not updated because the data is already exists";
      }else{
      	echo "Comodity is Updated";
      $this->Update_jobfile->product($prodconid,$prodid,$cbc);
  	  }


    }








}
?>