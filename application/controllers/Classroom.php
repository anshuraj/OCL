<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends CI_Controller {

	public function __construct(){

		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   

		$this->load->model('classroom_model');
		$this->load->model('course_model');

	}

	public function index($cid=Null, $lid=0){

		$this->data['custom_css'] = array();
		
		$this->data['lesson'] = $this->classroom_model->getLesson($cid);
		$this->data['course'] = $this->course_model->getCourseData($cid);
		$this->data['lid'] = $lid;
		
		if($this->session->userdata('user_id')){
			$this->load->view('header', $this->data);
			$this->load->view('classroom', $this->data);
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}
}
