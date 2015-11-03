<div id="container">
	<h2>
		<?php (isset($data))?'Editar':'Novo'?> usuário
	</h2>
	
	<?php if(isset($message)){?>
	<p class="message"><?php echo $message?></p>
	<?php }elseif(isset($error)){?>
	<p class="error"><?php echo $error?></p>
	<?php }?>
	
	<form action="<?php echo base_url("users/save")?>" name="frmUser" id="frmUser" method="post">
		<?php if(isset($data)){
			echo form_hidden('id', $data->id);
		}?>
		<fieldset>
			<dl>
				<dt><label for="name">Nome:</label></dt>
				<dd>
					<input type="text" name="name" id="name" maxlength="255" class="required" value="<?php echo (isset($data))?$data->first_name:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="lastName">Sobrenome:</label></dt>
				<dd>
					<input type="text" name="lastName" id="lastName" maxlength="255" class="required" value="<?php echo (isset($data))?$data->last_name:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="email">E-mail:</label></dt>
				<dd>
					<input type="text" name="email" maxlength="255" id="email"<?php echo (isset($data) && (strtolower($data->email) == 'admin@admin.com'))?'disabled="disabled"':''?> class="required email" value="<?=(isset($data))?$data->email:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="password">Senha:</label></dt>
				<dd>
					<input type="password" name="password" id="password" maxlength="32" class="required" />
				</dd>
			</dl>
			<?php if((!isset($data)) || (isset($data) && (strtolower($data->email) != 'admin@admin.com'))){?>
			<dl>
				<dt><label for="status">Status:</label></dt>
				<dd>
					<?php 
					$options = array(
						'1'  => 'Ativado',
						'0'    => 'Desativado'
					);
					if(isset($data))
						echo form_dropdown('status', $options, $data->status);
					else
						echo form_dropdown('status', $options);
					?>
				</dd>
			</dl>
			<?php }?>
			<button type="submit" title="Salvar">Salvar</button>
		</fieldset>
	</form>
	
</div>