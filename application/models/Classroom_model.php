<?php 
class Classroom_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function getLesson($cid){

        $query = $this->db->get_where('lesson', array('course_id'=> $cid));

        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}