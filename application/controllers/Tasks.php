<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index() {  
        if ($this->session->userdata('ci_seesion_key')['is_loggedin'] == FALSE) {
            redirect('auth/login');
        } else {     
            $data = array();
            $data['description'] = 'Tasks Management';
            $data['keywords'] = 'tasks';
            $data['title'] = "Tasks Management - Taskz";
            $this->load->view('tasks/index', $data);
        }
    }

}