<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    public function insertCredits($creditsDetails){
        return $this->db->insert('leave_credits',$creditsDetails);
    }
    public function getCredits(){
        $query = $this->db->query(
            "SELECT 
                leave_credits.id,
                emp_user.empid,
                emp_user.fullname,
                leave_credits.credits,
                leave_credits.dateupdate
            FROM 
                emp_user
            INNER JOIN 
                leave_credits ON emp_user.empid = leave_credits.empid
            WHERE leave_credits.state = 1
            GROUP BY leave_credits.id
            ORDER BY leave_credits.dateupdate DESC"
        );
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getTotalLeave_range($id,$start,$end){
        $query = $this->db->query(
            "SELECT 
                SUM(totalDays) AS result
            FROM
                leave_requests
            WHERE
                empid = $id
            AND
                state = 1
            AND
                status = 'Approved'
            AND 
                dateStamp
            BETWEEN '$start' AND '$end';");
        return $query->result();
    }
    public function getSpecCredits($id){
        $query = $this->db->query(
            "SELECT 
                leave_credits.credits
            FROM 
                leave_credits
            WHERE 
                leave_credits.empid = $id"
        );
        return $query->row();
    }
    public function getempCredits($id){
        $query = $this->db->query(
            "SELECT 
                leave_credits.id,
                emp_user.empid,
                emp_user.fullname,
                leave_credits.credits,
                leave_credits.dateupdate
            FROM 
                emp_user
            INNER JOIN 
                leave_credits ON emp_user.empid = leave_credits.empid
            WHERE leave_credits.id = $id"
        );
        if(count($query->result()) > 0){
            return $query->row();
        }
    }
    public function updateCredits($data){
        $this->db->set('credits', $data['credits']);
        $this->db->where('id',$data['id']);
        $this->db->update('leave_credits');
    }
    public function revertCredits($data){
        $this->db->set('credits', $data['credits']);
        $this->db->where('empid',$data['empid']);
        $this->db->update('leave_credits');
    }
    public function getPendingRequests(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Pending" 
            AND state = 1 
            ORDER BY datestamp DESC'
        );
        return $query->result();
    }

    public function getCancelledRequests(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Cancelled" 
            AND state = 1 
            ORDER BY datestamp DESC');
        return $query->result();
    }

    public function getApprovedRequests(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Approved" 
            AND state = 1 ORDER BY datestamp DESC');
        return $query->result();
    }

    public function getPendingCount(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Pending" 
            AND state = 1');
        return $query->num_rows();
    }

    public function getCancelledCount(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Cancelled" 
            AND state = 1');
        return $query->num_rows();
    }

    public function getApprovedCount(){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE status = "Approved" 
            AND state = 1');
        return $query->num_rows();
    }

    public function getRequestData($id){
        $query = $this->db->query(
            'SELECT * FROM leave_requests 
            WHERE id ='.$id.' 
            AND state=1');
        return $query->row();
    }

    public function approve_query($id){
        $response = $this->input->post('remarks');
        $this->db->set('status', 'Approved');
        $this->db->set('remarks', $response);
        $this->db->set('datestamp', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('leave_requests');
    }

    public function cancel_query($id){
        $response = $this->input->post('remarks');
        $this->db->set('status', 'Cancelled');
        $this->db->set('remarks', $response);
        $this->db->set('datestamp', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('leave_requests');
    }
}
?>