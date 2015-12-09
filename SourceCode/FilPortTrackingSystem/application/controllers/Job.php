<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
           	$this->load->model('Jobdata');
       }

  // for jobfile 
  // getting the vessel data 
  //adding a data in form 
     function index(){
	
		 $data =	$this->input->post('ship_id');
		 $shipper = $this->Jobdata->get_vessel($data);

		echo'<select name="vessel" class="myvessel form-control">';
			echo '<option value="0" disabled selected>List of Vessels</option>';		            				       
		 foreach ($shipper as $row){
		 	echo "<option value=".$row->ShipperVesselId."> ".$row->Vesselname." </option>";
		 }

		  echo '</select>';


      ?>
      <script>
      $('.myvessel').change(function(){
        var id= $(this).val();
        alert(id);
        $('.veselid').val(id);
      });
      </script>

    <?php }



     function jofile_data(){

           $job = $this->input->post('jbfl');
           $consignee = $this->input->post('consignee');
           $broker = $this->input->post('broker');
           $mon = $this->input->post('monitoring_type');
           $entryno = $this->input->post('entryno');
           $registry =  $this->input->post('reg');
           $hbl =  $this->input->post('hbl');
           $mbl =  $this->input->post('mbl');
           $letter_cred_bank =  $this->input->post('letter_cred_bank');
           $dtRcvd_notice  =  $this->input->post('dtRcvd');
           $dt_pickup_obl  =  $this->input->post('dt_pickup_obl');
           $dt_pickup_docs  =  $this->input->post('dt_pickup_docs');
           $dt_req_budget  =  $this->input->post('dt_req_budget');
           $ref_due_dt  =  $this->input->post('ref_due_dt');
           

           $warehouseid  =  $this->input->post('warehouseid');
           $DatePaid  =  $this->input->post('DatePaid');
           $FlightNo  =  $this->input->post('FlightNo');
           $P_AirCraftNo  =  $this->input->post('P_AirCraftNo');
           $dt_forwarder  =  $this->input->post('DateReceivedNoticeFromForwarder');
       



           $add_jobfile = "CALL sp_CreateJobFile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                          $this->db->query($add_jobfile,
                            array(
                                   'P_JobFileID'                             =>$job,
                                   'P_ConsigneeId'                           =>$consignee,
                                   'P_BrokerID'                              =>$broker,
                                   'P_MonitoringTypeId'                      =>$mon,
                                   'P_RefEntryNo'                            =>$entryno,
                                   'P_Registry'                              =>$registry,             
                                   'P_HouseBillLadingNo'                     =>$hbl,
                                   'P_MasterBillLadingNo'                    =>$mbl,
                                   'P_LetterCreditFromBank'                  =>$letter_cred_bank,
                                   'P_DateReceivedNoticeFromClients'         =>$dtRcvd_notice,
                                   'P_DateReceivedOfBL'                      =>$dt_pickup_obl,
                                   'P_DateReceivedOfOtherDocs'               =>$dt_pickup_docs,
                                   'P_DateRequestBudgetToGL'                 =>$dt_req_budget,
                                   'P_RFPDueDate'                            =>$ref_due_dt,
                                   'ForwarderWarehouseId'                    =>$warehouseid,
                                   'P_DatePaid'                              =>$DatePaid,
                                   'P_FlightNo'                              =>$FlightNo,                    
                                   'P_AirCraftNo'                            =>$P_AirCraftNo,
                                   'P_DateReceivedNoticeFromForwarder'       =>$dt_forwarder
                                ));


           $vessel        =  $this->input->post('veselid');
          
           $vat           =  $this->input->post('ves_arrival_time');
           $vdt           =  $this->input->post('ves_discharge_time');

           
           $add_vessel ="CALL sp_AddVesselByJobFile(?,?,?,?)";
             $this->db->query($add_vessel,
              array(
                  'P_JobFileId'           => $job,
                  'P_ShipperVesselId'     => $vessel ,
                  'P_VesselArrivalTime'   => $vat,
                  'P_VesselDischargeTime' => $vdt
             ));



          //for getting the last insert in P_VesselByJobFileId start
           $table ='VesselByJobFile';
           $id = 'VesselByJobFileId';  
         $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
          //for getting the last insert in P_VesselByJobFileId end
           
           

        $cartoons            =  $this->input->post('cartoons');
        $plateno             =  $this->input->post('plateno');
        $gip                 =  $this->input->post('gip');
        $gop                 =  $this->input->post('gop');
        $adtw                =  $this->input->post('adtw');
        $etd                 =  $this->input->post('etd');
        $eta                 =  $this->input->post('eta');
        $ata                 =  $this->input->post('ata');
        $start_storage       =  $this->input->post('start_storage');
        $hauler              =  $this->input->post('hauler');
        $tdt                 =  $this->input->post('tdt');
        $start_demorage      =  $this->input->post('start_demorage');
        $dtSent              =  $this->input->post('dtSent');
        $truckername         =  $this->input->post('truckername');



        
        $session_data = $this->session->userdata('logged_in');
        $userid = $session_data['uid'];


        //ongoing
          $container = $session_data['container'];
          $lodging = $session_data['lodging'];
          $weight = $session_data['weight'];
        //


                     $containerbyvessel = "CALL sp_AddContainerByVessel(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $this->db->query($containerbyvessel,
              array(
                  'P_ContainerId'           => $container,   //ongoing    ///    auto incre in the table
                  'P_VesselByJobFileId'     => $VesselByJobFile ,    // last inserted id from VesselByJobFIle table
                  'P_NoOfCartons'           => $cartoons,
                  'P_TruckerPlateNo'        => $plateno,
                  'P_TruckerName'           => $truckername,
                  'P_EstDepartureTime'      => $etd,
                  'P_EstArrivalTime'        => $eta,
                  'P_ActualArrivalTime'     => $ata,
                  'P_StartOfStorage'        => $start_storage,
                  'P_Lodging'               => $lodging,  //ongoing //container
                  'P_HaulerId'              => $hauler,
                  'P_DateSentPreAssessment' => $dtSent,
                  'P_TargetDeliveryDate'    => $tdt,
                  'P_GateInAtPort'          => $gip,
                  'P_GateOutAtPort'         => $gop,
                  'P_ActualDeliveryAtWarehouse' =>$adtw,
                  'P_Weight'                    =>$weight,  //weight 
                  'P_StartOfDemorage'           =>$start_demorage,
                  'P_UserId'                    => $userid 



             ));






      }
}


?>