<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Assign_Tasks extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/assign_task_model', 'assign_task_model');
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
				$this->form_validation->set_rules('task_date', 'Task Date', 'trim|required');
				$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
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
						redirect(base_url('admin/assign_tasks'));
					}
				}
			}
			else{
				$data['view'] = 'admin/tasks/assign_task_add';
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
						redirect(base_url('admin/assign_tasks'));
					}
				}
			}
			else{
				$data['assign_task'] = $this->assign_task_model->get_assign_task_by_id($id);
				$data['view'] = 'admin/tasks/assign_task_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function assign_del($id = 0){
			$this->db->delete('assign_tasks', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/assign_tasks'));
		}

	}


?>