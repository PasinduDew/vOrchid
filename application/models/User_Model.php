<?php 

    class User_Model extends CI_Model{

        public function __construct(){

			parent :: __construct();
			$this->load->database();
		}
		
		// This function used for Login Access
		public function findUserByEmailAndPassword(){

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$status = 1;

			$hashedPassword = hash('md5', $password);

			$this->db->where('email', $email);
			$this->db->where('password', $hashedPassword);
			$this->db->where('status', $status);
			$this->db->select('user_id, role');
			$query = $this->db->get('login');

			return $query->row_array();

		}

		// This function used for User Registration
		public function registerUser(){

			$data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
                'imageurl' => "No Image",				
				'status' => 1
			);

			$this->db->insert('user', $data);

			// Getting the User Id of the Newly Inserted User-Admin
			$this->db->select('id');
			$query = $this->db->get_where('user', array('email' => $data['email']));

			$user = $query->row_array();
			$id = $user['id'];

			$rawPassword = $this->input->post('password');

			// Hashing the Password
			$password = hash('md5', $rawPassword);

			$loginData = array(
				'user_id' => $id,
				'email' => $data['email'],
				'password' => $password,
				'role' => "General User",
				'status' => 1
			);

			// Send the Login Credentials Back to the Login Controller
			$login = array(
				'email' => $data['email'],
				'password' => $rawPassword,
			);

			$this->db->insert('login', $loginData);
			return $login;
		}


		public function getUserProfile($user_id = NULL){

            if($user_id != NULL){

                $query = $this->db->get_where('user', array('id' => $user_id));
                return $query->row_array();
            }
        }
    }


?>
