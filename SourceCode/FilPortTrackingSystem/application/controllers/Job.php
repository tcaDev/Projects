<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
            $this->load->library('email');
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

  function check_jobfiles_update(){
      $jobfile =  $this->input->post('jobfile');
      $jbid =  $this->input->post('jbid');
      $mon =  $this->input->post('mon');

      $files = $this->Jobdata->check_jobfile_update_data($jbid, $jobfile, $mon);
      if(count($files) > 0){
         echo  "<i style='color:red;'>Jobfile Already Exists </i>";     
      }else{
        echo "<i style='color:green;'>Jobfile Available</i>"; 
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
       }else{
        echo "Go mo lang";
       }
    }


function check_uname(){
 $uname = $this->input->post('uname');

$query = $this->db->query("Select UserName from User where UserName='$uname' limit 1");

if($query->num_rows() == 1){
      echo "<i style='color:red;'>Username already exists</i> <span class='fa fa-exclamation fa-fw text-danger' ></span>";
    }else{
      echo "<i style='color:green;'>Username Available</i> <span class='fa fa-check fa-fw text-success' ></span>";
    }
}

function check_email(){
 $email = $this->input->post('email');

$query = $this->db->query("Select EmailAddress from User where EmailAddress='$email' limit 1");

if($query->num_rows() == 1){
      echo "<i style='color:red;'>EmailAddress already exists</i> <span class='fa fa-exclamation fa-fw text-danger' ></span>";
    }else{
      echo "<i style='color:green;'>EmailAddress Available</i> <span class='fa fa-check fa-fw text-success' ></span>";
    }
}

