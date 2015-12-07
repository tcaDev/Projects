<?php

class Add_user extends CI_Controller {


     public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User'); 
            $this->load->library('form_validation');

       }

        public function index()

        {
        

                 $this->form_validation->set_rules('uname', 'Uname', 'required');
                 $this->form_validation->set_rules('fname', 'Fname', 'required');
                 $this->form_validation->set_rules('mname', 'Mname', 'required');
                 $this->form_validation->set_rules('lname', 'Lname', 'required');
                 $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
                 $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                 $this->form_validation->set_rules('email', 'Email', 'required|is_unique[User.EmailAddress]|valid_email');
                 $this->form_validation->set_rules('shint', 'Shint', 'required');
                 $this->form_validation->set_rules('answer', 'Answer', 'required');

                    if ($this->form_validation->run() == FALSE){
                        $data['questions'] =$this->User->question();
                        $data['tab'] = "Registration Page";
                        $this->load->view('register/register_page' , $data);
                    }else{
                           $uname = $this->input->post('uname');
                           $fname = $this->input->post('fname');
                           $mname = $this->input->post('mname');
                           $lname = $this->input->post('lname');
                           $password = $this->input->post('password');
                           $email = $this->input->post('email');
                           $shint = $this->input->post('shint');
                           $answer = $this->input->post('answer');
                           $questions = $this->input->post('questions');
                            $salt  = 'fwodhsljkfhnouh';
                            $salt2 = 'djaoiuelanwdoiwq';
                            $pass = sha1($salt.$password.$salt2);
                            $contact1 =  $this->input->post('contact1');;
                            $addr     =  $this->input->post('addr');
                            $photo = "user.png";

                          $add_users = "CALL sp_AddUser(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                          $this->db->query($add_users,
                            array(
                                   'P_UserName'             =>$uname,
                                   'P_Password'             =>$pass,
                                   'P_FirstName'            =>$fname,
                                   'P_MiddleName'           =>$mname,
                                   'P_LastName'             =>$lname,
                                   'P_EmailAddress'         =>$email,
                                   'P_ProfileImageSource'   =>$photo,
                                   'P_RoleId'               =>1,
                                   'P_ContactNo1'           =>$contact1,
                                   'P_ContactNo2'           =>' ',
                                   'P_Address1'             =>$addr,
                                   'P_Address2'             =>' ',
                                   'P_ConsigneeId'          =>1,
                                   'P_SecretQuestionId'     =>1,
                                   'P_SecretAnswer'         =>$answer,
                                   'P_SecretAnswerHint'     =>$shint
                             ));

                                  redirect('Login_user');

                    }

    

                                      

                

        }

    function add_client(){
    
             $cname = $this->input->post('cname');
             $hbno = $this->input->post('hbno');
             $vilage = $this->input->post('vilage');
             $city = $this->input->post('city');
             $country = $this->input->post('country');
             $ofnum = $this->input->post('OfficeNumber');


            $query= $this->db->query("Select * from Consignee where ConsigneeName = '$cname' limit 1");
            if($query->num_rows() ==1){
             $this->session->failed = 'failed';

            }else{

               $data = array(
                  'ConsigneeName' => $cname,
                  'HouseBuildingNoOrStreet' =>$hbno,
                  'BarangayOrVillage'=>$vilage,
                  'TownOrCityProvince'=>$city,
                  'CountryId'=>$country,
                  'OfficeNumber' => $ofnum,
                  'DateAdded'   => date('Y-m-d'),
                  'IsActive'    =>0
                  );

            $this->db->insert('Consignee', $data);
             $this->session->success = 'success';
          }
             redirect('Login_user/settings/#');
    }

      function add_broker(){
             $fname = $this->input->post('fname');
             $mname = $this->input->post('mname');
             $lname = $this->input->post('lname');


             $query= $this->db->query("Select * from Broker where FirstName = '$fname' 
              and MiddleName='$mname' and LastName='$lname' limit 1");
            if($query->num_rows() ==1){
             $this->session->failed = 'failed';

            }else{
             $hbno = $this->input->post('hbno');
             $vilage = $this->input->post('vilage');
             $city = $this->input->post('city');
             $country = $this->input->post('country');
             $c1 = $this->input->post('c1');
             $c2 = $this->input->post('c2');

             $cn = $this->input->post('ContactNo');

               $data = array(
                  'FirstName'             => $fname,
                  'MiddleName'            => $mname,
                  'LastName'              => $lname,
                  'HouseBuildingNoStreet' => $hbno,
                  'BarangarOrVillage'     => $vilage,
                  'TownOrCityProvince'    => $city,
                  'CountryId'             => $country,
                  'ContactNo1'             => $c1,
                  'ContactNo2'             => $c2,
                  'IsActive'              =>0
                  );

            $this->db->insert('Broker', $data);
             $this->session->success = 'success';
          }
            redirect('Login_user/settings/#broker');
     }


    function add_vessel(){
              $vessels = $this->input->post('vessels');
              $shipper = $this->input->post('shipper');
              $vesno = $this->input->post('vesno');
              

                  $query= $this->db->query("Select * from ShipperVessel where Vesselname = '$vessels' and 
                   ShipperId='$shipper' limit 1");
            
            if($query->num_rows() ==1){
             $this->session->failed = 'failed';

            }else{
               $data = array(
                  'Vesselname' => $vessels,
                  'ShipperId' => $shipper,
                  'VesselNo' => $vesno
                  );

            $this->db->insert('ShipperVessel', $data); 
             $this->session->success = 'success';    
          }
          redirect('Login_user/settings/#vessel');
    }
          
    function add_shipper(){
            //ps get the shipper id ;
             $shipper = $this->input->post('shipper');

            $query= $this->db->query("Select * from Shipper where ShipperName = '$shipper' limit 1");
          
          if($query->num_rows() ==1){
             $this->session->failed = 'failed';
          } 
       else{
               $data = array(
                    'ShipperName' => $shipper,
                    'DateAdded'   => date('Y-m-d')
                    );

              $this->db->insert('Shipper', $data);

              //inset to shippercontact table
               $fname = $this->input->post('fname');
               $mname = $this->input->post('mname');
               $lname = $this->input->post('lname');
               $c1 = $this->input->post('con1');
               $c2 = $this->input->post('con2');

           
               $count = $this->User->select_shipperid();
                 foreach($count as $row){
                $count = $row->ShipperId;
                } 
                $sid= $count;

                     $data = array(
                    'FirstName' => $fname,
                    'MiddleName' => $mname,
                    'LastName' => $lname,
                    'ContactNo1'   => $c1,
                    'ContactNo2'   => $c2,
                    'ShipperId'    => $sid
                  );

              $this->db->insert('ShipperContacts', $data);
              $this->session->success = 'success';   
      }
              redirect('Login_user/settings/#shipper');
         
          }
    function add_shippercon(){
             $id = $this->input->post('shipper_id');
             $fname = $this->input->post('fname_contact');
             $mname = $this->input->post('mname_contact');
             $lname = $this->input->post('lname_contact');
             $c1 = $this->input->post('no_contact1');
             $c2 = $this->input->post('no_contact2');

            
                $data = array(
                  'FirstName' => $fname,
                  'MiddleName' => $mname,
                  'LastName' => $lname,
                  'ContactNo1'   => $c1,
                  'ContactNo2'   => $c2,
                  'ShipperId' => $id,
                );

            $this->db->insert('ShipperContacts', $data);
              redirect('Login_user/settings/#shipper');
             ?>

 
   <?php 
            


 }
          

         
  




}