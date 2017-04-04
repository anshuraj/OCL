<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     
		$this->load->model('account_model');

	}


	public function index(){

		$this->data['custom_css'] = array('account_style.css');
		
		$this->load->view('header', $this->data);
		$this->load->view('account');
	}

	public function logout() {

		if($this->session->userdata('user_id')){

			$this->session->sess_destroy();
			redirect(site_url(), 'refresh');
		}
	}

	public function login(){

		$this->output->set_content_type('application_json');

		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		$data = ['email'=> $email, 'password'=> $pass];

		$res = $this->account_model->login($data);

		if($res == TRUE){

				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'loggedin',
		            'user_type'=> $res['user_type']
		        ]));
		        $session_data = array( 'user_id'=> $res['user_id'], 'email'=> $email, 'user_type'=> $res['user_type'], 'name'=> $res['name'] );
				$this->session->set_userdata($session_data);

			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'invalid username or password'
		        ]));
		    }
	}	

	public function signup(){

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
		$pass = $this->input->post('password');
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