function get_jobfile_global_search(){
  $search         =  $this->input->post('search');
  $monitoringType =  $this->input->post('monType');
  $dispOutput = "";
  $dispCount = 0;
  $err;
 
 $jobfiles = $this->Jobdata->getJobFiles_Consignee($search,$monitoringType);
 if(count($jobfiles) > 0){
  $dispOutput .= '<table class="table table_manila table-bordered table-condensed order-table-search-global" style="width:100%;cursor:pointer" id="tbl-global-search"><thead><tr style="cursor:w-resize ;"><th > JobfileNumber </th><th >Color Stages</th><th>Consignee</th><th>Shipper </th><th> Status Report </th></tr></thead>';
  if($monitoringType == 1 || $monitoringType == 2){
    foreach ($jobfiles as $row) {
     if($monitoringType == $row->MonitoringTypeId){
           $dispCount += 1;
           $dispOutput .='<tbody>';
                             $pick =$row->IsBackground;
                              if($pick==0){
                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                                }else{
                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                                }
         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
                         <td>' . stripslashes($row->JobFileNo) . '</td>
                         ' . $pick1 . '
                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
                         <td>' .  stripslashes($row->ShipperName) .   '</td>
                         <td>Status Reports</td>
                         </tr>
                        </tbody>';
        }
     }
  }else if ($monitoringType == 3){
    $dispCount = count($jobfiles);
    foreach ($jobfiles as $row) {
           $dispOutput .='<tbody>';
                             $pick =$row->IsBackground;
                              if($pick==0){
                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                                }else{
                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                                }
         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
                         <td>' . stripslashes($row->JobFileNo) . '</td>
                         ' . $pick1 . '
                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
                         <td>' .  stripslashes($row->ShipperName) .   '</td>
                         <td>Status Reports</td>
                         </tr>
                        </tbody>';
     }
  }else{
    $dispCount = count($jobfiles);
    foreach ($jobfiles as $row) {
           $dispOutput .='<tbody>';
                             $pick =$row->IsBackground;
                              if($pick==0){
                                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                                }else{
                                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                                }
         $dispOutput .= '<tr id="' . $row->JobFileNo . '" class="tableRow">   
                         <td>' . stripslashes($row->JobFileNo) . '</td>
                         ' . $pick1 . '
                         <td>' .  stripslashes($row->ConsigneeName) . '</td>
                         <td>' .  stripslashes($row->ShipperName) .   '</td>
                         <td>Status Reports</td>
                         </tr>
                        </tbody>';
     }
  }
 }

 $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableReportSort.js") . '"></script>
                      ';

//$dispOutput = $jobfiles;
 $output = array(
      array(
          "disp" => $dispOutput,
          "ct" => $dispCount,
        )
  );
  echo json_encode($output);
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
      $charge  = $this->Jobdata->get_chargess($charges,"");

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

                            <div class="form-group">
                                <label>Demurrage</label>
                                <input type="text" name="demurrage" class="form-control input-sm demurrage checkDec" id="demurrage" value="'.$row->Demorage.'"  disabled/>
                              </div>
                          </div>
                            

                          <div class="col-lg-6">


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

                              <div class="form-group">
                                <label>BPI Inspection</label>
                                <input type="text" name="bpi" class="form-control input-sm bpi checkDec" id="bpi" value="'.$row->BPIInspection.'"disabled/>
                              </div>

                              <div class="form-group">
                                <label>Plug In for Reefer</label>
                                <input type="text" name="reefer" class="form-control input-sm reefer checkDec" id="reefer" value="'.$row->PlugInForReefer.'"disabled/>
                              </div>

                              <div class="form-group">
                                <label>Other Fees</label>
                                <input type="text" name="otherfee" class="form-control input-sm otherfee checkDec" id="otherfee" value="'.$row->OtherFees.'"disabled/>
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
                              <label>Break Bulk Fee</label>
                              <input type="text" name="cont-deposit" class="form-control input-sm break_airs checkDec-air" id="break_airs" value="'.$row->BreakBulkFee.'" disabled/>
                            </div>

                            <div class="form-group">
                                <label>Bad Cargo</label>
                                <input type="text" name="bad-cargo" class="form-control input-sm bad-cargo_airs checkDec-air" id="bad_cargo_airs" value="'.$row->BadCargoOrderFee.'"disabled />
                              </div>

                            <div class="form-group">
                              <label>Storage</label>
                              <input type="text" name="storage" class="form-control input-sm storage_airs checkDec-air" id="storage_airs" value="'.$row->StorageFee.'" disabled />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>VCRC</label>
                              <input type="text" name="thc-charges" class="form-control input-sm VCRC_airs checkDec-air" id="VCRC_airs" value="'.$row->VCRC.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>CNI</label>
                              <input type="text" name="arrastre" class="form-control input-sm CNI_airs checkDec-air" id="CNI_airs" value="'.$row->CNI.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>CNIU</label>
                              <input type="text" name="wharfage" class="form-control input-sm CNIU_airs checkDec-air"  id="CNIU_airs" value="'.$row->CNIU.'" disabled/>
                            </div>

                            <div class="form-group">
                              <label>Other Fees</label>
                              <input type="text" name="otherfee" class="form-control input-sm otherfee_airs checkDec-air"  id="otherfee_airs" value="'.$row->OtherFees.'" disabled/>
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
                   <th class='hidden'>value Berthing TIme</th>
                   <th>Actual Berthing Time</th>
                   <th class='hidden'>value DischargeTime</th>
                   <th>Discharge Time of Vessel</th>
                   <th class='hidden'>value EstDepartureTime</th>
                   <th>Estimated Departure</th>
                   <th class='hidden'>value EstArrivalTime</th>
                   <th>Estimated Arrival</th>
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

             if($row->EstDepartureTime == "0000-00-00"){
                $EstDepartureTime = $row->EstDepartureTime;
             }else{
                 $EstDepartureTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstDepartureTime));
             }

             if($row->BerthingTime == "0000-00-00 00:00:00"){
                $BerthingTime = $row->BerthingTime;
             }else{
                 $BerthingTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->BerthingTime));
             }

              if($row->EstArrivalTime == "0000-00-00 00:00:00"){
                $EstArrivalTime = $row->EstArrivalTime;
             }else{
                 $EstArrivalTime = strftime('%Y-%m-%dT%H:%M:%S', strtotime($row->EstArrivalTime));
             }

             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td><button type='button' class='btn btn-default ".$button_update."' data-toggle='modal' href='#updateVessel-".$href."'><span class='fa fa-pencil fa-fw'></span></button></td>";
             echo "<td class='row'>".stripslashes($row->VesselVoyageNo)."</td>";
             echo "<td class='row'>".stripslashes($row->CarrierName)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->ActualArrivalTime)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualArrivalTime)."</td>";
                echo "<td class='row hidden'>".stripslashes($BerthingTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->BerthingTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($DischargeTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->DischargeTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->EstDepartureTime) ."</td>";
             echo "<td class='row'>".stripslashes($row->EstDepartureTime) ."</td>";
                echo "<td class='row hidden'>".stripslashes($row->EstArrivalTime) ."</td>";
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
      $monType =  $this->input->post('monType');   
      $dispoOutput = "";
      if($monType == 4){
        $product1 = $this->Jobdata->get_goods_air($products);
        $product2 = $product  = $this->Jobdata->get_goods($products);
        if(count($product1) == 0 && count($product2) == 0){
        }else if(count($product1) > 0 ){
           $product = $product1;
        }else if(count($product2) > 0){
           $product = $product2;
        }
      }else if($monType == 1 || $monType == 2){
        $product  = $this->Jobdata->get_goods($products);
      }else if($monType == 3){
         $product  = $this->Jobdata->get_goods_air($products);
      }

    if($product==NULL){
         $dispoOutput .= '<center><span style="color:red">No Commodities Yet </span></center>';
    }else{
          $dispoOutput .=  "<table id='tbl-commodities' class='table table-striped tableOverFlow'>
              <tr>
                   <th>No.</th>
                   <th>Commodity</th>";
                   if($monType == 1 || $monType == 2){
                     $dispoOutput .= "<th> Container No  </th>";
                   }          
               $dispoOutput .= "</tr>";

          $i=0;
         foreach($product as $row){
          $i++;
          if($i==1){
             if($row->ProductName==''){
                 $dispoOutput .=  "</table>";
                 $dispoOutput .=     '<center><span style="color:red">No Goods Yet </span></center>';
                break;
              }
          }else{
              if($row->ProductName==''){
                break;
              }
          }
              $dispoOutput .=  "<tr>";
              $dispoOutput .=  "<td class='tdOverFlow'>".$i." </td>";
              $dispoOutput .=  "<td class='tdOverFlow'>".stripslashes($row->ProductName)."</td>";
              if($monType == 1 || $monType == 2){
              $dispoOutput .=   "<td class='tdOverFlow'>".stripslashes($row->ContainerNo) ."</td>";
              }
              $dispoOutput .=  "</tr>";
         }
          $dispoOutput .=  "</table>";
    }


    echo $dispoOutput;
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
     $display = '';
     $total = 0;
           foreach($charge as $row){
                if($monitoringType == 3){
                     $total += $row->LodgementFee;
                     $total += $row->BreakBulkFee;
                     $total += $row->StorageFee;
                     $total += $row->BadCargoOrderFee;
                     $total += $row->VCRC;
                     $total += $row->CNI;
                     $total += $row->CNIU;
                     $total += $row->OtherFees;

                      $display = '<table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%text-align:left;">
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Lodgement Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Lodgement Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->LodgementFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Break Bulk Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Break Bulk Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->BreakBulkFee, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Storage Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b> Storage Fee : </b>
                                <span class="pull-right">
                                   '.number_format($row->StorageFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Bad Cargo Order Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Bad Cargo Order Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->BadCargoOrderFee, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="VCRC" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  VCRC : </b>
                                <span class="pull-right">
                                   '.number_format($row->VCRC, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="CNI" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> CNI : </b>
                                <span class="pull-right">
                                    '.number_format($row->CNI, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Other Fees" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> CNIU : </b>
                                <span class="pull-right">
                                   '.number_format($row->CNIU, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <b> Other Fees : </b>
                                <span class="pull-right">
                                   '.number_format($row->OtherFees, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                           
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <span class="pull-right">
                                  <b style="font-size: 18px;"> Sub Total : </b> '.number_format($total, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                      </table>';

                }else{
                  $total += $row->LodgementFee;
                  $total += $row->Demorage;
                  $total += $row->ContainerDeposit;
                  $total += $row->Detention;
                  $total += $row->THCCharges;
                  $total += $row->EIC;
                  $total += $row->Arrastre;
                  $total += $row->BAIApplication;
                  $total += $row->Wharfage;
                  $total += $row->BAIInspection;
                  $total += $row->Weighing;
                  $total += $row->SRAApplication;
                  $total += $row->DEL;
                  $total += $row->SRAInspection;
                  $total += $row->BPIInspection;
                  $total += $row->DispatchFee;
                  $total += $row->BadCargo;
                  $total += $row->Storage;
                  $total += $row->OtherFees;
               
                      $display = '<table id="tbl-third-report-data" class="table table-striped table-bordered table-layout:fixed" style="cursor:pointer;width:100%text-align:left;">
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Lodgement Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Lodgement Fee : </b>
                                <span class="pull-right">
                                    '.number_format($row->LodgementFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Demurrage" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Demurrage : </b>
                                <span class="pull-right">
                                    '.number_format($row->Demorage, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Container Deposit Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Container Deposit : </b>
                                <span class="pull-right">
                                   '.number_format($row->ContainerDeposit, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Detention" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Detention : </b>
                                <span class="pull-right">
                                    '.number_format($row->Detention, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="THC Charges" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  THC Charges : </b>
                                <span class="pull-right">
                                   '.number_format($row->THCCharges, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="EIC" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> EIC : </b>
                                <span class="pull-right">
                                    '.number_format($row->EIC, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="Arrastre" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Arrastre : </b>
                                <span class="pull-right">
                                   '.number_format($row->Arrastre, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="BAI Application" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  BAI Application : </b>
                                <span class="pull-right">
                                    '.number_format($row->BAIApplication, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Wharfage" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Wharfage : </b>
                                <span class="pull-right">
                                   '.number_format($row->Wharfage, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="BAI Inspection" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  BAI Inspection :</b> 
                                <span class="pull-right">
                                    '.number_format($row->BAIInspection, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Weighing" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-defaultbtn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Weighing : </b>
                                <span class="pull-right">
                                   '.number_format($row->Weighing, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="SRA Application" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  SRA Application : </b>
                                <span class="pull-right">
                                    '.number_format($row->SRAApplication, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="DEL" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  DEL : </b>
                                <span class="pull-right">
                                   '.number_format($row->DEL, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="SRA Application" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  SRAInspection : </b>
                                <span class="pull-right">
                                    '.number_format($row->SRAInspection, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Dispatch Fee" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Dispatch Fee : </b>
                                <span class="pull-right">
                                   '.number_format($row->DispatchFee, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Bad Cargo" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                               <b> Bad Cargo : </b>
                                <span class="pull-right">
                                    '.number_format($row->BadCargo, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button  class="btn_docs" id="Storage" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                              <b>  Storage : </b>
                                <span class="pull-right">
                                   '.number_format($row->Storage, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <b>  Other Fees : </b>
                                <span class="pull-right">
                                   '.number_format($row->OtherFees, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                           <tr>
                            <td style="border:1px solid gray;text-align: left;">
                            <button class="btn_docs" id="BPI Inspection" type="button" data-toggle="modal" data-target="#jobfiles" class="btn btn-xs btn-default btn-docs"><span class="fa fa-chevron-down fa-fw" aria-hidden="true"></span></button>
                                <b>  BPI Inspection : </b>
                                <span class="pull-right">
                                   '.number_format($row->BPIInspection, 2, '.', ',').'
                                </span>
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                              
                            </td>
                          </tr>
                          <tr>
                            <td style="border:1px solid gray;text-align: left;">
                           
                            </td>
                            <td style="border:1px solid gray;text-align: left;">
                                <span class="pull-right">
                                  <b style="font-size: 18px;"> Sub Total : </b> '.number_format($total, 2, '.', ',').'
                                </span>
                            </td>
                          </tr>
                      </table>';
                }
            }

            $output = array(
            array(
               "disp" => $display,
              )
            );
      
     echo json_encode($output);
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
       $product  = $this->Jobdata->get_goods_air($products);

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
      $href = $this->input->post('href');
      $btn = $this->input->post('btn');
    if($charges == NULL){
          echo    '<center><span style="color:red">No Reports Yet </span></center>';
    }else{
      echo "<table class='table-bordered table table-striped table-hover table-condensed'>
              <tr>
                   <th>No.</th>
                   <th>Update</th>
                   <th style='width:20%;'>Date Added</th>
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
                 <td class='hidden'>".$row->JobFileNo." </td>
                 <td class='hidden'>".$row->HistoricalStatusId." </td>
                 <td>".$i."</td>
                 <td><button type='button' class='btn btn-default ".$btn."' data-toggle='modal' href='".$href."' id='updateReports-mnla'><span class='fa fa-pencil fa-fw'></span></button></td>
                 <td>".$row->DateAdded."</td>
                 <td> ".$row->StatusDescription."</td>
              </tr>
            ";
      }
       echo "</table>";
   }
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
                   <th>Update</th>
                   <th style='width:20%;'>Date Added</th>
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
                 <td class='hidden'>".$row->JobFileNo." </td>
                 <td class='hidden'>".$row->HistoricalStatus_AirId." </td>
                 <td>".$i."</td>
                 <td><button type='button' class='btn btn-default btn-update-report-air' data-toggle='modal' href='#updateReport-air' id='updateReports-mnla'><span class='fa fa-pencil fa-fw'></span></button></td>
                 <td>".$row->DateAdded."</td>
                 <td> ".$row->StatusDescription."</td>
              </tr>
            ";
      }
       echo "</table>";
   }
 }

   function global_status_report(){
    $status    =  $this->input->post('id'); 
    $mon_type    =  $this->input->post('monType');  
    if($mon_type == 1 || $mon_type == 2 || $mon_type == 3){
        $charges   = $this->Jobdata->report_get_status($status,$mon_type);
    }else{
        $charges1 = $this->Jobdata->report_get_status($status,3);
        $charges2 = $this->Jobdata->report_get_status($status,1);
        if(count($charges1) == 0 && count($charges2) == 0){
          $charges = $charges1;
        }else if(count($charges1) > 0){
          $charges = $charges1;
        }else if(count($charges2) > 0){
          $charges = $charges2;
        }
    }
    if(count($charges)){
       echo "<table table id='tbl-status-reports' class='table table-striped tableOverFlow' style='width:100%;cursor:pointer;'>
              <tr>
                    <th style='border: 1px solid gray'>Date Added.</th>
                    <th style='border: 1px solid gray'>Status Description</th>
              </tr>";
      $i=0;
      foreach ($charges as $row) {
        $i++;
       $description = $row->StatusDescription;
       echo " <tr>
                 <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>".$row->DateAdded."</td>
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
                      <th style='border: 1px solid gray'>Date Added.</th>
                      <th style='border: 1px solid gray'>Status Description</th>
                </tr>";
        $i=0;
        foreach ($charges as $row) {
          $i++;
         $description = $row->StatusDescription;
         echo " <tr>
                   <td class='loadReports tdOverFlow' id='loadReports' style='border: 1px solid gray'>".$row->DateAdded."</td>
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

      $dispOutput .= '<table style="font-family:Century Gothic;font-size:16px;table-layout:fixed;width:100%;" id="table-pre-details">
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
                    </tr>'
                    ;
                    if($monitoringType == 3){
                      $dispOutput .= '<tr>
                                      <td style="text-align:left;">
                                         <span class="pull-left"><b>Aircraft  : </b></span>
                                      </td>
                                      <td style="text-align:left;">
                                        &nbsp;<a id="Carriers"> </a> 
                                      </td>
                                    </tr>';
                    }else{
                    $dispOutput .= '<tr>
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
                                        </tr>
                                      ';
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
      $rowCt = 0;
      $jobfiles= $this->Jobdata->getJobFiles_Consignee($consignee_name,$monitoringType);
       $dispOutput = "";
       $dispCount = 0;
      if($monitoringType == 3){
          $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table class="tablesorter tableReports table-striped table-condensed table table-bordered order-table">';
          $dispOutput .= '
                        <thead>
                            <tr>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> House Airway Bill# </center></th>
                              <th hidden><center> Date Received of Other Documents </center></th>
                            <tr>
                        </thead>
                      ';
            $dispOutput .='<tbody>';
          foreach($jobfiles as $row){
         
              $dispOutput .='
                      
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td hidden>'.stripslashes($row->DatePickUpOtherDocs).'</td>
                        </tr>
                     
              ';
              $rowCt += 1;
          }
            $dispOutput .='</tbody>';
            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search</span></center>';
          }
      }else if($monitoringType == 1 || $monitoringType == 2){
         $ct = count($jobfiles);
          if($ct > 0){
          $dispOutput = '<table  class="tablesorter tableReports table table-bordered table-striped table-condensed order-table">';
          $dispOutput .= '
                        <thead>
                           <tr>
                              <th><center> JobfileNumber </center> </th>
                              <th><center> Shipper </center></th>
                              <th><center> Consignee </center></th>
                              <th><center> HBL# </center></th>
                              <th hidden><center> Date Received of Other Documents </center></th>
                            </tr>
                        </thead>
                      ';

           $dispOutput .='<tbody>';
          foreach($jobfiles as $row){
            if($monitoringType == $row->MonitoringTypeId && $monitoringType != 5){
              $dispOutput .='
                      
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td hidden>'.stripslashes($row->DateReceivedOfOtherDocs).'</td>
                        </tr>
                      
              ';
              $rowCt += 1;
            }else if($monitoringType == 5){
              $rowCt = $ct;
              $dispOutput .='
                      
                        <tr class="tableRow">
                              <td>'.stripslashes($row->JobFileNo).'</td>
                              <td>'.stripslashes($row->ShipperName).'</td>
                              <td>'.stripslashes($row->ConsigneeName).'</td>
                              <td>'.stripslashes($row->HouseBillLadingNo).'</td>
                              <td hidden>'.stripslashes($row->DateReceivedOfOtherDocs).'</td>
                        </tr>
                      
              ';
            }
          }
              $dispOutput .='</tbody>';
            $dispOutput .= '</table>';
          }else{
            $dispOutput = '<center><span style="color:red">No Data Matches Your Search </span></center>';
          }
  }
       $dispOutput .= '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableReportSort.js") . '"></script>
                      ';

      /*$dispOutput = $jobfiles;
      $dispCount = 0;*/
      $dispCount =  $rowCt ;
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
     if(count($container) == 0){
              echo    '<center><span style="color:red">No Aircraft Data </span></center>';
        }else{
             echo "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;'>
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
        if(count($container) == 0){
              echo    '<center><span style="color:red">No Containers Yet </span></center>';
        }else{
             echo "
             <table id='tbl-first-report-data' class='table table-striped table-bordered tableOverFlow' style='cursor:pointer;'>
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
   $container  = $this->Jobdata->get_containers($containers,"");

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
                    <th class='hidden'>Lodging</th>
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
                    <th class='hidden'>Pull Out Date At Port</th>
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
                    <th>Trucker Plate No.</th>
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
                echo "<td class='row hidden'>".stripslashes($row->StartOfStorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfStorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($Lodging)."</td>";
             echo "<td class='row hidden'>".stripslashes($row->Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->HaulerOrTruck)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->TargetDeliveryDate)."</td>";
             echo "<td class='row'>".stripslashes($row->TargetDeliveryDate)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->GateInAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->GateInAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->GateOutAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->GateOutAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->StartOfDemorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfDemorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->PullOutDateAtPort)."</td>";
             echo "<td class='row hidden'>".stripslashes($row->PullOutDateAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateBOCCleared)."</td>";
             echo "<td class='row'>".stripslashes($row->DateBOCCleared)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateFileEntryToBOC)."</td>";
             echo "<td class='row'>".stripslashes($row->DateFileEntryToBOC)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateSentPreAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentPreAssessment)."</td>";
                echo "<td class='row hidden'>".stripslashes($DatePaid)."</td>";
             echo "<td class='row'>".stripslashes($row->DatePaid)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->RefEntryNo)."</td>";
              echo "<td class='row hidden '>".stripslashes($row->CarrierByJobFileId)."</td>";
              echo "<td class='row hidden '>".stripslashes($row->ContainerByCarrierId)."</td>";
               echo "<td class='row '>".trim(stripslashes($row->TruckerName))."</td>";
              
             echo "</tr>";
         }

         echo "</table>
                </div>";
    }

  }
  
  /* get Container Outport*/
  function get_containers_outport(){

   $containers =  $this->input->post('id'); 
   $container  = $this->Jobdata->get_containers($containers,2);

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
                         <th>Trucker Plate No.</th>

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
                echo "<td class='row hidden'>".stripslashes($row->StartOfStorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfStorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->Lodging)."</td>";
             echo "<td class='row'>".stripslashes($row->HaulerOrTruck)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->TargetDeliveryDate)."</td>";
             echo "<td class='row'>".stripslashes($row->TargetDeliveryDate)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
             echo "<td class='row'>".stripslashes($row->ActualDeliveryAtWarehouse)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->StartOfDemorage)."</td>";
             echo "<td class='row'>".stripslashes($row->StartOfDemorage)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->PullOutDateAtPort)."</td>";
             echo "<td class='row'>".stripslashes($row->PullOutDateAtPort)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateBOCCleared)."</td>";
             echo "<td class='row'>".stripslashes($row->DateBOCCleared)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateFileEntryToBOC)."</td>";
             echo "<td class='row'>".stripslashes($row->DateFileEntryToBOC)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateSentPreAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentPreAssessment)."</td>";
                echo "<td class='row hidden'>".stripslashes($DatePaid)."</td>";
             echo "<td class='row'>".stripslashes($row->DatePaid)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->DateSentFinalAssessment)."</td>";
             echo "<td class='row'>".stripslashes($row->RefEntryNo)."</td>";
             echo "<td class='row hidden '>".stripslashes($row->CarrierByJobFileId)."</td>";
                echo "<td class='row hidden'>".stripslashes($row->DateReceivedAtWhse)."</td>";
             echo "<td class='row'>".stripslashes($row->DateReceivedAtWhse)."</td>";
              echo "<td class='row hidden'>".stripslashes($row->ContainerByCarrierId)."</td>";
                echo "<td class='row'>".trim(stripslashes($row->TruckerName))."</td>";
            
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
 $berthing     =  addslashes($this->input->post('abt'));

 
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
    if($berthing!=''){
   $date5  = date_create($berthing);
   $berthing    =  date_format($date5, 'Y-m-d H:i');
   }



        $data = array(
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge,
               'BerthingTime'       => $berthing    
            );

       $this->db->insert('CarrierByJobFile',$data); 
        $lasts =  $this->db->insert_id();


       $data2 = array(
               'CarrierByJobFileId'  => $lasts,
               'JobFileId'           => $job,
               'CarrierId'           => $lines,
               'VesselVoyageNo'      => $vessel,
               'EstDepartureTime'    => $edt,
               'EstArrivalTime'      => $eat,
               'ActualArrivalTime'   => $aat,
               'DischargeTime'       => $discharge,
               'BerthingTime'       =>  $berthing,
               'DateUpdated'         => Date('Y-m-d H:i'),
               'UpdatedBy_UserId'    => $userid
        );

  $this->db->insert('CarrierByJobFileHistory',$data2); 
                
                
}

