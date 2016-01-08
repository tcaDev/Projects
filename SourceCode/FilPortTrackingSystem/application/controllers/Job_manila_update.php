
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job_manila_update extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Update_jobfile');
       }


      function container(){

      $carrierbyjobfile  =	$this->input->post('carrierbyjobfile');
      $vesid 			 =	$this->input->post('vesid');
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


	$this->Update_jobfile->jobfile_up(
		$carrierbyjobfile,$vesid,$containerno,$contno,
		$cartons,$truckid,$truckername,$refentry,$dtpaid,$dt_pre_assess,
		$dt_final_assess,$storage,$demorage,$lodging,$gip,$gop,$adw,$tdt,
		$pull_out_date,$dt_final_entry_boc,$dt_boc);
  
      }

}
?>