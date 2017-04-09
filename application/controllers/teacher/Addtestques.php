<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addtestques extends CI_Controller {

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
		
			$this->data['questions'] = $this->test_model->getQuestions($id);

			$this->load->view('header', $this->data);
			$this->load->view('teacher/Addtestques');
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}

	public function add(){

        $this->form_validation->set_rules('test_id', 'test_id', 'trim|required');
		$this->form_validation->set_rules('question', 'question', 'trim|required');
        $this->form_validation->set_rules('correct', 'correct', 'trim|required');
        $this->form_validation->set_rules('ans1', 'ans1', 'trim|required');
        $this->form_validation->set_rules('ans2', 'ans2', 'trim|required');
        $this->form_validation->set_rules('ans3', 'ans3', 'trim|required');
        $this->form_validation->set_rules('ans4', 'ans4', 'trim|required');


        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_string()
                ]));
                return;
        }

		$test_id = $this->input->post('test_id');
		$question = $this->input->post('question');
		$correct = $this->input->post('correct');
		$ans1 = $this->input->post('ans1');
		$ans2 = $this->input->post('ans2');
		$ans3 = $this->input->post('ans3');
		$ans4 = $this->input->post('ans4');


		$questionData = ['test_id'=> $test_id, 'question'=> $question];

		$res = $this->test_model->addQuestion($questionData);

		if($res == TRUE){
			$question_id = $res;

			$answersData = array(array('test_id'=> $test_id, 'question_id'=> $question_id, 'content'=>$ans1), array('test_id'=> $test_id, 'question_id'=> $question_id, 'content'=>$ans2), array('test_id'=> $test_id, 'question_id'=> $question_id, 'content'=>$ans3), array('test_id'=> $test_id, 'question_id'=> $question_id, 'content'=>$ans4));

			$res2 = $this->test_model->addAnswers($answersData);

			$correctAnsData = ['test_id'=> $test_id, 'question_id'=> $question_id, 'answer_id'=>($res2+($correct-1))];

			$res3 = $this->test_model->addCorrectAnswer($correctAnsData);

			if($res2 == TRUE && $res3 == TRUE){
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

		} else {
			$this->output->set_output(json_encode([
	            'status'=> 0,
	            'message'=> 'Error saving data'
	        ]));
	    }
	}
}