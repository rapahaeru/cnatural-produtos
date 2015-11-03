<?php
class Users_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function find($id = FALSE, $offset = 0, $limit = 10){
		if($id){
			$this->db->where('id', $id);
			$user = $this->db->get('users');
		}else{
			$this->db->order_by('first_name');
			$users = $this->db->get('users', $limit, $offset);
		}
		
		if($id && !is_null($user))
			return $user;
		elseif(!is_null($users))
			return $users;
		else
			return false;
	}
	
	public function findAllCount(){
		return $this->db->count_all('users');
	}
	
	public function findUserByEncryption($encryption = FALSE){
		if($encryption){
			$this->db->where('status', TRUE);
			$this->db->where('encryption', $encryption);
			$user = $this->db->get('users');
			
			if(!is_null($user))
				return $user;
		}
		return false;
	}
	
	public function save($data) {

		$user = $this->setUserData($data);
		
		try {
			if(!isset($data['id'])){
				$this->db->insert('users',$user);
				$data['id'] = $this->db->insert_id();
			}else{
				//die('cheguei');
				$this->db->where('id',$data['id']);
				$this->db->update('users',$user);
			}
		} catch (PDOException $e) {
			die('erro');
			$error = $e->getMessage();
			die('erro' . $error);
			throw new PDOException($error);
		}
		
		return $this->find($data['id']);
	}
	
	private function setUserData($data){
		$date = date("Y-m-d H:i:s");
		
		$user = array(
			'first_name' => $data['name'],
			'last_name' => $data['lastName'],
			'password' => md5($data['password'])
		);
		
		if(isset($data['email']))
			$user['email'] = $data['email'];
		
		if(isset($data['status']))
			$user['status'] = $data['status'];
		
		if(!isset($data['id'])){
			$user['created'] = $date;
			$user['encryption'] = md5($data['email'].'-'.$data['lastName'].'-'.rand());
		}else
			$user['updated'] = $date;
		
		return $user;
	}
	
	public function delete($user){
		$this->db->delete('users', array('id' => $user->id));		
	}

}