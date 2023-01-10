<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitcontroller extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
    $this->load->model('Recruit_model');
    $this->load->library('session');
	}

    public function recruithome(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'recruitManagement';
            if(!file_exists(APPPATH.'views/pages/recruitManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $model = new Recruit_model;
            $data['c'] = $model->getrecruitcount();
            $this->load->view('pages/recruitManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function showschedules(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'showSchedules';
            if(!file_exists(APPPATH.'views/pages/recruitManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $model = new Recruit_model;
            $data['c'] = $model->getrecruitcount();
            $this->load->view('pages/recruitManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function showrecruit($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'showRecruit';
            if(!file_exists(APPPATH.'views/pages/recruitManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $model = new Recruit_model;
            $data['recruit'] = $model->getRecruitInfo($id);
            $data['status'] = $model->getinterviewstatus($id)->status;
            $this->load->view('pages/recruitManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function fetchrecruit(){
        if($this->input->is_ajax_request()){
            $model = new Recruit_model;
            if($posts = $model->getRecruit()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }

    public function fetchschedules(){
        if($this->input->is_ajax_request()){
            $model = new Recruit_model;
            if($posts = $model->getSchedules()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }

    public function insertschedule(){
        if($this->input->is_ajax_request()){
            $model = new Recruit_model;
            $id = $this->input->post('recID');
            $rec_data['recID'] = $this->input->post('recID');
            $rec_data['fullName'] = $this->input->post('fullName');
            $rec_data['email'] = $this->input->post('email');
            $rec_data['contact'] = $this->input->post('contact');
            $rec_data['empIDrefer'] = $this->input->post('empIDrefer');
            $rec_data['date'] = $this->input->post('date');
            $rec_data['time'] = $this->input->post('time');
            $rec_data['state'] = "1";

            if($model->isExistingSched($rec_data)){
                $data = array('response' => 'errorExist', 'message' => 'Error, Schedule already exists!');
            }else{
                if($posts = $model->setSchedule($rec_data)){
                    $res = $model->updateStatus($id);
                    $data= array('response' => 'success', 'posts' => $posts);
                }else{
                    $data= array('response' => 'error', 'posts' => 'Error in adding schedule');
                }
            }
            echo json_encode($data);
        }
    }
    public function setdone(){
        if($this->input->is_ajax_request()){
            $model = new Recruit_model;
            $id = $this->input->post('recID');
            $rec_data['state'] = "0";
            $rec_data['recID'] = $this->input->post('recID');

            if($posts = $model->setState($rec_data)){
                $res = $model->updateDone($id);
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Error in adding schedule');
            }
            echo json_encode($data);
        }
    }

    public function goBackHome(){
        redirect('recruithome');
    }
    
}
?>