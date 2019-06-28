<?php 

	class Report extends CI_Controller{



		public function __construct(){

			parent :: __construct();
			// Loading Necessary Liabries, Helpers and Models
			$this->load->model('admin_model');
			$this->load->model('Message_Model');
            // $this->load->helper('url_helper');
			$this->load->helper(array('form', 'url', 'url_helper'));

			// Loading the Session Mangement Library
			$this->load->library('session');

			// Form Validation
			$this->load->library('form_validation');
			$this->load->library('pdf');
		}

		public function index(){

			$this->load->view('Report/Report_01');
			$html = $this->output->get_output();
			$this->dompdf->loadHtml($html);
			$this->dompdf->setPaper('A4', 'landscape');
			$this->dompdf->render();
			$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

			
		}
	}



?>
