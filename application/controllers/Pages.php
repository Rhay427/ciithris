<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Admin_model');
    $this->load->model('Emp_model');
    $this->load->model('Dashboard_model');
    $this->load->library('session');
	}

    public function login(){
        if(!$this->session->logged_in){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run() == FALSE){
                $page = 'login';
                if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                    show_404();
                }
                
                $this->load->helper('url');
                $this->load->view('pages/'.$page);
            }else{
                $model = new Admin_model;
                $result = $model->login();
                $user_id = $result['adminId'];
                $resultAccess = $model->getAccess($user_id);
                if($result){
                    $user_data = array(
                        'username' => $result['username'],
                        'manage_employee' => $resultAccess['manage_employee'],
                        'manage_leave' => $resultAccess['manage_leave'],
                        'payroll' => $resultAccess['payroll'],
                        'attendance' => $resultAccess['attendance'],
                        'resignations' => $resultAccess['resignations'],
                        'recruitment' => $resultAccess['recruitment'],
                        'manage_mails' => $resultAccess['manage_mails'],
                        'manage_admin' => $resultAccess['manage_admin'],
                        'announcements' => $resultAccess['announcements'],
                        'logged_in' => true
                    );
                    $this->session->set_userdata($user_data);
                    $this->session->set_flashdata('user_loggedin','Hello '. $this->session->username);
                    redirect('home');
                }else{
                    $this->session->set_flashdata('failed_login','Login Invalid!, Please try again!');
                    redirect(base_url());
                }
            }
        }else{
            redirect('home');
        }
    }
    public function changepassword(){
        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('password','Password','required|min_length[8]');
            $this->form_validation->set_rules('con_password','Confirm Password','required|matches[password]');
            if(!$this->form_validation->run()){
                $data = array(
                    'response' => 'validation',
                    'message' => validation_errors(),
                    'pass_error' => form_error('password'),
                    'conpass_error' => form_error('con_password')
                );
            }else{
                $ajax_data['username'] = $this->session->username;
                $ajax_data['password'] = md5($this->input->post('password'));

                $model = new Admin_model;
                if($model->isOldPassword($ajax_data)){
                    $data = array('response' => 'error', 'message' => 'Error, You just entered your old password!');
                }
                else{
                    if($model->changePassword($ajax_data)){
                        $data = array('response' => 'success', 'message' => 'Password changed successfully');
                    }else{
                        $data = array('response' => 'error', 'message' => 'Error in changing password');
                    }
                }
                
            }
        }else{
            echo "No direct script access allowed";
        }

        echo json_encode($data);
    }
    public function fetchAdmins(){
        if($this->input->is_ajax_request()){
            $model = new Admin_model;
            if($posts = $model->getAdmins()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function addnewadmin(){
        if($this->input->is_ajax_request()){
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('password','Password','required');
            if(!$this->form_validation->run()){
                $data = array(
                    'response' => 'validation',
                    'message' => validation_errors(),
                    'username_error' => form_error('username'),
                    'email_error' => form_error('email'),
                    'pass_error' => form_error('password'),
                );
            }else{
                $ajax_data = $this->input->post();
                $ajax_data['username'] = $this->input->post('username');
                $ajax_data['password'] = md5($this->input->post('password'));
                $ajax_data['email'] = $this->input->post('email');
                $ajax_data['is_active'] = '1';

                $model = new Admin_model;
                if($model->isExistingUsername($ajax_data)){
                    $data = array('response' => 'error', 'message' => 'Error, Username already exists!');
                }
                else if($model->isExistingEmail($ajax_data)){
                    $data = array('response' => 'error', 'message' => 'Error, Email already exists!');
                }
                else{
                    if($model->insertAdmin($ajax_data)){
                        $data = array('response' => 'success', 'message' => 'Data added successfully!');
                    }else{
                        $data = array('response' => 'error', 'message' => 'Error in adding data');
                    }
                }
                
            }
        }else{
            echo "No direct script access allowed";
        }

        echo json_encode($data);
    }

    public function fetchaccess(){
        if($this->input->is_ajax_request()){
            $model = new Admin_model;
           $edit_id = $this->input->post('id');
           if($posts = $model->fethAccessbyUser($edit_id)){
            $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
           echo json_encode($data);
        }else{
            echo "No direct script access allowed";
        }
    }
    public function updateaccess(){
        if($this->input->is_ajax_request()){
            $ajax_data = $this->input->post();
            $ajax_data['adminId'] = $this->input->post('adminId');
            $ajax_data['manage_employee'] = $this->input->post('manage_employee');
            $ajax_data['manage_leave'] = $this->input->post('manage_leave');
            $ajax_data['payroll'] = $this->input->post('payroll');
            $ajax_data['attendance'] = $this->input->post('attendance');
            $ajax_data['resignations'] = $this->input->post('resignations');
            $ajax_data['recruitment'] = $this->input->post('recruitment');
            $ajax_data['manage_mails'] = $this->input->post('manage_mails');
            $ajax_data['manage_admin'] = $this->input->post('manage_admin');
            $ajax_data['announcements'] = $this->input->post('announcements');
            

            $model = new Admin_model;
            if($model->updateAccess($ajax_data)){
                $data = array('response' => 'success', 'message' => 'Access updated successfully!');
            }else{
                $data = array('response' => 'error', 'message' => 'Error in adding data');
            }
        }else{
            echo "No direct script access allowed";
        }

        echo json_encode($data);
    }
    public function insertaccess(){
        if($this->input->is_ajax_request()){
            $ajax_data = $this->input->post();
            $ajax_data['adminId'] = $this->input->post('adminId');
            $ajax_data['manage_employee'] = $this->input->post('manage_employee');
            $ajax_data['manage_leave'] = $this->input->post('manage_leave');
            $ajax_data['payroll'] = $this->input->post('payroll');
            $ajax_data['attendance'] = $this->input->post('attendance');
            $ajax_data['resignations'] = $this->input->post('resignations');
            $ajax_data['recruitment'] = $this->input->post('recruitment');
            $ajax_data['manage_mails'] = $this->input->post('manage_mails');
            $ajax_data['manage_admin'] = $this->input->post('manage_admin');
            $ajax_data['announcements'] = $this->input->post('announcements');
            

            $model = new Admin_model;
            if($model->insertAccess($ajax_data)){
                $data = array('response' => 'success', 'message' => 'Access updated successfully!');
            }else{
                $data = array('response' => 'error', 'message' => 'Error in adding data');
            }
        }else{
            echo "No direct script access allowed";
        }

        echo json_encode($data);
    }
    public function deleteaccess(){
        if($this->input->is_ajax_request()){
            $ajax_data = $this->input->post();
            $ajax_data['adminId'] = $this->input->post('adminId');
            $ajax_data['is_active'] = "0";

            $model = new Admin_model;
            if($model->deleteaccess($ajax_data)){
                $data = array('response' => 'success', 'message' => 'User deleted successfully!');
            }else{
                $data = array('response' => 'error', 'message' => 'Error in adding data');
            }
        }else{
            echo "No direct script access allowed";
        }

        echo json_encode($data);
    }
    public function home(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'home';
                if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                    show_404();
                }

                $this->load->view('templates/header_temp');
                $empcount = new Dashboard_model;
                $data['activeEmp'] = $empcount->fetchActiveEmp();
                $data['inactiveEmp'] = $empcount->fetchInactiveEmp();
                $data['adminCount'] = $empcount->fetchAdmin();
                $data['attendance'] = $empcount->fetchAttendance();
                $this->load->view('pages/'.$page,$data);
                $this->load->view('templates/footer_temp');
        }
    }
    public function manage_admin(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'manage_admin';
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer_temp');
        }
    }
    public function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect(base_url());
    }
    public function goBackHome(){
        redirect('home');
    }
    public function gotoAdmin(){
        redirect('manage_admin');
    }
}
?>