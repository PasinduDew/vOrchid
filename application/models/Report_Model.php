<?php 

	class Report_Model extends CI_Model{


		public function __construct(){

			parent :: __construct();
			$this->load->database();
		}

		public function getAllSales(){

			$this->db->where('status', 1);
			$query = $this->db->get('sales');
			return $query->result_array();
		}
	}

?>
