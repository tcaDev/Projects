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
  
     $data =  $this->input->post('ship_id');
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


    function check_jobfiless(){
     $jobfile =  $this->input->post('jobfile');
      $query= $this->db->query("Select * from JobFile where JobFileNo ='$jobfile' limit 1");
            
          if($query->num_rows() ==1){ 
            echo  "Jobfile already exists";     
          }else{
             echo "Jobfile is available"; 
          }

    }

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

    

    function get_charges(){
      $charges =  $this->input->post('id');   
      $charge  = $this->Jobdata->get_chargess($charges);

    if($charge==NULL){
          echo    '<center><span style="color:red">No Vessels Yet </span></center>';
    }else{

           foreach($charge as $row){
                      echo '<div class="col-lg-12">
                        
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Lodgement Fee</label>
                              <input type="text" name="lodge" class="form-control input-sm" id="lodge" value="'.$row->LodgementFee.'" disabled />
                            </div>

                            <div class="form-group">
                              <label>Container Deposit</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm" id="cont-deposit" value="'.$row->ContainerDeposit.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>THC Charges</label>
                              <input type="text" name="thc-charges" class="form-control input-sm" id="thc-charges" value="'.$row->THCCharges.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Arrastre </label>
                              <input type="text" name="arrastre" class="form-control input-sm" id="arrastre" value="'.$row->Arrastre.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Wharfage</label>
                              <input type="text" name="wharfage" class="form-control input-sm" id="wharfage" value="'.$row->Wharfage.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Weighing</label>
                              <input type="text" name="weight" class="form-control input-sm" id="weight" value="'.$row->Weighing.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>DEL</label>
                              <input type="text" name="del" class="form-control input-sm" id="del" value="'.$row->DEL.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Dispatch Fee</label>
                              <input type="text" name="dispatch" class="form-control input-sm" id="dispatch" value="'.$row->DispatchFee.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm" id="storage" value="'.$row->Storage.'" disabled/>
                            </div>

                          </div>
                            

                          <div class="col-lg-6">

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm" id="demurrage" value="'.$row->Demorage.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>Detention</label>
                                <input type="text" name="detention" class="form-control input-sm"  id="detention" value="'.$row->Detention.'" disabled/>
                              </div>
                        
                              <div class="form-group">
                                <label>EIC</label>
                                <input type="text" name="EIC" class="form-control input-sm" id="EIC" value="'.$row->EIC.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>BAI Application</label>
                                <input type="text" name="bai-app" class="form-control input-sm" id="bai-app" value="'.$row->BAIApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>BAI Inspection</label>
                                <input type="text" name="bai-inspect" class="form-control input-sm" id="bai-inspect" value="'.$row->BAIInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Application</label>
                                <input type="text" name="sra-app" class="form-control input-sm" id="sra-app" value="'.$row->SRAApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Inspection</label>
                                <input type="text" name="sra-inspect" class="form-control input-sm" id="sra-inspect" value="'.$row->SRAInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm" id="bad-cargo" value="'.$row->BadCargo.'" disabled/>
                              </div>
                          </div>
                        </div>';
                      }
         /*echo "<div style='width:100%; overflow-x:auto; '> 
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
              </div>";*/
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

         foreach($charges as $row){
                      echo '<div class="col-lg-12">
                        
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Lodgement Fee</label>
                              <input type="text" name="lodge" class="form-control input-sm" id="lodge" value="'.$row->LodgementFee.'" />
                            </div>

                            <div class="form-group">
                              <label>Container Deposit</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm" id="cont-deposit" value="'.$row->ContainerDeposit.'"/>
                            </div>

                            <div class="form-group">
                              <label>THC Charges</label>
                              <input type="text" name="thc-charges" class="form-control input-sm" id="thc-charges" value="'.$row->THCCharges.'"/>
                            </div>

                            <div class="form-group">
                              <label>Arrastre </label>
                              <input type="text" name="arrastre" class="form-control input-sm" id="arrastre" value="'.$row->Arrastre.'"/>
                            </div>

                            <div class="form-group">
                              <label>Wharfage</label>
                              <input type="text" name="wharfage" class="form-control input-sm" id="wharfage" value="'.$row->Wharfage.'"/>
                            </div>

                            <div class="form-group">
                              <label>Weighing</label>
                              <input type="text" name="weight" class="form-control input-sm" id="weight" value="'.$row->Weighing.'"/>
                            </div>

                            <div class="form-group">
                              <label>DEL</label>
                              <input type="text" name="del" class="form-control input-sm" id="del" value="'.$row->DEL.'"/>
                            </div>

                            <div class="form-group">
                              <label>Dispatch Fee</label>
                              <input type="text" name="dispatch" class="form-control input-sm" id="dispatch" value="'.$row->DispatchFee.'"/>
                            </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm" id="storage" value="'.$row->Storage.'"/>
                            </div>

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm" id="demurrage" value="'.$row->Demorage.'"/>
                              </div>


                          </div>
                            

                          <div class="col-lg-6">
                            
                              <div class="form-group">
                                <label>Detention</label>
                                <input type="text" name="detention" class="form-control input-sm"  id="detention" value="'.$row->Detention.'"/>
                              </div>
                              
                              <div class="form-group">
                                <label>EIC</label>
                                <input type="text" name="EIC" class="form-control input-sm" id="EIC" value="'.$row->EIC.'"/>
                              </div>

                              <div class="form-group">
                                <label>BAI Application</label>
                                <input type="text" name="bai-app" class="form-control input-sm" id="bai-app" value="'.$row->BAIApplication.'"/>
                              </div>

                              <div class="form-group">
                                <label>BAI Inspection</label>
                                <input type="text" name="bai-inspect" class="form-control input-sm" id="bai-inspect" value="'.$row->BAIInspection.'"/>
                              </div>

                              <div class="form-group">
                                <label>SRA Application</label>
                                <input type="text" name="sra-app" class="form-control input-sm" id="sra-app" value="'.$row->SRAApplication.'"/>
                              </div>

                              <div class="form-group">
                                <label>SRA Inspection</label>
                                <input type="text" name="sra-inspect" class="form-control input-sm" id="sra-inspect" value="'.$row->SRAInspection.'"/>
                              </div>

                              <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm" id="bad-cargo" value="'.$row->BadCargo.'"/>
                              </div>
                          </div>
                        </div>';
                      }


       /*  echo "<div style='width:100%; overflow-x:auto; '> 
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
              </div>";*/
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
/*  date_default_timezone_set('Asia/Singapore');*/
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
/*   $dtSent          =$this->input->post('dtSent');
   $dtFile          =$this->input->post('dtFile');*/  
/*   $dtfinal_assess  =$this->input->post('dtfinal_assess'); */ 
/*   $dt_paid         =$this->input->post('dt_paid');*/
   $dt_boc          =$this->input->post('dt_boc');    
   $status          =$this->input->post('status');  //status report in job tab has no insert in db  
/*   $entryno         =$this->input->post('entryno');*/
   $purch_order_no  =$this->input->post('purch_order_no');  
   $color           =$this->input->post('color');  
   $color_select    =$this->input->post('color_select'); 

   $origin           =$this->input->post('origin');  
   $origcity    =$this->input->post('origcity');    
   
   if($dtRcvd!=''){
   $date1  = date_create($dtRcvd);
   $dtRcvd =  date_format($date1, 'Y-m-d H:i');
   }
   if($dt_pickup_obl!=''){
   $date2  = date_create($dt_pickup_obl);
   $dt_pickup_obl =  date_format($date2, 'Y-m-d H:i');
   }
   if($dt_pickup_docs!=''){
   $date3  = date_create($dt_pickup_docs);
   $dt_pickup_docs =  date_format($date3, 'Y-m-d H:i');
   }
    //stop inserting data in jobfile to avoid duplication
/*     $chek= $this->db->query("Select * from JobFile where
          JobFileNo='$job' limit 1");
      if($chek->num_rows() ==1){
        echo "JobFile is already exists";
       }else{
         echo "new jobfile is added";*/

  
                          //first proc
                /* $add_jobfile = "CALL sp_CreateJobFile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $this->db->query($add_jobfile,
                      array(
                             'P_JobFileNo'                             =>$job,           
                             'P_ConsigneeId'                           =>$consignee,
                             'P_BrokerID'                              =>$broker,
                             'P_ShipperId'                             =>$shipper,
                             'P_PurchaseOrderNo'                       =>$purch_order_no,
                             'P_MonitoringTypeId'                      =>1,
                             'P_StatusId'                              =>$color,
                             'P_RefEntryNo'                            =>$entryno,
                             'P_ColorSelectivityId'                    =>$color_select,
                             'P_Registry'                              =>$registry,

                             'P_Origin_CountryId'                      =>
                             'P_OriginCity'                            =>


                             'P_HouseBillLadingNo'                     =>$hbl,
                             'P_MasterBillLadingNo'                    =>$mbl,
                             'P_MasterBillLadingNo2'                   =>$mbl2
                             'P_LetterCreditFromBank'                  =>$bank,


                             'P_DateReceivedNoticeFromClients'         =>*/


                            /* 'P_DateSentPreAssessment'                 =>$dtSent,                  
                             'P_DateFileEntryToBOC'                    =>$dtFile,
                             'P_DateSentFinalAssessment'               =>$dtfinal_assess,
                             'P_DateReceivedNoticeFromClients'         =>$dtRcvd,
                             'P_DateReceivedOfBL'                      =>$dt_pickup_obl,
                            /* 'P_DateReceivedOfOtherDocs'               =>$dt_pickup_docs,*/
 /*                            'P_DateRequestBudgetToGL'                 =>$dt_req_budget,
                             'P_RFPDueDate'                            =>$ref_due_dt,
                             'P_ForwarderWarehouse'                    =>NULL, //dropdown from master data for air only
                             'P_DatePaid'                              =>$dt_paid,
                             'P_FlightNo'                              =>NULL,                    
                             'P_AirCraftNo'                            =>NULL,
                             'P_DateReceivedNoticeFromForwarder'       =>NULL,
                             'P_UserId'                                => $userid 
                          ));*/


      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];
      $data = array(
               'JobFileNo'              => $job,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'       => 1,
               'IsLocked'               => 0,

               'StatusId'               => $color,
               'ColorSelectivityId'     => $color_select,
               'Registry'               => $registry,

               'LockedBy_UserId'        => $userid,
               'DateCreated'            => date('Y-m-d H:i'),
               'Origin_CountryId'       => $origin,   //la pang ui  
               'OriginCity'             => $origcity,   //la pnag ui    

               'HouseBillLadingNo'      => $hbl,
               'MasterBillLadingNo'     => $mbl,
               'MasterBillLadingNo2'           =>$mbl2,
               'LetterCreditFromBank'          =>$bank,
               'DateReceivedNoticeFromClients' =>$dtRcvd,
               'DateReceivedOfBL'              =>$dt_pickup_obl,
               'DateReceivedOfOtherDocs'       =>$dt_pickup_docs,
               'DateRequestBudgetToGL'         =>date('Y-m-d H:i'),
               'RFPDueDate'                    =>$ref_due_dt,
               'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder' =>NULL,
               'status_report'                   =>$status
               
        );


      $lastid =   $this->db->insert('JobFile',$data); 

        $data2 = array(
               'JobFileId'              => $lastid,
               'JobFileNo'              => $job,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'      => 1,
               'IsLocked'              => 0,
               'StatusId'               => $color,
               'ColorSelectivityId'     => $color_select,
               'Registry'               => $registry,
               'LockedBy_UserId'        => $userid,
               'DateCreated'            => date('Y-m-d H:i:s'),
               'Origin_CountryId'       => 1,   //la pang ui
               'OriginCity'             => 'Laguna',   //la pnag ui 
               'HouseBillLadingNo'      => $hbl,
               'MasterBillLadingNo'     => $mbl,
               'MasterBillLadingNo2'           =>$mbl2,
               'LetterCreditFromBank'          =>$bank,
               'DateReceivedNoticeFromClients' =>$dtRcvd,
               'DateReceivedOfBL'              =>$dt_pickup_obl,
               'DateReceivedOfOtherDocs'       =>$dt_pickup_docs,
               'DateRequestBudgetToGL'         =>$dt_req_budget,
               'RFPDueDate'                    =>$ref_due_dt,
               'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder'  =>NULL,
               'status_report'                    =>$status,
               'DateUpdated'                      => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'                 =>$userid

          );

      $lastid2 =   $this->db->insert('JobFileHistory',$data2); 
               
       
   

          // }
   
   }
