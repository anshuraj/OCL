<?php 
class Account_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    
    public function login($data){

        $query = $this->db->get_where('users', $data);
        if($query->num_rows()>0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function signup($data){

        $query = $this->db->insert('users', $data);
        
        if($this->db->insert_id()){
            return TRUE;
        }
        return FALSE;
        
    }
}