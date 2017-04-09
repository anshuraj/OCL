<?php 
class Test_model extends CI_Model {
    
    public  function __construct() {
        parent::__construct();
    }
    
    public function addTest($data){

        $query = $this->db->insert('tests', $data);
        if($this->db->insert_id()){
            return $this->db->get_where('tests', array('id'=>$this->db->insert_id()))->result_array();
        }
        return FALSE;
    }

    public function getTests($id){

        $query = $this->db->get_where('tests', array('course_id'=> $id));
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }

    }

    public function addQuestion($data){

        $query = $this->db->insert('test_questions', $data);
        if($this->db->insert_id()){
            //return $this->db->get_where('tests', array('id'=>$this->db->insert_id()))->result_array();
            return $this->db->insert_id();
        }
        return FALSE;
    }

    public function addAnswers($data){

        $query = $this->db->insert_batch('test_answers', $data);
        if($this->db->insert_id()){
            //return $this->db->get_where('tests', array('id'=>$this->db->insert_id()))->result_array();
            return $this->db->insert_id();
        }
        return FALSE;
    }

    public function addCorrectAnswer($data){

        $query = $this->db->insert('test_correct_answer', $data);
        if($this->db->insert_id()){
            //return $this->db->get_where('tests', array('id'=>$this->db->insert_id()))->result_array();
            return $this->db->insert_id();
        }
        return FALSE;
    }

    public function getQuestions($id){

        $query = $this->db->get_where('test_questions', array('test_id'=> $id));
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
}