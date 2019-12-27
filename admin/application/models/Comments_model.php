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


}