function container(){
  $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
   $vessel_voyage   =  $this->input->post('vessel_voyage');
   $jbfl   =  $this->input->post('jbfl');

  $job= $this->Jobdata->select_jobfile($jbfl);
  foreach($job as $row){
 echo  $job =  $row->JobFileId;
 }
   
   $result   = $this->Jobdata->select_carrier_job($job,$vessel_voyage);
 
foreach($result as $row){
  $vessel =  $row->CarrierByJobFileId;
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
               'CarrierByJobFileId'      => $vessel,
               'NoOfCartons'             => $cartons_no,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateSentFinalAssessment' => $dt_final_assess,
               'DatePaid'                => $dt_paid,  
               'DateSentPreAssessment'   => $dt_pre_assess,
               'DateFileEntryToBOC'      => $dt_file_entry_boc,
               'DateBOCCleared'          => $dtboc,
               'TruckerName'             => $plateno,
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
               'CarrierByJobFileId'      => $vessel,
               'NoOfCartons'             => $cartons_no,
               'StartOfStorage'          => $start_storage,
               'Lodging'                 => $lodging,
               'DateSentFinalAssessment' => $dt_final_assess,
               'DatePaid'                => $dt_paid,  
               'DateSentPreAssessment'   => $dt_pre_assess,
               'DateFileEntryToBOC'      => $dt_file_entry_boc,
               'DateBOCCleared'          => $dtboc,
               'TruckerName'             =>  $plateno,
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
                     'ContainerByCarrierId'     => $con_ids,
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
    $bpi              =  addslashes($this->input->post('bpi'));
   $reefer            =  addslashes($this->input->post('reefer'));
   $otherfee          =  addslashes($this->input->post('otherfee'));
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
               'BadCargo'         => $bad_cargo,
               'BPIInspection'    => $bpi,
               'PlugInForReefer'  => $reefer,
               'OtherFees'        => $otherfee

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
                'BPIInspection'   => $bpi,
               'PlugInForReefer'  => $reefer,
               'OtherFees'        => $otherfee,
               'DateUpdated'      => Date('Y-m-d H:i'),
               'UpdatedBy_UserId' => $userid
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


   function user_add(){

    $fname = addslashes($this->input->post('fname'));
    $mname = addslashes($this->input->post('mname'));
    $lname = addslashes($this->input->post('lname'));

    $title = addslashes($this->input->post('title'));
    $department = addslashes($this->input->post('department'));
   

    $contact1 = addslashes($this->input->post('contact1'));
    $contact2 = addslashes($this->input->post('contact2'));

    $addr = addslashes($this->input->post('addr'));
    $addr2 = addslashes($this->input->post('addr2'));


    $consignee = addslashes($this->input->post('consignee'));
    $consignee2 = addslashes($this->input->post('consignee2'));
    $consignee3 = addslashes($this->input->post('consignee3'));

    $uname = addslashes($this->input->post('uname'));
    $email = addslashes($this->input->post('email'));
    $pass = addslashes($this->input->post('pass'));
    $passconf = addslashes($this->input->post('passconf'));
    $activation = 0;
    $role = addslashes($this->input->post('role'));

    $photo = "user.png";

    $salt  = 'fwodhsljkfhnouh';
    $salt2 = 'djaoiuelanwdoiwq';
    $password = sha1($salt.$pass.$salt2);

    $data = array(
              'UserName' => $uname,
              'Password' => $password, 
              'FirstName' => $fname,
              'MiddleName' => $mname,
              'LastName' => $lname,

              'Title' => $title,              
              'Department' => $department,

              'EmailAddress' => $email,
              'RoleId' => $role,

              'ContactNo1' => $contact1,
              'ContactNo2' => $contact2,

              'Address1' => $addr,
              'Address2' => $addr2,
              
              'ConsigneeId' => $consignee,
              'ConsigneeId2' => $consignee2,
              'ConsigneeId3' => $consignee3,

              'DateAdded' => Date('Y-m-d H:i'),
              'IsActive' => $activation,
              'ProfileImageSource' => $photo,
              );

      $this->db->insert('User',$data);
    }



      /*update user*/

      function user_update(){
          $uid = $this->input->post('uid');
          $status = $this->input->post('status');
          $uname = $this->input->post('uname');
          $fname = $this->input->post('fname');
          $mname = $this->input->post('mname');
          $lname = $this->input->post('lname');

          $email = $this->input->post('email');

          $title = $this->input->post('title');
          $department = $this->input->post('department');

          $c1 = $this->input->post('c1');
          $c2 = $this->input->post('c2');
          $addr = $this->input->post('addr');
          $addr2 = $this->input->post('addr2');

          $consignee = $this->input->post('consignee');
          $consignee2 = $this->input->post('consignee2');
          $consignee3 = $this->input->post('consignee3');

         
           $stats = (int)$status;

           $data = array(
              'IsActive'    => $stats,
              'UserName'    => $uname,
              'FirstName'   => $fname,
              'MiddleName'  => $mname,
              'LastName'    => $lname,
             
              'Title'    => $title,
              'Department'    => $department,

              'EmailAddress'=> $email,
              'ContactNo1'  => $c1,
              'ContactNo2'  => $c2,

              'Address1' => $addr,
              'Address2' => $addr2,
              
              'ConsigneeId' => $consignee,
              'ConsigneeId2' => $consignee2,
              'ConsigneeId3' => $consignee3

           );
          $this->db->where('UserId', $uid);
          $this->db->update('User', $data);
      }
      

      function get_User_list(){


        $User_list = $this->Jobdata->get_user();

        echo '
            <div class="col-lg-12 row">
            <table class=" table-bordered table-condensed " style="width:2000px;">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th>Status</th>
                      <th>Update</th>
                      <th>Reset Password</th>
                      <th>Username</th>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                      <th>EmailAddress</th>
                      <th>Title</th>
                      <th>Department</th>
                      <th>Contact No 1</th>
                      <th>Contact No 2</th>
                  </tr>
                </thead>      
                <tbody>


        ';
        $i=0;
        foreach ($User_list as $row) {
          $i++;
          $uid = $row->UserId;
          $uname = $row->UserName;
          $fname = $row->FirstName;
          $mname = $row->MiddleName;
          $lname = $row->LastName;
          $email = $row->EmailAddress;
          $contact1 = $row->ContactNo1;
          $contact2 = $row->ContactNo2;
          $title = $row->Title;
          $department = $row->Department;

          $active= $row->IsActive;
            if($active==1){ 
              $stat = 'activated';
              $mystat = '1';
            }else{
              $stat = 'deactivated';
              $mystat= '0';
            }

           echo '
            <tr>
              <td>'.$i.'</td>
              <td class="hidden">'.$uid.'</td>
              <td class="hidden">'.$mystat.'</td>
              <td>'.$stat.' </td>
              <td><button type="button" class="btn btn-default btn-sm btn-update-user" data-toggle="modal" href="#myModal_updateUser"><span class="fa fa-pencil fa-fw"></span></button></td>
              <td><button type="button" class="btn btn-default btn-sm btn-reset-pass" data-toggle="modal" href="#myModal_resetPass"><span class="fa fa-refresh fa-fw"></span></button></td>
              <td>'.$uname.'</td>
              <td>'.$fname.'</td>
              <td>'.$mname.'</td>
              <td>'.$lname.'</td>
              <td>'.$email.'</td>
              <td>'.$title.'</td>
              <td>'.$department.'</td>
              <td>'.$contact1.'</td>
              <td>'.$contact2.'</td>
            </tr>
           '; 

        }

          echo '
               </tbody>         
             </table>
            </div>
        
          ';

 


      }

      /*User Client*/

      function get_User_list_client(){

          
        $User_list = $this->Jobdata->get_user_client();

        echo '
            <div class="col-lg-12 row">
            <table class=" table-bordered table-condensed " style="width:2000px;">
                <thead>
                  <tr>
                      <th>No.</th>
                      <th>Status</th>
                      <th>Update</th>
                      <th>Reset Password</th>
                      <th>Consignee</th>
                      <th>Consignee 2</th>
                      <th>Consignee 3</th>
                      <th>Username</th>
                      <th>FirstName</th>
                      <th>MiddleName</th>
                      <th>LastName</th>
                      <th>EmailAddress</th>
                      <th>Title</th>
                      <th>Company</th>
                      <th>ContactNo1</th>
                      <th>ContactNo2</th>
                      <th>Address 1</th>
                      <th>Address 2</th>

                  </tr>
                </thead>      
                <tbody>


        ';
        $i=0;
        foreach ($User_list as $row) {
          $i++;
          $uid = $row->UserId;
          $uname = $row->UserName;
          $fname = $row->FirstName;
          $mname = $row->MiddleName;
          $lname = $row->LastName;
          $email = $row->EmailAddress;
          $contact1 = $row->ContactNo1;
          $contact2 = $row->ContactNo2;
          $addr = $row->Address1;
          $addr2 = $row->Address2;
         
          $active= $row->IsActive;
            if($active==1){ 
              $stat = 'activated';
              $mystat = '1';
            }else{
              $stat = 'deactivated';
              $mystat= '0';
            }

           echo '
            <tr>
              <td>'.$i.'</td>
              <td class="hidden">'.$uid.'</td>
              <td class="hidden">'.$mystat.'</td>
              <td>'.$stat.' </td>
              <td><button type="button" class="btn btn-default btn-sm btn-update-user-client" data-toggle="modal" href="#myModal_updateUser"><span class="fa fa-pencil fa-fw"></span></button></td>
              <td><button type="button" class="btn btn-default btn-sm btn-reset-pass" data-toggle="modal" href="#myModal_resetPass"><span class="fa fa-refresh fa-fw"></span></button></td>
              <td class="hidden">'.$row->CId.'</td>
              <td>'.$row->CName.'</td>

              <td class="hidden">'.$row->C2Id.'</td>
              <td>'.$row->C2Name.'</td>

              <td class="hidden">'.$row->C3Id.'</td>
              <td>'.$row->C3Name.'</td>

              <td>'.$uname.'</td>
              <td>'.$fname.'</td>
              <td>'.$mname.'</td>
              <td>'.$lname.'</td>
              <td>'.$email.'</td>
              <td>'.$row->Title.'</td>
              <td>'.$row->Department.'</td>
              <td>'.$contact1.'</td>
              <td>'.$contact2.'</td>
              <td>'.$addr.'</td>
              <td>'.$addr2.'</td>   
                              
            </tr>
           '; 

        }

          echo '
               </tbody>         
             </table>
            </div>
        
          ';
      }



/*History THIS*/
      function get_manila_audit(){

          $montype = $this->input->post('montype');
          $audit_manila = $this->Jobdata->get_manilaAudit($montype);

          echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed  " style="width:4000px;">
                <thead>
                  <tr>
                      <th>Jobfile Number</th>
                      <th>Color Stages</th>
                      <th>Shipper</th>
                      <th>Consignee</th>
                      <th>PI/PO No.</th>
                      <th>House Bill Lading No.</th>
                      <th>Master Bill Lading No.</th>
                      <th>Master Bill Lading No.2</th>
                      <th>Letter Credit From Bank</th>
                      <th>Registry</th>
                      <th>Origin</th>
                      <th>Date Received Notice From Clients</th>
                      <th>Date Received Of BL</th>
                      <th>Date Received Of Other Docs</th>
                      <th>Broker</th>
                      <th>Date Request Budget to GL</th>
                      <th>Request for Payment Due Date</th>
                      <th>Color Selectivity</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          $i=0;
          foreach ($audit_manila as $row) {

            $jbid = $row->JobFileId;
            $jbno = $row->JobFileNo;
            $shipper = $row->ShipperName;
            $consignee = $row->ConsigneeName;
            $hbl = $row->HouseBillLadingNo;
            $mbl = $row->MasterBillLadingNo;
            $mbl2 = $row->MasterBillLadingNo2;
            $lcbank = $row->LetterCreditFromBank;
            $purchaseno = $row->PurchaseOrderNo;
            $registry = $row->Registry;
            $dt_recvd_client = $row->DateReceivedNoticeFromClients;
            $dt_recvd_bl = $row->DateReceivedOfBL;
            $dt_recvd_docs = $row->DateReceivedOfOtherDocs;
            $broker = $row->Broker;
            $dt_recvd_budget = $row->DateRequestBudgetToGL;
            $rfpduedate = $row->RFPDueDate;
            $colorSelect = $row->ColorSelectivityName;
            $colorStages = $row->StatusName;
            $origin = $row->Origin;
            $dt_recvd_client = $row->DateReceivedNoticeFromClients;

            $pick = $row->IsBackground;
                if($pick==0){
                    $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                  }else{
                    $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                  }

            echo '<tr>
              <td class="hidden">'.$jbid.'</td>
              <td>'.$jbno.'</td>';
               echo  $pick1;
             echo '
              <td>'.$shipper.'</td>
              <td>'.$consignee.'</td>
              <td>'.$purchaseno.'</td>
              <td>'.$hbl.'</td>
              <td>'.$mbl.'</td>
              <td>'.$mbl2.'</td>
              <td>'.$lcbank.'</td>
              <td>'.$registry.'</td>
              <td>'.$origin.'</td>
              <td>'.$dt_recvd_client.'</td>
              <td>'.$dt_recvd_bl.'</td>
              <td>'.$dt_recvd_docs.'</td>
              <td>'.$broker.'</td>
              <td>'.$dt_recvd_budget.'</td>
              <td>'.$rfpduedate.'</td>
              <td>'.$colorSelect.'</td>
              </tr>
            ';
          }

          echo '</tbody>
            </table>
          </div>
        </div>';

      }


      function get_audit_vessel(){

        $vesselID = $this->input->post('vesselID');

        $audit_vessel = $this->Jobdata->get_vessel_audit($vesselID);


         echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:2000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Vessel / Voyage No</th>
                      <th>Carrier Name</th>
                      <th>Estimated Departure Time</th>
                      <th>Estimated Arrival Time </th>
                      <th>Discharge Time</th>
                      <th>Berthing Time</th>
                      <th>Actual Arrival Time</th>
                  </tr>
                </thead>      
                <tbody>

          ';

        foreach ($audit_vessel as $row) 
        {
          $date_updated = $row->DateUpdated;
          $uname = $row->UserName;
          $fullname = $row->Full_Name;
          $carriername = $row->CarrierName;
          $vessel = $row->VesselVoyageNo;
          $discharge = $row->DischargeTime;
          $est_dept = $row->EstDepartureTime;
          $est_arrival = $row->EstArrivalTime;
          $aat = $row->ActualArrivalTime;
          $berthing = $row->BerthingTime;


          echo '
          <tr>
            <td>'.$date_updated.'</td>
            <td>'.$uname.'</td>
            <td>'.$fullname.'</td>
            <td>'.$vessel.'</td>
            <td>'.$carriername.'</td>
            <td>'.$est_dept.'</td>
            <td>'.$est_arrival.'</td>
            <td>'.$discharge.'</td>
            <td>'.$berthing.'</td>
            <td>'.$aat.'</td>
          </tr>';

        }

        echo '
          </tbody>
        </table>
      </div>
    </div>
        ';
      }



    function get_audit_jobfile(){
         $jobfile = $this->input->post('jbNum');
          $audit_jobfile = $this->Jobdata->get_jobfile_audit($jobfile);

        if($audit_jobfile == NULL)
        {
          echo '<i style="color:red;">No Jobfile History Yet</i>';
        }else{
           echo '
             <div class="col-lg-12" style="height:300px;overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Jobfile Number</th>
                      <th>Color Stages</th>
                      <th>Shipper</th>
                      <th>Consignee</th>
                      <th>PI/PO No.</th>
                      <th>House Bill Lading No.</th>
                      <th>Master Bill Lading No.</th>
                      <th>Master Bill Lading No.2</th>
                      <th>Letter Credit From Bank</th>
                      <th>Registry</th>
                      <th>Origin</th>
                      <th>Date Received Notice From Clients</th>
                      <th>Date Received Of BL</th>
                      <th>Date Received Of Other Docs</th>
                      <th>Broker</th>
                      <th>Date Request Budget to GL</th>
                      <th>Request for Payment Due Date</th>
                      <th>Color Selectivity</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_jobfile as $row) 
          {
            $date_updated = $row->DateUpdated;
            $uname = $row->UserName;
            $fullname = $row->Full_Name;

             $jbid = $row->JobFileId;
            $jbno = $row->JobFileNo;
            $shipper = $row->ShipperName;
            $consignee = $row->ConsigneeName;
            $hbl = $row->HouseBillLadingNo;
            $mbl = $row->MasterBillLadingNo;
            $mbl2 = $row->MasterBillLadingNo2;
            $lcbank = $row->LetterCreditFromBank;
            $purchaseno = $row->PurchaseOrderNo;
            $registry = $row->Registry;
            $dt_recvd_client = $row->DateReceivedNoticeFromClients;
            $dt_recvd_bl = $row->DateReceivedOfBL;
            $dt_recvd_docs = $row->DateReceivedOfOtherDocs;
            $broker = $row->Broker;
            $dt_recvd_budget = $row->DateRequestBudgetToGL;
            $rfpduedate = $row->RFPDueDate;
            $colorSelect = $row->ColorSelectivityName;
            $colorStages = $row->StatusName;
            $origin = $row->Origin;
            $dt_recvd_client = $row->DateReceivedNoticeFromClients;

            $pick = $row->IsBackground;
                if($pick==0){
                    $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                  }else{
                    $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                  }



            echo '
            <tr>
              <td>'.$date_updated.'</td>
              <td>'.$uname.'</td>
              <td>'.$fullname.'</td>

              <td class="hidden">'.$jbid.'</td>
              <td>'.$jbno.'</td>';
               echo  $pick1;
             echo '
              <td>'.$shipper.'</td>
              <td>'.$consignee.'</td>
              <td>'.$purchaseno.'</td>
              <td>'.$hbl.'</td>
              <td>'.$mbl.'</td>
              <td>'.$mbl2.'</td>
              <td>'.$lcbank.'</td>
              <td>'.$registry.'</td>
              <td>'.$origin.'</td>
              <td>'.$dt_recvd_client.'</td>
              <td>'.$dt_recvd_bl.'</td>
              <td>'.$dt_recvd_docs.'</td>
              <td>'.$broker.'</td>
              <td>'.$dt_recvd_budget.'</td>
              <td>'.$rfpduedate.'</td>
              <td>'.$colorSelect.'</td>
            </tr>
            ';
          }

          echo '
            </tbody>
          </table>
        </div>
      </div>
          ';
    }

  }

     function get_audit_container(){

         $containerID = $this->input->post('containerID');

          $audit_container = $this->Jobdata->get_container_audit($containerID);


         echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Vessel / Voayge No.</th>
                      <th>Container No</th>
                      <th>Container Size</th>
                      <th>No of Cartons</th>
                      <th>Date File Entry To BOC</th>
                      <th>Date BOC Cleared</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Fina lAssessment</th>
                      <th>Reference Entry Number</th>
                      <th>Hauler / Trucker Name</th>
                      <th>Truck Plate No.</th>
                      <th>Start Of Demmurage</th>
                      <th>Start Of Storage</th>
                      <th>Target Delivery Date</th>
                      <th>Gate In at Port</th>
                      <th>Gate Out At Port</th>
                      <th>Actual Delivery At Warehouse</th>
                      
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_container as $row) {
            $date_updated = $row->DateUpdated;
            $uname = $row->UserName;
            $fullname = $row->Full_Name;
            $containerNo = $row->ContainerNo;
            $containerSize = $row->ContainerSize;
            $vessel = $row->VesselVoyageNo;
            $cartons = $row->NoOfCartons;
            $dt_file_entry_boc = $row->DateFileEntryToBOC;
            $dt_boc = $row->DateBOCCleared;
            $dt_pre_assess = $row->DateSentPreAssessment;
            $dt_paid = $row->DatePaid;
            $dt_final_assess = $row->DateSentFinalAssessment;
            $RefEntryNo = $row->RefEntryNo;
            $hauler = $row->HaulerOrTruck;
            $demorage = $row->StartOfDemorage;
            $storage = $row->StartOfStorage;
            $target_date = $row->TargetDeliveryDate;
            $gip = $row->GateInAtPort;
            $gop = $row->GateOutAtPort;
            $act_del_whse = $row->ActualDeliveryAtWarehouse;


            echo '
            <tr>
                <td>'.$date_updated.'</td>
                <td>'.$uname.'</td>
                <td>'.$fullname.'</td>
                <td>'.$vessel.'</td>
                <td>'.$containerNo.'</td>
                <td>'.$containerSize.'</td>
                <td>'.$cartons.'</td>
                <td>'.$dt_file_entry_boc.'</td>
                <td>'.$dt_boc.'</td>
                <td>'.$dt_pre_assess.'</td>
                <td>'.$dt_paid.'</td>
                <td>'.$dt_final_assess.'</td>
                <td>'.$RefEntryNo.'</td>
                <td>'.$hauler.'</td>
                <td>'.$row->TruckerName.'</td>
                <td>'.$demorage.'</td>
                <td>'.$storage.'</td>
                <td>'.$target_date.'</td>
                <td>'.$gip.'</td>
                <td>'.$gop.'</td>
                <td>'.$act_del_whse.'</td>
            </tr>
            ';           
          }

          echo '
            </tbody>
          </table>
        </div>
      </div>
          ';
    }



