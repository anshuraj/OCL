<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()	{
		
		$this->data['custom_css'] = array('style.css');

		$this->load->view('header', $this->data);
		$this->load->view('homepage');
	}
}
