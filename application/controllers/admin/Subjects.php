<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Admin_Controller {

	function __construct(){
		parent::__construct();

		//check login
		if (!$this->session->userdata('logged_in')) {
			redirect('admin/login');
		}
	}

	public function index(){
		$data['subjects'] = $this->Subject_model->get_list();

		// load template
		$this->template->load('admin', 'default', 'subjects/index', $data);
	}

	public function add(){
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == false) {
			// load template
			$this->template->load('admin', 'default', 'subjects/add');
		} else {
			//create post array
			$data = array(
				'name'	=> $this->input->post('name')
			);

			//insert subject
			$this->Subject_model->add($data);

			//activity array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'subject',
				'action'			=> 'added',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'new subject was added ('.$data['name'].')'
			);

			//insert activity
			$this->Activity_model->add($data);

			//set message
			$this->session->set_flashdata('success', 'Subject has been added');

			redirect('admin/subjects');
		}
	}

	public function edit($id){
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == false) {
			//get current subject
			$data['item'] = $this->Subject_model->get($id);

			// load template
			$this->template->load('admin', 'default', 'subjects/edit', $data);
		} else {
			$old_name = $this->Subject_model->get($id)->name;
			$new_name = $this->input->name;

			//create post array
			$data = array(
				'name'	=> $this->input->post('name')
			);

			//update subject
			$this->Subject_model->update($id, $data);

			//activity array
			$data = array(
				'resource_id'	=> $this->db->insert_id(),
				'type'				=> 'subject',
				'action'			=> 'updated',
				'user_id'			=> $this->session->userdata('user_id'),
				'message'			=> 'new subject ('.$old_name.') was renamed to('.$new_name.')'
			);

			//insert activity
			$this->Activity_model->add($data);

			//set message
			$this->session->set_flashdata('success', 'Subject has been renamed');

			redirect('admin/subjects');
		}
	}

	public function delete($id){
    $name = $this->Subject_model->get($id)->name;

    //delete subject
    $this->Subject_model->delete($id);

		//activity array
		$data = array(
			'resource_id'	=> $this->db->insert_id(),
			'type'				=> 'subject',
			'action'			=> 'deleted',
			'user_id'			=> $this->session->userdata('user_id'),
			'message'			=> 'A subject was deleted'
		);

		//insert activity
		$this->Activity_model->add($data);

		//set message
		$this->session->set_flashdata('success', 'Subject has been deleted');

		redirect('admin/subjects');
  }
}
