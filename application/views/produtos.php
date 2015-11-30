<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title>Conteúdo Natural : Lista de produtos</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->config['base_view']?>assets/bootstrap3.3.5/css/bootstrap.css ">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->config['base_view']?>assets/css/fontes.css ">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->config['base_view']?>assets/css/style.css ">
</head>
<body>
	<header>
		<div class="area">
			<div class="content">
				<div class="header-content">
					<h1>Conteúdo Natural</h1>
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="area">
			<div class="content content-header">
				<h2> <span class="glyphicon glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Quais produtos você deseja encomendar?</h2>
				<p>Basta selecionar a quantidade de cada item. </p>
			</div>
		</div>	
	</section>

	<section>
		<div class="area">
			<div class="content content-list">
				<table class="table table-striped table-bordered table-hover">
					<tr>
						<th width="10%">Quantidade</th>
						<th>Produto</th>
						<th width="15%">Preço/Kg</th>
					</tr>
					<?php for ($i=0; $i < sizeof($products) ; $i++) : ?>
						<tr>
							<td>
								<select class="form-control">
									<?php for ($x=0; $x <= $products[$i]['quantidade'] ; $x++) { ?>
									<option value="<?php echo $x?>"><?php echo $x?></option>	
									<?php }?>
								</select>
							</td>
							<td><?php echo (($products[$i]['quantidade'] == 0) ? '<strong class="text-danger">(esgotado)</strong>   ' : '')?><?php echo $products[$i]['nome'];?></td>
							<td>R$ <?php echo $products[$i]['custo'];?></td>
						</tr>
					<?php endfor; ?>
						
				</table>
			</div>
		</div>	
	</section>
	<section class="section-form">
		<div class="area">
			<div class="content content-form">
				<h3> <span class="glyphicon glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Preencha os campos abaixo para que possamos entrar em contato.</h3>
				<p>Enviaremos um email com os dados de sua entrega e o link do PagSeguro para que o pagamento seja realizado</p>

				<form class="form-horizontal">
				  <div class="form-group">
				    <label for="input-email" class="col-sm-1 control-label">Email</label>
				    <div class="col-sm-10">
				      <input type="text" name="email" id="input-email" placeholder="Informe seu e-mail" class="form-control" value="" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input-nome" class="col-sm-1 control-label">Nome</label>
				    <div class="col-sm-10">
				      <input type="text" name="nome" id="input-nome" placeholder="Digite seu nome" class="form-control" value="" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input-descricao" class="col-sm-1 control-label">Descrição</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="descricao" id="input-descricao" placeholder="Coloque aqui suas observações, dúvidas ou exigências ..." rows="3"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="input-address" class="col-sm-1 control-label">Endereço</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" name="address" id="input-address" placeholder="" rows="3"></textarea>
				      <p>(Se você é morador do condomínio Alphaview, seu frete é grátis. Informe apenas a torre e o apartamento)</p>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-1 col-sm-10">
				      <button class="btn btn-success">Manda !</button>
				    </div>
				  </div>
				</form>				
			</div>
		</div>	
	</section>	


<!-- 	<aside>
		
	</aside> -->
	<footer>
		<div class="area">
			<div class="content footer">
				<h4> <span class="glyphicon glyphicon glyphicon-hand-right" aria-hidden="true"></span> fale conosco</h4>
				<p>faleconosco@conteudonatural.com.br</p>
				<p>(11) 9 9181 3130</p>
			</div>
		</div>	
	</footer>

	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</body>
</html>