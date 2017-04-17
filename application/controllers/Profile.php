<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {

		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     
		$this->load->model('profile_model');
        $this->load->model('course_model');

	}

	public function index()	{
		
		$this->data['custom_css'] = array();
		$this->data['profile'] = $this->profile_model->getUserData($this->session->userdata('user_id'));
		$this->data['courses'] = $this->course_model->getEnrolledCourses($this->session->userdata('user_id')) ;

		$this->load->view('header', $this->data);
		$this->load->view('profile', $this->data);
	}

	public function oldPassCheck($old){

		$res = $this->profile_model->getUserData($this->session->userdata('user_id'));
		if($res['password'] == $old){

			$this->form_validation->set_message('oldPassCheck', 'Old password not match');
			return TRUE;
		}
		return FALSE;
	}

	public function changePassword() {

		$this->form_validation->set_rules('current', 'Current password', 'trim|required|callback_oldPassCheck');
        $this->form_validation->set_rules('new', 'New password', 'trim|required|matches[verify]');
        $this->form_validation->set_rules('verify', 'Verify password', 'trim|required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_string()
                ]));
                return;
        }

		$new = $this->input->post('new');

		$data = ['password'=> $new];

		$res = $this->profile_model->changePassword($data, $this->session->userdata('user_id'));

		if($res == TRUE){
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Success'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Failed'
		        ]));
		    }
	}

	public function removeEnrollment($cid){

		$sid = $this->session->userdata('user_id');

		$res = $this->profile_model->removeEnrollment($cid, $sid);

		if($res == TRUE){
			$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'Success'
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Failed'
		        ]));
		    }
	}
}
