<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_home extends CI_Controller {
        function __construct() {
        parent::__construct();
         $this->load->model('home_model', 'home_model');
    }
    public function index()
	{
                $data['all_products'] =  $this->home_model->get_all_products();
                $this->load->view('website/index', $data);   
	}
	
	
}