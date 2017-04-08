<?php 
class Profile_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function getUserData($id){

        $query = $this->db->get_where('users', array('user_id'=> $id));
        if($query->num_rows()>0){
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function changePassword($data, $id){

        $this->db->where('user_id', $id);
        $query = $this->db->update('users', $data);
        if($this->db->affected_rows()>0)
            return TRUE;
        return FALSE;
        
    }
}