<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail_model extends CI_Model{

    public function __construct(){
        $this->load->database();        
    }
    public function getMails(){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE status = "Sent" AND state = 1 ORDER BY datestamp DESC');
        return $query->result();
    }
    public function getRespondedMails(){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE status = "Responded" AND state = 1 ORDER BY datestamp DESC');
        return $query->result();
    }
    public function getdataMail($id){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE id ='.$id);
        return $query->row();
    }
    public function getRespondedMail($id){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE id ='.$id);
        return $query->row();
    }
    public function updateMailStatus($id){
        $response = $this->input->post('response');
        $this->db->set('status', 'Responded');
        $this->db->set('response', $response);
        $this->db->set('datestamp', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('mail_tbl');
    }
    public function getRespondedCount(){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE status = "Responded" AND state = 1');
        return $query->num_rows();
    }
    public function getMailsCount(){
        $query = $this->db->query('SELECT * FROM mail_tbl WHERE status = "Sent" AND state = 1');
        return $query->num_rows();
    }
}
?>