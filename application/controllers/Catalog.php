<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('course_model');

		$this->data['courses'] = $this->course_model->getCourses();

		$this->load->view('header');
		$this->load->view('Catalog', $this->data);
	}
}
