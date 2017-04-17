<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addassignques extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json'); 
            
		$this->load->model('test_model');

	}

	public function index($id=Null){

		$this->data['custom_css'] = array();
		$this->data['id'] = $id;

		if($this->session->userdata('user_id')){
		
			$this->data['questions'] = $this->test_model->getAssignQuestions($id);

			$this->load->view('header', $this->data);
			$this->load->view('teacher/Addassignques');
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}

	public function add(){

        $this->form_validation->set_rules('assign_id', 'assign_id', 'trim|required');
		$this->form_validation->set_rules('question', 'question', 'trim|required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_string()
                ]));
                return;
        }

		$assign_id = $this->input->post('assign_id');
		$question = $this->input->post('question');
		
		$questionData = ['assign_id'=> $assign_id, 'question'=> $question];

		$res = $this->test_model->addAssignQuestion($questionData);

		if($res == TRUE){
			$this->output->set_output(json_encode([
	            'status'=> 1,
	            'message'=> 'Success'
	        ]));

		} else {
			$this->output->set_output(json_encode([
	            'status'=> 0,
	            'message'=> 'Error saving data'
	        ]));
    	}

	}
}