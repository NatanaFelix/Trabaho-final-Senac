<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
	<title>Gravar</title>
</head>
<body>

	<?php 
	include_once '../assets/navbar-principal.php';
	include_once '../controle-principal/Conexao.php';
	include_once '../controle-principal/funcoes.php';

	$acao = $_SESSION['acao'];
	$chave = $_SESSION['ISBN'];

	$titulo = $_POST['titulo'] ?? '';
	$editora = $_POST['editora'] ?? ''; 
	$autor = $_POST['autor'] ?? '';
	$publicacao = $_POST['publicacao'] ?? '';
	$quantidade = $_POST['quantidade'] ?? '';
	$entrada = $_POST['entrada'] ?? '';
	$entrada = $_POST['saida'] ?? '';

	if ($acao == 'Incluir Livros') {
	// fazer insert na tabela livro	
	$sql = "INSERT INTO livros (ISBN,titulo,editora,autor,publicacao,quantidade) 
	VALUES ('$chave','$titulo','$editora','$autor','$publicacao','$quantidade')";
	//echo $sql;
	  if(mysqli_query($conexao, $sql)){
	  	echo "<div class='alert alert-success' role='alert'> Livro incluido com sucesso! </div>";
	  	}else{
	 		echo "<div class='alert alert-danger' role='alert'> O livro não pode ser incluido. <br> </div>";
	 		
	  	}
	}
	
	if ($acao == 'Alterar Livros') {
	// fazer update na tabela livro
	$sql = "UPDATE `livros` SET `ISBN`='$chave',`titulo`='$titulo',`editora`='$editora',`autor`='$autor',`publicacao`='$publicacao',`quantidade`='$quantidade' 
	WHERE ISBN = '$chave'";
		if (mysqli_query($conexao,$sql)) {
			echo "<div class='alert alert-success' role='alert'> Livro alterado com sucesso! </div>";
		}else{
			echo "<div class='alert alert-danger' role='alert'> O livro não pode ser alterado. <br> </div>";
			}
		}
	if ($acao == 'Excluir Livros') {
	// fazer delete na tabela livro
	$sql = "DELETE FROM `livros` WHERE ISBN = '$chave'";
		if(mysqli_query($conexao, $sql)){
			echo "<div class='alert alert-success' role='alert'> Livro excluido com sucesso! </div>";	
		}else{
			echo "<div class='alert alert-danger' role='alert'> O livro não pode ser excluido. <br> </div>";
		}
	}
	?>
	<br>
	<br>

	<?php
	$conexao->close();
	?>

	<div class="class text-center pt-3">
		<a href="index.php" class="btn btn-secondary mb-2"><i class="fas fa-angle-left pr-2"></i>Voltar</button></a>
	</div>
	<?php
		include_once '../controle-principal/bootjs.php';
	?>
</body>
</html>


