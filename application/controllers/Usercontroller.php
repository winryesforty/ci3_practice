<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usercontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		
	}
	public function index()
	{
		$data['users'] = $this->User_model->getAllUser();
		$this->load->view('template/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('template/footer');
	}
	public function dashboard2()
	{
		$data = "Hey";
		$this->load->view('template/header');
		$this->load->view('dashboard/dashboard2');
		$this->load->view('template/footer');

		// force_download("dashboard2", $data);
	}
	public function dashboard3()
	{
		$this->load->view('template/header');
		$this->load->view('dashboard/dashboard3');
		$this->load->view('template/footer');
	}
	public function dashboard4()
	{
		$this->load->view('template/header');
		$this->load->view('dashboard/dashboard4');
		$this->load->view('template/footer');
	}

	public function dashboard5()
	{
		$data['content'] = '';
		$this->load->view('template/header');
		$this->load->view('dashboard/dashboard5');
		$this->load->view('template/footer');
	}

	public function updateuser()
	{
		// $query = $this->User_model->update_user();//
		if($this->User_model->update_user())
		{
			$this->session->set_flashdata('message', 'User successfully updated.');
			redirect('');
		}
	}
	
	public function user_delete($id=NULL)
	{
		if($this->User_model->delete_user($id))
		{
			$this->session->set_flashdata('Message', "User Successfully Deleted");
			redirect('');
		}
	}
	public function newUser()
	{
		$config['upload_path']          = './assets/images/';
		$config['allowed_types']        = 'gif|jpg|png|jfif';
		$config['max_size']             = 19000;
		$config['max_width']            = 5024;
		$config['max_height']           = 5768;
		$config['file_name']			= $this->input->post('last_name').$this->input->post('first_name');

		// $this->load->library('upload', $config);
		// echo $$config['upload_path'];
		$this->upload->initialize($config);
		//$file = $this->upload->data();
		// var_dump($file);
		// exit;
		
		if ( ! $this->upload->do_upload('user_image') )
		{
				$error = array('error' => $this->upload->display_errors());

				echo $error['error']. "-".$config['upload_path'];
				exit;
				$this->load->view('upload_form', $error);
		}
		else
		{
			$imageUploaded = $this->upload->data();
			$array_data = array(
				'first_name'	=>	$this->input->post('first_name'), 
				'middle_name'	=>	$this->input->post('middle_name'),
				'last_name'		=>	$this->input->post('last_name'),
				'street_address'=>	$this->input->post('street_address'),
				'city'			=>	$this->input->post('city'),
				'zip_code'		=>	$this->input->post('zip_code'),
				'province'		=>	$this->input->post('province'),
				'image_name'	=>	$imageUploaded['file_name'],
				'image_path'	=>	$config['upload_path']
			);
			
				$query = $this->db->insert('user', $array_data);
				if($query)
				{
					$data = array(
						'upload_data'	=> $this->upload->data(),
						'message'		=> "User successfully saved."
					);
					$this->session->set_flashdata('message', 'User successfully saved.');
					redirect('dashboard2');
				}
		}
		
	}



}
