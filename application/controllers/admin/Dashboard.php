<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/dashboard_model', 'dashboard_model');
		}

		public function index(){
			$data['all_customers'] =  $this->dashboard_model->get_all_customers();
			$data['get_expense'] =  $this->dashboard_model->get_expense();
			$data['get_order_amount'] =  $this->dashboard_model->get_order_amount();
			$data['all_appoinments'] =  $this->dashboard_model->get_all_appoinments();
			$data['view'] = 'admin/dashboard/index';
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	