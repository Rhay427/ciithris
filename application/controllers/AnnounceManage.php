<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnounceManage extends CI_Controller{
    public function __construct()
	{
	parent::__construct();
	$this->load->database();
	$this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('Announce_model');
    $this->load->library('session');
	}
    public function homeAnnouncements(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'homeAnnouncements';
            if(!file_exists(APPPATH.'views/pages/announcements/'.$page.'.php')){
                show_404();
            }
            $this->load->view('templates/header_temp');
            $announcements = new Announce_model;
            $data['announcements'] = $announcements->getAnnouncements();
            $data['c'] = $announcements->getAnnounceCount();
            $this->load->view('pages/announcements/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function insertannounce(){
        if($this->input->is_ajax_request()){

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('description','Description','required');
            if(!$this->form_validation->run()){
                $data = array(
                    'response' => 'validation',
                    'message' => validation_errors(),
                    'title_error' => form_error('title'),
                    'description_error' => form_error('description'),
                );
            }else{
                $ajax_data = $this->input->post();
                $ajax_data['title'] = $this->input->post('title');
                $ajax_data['description'] = $this->input->post('description');
                $ajax_data['author'] = $this->session->username;
                $ajax_data['state'] = '1';

                $model = new Announce_model;
                if($model->insertAnnounce($ajax_data)){
                    $data = array('response' => 'success', 'message' => 'Announcement added successfully!');
                }else{
                    $data = array('response' => 'error', 'message' => 'Error in adding data');
                }
            }
        }else{
            echo "No direct script access allowed";
        }
        echo json_encode($data);
    }
    public function searchAnnounce(){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'homeAnnouncements';
            if(!file_exists(APPPATH.'views/pages/announcements/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $announcements = new Announce_model;
            $data['announcements'] = $announcements->getAnnounceSearch();
            $data['c'] = $announcements->getAnnounceCount();
            $this->load->view('pages/announcements/'.$page,$data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function viewAnnounce($id){
        if(!$this->session->logged_in){
            redirect(base_url());
        }else{
            $page = 'viewAnnounce';
            if(!file_exists(APPPATH.'views/pages/announcements/'.$page.'.php')){
                show_404();
            }
            $this->session->set_flashdata('neutral');
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Announce_model->getdataAnnounce($id);
            $this->load->view('pages/announcements/'.$page, $data);
            $this->load->view('templates/footer_temp');
            
        }
    }
    public function editAnnounce($id){
        $this->session->set_flashdata('neutral');
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('description','Description','required');
        if($this->form_validation->run() == false){
            $page = 'viewAnnounce';
            $this->load->view('templates/header_temp');
            $data['row'] = $this->Announce_model->getdataAnnounce($id);
            $this->load->view('pages/announcements/'.$page, $data);
            $this->load->view('templates/footer_temp');
        }else{
            $this->Announce_model->editAnnounce($id);
            $this->session->set_flashdata('edit_success','Announcement successfully edited!');
            redirect('homeAnnouncements');
        }
    }
    public function deleteAnnounce($id){
        $this->Announce_model->deleteAnnounce($id);
        $this->session->set_flashdata('delete_success','Announcement successfully deleted!');
        redirect('homeAnnouncements');
    }
    public function goBackAnnouce(){
        redirect('homeAnnouncements');
    }
}
?>