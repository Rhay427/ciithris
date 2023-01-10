<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrollcontroller extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Resign_model');
    $this->load->model('Emp_model');
    $this->load->model('Attendance_model');
    $this->load->model('Leave_model');
    $this->load->model('Payroll_model');
    $this->load->library('session');
	}
    public function payrollhome(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'payrollhome';
            if(!file_exists(APPPATH.'views/pages/payrollManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $this->load->view('pages/payrollManagement/'.$page);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function payroll_create(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'payroll_create';
            if(!file_exists(APPPATH.'views/pages/payrollManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $this->load->view('pages/payrollManagement/'.$page);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function fetchPayroll(){
        if($this->input->is_ajax_request()){
            $model = new Payroll_model;
            if($posts = $model->getPayroll()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchpayrollemp(){
        if($this->input->is_ajax_request()){
            $model = new Payroll_model;
            $data = $this->input->post('id');
            if($posts = $model->getPayrollPerEmp($data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function deletepayroll(){
        if($this->input->is_ajax_request()){
            $model = new Payroll_model;
            $data = $this->input->post('id');
            if($posts = $model->deletepayroll($data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function payrollAdd(){
        $empid = $this->input->post('txempid');
        $rangestart = $this->input->post('start_range');
        $rangeend = $this->input->post('end_range');
        $fullname = $this->input->post('txfullname');
        $branch = $this->input->post('txbranch');
        $department = $this->input->post('txdepartment');
        $designation = $this->input->post('txdesignation');
        $bSalary = $this->input->post('txbSalary');
        $totalhours = $this->input->post('txtotal_hours');
        $totalleave = $this->input->post('txtotal_leave');
        $leavededuct = $this->input->post('txleaveDeduction');
        $tax = $this->input->post('tax');
        $sss = $this->input->post('sss');
        $philhealth = $this->input->post('philhealth');
        $pag_ibig = $this->input->post('pag_ibig');
        $otherdeduct = $this->input->post('other_deduct');
        $totalpay = $this->input->post('txtotal_pay');

        $details = [
            'empid' => $empid,
            'fullName' => $fullname,
            'branch' => $branch,
            'department' => $department,
            'designation' => $designation,
            'b_salary' => $bSalary,
            'range_start' => $rangestart,
            'range_end' => $rangeend,
            'hours_total' => $totalhours,
            'leave_total' => $totalleave,
            'tax' => $tax,
            'sss' => $sss,
            'philhealth' => $philhealth,
            'pag_ibig' => $pag_ibig,
            'leave_deduct' => $leavededuct,
            'other_deduct' => $otherdeduct,
            'total_pay' => $totalpay,
            'state' => "1"
        ];
        $insertModel = new Payroll_model;
        $res = $insertModel->insertPayroll($details);
        $this->session->set_flashdata('input_success','Successfull added a payroll!');
        redirect('payrollhome');
    }
    public function fetchtotalhours(){
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
            echo json_encode($data);
        }
    }
    public function fetchtotalleaves(){
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
                    $model = new Leave_model;
                    if($posts = $model->getTotalLeave_range($id, $start, $end)){
                        $data= array('response' => 'success', 'posts' => $posts);
                    }
            }
            echo json_encode($data);
        }
    }
    public function fetchEmployee(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            $data = $this->input->post('id');
            if($posts = $model->getdataEmp($data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function goBackHome(){
        redirect('payrollhome');
    }
}
?>