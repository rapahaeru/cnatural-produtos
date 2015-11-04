<?php
class Session{
	
	private $CI;
	private $white_list;
	
	function __construct() {
		$this->CI = get_instance();
		$this->white_list = array('dashboard','users'); // lista de URIs que nao precisa estar logado
	}
	
	function check_session() {
		if (!$this->CI->session->userdata('logged_in') && in_array($this->CI->router->fetch_class(), $this->white_list)) {
			redirect('/login');
		}
	}
	
}