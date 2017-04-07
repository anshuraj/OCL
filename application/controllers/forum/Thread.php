<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json'); 
        $this->load->helper('date');
        
		$this->load->model('forum_model');

	}

	public function index($id=Null){

		$this->data['custom_css'] = array();

		if($this->session->userdata('user_id')){

			$this->data['thread'] = $this->forum_model->getThread($id);
			$this->data['replies'] = $this->forum_model->getThreadreplies($id);
			$this->data['id'] = $id;
 // print_r($this->data);
			$this->load->view('header', $this->data);
			$this->load->view('forum/thread', $this->data);
		} else {
			header('Refresh:3;'. site_url('account'));
			echo 'Please Login to continue. Redirecting...';
			exit();
		}
	}

	public function reply(){
		ini_set('date.timezone',"Asia/Calcutta");
		$this->form_validation->set_rules('thread_id', 'thread_id', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

        if($this->form_validation->run()===FALSE){
                $this->output->set_output(json_encode([
                    'status'=>0,
                    'message'=> $this->form_validation->error_array()
                ]));
                return;
        }

		$thread_id = $this->input->post('thread_id');
		$message = $this->input->post('message');
		$user_id = $this->session->userdata('user_id');

		$data = ['thread_id'=> $thread_id, 'user_id'=>$user_id, 'message'=> $message, 'time'=> unix_to_human(now(), TRUE, 'us')];

		$res = $this->forum_model->reply($data);

		if($res == TRUE){
			$this->session->set_userdata($data);
				$this->output->set_output(json_encode([
		            'status'=>1,
		            'message'=> 'success',
		            'data'=> $res
		        ]));
			} else {
				$this->output->set_output(json_encode([
		            'status'=> 0,
		            'message'=> 'Error saving data'
		        ]));
		    }

	}
}