<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model('course_model');

		$this->data['custom_css'] = array();
		$this->data['courses'] = $this->course_model->getCourses();

		$this->load->view('header', $this->data);
		$this->load->view('Catalog', $this->data);
	}
}
