<div id="container">
	<h2>Lista de usuários</h2>
	
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
				<th>E-mail</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($result as $r){?>
			<tr>
				<td><?php echo $r->first_name?></td>
				<td><?php echo $r->email?></td>
				<td class="action">
					<a href="<?php echo base_url('users/edit/'.$r->id)?>" class="edit" title="Editar">Editar</a>
					<?php if(strtolower($r->email) != 'admin@admin.com'){?>
						<a href="<?php echo base_url('users/delete/'.$r->id)?>" class="delete" title="Excluir">Excluir</a>
					<?php }?>
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
		<li><a href="<?php echo base_url("users/create")?>" class="new" title="Novo">Novo</a></li>
	</ul>
</div>