function vessel(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
   
   $jobfile       =  $this->input->post('jbfl');
   $job           = $this->Jobdata->select_jobfile($jobfile);
 
foreach($job as $row){
  $job =  $row->JobFileId;
 }
 $vessel        =  $this->input->post('vessel');
 $lines         =  $this->input->post('lines');

 $eat           =  $this->input->post('eat');
 $edt           =  $this->input->post('edt');
 $aat           =  $this->input->post('aat');
 $discharge     =  $this->input->post('vdt');
 
 
   if($eat!=''){
   $date1  = date_create($eat);
   $eat    =  date_format($date1, 'Y-m-d H:i');
   }
   if($edt!=''){
   $date2  = date_create($edt);
   $edt    =  date_format($date2, 'Y-m-d H:i');
   }
   if($discharge!=''){
   $date3        = date_create($discharge);
   $discharge    =  date_format($date3, 'Y-m-d H:i');
   }
   if($aat!=''){
   $date4  = date_create($aat);
   $aat    =  date_format($date4, 'Y-m-d H:i');
   }

        //2nd proc
/*       $add_vessel ="CALL sp_AddCarrierByJobFile(?,?,?,?,?,?,?,?)";
                    $this->db->query($add_vessel,
                     array(
                      'P_JobFileId'           =>1 ,
                      'P_CarrierId'           =>1 ,
                      'P_VesselVoyageNo'      =>1 ,
                      'P_EstDepartureTime'    =>1,
                      'P_EstArrivalTime'      =>1,
                      'P_ActualArrivalTime'   =>1,
/*                      'P_ArrivalTime'         => $vat[0],
                      'P_DischargeTime'       => 1,
                      'P_UserId'              => $userid
                    ));*/
        $data = array(
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge      
        );

  $lastid = $this->db->insert('CarrierByJobFile',$data); 

       $data2 = array(
               'CarrierByJobFileId'  => $lastid,
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge,
               'DateUpdated'         => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'    => $userid
        );

  $this->db->insert('CarrierByJobFileHistory',$data2); 
                
                
}

