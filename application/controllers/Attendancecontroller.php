<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendancecontroller extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Attendance_model');
    $this->load->library('session');
	}

    public function attendancehome(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'attendancehome';
            if(!file_exists(APPPATH.'views/pages/attendanceManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $this->load->view('pages/attendanceManagement/'.$page);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function fetch(){
        if($this->input->is_ajax_request()){
            if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && !empty($_POST['id']) 
                && !empty($_POST['start']) 
                && !empty($_POST['end']) 
            ){
                    $id = $_POST['id'];
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $model = new Attendance_model;
                    if($posts = $model->getComplete_search($id, $start, $end)){
                        $data= array('response' => 'success', 'posts' => $posts);
                    }else{
                        if($posts = $model->getAttendance_manage()){
                            $data= array('response' => 'successNew', 'posts' => $posts);
                        }else{
                            $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
                        }
                    }
            }
            else if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && !empty($_POST['id']) 
                && empty($_POST['start']) 
                && empty($_POST['end']) 
            ){
                    $id = $_POST['id'];
                    $model = new Attendance_model;
                    if($posts = $model->getPerEmp_search($id)){
                        $data= array('response' => 'success', 'posts' => $posts);
                    }else{
                        if($posts = $model->getAttendance_manage()){
                            $data= array('response' => 'successNew', 'posts' => $posts);
                        }else{
                            $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
                        }
                    }
            }
            else if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && empty($_POST['id']) 
                && !empty($_POST['start']) 
                && !empty($_POST['end']) 
            ){
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $model = new Attendance_model;
                    if($posts = $model->getrange_search($start, $end)){
                        $data= array('response' => 'success', 'posts' => $posts);
                    }else{
                        if($posts = $model->getAttendance_manage()){
                            $data= array('response' => 'successNew', 'posts' => $posts);
                        }else{
                            $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
                        }
                    }
            }
            else if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && !empty($_POST['id']) 
                && !empty($_POST['start']) 
                && empty($_POST['end']) 
            ){
                    $id = $_POST['id'];
                    $start = $_POST['start'];
                    $model = new Attendance_model;
                    if($posts = $model->getrangeid_search($id,$start)){
                        $data= array('response' => 'success', 'posts' => $posts);
                    }else{
                        if($posts = $model->getAttendance_manage()){
                            $data= array('response' => 'successNew', 'posts' => $posts);
                        }else{
                            $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
                        }
                    }
            }else{
                $model = new Attendance_model;
                if($posts = $model->getAttendance_manage()){
                    $data= array('response' => 'success', 'posts' => $posts);
                }else{
                    $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
                }
            }
            echo json_encode($data);
        }
    }
    public function fetchtotal(){
        if($this->input->is_ajax_request()){
            if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && !empty($_POST['id']) 
                && !empty($_POST['start']) 
                && !empty($_POST['end']) 
            ){
                    $id = $_POST['id'];
                    $start = $_POST['start'];
                    $end = $_POST['end'];
                    $model = new Attendance_model;
                    if($postshours = $model->getTotalHours_range($id, $start, $end)){
                        $postsmin = $model->getTotalMin_range($id, $start, $end);
                        $data= array('response' => 'success', 'postshours' => $postshours, 'postsmins' => $postsmin);
                    }
            }
            else if(
                isset($_POST['id']) 
                && isset($_POST['start']) 
                && isset($_POST['end']) 
                && !empty($_POST['id']) 
                && empty($_POST['start']) 
                && empty($_POST['end']) 
            ){
                    $id = $_POST['id'];
                    $model = new Attendance_model;
                    if($postshours = $model->getTotalHours_id($id)){
                        $postsmin = $model->getTotalMin_id($id);
                        $data= array('response' => 'success', 'postshours' => $postshours, 'postsmins' => $postsmin);
                    }
            }
            echo json_encode($data);
        }
    }
    public function fetchattendance(){
        if($this->input->is_ajax_request()){
            $model = new Attendance_model;
            if($posts = $model->getAttendance()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    
}
?>