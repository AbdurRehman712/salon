<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Accounts extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/product_model', 'product_model');
			$this->load->model('admin/account_model', 'account_model');
			$this->load->model('admin/user_model', 'user_model');
		}

		public function index(){
			$data['all_accounts'] =  $this->account_model->get_all_accounts();
			$data['view'] = 'admin/accounts/account_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('salary_month', 'Salary Month', 'trim|required');
				$this->form_validation->set_rules('total_tasks', 'Total Tasks', 'trim|required');
				$this->form_validation->set_rules('salary_amount', 'Salary Amount', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_workers'] =  $this->user_model->get_all_worker();
					$data['view'] = 'admin/accounts/account_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'worker_id' => $this->input->post('worker_id'),
						'salary_month' => $this->input->post('salary_month'),
						'total_tasks' => $this->input->post('total_tasks'),
						'salary_amount' => $this->input->post('salary_amount'),

						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->account_model->add_account($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/accounts'));
					}
				}
			}
			else{
				$data['all_workers'] =  $this->user_model->get_all_worker();
				$data['view'] = 'admin/accounts/account_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('worker_id', 'Select Worker', 'trim|required');
				$this->form_validation->set_rules('salary_month', 'Salary Month', 'trim|required');
				$this->form_validation->set_rules('total_tasks', 'Total Tasks', 'trim|required');
				$this->form_validation->set_rules('salary_amount', 'Salary Amount', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_workers'] =  $this->user_model->get_all_worker();
					$data['account'] = $this->account_model->get_account_by_id($id);
					$data['view'] = 'admin/accounts/account_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'worker_id' => $this->input->post('worker_id'),
						'salary_month' => $this->input->post('salary_month'),
						'total_tasks' => $this->input->post('total_tasks'),
						'salary_amount' => $this->input->post('salary_amount'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->account_model->edit_account($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/accounts'));
					}
				}
			}
			else{
				$data['all_workers'] =  $this->user_model->get_all_worker();
				$data['account'] = $this->account_model->get_account_by_id($id);
				$data['view'] = 'admin/accounts/account_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('accounts', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/accounts'));
		}

	}


?>