<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Auth_model extends CI_Model {

    // variables 
    private $_userID;
    private $_userName;
    private $_name;
    private $_password;
    
    // login and to verify the plain password just for this task which is not recommended we can use encrypt library functions
    function login() {
        $this->db->select('id as user_id, user_name, name, password');
        $this->db->from('users');
        $this->db->where('user_name', $this->_userName);
        $this->db->limit(1);
        $query = $this->db->get();
       
        if ($query->num_rows() == 1) {
            $result = $query->result();
            foreach ($result as $row) {
                if ($this->_password  == $row->password) {
                    return $result;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }

    function setUserName($username){
        $this->_userName = $username;
    }

    function setPassword($password){
        $this->_password = $password;
    }

}