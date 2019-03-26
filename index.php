<?php
require 'conexao.php';

//Recebe o termo de pesquisar se existir
$termo = (isset($_GET['termo']))?$_GET['termo']:false;

//Verifica se termo da pesquisa está vazio, se extiver executa uma consulta completa
if(empty($_termo)):
	
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome,sobrenome, email, cientista_dados, status, foto FROM tbl_usuarios';
	$stm = $conexao->prepare($sql);
//	$stm->execute();
//	$usuarios = $stm->fecthAll(PDO::FETCH_OBJ);
	
else:

	//Executa uma consulta baseada no termo de pesquisa como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, sobrenome, email, cientista_dados, status, foto FROM tbl_usuarios WHERE nome LIKE:nome OR sobrenome LIKE:sobrenome OR email LIKE:email OR cientista_dados LIKE: cientista_dados';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome',$termo.'%');
    $stm->bindValue(':sobrenome',$termo.'%');
	$stm->bindValue(':email',$termo.'%');
	$stm->bindValue(':cientista_dados',$termo.'%');
	$stm-> execute();
	$usuarios = $stm->fecthAll(PDO::FETCH_OBJ);
endif;
?>
<html>
<head>
	<meta charset="utf-8"
	<title>Usuários Inscritos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
		
			<!-- CAbeçalho da Listagem -->
			<center><legend><h1>Usuários Inscritos</h1></legend></center>
			
			
			<!--Formulário de Pesquisa-->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
					<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe Nome ou E-mail">
				</div>
				<button type="submit" class="btn btn-primary">Pesquisar</button>
				<a href='index.php' class="btn btn-primary">Ver todos</a>
			</form>
			
			<!--link para página de inscrição-->
			<a href='inscrever.php' class="btn btn-success pull-right">Inscrever-se</a>
			<div class='clearfix'></div>
			
			<?php if(!empty($usuarios)):?>
			
			<!--Tabela de usuário -->
			<table class="table table-striped">
				<tr class='active'>
					<th>Foto</th>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>E-mail</th>
					<th>Cientista de Dados</th>
					<th>Status</th>
					<th>Ação</th>
				</tr>
				
				<?php foreach($usuarios as $usuario):?>
					<tr>
						<td><img src='fotos/<?=$usuario->foto?>' height='40' width='40'></td>
						<td><?=$usuario->nome?></td>
						<td><?=$usuario->sobrenome?></td>
						<td><?=$usuario->email?></td>
						<td><?=$usuario->cientista_dados?></td>
						<td><?=$usuario->status?></td>
						<td>
							<a href='editar.php?id=<?=$usuario->id?>' class="btn btn-primary">Editar</a>
							<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?$usuario->id?>">Excluir</a>
						</td>
					</tr>
				<?php endforeach;?>
			</table>
			
			
			<?php else:?>
			
				<!--Mensagem caso não exista usuário ou não encontrado -->
				<h3 class="text-center text-primary">Não existem Usuários Inscritos!</h3>
			<?php endif;?> 
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>
				
					
				
			
			
			
			
			
			
			
			
			
			
			
	