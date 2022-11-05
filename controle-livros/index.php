<?php
include_once '../controle-principal/restrito.php'
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/index.css">

    <title>Index</title>
</head>

<body>
    <?php
	include_once '../assets/navbar-principal.php';
    include_once '../controle-principal/Conexao.php';
    include_once '../controle-principal/funcoes.php';

	$_SESSION['acao'] = $_POST['acao'] ?? '';
	$_SESSION['ISBN'] = $_POST['ISBN'] ?? '';

	

	if ($_SESSION['acao'] == 'Incluir Livros') {
		header("Location: ./incluir.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Alterar Livros') {
		header("Location: ./alterar.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Excluir Livros') {
		header("Location: ./excluir.php");
		exit();
	}

	if ($_SESSION['acao'] == 'Pesquisar Livros') {
		header("Location: ./pesquisa.php");
		exit();
	}
	
	?>
    <?php
        include_once '../assets/navbar-principal.php';
        include_once '../controle-principal/Conexao.php';
        include_once '../controle-principal/funcoes.php';
	?>
    <div class="container pt-5">
        <div class="card bg-light p-3 mb-5">
        <img src="../assets/imagens/photo-output.jpg" class="card-img-top">
            <h1 class="principal display-4 texte-center">Controle de Livros</h1>
            <form action="index.php" method="POST">
                <div class="form-group pt-4 row justify-content-center">
                    <div class="col-sm-3">
                        <div class="shadow  bg-white rounded">
                            <input type="text" name="ISBN" class="form-control" id="codigo1"
                                aria-describedby="emailHelp" placeholder="Insira o ISBN do livro "maxlength="17" required>
                        </div>
                    </div>
                </div>
                <div class="class text-center pt-4">
                    <div class="btn-group " role="group" aria-label="Toolbar com grupos de botões">
                        <button class="btn btn-dark" name="acao" value='Incluir Livros'>Incluir Livros</button>
                        <button class="btn btn-dark" name="acao" value='Alterar Livros'>Alterar Livros</button>
                        <button class="btn btn-dark" name="acao" value='Excluir Livros'>Excluir Livros</button>
                        <button class="btn btn-dark" onclick="location.href='./pesquisa.php'">Pesquisar Livros</button>
                    </div>
                </div>
            </form>
        </div>
        <a href="../controle-principal/index.php" class="btn btn-secondary">Voltar</a>
    </div>
    <?php
		include_once '../controle-principal/bootjs.php';
	?>
</body>

</html>