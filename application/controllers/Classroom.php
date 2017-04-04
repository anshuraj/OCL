<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends CI_Controller {

	public function index($cid=Null, $lid=Null){

		$this->data['custom_css'] = array();
		
		$this->load->view('header', $this->data);
		$this->load->view('Classroom');
	}
}
