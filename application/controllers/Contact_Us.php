<?php 
	class Contact_Us extends CI_Controller{


		public function __construct(){

			parent :: __construct();
			// Helpers
			$this->load->helper('url_helper');
			$this->load->helper(array('form', 'url'));

			// Libraries
			$this->load->library('session');
			$this->load->library('form_validation');
			$this->load->library('email');

			// Models
			$this->load->model('Message_Model', 'Message');

			// Email Configurations
			$config = array(
				'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'

				// 'smtp_host' => 'smtp.mailtrap.io', //smtp.gmail.com
				// 'smtp_port' => 2525, //465
				// 'smtp_user' => '7a80e7cae56999', //Organization Email
				// 'smtp_pass' => '3af770028bb1e3', //Password of that Email Account
				
				'smtp_port' => 465,
				'smtp_host' => 'smtp.googlemail.com',				
				'smtp_user' => 'lapjanith@gmail.com', //Organization Email
  				'smtp_pass' => 'lapjd@12', //Password of that Email Account
				 //can be 'ssl' or 'tls' for example
				'mailtype' => 'text', //plaintext 'text' mails or 'html'
				'smtp_timeout' => '4', //in seconds
				'charset' => 'iso-8859-1',
				'crlf' => "\r\n",
  				'newline' => "\r\n",
				'wordwrap' => TRUE
			);

			$this->email->initialize($config);

		}

		public function index(){

			$data = array();
			if($this->session->userdata('id') != null){
				
				$data['user'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' => $this->session->userdata('imgurl')

				);
			}
			else{

				// This is Because Non-Registered Users also can send the Messages
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
			$data['active'] = "Contact Us";

			// Getting the unread message count
			$data['msgCount'] = $this->Message->getUnreadMessageCount();
			$data['messages'] = $this->Message->getUnreadMessage();

			$this->load->view('Templates/Header', $data);
			$this->load->view('Contact_Us/Contact_Us', $data);
			$this->load->view('Templates/Footer');

		}


		public function setMessage(){

			// Form Validation Begins From Here
			// $this->form_validation->set_rules('msgName', 'Name', 'required');
			$this->form_validation->set_rules('msgEmail', 'Email', 'required');
			$this->form_validation->set_rules('msgMob', 'Mobile', 'required');
			$this->form_validation->set_rules('msgTxt', 'Message', 'required');
			
			if ($this->form_validation->run() === FALSE){

				$this->index();

			}
			else{



				$data = array(
					"sender_name" => $this->input->post('msgName'),
					"sender_email" => $this->input->post('msgEmail'),
					"receiver" => "admin",
					"message" => $this->input->post('msgTxt'),
					"mobile" => $this->input->post('msgMob'),
					"date" => date("Y-m-d"),
					"read" => 0,
					"state" => 1 
				);

				if($this->Message->insertMessage($data) == 1){
					

					$this->email->from('lapjanith@gmail.com', 'VOrchid');
					// $this->email->to($data['sender_email']);
					$this->email->to("ead3f02a51-b99b02@inbox.mailtrap.io");

					$this->email->cc('another@another-example.com');
					$this->email->bcc('them@their-example.com');
					$this->email->reply_to('lapjanith@gmail.com', 'VOrchid');

					$this->email->subject('VOrchid Team');
					$this->email->message('Testing the email class.');

					// $this->email->send();
					// $this->messageSuccess();

					if($this->email->send()){
						$this->messageSuccess();
					}
					else{
						$this->messageUnsuccess();	

					}
					

				}	

			}
		}

		public function messageSuccess(){

			$data = array();
			if($this->session->userdata('id') != null){
				
				$data['user'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' => $this->session->userdata('imgurl')

				);
			}
			

			// To Tell the Header which page is activated
			$data['active'] = "Contact Us";

			// Getting the unread message count
			$data['msgCount'] = $this->Message->getUnreadMessageCount();
			$data['messages'] = $this->Message->getUnreadMessage();

			$this->load->view('Templates/Header', $data);
			$this->load->view('Contact_Us/Contact_Us _Message_Success');
			$this->load->view('Templates/Footer');



		}

		public function messageUnsuccess(){

			$data = array();
			if($this->session->userdata('id') != null){
				
				$data['user'] = array(
					'id' => $this->session->userdata('id'),
					'firstname' => $this->session->userdata('firstname'),
					'lastname' => $this->session->userdata('lastname'),
					'role' => $this->session->userdata('role'),
					'email' => $this->session->userdata('email'),
					'imgurl' => $this->session->userdata('imgurl')

				);
			}
			

			// To Tell the Header which page is activated
			$data['active'] = "Contact Us";

			// Getting the unread message count
			$data['msgCount'] = $this->Message->getUnreadMessageCount();
			$data['messages'] = $this->Message->getUnreadMessage();

			$this->load->view('Templates/Header', $data);
			$this->load->view('Contact_Us/Contact_Us _Message_Success');
			$this->load->view('Templates/Footer');



		}

		public function viewMessage($id){

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
				$data['message'] = $this->Message->getMessage($id);

				if($data['message']['read'] == 1){
					$data['alert'] = "alert-success";
					$data['alert_text'] = "Replied Message";
				}
				else{
					$data['alert'] = "alert-primary";
					$data['alert_text'] = "New Message"; 
				}

				// Getting the unread message count
				$data['msgCount'] = $this->Message->getUnreadMessageCount();
				$data['messages'] = $this->Message->getUnreadMessage();

				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Contact_Us/View_Message', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}

			
		}

		public function viewAllMessages(){

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
				$data['messages'] = $this->Message->viewAll();

				// Getting the unread message count
				$data['msgCount'] = $this->Message->getUnreadMessageCount();
				$data['messages'] = $this->Message->getUnreadMessage();

				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Contact_Us/Messages', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}
		}

		public function viewInbox(){

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
				$data['messages'] = $this->Message->viewInbox();

				// Getting the unread message count
				$data['msgCount'] = $this->Message->getUnreadMessageCount();
				$data['messages'] = $this->Message->getUnreadMessage();

				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Contact_Us/Messages', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}
		}

		public function viewOutbox(){

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
				$data['messages'] = $this->Message->viewOutbox();

				// Getting the unread message count
				$data['msgCount'] = $this->Message->getUnreadMessageCount();
				$data['messages'] = $this->Message->getUnreadMessage();

				$this -> load -> view('Templates/Dashboard_Header', $data);
				$this -> load -> view('Contact_Us/Messages', $data);
				$this -> load -> view('Templates/Dashboard_Footer');
			}
			else{
				
				redirect('login');
			}
		}

		public function sendReply($msgId){

			$data = array(

				"sender_name" => "VOrchid Team",
				"sender_email" => "vorchid@gmail.com",
				"receiver" => $this->input->post('receiver_email'),
				"message" => $this->input->post('message_text'),
				"date" => date("Y-m-d"),
				"mobile" => "+94 000 0000",
				"state" => 1,
				"read" => 1
			);

			// Email Begins from Here
			if($this->Message->insertMessage($data) == 1){
					
				/*
				$this->email->from('lapjanith@gmail.com', 'VOrchid');
				// $this->email->to($data['sender_email']);
				$this->email->to("ead3f02a51-b99b02@inbox.mailtrap.io");
				$this->email->cc('another@another-example.com');
				$this->email->bcc('them@their-example.com');
				$this->email->reply_to('lapjanith@gmail.com', 'VOrchid');
				*/
				// Production
				$this->email->from('lapjanith@gmail.com', 'VOrchid');
				// $this->email->to($data['sender_email']);
				$this->email->to("pasindudewapriya96@gmail.com");
				$this->email->cc('another@another-example.com');
				$this->email->bcc('them@their-example.com');
				$this->email->reply_to('lapjanith@gmail.com', 'VOrchid');

				$this->email->subject('VOrchid Team');
				$this->email->message($data['message']);

				// $this->email->send();
				// $this->messageSuccess();

				if($this->email->send()){
					$this->viewAllMessages();
					$this->Message->markAsRead($msgId);
					
				}
				else{
					// $this->messageUnsuccess();	

				}
				

			}
			// Email Ends from Here


		}
	}



?>
