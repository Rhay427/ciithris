<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resign_model extends CI_Model{

    public function __construct(){
        $this->load->database();        
    }
    public function getResign(){
        $query = $this->db->query('SELECT * FROM resignation_requests WHERE state = 1 ORDER BY datestamp DESC');
        return $query->result();
    }
    public function getResignCount(){
        $query = $this->db->query('SELECT * FROM resignation_requests WHERE state = 1');
        return $query->num_rows();
    }
    public function getdataResign($id){
        $query = $this->db->query('SELECT * FROM resignation_requests WHERE id ='.$id);
        return $query->row();
    }
    public function getResignSearch(){
        $data = $this->input->GET('searchRes' ,true);
        $query = $this->db->query("SELECT * from resignation_requests where (state =1 AND fullname like '%$data%') OR (state =1 AND department like '%$data%') ORDER BY datestamp DESC");
        return $query->result();
    }
}
?>