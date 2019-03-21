<?php
	class Home_model extends CI_Model{

		public function add_product($data){
			$this->db->insert('products', $data);
			return true;
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