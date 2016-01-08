<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
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
      //$dt = Date("Y/m/d H:i:s");
     $jobfile =  $this->input->post('jobfile');
      $query= $this->db->query("Select * from JobFile where JobFileNo ='$jobfile' limit 1");
            
          if($query->num_rows() ==1){ 
            echo  "<i style='color:red;'>Jobfile already exists</i>";     
          }else{
             echo "<i style='color:green;'>Jobfile is available</i>"; 
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
                echo "<option value=".stripslashes($row->CarrierByJobFilelId)."> ". stripslashes($row->VesselVoyageNo)." </option>";
             }
        }

        echo '</select>';
  

      
    }

/*Get Vessel When adding New Container*/
    function get_vessel_container(){
      $vessel_mnila =  $this->input->post('jobfile');   
      $vessel_mnila_container = $this->Jobdata->get_vessel_container($vessel_mnila);

      if($vessel_mnila_container==NULL){
        echo '<label>Vessel/Voyage #</label><br>';
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#addVessel-mnla" onclick="click_containers()"><span class="fa fa-plus fa-fw"></span> Add Vessel</button>';

      }else{

         echo '<label>Vessel/Voyage #</label>
                <select class="vessel-addContainer-manila form-control input-sm">';
          foreach ($vessel_mnila_container as $row) {
              echo '<option value='.$row->CarrierByJobFileId.'>'.$row->VesselVoyageNo.'</option>';
          }
         echo '</select>';
      }
    }

    /*Get Vessel When Updating Container*/
    function get_update_vessel_container(){
      $vessel_mnila =  $this->input->post('jobfile');   
      $vessel_mnila_container = $this->Jobdata->get_vessel_container($vessel_mnila);

      if($vessel_mnila_container==NULL){
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#addVessel-mnla" onclick="click_containers()"><span class="fa fa-plus fa-fw"></span> Add Vessel</button>';

      }else{

         /*echo '<label>Vessel/Voyage #</label>
                <select class="vessel-addContainer-manila form-control input-sm">';*/
          foreach ($vessel_mnila_container as $row) {
              echo '<option value='.$row->CarrierByJobFileId.'>'.$row->VesselVoyageNo.'</option>';
          }
     /*    echo '</select>';*/
      }
    }


  /*Get Container When adding New Product*/
    function get_container_product(){
      $container_mnila =  $this->input->post('jobfile');   
      $container_mnila_product = $this->Jobdata->get_container_product($container_mnila);

      if($container_mnila_product==NULL){
        echo '<label>Container Number</label><br>';
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#addContainer-mnla" onclick="click_vessel()"><span class="fa fa-plus fa-fw"></span> Add Container</button>';
        echo '<input type="text" class="containers-prod-addProduct-mnila hidden form-control input-sm">';
        echo ' <i class="cont-size-msg-addProduct-mnila" style="color:red;"></i>';
      }else{

         echo '<label>Container Number</label>
                <select class="containers-prod-addProduct-mnila form-control input-sm">';
          foreach ($container_mnila_product as $row) {
              $cont =$row->ContainerNo;

              echo '<option class="remove_option" value='.$row->ContainerByCarrierId.'>'.$row->ContainerNo.'</option>';
          }
         echo '</select>';
         echo '<i class="cont-size-msg-addProduct-mnila" style="color:red;"></i>';
      }
    }

  /*Get Container When Updating Product*/
    function get_updated_container_product(){
      $container_mnila =  $this->input->post('jobfile');   
      $container_mnila_product = $this->Jobdata->get_container_product($container_mnila);

      if($container_mnila_product==NULL){
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#addContainer-mnla" onclick="click_vessel()"><span class="fa fa-plus fa-fw"></span> Add Container</button>';
        echo '<input type="text" class="containers-prod-addProduct-mnila hidden form-control input-sm">';
        echo ' <i class="cont-size-msg-addProduct-mnila" style="color:red;"></i>';
      }else{

         /*echo '<label>Container Number</label>
                <select class="containers-prod-addProduct-mnila form-control input-sm">';*/
          foreach ($container_mnila_product as $row) {
              $cont =$row->ContainerNo;

              echo '<option class="remove_option">'.$row->ContainerNo.'</option>';
          }
        /* echo '</select>';
         echo '<i class="cont-size-msg-addProduct-mnila" style="color:red;"></i>';*/
      }
    }

    function get_charges(){
      $charges =  $this->input->post('id');   
      $charge  = $this->Jobdata->get_chargess($charges);

/*    if($charge==NULL){
          echo    '<center><span style="color:red">No RunningCharges Found </span></center>';
    }else{*/

           foreach($charge as $row){
                      echo '<div class="col-lg-12">
                        
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Lodgement Fee</label>
                              <input type="text" name="lodge" class="form-control input-sm" id="lodge" value="'.$row->LodgementFee.'"  />
                            </div>

                            <div class="form-group">
                              <label>Container Deposit</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm" id="cont-deposit" value="'.$row->ContainerDeposit.'" />
                            </div>

                            <div class="form-group">
                              <label>THC Charges</label>
                              <input type="text" name="thc-charges" class="form-control input-sm" id="thc-charges" value="'.$row->THCCharges.'" />
                            </div>

                            <div class="form-group">
                              <label>Arrastre </label>
                              <input type="text" name="arrastre" class="form-control input-sm" id="arrastre" value="'.$row->Arrastre.'" />
                            </div>

                            <div class="form-group">
                              <label>Wharfage</label>
                              <input type="text" name="wharfage" class="form-control input-sm" id="wharfage" value="'.$row->Wharfage.'" />
                            </div>

                            <div class="form-group">
                              <label>Weighing</label>
                              <input type="text" name="weight" class="form-control input-sm" id="weight" value="'.$row->Weighing.'" />
                            </div>

                            <div class="form-group">
                              <label>DEL</label>
                              <input type="text" name="del" class="form-control input-sm" id="del" value="'.$row->DEL.'" />
                            </div>

                            <div class="form-group">
                              <label>Dispatch Fee</label>
                              <input type="text" name="dispatch" class="form-control input-sm" id="dispatch" value="'.$row->DispatchFee.'" />
                            </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm" id="storage" value="'.$row->Storage.'" />
                            </div>

                          </div>
                            

                          <div class="col-lg-6">

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm" id="demurrage" value="'.$row->Demorage.'" />
                              </div>

                              <div class="form-group">
                                <label>Detention</label>
                                <input type="text" name="detention" class="form-control input-sm"  id="detention" value="'.$row->Detention.'" />
                              </div>
                        
                              <div class="form-group">
                                <label>EIC</label>
                                <input type="text" name="EIC" class="form-control input-sm" id="EIC" value="'.$row->EIC.'" />
                              </div>

                              <div class="form-group">
                                <label>BAI Application</label>
                                <input type="text" name="bai-app" class="form-control input-sm" id="bai-app" value="'.$row->BAIApplication.'" />
                              </div>

                              <div class="form-group">
                                <label>BAI Inspection</label>
                                <input type="text" name="bai-inspect" class="form-control input-sm" id="bai-inspect" value="'.$row->BAIInspection.'" />
                              </div>

                              <div class="form-group">
                                <label>SRA Application</label>
                                <input type="text" name="sra-app" class="form-control input-sm" id="sra-app" value="'.$row->SRAApplication.'" />
                              </div>

                              <div class="form-group">
                                <label>SRA Inspection</label>
                                <input type="text" name="sra-inspect" class="form-control input-sm" id="sra-inspect" value="'.$row->SRAInspection.'" />
                              </div>

                              <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm" id="bad-cargo" value="'.$row->BadCargo.'" />
                              </div>
                          </div>
                        </div>';
                      }

   // }
    }

    function get_vessels(){
      $vessel =  $this->input->post('id');   
      $vessels  = $this->Jobdata->get_vessels($vessel);

     
            
    if($vessels==NULL){
     echo    '<center><span style="color:red">No Vessels Yet </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto;'> 
              <table class='table-bordered table table-striped table-hover table-condensed' '>
              <tr>
                   <th>No.</th>
                   <th>Update</th>
                   <th>Vessel/Voyage No</th>
                   <th>Carrier Name</th>
                   <th class='hidden'>value Actual Arrival Time</th>
                   <th>Actual Arrival Time</th>
                   <th class='hidden'>value DischargeTime</th>
                   <th>Discharge Time</th>
                   <th class='hidden'>value EstDepartureTime</th>
                   <th>Estimated Departure Time</th>
                   <th class='hidden'>value EstArrivalTime</th>
                   <th>Estimated Arrival Time</th>
                   <th class='hidden'>Value Carrier</th>
              </tr>";

          $i=0;
         foreach($vessels as $row){
          $i++;


             if($row->ActualArrivalTime == "0000-00-00 00:00:00"){
                $ActualArrivalTime = $row->ActualArrivalTime;
             }else{
                 $ActualArrivalTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->ActualArrivalTime));
             }

             if($row->DischargeTime == "0000-00-00 00:00:00"){
                $DischargeTime = $row->DischargeTime;
             }else{
                 $DischargeTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DischargeTime));
             }

             if($row->EstDepartureTime == "0000-00-00 00:00:00"){
                $EstDepartureTime = $row->EstDepartureTime;
             }else{
                 $EstDepartureTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstDepartureTime));
             }

             if($row->EstArrivalTime == "0000-00-00 00:00:00"){
                $EstArrivalTime = $row->EstArrivalTime;
             }else{
                 $EstArrivalTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstArrivalTime));
             }

             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td><button type='button' class='btn btn-default btn-update-vessel' data-toggle='modal' href='#updateVessel-mnla'><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row'>".stripslashes($row->VesselVoyageNo)."</td>";
             echo "<td class='row'>".stripslashes($row->CarrierName)."</td>";
                echo "<td class='row hidden'>".stripslashes($ActualArrivalTime)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualArrivalTime)."</td>";
                echo "<td class='row hidden'>".stripslashes($DischargeTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->DischargeTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($EstDepartureTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->EstDepartureTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($EstArrivalTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->EstArrivalTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->CarrierByJobFileId) ."</td>";
             
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }
   }

   function global_get_products(){
      $products =  $this->input->post('id');   
      $product  = $this->Jobdata->get_goods($products);
            
    if($product==NULL){
         echo    '<center><span style="color:red">No Commodities Yet </span></center>';
    }else{
         echo "<table id='tbl-commodities' class='table table-striped tableOverFlow'>
              <tr>
                   <th>No.</th>
                   <th>Commodity</th>
                   <th>Container No.</th>
              </tr>";

          $i=0;
         foreach($product as $row){
          $i++;
          if($i==1){
             if($row->ProductName==''){
                echo "</table>";
                echo    '<center><span style="color:red">No Goods Yet </span></center>';
                break;
              }
          }else{
              if($row->ProductName==''){
                break;
              }
          }
             echo "<tr>";
             echo "<td class='loadReports tdOverFlow'>".$i." </td>";
             echo "<td class='loadReports tdOverFlow'>".stripslashes($row->ProductName)."</td>";
             echo "<td class='loadReports tdOverFlow'>".stripslashes($row->ContainerNo) ."</td>";
             echo "</tr>";
         }
         echo "</table>";
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
                   <th>Update</th>
                   <th class='hidden'>Commodity Id</th>
                   <th>Commodity</th>
                  <th>Container No.</th>
              </tr>";

          $i=0;
         foreach($product as $row){
          $i++;
          if($i==1){
             if($row->ProductName==''){
                echo "</table>";
                echo    '<center><span style="color:red">No Goods Yet </span></center>';
                break;
              }
          }else{
              if($row->ProductName==''){
                break;
              }
          }
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td><button type='button' class='btn btn-default btn-update-product' data-toggle='modal' href='#updateProduct-mnla'><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row hidden'>".stripslashes($row->ProductId)."</td>";
             echo "<td class='row'>".stripslashes($row->ProductName)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerNo) ."</td>";
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }

    }


  function status_report(){
                          
    $status    =  $this->input->post('id');   
    $charges   = $this->Jobdata->get_status($status);
      echo "<table class='table-bordered table table-striped table-hover table-condensed'>
              <tr>
                   <th>No.</th>
                    <th>Status Description</th>
              </tr>";
      $i=0;
      foreach ($charges as $row) {
        $i++;
         $description = $row->StatusDescription;
/*         if($description==''){
         ?>
          <script>
           $('.remove_tr').remove();
          </script>
         <?php 
         }*/
       echo " <tr class='remove_tr'>
                 <td>".$i."</td>
                 <td> ".$row->StatusDescription."</td>
              </tr>
            ";
      }
       echo "</table>";
   }

   function global_status_report(){
    $status    =  $this->input->post('id');   
    $charges   = $this->Jobdata->get_status($status);
    if(count($charges)){
       echo "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;'>
              <tr>
                    <th>No.</th>
                    <th>Status Description</th>
              </tr>";
      $i=0;
      foreach ($charges as $row) {
        $i++;
       $description = $row->StatusDescription;
       echo " <tr>
                 <td class='loadReports tdOverFlow' id='loadReports'>".$i."</td>
                 <td class='loadReports tdOverFlow' id='loadReports'>". $description ."</td>
              </tr>
            ";
      }
       echo "</table>";
    }else{
      echo '<center><span style="color:red">No Record of Status Report </span></center>';
    }
     
   }

   function get_legend_desc(){
      $color_legend = $this->input->post('colors');
              $data = $this->Jobdata->get_legend_description($color_legend);
      $desc = "";
      foreach ($data as $row){
        $desc = stripslashes($row->Description);       
      }
      echo $desc;
    }

  function get_containers(){
   $containers =  $this->input->post('id'); 

   $container  = $this->Jobdata->get_containers($containers);

    if($container==NULL){
          echo    '<center><span style="color:red">No Containers Yet </span></center>';
    }else{
         echo "
         <div style='width:4000px;'> 
         <table class='table-bordered table table-striped table-hover table-condensed' >
              <tr>
                    <th>No.</th>
                    <th>Update</th>
                    <th>Vessel/Voyage No.</th>
                    <th>Container No</th>
                    <th>Container Size</th>
                    <th>No Of Cartons</th>
                    <th class=''>Value storage</th>
                    <th>Start Of Storage</th>
                     <th class=''>Value lodging</th>
                    <th>Lodging</th>
                    <th>Hauler/Trucker</th>
                    <th class='hidden'>Value tdd</th>
                    <th>Target Delivery Date</th>
                    <th class='hidden'>Value GateInAtPort</th>
                    <th>Gate In At Port</th>
                    <th class='hidden'>Value GateOutAtPort</th>
                    <th>Gate Out At Port</th>
                    <th class='hidden'>Value ActualDeliveryAtWarehouse</th>
                    <th>Actual Delivery At Warehouse</th>
                    <th class='hidden'>Value StartOfDemorage</th>
                    <th>Start Of Demurrage</th>
                    <th class='hidden'>Value PullOutDateAtPort</th>
                    <th>Pull Out Date At Port</th>
                    <th class='hidden'>Value DateBOCCleared</th>
                    <th>Date BOC Cleared</th>
                    <th class='hidden'>Value DateFileEntryToBOC</th>
                    <th>Date File Entry to BOC</th>
                    <th class='hidden'>Value DateSentPreAssessment</th>
                    <th>Date Sent Pre Assessment</th>
                    <th class='hidden'>Value DatePaid</th>
                    <th>Date Paid</th>
                    <th class='hidden'>Value DateSentFinalAssessment</th>
                    <th>Date Sent Final Assessment</th>
                    <th>Reference Entry No.</th>
                   

              </tr>";

          $i=0;
         foreach($container as $row){
          $i++;
             $container = $row->ContainerNo;
            if($i==1){
             if($container==''){
               echo    '</table>';
               echo    '<center><span style="color:red">No Containers Yet </span></center>';
              break;
             }
            }
           if($container==''){
              break;
             }

             if($row->StartOfStorage == "0000-00-00 00:00:00"){
                $StartOfStorage = $row->StartOfStorage;
             }else{
                 $StartOfStorage = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->StartOfStorage));
             }
            
             if($row->Lodging == "0000-00-00 00:00:00"){
                $Lodging = $row->Lodging;
             }else{
                $Lodging = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->Lodging));
             }

             if($row->TargetDeliveryDate == "0000-00-00 00:00:00"){
                $TargetDeliveryDate = $row->TargetDeliveryDate;
             }else{
                $TargetDeliveryDate = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->TargetDeliveryDate));
             }

             if($row->GateInAtPort == "0000-00-00 00:00:00"){
                $GateInAtPort = $row->GateInAtPort;
             }else{
                $GateInAtPort = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->GateInAtPort));
             }

             if($row->GateOutAtPort == "0000-00-00 00:00:00"){
                $GateOutAtPort = $row->GateOutAtPort;
             }else{
                $GateOutAtPort = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->GateOutAtPort));
             }

             if($row->ActualDeliveryAtWarehouse == "0000-00-00 00:00:00"){
                $ActualDeliveryAtWarehouse = $row->ActualDeliveryAtWarehouse;
             }else{
                $ActualDeliveryAtWarehouse = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->ActualDeliveryAtWarehouse));
             }

             if($row->StartOfDemorage == "0000-00-00 00:00:00"){
                $StartOfDemorage = $row->StartOfDemorage;
             }else{
                $StartOfDemorage = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->StartOfDemorage));
             }

             if($row->PullOutDateAtPort == "0000-00-00 00:00:00"){
                $PullOutDateAtPort = $row->PullOutDateAtPort;
             }else{
                $PullOutDateAtPort = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->PullOutDateAtPort));
             }

             if($row->DateBOCCleared == "0000-00-00 00:00:00"){
                $DateBOCCleared = $row->DateBOCCleared;
             }else{
                $DateBOCCleared = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DateBOCCleared));
             }

              if($row->DateFileEntryToBOC == "0000-00-00 00:00:00"){
                $DateFileEntryToBOC = $row->DateFileEntryToBOC;
             }else{
                $DateFileEntryToBOC = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DateFileEntryToBOC));
             }

              if($row->DateSentPreAssessment == "0000-00-00 00:00:00"){
                $DateSentPreAssessment = $row->DateSentPreAssessment;
             }else{
                $DateSentPreAssessment = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DateSentPreAssessment));
             }

              if($row->DatePaid == "0000-00-00 00:00:00"){
                $DatePaid = $row->DatePaid;
             }else{
                $DatePaid = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DatePaid));
             }

              if($row->DateSentFinalAssessment == "0000-00-00 00:00:00"){
                $DateSentFinalAssessment = $row->DateSentFinalAssessment;
             }else{
                $DateSentFinalAssessment = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DateSentFinalAssessment));
             }
             
             echo "<tr>";
             echo "<td> ".stripslashes($i)." </td>";
             echo "<td><button type='button' class='btn btn-default btn-update-container' data-toggle='modal' href='#updateContainer-mnla' ><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row'>".stripslashes($row->VesselVoyageNo)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerNo)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerSize)."</td>";
             echo "<td class='row'>".stripslashes($row->NoOfCartons)."</td>";
           /*  echo "<td class='row'>".stripslashes($row->TruckerName)."</td>";*/
