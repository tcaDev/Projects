

<?php

Class Update_jobfile extends CI_Model
{
  
  function jobfile_up(
		$carrierbyjobfile,$containerno,$contno,
		$cartons,$truckid,$truckername,$refentry,$dtpaid,$dt_pre_assess,
		$dt_final_assess,$storage,$demorage,$lodging,$gip,$gop,$adw,$tdt,
		$pull_out_date,$dt_final_entry_boc,$dt_boc,$userid)
  {


  	     $data = array(
        'ContainerNo'          => $containerno,
        'ContainerSize'        => $contno,
      /*  'CarrierByJobFileId'   =>$vesid,*/
        'NoOfCartons'          =>$cartons,
        'RefEntryNo'           =>$refentry,
        'TruckerName'          => $truckername,
        'StartOfStorage'       => $storage,
        'Lodging'              => $lodging,
        'DateBOCCleared'	   => $dt_boc, 
        'HaulerOrTruckId'	   => $truckid,
        'TargetDeliveryDate'   => $tdt,
        'DateSentFinalAssessment' => $dt_final_assess,
        'DatePaid'				  => $dtpaid,
        'DateSentPreAssessment'   => $dt_pre_assess,
        'DateFileEntryToBOC'      => $dt_final_entry_boc,
        'GateInAtPort'			  => $gip,
        'GateOutAtPort'			  => $gop,
        'ActualDeliveryAtWarehouse' =>$adw,
        'StartOfDemorage'			=> $demorage,
        'PullOutDateAtPort'			=> $pull_out_date



        );
          $this->db->where('ContainerByCarrierId', $carrierbyjobfile);
          $this->db->update('ContainerByCarrier', $data);


   /*   $data = array(
        'ContainerNo'          => $containerno,
        'ContainerSize'        => $contno,
      /*  'CarrierByJobFileId'   =>$vesid,*/
/*        'NoOfCartons'          =>$cartons,
        'RefEntryNo'           =>$refentry,
        'TruckerName'          => $truckername,
        'StartOfStorage'       => $storage,
        'Lodging'              => $lodging,
        'DateBOCCleared'	   => $dt_boc, 
        'HaulerOrTruckId'	   => $truckid,
        'TargetDeliveryDate'   => $tdt,
        'DateSentFinalAssessment' => $dt_final_assess,
        'DatePaid'				  => $dtpaid,
        'DateSentPreAssessment'   => $dt_pre_assess,
        'DateFileEntryToBOC'      => $dt_final_entry_boc,
        'GateInAtPort'			  => $gip,
        'GateOutAtPort'			  => $gop,
        'ActualDeliveryAtWarehouse' =>$adw,
        'StartOfDemorage'			=> $demorage,
        'PullOutDateAtPort'			=> $pull_out_date,
        'DateUpdated'               => Date('Y-m-d H:i'),
         'UpdatedBy_UserId'          =>$userid*/


       // );
        /*  $this->db->where('ContainerByCarrierId', $carrierbyjobfile);
          $this->db->update('ContainerByCarrierHistory', $data);*/
  }

  function vessel($v,$est_dept_time,$est_arrival_time,
      	$act_arrival_time,$discharge_time,$Carrierid,$cr){

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

/*       $data = array(
        'CarrierId'             => $cr,
        'VesselVoyageNo'		=> $vessel,
        'DischargeTime'         => $discharge_time,
        'EstDepartureTime'		=> $est_dept_time,
        'EstArrivalTime'		=> $est_arrival_time,
        'ActualArrivalTime'	    => $act_arrival_time,
        'DateUpdated'           => Date('Y-m-d H:i'),
        'UpdatedBy_UserId'      =>$userid

       );


   	    $this->db->where('CarrierByJobFileId', $Carrierid);
        $this->db->update('CarrierByJobFileHistory', $data);*/
  }

  function product($prodconid,$prodid,$cbc){
  	    $data = array(
        'ProductId'				  => $prodid,
        'ContainerByCarrierId'    => $cbc,
       );
   	    $this->db->where('ProductsByContainerId', $prodconid);
        $this->db->update('ProductsByContainer', $data);
  }



}
?>