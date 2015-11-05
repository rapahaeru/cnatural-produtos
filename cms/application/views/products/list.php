<div id="container">
	<h2>Lista de produtos</h2>
	<a href="<?php echo base_url('products/categories')?>" class="menu-interno">Categorias</a>
	
	<?php if(isset($message)){?>
		<p class="message"><?php echo $message?></p>
	<?php }?>
	
	<?php if($result){?>
	<table cellpadding="0" cellspacing="0" border="0" class="list">
		<colgroup>
			<col width="46%" />
			<col width="45%" />
			<col />
		</colgroup>
		<thead>
			<tr align="left">
				<th>Nome</th>
				<th>Quantidade</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($result as $r){?>
			<tr>
				<td><?php echo $r->nome?></td>
				<td><?php echo $r->quantidade?></td>
				<td class="action">
					<a href="<?php echo base_url('products/edit/'.$r->id)?>" class="edit" title="Editar">Editar</a>
					<a href="<?php echo base_url('products/delete/'.$r->id)?>" class="delete" title="Excluir">Excluir</a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php }?>
	<?php if($this->pagination->total_rows > $this->pagination->per_page){?>	
	<div class="pagination">
		<?php echo $this->pagination->create_links();?>
	</div>
	<?php }?>
	<ul class="actions">
		<li><a href="<?php echo base_url("products/create")?>" class="new" title="Novo">Novo</a></li>
	</ul>
</div>