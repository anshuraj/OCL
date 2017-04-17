<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){

		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->load->helper('date');
		$this->load->model('test_model');
	}

	public function index($id=Null){

		$this->data['custom_css'] = array();
		
		$this->data['tests'] = $this->test_model->getTests($id);
		$this->data['questions'] = $this->test_model->getQuestions($id);
		$this->data['answers'] = $this->test_model->getAnswers($id);
		$this->data['correct'] = $this->test_model->getCorrectAnswers($id);
		
		if($this->session->userdata('user_id')){
			$this->load->view('header', $this->data);
			$this->load->view('test', $this->data);
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}

	public function saveTestScore(){

		ini_set('date.timezone',"Asia/Calcutta");

		$data = ['test_id'=> $this->input->post('test_id'), 'student_id'=> $this->session->userdata('user_id'), 'course_id'=> $this->input->post('course_id'), 'score'=> $this->input->post('score'), 'max_marks'=> $this->input->post('max_marks'), 'time'=> unix_to_human(now(), TRUE, 'us')];

		$res = $this->test_model->saveTestScore($data);

		if($res == TRUE){
			$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Success'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Failed'
		        ]));
		    }
	}
}