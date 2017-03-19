<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function index($id=Null)
	{
		$this->load->helper('url');

		$this->load->view('header');
		$this->load->view('teacher/update');
	}
}
