<?php 

	class Chart_Model extends CI_Model{



		public function __construct(){


			parent :: __construct();
			$this->load->database();
		}

		public function getSales(){

			$this->db->distinct();
			$this->db->select('month,  COUNT(id) as no_of_sales', FALSE);
			$this->db->where('status', 1); // Produces: WHERE name = 'Joe'
			$this->db->group_by("month"); // Produces: GROUP BY title
			$query = $this->db->get('sales');
			return $query->result_array();


		}

		public function getProductSales(){

			// $this->db->distinct();
			// $this->db->select('product_id AS label,  SUM(quantity) AS value', FALSE);
			// $this->db->where('status', 1); // Produces: WHERE name = 'Joe'
			// $this->db->group_by("product_id"); // Produces: GROUP BY title
			// $query = $this->db->get('sales');
			// return $query->result_array();

			$this->db->select('product.name AS label,  SUM(sales.quantity) AS value', FALSE);
			$this->db->from('sales');
			$this->db->join('product', 'sales.product_id = product.id', 'inner');
			$this->db->where('sales.status', 1); // Produces: WHERE name = 'Joe'
			$this->db->group_by("sales.product_id"); // Produces: GROUP BY title
			$query = $this->db->get();
			// print_r($this->db->last_query());
			return $query->result_array();



		}
	}


?>
