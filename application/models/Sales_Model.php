<?php 

	class Sales_Model extends CI_Model{


		public function __construct(){

			parent :: __construct();
			$this->load->database();
		}

		public function countAllSales(){

			$this->db->where('status', 1);
			$this->db->from('sales');
			return $this->db->count_all_results();
		}
	}

?>