/*             echo "<td class='row'>".stripslashes($row->EstDepartureTime)."</td>";*/
/*             echo "<td class='row'>".stripslashes($row->EstArrivalTime)."</td>";*/
/*             echo "<td class='row'>".stripslashes($row->ActualArrivalTime)."</td>";*/
                echo "<td class='row'>".stripslashes($StartOfStorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfStorage)."</td>";
                echo "<td class='row '>".stripslashes($Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->HaulerOrTruck)."</td>";
                echo "<td class='row hidden'>".stripslashes($TargetDeliveryDate)."</td>";
             echo "<td class='row'>".stripslashes($row->TargetDeliveryDate)."</td>";
                echo "<td class='row hidden'>".stripslashes($GateInAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->GateInAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($GateOutAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->GateOutAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($ActualDeliveryAtWarehouse)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
                echo "<td class='row hidden'>".stripslashes($StartOfDemorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfDemorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($PullOutDateAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->PullOutDateAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($DateBOCCleared)."</td>";
             echo "<td class='row'>".stripslashes($row->DateBOCCleared)."</td>";
                echo "<td class='row hidden'>".stripslashes($DateFileEntryToBOC)."</td>";
             echo "<td class='row'>".stripslashes($row->DateFileEntryToBOC)."</td>";
                echo "<td class='row hidden'>".stripslashes($DateSentPreAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentPreAssessment)."</td>";
                echo "<td class='row hidden'>".stripslashes($DatePaid)."</td>";
             echo "<td class='row'>".stripslashes($row->DatePaid)."</td>";
                echo "<td class='row hidden'>".stripslashes($DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->RefEntryNo)."</td>";
             



             echo "</tr>";
         }

         echo "</table>
                </div>";
    }

  }


//for testing function
  function jobfile_add(){
   $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];

   $monitoring_type =mysql_real_escape_string($this->input->post('monitoring_type'));
   $job             =mysql_real_escape_string($this->input->post('jbfl'));
   $consignee       =mysql_real_escape_string($this->input->post('consignee'));
   $shipper         =mysql_real_escape_string($this->input->post('shipper'));
   $mbl             =mysql_real_escape_string($this->input->post('mbl'));
   $mbl2            =mysql_real_escape_string($this->input->post('mbl2'));   //no insert in db
   $hbl             =mysql_real_escape_string($this->input->post('hbl'));
   $bank            =mysql_real_escape_string($this->input->post('bank'));
   $registry        =mysql_real_escape_string($this->input->post('registry'));
   $dtRcvd          =mysql_real_escape_string($this->input->post('dtRcvd'));
   $dt_pickup_obl   =mysql_real_escape_string($this->input->post('dt_pickup_obl'));
   $dt_pickup_docs  =mysql_real_escape_string($this->input->post('dt_pickup_docs'));
   $broker          =mysql_real_escape_string($this->input->post('broker'));
   $dt_req_budget   =mysql_real_escape_string($this->input->post('dt_req_budget'));
   $ref_due_dt      =mysql_real_escape_string($this->input->post('ref_due_dt'));
   $dt_boc          =mysql_real_escape_string($this->input->post('dt_boc'));    
   $status          =mysql_real_escape_string($this->input->post('status'));  //status report in job tab has no insert in db  
   $purch_order_no  =mysql_real_escape_string($this->input->post('purch_order_no'));  
   $color           =mysql_real_escape_string($this->input->post('color'));  
   $color_select    =mysql_real_escape_string($this->input->post('color_select')); 
   $origin           =mysql_real_escape_string($this->input->post('origin'));  
   $origcity    =mysql_real_escape_string($this->input->post('origcity'));    
   
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
     $chek= $this->db->query("Select * from JobFile where
          JobFileNo='$job' limit 1");
      if($chek->num_rows() ==1){
        echo "JobFile already Exists";
       }else{
         echo "New Jobfile is Added";


      $session_data = $this->session->userdata('logged_in');
      $userid = $session_data['uid'];
      $data = array(
               'JobFileNo'              => $job,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'       => $monitoring_type,
               'IsLocked'               => 0,
               'StatusId'               => $color,
               'ColorSelectivityId'     => $color_select,
               'Registry'               => $registry,
               'LockedBy_UserId'        => $userid,
               'DateCreated'            => Date('Y-m-d H:i'),
               'Origin_CountryId'       => $origin, 
               'OriginCity'             => $origcity,   
               'HouseBillLadingNo'      => $hbl,
               'MasterBillLadingNo'     => $mbl,
               'MasterBillLadingNo2'           =>$mbl2,
               'LetterCreditFromBank'          =>$bank,
               'DateReceivedNoticeFromClients' =>$dtRcvd,
               'DateReceivedOfBL'              =>$dt_pickup_obl,
               'DateReceivedOfOtherDocs'       =>$dt_pickup_docs,
               'DateRequestBudgetToGL'         =>Date('Y-m-d H:i'),
               'RFPDueDate'                    =>$ref_due_dt,
               'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder' =>NULL
               
        );


      $lastid =   $this->db->insert('JobFile',$data); 

        $data2 = array(
               'JobFileId'              => $lastid,
               'JobFileNo'              => $job,
               'ConsigneeId'            => $consignee,
               'BrokerId'               => $broker,
               'ShipperId'              => $shipper,
               'PurchaseOrderNo'        => $purch_order_no,
               'MonitoringTypeId'       => $monitoring_type,
               'IsLocked'               => 0,
               'StatusId'               => $color,
               'ColorSelectivityId'     => $color_select,
               'Registry'               => $registry,
               'LockedBy_UserId'        => $userid,
               'DateCreated'            => date('Y-m-d H:i:s'),
               'Origin_CountryId'       => $origin,
               'OriginCity'             => $origcity,
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
               'DateUpdated'                      => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'                 =>$userid

          );

      $lastid2 =   $this->db->insert('JobFileHistory',$data2);
        $job           = $this->Jobdata->select_jobfile($job);
        foreach($job as $row){
         $job =  $row->JobFileId;
        }
          if($status!=''){
             $data3 = array(
                     'StatusDescription' => $status,
                     'JobFileId'         => $job,  
                     'AddedBy_UserId'    => $userid
                     );
              $this->db->insert('HistoricalStatus',$data3);
          }
   

    }
      

      //for running charges insert
        $data = array(
               'JobFileId'        => $job,
        );
        $lastid =   $this->db->insert('RunningCharges',$data); 
                $data2 = array(
               'RunnningChargesId'=> $lastid,
               'JobFileId'        => $job,
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UsrId'  => $userid
        );
          $this->db->insert('RunningChargesHistory',$data2); 
      //
   }
function vessel(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
   
   $jobfile       = $this->input->post('jbfl');
   $job           = $this->Jobdata->select_jobfile($jobfile);
 
foreach($job as $row){
  $job =  $row->JobFileId;
 }
 $vessel        =  mysql_real_escape_string($this->input->post('vessel'));
 $lines         =  mysql_real_escape_string($this->input->post('lines'));

 $eat           =  mysql_real_escape_string($this->input->post('eat'));
 $edt           =  mysql_real_escape_string($this->input->post('edt'));
 $aat           =  mysql_real_escape_string($this->input->post('aat'));
 $discharge     =  mysql_real_escape_string($this->input->post('vdt'));
 
 
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
   $vessel_voyage   =  $this->input->post('vessel_voyage');
   $result   = $this->Jobdata->select_carrier($vessel_voyage);
 
foreach($result as $row){
  $vessel_voyage =  $row->CarrierByJobFileId;
 }
   $container       =  mysql_real_escape_string($this->input->post('containerId'));
   $consize         =  mysql_real_escape_string($this->input->post('consize')); 
   $cartons_no      =  mysql_real_escape_string($this->input->post('cartons_no')); 
   $plateno         =  mysql_real_escape_string($this->input->post('trucker_plate'));
   $trucker_name    =  mysql_real_escape_string($this->input->post('trucker_name'));
   $trucker_id      =  mysql_real_escape_string($this->input->post('trucker_id'));
   $ref_entry_no    =  mysql_real_escape_string($this->input->post('ref_entry_no'));
   $dt_paid         =  mysql_real_escape_string($this->input->post('dt_paid'));
   $dt_pre_assess   =  mysql_real_escape_string($this->input->post('dt_pre_assess'));
   $start_storage   =  mysql_real_escape_string($this->input->post('start_storage'));
   $start_demorage  =  mysql_real_escape_string($this->input->post('start_demorage'));
   $lodging         = mysql_real_escape_string($this->input->post('lodging'));
   $dt_file_entry_boc = mysql_real_escape_string($this->input->post('dt_file_entry_boc'));
   $dt_final_assess = mysql_real_escape_string($this->input->post('dt_final_assess'));
   $gip             = mysql_real_escape_string($this->input->post('gip'));
   $gop             = mysql_real_escape_string($this->input->post('gop'));
   $adw             =  mysql_real_escape_string($this->input->post('adw'));
   $dtboc           = mysql_real_escape_string($this->input->post('dtboc'));
   $tdt             =  mysql_real_escape_string($this->input->post('tdt'));
   $pul_out_port    = mysql_real_escape_string($this->input->post('pul_out_port'));




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
               'TruckerName'             => $trucker_name,
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
               'TruckerName'             =>  $trucker_name,
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
function comodity(){
        $session_data = $this->session->userdata('logged_in');
         $userid = $session_data['uid'];
         $prodid               =  mysql_real_escape_string($this->input->post('prod_orderno'));
         $product_name         =  mysql_real_escape_string($this->input->post('product_name'));
         $con_id               =  mysql_real_escape_string($this->input->post('con_id'));   
           $result   = $this->Jobdata->select_productcontainer($con_id);
       foreach($result as $row){
        $con_id =  $row->ContainerByCarrierId;
       }
/*
        if($product_name==''){
         $product_name=1;
        }*/

         $query = $this->db->query("select ProductId from ProductsByContainer where ProductId='$product_name'
          and ContainerByCarrierId='$con_id' "); 
      if($query->num_rows()==1) {
      }else{
       $data = array(
                     'ProductId'             => $product_name,
                     'ContainerByCarrierId'  => $con_id,
              );
      $lastid=$this->db->insert('ProductsByContainer',$data); 
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

 function jobfile_add_charge(){
   $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
   $jobfile       =  $this->input->post('jbfl');
   $job= $this->Jobdata->select_jobfile($jobfile);

foreach($job as $row){
  $job =  $row->JobFileId;
 }


   $lodge             =  mysql_real_escape_string($this->input->post('lodge'));
   $cont_deposit      =  mysql_real_escape_string($this->input->post('cont_deposit'));
   $thc_charges       =  mysql_real_escape_string($this->input->post('thc_charges'));   
   $wharfage          =  mysql_real_escape_string($this->input->post('wharfage'));
   $arrastre          =  mysql_real_escape_string($this->input->post('arrastre'));
   $weight            =  mysql_real_escape_string($this->input->post('weight'));
   $del               =  mysql_real_escape_string($this->input->post('del'));
   $dispatch          =  mysql_real_escape_string($this->input->post('dispatch'));
   $storage           =  mysql_real_escape_string($this->input->post('storage'));   
   $demurrage         =  mysql_real_escape_string($this->input->post('demurrage'));
   $detention         =  mysql_real_escape_string($this->input->post('detention'));
   $eic               =  mysql_real_escape_string($this->input->post('eic'));
   $bai_app           =  mysql_real_escape_string($this->input->post('bai_app'));
   $bai_inspect       =  mysql_real_escape_string($this->input->post('bai_inspect'));
   $sra_app           =  mysql_real_escape_string($this->input->post('sra_app'));   
   $sra_inspect       =  mysql_real_escape_string($this->input->post('sra_inspect'));
   $bad_cargo         =  mysql_real_escape_string($this->input->post('bad_cargo'));
   $all_charges       =  mysql_real_escape_string($this->input->post('all_charges'));
   $part_charges      =  mysql_real_escape_string($this->input->post('part_charges'));


  //stop inserting data in jobfile to avoid duplication
  $query= $this->db->query("Select * from vw_RunningCharges where
        JobFileId='$job' limit 1");
if($query->num_rows() ==1){


      $update_charges = array(
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

$this->db->where('JobFileId', $job);
$this->db->update('RunningCharges', $update_charges);


             $update_charges_history = array(
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

$this->db->where('JobFileId', $job);
$this->db->update('RunningChargesHistory', $update_charges_history);
}
   }

   function add_report(){
     $session_data      = $this->session->userdata('logged_in');
     $userid            = $session_data['uid'];
     $jobfile           = mysql_real_escape_string($this->input->post('jbfl'));
     $save_report       = mysql_real_escape_string($this->input->post('save_report'));
     
        $job= $this->Jobdata->select_jobfile($jobfile);
        foreach($job as $row){
          $job =  $row->JobFileId;
          }
             $data = array(
                     'StatusDescription'        => $save_report,
                     'JobFileId'                => $job,
                     'DateAdded'                => Date('Y-m-d H:i'),
                     'AddedBy_UserId'           => $userid
              );
        $this->db->insert('HistoricalStatus',$data); 
   }

}


?>