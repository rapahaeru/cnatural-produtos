<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotFound extends CI_Controller {

	public function index(){
		$data['view'] = "404";
		$this->load->view('template',$data);
	}
}

/* End of file notfound.php */
/* Location: ./application/controllers/notfound.php */