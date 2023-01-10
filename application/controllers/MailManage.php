<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailManage extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Mail_model');
        $this->load->library('session');
        $this->load->library('email');
	}
    public function mailManagement(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'mailManagement';
            if(!file_exists(APPPATH.'views/pages/mailManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $mails = new Mail_model;
            $data['mails'] = $mails->getMails();
            $data['h'] = $mails->getRespondedCount();
            $data['c'] = $mails->getMailsCount();
            $this->load->view('pages/mailManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function respondedMail(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'respondedMail';
            if(!file_exists(APPPATH.'views/pages/mailManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $mails = new Mail_model;
            $data['mails'] = $mails->getRespondedMails();
            $data['h'] = $mails->getRespondedCount();
            $data['c'] = $mails->getMailsCount();
            $this->load->view('pages/mailManagement/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewMail($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewMail';
            if(!file_exists(APPPATH.'views/pages/mailManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $mails = new Mail_model;
            $data['row'] = $mails->getdataMail($id);
            $data['h'] = $mails->getRespondedCount();
            $data['c'] = $mails->getMailsCount();
            $this->load->view('pages/mailManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewResponded($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewResponded';
            if(!file_exists(APPPATH.'views/pages/mailManagement/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $mails = new Mail_model;
            $data['row'] = $mails->getRespondedMail($id);
            $data['h'] = $mails->getRespondedCount();
            $data['c'] = $mails->getMailsCount();
            $this->load->view('pages/mailManagement/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function respondMail($id){
        $this->form_validation->set_rules('response','Response','required');
        if($this->form_validation->run()){
            $insertModel = new Mail_model;
            $res = $insertModel->updateMailStatus($id);
            /*$email = $this->input->post('email');
            $this->load->library('email');

            $this->email->from('ciiteamofficial@gmail.com', 'CIITeam');
            $this->email->to($email);

            $this->email->subject('Admin has replied to your mail');
            $this->email->message('Please open the app to show the response.');

            if($this->email->send()){*/
            $this->session->set_flashdata('respond_success','Response successfully sent!');
            redirect('mailManagement');
            //}
        }else{
            redirect('mailManagement');
        }
    }
    public function goBackRespo(){
        redirect('respondedMail');
    }
    public function goBackMail(){
        redirect('mailManagement');
    }
    //sample send
    public function send_mail() { 
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "ciiteamofficial@gmail.com"; 
        $config['smtp_pass'] = "ciitadmin123";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";

        $ci->email->initialize($config);

        $ci->email->from('ciiteamofficial@gmail.com', 'CIITeam');
        $ci->email->to('rhayvincent.sabaria@gmail.com');
        $this->email->reply_to('rhayvincent.sabaria@gmail.com', 'Explendid Videos');
        $ci->email->subject('This is an email test');
        $ci->email->message('It is working. Great!');
        $ci->email->send();
     }
     
}
?>