<?php
	class Task_model extends CI_Model{

		public function add_task($data){
			$this->db->insert('tasks', $data);
			return true;
		}

		public function get_all_tasks(){
			$query = $this->db->get('tasks');
			return $result = $query->result_array();
		}

		public function get_task_by_id($id){
			$query = $this->db->get_where('tasks', array('id' => $id));
			return $result = $query->row_array();
		}

		public function edit_task($data, $id){
			$this->db->where('id', $id);
			$this->db->update('tasks', $data);
			return true;
		}

	}

?>