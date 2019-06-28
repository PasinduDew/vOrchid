<?php

	class Dashboard extends CI_Controller{

		// Class`s Constructor
		public function __construct(){

			parent :: __construct();

			// Loading Necessary Liabries, Helpers and Models
			$this->load->model('admin_model');
			$this->load->model('Message_Model');
			$this->load->model('Chart_Model', 'Chart');
			$this->load->model('Sales_Model', 'Sales');

            // $this->load->helper('url_helper');
			$this->load->helper(array('form', 'url', 'url_helper'));

			// Loading the Session Mangement Library
			$this->load->library('session');

			// Form Validation
			$this->load->library('form_validation');

		}

		public function index(){

			if($this->session->userdata('id') != null){

				$data['page_title'] = 'Dashboard';
				$data['admins'] = $this->admin_model->getAdminProfiles();

				// Getting the Data From the Session
				$data['currUser'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' =>$this->session->userdata('imgurl')
				);

				// Getting the unread message count
				$data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
				$data['messages'] = $this->Message_Model->getUnreadMessage();
				$data['nPendingOrders'] = $this->Sales->countAllSales();
				$data['nNewMessages'] = $this->Sales->countAllSales();
				$data['nWholesalers'] = $this->Sales->countAllSales();
				$data['nSales'] = $this->Sales->countAllSales();


				$data['graph_sales'] = json_encode($this->Chart->getSales());
				$data['graph_product_sales'] = json_encode($this->Chart->getProductSales());

				// $data['test'] = json_decode($data['graph_product_sales']);
				// print_r($data['test']);

        
				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Dashboard/Dashboard_Content', $data);
				// $this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				redirect('login');
			}
		}





	}

?>
