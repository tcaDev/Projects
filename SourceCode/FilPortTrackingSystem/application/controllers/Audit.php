<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audit extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
            $this->load->model('Jobfile');
       }

        function get_settings_data(){
         $settings = $this->input->post('get_settings');

         if($settings == '1'){
            echo $this->consignee();
         }else if($settings == '2'){
            echo $this->broker();
         }else if($settings == '3'){
            echo $this->shipper();
         }else if($settings == '4'){
            echo $this->shipping();
         }else if($settings == '5'){
            echo $this->hauler();
         }else if($settings == '6'){
            echo $this->commodity();
         }else if($settings == '7'){
            echo $this->legend();
         }

      }


      function consignee(){
        $settings_list =  $this->Jobfile->get_settings_consignee();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Consignee Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:1800px;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
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

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->ConsigneeId.'</td>
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
                      </div>';


              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }

    function broker(){
        $settings_list =  $this->Jobfile->get_settings_broker();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Broker Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:1500px;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
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

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->BrokerId.'</td>
                    <td>'.$row->FullName.'</td>
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
                      </div>';


              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }

    function shipper(){
        $settings_list =  $this->Jobfile->get_settings_shipper();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Shipper Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings"  style="cursor:pointer;width:1500px;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>ShipperName</th>
                                    <th>House Building No./Street</th>
                                    <th>Barangay Or Village</th>
                                    <th>Town Or City Province</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->ShipperId.'</td>
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
                      </div>';

              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }

    function shipping(){
        $settings_list =  $this->Jobfile->get_settings_shipping();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Shipping Line/Carrier Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>CarrierName</th>
                                    <th>Address</th>
                                    <th>Office Number</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->CarrierId.'</td>
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
                      </div>';

              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }

    function hauler(){
        $settings_list =  $this->Jobfile->get_settings_hauler();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Hauler/Trucker Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Hauler Or Truck</th>
                                    <th>Address</th>
                                    <th>TIN</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->HaulerOrTruckId.'</td>
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
                      </div>';

              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }

    function commodity(){
        $settings_list =  $this->Jobfile->get_settings_commodity();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Commodity Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Product Name</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

              $active= $row->IsActive;
              if($active==1){ 
                $stat = 'activated';
                $mystat = '1';
              }else{
                $stat = 'deactivated';
                $mystat= '0';
              }

              $output .='
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->ProductId.'</td>
                    <td>'.$row->ProductName.'</td>
                    <td>'.$stat.'</td>
                </tr>
              ';
            }

              $output .='
                                </tbody>
                          </table>
                        </div>
                      </div>';

              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }


    function legend(){
        $settings_list =  $this->Jobfile->get_settings_legend();

         if($settings_list == NULL){
              echo '<i style="color:red;">No Legend Yet</i>';
        }else{
              $output = '<div class="col-lg-12 ">
                            <div class="row">
                              <table class="table table-condensed table-bordered order-table-site-settings" style="cursor:pointer;width:100%;">
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Status Name</th>
                                    <th>Description</th>
                                    <th>Font/Background</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>

                                <tbody>';

              $i = 0;
            foreach ($settings_list as $row) {
              $i++;

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
                <tr class="rowTable-settings">
                    <td>'.$i.'</td>
                    <td class="hidden">'.$row->StatusId.'</td>
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
                      </div>';

              $output .=' <script src="' .  base_url('resources/table_sort/dist/js/jquery.tablesorter.min.js') . '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/jquery.tablesorter.widgets.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/dist/js/widgets/widget-scroller.min.js"). '"></script>
                          <script src="' .  base_url("resources/table_sort/tableSort_.js") . '"></script>
                          ';

            echo $output;
      }
    }



 }
 ?>