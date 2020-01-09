<?php
class Reservation_model extends CI_Model {


    public function get_data(){
        $this->db->where('res_is_deleted !=', 1);
        $this->db->order_by('res_id','DESC');
        $query = $this->db->get('reservation');
        $result = $query ->result_array();
        
       foreach($result as $value){
            //$user_name = $this->ion_auth->user($value->user_id)->row(); 
            $comments_data = $this->comments_model->get_comment_count($value['res_id'],'reservation');
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

    public function get_reservation_message($id){
        $query = $this->db->get_where('reservation', array('res_id' => $id));
        $result = $query->result_array();

        
        $places =  $result[0]['res_places'];
        $place_arr = explode(',',$places);
        $place_name_arr = array();
        if($result[0]['res_tour_package_id']== 0){
            foreach($place_arr as $val){
                $query = $this->db->get_where('places',array('place_id'=>$val));
                $place_data_arr = $query->result_array();
                //echo $val;
                //var_dump($place_name).'<br><br>';
                //$result[0]['place_name'] = $place_name[0]['place_name'];
                $place_name = $place_data_arr[0]['place_name'];
                //echo $place_name;
                array_push($place_name_arr,$place_name);
                //$result[0]['place_name'] -> $place_name  ;  
            };
            //var_dump($place_name_arr);
            $result[0]['place_name'] = $place_name_arr;
        }

        return $result;
    }


    public function delete_reservation($id){
        $this->db->where('res_id', $id);
        $delete = $this->db->update('reservation', array('res_is_deleted'=>1));

        if($delete){
            return true;
        }else{
            return false;
        }

    }

    public function set_auto_status($id){
        $this->db->where('res_id', $id);
        $this->db->update('reservation', array('res_auto_status'=> ''));
    }

    public function change_status($data){
        $this->db->where('res_id', $data['status_data']['res_id']);
        $function = $this->db->update('reservation', array('res_status'=> $data['status_data']['res_status']));
        if($function){
            return true;
        }
    }
}