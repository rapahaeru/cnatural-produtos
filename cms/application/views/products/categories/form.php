<div id="container">
	<h2>
		<?php (isset($data))?'Editar':'Novo'?> categoria
	</h2>
	<a href="<?php echo base_url('products/categories')?>" class="menu-interno">Lista de categorias</a>	
	
	<?php if(isset($message)){?>
	<p class="message"><?php echo $message?></p>
	<?php }elseif(isset($error)){?>
	<p class="error"><?php echo $error?></p>
	<?php }?>
	<?php //var_dump($data) ?>
	<form action="<?php echo base_url("products/categorie/save")?>" name="frmUser" id="frmUser" method="post">
		<?php if(isset($data)){
			echo form_hidden('id', $data->id);
		}?>
		<fieldset>
			<dl>
				<dt><label for="categoria">Categoria:</label></dt>
				<dd>
					<input type="text" name="categoria" id="categoria" maxlength="255" class="required" value="<?php echo (isset($data))?$data->categoria:''?>" />
				</dd>
			</dl>
		
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

			<button type="submit" title="Salvar">Salvar</button>
		</fieldset>
	</form>
	
</div>