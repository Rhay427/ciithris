<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveManage extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Leave_model');
    $this->load->library('session');
	}
    public function leaveManagement(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'leaveManagement';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $requests = new Leave_model;
            $data['p'] = $requests->getPendingCount();
            $data['a'] = $requests->getApprovedCount();
            $data['c'] = $requests->getCancelledCount();
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function fetchpending(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            if($posts = $model->getPendingRequests()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchapproved(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            if($posts = $model->getApprovedRequests()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchcancelled(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            if($posts = $model->getCancelledRequests()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchemployeecredits(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            if($posts = $model->getCredits()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchempcred(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            $cred_id = $this->input->post('id');
            if($posts = $model->getempCredits($cred_id)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function submitcredits(){
        if($this->input->is_ajax_request()){
            $model = new Leave_model;
            $cred_data['id'] = $this->input->post('id');
            $cred_data['credits'] = $this->input->post('credits');

            if($posts = $model->updateCredits($cred_data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function managecredits(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'assignCredits';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $requests = new Leave_model;
            $data['request'] = $requests->getApprovedRequests();
            $data['p'] = $requests->getPendingCount();
            $data['a'] = $requests->getApprovedCount();
            $data['c'] = $requests->getCancelledCount();
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }

    public function manageapproved(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'manageApproved';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $requests = new Leave_model;
            $data['p'] = $requests->getPendingCount();
            $data['a'] = $requests->getApprovedCount();
            $data['c'] = $requests->getCancelledCount();
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function managecancelled(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'manageCancelled';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $requests = new Leave_model;
            $data['p'] = $requests->getPendingCount();
            $data['a'] = $requests->getApprovedCount();
            $data['c'] = $requests->getCancelledCount();
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }


    public function viewRequest($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewRequest';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $request = new Leave_model;
            $data['row'] = $request->getRequestData($id);
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewApproved($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewApproved';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $request = new Leave_model;
            $data['row'] = $request->getRequestData($id);
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewCancelled($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewCancelled';
            if(!file_exists(APPPATH.'views/pages/leaveManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $request = new Leave_model;
            $data['row'] = $request->getRequestData($id);
            $this->load->view('pages/leaveManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }

    public function approveRequest($id){
        $insertModel = new Leave_model;
        $res = $insertModel->approve_query($id);
        $this->session->set_flashdata('approved','Leave request successfully approved!');
        redirect('leaveManagement');
    }

    public function cancelRequest($id){
        $insertModel = new Leave_model;
        $empid = $this->input->post('empid');
        $total = $this->input->post('totaldays');
        $current = $insertModel->getSpecCredits($empid)->credits;
        $result = $total + $current;
        $data['empid'] = $empid;
        $data['credits'] = $result;

        $finalresult = $insertModel->revertCredits($data);
        $res = $insertModel->cancel_query($id);
        $this->session->set_flashdata('cancelled','Leave request successfully cancelled!');
        redirect('leaveManagement');
        
        
    }
    public function goBackHome(){redirect('leaveManagement');}
    public function goBackApproved(){redirect('manageapproved');}
    
}
?>