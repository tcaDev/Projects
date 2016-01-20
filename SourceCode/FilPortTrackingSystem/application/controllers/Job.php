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
     $shipper = addslashes($this->Jobdata->get_vessel($data));


    if($shipper==NULL){
          echo    '<center><span style="color:red">No Vessels in this shipper. </span></center>';
    }else{
     
            echo'<select name="vessel" id="vess" class="myvessel form-control ">';                                   
            foreach ($shipper as $row){
                echo "<option value=".stripslashes($row->ShipperVesselId)."> ".stripslashes($row->Vesselname)." </option>";
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




  function get_country(){
      $jobfile =  $this->input->post('jobfile');

      $country = $this->Jobdata->get_countryID_manila($jobfile);
        foreach ($country as $row) {
          echo $row->Origin_CountryId;
        }
  
  }

  function get_country_name(){
      $jobfile =  $this->input->post('jobfile');
      
      $country = $this->Jobdata->get_countryID_manila($jobfile);
        foreach ($country as $row) {
          echo $row->OriginCity;
        }
  
  }

  function get_country_air(){
      $jobfile =  $this->input->post('jobfile');

      $country = $this->Jobdata->get_countryID_air($jobfile);
        foreach ($country as $row) {
          echo $row->Origin_CountryId;
        }
  
  }

  function get_country_name_air(){
      $jobfile =  $this->input->post('jobfile');
      
      $country = $this->Jobdata->get_countryID_air($jobfile);
        foreach ($country as $row) {
          echo $row->OriginCity;
        }
  
  }


    function check_jobfiless(){
      //$dt = Date("Y/m/d H:i:s");
      $jobfile =  $this->input->post('jobfile');
      $jbid =  $this->input->post('jbid');
      $mon =  $this->input->post('mon');
      

      $query= $this->db->query("Select * from JobFile where JobFileNo ='$jobfile' limit 1");
      $query2 = $this->Jobdata->mon_type($jobfile);
       foreach ($query2 as $row) {
          $moni = $row->MonitoringTypeName;
       }
   /*   $query2= $this->db->query("Select * from JobFile where JobFileNo ='$jobfile' and JobFileId='$jbid' limit 1");
        */   

      if($jobfile!=''){
          if($query->num_rows() ==1){
            if($moni!=''){
                echo  "<i style='color:red;'>Jobfile already exists in ".$moni."</i>";     
             }
          }else{
             echo "<i style='color:green;'>Jobfile available</i>"; 
          }
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
      $href_modal =  $this->input->post('href');
      $vessel =  $this->input->post('vessel'); 
      $vessel_mnila_container = $this->Jobdata->get_vessel_container($vessel_mnila,$vessel);

      if($vessel_mnila_container==NULL){
        echo '<label>Vessel/Voyage #</label><br>';
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="'.$href_modal.'" ><span class="fa fa-plus fa-fw"></span> Add Vessel</button>';

      }else{

         echo '<label>Vessel/Voyage #</label>
                <select class="vessel-addContainer-manila vessel-addContainer-outport form-control input-sm">';
          foreach ($vessel_mnila_container as $row) {
              echo '<option value='.stripslashes($row->CarrierByJobFileId).'>'.stripslashes($row->VesselVoyageNo).'</option>';
          }
         echo '</select>';
      }
      ?>
       <script>
       $('.check_exists_container_update').click(function(){
        var ves = $('.vessel-addContainer-manila').val();
         $('.veschek').val(ves);
       });
       </script>
      <?php
    }
  
    /*Get Vessel When Updating Container*/
    /*function get_update_vessel_container(){
      $vessel_mnila =  $this->input->post('jobfile'); 
      $vessel       =  $this->input->post('vessel');    
      $vessel_mnila_container = $this->Jobdata->get_vessel_container($vessel_mnila,$vessel);

      if($vessel_mnila_container==NULL){
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="#addVessel-mnla" onclick="click_containers()"><span class="fa fa-plus fa-fw"></span> Add Vessel</button>';
      }else{
          foreach ($vessel_mnila_container as $row) {
              echo '<option value='.$row->CarrierByJobFileId.'>'.$row->VesselVoyageNo.'</option>';
          }
      }
    }*/

  /*Get Container When adding New Product*/
    function get_container_product(){
      $container_mnila =  $this->input->post('jobfile');   
      $href_modal =  $this->input->post('href');
      $onclick =  $this->input->post('onclick');
      $container_mnila_product = $this->Jobdata->get_container_product($container_mnila);

      if($container_mnila_product==NULL){
        echo '<label>Container Number</label><br>';
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" href="'.$href_modal.'" onclick="'.$onclick.'()"><span class="fa fa-plus fa-fw"></span> Add Container</button>';
        echo ' <i class="cont-size-msg-addProduct-mnila" style="color:red;"></i>';
      }else{

         echo '<label>Container Number</label>
                <select class="containers-prod-addProduct-mnila containers-prod-addProduct-outport form-control input-sm">';
          foreach ($container_mnila_product as $row) {
              $cont =$row->ContainerNo;

              echo '<option class="remove_option" value='.$row->ContainerByCarrierId.'>'.$row->ContainerNo.'</option>';
          }
         echo '</select>';
         echo '<i class="cont-size-msg-addProduct-mnila cont-size-msg-addProduct-outport" style="color:red;"></i>';
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

              echo '<option class="remove_option " value="'.$row->ContainerByCarrierId.'">'.$row->ContainerNo.'</option>';
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
                              <input type="text" name="lodge" class="form-control input-sm lodge_update checkDec" id="lodge" value="'.$row->LodgementFee.'" disabled />
                            </div>

                            <div class="form-group">
                              <label>Container Deposit</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm cont-deposit checkDec" id="cont-deposit" value="'.$row->ContainerDeposit.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>THC Charges</label>
                              <input type="text" name="thc-charges" class="form-control input-sm thc-charges checkDec" id="thc-charges" value="'.$row->THCCharges.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Arrastre </label>
                              <input type="text" name="arrastre" class="form-control input-sm arrastre checkDec" id="arrastre" value="'.$row->Arrastre.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Wharfage</label>
                              <input type="text" name="wharfage" class="form-control input-sm wharfage checkDec" id="wharfage" value="'.$row->Wharfage.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Weighing</label>
                              <input type="text" name="weight" class="form-control input-sm weight checkDec" id="weight" value="'.$row->Weighing.'" disabled />
                            </div>

                            <div class="form-group">
                              <label>DEL</label>
                              <input type="text" name="del" class="form-control input-sm del checkDec" id="del" value="'.$row->DEL.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Dispatch Fee</label>
                              <input type="text" name="dispatch" class="form-control input-sm dispatch checkDec" id="dispatch" value="'.$row->DispatchFee.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm storage checkDec" id="storage" value="'.$row->Storage.'" disabled />
                            </div>

                          </div>
                            

                          <div class="col-lg-6">

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm demurrage checkDec" id="demurrage" value="'.$row->Demorage.'"  disabled/>
                              </div>

                              <div class="form-group">
                                <label>Detention</label>
                                <input type="text" name="detention" class="form-control input-sm detention checkDec"  id="detention" value="'.$row->Detention.'" disabled />
                              </div>
                        
                              <div class="form-group">
                                <label>EIC</label>
                                <input type="text" name="EIC" class="form-control input-sm EIC checkDec" id="EIC" value="'.$row->EIC.'" disabled />
                              </div>

                              <div class="form-group">
                                <label>BAI Application</label>
                                <input type="text" name="bai-app" class="form-control input-sm bai-app checkDec" id="bai-app" value="'.$row->BAIApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>BAI Inspection</label>
                                <input type="text" name="bai-inspect" class="form-control input-sm bai-inspect checkDec" id="bai-inspect" value="'.$row->BAIInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Application</label>
                                <input type="text" name="sra-app" class="form-control input-sm sra-app checkDec" id="sra-app" value="'.$row->SRAApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Inspection</label>
                                <input type="text" name="sra-inspect" class="form-control input-sm sra-inspect checkDec" id="sra-inspect" value="'.$row->SRAInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm bad-cargo checkDec" id="bad-cargo" value="'.$row->BadCargo.'"disabled />
                              </div>
                          </div>
                        </div>';
                      }

   // }
    }

    function get_charges_air(){
      $charges =  $this->input->post('id');   
      $job=$this->Jobdata->select_jobfile_air($charges);
        foreach($job as $row){
         $jobs =  $row->JobFile_AirId;
        }
          $charge  = $this->Jobdata->get_chargess_air($jobs);
           foreach($charge as $row){
                  echo '<div class="col-lg-12 list_charges-air">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Lodgement Fee</label>
                              <input type="text" name="lodge" class="form-control input-sm lodge_airs checkDec-air" id="lodge_airs" value="'.$row->LodgementFee.'" disabled />
                            </div>

                            <div class="form-group">
                              <label>Container Deposit</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm cont-deposit_airs checkDec-air" id="cont_deposit_airs" value="'.$row->ContainerDeposit.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>THC Charges</label>
                              <input type="text" name="thc-charges" class="form-control input-sm thc-charges_airs checkDec-air" id="thc_charges_airs" value="'.$row->THCCharges.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Arrastre </label>
                              <input type="text" name="arrastre" class="form-control input-sm arrastre_airs checkDec-air" id="arrastre_airs" value="'.$row->Arrastre.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Wharfage</label>
                              <input type="text" name="wharfage" class="form-control input-sm wharfage_airs checkDec-air"  id="wharfage_airs" value="'.$row->Wharfage.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Weighing</label>
                              <input type="text" name="weight" class="form-control input-sm weight_airs checkDec-air" id="weight_airs" value="'.$row->Weighing.'" disabled />
                            </div>

                            <div class="form-group">
                              <label>DEL</label>
                              <input type="text" name="del" class="form-control input-sm del_airs checkDec-air" id="del_airs" value="'.$row->DEL.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Dispatch Fee</label>
                              <input type="text" name="dispatch" class="form-control input-sm dispatch_airs checkDec-air" id="dispatch_airs" value="'.$row->DispatchFee.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm storage_airs checkDec-air" id="storage_airs" value="'.$row->Storage.'" disabled />
                            </div>

                          </div>
                            

                          <div class="col-lg-6">

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm demurrage_airs checkDec-air" id="demurrage_airs" value="'.$row->Demorage.'"  disabled/>
                              </div>

                              <div class="form-group">
                                <label>Detention</label>
                                <input type="text" name="detention" class="form-control input-sm detention_airs checkDec-air"  id="detention_airs" value="'.$row->Detention.'" disabled />
                              </div>
                        
                              <div class="form-group">
                                <label>EIC</label>
                                <input type="text" name="EIC" class="form-control input-sm EIC_airs checkDec-air" id="EIC_airs" value="'.$row->EIC.'" disabled />
                              </div>

                              <div class="form-group">
                                <label>BAI Application</label>
                                <input type="text" name="bai-app" class="form-control input-sm bai-app_airs checkDec-air" id="bai_app_airs" value="'.$row->BAIApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>BAI Inspection</label>
                                <input type="text" name="bai-inspect" class="form-control input-sm bai-inspect_airs checkDec-air" id="bai_inspect_airs" value="'.$row->BAIInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Application</label>
                                <input type="text" name="sra-app" class="form-control input-sm sra-app_airs checkDec-air" id="sra_app_airs" value="'.$row->SRAApplication.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>SRA Inspection</label>
                                <input type="text" name="sra-inspect" class="form-control input-sm sra-inspect_airs checkDec-air" id="sra_inspect_airs" value="'.$row->SRAInspection.'" disabled/>
                              </div>

                              <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm bad-cargo_airs checkDec-air" id="bad_cargo_airs" value="'.$row->BadCargo.'"disabled />
                              </div>
                          </div>
                        </div>';
                      }
    }

    function get_vessels(){
      $vessel =  $this->input->post('id');   
      $vessels  = $this->Jobdata->get_vessels($vessel);
      $button_update = $this->input->post('button_update');
      $href =  $this->input->post('href');

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
                   <th>Estimated Departure</th>
                   <th class='hidden'>value EstArrivalTime</th>
                   <th>Estimated Arrival</th>
                   <th class='hidden'>Value Carrier</th>
                   <th class='hidden'>value Actual Berthing Time</th>
                   <th>Actual Berthing Time</th>
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

             if($row->EstDepartureTime == "0000-00-00"){
                $EstDepartureTime = $row->EstDepartureTime;
             }else{
                 $EstDepartureTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstDepartureTime));
             }

             if($row->EstArrivalTime == "0000-00-00 00:00:00"){
                $EstArrivalTime = $row->EstArrivalTime;
             }else{
                 $EstArrivalTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstArrivalTime));
             }

              if($row->BerthingTime == "0000-00-00 00:00:00"){
                $BerthingTime = $row->BerthingTime;
             }else{
                 $BerthingTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->BerthingTime));
             }

             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td><button type='button' class='btn btn-default ".$button_update."' data-toggle='modal' href='#updateVessel-".$href."'><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row'>".stripslashes($row->VesselVoyageNo)."</td>";
             echo "<td class='row'>".stripslashes($row->CarrierName)."</td>";
                echo "<td class='row hidden'>".stripslashes($ActualArrivalTime)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualArrivalTime)."</td>";
                echo "<td class='row hidden'>".stripslashes($DischargeTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->DischargeTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->EstDepartureTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->EstDepartureTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->EstArrivalTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->EstArrivalTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->CarrierByJobFileId) ."</td>";
                echo "<td class='row hidden'>".stripslashes($BerthingTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->BerthingTime) ."</td>";
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
             echo "<tr class='tableRow'>";
             echo "<td class='loadReports tdOverFlow'>".$i." </td>";
             echo "<td class='loadReports tdOverFlow'>".stripslashes($row->ProductName)."</td>";
             echo "<td class='loadReports tdOverFlow'>".stripslashes($row->ContainerNo) ."</td>";
             echo "</tr>";
         }
         echo "</table>";
    }
   }

   function report_get_products(){
     $products =  $this->input->post('id');   
     $monitoringType    =  $this->input->post('monType');
     if($monitoringType == 3){
       $product  = $this->Jobdata->get_goods_air($products);
     }else{
       $product  = $this->Jobdata->get_goods($products);
     }
            
    if($product==NULL){
         echo    '<center><span style="color:red">No Commodities Yet </span></center>';
    }else{
          if($monitoringType == 3){
              echo "<table id='tbl-second-report-data' class='table table-striped table-layout:fixed' style='cursor:pointer;'>
              <tr>
                   <th style='border: 1px solid gray'><center>No.</center></th>
                   <th style='border: 1px solid gray'><center>Commodity</center></th>
              </tr>";
          }else{
            echo "<table id='tbl-second-report-data' class='table table-striped table-layout:fixed' style='cursor:pointer;'>
              <tr>
                   <th style='border: 1px solid gray'><center>No.</center></th>
                   <th style='border: 1px solid gray'><center>Container No.</center></th>
                   <th style='border: 1px solid gray'><center>Commodity</center></th>
              </tr>";
          }
          $i=0;
         foreach($product as $row){
          $i++;
          if($i==1){
             if($row->ProductName==''){
                echo "</table>";
                echo '<center><span style="color:red">No Goods Yet </span></center>';
                break;
              }
          }else{
              if($row->ProductName==''){
                break;
              }
          }
          if($monitoringType == 3){
             echo "<tr>";
             echo "<td style='border: 1px solid gray'>". $i ."</td>";
             echo "<td style='border: 1px solid gray'>".stripslashes($row->ProductName)."</td>";
             echo "</tr>";
          }else{
             echo "<tr>";
             echo "<td style='border: 1px solid gray'>". $i ."</td>";
             echo "<td style='border: 1px solid gray'>".stripslashes($row->ContainerNo) ."</td>";
             echo "<td style='border: 1px solid gray'>".stripslashes($row->ProductName)."</td>";
             echo "</tr>";
          }
         }
         echo "</table>";
    }
   }

   function report_get_running_charges(){
     $charges           =  $this->input->post('id'); 
     $monitoringType    =  $this->input->post('monType');
     $charge  = $this->Jobdata->get_chargess($charges,$monitoringType);
     $total = 0;

           foreach($charge as $row){
            $total += $row->LodgementFee;
            $total += $row->Demorage;
            $total += $row->ContainerDeposit;
            $total += $row->Detention;
            $total += $row->THCCharges;
            $total += $row->EIC;
            $total += $row->Arrastre;
            $total += $row->BAIInspection;
            $total += $row->BAIApplication;
            $total += $row->Wharfage;
            $total += $row->Weighing;
            $total += $row->SRAInspection;
            $total += $row->SRAApplication;
            $total += $row->DEL;
            $total += $row->DispatchFee;
            $total += $row->BadCargo;
            $total += $row->Storage;
                      echo '
                      <table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%text-align:left;">
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Lodgement Fee : </b>
                                <span class="pull-right">
                                    '.$row->LodgementFee.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Demurrage : </b>
                                <span class="pull-right">
                                    '.$row->Demorage.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Container Deposit : </b>
                                <span class="pull-right">
                                   '.$row->ContainerDeposit.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Detention : </b>
                                <span class="pull-right">
                                    '.$row->Detention.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  THC Charges : </b>
                                <span class="pull-right">
                                   '.$row->THCCharges.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> EIC : </b>
                                <span class="pull-right">
                                    '.$row->EIC.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Arrastre : </b>
                                <span class="pull-right">
                                   '.$row->Arrastre.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  BAI Application : </b>
                                <span class="pull-right">
                                    '.$row->BAIApplication.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Wharfage : </b>
                                <span class="pull-right">
                                   '.$row->Wharfage.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  BAI Inspection :</b> 
                                <span class="pull-right">
                                    '.$row->BAIInspection.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Weighing : </b>
                                <span class="pull-right">
                                   '.$row->Weighing.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  SRA Application : </b>
                                <span class="pull-right">
                                    '.$row->SRAApplication.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  DEL : </b>
                                <span class="pull-right">
                                   '.$row->DEL.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  SRAInspection : </b>
                                <span class="pull-right">
                                    '.$row->SRAInspection.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Dispatch Fee : </b>
                                <span class="pull-right">
                                   '.$row->DispatchFee.'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                               <b> Bad Cargo : </b>
                                <span class="pull-right">
                                    '.$row->BadCargo.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <b>  Storage : </b>
                                <span class="pull-right">
                                   '.$row->Storage.'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                              <hidden> </hidden>                             
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                  <span class="pull-right"style="font-size:20px;"><b> Sub Total : </b> ' . $total . ' </span>
                            </td>
                          </tr>

                      </table>';
                      }
   }

    function get_goods(){
      $products =  $this->input->post('id');   
      $product  = $this->Jobdata->get_goods($products);
      $button_update = $this->input->post('button_update');
      $href =  $this->input->post('href');

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
                  <th class='hidden'>ProductsByContainerId</th>
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
             echo "<td><button type='button' class='btn btn-default ".$button_update."' data-toggle='modal' href='#updateProduct-".$href."'><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row hidden'>".stripslashes($row->ProductId)."</td>";
             echo "<td class='row'>".stripslashes($row->ProductName)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerNo) ."</td>";
             echo "<td class='row hidden'>".stripslashes($row->ProductsByContainerId) ."</td>";
             echo "</tr>";
         }

         echo "</table>
              </div>";
    }

    }


    function get_goods_air(){
       $products =  $this->input->post('id'); 
        $job=$this->Jobdata->select_jobfile_air($products);
        foreach($job as $row){
         $jobs =  $row->JobFile_AirId;
        }  
       $product  = $this->Jobdata->get_goods_air($jobs);

       if($product==NULL){
          echo    '<center><span style="color:red">No Goods Yet </span></center>';
    }else{
         echo "<div style='width:3000px;'> 
              <table class='table-bordered table table-striped table-hover table-condensed' '>
              <tr>
                   <th>No.</th>
                   <th>Update</th>
                    <th class='hidden'>Commodity Id</th>
                  <th>Commodity</th>
                  <th>Reference Entry No.</th>
                  <th>Gross Weight(kgs)</th>
                  <th>Date Sent Pre Assess</th>
                  <th>Date Paid (Date & Time)</th>
                  <th>Date Sent Final Assess</th>
                  <th>Date BOC Cleared</th>
                  <th>Target Delivery Date</th>
                  <th>Actual Pull Out Date at NAIA</th>
                  <th>Date Received at Warehouse</th>
                  <th>Hauler</th>
                  <th>Total Storage</th>
                  <th>Additional Per Day Include VAT</th>
                
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


            if($row->DatePaid == "0000-00-00 00:00:00"){
                $DatePaid = $row->DatePaid;
             }else{
                 $DatePaid = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DatePaid));
             }


             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td><button type='button' class='btn btn-default btn-update-air' data-toggle='modal' href='#updateProduct-air'><span class='fa fa-pencil fa-fw'></span></button></td>";
                 echo "<td class='row hidden'>".stripslashes($row->Products_AirId)."</td>"; 
             echo "<td class='row'>".stripslashes($row->ProductName)."</td>";
             echo "<td class='row'>".stripslashes($row->RefEntryNo) ."</td>";
             echo "<td class='row '>".stripslashes($row->GrossWeight) ."</td>";
             echo "<td class='row '>".stripslashes($row->DateSentPreAssessment) ."</td>";
                  echo "<td class='row hidden'>".stripslashes($DatePaid) ."</td>";
             echo "<td class='row '>".stripslashes($row->DatePaid) ."</td>";
             echo "<td class='row '>".stripslashes($row->DateSentFinalAssessment) ."</td>";
             echo "<td class='row '>".stripslashes($row->DateBOCCleared) ."</td>";
             echo "<td class='row '>".stripslashes($row->TargetDeliveryDate) ."</td>";
             echo "<td class='row '>".stripslashes($row->ActualPullOutDateAtNAIA) ."</td>";
             echo "<td class='row '>".stripslashes($row->DateReceivedAtWhse) ."</td>";
             echo "<td class='row '>".stripslashes($row->HaulerOrTruck) ."</td>";
             echo "<td class='row '>".stripslashes($row->TotalStorage) ."</td>";
             echo "<td class='row '>".stripslashes($row->AdtlPerDayncludeVat) ."</td>";
             echo "<td class='row hidden'>".stripslashes($row->JobFileNo) ."</td>";
             echo "<td class='row hidden'>".stripslashes($row->ProductId)."</td>"; 
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


   function status_report_air(){
                          
    $status    =  $this->input->post('id');   
    $charges   = $this->Jobdata->get_status_air($status);


      if($charges==NULL){
          echo    '<center><span style="color:red">No Reports Yet </span></center>';
    }else{
      echo "<table class='table-bordered table table-striped table-hover table-condensed'>
              <tr>
                   <th>No.</th>
                    <th>Status Description</th>
              </tr>";
      $i=0;
      foreach ($charges as $row) {
        $i++;
         $description = $row->StatusDescription;
    /*   if($description==''){
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
 }

   function global_status_report(){
    $status    =  $this->input->post('id');   
    $charges   = $this->Jobdata->get_status($status);
    if(count($charges)){
       echo "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;'>
              <tr>
                    <th style='border: 1px solid gray'>No.</th>
                    <th style='border: 1px solid gray'>Status Description</th>
              </tr>";
      $i=0;
      foreach ($charges as $row) {
        $i++;
       $description = $row->StatusDescription;
       echo " <tr>
                 <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>".$i."</td>
                 <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>". $description ."</td>
              </tr>
            ";
      }
       echo "</table>";
    }else{
      echo '<center><span style="color:red">No Record of Status Report </span></center>';
    }
   }

   function reports_get_status_report(){
      $status    =  $this->input->post('id');   
      $monType   = $this->input->post('monType');
      $charges   = $this->Jobdata->report_get_status($status,$monType);

      if(count($charges)){
         echo "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;'>
                <tr>
                      <th style='border: 1px solid gray'>No.</th>
                      <th style='border: 1px solid gray'>Status Description</th>
                </tr>";
        $i=0;
        foreach ($charges as $row) {
          $i++;
         $description = $row->StatusDescription;
         echo " <tr>
                   <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>".$i."</td>
                   <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>". $description ."</td>
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

    function get_details_report(){
      $consignee_name     =  $this->input->post('consignee_name');  
      $monitoringType     =  $this->input->post('monType');

      $shipper            =  $this->input->post('shipperName');
      $dateRcvd           =  $this->input->post('dateRcvdOther_Docs');
      $consigneename      =  $this->input->post('consigneeName');
      $HBL                =  $this->input->post('HBL_');

      $dispOutput = "";

      $jfNo    =  $this->input->post('jfNo');

      $dispOutput .= '<table style="font-family:Century Gothic;font-size:16px;table-layout:fixed;width:100%;cursor:pointer;" id="table-pre-details">
                    <tr >
                      <td style="text-align:left;">
                      <span class="pull-left">  <b> Shipper   : </b></span>
                      </td>
                      <td style="text-align:left;">
                      &nbsp;<a id="shipper">' . $shipper . '</a>
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align:left;">
                       <span class="pull-left"> <b> Consignee  : </b></span>
                      </td>
                      <td style="text-align:left;">
                      &nbsp;<a id="consignee">' . $consigneename . ' </a> 
                      </td>
                    </tr>
                    <tr>
                      <td style="text-align:left;">
                         <span class="pull-left"><b>Date Received of other Documents  : </b></span>
                      </td>
                      <td style="text-align:left;">
                      &nbsp;<a id="dtRecvdOtherDocs">' . $dateRcvd . ' </a> 
                      </td>
                    </tr>';
                    if($monitoringType == 3){
                    $dispOutput .='
                                    <tr>
                                      <td style="text-align:left;">
                                         <span class="pull-left"><b>Aircraft  : </b></span>
                                      </td>
                                      <td style="text-align:left;">
                                        &nbsp;<a id="Carriers"> </a> 
                                      </td>
                                    </tr>';
                    }else{
                      $dispOutput .='
                                    <tr>
                                      <td style="text-align:left;">
                                         <span class="pull-left"><b>Vessel  : </b></span>
                                      </td>
                                      <td style="text-align:left;">
                                        &nbsp;<a id="Carriers"> </a> 
                                      </td>
                                    </tr>';

                    }
                    $jobfiles= $this->Jobdata->getCarriers_Consignee($consignee_name,$monitoringType,$jfNo);
                    $ct = count($jobfiles);
                     if($ct > 0){
                    foreach($jobfiles as $row){
                        if($monitoringType == 3){
                            $dispOutput .='
                                      <tr>
                                            <td style="text-align:left;font-style:12px;padding-left:50px;"><b>ATA of Aircraft No '.stripslashes($row->VesselNumber).'</b></td>
                                            <td style="text-align:left;font-style:12px;">'.stripslashes($row->ActualArrivalTime).'</td>
                                      </tr>
                            ';
                          }else{
                            $dispOutput .='
                                      <tr>
                                            <td style="text-align:left;font-style:12px;padding-left:50px;"><b>ATA of Vessel '.stripslashes($row->VesselNumber).'</b></td>
                                            <td style="text-align:left;font-style:12px;">'.stripslashes($row->ActualArrivalTime).'</td>
                                      </tr>
                            ';
                          }
                    }
                    }else{
                       $dispOutput .= ' <tr>
                                        <td style="text-align:left;font-style:15px;">No Data for Vessels</td>
                                        </tr><center><span style="color:red">No Data for Vessels </span></center>'
                                      ;
                    }
                    $dispOutput .='
                    <tr>
                      <td style="text-align:left;">
                         <span class="pull-left"><b> HBL#  : </b></span>
                      </td>
                      <td style="text-align:left;">
                      &nbsp;<a id="hbl">' . $HBL . ' </a> 
                      </td>
                    </tr>
                  </table>';
          echo $dispOutput;
   }
  function get_consignee_status_report(){
      $consignee_name    =  $this->input->post('consignee_name');  
      $monitoringType    =  $this->input->post('monType');
      $jobfiles= $this->Jobdata->getJobFiles_Consignee($consignee_name,$monitoringType);
      if($monitoringType == 3){
          $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table style="background-color:#fff;border:1px solid #000;border-collapse:collapse;cursor:pointer;" class="table table-bordered order-table">';
          $dispOutput .= '
                        <thead>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> House Airway Bill# </center></th>
                              <th><center> Date Received of Other Documents </center></th>
                        </thead>
                      ';
          foreach($jobfiles as $row){
              $dispOutput .='
                      <tbody>
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td>'.stripslashes($row->DatePickUpOtherDocs).'</td>
                        </tr>
                      </tbody>
              ';
          }

            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search </span></center>';
          }
      }else{
         $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table style="background-color:#fff; border:1px solid #000; border-collapse: collapse;cursor:pointer; " class="table table-bordered order-table">';
          $dispOutput .= '
                        <thead>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> HBL# </center></th>
                              <th><center> Date Received of Other Documents </center></th>
                        </thead>
                      ';
          foreach($jobfiles as $row){
              $dispOutput .='
                      <tbody>
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td>'.stripslashes($row->DateReceivedOfOtherDocs).'</td>
                        </tr>
                      </tbody>
              ';
          }

            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search </span></center>';
          }
      }
     
      $dispCount = '<i class="result-count" style="font-size:24px;">Found (' . $ct . ') Data Match(es)</i>';

      $output = array(
        array(
           "disp" => $dispOutput,
           "result_count" => $dispCount
          )
        );

     echo json_encode($output);
     // echo $dispOutput;
  }

  function get_containers_report(){
   $containers        =  $this->input->post('id'); 
   $monType           =  $this->input->post('monType');
   $container         =  $this->Jobdata->get_containers($containers,$monType);
  
   if($monType == 3){
     if($container==NULL){
              echo    '<center><span style="color:red">No Aircraft Data </span></center>';
        }else{
             echo "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;width:100%'>
                  <tr>
                        <th style='border: 1px solid gray'>No.</th>
                        <th style='border: 1px solid gray'>AirCraft</th>
                        <th style='border: 1px solid gray'>Flight Number</th>
                  </tr>";

              $i=0;
             foreach($container as $row){
              $i++;
                 $container = $row->Aircraft;
                if($i==1){
                 if($container==''){
                   echo    '</table>';
                   echo    '<center><span style="color:red">No Aircarft Data </span></center>';
                  break;
                 }
                }
                 echo "<tr>";
                 echo "<td class='row' style='border: 1px solid gray'>".$i."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->Aircraft)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->FlightNo)."</td>";
                 echo "</tr>";
             }
             echo "</table>";
        }

   }else{
        if($container==NULL){
              echo    '<center><span style="color:red">No Containers Yet </span></center>';
        }else{
             echo "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;width:100%'>
                  <tr>
                        <th style='border: 1px solid gray'>No.</th>
                        <th style='border: 1px solid gray'>Container Number</th>
                        <th style='border: 1px solid gray'>Date File Entry to BOC</th>
                        <th style='border: 1px solid gray'>Date Sent Pre Assessment</th>
                        <th style='border: 1px solid gray'>Date Sent Final Assessment</th>
                        <th style='border: 1px solid gray'>Date Paid</th>
                        <th style='border: 1px solid gray'>Target Delivery Date</th>
                        <th style='border: 1px solid gray'>Actual Delivery At Warehouse</th>
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
                 echo "<tr>";
                 echo "<td class='row' style='border: 1px solid gray'>".$i."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->ContainerNo)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateFileEntryToBOC)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateSentPreAssessment)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DateSentFinalAssessment)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->DatePaid)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->TargetDeliveryDate)."</td>";
                 echo "<td class='row' style='border: 1px solid gray'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
                 echo "</tr>";
             }
             echo "</table>";
        }
   }

  }

/*Get Container Mnila*/
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
                    <th class='hidden'>Value storage</th>
                    <th>Start Of Storage</th>
                     <th class='hidden'>Value lodging</th>
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
                echo "<td class='row hidden'>".stripslashes($StartOfStorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfStorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($Lodging)."</td>";
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
              echo "<td class='row hidden '>".stripslashes($row->CarrierByJobFileId)."</td>";
              echo "<td class='row hidden '>".stripslashes($row->ContainerByCarrierId)."</td>";
              
             echo "</tr>";
         }

         echo "</table>
                </div>";
    }

  }
  
  /* get Container Outport*/
  function get_containers_outport(){
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
                        <th class='hidden'>Value storage</th>
                    <th>Start Of Storage</th>
                        <th class='hidden'>Value lodging</th>
                    <th>Lodging</th>
                    <th>Hauler/Trucker</th>
                        <th class='hidden'>Value tdd</th>
                    <th>Target Delivery Date</th>
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
                        <th class='hidden'>value date received container to warehouse</th>
                    <th>Actual Date Received Container to Warehouse</th>
                        <th class='hidden'>value CONTAINER BY CARRIER ID</th>

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

             if($row->DateReceivedAtWhse == "0000-00-00 00:00:00"){
                $DateReceivedAtWhse = $row->DateReceivedAtWhse;
             }else{
                $DateReceivedAtWhse = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->DateReceivedAtWhse));
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
             echo "<td><button type='button' class='btn btn-default btn-update-container-outport' data-toggle='modal' href='#updateContainer-outport' ><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row'>".stripslashes($row->VesselVoyageNo)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerNo)."</td>";
             echo "<td class='row'>".stripslashes($row->ContainerSize)."</td>";
             echo "<td class='row'>".stripslashes($row->NoOfCartons)."</td>";
                echo "<td class='row hidden'>".stripslashes($StartOfStorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfStorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->HaulerOrTruck)."</td>";
                echo "<td class='row hidden'>".stripslashes($TargetDeliveryDate)."</td>";
             echo "<td class='row'>".stripslashes($row->TargetDeliveryDate)."</td>";
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
             echo "<td class='row hidden '>".stripslashes($row->CarrierByJobFileId)."</td>";
                echo "<td class='row hidden'>".stripslashes($DateReceivedAtWhse)."</td>";
             echo "<td class='row'>".stripslashes($row->DateReceivedAtWhse)."</td>";
              echo "<td class='row'>".stripslashes($row->ContainerByCarrierId)."</td>";
            
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

   $monitoring_type =addslashes($this->input->post('monitoring_type'));
   $job             =addslashes($this->input->post('jbfl'));
   $consignee       =addslashes($this->input->post('consignee'));
   $shipper         =addslashes($this->input->post('shipper'));
   $mbl             =addslashes($this->input->post('mbl'));
   $mbl2            =addslashes($this->input->post('mbl2'));   //no insert in db
   $hbl             =addslashes($this->input->post('hbl'));
   $bank            =addslashes($this->input->post('bank'));
   $registry        =addslashes($this->input->post('registry'));
   $dtRcvd          =addslashes($this->input->post('dtRcvd'));
   $dt_pickup_obl   =addslashes($this->input->post('dt_pickup_obl'));
   $dt_pickup_docs  =addslashes($this->input->post('dt_pickup_docs'));
   $broker          =addslashes($this->input->post('broker'));
   $dt_req_budget   =addslashes($this->input->post('dt_req_budget'));
   $ref_due_dt      =addslashes($this->input->post('ref_due_dt'));
   $dt_boc          =addslashes($this->input->post('dt_boc'));    
   $status          =addslashes($this->input->post('status'));  //status report in job tab has no insert in db  
   $purch_order_no  =addslashes($this->input->post('purch_order_no'));  
   $color           =addslashes($this->input->post('color'));  
   $color_select    =addslashes($this->input->post('color_select')); 
   $origin          =addslashes($this->input->post('origin'));  
   $origcity        =addslashes($this->input->post('origcity'));    
   
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
       /* echo "JobFile already Exists";*/
       }else{
       /*  echo "New Jobfile is Added";*/


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
               'DateRequestBudgetToGL'         =>$dt_req_budget,
               'RFPDueDate'                    =>$ref_due_dt,
   /*            'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder' =>NULL*/
               
        );


          $this->db->insert('JobFile',$data); 
       $lastid =  $this->db->insert_id();
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
      /*         'ForwarderWarehouse'            => NULL,// la png ui
               'FlightNo'                      =>NULL ,
               'AirCraftNo'                    =>NULL,
               'DateReceivedNoticeFromForwarder'  =>NULL,*/
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



       $data['manila'] =   $this->Jobdata->update_data($monitoring_type);
       $this->load->view('jobfile-view/add-manila-container/search_manila',$data);
   
          //for running charges insert
        $data = array(
               'JobFileId'        => $job,
        );
        $this->db->insert('RunningCharges',$data);
         $lastid =  $this->db->insert_id(); 
                $data2 = array(
               'RunnningChargesId'=> $lastid,
               'JobFileId'        => $job,
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UsrId'  => $userid
        );
          $this->db->insert('RunningChargesHistory',$data2);

    }
      

 
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
 $vessel        =  addslashes($this->input->post('vessel'));
 $lines         =  addslashes($this->input->post('lines'));

 $eat           =  addslashes($this->input->post('eat'));
 $edt           =  addslashes($this->input->post('edt'));
 $aat           =  addslashes($this->input->post('aat'));
 $discharge     =  addslashes($this->input->post('vdt'));
  $berting     =  addslashes($this->input->post('abt'));
 
 
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

   if($berting!=''){
   $date5  = date_create($berting);
   $berting    =  date_format($date5, 'Y-m-d H:i');
   }



        $data = array(
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge,
               'BerthingTime'       => $berting      
        );

       $this->db->insert('CarrierByJobFile',$data); 
        $lastid =  $this->db->insert_id();
       $data2 = array(
               'CarrierByJobFileId'  => $lastid,
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge,
               'BerthingTime'       => $berting, 
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
   $container       =  addslashes($this->input->post('containerId'));
   $consize         =  addslashes($this->input->post('consize')); 
   $cartons_no      =  addslashes($this->input->post('cartons_no')); 
   $plateno         =  addslashes($this->input->post('trucker_plate'));
   $trucker_name    =  addslashes($this->input->post('trucker_name'));
   $trucker_id      =  addslashes($this->input->post('trucker_id'));
   $ref_entry_no    =  addslashes($this->input->post('ref_entry_no'));
   $dt_paid         =  addslashes($this->input->post('dt_paid'));
   $dt_pre_assess   =  addslashes($this->input->post('dt_pre_assess'));
   $start_storage   =  addslashes($this->input->post('start_storage'));
   $start_demorage  =  addslashes($this->input->post('start_demorage'));
   $lodging         = addslashes($this->input->post('lodging'));
   $dt_file_entry_boc = addslashes($this->input->post('dt_file_entry_boc'));
   $dt_final_assess = addslashes($this->input->post('dt_final_assess'));
   $gip             = addslashes($this->input->post('gip'));
   $gop             = addslashes($this->input->post('gop'));
   $adw             =  addslashes($this->input->post('adw'));
   $dtboc           = addslashes($this->input->post('dtboc'));
   $tdt             =  addslashes($this->input->post('tdt'));
   $pul_out_port    = addslashes($this->input->post('pul_out_port'));
   $dt_recvd_cont_whse = addslashes($this->input->post('dt_recvd_cont_whse'));


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
   if($dt_recvd_cont_whse!=''){
   $date14  = date_create($dt_recvd_cont_whse);
   $dt_recvd_cont_whse    =  date_format($date14, 'Y-m-d H:i');
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
               'PullOutDateAtPort'          => $pul_out_port, 
               'DateReceivedAtWhse'         =>$dt_recvd_cont_whse
        );
   $this->db->insert('ContainerByCarrier',$data);
   $lastid =  $this->db->insert_id(); 
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
               'DateReceivedAtWhse'         => $dt_recvd_cont_whse,
               'DateUpdated'                => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'           => $userid      
        );
   $this->db->insert('ContainerByCarrierHistory',$data2); 
}
function comodity(){
        $session_data = $this->session->userdata('logged_in');
         $userid = $session_data['uid'];
         $prodid               =  $this->input->post('prod_orderno');
         $product_name         =  $this->input->post('product_name');
         $con_id               =  $this->input->post('con_id'); 

      $result = $this->Jobdata->select_productcontainer($con_id);
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
        echo "COmmodity is successfully added.";
        echo "</br>";
        echo "Some Record already exist,Please check the view comodity for confirmation";
      }else{
        echo "Commodity Successfully Added";
       $data = array(
                     'ProductId'             => $product_name,
                     'ContainerByCarrierId'  => $con_id
              );
      $this->db->insert('ProductsByContainer',$data); 
      $lastid=$this->db->insert_id(); 

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

 function comodity_manila(){
        $session_data = $this->session->userdata('logged_in');
         $userid = $session_data['uid'];
         $prodid               =  $this->input->post('prod_orderno');
         $product_name         =  $this->input->post('product_name');
         $con_id               =  $this->input->post('con_id'); 

      $result = $this->Jobdata->select_productcontainer_manila($con_id);
       foreach($result as $row){
         $con_ids =  $row->ContainerByCarrierId;
       }
/*
        if($product_name==''){
         $product_name=1;
        }*/

         $query = $this->db->query("select ProductId from ProductsByContainer where ProductId='$product_name'
          and ContainerByCarrierId='$con_ids' "); 
      if($query->num_rows()==1) {
        echo "This Record Already Exist";
      }else{
        echo "Commodity Successfully Added";
       $data = array(
                     'ProductId'             => $product_name,
                     'ContainerByCarrierId'  => $con_ids
              );
      $this->db->insert('ProductsByContainer',$data); 
      $lastid=$this->db->insert_id(); 

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

   $check             =  addslashes($this->input->post('check'));
   $lodge             =  addslashes($this->input->post('lodge'));
   $cont_deposit      =  addslashes($this->input->post('cont_deposit'));
   $thc_charges       =  addslashes($this->input->post('thc_charges'));   
   $wharfage          =  addslashes($this->input->post('wharfage'));
   $arrastre          =  addslashes($this->input->post('arrastre'));
   $weight            =  addslashes($this->input->post('weight'));
   $del               =  addslashes($this->input->post('del'));
   $dispatch          =  addslashes($this->input->post('dispatch'));
   $storage           =  addslashes($this->input->post('storage'));   
   $demurrage         =  addslashes($this->input->post('demurrage'));
   $detention         =  addslashes($this->input->post('detention'));
   $eic               =  addslashes($this->input->post('eic'));
   $bai_app           =  addslashes($this->input->post('bai_app'));
   $bai_inspect       =  addslashes($this->input->post('bai_inspect'));
   $sra_app           =  addslashes($this->input->post('sra_app'));   
   $sra_inspect       =  addslashes($this->input->post('sra_inspect'));
   $bad_cargo         =  addslashes($this->input->post('bad_cargo'));
/*   $all_charges       =  addslashes($this->input->post('all_charges'));
   $part_charges      =  addslashes($this->input->post('part_charges'));
*/

  //stop inserting data in jobfile to avoid duplication
 /* $query= $this->db->query("Select * from vw_RunningCharges where
        JobFileId='$job' limit 1");
if($query->num_rows() ==1){*/

  
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
               'BadCargo'         => $bad_cargo
            /*   'AllCharges'       => $all_charges,
               'ParticularCharges'=> $part_charges*/
            );

$this->db->where('JobFileId', $job);
$this->db->update('RunningCharges', $update_charges);


             $update_charges_history = array(
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
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UsrId'  => $userid
            );

$this->db->insert('RunningChargesHistory', $update_charges_history);
//}
   }

   



   function add_report(){
     $session_data      = $this->session->userdata('logged_in');
     $userid            = $session_data['uid'];
     $jobfile           = addslashes($this->input->post('jbfl'));
     $save_report       = addslashes($this->input->post('save_report'));
     
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