<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo $this->config->config['project']?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->config['base_view']?>assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->config['base_view']?>assets/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->config['base_view']?>assets/css/smoothness/jquery-ui.css" />
	<script src="<?php echo $this->config->config['base_view']?>assets/js/modernizr.js"></script>
</head>
<body>
	<header>
		<h1><a title="<?=$this->config->item('site_name');?>" href="<?=base_url()?>"><?=$this->config->item('site_name');?></a></h1>
		<div class="userinfo">
			<p>Olá, <a href="<?=base_url("users/myprofile")?>" title="<?=$this->session->userdata('name')?>"><?=$this->session->userdata('name')?></a></p>
			<ul>
				<li><a href="<?=base_url("users/myprofile")?>" class="settings" title="Meus dados">Meus dados</a></li>
				<li><a href="<?=base_url("login/logout")?>" class="logout" title="Sair">Sair</a></li>
			</ul>
		</div>
	</header>
	<div id="main">
		<?php echo $this->load->view('includes/menu');?>
		<?php echo $this->load->view(''.$view);?>
	</div>
	<script src="<?php echo $this->config->config['base_view']?>assets/js/jquery.js"></script>
	<script src="<?php echo $this->config->config['base_view']?>assets/js/jquery-ui.js"></script>
	<script src="<?php echo $this->config->config['base_view']?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo $this->config->config['base_view']?>assets/js/script.js"></script>
</body>
</html>
