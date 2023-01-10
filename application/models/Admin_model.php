<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
    public function __construct(){
        $this->load->database();        
    }

    public function login(){
        $this->db->where('username' ,$this->input->post('username',true));
        $this->db->where('password' ,md5($this->input->post('password',true)));
        $this->db->where('is_active' ,'1',true);
        $result = $this->db->get('admin_tbl');
        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
    }
    public function getAccess($id){
        $this->db->where('adminId', $id);
        $result = $this->db->get('access_list');
        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
    }
    public function isOldPassword($data){
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $result = $this->db->get('admin_tbl');
        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    public function changePassword($data){
        return $this->db->update('admin_tbl', $data, array('username' => $data['username']));
    }
    public function updateAccess($data){
        return $this->db->update('access_list', $data, array('adminId' => $data['adminId']));
    }
    public function insertAccess($data){
        return $this->db->insert('access_list',$data);
    }
    public function deleteaccess($data){
        return $this->db->update('admin_tbl', $data, array('adminId' => $data['adminId']));
    }
    public function fethAccessbyUser($id){
        $query = $this->db->query('SELECT * FROM access_list WHERE adminId='.$id);
        if(count($query->result())>0){
            return $query->row();
        }
    }
    public function getAdmins(){
        $query = $this->db->query('SELECT * FROM admin_tbl WHERE is_active =1 ORDER BY adminId ASC');
        return $query->result();
    }
    public function insertAdmin($data){
        return $this->db->insert('admin_tbl',$data);
    }
    public function isExistingEmail($data){
        $this->db->where_in('email' ,$data['email']);
        $result = $this->db->get('admin_tbl');
        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    public function isExistingUsername($data){
        $this->db->where_in('username' ,$data['username']);
        $result = $this->db->get('admin_tbl');
        if($result->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}
?>