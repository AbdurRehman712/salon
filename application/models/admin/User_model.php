<?php
	class User_model extends CI_Model{

		public function add_user($data){
			$this->db->insert('users', $data);
			return true;
		}

		public function get_all_users(){
			$query = $this->db->get('users');
			return $result = $query->result_array();
		}

		public function get_all_worker(){
			$query = $this->db->get_where('users', array('is_worker' => '0'));
			return $result = $query->result_array();
		}

		public function get_all_customers(){
			$query = $this->db->get_where('users', array('is_worker' => '1'));
			return $result = $query->result_array();
		}

		public function get_user_by_id($id){
			$query = $this->db->get_where('users', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_user($data, $id){
			$this->db->where('id', $id);
			$this->db->update('users', $data);
			return true;
		}

	}

?>