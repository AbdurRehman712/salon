<?php
	class Account_model extends CI_Model{

		public function add_account($data){
			$this->db->insert('accounts', $data);
			return true;
		}

		public function get_all_accounts(){
			$query = $this->db->get('accounts');
			return $result = $query->result_array();
		}

		public function get_account_by_id($id){
			$query = $this->db->get_where('accounts', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_account($data, $id){
			$this->db->where('id', $id);
			$this->db->update('accounts', $data);
			return true;
		}

	}

?>