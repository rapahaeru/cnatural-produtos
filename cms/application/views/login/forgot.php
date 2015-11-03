<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title><?=$this->config->item('site_name');?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" media="all" href="/cms/templates/default/assets/css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="/cms/templates/default/assets/css/style.css" />
	<script src="/cms/templates/default/assets/js/modernizr.js"></script>
</head>
<body class="login">

	<div id="login">
		<h1>
			<a title="<?=$this->config->item('site_name');?>" href="<?=base_url()?>"><?=$this->config->item('site_name');?></a>
		</h1>
	
		<form method="post" action="<?=base_url('/login/resetPassword')?>" id="frmForgot" name="frmForgot">
			<fieldset>
				<?if(isset($error)){?>
				<p class="error"><?=$error?></p>
				<?}?>
				<?if(isset($message)){?>
				<p class="message"><?=$message?></p>
				<?}?>
				<dl>
					<dt><label for="email">E-mail</label></dt>
					<dd>
						<input type="text" autofocus id="email" name="email" />
					</dd>
				</dl>
				<p class="submit">
					<button type="submit" title="Enviar">Enviar</button>
				</p>
			</fieldset>
		</form>
	</div>
	
</body>
</html>
