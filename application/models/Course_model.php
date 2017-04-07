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

    public function createLesson($data){

        $query = $this->db->insert('lesson', $data);
        
        if($this->db->insert_id()){

            return $this->db->get_where('lesson', array('id'=>$this->db->insert_id()))->result_array();
        }
        return FALSE;
    }
    
    public function enroll($data){

        $query = $this->db->insert('enrollment', $data);
        
        if($this->db->insert_id()){

            return TRUE;
        }
        return FALSE;
    }

    public function checkEnrollment($data){

        $query = $this->db->get_where('enrollment', $data);

        if($query->num_rows()>0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getEnrolledCourses($id){

        $sql = 'SELECT courses.id, courses.description, courses.name from courses JOIN enrollment on courses.id = enrollment.course_id where enrollment.student_id = ?';

        $query = $this->db->query($sql, $id);
        
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }

    }
}