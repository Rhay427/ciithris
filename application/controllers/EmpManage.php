<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpManage extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Emp_model');
    $this->load->model('Leave_model');
    $this->load->model('Dashboard_model');
    $this->load->library('session');
	}
    public function empManagement(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'empManagement';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $employees = new Emp_model;
            $data['employees'] = $employees->getEmployees();
            $data['h'] = $employees->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function fetchEmployees(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            if($posts = $model->getEmployees()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function fetchinactive(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            if($posts = $model->getInactive()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function reactivate(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            $data = $this->input->post('id');
            $res = $model->reactivateCredit($data);
            if($posts = $model->reactivateEmp($data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function empSearch(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'empManagement';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            
            $this->load->view('templates/header_temp');
            $data['employees'] = $this->Emp_model->getEmployeeSearch();
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            $this->session->set_flashdata('neutral');
        }
    }
    public function empAdd(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'empAdd';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $this->load->view('pages/empManagement/'.$page);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function addNew(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('mEmail','Main Email','required');
        $this->form_validation->set_rules('aEmail','Alternate Email','required');
        $this->form_validation->set_rules('fullName','Full Name','required');
        $this->form_validation->set_rules('birthDate','Birth Date','required');
        $this->form_validation->set_rules('mContact','Main Contact','required');
        $this->form_validation->set_rules('aContact','Alternate Contact','required');
        $this->form_validation->set_rules('mStatus','Marital Status','required');
        $this->form_validation->set_rules('religion','Religion','required');
        $this->form_validation->set_rules('nationality','Nationality','required');
        $this->form_validation->set_rules('presentAddress','Present Address','required');
        $this->form_validation->set_rules('permanentAddress','Permanent Address','required');
        $this->form_validation->set_rules('branch','Branch','required');
        $this->form_validation->set_rules('department','Department','required');
        $this->form_validation->set_rules('designation','Designation','required');
        $this->form_validation->set_rules('dateStarted','Date Started','required');
        $this->form_validation->set_rules('bSalary','Basic Salary','required');
        $page = 'empAdd';
        if($this->form_validation->run()){
            $empid = $this->input->post('username');
            $path = "http://rhaysabaria-001-site2.ftempurl.com/ciitmobile/prof_img/";
            $new_name = str_replace(' ','-',$empid);
            $config = [
                'upload_path' => $_SERVER['DOCUMENT_ROOT'] .'/ciitmobile/prof_img/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $new_name
            ];
            $this->load->library('upload',$config);
            if(! $this->upload->do_upload('profPic')){
                $imageError = array('imageError' => $this->upload->display_errors());
                $this->load->helper('url');
                $this->load->view('templates/header_temp');
                $this->load->view('pages/empManagement/'.$page, $imageError);
                $this->load->view('templates/footer_temp');
                
            }else{
                $prof_filename = $this->upload->data('file_name');
                $accDetails = [
                    'fullname' => $this->input->post('fullName'),
                    'username' => $this->input->post('username'),
                    'password' => md5('defaultpass'),
                    'memail' => $this->input->post('mEmail'),
                    'aemail' => $this->input->post('aEmail'),
                    'birthdate' => $this->input->post('birthDate'),
                    'mcontact' => $this->input->post('mContact'),
                    'acontact' => $this->input->post('aContact'),
                    'mstatus' => $this->input->post('mStatus'),
                    'religion' => $this->input->post('religion'),
                    'nationality' => $this->input->post('nationality'),
                    'present' => $this->input->post('presentAddress'),
                    'permanent' => $this->input->post('permanentAddress'),
                    'profImage' => $path.$prof_filename,
                    'branch' => $this->input->post('branch'),
                    'department' => $this->input->post('department'),
                    'designation' => $this->input->post('designation'),
                    'datestarted' => $this->input->post('dateStarted'),
                    'basicsalary' => $this->input->post('bSalary'),
                    'salarygrade' => $this->input->post('salaryGrade'),
                    'frequency' => $this->input->post('sFrequency'),
                    'state' => '1',
                ];
                $insertmodel = new Emp_model;
                $insertCredits = new Leave_model;
                $resAccount = $insertmodel->insertAccount($accDetails);
                $leaveCredits = [
                    'empid' => $resAccount,
                    'credits' => '0',
                    'state' => '1',
                ];
                $resCredits = $insertCredits->insertCredits($leaveCredits);
                $this->session->set_flashdata('input_success','New employee successfully added!');
                redirect('empManagement');
            }
        }else{
            $page = 'empAdd';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $this->load->view('pages/empManagement/'.$page);
            $this->load->view('templates/footer_temp');
        }
    }
    public function updateJob($empid){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'updateJob';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }

            $this->load->view('templates/header_temp');
            $data['row'] = $this->Emp_model->getdataEmp($empid);
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }
    }
    public function jobupdate($empid) {
        $this->session->set_flashdata('neutral');
        $this->form_validation->set_rules('branch','Branch','required');
        $this->form_validation->set_rules('department','Department','required');
        $this->form_validation->set_rules('designation','Designation','required');
        $this->form_validation->set_rules('dateStarted','Date Started','required');
        if($this->form_validation->run() == false){
            $page = 'updateJob';
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Emp_model->getdataEmp($empid);
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }else{
            $this->session->set_flashdata('editJob_success','Job successfully updated!');
            $this->Emp_model->updateData($empid);
            redirect('EmpManage/showEmployee/'.$empid);
        }
    }
    public function updateSalary($empid){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'updateSalary';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }

            $this->load->view('templates/header_temp');
            $data['row'] = $this->Emp_model->getdataEmp($empid);
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }
    }
    public function salaryupdate($empid){
        $this->session->set_flashdata('neutral');
        $this->form_validation->set_rules('bSalary','Basic Salary','required');
        if($this->form_validation->run() == false){
            $page = 'updateJob';
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Emp_model->getdataEmp($empid);
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }else{
            $this->session->set_flashdata('editSal_success','Salary successfully updated!');
            $this->Emp_model->updateSalary($empid);
            redirect('EmpManage/showEmployee/'.$empid);
        }
    }
    public function deleteData($empid){
        $this->Emp_model->deleteData($empid);
        $this->Emp_model->deleteCredits($empid);
        $this->session->set_flashdata('delete_success','Employee successfully deleted!');
        redirect('empManagement');
    }
    public function showEmployee($empid){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'showEmployee';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Emp_model->getdataEmp($empid);
            $data['h'] = $this->Emp_model->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }
    }
    public function showRequest(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'showRequest';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $employees = new Emp_model;
            $data['employees'] = $employees->getVerificationEmp();
            $data['h'] = $employees->getVerificationCount();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }
    }
    public function showInactive(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'showInactive';
            if(!file_exists(APPPATH.'views/pages/empManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $count = new Dashboard_model;
            $data['h'] = $count->fetchInactiveEmp();
            $this->load->view('pages/empManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }
    }
    public function fetchemailrequest(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            if($posts = $model->getVerificationEmp()){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function approverequest(){
        if($this->input->is_ajax_request()){
            $model = new Emp_model;
            $cred_data = $this->input->post('id');

            if($posts = $model->approveRequest($cred_data)){
                $data= array('response' => 'success', 'posts' => $posts);
            }else{
                $data= array('response' => 'error', 'posts' => 'Failed to fetch data');
            }
            echo json_encode($data);
        }
    }
    public function goBackHome(){
        redirect('empManagement');
    }
    public function goBackAdd(){
        redirect('empAdd');
    }public function goBackRequest(){
        redirect('showRequest');
    }
}
?>