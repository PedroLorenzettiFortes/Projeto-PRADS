<?php
require 'conexao.php';

//Recebe o id do cliente via GET
$id_usuario = (isset($_GET['id']))?$_GET['id'];

//valida se existe um id e se ele é numérico
if(!empty($id_usuario)&& is_numeric($id_cliente));

	// Captura os dados dos cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, sobrenome, email, cientista_dados, cpf, data_nascimento, telefone, celular, status, foto FROM tbl_usuarios WHERE id =:id';
	$stm = $conexao->prepare($sql);
	$stm-> bindValue(':id',$id_usuario);
	$stm->execute();
	$usuario = $stm->fetch(PDO::FECTH_OOB);
	
	if(!empty($usuario)):
	
	// Formata a data no formato nacional
		$array_data = explode('-',$cliente->data_nascimento);
		$data_formatada = $array_data[2].'/'.$array_data[1].'/'.$array_data[0];
		
	endif;
endif;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edição de Usuário</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset> 
			<legend><h1>Formulário - Edição de Usuário</h1>
			
			<?php if(empty($cliente)):?>
				<h3 class="text-center text-danger">Usuário não encontrado!</h3>
			<?php else:?>
				<form action="action_usuario.php" method="post" id='form-contato' enctype='multipart/form-data'>
				 <div class="row">
				   <label for="nome">Alterar Foto</label>
				  <div class="col-md-2">
				   <a href="#" class="thumbnail">
					 <img src="fotos/<?=$usuario->foto?>"height="190" width="150" id="foto-usuario">
					 </a>
				   </div>
					<input type="file" name="foto" id="foto" value="foto">
				</div>
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->nome?>" placeholder="informe o nome">
					<span class="msg-erro msg-nome"></span>
				</div>
					
				<div class="form-group">
					<label for="sobrenome">Sobrenome</label>
					<input type="sobrenome" class="form-control" id="sobrenome" name="sobrenome" value="<?=$usuario->sobrenome?>" placeholder="informe seu Sobrenome">
					<span class="msg-erro msg-sobrenome"></span>
				</div>
				
				<div class="form-group">
					<label for="email">E-mail</label>
					<input type="email" class="form-control" id="email" name="email" value="<?=$usuario->email?>" placeholder="informe o E-mail">
					<span class="msg-erro msg-email"></span>
				</div>
				
				<div class="form-group">
					<label for="cientista_dados">Cientista de Dados</label>
					<input type="cientista_dados" class="form-control" id="cientista_dados" maxlength="3" name="cientista_dados" value="<?=$usuario->cientista_dados?>" placeholder="Você é um cientista de Dados ?">
					<span class="msg-erro msg-cientista_dados"></span>
				</div>
				
					<div class="form-group">
					<label for="cpf">CPF</label>
					<input type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" value="<?=$usuario->cpf?>" placeholder="Informe seu CPF ">
					<span class="msg-erro msg-cpf"></span>
				</div>
				
					<div class="form-group">
					<label for="data_nascimento">Data de Nascimento</label>
					<input type="data_nascimento" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento" value="<?=$usuario->data_nascimento?>" placeholder="Informe sua data de Nascimento">
					<span class="msg-erro msg-data_nascimento"></span>
				</div>
				
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" value="<?=$usuario->telefone?>" placeholder="Informe seu telefone">
					<span class="msg-erro msg-telefone"></span>
				</div>
				
				<div class="form-group">
					<label for="celular">Celular</label>
					<input type="celular" class="form-control" id="celular" maxlength="13" name="celular" value="<?=$usuario->celular?>" placeholder="Informe seu celular">
					<span class="msg-erro msg-celular"></span>
				</div>
				
				<div class="form-group">
					<label for="status">Status</label>
					<option value="<?=$usuario->status?>"><?=$usuario->status?></option>
					<option value="Ativo">Ativo</option>
					<option value="Inativo">Inatico</option>
					</select>
					<span class='msg-erro msg-status'></span>
				</div>
				
					<input type="hidden" name="acao" value="editar"
					<input type="hidden" name="id" value="<?=$usuario->id?>">
					<input type="hidden" name="foto_atual" value="<?=$usuario->foto?>">
					<button type="submit" class="btn-primary" id='botao'>Gravar</button>
					
					<a href='index.php' class=" btn btn-danger">Cancelar</a>
				</form>
			?php endif;?>
		</fieldset>
		
		</div>
		<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
			
		
			
					
					
					
					
					
				
				
				
	
	
	
	
	
	
	
	
	
	
	
	
	
	