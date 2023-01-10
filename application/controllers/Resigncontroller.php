<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resigncontroller extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Resign_model');
    $this->load->library('session');
	}
    public function resignhome(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'resignhome';
            if(!file_exists(APPPATH.'views/pages/resignationManagement/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $resignations = new Resign_model;
            $data['resignation'] = $resignations->getResign();
            $data['c'] = $resignations->getResignCount();
            $this->load->view('pages/resignationManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewResign($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewResign';
            if(!file_exists(APPPATH.'views/pages/resignationManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Resign_model->getdataResign($id);
            $this->load->view('pages/resignationManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function searchResign(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'resignhome';
            if(!file_exists(APPPATH.'views/pages/resignationManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $resignations = new Resign_model;
            $data['resignation'] = $resignations->getResignSearch();
            $data['c'] = $resignations->getResignCount();
            $this->load->view('pages/resignationManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function goBackHome(){
        redirect('resignhome');
    }
}
?>