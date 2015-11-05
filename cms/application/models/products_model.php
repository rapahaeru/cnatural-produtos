<?php
class Products_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function find($id = FALSE, $offset = 0, $limit = 10){
		if($id){
			$this->db->select('prod.id as id');
			$this->db->select('prod.nome');
			$this->db->select('prod.quantidade');
			$this->db->select('prod.beneficios');
			$this->db->select('prod.maleficios');
			$this->db->select('prod.custo');
			$this->db->select('prod.categoria_id');
			$this->db->select('prod.status');
			$this->db->select('procat.categoria');			
			$this->db->where('prod.id', $id);
			$this->db->join('procat_produtocategoria as procat','procat.id = prod.categoria_id','inner');
			$product = $this->db->get('prod_produtos as prod');
		}else{
			$this->db->select('prod.id as id');
			$this->db->select('prod.nome');
			$this->db->select('prod.quantidade');
			$this->db->select('prod.beneficios');
			$this->db->select('prod.maleficios');
			$this->db->select('prod.custo');
			$this->db->select('prod.categoria_id');
			$this->db->select('prod.status');
			$this->db->select('procat.categoria');
			$this->db->order_by('prod.nome');
			$this->db->join('procat_produtocategoria as procat','procat.id = prod.categoria_id','inner');
			$products = $this->db->get('prod_produtos as prod', $limit, $offset);
		}
		
		if($id && !is_null($product))
			return $product;
		elseif(!is_null($products))
			return $products;
		else
			return false;
	}
	
	public function findAllCount(){
		return $this->db->count_all('prod_produtos');
	}
	
	// public function findUserByEncryption($encryption = FALSE){
	// 	if($encryption){
	// 		$this->db->where('status', TRUE);
	// 		//$this->db->where('encryption', $encryption);
	// 		$user = $this->db->get('users');
			
	// 		if(!is_null($user))
	// 			return $user;
	// 	}
	// 	return false;
	// }
	
	public function save($data) {

		$product = $this->setProductData($data);
		
		try {
			if(!isset($data['id'])){
				$this->db->insert('prod_produtos',$product);
				$data['id'] = $this->db->insert_id();
			}else{
				$this->db->where('id',$data['id']);
				$this->db->update('prod_produtos',$product);
			}
		} catch (PDOException $e) {
			$error = $e->getMessage();
			throw new PDOException($error);
		}
		
		return $this->find($data['id']);
	}
	
	private function setProductData($data){
		//$date = date("Y-m-d H:i:s");
		
		$product = array(
			'nome' 			=> $data['nome'],
			'quantidade' 	=> $data['quantidade'],
			'beneficios' 	=> $data['beneficios'],
			'maleficios' 	=> $data['maleficios'],
			'custo' 		=> $data['custo'],
			'categoria_id' 	=> $data['categoria']);
		
		
		if(isset($data['status']))
			$product['status'] = $data['status'];
		
		if(!isset($data['id'])){
			//$product['created'] = $date;
			//$product['encryption'] = md5($data['email'].'-'.$data['lastName'].'-'.rand());
		}
		//else
		//	$product['updated'] = $date;
		
		return $product;
	}

	public function delete($product){
		$this->db->delete('prod_produtos', array('id' => $product->id));		
	}

	public function getCategories($status=FALSE){
		if (!$status){
			$categories = $this->db->get('procat_produtocategoria');
		}else{
			$this->db->where('status',$status);
			$categories = $this->db->get('procat_produtocategoria');			
		}

		if (!is_null($categories))
			return $categories;
		else
			return false;

	}

	public function find_categorie($id = FALSE)
	{

		if($id){
			$this->db->where('id', $id);
			$product = $this->db->get('procat_produtocategoria');
		}else{
			$this->db->order_by('categoria');
			$products = $this->db->get('procat_produtocategoria');
		}
		
		if($id && !is_null($product))
			return $product;
		elseif(!is_null($products))
			return $products;
		else
			return false;		

	}

	public function save_categorie($data)
	{
		$categorie = $this->setCategorieData($data);
		
		try {
			if(!isset($data['id'])){
				$this->db->insert('procat_produtocategoria',$categorie);
				$data['id'] = $this->db->insert_id();
			}else{
				$this->db->where('id',$data['id']);
				$this->db->update('procat_produtocategoria',$categorie);
			}
		} catch (PDOException $e) {
			$error = $e->getMessage();
			throw new PDOException($error);
		}
		
		return $this->find_categorie($data['id']);
	}

	private function setCategorieData($data){
		//$date = date("Y-m-d H:i:s");
		
		$categorie = array('categoria' 	=> $data['categoria']);
		
		if(isset($data['status']))
			$categorie['status'] = $data['status'];
		
		if(!isset($data['id'])){
			//$product['created'] = $date;
			//$product['encryption'] = md5($data['email'].'-'.$data['lastName'].'-'.rand());
		}
		//else
		//	$product['updated'] = $date;
		
		return $categorie;
	}	

	public function delete_categorie($categorie){
		$this->db->delete('procat_produtocategoria', array('id' => $categorie->id));		
	}

}
