<?php
defined('BASEPATH') OR exit('No direct script access allowed');
////////////////for admin portal  product management controller
class Web_home extends CI_Controller {
	function __construct() {
        parent::__construct();
   
    }
    public function index()
	{
			
        $this->load->view('website/index');
        
	}
	
	
}