/*Container Outport Audit trail*/
     function get_audit_container_outport(){

         $containerID = $this->input->post('containerID');

          $audit_container = $this->Jobdata->get_container_audit($containerID);


         echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Vessel / Voayge No.</th>
                      <th>Container No</th>
                      <th>Container Size</th>
                      <th>No of Cartons</th>
                      <th>Date File Entry To BOC</th>
                      <th>Date BOC Cleared</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Fina lAssessment</th>
                      <th>Reference Entry Number</th>
                      <th>Hauler / Trucker Name</th>
                      <th>Truck Plate No.</th>
                      <th>Start Of Demmurage</th>
                      <th>Start Of Storage</th>
                      <th>Target Delivery Date</th>
                      <th>Lodging</th>
                      <th>PullOutDateAtPort</th>
                      <th>Actual Delivery At Warehouse</th>
                      <th>Date Received At Warehouse</th>
                      
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_container as $row) {
            $date_updated = $row->DateUpdated;
            $uname = $row->UserName;
            $fullname = $row->Full_Name;
            $containerNo = $row->ContainerNo;
            $containerSize = $row->ContainerSize;
            $vessel = $row->VesselVoyageNo;
            $cartons = $row->NoOfCartons;
            $dt_file_entry_boc = $row->DateFileEntryToBOC;
            $dt_boc = $row->DateBOCCleared;
            $dt_pre_assess = $row->DateSentPreAssessment;
            $dt_paid = $row->DatePaid;
            $dt_final_assess = $row->DateSentFinalAssessment;
            $RefEntryNo = $row->RefEntryNo;
            $hauler = $row->HaulerOrTruck;
            $demorage = $row->StartOfDemorage;
            $storage = $row->StartOfStorage;
            $target_date = $row->TargetDeliveryDate;
            $lodging = $row->Lodging;
            $PullOutDateAtPort = $row->PullOutDateAtPort;
            $act_del_whse = $row->ActualDeliveryAtWarehouse;
            $dt_recvd_whse = $row->DateReceivedAtWhse; 


            echo '
            <tr>
                <td>'.$date_updated.'</td>
                <td>'.$uname.'</td>
                <td>'.$fullname.'</td>
                <td>'.$vessel.'</td>
                <td>'.$containerNo.'</td>
                <td>'.$containerSize.'</td>
                <td>'.$cartons.'</td>
                <td>'.$dt_file_entry_boc.'</td>
                <td>'.$dt_boc.'</td>
                <td>'.$dt_pre_assess.'</td>
                <td>'.$dt_paid.'</td>
                <td>'.$dt_final_assess.'</td>
                <td>'.$RefEntryNo.'</td>
                <td>'.$hauler.'</td>
                <td>'.$demorage.'</td>
                <td>'.$storage.'</td>
                <td>'.$target_date.'</td>
                <td>'.$lodging.'</td>
                <td>'.$PullOutDateAtPort.'</td>
                <td>'.$act_del_whse.'</td>
                <td>'.$dt_recvd_whse.'</td>
                <td>'.$row->TruckerName.'</td>
            </tr>
            ';           
          }

          echo '
            </tbody>
          </table>
        </div>
      </div>
          ';
    }
   

   function get_audit_commodity(){
       $commodity = $this->input->post('commodity');

      $audit_commodity = $this->Jobdata->get_commodity_audit($commodity);

       echo '
             <div class="col-lg-12" style="height:300px;overflow:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:1000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Product Name</th>
                      <th>Container No</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_commodity as $row) {
              $date_updated =$row->DateUpdated;
              $uname =$row->UserName;
              $fullname =$row->Full_Name;
              $prodname =$row->ProductName;
              $containerNo = $row->ContainerNo;


              echo '
              <tr>
                  <td>'.$date_updated.'</td>
                  <td>'.$uname.'</td>
                  <td>'.$fullname.'</td>
                  <td>'.$prodname.'</td>
                  <td>'.$containerNo.'</td>
              </tr>
              ';
          }


          echo '
            </tbody>
          </table>
        </div>
      </div>
            ';

   }

   function get_audit_charges(){

      $jobfile = $this->input->post('jbNum');

      $audit_charges = $this->Jobdata->get_charges_audit($jobfile);

       if($audit_charges == NULL){
           echo '<i style="color:red;">No Running Charges History Yet</i>';
      }else{

       echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Lodgement Fee</th>
                      <th>Container Deposit</th>
                      <th>THC Charges</th>
                      <th>Arrastre</th>
                      <th>Wharfage</th>
                      <th>Weighing</th>
                      <th>DEL</th>
                      <th>Dispatch Fee</th>
                      <th>Storage</th>
                      <th>Demmurage</th>
                      <th>Detention</th>
                      <th>EIC</th>
                      <th>BAI Inspection</th>
                      <th>BAI Application</th>
                      <th>SRA Inspection</th>
                      <th>SRA Application</th>
                      <th>Bad Cargo</th>
                      <th>Other Fees</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_charges as $row) {
            $date_updated = $row->DateUpdated;
            $uname = $row->UserName;
            $fullname = $row->Full_Name;
            $lodgement = $row->LodgementFee;
            $containerDeposit = $row->ContainerDeposit;
            $thc = $row->THCCharges;
            $arrastre = $row->Arrastre;
            $wharfage = $row->Wharfage;
            $weighing = $row->Weighing;
            $del = $row->DEL;
            $dispatch = $row->DispatchFee;
            $storage = $row->Storage;
            $demorage = $row->Demorage;
            $detention = $row->Detention;
            $eic = $row->EIC;
            $bai_inspect = $row->BAIInspection;
            $bai_app = $row->BAIApplication;
            $sra_inspect = $row->SRAInspection;
            $sra_app = $row->SRAApplication;
            $bad_cargo = $row->BadCargo;
            $otherfee = $row->OtherFees;

            echo '
            <tr>
              <td>'.$date_updated.'</td>
              <td>'.$uname.'</td>
              <td>'.$fullname.'</td>
              <td>'.$lodgement.'</td>
              <td>'.$containerDeposit.'</td>
              <td>'.$thc.'</td>
              <td>'.$arrastre.'</td>
              <td>'.$wharfage.'</td>
              <td>'.$weighing.'</td>
              <td>'.$del.'</td>
              <td>'.$dispatch.'</td>
              <td>'.$storage.'</td>
              <td>'.$demorage.'</td>
              <td>'.$detention.'</td>
              <td>'.$eic.'</td>
              <td>'.$bai_inspect.'</td>
              <td>'.$bai_app.'</td>
              <td>'.$sra_inspect.'</td>
              <td>'.$sra_app.'</td>
              <td>'.$bad_cargo.'</td>
              <td>'.$otherfee.'</td>
            </tr>
            ';
          }

          echo '
              </tbody>
            </table>
          </div>
        </div>
          ';

      }
   }


   /*Air Audit trail*/

    function get_air_audit(){

      $audit_air = $this->Jobdata->get_air_audit();

      if($audit_air == NULL){
           echo '<i style="color:red;">No Jobfile Yet</i>';
      }else{

       echo '
             <div class="col-lg-12">
             <div class="row">
            <table class="table table-bordered table-condensed order-table-audit-air" style="cursor:pointer;width:4400px;">
                <thead>
                  <tr>
                      <th>Jobfile No</th>
                      <th>Color Stages</th>
                      <th>Shipper</th>
                      <th>Consignee</th>
                      <th>No Of Cartons</th>
                      <th>Purchase Order No</th>
                      <th>Letter Credit No From Bank</th>
                      <th>House Air Way Bill</th>
                      <th>Master Air Way Bill</th>
                      <th>Origin</th>
                      <th>Estimated Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Actual Time of Arrival</th>
                      <th>Flight No</th>
                      <th>Air Craft No.</th>
                      <th>Forwarder</th>
                      <th>Warehouse</th>
                      <th>Date Received Arrival From ALine</th>
                      <th>Date Received Notice From Clients</th>
                      <th>Date Pick Up Hawb</th>
                      <th>Date PickUp Other Docs</th>
                      <th>Broker</th>
                      <th>Date Request Budget to GL</th>
                      <th>Request for Payment Due Date</th>
                      <th>Color Selectivity</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_air as $row) {
              $jfNO = $row->JobFileNo;
              $shipper = $row->ShipperName;
              $consignee = $row->ConsigneeName;
              $cartons = $row->NoOfCartons;
              $purchaseno = $row->PurchaseOrderNo;
              $lcbank = $row->LetterCreditNoFromBank;
              $hbl = $row->HouseBillLadingNo;
              $mbl = $row->MasterBillLadingNo;
              $origin = $row->ORIGIN;
              $etd = $row->ETD;
              $eta = $row->ETA;
              $ata = $row->ATA;
              $FlightNo = $row->FlightNo;
              $aircraft = $row->Aircraft;
              $forwader = $row->Forwarder;
              $whse = $row->Warehouse;
              $aline = $row->DateReceivedArrivalFromALine;
              $dt_recvd_client = $row->DateReceivedArrivalFromClient;
              $hawb = $row->DatePickUpHawb;
              $dt_pickup_docs = $row->DatePickUpOtherDocs;
              $broker = $row->Broker; 
              $dt_recvd_budget = $row->DateRequestBudgetToGL;
              $rfpduedate = $row->RFPDueDate;
              $color_select =$row->ColorSelectivityName;

             $pick = $row->IsBackground;
              if($pick==0){
                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                }else{
                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                }



                echo '
                <tr class="airRow">
                    
                    <td>'.$jfNO.'</td>';
                echo $pick1;
                echo '
                    <td>'.$shipper.'</td>
                    <td>'.$consignee.'</td>
                    <td>'.$cartons.'</td>
                    <td>'.$purchaseno.'</td>
                    <td>'.$lcbank.'</td>
                    <td>'.$hbl.'</td>
                    <td>'.$mbl.'</td>
                    <td>'.$origin.'</td>
                    <td>'.$etd.'</td>
                    <td>'.$eta.'</td>
                    <td>'.$ata.'</td>
                    <td>'.$FlightNo.'</td>
                    <td>'.$aircraft.'</td>
                    <td>'.$forwader.'</td>
                    <td>'.$whse.'</td>
                    <td>'.$aline.'</td>
                    <td>'.$dt_recvd_client.'</td>
                    <td>'.$hawb.'</td>
                    <td>'.$dt_pickup_docs.'</td>
                    <td>'.$broker.'</td>
                    <td>'.$dt_recvd_budget.'</td>
                    <td>'.$rfpduedate.'</td>
                    <td>'.$color_select.'</td>
                    <td class="hidden">'.$row->JobFile_AirId.'</td>
                </tr>
                ';

          }


          echo '
              </tbody>
            </table>
          </div>
        </div>
          ';

          echo '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                      ';

    }
  }

  function get_audit_jobfile_air(){
    $jobfile = $this->input->post('jbNum');

      $audit_jobfile_air = $this->Jobdata->get_jobfile_air_audit($jobfile);

      if($audit_jobfile_air == NULL){
        echo '<i style="color:red;">No Jobfile Yet</i>';
      }else{
        echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4500px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>UserName</th>
                      <th>Full Name</th>
                      <th>Jobfile No</th>
                      <th>Color Stages</th>
                      <th>Shipper</th>
                      <th>Consignee</th>
                      <th>No Of Cartons</th>
                      <th>Purchase Order No</th>
                      <th>Letter Credit No From Bank</th>
                      <th>House Air Way Bill</th>
                      <th>Master Air Way Bill</th>
                      <th>Origin</th>
                      <th>Estimated Departure Time</th>
                      <th>Estimated Arrival Time</th>
                      <th>Actual Time of Arrival</th>
                      <th>Flight No</th>
                      <th>Air Craft No.</th>
                      <th>Forwarder</th>
                      <th>Warehouse</th>
                      <th>Date Received Arrival From ALine</th>
                      <th>Date Received Notice From Clients</th>
                      <th>Date Pick Up Hawb</th>
                      <th>Date PickUp Other Docs</th>
                      <th>Broker</th>
                      <th>Date Request Budget to GL</th>
                      <th>Request for Payment Due Date</th>
                      <th>Color Selectivity</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_jobfile_air as $row) {
              $jfNO = $row->JobFileNo;
              $shipper = $row->ShipperName;
              $consignee = $row->ConsigneeName;
              $cartons = $row->NoOfCartons;
              $purchaseno = $row->PurchaseOrderNo;
              $lcbank = $row->LetterCreditNoFromBank;
              $hbl = $row->HouseBillLadingNo;
              $mbl = $row->MasterBillLadingNo;
              $origin = $row->ORIGIN;
              $etd = $row->ETD;
              $eta = $row->ETA;
              $ata = $row->ATA;
              $FlightNo = $row->FlightNo;
              $aircraft = $row->Aircraft;
              $forwader = $row->Forwarder;
              $whse = $row->Warehouse;
              $aline = $row->DateReceivedArrivalFromALine;
              $dt_recvd_client = $row->DateReceivedArrivalFromClient;
              $hawb = $row->DatePickUpHawb;
              $dt_pickup_docs = $row->DatePickUpOtherDocs;
              $broker = $row->Broker; 
              $dt_recvd_budget = $row->DateRequestBudgetToGL;
              $rfpduedate = $row->RFPDueDate;
              $color_select =$row->ColorSelectivityName;

             $pick = $row->IsBackground;
              if($pick==0){
                  $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                }else{
                  $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                }



                echo '
                <tr class="airRow">
                    <td class="hidden">'.$row->JobFile_AirId.'</td>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UserName.'</td>
                    <td>'.$row->Full_Name.'</td>
                    <td>'.$jfNO.'</td>';
                echo $pick1;
                echo '
                    <td>'.$shipper.'</td>
                    <td>'.$consignee.'</td>
                    <td>'.$cartons.'</td>
                    <td>'.$purchaseno.'</td>
                    <td>'.$lcbank.'</td>
                    <td>'.$hbl.'</td>
                    <td>'.$mbl.'</td>
                    <td>'.$origin.'</td>
                    <td>'.$etd.'</td>
                    <td>'.$eta.'</td>
                    <td>'.$ata.'</td>
                    <td>'.$FlightNo.'</td>
                    <td>'.$aircraft.'</td>
                    <td>'.$forwader.'</td>
                    <td>'.$whse.'</td>
                    <td>'.$aline.'</td>
                    <td>'.$dt_recvd_client.'</td>
                    <td>'.$hawb.'</td>
                    <td>'.$dt_pickup_docs.'</td>
                    <td>'.$broker.'</td>
                    <td>'.$dt_recvd_budget.'</td>
                    <td>'.$rfpduedate.'</td>
                    <td>'.$color_select.'</td>
                </tr>
                ';

          }


          echo '
              </tbody>
            </table>
          </div>
        </div>
          ';
      }
  }

