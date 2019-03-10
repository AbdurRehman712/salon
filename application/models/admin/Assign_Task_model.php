<?php
	class Assign_Task_model extends CI_Model{

		public function add_assign_task($data){
			$this->db->insert('assign_tasks', $data);
			return true;
		}

		public function get_all_assign_tasks(){
			$query = $this->db->get('assign_tasks');
			return $result = $query->result_array();
		}

		public function get_assign_task_by_id($id){
			$query = $this->db->get_where('assign_tasks', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_assign_task($data, $id){
			$this->db->where('id', $id);
			$this->db->update('assign_tasks', $data);
			return true;
		}

	}

?>