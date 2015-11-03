<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?php echo $this->config->config['project']?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->config['base_view']?>assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->config->config['base_view']?>assets/css/style.css" />
	<script src="<?php echo $this->config->config['base_view']?>assets/js/modernizr.js"></script>
</head>
<body class="login">

	<div id="login">
		<h1>
			<a title="<?=$this->config->item('site_name');?>" href="#"><?=$this->config->item('site_name');?></a>
		</h1>
	
		<form method="post" action="<?=base_url('/login/connect')?>" id="frmLogin" name="frmLogin">
			<fieldset>
				<?php if(isset($error)){?>
				<p class="error"><?php echo $error?></p>
				<?php }?>			
				<dl>
					<dt><label for="email">E-mail / Nome de usuário</label></dt>
					<dd>
						<input type="text" autofocus id="email" name="email" />
					</dd>
				</dl>
				<dl>
					<dt><label for="password">Senha</label></dt>
					<dd>
						<input type="password" id="password" name="password" />
					</dd>
				</dl>
				<p class="submit">
					<a href="<?=base_url("login/forgot")?>">Esqueceu sua senha?</a>
					<button type="submit" title="Login">Login</button>
				</p>
			</fieldset>
		</form>
	</div>
	
</body>
</html>
