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
                 $this->form_validation->set_rules('bdate', 'Bdate', 'required');
                 $this->form_validation->set_rules('contact1', 'Contact No 1', 'required');
                 $this->form_validation->set_rules('addr', 'Home', 'required');
                 $this->form_validation->set_rules('brgy', 'Barangay', 'required');
                 $this->form_validation->set_rules('towncity', 'Town', 'required');
                 $this->form_validation->set_rules('country', 'Country', 'required');
                 $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
                 $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
                 $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                 $this->form_validation->set_rules('shint', 'Shint', 'required');
                 $this->form_validation->set_rules('answer', 'Answer', 'required');
                 $this->form_validation->set_rules('questions', 'Questions', 'required');
                 $this->form_validation->set_rules('consignee', 'Consignee', 'required');

                    if ($this->form_validation->run() == FALSE){
                        $data['countries']=$this->User->countries();
                        $data['questions'] =$this->User->question();
                        $data['consignee'] =$this->User->dropdown_consignee();
                        $data['tab'] = "Registration Page";
                        $data['alert'] = "";
                        $data['msg'] = "";
            

                        $this->load->view('register/register_page' , $data);
                    }else{
                       

                           $uname = $this->input->post('uname');
                           $fname = $this->input->post('fname');
                           $mname = $this->input->post('mname');
                           $lname = $this->input->post('lname');
                           $bdate = $this->input->post('bdate');
                           $password = $this->input->post('password');
                           $passconf = $this->input->post('passconf');
                           $email = $this->input->post('email');
                           $shint = $this->input->post('shint');
                           $answer = $this->input->post('answer');
                           $questions = $this->input->post('questions');
                            $salt  = 'fwodhsljkfhnouh';
                            $salt2 = 'djaoiuelanwdoiwq';
                            $pass = sha1($salt.$password.$salt2);
                            $contact1 =  $this->input->post('contact1');
                            $contact2 =  $this->input->post('contact2');
                            $addr     =  $this->input->post('addr');
                            $brgy = $this->input->post('brgy');
                            $town = $this->input->post('towncity');
                            $country = $this->input->post('country');
                            $photo = "user.png";
                            $consignee = $this->input->post('consignee');


                            $query= $this->db->query("Select EmailAddress from User where EmailAddress='$email' limit 1");
                            $query2= $this->db->query("Select Username from User where Username='$uname' limit 1");
                            if($query->num_rows() ==1){
                                $this->email_exist();
                              }
                              else if($query2->num_rows() ==1){
                                $this->username_exist();
                              }

                              else{

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
                                 /* $this->success_register();*/
                                }

                 

                    }

        

                                      

                

        }

        /*
        ----------------------------------
         Alert if Success Registration
        ---------------------------------
         */
          function success_register(){
                $data['countries']=$this->User->countries();
                $data['questions'] =$this->User->question();
                $data['consignee'] =$this->User->dropdown_consignee();
                $data['alert'] = "success";
                $data['msg'] = "Successfully Regsitered!";
                $data['tab'] = "Registration Page";

                $this->load->view('register/register_page',$data);
          } 

        /*
        ----------------------------------
         Alert if Email Already Exist
        ---------------------------------
         */
        function email_exist(){
              $data['countries']=$this->User->countries();
              $data['questions'] =$this->User->question();
              $data['consignee'] =$this->User->dropdown_consignee();
              $data['alert'] = "danger";
              $data['msg'] = "Email Address Already Exist!";
              $data['tab'] = "Registration Page";
            

              $this->load->view('register/register_page',$data);
        } 


        /*
        ----------------------------------
         Alert if Username Exist
        ---------------------------------
         */
        function username_exist(){
              $data['countries']=$this->User->countries();
              $data['questions'] =$this->User->question();
              $data['consignee'] =$this->User->dropdown_consignee();
              $data['alert'] = "danger";
              $data['msg'] = "Username Already Exist!";
              $data['tab'] = "Registration Page";
              $data['log'] = "";

              $this->load->view('register/register_page',$data);
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
             $hbno = $this->input->post('hbno');
             $vil = $this->input->post('vil');
             $city = $this->input->post('city');
             $country = $this->input->post('country');

            $query= $this->db->query("Select * from Shipper where ShipperName = '$shipper' limit 1");
          
          if($query->num_rows() ==1){
             $this->session->failed = 'failed';
          } 
       else{
               $data = array(
                    'ShipperName'           => $shipper,
                    'DateAdded'             => date('Y-m-d'),
                    'HouseBuildingNoStreet' => $hbno,
                    'BarangarOrVillage'     => $vil,
                    'TownOrCityProvince'    => $city,
                    'CountryId'             => $country
                    );

              $this->db->insert('Shipper', $data);

              //inset to shippercontact table
        /*       $fname = $this->input->post('fname');
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

              $this->db->insert('ShipperContacts', $data);*/
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

     }

         function add_consigneecon(){
             $id = $this->input->post('consig_id');
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
                  'ConsigneeId' => $id,
                );

            $this->db->insert('ConsigneeContacts', $data);
              redirect('Login_user/settings/#'); 

     }

     function add_hauler(){
             $name = $this->input->post('hauler_name');
             $add = $this->input->post('hauler_address');
             $tin = $this->input->post('hauler_tin');
                $data = array(
                  'HaulerOrTruck' => $name,
                  'Address' => $add,
                  'TIN' => $tin
                );

          $query= $this->db->query("Select * from HaulerOrTruck where HaulerOrTruck = '$name' and Address = '$add' and TIN = '$tin' limit 1");
          if($query->num_rows() ==1){
             $this->session->failed = 'failed';
          }else{
                $this->db->insert('Hauler', $data);
                $this->session->success = 'success';  
          }
             redirect('Login_user/settings/#hauler');

     }

    function add_product(){
             $name = $this->input->post('product_name');
                $data = array(
                  'ProductName' => $name
                );

          $query= $this->db->query("Select * from Products where ProductName = '$name' limit 1");
          if($query->num_rows() ==1){
             $this->session->failed = 'failed';
          }else{
                $this->db->insert('Products ', $data);
                $this->session->success = 'success';  
          }
             redirect('Login_user/settings/#product');

     }


    function add_forward(){
             $name = $this->input->post('forward');
                $data = array(
                  'ForwarderWarehouseName' => $name
                );

          $query= $this->db->query("Select * from ForwarderWarehouse where ForwarderWarehouseName = '$name' limit 1");
          if($query->num_rows() ==1){
             $this->session->failed = 'failed';
          } 
          else{
                $this->db->insert('ForwarderWarehouse', $data);
                $this->session->success = 'success';  
          }
             redirect('Login_user/settings/#forward');

   }
    function add_legend(){
               $legend  = $this->input->post('legend');
               $descrip = $this->input->post('descrip');
               $backg   = $this->input->post('backg');
               $color   = $this->input->post('color');
               $data   = array(
                  'StatusName' => $legend,
                  'Description'=> $descrip,
                  'IsBackground' => $backg,
                  'ColorCode'  => $color
                );

          $query= $this->db->query("Select * from Status where StatusName = '$legend' 
            and Description='$descrip' and IsBackground='$backg' and ColorCode='$color'  limit 1");
          $query2=$this->db->query("Select * from Status where StatusName = '$legend' ");
          if(($query->num_rows() ==1) || ($query2->num_rows() ==1) ) {
             $this->session->failed = 'failed';
          } 
          else{
                $this->db->insert('Status', $data);
                $this->session->success = 'success';  
          }
             redirect('Login_user/settings/#legend');
   }

       function add_container(){


               $containers  = $this->input->post('cno');
               $descrip = $this->input->post('cd');
               $size   = $this->input->post('cs');
                $data   = array(
                  'ContainerNo' => $containers,
                  'ContainerDescription'=> $descrip,
                  'ContainerSize'  => $size
                );

          $query= $this->db->query("Select * from Container where ContainerNo = '$containers' 
            and ContainerDescription='$descrip' and ContainerSize='$size'  limit 1");
          $query2 =  $this->db->query("Select * from Container where ContainerNo = '$containers' ");
          if(($query->num_rows() ==1) || ($query2->num_rows() ==1) ) {
             $this->session->failed = 'failed';
          } 
          else{
                $this->db->insert('Container', $data);
                $this->session->success = 'success';  
          }
             redirect('Login_user/settings/#container');

   }
          
     
          

/*
------------------------------
  Forgot PAssword
------------------------------
*/
  function forgot_password(){

    

     if(isset($_POST['email']) && !empty($_POST['email'])){

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
     
        if( $this->form_validation->run() == FALSE){

          $data['tab'] = "Forgot Password";
          $this->load->view('forgotpass/password' , $data);
        } else {
          $email = $this->input->post('email');
          $result = $this->User->email_exists($email);

            if($result = true){
              $this->send_reset_password_email($email,$result);

              $data['msg'] = "Success";
              $data['alert'] = "success";
              $data['tab'] = "Forgot Password";
              $this->load->view('forgotpass/password' , $data);

              /*Put email address*/

            } else {
              /* Email address not registered*/
            }

        }

     } else {
         $data['tab'] = "Forgot Password";
         $this->load->view('forgotpass/password' , $data);
     }

  }



  /*
  ---------------------------
    Send Reset PAssword Email
  ---------------------------
  */

  function send_reset_password_email($email,$firstname){

    $this->load->library('email');
    $email_code = md5($this->config->item('salt') . $firstname);

    $this->email->set_mailtype('html');
    $this->email->from($this->config->item('bot_email'),'Freight Forum');
    $this->email->to($email);
    $this->email->subject('Please reset your Password at Frieght Forum');

    $message = '<!DOCTYPE html>
                <html lang="en">
                  <head>
                  <meta charset="utf-8">
                  </head><body>
                ';
    $message .= '<p>Dear '.$firstname.'</p>';
    $message .= '<p>We want to help you reset your passowrd! Please <strong><a href="'.base_url().'Add_user/reset_password_form/'.$email.'/'.$email_code.'Click Here</a></strong> to reset your password.</p>';
    $message .= '<p>Thank you!</p>';
    $message .= '<p>The Team at Freight Forum</p>';
    $message .= '</body></html>';

    $this->email->message($message);
    $this->email->send();
  }
         
  
  function reset_password_form($email ,$email_code){

    if(isset($email, $email_code)){
      $email = trim($email);
      $email_hash = sha1($email . $email_code);
      $verified = $this->User->verify_reset_password_code($email , $email_code);

      if($verified){
        $data['tab'] = "Forgot Password";
        $this->load->view('forgotpass/update_password', array('email_hash' => $email_hash , 'email_code' => $email_code , 'email' => $email));
      }else{
        //back to forgot password and try again
        // There was a prob in your link,, Try again or Request to reset your password againj
      }
    }
  }

 /* function update_password(){

    if(!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] . $_POST['email_code'])){
       die("Error updating your Password")
    }

    $this->form_validation->set_rules('email_hash','Email Hash', 'trim|required');
    $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('pass','Password', 'trim|required|min_length[6]|max_length[50]|matches[newpass]|xss_clean');
    $this->form_validation->set_rules('newpass','New Password', 'trim|required|min_length[6]|max_length[50]|xss_clean');


    if($this->form_validation->run() == FALSE){
        $data['tab'] = "Forgot Password";
         $this->load->view('forgotpass/update_password' , $data);
    }else{
      //success
      $result = $this->User->update_password();
    }
  }*/




}