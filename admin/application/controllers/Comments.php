<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

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
        
    }
    
    public function add_comment($id){
        $user = $this->ion_auth->user()->row();

        $data['comments_data'] = array(
            'message_id' => $id,
            'user_id' => $user->id,
            'comment' => $this->input->post('comment'),
            'comment_date' => $this->input->post('date'),
            'comment_time' => $this->input->post('time')    
        );

        $comment_save = $this->comments_model->save_comment($data);
        if($comment_save){
            $this->session->set_flashdata('comment', "Comment added!");
			redirect('contact/message/'.$id);
        }else{
            $this->session->set_flashdata('comment', "Failed!");
			redirect('contact/message/'.$id);
        }

    }

    public function delete($id){
        $delete_function = $this->comments_model->delete_comment($id);
        if($delete_function){
            $this->session->set_flashdata('comment', "Comment deleted!");
			redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('comment', "Failed!");
			redirect($_SERVER['HTTP_REFERER']);
        }

    }    
}