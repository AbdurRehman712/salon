<?php
	class Appoinment_model extends CI_Model{

		public function add_appoinment($data){
			$this->db->insert('appoinments', $data);
			return true;
		}

		public function get_all_appoinments(){
			$query = $this->db->get('appoinments');
			return $result = $query->result_array();
		}

		public function get_appoinment_by_id($id){
			$query = $this->db->get_where('appoinments', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_appoinment($data, $id){
			$this->db->where('id', $id);
			$this->db->update('appoinments', $data);
			return true;
		}

	}

?>