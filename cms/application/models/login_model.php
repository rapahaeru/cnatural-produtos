<?php
class Login_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->model('Users_model', 'Users');
	}

	public function login($data = array()){
		if(!empty($data)){
			$data['status'] = TRUE;
			$data['password'] = encrypt($data['password']);
			
			$this->db->where('email',$data['email']);
			$this->db->where('password',$data['password']);
			$this->db->where('status',$data['status']);
			$user = $this->db->get('users');
			
			if(!is_null($user->row()))
				return $user->row();
		}
		return false;
	}
	
	public function resetPassword($data = array()){
		if(!empty($data)){
			$data['status'] = TRUE;
			
			$this->db->where('email',$data['email']);
			$this->db->where('status',$data['status']);
			$user = $this->db->get('users');
			
			if(!is_null($user->row()))
				return $user->row();
		}
		return false;		
	}
	
	public function sendResetPasswordEmail($user = FALSE){
		if($user){
			$encryption = $user->encryption;
			$url = base_url('/login/changePassword/'.$encryption);
			
			config_email($this);
			
			$this->email->from('admin@no-reply.com', 'Admin');
			$this->email->to($user->email);
			$this->email->subject('Solicitação de alteração de senha.');
			$message = '<h2>Solicitação de alteração de senha.</h2><br />';
			$message .= 'Acesse o link e altere sua senha:<br />';
			$message .= '<a href="'.$url.'">'.$url.'</a>';
			$this->email->message($message);
			
			$this->email->send();
// 			echo $this->email->print_debugger();
		}else
			return false;
	}
	
	public function updatePassword($user = FALSE, $data = FALSE){
		if($user && $data){
			$data = array(
				'password' => md5($data['password'])
			);

			$this->db->where('id', $user->id);
			$this->db->update('users', $data);
		}else
			return false;
	}
}