<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_History extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
            $this->load->model('Jobfile');
       }
/*History*/
    function get_settings_data_history(){
    	$settings = $this->input->post('get_settings');
    	$settings_ids = $this->input->post('ids');

         if($settings == '1'){
            echo $this->consignee_history($settings_ids);
         }else if($settings == '2'){
            echo $this->broker_history($settings_ids);
         }else if($settings == '3'){
            echo $this->shipper_history($settings_ids);
         }else if($settings == '4'){
            echo $this->shipping_history($settings_ids);
         }else if($settings == '5'){
            echo $this->hauler_history($settings_ids);
         }else if($settings == '6'){
            echo $this->commodity_history($settings_ids);
         }else if($settings == '7'){
            echo $this->legend_history($settings_ids);
         }
    }

    function consignee_history($settings_ids){
    	 $settings_list =  $this->Jobfile->get_settings_consignee_history($settings_ids);
       $contacts =  $this->Jobfile->get_contacts($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Consignee Yet</i>';
        }else{
              $output = '
                          <div class="row">
                            	<ul class="nav nav-tabs">
              								    <li class="active" style="border: 0px !important"><a data-toggle="tab" href="#consignee_history">Consignee</a></li>
              								    <li><a data-toggle="tab" href="#consignee_contacts">Contacts</a></li>
              								</ul>

                        <div class="tab-content">   

          							   <div id="consignee_history" class="tab-pane fade in active">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Consignee History</h4>
                              </div>
                            <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">                           
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:2000px;">
                                <thead>
                                  <tr>
                                    <th>Date Added</th>
                                    <th>Date Updated</th>
                                    <th>FullName</th>
                                    <th>Consignee Name</th>
                                    <th>House Building No./Street</th>
                                    <th>Barangay Or Village</th>
                                    <th>Town Or City Province</th>
                                    <th>Country</th>
                                    <th>Office Number</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

             
            foreach ($settings_list as $row) {
            

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateAdded.'</td>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->FullName.'</td>
                    <td>'.$row->ConsigneeName.'</td>
                    <td>'.$row->HouseBuildingNoOrStreet.'</td>
                    <td>'.$row->BarangayOrVillage.'</td>
                    <td>'.$row->TownOrCityProvince.'</td>
                    <td>'.$row->CountryName.'</td>
                    <td>'.$row->OfficeNumber.'</td>
                    <td>'.$row->EmailAddress.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>

                      <div id="consignee_contacts" class="tab-pane fade">

                <div class="col-md-12">
                          <h4 style="padding-left: 25px;font-weight: 900;">Consignee Contacts</h4>
                          <h6 style="padding-left: 15px;font-weight: 900;">*Double Click Table Row</h6>
                        </div>  
                        <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                            <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>FullName</th>
                                    <th>Contact No. 1</th>
                                    <th>Contact No. 2</th>
                                  </tr>
                                </thead>

                                <tbody>';
              
              
            foreach ($contacts as $row) {

              $output .='
                <tr class="row_contacts">
                    <td class="hidden">'.$row->ConsigneeContactId.'</td>
                    <td>'.$row->FullName.'</td>
                    <td>'.$row->ContactNo1.'</td>
                    <td>'.$row->ContactNo2.'</td>
                </tr>
              ';
            }

              $output .=' 
                            </tbody>
                          </table>
                        </div>
                         </div>
                     </div>
                  </div>
                      ';

            echo $output;
      }
    }

    function broker_history($settings_ids){
       $settings_list =  $this->Jobfile->get_settings_broker_history($settings_ids);

        if($settings_list == NULL){
              echo '<i style="color:red;">No Broker Yet</i>';
        }else{
              $output = '<div style="width:100%;">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Broker History</h4>
                              </div>
                             <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">  
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:1500px;">
                                <thead>
                                  <tr>
                                    <th>DateUpdated</th>
                                    <th>Updated By</th>
                                    <th>Broker</th>
                                    <th>House Building No./Street</th>
                                    <th>Barangay Or Village</th>
                                    <th>Town Or City Province</th>
                                    <th>Country</th>
                                    <th>Contact No. 1</th>
                                    <th>Contact No. 2</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

             
            foreach ($settings_list as $row) {
           
              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
                    <td>'.$row->Broker.'</td>
                    <td>'.$row->HouseBuildingNoStreet.'</td>
                    <td>'.$row->BarangarOrVillage.'</td>
                    <td>'.$row->TownOrCityProvince.'</td>
                    <td>'.$row->CountryName.'</td>
                    <td>'.$row->ContactNo1.'</td>
                    <td>'.$row->ContactNo2.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>';

            echo $output;
      }
    }

    function shipper_history($settings_ids){
      $settings_list =  $this->Jobfile->get_settings_shipper_history($settings_ids);
      $contacts =  $this->Jobfile->get_contacts_shipper($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Shipper Yet</i>';
        }else{
              $output = '
                          <div class="row">
                              <ul class="nav nav-tabs">
                                  <li class="active" style="border: 0px !important"><a data-toggle="tab" href="#shipper_history">Shipper</a></li>
                                  <li><a data-toggle="tab" href="#shipper_contacts">Contacts</a></li>
                              </ul>

                        <div class="tab-content">   

                           <div id="shipper_history" class="tab-pane fade in active">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Shipper History</h4>
                              </div>
                            <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">                           
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:2000px;">
                                <thead>
                                  <tr>
                                    <th>Date Added</th>
                                    <th>Date Updated</th>
                                    <th>FullName</th>
                                    <th>Consignee Name</th>
                                    <th>House Building No./Street</th>
                                    <th>Barangay Or Village</th>
                                    <th>Town Or City Province</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

             
            foreach ($settings_list as $row) {
             

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateAdded.'</td>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
                    <td>'.$row->ShipperName.'</td>
                    <td>'.$row->HouseBuildingNoStreet.'</td>
                    <td>'.$row->BarangarOrVillage.'</td>
                    <td>'.$row->TownOrCityProvince.'</td>
                    <td>'.$row->CountryName.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>

                      <div id="shipper_contacts" class="tab-pane fade">

                <div class="col-md-12">
                          <h4 style="padding-left: 25px;font-weight: 900;">Shipper Contacts</h4>
                          <h6 style="padding-left: 15px;font-weight: 900;">*Double Click Table Row</h6>
                        </div>  
                        <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                            <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>FullName</th>
                                    <th>Contact No. 1</th>
                                    <th>Contact No. 2</th>
                                  </tr>
                                </thead>

                                <tbody>';
              
             
            foreach ($contacts as $row) {
            

              $output .='
                <tr class="row_contacts">
                    <td class="hidden">'.$row->ShipperContactId.'</td>
                    <td>'.$row->FullName.'</td>
                    <td>'.$row->ContactNo1.'</td>
                    <td>'.$row->ContactNo2.'</td>
                </tr>
              ';
            }

              $output .=' 
                            </tbody>
                          </table>
                        </div>
                         </div>
                     </div>
                  </div>
                      ';

            echo $output;
      }
    }

    function shipping_history($settings_ids){
      $settings_list =  $this->Jobfile->get_settings_shipping_history($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Shipping Line/Carrier Yet</i>';
        }else{
              $output = '<divstyle="width:100%;">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Shipping Line/Carrier History</h4>
                              </div>
                               <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:100%;">
                                <thead>
                                  <tr>
                                    <th>DateUpdated</th>
                                    <th>UpdatedBy</th>
                                    <th>CarrierName</th>
                                    <th>Address</th>
                                    <th>Office Number</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

            foreach ($settings_list as $row) {
              

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
                    <td>'.$row->CarrierName.'</td>
                    <td>'.$row->Address.'</td>
                    <td>'.$row->OfficeNo.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>';

            echo $output;
      }
    }

    function hauler_history($settings_ids){
       $settings_list =  $this->Jobfile->get_settings_hauler_history($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Hauler/Trucker Yet</i>';
        }else{
              $output = '<divstyle="width:100%;">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Hauler/Trucker History</h4>
                              </div>
                               <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:100%;">
                                <thead>
                                  <tr>
                                    <th>DateUpdated</th>
                                    <th>UpdatedBy</th>
                                    <th>Hauler Or Truck</th>
                                    <th>Address</th>
                                    <th>TIN</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

     
            foreach ($settings_list as $row) {
              

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>  
                    <td>'.$row->HaulerOrTruck.'</td>
                    <td>'.$row->Address.'</td>
                    <td>'.$row->TIN.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>';


            echo $output;
      }
    }

    function commodity_history($settings_ids){
      $settings_list =  $this->Jobfile->get_settings_commodity_history($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Commodity Yet</i>';
        }else{
              $output = '<divstyle="width:100%;">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Commodity History</h4>
                              </div>
                               <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:100%;">
                                <thead>
                                  <tr>
                                    <th>DateUpdated</th>
                                    <th>UpdatedBy</th>
                                    <th>Product Name</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              
            foreach ($settings_list as $row) {
            

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
                    <td>'.$row->ProductName.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>';

            echo $output;
      }
    }

    function legend_history($settings_ids){
       $settings_list =  $this->Jobfile->get_settings_legend_history($settings_ids);

         if($settings_list == NULL){
              echo '<i style="color:red;">No Legend Yet</i>';
        }else{
              $output = '<divstyle="width:100%;">
                            <div class="row">
                              <div class="col-md-12">
                                <h4 style="padding-left: 25px;font-weight: 900;">Legend History</h4>
                              </div>
                               <div class="col-md-12" style="width:100%;position:relative;overflow-y:auto;height:340px;">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>DateUpdated</th>
                                    <th>UpdatedBy</th>
                                    <th>Status Name</th>
                                    <th>Description</th>
                                    <th>Font/Background</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              
            foreach ($settings_list as $row) {
          

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $pick =$row->IsBackground;
          if($pick==0){
              $pick1= '<td style="color:'.$row->ColorCode.';"><strong>Font</strong></td>';
            }else{
              $pick1 ='<td style="background-color:'.$row->ColorCode.'; "><strong>Background</strong></td>';
            }

              $output .='
                <tr>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
                    <td>'.$row->StatusName.'</td>
                    <td>'.$row->Description.'</td>
                    '.$pick1.'
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>';

            echo $output;
      }
    }
}
?>