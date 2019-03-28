<?php
	class Dashboard_model extends CI_Model{

		public function get_tasks_salary($data){
			$query ='select COUNT( at.task_id ) as TotalTasks , SUM( (select t.task_price from tasks t where t.id = at.task_id) ) as TotalEarning from assign_tasks at where at.task_status = 1 AND at.worker_id =' . $data['worker_id'] + 'and at.task_date >= "' + $data['salary_month_start'] + '" and at.task_date <= "' + $data['salary_month_end'] +'"' ;
			return $this->db->query($query)->result_array();
		}

		public function get_all_customers(){
			$this->db->where('is_worker', '1');
			$this->db->from('users');
			return $this->db->count_all_results();
		}

		public function get_all_appoinments(){
			return $this->db->count_all_results('appoinments');
		}

		public function get_expense(){;
			$query = 'SELECT SUM(salary_amount) AS salary_amount FROM accounts WHERE MONTH(created_at) = MONTH(CURRENT_DATE())';
			return $this->db->query($query)->row();
		}
		
		public function get_order_amount(){
			$query = 'SELECT SUM((select p.product_price from products p where p.id = a.id)) AS order_amount FROM appoinments a WHERE MONTH(created_at) = MONTH(CURRENT_DATE())';
			return $this->db->query($query)->row();
		}

	}

?>