function container(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
 //for sp_AddContainerByVessel   3rd proc
   $vessel_voyage   =  $this->input->post('vessel_voyage');
   $result   = $this->Jobdata->select_carrier($vessel_voyage);
 
foreach($result as $row){
  $vessel_voyage =  $row->CarrierByJobFileId;
 }


   $container       =  $this->input->post('containerId');
   $consize         =  $this->input->post('consize'); 
   $cartons_no      =  $this->input->post('cartons_no'); 
   $plateno         =  $this->input->post('trucker_plate');
   $trucker_id      =  $this->input->post('trucker_id');
   $ref_entry_no    =  $this->input->post('ref_entry_no');

   $dt_paid         =  $this->input->post('dt_paid');
   $dt_pre_assess   =  $this->input->post('dt_pre_assess');
   $start_storage   =  $this->input->post('start_storage');
   $start_demorage  =  $this->input->post('start_demorage');
   $lodging         = $this->input->post('lodging');
   $dt_file_entry_boc = $this->input->post('dt_file_entry_boc');
   $dt_final_assess = $this->input->post('dt_final_assess');
   $gip             = $this->input->post('gip');
   $gop             = $this->input->post('gop');
   $adw             =  $this->input->post('adw');
   $dtboc           = $this->input->post('dtboc');


   $tdt             =  $this->input->post('tdt');
   $pul_out_port    = $this->input->post('pul_out_port');




   if($dt_paid!=''){
   $date1  = date_create($dt_paid);
   $dt_paid    =  date_format($date1, 'Y-m-d H:i');
   }
   if($dt_pre_assess!=''){
   $date2  = date_create($dt_pre_assess);
   $dt_pre_assess    =  date_format($date2, 'Y-m-d H:i');
   }
   if($start_storage!=''){
   $date3        = date_create($start_storage);
   $start_storage    =  date_format($date3, 'Y-m-d H:i');
   }
   if($start_demorage!=''){
   $date4  = date_create($start_demorage);
   $start_demorage    =  date_format($date4, 'Y-m-d H:i');
   }

   if($lodging!=''){
   $date5  = date_create($lodging);
   $lodging    =  date_format($date5, 'Y-m-d H:i');
   }
   if($dt_file_entry_boc!=''){
   $date6  = date_create($dt_file_entry_boc);
   $dt_file_entry_boc    =  date_format($date6, 'Y-m-d H:i');
   }
   if($dt_final_assess!=''){
   $date7        = date_create($dt_final_assess);
   $dt_final_assess    =  date_format($date7, 'Y-m-d H:i');
   }
   if($gip!=''){
   $date8  = date_create($gip);
   $gip    =  date_format($date8, 'Y-m-d H:i');
   }
   if($gop!=''){
   $date9  = date_create($gop);
   $gop    =  date_format($date9, 'Y-m-d H:i');
   }
   if($adw!=''){
   $date10  = date_create($adw);
   $adw    =  date_format($date10, 'Y-m-d H:i');
   }
   if($dtboc!=''){
   $date11  = date_create($dtboc);
   $dtboc    =  date_format($date11, 'Y-m-d H:i');
   }
   if($tdt!=''){
   $date12  = date_create($tdt);
   $tdt    =  date_format($date12, 'Y-m-d H:i');
   }
   if($pul_out_port!=''){
   $date13  = date_create($pul_out_port);
   $pul_out_port    =  date_format($date13, 'Y-m-d H:i');
   }


       //for getting the last insert in P_VesselByJobFileId start
/*               $table ='CarrierByJobFile';
               $id    ='CarrierByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);*/
              //for getting the last insert in P_VesselByJobFileId end
/*      $add_container ="CALL sp_AddContainerByCarrier(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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
                    ));*/

      $data = array(
               'ContainerNo'             => $container,
               'ContainerSize'           => $consize,
               'RefEntryNo'              => $ref_entry_no,
               'CarrierByJobFileId'      => $vessel_voyage,
               'NoOfCartons'             => $cartons_no,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateSentFinalAssessment' => $dt_final_assess,
               'DatePaid'                => $dt_paid,  
               'DateSentPreAssessment'   => $dt_pre_assess,
               'DateFileEntryToBOC'      => $dt_file_entry_boc,
               'DateBOCCleared'          => $dtboc,
               'HaulerOrTruckId'         => $trucker_id,
               'TargetDeliveryDate'         => $tdt,     
               'GateInAtPort'               => $gip,
               'GateOutAtPort'              => $gop,
               'ActualDeliveryAtWarehouse'  => $adw,
               'StartOfDemorage'            => $start_demorage,
               'PullOutDateAtPort'          => $pul_out_port   
               
        );

  $lastid = $this->db->insert('ContainerByCarrier',$data); 

      $data2 = array(
               'ContainerByCarrierId'    => $lastid,
               'ContainerNo'             => $container,
               'ContainerSize'           => $consize,
               'RefEntryNo'              => $ref_entry_no,
               'CarrierByJobFileId'      => $vessel_voyage,
               'NoOfCartons'             => $cartons_no,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateSentFinalAssessment' => $dt_final_assess,
               'DatePaid'                => $dt_paid,  
               'DateSentPreAssessment'   => $dt_pre_assess,
               'DateFileEntryToBOC'      => $dt_file_entry_boc,
               'DateBOCCleared'          => $dtboc,
               'HaulerOrTruckId'         => $trucker_id,
               'TargetDeliveryDate'         => $tdt,     
               'GateInAtPort'               => $gip,
               'GateOutAtPort'              => $gop,
               'ActualDeliveryAtWarehouse'  => $adw,
               'StartOfDemorage'            => $start_demorage,
               'PullOutDateAtPort'          => $pul_out_port,
               'DateUpdated'                => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'           => $userid
               
        );

  $lastid = $this->db->insert('ContainerByCarrierHistory',$data2); 

        


}

