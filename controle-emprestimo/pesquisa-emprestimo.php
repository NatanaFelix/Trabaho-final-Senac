<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/emprestimo.css">
    <title>Pesquisa Emprestimo</title>
</head>
<body>
    <?php 
		include_once '../controle-principal/funcoes.php';
		include_once '../controle-principal/conexao.php';
		include_once '../assets/navbar-principal.php';

		if (isset($_POST['busca'])) {
			$pesquisa = $_POST['busca'];
		  }
		  else
		  {
			// echo "saiu no else <br>";
			$pesquisa ='';
		  }

		$sql = "SELECT * FROM `emprestimolivros` where codEmprestimo  like '%$pesquisa%' or leitorcpf = '$pesquisa'";

		$dados = mysqli_query($conexao,$sql);

	?>
    <h1 class="text-white display-4 text-center">Consulta de Emprestimos</h1>
    <nav class="navbar navbar-light bg-light">
        <div class="justify-content-md-center">
            <form class="d-flex" action="pesquisa-emprestimo.php" method="POST">
                <input class="form-control col-sm-12" type="search" placeholder="Informe o código do emprestimo"
                    aria-label="Search" name="busca">
                <button class="btn btn-outline-dark ml-2" type="submit"><i class="fas fa-search"></i>Pesquisar</button>
            </form>
        </div>
    </nav>
    <table class="table table-hover table-light">
        <thead>
            <tr>
				<th scope="col">Codigo Emprestimo</th>
				<th scope="col">Codigo Livro</th>
                <th scope="col">CPF do Leitor</th>
                <th scope="col">Data Emprestimo</th>
                <th scope="col">Data Devolução</th>
            </tr>
        </thead>
        	<tbody>
				<?php 
					// faz um loop com os dados (linhas) do banco de dados (uma a uma ate o fim)
					while ($linha = mysqli_fetch_assoc($dados)) {

					// pega os valores de cada linha e coloca em variaveis
					$codEmprestimo = $linha['codEmprestimo'];
					$codigo = $linha['codigoLivro'];
					$cpf = $linha['leitorcpf'];
					$emprestimo = formatadata($linha['emprestimo']);
					$devolucao = formatadata($linha['devolucao']);;

					// mostra o que colocou em variaveis
					echo "<tr>";
					echo "<td>$codEmprestimo</td>";
					echo "<td scope='row'>$codigo</td>";
					echo "<td>$cpf</td>";
					echo "<td>$emprestimo</td>";
					echo "<td>$devolucao</td>";
					echo "</tr>";	}
				?>
        	</tbody>
    	</table>
		<a href="./emprestimo.php" class="btn btn-secondary">Voltar</a>
    <?php 
	include_once '../controle-principal/bootjs.php'
	?>
</body>
</html>