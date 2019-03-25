<?php
	class Account_model extends CI_Model{

		public function add_account($data){
			$this->db->insert('accounts', $data);
			return true;
		}

		public function get_tasks_salary($data){
			$query ='select COUNT( at.task_id ) as TotalTasks , SUM( (select t.task_price from tasks t where t.id = at.task_id) ) as TotalEarning from assign_tasks at where at.task_status = 1 AND at.worker_id =' +  $data['worker_id'] + 'and at.task_date >= ' + $data['salary_month_start'] + ' and at.task_date <= ' + $data['salary_month_end'];
			$query = $this->db->get($query);
			return $result = $query->result_array();
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