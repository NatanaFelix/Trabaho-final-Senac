<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <title>Pesquisa Livros</title>
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

		$sql = "select * from livros where titulo like '%$pesquisa%' or ISBN = '$pesquisa'";

		$dados = mysqli_query($conexao,$sql);
	?>
    <h1 class="text-white display-4 text-center">Consulta de Livros</h1>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <form class="d-flex" action="pesquisa.php" method="POST">
                <input class="form-control me-1 col-sm-12" type="search" placeholder="Informe o ISBN ou Título do livro"
                    aria-label="Search" name="busca">
                <button class="btn btn-outline-dark ml-2" type="submit"><i class="fas fa-search"></i>Pesquisar</button>
            </form>
        </div>
    </nav>
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th scope="col">ISBN</th>
                <th scope="col">Título</th>
                <th scope="col">Editora</th>
                <th scope="col">Autor</th>
                <th scope="col">Publicação</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Emprestados</th>
            </tr>
        </thead>
        	<tbody>
				<?php 
					while ($linha = mysqli_fetch_assoc($dados)) {
					
					$ISBN = $linha['ISBN'];
					$titulo = $linha['titulo'];
					$editora = $linha['editora'];
					$autor = $linha['autor'];
					$publicacao = formatadata($linha['publicacao']);
					$quantidade = $linha['quantidade'];
					$emprestados = $linha['emprestados'];
					
					echo "<tr>";
					echo "<th scope='row'>$ISBN</th>";
					echo "<td>$titulo</td>";
					echo "<td>$editora</td>";
					echo "<td>$autor</td>";
					echo "<td>$publicacao</td>";
					echo "<td>$quantidade</td>";
					echo "<td>$emprestados</td>";
					echo "</tr>";	
				}
				?>
        	</tbody>
    	</table>	
		<a href="./index.php" class="btn btn-secondary">Voltar</a>    
	<?php 
	include_once '../assets/footer.php';
	include_once '../controle-principal/bootjs.php'
	?>
</body>

</html>