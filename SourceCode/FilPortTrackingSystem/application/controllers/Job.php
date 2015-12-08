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

		echo'<select name="vessel" id="myvessel "class="form-control">';
					            				       
		 foreach ($shipper as $row){
		 	echo "<option value=".$row->ShipperVesselId."> ".$row->Vesselname." </option>";
		 }

		  echo '</select>';

     }



     function jofile_data(){

           $add_users = "CALL sp_AddUser(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                          $this->db->query($add_users,
                            array(
                                   'P_UserName'             =>$uname,
                                   'P_Password'             =>$pass,
                                   'P_FirstName'            =>$fname,
                                   'P_MiddleName'           =>$mname,
                                   'P_LastName'             =>$lname,
                                   'P_BirthDate'            =>$bdate,
                                   'P_EmailAddress'         =>$email,
                                   'P_ProfileImageSource'   =>$photo,
                                   'P_RoleId'               =>2,
                                   'P_ContactNo1'           =>$contact1,
                                   'P_ContactNo2'           =>$contact2,
                                   'P_HouseBuildingNoStreet'=>$addr,
                                   'P_BarangarOrVillage'    =>$brgy,
                                   'P_TownOrCityProvince'   =>$town,
                                   'P_CountryId'            =>$country,
                                   'P_ConsigneeId'          =>$consignee,
                                   'P_SecretQuestionId'     =>$questions,
                                   'P_SecretAnswer'         =>$answer,
                                   'P_SecretAnswerHint'     =>$shint


                                        ));
                                  $this->success_register();
      }

     }





}


?>