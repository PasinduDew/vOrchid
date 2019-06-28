<?php

    class Admin extends CI_Controller
    {
        public function __construct()
        {
            
            // Executing the Parent`s Constructor
            parent:: __construct();

            // Loading Necessary Liabries, Helpers and Models
			$this->load->model('admin_model');
			$this->load->model('Message_Model');
            // $this->load->helper('url_helper');
			$this->load->helper(array('form', 'url', 'url_helper'));

			// Loading the Session Mangement Library
			$this->load->library('session');

			// Form Validation
			$this->load->library('form_validation');
			

		}
		



        public function index () {

			
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
				

        
				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Admin/View_All_Admin', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				redirect('login');
			}

            // For Testing Purposes
            // $this->load->view('Test_VIew');
        }


        public function editProfile($admin_id = null){

			if($this->session->userdata('id') != null){


				$data['page_title'] = 'Edit Profile';
            	$image_path = "url";

				if ($admin_id != null) {
					$data['admin'] = $this->admin_model->getAdminProfile($admin_id);
				}
				
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

				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Admin/Edit_Profile', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				// $currUrl = current_url();
				// uri_string($currUrl);
				// print_r(uri_string($currUrl));
				redirect('login');
			}
            
        }

        public function editAdmin($admin_id){

			if($this->session->userdata('id') != null){
				$data['page_title'] = 'Edit Profile';
				$image_path = "url";

				if ($admin_id != null) {

					// Image File Upload Configauration
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '4096000'; // Max image size can be uploaded is 4 MB - 4096 KB
					$config['max_width'] = '1024';
					$config['max_height'] = '768';
		
					// Loading the File Upload Library
					$this->load->library('upload', $config);
		
					// Uploading the File - do_upload()
					if (! $this->upload->do_upload('userimage')) {
						$error = array('error' => $this->upload->display_errors());
		
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
						$this -> load -> view('Templates/Dashboard_Header', $data);
						$this -> load -> view('Admin/Add_Admin', $error);
						$this -> load -> view('Templates/Dashboard_Footer');
					} else {
						$file_name = $this->upload->data('file_name');
						$image_path = 'uploads/' . $file_name;
					}
					
					$this->admin_model->updateAdmin($admin_id, $image_path);
					redirect('admin/viewProfile/' . $admin_id);
				}
			}
			else{
				
				redirect('login');
			}
            
        }

        public function addAdmin(){
			if($this->session->userdata('id') != null){

				// Getting the Data From the Session
				$data['currUser'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' =>$this->session->userdata('imgurl')
				);
				$data['page_title'] = 'Add New Addministrator';

				$this -> load -> helper('url'); // To Use the base_url() Function in View

				// Getting the unread message count
				$data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
				$data['messages'] = $this->Message_Model->getUnreadMessage();
				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Admin/Add_Admin', array('error' => ' ' ));
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}
			
        }

        public function viewProfile($admin_id = null){
			if($this->session->userdata('id') != null){

				// Getting the Data From the Session
				$data['currUser'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' =>$this->session->userdata('imgurl')
				);
				$data['page_title'] = 'View Profile';

				if ($admin_id != null) {
					$data['admin'] = $this->admin_model->getAdminProfile($admin_id);
				}
				// Getting the unread message count
				$data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
				$data['messages'] = $this->Message_Model->getUnreadMessage();
				// Loading the View
				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Admin/Profile', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}
			
        }

        public function addAdminData()
        {
			if($this->session->userdata('id') != null){

				// Getting the Data From the Session
				$data['currUser'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' =>$this->session->userdata('imgurl')
				);

				
				$data['page_title'] = 'Add New Addministrator';
				$image_path = "url";

				// Form Validation Begins From Here
				$this->form_validation->set_rules('fname', 'First Name', 'required');
				$this->form_validation->set_rules('lname', 'Last Name', 'required');
				$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
				$this->form_validation->set_rules('nic', 'NIC', 'required');
				$this->form_validation->set_rules('address', 'Address', 'required');
				$this->form_validation->set_rules('mob', 'Mobile', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('joined', 'Date Joined', 'required');
				$this->form_validation->set_rules('designation', 'Designation', 'required');
				$this->form_validation->set_rules('remarks', 'Title', 'required');
				$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'required');

				if ($this->form_validation->run() === FALSE){
					// Getting the unread message count
					$data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
					$data['messages'] = $this->Message_Model->getUnreadMessage();

					$this -> load -> view('Templates/Dashboard_Header', $data);
					$this -> load -> view('Admin/Add_Admin', $error);
					$this -> load -> view('Templates/Dashboard_Footer');

				}
				else{
					// Image File Upload Configauration
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '4096000'; // Max image size can be uploaded is 4 MB - 4096 KB
					$config['max_width'] = '1024';
					$config['max_height'] = '768';

					// Loading the File Upload Library
					$this->load->library('upload', $config);

					// Uploading the File - do_upload()
					if (! $this->upload->do_upload('userimage')) {
						$error = array('error' => $this->upload->display_errors());

						// Getting the unread message count
						$data['msgCount'] = $this->Message_Model->getUnreadMessageCount();
						$data['messages'] = $this->Message_Model->getUnreadMessage();

						$this -> load -> view('Templates/Dashboard_Header', $data);
						$this -> load -> view('Admin/Add_Admin', $error);
						$this -> load -> view('Templates/Dashboard_Footer');
					} else {
						$file_name = $this->upload->data('file_name');
						$image_path = 'uploads/' . $file_name;
					}
					
					$this->admin_model->setAdmin($image_path);
					// Redirecting the Page to Admin
					redirect('admin');
				}

				
			}
			else{
				
				redirect('login');
			}
			
		}

		// This function is used to Delete an Admin
		public function deleteAdmin($id = null){

			$verify = $this->admin_model->delete($id);
			if($verify == 1){
				$this->index();
			}

		}

	}
	
	?>
