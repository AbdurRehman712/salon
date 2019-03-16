<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Appoinments extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/product_model', 'product_model');
			$this->load->model('admin/appoinment_model', 'appoinment_model');
			$this->load->model('admin/user_model', 'user_model');
		}

		public function index(){
			$data['all_appoinments'] =  $this->appoinment_model->get_all_appoinments();
			$data['view'] = 'admin/appoinments/appoinment_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('product_id', 'Select Product', 'trim|required');
				$this->form_validation->set_rules('customer_id', 'Select Customer', 'trim|required');
				$this->form_validation->set_rules('appoinment_date', 'Appoinment Date', 'trim|required');
				$this->form_validation->set_rules('appoinment_time', 'Appoinment Time', 'trim|required');
				$this->form_validation->set_rules('comments', 'Comments and Questions', 'trim|required');
				$this->form_validation->set_rules('appoinment_status', 'Appoinment Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_customers'] =  $this->user_model->get_all_customers();
					$data['product'] = $this->product_model->get_all_products();
					$data['view'] = 'admin/appoinments/appoinment_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'product_id' => $this->input->post('product_id'),
						'customer_id' => $this->input->post('customer_id'),
						'appoinment_date' => $this->input->post('appoinment_date'),
						'appoinment_time' => $this->input->post('appoinment_time'),
						'comments' => $this->input->post('comments'),
						'appoinment_status' => $this->input->post('appoinment_status'),

						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->appoinment_model->add_appoinment($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/appoinments'));
					}
				}
			}
			else{
				$data['all_customers'] =  $this->user_model->get_all_customers();
				$data['product'] = $this->product_model->get_all_products();
				$data['view'] = 'admin/appoinments/appoinment_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('product_id', 'Select Product', 'trim|required');
				$this->form_validation->set_rules('customer_id', 'Select Customer', 'trim|required');
				$this->form_validation->set_rules('appoinment_date', 'Appoinment Date', 'trim|required');
				$this->form_validation->set_rules('appoinment_time', 'Appoinment Time', 'trim|required');
				$this->form_validation->set_rules('comments', 'Comments and Questions', 'trim|required');
				$this->form_validation->set_rules('appoinment_status', 'Appoinment Status', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['all_customers'] =  $this->user_model->get_all_customers();
					$data['product'] = $this->product_model->get_all_products();
					$data['appoinment'] = $this->appoinment_model->get_appoinment_by_id($id);
					$data['view'] = 'admin/appoinments/appoinment_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'product_id' => $this->input->post('product_id'),
						'customer_id' => $this->input->post('customer_id'),
						'appoinment_date' => $this->input->post('appoinment_date'),
						'appoinment_time' => $this->input->post('appoinment_time'),
						'comments' => $this->input->post('comments'),
						'appoinment_status' => $this->input->post('appoinment_status'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->appoinment_model->edit_appoinment($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/appoinments'));
					}
				}
			}
			else{
				$data['all_customers'] =  $this->user_model->get_all_customers();
				$data['product'] = $this->product_model->get_all_products();
				$data['appoinment'] = $this->appoinment_model->get_appoinment_by_id($id);
				$data['view'] = 'admin/appoinments/appoinment_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('appoinments', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/appoinments'));
		}

	}


?>