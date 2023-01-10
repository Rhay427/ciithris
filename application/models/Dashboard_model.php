<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{
    public function __construct(){
        $this->load->database();        
    }

    public function fetchActiveEmp(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE state = 1');
        return $query->num_rows();
    }
    public function fetchInactiveEmp(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE state = 0');
        return $query->num_rows();
    }
    public function fetchAdmin(){
        $query = $this->db->query('SELECT * FROM admin_tbl WHERE is_active = 1');
        return $query->num_rows();
    }
    public function fetchAttendance(){
        $query = $this->db->query('SELECT * FROM time_attendance WHERE state =1 ORDER BY dateStamp DESC, timeOut DESC');
        return $query->result();
    }
}
?>