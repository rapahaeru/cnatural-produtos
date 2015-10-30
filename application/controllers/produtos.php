<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function __construct()
       {
			parent::__construct();
			// $this->load->helper('date');
			// $this->load->helper('form');
			$this->load->model('Produtos_model', 'Produtos');

       }

	public function index()
	{

		$products = $this->Produtos->getAllproducts();

		if ($products)
			$data['products'] = $this->formatProductsReturn($products);
		else
			$data['products'] = false;

		$this->load->view('produtos',$data);
	}

	function formatProductsReturn($products)
	{
		if (!$products)
			return false;

		for ($i=0; $i < sizeof($products); $i++) { 
			$products[$i]['custo'] = str_replace('.', ',', $products[$i]['custo']); 
		}

		return $products;
	}

}

/* End of file produtos.php */
/* Location: ./application/controllers/produtos.php */