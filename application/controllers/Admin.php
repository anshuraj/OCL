<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{

		$this->data['custom_css'] = array();

		if($this->session->userdata('user_id')){

			$this->load->view('header', $this->data);
			$this->load->view('admin', $this->data);
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}

	public function createTeacherAccount(){
		$this->load->model('account_model');

        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('user_type', 'user_type', 'required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_array()
                ]));
                return;
        }

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$pass = md5($this->input->post('password'));
		$user_type = $this->input->post('user_type');

		$data = ['name'=> $name, 'email'=> $email, 'password'=> $pass, 'user_type'=> $user_type];

		$res = $this->account_model->signup($data);

		if($res == TRUE){
			$this->session->set_userdata($data);
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Successfull'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Error saving data'
		        ]));
		    }

	}
}
