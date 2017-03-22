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

    public function getCourseData($id){

        $sql = "SELECT id AS course_id, courses.name AS course_name, users.name AS teacher_name, description FROM courses JOIN users ON courses.teacher_id = users.user_id WHERE id = ?" ;

        $query = $this->db->query($sql, $id);
        
        if($query->num_rows()>0){
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    
}