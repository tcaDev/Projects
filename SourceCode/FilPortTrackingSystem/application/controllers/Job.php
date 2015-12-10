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
       /* alert(id);*/
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
           $registry =  $this->input->post('registry');
           $hbl =  $this->input->post('hbl');
           $mbl =  $this->input->post('mbl');
           $letter_cred_bank =  $this->input->post('bank');
           $dtRcvd_notice  =  $this->input->post('dtRcvd');
           $dt_pickup_obl  =  $this->input->post('dt_pickup_obl');
           $dt_pickup_docs  =  $this->input->post('dt_pickup_docs');
           $dt_req_budget  =  $this->input->post('dt_req_budget');
           $ref_due_dt  =  $this->input->post('ref_due_dt');
           $dt_sent_preassed  =  $this->input->post('dt_sent_preassed');
           $dt_file_entry_boc  =  $this->input->post('dt_file_entry_boc');
           $dt_sent_finalassed  =  $this->input->post('dt_sent_finalassed');


           

          /* $warehouseid  =  $this->input->post('warehouseid');*/
           $DatePaid  =  $this->input->post('dt_paid');
         /*  $FlightNo  =  $this->input->post('FlightNo');*/
          /* $P_AirCraftNo  =  $this->input->post('P_AirCraftNo');*/
        /*   $dt_forwarder  =  $this->input->post('DateReceivedNoticeFromForwarder');
       */

          $session_data = $this->session->userdata('logged_in');
          $userid = $session_data['uid'];


           $add_jobfile = "CALL sp_CreateJobFile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
                                   'P_DateSentPreAssessment'                 =>$dt_sent_preassed,                  
                                   'P_DateFileEntryToBOC'                    =>$dt_file_entry_boc,
                                   'P_DateSentFinalAssessment'               =>$dt_sent_finalassed,
                                   'P_DateReceivedNoticeFromClients'         =>$dtRcvd_notice,
                                   'P_DateReceivedOfBL'                      =>$dt_pickup_obl,
                                   'P_DateReceivedOfOtherDocs'               =>$dt_pickup_docs,
                                   'P_DateRequestBudgetToGL'                 =>$dt_req_budget,
                                   'P_RFPDueDate'                            =>$ref_due_dt,
                                   'P_ForwarderWarehouseId'                  =>NULL,
                                   'P_DatePaid'                              =>$DatePaid,
                                   'P_FlightNo'                              =>NULL,                    
                                   'P_AirCraftNo'                            =>NULL,
                                   'P_DateReceivedNoticeFromForwarder'       =>NULL,
                                   'P_UserId'                                => $userid 
                                ));


           $vessel        =  $this->input->post('veselid');
          
           $vat           =  $this->input->post('ves_arrival_time');
           $vdt           =  $this->input->post('ves_discharge_time');

           
           $add_vessel ="CALL sp_AddVesselByJobFile(?,?,?,?,?)";
             $this->db->query($add_vessel,
              array(
                  'P_JobFileId'           => $job,
                  'P_ShipperVesselId'     => $vessel ,
                  'P_VesselArrivalTime'   => $vat,
                  'P_VesselDischargeTime' => $vdt,
                  'P_UserId'              => $userid
             ));



         

  
           
           

        $cartons            =  $this->input->post('cartons');
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

         $container         =  $this->input->post('container_nos');
         $lodging           =  $this->input->post('lodging');

         //for getting the last insert in P_VesselByJobFileId start
           $table ='VesselByJobFile';
           $id = 'VesselByJobFileId';  
         $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
          //for getting the last insert in P_VesselByJobFileId end
         
        //vessell by jobfile
         //drop down in container TAB
        $vessels=  $this->input->post('vessels'); 

                     $containerbyvessel = "CALL sp_AddContainerByVessel(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $this->db->query($containerbyvessel,
              array(
                  'P_ContainerId'           => $container,   //ongoing    ///    auto incre in the table
                  'P_VesselByJobFileId'     => $VesselByJobFile ,    // last inserted id from VesselByJobFIle table
                  'P_NoOfCartons'           => $cartons,
                  'P_TruckerPlateNo'        => $plateno,
                  'P_TruckerName'           => $truckername,
                  'P_EstDepartureTime'      => $etd,
                  'P_EstArrivalTime'        => $eta,
                  'P_ActualArrivalTime'     => $ata,
                  'P_StartOfStorage'        => $start_storage,
                  'P_Lodging'               => $lodging,  //ongoing //container
                  'P_HaulerId'              => $hauler,
               /*   'P_DateSentPreAssessment' => $dtSent,*/
                  'P_TargetDeliveryDate'    => $tdt,
                  'P_GateInAtPort'          => $gip,
                  'P_GateOutAtPort'         => $gop,
                  'P_ActualDeliveryAtWarehouse' =>$adtw,
                  'P_StartOfDemorage'           =>$start_demorage,
                  'P_UserId'                    => $userid 



             ));

                      //for getting the last insert in P_VesselByJobFileId start
           $table ='ContainerByVessel';
           $id = 'ContainerByVesselId';  
         $ContainerByVesselId = $this->Jobdata->getLastInserted($table,$id);
          //for getting the last insert in P_VesselByJobFileId end


              $products = $this->input->post('products');
              $purch_order_no = $this->input->post('purch_order_no');
              $countries = $this->input->post('countries');
              $city = $this->input->post('city');
              $status = $this->input->post('colors');
              $dt_boc = $this->input->post('dt_boc'); 
              

                $addproducts = "CALL sp_AddProducts(?,?,?,?,?,?,?,?)";
             $this->db->query($addproducts,
              array(
                  'P_ProductName'         => $products,   //ongoing    ///    auto incre in the table
                  'P_ContainerByVesselId' => $ContainerByVesselId ,    // last inserted id from VesselByJobFIle table
                  'P_StatusId'            => $status,
                  'P_PurchaseOrderNo'     => $purch_order_no,
                  'P_DateBOCCLeared'      => $dt_boc,
                  'P_Origin_CountryId'    => $countries,
                  'P_Origin_City'         => $city,
                  'P_UserId'              => $userid


             ));




      }
}


?>