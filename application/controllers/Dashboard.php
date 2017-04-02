<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('course_model');

	}


	public function index(){

		$this->data['courses'] = $this->course_model->getEnrolledCourses($this->session->userdata('user_id')) ;

		$this->load->view('header');
		$this->load->view('dashboard', $this->data);
	}
}