function get_audit_commodity_air(){
   $jobfile = $this->input->post('jbNum');

      $audit_commodity_air = $this->Jobdata->get_commodity_air_audit($jobfile);

      if($audit_commodity_air == NULL){
        echo '<i style="color:red;">No Commodity Yet</i>';
      }else{

          echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:3000px;">
                <thead>
                  <tr>
                      <th>Product Name</th>
                      <th>Reference Entry No</th>
                      <th>Gross Weight</th>
                      <th>Date Sent Final Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date BOC Cleared</th>
                      <th>Target Delivery Date</th>
                      <th>Actual Pull Out Date At NAIA</th>
                      <th>Date Received at Warehouse</th>
                      <th>Hauler/Trucker Name</th>
                      <th>Total Storage</th>
                      <th>Additional Per Day Include VAT</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_commodity_air as $row) {
            echo '
              <tr class="airCommodityRow">
                  <td class="hidden">'.$row->Products_AirId.'</td>
                  <td>'.$row->ProductName.'</td>
                  <td>'.$row->RefEntryNo.'</td>
                  <td>'.$row->GrossWeight.'</td>
                  <td>'.$row->DateSentFinalAssessment.'</td>
                  <td>'.$row->DatePaid.'</td>
                  <td>'.$row->DateSentPreAssessment.'</td>
                  <td>'.$row->DateBOCCleared.'</td>
                  <td>'.$row->TargetDeliveryDate.'</td>
                  <td>'.$row->ActualPullOutDateAtNAIA.'</td>
                  <td>'.$row->DateReceivedAtWhse.'</td>
                  <td>'.$row->HaulerOrTruck.'</td>
                  <td>'.$row->TotalStorage.'</td>
                  <td>'.$row->AdtlPerDayncludeVat.'</td>
              </tr>
            ';
          }
           echo '
              </tbody>
            </table>
          </div>
        </div>
          ';

      }
}

