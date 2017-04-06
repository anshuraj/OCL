<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index($id=Null){
		
		$this->load->model('classroom_model');
		$this->load->model('course_model');

		$this->data['custom_css'] = array();
		$this->data['data'] = $this->course_model->getCourseData($id);
		$this->data['lesson'] = $this->classroom_model->getLesson($id);
		$this->data['user_id'] = $this->session->userdata('user_id');

		$this->data['check'] =  $this->course_model->checkEnrollment(array('course_id'=> $id, 'student_id'=> $this->session->userdata('user_id'))) ;
			
		$this->load->view('header', $this->data);
		$this->load->view('Course', $this->data);
	}

	public function enroll(){

		$this->load->model('course_model');

		$course_id = $this->input->post('course_id');
		$user_id = $this->session->userdata('user_id');
		
		$data = array('course_id'=> $course_id, 'student_id'=> $user_id);

		$res = $this->course_model->enroll($data);

		if($res == TRUE){
			$this->session->set_userdata($data);
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Successfull'
		        ]));
		} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Error saving data'
		        ]));
	    }
	}
}
