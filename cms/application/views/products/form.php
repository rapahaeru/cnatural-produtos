<div id="container">
	<h2>
		<?php (isset($data))?'Editar':'Novo'?> produto
	</h2>
	
	<?php if(isset($message)){?>
	<p class="message"><?php echo $message?></p>
	<?php }elseif(isset($error)){?>
	<p class="error"><?php echo $error?></p>
	<?php }?>
	<?php //var_dump($data) ?>
	<form action="<?php echo base_url("products/save")?>" name="frmUser" id="frmUser" method="post">
		<?php if(isset($data)){
			echo form_hidden('id', $data->id);
		}?>
		<fieldset>
			<dl>
				<dt><label for="nome">Nome:</label></dt>
				<dd>
					<input type="text" name="nome" id="nome" maxlength="255" class="required" value="<?php echo (isset($data))?$data->nome:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="custo">Preço:</label></dt>
				<dd>
					<input type="text" name="custo" id="custo" maxlength="255" class="required" value="<?php echo (isset($data))?$data->custo:''?>" />
				</dd>
			</dl>			
			<dl>
				<dt><label for="quantidade">Quantidade em estoque:</label></dt>
				<dd>
					<input type="text" name="quantidade" id="quantidade" maxlength="255" class="required" value="<?php echo (isset($data))?$data->quantidade:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="beneficios">Beneficios:</label></dt>
				<dd>
					<input type="text" name="beneficios" id="beneficios" maxlength="255" value="<?php echo (isset($data))?$data->beneficios:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="maleficios">Maleficios:</label></dt>
				<dd>
					<input type="text" name="maleficios" id="maleficios" maxlength="255" value="<?php echo (isset($data))?$data->maleficios:''?>" />
				</dd>
			</dl>
			<dl>
				<dt><label for="status">categoria:</label></dt>
				<dd>
					<?php 
					$options = array();
					for ($i=0; $i < sizeof($categories); $i++) { 
						$options[$categories[$i]['id']] = $categories[$i]['categoria'];
					}
					if(isset($data))
						echo form_dropdown('categoria', $options, $data->categoria_id);
					else
						echo form_dropdown('categoria', $options);
					?>
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