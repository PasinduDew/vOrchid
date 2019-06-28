<?php 

    class Login extends CI_Controller{


        public function __construct(){

			// Parent`s Constructor
            parent :: __construct();

			// Loading the Necessary libraries, helpers and Models Manually
			$this->load->helper('url_helper');
			$this->load->helper('url'); //To Redirect the Page
			$this->load->helper(array('form'));

			$this->load->model('User_Model');
			$this->load->model('Admin_model');

			$this->load->library('form_validation');
			$this->load->library('session');
			
			
        }

		// To Load the Login Page
        public function index(){

			$data['user'] = array(
				'email' => "",
				'password' => ""
			);

            $this->load->view('Login/Login_Page_a', $data);
		}
		

		public function authenticate($redir = null){

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE){

				// Send the Login Credentials Back to the Login Controller
				$data['user'] = array(
					'email' => "",
					'password' => "",
				);
			
				$this->load->view('Login/Login_Page_a', $data);

			}
			else{
			
				$user = $this->User_Model->findUserByEmailAndPassword();
				if($user != null){
					if($user['role'] == "System Admin"){

						$id = $user['user_id'];
						$data = $this->Admin_model->getAdminProfile($id);

						$currUser = array(
							'id' => $id,
							'firstname' => $data['firstname'],
							'lastname' => $data['lastname'],
							'role' => $data['designation'],
							'email' => $data['email'],
							'imgurl' => $data['imageurl']

						);

						$this->session->set_userdata($currUser);


						redirect('/dashboard');
					}
					else if($user['role'] == "General User"){

						$id = $user['user_id'];
						$data = $this->User_Model->getUserProfile($id);

						$currUser = array(
							'id' => $id,
							'firstname' => $data['firstname'],
							'lastname' => $data['lastname'],
							'role' => "General User",
							'email' => $data['email'],
							'imgurl' => $data['imageurl']

						);

						$this->session->set_userdata($currUser);


						redirect('');

					}
				}
				else{
					// Send the Login Credentials Back to the Login Controller
					$data['user'] = array(
						'email' => "",
						'password' => "",
					);
				
					$this->load->view('Login/Login_Page_a', $data);
				}
				
			}

		}

		// Logging Out 
		public function logout(){

			if ($this->session->userdata('id') != null) {

				$currUser = array(
					'id',
					'firstname',
					'lastname',
					'email',
					'status',
					'imgurl'
				);

				$this->session->unset_userdata($currUser);
				
			}

			redirect('/');
		}

		public function register(){

			$this->load->view('Registration/Registration');
		}

		public function addUser(){

			// Form Validation
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required');

			if ($this->form_validation->run() === FALSE){
			
				$this->load->view('Registration/Registration');

			}
			else{

				$data['user'] = $this->User_Model->registerUser();

				if($data['user'] != null){
					$this->load->view('Login/Login_Page_a', $data);
				}
				else{
					$this->load->view('Login/Login_Page_a');
				}
				
			}
		}
    }



?>
