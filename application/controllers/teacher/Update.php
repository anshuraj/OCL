<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        // $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        // $this->output->set_header("Pragma: no-cache");   
        $this->output->set_content_type('application_json');     
        $this->load->database();
       
		$this->load->model('course_model');

	}

	public function index($id=Null)
	{
		$this->load->helper('url');

		$this->data['course_id'] = $id;	
		$this->load->view('header');
		$this->load->view('teacher/update', $this->data);
	}

	public function upload(){
		$this->form_validation->set_rules('l_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('desc', 'Description', 'trim|required');
		$this->form_validation->set_rules('course_id', 'Course id', 'trim|required');

		if($this->form_validation->run()===FALSE){
            $response = ['status'=>0, 'message'=> $this->form_validation->error_array() ];
			$this->output->set_output(json_encode($response));

            return;
        }

		//print_r($_FILES);
		//print_r($_POST);
		//print_r($this->input->post());
		$name =  $this->input->post('l_name');
		$desc =  $this->input->post('desc');
		$course_id = $this->input->post('course_id');

		if ( ! empty($_FILES))
		{
			$config['upload_path'] = "./uploads";
			$config['allowed_types'] = 'gif|jpg|png|mp4|ogv|zip';

			$this->load->library('upload', $config);
			if (! $this->upload->do_upload("file")) {

				$response = ['status'=>0, 'message'=> 'File cannot be uploaded']; 
			} else {
				$file_name = $this->upload->data('file_name');
				$data = ['name'=> $name, 'course_id'=>$course_id, 'description'=> $desc, 'content'=> $file_name];

				$res = $this->course_model->createLesson($data);

				if($res == TRUE){
						$response = ['status'=>1, 'message'=> 'success', 'result'=> $res]; 

					} else {
						$response = ['status'=> 0, 'message'=> 'Error saving data'];
				    }
			}
		}
		else{
			$response = ['status'=> 0, 'message'=> 'File not found' ];
		}

		$this->output->set_output(json_encode($response));
		
	}
}
