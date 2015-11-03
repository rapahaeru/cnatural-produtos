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
	
		<form method="post" action="<?=base_url('/login/updatePassword')?>" id="frmUpdatePassword" name="frmUpdatePassword">
			<fieldset>
				<?if(isset($error)){?>
				<p class="error"><?=$error?></p>
				<?}?>
				<?if(isset($message)){?>
				<p class="message"><?=$message?></p>
				<?}?>
				<input type="hidden" name="encryption" value="<?=$encryption?>" />
				<dl>
					<dt><label for="password">Senha</label></dt>
					<dd>
						<input type="password" autofocus id="password" name="password" class="required" />
					</dd>
				</dl>
				<dl>
					<dt><label for="passwordConfirm">Confirmar senha</label></dt>
					<dd>
						<input type="password" id="passwordConfirm" name="passwordConfirm" class="required" />
					</dd>
				</dl>
				<p class="submit">
					<button type="submit" title="Salvar">Salvar</button>
				</p>
			</fieldset>
		</form>
	</div>
	<script src="/cms/templates/default/assets/js/jquery.js"></script>
	<script src="/cms/templates/default/assets/js/jquery.validate.min.js"></script>
	<script src="/cms/templates/default/assets/js/script.js"></script>
</body>
</html>
