<?php 

	class Message_Model extends CI_Model{

		public function __construct(){

			parent:: __construct();

			$this->load->database();
			
		}

		public function insertMessage($data){

			return $this->db->insert('message', $data);

		}

		public function viewAll(){

			$this->db->where('state', 1);
            $query = $this->db-> get('message');
            return $query->result_array();

		}

		public function viewInbox(){

			$this->db->where('state', 1);
			$this->db->where('receiver', "admin");
            $query = $this->db-> get('message');
            return $query->result_array();

		}

		public function viewOutbox(){

			$this->db->where('state', 1);
			$this->db->where('sender_name', "VOrchid Team");
            $query = $this->db-> get('message');
            return $query->result_array();

		}

		// Returns the Number of unread Messages
		public function getUnreadMessageCount(){
			$this->db->where('read', 0);
			$this->db->where('state', 1);
			$this->db->from('message');
			return $this->db->count_all_results();
		}

		// Getting all the Messages - new unread
		public function getUnreadMessage(){
			$this->db->where('read', 0);
			$this->db->where('state', 1);
			$this->db->order_by('date', 'DESC');
			$query = $this->db->get('message');
			return $query->result_array();


		}

		public function getMessage($id){

			
			$this->db->where('state', 1);
			$this->db->where('id', $id);
			$query = $this->db->get('message');
			return $query->row_array();


		}

		public function markAsRead($id){

			// gives UPDATE mytable SET field = field+1 WHERE id = 2
			$this->db->set('read', 1);
			$this->db->where('id', (int)$id);
			$this->db->update('message');
		}
	}


?>
