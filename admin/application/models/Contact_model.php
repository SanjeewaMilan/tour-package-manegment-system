<?php
class Contact_model extends CI_Model {


    public function get_data(){
        $this->db->where('co_isdeleted !=', 1);
        $this->db->order_by('contact_id','DESC');
        $query = $this->db->get('contact');
        $result = $query ->result_array();
        
        foreach($result as $value){
            //$user_name = $this->ion_auth->user($value->user_id)->row(); 
            $comments_data = $this->comments_model->get_comment_count($value['contact_id']);
            $comment_count = count($comments_data);
            $value['comment_count']=$comment_count;
            //array_push($value,$value['comment_count']=$comment_count);
            array_push($result,$value);
            array_shift($result);
            //print_r($value);
           // echo '</br></br>';            //echo $comment_count;
        }
        
        //print_r($value);
        //echo '</br></br>'; 
        //print_r($result);
        return $result;
    }

    public function get_contact_message($id){
        $query = $this->db->get_where('contact', array('contact_id' => $id));
        return $query->result_array();
    }

    public function delete_message($id){
        $this->db->where('contact_id', $id);
        $delete = $this->db->update('contact', array('co_isdeleted'=>1));

        if($delete){
            return true;
        }else{
            return false;
        }

    }

    public function set_status($id){
        $this->db->where('contact_id', $id);
        $this->db->update('contact', array('co_status'=> ''));
    }

    public function add_reminder($data){
        $this->db->where('contact_id', $data['reminder_data']['contact_id']);
        $function = $this->db->update('contact', array('co_reminder'=> $data['reminder_data']['co_reminder']));
        if($function){
            return true;
        }
    }
}