<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct(){

		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     
        $this->load->helper('date');
		$this->load->model('forum_model');

	}

	public function index(){

		$this->data['custom_css'] = array();
		
		$this->load->view('header', $this->data);
		$this->load->view('forum/create');
	}

	public function createThread(){

		ini_set('date.timezone',"Asia/Calcutta");
		$this->form_validation->set_rules('topic', 'topic', 'trim|required');
        $this->form_validation->set_rules('content', 'content', 'trim|required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_array()
                ]));
                return;
        }

		$topic = $this->input->post('topic');
		$content = $this->input->post('content');
		$user_id = $this->session->userdata('user_id');

		$data = ['topic'=> $topic, 'user_id'=>$user_id, 'content'=> $content, 'time'=> unix_to_human(now(), TRUE, 'us')];

		$res = $this->forum_model->createThread($data);

		if($res == TRUE){
			$this->session->set_userdata($data);
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'success',
		            'course_id'=> $res
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Error saving data'
		        ]));
		    }

	}
}