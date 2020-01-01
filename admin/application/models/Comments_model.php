<?php
class Comments_model extends CI_Model {


    public function save_comment($data){
        $comment_save = $this->db->insert('comments', $data['comments_data']);
        if($comment_save){
            return true;
        }else{
            return false;
        }
    }

    public function get_comment($id){
        $this->db->where('comment_isdeleted !=', 1);
        $this->db->order_by('comment_id','DESC');
        $query = $this->db->get_where('comments', array('message_id' => $id));
        
        $result = $query->result();
        foreach($result as $value){
            $user_name = $this->ion_auth->user($value->user_id)->row();
            $value->username = $user_name->username;
        } 
        return $result;
    }

    public function delete_comment($id){
        $this->db->where('comment_id', $id);
        $delete = $this->db->update('comments', array('comment_isdeleted'=>1));

        if($delete){
            return true;
        }else{
            return false;
        }
    }

    public function get_comment_count($msg_id){
        $this->db->where('comment_isdeleted !=', 1);
        $this->db->where('message_id =', $msg_id);
        $query = $this->db->get('comments');
        return $query->result_array();
    }


}