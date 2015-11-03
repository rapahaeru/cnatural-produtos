<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $error;
	private $message;
	
	function __construct(){
		// Call the Model constructor
		parent::__construct();
		$this->load->model('Login_model', 'Login');
		$this->load->model('Users_model', 'Users');
	}
	
	public function index()
	{
		$data = array();
		// if(!empty($this->error))
		// 	$data['error'] = $this->error;

		
		$this->load->view('login/login',$data);
	}
	
	public function connect(){
		if($login = $this->Login->login($this->input->post())){
			$this->session->set_userdata('logged_in', TRUE);
			$this->session->set_userdata('id', $login->id);
			$this->session->set_userdata('name', $login->first_name);
			$this->session->set_userdata('email', $login->email);
			//echo "entrei"; exit();
			redirect('dashboard');
		}else{
			$this->error = "Usuário e senha não encontrado.";
			
			$this->index();
		}
	}
	
	public function forgot(){
		$data = array();
		
		if(!empty($this->error))
			$data['error'] = $this->error;
		if(!empty($this->message))
			$data['message'] = $this->message;
		
		$this->load->view('login/forgot',$data);
	}
	
	public function resetPassword(){
		if($user = $this->Login->resetPassword($this->input->post())){
			$send = $this->Login->sendResetPasswordEmail($user);
			
			$this->message = "Acesse seu e-mail e siga as instruções para alterar sua senha.";
			
		}else{
			$this->error = "E-mail não encontrado.";
		}
		$this->forgot();
	}
	
	public function changePassword($encryption){
		$data['encryption'] = $encryption;
		
		if(!empty($this->error))
			$data['error'] = $this->error;
		if(!empty($this->message))
			$data['message'] = $this->message;
		
		$this->load->view('login/changePassword',$data);
	}
	
	public function updatePassword(){
		if($user = $this->Users->findUserByEncryption($this->input->post('encryption'))){
			$data['password'] = $this->input->post('password');
			$this->Login->updatePassword($user->row(),$data);
			
			$this->index();
		}else
			return false;
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */