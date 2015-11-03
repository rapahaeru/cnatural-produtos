<?php

function config_email($ci){
	$ci->load->library('email');
	$config['protocol'] = 'sendmail';
	$config['charset'] = 'utf-8';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	
	$ci->email->initialize($config);
}

function config_upload($ci, $allowed_types = 'gif|jpg|png'){
	$config['upload_path'] = '../uploads/';
	$config['allowed_types'] = $allowed_types;
	$config['max_size']	= '2000';
	$config['max_width'] = '1024';
	$config['max_height'] = '768';
	
	$ci->load->library('upload', $config);
}

function encrypt($value){
	return md5($value);
}

function string_to_date($date){
	return date_create_from_format('d/m/Y', $date);
}

function delete_file($path){
	unlink($path);
}