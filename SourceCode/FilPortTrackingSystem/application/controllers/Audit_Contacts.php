<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Audit_Contacts extends CI_Controller {

     public function __construct()
       {
            parent::__construct();
            date_default_timezone_set('Asia/Manila');
            $this->load->model('Jobdata');
            $this->load->model('Jobfile');
       }

       function get_settings_contacts(){
       	$settings_ids = $this->input->post('ids');
       	$settings = $this->input->post('get_settings');


       	 if($settings == '1'){
       	 	$text = "Consignee";
       	 	$contacts =  $this->Jobfile->get_contacts_history($settings_ids);
            echo $this->contacts($contacts,$text);
         }else if($settings == '3'){
         	$text = "Shipper";
            $contacts =  $this->Jobfile->get_contacts_shipper($settings_ids);
            echo $this->contacts($contacts,$text);
         }
       	
       }

       function contacts($contacts,$text){
       	$output = '';
       	 if($contacts == NULL){
              $output = '<i style="color:red;">No '.$text.' Contacts Yet</i>';
        }else{
              $output .= '
              			<div style="width:100%;">
                            <div class="row">
                              <h3 style="padding-left: 25px;font-weight: 600;">Contacts History</h3>
                              <div style="height:200px; overflow-y:auto;position:relative;">
	                              <table class="table table-condensed table-bordered order-table-site-settings" style="width:100%;">
	                                <thead>
	                                  <tr>
	                                    <th>No.</th>
	                                    <th>DateUpdated</th>
	                                    <th>Updated By</th>
	                                    <th>FullName</th>
	                                    <th>Contact No. 1</th>
	                                    <th>Contact No. 2</th>
	                                  </tr>
	                                </thead>

	                                <tbody>';

              $i = 0;
            foreach ($contacts as $row) {
              $i++;

              $output .='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$row->DateUpdated.'</td>
                    <td>'.$row->UpdatedBy.'</td>
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
                      </div>';

           
      	}
      	echo $output;
     }
 }
?>