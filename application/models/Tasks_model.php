<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Tasks_model extends CI_Model {


    function all(){
        return $this->db->count_all_results('tasks');
    }

    function getTasks($page){
        $this->db->limit(5, $page);
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get("tasks");
        return $query->result();
    }




}