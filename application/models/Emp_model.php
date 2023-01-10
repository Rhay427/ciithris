<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_model extends CI_Model{

    public function __construct(){
        $this->load->database();        
    }
    public function insertAccount($accDetails){
        $this->db->insert('emp_user',$accDetails);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function getEmployees(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE state =1 ORDER BY empid ASC');
        return $query->result();
    }
    public function getInactive(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE state =0 ORDER BY empid ASC');
        return $query->result();
    }
    public function reactivateEmp($id){
        $this->db->set('state', '1');
        $this->db->where('empid', $id);
        $this->db->update('emp_user');
    }
    public function reactivateCredit($id){
        $this->db->set('state', '1');
        $this->db->where('empid', $id);
        $this->db->update('leave_credits');
    }
    public function getEmployeeSearch(){
        $fullname = $this->input->GET('searchBox' ,true);
        $query = $this->db->query("SELECT * from emp_user where (fullname like '%$fullname%' AND state =1) OR (empid like '%$fullname%' AND state=1) 
        OR (department like '%$fullname%' AND state =1) ORDER BY empid ASC");
        return $query->result();
    }
    public function getAdminSearch(){
        $fullname = $this->input->GET('searchBox' ,true);
        $query = $this->db->query("SELECT * from emp_user where fullname like '%$fullname%' and state like '1' and isadmin like '1' ");
        return $query->result();
    }
    public function getdataEmp($empid){
        $query = $this->db->query('SELECT * FROM emp_user WHERE state = 1 AND empid ='.$empid);
        return $query->row();
    }
    public function updateData($empid){
        $data = array (
            'branch' => $this->input->post('branch'),
            'department' => $this->input->post('department'),
            'designation' => $this->input->post('designation'),
            'datestarted' => $this->input->post('dateStarted')
        );
        $this->db->where('empid', $empid);
        $this->db->update('emp_user', $data);
    }
    public function updateSalary($empid){
        $data = array (
            'basicsalary' => $this->input->post('bSalary'),
            'salarygrade' => $this->input->post('salaryGrade'),
            'frequency' => $this->input->post('sFrequency')
        );
        $this->db->where('empid', $empid);
        $this->db->update('emp_user', $data);
    }
    public function deleteData($empid){
        $this->db->set('state', '0');
        $this->db->where('empid', $empid);
        $this->db->update('emp_user');
    }
    public function deleteCredits($empid){
        $this->db->set('state', '0');
        $this->db->where('empid', $empid);
        $this->db->update('leave_credits');
    }
    public function getVerificationCount(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE edit_auth = 2 AND state = 1');
        return $query->num_rows();
    }
    public function getVerificationEmp(){
        $query = $this->db->query('SELECT * FROM emp_user WHERE edit_auth = 2 AND state = 1');
        return $query->result();
    }
    public function approveRequest($empid){
        $this->db->set('edit_auth', '1');
        $this->db->where('empid', $empid);
        $this->db->update('emp_user');
    }
}
?>