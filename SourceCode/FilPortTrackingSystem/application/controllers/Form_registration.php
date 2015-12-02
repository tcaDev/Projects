<?php



class Form_registration extends CI_Controller {

        public function __construct()
       {
            parent::__construct();
            $this->load->helper('html');
            $this->load->model('User'); 
            $this->load->library('form_validation');

       }

        public function index()
        {
                 $this->form_validation->set_rules('username', 'Username', 'required');
                 $this->form_validation->set_rules('password', 'Password', 'required');
                 $this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]');
                 $this->form_validation->set_rules('email', 'Email', 'required|is_unique[User.email]|valid_email');

                if ($this->form_validation->run() == FALSE){
                        $data['questions'] =$this->User->question();
                        $data['tab'] = "Registration Page";
                        $this->load->view('register/register_page' , $data);
                }else{
                 $username = $this->input->post('username');
                 $password = $this->input->post('password');
                 $email = $this->input->post('email');

                    $salt  = 'fwodhsljkfhnouh';
                    $salt2 = 'djaoiuelanwdoiwq';
                    $pass = sha1($salt.$password.$salt2);

                                $data = array(
                                  'username' => $username,
                                  'password' => $pass,
                                  'email' => $email
                                  );

                $this->db->insert('admin', $data);
                 $data['tab'] = "Log In";
                 $this->load->view('login/login_page' , $data);

                }

        }

}