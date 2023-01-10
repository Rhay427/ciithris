<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_model extends CI_Model{
    public function __construct(){
        $this->load->database();        
    }
    public function insertPayroll($payrollDetails){
        return $this->db->insert('payroll_tbl',$payrollDetails);
    }
    public function getPayroll(){
        $query = $this->db->query('SELECT * FROM payroll_tbl WHERE state =1 ORDER BY datecreated DESC');
        return $query->result();
    }
    public function getPayrollPerEmp($id){
        $query = $this->db->query("SELECT * FROM payroll_tbl WHERE id = $id;");
        return $query->row();
    }
    public function deletepayroll($id){
        $this->db->where('id',$id);
        return $this->db->delete('payroll_tbl');
    }
}
?>