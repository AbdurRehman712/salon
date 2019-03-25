<?php
	class Appoinment_model extends CI_Model{

		public function add_appoinment($data){
			$this->db->insert('appoinments', $data);
			return true;
		}

		public function get_all_appoinments(){
			$query = 'select parent.id as id , (select product_name from products p where p.id = parent.product_id) as ProductName , (select u.username from users u where u.id = parent.customer_id) as CustomerName , appoinment_time, appoinment_date , appoinment_status , comments from appoinments parent' ;
			$res = $this->db->query($query);
			return $res->result_array();
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