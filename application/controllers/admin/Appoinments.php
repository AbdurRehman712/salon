<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Appoinments extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/task_model', 'task_model');
			$this->load->model('admin/appoinment_model', 'appoinment_model');
			$this->load->model('admin/user_model', 'user_model');
		}

		public function index(){
			$data['all_appoinments'] =  $this->appoinment_model->get_all_appoinments();
			$data['view'] = 'admin/tasks/appoinment_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function assign_add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('task_id', 'Select Task', 'trim|required');
				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('task_date', 'Task Date', 'trim|required');
				$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_worker'] =  $this->user_model->get_all_worker();
					$data['task'] = $this->task_model->get_all_tasks();
					$data['view'] = 'admin/tasks/appoinment_add';
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
					$result = $this->appoinment_model->add_appoinment($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/tasks/assign'));
					}
				}
			}
			else{
				$data['all_worker'] =  $this->user_model->get_all_worker();
				$data['task'] = $this->task_model->get_all_tasks();
				$data['view'] = 'admin/tasks/appoinment_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function assign_edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('task_id', 'Select Task', 'trim|required');
				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('task_date', 'Task Date', 'trim|required');
				$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_worker'] =  $this->user_model->get_all_worker();
					$data['task'] = $this->task_model->get_all_tasks();
					$data['appoinment'] = $this->appoinment_model->get_appoinment_by_id($id);
					$data['view'] = 'admin/tasks/appoinment_edit';
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
					$result = $this->appoinment_model->edit_appoinment($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/tasks/assign'));
					}
				}
			}
			else{
				$data['all_worker'] =  $this->user_model->get_all_worker();
				$data['task'] = $this->task_model->get_all_tasks();
				$data['appoinment'] = $this->appoinment_model->get_appoinment_by_id($id);
				$data['view'] = 'admin/tasks/appoinment_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function assign_del($id = 0){
			$this->db->delete('appoinments', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/tasks/assign'));
		}

	}


?>