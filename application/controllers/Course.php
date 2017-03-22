<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

	public function index($id=Null)
	{
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('course_model');

		$this->data['data'] = $this->course_model->getCourseData($id);

		$this->load->view('header');
		$this->load->view('Course', $this->data);
	}
}
