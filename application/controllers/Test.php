<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){

		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   

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
}