function carrier(){
/*$session_data = $this->session->userdata('logged_in');
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
*/
             //for getting the last insert in P_VesselByJobFileId start
      /*         $table ='CarrierByJobFile';
               $id    ='CarrierByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
              */
              //for getting the last insert in P_VesselByJobFileId end


             //3rd proc
/*             $containerbyvessel = "CALL sp_AddContainerByCarrier(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
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

             ));*/
/*  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
      $data = array(
               'ContainerNo'             => $container,
               'ContainerSize'           => $consize,
               'CarrierByJobFileId'      => $VesselByJobFile,
               'NoOfCartons'             => $cartons_no,
               'TruckerName'             => $trucker_name,
               'EstDepartureTime'        => $edt,
               'EstArrivalTime'          => $eat,
               'ActualArrivalTime'       => $aat,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateBOCCleared'          => $dtboc,
               'HaulerOrTruckId'         => $trucker_id,
               'TargetDeliveryDate'      => $tdt,
               'GateInAtPort'            => $gip,
               'GateOutAtPort'           => $gop,
               'ActualDeliveryAtWarehouse'  =>$adw,
               'StartOfDemorage'            =>$start_demorage,
               'PullOutDateAtPort'          =>NULL


               
        );

  $lastid = $this->db->insert('ContainerByCarrier',$data); 

        $data = array(
               'ContainerByCarrierId'    => $lastid,
               'ContainerNo'             => $container,
               'ContainerSize'           => $consize,
               'CarrierByJobFileId'      => $VesselByJobFile,
               'NoOfCartons'             => $cartons_no,
               'TruckerName'             => $trucker_name,
               'EstDepartureTime'        => $edt,
               'EstArrivalTime'          => $eat,
               'ActualArrivalTime'       => $aat,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateBOCCleared'          => $dtboc,
               'HaulerOrTruckId'         => $trucker_id,
               'TargetDeliveryDate'      => $tdt,
               'GateInAtPort'            => $gip,
               'GateOutAtPort'           => $gop,
               'ActualDeliveryAtWarehouse'  =>$adw,
               'StartOfDemorage'            =>$start_demorage,
               'PullOutDateAtPort'          =>NULL,
               'UpdatedBy_UserId'           =>$userid
               
        );

  $lastid2 = $this->db->insert('ContainerByCarrierHistory',$data); 
   $this->session->lastid2 = $lastid2;*/

}

