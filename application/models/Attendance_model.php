<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model{

    public function __construct(){
        $this->load->database();        
    }
    public function getAttendance(){
        $query = $this->db->query("SELECT * FROM time_attendance WHERE dateStamp = CURDATE() AND state = 1;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getAttendance_manage(){
        $query = $this->db->query("SELECT * FROM time_attendance WHERE state = 1 ORDER BY dateStamp DESC, timeOut DESC;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getComplete_search($id,$start,$end){
        $query = $this->db->query(
            "SELECT * 
            FROM
                time_attendance
            WHERE
                state = 1
            AND 
                empid = $id
            AND 
                dateStamp
            BETWEEN '$start' AND '$end'
            ORDER BY dateStamp DESC;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getrange_search($start,$end){
        $query = $this->db->query(
            "SELECT * 
            FROM
                time_attendance
            WHERE
                state = 1
            AND 
                dateStamp
            BETWEEN '$start' AND '$end'
            ORDER BY dateStamp DESC;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getrangeid_search($id,$start){
        $query = $this->db->query(
            "SELECT * 
            FROM
                time_attendance
            WHERE
                state = 1
            AND 
                dateStamp = '$start'
            AND
                empid = $id
            ORDER BY dateStamp DESC;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getPerEmp_search($id){
        $query = $this->db->query(
            "SELECT * 
            FROM
                time_attendance
            WHERE
                empid = $id
            AND 
                state = 1
            ORDER BY dateStamp DESC;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getPerEmp_cancelled($id){
        $query = $this->db->query(
            "SELECT * 
            FROM
                time_attendance
            WHERE
                empid = $id
            AND 
                state = 0;");
        if(count($query->result()) > 0){
            return $query->result();
        }
    }
    public function getTotalHours_id($id){
        $query = $this->db->query(
            "SELECT 
                SUM(int_hours) AS result
            FROM
                time_attendance
            WHERE
                empid = $id
            AND
                state = 1;");
        return $query->result();
    }
    public function getTotalHours_range($id,$start,$end){
        $query = $this->db->query(
            "SELECT 
                SUM(int_hours) AS result
            FROM
                time_attendance
            WHERE
                empid = $id
            AND
                state = 1
            AND 
                dateStamp
            BETWEEN '$start' AND '$end';");
        return $query->result();
    }
    public function getTotalMin_id($id){
        $query = $this->db->query(
            "SELECT
                SUM(int_minutes) AS result
            FROM
                time_attendance
            WHERE
                empid = $id
            AND
                state = 1;");
        return $query->result();
    }
    public function getTotalMin_range($id,$start,$end){
        $query = $this->db->query(
            "SELECT 
                SUM(int_minutes) AS result
            FROM
                time_attendance
            WHERE
                empid = $id
            AND
                state = 1
            AND 
                dateStamp
            BETWEEN '$start' AND '$end';");
        return $query->result();
    }
}
?>