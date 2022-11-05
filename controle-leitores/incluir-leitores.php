<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="./css/leitores.css">
    <title>Incluir Leitor</title>
</head>
<body>
    <?php
	include_once '../assets/navbar-principal.php';
	include_once '../controle-principal/conexao.php';
	include_once '../controle-principal/funcoes.php';      

	//armazena as variáveis 
	$chave = $_POST['CPF'];
	$nome = $_POST['nome'];
	$cep = $_POST['cep'];
	$endereco = $_POST['endereco'];
	$numero = $_POST['numero'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['estado'];
	$nascimento = $_POST['nascimento'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	$observacao = $_POST['observacao'];

	$sql = "SELECT * FROM leitores WHERE CPF = '$chave'";			
	if ($resultado = mysqli_query($conexao,$sql)){
		if($campos = mysqli_fetch_array($resultado)){
			//faz o update no banco caso o cpf já exista
			$sql = "UPDATE `leitores` SET nome='$nome', endereco='$endereco', numero='$numero', cep='$cep', cidade ='$cidade', estado ='$uf', nascimento='$nascimento', telefone='$telefone', email='$email', status='$status', observacao='$observacao' WHERE CPF = '$chave'";
			if (mysqli_query($conexao,$sql)) {
				echo "<div class='alert alert-success' role='alert'>Leitor atualizado com sucesso!</div>";
			}else{
				echo "deu problema<br>";
				echo $conexao->error . '<br>' . $sql;
			}
		}else{
			//faz o insert no banco caso o cpf não exista
			$sql = "INSERT INTO `leitores`(`CPF`, `nome`, `endereco`, `numero`, `cep`, `cidade`, `estado`, `nascimento`,`telefone`, `email`, `status`, `observacao`) 
			VALUES ('$chave','$nome','$endereco','$numero', '$cep', '$cidade','$uf','$nascimento','$telefone','$email', '$status', '$observacao')";	
			$resultado = mysqli_query($conexao, $sql);
			echo "<div class='alert alert-success' role='alert'>Leitor cadastrado com sucesso!</div>";
			}
	}
	?>
    <a href="./leitores.php" class="btn btn-outline-secondary">Voltar</a>
    <?php
	include_once '../controle-principal/bootjs.php';
	?>
</body>
</html>