function get_audit_commodity_air_history(){
  $commodityID = $this->input->post('commodityID');

      $audit_commodity_air = $this->Jobdata->get_commodity_air_audit_history($commodityID);

      if($audit_commodity_air == NULL){
        echo '<i style="color:red;">No Commodity Yet</i>';
      }else{

          echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:3000px;cursor:pointer;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Product Name</th>
                      <th>Reference Entry No</th>
                      <th>Gross Weight</th>
                      <th>Date Sent Final Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date BOC Cleared</th>
                      <th>Target Delivery Date</th>
                      <th>Actual Pull Out Date At NAIA</th>
                      <th>Date Received at Warehouse</th>
                      <th>Hauler/Trucker Name</th>
                      <th>Total Storage</th>
                      <th>Additional Per Day Include VAT</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_commodity_air as $row) {
            echo '
              <tr>
                  <td class="hidden">'.$row->Products_AirId.'</td>
                  <td>'.$row->DateUpdated.'</td>
                  <td>'.$row->UserName.'</td>
                  <td>'.$row->Full_Name.'</td>
                  <td>'.$row->ProductName.'</td>
                  <td>'.$row->RefEntryNo.'</td>
                  <td>'.$row->GrossWeight.'</td>
                  <td>'.$row->DateSentFinalAssessment.'</td>
                  <td>'.$row->DatePaid.'</td>
                  <td>'.$row->DateSentPreAssessment.'</td>
                  <td>'.$row->DateBOCCleared.'</td>
                  <td>'.$row->TargetDeliveryDate.'</td>
                  <td>'.$row->ActualPullOutDateAtNAIA.'</td>
                  <td>'.$row->DateReceivedAtWhse.'</td>
                  <td>'.$row->HaulerOrTruck.'</td>
                  <td>'.$row->TotalStorage.'</td>
                  <td>'.$row->AdtlPerDayncludeVat.'</td>
              </tr>
            ';
          }
           echo '
              </tbody>
            </table>
          </div>
        </div>
          ';

      }
}


