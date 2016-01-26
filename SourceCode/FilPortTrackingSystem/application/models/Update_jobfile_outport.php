

<?php

Class Update_jobfile_outport extends CI_Model
{
  

  function jobfile_up_outport(
    $carrierbyjobfile,$containerno,$contno,
    $cartons,$truckid,$truckername,$refentry,$dtpaid,$dt_pre_assess,
    $dt_final_assess,$storage,$demorage,$lodging,$gip,$gop,$adw,$tdt,
    $pull_out_date,$dt_final_entry_boc,$dt_boc,$userid,$actual_dt_rcvd_cont_whse)
  {
     $session_data      = $this->session->userdata('logged_in');
     $userid            = $session_data['uid'];

         $data = array(
        'ContainerNo'          => $containerno,
        'ContainerSize'        => $contno,
      /*  'CarrierByJobFileId'   =>$vesid,*/
        'NoOfCartons'          =>$cartons,
        'RefEntryNo'           =>$refentry,
        'TruckerName'          => $truckername,
        'StartOfStorage'       => $storage,
        'Lodging'              => $lodging,
        'DateBOCCleared'     => $dt_boc, 
        'HaulerOrTruckId'    => $truckid,
        'TargetDeliveryDate'   => $tdt,
        'DateSentFinalAssessment' => $dt_final_assess,
        'DatePaid'          => $dtpaid,
        'DateSentPreAssessment'   => $dt_pre_assess,
        'DateFileEntryToBOC'      => $dt_final_entry_boc,
        'GateInAtPort'        => $gip,
        'GateOutAtPort'       => $gop,
        'ActualDeliveryAtWarehouse' =>$adw,
        'StartOfDemorage'     => $demorage,
        'PullOutDateAtPort'     => $pull_out_date,
        'DateReceivedAtWhse' =>$actual_dt_rcvd_cont_whse


        );
          $this->db->where('ContainerByCarrierId', $carrierbyjobfile);
          $this->db->update('ContainerByCarrier', $data);


      $data2 = array(
        'ContainerByCarrierId' => $carrierbyjobfile,
        'ContainerNo'          => $containerno,
        'ContainerSize'        => $contno,
        'NoOfCartons'          =>$cartons,
        'RefEntryNo'           =>$refentry,
        'TruckerName'          => $truckername,
        'StartOfStorage'       => $storage,
        'Lodging'              => $lodging,
        'DateBOCCleared'     => $dt_boc, 
        'HaulerOrTruckId'    => $truckid,
        'TargetDeliveryDate'   => $tdt,
        'DateSentFinalAssessment' => $dt_final_assess,
        'DatePaid'          => $dtpaid,
        'DateSentPreAssessment'   => $dt_pre_assess,
        'DateFileEntryToBOC'      => $dt_final_entry_boc,
        'GateInAtPort'        => $gip,
        'GateOutAtPort'       => $gop,
        'ActualDeliveryAtWarehouse' =>$adw,
        'StartOfDemorage'     => $demorage,
        'PullOutDateAtPort'     => $pull_out_date,
        'DateReceivedAtWhse' =>$actual_dt_rcvd_cont_whse,
        'DateUpdated'               => Date('Y-m-d H:i'),
        'UpdatedBy_UserId'          =>$userid


        );
          $this->db->insert('ContainerByCarrierHistory', $data2);
  }


  function vessel($v,$est_dept_time,$est_arrival_time,
      	$act_arrival_time,$discharge_time,$Carrierid,$cr){
  	 $session_data      = $this->session->userdata('logged_in');
     $userid            = $session_data['uid'];

         $data = array(
        'CarrierId'             => $cr,
        'VesselVoyageNo'		=> $v,
        'DischargeTime'         => $discharge_time,
        'EstDepartureTime'		=> $est_dept_time,
        'EstArrivalTime'		=> $est_arrival_time,
        'ActualArrivalTime'	    => $act_arrival_time
       );


   	    $this->db->where('CarrierByJobFileId', $Carrierid);
        $this->db->update('CarrierByJobFile', $data);

       $data2 = array(
        'CarrierByJobFileId'    => $Carrierid,
        'CarrierId'             => $cr,
        'VesselVoyageNo'		    => $vessel,
        'DischargeTime'         => $discharge_time,
        'EstDepartureTime'	  	=> $est_dept_time,
        'EstArrivalTime'		    => $est_arrival_time,
        'ActualArrivalTime'	    => $act_arrival_time,
        'DateUpdated'           => Date('Y-m-d H:i'),
        'UpdatedBy_UserId'      =>$userid

       );

        $this->db->insert('CarrierByJobFileHistory', $data2);
  }

  function product($prodconid,$prodid,$cbc){
  	 $session_data      = $this->session->userdata('logged_in');
     $userid            = $session_data['uid'];

  	    $data = array(
        'ProductId'				  => $prodid,
        'ContainerByCarrierId'    => $cbc,
       );
   	    $this->db->where('ProductsByContainerId', $prodconid);
        $this->db->update('ProductsByContainer', $data);

       $data2 = array(
        'ProductsByContainerId'  => $prodconid
        'ProductId'				       => $prodid,
        'ContainerByCarrierId'   => $cbc,
        'DateUpdated'			       => $Date('Y-m-d H:i'),
        'UpdatedBy_UserId'		   => $userid

       );
        $this->db->insert('ProductsByContainerHistory', $data2);
  }



}
?>