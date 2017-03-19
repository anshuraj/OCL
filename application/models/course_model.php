<?php 
class Course_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function createCourse($data){

        $query = $this->db->insert('courses', $data);
        
        if($this->db->insert_id()){
            return $this->db->insert_id();
        }
        return FALSE;
        
    }

    public function getCourses(){

        $query = $this->db->get('courses');
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }

    }
    
}