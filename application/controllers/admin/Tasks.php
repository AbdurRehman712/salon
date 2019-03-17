<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Tasks extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/task_model', 'task_model');
			$this->load->model('admin/assign_task_model', 'assign_task_model');
			$this->load->model('admin/user_model', 'user_model');
			$this->load->model('admin/appoinment_model', 'appoinment_model');
			$this->load->model('admin/product_model', 'product_model');
		}

		public function index(){
			$data['all_tasks'] =  $this->task_model->get_all_tasks();
			$data['view'] = 'admin/tasks/task_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
				$this->form_validation->set_rules('task_description', 'Task Description', 'trim|required');
				$this->form_validation->set_rules('task_price', 'Task Price', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/tasks/task_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'task_name' => $this->input->post('task_name'),
						'task_description' => $this->input->post('task_description'),
						'task_price' => $this->input->post('task_price'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->task_model->add_task($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/tasks'));
					}
				}
			}
			else{
				$data['view'] = 'admin/tasks/task_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
				$this->form_validation->set_rules('task_description', 'Task Description', 'trim|required');
				$this->form_validation->set_rules('task_price', 'Task Price', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['task'] = $this->task_model->get_task_by_id($id);
					$data['view'] = 'admin/tasks/task_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'task_name' => $this->input->post('task_name'),
						'task_description' => $this->input->post('task_description'),
						'task_price' => $this->input->post('task_price'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->task_model->edit_task($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/tasks'));
					}
				}
			}
			else{
				$data['task'] = $this->task_model->get_task_by_id($id);
				$data['view'] = 'admin/tasks/task_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('tasks', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/tasks'));
		}


		public function assign(){
			$data['all_assign_tasks'] =  $this->assign_task_model->get_all_assign_tasks();
			$data['view'] = 'admin/tasks/assign_task_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function assign_add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('task_id', 'Select Task', 'trim|required');
				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('appoinment_id', 'Select appoinment', 'trim|required');
				$this->form_validation->set_rules('task_date', 'Task Date', 'trim|required');
				$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_worker'] =  $this->user_model->get_all_worker();
					$data['all_appoinment'] =  $this->appoinment_model->get_all_appoinments();
					$data['product'] = $this->product_model->get_all_products();
					$data['task'] = $this->task_model->get_all_tasks();
					$data['view'] = 'admin/tasks/assign_task_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'task_id' => $this->input->post('task_id'),
						'worker_id' => $this->input->post('worker_id'),
						'task_date' => $this->input->post('task_date'),
						'task_status' => $this->input->post('task_status'),

						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->assign_task_model->add_assign_task($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/tasks/assign'));
					}
				}
			}
			else{
				$data['all_worker'] =  $this->user_model->get_all_worker();
				$data['all_appoinment'] =  $this->appoinment_model->get_all_appoinments();
				$data['product'] = $this->product_model->get_all_products();
				$data['task'] = $this->task_model->get_all_tasks();
				$data['view'] = 'admin/tasks/assign_task_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function assign_edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('task_id', 'Select Task', 'trim|required');
				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('appoinment_id', 'Select appoinment', 'trim|required');
				$this->form_validation->set_rules('task_date', 'Task Date', 'trim|required');
				$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_worker'] =  $this->user_model->get_all_worker();
					$data['all_appoinment'] =  $this->appoinment_model->get_all_appoinments();
					$data['task'] = $this->task_model->get_all_tasks();
					$data['product'] = $this->product_model->get_all_products();
					$data['assign_task'] = $this->assign_task_model->get_assign_task_by_id($id);
					$data['view'] = 'admin/tasks/assign_task_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'task_id' => $this->input->post('task_id'),
						'worker_id' => $this->input->post('worker_id'),
						'task_date' => $this->input->post('task_date'),
						'task_status' => $this->input->post('task_status'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->assign_task_model->edit_assign_task($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/tasks/assign'));
					}
				}
			}
			else{
				$data['all_worker'] =  $this->user_model->get_all_worker();
				$data['all_appoinment'] =  $this->appoinment_model->get_all_appoinments();
				$data['task'] = $this->task_model->get_all_tasks();
				$data['product'] = $this->product_model->get_all_products();
				$data['assign_task'] = $this->assign_task_model->get_assign_task_by_id($id);
				$data['view'] = 'admin/tasks/assign_task_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function assign_del($id = 0){
			$this->db->delete('assign_tasks', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/tasks/assign'));
		}

	}


?>