<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
        }
        $this->load->model('contact_model');
        $this->load->model('comments_model');
        $this->load->library('typography');
        
	}

    public function index()
	{ 	
        $data['contact_data'] =$this->contact_model->get_data(); 
        //var_dump($data['contact_data']);
        $this->load->view('contact',$data);
    }
    
    public function message($id){

        $data['contact_message'] =$this->contact_model->get_contact_message($id);
        $data['message_comments'] =$this->comments_model->get_comment($id);
    
       $this->load->view('contact-message',$data);
       if($data['contact_message'][0]['co_status'] == 'NEW'){
        $this->contact_model->set_status($id);
       }
    }

    public function delete_message($id){
        $delete_function = $this->contact_model->delete_message($id);
        if($delete_function){
            redirect('contact');
        }
    }

    public function add_reminder($id){
        
        $data['reminder_data'] = array(
            'co_reminder' => $this->input->post('reminder'),
            'contact_id' => $id
        );
        $add_function = $this->contact_model->add_reminder($data);
        if($add_function){
            $this->session->set_flashdata('comment', "Status Changed Succefully!");
			redirect($_SERVER['HTTP_REFERER']);
        }
    }
}