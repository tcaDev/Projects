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
    if(isset($data)){
		 $shipper = $this->Jobdata->get_vessel($data);


    if($shipper==NULL){
          echo    '<center><span style="color:red">No Vessels in this shipper. </span></center>';
    }else{
     
		        echo'<select name="vessel" id="vess" class="myvessel form-control ">';				            				       
		        foreach ($shipper as $row){
		          	echo "<option value=".$row->ShipperVesselId."> ".$row->Vesselname." </option>";
		        }
          }

		  echo '</select>';


      ?>
      <script>
      $('.myvessel').change(function(){
        var id= $(this).val();
        var text = $(this).find("option:selected").text();
        $('.veselid').val(id);

        $('.veseltext').val(text);
      });

       $('.myvessel').click(function(){
        var id= $(this).val();
        var text = $(this).find("option:selected").text();
        $('.veselid').val(id);
        $('.veseltext').val(text);
        
      });

/*      $('.containerss').click(function(){
          var id= $('.myvessel').val();
          var text = $('.myvessel').find("option:selected").text();
          $('.veselid').val(id);
          $('.veseltext').val(text);
        
      });*/
 /*      $('#btn-container-mnla-add').click(function(){
          var id= $('.myvessel:first').val();
          var text = $('.myvessel:first').find("option:selected").text();
          $('.veselid').val(id);
          $('.veseltext').val(text);
        
      });*/

  document.addEventListener("DOMContentLoaded", function(event) { 
    $('.myvessel').click(function(){
       var id= $(this).val();
 /*       var text = $(this).find("option:selected").text();*/
      var text =   $(".myvessel :selected").text();
        $('.veselid').val(id);
        $('.veseltext').val(text); 
    });  

      </script>

    <?php }}


    function carrierjobfile(){

       $jobfile =  $this->input->post('jbfl_vessel');


         $job= $this->Jobdata->select_jobfile($jobfile);

            foreach($job as $row){
              $id =  $row->JobFileId;
            }

        $carrierbyjobfile = $this->User->carrierbyjobfile($id);


        if($carrierbyjobfile==NULL){
           echo    '<center><span style="color:red">No Vessels. </span></center>';
        }else{

          echo'<select name="carrierbyjobfile" id="carrier" class="carrierbyjobfile form-control">';                                   
          
            foreach ($carrierbyjobfile as $row){
                echo "<option value=".$row->CarrierByJobFilelId."> ".$row->VesselVoyageNo." </option>";
             }
        }

        echo '</select>';
  

      
    }

    function  check_jobfile(){
     $jobfile =  $this->input->post('jobfile');
      $query= $this->db->query("Select * from 
          JobFile where JobFileId='$jobfile' limit 1");
            
          if($query->num_rows() ==1){
            echo  "Jobfile already exists";     
          }else{
             echo "Jobfile is available"; 
          }

    }
    function get_charges(){
      $charges =  $this->input->post('id');   
      $charge  = $this->Jobdata->get_chargess($charges);

    if($charge==NULL){
          echo    '<center><span style="color:red">No Vessels Yet </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto; '> 
              <table class='table-bordered table table-striped table-hover table-condensed' '>
              <tr>
                   <th>No.</th>
                   <th>Lodgement Fee</th>
                   <th>Container Deposit</th>
                   <th>THC Charges</th>
                   <th>Arrastre</th>

                   <th>Wharfage</th>
                   <th>Weighing</th>
                   <th>DEL</th>
                   <th>Dispatch Fee</th>

                   <th>Storage</th>
                   <th>Demorage</th>
                   <th>Detention</th>
                   <th>EIC</th>

                   <th>BAIApplication</th>
                   <th>BAIInspection</th>
                   <th>SRAApplication</th>
                   <th>SRAInspection</th>

                   <th>BadCargo</th>
                   <th>AllCharges</th>
                   <th>ParticularCharges</th>
              </tr>";

          $i=0;
         foreach($charge as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->LodgementFee."</td>";
             echo "<td class='row'>".$row->ContainerDeposit."</td>";
             echo "<td class='row'>".$row->THCCharges ."</td>";
             echo "<td class='row'>".$row->Arrastre ."</td>";

             echo "<td class='row'>".$row->Wharfage."</td>";
             echo "<td class='row'>".$row->Weighing."</td>";
             echo "<td class='row'>".$row->DEL ."</td>";
             echo "<td class='row'>".$row->DispatchFee ."</td>";

             echo "<td class='row'>".$row->Storage."</td>";
             echo "<td class='row'>".$row->Demorage."</td>";
             echo "<td class='row'>".$row->Detention ."</td>";
             echo "<td class='row'>".$row->EIC ."</td>";

             echo "<td class='row'>".$row->BAIApplication."</td>";
             echo "<td class='row'>".$row->BAIInspection."</td>";
             echo "<td class='row'>".$row->SRAApplication ."</td>";
             echo "<td class='row'>".$row->SRAInspection ."</td>";

             echo "<td class='row'>".$row->BadCargo."</td>";
             echo "<td class='row'>".$row->AllCharges ."</td>";
             echo "<td class='row'>".$row->ParticularCharges ."</td>";

             

             
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }
    }

    function get_vessels(){
      $vessel =  $this->input->post('id');   
      $vessels  = $this->Jobdata->get_vessels($vessel);

     
            
    if($vessels==NULL){
          echo    '<center><span style="color:red">No Vessels Yet </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto; '> 
              <table class='table-bordered table table-striped table-hover table-condensed' '>
              <tr>
                   <th>No.</th>
                   <th>Vessel/Voyage No</th>
                   <th>Carrier Name</th>
                   <th>Arrival Time</th>
                   <th>Discharge Time</th>
              </tr>";

          $i=0;
         foreach($vessels as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->VesselVoyageNo."</td>";
             echo "<td class='row'>".$row->CarrierName."</td>";
             echo "<td class='row'>".$row->ArrivalTime ."</td>";
             echo "<td class='row'>".$row->DischargeTime ."</td>";
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }

    }

    function get_goods(){
      $products =  $this->input->post('id');   
      $product  = $this->Jobdata->get_goods($products);

     
            
    if($product==NULL){
          echo    '<center><span style="color:red">No Goods Yet </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto; '> 
              <table class='table-bordered table table-striped table-hover table-condensed' '>
              <tr>
                   <th>No.</th>
                   <th>Commodity</th>
                   <th>Origin</th>
                  <th>Container No.</th>
              </tr>";

          $i=0;
         foreach($product as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->ProductName."</td>";
             echo "<td class='row'>".$row->ORIGIN."</td>";
             echo "<td class='row'>".$row->ContainerNo ."</td>";
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }



    }

      function running_charges(){
      $charge =  $this->input->post('id');   
      $charges  = $this->Jobdata->get_charges($charge);

     
            
    if($charges==NULL){
          echo    '<center><span style="color:red">No RunningCharges Found </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto; '> 
              <table class='table-bordered table table-striped table-hover table-condensed' style='width: 700px;'>
              <tr>
                   <th>No.</th>
                   <th>Lodgement Fee</th>
                   <th>Container Deposit</th>
                   <th>THC Charges</th>
                   <th>Arrastre.</th>
                   <th>Weighing</th>
                   <th>Container Deposit</th>
                   <th>DEL</th>
                   <th>Dispatch Fee</th>
                   <th>Storage</th>
                   <th>Demorage</th>
                   <th>Detention</th>
                   <th>EIC</th>
                   <th>BAI Application</th>
                   <th>BAI Inspection</th>
                   <th>SRA Application</th>
                   <th>SRA Inspection</th>
                   <th>Bad Cargo</th>
                   <th>All Charges</th>
                   <th>Particular Charges</th>
              </tr>";

          $i=0;
         foreach($charges as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->LodgementFee."</td>";
             echo "<td class='row'>".$row->ContainerDeposit."</td>";
             echo "<td class='row'>".$row->THCCharges ."</td>";
             echo "<td class='row'>".$row->Arrastre ."</td>";
             echo "<td class='row'>".$row->Wharfage."</td>";
             echo "<td class='row'>".$row->Weighing."</td>";
             echo "<td class='row'>".$row->DEL."</td>";
             echo "<td class='row'>".$row->DispatchFee ."</td>";
             echo "<td class='row'>".$row->Storage."</td>";

             echo "<td class='row'>".$row->Demorage."</td>";
             echo "<td class='row'>".$row->Detention."</td>";
             echo "<td class='row'>".$row->EIC ."</td>";
             echo "<td class='row'>".$row->BAIApplication."</td>";
             echo "<td class='row'>".$row->BAIInspection."</td>";
             echo "<td class='row'>".$row->SRAApplication."</td>";
             echo "<td class='row'>".$row->SRAInspection ."</td>";
             echo "<td class='row'>".$row->BadCargo."</td>";
             echo "<td class='row'>".$row->AllCharges."</td>";
             echo "<td class='row'>".$row->ParticularCharges."</td>";
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }



    }

  function get_containers(){
   $containers =  $this->input->post('id'); 

   $container  = $this->Jobdata->get_containers($containers);

    if($container==NULL){
          echo    '<center><span style="color:red">No Containers Yet </span></center>';
    }else{
         echo "
         <div style='width:100%; overflow-x:auto; '> 
         <table class='table-bordered table table-striped table-hover table-condensed' >
              <tr>
                   <th>No.</th>
                    <th>Container No</th>
                    <th>Container Size</th>
                    <th>No Of Cartons</th>
                    <th>Trucker Name</th>
                    <th>Estimated Departure Time</th>
                    <th>Estimated Arrival Time</th>
                    <th>Actual Arrival Time</th>
                    <th>Start Of Storage</th>
                    <th>Lodging</th>
                    <th>Hauler/Trucker</th>
                    <th>Target Delivery Date</th>
                    <th>Gate In At Port</th>
                    <th>Gate Out At Port</th>
                    <th>Actual Delivery At Warehouse</th>
                    <th>Start Of Demorage</th>
                    <th>Pull Out Date At Port</th>

              </tr>";

          $i=0;
         foreach($container as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->ContainerNo."</td>";
             echo "<td class='row'>".$row->ContainerSize."</td>";
             echo "<td class='row'>".$row->NoOfCartons."</td>";
             echo "<td class='row'>".$row->TruckerName."</td>";
             echo "<td class='row'>".$row->EstDepartureTime."</td>";
             echo "<td class='row'>".$row->EstArrivalTime."</td>";
             echo "<td class='row'>".$row->ActualArrivalTime."</td>";
             echo "<td class='row'>".$row->StartOfStorage."</td>";
             echo "<td class='row'>".$row->Lodging."</td>";
             echo "<td class='row'>".$row->HaulerOrTruck."</td>";
             echo "<td class='row'>".$row->TargetDeliveryDate."</td>";
             echo "<td class='row'>".$row->GateInAtPort."</td>";
             echo "<td class='row'>".$row->GateOutAtPort."</td>";
             echo "<td class='row'>".$row->ActualDeliveryAtWarehouse."</td>";
             echo "<td class='row'>".$row->StartOfDemorage."</td>";
             echo "<td class='row'>".$row->PullOutDateAtPort."</td>";


             echo "</tr>";
         }

         echo "</table>
                </div>";
    }

  }
  function testing(){
                          
                 $containerbyvessel = "CALL sp_AddContainerByCarrier(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $this->db->query($containerbyvessel,
              array(       
                  'P_ContainerNo'           =>1,
                  'P_ContainerSize'         => 1,
                  'P_CarrierByJobFileId'    =>1,    // last inserted id from VesselByJobFIle table
                  'P_NoOfCartons'           => 1,
                  'P_TruckerName'           => 1,
                  'P_EstDepartureTime'      => 1,
                  'P_EstArrivalTime'        => 1,
                  'P_ActualArrivalTime'     => 1,
                  'P_StartOfStorage'        => 1,
                  'P_Lodging'               => 1,  
                  'P_DateBOCCleared'        =>1,
                  'P_HaulerOrTruckId'       => NULL,      //
                  'P_TargetDeliveryDate'    => NULL,
                  'P_GateInAtPort'          => NULL,
                  'P_GateOutAtPort'         => NULL,
                  'P_ActualDeliveryAtWarehouse' =>NULL,
                  'P_StartOfDemorage'           =>NULL,
                  'P_PullOutDateAtPort'         =>NULL,
                  'P_UserId'                    =>NULL 

             ));
  }

//for testing function
  function jobfile_add(){

   $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];


  //for sp_CreateJobFile proc  1st proc
   $job             =$this->input->post('jbfl');
   $consignee       =$this->input->post('consignee');
   $shipper         =$this->input->post('shipper');
   $mbl             =$this->input->post('mbl');
   $mbl2            =$this->input->post('mbl2');   //no insert in db
   $hbl             =$this->input->post('hbl');
   $bank            =$this->input->post('bank');
   $registry        =$this->input->post('registry');
   $dtRcvd          =$this->input->post('dtRcvd');
   $dt_pickup_obl   =$this->input->post('dt_pickup_obl');
   $dt_pickup_docs  =$this->input->post('dt_pickup_docs');
   $broker          =$this->input->post('broker');
   $dt_req_budget   =$this->input->post('dt_req_budget');
   $ref_due_dt      =$this->input->post('ref_due_dt');
   $dtSent          =$this->input->post('dtSent');
   $dtFile          =$this->input->post('dtFile');  
   $dtfinal_assess  =$this->input->post('dtfinal_assess');  
   $dt_paid         =$this->input->post('dt_paid');
   $dt_boc          =$this->input->post('dt_boc');    
   $status          =$this->input->post('status');  //status report in job tab has no insert in db  
   $entryno         =$this->input->post('entryno');
   $purch_order_no  =$this->input->post('purch_order_no');  
   $color           =$this->input->post('color');  
   $color_select    =$this->input->post('color_select');    
   
 
    //stop inserting data in jobfile to avoid duplication
     $query= $this->db->query("Select * from JobFile where
          JobFileId='$job' limit 1");
      if($query->num_rows() ==1){
        echo "JobFile is already exists";
       }else{
         echo "new jobfile is added";

  
                          //first proc
                 $add_jobfile = "CALL sp_CreateJobFile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $this->db->query($add_jobfile,
                      array(
                             'P_JobFileID'                             =>$job,           
                             'P_ConsigneeId'                           =>$consignee,
                             'P_BrokerID'                              =>$broker,
                             'P_ShipperId'                             =>$shipper,
                             'P_PurchaseOrderNo'                       =>$purch_order_no,
                             'P_MonitoringTypeId'                      =>1,
                             'P_StatusId'                              =>$color,
                             'P_RefEntryNo'                            =>$entryno,
                             'P_ColorSelectivityId'                    =>$color_select,
                             'P_Registry'                              =>$registry,            
                             'P_HouseBillLadingNo'                     =>$hbl,
                             'P_MasterBillLadingNo'                    =>$mbl,
                             'P_LetterCreditFromBank'                  =>$bank,
                             'P_DateSentPreAssessment'                 =>$dtSent,                  
                             'P_DateFileEntryToBOC'                    =>$dtFile,
                             'P_DateSentFinalAssessment'               =>$dtfinal_assess,
                             'P_DateReceivedNoticeFromClients'         =>$dtRcvd,
                             'P_DateReceivedOfBL'                      =>$dt_pickup_obl,
                             'P_DateReceivedOfOtherDocs'               =>$dt_pickup_docs,
                             'P_DateRequestBudgetToGL'                 =>$dt_req_budget,
                             'P_RFPDueDate'                            =>$ref_due_dt,
                             'P_ForwarderWarehouseId'                  =>NULL, //dropdown from master data for air only
                             'P_DatePaid'                              =>$dt_paid,
                             'P_FlightNo'                              =>NULL,                    
                             'P_AirCraftNo'                            =>NULL,
                             'P_DateReceivedNoticeFromForwarder'       =>NULL,
                             'P_UserId'                                => $userid 
                          ));

   

           }
   
   }
function vessel(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];

    $jobfile       =  $this->input->post('jbfl');

 $job= $this->Jobdata->select_jobfile($jobfile);
 
foreach($job as $row){
  $job =  $row->JobFileId;
 }
 $vessel        =  $this->input->post('vessel');
 $lines         =  $this->input->post('lines');
 $vat           =  $this->input->post('vat');
 $vdt           =  $this->input->post('vdt');

 $vat = explode(" ", $vat);
 $vdt = explode(" ", $vdt);


        //2nd proc
       $add_vessel ="CALL sp_AddCarrierByJobFile(?,?,?,?,?,?)";
                    $this->db->query($add_vessel,
                     array(
                      'P_JobFileId'           => $job,
                      'P_CarrierId'             => $lines,
                      'P_VesselVoyageNo'      => $vessel,
                      'P_ArrivalTime'         => $vat[0],
                      'P_DischargeTime'       => $vdt[0],
                      'P_UserId'              => $userid
                    ));
                
}

function container(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
 //for sp_AddContainerByVessel   3rd proc
   $container       =  $this->input->post('containerId');
   $consize         =  $this->input->post('consize'); 
   $cartons_no      =  $this->input->post('cartons_no'); 
   $plateno         =  $this->input->post('trucker_plate');
   $adw             =  $this->input->post('adw');
   $start_storage   =  $this->input->post('start_storage');
   $start_demorage  =  $this->input->post('start_demorage');
   $truckername     =  $this->input->post('trucker_name');
   $trucker_id      =  $this->input->post('trucker_id');
   $edt             =  $this->input->post('edt');
   $eat             =  $this->input->post('eat');
   $aat             =  $this->input->post('aat');
   $gip             = $this->input->post('gip');
  $gop              = $this->input->post('gop');
  $dtboc = $this->input->post('dtboc');
  $lodging = $this->input->post('lodging');
   $tdt = $this->input->post('tdt');

 $vat = explode(" ", $edt);
 $vdt = explode(" ", $eat);
 $vat = explode(" ", $aat);
 $eat = explode(" ", $eat);

 $gip  = explode(" ", $gip);
 $gop = explode(" ", $gop);
 $dtboc = explode(" ", $dtboc);
 $tdt = explode(" ", $tdt);

 
  $start_storage = explode(" ", $start_storage);
 $start_demorage = explode(" ", $start_demorage);
 $adw = explode(" ", $adw);

 

       //for getting the last insert in P_VesselByJobFileId start
               $table ='CarrierByJobFile';
               $id    ='CarrierByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
              //for getting the last insert in P_VesselByJobFileId end
      $add_container ="CALL sp_AddContainerByCarrier(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $this->db->query($add_container,
               array(
                      'P_ContainerNo'          =>$container,
                      'P_ContainerSize'        =>$consize,
                      'P_CarrierByJobFileId'   =>$VesselByJobFile,
                      'P_NoOfCartons'          =>$cartons_no,
                      'P_TruckerName'          =>$truckername,
                      'P_EstDepartureTime'     =>$edt[0],
                      'P_EstArrivalTime'       =>$eat[0],
                      'P_ActualArrivalTime'    =>$aat[0],
                      'P_StartOfStorage'       =>$start_storage[0],
                      'P_Lodging'              =>$lodging,
                      'P_DateBOCCleared'       =>$dtboc[0],
                      'P_HaulerOrTruckId'      =>$trucker_id,
                      'P_TargetDeliveryDate'   =>$tdt[0],
                      'P_GateInAtPort'         =>$gip[0],
                      'P_GateOutAtPort'        =>$gop[0],
                      'P_ActualDeliveryAtWarehouse' =>$adw[0],
                      'P_StartOfDemorage'           =>$start_demorage[0],
                      'P_PullOutDateAtPort'         =>null,
                      'P_UserId'                    =>$userid
                    ));

}

function carrier(){
$session_data = $this->session->userdata('logged_in');
$userid = $session_data['uid'];

   $containerId    =  $this->input->post('containerId');
   $consize        =  $this->input->post('consize');
   $cartons_no     =  $this->input->post('cartons_no');

   $trucker_plate    =  $this->input->post('trucker_plate');
   $trucker_name        =  $this->input->post('trucker_name');
   $edt     =  $this->input->post('edt');
   $eat     =  $this->input->post('eat');
   $aat     =  $this->input->post('aat');

   $start_storage      =  $this->input->post('start_storage');
   $start_demorage     =  $this->input->post('start_demorage');
   $lodging            =  $this->input->post('lodging');


   $tdt     =  $this->input->post('tdt');
   $gip     =  $this->input->post('gip');
   $gop     =  $this->input->post('gop');
   $adw     =  $this->input->post('adw');
   $dtboc   =  $this->input->post('dtboc');

   $trucker_id            =  $this->input->post('trucker_id');

             //for getting the last insert in P_VesselByJobFileId start
               $table ='CarrierByJobFile';
               $id    ='CarrierByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
              //for getting the last insert in P_VesselByJobFileId end


             //3rd proc
             $containerbyvessel = "CALL sp_AddContainerByCarrier(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $this->db->query($containerbyvessel,
              array(       
                  'P_ContainerNo'           =>$container,
                  'P_ContainerSize'         => $consize,
                  'P_CarrierByJobFileId'    =>$VesselByJobFile,    // last inserted id from VesselByJobFIle table
                  'P_NoOfCartons'           => $cartons_no,
                  'P_TruckerName'           => $trucker_name,
                  'P_EstDepartureTime'      => $edt,
                  'P_EstArrivalTime'        => $eat,
                  'P_ActualArrivalTime'     => $aat,
                  'P_StartOfStorage'        => $start_storage,
                  'P_Lodging'               => $lodging,  
                  'P_DateBOCCleared'        => $dtboc,
                  'P_HaulerOrTruckId'       => $trucker_id,      //
                  'P_TargetDeliveryDate'    => $tdt,
                  'P_GateInAtPort'          => $gip,
                  'P_GateOutAtPort'         => $gop,
                  'P_ActualDeliveryAtWarehouse' =>$adw,
                  'P_StartOfDemorage'           =>$start_demorage,
                  'P_PullOutDateAtPort'         =>NULL,
                  'P_UserId'                    =>$userid 

             ));
}

function comodity(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
      //for sp_AddProducts   4th proc
   $prodid               =  $this->input->post('prod_orderno');
   $product_name         =  $this->input->post('product_name');
   $con_id               =  $this->input->post('con_id');   
   $origin_id            =  $this->input->post('origin_id');
   $origin_cty           =  $this->input->post('origin_cty');
   /*$dt_boc               =  $this->input->post('dt_boc');*/
   
   
  
    //for getting the last insert in P_VesselByJobFileId start
               $table ='CarrierByJobFile';
               $id    ='CarrierByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);

            //for getting the last insert in P_VesselByJobFileId end
/* if(($product_name!=NULL) || ($product_name!='')){
     $query = $this->db->query("select ProductName from Products where ProductName='$product_name' limit 1");  
     $query2= $this->db->query("select `CBV`.`ContainerByCarrierId` from  
                                ContainerByCarrier as CBV where `CBV`.`ContainerNo` = $con_id 
                                and `CBV`.`ContainerByCarrierId`='$VesselByJobFile' ");
     if(($query->num_rows() ==1 ) && ($query2->num_rows()==1)){
     }else{
             if(($VesselByJobFile==NULL)||($VesselByJobFile=='')){
             $VesselByJobFile=1;
             }*/
                //4th proc
             $addproducts = "CALL sp_AddProducts(?,?,?,?,?,?)";
             $this->db->query($addproducts,
              array(
                  'P_ProductId'           => $product_name, //la pa value  
                  'P_ContainerId'         => $con_id,
                  'P_CarrierByJobFileId'   => $VesselByJobFile,
                /*  'P_DateBOCCLeared'      => $dt_boc,*/
                  'P_Origin_CountryId'    => $origin_id,
                  'P_Origin_City'         => $origin_cty,
                  'P_UserId'              => $userid
             ));
    //     } 
  //}      
 }

 function jobfile_add_charges(){
 $jobfile       =  $this->input->post('jbfl');
 $job= $this->Jobdata->select_jobfile($jobfile);
foreach($job as $row){
  $job =  $row->JobFileId;
 }


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
   $all_charges       =  $this->input->post('all_charges');
   $part_charges      =  $this->input->post('part_charges');


  //stop inserting data in jobfile to avoid duplication
/*  $query= $this->db->query("Select * from JobFile where
        JobFileId='$job' limit 1");
if($query->num_rows() ==1){
}else{  */
        $data = array(
               'JobFileId'        => $job,
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
               'AllCharges'       => $all_charges,
               'ParticularCharges'=> $part_charges
        );

          $this->db->insert('RunningCharges',$data); 

                $data = array(
               'JobFileId'        => $job,
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
               'AllCharges'       => $all_charges,
               'ParticularCharges'=> $part_charges
        );

          $this->db->insert('RunningChargesHistory',$data); 
      }


 //}







    
}


?>