function get_audit_charges_air(){
  $jobfile = $this->input->post('jbNum');

      $audit_charges_air = $this->Jobdata->get_charges_air_audit($jobfile);

      if($audit_charges_air == NULL){
        echo '<i style="color:red;">No RunningCharges Yet</i>';
      }else{

        echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:3000px;">
                <thead>
                  <tr>
                      <th>Date Updated</th>
                      <th>User Name</th>
                      <th>Full Name</th>
                      <th>Lodgement Fee</th>
                      <th>Break Bulk Fee</th>
                      <th>Storage Fee</th>
                      <th>Bad Cargo Order Fee</th>
                      <th>VCRC</th>
                      <th>CNI</th>
                      <th>CNIU</th>
                      <th>Other Fees</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_charges_air as $row) {
            echo '
              <tr>
                  <td>'.$row->DateUpdated.'</td>
                  <td>'.$row->UserName.'</td>
                  <td>'.$row->Full_Name.'</td>
                  <td>'.$row->LodgementFee.'</td>
                  <td>'.$row->BreakBulkFee.'</td>
                  <td>'.$row->StorageFee.'</td>
                  <td>'.$row->BadCargoOrderFee.'</td>
                  <td>'.$row->VCRC.'</td>
                  <td>'.$row->CNI.'</td>
                  <td>'.$row->CNIU.'</td>
                  <td>'.$row->OtherFees.'</td>
              </tr>
            ';
          }

            echo '
              </tbody>
            </table>
          </div>
        </div>
          ';
      }
}

/*HISTORY END*/


/*VIEW AUDIT TRAIL*/

  function get_manila_audit_view(){

    $montype = $this->input->post('montype');
    $audit_manila = $this->Jobdata->get_manilaAudit_view($montype);


    if($audit_manila == NULL){
        echo '<i style="color:red;">No Jobfile Yet</i>';
    }else{

         echo '
             <div class="col-lg-12">
             <div class="row">
            <table class="table table-bordered table-condensed order-table-audit" style="cursor:pointer;width:4000px;">
                <thead>
                  <tr>
                      <th>Jobfile Number</th>
                      <th>Color Stages</th>
                      <th>Shipper</th>
                      <th>Consignee</th>
                      <th>PI/PO No.</th>
                      <th>House Bill Lading No.</th>
                      <th>Master Bill Lading No.</th>
                      <th>Master Bill Lading No.2</th>
                      <th>Letter Credit From Bank</th>
                      <th>Registry</th>
                      <th>Origin</th>
                      <th>Date Received Notice From Clients</th>
                      <th>Date Received Of BL</th>
                      <th>Date Received Of Other Docs</th>
                      <th>Broker</th>
                      <th>Date Request Budget to GL</th>
                      <th>Request for Payment Due Date</th>
                      <th>Color Selectivity</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_manila as $row) {

            $pick = $row->IsBackground;
                if($pick==0){
                    $pick1= '<td style="color:'.$row->ColorCode.';">' .$row->StatusName.'</td>';
                  }else{
                    $pick1 ='<td style="background-color:'.$row->ColorCode.'; ">'.$row->StatusName.'</td>';
                  }

            echo '
            <tr class="rowTable">
               
                <td>'.$row->JobFileNo.'</td>';
            echo $pick1;
            echo' <td>'.$row->ShipperName.'</td>
                  <td>'.$row->ConsigneeName.'</td>
                  <td>'.$row->PurchaseOrderNo.'</td>
                  <td>'.$row->HouseBillLadingNo.'</td>
                  <td>'.$row->MasterBillLadingNo.'</td>
                  <td>'.$row->MasterBillLadingNo2.'</td>
                  <td>'.$row->LetterCreditFromBank.'</td>
                  <td>'.$row->Registry.'</td>
                  <td>'.$row->Origin.'</td>
                  <td>'.$row->DateReceivedNoticeFromClients.'</td>
                  <td>'.$row->DateReceivedOfBL.'</td>
                  <td>'.$row->DateReceivedOfOtherDocs.'</td>
                  <td>'.$row->Broker.'</td>
                  <td>'.$row->DateRequestBudgetToGL.'</td>
                  <td>'.$row->RFPDueDate.'</td>
                  <td>'.$row->ColorSelectivityName.'</td>
                  <td class="hidden">'.$row->JobFileId.'</td>
            </tr>
            ';
          }

            echo '
              </tbody>
            </table>
          </div>
        </div>
            ';

              echo '<script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                      <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                      ';

    }
  }


    function get_audit_vessel_view(){
      $jobfile = $this->input->post('jbNum');

      $audit_vessel = $this->Jobdata->get_vessel_audit_view($jobfile);

       if($audit_vessel == NULL){
        echo '<i style="color:red;">No Vessel History Yet</i>';
        }else{

            echo '
             <div class="col-lg-12" style="overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:2000px;cursor:pointer;">
                <thead>
                  <tr>
                      
                      <th>Carrier Name</th>
                      <th>Vessel / Voyage No.</th>
                      <th>Discharge Time</th>
                      <th>Actual Berthing Time</th>
                      <th>Estimated Departure</th>
                      <th>Estimated Arrival</th>
                      <th>Actual Arrival Time</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_vessel as $row ) {
            echo '
              <tr class="vesselRow">
                  <td class="hidden">'.$row->JobFileNo.'</td>
                  <td class="hidden">'.$row->CarrierByJobFileId.'</td> 
                  <td>'.$row->CarrierName.'</td>
                  <td>'.$row->VesselVoyageNo.'</td>
                  <td>'.$row->DischargeTime.'</td>
                  <td>'.$row->BerthingTime.'</td>
                  <td>'.$row->EstDepartureTime.'</td>
                  <td>'.$row->EstArrivalTime.'</td>
                  <td>'.$row->ActualArrivalTime.'</td> 
              </tr>
            ';
          }

          echo '
              </tbody>
            </table>
          </div>
        </div>
            ';
        }
    }

    function get_audit_container_view(){
        $jobfile = $this->input->post('jbNum');

      $audit_container = $this->Jobdata->get_container_audit_view($jobfile);

       if($audit_container == NULL){
        echo '<i style="color:red;">No Container History Yet</i>';
        }else{

            echo '
             <div class="col-lg-12" style="height:300px;overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;cursor:pointer;">
                <thead>
                  <tr>
                      <th>Vessel / Voyage No.</th>
                      <th>Container No</th>
                      <th>Container Size</th>
                      <th>No of Cartons</th>
                      <th>Date File Entry To BOC</th>
                      <th>Date BOC Cleared</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Final Assessment</th>
                      <th>Reference Entry Number</th>
                      <th>Hauler / Trucker Name</th>
                      <th>Trucker Plate No.</th>
                      <th>Start Of Demmurage</th>
                      <th>Start Of Storage</th>
                      <th>Target Delivery Date</th>
                      <th>Gate In at Port</th>
                      <th>Gate Out At Port</th>
                      <th>Actual Delivery At Warehouse</th>
                  </tr>
                </thead>      
                <tbody>

          ';


          foreach ($audit_container as $row ) {
            echo '
            <tr class="containerRow">
                <td class="hidden">'.$row->JobFileNo.'</td>
                <td class="hidden">'.$row->ContainerByCarrierId.'</td>
                <td>'.$row->VesselVoyageNo.'</td>
                <td>'.$row->ContainerNo.'</td>
                <td>'.$row->ContainerSize.'</td>
                <td>'.$row->NoOfCartons.'</td>
                <td>'.$row->DateFileEntryToBOC.'</td>
                <td>'.$row->DateBOCCleared.'</td>
                <td>'.$row->DateSentPreAssessment.'</td>
                <td>'.$row->DatePaid.'</td>
                <td>'.$row->DateSentFinalAssessment.'</td>
                <td>'.$row->RefEntryNo.'</td>
                <td>'.$row->HaulerOrTruck.'</td>
                <td>'.$row->TruckerName.'</td>
                <td>'.$row->StartOfDemorage.'</td>
                <td>'.$row->StartOfStorage.'</td>
                <td>'.$row->TargetDeliveryDate.'</td>
                <td>'.$row->GateInAtPort.'</td>
                <td>'.$row->GateOutAtPort.'</td>
                <td>'.$row->ActualDeliveryAtWarehouse.'</td>
                
            </tr>
            ';
          }

          echo '
              </tbody>
            </table>
          </div>
        </div>
            ';
        }
    }


