<?php 
class Forum_model extends CI_Model {
    
    public  function __construct() {

        parent::__construct();
    }
    
    public function createThread($data){

        $query = $this->db->insert('threads', $data);
        
        if($this->db->insert_id()){
            return $this->db->insert_id();
        }
        return FALSE;
        
    }

    public function getThreads(){

        $sql = 'SELECT threads.id, users.name, threads.topic, threads.content, threads.time from threads join users on threads.user_id = users.user_id' ;

        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getThread($id){

        $sql = 'SELECT threads.id, users.name as user_name, threads.topic, threads.content, threads.time from threads join users on threads.user_id = users.user_id where threads.id = ?';

        $query = $this->db->query($sql, $id);
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function getThreadReplies($id){

        $sql = 'SELECT thread_replies.id, users.name as user_name, thread_replies.message, thread_replies.time from thread_replies join users on thread_replies.user_id = users.user_id where thread_id = ?';

        $query = $this->db->query($sql, $id);
        if($query->num_rows()>0){
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function reply($data){

        $sql = 'SELECT thread_replies.id, users.name as user_name, thread_replies.message, thread_replies.time from thread_replies join users on thread_replies.user_id = users.user_id where thread_replies.id = ?';

        $query = $this->db->insert('thread_replies', $data);
        
        if($this->db->insert_id()){
            return $this->db->query($sql, $this->db->insert_id())->result_array();
        }
        return FALSE;
    }
}