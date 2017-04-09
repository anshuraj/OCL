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

    public function getQuestions($tid){

        $query = $this->db->get_where('test_questions', array('test_id'=> $tid));
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getAnswers($tid){

        $query = $this->db->get_where('test_answers', array('test_id'=> $tid));
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getCorrectAnswers($id){

        $sql = 'SELECT test_answers.id, test_answers.question_id, test_answers.content from test_answers join test_correct_answer on test_correct_answer.answer_id = test_answers.id WHERE test_answers.test_id = ?';

        $query = $this->db->query($sql, $id);
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return FALSE;
    }
}