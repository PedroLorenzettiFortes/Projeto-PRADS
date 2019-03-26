<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Inscrever-se</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>

	<div class='container>
	
		<legend><h1>Formulário - Inscrever-se a Rede Social Cientista de Dados</h1></legend>
		
		<from action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>
		<fieldset>
			<div class="row">
				<label for="nome">Selecionar Foto</label>
				<div class="col-md-2">
					<a href="#" class="thumbnail">
					 <img src="fotos/padrao.jpg" height="190" width="150" id="foto-usuario">
					</a>
				</div>
				<input type="file" name="foto" id="foto" value="foto">
			</div>
			
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o Nome">
				<span class='msg-erro msg-nome'></span>
			</div>
			
			<div class="form-group">
				<label for="sobrenome">Sobrenome</label>
				<input type="sobrenome" class="form-control" id="sobrenome" name="sobrenome" placeholder="Informe seu Sobrenome">
				<span class='msg-erro msg-sobrenome'></span>
			</div>
			
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
				<span class='msg-erro msg-email'></span>
			</div>
			
			<div class="form-group">
				<label for="cientista_dados">Cientista de Dados</label>
				<input type="cientista_dados" class="form-control" id="cientista_dados" maxlength="3" name="cientista_dados" placeholder="Você é um cientista de Dados ?">
				<span class='msg-erro msg-cientista_dados'></span>
			</div>
			
			<div class="form-group">
				<label for="cpf">CPF</label>
				<input type="cpf" class="form-control" id="cpf" name="cpf" maxlength="14" placeholder="Informe seu CPF">
				<span class='msg-erro msg-cpf'></span>
			</div>
			
			<div class="form-group">
				<label for="data_nascimento">Data de Nascimento</label>
				<input type="data_nascimento" class="form-control" id="data_nascimento" name="data_nascimento" maxlength="10" name="data_nascimento">
				<span class='msg-erro msg-data'></span>
			</div>
			
			<div class="form-group">
				<label for="telefone">Telefone</label>
				<input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe seu Telefone">
				<span class='msg-erro msg-telefone'></span>
			</div>
			
			<div class="form-group">
				<label for="celular">Celular</label>
				<input type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe seu Celular">
				<span class='msg-erro msg-celular'></span>
			</div>
			
			<div class="form-group">
				<label for="status">Status</label>
				<select class="form-control" name="status" id="status">
				 <option value=""Selecione o Status</option>
				 <option value="Ativo">Ativo</option>
				 <option value="Inativo">Inativo</option>
				</select>
				<span class='msg-erro msg-status'></span>
			</div>
			
			<input type="hidden" name="acao" value="incluir">
			<button type="submit" class="btn btn-primary" id='boatao'>Gravar</button>
			
			<a href='index.php' class="btn btn-danger">Cancelar</a>
			</fieldset>
		</form>
	
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
			
			
			
			
			
			
			
			
			