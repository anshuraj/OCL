<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('teacher_model');

		$this->data['courses'] = $this->teacher_model->getCourses($this->session->userdata('user_id'));

		$this->load->view('header');
		$this->load->view('teacher/dashboard', $this->data);
	}
}
