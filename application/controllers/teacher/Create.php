<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json'); 
            
		$this->load->model('course_model');

	}

	public function index(){

		$this->data['custom_css'] = array();

		$this->load->view('header', $this->data);
		$this->load->view('teacher/create');
	}

	public function createCourse(){

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_array()
                ]));
                return;
        }

		$name = $this->input->post('name');
		$description = $this->input->post('description');
		$teacher_id = $this->session->userdata('user_id');

		$data = ['name'=> $name, 'teacher_id'=>$teacher_id, 'description'=> $description];

		$res = $this->course_model->createCourse($data);

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
