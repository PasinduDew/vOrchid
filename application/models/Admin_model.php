<?php
    class Admin_model extends CI_Model{

        public function __construct(){

            parent :: __construct();
            
            $this->load->database();
            $this->load->helper('security');
        }

        public function getAdminProfiles(){
			$this->db->where('status', 1);
            $query = $this->db-> get('admin');
            return $query->result_array();

        }

        public function getAdminProfile($admin_id = NULL){

            if($admin_id != NULL){

                $query = $this->db->get_where('admin', array('id' => $admin_id));
                return $query->row_array();
            }
        }

        public function updateAdmin($admin_id = NULL, $image_path = NULL){

            // Implement the Password Verification Part Here


            // Admin Data Updation Section
            if($admin_id != NULL && $image_path != 'url'){

                $data = array(
                    'firstname' => $this->input->post('fname'),
                    'lastname' => $this->input->post('lname'),
                    'nic' => $this->input->post('nic'),
                    'dob' => $this->input->post('dob'),
                    'address' => $this->input->post('address'),
                    'designation' => $this->input->post('designation'),
                    'joined' => $this->input->post('joined'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mob'),
                    'remarks' => $this->input->post('remarks'),
                    'imageurl' => $image_path,
                );
            
            $this->db->where('id', $admin_id);
            $this->db->update('admin', $data);

            }
            else if($admin_id != NULL && $image_path == 'url' ){
                $data = array(
                    'firstname' => $this->input->post('fname'),
                    'lastname' => $this->input->post('lname'),
                    'nic' => $this->input->post('nic'),
                    'dob' => $this->input->post('dob'),
                    'address' => $this->input->post('address'),
                    'designation' => $this->input->post('designation'),
                    'joined' => $this->input->post('joined'),
                    'email' => $this->input->post('email'),
                    'mobile' => $this->input->post('mob'),
                    'remarks' => $this->input->post('remarks')
                );
            
            $this->db->where('id', $admin_id);
            $this->db->update('admin', $data);
                

            } 
        }

        // Insert Admin Record to the Database
        public function setAdmin($image_path){

            // $str = do_hash($str, 'md5'); // MD5

            $data = array(
                'firstname' => $this->input->post('fname'),
                'lastname' => $this->input->post('lname'),
                'nic' => $this->input->post('nic'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
                'designation' => $this->input->post('designation'),
                'joined' => $this->input->post('joined'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mob'),
                'remarks' => $this->input->post('remarks'),
				'imageurl' => $image_path,
				'status' => 1

			);

			$this->db->insert('admin', $data);

			// Getting the User Id of the Newly Inserted User-Admin
			$this->db->select('id');
			$query = $this->db->get_where('admin', array('nic' => $data['nic']));

			$user = $query->row_array();
			$id = $user['id'];
			// Hashing the Password
			$password = hash('md5', ($this->input->post('password')));

			$loginData = array(
				'user_id' => $id,
				'email' => $data['email'],
				'password' => $password,
				'role' => $data['designation'],
				'status' => 1
			);

			return $this->db->insert('login', $loginData);

		}
		
		// To perform Deletion of an Admin
		/* Here Deltion is Performed By Setting the Status Attribute of the User to 0 to Indicate that the User is no longer
		   Valid within the System */
		public function delete($id = null){

			if($id != null){

				$data = array(
					'status' => 0,
				);
			
				// Perform Deletion on User Table
				$this->db->where('id', $id);
				$this->db->update('admin', $data);

				// Perform Deletion on Login Table
				$this->db->where('user_id', $id);
				$this->db->update('login', $data);

				return 1;

			}


		}
        
    }
    

?>
