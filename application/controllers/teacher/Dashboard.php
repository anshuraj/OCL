<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('teacher_model');

		$this->data['courses'] = $this->teacher_model->getCourses($this->session->userdata('user_id'));
		$this->data['custom_css'] = array();

		if($this->session->userdata('user_id')){

			$this->load->view('header', $this->data);
			$this->load->view('teacher/dashboard', $this->data);
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}
}
