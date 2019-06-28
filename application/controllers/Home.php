<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
            
		// Executing the Parent`s Constructor
		parent:: __construct();

		// Loading Necessary Liabries and Models
		$this->load->model('admin_model');
		$this->load->helper('url_helper');
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data = array();
		if($this->session->userdata('id') != null){
			
			$data['user'] = array(
				'id' => $this->session->userdata('id'),
				'firstname' => $this->session->userdata('firstname'),
				'lastname' => $this->session->userdata('lastname'),
				'role' => $this->session->userdata('role'),
				'email' => $this->session->userdata('email'),
				'imgurl' =>$this->session->userdata('imgurl')

			);
		}
		else{

			$data['user'] = array(
				'id' => "",
				'firstname' => "",
				'lastname' => "",
				'role' => "",
				'email' => "",
				'imgurl' => ""

			);


		}

		// To Tell the Header which page is activated
		$data['active'] = "Home";


		$this->load->view('Templates/Landing_Header', $data);
		$this->load->view('Home/Landing_Content');
		$this->load->view('Templates/Footer');
	}
}
