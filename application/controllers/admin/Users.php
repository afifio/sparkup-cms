<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	function __construct(){
		parent::__construct();

	}

	public function index(){
		//check login
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		// get user list
		$data['users'] = $this->User_model->get_list();

		// load template
		$this->template->load('admin', 'default', 'users/index', $data);
	}

	public function add(){
		//check login
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		// field rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[7]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]|min_length[5]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]|min_length[5]');

		if ($this->form_validation->run() == false) {
			// load template
			$this->template->load('admin', 'default', 'users/add');
		} else {
			//user data
			$data = array(
				'first_name'		=> $this->input->post('first_name'),
				'last_name'			=> $this->input->post('last_name'),
				'email'				=> $this->input->post('email'),
				'username'			=> $this->input->post('username'),
				'password'			=> md5($this->input->post('password'))
			);

			// insert user
			$this->User_model->add($data);

			//activity array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'user',
				'action'			=> 'added',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'new user was added ('.$data['username'].')'
			);

			//insert activity
			$this->Activity_model->add($data);

			//set message
			$this->session->set_flashdata('success', 'User has been added');

			redirect('admin/users');
		}
	}

	public function edit($id){
		//check login
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		// field rules
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[7]');

		if ($this->form_validation->run() == false) {
			$data['item'] = $this->User_model->get($id);
			// load template
			$this->template->load('admin', 'default', 'users/edit', $data);
		} else {
			//user data
			$data = array(
				'first_name'		=> $this->input->post('first_name'),
				'last_name'			=> $this->input->post('last_name'),
				'email'				=> $this->input->post('email'),
				'username'			=> $this->input->post('username'),
			);

			// update user
			$this->User_model->update($id, $data);

			//activity array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'user',
				'action'			=> 'updated',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'A user was updated ('.$data['username'].')'
			);

			//insert activity
			$this->Activity_model->add($data);

			//set message
			$this->session->set_flashdata('success', 'User has been updated');

			redirect('admin/users');
		}
	}

	public function delete($id){
		//check login
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}

		// get username
		$username = $this->User_model->get($id)->username;

		//delete user
		$this->User_model->delete($id);

		//activity array
		$data = array(
			'resource_id'	=> $this->db->insert_id(),
			'type'				=> 'user',
			'action'			=> 'deleted',
			'user_id'			=> $this->session->userdata('user_id'),
			'message'			=> 'A user was deleted ('.$username.')'
		);

		//insert activity
		$this->Activity_model->add($data);

		//set message
		$this->session->set_flashdata('success', 'User has been deleted');

		redirect('admin/users');

	}

	public function login(){
		// field rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');

		if ($this->form_validation->run() == false) {
			// load template
			$this->template->load('admin', 'login', 'users/login');
		} else {
			// get post data
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$enc_password = md5($password);

			$user_id = $this->User_model->login($username, $enc_password);

			if ($user_id) {
				$user_data = array(
					'user_id'		=> $user_id,
					'username'	=> $username,
					'logged_in'	=> true
				);

				//set session data
				$this->session->set_userdata($user_data);

				//set message
				$this->session->set_flashdata('success', 'You are logged in');

				redirect('admin');
			} else {
				//set error
				$this->session->set_flashdata('error', 'Invalid login');

				redirect('admin/users/login');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		$this->session->sess_destroy();

		// message
		$this->session->set_flashdata('success', 'you are logged out');

		redirect('admin/users/login');
	}
}
