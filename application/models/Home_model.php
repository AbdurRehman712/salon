<?php
	class Home_model extends CI_Model{

		public function add_appoinment($data){
			if(count($data) > 0){
				$query = $this->db->get_where('users', array('email' => $data['email']));
				$response = $query->result_array();
		   
				  ///////// Check user exist or Not then add new user and appoinment data/////////
				  if(count($response) == 0){
				  $newuser = array(
					"username" => $data['username'],
					"email" => $data['email'],
					"mobile_no"  => $data['mobile_no'],
					"firstname"  => $data['firstname'],
					"lastname" 	 => $data['lastname'],
					"is_worker"  => 1,
					"created_at" => $data['created_at'],
					"updated_at" => $data['updated_at']
				  );
				  $this->db->insert('users', $newuser);
				  $last_id = $this->db->insert_id();
	
				  $appoinment = array(
					"customer_id"			=> 	$last_id,
					"product_id"			=>	$data['product_id'],
					"appoinment_date"		=>	$data['appoinment_date'],	
					"appoinment_time"		=>	$data['appoinment_time'],	
					"appoinment_status" 	=>	0,
					"comments"				=>	$data['comments'],
					"created_at" => $data['created_at'],
					"updated_at" => $data['updated_at']
				  );
				  $this->db->insert('appoinments', $appoinment);
				  redirect(base_url('thanks'));
				  /////////////////////// If user exist then add Appointment data///////////////////////////
	
				}else{
					$query = $this->db->get_where('users', array('email' => $data['email']));
					$response = $query->row();
	
					$appoinment = array(
						"customer_id"			=> 	$response->id,
						"product_id"			=>	$data['product_id'],
						"appoinment_date"		=>	$data['appoinment_date'],	
						"appoinment_time"		=>	$data['appoinment_time'],	
						"appoinment_status" 	=>	0,
						"comments"				=>	$data['comments']
					  );
					  $this->db->insert('appoinments', $appoinment);
					  redirect(base_url('thanks'));
					  //echo "Invoice Added";
				  }
		   
			  }
		}

		public function get_all_products(){
			$query = $this->db->get('products');
			return $result = $query->result_array();
		}

		public function get_product_by_id($id){
			$query = $this->db->get_where('products', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_product($data, $id){
			$this->db->where('id', $id);
			$this->db->update('products', $data);
			return true;
		}

	}

?>