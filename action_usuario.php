<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Inscreva-se </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php
		require 'conexao.php';
		
		// Atribui uma conexao PDO
		$conexao = conexao::getInstance();
		
		// Recebe os dados enviados pela submissão
		$acao = (isset($_POST['acao']))? $_POST['acao']:";
		$id = (isset($_POST['id']))? $_POST['id']:";
		$nome = (isset($_POST['nome']))? $_POST['nome']:";
		$sobrenome = (isset($_POST['sobrenome']))? $_POST['sobrenome']:";
		$cpf = (isset($_POST['cpf']))? str_replace(array('.','-'),",$_POST['cpf']:";
		$email = (isset($_POST['email']))? $_POST['email']:";
		$cientista_dados = (isset($_POST['cientista_dados']))? $_POST['cientista_dados']:";
		$foto_atual = (isset($_POST['foto_atual']))? $_POST['foto_atual']:";
		$data_nascimento = (isset($_POST['data_nascimento']))? $_POST['data_nascimento']:";
		$telefone = (isset($_POST['telefone']))? str_replace(array('-',''),",$_POST['telefone']:";
		$celular = (isset($_POST['celular']))? str_replace (array('-',''),",$_POST['celular']:"
		$status = (isset($_POST['status']))? $_POST['status']:";
		
		// Valida os dados recebidos
		$mensagem - ";
		if ($acao == 'editar' && =="):
			$mensagem .='<li> ID do registros desconhecido.</li>';
		endif;
		
		//Se for ação diferente de excluir valida os dados obrigatórios
		if($acao != 'excluir'):
			if($nome == "|| strlen($nome)<3):
				$mensagem .= '<li>Favor preencer o Nome.'</li>';
			endif;
			
			if($cpf == "):
				$mensagem .= '<li>Favor preencher o CPF.</li>';
			elseif(strlen($cpf) < 11):
				$mensagem .= '<li>Formato do CPF inválido.</li>';
			endif;
			
			if($email == "):
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
			elseif(!fiter_var($email, FILTER_VALIDATE_EMAIL));
				$mensagem .= '<li>Formato do E-mail inválido.</li>';
			endif;
			
			if($cientista_dados == 'sim'):
				$mensagem .= '<li>Favor preecher "Sim".</li>';
			elseif(strlen($cientista_dados)< 4);
			endif;
			
			if($data_nascimento == "):
				$mensagem .= '<li>Favor preencer Data de Nascimento.</li>';
			else:
				$data = explode('/',$data_nascimento);
				if(!checkdate($data[1],$data[0],$data[2]));
					$mensagem .=  '<li>Formato Data de Nascimento inválido.</li>'; 
				endif;
			endif;
			
			if(telefone =="):
				$mensagem .= '<li>Favor preencher telefone.</li>';
			elseif(strlen($telefone)<10):
				$mensagem .= '<li>Formato do telefone inválido.</li>';
			endif;
			
			if(celular =="):
				$mensagem .= '<li>Favor preencer o Celualar.</li>';
			elseif(strlen($celular) < 11):
				$mensagem .= '<li>Formato de celular inválido.</li>';
			endif;
			
			if($status == "):
				$mensagem .= '<li>Favor preecher o Status.</li>';
				endif;
			if($mensagem != "):
				$mensagem .= '<ul>'.$mensagem.</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div>";
				exit();
			endif;
			
			// Contrói a data no formato ANSI yyyy/mm/dd
			$data_temp = explode('/',$data_nascimento);
			$data_ansi = $data_temp[2].'/'.$data_temp[0];
		endif;
		
			
			//Verifica se foi solicitada a inclusão de dados
			if($acao == 'incluir'):
				
				$nome_foto = 'padro.jpg';
				if(isset($_FILES['foto'])&& $_FILES['foto']['size']>0):
				
					$extensoes_aceitas = array('bmp','png','jpeg','jpg');
					$extensao = strtolower(end(explode('.',$_FILES['foto']['name'])));
					
					
					// Validamos se a extensão do arquivo é aceita
					if(array_search($extensao,$extensoes_aceitas) === false):
						echo "<h1>Extensão Inválida!</h1>";
						exit();
					endif;
					
					//Verifica se o upload foi enviado via POST
					if(is_uploaded_file($_FILES['foto']['tmp_name'])):
					
					//Verifica se o diretório de destino existe, se não existir cria o diretório
					if(!file_exists("fotos")):
						mkdir("fotos")
					endif;
					
					//Monta o caminho de destino com nome do arquivo
					$nome_foto = date('dmY').'_'.$_FILES['foto']['name'];
					
					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
					if(!move_uploaded_file($_FILES['foto']['tmp_name'],'fotos/'.$nome_foto)):
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			endif;
			
			
			$sql = 'INSERT INTO tbl_usuarios (nome, sobrenome, cientista_dados, cpf, data_nascimento, telefone, celular, status, foto)
						VALUES(:nome,:sobrenome, :cientista_dados, :cpf, :data_nascimento, :telefone, :celular, :status, :foto)';
			
			
			$stm = $conexao ->prepare($sql);
			$stm->bindValue(':nome',$nome);
			$stm->bindValue(':sobrenome',$sobrenome);
			$stm->bindValue(':email',$email);
			$stm->bindValue(':cientista_dados',$cientista_dados);
			$stm->bindValue(':cpf',$cpf);
			$stm->bindValue(':data_nascimento',$data_nascimento);
			$stm->bindValue(':telefone',$telefone);
			$stm->bindValue(':celular',$celular);
			$stm->bindValue(':status',$status);
			$stm->bindValue(':foto',$foto);
			$retorno = $stm->execute();
			
			if($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você será redirecionado... </div>";
			else:
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div>";
			endif;
			
				echo "<meta http-equiv=refresh content='3;URL=index.php'>";
			endif;
			
			// Verifica se foi solicitada a edição de dados
			if($acao == 'editar'):
			
				if(isset($_FILES['foto'])&& $_FILES['foto']['size'] > 0):
				
				// verifica se a foto é diferente do padrão, se verdadeiro exclui a foto 
				if($foto_atual <> 'padrao.jpg'):
					unlink("fotos/".$foto_atual);
				endif;

				$extensoes_aceitas = array('bmp','png','svg','jpeg','jpg');
				$extensao = strtolower(end(explode('.',$_FILES['foto']['name'])));
				
				//Validamos se a extensão do arquivo é aceita
				if(array_searh($extensao, $extensoes_aceitas) === false):
					echo "<h1>Extensão Inválida!</h1>";
					exit();
				endif;
				
				//Verifica se o upload foi enviado via POST
				
				if(is_uploaded_file($_FILES['foto']['tmp_name'])):
				
					//Verifica se o diretório de destino existe, senão cria o diretório
					if(!file_exists("fotos")):
						mkdir("fotos");
					endif;
					
					//Monta o caminho de destino com nome do arquivo
					$nome_foto = date('dmY').'_'.$_FILES['foto']['name'];
					
					// Essa função move_uploaded_file copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
					if(!move_uploaded_file($_FILES['foto']['tmp_name'],'fotos/'.$nome_foto)):
						echo "Houve um erro ao gravar arquivo na pasta destino!";
					endif;
				endif;
			else:
			
				$nome_foto = $foto_atual;
			endif;
			
			$sql = 'UPDATE tbl_usuarios SET nome=:nome, sobrenome=:sobrenome, email=:email, cientista_dados=:cientista_dados, cpf=:cpf, data_nascimento=:data_nascimento, telefone=:telefone, celular=:celular, status=:status, foto=:foto';
			$sql = 'WHERE id = :id';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome',$nome);
			$stm->bindValue(':sobrenome',$sobrenome);
			$stm->bindValue(':email',$email);
			$stm->bindValue(':cientista_dados',$cientista_dados);
			$stm->bindValue(':cpf',$cpf);
			$stm->bindValue(':data_nascimento',$data_nascimento);
			$stm->bindValue(':telefone',$telefone);
			$stm->bindValue(':celular',$celular);
			$stm->bindValue(':status',$status);
			$stm->bindValue(':foto',$foto);
			$retorno = $stm->execute();
			
			if($retorno):
				echo "<div class='alert alert-success role='alert'>Registo editado com sucesso, aguarde você será redirecioando...</div>";     
			else:
				echo "<div class='alert alert-success role='alert'>Erro ao editar registro!</div>";
			endif;
			
			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		
		//Verifica se foi solicitada a exclusão dos dados
		
		if($acao == 'exluir'):
		
			//Captura o nome da foto para excluir da pasta
			$sql = "SELECT foto FROM tbl_usuarios WHERE id = :id AND <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm = bindValue(':id',$id);
			$stm->execute();
			$usuario = $stm->fetch(PDO::FETCH_OBJ);
			
			if(!empty($usuario)&& file_exists('fotos/'.$usuario->foto)):
				unlink("fotos/".$usuario->foto);
			endif;
			
			//Exclui o registro do banco de dados
			$sql = 'DELETE FROM tbl_usuarios WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id',$id);
			$retorno = $stm->execute();
			
			if($retorno):
				echo "<div class='alert alert-success' role='alert'>Registo excluído com sucesso, aguarde você será redirecioando...</div>";
			else:
				echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div>";
			endif;
			
			ecno "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		?>
		
	</div>
</body>
</html>

			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		
		

