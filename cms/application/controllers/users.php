<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	private $messsage;
	private $per_page = 10;
	
	function __construct(){
		// Call the Model constructor
		parent::__construct();
		$this->load->model('Users_model', 'Users');
	}
	
	public function index()
	{
		$page = $this->uri->segment($this->uri->total_segments());
		if(is_numeric($page))
			$this->listing($page);
		else
			$this->listing();
	}
	
	public function listing($page = 0){
		$data['total_rows'] = $this->Users->findAllCount();
		$data['per_page'] = $this->per_page;
		$users = $this->Users->find(FALSE,$page,$this->per_page);
		$data['result'] = $users->result();
		
		config_pagination($this,base_url('users'),$data);
		
		if(!empty($this->message))
			$data['message'] = $this->message;
		
		//var_dump($data['result']);

		$data['view'] = "users/list";
		$this->load->view('template',$data);
	}
	
	public function save(){

		try {
			$user = $this->Users->save($this->input->post());
			$user = $user->row();
			$this->message = "Salvo com sucesso!";
			$this->edit($user->id);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();

			$this->create();
		}
	}
	
	public function create(){
		if(!empty($this->error))
			$data['error'] = $this->error;
		
		$data['view'] = "users/form";
		$this->load->view('template',$data);		
	}
	
	public function edit($id){
		$user = $this->Users->find($id);
		$data['data'] = $user->row();
		
		if(!empty($this->message))
			$data['message'] = $this->message;
		
		$data['view'] = "users/form";
		$this->load->view('template',$data);
	}
	
	public function delete($id){
		$user = $this->Users->find($id);
		$this->Users->delete($user->row());
		
		$this->message = "Excluido com sucesso!";
	
		$this->listing();
	}
	
	public function myProfile(){
		$this->edit($this->session->userdata("id"));
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */