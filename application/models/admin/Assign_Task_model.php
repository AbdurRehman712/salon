<?php
	class Assign_Task_model extends CI_Model{

		public function add_assign_task($data){
			$this->db->insert('assign_tasks', $data);
			return true;
		}

		public function get_all_assign_tasks(){
			$query = 'select * ,( select t.task_name from tasks t where t.id = at.task_id) as TaskName , ( select u.username from users u where u.id = at.worker_id ) as WorkerName , ( select product_name from products p where p.id IN (select a.product_id from appoinments a where a.id = at.appoinment_id) ) as ProductName from assign_tasks at';
			return $this->db->query($query)->result_array();
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