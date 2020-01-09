<?php
class Reservation_model extends CI_Model {

    public function get_places(){
        $this->db->select('place_id,place_name');
        $this->db->where('place_active',1);
        $query = $this->db->get('places');
        return $query->result();
    }

    public function save_reservation($data){
        $this->db->set($data['res_data']);

      if($this->db->insert('reservation',$data['res_data'])==TRUE){  
                return TRUE;
        }else{
                return FALSE;
        } 
    }
    

}