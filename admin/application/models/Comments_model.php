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

    public function get_comment($id,$type){
        $this->db->where('comment_isdeleted !=', 1);
        $this->db->order_by('comment_id','DESC');
        $query = $this->db->get_where('comments', array('message_id' => $id , 'comment_type' => $type));
        
        $result = $query->result();
        foreach($result as $value){
            $user_name = $this->ion_auth->user($value->user_id)->row();
            $edited_user_name = $this->ion_auth->user($value->comment_edit_user_id)->row();
            $value->edit_user = $edited_user_name->username;
            $value->username = $user_name->username;
        } 
        return $result;
    }

    public function delete_comment($data){
        //var_dump($data);
        //echo $data['comment_id'];
        $this->db->where('comment_id', $data['comment_id']);
        $delete = $this->db->update('comments', array('comment_isdeleted'=>1 , 'delete_date'=>$data['delete_date'] ,'delete_time'=>$data['delete_time'] ,'delete_user_id'=>$data['delete_user_id']));

        if($delete){
            return true;
        }else{
            return false;
        }
    }

    public function get_comment_count($msg_id,$type){
        $this->db->where('comment_isdeleted !=', 1);
        $this->db->where(array('message_id' =>$msg_id ,'comment_type' =>$type ));
        $query = $this->db->get('comments');
        return $query->result_array();
    }

    public function update_comment($data){
        $this->db->where('comment_id',$data['comment_id']);
       $fuction= $this->db->update('comments',$data);
       if($fuction){
           return true;
       }else{
        return false;
       }

    }


}