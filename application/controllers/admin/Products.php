<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Products extends MY_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('admin/product_model', 'product_model');
		}

		public function index(){
			$data['all_products'] =  $this->product_model->get_all_products();
			$data['view'] = 'admin/products/product_list';
			$this->load->view('admin/layout', $data);
		}
		
		public function add(){
			if($this->input->post('submit')){

				$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
				$this->form_validation->set_rules('product_description', 'Product Description', 'trim|required');
				$this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
				$this->form_validation->set_rules('product_stock', 'Product Stock', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/products/product_add';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'product_name' => $this->input->post('product_name'),
						'product_description' => $this->input->post('product_description'),
						'product_price' => $this->input->post('product_price'),
						'product_stock' => $this->input->post('product_stock'),
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->product_model->add_product($data);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/products'));
					}
				}
			}
			else{
				$data['view'] = 'admin/products/product_add';
				$this->load->view('admin/layout', $data);
			}
			
		}

		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required');
				$this->form_validation->set_rules('product_description', 'Product Description', 'trim|required');
				$this->form_validation->set_rules('product_price', 'Product Price', 'trim|required');
				$this->form_validation->set_rules('product_stock', 'Product Stock', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['product'] = $this->product_model->get_product_by_id($id);
					$data['view'] = 'admin/products/product_edit';
					$this->load->view('admin/layout', $data);
				}
				else{
					$data = array(
						'product_name' => $this->input->post('product_name'),
						'product_description' => $this->input->post('product_description'),
						'product_price' => $this->input->post('product_price'),
						'product_stock' => $this->input->post('product_stock'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->product_model->edit_product($data, $id);
					if($result){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/products'));
					}
				}
			}
			else{
				$data['product'] = $this->product_model->get_product_by_id($id);
				$data['view'] = 'admin/products/product_edit';
				$this->load->view('admin/layout', $data);
			}
		}

		public function del($id = 0){
			$this->db->delete('products', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/products'));
		}

	}


?>