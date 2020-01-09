<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
            redirect('auth/login');
        }
        $this->load->model('reservation_model');
        $this->load->model('comments_model');
        $this->load->library('typography');
        
    }

    public function index()
	{ 	
        $data['reservation_data'] =$this->reservation_model->get_data(); 
        //var_dump($data['reservation_data']);
        $this->load->view('reservation',$data);
    }

    public function message($id){

        $data['reservation_data'] =$this->reservation_model->get_reservation_message($id);
        $data['message_comments'] =$this->comments_model->get_comment($id,'reservation');
    
       $this->load->view('reservation-message',$data);
       if($data['reservation_data'][0]['res_auto_status'] == 'NEW'){
        $this->reservation_model->set_auto_status($id);
       }
    }

    public function change_status($id){

        $data['status_data'] = array(
            'res_status' => $this->input->post('status'),
            'res_id' => $id
        );
        $add_function = $this->reservation_model->change_status($data);
        if($add_function){
            $this->session->set_flashdata('comment', "Status Changed Succefully!");
			redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete_reservation($id){
        $delete_function = $this->reservation_model->delete_reservation($id);
        if($delete_function){
            redirect('reservation');
        }
    }


}    