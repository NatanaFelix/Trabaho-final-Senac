<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/emprestimo.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Incluir Emprestimo</title>
</head>
<body>
    <?php
		include_once '../assets/navbar-principal.php';
		include_once '../controle-principal/conexao.php';
		include_once '../controle-principal/funcoes.php';
					
		$codigo = $_POST['codLivro'];
		$chave = $_POST['CPF'];
		$devolucao = $_POST['devolucao'];
		
		// query que insere o emprestimo no banco de dados
		$sql = "INSERT INTO `emprestimolivros`(`codEmprestimo`, `codigoLivro`, `item`, `leitorcpf`, `devolucao`) 
		VALUES (NULL, '$codigo', '1', '$chave', '$devolucao')";
	
		if ($resultado = mysqli_query($conexao,$sql)) {	
			//query que soma a quantidade de livros emprestados com o mesmo código na tabela emprestimolivros	
			$query_soma = "SELECT SUM(item) FROM emprestimolivros WHERE codigoLivro = '$codigo'";
			if($dados_soma = mysqli_query($conexao, $query_soma)){
				$total = mysqli_fetch_assoc($dados_soma);
				$novo_total = array_sum($total);
				//query que faz o update da quantidade de livros emprestados na tabela livros
				$query_update = "UPDATE livros SET emprestados = '$novo_total' WHERE livros.ISBN = '$codigo'";
				if($resultado = mysqli_query($conexao, $query_update)){
					echo "<div class='alert alert-success' role='alert'>Cadastro de emprestimo realizado com sucesso!</div>";
				}else{
					echo "<div class='alert alert-warning' role='alert'>O empréstimo não pode ser cadastrado </div>";
				}
			}
		}	
		$conexao->close();
	?>
    <a href="./emprestimo.php" class="btn btn-secondary">Voltar</a>
    <?php
	include_once '../controle-principal/bootjs.php';
	?>
</body>

</html>