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
     
		echo'<select name="vessel" id="vess" class="myvessel form-control ">';
					            				       
		 foreach ($shipper as $row){
		 	echo "<option value=".$row->ShipperVesselId."> ".$row->Vesselname." </option>";
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



      </script>

    <?php }}

    function  check_jobfile(){
     $jobfile =  $this->input->post('jobfile');
      $query= $this->db->query("Select * from 
          JobFile where JobFileId='$jobfile' limit 1");
            
          if($query->num_rows() ==1){
            echo  "Jobfile is already exists";     
          }else{
             echo "Jobfile is available"; 
          }

    }

    function get_goods(){
      $products =  $this->input->post('id');   
      $product  = $this->Jobdata->get_goods($products);

     
            
    if($product==NULL){
          echo    '<center><span style="color:red">No Goods Yet </span></center>';
    }else{
         echo "<div style='width:100%; overflow-x:auto; '> 
              <table class='table-bordered table table-striped table-hover table-condensed' style='width: 700px;'>
              <tr>
                   <th>No.</th>
                   <th>Product Name</th>
              </tr>";

          $i=0;
         foreach($product as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->ProductName."</td>";
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
         <table class='table-bordered table table-striped table-hover table-condensed' style='width: 3000px;'>
              <tr>
                   <th>No.</th>
                   <th>No Of Cartons</th>
                    <th>Trucker PlateNo Time</th>
                    <th>Trucker Name</th>
                    <th>Estimated Departure Time</th>
                    <th>Estimated Arrival Time</th>
                    <th>Actual Arrival Time</th>
                    <th>Start Of Storage</th>
                    <th>Lodging</th>
                    <th>Target Delivery Date</th>
                    <th>Gate In At Port</th>
                    <th>Gate Out At Port</th>
                    <th>Actual Delivery At Warehouse</th>
                    <th>Start Of Demorage</th>

              </tr>";

          $i=0;
         foreach($container as $row){
          $i++;
             echo "<tr>";
             echo "<td> ".$i." </td>";
             echo "<td class='row'>".$row->NoOfCartons."</td>";
             echo "<td class='row'>".$row->TruckerPlateNo."</td>";
             echo "<td class='row'>".$row->TruckerName."</td>";
             echo "<td class='row'>".$row->EstDepartureTime."</td>";
             echo "<td class='row'>".$row->EstArrivalTime."</td>";
             echo "<td class='row'>".$row->ActualArrivalTime."</td>";
             echo "<td class='row'>".$row->StartOfStorage."</td>";
             echo "<td class='row'>".$row->Lodging."</td>";
             echo "<td class='row'>".$row->TargetDeliveryDate."</td>";
             echo "<td class='row'>".$row->GateInAtPort."</td>";
             echo "<td class='row'>".$row->GateOutAtPort."</td>";
             echo "<td class='row'>".$row->ActualDeliveryAtWarehouse."</td>";
             echo "<td class='row'>".$row->StartOfDemorage."</td>";


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


  //for sp_CreateJobFile proc  1st proc
   $job             =$this->input->post('jbfl');
   $consignee       =$this->input->post('consignee');
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
 

  //for sp_AddVesselByJobFile   2nd proc
   $vessel          =  $this->input->post('vesselid');
   $cartons         =  $this->input->post('cartons_no');
   $vat             =$this->input->post('vat');
   $vdt             =$this->input->post('vdt');


 //for sp_AddContainerByVessel   3rd proc
   $container       =  $this->input->post('containerId');
   $plateno         =  $this->input->post('trucker_plate');
   $truckername     =  $this->input->post('trucker_name');
   $edt             =  $this->input->post('edt');
   $eat             =  $this->input->post('eat');
   $aat             =  $this->input->post('aat');
   $start_storage   =  $this->input->post('start_storage');
   $start_demorage  =  $this->input->post('start_demorage');
   $lodging         =  $this->input->post('lodging');
   $tdt             =  $this->input->post('tdt');
   $gip             =  $this->input->post('gip');
   $gop             =  $this->input->post('gop');
   $adw             =  $this->input->post('adw');



         //stop inserting data in jobfile to avoid duplication
     $query= $this->db->query("Select * from JobFile where
          JobFileId='$job' limit 1");
      if($query->num_rows() ==1){
       }else{     
                          //first proc
                 $add_jobfile = "CALL sp_CreateJobFile(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $this->db->query($add_jobfile,
                      array(
                             'P_JobFileID'                             =>$job,           
                             'P_ConsigneeId'                           =>$consignee,
                             'P_BrokerID'                              =>$broker,
                             'P_MonitoringTypeId'                      =>1,
                             'P_StatusId'                              =>1,
                             'P_RefEntryNo'                            =>$entryno,
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
   

                //
      
                //2nd proc
                $add_vessel ="CALL sp_AddVesselByJobFile(?,?,?,?,?)";
                 $this->db->query($add_vessel,
                  array(
                      'P_JobFileId'           => $job,
                      'P_ShipperVesselId'     => $vessel,
                      'P_VesselArrivalTime'   => $vat,
                      'P_VesselDischargeTime' => $vdt,
                      'P_UserId'              => $userid
                ));
          }

           //for getting the last insert in P_VesselByJobFileId start
               $table ='VesselByJobFile';
               $id    ='VesselByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
              //for getting the last insert in P_VesselByJobFileId end



             //3rd proc
            $containerbyvessel = "CALL sp_AddContainerByVessel(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
             $this->db->query($containerbyvessel,
              array(       
                  'P_ContainerNo'           =>$container,
                  'P_ContainerSize'         => 100,
                  'P_VesselByJobFileId'     => $VesselByJobFile ,    // last inserted id from VesselByJobFIle table
                  'P_CarrierId'             => NULL,
                  'P_NoOfCartons'           => $cartons,
                  'P_TruckerPlateNo'        => $plateno,
                  'P_TruckerName'           => $truckername,
                  'P_EstDepartureTime'      => $edt,
                  'P_EstArrivalTime'        => $eat,
                  'P_ActualArrivalTime'     => $aat,
                  'P_StartOfStorage'        => $start_storage,
                  'P_Lodging'               => $lodging,  
                  'P_HaulerId'              => NULL,      //
    /*              'P_DateSentPreAssessment' => $dtSent,*/
                  'P_TargetDeliveryDate'    => $tdt,
                  'P_GateInAtPort'          => $gip,
                  'P_GateOutAtPort'         => $gop,
                  'P_ActualDeliveryAtWarehouse' =>$adw,
                  'P_StartOfDemorage'           =>$start_demorage,
                  'P_PullOutDateAtPort'         =>NULL,
                  'P_UserId'                    => $userid 

             ));

  
   }

  

  function jobfile_add2(){

   $session_data = $this->session->userdata('logged_in');
   $userid = $session_data['uid'];
      //for sp_AddProducts   4th proc
   $product_name         =  $this->input->post('product_name');
   $con_id               =  $this->input->post('con_id');   
   $prod_orderno         =  $this->input->post('prod_orderno');
   $origin_id            =  $this->input->post('origin_id');
   $origin_cty           =  $this->input->post('origin_cty');
   $max                  =  $this->input->post('max');
   
 /*  $dt_boc               =  $this->input->post('dt_boc');*/
 /*  $status               =  $this->input->post('status');*/ // no insert for status haha check it please xd
          //for getting the last insert in P_VesselByJobFileId start
     /*      $table ='ContainerByVessel';
           $id    = 'ContainerByVesselId';  
           $ContainerByVesselId = $this->Jobdata->getLastInserted($table,$id);*/
          //for getting the last insert in P_VesselByJobFileId end

           
    //for getting the last insert in P_VesselByJobFileId start
               $table ='VesselByJobFile';
               $id    ='VesselByJobFileId';  
           $VesselByJobFile = $this->Jobdata->getLastInserted($table,$id);
              //for getting the last insert in P_VesselByJobFileId end

    
 $query = $this->db->query("select ProductName from Products where ProductName='$product_name' and ContainerByVesselId=$VesselByJobFile
 and PurchaseOrderNo='$prod_orderno' and Origin_CountryId=origin_id and  Origin_City='$origin_cty' limit 1");  
    if($query->num_rows() ==0){

                //4th proc
             $addproducts = "CALL sp_AddProducts(?,?,?,?,?,?,?,?)";
             $this->db->query($addproducts,
              array(
                  'P_ProductName'         => $product_name,   
                  'P_ContainerId'         => $con_id,
                  'P_VesselByJobFileId'   => $VesselByJobFile,
                  'P_DateBOCCLeared'      => NULL,
                  'P_PurchaseOrderNo'     => $prod_orderno,
                  'P_Origin_CountryId'    => $origin_id,
                  'P_Origin_City'         => $origin_cty,
                  'P_UserId'              => $userid

             ));
          }
           


              


  }







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
           $DatePaid  =  $this->input->post('dt_paid');
 
           $session_data = $this->session->userdata('logged_in');
           $userid = $session_data['uid'];


            $query= $this->db->query("Select * from JobFile where JobFileId = '$job' limit 1");
            if($query->num_rows() ==1){

              return;
            }

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

  

        $cartons             =  $this->input->post('cartons');
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
           $id    ='VesselByJobFileId';  
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
                  'P_HaulerId'              => NULL,
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
                  'P_StatusId'            => $color_id,  //status
                  'P_DateBOCCLeared'      => $dt_boc,
                  'P_PurchaseOrderNo'     => $purch_order_no,
                  'P_Origin_CountryId'    => $countries,
                  'P_Origin_City'         => $city,
                  'P_UserId'              => $userid

             ));
      }
}


?>