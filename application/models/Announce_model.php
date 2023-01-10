<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announce_model extends CI_Model{

    public function __construct(){
        $this->load->database();        
    }
    public function insertAnnounce($data){
        return $this->db->insert('announcements',$data);
    }
    public function getAnnouncements(){
        $query = $this->db->query('SELECT * FROM announcements WHERE state =1 ORDER BY datestamp DESC');
        return $query->result();
    }
    public function getAnnounceSearch(){
        $title = $this->input->GET('searchAnn' ,true);
        $query = $this->db->query("SELECT * from announcements where (state =1 AND title like '%$title%') OR (state =1 AND author like '%$title%') ORDER BY datestamp DESC");
        return $query->result();
    }
    public function getdataAnnounce($id){
        $query = $this->db->query('SELECT * FROM announcements WHERE id ='.$id);
        return $query->row();
    }
    public function editAnnounce($id){
        $data = array (
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description')
        );
        $this->db->set('datestamp', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('announcements', $data);
    }
    public function deleteAnnounce($id){
        $this->db->set('state','0');
        $this->db->where('id', $id);
        $this->db->update('announcements');
    }
    public function getAnnounceCount(){
        $query = $this->db->query('SELECT * FROM announcements WHERE state = 1');
        return $query->num_rows();
    }
}
?>