/*Container Outport Audit Trail*/
    function get_audit_container_view_outport(){
        $jobfile = $this->input->post('jbNum');

      $audit_container = $this->Jobdata->get_container_audit_view($jobfile);

       if($audit_container == NULL){
        echo '<i style="color:red;">No Container History Yet</i>';
        }else{

            echo '
             <div class="col-lg-12" style="height:300px;overflow-x:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:4000px;cursor:pointer;">
                <thead>
                  <tr>
                      <th>Vessel / Voyage No.</th>
                      <th>Container No</th>
                      <th>Container Size</th>
                      <th>No of Cartons</th>
                      <th>Date File Entry To BOC</th>
                      <th>Date BOC Cleared</th>
                      <th>Date Sent Pre Assessment</th>
                      <th>Date Paid</th>
                      <th>Date Sent Final Assessment</th>
                      <th>Reference Entry Number</th>
                      <th>Hauler / Trucker Name</th>
                      <th>Truck Plate No.</th>
                      <th>Start Of Demmurage</th>
                      <th>Start Of Storage</th>
                      <th>Target Delivery Date</th>
                      <th>Lodging</th>
                      <th>Pull out Date at Port </th>
                      <th>Actual Delivery At Warehouse</th>
                      <th>Date Received At Warehouse</th>
                      
                  </tr>
                </thead>      
                <tbody>

          ';


          foreach ($audit_container as $row ) {
            echo '
            <tr class="containerRow">
                <td class="hidden">'.$row->JobFileNo.'</td>
                <td class="hidden">'.$row->ContainerByCarrierId.'</td>
                <td>'.$row->VesselVoyageNo.'</td>
                <td>'.$row->ContainerNo.'</td>
                <td>'.$row->ContainerSize.'</td>
                <td>'.$row->NoOfCartons.'</td>
                <td>'.$row->DateFileEntryToBOC.'</td>
                <td>'.$row->DateBOCCleared.'</td>
                <td>'.$row->DateSentPreAssessment.'</td>
                <td>'.$row->DatePaid.'</td>
                <td>'.$row->DateSentFinalAssessment.'</td>
                <td>'.$row->RefEntryNo.'</td>
                <td>'.$row->HaulerOrTruck.'</td>
                <td>'.$row->TruckerName.'</td>
                <td>'.$row->StartOfDemorage.'</td>
                <td>'.$row->StartOfStorage.'</td>
                <td>'.$row->TargetDeliveryDate.'</td>
                <td>'.$row->Lodging.'</td>
                <td>'.$row->PullOutDateAtPort.'</td>
                <td>'.$row->ActualDeliveryAtWarehouse.'</td>
                <td>'.$row->DateReceivedAtWhse.'</td>
                
            </tr>
            ';
          }

          echo '
              </tbody>
            </table>
          </div>
        </div>
            ';
        }
    }

    function get_audit_commodity_view(){
       $jobfile = $this->input->post('jbNum');

      $audit_commodity = $this->Jobdata->get_commodity_audit_view($jobfile);

       if($audit_commodity == NULL){
        echo '<i style="color:red;">No Commodity History Yet</i>';
        }else{

          echo '
             <div class="col-lg-12" style="height:300px;overflow:auto;">
             <div class="row">
            <table class="table table-bordered table-condensed " style="width:100%;cursor:pointer;">
                <thead>
                  <tr>
                      <th>Product Name</th>
                      <th>Container No</th>
                  </tr>
                </thead>      
                <tbody>

          ';

          foreach ($audit_commodity as $row) {
            echo '
              <tr class="commodityRow">
                <td class="hidden">'.$row->JobFileNo.'</td>
                <td class="hidden">'.$row->ProductsByContainerId.'</td>
                <td>'.$row->ProductName.'</td>
                <td>'.$row->ContainerNo.'</td>
              </tr>
            ';
          }

           echo '
              </tbody>
            </table>
          </div>
        </div>
            ';

        }

    }

    function get_jobcontent_manila(){
      $jbfl = $this->input->post('jobfile');
      $montype = $this->input->post("monType");
      $jobID ="";
     
      $jobfileContent = $this->Jobdata->contentJobfileID($jbfl,$montype);
       foreach ($jobfileContent as $row) {
       	if($montype == 3){
       	     $jobID = $row->JobFile_AirId;
       	}else{
       		 $jobID = $row->JobFileId;
       	}
       }
    
        $jobfileContent_ = $this->Jobdata->contentJobfile($jobID,$montype);
        echo json_encode($jobfileContent_);
    }

function sendMail(){ //for Sending Email
      $datePath = './resources/pdf/' .date('Y-m-d');
      $filePath = './resources/pdf/' .date('Y-m-d') . '/';
      $date = date('Y-m-d');
      $path =  './resources/pdf/';
      $this->load->library('m_pdf');
      $this->load->helper('file');
      $this->load->helper('download');

       $print = $this->input->post('toPrint');
       $jbNo = $this->input->post('jbNo');
       $montype = $this->input->post('monType');

         //generate the PDF from the given html
          $this->m_pdf->pdf->WriteHTML($print);

        //  $this->email->clear(TRUE);

    //dan's code 
/*            if(!is_dir($path)) //create the folder if it's not already exists
            {
              mkdir($path, 0777, TRUE);
               if(!is_dir($datePath)){
                mkdir($datePath, 0777, TRUE);
                $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
                }else{
                $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
                }
            }else{ // if the folder already exist
               if(!is_dir($datePath)){
                mkdir($datePath, 0777, TRUE);
                $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
                }else{
                $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
                }
            }*/
             
      //eli's code
            if(!is_dir($path)){ //create the folder if it's not already exists
              mkdir($path, 0777, TRUE);
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
               }
            }else{ // if the folder already exist
               if(!is_dir($datePath)){
                   mkdir($datePath, 0777, TRUE);
               }
            }
            //download file


            //email

          if(is_dir($datePath)){
            //you can send email again with the same date,jobfile
            if(is_dir($datePath)){
                  $this->m_pdf->pdf->Output($filePath.$jbNo."-" . $date ."-report.pdf",'F');
       

                    $consignee = $this->Jobdata->get_email_jobfile($jbNo,$montype);
                    foreach($consignee as $row){
                     echo "Email is send to:" . '</br>';
                     echo "Consignee: ".$consign = $row->ConsigneeName . '</br>';
                     echo "Email: "    .$emailadd = $row->EmailAddress;
                    }

                    //email fixed by changing  the protocol to 'sendmail' and changing the  host to 'smtpout.secureserver.net' and changing the port to 80
           
                    //email
                   // $config['protocol']    = 'smtp';
                    $config['protocol'] = 'sendmail'; 
                    $config['smtp_host']    = 'smtpout.secureserver.net';
                    $config['smtp_port']    = '80';
                    $config['smtp_timeout'] = '20';
/*                    $config['smtp_user']    = 'eli@topconnection.asia';
                    $config['smtp_pass']    = 'asiagroup7';*/
                    $config['charset']    = 'utf-8';
                    
                    $config['newline']    = "\r\n";
                    $config['mailtype'] = 'text'; // or html
                    $config['validation'] = TRUE; // bool whether to validate email or not      

                    $this->email->initialize($config);
                    $this->email->from('eli@topconnection.asia', 'eliseo pogi');
                    $this->email->to($email); 
                    //$this->email->reply_to('info@topconnection.asia'); //User email submited in form
                    $this->email->cc('eliseo.montefalcon@gmail.com');
                    $this->email->subject('Filport Testing');
                    $this->email->message('Email Testing.'); 
                   $this->email->attach($filePath.$jbNo."-" . $date ."-report.pdf",'F'); 
                    $this->email->send();
                    echo $this->email->print_debugger();
            }
          }

           // echo "Please Check you email";


       
      }

  }
?>
