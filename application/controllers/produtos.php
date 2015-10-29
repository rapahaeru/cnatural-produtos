<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
       {
			parent::__construct();
			// $this->load->helper('date');
			// $this->load->helper('form');
			$this->load->model('Produtos_model', 'Produtos');

       }

	public function index()
	{
		//echo "entrei";
		//exit();

		$products = $this->Produtos->getAllproducts();
		if ($products)
			$data['products'] = $products;
		else
			$data['products'] = false;

		$this->load->view('produtos',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */