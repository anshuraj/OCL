<?php 
class Teacher_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    
    public function getCourses($tid){

        $query = $this->db->get_where('courses', array('teacher_id'=> $tid));

        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}