

<?php

Class Update_jobfile extends CI_Model
{
  
  function jobfile_up(
		$carrierbyjobfile,$vesid,$containerno,$contno,
		$cartons,$truckid,$truckername,$refentry,$dtpaid,$dt_pre_assess,
		$dt_final_assess,$storage,$demorage,$lodging,$gip,$gop,$adw,$tdt,
		$pull_out_date,$dt_final_entry_boc,$dt_boc)
  {

  	     $data = array(
        'ContainerNo'          => $containerno,
        'ContainerSize'        => $contno,
        'CarrierByJobFileId'   =>$vesid,
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
  }

}
?>