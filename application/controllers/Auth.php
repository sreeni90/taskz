<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model', 'auth'); // load Auth model
        $this->load->library('form_validation');
    }
    
    // login view
    public function index() { 
        if (isset($this->session->userdata('ci_seesion_key')['is_loggedin']) && $this->session->userdata('ci_seesion_key')['is_loggedin']) {
            redirect('tasks/index');       
        }
        else {
            $data = array();
            $data['description'] = 'Login for Tasks';
            $data['keywords'] = 'login,tasks';
            $data['title'] = "Login - Tasks";     
            $this->load->view('auth/login', $data);
        }
        
    }
    

    // action login
    function checkLogin() {        
      // form validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'User Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            //failed then redirect to login page
            $this->index();
        } else {
          $sessArray = array();
            //Field validation succeeded.  Validate with database record
            $username = $this->input->post('user_name');
            $password = $this->input->post('password');
            
            $this->auth->setUserName($username);
            $this->auth->setPassword($password);
            //query from tasks database
            $result = $this->auth->login();
            if (!empty($result) && count($result) > 0) {
                foreach ($result as $row) {
                    $authArray = array(
                        'user_id' => $row->user_id,
                        'name' => $row->name,
                        'user_name' => $row->user_name,
                        'is_loggedin' => TRUE,
                    );
                    $this->session->set_userdata('ci_session_key_generate', TRUE);
                    $this->session->set_userdata('ci_seesion_key', $authArray);                   
                }
                redirect('tasks/index');
            } else {
                $this->index();
            }
        }
    }

    //logout 
    public function logout() {
        $this->session->unset_userdata('ci_seesion_key');
        $this->session->unset_userdata('ci_session_key_generate');
        $this->session->sess_destroy();
        redirect('auth/index');
    }   

}
?>