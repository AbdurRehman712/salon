<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_home extends CI_Controller {
        function __construct() {
        parent::__construct();
         $this->load->model('home_model', 'home_model');
    }
    public function index()
	{
                if($this->input->post('submit')){
                    $this->form_validation->set_rules('firstname', 'Username', 'trim|required');
                    $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                    $this->form_validation->set_rules('email', 'Email', 'trim|required');
                    $this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
                    $this->form_validation->set_rules('product_id', 'Select Appoinment Service', 'trim|required');
                    $this->form_validation->set_rules('appoinment_date', 'Appoinment Date', 'trim|required');
                    $this->form_validation->set_rules('appoinment_time', 'Appoinment Time', 'trim|required');
                    $this->form_validation->set_rules('comments', 'Comments and Questions', 'trim|required');
        
                    
                    if ($this->form_validation->run() == FALSE) {
                        $data['all_products'] = $this->home_model->get_all_products();
                        $this->load->view('website/index', $data);
                    }
                    else{
                        $data = array(
                            'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'email' => $this->input->post('email'),
                            'mobile_no' => $this->input->post('mobile_no'),
                            'product_id' => $this->input->post('product_id'),
                            'appoinment_date' => $this->input->post('appoinment_date'),
                            'appoinment_time' => $this->input->post('appoinment_time'),
                            'comments' => $this->input->post('comments'),
                            'appoinment_status' => 0,
        
                            'created_at' => date('Y-m-d : h:m:s'),
                            'updated_at' => date('Y-m-d : h:m:s'),
                        );
                        $data = $this->security->xss_clean($data);
                        $result = $this->home_model->add_appoinment($data);
                        if($result){
                            redirect(base_url('website/thanks'));
                        }
                    }
                }
                else{
                    $data['all_products'] = $this->home_model->get_all_products();
                    $this->load->view('website/index', $data);
                }
    }
	
}