function comodity(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
      //for sp_AddProducts   4th proc
   $prodid               =  $this->input->post('prod_orderno');
   $product_name         =  $this->input->post('product_name');
   $con_id               =  $this->input->post('con_id');   

      $result   = $this->Jobdata->select_productcontainer($con_id);
 foreach($result as $row){
  $con_id =  $row->ContainerByCarrierId;
 }
   
  
    //for getting the last insert in P_VesselByJobFileId start
      /*         $table ='ContainerByCarrier';
               $id    ='ContainerByCarrierId';  
           $CarrierByJobFile = $this->Jobdata->getLastInserted($table,$id);*/

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
/*             $addproducts = "CALL sp_AddProducts(?,?,?,?,?,?)";
             $this->db->query($addproducts,
              array(
                  'P_ProductId'           => $product_name, //la pa value  
                  'P_ContainerId'         => $con_id,
                  'P_CarrierByJobFileId'   => $VesselByJobFile,
                  'P_Origin_CountryId'    => $origin_id,
                  'P_Origin_City'         => $origin_cty,
                  'P_UserId'              => $userid
             ));*/
    //     } 
  //}   

  if($product_name==''){
   $product_name=1;
  }
  $carrier = $this->session->lastid2;
   $query = $this->db->query("select ProductId from ProductsByContainer where ProductId='$product_name'
    and ContainerByCarrierId='$con_id' "); 
if($query->num_rows()==1) {
}else{

 $data = array(
               'ProductId'             => $product_name,
               'ContainerByCarrierId'  => $con_id,
        );

 $lastid =  $this->db->insert('ProductsByContainer',$data); 


   $data2 = array(
               'ProductsByContainerId'    => $lastid,
               'ProductId'                => $product_name,
               'ContainerByCarrierId'     => $con_id,
               'DateUpdated'              => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'         => $userid
        );

  $this->db->insert('ProductsByContainerHistory',$data2); 
  $this->session->unset_userdata('lastid2');
}

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

        $lastid =   $this->db->insert('RunningCharges',$data); 

                $data = array(
               'RunnningChargesId'=> $lastid,
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
               'ParticularCharges'=> $part_charges,
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UsrId'  => $userid
        );

          $this->db->insert('RunningChargesHistory',$data); 
      }


 //}







    
}


?>