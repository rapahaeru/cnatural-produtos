<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', true);
class Products extends CI_Controller {

	private $messsage;
	private $per_page = 10;
	
	function __construct(){
		// Call the Model constructor
		parent::__construct();
		$this->load->model('Products_model', 'Products');
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
		$data['total_rows'] = $this->Products->findAllCount();
		$data['per_page'] 	= $this->per_page;
		$products 			= $this->Products->find(FALSE,$page,$this->per_page);
		$data['result'] 	= $products->result();
		$categories 		= $this->getCategories();
		$data['categories'] = $categories;
		
		config_pagination($this,base_url('products'),$data);
		
		if(!empty($this->message))
			$data['message'] = $this->message;
		
		//var_dump($data['result']);

		$data['view'] = "products/list";
		$this->load->view('template',$data);
	}
	
	public function save(){

		try {
			$product = $this->Products->save($this->input->post());
			$product = $product->row();
			$this->message = "Salvo com sucesso!";
			$this->edit($product->id);
		} catch (PDOException $e) {
			$this->error = $e->getMessage();

			$this->create();
		}
	}
	
	public function create(){
		if(!empty($this->error))
			$data['error'] = $this->error;
		
		$categories 		= $this->getCategories();
		$data['categories'] = $categories;
		$data['view'] = "products/form";
		
		$this->load->view('template',$data);		
	}
	
	public function edit($id){
		$product = $this->Products->find($id);
		$data['data'] = $product->row();
		$categories 		= $this->getCategories();
		$data['categories'] = $categories;

		if(!empty($this->message))
			$data['message'] = $this->message;
		
		$data['view'] = "products/form";
		$this->load->view('template',$data);
	}
	
	public function delete($id){
		$product = $this->Products->find($id);
		$this->Products->delete($product->row());
		
		$this->message = "Excluido com sucesso!";
	
		$this->listing();
	}
	
	// public function myProfile(){
	// 	$this->edit($this->session->userdata("id"));
	// }

	public function getCategories()
	{
		$categories 		= $this->Products->getCategories();
		if($categories)
			return $categories->result_array();
		else
			return false;
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */