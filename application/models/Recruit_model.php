<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruit_model extends CI_Model{
    public function __construct(){
        $this->load->database();        
    }

    public function getRecruit(){
        $query = $this->db->query('SELECT * FROM recruitment_tbl WHERE state = 1 ORDER BY dateStamp DESC');
        return $query->result();
    }
    public function getSchedules(){
        $query = $this->db->query('SELECT * FROM interview_tbl WHERE state = 1 ORDER BY datetimestamp DESC');
        return $query->result();
    }
    public function getRecruitInfo($id){
        $query = $this->db->query('SELECT * FROM recruitment_tbl WHERE state = 1 AND id ='.$id);
        return $query->row();
    }
    public function getinterviewstatus($id){
        $query = $this->db->query(
            "SELECT 
                recruitment_tbl.status
            FROM 
                recruitment_tbl
            WHERE 
                recruitment_tbl.id = $id"
        );
        return $query->row();
    }
    public function setSchedule($data){
        return $this->db->insert('interview_tbl',$data);
    }
    public function setState($data){
        return $this->db->update('interview_tbl', $data, array('recID' => $data['recID']));
    }
    public function updateStatus($id){
        $this->db->set('status','For Interview');
        $this->db->where('id',$id);
        $this->db->update('recruitment_tbl');
    }
    public function updateDone($id){
        $this->db->set('status','Finished');
        $this->db->where('id',$id);
        $this->db->update('recruitment_tbl');
    }
    public function isExistingSched($data){
        $this->db->where_in('recID' ,$data['recID']);
        $result = $this->db->get('interview_tbl');
        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    public function getrecruitcount(){
        $query = $this->db->query(
            'SELECT * FROM interview_tbl 
            WHERE state = 1');
        return $query->num_rows();
    }
    
}
?>