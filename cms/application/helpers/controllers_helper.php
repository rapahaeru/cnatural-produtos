<?php

function config_pagination($ci,$url,$data){
	$ci->load->library('pagination');
	$config['uri_segment'] = 2;
	$config['base_url'] = $url;
	$config['total_rows'] = $data['total_rows'];
	$config['per_page'] = $data['per_page'];
// 	$config['use_page_numbers'] = TRUE;
	
	$ci->pagination->initialize($config);
}