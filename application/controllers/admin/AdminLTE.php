<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class AdminLTE extends CI_Controller {
		public function index(){
			redirect(base_url('admin/auth'));
		}
		public function top_nav(){
			$this->load->view('admin/adminlte/layout/top-nav');
		}
		public function boxed(){
			$this->load->view('admin/adminlte/layout/boxed');
		}
		public function fixed(){
			$this->load->view('admin/adminlte/layout/fixed');
		}
		public function collapsed_sidebar(){
			$this->load->view('admin/adminlte/layout/collapsed-sidebar');
		}
		public function widgets(){
			$data['view'] = 'admin/adminlte/widgets';
			$this->load->view('admin/layout', $data);
		}

		public function chartjs(){
			$data['view'] = 'admin/adminlte/charts/chartjs';
			$this->load->view('admin/layout', $data);
		}
		public function morris(){
			$data['view'] = 'admin/adminlte/charts/morris';
			$this->load->view('admin/layout', $data);
		}
		public function flot(){
			$data['view'] = 'admin/adminlte/charts/flot';
			$this->load->view('admin/layout', $data);
		}
		public function inline(){
			$data['view'] = 'admin/adminlte/charts/inline';
			$this->load->view('admin/layout', $data);
		}
		public function lockscreen(){
			$this->load->view('admin/adminlte/examples/lockscreen');
		}
		public function error404(){
			$data['view'] = 'admin/adminlte/examples/404';
			$this->load->view('admin/layout', $data);
		}
		public function errro500(){
			$data['view'] = 'admin/adminlte/examples/500';
			$this->load->view('admin/layout', $data);
		}
		public function blank(){
			$data['view'] = 'admin/adminlte/examples/blank';
			$this->load->view('admin/layout', $data);
		}



	}