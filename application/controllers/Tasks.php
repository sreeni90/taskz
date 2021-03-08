<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tasks_model', 'task');
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

    /**
     * Get count of tasks table
     * 
     * @return Count response 
     */

    public function allCount() {  
        if ($this->session->userdata('ci_seesion_key')['is_loggedin'] == FALSE) {
            redirect('auth/login');
        } else {     
            $data['total'] = $this->task->all();     
            echo json_encode($data);
        }
    }
    /** 
     * Loading all tasks
     * 
     */
    public function all() {  
        if ($this->session->userdata('ci_seesion_key')['is_loggedin'] == FALSE) {
            redirect('auth/login');
        } else {   
             $data['data'] = $this->task->getTasks(($this->input->get("page",1) - 1) * 5);  
             $data['total'] = $this->task->all(); 
             echo json_encode($data);
        }
    }

    /**
    * Add Task Method
    *
    * @return Response
   */
   public function taskCreate()
   {
       $insert = $this->input->post();
       $this->db->insert('tasks', $insert);
       $id = $this->db->insert_id();
       $query = $this->db->get_where('tasks', array('id' => $id));
       echo json_encode($query->row());
    }

   /**
    * Edit task fetch data by task id
    *
    * @return Response
   */
   public function edit($id)
   {
       $query = $this->db->get_where('tasks', array('id' => $id));
       $result = $query->row(); 
       $data = array(
        'task_id'=> $result->id,
        'task_name' => $result->name,
        'description' => $result->description,
        'status'=>$result->status
        );
       $this->load->library('parser');
       // parse template to attach to edit modal
       $parsed_template = $this->parser->parse('tasks/edit', $data,TRUE);
       echo json_encode($parsed_template);
   }
   /**
    * Update task by ID
    *
    * @return Response
   */
   public function update($id)
   {
        if( $this->input->server('REQUEST_METHOD') == 'POST' ){
            $update = $this->input->post(); // post data
            $this->db->where('id', $id);
            if( $this->db->update('tasks', $update) ){
                $data = array('status'=>TRUE);
                echo json_encode($data);
            }
            else {
                $data = array('status'=>FALSE);
                echo json_encode($data);
            }
        }
        else {
            echo "bad request"; // print message if not POST request
        }
    }
}
